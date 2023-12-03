<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the 'username' field is set in the POST data
    if (isset($_POST['username'])) {
        // Retrieve the username from the form data
        $username = $_POST['username'];

        // Your database connection logic goes here
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

        // Sanitize input to prevent SQL injection (you can use prepared statements for better security)
        $sanitizedUsername = $conn->real_escape_string($username);

        // SQL query to check if the username exists in the table
        $sql = "SELECT * FROM users WHERE username='$sanitizedUsername'";
        
        // Execute the query
        $result = $conn->query($sql);

        // Check if there are any results
        if ($result && $result->num_rows > 0) {
            // Username exists, redirect to register.php with a message
            header("Location: register.php?message=The%20selected%20username%20is%20not%20available");
            exit();
        } else {
            // Username doesn't exist, redirect to register2.php
            header("Location: register2.php?username=" . urlencode($username));
            exit();
        }

        // Close the database connection
        $conn->close();
    } else {
        // Username field is not set in the POST data
        echo "Please provide a username";
    }
} else {
    // Invalid request method
    echo "Invalid request method";
}
?>