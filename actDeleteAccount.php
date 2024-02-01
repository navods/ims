<?php
session_start();
$username = $_SESSION['username'];

require_once "include/dbh.php";

$sql = "DELETE FROM users WHERE username = '$username'";
        
if ($conn->query($sql) === TRUE) {
    $_SESSION['message'] = "Successfully Deleted User Record";
    header("Location: index.php");
    exit();
} else {
    $_SESSION['message'] = "Error deleting User record.";
    header("Location: deleteAccount.php");
}

$conn->close();