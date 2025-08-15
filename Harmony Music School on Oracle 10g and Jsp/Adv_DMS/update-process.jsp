<%@ page import="java.sql.*" %>

<%

String Name=request.getParameter("sname");
String Password=request.getParameter("password");
String email=request.getParameter("email");
String Phone=request.getParameter("phone");
String Role=request.getParameter("wayuser");
    try{
      Class.forName("oracle.jdbc.driver.OracleDriver");
      Connection conn=DriverManager.getConnection("jdbc:oracle:thin:@localhost:1521/xe","system","tiger");
      PreparedStatement ps= conn.prepareStatement("UPDATE STUDENTLOGIN set Name=?,Password=?,Phone=?,Role=? where EMAIL ='"+email+"'");
      ps.setString(1,Name);
      ps.setString(2,Password);
      ps.setString(3,Phone);
      ps.setString(4,Role);
    int x=ps.executeUpdate();
    if(x!=0){
          out.print("UPDATED SUCCESFFULLY");
    }else{   
          out.print("something went wrong");
    }
      }catch (Exception e){  
          out.print(e);
    }
%>


<html>
	<title> Harmony Music School </title>
	<style>	
	.joinButton {
  display: inline-block;
  border-radius: 4px;
  background-color: #fb0000;
  border: none;
  color: #000000;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 35px;
}

.joinButton span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.joinButton span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.joinButton:hover span {
  padding-right: 25px;
}

.joinButton:hover span:after {
  opacity: 1;
  right: 0;
}
	  </style>
<form action="admin.php">  
		<button class="joinButton" style="vertical-align:middle"> <span>ADMIN PANEL </span></button>
	</form>	
</html>