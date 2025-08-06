<?php
    require_once('../controller/sessionController.php');	
    require_once('../services/userService.php');


    if(isset($_GET['error'])){
		if($_GET['error'] == 'dberror'){
			echo "something wrong ...please try again.";
		}
    }
    


?>

<!DOCTYPE html>
<html>

<head>

    <style>
  

    </style>


    <title> ADMIN | Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="../views/css/style.css">
    <img align="right" src="images/Msymbol1.jpeg"width="200px"height="100px" alt="">
</head>

<body>
    <h1><center>ADMIN PANEL</center><sup><center><small>MED-ON</small></center></sup></h1>
    <h5><center> GREETINGS TO MED-ON! <?=$_SESSION['username']?></center></h5>
    <div class="sidebar">
  <a class="active" href="../views/dashboard.php">Dashboard</a>
  <a href="../views/papplicant.php">Pending Applicants</a>
  <a href="../views/serials.php">Serials of Appointments</a>
  <a href="../views/doctor's list.php">Doctor's list</a>
  <a href="../views/employee_list.php">Employee's list</a>
  <a href="../views/add_appointment.php">Book an appointment</a>
  <a href="../views/add_employee.php">Add an employee</a>
  <a href="../views/emergency.php">Emergency</a>
  <a href="../views/feedback.php">Feedback</a>
  <a href="../views/profile.php">Profile</a>
  <a href="../controller/logoutController.php">Logout</a>
</div>

<div align="center">
    <form action="../controller/searchController.php">
        <table>
            <tr>
                <td>
                    
               
                </td>

                <td class="search-panel">
                  

                </td>
            </tr>


        </table>
    </form>
</div>
   
</body>

</html>