import java.io.*;
import java.sql.*;

import jakarta.servlet.*;
import jakarta.servlet.annotation.*;
import jakarta.servlet.http.*;

@WebServlet("/movieServlet")
public class movieServlet extends HttpServlet {
    //Toggle DEBUG mode: true / false
    private static final boolean DEBUG = false;

    //String to match servlet with database
    private static final String CONNECTION = "jdbc:mariadb://localhost:3306/myDatabase?user=user&password=password";

    Connection connection = null;
    PrintWriter out;
    Statement statement = null;
    ResultSet result = null;

    @Override
    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
        //implicit READ from CRUD
        //setup response to be html
        response.setContentType("text/html");
        //associate PrintWriter to HttpServletResponse
        out = response.getWriter();
        //setup the query string
        String query = " ";

        //Enstablish connection for the first time Servlet -> Database
        try {
            connection = DriverManager.getConnection(CONNECTION);
            if (DEBUG) {
                out.println("Connection to database successfully enstablished");
                out.println("<br>");
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }

        if (connection != null) {
            //Create item from connection
            try {
                query = "SELECT * FROM movies;";
                statement = connection.createStatement();
                result = statement.executeQuery(query);
                query = " ";

                //Print items from query to page
                while(result.next()) {
                    //| id | title | director | year | duration_minutes | genre |
                    out.println(result.getString("id") + " ");
                    out.println(result.getString("title") + " ");
                    out.println(result.getString("director") + " ");
                    out.println(result.getString("year") + " ");
                    out.println(result.getString("duration_minutes") + " ");
                    out.println(result.getString("genre") + " ");

                    //Update form
                    out.println("<form action = 'movieServlet' method = 'post'>");
                    out.println("<input type = 'hidden' name = 'id' value = '"+ result.getString("id") +"'>");
                    out.println("<input type = 'submit' name = 'action' value = 'update'>");
                    out.println("</form>");

                    //Delete form
                    out.println("<form action = 'movieServlet' method = 'post'>");
                    out.println("<input type = 'hidden' name = 'id' value = '"+ result.getString("id") +"'>");
                    out.println("<input type = 'submit' name = 'action' value = 'delete'>");
                    out.println("</form>");

                    out.println("<br>");
                }

            } catch (SQLException e) {
                e.printStackTrace();
            }
            //Create form (insert)
            out.println("<form action = 'movieServlet' method = 'post'>");
            out.println("<input type = 'submit' name = 'action' value = 'create'>");
            out.println("</form>");
        
        } else {
            out.println("Error while trying to enstablish connection<br>");
        }
    }

    public void doPost(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
        response.setContentType("text/html");
        out = response.getWriter();

        //fetching the action from the form
        String action = request.getParameter("action");
        String query = " ";

        if (action != null) {
            switch(action) {
                case "create":
                    if (DEBUG) {
                        out.println("action is create<br>");
                    }
                    //| id | title | director | year | duration_minutes | genre |
                    out.println("<form action = 'movieServlet' method = 'post'>");
                    out.println("<input type = 'text' name = 'title' placeholder = 'title' required>");
                    out.println("<input type = 'text' name = 'director' placeholder = 'director' required>");
                    out.println("<input type = 'text' name = 'year' placeholder = 'year' required>");
                    out.println("<input type = 'text' name = 'duration_minutes' placeholder = 'duration_minutes' required>");
                    out.println("<input type = 'text' name = 'genre' placeholder = 'genre' required>");
                    out.println("<input type = 'submit' name = 'action' value = 'confirmCreate'>");
                    out.println("</form>");
                    out.println("<br>");
                    

                    out.println("<a href = /movies/movieServlet>Torna alla homepage</a>");
                    break;
                
                case "confirmCreate":
                    if (DEBUG) {
                        out.println("We're in the confirmCreate<br>");
                    }
                    String createTitle = request.getParameter("title");
                    String createDirector = request.getParameter("director");
                    int createYear = Integer.parseInt(request.getParameter("year"));
                    int createDuration = Integer.parseInt(request.getParameter("duration_minutes"));
                    String createGenre = request.getParameter("genre");

                    try {
                        query = "INSERT INTO movies (title,director,year,duration_minutes,genre) VALUES ('" 
                        + createTitle +"','"+ createDirector +"','"+ createYear +"','"+ createDuration +"','"+ createGenre +"')";
                        statement = connection.createStatement();
                        ResultSet result = statement.executeQuery(query);
                        query = " ";

                        out.println("New item added successfully!<br>");
                        out.println("<a href = /movies/movieServlet>Torna alla homepage</a>");

                    } catch (SQLException e) {
                        e.printStackTrace();
                    }
                    break;

                case "delete":
                    if (DEBUG) {
                        out.println("We're in the delete<br>");
                    }
                    int toDeleteId = Integer.parseInt(request.getParameter("id"));
                    try {
                        query = "DELETE FROM movies WHERE id = '"+ toDeleteId +"'";
                        statement = connection.createStatement();
                        ResultSet result = statement.executeQuery(query);
                        query = " ";

                        out.println("Item with id "+ toDeleteId +" deleted successfully!<br>");
                        out.println("<a href = /movies/movieServlet>Torna alla homepage</a>");

                    } catch (SQLException e) {
                        e.printStackTrace();
                    }

                    break;
                
                case "update":
                    if (DEBUG) {
                        out.println("We're in the update<br>");
                    }
                    out.println("<form action = 'movieServlet' method = 'post'>");
                    out.println("<input type = 'hidden' name = 'id' value = '"+ Integer.parseInt(request.getParameter("id")) +"'>");
                    out.println("<input type = 'text' name = 'title' placeholder = 'title' required>");
                    out.println("<input type = 'text' name = 'director' placeholder = 'director' required>");
                    out.println("<input type = 'text' name = 'year' placeholder = 'year' required>");
                    out.println("<input type = 'text' name = 'duration_minutes' placeholder = 'duration_minutes' required>");
                    out.println("<input type = 'text' name = 'genre' placeholder = 'genre' required>");
                    out.println("<input type = 'submit' name = 'action' value = 'confirmUpdate'>");
                    out.println("</form>");
                    out.println("<br>");

                    out.println("<a href = /movies/movieServlet>Torna alla homepage</a>");
                    break;

                case "confirmUpdate":
                    if(DEBUG) {
                        out.println("we're in the confirmUpdate<br>");
                    }
                    int toUpdateId = Integer.parseInt(request.getParameter("id"));
                    String updateTitle = request.getParameter("title");
                    String updateDirector = request.getParameter("director");
                    int updateYear = Integer.parseInt(request.getParameter("year"));
                    int updateDuration = Integer.parseInt(request.getParameter("duration_minutes"));
                    String updateGenre = request.getParameter("genre");

                    try {
                        //| id | title | director | year | duration_minutes | genre |
                        query = "UPDATE movies SET title='"+ updateTitle
                        +"',director='"+ updateDirector
                        +"',year='"+ updateYear
                        +"',duration_minutes='"+ updateDuration
                        +"',genre='"+ updateGenre
                        +"' WHERE id='"+ toUpdateId +"';";
                        statement = connection.createStatement();
                        ResultSet result = statement.executeQuery(query);
                        query = " ";

                        out.println("Item with id "+ toUpdateId +" updated successfully!<br>");
                        out.println("<a href = /movies/movieServlet>Torna alla homepage</a>");

                    } catch (SQLException e) {
                        e.printStackTrace();
                    }
                    break;

                default:
                    out.println("Received action is not recognized. Action: " + action + ";<br>");
                    break;
            }

        } else {
            out.println("Received action is null");
        }

    }
}
