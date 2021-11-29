<?php 
            // declare variables and assign values 
            $serverName='localhost';
            $userName='root';
            $password='';
            $dbName='cafe';
        // create connection
        $conn = new mysqli($serverName,$userName,$password,$dbName);
        // check connection
        if($conn->connect_error){
            die("Connection not done: ".$conn->connect_error);
        // }else{
        //     echo "we have connection to $dbName";
        }
?>