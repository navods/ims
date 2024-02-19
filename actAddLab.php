<?php

    require_once "include/dbh.php";
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST['fac']) && isset($_POST['dep']) && isset($_POST['lab'])) {

            $facID = $_POST['fac'];
            $depID = $_POST['dep'];
            $labName = $_POST['lab'];
        
            $sql = "INSERT INTO lab (facID, depID, labName) VALUES ('$facID', '$depID', '$labName')";
        
            if ($conn->query($sql) === TRUE) {
                $_SESSION['message'] = "Lab added successfully!";
                header("Location: addSection.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            $_SESSION['message'] = "Please complete all the information.";
            header("Location: addLab.php");
        }
    }

    $conn->close();