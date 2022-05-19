<?php
    require_once "dbh.php";

    $userFullName = $decode_react_data['userFullName'];
    $userEmail = $decode_react_data['userEmail'];
    $userMobileNumber = $decode_react_data['userMobileNumber'];
    $userPassword = $decode_react_data['userPassword'];

    $query = "SELECT * FROM user WHERE userEmail = '{$userEmail}'";
    $query_run = mysqli_query($conn, $query);
    $count = mysqli_num_rows($query_run);

    if($query_run){
        if($count == 1){
            $message = "existedEmail";  
        }else {
            $sql = "INSERT INTO user (
                userFullName,
                userEmail,
                userMobileNumber,
                userPassword
            ) VALUES (
                '$userFullName',
                '$userEmail',
                '$userMobileNumber',
                '$userPassword'
            )";
        
            $result = mysqli_query($conn, $sql);
            if($result){
                $message = "success";
            }
        }
    }

    $response[] = array("message" => $message);
    echo json_encode($response);
?>