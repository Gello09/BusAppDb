<?php
    require_once "dbh.php";

    $bookingDetailEmail = $decode_react_data['bookingDetailEmail'];
    $bookingDetailDestination = $decode_react_data['bookingDetailDestination'];
    $bookingDetailDate = $decode_react_data['bookingDetailDate'];
    $bookingDetailTime = $decode_react_data['bookingDetailTime'];
    $bookingDetailSeatNumber = $decode_react_data['bookingDetailSeatNumber'];
    $bookingDetailPaymentReceipt = $_SESSION["image_file_name"];
    $bookingDetailAction = $decode_react_data['bookingDetailAction'];

    $sql = "INSERT INTO bookingDetail (
        bookingDetailEmail,
        bookingDetailDestination,
        bookingDetailDate,
        bookingDetailTime,
        bookingDetailSeatNumber,
        bookingDetailPaymentReceipt,
        bookingDetailAction
    ) VALUES (
        '$bookingDetailEmail',
        '$bookingDetailDestination',
        '$bookingDetailDate',
        '$bookingDetailTime',
        '$bookingDetailSeatNumber',
        '$bookingDetailPaymentReceipt',
        '$bookingDetailAction'
    )";

    $result = mysqli_query($conn, $sql);

    if($result){
        $message = "success";
    }else {
        $message = "error";
    }

    $response[] = array("message" => $message);
    echo json_encode($message);
?>