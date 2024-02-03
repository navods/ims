<?php

session_start();
$username = $_SESSION['username'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/icon.svg">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/confirmation.css">
    <title>Change Password | IMS</title>
</head>
<body>
    <?php include "include/navbar.php" ?>
    <div class="bread">
        <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="profileMenu.php">Profile</a></li>
            <li>Change Password</li>
        </ul>
    </div>
    <br>

    <div class="body">
        <div class="container">
            <form id="changePassForm" action="actChangePassword.php" method="post">
                <div class="input-group">
                <label for="oldPass">Old Password</label>
                <input type="text" id="oldPass" name="oldPass">
                </div>
                <div class="input-group">
                <label for="newPass">New Password</label>
                <input type="text" id="newPass" name="newPass">
                </div>
                <div class="input-group">
                <label for="confirmPass">Confirm New Password</label>
                <input type="confirmPass" id="confirmPass" name="confirmPass">
                </div>
                <div class="input-group">
                <button id="changePass" type="submit">Update Passsword</button>
                </div>
            </form>
        </div>
    </div>

    <div id="notification" class="notification"></div>
    <script>
        <?php
            session_start();
            if(isset($_SESSION['message'])): ?>
                var message = "<?php echo $_SESSION['message']; ?>"; 
                console.log(message);
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