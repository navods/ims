<?php

    require_once "include/dbh.php";
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        $stmt = $conn->prepare("SELECT username, password, userSection, userP FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($username, $dbpassword, $userSection, $userP);
        $stmt->fetch();
        $stmt->close();
        

        if ($dbpassword && password_verify($password, $dbpassword)) {
            $_SESSION['username'] = $username;
            $_SESSION['userSection'] = $userSection;
            $_SESSION['userP'] = $userP;
            if ($_SESSION['userP'] == 0) {
                header("Location: requested.php");
            }
            if ($_SESSION['userP'] == 1) {
                header("Location: dashboard.php");
            }
            if ($_SESSION['userP'] == -1) {
                header("Location: regDenied.php");
            }
            exit();
        } else {
            echo "Error: Incorrect Username or Password";
        }
    }

    // Close the connection
    $conn->close();