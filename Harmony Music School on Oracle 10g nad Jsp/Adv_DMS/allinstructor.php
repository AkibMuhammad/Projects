<html>
<title>
	Harmony Music School
	</title>
<body>
	
	<style type="text/css">	
	*{
		margin:0;
		padding:0;


	}
	.main{
		width:100%;
		background-image: linear-gradient(to top, rgba(0,0,0,0.5)50%,rgba(0,0,0,0.5)50%), url(ie.jpg);
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: 100% 100%;
		backgroud-position: center;
		
		height:109vh;
	}
    .h2{
		font-family : sans-sherif;
		font-weight: bolder;
		color: yellow;
		font-size: 22px;
		padding-top: 30px;
        padding-left: 25px;
    }

    .joinButton {
  display: inline-block;
  border-radius: 4px;
  background-color: black;
  border: none;
  color: white;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 230px;
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

 .joinButton {
  display: inline-block;
  border-radius: 4px;
  background-color: black;
  border: none;
  color: white;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 250px;
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
  background-color: blue;
  border: none;
  color: white;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 250px;
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

table, th, td {
  border:1px;
}

	
	</style>
    <div class="main">
        <div class="h2">
        <h2>Welcome to INSTRUCTOR PANEL</h2>

</div>
<table style="width:100%">
<td>
  <form action="viewinstructor.jsp">  
<button class="joinButton2" style="vertical-align:middle"> <span>LIST(I) </span></button>   
</form>
</td>
<td>
<form action="addinstructor.php">  

<button class="joinButton2" style="vertical-align:middle"> <span>ADD(I) </span></button>
    
</form>
</td>
<td>
  <form action="updateinstructor.php">  

<button class="joinButton2" style="vertical-align:middle"> <span>UPDATE(I) </span></button>
    
</form>
</td>
<td>
    <form action="deleteinstructor.php">  

<button class="joinButton2" style="vertical-align:middle"> <span>DELETE(I) </span></button>
    
</form>
</td>	
</tr>
</table>

<!--
    <form action="viewinstructor.jsp">  

    <button class="joinButton2" style="vertical-align:middle"> <span>View INSTRUCTOR </span></button>

    </form>	
-->
</div>
	
</body>
</html>