
<?php
  // Start the session
  session_start();
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Dashboard : <?php echo $_SESSION["username"]; ?></title>
    <style>
body {
  background-color: #f1f1f1;
  font-family: Arial, sans-serif;
}

.container {
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
  margin: auto;
  padding: 20px;
  max-width: 600px;
}

h1 {
  text-align: center;
}

.options {
  display: flex;
  justify-content: center;
}

.options a {
  background-color: #4CAF50;
  border-radius: 3px;
  color: white;
  padding: 12px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 10px;
  cursor: pointer;
}

.options a:hover {
  background-color: #45a049;
}

footer {
  background-color: #f1f1f1;
  padding: 0px;
  text-align: center;
  position: absolute;
  bottom: 0;
  width: 100%;
}

footer p {
  font-size: 14px;
  margin: 0;
}

    </style>
  </head>
  <body>
    <a href="logout.php">log out</a>
    <br><br><br>
      <h1>Dashboard : <?php echo $_SESSION["username"]; ?></h1>
      <div class="options">
        <a href="add_prop.html">Add Properties</a>
        <a href="search.php">Buy</a>
        <a href="search_view.php">View my Properties</a>
    </div>

    <footer>
        <p>21BCE087  | 21BCE095 |  21BCE100 <br><br>&copy; All rights reserved.</p>
      </footer>
      

  </body>
</html>
