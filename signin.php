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

    <div class="loginContainer">
        <div class="loginBody">
            <img src="img/shortLogoB.svg">
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
        </div>
    </div>
</body>
</html>