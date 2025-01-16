<?php
session_start();
include("db.php");

if ($myconn->connect_error) {
    die("Connection failed: " . $myconn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM employees WHERE id = ?";
    $stmt = $myconn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $employee = $result->fetch_assoc();
    $stmt->close();
} else {
    die("No employee ID provided.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $otherNames = $_POST['otherNames'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];

    $sql = "UPDATE employees SET first_name = ?, last_name = ?, other_names = ?, gender = ?, age = ? WHERE id = ?";
    $stmt = $myconn->prepare($sql);
    $stmt->bind_param("ssssii", $firstName, $lastName, $otherNames, $gender, $age, $id);
    
    if ($stmt->execute()) {
        echo "Employee updated successfully.";
        header("Location: employee.php");
    } else {
        echo "Error updating employee: " . $myconn->error;
    }
    $stmt->close();
}
$myconn->close();
?>
