<?php
session_start();
include("db.php");


if (isset($_GET['id'])) {
    $id = $myconn->real_escape_string($_GET['id']);
    $sql = "SELECT * FROM employees WHERE id = '$id'";
    $result = $myconn->query($sql);

    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No employee found with ID: " ;
        exit;
    }

} else {
    echo "Invalid or missing employee ID.";
    exit;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $myconn->real_escape_string($_POST['id']);
    $firstName = $myconn->real_escape_string($_POST['firstName']);
    $lastName = $myconn->real_escape_string($_POST['lastName']);
    $otherNames = $myconn->real_escape_string($_POST['otherNames']);
    $gender = $myconn->real_escape_string($_POST['gender']);
    $age = $myconn->real_escape_string($_POST['age']);

    $sql = "UPDATE employees SET first_name = '$firstName', last_name = '$lastName', other_names = '$otherNames', gender = '$gender', age = '$age' WHERE id = '$id'";

    $result = $myconn->query($sql);
    if($result === true){
        echo'successfull';
    }else{
        echo 'error'. $myconn->error;
    }

}
$myconn->close();
?>
