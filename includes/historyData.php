<?php
    require_once "dbh.php";

    $userEmail = $decode_react_data['userEmail'];

    $query = "SELECT * FROM bookingdetail WHERE bookingDetailEmail = '{$userEmail}'";
    $query_run = mysqli_query($conn, $query);
    $count = mysqli_num_rows($query_run);
    $key = 1;

    if($query_run){
        if($count > 0){
            while($row = mysqli_fetch_assoc($query_run)){
                $message = "success";
                $bookingDetailDestination = $row['bookingDetailDestination'];
                $bookingDetailDate = $row['bookingDetailDate'];
                $bookingDetailTime = $row['bookingDetailTime'];
                $bookingDetailSeatNumber = $row['bookingDetailSeatNumber'];
                $bookingDetailAction = $row['bookingDetailAction'];
                $response[] = array(
                    "key" => $key,
                    "message" => $message,
                    "bookingDetailDestination" => $bookingDetailDestination,
                    "bookingDetailDate" => $bookingDetailDate,
                    "bookingDetailTime" => $bookingDetailTime,
                    "bookingDetailSeatNumber" => $bookingDetailSeatNumber,
                    "bookingDetailAction" => $bookingDetailAction
                );
                $key = $key + 1;
            }
        }else {
            $message = "no data";
            $response[] = array(
                "message" => $message,
                "bookingDetailDestination" => "",
                "bookingDetailDate" => "",
                "bookingDetailTime" => "",
                "bookingDetailSeatNumber" => "",
                "bookingDetailAction" => ""
            );
        }
    }else {
        $message = "error";
    }

    echo json_encode($response);
?>

