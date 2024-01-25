<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/icon.svg">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <title>Inventory Management System</title>
</head>
<body>
    <header>
        <img class="navLogo" src="img/shortLogoW.svg">
        <nav class="navText">
            <div><a href="register.php">Register</a></div>
            <div><a href="signin.php">Login</a></div>
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
            <img class="homePic" src="img/homePic.svg">
        </div>
        <div class="homeBody RegLog">
            <img class="homeLogo" src="img/shortLogoB.svg">
            <h1 id="greeting"></h1>
            <p class="description">Welcome to the Inventory Management System of University of Colombo, your centralized solution for tracking all equipment utilized across our esteemed institution. Designed exclusively for our staff, this system ensures efficient management and accountability of university resources, fostering a streamlined operational environment.</p>
            <div class="btns">
                <a href="register.php"><button class="btnEmp">Register</button></a>
                <a href="signin.php"><button class="btnFill">Login</button></a>
            </div>
        </div>
    </div>
</body>

    <script>
        var currentTime = new Date().getHours();

        var greeting;

        if (currentTime >= 5 && currentTime < 12) {
            greeting = "Good Morning";
        } else if (currentTime >= 12 && currentTime < 18) {
            greeting = "Good Afternoon";
        } else {
            greeting = "Good Evening";
        }

        document.getElementById("greeting").textContent = greeting;
    </script>

</html>