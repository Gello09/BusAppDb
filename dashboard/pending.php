<?php
    require_once "../includes/dbh.php";

    if(!$_SESSION['log-in']){
        $_SESSION['log-out'] = "true";
        header("location: ../index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../logo.png" type="image/x-icon">
    <script src="../jquery-3.5.1.min.js"></script>
    <script src="../sweetalert2.all.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="dashboard.css">
    <title>Dashboard Pending Schedule</title>
</head>
    <body>
        <div class="dashboard-container">
            <div class="log-out">
                <a href="../index.php"> Logout </a>
            </div>
            <div class="option-container">
                <a href="./pending.php"> Pending </a>
                <a href="./confirm.php"> Confirm </a>
                <a href="./decline.php"> Decline </a>
                <a href="./history.php"> History </a>
            </div>
            <h1> Pending Schedule </h1>
            <div class="total-booking">
                <div class="search-container">
                    <input type="text" placeholder="Search Destination">
                </div>
                <div class="total">
                    Total pending of booking = 
                    <?php 
                        if($_SESSION['total-pending'] != 0){
                            echo $_SESSION['total-pending'];
                        }else {
                            $_SESSION['total-pending'] = "0";
                            echo "0";
                        }
                    ?>
                </div>
            </div>
            <div class="booking-schedule">
                <div class="sched-container">Number</div>
                <div class="sched-container">Email</div>
                <div class="sched-container">Destination</div>
                <div class="sched-container">Date</div>
                <div class="sched-container">Time</div>
                <div class="sched-container">Seat No.</div>
                <div class="sched-container">Payment Proof</div>
                <div class="sched-container">Action</div>
            </div>
            <div class="booking-scroll">
                <?php
                    $sql = "SELECT * FROM bookingDetail WHERE bookingDetailAction = 'Pending'";

                    $result = mysqli_query($conn, $sql);
                    $resultChecked = mysqli_num_rows($result);

                    if($resultChecked > 0){
                        $index = 1;
                        while($row = mysqli_fetch_assoc($result)){
                            $id = $row['bookingDetailId'];
                            $email = $row['bookingDetailEmail'];
                            $destination = $row['bookingDetailDestination'];
                            $date = $row['bookingDetailDate'];
                            $time = $row['bookingDetailTime'];
                            $seat = $row['bookingDetailSeatNumber'];
                            $proof = $row['bookingDetailPaymentReceipt'];
                ?>
                    <div class="booking-schedule">
                        <div class="sched-container"><?php echo $index ?></div>
                        <div class="sched-container"><?php echo $email ?></div>
                        <div class="sched-container"><?php echo $destination ?></div>
                        <div class="sched-container"><?php echo $date ?></div>
                        <div class="sched-container"><?php echo $time ?></div>
                        <div class="sched-container"><?php echo $seat ?></div>
                        <div class="sched-container proof-image">
                            <a href=<?php echo "../includes/payment_receipt/" . $proof ?> target="_blank">
                                <img src=<?php echo "../includes/payment_receipt/" . $proof ?>>
                            </a>
                        </div>
                        <div class="sched-container button-container">
                            <form action="update.php" method="POST">
                                <input type="submit" name="submit" value="Accept">
                                <input type="submit" name="decline" value="Declined">
                                <input type="hidden" name="id" value=<?php echo $id ?>>
                            </form>
                        </div>
                    </div>
                <?php
                    $_SESSION['total-pending'] = $index;
                    $index++;
                        }
                    }else {
                        $_SESSION['total-pending'] = "0";
                    }
                ?>
            </div>
        </div>
    </body>
</html>

<?php
    if(isset($_SESSION["confirm-schedule"])){ 
?>
    <script>
        Swal.fire({
            icon: 'success',
            width: '350',
            title: 'Confirm',
        })
        .then(() => {
            location.reload();
        })
    </script>
<?php
    unset($_SESSION["confirm-schedule"]);
    }
?>


<?php
    if(isset($_SESSION["decline-schedule"])){ 
?>
    <script>
        Swal.fire({
            icon: 'error',
            width: '350',
            title: 'Decline',
        })
        .then(() => {
            location.reload();
        })
    </script>
<?php
    unset($_SESSION["decline-schedule"]);
    }
?>