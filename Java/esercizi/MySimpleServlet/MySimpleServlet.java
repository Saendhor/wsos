import jakarta.servlet.*;
import jakarta.servlet.http.*;
import java.io.*;

public class MySimpleServlet extends HttpServlet {
    public void doGet(HttpServletRequest request, HttpServletRequest response) throws ServletException, IOException {
        //select the content type to respond
        response.setContentType("text/html");

        //create and send a text to client
        PrintWriter out = response.getWriter();
        
        out.println("Output della MySimpleServlet");
        out.close();

    }
}