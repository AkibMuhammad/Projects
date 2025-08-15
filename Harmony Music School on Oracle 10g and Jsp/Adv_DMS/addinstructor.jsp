
<%@ page import="java.sql.*" %>

<%

String Name=request.getParameter("snamee");
String Password=request.getParameter("passwords");
String CPassword=request.getParameter("cpasswords");
String Email=request.getParameter("emails");
String Phone=request.getParameter("phones");
String Gender=request.getParameter("genders");
String Role=request.getParameter("rstudent");
if(Password.equals(CPassword)) {
	try{
	Class.forName("oracle.jdbc.driver.OracleDriver");
	Connection conn=DriverManager.getConnection("jdbc:oracle:thin:@localhost:1521/xe","system","tiger");
	PreparedStatement ps=conn.prepareStatement("INSERT into STUDENTLOGIN values(?,?,?,?,?,?)");
	ps.setString(1,Name);
	ps.setString(2,Password);
	ps.setString(3,Email);
	ps.setString(4,Phone);
	ps.setString(5,Gender);
	ps.setString(6,Role);
	int x=ps.executeUpdate();
	if(x!=0){
        out.print("ADDED INSTRUCTOR SUCCESFFULLY");
	}else{   
        out.print("something went wrong");
	}
    }catch (Exception e){  
        out.print(e);
	}
}else{
    out.print("password not matching");
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

		<button class="joinButton" style="vertical-align:middle"> <span>GO TO ADMIN </span></button>
	</form>	
</html>