<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin | Forgot password</title>
</head>

<body>
    <center>
        <table border="2">
            <tr height="200px">
                <td width="250px" align="center">Med-On</td>
                <td width="500px" align="right">
                    <a href="home.php">Home </a> | <a href="about_us.php"> About </a> | <a href="emergency.php"> Emergency </a> | <a href="login.php">Login/Sign Up</a>
                </td>
            </tr>
            <tr height="400px">
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
                    Copyright &copy; @Med-On
                </td>
            </tr>
        </table>

    </center>
</body>

</html>