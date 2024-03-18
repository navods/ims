<?php

    require_once "include/dbh.php";
    session_start();

    if (isset($_GET['type']) && isset($_GET['ID'])) {

        $type = $_GET['type'];
        $ID = $_GET['ID'];

        if ($type == 'fac') {
            $sql = "DELETE FROM fac WHERE facID = '$ID'";
        } elseif ($type == 'dep') {
            $sql = "DELETE FROM dep WHERE depID = '$ID'";
        } elseif ($type == 'lab') {
            $sql = "DELETE FROM lab WHERE labID = '$ID'";
        }
    
        if ($conn->query($sql) === TRUE) {
            $_SESSION['message'] = "Section deleted successfully!";
            header("Location: editSection.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $_SESSION['message'] = "Error occurred";
        header("Location: editSection.php");
    }

    $conn->close();