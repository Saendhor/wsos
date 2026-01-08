import java.io.*;
import java.sql.*;

import jakarta.servlet.*;
import jakarta.servlet.annotation.*;
import jakarta.servlet.http.*;

@WebServlet("/MovieListServlet")
public class MovieListServlet extends HttpServlet {
    private static final boolean DEBUG = true;
    private static final String CONNECTION = "jdbc:mariadb://localhost:3306/myDatabase?user=user&password=password";

    private Connection connection = null;
    private PrintWriter out = null;
    private String query = " ";

    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
        response.setContentType("text/html");
        out = response.getWriter();

        //Enstablish connection
        try {
            connection = DriverManager.getConnection(CONNECTION);
            if (DEBUG) {
                out.println("Connection successfully enstablished");
                out.println("<br>");
            }
        } catch(SQLException e) {
            e.printStackTrace();
        }

        //perform READ request
        if(connection != null) {
            try {
                query = "SELECT * FROM movies;";
                Statement statement = connection.createStatement();
                ResultSet result = statement.executeQuery(query);
                query = " ";

                out.println("| id | title | director | year | duration_minutes | genre |");
                out.println("<br>");
                while(result.next()) {
                    //print database
                    //| id | title | director | year | duration_minutes | genre |
                    out.println(result.getString("id") + " ");
                    out.println(result.getString("title") + " ");
                    out.println(result.getString("director") + " ");
                    out.println(result.getString("year") + " ");
                    out.println(result.getString("duration_minutes") + " ");
                    out.println(result.getString("genre") + " ");

                    //update form
                    out.println("<form action = 'MovieListServlet' method = 'post'>");
                    out.println("<input type = 'hidden' name = 'id' value = '"+ result.getString("id")+"'>");
                    out.println("<input type = 'submit' name = 'action' value = 'update'>");
                    out.println("</form>");

                    //delete form
                    out.println("<form action = 'MovieListServlet' method = 'post'>");
                    out.println("<input type = 'hidden' name = 'id' value = '"+ result.getString("id")+"'>");
                    out.println("<input type = 'submit' name = 'action' value = 'delete'>");
                    out.println("</form>");

                    out.println("<br>");
                }
                //create form
                out.println("<form action = 'MovieListServlet' method = 'post'>");
                out.println("<input type = 'submit' name = 'action' value = 'create'>");
                out.println("</form>");

            } catch (SQLException e) {
                e.printStackTrace();
            }

        } else {
            out.println("Connection not found. Please retry");
            out.println("<br>");
        }

    }


    public void doPost(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
        response.setContentType("text/html");
        out = response.getWriter();
        String action = request.getParameter("action");

        if(action != null) {
            switch(action) {
                case "create":
                    if(DEBUG) {
                        out.println("create action");
                        out.println("<br>");
                    }
                    //insert form -> confirmCreate
                    //| id | title | director | year | duration_minutes | genre |
                    out.println("<form action = 'MovieListServlet' method = 'post'>");
                    out.println("<input type = 'text' name = 'title' placeholder = 'title' required>");
                    out.println("<input type = 'text' name = 'director' placeholder = 'director' required>");
                    out.println("<input type = 'text' name = 'year' placeholder = 'year' required>");
                    out.println("<input type = 'text' name = 'duration_minutes' placeholder = 'duration_minutes' required>");
                    out.println("<input type = 'text' name = 'genre' placeholder = 'genre' required>");
                    out.println("<input type = 'submit' name = 'action' value = 'confirmCreate'>");
                    out.println("</form>");
                    break;

                case "confirmCreate":
                    if(DEBUG) {
                        out.println("confirmCreate action");
                        out.println("<br>");
                    }
                    String ctitle = request.getParameter("title");
                    String cdirector = request.getParameter("director");
                    int cyear = Integer.parseInt(request.getParameter("year"));
                    int cduration_minutes = Integer.parseInt(request.getParameter("duration_minutes"));
                    String cgenre = request.getParameter("genre");

                    try {
                        query = "INSERT INTO movies (title,director,year,duration_minutes,genre)"
                        + " VALUES ('"+ ctitle +"','"+ cdirector +"','"+ cyear +"','"+ cduration_minutes +"','"+ cgenre +"');";
                        Statement statement = connection.createStatement();
                        ResultSet result = statement.executeQuery(query);
                        query = " ";

                        out.println("Item successfully added to database!");
                        out.println("<br>");

                    } catch(SQLException e) {
                        e.printStackTrace();
                    }
                    break;

                case "update":
                    if(DEBUG) {
                        out.println("update action");
                        out.println("<br>");
                    }
                    out.println("<form action = 'MovieListServlet' method = 'post'>");
                    out.println("<input type = 'hidden' name = 'id' value = '"+ Integer.parseInt(request.getParameter("id")) +"'>");
                    out.println("<input type = 'text' name = 'title' placeholder = 'title' required>");
                    out.println("<input type = 'text' name = 'director' placeholder = 'director' required>");
                    out.println("<input type = 'text' name = 'year' placeholder = 'year' required>");
                    out.println("<input type = 'text' name = 'duration_minutes' placeholder = 'duration_minutes' required>");
                    out.println("<input type = 'text' name = 'genre' placeholder = 'genre' required>");
                    out.println("<input type = 'submit' name = 'action' value = 'confirmUpdate'>");
                    out.println("</form>");
                    break;
                
                case "confirmUpdate":
                    if(DEBUG) {
                        out.println("confirmUpdate action");
                        out.println("<br>");
                    }
                    //| id | title | director | year | duration_minutes | genre |
                    int uid = Integer.parseInt(request.getParameter("id"));
                    String utitle = request.getParameter("title");
                    String udirector = request.getParameter("director");
                    int uyear = Integer.parseInt(request.getParameter("year"));
                    int uduration_minutes = Integer.parseInt(request.getParameter("duration_minutes"));
                    String ugenre = request.getParameter("genre");

                    try {
                        query = "UPDATE SET title='"+ utitle
                        +"',director='"+ udirector
                        +"',year='"+ uyear
                        +"',duration_minutes='"+ uduration_minutes
                        +"',genre='"+ ugenre
                        +"' WHERE id='"+ uid +"';";

                        Statement statement = connection.createStatement();
                        ResultSet result = statement.executeQuery(query);
                        query = " ";

                        out.println("Item successfully updated!");
                        out.println("<br>");

                    } catch(SQLException e) {
                        e.printStackTrace();
                    }

                    break;

                case "delete":
                    if(DEBUG) {
                        out.println("delete action");
                        out.println("<br>");
                    }
                    try {
                        query = "DELETE FROM movies WHERE ID='"+ request.getParameter("id") +"';";
                        Statement statement = connection.createStatement();
                        ResultSet result = statement.executeQuery(query);
                        query = " ";

                        out.println("Item successfully deleted!");
                        out.println("<br>");

                    } catch(SQLException e) {
                        e.printStackTrace();
                    }
                    break;
                
                default:
                    out.println("Unrecognized action (" + action + ")");
                    out.println("<br>");
                    break;

            }
            out.println("<br>");
            out.println("<a href = MovieListServlet>Back to homepage</a>");

        } else {
            out.println("Error while getting the action");
            out.println("<br>");
        }

    }
    
}
