<?php
    // session_start();
    // if (isset($_SESSION['username'])) {
    //     $username = $_SESSION['username'];
    // }
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
            <li>REGISTER | STEP 02</li>
        </ul>
    </div>
    <br>

    <div class="loginContainer">
        <div class="registerBody">
            <img src="img/shortLogoB.svg">
            <form id="login-form" action="signinCont.php" method="post">
                <!-- <div class="input-group greyed">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="<?php echo $username ?>" readonly>
                </div> -->
                <div class="input-group">
                <label for="fullName">Full Name</label>
                <input type="text" id="fullName" name="fullName" required>
                </div>
                <div class="input-group">
                <label for="email">E-mail</label>
                <input type="text" id="email" name="email" required>
                </div>
                <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                </div>
                <div class="input-group">
                <button id="register" type="submit">Register</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>