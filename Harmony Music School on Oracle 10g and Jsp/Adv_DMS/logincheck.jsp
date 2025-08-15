
<%@ page import="java.sql.*" %>

<%
String Email=request.getParameter("email");
String Password=request.getParameter("password");

try{
	Class.forName("oracle.jdbc.driver.OracleDriver");
	Connection conn=DriverManager.getConnection("jdbc:oracle:thin:@localhost:1521/xe","system","tiger");
    Statement st=conn.createStatement();
    ResultSet rs= st.executeQuery("select * from STUDENTLOGIN where email='"+Email+"' and password='"+Password+"'");

	if(rs.next()){
        session.setAttribute("Email",Email);
        response.sendRedirect("success.jsp");
	}else{   
        response.sendRedirect("error.jsp");
	}
    }catch (Exception e){  
        out.print(e);
	}

     
%>
