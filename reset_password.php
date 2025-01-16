<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reset password</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="wrapper">
        <form action="reset_password_processing.php" method="post">
        <h1>Reset your Password</h1>
            <label for="password">New Password</label>
            <input type="password" name="password" required>
            <label for="confirm_password">Confirm Password</label>
            <input type="password" name="confirm_password" required>
            <button type="submit">Reset Password</button>

            <?php
                if(isset($_SESSION["error"])){
                    echo $_SESSION["error"];
                    unset($_SESSION["error"]);
                }
            ?>
        </form>
    </div>
      
</body>
</html>