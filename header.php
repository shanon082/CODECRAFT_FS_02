<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    <link rel="stylesheet" href="header.css">
</head>

<body>
    <div class="header">
        <h1>EMPLOYEE MANAGEMENT SYSTEM</h1>
        <h2>Admin: <?php echo htmlspecialchars($_SESSION['username'])?></h2>
    </div>
    <div class="side-bar">
        <nav>
            <ul>
                <li><a href="">Dashboard</a></li>
                <li><a href="Employee.php">Employees</a></li>
                <li><a href="Department.php">Department</a></li>
                <li><a href="">About</a></li>
            </ul>
        </nav>
        <div class="logout">
            <a href="logout.php">logout</a>
        </div>
    </div>
</body>

</html>