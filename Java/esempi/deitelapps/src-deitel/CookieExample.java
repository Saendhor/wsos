// Fig. 9.9: CookieExample.java
// Using cookies.
import jakarta.servlet.*;
import jakarta.servlet.http.*;
import java.io.*;

public class CookieExample extends HttpServlet {
   private String names[] = { "C", "C++", "Java",
                              "Visual_Basic_6" }; //spaces now forbidden
   private String isbn[] = {                      //in cookie names
      "0-13-226119-7", "0-13-528910-6",
      "0-13-012507-5", "0-13-528910-6" };

   private int maxAge = 60;

   public void doPost( HttpServletRequest request,
                       HttpServletResponse response )
      throws ServletException, IOException
   {
      PrintWriter output;
      String language = request.getParameter( "lang" );

      Cookie c = new Cookie( language, getISBN( language ) );

      c.setMaxAge( maxAge );   // secs until c removed: really expires in Chrome 
      response.addCookie( c ); // must precede getWriter
      
      response.setContentType( "text/html" );
      output = response.getWriter();         

      // send HTML page to client
      output.println( "<HTML><HEAD><TITLE>" );
      output.println( "Cookies" );
      output.println( "</TITLE></HEAD><BODY>" );
      output.println( "<H1>Welcome to Cookies! (method doPost())</H1>" );
      output.println( language + " is a great language." );
      output.println( "<BR>sent cookie " + c.toString());
      output.println( "<hr><a href=\"./SelectLanguage.html\">Scelta linguaggi</a>" );
      output.println( "<hr><a href=\"./BookRecommendation.html\">Testi raccomandati</a>" );      
      output.println( "</BODY></HTML>" );

      output.close();    // close stream
   }

   public void doGet( HttpServletRequest request,
                      HttpServletResponse response )
                      throws ServletException, IOException
   {
      PrintWriter output;
      Cookie cookies[];
      
      cookies = request.getCookies(); // get client's cookies

      response.setContentType( "text/html" ); 
      output = response.getWriter();

      output.println( "<HTML><HEAD>" );
      output.println( "<TITLE>Cookies II</TITLE>" );
      output.println( "</HEAD><BODY>" );
      output.println( "<H1>Recommendations (method doGet())</H1>" );

      if ( cookies != null ) {
         // get the name of each cookie
         for ( int i = 0; i < cookies.length; i++ ) 
            output.println(
               cookies[ i ].getName() + " How to Program. " +
               "ISBN#: " + cookies[ i ].getValue() + "<BR>" );
      }
      else {
         output.println( "<H2>No Recommendations</H2>" );
         output.println( "You did not select a language or" );
         output.println( "the cookies have expired after " + maxAge + " sec" );
      }
      output.println( "<hr><a href=\"./SelectLanguage.html\">Scelta linguaggi</a>" );
      output.println( "<hr><a href=\"./BookRecommendation.html\">Testi raccomandati</a>" );
      output.println( "</BODY></HTML>" );
      output.close();    // close stream
   }

   private String getISBN( String lang )
   {
      for ( int i = 0; i < names.length; ++i )
         if ( lang.equals( names[ i ] ) )
            return isbn[ i ];

      return "";  // no matching string found
   }
}
