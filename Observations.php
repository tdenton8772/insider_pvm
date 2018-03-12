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
        
        case 'Submit Observation Log':
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
           $query = "SELECT obs_idx FROM observation ORDER BY obs_idx ASC";
           $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $result1 = $row['obs_idx'];
            }
            } else {
            }
           $result = $result1 + 1;
           echo "<input type='text' name='Rpt_Num' size ='5' value='" . $result . "' class='NavTextBox'>";
        }
    ?><!--Navigation Bar-->

    <input type="submit" name="nav_btn"value=">">
    <input type="submit" name="nav_btn" value="Go">
    <A HREF="Observations.php">Make New Entry</A>
    <br><br>

        <?php
        if (!empty($_POST['nav_btn'])) {
         switch($_POST['nav_btn']){//if the submit button is clicked
         
        case 'Go':
        $Rpt_Num = $_POST['Rpt_Num'];
        $sql = "SELECT obs_date, 
                        id_Name, 
                        source, 
                        sup_Name, 
                        Area, 
                        Department, 
                        Description, 
                        risk, 
                        Corr_Action, 
                        Follow_Up, 
                        Follow_Date, 
                        Follow_Action, 
                        Resp_Person, 
                        Final_Date 
                   FROM observation 
                   WHERE obs_idx = $Rpt_Num";
                   $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $result1 = $row['obs_date'];
                $result2 = $row['id_Name'];
                $result3 = $row['source'];
                $result4 = $row['sup_Name'];
                $result5 = $row['Area'];
                $result6 = $row['Department'];
                $result7 = $row['Description'];
                $result8 = $row['risk'];
                $result9 = $row['Corr_Action'];
                $result10 = $row['Follow_Up'];
                $result11 = $row['Follow_Date'];
                $result12 = $row['Follow_Action'];
                $result13 = $row['Resp_Person'];
                $result14 = $row['Final_Date'];
            }
            } else {
            }
              $obs_date = $result1;
              $id_name = $result2;
              $source = $result3;
              $sup_Name = $result4;
              $Area = $result5;
              $Department = $result6;
              $Description = $result7;
              $risk = $result8;
              $Corr_Action = $result9;
              $Follow_Up = $result10;
              $Follow_Date = $result11;
              $Follow_Action = $result12;
              $Resp_Person = $result13;
              $Final_Date = $result14;
         //echo $obs_date . "a" . $id_Name . "a" . $source . "a" . $sup_Name . "a" . $Area . "a" . $Department . "a" . $Description . "a" . $risk . "a" . $Corr_Action . "a" . $Follow_Up . "a" . $Follow_Date . "a" . $Follow_Action . "a" . $Resp_Person . "a" . $Final_Date;
         
         echo "<h2>Observation Form</h2>";
         echo "Date:"; 
         echo "<input type='date' name='obs_date' value='" . date('Y-m-d', $obs_date) . "' required><br><br>";
         echo "Name of person who identified hazard";
         echo "<input type='text' name='id_Name' value='$id_name' required><br><br>";
         echo "Source (Please select one)<br>";
         echo "<table>";
         echo "<tr class='blank'>";
         switch($source){//if the submit button is clicked         
            case 1:
                echo "    <td><input type='radio' name='source' value='Audit' checked>Audit</td>";
            break;
            case 2:
                echo "    <td><input type='radio' name='source' value='Prestart' checked>Prestart</td>";
            break;
            case 3:
                echo "    <td><input type='radio' name='source' value='Toolbox' checked>Toolbox</td>";
            break;
            case 4:
                echo "    <td><input type='radio' name='source' value='Visual' checked>Visual</td>";
            break;
            case 5:
                echo "    <td><input type='radio' name='source' value='Incident' checked>Incident</td>";
            break;
            case 6:
                echo "    <td><input type='radio' name='source' value='Other' checked>Other</td>";
            break;
            }
         echo "</tr>";
         echo "</table><br>";

         echo "Supervisor Name:";
         echo "<input type='text' name='sup_Name' value='$sup_Name' required><br><br>";
         echo "Area:";
         echo "<input type='text' name='Area' size='5' value='$Area' required>";
         echo "Department:";
         echo "<input type='text' name='Department' size='10' value='$Department' required><br><br>";
         echo "Description of Incident:<br>";
         echo "<textarea cols='40' rows='7' style='width:550px; height:50px;' class='' name='Description' required>$Description</textarea><br><br>";
         
         echo "<table>";
         echo "<tr class='blank'>";
         echo "    <td>Risk (Please select one):</td>";         
         switch($risk){//if the submit button is clicked         
            case 1:
                echo "    <td><input type='radio' name='risk' value='High' checked>High</td>";
            break;
            case 2:
                echo "    <td><input type='radio' name='risk' value='Medium' checked>Medium</td>";
            break;
            case 3:
                echo "    <td><input type='radio' name='risk' value='Low' checked>Low</td>";
            break;
         }
         echo "</tr>";
         echo "</table><br>";
         echo "Corrective Action:<br>";
         echo "<textarea cols='40' rows='7' name='Corr_Action'style='width:550px; height:50px;' class=''>$Corr_Action</textarea><br><br>";
         
         if ($Follow_Up == 1){
         echo "<table>";
         echo "<tr class='blank'>";
         echo "    <td>Follow up required:</td>";
         echo "    <td><input type='radio' name='Follow_Up' value='$Follow_Up' checked>Yes</td>";
         echo "    <td>Followup Date: <input type='date' name='Follow_Date' value=" . date('Y-m-d', $Follow_Date) . "></td>";
         echo "</tr>";
         echo "</table><br>";
         echo "Follow up action required:<br>";
         echo "<textarea cols='40' rows='7' name='Follow_Action' style='width:550px; height:50px;' class=''>$Follow_Action</textarea><br><br>";
         
         echo "Person responsible for followup action: ";
         echo "<input type='text' name='Resp_Person' size='10' value='$Resp_Person'><br><br>";
         }else{
         echo "<table>";
         echo "<tr class='blank'>";
         echo "    <td>Follow up required:</td>";
         echo "    <td><input type='radio' name='Follow_Up' value='$Follow_Up' checked>No</td>";
         echo "</tr>";
         echo "</table><br>";
         }

         echo "Date Finalized:<input type='date' name='Final_Date' value=" . date('Y-m-d', $Final_Date) . "><br><br>";
         echo "<input type='Submit' value='Update Report' name='nav_btn'>";
        
        break;
           
        case '<':
        $Rpt_Num = $_POST['Rpt_Num'];
        $Rpt_Num = $Rpt_Num - 1;
        $sql = "SELECT obs_date, 
                        id_Name, 
                        source, 
                        sup_Name, 
                        Area, 
                        Department, 
                        Description, 
                        risk, 
                        Corr_Action, 
                        Follow_Up, 
                        Follow_Date, 
                        Follow_Action, 
                        Resp_Person, 
                        Final_Date 
                   FROM observation 
                   WHERE obs_idx = $Rpt_Num";
                   $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $result1 = $row['obs_date'];
                $result2 = $row['id_Name'];
                $result3 = $row['source'];
                $result4 = $row['sup_Name'];
                $result5 = $row['Area'];
                $result6 = $row['Department'];
                $result7 = $row['Description'];
                $result8 = $row['risk'];
                $result9 = $row['Corr_Action'];
                $result10 = $row['Follow_Up'];
                $result11 = $row['Follow_Date'];
                $result12 = $row['Follow_Action'];
                $result13 = $row['Resp_Person'];
                $result14 = $row['Final_Date'];
            }
            } else {
            }
              $obs_date = $result1;
              $id_name = $result2;
              $source = $result3;
              $sup_Name = $result4;
              $Area = $result5;
              $Department = $result6;
              $Description = $result7;
              $risk = $result8;
              $Corr_Action = $result9;
              $Follow_Up = $result10;
              $Follow_Date = $result11;
              $Follow_Action = $result12;
              $Resp_Person = $result13;
              $Final_Date = $result14;
         //echo $obs_date . "a" . $id_Name . "a" . $source . "a" . $sup_Name . "a" . $Area . "a" . $Department . "a" . $Description . "a" . $risk . "a" . $Corr_Action . "a" . $Follow_Up . "a" . $Follow_Date . "a" . $Follow_Action . "a" . $Resp_Person . "a" . $Final_Date;
         
         echo "<h2>Observation Form</h2>";
         echo "Date:"; 
         echo "<input type='date' name='obs_date' value='" . date('Y-m-d', $obs_date) . "'><br><br>";
         echo "Name of person who identified hazard";
         echo "<input type='text' name='id_Name' value='$id_name'><br><br>";
         echo "Source (Please select one)<br>";
         echo "<table>";
         echo "<tr class='blank'>";
         switch($source){//if the submit button is clicked         
            case 1:
                echo "    <td><input type='radio' name='source' value='Audit' checked>Audit</td>";
            break;
            case 2:
                echo "    <td><input type='radio' name='source' value='Prestart' checked>Prestart</td>";
            break;
            case 3:
                echo "    <td><input type='radio' name='source' value='Toolbox' checked>Toolbox</td>";
            break;
            case 4:
                echo "    <td><input type='radio' name='source' value='Visual' checked>Visual</td>";
            break;
            case 5:
                echo "    <td><input type='radio' name='source' value='Incident' checked>Incident</td>";
            break;
            case 6:
                echo "    <td><input type='radio' name='source' value='Other' checked>Other</td>";
            break;
            }
         echo "</tr>";
         echo "</table><br>";

         echo "Supervisor Name:";
         echo "<input type='text' name='sup_Name' value='$sup_Name'><br><br>";
         echo "Area:";
         echo "<input type='text' name='Area' size='5' value='$Area'>";
         echo "Department:";
         echo "<input type='text' name='Department' size='10' value='$Department'><br><br>";
         echo "Description of Incident:<br>";
         echo "<textarea cols='40' rows='7' style='width:550px; height:50px;' class='' name='Description'>$Description</textarea><br><br>";
         
         echo "<table>";
         echo "<tr class='blank'>";
         echo "    <td>Risk (Please select one):</td>";         
         switch($risk){//if the submit button is clicked         
            case 1:
                echo "    <td><input type='radio' name='risk' value='High' checked>High</td>";
            break;
            case 2:
                echo "    <td><input type='radio' name='risk' value='Medium' checked>Medium</td>";
            break;
            case 3:
                echo "    <td><input type='radio' name='risk' value='Low' checked>Low</td>";
            break;
         }
         echo "</tr>";
         echo "</table><br>";
         echo "Corrective Action:<br>";
         echo "<textarea cols='40' rows='7' name='Corr_Action'style='width:550px; height:50px;' class=''>$Corr_Action</textarea><br><br>";
         
         if ($Follow_Up == 1){
         echo "<table>";
         echo "<tr class='blank'>";
         echo "    <td>Follow up required:</td>";
         echo "    <td><input type='radio' name='Follow_Up' value='$Follow_Up' checked>Yes</td>";
         echo "    <td>Followup Date: <input type='date' name='Follow_Date' value=" . date('Y-m-d', $Follow_Date) . "></td>";
         echo "</tr>";
         echo "</table><br>";
         echo "Follow up action required:<br>";
         echo "<textarea cols='40' rows='7' name='Follow_Action' style='width:550px; height:50px;' class=''>$Follow_Action</textarea><br><br>";
         
         echo "Person responsible for followup action: ";
         echo "<input type='text' name='Resp_Person' size='10' value='$Resp_Person'><br><br>";
         }else{
         echo "<table>";
         echo "<tr class='blank'>";
         echo "    <td>Follow up required:</td>";
         echo "    <td><input type='radio' name='Follow_Up' value='$Follow_Up' checked>No</td>";
         echo "</tr>";
         echo "</table><br>";
         }

         echo "Date Finalized:<input type='date' name='Final_Date' value=" . date('Y-m-d', $Final_Date) . "><br><br>";
         echo "<input type='Submit' value='Update Report' name='nav_btn'>";
        break;
           
        case '>':
        $Rpt_Num = $_POST['Rpt_Num'];
        $Rpt_Num = $Rpt_Num + 1;
                $sql = "SELECT obs_date, 
                        id_Name, 
                        source, 
                        sup_Name, 
                        Area, 
                        Department, 
                        Description, 
                        risk, 
                        Corr_Action, 
                        Follow_Up, 
                        Follow_Date, 
                        Follow_Action, 
                        Resp_Person, 
                        Final_Date 
                   FROM observation 
                   WHERE obs_idx = $Rpt_Num";
                   $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $result1 = $row['obs_date'];
                $result2 = $row['id_Name'];
                $result3 = $row['source'];
                $result4 = $row['sup_Name'];
                $result5 = $row['Area'];
                $result6 = $row['Department'];
                $result7 = $row['Description'];
                $result8 = $row['risk'];
                $result9 = $row['Corr_Action'];
                $result10 = $row['Follow_Up'];
                $result11 = $row['Follow_Date'];
                $result12 = $row['Follow_Action'];
                $result13 = $row['Resp_Person'];
                $result14 = $row['Final_Date'];
            }
            } else {
            }
              $obs_date = $result1;
              $id_name = $result2;
              $source = $result3;
              $sup_Name = $result4;
              $Area = $result5;
              $Department = $result6;
              $Description = $result7;
              $risk = $result8;
              $Corr_Action = $result9;
              $Follow_Up = $result10;
              $Follow_Date = $result11;
              $Follow_Action = $result12;
              $Resp_Person = $result13;
              $Final_Date = $result14;
         //echo $obs_date . "a" . $id_Name . "a" . $source . "a" . $sup_Name . "a" . $Area . "a" . $Department . "a" . $Description . "a" . $risk . "a" . $Corr_Action . "a" . $Follow_Up . "a" . $Follow_Date . "a" . $Follow_Action . "a" . $Resp_Person . "a" . $Final_Date;
         
         echo "<h2>Observation Form</h2>";
         echo "Date:"; 
         echo "<input type='date' name='obs_date' value='" . date('Y-m-d', $obs_date) . "'><br><br>";
         echo "Name of person who identified hazard";
         echo "<input type='text' name='id_Name' value='$id_name'><br><br>";
         echo "Source (Please select one)<br>";
         echo "<table>";
         echo "<tr class='blank'>";
         switch($source){//if the submit button is clicked         
            case 1:
                echo "    <td><input type='radio' name='source' value='Audit' checked>Audit</td>";
            break;
            case 2:
                echo "    <td><input type='radio' name='source' value='Prestart' checked>Prestart</td>";
            break;
            case 3:
                echo "    <td><input type='radio' name='source' value='Toolbox' checked>Toolbox</td>";
            break;
            case 4:
                echo "    <td><input type='radio' name='source' value='Visual' checked>Visual</td>";
            break;
            case 5:
                echo "    <td><input type='radio' name='source' value='Incident' checked>Incident</td>";
            break;
            case 6:
                echo "    <td><input type='radio' name='source' value='Other' checked>Other</td>";
            break;
            }
         echo "</tr>";
         echo "</table><br>";

         echo "Supervisor Name:";
         echo "<input type='text' name='sup_Name' value='$sup_Name'><br><br>";
         echo "Area:";
         echo "<input type='text' name='Area' size='5' value='$Area'>";
         echo "Department:";
         echo "<input type='text' name='Department' size='10' value='$Department'><br><br>";
         echo "Description of Incident:<br>";
         echo "<textarea cols='40' rows='7' style='width:550px; height:50px;' class='' name='Description'>$Description</textarea><br><br>";
         
         echo "<table>";
         echo "<tr class='blank'>";
         echo "    <td>Risk (Please select one):</td>";         
         switch($risk){//if the submit button is clicked         
            case 1:
                echo "    <td><input type='radio' name='risk' value='High' checked>High</td>";
            break;
            case 2:
                echo "    <td><input type='radio' name='risk' value='Medium' checked>Medium</td>";
            break;
            case 3:
                echo "    <td><input type='radio' name='risk' value='Low' checked>Low</td>";
            break;
         }
         echo "</tr>";
         echo "</table><br>";
         echo "Corrective Action:<br>";
         echo "<textarea cols='40' rows='7' name='Corr_Action'style='width:550px; height:50px;' class=''>$Corr_Action</textarea><br><br>";
         
         if ($Follow_Up == 1){
         echo "<table>";
         echo "<tr class='blank'>";
         echo "    <td>Follow up required:</td>";
         echo "    <td><input type='radio' name='Follow_Up' value='$Follow_Up' checked>Yes</td>";
         echo "    <td>Followup Date: <input type='date' name='Follow_Date' value=" . date('Y-m-d', $Follow_Date) . "></td>";
         echo "</tr>";
         echo "</table><br>";
         echo "Follow up action required:<br>";
         echo "<textarea cols='40' rows='7' name='Follow_Action' style='width:550px; height:50px;' class=''>$Follow_Action</textarea><br><br>";
         
         echo "Person responsible for followup action: ";
         echo "<input type='text' name='Resp_Person' size='10' value='$Resp_Person'><br><br>";
         }else{
         echo "<table>";
         echo "<tr class='blank'>";
         echo "    <td>Follow up required:</td>";
         echo "    <td><input type='radio' name='Follow_Up' value='$Follow_Up' checked>No</td>";
         echo "</tr>";
         echo "</table><br>";
         }

         echo "Date Finalized:<input type='date' name='Final_Date' value=" . date('Y-m-d', $Final_Date) . "><br><br>";
         echo "<input type='Submit' value='Update Report' name='nav_btn'>";
         break;
        
        case 'Submit Observation Log':

    $Rpt_Num = $_POST['Rpt_Num'];
    $obs_date = $_POST['obs_date'];
    $id_Name = $_POST['id_Name'];
    
    $source = $_POST['source'];
    
    $sup_Name = $_POST['sup_Name'];
    $Area = $_POST['Area'];
    $Department = $_POST['Department'];
    $Description = $_POST['Description'];
    
    $risk = $_POST['risk'];
    $Corr_Action = $_POST['Corr_Action'];
    
    $Follow_Up = $_POST['Follow_Up'];
    $Follow_Date = $_POST['Follow_Date'];
    $Follow_Action = $_POST['Follow_Action'];
    $Resp_Person = $_POST['Resp_Person'];
    
    $Final_Date = $_POST['Final_Date'];

         echo "<h2>Observation Form</h2>";
         echo "Date:"; 
         echo "<input type='date' name='obs_date' value='$obs_date'><br><br>";
         echo "Name of person who identified hazard";
         echo "<input type='text' name='id_Name' value='$id_name'><br><br>";
         echo "Source (Please select one)<br>";
         echo "<table>";
         echo "<tr class='blank'>";
         echo "    <td><input type='radio' name='source' value='$source'>Audit</td>";
         echo "</tr>";
         echo "</table><br>";

         echo "Supervisor Name:";
         echo "<input type='text' name='sup_Name' value='$sup_Name'><br><br>";
         echo "Area:";
         echo "<input type='text' name='Area' size='5' value='$Area'>";
         echo "Department:";
         echo "<input type='text' name='Department' size='10' value='$Department'><br><br>";
         echo "Description of Incident:<br>";
         echo "<textarea cols='40' rows='7' style='width:550px; height:50px;' class='' name='Description'>$Description</textarea><br><br>";
         
         echo "<table>";
         echo "<tr class='blank'>";
         echo "    <td>Risk (Please select one):</td>";
         echo "    <td><input type='radio' name='risk' value='$Risk'>High</td>";
         echo "</tr>";
         echo "</table><br>";
         echo "Corrective Action:<br>";
         echo "<textarea cols='40' rows='7' name='Corr_Action'style='width:550px; height:50px;' class=''>$Corr_Action</textarea><br><br>";
         
         echo "<table>";
         echo "<tr class='blank'>";
         echo "    <td>Follow up required:</td>";
         echo "    <td><input type='radio' name='Follow_Up' value='$Follow_Up'>Yes</td>";
         echo "    <td>Followup Date: <input type='date' name='Follow_Date' value='$Follow_Up'></td>";
         echo "</tr>";
         echo "</table><br>";
         echo "Follow up action required:<br>";
         echo "<textarea cols='40' rows='7' name='Follow_Action' style='width:550px; height:50px;' class=''>$Follow_Action</textarea><br><br>";
         
         echo "Person responsible for followup action: ";
         echo "<input type='text' name='Resp_Person' size='10' value='$Resp_Person'><br><br>";

         echo "Date Finalized:<input type='date' name='Final_Date' value='$Final_Date'><br><br>";
         echo "<input type='Submit' value='Update Report' name='nav_btn'>";
        break;
        
        case 'Update Report':
        break;
        }
        }
        if(empty($_POST['nav_btn'])){
         echo "<h2>Observation Form</h2>";
         echo "Date:"; 
         echo "<input type='date' name='obs_date' value=" . date('Y-m-d') . "><br><br>";
         echo "Name of person who identified hazard";
         echo "<input type='text' name='id_Name'><br><br>";
         echo "Source (Please select one)<br>";
         echo "<table>";
         echo "<tr class='blank'>";
         echo "    <td><input type='radio' name='source' value='audit' required>Audit</td>";
         echo "    <td><input type='radio' name='source' value='prestart'>Prestart</td>";
         echo "    <td><input type='radio' name='source' value='toolbox'>Toolbox</td>";
         echo "    <td><input type='radio' name='source' value='visual'>Visual</td>";
         echo "    <td><input type='radio' name='source' value='incident'>Incident</td>";
         echo "    <td><input type='radio' name='source' value='other' checked>Other</td>";
         echo "</tr>";
         echo "</table><br>";

         echo "Supervisor Name:";
         echo "<input type='text' name='sup_Name'><br><br>";
         echo "Area:";
         echo "<input type='text' name='Area' size='5'>";
         echo "Department:";
         echo "<input type='text' name='Department' size='10'><br><br>";
         echo "Description of Incident:<br>";
         echo "<textarea cols='40' rows='7' style='width:550px; height:50px;' class='' name='Description'></textarea><br><br>";
         
         echo "<table>";
         echo "<tr class='blank'>";
         echo "    <td>Risk (Please select one):</td>";
         echo "    <td><input type='radio' name='risk' value='high' Required>High</td>";
         echo "    <td><input type='radio' name='risk' value='medium'>Medium</td>";
         echo "    <td><input type='radio' name='risk' value='low' checked>Low</td>";
         echo "</tr>";
         echo "</table><br>";
         echo "Corrective Action:<br>";
         echo "<textarea cols='40' rows='7' name='Corr_Action'style='width:550px; height:50px;' class=''></textarea><br><br>";
         
         echo "<table>";
         echo "<tr class='blank'>";
         echo "    <td>Follow up required:</td>";
         echo "    <td><input type='radio' name='Follow_Up' value='yes' required>Yes</td>";
         echo "    <td><input type='radio' name='Follow_Up' value='no' checked>No</td>";
         echo "    <td>Followup Date: <input type='date' name='Follow_Date' value=" . date('Y-m-d') . "></td>";
         echo "</tr>";
         echo "</table><br>";
         echo "Follow up action required:<br>";
         echo "<textarea cols='40' rows='7' name='Follow_Action' style='width:550px; height:50px;' class=''></textarea><br><br>";
         
         echo "Person responsible for followup action: ";
         echo "<input type='text' name='Resp_Person' size='10'><br><br>";

         echo "Date Finalized:<input type='date' name='Final_Date' value=" . date('Y-m-d') . "><br><br>";
         echo "<input type='Submit' value='Submit Observation Log' name='nav_btn'>";
        }
    ?>
        </form>
</div>

<?php
  switch($_POST['nav_btn']){//if the submit button is clicked
  case 'Submit Observation Log':
    $Rpt_Num = $_POST['Rpt_Num'];
        
    //$obs_Idx = $_POST['obs_Idx'];
    $obs_date = $_POST['obs_date'];
    $obs_date = strtotime($obs_date);
    $id_Name = $_POST['id_Name'];
    
    $source = $_POST['source'];
        switch($source){
            case 'audit':
            $source = 1;
            break;
            case 'prestart':
            $source = 2;
            break;
            case 'toolbox':
            $source = 3;
            break;
            case 'visual':
            $source = 4;
            break;
            case 'incident':
            $source = 5;
            break;
            case 'other':
            $source = 6;
            break;
    }
    
    $sup_Name = $_POST['sup_Name'];
    $Area = $_POST['Area'];
    $Department = $_POST['Department'];
    $Description_1 = $_POST['Description'];
    $Description = mysql_real_escape_string(trim($Description_1));
    $risk = $_POST['risk'];
        switch($risk){
            case 'high':
            $risk = 1;
            break;
            case 'medium':
            $risk = 2;
            break;
            case 'low':
            $risk = 3;
            break;
    }
    $Corr_Action_1 = $_POST['Corr_Action'];
    $Corr_Action = mysql_real_escape_string(trim($Corr_Action_1));
    
    $Follow_Up = $_POST['Follow_Up'];
            switch($Follow_Up){
            case 'yes':
            $Follow_Up = 1;
            break;
            case 'no':
            $Follow_Up = 2;
            break;
    }
    $Follow_Date = $_POST['Follow_Date'];
    $Follow_Date = strtotime($Follow_Date);
    $Follow_Action_1 = $_POST['Follow_Action'];
    $Follow_Action = mysql_real_escape_string(trim($Follow_Action_1));
    $Resp_Person = $_POST['Resp_Person'];
    
    $Final_Date = $_POST['Final_Date'];
    $Final_Date = strtotime($Final_Date);

    $query1="Insert INTO observation (obs_date, id_Name, source, sup_Name, Area, Department, Description, risk, Corr_Action, Follow_Up, Follow_Date, Follow_Action, Resp_Person, Final_Date) VALUES ($obs_date, '$id_Name', $source, '$sup_Name', '$Area', '$Department', '$Description', $risk, '$Corr_Action', $Follow_Up, $Follow_Date, '$Follow_Action', '$Resp_Person', $Final_Date)";
    

    //Adds record of RefCell to Database
    mysqli_query($conn, $query1) or die("Cannot update " . $obs_date . " a " . $id_Name . " a " . $source . " a " . $sup_Name . " a " . $Area . " a " . $Department . " a " . $Description . " a " . $risk . " a " . $Corr_Action . " a " . $Follow_Up . " a " . $Follow_Date . " a " . $Follow_Action . " a " . $Resp_Person . " a " . $Final_Date);//update or error
            
    mysqli_close($conn);   
    break;

  case '<':      
    echo "To The Left";
    break;
  
  case '>':      
    echo "To The Right";
    break;
  
  case 'Go':      
    $Rpt_Num = $_POST['Rpt_Num'];
    break;

  case 'Update Report':      
    $Rpt_Num = $_POST['Rpt_Num'];
    $NM_Desc = $_POST['NM_Desc'];
    $Causes = $_POST['Causes'];
    $Corr_Action = $_POST['Corr_Action'];
    $Investigator = $_POST['Investigator'];
    $No_Comp = $_POST['No_Comp'];
    
    $sqlUpdate = "UPDATE near_miss SET NM_Desc = '$NM_Desc', Causes = '$Causes', Corr_Action = '$Corr_Action', Investigator = '$Investigator', No_Comp = '$No_Comp' Where NM_Index = $Rpt_Num";
    //$sqlUpdate = "INSERT INTO near_miss (NM_Desc, Causes, Corr_Action, Investigator, No_Comp) VALUES ('$NM_Desc', '$Causes', '$Corr_Action', '$Investigator', '$No_Comp') WHERE NM_Index = $Rpt_Num";
    @mysqli_query($conn, $sqlUpdate) or die("Cannot update " . $Rpt_Num  . " " . $NM_Desc . " " . $Causes . " " . $Corr_Action . " " . $Investigator . " " . $No_Comp);//update or error
    echo $Rpt_Num;        
    mysqli_close($conn);  
    break;
}    

?>


<?php
        include ("Includes/footer.php");

?>

