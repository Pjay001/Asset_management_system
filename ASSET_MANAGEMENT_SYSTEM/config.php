<?php
$servername = "localhost";
$username = "mysql";
$password = "Mysql@123";
$dbname = "asset";

// Create connection
 $link = new mysqli($servername, $username, $password, $dbname);

// Check connection
 if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
 }
 ?>