<?php
session_start();
require_once "include/dbh.php";

$sql = "SELECT username, fullname, email,
            CASE 
                WHEN userP = 1 THEN 'Assistant'
                WHEN userP = 2 THEN 'Supervisor'
                WHEN userP = 3 THEN 'Administrator'
                ELSE 'Unknown'
            END AS title FROM users WHERE userP > 0";

$result = mysqli_query($conn, $sql);
$resultcheck = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/icon.svg">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <title>User Database | IMS</title>
</head>
<body>
    <?php include "include/navbar.php" ?>
    <div class="bread">
        <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="permissionMenu.php">User Permission Manager</a></li>
            <li>User Database</li>
        </ul>
    </div>
    <br>
    <div class="container">
        <h1>User Database</h1>
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
                <?php
                if ($resultcheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>".$row['username']."</td>";
                        echo "<td>".$row['fullname']."</td>";
                        echo "<td>".$row['email']."</td>";
                        echo "<td>".$row['title']."</td>";
                        echo "<td></td>";
                        echo "<td class='data'>";
                        echo "<div class='menuContainer'>";
                        echo "<button class='menuBtn'><div class=\"editCircle\"><img src=\"img/3dots.svg\"></div></button>";
                        echo "<div class='menuContent'>";
                        echo "<a href='actEditUser.php?username=".$row['username']."'>Edit</a>";
                        echo "<a href='actDeleteUser.php?username=".$row['username']."'>Delete</a>";
                        echo "</div>";
                        echo "</div>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr>";
                    echo "<td colspan='6' class='dataless'>";
                    echo "No Records";
                    echo "</td>";
                    echo "</tr>";
                }

                $conn->close();
                ?>
            </table>
        </div>
    </div>
</body>
</html>