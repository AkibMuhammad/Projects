<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin- Registration Form</title>
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
            <tr height="300px">
                <td colspan="2" align="center">
                    <form action="/banglatravelbuddy.com/Controller/AdminRegCheck.php" method="POST">
                        <table border="0">
                            <!-- admin name -->
                            <tr >
                                <td>Name : </td>
                                <td><input type="text" name="admin_name" value="" required></td>
                            </tr>
                            <!-- admin username -->
                            <tr>
                                <td>Username : </td>
                                <td><input type="text" name="admin_username" value="" required></td>
                            </tr>
                            <!-- admin Email -->
                            <tr>
                                <td>E-mail:</td>
                                <td><input type="text" name="admin_email" value="" required></td>
                            </tr>

                            <!-- admin Password -->
                            <tr>
                                <td>Password :</td>
                                <td><input type="password" name="admin_password" value="" required></td>
                            </tr>

                            <!-- admin gender -->
                            <tr>
                                <td>Gender :</td>
                                <td>
                                    <input type="radio" name="gender" value="Male">Male
                                    <input type="radio" name="gender" value="Female">Female
                                    <input type="radio" name="gender" value="Others">Others
                                </td>
                            </tr>
                            <!-- admin_address -->
                            <tr>
                                <td>Address : </td>
                                <td><input type="text" name="admin_address" value=""></td>
                            </tr>
                                <!-- admin photo -->
                                <tr>
                                    <td>Upload Image: </td>
                                    <td><input type="file" name="photo" value=""></td>
                                </tr>
                            
                            
                            <td colspan="2" rowspan="2" align="center">
                                    <button type="submit" name="submit" value="Submit">Submit</button> <br>
                                    <a href="login.php">Already have account? </a>

                            </td>

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