<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Password Toggle</title>
<style>
    .password-container {
        position: relative;
        display: inline-block;
    }
    .password-toggle-btn {
        position: absolute;
        top: 0;
        right: 0;
        transform: translateY(-50%);
        cursor: pointer;
        z-index: 1;
    }
</style>
</head>
<body>

<div class="password-container">
    <input type="password" id="passwordInput">
    <span class="password-toggle-btn" onclick="togglePasswordVisibility()">
        <p id="phide" class="phide">SHOW</p>
    </span>
</div>

<script>
function togglePasswordVisibility() {
    var passwordInput = document.getElementById("passwordInput");
    var phide = document.getElementById("phide");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        phide.textContent = "HIDE";
    } else {
        passwordInput.type = "password";
        phide.textContent = "SHOW";
    }
}
</script>

</body>
</html>
