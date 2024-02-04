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
            <h1>Change Password</h1>
            <form id="changePassForm" action="actChangePassword.php" method="post">
                <div class="input-group">
                <label for="oldPass">Current Password</label>
                <input type="password" id="oldPass" name="oldPass">
                </div>
                <div class="input-group">
                <label for="newPass">New Password</label>
                <input type="password" id="newPass" name="newPass">
                </div>
                <div class="input-group">
                <label for="confirmPass">Confirm Password</label>
                <input type="password" id="confirmPass" name="confirmPass">
                </div>
                <button id="changePass" type="submit" class="purple">Update</button>
            </form>
        </div>
    </div>

    <?php include "include/notification.php" ?>
</body>
</html>