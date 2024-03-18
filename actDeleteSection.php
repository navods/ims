<?php session_start();

$type = $_GET['type'];
$ID = $_GET['ID'];

require_once "include/dbh.php";

if ($type == 'fac') {
    $sql = "SELECT * FROM fac WHERE facID = '$ID'";
    $fac = mysqli_query($conn, $sql);

    $sec = mysqli_fetch_assoc($fac);
    $secName = $sec['facName'];
} elseif ($type == 'dep') {
    $sql = "SELECT * FROM dep WHERE depID = '$ID'";
    $dep = mysqli_query($conn, $sql);

    $sec = mysqli_fetch_assoc($dep);
    $secName = $sec['depName'];
    $facID = $sec['facID'];

    $sql = "SELECT facName FROM fac WHERE facID = '$facID'";
    $facs = mysqli_query($conn, $sql);
    $fac = mysqli_fetch_assoc($facs);
    $facName = $fac['facName'];
} elseif ($type == 'lab') {
    $sql = "SELECT * FROM lab WHERE labID = '$ID'";
    $lab = mysqli_query($conn, $sql);

    $sec = mysqli_fetch_assoc($lab);
    $secName = $sec['labName'];
    $facID = $sec['facID'];
    $depID = $sec['depID'];

    $sql = "SELECT facName FROM fac WHERE facID = '$facID'";
    $facs = mysqli_query($conn, $sql);
    $fac = mysqli_fetch_assoc($facs);
    $facName = $fac['facName'];

    $sql = "SELECT depName FROM dep WHERE depID = '$depID'";
    $deps = mysqli_query($conn, $sql);
    $dep = mysqli_fetch_assoc($deps);
    $depName = $dep['depName'];
} else {
    $_SESSION['message'] = "Invalid Section";
    header ("Location: editSection.php");
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
    <title>Delete Section | IMS</title>
</head>
<body>
    <?php include "include/navbar.php" ?>
    <div class="bread">
        <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="sectionMenu.php">Section Manager</a></li>
            <li><a href="editSection.php">Edit Section</a></li>
            <li><?= $secName ?></li>
        </ul>
    </div>
    <br>

    <div class="body">
        <div class="container">
            <div class="row"><h1 class="headline"><?= $secName ?></h1></div>
            <?php
                if ($type == 'dep') {
                    echo "<div class='row'><p class='description'>" . $facName . "</p></div>";
                } elseif ($type == 'lab') {
                    echo "<div class='row'><p class='description'>" . $depName . " | " . $facName . "</p></div>";
                }
            ?>
            
            <div class="row"><p class="description">Are you certain you wish to proceed with deleting this section? Please note that this action is irreversible and all section data will be permanently removed from our system.</p></div>
            <div class="row"><a href='actDeleteSection2.php?type=<?=$type?>&ID=<?=$ID?>'><button class="red">Delete</button></a><a href="editSection.php"><button class="border">Cancel</button></a></div>
        </div>
    </div>

    <?php include "include/notification.php" ?>
</body>
</html>