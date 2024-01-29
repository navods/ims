<?php

if(isset($_GET['username'])) {
    $username = $_GET['username'];
}

require_once "include/dbh.php";

//(SELECT secName FROM sections WHERE secID = userSection) AS section
$sql = "SELECT username, fullName, email,
            CASE 
                WHEN userP = 1 THEN 'Assistant'
                WHEN userP = 2 THEN 'Supervisor'
                WHEN userP = 3 THEN 'Administrator'
                ELSE 'Unknown'
            END AS title, userSection FROM users WHERE username = '$username'";

$result = mysqli_query($conn, $sql);
$resultcheck = mysqli_num_rows($result);

if ($resultcheck == 1) {
    $row = mysqli_fetch_assoc($result);

    $fullName = $row['fullName'];
    $email = $row['email'];
    $title = $row['title'];
    $userSection = $row['userSection'];
}

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
    <title>User Info | IMS</title>
</head>
<body>
    <?php include "include/navbar.php" ?>
    <div class="bread">
        <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="permissionMenu.php">User Permission Manager</a></li>
            <li><a href="userList.php">User Database</a></li>
            <li>User Info</li>
        </ul>
    </div>
    <br>

    <div class="container">
        <h1><?php echo $fullName ?></h1>
        <form id="edit-form" action="actEditUserCont.php" method="post">
                <div class="infoItem">
                <label for="fullName">Username</label>
                <input type="text" id="username" name="username">
                </div>
                <div class="infoItem">
                <label for="email">E-mail</label>
                <input type="text" id="email" name="email">
                </div>
                <div class="infoItem">
                    <label for="faculty">Select Faculty:</label>
                    <select id="faculty" name="faculty" onchange="updateDepartments(); updateLabs()">
                        <option value="">Select Faculty</option>
                        <?php
                        if ($faccheck > 0) {
                            while ($row = mysqli_fetch_assoc($fac)) {
                                echo "<option value=".$row['facID'].">".$row['facName']."</option>";
                            }
                        }
                        ?>
                    </select>
                    
                    <label for="department">Select Department:</label>
                    <select id="department" name="department" onchange="updateLabs()">
                        <option value="">Select Department</option>
                    </select>

                    <label for="lab">Select Lab:</label>
                    <select id="lab" name="lab">
                        <option value="">Select Lab</option>
                    </select>
                </div>
                <div class="infoItem">
                <button id="update" type="submit">Update</button>
                </div>
            </form>
    </div>
</body>
</html>

<script>
    function updateDepartments() {
        var facultySelect = document.getElementById("faculty");
        var departmentSelect = document.getElementById("department");
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

    function updateLabs() {
        var departmentSelect = document.getElementById("department");
        var labSelect = document.getElementById("lab");
        var departmentId = departmentSelect.value;

        labSelect.innerHTML = '<option value="">Select Lab</option>';

        if (departmentId !== "") {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var labs = JSON.parse(xhr.responseText);
                        labs.forEach(function(lab) {
                            var option = document.createElement("option");
                            option.value = lab.id;
                            option.text = lab.name;
                            labSelect.appendChild(option);
                        });
                    } else {
                        console.error('Error: ' + xhr.status);
                    }
                }
            };
            xhr.open('GET', 'get_labs.php?department_id=' + departmentId, true);
            xhr.send();
        }
    }
</script>