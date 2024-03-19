<?php session_start();

require_once "include/dbh.php";

if (isset($_GET['username'])) {
    $username = $_GET['username'];

    $sql = "UPDATE users SET userP = -1 WHERE username = '$username'";
        
    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = $username . "'s request rejected";
        // header("Location: temp.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $_SESSION['message'] = "Error rejecting request";
    // header("Location: editSection.php");
}

$conn->close();