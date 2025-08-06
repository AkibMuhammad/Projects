<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complain Box</title>
</head>

<body>
    <center>
        <table border="1">
            <tr height="100px">
                <td width="150px" align="center"><a href="admin dashboard.php">Back to dashboard</td>
                <td width="500px" align="right">
                <center><a href="home.php">Home </a> | <a href="papplicant.php"> Pending Applicants </a> | <a href="about_us.php"> About </a> | <a href="emergency.php"> Emergency </a> | <a href="login.php">Login/Sign Up</a></center>
                </td>
            </tr>
            <tr height="400px">
                <td colspan="2" align="center">
                    <form action="../Controller/complainBoxControl.php" method="POST">
                        <table border="1">
                            <tr>
                                <td>Name : </td>
                                <td><input type="text" name="name" value="" required></td>
                            </tr>
                            <tr>
                                <td>Email : </td>
                                <td><input type="email" name="email" value="" required></td>
                            </tr>
                            <tr>
                                <td>Message : </td>
                                <td><textarea name="message" cols="30" rows="10"></textarea></td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="submit" name="submit" value="Submit">Submit</button>
                                    <button type="reset">Reset</button>
                                </td>
                            </tr>
                        </table>
                    </form>    

                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    Copyright &copy; Med-On
                </td>
            </tr>
        </table>

    </center>
</body>

</html>