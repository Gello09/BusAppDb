<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
    <script src="./jquery-3.5.1.min.js"></script>
    <script src="./sweetalert2.all.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title> Byaheng Pinoy Administrator </title>
</head>
    <body>
        <div class="main-container">
            <div class="logo-container">
                <img src="logo.png">
            </div>
            <div class="login-container">
                <form action="index.php" method="POST">
                    <h2> Administrator </h2>
                    <input type="text" name="admin_username" placeholder="Username">
                    <input type="password" name="admin_password" placeholder="Password">
                    <input type="submit" name="admin_submit">
                </form>
            </div>
        </div>
    </body>
</html>

<?php
    session_start();
    unset($_SESSION['log-in']);

    if(isset($_POST['admin_submit'])){
        $admin_username = trim(strtoupper($_POST['admin_username']));
        $admin_password = trim(strtoupper($_POST['admin_password']));

        $_SESSION["admin_username"] = $admin_username;
        $_SESSION["admin_password"] = $admin_password;

        if($admin_username === "ADMIN" and $admin_password === "ADMIN22"){

            unset($_SESSION["admin_username"]);
            unset($_SESSION["admin_password"]);
            $_SESSION['log-in'] = "true";
        ?>
            <script>
                Swal.fire({
                width: 180,
                timer: 1000,
                didOpen: () => {
                    Swal.showLoading()
                    },
                }).then(() => {
                    window.location.href = "./dashboard/pending.php";
                })
            </script>
        <?php
            exit();
        }else {
            $_SESSION["invalid"] = "invalid";
            header("location: ./index.php");
            exit();
        }
    }    
?>

<?php
    if(isset($_SESSION["invalid"])){ 
?>
    <script>
        Swal.fire({
            icon: 'error',
            width: '350',
            title: 'Invalid Admin Account',
        })
    </script>
<?php
    unset($_SESSION["invalid"]);
    }
?>

