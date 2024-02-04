<?php

session_start();
$username = $_SESSION['username'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $oldPass = $_POST['oldPass'];
    $newPass = $_POST['newPass'];
    $confirmPass = $_POST['confirmPass'];

    require_once "include/dbh.php";

    $sql = "SELECT password FROM users WHERE username = '$username'";

    $result = mysqli_query($conn, $sql);
    $resultcheck = mysqli_num_rows($result);

    if ($resultcheck == 1) {
        $row = mysqli_fetch_assoc($result);

        $dbpassword = $row['password'];

        if ($dbpassword && password_verify($oldPass, $dbpassword)) {
            if ($confirmPass != $newPass) {
                $_SESSION['message'] = "Passwords do not match";
                header("Location: changePassword.php");
                exit();
            } elseif ($newPass === $oldPass) {
                $_SESSION['message'] = "The new password cannot be the same as your current password";
                header("Location: changePassword.php");
                exit();
            } else {
                $hashed_password = password_hash($newPass, PASSWORD_DEFAULT);
        
                $sql = "UPDATE users SET password = ? WHERE username = ?";

                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $hashed_password, $username);
            
                if ($stmt->execute()) {
                    $stmt->close();
                    $_SESSION['message'] = "Password updated successfully";
                    header("Location: changePassword.php");
                    exit();
                } else {
                    $stmt->close();
                    $_SESSION['message'] = "Error updating password";
                    header("Location: changePassword.php");
                    exit();
                }
            }
        } else {
            $_SESSION['message'] = "Current Password is incorrect";
            header("Location: changePassword.php");
            exit();
        }
    }
}