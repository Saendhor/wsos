import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

@WebServlet("/MovieCatalogue")
public class MovieCatalogue extends HttpServlet {
    int DEBUG = -1; //True (1) or False (0)

    //Preparing connection
    Connection connection;
    //static final String CONNECTION = "jdbc:mariadb://localhost:8080/myDatabase?user=user&password=password";
    static final String URL = "jdbc:mariadb://localhost/myDatabase";
    static final String USERNAME = "user";
    static final String PASSWORD = "password";

    //Enstablish connection
    @Override
    public void init() {
        try {
            //connection = DriverManager.getConnection(CONNECTION);
            connection = DriverManager.getConnection(URL, USERNAME, PASSWORD);
            DEBUG = 1;

        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    //Get Method for index.html
    @Override
    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException {
        //Setup the page that will display the contents
        PrintWriter out;
        response.setContentType("text/html");
        out = response.getWriter();

        if (DEBUG > 0) {
            out.println("Connection to database was successful!");
        }

        //Compose the query
        String query = "SELECT * FROM movies;";

        //Start printing something on screen
        try (Statement stmt = connection.createStatement(); ResultSet result = stmt.executeQuery(query)) {
            //id | title | director | year | duration_minutes | genre
            out.println("Movie catalogue <br>id | title | director | year | duration_minutes | genre <br>");
            while (result.next()) {
                out.println(result.getString("id") + " " +
                    result.getString("title") + " " +
                    result.getString("directior") + " " +
                    result.getString("year") + " " +
                    result.getString("duration (mins)") + " " +
                    result.getString("genre"));
                
                out.println("<br>");
            }

        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

}