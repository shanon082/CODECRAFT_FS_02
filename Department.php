<?php
session_start();
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container">
        <h1>Departments</h1>
        <div class="buttons">
            <div class="create-btn">
                <button type="submit">Add Department</button>
            </div>
            <div class="other-btns">
                <button>filter</button>
                <button>sort</button>
                <input type="text" placeholder="search department">
            </div>
        </div>
        <div class="em-table">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Department name</th>
                    <th>Department Salary</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                <tr>
                    <td>D01</td>
                    <td>Accountancy</td>
                    <td>1,300,000</td>
                    <td><a href="#">Update department</a></td>
                    <td><a href="#">Delete department</a></td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>