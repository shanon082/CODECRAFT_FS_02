<?php
session_start();
include("db.php");

// Ensure 'id' is set and valid
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];
    $sql = "SELECT * FROM employees WHERE id = ?";
    $stmt = $myconn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $employee = $result->fetch_assoc();
    } else {
        echo "No employee found with ID: " . htmlspecialchars($id);
        exit;
    }
    $stmt->close();
} else {
    echo "Invalid or missing employee ID.";
    exit;
}

// Handle form submission
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
        header("Location: employee.php"); 
        exit;
    } else {
        echo "Error updating employee: " . $myconn->error;
    }
    $stmt->close();
}
$myconn->close();
?>
