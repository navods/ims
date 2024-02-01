<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/icon.svg">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>Inventory Manager | IMS</title>
</head>
<body>
    <?php include "include/navbar.php" ?>
    <div class="bread">
        <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li>Inventory Manager</li>
        </ul>
    </div>
    <br>

    <div class="menu">
        <div class="menuItem"><a href="addDevices.php">Add Devices</a></div>
        <div class="menuItem"><a href="reviewDevices.php">Review Devices</a></div>
        <div class="menuItem"><a href="searchDevices.php">Search Devices</a></div>
        <div class="menuItem"><a href="activeRepairs.php">View Active Repairs</a></div>
        <div class="menuItem"><a href="devicesList.php">View Database</a></div>
        <div class="menuItem"><a href="sellersList.php">Sellers & Service Providers</a></div>
    </div>
</body>
</html>