<?php
    session_start();
    
    $serverName = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "bus_app";

    $conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

    $react_data = file_get_contents('php://input');
    $decode_react_data = json_decode($react_data , true);   

    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }
?>