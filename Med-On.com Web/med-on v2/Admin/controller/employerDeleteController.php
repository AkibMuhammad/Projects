<?php

    require_once('../services/userService.php');

        $username = $_POST['username'];



        $user = [     
            'username'	=> $username
        ];

       $status = deleteEmployer($user);
        
        if($status){


            echo "Appointment Deleted";


        }
  


?>