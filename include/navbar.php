<?php

session_start();
if (isset($_SESSION['username'])) {
    if ($_SESSION['userP'] == 0) {
        header("Location: requested.php");
        exit();
    } elseif ($_SESSION['userP'] == -1) {
        header("Location: regDenied.php");
        exit();
    }
} else {
    header("Location: signin.php");
    exit();
}
?>

<header>
    <img class="navLogo" src="img/shortLogoW.svg">
    <nav class="navText">
        <div><a href="dashboard.php">Dashboard</a></div>
        <div><a href="profileMenu.php">Profile</a></div>
        <div><a href="signout.php">SignOut</a></div>
    </nav>
</header>