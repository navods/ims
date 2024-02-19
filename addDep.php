<?php session_start();

require_once "include/dbh.php";

$sql = "SELECT facID, facName FROM fac";

$fac = mysqli_query($conn, $sql);
$faccheck = mysqli_num_rows($fac);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/icon.svg">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/info.css">
    <title>Add Department | IMS</title>
</head>
<body>
    <?php include "include/navbar.php" ?>
    <div class="bread">
        <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="sectionMenu.php">Section Manager</a></li>
            <li><a href="addSection.php">Add Section</a></li>
            <li>Add Department</li>
        </ul>
    </div>
    <br>

    <div class="container">
        <h1 class="heading">Add Department</h1>
        <form id="addDepForm" action="actAddDep.php" method="post">
            <div class="infoItem">
                <label for="fac">Select Parent Faculty:</label>
                <select id="fac" name="fac" required>
                    <option value="">Select Faculty</option>
                    <?php
                    if ($faccheck > 0) {
                        while ($row = mysqli_fetch_assoc($fac)) {
                            echo "<option value=".$row['facID'].">".$row['facName']."</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="infoItem">
                <label for="dep">New Department Name:</label>
                <input type="text" id="dep" name="dep">
            </div>
            <div class="infoItem">
                <button id="submit" type="submit">Create</button>
            </div>
        </form>
    </div>
    <?php include "include/notification.php" ?>
</body>
</html>