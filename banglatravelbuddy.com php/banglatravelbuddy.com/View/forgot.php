<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Forgot password</title>
</head>

<body>
    <center>
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
            <tr height="200px">
                <td colspan="2" align="center">
                <form action="../Controller/forgotPasswordCheck.php" method="POST">
                    <table border="1" align="center">
                        <tr>
                            <th colspan="2">Forgot Password</th>
                        </tr>
                        <tr>
                            <td>Username: </td>
                            <td><input type="text" name="username" value="" required></td>
                        </tr>
                        <tr>
                            <td>Email: </td>
                            <td><input type="email" name="email" value=""></td>
                        </tr>
                        <tr>
                            <td colspan="2" rowspan="2" align="center">
                                <button type="submit" name="submit" value="Submit">Submit</button> <br>
                                

                            </td>
                        </tr>
                    </table>
                    </form>

                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    Copyright &copy; Bangla Travel Buddy 2022
                </td>
            </tr>
        </table>

    </center>
</body>

</html>