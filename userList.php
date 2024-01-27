<?php
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/icon.svg">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>User Permission Manager | IMS</title>
</head>
<body>
    <?php include "include/navbar.php" ?>
    <div class="bread">
        <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li>User Permission Manager</li>
            <li>User Database</li>
        </ul>
    </div>
    <br>

    <div class="table">
        <table>
            <tr>
                <th>Username</th>
                <th>Full Name</th>
                <th>E-mail</th>
                <th>Title</th>
                <th>Section</th>
                <th>Actions</th>
            </tr>
        </table>
    </div>
</body>
</html>