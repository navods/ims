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
    <title>Add Lab | IMS</title>
</head>
<body>
    <?php include "include/navbar.php" ?>
    <div class="bread">
        <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="sectionMenu.php">Section Manager</a></li>
            <li><a href="addSection.php">Add Section</a></li>
            <li>Add Lab</li>
        </ul>
    </div>
    <br>

    <div class="container">
        <h1 class="heading">Add Lab</h1>
        <form id="addLabForm" action="actAddLab.php" method="post">
            <div class="infoItem">
                <label for="fac">Select Parent Faculty:</label>
                <select id="fac" name="fac" required onchange="updateDepartments()">
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
                <label for="dep">Select Parent Department:</label>
                <select id="dep" name="dep" required>
                    <option value="">Select Department</option>
                </select>
            </div>
            <div class="infoItem">
                <label for="lab">New Lab Name:</label>
                <input type="text" id="lab" name="lab">
            </div>
            <div class="infoItem">
                <button id="submit" type="submit">Create</button>
            </div>
        </form>
    </div>
    <?php include "include/notification.php" ?>
</body>
</html>

<script>
    function updateDepartments() {
        var facultySelect = document.getElementById("fac");
        var departmentSelect = document.getElementById("dep");
        var facultyId = facultySelect.value;

        departmentSelect.innerHTML = '<option value="">Select Department</option>';

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