// OPERAZIONI CRUD ( Create, Read, Update, Delete ): SERVLET
// ( COMPLETATO )
import java.io.*;
import java.sql.*;

import jakarta.servlet.*;
import jakarta.servlet.http.*;

public class movies extends HttpServlet{

    private static Connection DatabaseConnection;
    private static PrintWriter Writer;
    private static Statement Queries;
    private static ResultSet Result;
    
    private static void setup_Parameters_DB(HttpServletResponse response){

     String url = "jdbc:mysql://localhost:3306/exam";

      try {

        Class.forName("com.mysql.cj.jdbc.Driver");
        Writer = response.getWriter();
        DatabaseConnection = DriverManager.getConnection(url, "root", "");
        Queries = DatabaseConnection.createStatement();

      } catch (Exception e) {

        e.printStackTrace();
        Writer.println("<p>" + e.getMessage() + "</p>");

      }

    }

    private static int execute(String SQL){

      int Esito = 0;

      try {

        Esito = Queries.executeUpdate(SQL);

      } catch (Exception e) {
        e.printStackTrace();
        Writer.println("<p>" + e.getMessage() + "</p>");
      }

      return Esito;

    }

    private static ResultSet executeSelect(String SQL){

     ResultSet R = null;

      try {
        
        R = Queries.executeQuery(SQL);

      } catch (Exception e){
        e.printStackTrace();
        Writer.println("<p>" + e.getMessage() + "</p>");
      }

      return R;

    }

    @Override public void doGet(HttpServletRequest request, HttpServletResponse response)
     throws ServletException, IOException {

      response.setContentType("text/html;charset=UTF-8");
      setup_Parameters_DB(response);

      int ID = 0;
      String action = "";

      if (request.getParameter("id") != null && !request.getParameter("id").equals("")) ID = Integer.parseInt(request.getParameter("id"));
      if (request.getParameter("action") != null && !request.getParameter("action").equals("")) action = request.getParameter("action");

      switch (action){

        case "viewDatabase":  // READ

            Writer.println("<h1>View Movies</h1>");
            Writer.println("<form method='post' action='movies'>");
            Writer.println("<input type='submit' name='action' value='INSERT'>");
            Writer.println("</form><br>");

            String SQL = "SELECT * FROM movies";
            Result = executeSelect(SQL);

            try {

                Writer.println("<table border='1' cellpadding='6' cellspacing='0'>");
                Writer.println("<tr><th>id</th><th>title</th><th>director</th><th>year</th><th>duration_minutes</th><th>genre</th><th>action</th></tr>");

                while (Result.next()) {

                  Writer.println("<tr>");
                  Writer.println("<td> <a href='./movies?id="+Result.getInt("id")+"&action=UPDATE'>"+Result.getInt("id")+"</a> </td>");
                  Writer.println("<td>" + Result.getString("title") + "</td>");
                  Writer.println("<td>" + Result.getString("director") + "</td>");
                  Writer.println("<td>" + Result.getInt("year") + "</td>");
                  Writer.println("<td>" + Result.getInt("duration_minutes") + "</td>");
                  Writer.println("<td>" + Result.getString("genre") + "</td>");
                  Writer.println("<td>");
                  Writer.println("<form method='post' action='movies'>");
                  Writer.println("<input type='hidden' name='id' value='"+Result.getInt("id")+"'>");
                  Writer.println("<input type='submit' name='action' value='DELETE'>");
                  Writer.println("</form></td></tr>");

                }

                Writer.println("</table>");

            } catch (Exception e) {
             e.printStackTrace();
             Writer.println("<p>" + e.getMessage() + "</p>");
            } 
        break;

        case "UPDATE":

           Writer.println("<h1>UPDATE FILM</h1>");
           
           String sql = "SELECT * FROM movies WHERE id="+ID;
           Result = executeSelect(sql);
           
           try {

            Result.next();

            Writer.println("<form method='post' action='movies'>");
            Writer.println("<input type='hidden' name='id' value='"+Result.getInt("id")+"'>");
            Writer.println("<input type='text' name='title' value='"+Result.getString("title")+"' placeholder='title' required><br>");
            Writer.println("<input type='text' name='director' value='"+Result.getString("director")+"' placeholder='director' required><br>");
            Writer.println("<input type='number' name='year' value='"+Result.getString("year")+"' placeholder='year' required><br>");
            Writer.println("<input type='number' name='duration_minutes' value='"+Result.getString("duration_minutes")+"' placeholder='duration_minutes' required><br>");
            Writer.println("<input type='text' name='genre' value='"+Result.getString("genre")+"' placeholder='genre' required><br><br>");
            Writer.println("<input type='submit' name='action' value='CONFIRM'>");
            Writer.println("</form>");


           } catch (Exception e) {
            e.printStackTrace();
            Writer.println("<p>" + e.getMessage() + "</p>");
           }
        break;
      }

     }


    @Override public void doPost(HttpServletRequest request, HttpServletResponse response)
     throws ServletException, IOException {

      response.setContentType("text/html;charset=UTF-8");
      setup_Parameters_DB(response);

      int ID = 0;
      String action = "";

      if (request.getParameter("id") != null && !request.getParameter("id").equals("")) ID = Integer.parseInt(request.getParameter("id"));
      if (request.getParameter("action") != null && !request.getParameter("action").equals("")) action = request.getParameter("action");

      switch (action){

        case "INSERT":  // CREATE
            Writer.println("<h1> INSERT new Film</h1>");

            Writer.println("<form method='post' action='movies'>");
            Writer.println("<input type='text' name='title' placeholder='title' required><br>");
            Writer.println("<input type='text' name='director' placeholder='director' required><br>");
            Writer.println("<input type='number' name='year' placeholder='year' required><br>");
            Writer.println("<input type='number' name='duration_minutes' placeholder='duration_minutes' required><br>");
            Writer.println("<input type='text' name='genre' placeholder='genre' required><br><br>");
            Writer.println("<input type='submit' name='action' value='confirm'>");
            Writer.println("</form>");
        break;

        case "confirm":

          String t = request.getParameter("title");
          String d = request.getParameter("director");
          int y = Integer.parseInt(request.getParameter("year"));
          int d_m = Integer.parseInt(request.getParameter("duration_minutes"));
          String g = request.getParameter("genre");

          String query = "INSERT INTO movies (title,director,year,duration_minutes,genre) VALUES ('"+t+"','"+d+"','"+y+"','"+d_m+"','"+g+"')";
          int V = execute(query);

          if (V > 0){
            Writer.println("<h1>Inserimento Riuscito</h1>");
            Writer.println("<form method='get' action='movies'>");
            Writer.println("<input type='submit' name='action' value='viewDatabase'>");
            Writer.println("</form>");
          }
        break;

        case "CONFIRM": // UPDATE
          ID = Integer.parseInt(request.getParameter("id"));
          String title = request.getParameter("title");
          String director = request.getParameter("director");
          int year = Integer.parseInt(request.getParameter("year"));
          int duration_minutes = Integer.parseInt(request.getParameter("duration_minutes"));
          String genre = request.getParameter("genre");

          String sql = "UPDATE movies SET title='"+title+"',director='"+director+"',year='"+year+"',duration_minutes='"+duration_minutes+"',genre='"+genre+"' WHERE id="+ID;
          int value = execute(sql);

          if (value > 0){
            Writer.println("<h1>Modifica Riuscita</h1>");
            Writer.println("<form method='get' action='movies'>");
            Writer.println("<input type='submit' name='action' value='viewDatabase'>");
            Writer.println("</form>");
          }
        break;

        case "DELETE":  // DELETE
            ID = Integer.parseInt(request.getParameter("id"));

            String SQL = "DELETE FROM movies WHERE id="+ID;
            int esito = execute(SQL);

            if (esito > 0){
             Writer.println("<h1>Cancellazione Riuscita</h1>");
             Writer.println("<form method='get' action='movies'>");
             Writer.println("<input type='submit' name='action' value='viewDatabase'>");
             Writer.println("</form>");
            }
        break;

      }
    }
}