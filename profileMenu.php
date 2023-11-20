<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/icon.svg">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>Profile | IMS</title>
</head>
<body>
    <?php include "include/navbar.php" ?>
    <div class="bread">
        <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li>Profile</li>
        </ul>
    </div>
    <br>

    <div class="menu">
        <div class="menuItem"><a href="editProfile.php">Edit Profile</a></div>
        <div class="menuItem"><a href="changePassword.php">Change Password</a></div>
        <div class="menuItem"><a href="deleteAccount.php">Delete Account</a></div>
    </div>
</body>
</html>