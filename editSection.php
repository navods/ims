<?php
session_start();
require_once "include/dbh.php";

$facsql = "SELECT facID, facName FROM fac";

$facResult = mysqli_query($conn, $facsql);
$facResultcheck = mysqli_num_rows($facResult);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/icon.svg">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <title>Section Database | IMS</title>
</head>
<body>
    <?php include "include/navbar.php" ?>
    <div class="bread">
        <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="sectionMenu.php">Section Manager</a></li>
            <li>Section Database</li>
        </ul>
    </div>
    <br>
    <div class="container">
        <h1>Section Database</h1>
        <div class="table">
            <table>
                <tr>
                    <th>Title</th>
                    <th>ID</th>
                    <th>Actions</th>
                </tr>
                <?php
                if ($facResultcheck > 0) {
                    while ($facRow = mysqli_fetch_assoc($facResult)) {
                        $type = "fac";
                        echo "<tr>";
                        echo "<td>".$facRow['facName']."</td>";
                        echo "<td>".$facRow['facID']."</td>";
                        echo "<td class='data'>";
                        echo "<div class='menuContainer'>";
                        echo "<button class='menuBtn'><div class=\"editCircle\"><img src=\"img/3dots.svg\"></div></button>";
                        echo "<div class='menuContent'>";
                        echo "<a href='actEditSection.php?type=".$type."&ID=".$facRow['facID']."'>Edit</a>";
                        echo "<a href='actDeleteSection.php?type=".$type."&ID=".$facRow['facID']."'>Delete</a>";
                        echo "</div>";
                        echo "</div>";
                        echo "</td>";
                        echo "</tr>";

                        $depsql = "SELECT depID, depName FROM dep WHERE facID = ".$facRow['facID'];

                        $depResult = mysqli_query($conn, $depsql);
                        $depResultcheck = mysqli_num_rows($depResult);

                        if ($depResultcheck > 0) {
                            while ($depRow = mysqli_fetch_assoc($depResult)) {
                                $type = 'dep';
                                echo "<tr>";
                                echo "<td>"."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$depRow['depName']."</td>";
                                echo "<td>".$facRow['facID']." / ".$depRow['depID']."</td>";
                                echo "<td class='data'>";
                                echo "<div class='menuContainer'>";
                                echo "<button class='menuBtn'><div class=\"editCircle\"><img src=\"img/3dots.svg\"></div></button>";
                                echo "<div class='menuContent'>";
                                echo "<a href='actEditSection.php?type=".$type."&ID=".$depRow['depID']."'>Edit</a>";
                                echo "<a href='actDeleteSection.php?type=".$type."&ID=".$depRow['depID']."'>Delete</a>";
                                echo "</div>";
                                echo "</div>";
                                echo "</td>";
                                echo "</tr>";

                                $labsql = "SELECT labID, labName FROM lab WHERE facID = ".$facRow['facID']. " AND depID = " .$depRow['depID'];

                                $labResult = mysqli_query($conn, $labsql);
                                $labResultcheck = mysqli_num_rows($labResult);

                                if ($labResultcheck > 0) {
                                    while ($labRow = mysqli_fetch_assoc($labResult)) {
                                        $type = 'lab';
                                        echo "<tr>";
                                        echo "<td>"."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$labRow['labName']."</td>";
                                        echo "<td>".$facRow['facID']." / ".$depRow['depID']." / ".$labRow['labID']."</td>";
                                        echo "<td class='data'>";
                                        echo "<div class='menuContainer'>";
                                        echo "<button class='menuBtn'><div class=\"editCircle\"><img src=\"img/3dots.svg\"></div></button>";
                                        echo "<div class='menuContent'>";
                                        echo "<a href='actEditSection.php?type=".$type."&ID=".$labRow['labID']."'>Edit</a>";
                                        echo "<a href='actDeleteSection.php?type=".$type."&ID=".$labRow['labID']."'>Delete</a>";
                                        echo "</div>";
                                        echo "</div>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                }
                            }
                        }
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