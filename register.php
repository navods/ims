<?php
    require_once "userCheck.php";
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/icon.svg">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="stylesheet" type="text/css" href="css/forms.css">
    <title>Register | Inventory Management System</title>
</head>
<body>
    <header>
        <img class="navLogo" src="img/shortLogoW.svg">
        <nav class="navText">
            <div><a href="index.php">Home</a></div>
            <div><a href="signin.php">Login</a></div>
        </nav>
    </header>
    <!-- <div class="bread">
        <ul class="breadcrumb">
            <li>REGISTER | STEP 01</li>
        </ul>
    </div>
    <br> -->

    <div class="home">
        <div class="homeBody">
            <img src="img/LogoB.svg">
        </div>
        <div class="homeBody RegLog">
            <h1>Register | Step 1</h1>
            <p class="description">Welcome to IMS! Register now to start managing your inventory.</p>
            <form id="userCheck" action="register.php" method="post">
                <div class="input-group">
                <label for="username">Pick a Username</label>
                <input type="text" id="username" name="username" required>
                </div>
                <div class="input-group">
                <button id="checkuser" type="submit">Next</button>
                </div>
            </form>
            <p class="backLink">Already have an account? <b><a href="signin.php">Login</a></b></p>
        </div>
    </div>

    <?php include "include/notification.php" ?>
</body>
</html>