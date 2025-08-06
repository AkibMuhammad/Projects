<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        /*#d1 {
            position: relative;
            width: 100px;
            height: 100px;
        }*/
    </style>
    <title>Bangla Travel Buddy</title>
</head>
<body>
   <!--  <input type="text" id="name" name="name" value="" onkeyup="f2()">
    <input type="button" name="" value="click" onclick="move()">
    <br><br>
    <div id="d1"> Lets explore the country!!</div>
    --> <!-- <script>
        function f2(){
            let name = document.getElementById('name').value;
            f1(name);
        }
        function move(){
            let current = document.getElementById('d1').style.left;

            if(current == ""){
                document.getElementById('d1').style.left = "10px";
                setTimeout(move, 500);
            }else{
                //alert('test');

                let num = parseInt(current.replace('px', ''));
                num += 10;
                //alert(num);
                document.getElementById('d1').style.left = num+'px';
                setTimeout(move, 500);
            }

        }
        </script> -->
        <table border="0">
            <tr height="200px">
                <td width="90px" align="left"> <img src="images/tour.jpg" width="300px" height="150px" alt=""> </td>
                <td width="1050px" align="right">
                    <h2><a href="home.php">Home </a></h2> <br>
                    <a href="package.php"> Packages </a><br>
                    <a href="forex.php"> Forex </a><br>
                    <a href="about_us.php"> About </a><br>
                    <a href="contact.php"> Contact </a><br> 
                    <a href="login.php">Login/Sign Up</a>
                </td>
            </tr>
            <tr height="500px">
                <td colspan="2" align="center">
                    
                    <input type="text" id="name" name="name" value="" onkeyup="f2()">
    <input type="button" name="" value="click" onclick="move()">
    <br><br>
    <div id="h2"> Lets explore the country!!</div>
 <script>
        function f2(){
            let name = document.getElementById('name').value;
            f1(name);
        }
        function move(){
            let current = document.getElementById('d1').style.left;

            if(current == ""){
                document.getElementById('d1').style.left = "10px";
                setTimeout(move, 500);
            }else{
                //alert('test');

                let num = parseInt(current.replace('px', ''));
                num += 10;
                //alert(num);
                document.getElementById('d1').style.left = num+'px';
                setTimeout(move, 500);
            }

        }
        </script> 
                    <center><h2>Lets explore the country!!</h2></center><br>
                    <img src="images/Img1.jpg" width="800px" height="400px" alt="">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    Copyright &copy; Bangla Travel Buddy 2022
                </td>
            </tr>
        </table>

</body>
</html>






