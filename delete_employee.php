<?php
session_start();
include("db.php");


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM employees WHERE id = ?";
    $stmt = $myconn->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo "Employee deleted successfully.";
        header("Location: employee.php");
    } else {
        echo "Error deleting employee: " . $myconn->error;
    }
    $stmt->close();
} else {
    echo "No employee ID provided.";
}

$myconn->close();
?>
