<?php	
	session_start();

	if(isset($_REQUEST['submit'])){
		
		$package1 = $_POST['package1'];
		$package2 = $_POST['package2'];

		if( $username != null &&  $email != null){

			//$user = $_SESSION['user'];

			$file = fopen('../Model/client.txt', 'r');
			while(!feof($file)){
				$user = fgets($file);
				$userArry = explode('|', $user);
				print_r($userArry);

				if(trim($userArry[1]) == $package1 && trim($userArry[3]) == $package2){
					setcookie('status', 'true', time()+3600, '/');
					//header('location: ../View/forgot_2.php');
				}
			}

			//header('location:../View/forgot_3.php');

		}else{
			//header('location:../View/forgot_3.php');
		}
	}

?>