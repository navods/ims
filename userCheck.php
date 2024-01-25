<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username'])) {
        $username = $_POST['username'];

        require_once "include/dbh.php";

        $sanitizedUsername = $conn->real_escape_string($username);

        $sql = "SELECT * FROM users WHERE username='$sanitizedUsername'";
        
        $result = $conn->query($sql);

        session_start();

        if ($result && $result->num_rows > 0) {
            $_SESSION['message'] = "The selected username is already taken.";
            header("Location: register.php");
            $conn->close();
            exit();
        } else {
            $_SESSION['username'] = $username;
            header("Location: register2.php");
            $conn->close();
            exit();
        }

    } else {
        $_SESSION['message'] = "Please enter a username.";
        header("Location: register.php");
        exit();
    }
}