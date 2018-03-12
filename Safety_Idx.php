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
            <h3>Safety Links</h3>

    <ol class="round">
         <li class="one">
            <h5><a href = "NearMiss.php">Near Miss Form</a></h5>
             This will open a new near miss form
         </li>
         <li class="two">
            <h5><a href = "Observations.php">Observations</a></h5>
             This opens a new observation form
         </li>
         <li class="three">
            <h5><a href = "UnderConstruction.php">Injury Reporting</a></h5>
             Click here to report an injury.
         </li>
        <li class="four">
            <h5><a href = "UnderConstruction.php">Safety Reporting</a></h5>
             Click here to access audit information for the safety program
         </li>
    </ol>
        
        </form>
    
    </div>
        <?php
        include ("Includes/footer.php");

?>
    </body>
</html>
