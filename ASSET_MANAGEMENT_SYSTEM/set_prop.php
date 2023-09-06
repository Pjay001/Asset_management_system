<?php
// Start the session
session_start();

// Check if user is logged in
if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit();
}

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];    
       

$parts = parse_url($url);
parse_str($parts['query'], $query);



// Check if property ID is set
// if(!isset($_SESSION["pid"])){
//     header("Location: dashboard.php");
//     exit();
// }

// Retrieve the property ID from the form data
$prop_id = $query['pid'];

// Set up the database connection parameters
require_once "config.php";

// Prepare statement to update the 'property' table and transfer ownership
$stmt = $link->prepare("UPDATE property SET status = 'on sale' WHERE prop_id = ?");

// Bind the parameters to the statement
$stmt->bind_param("i", $prop_id);

// Set the new owner to the currently logged in user

// Execute the statement
if ($stmt->execute()) {
    echo "Property kept on sale";
} else {
    echo "Error transferring property ownership: " . $conn->error;
}
$_SESSION["pid"]='';
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
    <title></title>
</head>
<body>
    <a href='search_view.php'> Back </a>
</body>
</html>