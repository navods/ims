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

    $sql = "SELECT * FROM fac";
    $facs = mysqli_query($conn, $sql);
} elseif ($type == 'lab') {
    $sql = "SELECT * FROM lab WHERE labID = '$ID'";
    $lab = mysqli_query($conn, $sql);

    $sec = mysqli_fetch_assoc($lab);
    $secName = $sec['labName'];

    $sql = "SELECT * FROM fac";
    $facs = mysqli_query($conn, $sql);
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
    <link rel="stylesheet" type="text/css" href="css/info.css">
    <title>Edit Section | IMS</title>
</head>
<body>
    <?php include "include/navbar.php" ?>
    <div class="bread">
        <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="sectionMenu.php">Section Manager</a></li>
            <li><a href="editSection.php">Edit Section</a></li>
            <li>Section Info</li>
        </ul>
    </div>
    <br>

    <div class="container">
        <h1 class="heading"><?= $secName ?></h1>
        <form id="addLabForm" action="actEditSection2.php" method="post">

        <?php
        echo "<div class='infoItem'>
            <label for='".$type."ID'>ID Number:</label>
            <input type='text' id='".$type."ID' name='".$type."ID' value='".$ID."' readonly>
        </div>";

        if ($type == 'fac') {
            echo "<input type='hidden' id='type' name='type' value='fac'>";
            
        } elseif ($type == 'dep') {
            echo "<input type='hidden' id='type' name='type' value='dep'>";
            echo "<div class='infoItem'>
                <label for='fac'>Select Parent Faculty:</label>
                <select id='fac' name='fac' required onchange='updateDepartments()'>";

                    while ($row = mysqli_fetch_assoc($facs)) {
                        if ($row['facID'] == $sec['facID']) {
                            echo "<option value=".$row['facID']." selected>".$row['facName']."</option>";
                        } else {
                            echo "<option value=".$row['facID'].">".$row['facName']."</option>";
                        }
                    }

            echo "</select>
                </div>";

        } elseif ($type == 'lab') {
            echo "<input type='hidden' id='type' name='type' value='lab'>";
            echo "<div class='infoItem'>
                <label for='fac'>Select Parent Faculty:</label>
                <select id='fac' name='fac' required onchange='updateDepartments()'>";

                    while ($row = mysqli_fetch_assoc($facs)) {
                        if ($row['facID'] == $sec['facID']) {
                            echo "<option value=".$row['facID']." selected>".$row['facName']."</option>";
                        } else {
                            echo "<option value=".$row['facID'].">".$row['facName']."</option>";
                        }
                    }

            echo "</select>
                </div>";
            
            echo "<div class='infoItem'>   
                <label for='dep'>Select Parent Department:</label>
                <select id='dep' name='dep' required>
                </select>
            </div>";
        }

        echo "<div class='infoItem'>
            <label for='".$type."Name'>Name:</label>
            <input type='text' id='".$type."Name' name='".$type."Name' value='".$secName."'>
        </div>";

        ?>
            <div class="infoItem">
                <button id="submit" type="submit">Save</button>
            </div>
        </form>
    </div>
    <?php include "include/notification.php" ?>
</body>
</html>

<script>
    window.onload = function() {
        updateDepartments();
    };

    function updateDepartments() {
        var facultySelect = document.getElementById("fac");
        var departmentSelect = document.getElementById("dep");
        var facultyId = facultySelect.value;
        var cDep = "<?= $sec['depID'] ?>";

        if (facultyId !== "") {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var departments = JSON.parse(xhr.responseText);
                        departments.forEach(function(department) {
                            var option = document.createElement("option");
                            option.value = department.id;
                            option.text = department.name;
                            
                            if (department.id == cDep) {
                                option.setAttribute("selected", "selected");
                            }
                            
                            departmentSelect.appendChild(option);
                        });
                    } else {
                        console.error('Error: ' + xhr.status);
                    }
                }
            };
            xhr.open('GET', 'get_departments.php?faculty_id=' + facultyId, true);
            xhr.send();
        }
    }
</script>