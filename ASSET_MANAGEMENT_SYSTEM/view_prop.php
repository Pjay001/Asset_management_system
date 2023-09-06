

<!DOCTYPE html>
<html>
<head>
	<title>View Properties</title>
	<style>
		body {
			background-color: #f2f2f2;
		}

		table {
			border-collapse: collapse;
			margin: 20px 0;
			font-size: 1em;
			min-width: 400px;
			border-radius: 5px 5px 0 0;
			overflow: hidden;
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
		}

		table thead tr {
			background-color: #009879;
			color: #ffffff;
			text-align: left;
			font-weight: bold;
		}

		table th,
		table td {
			padding: 12px 15px;
		}

		table tbody tr {
			border-bottom: 1px solid #dddddd;
		}

		table tbody tr:nth-of-type(even) {
			background-color: #f3f3f3;
		}

		table tbody tr:last-of-type {
			border-bottom: 2px solid #009879;
		}

		.btn {
			display: inline-block;
			background-color: #009879;
			color: #ffffff;
			padding: 8px 16px;
			border-radius: 5px;
			text-decoration: none;
			font-size: 16px;
			margin-top: 10px;
			transition: background-color 0.3s;
		}

		.btn:hover {
			background-color: #ffffff;
			color: #009879;
		}
	</style>
</head>
<body>
<?php
require_once "config.php";
include("search_view.php");
$location = $_POST['location'];
$specs = $_POST['specs'];
$spr = $_POST['spr'];
$epr = $_POST['epr'];
if($location == 'Select Location'){
	$location= "%";
}
if($specs == 'Select Specs'){
	$specs= "%";
}
// Prepare statement to select data from the 'property' table
$stmt = $link->prepare("SELECT * FROM property WHERE location like ? and specs like ? and user_name = ? and price between ? and ?");
$stmt->bind_param("sssii", $location, $specs, $_SESSION["username"], $spr, $epr);
// Execute the statement
$stmt->execute();

// Get the result set
$result = $stmt->get_result();


// Check if there are any rows returned
if ($result->num_rows > 0) {
    // Output data of each row
	
    while($row = $result->fetch_assoc()) {
		if($row['user_name'] == $_SESSION["username"]){
        echo "<hr>"."<br>"."Property ID: " . $row["prop_id"]. "<br>";
		echo "Owner: " . $row["user_name"]. "<br>";
        echo "Property Name: " . $row["prop_name"]. "<br>";
        echo "Location: " . $row["location"]. "<br>";
        echo "Specs: " . $row["specs"]. "<br>";
        echo "Status: " . $row["status"]. "<br>";
		echo "price: " . $row["price"]." RS". "<br>";
		echo "<a href='set_prop.php?pid={$row['prop_id']}'>Put on sale</a><br>";
		echo "<a href='remove_prop.php?pid={$row['prop_id']}'>Remove from sale</a>";
        echo "<br>";
    }}
} else {
    echo "0 results";
}

// Close connection
$link->close();

?>
</body>
</html>








