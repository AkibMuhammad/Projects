<%@ page import="java.sql.*" %>

		<%@page import="java.sql.ResultSet"%>
		<%@page import="java.sql.Statement"%>
		<%@page import="java.sql.Connection"%>
		<%
					
		%>
		<!DOCTYPE html>
		<html>
		<body>
          <style> 
           .Hii {
                color: red;
            }
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
		<h1 class="Hii">SEARCH list</h1>
		<table width="100%" style="width:100">
		<tr>
		<th width="20%">NAME</th>
		<th width="20%">EMAIL</th>
		<th width="20%">PHONE</th>
		<th width="20%">ROLE</th>

		</tr>

		<%
		String sname=request.getParameter("sname");
		try{
			Class.forName("oracle.jdbc.driver.OracleDriver");
	        Connection conn=DriverManager.getConnection("jdbc:oracle:thin:@localhost:1521/xe","system","tiger");
            Statement st=conn.createStatement();
			String sql ="select * from table(get_all_studentsearch_objects('"+sname+"'))";

		    ResultSet rs = st.executeQuery(sql);
		while(rs.next()){
		%>
		<tr align="center">
		<td><%=rs.getString("NAME") %></td>
		<td><%=rs.getString("EMAIL") %></td>
		<td><%=rs.getString("PHONE") %></td>
		<td><%=rs.getString("ROLE") %></td>
		</tr>
		<%
		}
		
		} catch (Exception e) {
		e.printStackTrace();
		}
		%>
		</table>
		<form action="admin.php">
  
    
      <button class="joinButton" style="vertical-align:middle"> <span>Go BACK </span></button> 
    
    

  </form>
		</body>
		</html>		