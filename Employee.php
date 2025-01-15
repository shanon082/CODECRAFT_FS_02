<?php
session_start();
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="container">
        <h1>Employees</h1>
        <div class="buttons">
            <div class="create-btn">
                <button type="submit">Add Employees</button>
            </div>
            <div class="other-btns">
                <button>filter</button>
                <button>sort</button>
                <input type="text" placeholder="search employee">
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
                <tr>
                    <td>001</td>
                    <td>kato</td>
                    <td>Deo</td>
                    <td></td>
                    <td>Male</td>
                    <td>30</td>
                    <td><a href="#">more details</a></td>
                    <td><a href="#">Update employee</a></td>
                    <td><a href="#">Delete employee</a></td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>