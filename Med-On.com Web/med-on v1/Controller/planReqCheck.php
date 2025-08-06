<?php
    session_start();

    if(isset($_REQUEST['submit'])){
        
        $name= $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $location = $_POST['location'];
        $duration =$_POST['duration'];
        // $src = $_FILES['myfile']['tmp_name'];
        // 	$des = 'upload/'.$_FILES['myfile']['name'];
            
        // 	if(move_uploaded_file($src, $des)){
        // 		echo "Success";
        // 	}else{
        // 		echo "Error";
        // 	}
    
        if($name!= null && $email != null && $phone != null && $location != null && $duration != null){
            /*$user = ['username'=> $username, 'password'=>$password, 'email'=> $email];
            $_SESSION['user'] = $user;*/
    
            $user = $name."|".$email. "|".$phone ."|". $location. "|".$duration."\r\n";
            $file = fopen('../Model/Plan_Request.txt', 'a');
            fwrite($file, $user);
            header('location: ../View/tourplanReq_2.php');
        }else{
            echo "null submission";
        }
    }

?>