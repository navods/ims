<?php

    // $dsn = "mysql:host=localhost;dbname=ims";
    // $dbusername = "root";
    // $dbpassword = "";

    // try {
    //     $pdo = new PDO($dsn, $dbusername, $dbpassword);
    //     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // }
    // catch (PDOException $e) {
    //     echo "Connection failed: " . $e->getMessage();
    // }

    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "ims";

    // Create a connection to the database
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }