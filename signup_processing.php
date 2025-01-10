<?php
require("db.php");
session_start();

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $confirm_password = $_POST["confirm_password"];

    unset($_SESSION["error"]);
    if (empty($username) || empty($password) || empty($email) || empty($confirm_password)) {
        $_SESSION["error"] = "Empty fields";
        header("Location: signup.php");
        // exit;
    }else{
        if($password !== $confirm_password){
            $_SESSION["error"] = "password doesn't match";
            header("Location: signup.php");
            // exit;
        }
        else{
            $stmt= $conn->prepare("SELECT * FROM user_details WHERE username =?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows > 0){
                $_SESSION["error"] = "username already taken choose another one";
                header("Location: signup.php");
                // exit;
            }else{
                $password_hash = password_hash($password, PASSWORD_DEFAULT);

                $stmt = $conn->prepare("INSERT INTO user_details(username,email,password) VALUE (?,?,?)");
                $stmt->bind_param("sss", $username, $email, $password_hash);
    
                if ($stmt->execute() === TRUE) {
                    $_SESSION["success"] = "Account created, login to continue";
                    header("Location: login.php");
                }else{
                    echo"error: ".$stmt->error;
                }
            }

        }
    }
}
