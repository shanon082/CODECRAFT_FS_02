<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employee</title>
</head>
<body>
<h2>Update Employee</h2>
    <form action="update_employee_processing.php" method="POST">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" value="<?php echo htmlspecialchars($employee['first_name']); ?>" required><br>
        
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" value="<?php echo htmlspecialchars($employee['last_name']); ?>" required><br>
        
        <label for="otherNames">Other Names:</label>
        <input type="text" id="otherNames" name="otherNames" value="<?php echo htmlspecialchars($employee['other_names']); ?>"><br>
        
        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="Male" <?php echo $employee['gender'] == 'Male' ? 'selected' : ''; ?>>Male</option>
            <option value="Female" <?php echo $employee['gender'] == 'Female' ? 'selected' : ''; ?>>Female</option>
        </select><br>
        
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" value="<?php echo $employee['age']; ?>" required><br>
        
        <button type="submit">Update Employee</button>
    </form>
</body>
</html>
