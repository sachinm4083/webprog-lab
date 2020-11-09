<%@ page import="java.sql.*"%>  
<%  
    String s=request.getParameter("val");  
    if(s==null || s.trim().equals("")){  
        out.print("Please enter Game Name");  
    }
    else{  
        try{  
            Class.forName("com.mysql.jdbc.Driver");  
            Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/gameshub","root", "");  
            PreparedStatement ps=con.prepareStatement("select * from game where name=?");  
            ps.setString(1,s);  
            ResultSet rs=ps.executeQuery();  
            int f = 0;
            while(rs.next()){
                f=1;
                String result ="Name : "+ rs.getString(1) + "<br>Description : " + rs.getString(3) + "<br>Specifications : " + rs.getString(4) ;
                out.print(result);  
            }
            if(f==0){
                out.print("Game doesn't exist");
            }  
            con.close();  
        }
        catch(Exception e){e.printStackTrace();}  
    }  
%> 