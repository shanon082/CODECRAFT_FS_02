<?php
require 'db.php';
require 'PHPMailer/PHPMailer/PHPMailer.php';
require 'PHPMailer/PHPMailer/SMTP.php';
require 'PHPMailer/PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if($_SERVER["REQUEST_METHOD"] == 'POST'){
    $email = $_POST['email'];

    $stmt = $myconn->prepare('SELECT * FROM user_details WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $otp = rand(100000,999999);
        session_start();
        $_SESSION['otp'] = $otp;
        $_SESSION['email'] = $email;

        $mail = new PHPMailer(true);
        try{
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'shanonsimon082@gmail.com';
            $mail->Password = '';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 500;

            $mail->setFrom('shanonsimon082@gmail.com','CODECRAFT_FS_02: EMPLOYEE MANAGEMENT SYSTEM');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Your OTP for employee management system';
            $mail->Body = "your OTP is: <strong>$otp</strong> ignore if not requested";

            $mail->send();
            echo"OTP sent to your email. <a href='verifyOtp.html'>Verify OTP</a>";
        }
        catch(Exception $e){
            echo'Error sending the OTP: '. $e->getMessage();
        }
    }
    else{
        echo'Email not found';
    }
}

?>