// Fig. 9.13: SessionExample.java
// Using sessions.

import java.io.IOException;
import java.io.PrintWriter;
import java.util.Enumeration;
import java.util.Map;

import jakarta.servlet.*;
import jakarta.servlet.http.*;

// put/get methods are deprecated

public class SessionExample extends HttpServlet {

	private static final Map<String, String> 
		isbnMap = Map.of(
			"C", "0-13-226119-7",
			"C++", "0-13-528910-6",
			"Java", "0-13-012507-5",
			"Visual Basic 6", "0-13-528910-6"
		);

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
		session.setAttribute( language, isbnMap.get( language ) );
		
		response.setContentType( "text/html" );
		output = response.getWriter();
		
		// send HTML page to client
		output.println( "<HTML><HEAD>" );
		output.println( "<TITLE>Sessions</TITLE>" );
		output.println( "</HEAD><BODY>" );
		output.println( "<H1>Welcome to Sessions! (method doPost())</H1>" );
		output.println( language + " is a great language." );
		output.println( "<BR>opened session: <tt>" + session.toString() + "</tt><br><br>");
		output.println( "<hr><a href=\"./SelectLanguage.html\">Scelta linguaggi</a>" );
		output.println("<FORM ACTION=\"./Sessions\" METHOD=\"GET\">");
		output.println("    Press \"Recommend books\" for a list of books.");
        output.println("    <INPUT TYPE=submit VALUE=\"Recommend books\"></FORM>");
		output.println( "</BODY></HTML>" );

		output.close();    // close stream
	}

	public void doGet(	HttpServletRequest request,
						HttpServletResponse response )
		throws ServletException, IOException
	{
		// Output iniziale
		PrintWriter output;
		response.setContentType( "text/html" ); 
		output = response.getWriter();
		output.println( "<HTML><HEAD>" );
		output.println( "<TITLE>Sessions II</TITLE>" );
		output.println( "</HEAD><BODY>" );
		output.println( "<H1>Recommendations (method doGet())</H1>" );

		// Get the user's session object. 
		// Don't create a session (false) if one does not exist.
		HttpSession session = request.getSession( false );	

		// get names of session object's values
		Enumeration<String> attributeNames = session.getAttributeNames();
		if ( ! attributeNames.hasMoreElements() ) {
			output.println( "<H2>No Recommendation</H2>" );
			output.println( "You did not select a language or" );
			output.println( "the session has expired." );
		} else	{
			// get value for each name in attributeNames
			while (attributeNames.hasMoreElements()) {
    			String name = attributeNames.nextElement();
    			String value = session.getAttribute(name).toString();
				// need toString() instead of cast (String) because
				// now HttpSession always contains at least the pair 
				// ("jakarta.security.auth.subject", "Subject:"). 
				// Why? Should represent an authorised user
				// in any case, we should filter it out, as follows

				if (value.toCharArray()[7] != ':') 
					output.println("<i>" + name + " How to Program. </i>" 
									+ "ISBN: " + value + "<BR>" );
				else
					output.println(value);
			}
		}
		output.println("<hr><a href=\"./SelectLanguage.html\">Scelta linguaggi</a>" );
		output.println("</BODY></HTML>" );

		output.close();    // close stream
	}
}
