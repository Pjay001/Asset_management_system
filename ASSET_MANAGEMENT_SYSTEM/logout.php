<?php
  // Start the session
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>GOODBYE</title>
</head>
<body>
  <h1><?php echo $_SESSION["username"]; ?> you have successfully logged out !</h1>
  <?php
$_SESSION["loggedin"] = false;
$_SESSION["id"] = '';
$_SESSION["username"] = ''; 

?>
  
  <a href="login.html">Login page</a>
</body>
</html>
