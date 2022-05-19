<?php
    require_once "dbh.php";

    $userEmail = $decode_react_data['userEmail'];

    $query = "SELECT * FROM user WHERE userEmail = '{$userEmail}'";
    $query_run = mysqli_query($conn, $query);
    $count = mysqli_num_rows($query_run);

    if($query_run){
        if($count == 1){
            while($row = mysqli_fetch_assoc($query_run)){
                $userFullName = $row['userFullName'];
                $userMobileNumber = $row['userMobileNumber'];
            }
            $message = "success";
        }
    }else {
        $message = "error";
    }

    $response[] = array(
        "message" => $message,
        "userFullName" => $userFullName,
        "userMobileNumber" => $userMobileNumber
    );

    echo json_encode($response);
?>

