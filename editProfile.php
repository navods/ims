<?php

session_start();
$username = $_SESSION['username'];

require_once "include/dbh.php";

$sql = "SELECT username, fullName, email, userFac, userDep, userLab,
            CASE 
                WHEN userP = 1 THEN 'Assistant'
                WHEN userP = 2 THEN 'Supervisor'
                WHEN userP = 3 THEN 'Administrator'
                ELSE 'Unknown'
            END AS title FROM users WHERE username = '$username'";

$result = mysqli_query($conn, $sql);
$resultcheck = mysqli_num_rows($result);

if ($resultcheck == 1) {
    $row = mysqli_fetch_assoc($result);

    $fullName = $row['fullName'];
    $email = $row['email'];
    $title = $row['title'];
    $userFac = $row['userFac'];
    $userDep = $row['userDep'];
    $userLab = $row['userLab'];
}

if(isset($userFac) && $userFac !== null) {
    $sql = "SELECT facName FROM fac WHERE facID = '$userFac'";

    $fac = mysqli_query($conn, $sql);
    $faccheck = mysqli_num_rows($fac);

    if ($resultcheck == 1) {
        $row = mysqli_fetch_assoc($result);

        $userFacName = $row['facName'];
    }

    if(isset($userDep) && $userDep !== null) {
        $sql = "SELECT depName FROM dep WHERE depID = '$userDep'";
    
        $dep = mysqli_query($conn, $sql);
        $depcheck = mysqli_num_rows($dep);
    
        if ($resultcheck == 1) {
            $row = mysqli_fetch_assoc($result);
    
            $userDepName = $row['depName'];
        }

        if(isset($userLab) && $userLab !== null) {
            $sql = "SELECT labName FROM lab WHERE labID = '$userLab'";
        
            $lab = mysqli_query($conn, $sql);
            $labcheck = mysqli_num_rows($lab);
        
            if ($resultcheck == 1) {
                $row = mysqli_fetch_assoc($result);
        
                $userLabName = $row['labName'];
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/icon.svg">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/confirmation.css">
    <title>Edit Profile | IMS</title>
</head>
<body>
    <?php include "include/navbar.php" ?>
    <div class="bread">
        <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="profileMenu.php">Profile</a></li>
            <li>Edit Profile</li>
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