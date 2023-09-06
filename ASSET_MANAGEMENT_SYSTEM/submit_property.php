<?php

session_start();
// Get form data
// $property_name = $_POST['property_name'];
// $location = $_POST['Location'];
// $specs = $_POST['specs'];
// $status = $_POST['status'];

// // Connect to database
// $servername = "localhost";
// $username = "root";
// $password = "root";
// $dbname = "innovative";
// $user_name=$_SESSION["username"];

// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

// // Add property to database
// $sql = "INSERT INTO properties (user_name, property_name, location, specs, status)
// VALUES ('$user_name','$property_name', '$location', '$specs', '$status')";

// if ($conn->query($sql) === TRUE) {
//   echo "Property added successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $conn->close();







require_once "config.php";
//Prepare statement to insert data into the 'users' table
$stmt = $link->prepare("INSERT INTO property (prop_name, Location, specs, status, user_name,price) VALUES (?, ?, ?, ?, ?,?)");

// Bind parameters to the statement
$stmt->bind_param("sssssi", $property_name, $location, $specs,  $status, $user_name,$price);

// Set the parameters from the form data
$property_name = $_POST['property_name'];
$location = $_POST['Location'];
$specs = $_POST['specs'];
$status = $_POST['status'];
$price = $_POST['price'];
$user_name=$_SESSION["username"];

// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully";
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
</head>
<body>
  <a href="add_prop.html"> add more properties </a>
</body>
</html>

<!-- prop_id Primary	int			No	None		AUTO_INCREMENT	Change Change	Drop Drop	
	2	user_name Index	int			No	None			Change Change	Drop Drop	
	3	location	varchar(45)	utf8mb4_0900_ai_ci		No	None			Change Change	Drop Drop	
	4	status	varchar(45)	utf8mb4_0900_ai_ci		No	'not on sale'			Change Change	Drop Drop	
	5	specs	varchar(45)	utf8mb4_0900_ai_ci		No	None			Change Change	Drop Drop	
	6	prop_name	varchar(45)	utf8mb4_0900_ai_ci		No	None -->