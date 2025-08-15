<%@ page import="java.sql.*" %>

<html>
    <head>
        <title>
            Harmony Music School
        </title>
        
    </head>
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


    .joinButton2 {
      display: inline-block;
      border-radius: 4px;
      background-color: #00c3f9;
      border: none;
      color: #000000;
      text-align: center;
      font-size: 28px;
      padding: 20px;
      width: 300px;
      transition: all 0.5s;
      cursor: pointer;
      margin: 35px;
    }
    
    .joinButton2 span {
      cursor: pointer;
      display: inline-block;
      position: relative;
      transition: 0.5s;
    }
    
    .joinButton2 span:after {
      content: '\00bb';
      position: absolute;
      opacity: 0;
      top: 0;
      right: -20px;
      transition: 0.5s;
    }
    
    .joinButton2:hover span {
      padding-right: 25px;
    }
    
    .joinButton2:hover span:after {
      opacity: 1;
      right: 0;
    }

          </style>
    <body>


<%
try{
	Class.forName("oracle.jdbc.driver.OracleDriver");
	Connection conn=DriverManager.getConnection("jdbc:oracle:thin:@localhost:1521/xe","system","tiger");
    Statement st=conn.createStatement();
    ResultSet rs= st.executeQuery("select * from viewdeptinstructor  " );

    while(rs.next())
    {
%>  
<table class="table"  width="100" style="width:100%">

    <tr align="center" class="success">
        <th width="15%">Name</th>
        <th width="15%">Email</th>
        <th width="15%">Role</th>
        <th width="15%">Department No</th>
        
    </tr>   
    <tr align="center" class="info">
        <td width="15%"><%=rs.getString(1) %></td>
        <td width="15%"><%=rs.getString(2) %></td>
        <td width="15%"><%=rs.getString(3) %></td>
        <td width="15%"><%=rs.getString(4) %></td>
    </tr>
</table> 
<%
}

}
catch(Exception e)
{
    out.print(e);
}   
%>  

<form action="admin.php">
  
    
      <button class="joinButton" style="vertical-align:middle"> <span>Go BACK </span></button> 
  

  </form>
  
</table>
</body>  
</html>