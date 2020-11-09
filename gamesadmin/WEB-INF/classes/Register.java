import java.io.IOException;  
import java.io.PrintWriter;  
import java.sql.*;  
  
import javax.servlet.RequestDispatcher;  
import javax.servlet.ServletException;  
import javax.servlet.http.HttpServlet;  
import javax.servlet.http.HttpServletRequest;  
import javax.servlet.http.HttpServletResponse;  
  
  
public class Register extends HttpServlet {  
    public void doPost(HttpServletRequest request, HttpServletResponse response)  
            throws ServletException, IOException {  
    
        response.setContentType("text/html");  
        PrintWriter out = response.getWriter();  
            
        String n=request.getParameter("username");  
        String p=request.getParameter("userpass");  
        Connection con = null;
        try {
            Class.forName("com.mysql.jdbc.Driver").newInstance();
            con = DriverManager.getConnection("jdbc:mysql://localhost:3306/gameshub","root", "");
            PreparedStatement ps=con.prepareStatement("insert into admin values(?,?)");
            if (!con.isClosed()) {
                ps.setString(1,n);
                ps.setString(2,p);
                int i=ps.executeUpdate();
                response.sendRedirect("./");
                
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