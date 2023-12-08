<?php
    require_once "userCheck.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/icon.svg">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="stylesheet" type="text/css" href="css/forms.css">
    <title>Register | Inventory Management System</title>
</head>
<body>
    <header>
        <img class="navLogo" src="img/shortLogoW.svg">
        <nav class="navText">
        <div><a href="index.php">Home</a></div>
            <div><a href="signin.php">Sign In</a></div>
        </nav>
    </header>
    <div class="bread">
        <ul class="breadcrumb">
            <li>REGISTER | STEP 01</li>
        </ul>
    </div>
    <br>

    <div class="loginContainer">
        <div class="registerBody">
            <img src="img/shortLogoB.svg">
            <form id="userCheck" action="register.php" method="post">
                <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
                </div>
                <div class="input-group">
                <button id="checkuser" type="submit">Next</button>
                </div>
            </form>
        </div>
    </div>

    <!-- <script>
    // Check for the message parameter in the URL
    window.onload = function() {
      const urlParams = new URLSearchParams(window.location.search);
      const message = urlParams.get('message');

      // If a message is received, display it as a popup
      if (message) {
        alert(message);
        // You can also use other methods to display the message in a modal or a specific UI element
      }
    };
    </script> -->

    <?php
        session_start();

        if (isset($_SESSION['message'])) {
            // Get the message from the session
            $message = $_SESSION['message'];

            // Display the message in a JavaScript popup
            echo "<script>alert('$message');</script>";

            // Unset or clear the 'message' session variable
            unset($_SESSION['message']);
        }
    ?>
</body>
</html>