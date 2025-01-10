<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="wrapper">
        <form action="signup_processing.php" method="post">
            <h1>Create your Account</h1>
            <label for="username">Enter your Username</label>
            <input type="text" placeholder="user name" name="username" required>

            <label for="email">Enter your Email</label>
            <input type="email" name="email" id placeholder="Email" required>

            <label for="password">Enter your password</label>
            <input type="password" name="password" placeholder="Password" required>

            <label for="password">Confirm your password</label>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>

            <?php
                if(isset($_SESSION["error"])){
                    echo $_SESSION["error"];
                    unset($_SESSION["error"]);
                }
                if(isset($_SESSION["success"])){
                    echo $_SESSION["success"];
                    unset($_SESSION["success"]);
                }
            ?>

            <div class="links">
                <a href="login.php">Aready have an account</a>
            </div>
            <button type="submit">Signup</button>
        </form>
    </div>
</body>

</html>