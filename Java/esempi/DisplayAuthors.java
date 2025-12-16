// Deitel et al.: Java: How to Program, ed. 9
// Fig. 28.23: DisplayAuthors.java
// Displaying the contents of the authors table.

// QUESTO FILE NON E' NELLA SUA DIR, ma vedi commenti per
// fare in modo che spieghi i vantaggi di JDBC

import java.sql.Connection;
import java.sql.Statement;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.ResultSetMetaData;
import java.sql.SQLException;

public class DisplayAuthors {
   // database URL
   static final String DATABASE_URL = "jdbc:mysql://localhost/books";
   // leggere URL p.es. da riga di comando e far vedere che lo stesso codice
   // funziona con due diversi DB senza cambiare nulla

   // launch the application
   public static void main(String args[]) {
      Connection aConnection = null; // manages connection
      Statement aStatement = null; // query statement
      ResultSet aResultSet = null; // manages results

      // eliminare il prossimo gruppo anche nella dir
      /*
       * java.util.Enumeration drivers = DriverManager.getDrivers();
       * System.out.println("Loaded JDBC drivers list follows");
       * while (drivers.hasMoreElements())
       * System.out.println("Loaded JDBC Driver=" + drivers.nextElement());
       * System.out.println("----------------------------\n");
       */
      // connect to database books and query database
      try {
         // establish connection to database
         aConnection = DriverManager.getConnection(DATABASE_URL, "gp", "gp");
         // create Statement for querying database
         aStatement = aConnection.createStatement();
         // query database
         String query = "SELECT AuthorID, FirstName, LastName FROM Authors";
         aResultSet = aStatement.executeQuery(query);

         // dalla query si estrae il numero di colonne (un metadato)
         ResultSetMetaData metaData = aResultSet.getMetaData();
         int numberOfColumns = metaData.getColumnCount();
         System.out.println("Executing " + query + "\n");

         for (int i = 1; i <= numberOfColumns; i++)
            System.out.printf("%-8s\t", metaData.getColumnName(i));
         System.out.println();

         while (aResultSet.next()) {
            for (int i = 1; i <= numberOfColumns; i++)
               System.out.printf("%-8s\t", aResultSet.getObject(i));
            System.out.println();
         }
      } // end try
      catch (SQLException sqlException) {
         sqlException.printStackTrace();
      } // end catch
      finally { // ensure resultSet, statement and connection are closed
         try {
            aResultSet.close();
            aStatement.close();
            aConnection.close();
         } catch (Exception exception) {
            exception.printStackTrace();
         }
      } // end finally
   } // end main
} // end class DisplayAuthors
