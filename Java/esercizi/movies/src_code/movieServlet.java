import java.io.*;
import java.sql.*;

import jakarta.servlet.*;
import jakarta.servlet.annotation.*;
import jakarta.servlet.http.*;

@WebServlet("/movieServlet")
public class movieServlet extends HttpServlet {
    //Toggle DEBUG mode: true / false
    private static final boolean DEBUG = true;

    //String to match servlet with database
    private static final String CONNECTION = "jdbc:mariadb://localhost:3306/myDatabase?user=user&password=password";

    Connection connection = null;
    PrintWriter out;
    Statement statement = null;

    @Override
    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
        //setup response to be html
        response.setContentType("text/html");
        //associate PrintWriter to HttpServletResponse
        out = response.getWriter();

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
    }
}
