<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

    <div class="wrapper">
        <form action="login_processing.php" method="post">
            <h1>Login As Admin</h1>
            <label for="email">Enter your Email</label>
            <input type="email" placeholder="email" name="email" required>

            <label for="password">Enter your Password</label>
            <input type="password" placeholder="password" name="password" required>

            <?php
                if(isset($_SESSION["error"])){
                    echo $_SESSION["error"];
                    unset($_SESSION["error"]);
                }
            ?>
            
            <div class="links">
                <a href="forgotpassword.html">forgot password</a>
                <a href="signup.html">New user</a>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>

</body>
</html>