<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ims";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $fullName = $_POST['fullName'];
        $email = $_POST['email'];
        $password = $_POST['password']; // Password should be encrypted before storage
        
        // Encrypting the password using password_hash (PHP 5 >= 5.5.0, PHP 7)
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
        // SQL query to insert data into the users table
        $sql = "INSERT INTO users (username, fullName, email, password) VALUES ('$username', '$fullName', '$email', '$hashed_password')";
    
        if ($conn->query($sql) === TRUE) {
            header("Location: requested.php?permission=0");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close the connection
    $conn->close();