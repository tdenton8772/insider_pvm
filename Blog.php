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
<script>
    function NewProject() {
        var x;
        var site = prompt("Please enter the name of a new project", "Project name here");
        if (site != null) {

        }
    }
</script>

<div id="main">
    <form action="" method="post">

    Report number: 
    <input type="submit" name="nav_btn" value="<">
    <?php
        if (!empty($_POST['nav_btn'])) {
         switch($_POST['nav_btn']){//if the submit button is clicked
         
         case 'Go':
            $Rpt_Num = $_POST['Rpt_Num'];
           echo "<input type='text' name='Rpt_Num' size ='5' value='$Rpt_Num' class='NavTextBox'>";
         break;
           
        case '<':
            $Rpt_Num = $_POST['Rpt_Num'];
            $Rpt_Num = $Rpt_Num - 1;
           echo "<input type='text' name='Rpt_Num' size ='5' value='$Rpt_Num' class='NavTextBox'>";
        break;
           
        case '>':
            $Rpt_Num = $_POST['Rpt_Num'];
            $Rpt_Num = $Rpt_Num + 1;
           echo "<input type='text' name='Rpt_Num' size ='5' value='$Rpt_Num' class='NavTextBox'>";
        break;
        
        case 'Submit Near Miss Report':
            $Rpt_Num = $_POST['Rpt_Num'];
           echo "<input type='text' name='Rpt_Num' size ='5' value='$Rpt_Num' class='NavTextBox'>";
        break;
        
        case 'Update Report':
           $Rpt_Num = $_POST['Rpt_Num'];
           echo "<input type='text' name='Rpt_Num' size ='5' value='$Rpt_Num' class='NavTextBox'>";
        break;
        }
        }
        if(empty($_POST['nav_btn'])){
           $query = "SELECT Failure_Idx FROM failures ORDER BY Failure_Idx ASC";
           $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $result1 = $row['NM_Index'];
            }
            } else {
            }
           $result = $result1 + 1;
           echo "<input type='text' name='Rpt_Num' size ='5' value='" . $result . "' class='NavTextBox'>";
        }
    ?><!--Navigation Bar-->

    <input type="submit" name="nav_btn"value=">">
    <input type="submit" name="nav_btn" value="Go">
    <br><br>

        <?php
        if (!empty($_POST['nav_btn'])) {
         switch($_POST['nav_btn']){//if the submit button is clicked
         
         case 'Go':
         break;
           
        case '<':
        break;
           
        case '>':
        break;
        
        case 'Submit Near Miss Report':
        break;
        
        case 'Update Report':
        break;
        }
        }
        if(empty($_POST['nav_btn'])){
            $sql = "SELECT Blog.Project_Name from Blog_Index Blog Where Blog.Closed = 0";
            $result = mysqli_query($conn, $sql);

            echo "<table>";
            

            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $result1 = $row['Project_Name'];
                echo "<tr class='alt'><td><FONT SIZE=4>" . $result1 . "</FONT></td>";

                echo "<td><input type='submit'value='See comments'></td></tr>";
            }
            } else {
            }
            echo "</table>";

            
        }
    ?>
        </form>
</div>

<?php
        include ("Includes/footer.php");

?>