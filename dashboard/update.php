<?php
    require_once "../includes/dbh.php";

    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        echo $id;

        $sql = "UPDATE bookingDetail SET bookingDetailAction = 'Confirm' WHERE bookingDetailId = '$id'";

        $result = mysqli_query($conn, $sql);
        
        if($result){
            $_SESSION['confirm-schedule'] = "confirm-schedule";
            header("location: pending.php");
        }
    }

    if(isset($_POST['decline'])){
        $id = $_POST['id'];
        echo $id;

        $sql = "UPDATE bookingDetail SET bookingDetailAction = 'Decline' WHERE bookingDetailId = '$id'";

        $result = mysqli_query($conn, $sql);
        
        if($result){
            $_SESSION['decline-schedule'] = "decline-schedule";
            header("location: pending.php");
        }
    }
?>