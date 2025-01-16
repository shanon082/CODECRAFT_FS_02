<?php
session_start();
unset($_SESSION["error"]);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $entered_otp = $_POST['otp'];

    if($entered_otp == $_SESSION['otp']){
        header('Location: reset_password.php');
    }
    else{
        $_SESSION['error'] = "invalid OTP. please try again";
        header("Location: verifyOtppage.php");
    }
}
?>