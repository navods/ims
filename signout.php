<?php
    session_start();
    $_SESSION = array();
    session_destroy();
    // echo $_SESSION['username'] . "<br>" . $_SESSION['userSection'] . "<br>" . $_SESSION['userP'] . "<br>";
    header("Location: index.php");
    exit();