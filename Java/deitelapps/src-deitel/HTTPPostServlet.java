
// A simple survey servlet
import jakarta.servlet.*;
import jakarta.servlet.http.*;
import java.io.*;

// imports now unused
//import java.text.*;
//import java.util.*;

// N.B.: legge dal file a ogni interazione (doPost) e vi scrive
// sarebbe meglio forse leggere all'inizio e scrivere alla fine
// oppure scrivere man mano?

public class HTTPPostServlet extends HttpServlet {
   private String animalNames[] = { "dog", "cat", "bird", "snake", "none" };
   private int votes[] = new int[5]; // array dei voti (iniz. 0)
   private int total;
// private ObjectInputStream indb;  // vedi sotto
   private ObjectOutputStream outdb;
   private String pathName;
   private File dataFile;

   /*
    * In linea di massima, usare il file system dell'host su cui gira
    * Tomcat (o altro servlet container) non è una buona idea (è fonte di
    * dipendenze da OS e compromette la portabilità).
    * Si preferisce memorizzare i dati permanenti in DB.
    *
    * In questo esempio però si ricorre ai file, anche per illustrarne l'uso.
    * Il problema: come specificare il pathname del file e dove situarlo?
    *
    * Una servlet, come ogni classe Java, può fare riferimento al file system con
    * qualunque pathname legale per la piattaforma ospite.
    *
    * Se il file di input venisse riferito come "survey.dat" (pathname relativo!),
    * o
    * (è lo stesso) "./survey.dat", survey.dat sarebbe (come da "teoria" dei
    * Sistemi
    * Operativi) nella working directory del processo Tomcat, che in genere è
    * la directory in cui Tomcat viene avviato!!! Ciò:
    * - è poco trasparente
    * - può portare a (cercare di) accedere a dir per cui il processo non ha i
    * permessi
    * - può far sovrascrivere accidentalmente preesistenti file con lo stesso nome.
    *
    * La working dir può essere reperita con System.getProperty("user.dir").
    * Con dei test è facile confermare che essa è la dir da cui viene avviato
    * tomcat, cioè la directory corrente $(pwd) della shell in cui si avvia tomcat,
    * indipendentemente dal formato del comando con cui lo si avvia;
    * se, p.es., $(pwd)="/" e si lancia tomcat con startup.sh (con PATH
    * appropriato)
    * o piuttosto con /usr/share/tomcat/bin/startup.sh, non cambia nulla:
    * System.getProperty("user.dir") restituisce "/" e i nomi di file relativi
    * saranno interpretati rispetto alla working dir "/"
    *
    * Per ovvie ragioni, poi, la Servlet non dovrebbe accedere indiscriminatamente
    * a qualsiasi parte della gerarchia di file dell'host dove gira Tomcat, ammesso
    * che Tomcat (come processo) possa accedervi (in genere, non può).
    * Quindi i nomi assoluti, come p.es. "/survey.dat" o "/home/survey.dat", non
    * sono neanche una buona idea.
    *
    * E' invece opportuno che eventuali file creati o letti dalla servlet si
    * trovino
    * all'interno del "contesto" della web app di cui la servlet è parte
    * (insieme con gli altri file di configurazione e librerie della web app).
    * Consideriamo, p.es., una web app di contesto "aWebApp", accessibile
    * via: http://localhost:8080/aWebApp
    * Sappiamo che essa è collocata nella directory: $CATALINA_BASE/webapps/aWebApp
    * Quindi un file con pathname virtuale "/survey.dat" si trova nella "radice"
    * del contesto della web app e avrà quindi pathname fisico:
    * $CATALINA_BASE/webapps/aWebApp/survey.dat
    * Ma come può fare il codice della servlet, a runtime, a determinare questa
    * corrispondenza, in modo da aprire i file nella locazione corretta, con,
    * p.es.,
    * new File( pathName ), dove pathname =
    * "$CATALINA_BASE/webapps/aWebApp/survey.dat"?
    *
    * Potrebbe essere complicato, perché, ammesso che il codice possa leggere
    * $CATALINA_BASE, dovrebbe poter determinare riflessivamente la dir webapps
    * (potrebbe chiamarsi diversamente, secondo la configurazione) e il contesto
    * aWebApp
    *
    * In effetti, la servlet può determinare a runtime, riflessivamente, il
    * cosiddetto
    * "Servlet context", che NON è il "context" della web app, bensì un descrittore
    * dell'ambiente di esecuzione, usando il metodo getServletContext() della
    * classe
    * GenericServlet.
    * Il ServletContext così determinato ha un metodo, getRealPath() che traduce
    * - un pathname virtuale, riferito al contesto (context path) della web app di
    * cui
    * fa parte la servlet;
    * - in pathname reale sull'host su cui gira il container che esegue la servlet.
    *
    * Ad esempio, se il contesto (context path) della web app è "aWebApp",
    * la web app sarà accessibile con, p.es.: http://localhost:8080/aWebApp
    * e il pathname virtuale /survey.dat corrisponderà
    * a un pathname reale determinabile con:
    * getServletContext().getRealPath("/survey.dat")
    * che corrisponde a: $CATALINA_BASE/webapps/aWebApp/survey.dat
    *
    * It is possible that a servlet container may match a context by more than one
    * context path. In such cases the HttpServletRequest.getContextPath() will
    * return the
    * actual context path used by the HTTP request and it may differ from the path
    * returned by
    * this method. The context path returned by this method should be considered as
    * the
    * prime or preferred context path of the application.
    */

   public void init(ServletConfig config) throws ServletException {
      super.init(config);

      // Debug: stampa su catalina.out: la user dir, un pathname relativo, uno
      // assoluto
      // quello assoluto andrebbe sulla root del sistema, quindi non va bene;
      // quello relativo su CATALINA_HOME (o CATALINA_BASE): ok, ma non dà
      // "isolamento" da altri data file (si troverebbero tutti nella stessa dir)
      System.out.println("User dir: " + System.getProperty("user.dir"));
      dataFile = new File("provaPathNameRelativo");
      System.out.println("Data file (relative) would be " + dataFile.getAbsolutePath());
      // il nome relativo porta alla dir CATALINA_HOME (installazione Tomcat)
      dataFile = new File("/provaPathNameAssoluto");
      System.out.println("Data file (absolute) would be " + dataFile.getAbsolutePath());
      // il nome assoluto porta alla root directory del server su cui gira Tomcat
      // la scelta migliore è la seguente, vedi commenti prima di questo metodo

      pathName = getServletContext().getRealPath("/survey.dat");
      dataFile = new File(pathName);
      System.out.println("Data file is: " + pathName);
      if (dataFile.exists()) { // get survey data from file into array votes[]
         try {
            System.out.println("Reading data from " + dataFile.getAbsolutePath());

            ObjectInputStream indb = new ObjectInputStream( // file dataFile stores
                  new FileInputStream(dataFile)); // objects, i.e.
            votes = (int[]) indb.readObject(); // int[] arrays
            indb.close(); // close stream

            total = 0;
            for (int i = 0; i < votes.length; ++i) // aggiorna totale voti
               total += votes[i];
         } catch (Exception e) { // readObject() puo` causare
            e.printStackTrace(); // varie eccezioni
         }
      } // finita lettura da file (se esistente)

      // prepara file di output
      try {
         outdb = new ObjectOutputStream(new FileOutputStream(dataFile));
      } catch (Exception e) {
         System.out.println("Problem writing to " + dataFile.getAbsolutePath());
         e.printStackTrace();
      }
   }

   public void destroy()
   // salva stato su file di output
   // l'alternativa e' di salvare lo stato a ogni voto ricevuto
   {
      try {
         // scrive stringa-nome del file dati su catalina.out
         System.out.println("Writing data to " + dataFile.getAbsolutePath());
         // salva voti sul file di output
         outdb.writeObject(votes);
         outdb.flush();
         outdb.close();
      } catch (IOException ioe) {
         ioe.printStackTrace();
      }
   }

   public void doPost(HttpServletRequest request,
         HttpServletResponse response)
         throws ServletException, IOException {
      ++total; // update total of user survey replies (votes)
      // read current survey reply from HTTP incoming request
      String value = // ottiene il parametro "animal"
            request.getParameter("animal"); // dalla richiesta HTTP

      // determine which was selected and update its total
      for (int i = 0; i < animalNames.length; ++i)
         if (value.equals(animalNames[i]))
            ++votes[i];

      // prepara il PrintWriter su cui inviare la risposta al cliente
      response.setContentType("text/html"); // content type
      PrintWriter responseOutput = response.getWriter();

      try {
         // write updated totals out to disk
         // qui si scriveva il totale aggiornato (++total) sul disco
         // ora eliminato da qui perche' si scrive il totale solo
         // in uscita dalla servlet (vedi metodo destroy())

      } catch (Exception e) {
         responseOutput.println("Problem writing to " +
               dataFile.getAbsolutePath() + "<br>");
         e.printStackTrace(responseOutput);
         return;
      }
      // Calcola percentuali
      double percent[] = new double[votes.length];
      for (int i = 0; i < percent.length; ++i)
         percent[i] = 100.0 * votes[i] / total;

      // prepara risultati per il browser in uno StringBuffer

      StringBuffer buf = new StringBuffer();
      buf.append("<html><h3>Risultati</h3>\n<table>\n");

      for (int i = 0; i < percent.length; ++i) {
         buf.append("<tr><td>" + animalNames[i] + "</td><td>");
         buf.append(String.format("%.2f", percent[i]));
         buf.append("%</td><td>voti: " + votes[i] + "</td></tr>\n");
      }
      buf.append("\n</table><br>Voti espressi: " + total);
      buf.append("\n<hr>data file: " + pathName);
      buf.append("\n<hr><a href=\".\">Indietro al sondaggio</a>");
      buf.append("\n</html>");

      // invia risultati al cliente
      responseOutput.println(buf.toString());
      responseOutput.close();
   }
}
