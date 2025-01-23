<?php
session_start();
include("header.php");
include("db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees</title>
    <link rel="stylesheet" href="employee.css">
</head>

<body>
    <div class="container">
        <h1>Employees</h1>
        <div class="buttons">
            <div class="create-btn">
                <button type="button" id="addEmployeeBtn">Add Employee</button>
            </div>
            <div class="other-btns">
                <label for="select">Sort By:</label>
                <select name="sortBy" id="sortBy">
                    <option value="asc">ID (smallest to largest)</option>
                    <option value="desc">ID (largest to smallest)</option>
                    <option value="oldest">Oldest first</option>
                    <option value="youngest">Youngest first</option>
                    <option value="az">Firstname A-Z</option>
                    <option value="za">Firstname Z-A</option>
                </select>
                <input type="text" placeholder="Search employee">
            </div>
        </div>
        <div class="em-table">
            <table>
                <tr>
                    <th>ID</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Other names</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>More info</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                <?php
                $sql = "SELECT id, first_name, last_name, other_names, gender, age, picture_path FROM employees";
                $result = $myconn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['first_name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['last_name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['other_names']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
                        echo "<td>" . $row['age'] . "</td>";
                        // echo "<td><a href='" . htmlspecialchars($row['picture_path']) . "' target='_blank'>View Picture</a></td>";
                        echo "<td><a href='about_employee.php?id=" . $row['id'] . "'>More details</a></td>";
                        echo "<td><a href='update_employee.php?id=" . htmlspecialchars($row['id']) . "'>Update</a></td>";
                        echo "<td><a href='delete_employee.php?id=" . $row['id'] . "'>Delete</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No employees found.</td></tr>";
                }

                $myconn->close(); ?>
            </table>
        </div>
    </div>

    <div class="modal" id="addEmployeeModal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <h2>Add Employee</h2>
            <form action="add_employee.php" method="POST" enctype="multipart/form-data">
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" required><br>

                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" required><br>

                <label for="otherNames">Other Names:</label>
                <input type="text" id="otherNames" name="otherNames"><br>

                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select><br>

                <label for="age">Age:</label>
                <input type="number" id="age" name="age" required><br>

                <label for="picture">Picture:</label>
                <input type="file" id="picture" name="picture" accept="image/*" required><br><br>

                <button type="submit">Add Employee</button>
                <?php
                    if (isset($_SESSION['status'])) {
                        echo $_SESSION['status'] ;
                        unset($_SESSION['status']);
                    }
                ?>
            </form>
        </div>
    </div>

    <script>
        const modal = document.getElementById('addEmployeeModal');
        const btn = document.getElementById('addEmployeeBtn');
        const closeBtn = document.getElementById('closeModal');

        btn.addEventListener('click', () => {
            modal.style.display = 'flex';
        });

        closeBtn.addEventListener('click', () => {
            modal.style.display = 'none';
        });

        window.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });
    </script>
</body>

</html>