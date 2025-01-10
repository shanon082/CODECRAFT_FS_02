<?php
$server ="localhost";
$database = "employee_management_system";
$username ="root";
$password = "";

$myconn = new mysqli($server, $username, $password, $database);
if ($myconn->connect_error) {
    die("". $myconn->connect_error);
}
?>