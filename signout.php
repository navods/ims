<?php
    session_start();
    $username = $_SESSION['username'];
    $_SESSION = array();
    session_destroy();

    session_start();
    $_SESSION['message'] = "$username Signed Out";
    header("Location: index.php");
    exit();