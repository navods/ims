<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the 'username' field is set in the POST data
    if (isset($_POST['username'])) {
        // Retrieve the username from the form data
        $username = $_POST['username'];

        // Your database connection logic goes here
        require_once "include/dbh.php";

        // Sanitize input to prevent SQL injection (you can use prepared statements for better security)
        $sanitizedUsername = $conn->real_escape_string($username);

        // SQL query to check if the username exists in the table
        $sql = "SELECT * FROM users WHERE username='$sanitizedUsername'";
        
        // Execute the query
        $result = $conn->query($sql);

        session_start();

        // Check if there are any results
        if ($result && $result->num_rows > 0) {
            // Username exists, redirect to register.php with a message
            $_SESSION['message'] = "The selected username is unavailble.";
            header("Location: register.php");
            exit();
        } else {
            $_SESSION['username'] = $username;
            // Redirect to register2.php
            header("Location: register2.php");
            exit();

            // Username doesn't exist, redirect to register2.php
            // header("Location.href: register2.php?username=" . urlencode($username));
            // exit();
        }

        // Close the database connection
        $conn->close();
    } else {
        // Username field is not set in the POST data
        header("Location: register.php");
        $_SESSION['message'] = "Please enter a username.";
        exit();
    }
}
// } else {
//     // Invalid request method
//     // echo "Invalid request method";
// }