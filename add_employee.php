<?php
session_start();
include("db.php");

unset($_SESSION["status"]);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $otherNames = $_POST['otherNames'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];

    $uploadDir = 'uploads/';
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    $fileName = basename($_FILES['picture']['name']);
    $filePath = $uploadDir . $fileName;
    
    if (move_uploaded_file($_FILES['picture']['tmp_name'], $filePath)) {
        $sql = "INSERT INTO employees (first_name, last_name, other_names, gender, age, picture_path) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $myconn->prepare($sql);
        $stmt->bind_param("ssssis", $firstName, $lastName, $otherNames, $gender, $age, $filePath);
        
        if ($stmt->execute()) {
            $_SESSION['status'] = "Employee added successfully.";
            header("Location: Employee.php");
        } else {
            echo "Error: " . $myconn->error;
        }
        $stmt->close();
    } else {
        echo "Failed to upload picture.";
    }
}

$myconn->close();
?>
