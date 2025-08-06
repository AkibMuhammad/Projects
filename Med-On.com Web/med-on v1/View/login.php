<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin login | Med-On</title>
</head>

<body>
    <center>
        <table border="1" align="center">
            <!-- 1st Row -->
            <tr height="100px">
                <td width="150px" align="center"><h1>Med-On</h1></td>
                <td width="500px" align="right">
            </tr>
            <!-- 2nd Row -->
            <tr height="400px">
                <td colspan="2" align="center">
                    <form action="../Controller/loginCheck.php" method="POST">
                    <table border="1" align="center">
                        <tr>
                            <th colspan="2">Login</th>
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
                                <a href="Admin.php">Create new account</a>

                            </td>
                        </tr>
                    </table>
                    </form>
                </td>
            </tr>
            <!-- 3rd row -->
            <tr>
                <td colspan="2" align="center">
                    Copyright &copy; @Med-On
                </td>
            </tr>
        </table>
    </center>
</body>

</html>