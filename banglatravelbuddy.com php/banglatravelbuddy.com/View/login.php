<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login | Bangla Travel Buddy</title>
</head>

<body>
    <center>
        <table border="0" align="center">
            <!-- 1st Row -->
            <tr height="200px">
                <td width="90px" align="center"> <img src="images/tour.jpg" width="200px" height="150px" alt=""> </td>
                <td width="1050px" align="right">
                    <a href="home.php">Home </a><br> 
                    <a href="package.php"> Packages </a><br>
                    <a href="forex.php"> Forex </a><br>
                    <a href="about_us.php"> About </a><br>
                    <a href="contact.php"> Contact </a><br> 
                    <a href="login.php">Login/Sign Up</a>
            </tr>
            <!-- 2nd Row -->
            <tr height="200px">
                <td colspan="2" align="center">
                    <form action="../Controller/loginCheck.php" method="POST">
                    <table border="0" align="center">
                        <tr>
                            <th colspan="2"><h1>Login</h1></th>
                        </tr>
                        <tr>
                            <td>Username: </td>
                            <td><input type="text" name="username" value="" required></td>
                        </tr>
                        <tr>
                            <td>Password: </td>
                            <td><input type="password" name="password" value="" required></td>
                        </tr>
                        <tr>
                            <td colspan="2" rowspan="2" align="center">
                                <button type="submit" name="submit" value="Submit">Submit</button> <br>
                                <a href="forgot.php">Forgot Password? </a> <br>
                                <a href="signup.php">Signup</a>

                            </td>
                        </tr>
                    </table>
                    </form>
                </td>
            </tr>
            <!-- 3rd row -->
            <tr>
                <td colspan="2" align="center">
                    Copyright &copy; Bangla Travel Buddy
                </td>
            </tr>
        </table>
    </center>
</body>

</html>