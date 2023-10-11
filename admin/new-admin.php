<?php
include "config.php";
include'style.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Administrator</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            /*text-align: center;*/
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        form {
            margin: 0;
            padding: 0;
        }

        label, input {
            display: block;
            width: 100%;
        }


        input[type="submit"] {
            background-color: #424242;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="form-container">
    <h2>Add New East Kampala Administrator</h2>
    <form action="" method="post">
        <label for="new_admin_username">Username:</label>
        <input class="form-control" type="text" id="new_admin_username" name="new_admin_username" required placeholder="Username"><br><br>
        <label for="new_admin_password">Password:</label>
        <input class="form-control" type="password" id="new_admin_password" name="new_admin_password" required placeholder="Password"><br><br>

        <input type="submit" name="add_admin" value="Add New Admin"/>

    </form>
    <p><a href="index.php"><ion-icon name="chevron-back-circle"></ion-icon>Back To Admin Panel</a></p>
</div>
</body>
</html>




<?php

if(isset($_POST['add_admin'])){
    $newAdminUsername = $_POST['new_admin_username'];
    $newAdminPassword = password_hash($_POST['new_admin_password'], PASSWORD_DEFAULT);

    // Check if the new admin username already exists in the database to avoid duplicates
    $checkExistenceQuery = "SELECT * FROM admin WHERE admin_name = ?";
    $checkExistenceResult = $conn->prepare($checkExistenceQuery);
    $checkExistenceResult->execute([$newAdminUsername]);

    if ($checkExistenceResult->rowCount() > 0) {
        echo '<script>alert("Admin username already exists. Please choose a different username.")</script>';
    } else {
        // Insert the new admin into the database
        $insertAdminQuery = "INSERT INTO admin (admin_name, admin_password) VALUES (?, ?)";
        $insertAdminResult = $conn->prepare($insertAdminQuery);

        if ($insertAdminResult->execute([$newAdminUsername, $newAdminPassword])) {
            echo '<script>alert("Admin account added successfully.")</script>';
        } else {
            echo '<script>alert("Failed to add admin account.")</script>';
        }
    }
}

?>



<?php include"script.php";?>
