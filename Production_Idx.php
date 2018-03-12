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
            <h3>Production Links</h3>

    <ol class="round">
         <li class="one">
            <h5><a href = "Failures.php">Enter Failures into Log</a></h5>
             Click here to access the Failure Log
         </li>
         <li class="two">
            <h5><a href = "FailureLog.php">Review Multiple Failure Reports</a></h5>
             This opens the failure reports
         </li>
         <li class="three">
            <h5><a href = "UnderConstruction.php">Part Number Decoder(Under Construction)</a></h5>
             Click here to decode or encode a Part Number
         </li>
         <li class="four">
            <h5><a href = "UnderConstruction.php">Travelers(Under Construction)</a></h5>
             Click here to generate a traveler
         </li>
         <li class="five">
            <h5><a href = "https://docs.google.com/spreadsheets/d/14t_OWo3l2qDW1PHB4TUL_DumprrnY7yS2QyP_GloHU0/edit#gid=16">Procurement Spreadsheet</a></h5>
             Click here for the Procurement Spreadsheet
         </li>
    </ol>
        
        </form>
    
    </div>
        <?php
        include ("Includes/footer.php");

?>
    </body>
</html>

