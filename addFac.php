<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/icon.svg">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/info.css">
    <title>Add Faculty | IMS</title>
</head>
<body>
    <?php include "include/navbar.php" ?>
    <div class="bread">
        <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="sectionMenu.php">Section Manager</a></li>
            <li><a href="addSection.php">Add Section</a></li>
            <li>Add Faculty</li>
        </ul>
    </div>
    <br>

    <div class="container">
        <h1 class="heading">Add Faculty</h1>
        <form id="addFacForm" action="actAddFac.php" method="post">
            <div class="infoItem">
                <label for="fac">New Faculty Name:</label>
                <input type="text" id="fac" name="fac">
            </div>
            <div class="infoItem">
                <button id="submit" type="submit">Create</button>
            </div>
        </form>
    </div>
    <?php include "include/notification.php" ?>
</body>
</html>