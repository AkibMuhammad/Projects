<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Plan</title>
</head>

<body>
    <center>
        <table border="1">
            <tr height="100px">
                <td width="150px" align="center">banglatravelbuddy</td>
                <td width="500px" align="right">
                    <a href="home.php">Home </a> | <a href="package.php"> Packages </a> | <a href="forex.php"> Forex </a> | <a href="about_us.php"> About </a> | <a href="contact.php"> Contact </a> | <a href="login.php">Login/Sign Up</a>
                </td>
            </tr>
            <tr height="400px">
                <td colspan="2" align="center">
                    <h1><b>Request a plan</b></h1>
                    <form action="../Controller/planReqCheck.php" method="post">
                        <table>
                            <tr>
                                <td>Name :</td>
                                <td><input type="text" name="name" value=""></td>
                            </tr>
                            <tr>
                                <td>Email :</td>
                                <td><input type="email" name="email" value=""></td>
                            </tr>
                            <tr>
                                <td>Phone :</td>
                                <td><input type="tel" name="phone" value=""></td>
                            </tr>
                            <tr>
                                <td>Location : </td>
                                <td><input type="text" name="location" value=""></td>
                            </tr>
                            <tr>
                                <td>Duration : </td>
                                <td><input type="number" name="duration" value=""></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center"><button type="submit" name="submit" value="Submit">Submit</button>
                                <button type="reset">Reset</button>
                            </td>
                            </tr>
                        </table>
                    </form>

                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    Copyright &copy; Bangla Travel Buddy
                </td>
            </tr>
        </table>

    </center>
</body>

</html>