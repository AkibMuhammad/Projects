<?php

   require_once('../controller/sessionController.php');		

?>

<!DOCTYPE html>
<html>

<head>
    <title>Booking Appointments</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="/SUAdmin/views/css/style.css">
</head>

<body>


    <form name="form" action="../controller/RegController.php" method="post" onsubmit="return validateAdd()">
        <fieldset>
            <legend>Book an appointment</legend>
            <table>
                <tr>
                    <td>Doctor's Name</td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email"></td>
                </tr>
                <tr>
                    <td> <input type="button" id="submit" name="submit" value="Confirm" onclick="addAppointment()"></td>
                   
                </tr>
            </table>
        </fieldset>

    

        <div id="message"></div>
    </form>

    <br>
    <p align="center"><a href="dashboard.php" >Back to Dashboard</a></p>
</body>

<script>
function validateAdd() {

    let name = document.form.name.value;
    let username = document.form.username.value;
    let email = document.form.email.value;
    let password = document.form.password.value;


    if (name == null || username == null || email == null || password == null) {

        alert("All fields are required")
        return false;
    } 
    else if (username.match(' ')) {
        alert("username can't have spaces between");
        return false;
    } 
    else if (!(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email))) {
        alert("Invalid Email");
        return false;
    }
    else if(password.length < 6){
        alert("Password must be larger than 6 characters");
        return false;
    }

}

function addAppointment(){
    let name = document.form.name.value;
    let username = document.form.username.value;
    let email = document.form.email.value;
    let password = document.form.password.value;

    let xhttp = new XMLHttpRequest();

    let data = {
        'name' : name,
        'username' : username,
        'email' : email,
        'password' : password
    };

    data = JSON.stringify(data); //To convert date into strings

    xhttp.open("POST", "../controller/regController.php", true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('json=' + data);

    xhttp.onreadystatechange = function() {

    if (this.readyState == 4 && this.status == 200) {
        //alert(this.responseText);
        document.getElementById("message").innerHTML = this.responseText;

         document.form.name.value = "";
         document.form.username.value = "";
         document.form.email.value = "";
         document.form.password.value = "";
    
    }
}




}




</script>

</html>