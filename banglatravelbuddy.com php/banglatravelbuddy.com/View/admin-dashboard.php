<?php 
    session_start();
    if(isset($_COOKIE['status'])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Dashboard</title>
</head>

<body>
    <center>
        <table border="0">
            <tr height="100px">
                <td width="150px" align="center"><img src="images/tour.jpg" width="300px" height="150px" alt=""></td>
                <td width="500px" align="right">
                    
                </td>
            </tr>
            <tr height="400px">
                <td  align="center">
                    <table border="0" height="400px" width="100%">
                        <tr>
                            <td><a href="package.php" target="_blank">Packages</a></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="hotel.php" target="_blank">Hotels</a>
                            </td>
                        </tr>
                        <tr>
                            <td><a href="bus.php" target="_blank">Bus Service</a></td>
                        </tr>
                        <tr>
                            <td><a href="Employee.php" target="_blank">Employee Information</a></td>
                        </tr>
                        <tr>
                            <td><a href="ServiceProvider.php" target="_blank">Service Provider Information</a></td>
                        </tr>
                        <tr>
                            <td><a href="user.php" target="_blank">User Information</a></td>
                        </tr>
                        <tr>
                            <td><a href="bookings.php" target="_blank">Booking Information</a></td>
                        </tr>

                        <tr>
                            <td><a href="complainBox.php" target="_blank">Conplain Box </a></td>
                        </tr>
                        
                        <tr>
                            <td><a href="../Controller/logout.php" target="_blank">Logout</a></td>
                        </tr>
                    </table>

                </td>
                <td align="center"><img src="images/Img1.jpg" width="800px" height="400px" alt=""></td>
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

<?php

    }else{
        echo "invalid request";
    }
?>





