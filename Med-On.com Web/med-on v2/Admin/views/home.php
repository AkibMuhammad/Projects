<!DOCTYPE html>
<html lang="en">

<head>
    <title>Med-On</title>           
</head>

<body>
        <table border="0">
            <tr height="200px">
                <td width="90px" align="left"> <img src="images/Msymbol1.jpeg"width="300px"height="150px" alt=""> </td>
                <td width="1050px" align="right">
                    <h2><a href="home.php">Home </a></h2> <br>
                    <a href="about_us.php"> About </a><br>
                    <a href="emergency.php">Emergency</a><br> 
                    <a href="login.php">Login/Sign Up</a>
                </td>
            </tr>
            <tr height="500px">
                <td colspan="2" align="center">
                    <center>
                    
                    	<h2>Be Healthy, Be Happy!!</h2>
                        <div id="demo">
                        <button type="button" onclick="loadDoc()"><b> Show More </b></button>

                    </center><br>
                    <img src="images/M2.jpg" width="800px" height="400px" alt="">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    Copyright &copy; @Med-On
                </td>
            </tr>
        </table>
        <script>
            function loadDoc(){
            	let xhttp = new XMLHttpRequest();
            	xhttp.onreadystatechange = function()
            	{
            		if(this.readyState = 4 && this.status == 200) {
            			document.getElementById("demo").innerHTML = this.responseText;
                        ML = this.responseText;

            	}
            };

            xhttp.open("GET","../Model/show more.txt", true);
            xhttp.send();
            }

        </script>

</body>

</html>