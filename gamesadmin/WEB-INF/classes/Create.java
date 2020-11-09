import java.io.IOException;  
import java.io.PrintWriter;  
import java.sql.*;  
  
import javax.servlet.RequestDispatcher;  
import javax.servlet.ServletException;  
import javax.servlet.http.HttpServlet;  
import javax.servlet.http.HttpServletRequest;  
import javax.servlet.http.HttpServletResponse;  
  
  
public class Create extends HttpServlet {  
    public void doPost(HttpServletRequest request, HttpServletResponse response)  
            throws ServletException, IOException {  
    
        response.setContentType("text/html");  
        PrintWriter out = response.getWriter();  
            
        String name = request.getParameter("name");  
        String img_src = request.getParameter("img_src");  
        String description = request.getParameter("description");  
        String specification = request.getParameter("specification");  
        Connection con = null;
        try {
            Class.forName("com.mysql.jdbc.Driver").newInstance();
            con = DriverManager.getConnection("jdbc:mysql://localhost:3306/gameshub","root", "");
            PreparedStatement ps=con.prepareStatement("insert into game values(?,?,?,?)");
            if (!con.isClosed()) {
                ps.setString(1,name);
                ps.setString(2,img_src);
                ps.setString(3,description);
                ps.setString(4,specification);
                int i=ps.executeUpdate();
                response.sendRedirect("./home.jsp");
            }    
        } catch(Exception e) {
            out.print("Exception: " + e.getMessage());
        } finally {
            try {
                if (con != null)
                    con.close();
            } catch(SQLException e) {}
        }
        out.close();  
    }  
}  