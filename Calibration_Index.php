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
            <h3>Calibration Links</h3>

    <ol class="round">
         <li class="one">
            <h5><a href = "NewCell.php">New Cell Measurement</a></h5>
             Here you can make new reference cells
         </li>
         <li class="two">
            <h5><a href = "CalReq.php">Ref Cell Calibration Request Form</a></h5>
             This opens the Reference Cell calibration request form
         </li>
         <li class="three">
            <h5><a href = "3rdPartyCal.php">Update 3rd Parts Cal Data</a></h5>
             Cal Lab Use only
         </li>
         <li class="four">
            <h5><a href = "CalPDReq.php">New Cal Photodiode</a></h5>
             Here you can make calibration photodiodes
         </li>
         <li class="five">
            <h5><a href = "UnderConstruction.php">PVM Calibration Information</a></h5>
             Click here to view historical calibration data (Under Construction)
         </li>
         <li class="six">
            <h5><a href = "UnderConstruction.php">Calibration Reports</a></h5>
             Click here to view individual calibration reports Click here to view individual calibration reports (Under Construction)

         </li>
    </ol>
        
        </form>
    
    </div>
        <?php
        include ("Includes/footer.php");

?>
    </body>
</html>
