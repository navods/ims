<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/icon.svg">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/info.css">
    <title>Add Section | IMS</title>
</head>
<body>
    <?php include "include/navbar.php" ?>
    <div class="bread">
        <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="sectionMenu.php">Section Manager</a></li>
            <li>Add Section</li>
        </ul>
    </div>
    <br>

    <div class="menu">
        <div class="menuItem"><a href="addFac.php">Faculty</a></div>
        <div class="menuItem"><a href="addDep.php">Department</a></div>
        <div class="menuItem"><a href="addLab.php">Lab</a></div>
    </div>
    
    <?php include "include/notification.php" ?>
</body>
</html>