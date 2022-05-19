<?php
    require_once "dbh.php";

    $userEmail = $decode_react_data['userEmail'];
    $userPassword = $decode_react_data['userPassword'];

    $query = "SELECT * FROM user WHERE userEmail = '{$userEmail}' AND userPassword = '{$userPassword}'";
    $query_run = mysqli_query($conn, $query);
    $count = mysqli_num_rows($query_run);

    if($query_run){
        if($count == 0){
            $message = "invalidAccount";
            $userFullName = "";
            $userEmail = "";
        }else {
            while($row = mysqli_fetch_assoc($query_run)){
                $userFullName = $row['userFullName'];
                $userEmail = $row['userEmail'];        
            }
            $message = "success";
        }
    }else {
        $message = "error";
    }

    $response[] = array(
        "message" => $message,
        "userFullName" => $userFullName, 
        "userEmail" => $userEmail
    );

    echo json_encode($response);
?>