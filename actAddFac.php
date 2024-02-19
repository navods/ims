<?php

require_once "include/dbh.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['fac'])) {

        $facName = $_POST['fac'];
    
        $sql = "INSERT INTO fac (facName) VALUES ('$facName')";
    
        if ($conn->query($sql) === TRUE) {
            $_SESSION['message'] = "Faculty added successfully!";
            header("Location: addSection.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $_SESSION['message'] = "Please provide a faculty name";
        header("Location: addFac.php");
    }
}

$conn->close();