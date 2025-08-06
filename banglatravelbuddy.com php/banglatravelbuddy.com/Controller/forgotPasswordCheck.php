<?php	
	session_start();

	if(isset($_REQUEST['submit']))
	{
		
		$username = $_POST['username'];
		$email = $_POST['email'];

		if( $username != null &&  $email != null)
		{

			//$user = $_SESSION['user'];

			$file = fopen('../Model/admin.txt', 'r');
			while(!feof($file))
			{
				$user = fgets($file);
				$userArry = explode('|', $user);
				print_r($userArry);

				if(trim($userArry[1]) == $username && trim($userArry[3]) == $email)
				{
					setcookie('status', 'true', time()+3600, '/');
					header('location: ../View/forgot_2.php');
				}
			}

			header('location:../View/forgot_3.php');

		}
		else
		{
			header('location:../View/forgot_3.php');
		}
	}

?>