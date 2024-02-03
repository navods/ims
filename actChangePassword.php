<?php

session_start();
$username = $_SESSION['username'];

require_once "include/dbh.php";

$sql = "SELECT password FROM users WHERE username = '$username'";

$result = mysqli_query($conn, $sql);
$resultcheck = mysqli_num_rows($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $oldPass = $_POST['oldPass'];
    $newPass = $_POST['newPass'];
    $confirmPass = $_POST['confirmPass'];

    if ($confirmPass != $newPass) {
        $_SESSION['message'] = "Passwords do not match";
        header("Location: changePassword.php");
        exit();
    }

    if ($resultcheck == 1) {
        $row = mysqli_fetch_assoc($result);

        $dbpassword = $row['password'];

        if ($dbpassword && password_verify($oldPass, $dbpassword)) {
            $_SESSION['username'] = $username;
            $_SESSION['userP'] = $userP;
            if ($_SESSION['userP'] == 0) {
                header("Location: requested.php");
            }elseif ($_SESSION['userP'] > 0) {
                header("Location: dashboard.php");
            } elseif ($_SESSION['userP'] < -1) {
                header("Location: regDenied.php");
            }
            exit();
        } else {
            echo "Error: Incorrect Username or Password";
        }
    }
}
?>