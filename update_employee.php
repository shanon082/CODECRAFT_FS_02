<?php
// session_start();
include("db.php");
include("update_employee_processing.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employee</title>
</head>

<body>
    <div class="wrapper">
        <h2>Update Employee</h2>
        <form action="update_employee_processing.php" method="POST">
            <label for="id">id:</label>
            <input type="text" id="id" name="id" value="<?php echo htmlspecialchars($row['id']); ?>" readonly>

            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" value="<?php echo htmlspecialchars($row['first_name']); ?>" required>

            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" value="<?php echo htmlspecialchars($row['last_name']); ?>" required>

            <label for="otherNames">Other Names:</label>
            <input type="text" id="otherNames" name="otherNames" value="<?php echo htmlspecialchars($row['other_names']); ?>">

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="Male" <?php echo $row['gender'] == 'Male' ? 'selected' : ''; ?>>Male</option>
                <option value="Female" <?php echo $row['gender'] == 'Female' ? 'selected' : ''; ?>>Female</option>
            </select>

            <label for="age">Age:</label>
            <input type="number" id="age" name="age" value="<?php echo htmlspecialchars($row['age']); ?>" required>

            <button type="submit" >Update Employee</button>
        </form>
    </div>
</body>

</html>