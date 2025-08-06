<?php

session_start();

if(isset($_REQUEST['submit']))
{
    
    $name= $_POST['admin_name'];
    $username = $_POST['admin_username'];
    $password = $_POST['admin_password'];
    $email = $_POST['admin_email'];
    $address = $_POST['admin_address'];
    $gender =$_POST['gender'];
    // $src = $_FILES['myfile']['tmp_name'];
	// 	$des = 'upload/'.$_FILES['myfile']['name'];
        
	// 	if(move_uploaded_file($src, $des))
    //{
	// 		echo "Success";
	// 	}
        //else
        //{
	// 		echo "Error";
	// 	}

    if($name!= null && $username != null &&  $password != null && $email != null && $address != null && $gender != null )
    {
        /*$user = ['username'=> $username, 'password'=>$password, 'email'=> $email];
        $_SESSION['user'] = $user;*/

        $user = $name."|".$username."|".$password."|".$email."|".$address."|".$gender."\r\n";
        $file = fopen('../Model/admin.txt', 'a');
        fwrite($file, $user);
        header('location: ../View/login.php');
    }
    else
    {
        echo "null submission";
    }
}

?>