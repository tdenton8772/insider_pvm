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
            <h3>Engineering Links</h3>

    <ol class="round">
         <li class="one">
            <h5><a href = "UnderConstruction.php">Project Tracker</a></h5>
             Access the project tracker to view open projects and deliverables
         </li>
         <li class="two">
            <h5><a href = "Blog.php">Blog</a></h5>
             This is the Bulletin board for open projects and engineering communication. 
         </li>
         <li class="three">
            <h5><a href = "UnderConstruction.php">Engineering Audit</a></h5>
             Access the Audit page to review engineering projects and deliverables. 
         </li>
    </ol>
        
        </form>
    
    </div>
        <?php
        include ("Includes/footer.php");

?>
    </body>
</html>
