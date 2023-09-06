<?php
  // Start the session
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Welcome</title>
  <style>
      .box {
      align="center";
      height: fit-content;
      width: 1000px;
      background: #fff;
      border-radius: 20px;
      margin: 20px;
      transition: all ease 0.2s;
      background-color: #3bdfda;
      padding: 5px;
      margin-bottom: 1em;
      box-shadow: 0px 5px 10px 0px rgba(34, 111, 126, 0.481);
      overflow: auto;
    }

    .box:hover {
      transform: translateX(-5px);
      box-shadow: px 10px 20px 2px rgba(56, 229, 148, 0.25);
    }
  </style> 
</head>
<body>
  <div class="box">
  <h1>Welcome, <?php echo $_SESSION["username"]; ?>!</h1>
  
  <p>You have successfully logged in. This is the welcome page.</p>
  
  <a href="dashboard.php">Dashboard</a>
</diV>
</body>
</html>
