<?php
require("db.php");
session_start();


unset($_SESSION["error"]);
if ($_SERVER["REQUEST_METHOD"]== "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($email) && empty($password)) {
        $_SESSION['error'] = "Empty fields";
        header("Location: login.php");
        // exit();
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = "wrong email format enter the correct format";
            header("Location: login.php");
            // exit();
        } else {
            $stmt = $myconn->prepare("SELECT * FROM user_details WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();

            if ($result->num_rows > 0) {
                $_SESSION["username"] = $user["username"];
                header("Location: Employee.php");
            } else {
                $_SESSION['error'] = "wrong email or password";
                header("Location: login.php");
            }
        }
    }
}
