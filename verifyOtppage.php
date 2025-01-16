<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify otp</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="wrapper">
        <form action="VerifyOtp.php" method="post">
            <h1>Verify your OTP code</h1>
            <label for="otp">Enter OTP</label>
            <input type="text" name="otp" placeholder="Enter your OTP" required>
            <button type="submit">Verify OTP</button>

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