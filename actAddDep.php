<?php

    require_once "include/dbh.php";
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST['fac']) && isset($_POST['dep'])) {

            $facID = $_POST['fac'];
            $depName = $_POST['dep'];
        
            $sql = "INSERT INTO dep (facID, depName) VALUES ('$facID', '$depName')";
        
            if ($conn->query($sql) === TRUE) {
                $_SESSION['message'] = "Department added successfully!";
                header("Location: addSection.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            $_SESSION['message'] = "Please complete all the information.";
            header("Location: addDep.php");
        }
    }

    $conn->close();