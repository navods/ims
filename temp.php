<?php
require_once "include/dbh.php";

//                (SELECT secName FROM sections WHERE secID = userSection) AS section
// Prepare SQL query
$stmt = "SELECT username, fullname, email,
            CASE 
                WHEN userP = 1 THEN 'Assistant'
                WHEN userP = 2 THEN 'Supervisor'
                WHEN userP = 3 THEN 'Administrator'
                ELSE 'Unknown'
            END AS title, userSection FROM users;";

$result = mysqli_query($conn, $stmt);
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
                        echo "<td>".$row['userSection']."</td>";
                        echo "<td>";
                        echo "<div class='menuContainer'>";
                        echo "<button class='menuBtn'><div class=\"editCircle\"><img src=\"img/3dots.svg\"></div></button>";
                        echo "<div class='menuContent'>";
                        echo "<a href='editUser.php?username=".$row['username']."'>Edit</a>"; // Edit link with id as a parameter
                        echo "<a href='deleteUser.php?username=".$row['username']."'>Delete</a>"; // Delete link with id as a parameter
                        echo "</div>";
                        echo "</div>";

                        echo "</td>";
                        echo "</tr>";
                    }
                }

                $conn->close();
                ?>
            </table>
            

        </div>
    </div>
</body>
</html>