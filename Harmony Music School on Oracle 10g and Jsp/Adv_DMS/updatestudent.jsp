<!DOCTYPE html>

<%@ page import="java.sql.DriverManager" %>
<%@ page import="java.sql.ResultSet" %>
<%@ page import="java.sql.Statement" %>
<%@ page import="java.sql.Connection" %>
<%
	String email = request.getParameter("email");

try{
	Class.forName("oracle.jdbc.driver.OracleDriver");
    Connection conn= DriverManager.getConnection("jdbc:oracle:thin:@localhost:1521/XE","system","tiger");
    Statement statement=conn.createStatement();
    String sql ="select * from table(login_list_type('"+email+"'))";
    ResultSet rs = statement.executeQuery(sql);
while(rs.next()){
%>

<html>
	<title> Harmony Music School </title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="login.css">
	
	
	
<body>
	<div class="main">
		<div class="navbar">
			<div class="icon">
				<h2 class="logo">Welcome to <br/>Harmony Music School </h2>
				
			</div>
			
			<div class="menu">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="">Contact</a></li>
					<li><a href="">About</a></li>
					<li><a href="">Services</a></li>
				</ul>
			</div>		
		</div>
		<div class="login">
			<h2>UPDATE HERE</h2>
			
			
		
				<form action="update-process.jsp" method="POST" autocomplete="off"   >

					
		<table>
			<tr>
				<td>Name</td>
				<td> :</td>
				<td>
					<input type="text" name="sname" value=" <%=rs.getString("name") %>">
				<br/><span id="snamee"></span>
				</td>
			<tr>
				<td>Password</td>
				<td>:</td>
				<td>
					<input type="text" name="password" value=" <%=rs.getString("password")%> ">
				<br/><span id="passwordd"></span>
				</td>
			</tr>
			<tr>
				<td>Phone Number</td>
				<td>:</td>
				<td>
					<input type="text" name="phone" value=" <%=rs.getString("phone")%> ">
				<br/><span id="phonee"></span>
				</td>
			</tr>
			<tr>
				<td>What Are You?</td>
				<td>:</td>
				<td>
				<select class='regway' id='selection' name='wayuser'  >
					 <option value='select'>Select One</option>
					<option>Instructor</option>
					<option>Student</option>
				<br/><span id="selectionn"></span>
				</td>
		</tr>
				<tr>
					<td><input class="btn" type="submit" value="UPDATE" name="btnClick" id="sub" ></td> 
				</tr>			
			</table>

		</form>
	
		</div>
	</div>

<%
	}

	} catch (Exception e) {
		e.printStackTrace();
	}
%>
</body>
</html>