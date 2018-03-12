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

            <form enctype="multipart/form-data" action="insert.php" method="post" name="changer">
                <input name="MAX_FILE_SIZE" value="1000000" type="hidden">
                <input name="pdf" type="file">
                <input name="MAX_FILE_SIZE" value="1000000" type="hidden">
                <input name="txt" type="file">
                <input value="Submit" type="submit">
            </form>
        </div>
    </body>
</html>
