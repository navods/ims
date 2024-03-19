<?php
session_start();
require_once "include/dbh.php";

$sql = "SELECT username, fullname, email FROM users WHERE userP = 0";

$result = mysqli_query($conn, $sql);
$resultcheck = mysqli_num_rows($result);

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
                    <th style="width: 20%;">Username</th>
                    <th style="width: 30%;">Full Name</th>
                    <th style="width: 30%;">E-mail</th>
                    <th style="width: 20%;">Actions</th>
                </tr>
                <?php
                if ($resultcheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $user = $row['username'];
                        echo "<tr>";
                        echo "<td>".$row['username']."</td>";
                        echo "<td>".$row['fullname']."</td>";
                        echo "<td>".$row['email']."</td>";
                        echo "<td class='dropdown'>
                                <button class='tableBtns green'>Accept</button>
                                <a href='actRejectUserReqs.php?username=".$user."'><button class='tableBtns red'>Reject</button></a>
                            </td>";
                        echo "</tr>";
                        echo "<tr id='section' style='display: none;'>
                            <td>Section :</td>";
                        echo "<td><select id='faculty' name='faculty' onchange='updateDepartments(); updateLabs()'>
                                <option value=''>Select Faculty</option>";
                                if ($faccheck > 0) {
                                    while ($row = mysqli_fetch_assoc($fac)) {
                                        echo "<option value=".$row['facID'].">".$row['facName']."</option>";
                                    }
                                }
                            echo "</select></td>
                            <td><select id='department' name='department' onchange='updateLabs()'>
                                <option value=''>Select Department</option>
                            </select></td>
                            <td><select id='lab' name='lab'>
                                <option value=''>Select Lab</option>
                            </select></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr>";
                    echo "<td colspan='6' class='dataless'>";
                    echo "No New Requests";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
    <?php include "include/notification.php" ?>
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

    function updatePermissions() {
        var permissionSelect = document.getElementById("permission");
        var row = document.getElementById("section");

        // Hide all items initially
        row.style.display = "none";

        // Check if a positive value is selected
        if (permissionSelect.value > 0) {
            row.style.display = "table-row";
        }
    }

</script>






<!-- <select name='permissions[]' id='perm".$user."' onchange='updatePermissions()'>
                                        <option value='0'>No Access</option>
                                        <option value='1'>Accept - Assistant</option>
                                        <option value='2'>Accept - Supervisor</option>
                                        <option value='3'>Accept - Administrator</option>
                                        <option value='-1'>Reject Request</option>
                                    </select> -->