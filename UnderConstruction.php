<?php
        require_once ("Includes/simplecms-config.php"); 
        require_once  ("Includes/connectDB.php");
        include("Includes/header.php"); 

// Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            } 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
    <div id="main">
       
        <form action="" method="post">
            <h3>Error!</h3>

<h1>This page is under construction</h1>
        
        </form>
    
    </div>
        <?php
        include ("Includes/footer.php");

?>
    </body>
</html>
