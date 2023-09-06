<?php
  // Start the session
  session_start();
?>
<?php 
    require_once "config.php";
    $usr=$_SESSION["username"];
	$stmt = $link->prepare("SELECT * FROM property WHERE user_name = ? ");
    $stmt->bind_param("s", $usr);
    $stmt->execute();
    
    // Get the result set
    $result = $stmt->get_result();
    if($result->num_rows> 0){
      $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
?>
<!DOCTYPE html>
<html>
    <body>
    <a href="dashboard.php">Back to dashboard</a><br><br><br><br>
<form action="view_prop.php" method="post">
  <label for="location">Location:</label>
  
  <select id="location" name="location">
  	<option>Select Location</option>
	<?php 
	foreach ($options as $option) {
	?>
		<option><?php echo $option['location']; ?> </option>
		<?php 
		}
	?>
  </select>
  
  <label for="specs">Specs:</label>
  <select id="specs" name="specs">
  <option>Select Specs</option>
	<?php 
	foreach ($options as $option) {
	?>
		<option><?php echo $option['specs']; ?> </option>
		<?php 
		}
	?>
  </select>
  Starting price range
  <input type="number" maxlength=10 name="spr" value= "0"></td>
  Ending price range
  <input type="number" maxlength=10 name="epr" value= "100000000"></td>
  <input type="submit" value="Search">
</form>
</body>
</html>
