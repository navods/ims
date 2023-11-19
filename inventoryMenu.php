<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>Dashboard | IMS</title>
</head>
<body>
    <?php include "include/navbar.php" ?>
    <div class="bread">
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li>Inventory Manager</li>
        </ul>
    </div>
    <br>

    <div class="menu">
        <div class="menuItem"><a href="inventoryMenu.php">Inventory Manager</a></div>
        <div class="menuItem"><a href="reportsMenu.php">Reports</a></div>
        <div class="menuItem"><a href="sectionMenu.php">Section Manager</a></div>
        <div class="menuItem"><a href="permissionMenu.php">User Permission Manager</a></div>
        <div class="menuItem"><a href="profileMenu.php">Profile</a></div>
    </div>
</body>
</html>