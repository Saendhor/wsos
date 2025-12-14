// Fig. 9.13: SessionExample.java
// Using sessions.

import java.io.IOException;
import java.io.PrintWriter;

import jakarta.servlet.*;
import jakarta.servlet.http.*;

// put/get methods are deprecated

public class SessionExample extends HttpServlet {
	private final static String names[] = 
		{ "C", "C++", "Java", "Visual Basic 6" };
	private final static String isbn[] = {
		"0-13-226119-7", "0-13-528910-6",
		"0-13-012507-5", "0-13-528910-6" };
 
	public void doPost( HttpServletRequest request,
						HttpServletResponse response )
		throws ServletException, IOException
	{
		PrintWriter output;
		String language = request.getParameter( "lang" );

		// Get the user's session object.
		// Create a session (true) if one does not exist.
		HttpSession session = request.getSession( true );
		
		// add a value for user's choice to session
		session.setAttribute( language, getISBN( language ) );
		
		response.setContentType( "text/html" );
		output = response.getWriter();
		
		// send HTML page to client
		output.println( "<HTML><HEAD>" );
		output.println( "<TITLE>Sessions</TITLE>" );
		output.println( "</HEAD><BODY>" );
		output.println( "<H1>Welcome to Sessions! (method doPost())</H1>" );
		output.println( language + " is a great language." );
		output.println( "<BR>session opened " + session.toString());
		output.println( "<hr><a href=\"./SelectLanguage.html\">Scelta linguaggi</a>" );
		output.println( "<hr><a href=\"./BookRecommendation.html\">Testi raccomandati</a>" );
		output.println( "</BODY></HTML>" );

		output.close();    // close stream
	}

	public void doGet(	HttpServletRequest request,
						HttpServletResponse response )
		throws ServletException, IOException
	{
		PrintWriter output;
		
		// Get the user's session object. 
		// Don't create a session (false) if one does not exist.
		HttpSession session = request.getSession( false );
		
		// get names of session object's values
		String valueNames[];
		valueNames = ( session != null ) 
			? session.getAttributeNames() : null;
			
		response.setContentType( "text/html" ); 
		output = response.getWriter();
		output.println( "<HTML><HEAD>" );
		output.println( "<TITLE>Sessions II</TITLE>" );
		output.println( "</HEAD><BODY>" );
		output.println( "<H1>Recommendations (method doGet())</H1>" );
		if ( valueNames == null || valueNames.length == 0 ) {
			output.println( "<H2>No Recommendation</H2>" );
			output.println( "You did not select a language or" );
			output.println( "the session has expired." );
		} else	{
			// get value for each name in valueNames
			for ( int i = 0; i < valueNames.length; i++ ) {
				String value =  // there was (String) cast here  
					session.getAttribute( valueNames[ i ] ).toString();
				// need toString() instead of cast (String) because
				// now HttpSession always contains at least the pair 
				// ("javax.security.auth.subject", "Subject:"). 
				// Why? Should represent an authorised user
				// in any case, we should filter it out, as follows

//				output.println(valueNames[i]); // debug

				if (value.toCharArray()[7] != ':') 
					output.println( valueNames[ i ] + " How to Program. " 
									+ "ISBN#: " + value + "<BR>" );
			}
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
