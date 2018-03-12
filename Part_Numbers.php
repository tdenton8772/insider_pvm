<?php include("/home/web/insider/Includes/password_protect.php"); ?>
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

<div id="main">
    <form name="myForm" action="" method="post" onmouseover="">        
        <SCRIPT>
        </SCRIPT>
        
    <?php
        if (!empty($_POST['nav_btn'])) {//This is the navigation Bar
         switch($_POST['nav_btn']){
         
         case '':
         break;        
         }
        }
        if(empty($_POST['nav_btn'])){
        }
    ?><!--Navigation Bar-->


        
    <br><br>

        <?php
        
        if (!empty($_POST['nav_btn'])) {//This is the main body
         switch($_POST['nav_btn']){
         
         case '':
         break;
         }
         }
        if(empty($_POST['nav_btn'])){
        }}
        }
    ?>
        </form>
</div>


<?php
switch($_POST['nav_btn']){//This is where the Magic Happens

  case 'Update':
  
  $sql = "Select TD.COLUMN
            FROM TABLE TD
            WHERE TD.COLUMN = something";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
                    // output data of each row
  	while($row = mysqli_fetch_assoc($result)) {
        $Index = $row['COLUMN'];
    }

    } else {
    }             

    if(empty($Index)){
        
    }
    else{  
    }

    $Something = $_POST['Matching_Something'];
  
    $sqlUpdate = "UPDATE TABLE TD SET 
                    TD.COLUMN = $Something,
                    Where TD.Index = $Index";
    @mysqli_query($conn, $sqlUpdate) or die("Cannot update " . $Index . " ");//update or error      
    mysqli_close($conn);  
    break;


//////////////////////////////////////////////////////////////////////////

  case 'Create':
  $sql =   $sql = "Select TD.COLUMN
            FROM TABLE TD
            WHERE TD.COLUMN = something";;

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
                    // output data of each row
  	while($row = mysqli_fetch_assoc($result)) {
        $Index1 = $row['Test_Index'];
    }

    } else {
        $Index1 = NULL;
    }             

    if(empty($Index1)){
        
    }
    else{
    }
    $Something = $_POST['Matching_Something'];
    $sqlInsert = "INSERT INTO TABLE (COLUMN) VALUES ($Something)";
    @mysqli_query($conn, $sqlInsert) or die("Cannot update " . " " . $Something . " ");//update or error
    echo $Rpt_Num;        
    mysqli_close($conn);  
    break;

}

        include ("Includes/footer.php");

?>