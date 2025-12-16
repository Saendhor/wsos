import java.io.*;
import java.sql.*;

import jakarta.servlet.*;
import jakarta.servlet.annotation.*;
import jakarta.servlet.http.*;

@WebServlet(urlPatterns = "/MovieCatalogue")
public class MovieCatalogue extends HttpServlet {
    //Class constant
    static final boolean DEBUG = true;
    //myDatabase is my database in use
    //change that to your used database
    //user = <myusername>
    //password = <mypassword>
    /*
    private static final String CONNECTION = 
    "jdbc:mariadb://localhost:3306/myDatabase?user=user&password=password";
    */
   private static final String URL = "jdbc:mariadb://localhost:3306/myDatabase";
   private static final String USERNAME = "user";
   private static final String PASSWORD = "password";

    //Class attributes
    private static Connection connection;
    private static PrintWriter out;
    //private static Statement stmt;
    //private static ResultSet result;

    //Attempt connection to database
    //if fails it prints the stack trace, hence the SQLException e
    private static int initConnection() {
        try {
            //Class.forName("org.mariadb.jdbc.Driver");
            //connection = DriverManager.getConnection(CONNECTION);
            connection = DriverManager.getConnection(URL, USERNAME, PASSWORD);
            if (DEBUG) {
                //Takes for granted it has been assigned
                out.println("Connection successfully enstablished!");
                out.println("<br>");
            }
            
        } catch (SQLException e) {
            e.printStackTrace();
        }
        return 0;
    }

    @Override
    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
        response.setContentType("text/html");
        out = response.getWriter();

        //Enstablish connection
        if (initConnection() != 0) {
            out.println("Error while enstablishing connection");
            out.println("<br>");
        }

        //Perform query on database
        //current table: movies
        String query = "SELECT * FROM movies;";
        try (Statement stmt = connection.createStatement();
             ResultSet result = stmt.executeQuery(query);) {
            out.println("Movie catalogue:");
            out.println("<br>");

            //Print items in database
            while (result.next()) {
                //| id | title | director | year | duration_minutes | genre |
                out.println(result.getString("id"));
                out.println(result.getString("title"));
                out.println(result.getString("director"));
                out.println(result.getString("year"));
                out.println(result.getString("duration_minutes"));
                out.println(result.getString("genre"));

                //add Update and Delete form

                out.println("<br>");

                //add Create form
            }

        } catch (SQLException e) {
            e.printStackTrace();
        }

    }
}