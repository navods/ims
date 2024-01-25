<?php

    require_once "include/dbh.php";
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST['fullName']) && isset($_POST['email']) && isset($_POST['password'])) {

            $username = $_SESSION['username'];
            $fullName = $_POST['fullName'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
            $sql = "INSERT INTO users (username, fullName, email, password) VALUES ('$username', '$fullName', '$email', '$hashed_password')";
        
            if ($conn->query($sql) === TRUE) {
                header("Location: requested.php");
                $_SESSION['userP'] = 0;
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            $_SESSION['message'] = "Please complete all the information.";
            header("Location: register2.php");
        }
    }

    $conn->close();