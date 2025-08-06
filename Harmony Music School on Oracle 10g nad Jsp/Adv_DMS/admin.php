


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

 .joinButton {
  display: inline-block;
  border-radius: 4px;
  background-color: black;
  border: none;
  color: white;
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
  background-color: blue;
  border: none;
  color: white;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 270px;
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


 .joinButton3 {
  display: inline-block;
  border-radius: 4px;
  background-color: red;
  border: none;
  color: black;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 270px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 35px;
}

.joinButton3 span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.joinButton3 span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.joinButton3:hover span {
  padding-right: 25px;
}

.joinButton3:hover span:after {
  opacity: 1;
  right: 0;
}
.joinButton4 {
  display: inline-block;
  border-radius: 4px;
  background-color: red;
  border: none;
  color: black;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 35px;
}

.joinButton4 span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.joinButton4 span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.joinButton4:hover span {
  padding-right: 25px;
}

.joinButton4:hover span:after {
  opacity: 1;
  right: 0;
}

table, th, td {
  border:1px;
}

	
	</style>
    <div class="main">
        <div class="h2">
        <h2>Welcome ADMIN</h2>

</div>
<table style="width:100%">

    <tr>   
     
          <form action="allstudent.php">  
          <button class="joinButton" style="vertical-align:middle"> <span>STUDENT</span></button>
          </form>
    </tr>
    <tr> 
          <form action="allinstructor.php">  
          <button class="joinButton2" style="vertical-align:middle"> <span>INSTRUCTOR </span></button>
          </form>
      
    </tr>

    <tc> 
        <form action="allsearch.php">  
        <button class="joinButton4" style="vertical-align:middle"> <span>SEARCH </span></button>    
        </form>
  </tc>
   

</table>

<!--
    <form action="viewinstructor.jsp">  

    <button class="joinButton2" style="vertical-align:middle"> <span>View INSTRUCTOR </span></button>

    </form>	
-->
</div>
	
</body>
</html>