<?php    
    $host = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "projectfinal";

    function DBconnect(){
        global $host;
        global $dbuser;
        global $dbpass;
        global $dbname;

    
        return $conn = mysqli_connect($host,$dbuser,$dbpass,$dbname);
    }

?>  



