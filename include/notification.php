<div id="notification" class="notification"></div>
<script>
        <?php if(isset($_SESSION['message'])): ?>
            var message = "<?php echo $_SESSION['message'] ?>";
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