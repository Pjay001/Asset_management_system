<?php
  // Start the session
  session_start();
  
  // Check if the user is already logged in, if yes then redirect him to welcome page
//   if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
//       header("location: dashboard.html");
//       exit;
//   }
  
  // Include the database connection file
  require_once "config.php";
  
  // Define variables and initialize with empty values
  $username = $password = "";
  $username_err = $password_err = "";
  
  // Processing form data when form is submitted
  if($_SERVER["REQUEST_METHOD"] == "POST"){
  
      // Check if username is empty
      if(empty(trim($_POST["username"]))){
          $username_err = "Please enter username.";
          
      } else{
          $username = trim($_POST["username"]);
      }
      
      // Check if password is empty
      if(empty(trim($_POST["password"]))){
          $password_err = "Please enter your password.";
      } else{
          $password = trim($_POST["password"]);
      }
  
      // Validate credentials
      if(empty($username_err) && empty($password_err)){
          // Prepare a select statement
          $sql = "SELECT usr_id, user_name, pwd FROM users WHERE user_name = ?";
          
          if($stmt = mysqli_prepare($link, $sql)){
              // Bind variables to the prepared statement as parameters
              mysqli_stmt_bind_param($stmt, "s", $param_username);
              
              // Set parameters
              $param_username = $username;
              
              // Attempt to execute the prepared statement
              if(mysqli_stmt_execute($stmt)){
                  // Store result
                  mysqli_stmt_store_result($stmt);
                  
                  // Check if username exists, if yes then verify password
                  if(mysqli_stmt_num_rows($stmt) == 1){                    
                      // Bind result variables
                      mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                      if(mysqli_stmt_fetch($stmt)){ 
                          if($password == $hashed_password){
                              // Password is correct, so start a new session
                              session_start();
                              
                              // Store data in session variables
                              $_SESSION["loggedin"] = true;
                              $_SESSION["id"] = $id;
                              $_SESSION["username"] = $username;                            
                              
                              // Redirect user to welcome page
                              header("location: welcome.php");
                          } else{
                              // Password is not valid, display a generic error message
                              $password_err = "Invalid username or password.";
                          }
                      }
                  } else{
                      // Username doesn't exist, display a generic error message
                      $username_err = "Invalid username or password.";
                  }
              } else{
                  echo "Oops! Something went wrong. Please try again later.";
              }
  
              // Close statement
              mysqli_stmt_close($stmt);
          }
      }
      echo "Wrong Password";
      echo "<a href='login.html'> Back </a>";
      // Close connection
      mysqli_close($link);
  }
  ?>

