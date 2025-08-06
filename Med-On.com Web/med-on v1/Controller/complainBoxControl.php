<?php	
	session_start();
    $user="";

	if(isset($_REQUEST['submit'])){
		
		$name = $_POST['name'];
		$message = $_POST['message'];
		$email = $_POST['email'];

		if($name != null &&  $message != null && $email != null){
			/*$user = ['username'=> $username, 'password'=>$password, 'email'=> $email];
			$_SESSION['user'] = $user;*/

			$complain = $name."|".$email."|".$message."\r\n";
			$file = fopen('../Model/Complains.txt', 'a');
			fwrite($file, $complain);
            header('location:../View/complainBox.php');
			
		}else{
			echo "null submission";
		}
	}

?>