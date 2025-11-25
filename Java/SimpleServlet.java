// SimpleServlet.java

import jakarta.servlet.*;
import jakarta.servlet.http.*;
import java.io.*;

public class SimpleServlet extends HttpServlet {
   public void doGet( HttpServletRequest request,
                      HttpServletResponse response )
      throws ServletException, IOException
   {
      response.setContentType( "text/html" );  // content type

      // create and send text to client
      PrintWriter out = response.getWriter();                  // get writer
      out.println( "Output dalla servlet SimpleServlet (Jakarta)\n<p>\n");
      out.close();    // close PrintWriter stream
   }
}
