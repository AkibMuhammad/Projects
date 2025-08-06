<?php
	require_once('../controller/sessionController.php');
	require_once('../services/userService.php');

	function validatephp(){
		if(isset($_GET['msg'])){
			if($_GET['msg'] == 'appointment-successful'){
				echo "New appointment added.";
			}
		}

	}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Employees</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="/SUAdmin/views/css/style.css">
</head>

<body>

    <h1>Employee Info</h1>
    <?=validatephp();?>

    <?php
		$users = getAllUser();
	?>

    <table border=1>
        <tr>
            <td>NAME</td>
            <td>USERNAME</td>
            <td>CONTACT</td>
            <td>PASSWORD</td>
            <td>ACTION</td>

        </tr>
        <?php for($i=0; $i != count($users); $i++ ){ ?>
        <tr>
            <td><?= $users[$i]['name'] ?></td>
            <td><?= $users[$i]['username'] ?></td>
            <td><?= $users[$i]['email'] ?></td>
            <td><?= $users[$i]['password'] ?> </td>

            <td>
                <a href="edit_serials.php?username=<?=$users[$i]['username']?>"> Edit</a> |
                <button type="button" onclick="deleteEmployee('<?=$users[$i]['username']?>')">DELETE</button>

            </td>
        </tr>
        <?php } ?>
            <br>
        
    </table>
    <p align="center"><a href="dashboard.php" >Back to Dashboard</a></p>


    <script>
    function deleteEmployee(currUsername) {


        var xhttp = new XMLHttpRequest();

        xhttp.open("POST", "../controller/employerDeleteController.php", true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send("username=" + currUsername);


        xhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {

                alert(this.responseText);
            }
        }



    }
    </script>

</body>

</html>