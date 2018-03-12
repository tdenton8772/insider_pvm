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

       <form action="" method="post">
          <?php
        if (!empty($_POST['nav_btn'])) {
         switch($_POST['nav_btn']){//if the submit button is clicked
//////////////////////////////////////////////////////////////////////////////             
         case 'Go':
            $date_val = $_POST['Found_DT'];
            $Found_DT = strtotime($date_val);
            if(isset($Found_DT) && $Found_DT > 0){
            echo "<SCRIPT>alert('$Found_DT');</SCRIPT>';";
            $Found_DT = date('Y-m-d', $Found_DT);

            echo "<input type='date' name='Found_DT' value='$Found_DT' size ='13'>";
            echo "<input type='Submit' value='Go' name='nav_btn'>";
            }
            else {
            echo "<SCRIPT>alert('You did not enter a date');</SCRIPT>';";
            echo "<input type='date' name='Found_DT' value='" . date('Y-m-d') . "' size ='13'>";
            echo "<input type='Submit' value='Go' name='nav_btn'>";
            }
         break;
         }
        }
          if(empty($_POST['nav_btn'])){
        echo "<input type='date' name='Found_DT' value='" . date('Y-m-d') . "' size ='13'>";
        echo "<input type='Submit' value='Go' name='nav_btn'>";
          }
           ?>
    </form>

    </div>
        <?php
        include ("Includes/footer.php");

?>
    </body>
</html>

