
<?php
// Start the session
session_start();
?>
<html>
    <body>
        <?php
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
        $usr = $query['usr'];

        // Set up the database connection parameters
        require_once "config.php";

        $stmt = $link->prepare("SELECT * FROM users WHERE user_name = ? ");
    $stmt->bind_param("s", $usr);
    // Execute the statement
    $stmt->execute();

    // Get the result set
    $result = $stmt->get_result();


    // Check if there are any rows returned
    if ($result->num_rows > 0) {
        // Output data of each row
        
        while($row = $result->fetch_assoc()) {
            echo "<hr>"."<br>"."Name: " . $row["name"]. "<br>";
            echo "Email: " . $row["email"]. "<br>";
            echo "Mobile no." . $row["m_no"]. "<br>";
            echo "Birthdate" . $row["b_date"]. "<br>";
            echo "<br>";
        }
        } else {
            echo "0 results";
        }
        $link->close();
        ?>
        <a href='search.php'> Back </a>
    </body>
</html>