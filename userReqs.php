<?php
require_once "include/dbh.php";

$sql = "SELECT username, fullname, email FROM users WHERE userP = 0";

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
    <title>New Requests | IMS</title>
</head>
<body>
    <?php include "include/navbar.php" ?>
    <div class="bread">
        <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="permissionMenu.php">User Permission Manager</a></li>
            <li>New Requests</li>
        </ul>
    </div>
    <br>
    <div class="container">
        <h1>New Requests</h1>
        <div class="table">
            <table>
                <tr>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>E-mail</th>
                    <th>Actions</th>
                </tr>
                <?php
                if ($resultcheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>".$row['username']."</td>";
                        echo "<td>".$row['fullname']."</td>";
                        echo "<td>".$row['email']."</td>";
                        echo "<td class='dropdown'>
                            <select id='permission' name='permission'>
                                <option value=''>No Access</option>
                                <option value='1'>Accept - Assistant</option>
                                <option value='2'>Accept - Supervisor</option>
                                <option value='3'>Accept - Administrator</option>
                                <option value='-1'>Reject Request</option>
                            </select>
                        </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr>";
                    echo "<td colspan='6' class='dataless'>";
                    echo "No New Requests";
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