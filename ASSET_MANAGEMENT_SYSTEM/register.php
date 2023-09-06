<?php

require_once "config.php";

//Prepare statement to insert data into the 'users' table
$stmt = $link->prepare("INSERT INTO users (name, user_name, email, m_no, b_date,pwd) VALUES (?, ?, ?, ?, ?, ?)");

// Bind parameters to the statement
$stmt->bind_param("ssssss", $name, $username, $email,  $mobile, $birthdate, $password );

// Set the parameters from the form data
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$birthdate = $_POST['birthdate'];

// Execute the statement
if ($stmt->execute()) {
    echo "You are registered successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$link->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br>
    <a href="login.html"> Go to login page </a>
</body>
</html>