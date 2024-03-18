<?php

    require_once "include/dbh.php";
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST['type'])) {

            $type = $_POST['type'];

            if ($type == 'fac') {
                $facID = $_POST['facID'];
                $facName = $_POST['facName'];

                $sql = "UPDATE fac SET facName = '$facName' WHERE facID = '$facID'";
            } elseif ($type == 'dep') {
                $depID = $_POST['depID'];
                $depName = $_POST['depName'];
                $facID = $_POST['fac'];

                $sql = "UPDATE dep SET depName = '$depName', facID = '$facID' WHERE depID = '$depID'";
            } elseif ($type == 'lab') {
                $labID = $_POST['labID'];
                $facID = $_POST['fac'];
                $depID = $_POST['dep'];
                $labName = $_POST['labName'];

                $sql = "UPDATE lab SET labName = '$labName', depID = '$depID', facID = '$facID' WHERE labID = '$labID'";
            }
        
            if ($conn->query($sql) === TRUE) {
                $_SESSION['message'] = "Section updated successfully!";
                header("Location: editSection.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            $_SESSION['message'] = "Please complete all the information.";
            header("Location: editSection.php");
        }
    }

    $conn->close();