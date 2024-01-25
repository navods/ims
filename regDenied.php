<?php

session_start();
if (!isset($_SESSION['username']) || $_SESSION['userP'] != -1) {
    header("Location: signin.php");
    exit();
}
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
        </nav>
    </header>
    <!-- <div class="bread">
        <ul class="breadcrumb">
            <li>REGISTER | STEP 03</li>
        </ul>
    </div>
    <br> -->

    <div class="home">
        <div class="homeBody">
            <img src="img/LogoB.svg">
        </div>
        <div class="homeBody RegLog">
            <h1>Request Denied!</h1>
            <p class="description">Your request has been denied by an administrator. If you think we have made a mistake, please contact your supervisor.</p>
            <p class="backLink">Thank You</p>
        </div>
    </div>

</body>
</html>

<?php
    $_SESSION = [];
?>