<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/icon.svg">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/info.css">
    <title>Add Section | IMS</title>
</head>
<body>
    <?php include "include/navbar.php" ?>
    <div class="bread">
        <ul class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="sectionMenu.php">Section Manager</a></li>
            <li>Add Section</li>
        </ul>
    </div>
    <br>

    <div class="container">
        <h1 class="heading">Add Section</h1>
        <form id="addSectionForm" action="actAddSection.php" method="post">
            <div class="infoItem">
                <h3>Faculty</h3>
                <select id="faculty" name="faculty" onchange="updateDepartments(); updateLabs()">
                    <option value="">Create New or Select Existing</option>
                    <option value="new">Create New Faculty</option>
                    <?php
                    if ($faccheck > 0) {
                        while ($row = mysqli_fetch_assoc($fac)) {
                            echo "<option value=".$row['facID'].">".$row['facName']."</option>";
                        }
                    }
                    ?>
                </select>
                <input type="text" id="newFaculty" name="newFaculty">
            </div>
            <div class="infoItem">
                <h3>Department</h3>
                <select id="department" name="department" onchange="updateLabs()">
                    <option value="">Create New or Select Existing</option>
                    <option value="new">Create New Department</option>
                </select>
                <input type="text" id="newDepartment" name="newDepartment">
            </div>
            <div class="infoItem">
                <h3>Lab</h3>
                <select id="lab" name="lab" onchange="">
                    <option value="">Create New or Select Existing</option>
                    <option value="new">Create New Lab</option>
                </select>
                <input type="text" id="newLab" name="newLab">
            </div>
            <div class="infoItem">
                <button id="addSection" type="submit">Add Section</button>
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

        if (facultyId == "new")

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