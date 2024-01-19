<?php

    require_once "include/dbh.php";
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_SESSION['username'];
        $fullName = $_POST['fullName'];
        $email = $_POST['email'];
        $password = $_POST['password']; // Password should be encrypted before storage
        
        // Encrypting the password using password_hash (PHP 5 >= 5.5.0, PHP 7)
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
        // SQL query to insert data into the users table
        $sql = "INSERT INTO users (username, fullName, email, password) VALUES ('$username', '$fullName', '$email', '$hashed_password')";
    
        if ($conn->query($sql) === TRUE) {
            header("Location: requested.php");
            $_SESSION['permission'] = 0;
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close the connection
    $conn->close();