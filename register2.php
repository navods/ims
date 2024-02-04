<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/icon.svg">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/home.css">
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
            <li>REGISTER | STEP 02</li>
        </ul>
    </div>
    <br> -->

    <div class="home">
        <div class="homeBody">
            <img src="img/LogoB.svg">
        </div>
        <div class="homeBody RegLog">
            <h1>Register | Step 2</h1>
            <p class="description">Please enter your details to complete the registration.</p>
            <form id="login-form" action="registerCont.php" method="post">
                <div class="input-group">
                <label for="fullName">Full Name</label>
                <input type="text" id="fullName" name="fullName">
                </div>
                <div class="input-group">
                <label for="email">E-mail</label>
                <input type="text" id="email" name="email">
                </div>
                <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
                </div>
                <div class="input-group">
                <button id="register" type="submit">Register</button>
                </div>
            </form>
            <p class="backLink">Already have an account? <b><a href="signin.php">Login</a></b></p>
        </div>
    </div>

    <?php include "include/notification.php" ?>
</body>
</html>