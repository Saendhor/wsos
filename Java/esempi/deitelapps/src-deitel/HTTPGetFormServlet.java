// Fig. 9.5: HTTPGetServlet.java
// Creating and sending a page to the client
import jakarta.servlet.*;
import jakarta.servlet.http.*;
import java.io.*;

public class HTTPGetFormServlet extends HttpServlet {
   public void doGet( HttpServletRequest request,
                      HttpServletResponse response )
      throws ServletException, IOException
   {
      PrintWriter output;
      String nome = request.getParameter( "nome-proprio" );

      
      response.setContentType( "text/html" );  // content type
      output = response.getWriter();           // get writer



      // create and send HTML page to client
      StringBuffer buf = new StringBuffer();
      buf.append( "<HTML><HEAD><TITLE>\n" );
      buf.append( "A Simple Servlet Example\n" );
      buf.append( "</TITLE></HEAD><BODY>\n" );
      buf.append( "<H1>" + nome + ": Welcome to Servlets!</H1>\n" );
      buf.append( "</BODY></HTML>" );
      output.println( buf.toString() );
      output.close();    // close PrintWriter stream
   }
}
