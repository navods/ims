<?php

session_start();
$username = $_SESSION['username'];

require_once "include/dbh.php";

$sql = "SELECT username, fullName, email,
            CASE 
                WHEN userP = 1 THEN 'Assistant'
                WHEN userP = 2 THEN 'Supervisor'
                WHEN userP = 3 THEN 'Administrator'
                ELSE 'Unknown'
            END AS title FROM users WHERE username = '$username'";

$result = mysqli_query($conn, $sql);
$resultcheck = mysqli_num_rows($result);

if ($resultcheck == 1) {
    $row = mysqli_fetch_assoc($result);

    $fullName = $row['fullName'];
    $email = $row['email'];
    $title = $row['title'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/icon.svg">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/confirmation.css">
    <title>Delete Account | IMS</title>
</head>
<body>
    <?php include "include/navbar.php" ?>
    <div class="bread">
        <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="profileMenu.php">Profile</a></li>
            <li>Delete Account</li>
        </ul>
    </div>
    <br>

    <div class="body">
        <div class="container">
            <div class="row"><h1 class="headline"><?php echo $fullName ?></h1></div>
            <div class="row"><p class="subhead"><?php echo $title ?></p></div>
            <div class="row"><p class="description"><?php echo $username . " | " . $email ?></p></div>
            <div class="row"><p class="description">Are you certain you wish to proceed with deleting your account? Please note that this action is irreversible and all your data will be permanently removed from our system.</p></div>
            <div class="row"><a href="actDeleteAccount.php"><button class="red">Delete Account</button></a><a href="profileMenu.php"><button class="border">Cancel</button></a></div>
            <!-- <div class="row"></div> -->
        </div>
    </div>

    <div id="notification" class="notification"></div>
    <script>
        <?php
            session_start();
            if(isset($_SESSION['message'])): ?>
                var message = "<?php echo $_SESSION['message']; ?>"; 
                displayNotification(message);
            <?php unset($_SESSION['message']);?>
        <?php endif; ?>

        function displayNotification(message) {
            var notification = document.getElementById("notification");
            notification.textContent = message;
            notification.classList.add("show");
            setTimeout(function() {
                notification.classList.remove("show");
            }, 4000); // 4 seconds
        }
    </script>
</body>
</html>