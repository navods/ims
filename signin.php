<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/icon.svg">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="stylesheet" type="text/css" href="css/forms.css">
    <title>Sign In | Inventory Management System</title>
</head>
<body>
    <header>
        <img class="navLogo" src="img/shortLogoW.svg">
        <nav class="navText">
        <div><a href="index.php">Home</a></div>
            <div><a href="register.php">Register</a></div>
        </nav>
    </header>
    <!-- <div class="bread">
        <ul class="breadcrumb">
            <li>Home</li>
        </ul>
    </div> -->
    <br>

    <div class="home">
        <div class="homeBody">
            <img src="img/LogoB.svg">
        </div>
        <div class="homeBody RegLog">
        <h1>Login</h1>
            <p class="description">Welcome back! Please login to your account.</p>
            <form id="login-form" action="signinCont.php" method="post">
                <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
                </div>
                <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                </div>
                <div class="input-group">
                <button id="login" type="submit">Login</button>
                </div>
            </form>
            <p class="backLink">New user? <b><a href="register.php">Register</a></b></p>
        </div>
    </div>

    <div id="notification" class="notification"></div>
    <script>
        <?php
            session_start();
            if(isset($_SESSION['message'])): ?>
                var message = "<?php echo $_SESSION['message']; ?>"; 
                displayNotification(message);
            <?php unset($_SESSION['message']);?>
        <?php endif; ?>

        function displayNotification(message) {
            var notification = document.getElementById("notification");
            notification.textContent = message;
            notification.classList.add("show");
            setTimeout(function() {
                notification.classList.remove("show");
            }, 4000); // 4 seconds
        }
    </script>
</body>
</html>