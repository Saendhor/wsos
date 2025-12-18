import java.io.*;
import java.sql.*;

import java.util.Enumeration;

import jakarta.servlet.*;
import jakarta.servlet.annotation.*;
import jakarta.servlet.http.*;

@WebServlet(urlPatterns = "/MovieCatalogue")
public class MovieCatalogue extends HttpServlet {
    //Class constant
    public static final boolean DEBUG = false;
    //myDatabase is my database in use
    //change that to your used database
    //user = <myusername>
    //password = <mypassword>
    private static final String CONNECTION = 
    "jdbc:mariadb://localhost:3306/myDatabase?user=user&password=password";

    //Class attributes
    private static Connection connection;
    private static PrintWriter out;
    //private static Statement stmt;
    //private static ResultSet result;

    //Attempt connection to database
    //if fails it prints the stack trace, hence the SQLException e
    @Override
    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
        response.setContentType("text/html");
        out = response.getWriter();

        //Enstablish connection
        try {
            //out.println("Testiamo se il try è una brava persona <br>");
            if (DEBUG) {
                out.println("DEBUG MODE PRINT<br>");
                //Retrieving the list of all the Drivers
                Enumeration<Driver> enumList = DriverManager.getDrivers();
                //Printing the list
                while(enumList.hasMoreElements()) {
                    out.println(enumList.nextElement().getClass());
                }
            }
            connection = DriverManager.getConnection(CONNECTION);
        } catch(SQLException e) {
            e.printStackTrace();
        }

        //Perform query on database
        //current table: moviesjdbc:mysql://localhost:3306/mydatabase.
        String query = "SELECT * FROM movies;";

        //we make sure the connection is enstablished
        if (connection != null) {
            try {
                //
                Statement stmt = connection.createStatement();
                ResultSet result = stmt.executeQuery(query);
                query = " ";

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
                    //Update
                    out.println("""
                        <form action = 'MovieCatalogue' method = 'post'>""" +
                        "<input type = 'hidden' name = 'id' value = '" + result.getString("id") + "'>" +
                        "<input type = 'submit' name = 'action' value = 'update'> </form>");

                    out.println("""
                        <form action = 'MovieCatalogue' method = 'post'>""" +
                        "<input type = 'hidden' name = 'id' value = '" + result.getString("id") + "'>" +
                        "<input type = 'submit' name = 'action' value = 'delete'> </form>");

                    out.println("<br>");
                }

                //add Create form
                out.println("""
                    <form action = 'MovieCatalogue' method = 'post'>
                    <input type = 'submit' name = 'action' value = 'create'>
                    </form>
                """);

            } catch (SQLException e) {
                e.printStackTrace();
            }
        } else {
            out.println("Connection failed");
            out.println("<br>");
        }
    }


    @Override
    public void doPost(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
        response.setContentType("text/html");
        out = response.getWriter();

        String action = request.getParameter("action");
        String query = " ";

        //Check if the action is not null
        if (action != null) {
            switch(action) {
                case "create":
                    //| id | title | director | year | duration_minutes | genre |
                    out.println("""
                        <form action = 'MovieCatalogue' method = 'post'>
                        <input type = 'text' name = 'title' placeholder = 'title' required> <br>
                        <input type = 'text' name = 'director' placeholder = 'director' required> <br>
                        <input type = 'text' name = 'year' placeholder = 'year' required> <br>
                        <input type = 'text' name = 'duration_minutes' placeholder = 'duration(min)' required> <br>
                        <input type = 'text' name = 'genre' placeholder = 'genre' required> <br>
                        <input type = 'submit' name = 'action' value = 'confirmCreate'>
                        </form>
                    """);
                    break;
                
                case "confirmCreate":
                    String title = request.getParameter("title");
                    String director = request.getParameter("director");
                    int year = Integer.parseInt(request.getParameter("year"));
                    int duration = Integer.parseInt(request.getParameter("duration_minutes"));
                    String genre = request.getParameter("genre");

                    query = "INSERT INTO movies (title, director, year, duration_minutes, genre)"
                    + "VALUES ('" + title + "','"+ director +"','"+ year +"','"+ duration +"','"+ genre +"');";

                    try {
                        Statement stmt = connection.createStatement();
                        ResultSet result = stmt.executeQuery(query);
                        query = " ";
                        
                        out.println("New item added successfully!");
                        out.println("<br>");
                        out.println("<a href=/MovieCatalogue>Torna alla homepage</a>");

                    } catch (SQLException e) {
                        e.printStackTrace();
                    }

                    break;
                
                case "update":
                    int receivedId = Integer.parseInt(request.getParameter("id"));
                    out.println("Item to be updated: " + receivedId + " <br>");
                    out.println("<form action = 'MovieCatalogue' method = 'post'>");
                    out.println("<input type = 'hidden' name = 'id' value = '"+ receivedId +"'>");
                    out.println("<input type = 'text' name = 'title' placeholder = 'title' required>");
                    out.println("<input type = 'text' name = 'director' placeholder = 'director' required>");
                    out.println("<input type = 'text' name = 'year' placeholder = 'year' required>");
                    out.println("<input type = 'text' name = 'duration_minutes' placeholder = 'duration' required>");
                    out.println("<input type = 'text' name = 'genre' placeholder = 'genre' required>");
                    out.println("<input type = 'submit' name = 'action' value = 'confirmUpdate'>");
                    out.println("</form>");
                    break;
                
                case "confirmUpdate":
                    int uid = Integer.parseInt(request.getParameter("id"));
                    String utitle = request.getParameter("title");
                    String udirector = request.getParameter("director");
                    int uyear = Integer.parseInt(request.getParameter("year"));
                    int uduration = Integer.parseInt(request.getParameter("duration_minutes"));
                    String ugenre = request.getParameter("genre");

                    out.println("Updating item with id = " + uid + " with parameters <br>");
                    out.println(utitle + ", " + udirector + ", " + uyear + ", " + uduration + ", " + ugenre + "<br>");

                    //"UPDATE movies SET title='"+title+"',director='"+director+"',year='"+year+"',duration_minutes='"+duration_minutes+"',genre='"+genre+"' WHERE id="+ID;
                    query = "UPDATE movies SET title='"+ utitle +"'"
                    + ",director='"+ udirector +"'"
                    + ",year='"+ uyear +"'"
                    + ",duration_minutes='"+ uduration +"'"
                    + ",genre='"+ ugenre +"'"
                    + "WHERE id ='" + uid + "';";

                    try {
                        Statement stmt = connection.createStatement();
                        ResultSet result = stmt.executeQuery(query);
                        query = " ";

                        out.println("Item with id " + uid + " has been updated successfully");

                        out.println("<a href = /MovieCatalogue> Torna alla homepage</a>");
                    } catch (SQLException e) {
                        e.printStackTrace();
                    }

                    break;

                case "delete":
                    int toDeleteId = Integer.parseInt(request.getParameter("id"));
                    out.println("Item to be deleted: " + toDeleteId + " <br>");

                    query = "DELETE FROM movies WHERE id = '" + toDeleteId + "';";

                    try {
                        Statement stmt = connection.createStatement();
                        ResultSet result = stmt.executeQuery(query);
                        query = " ";

                        out.println("Item deleted <br>");
                        out.println("<a href = /MovieCatalogue>Torna alla homepage</a>");

                    } catch (SQLException e) {
                        e.printStackTrace();
                    }
                    break;
                
                default:
                    out.println("Action not recognized");
                    out.println("<br>");
            }

        } else {
            out.println("Submitted action is null");
            out.println("<br>");
        }
    }

}