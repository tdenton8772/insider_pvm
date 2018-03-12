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
<script type="text/javascript">
var strWindowFeatures = "toolbar=no, location=yes, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=yes, width=500, height=500";
var windowObjectReference;
function openWin()
{
  var windowObjectReference = window.open("http://insider/failures_help.php", "Failures_Help", strWindowFeatures);
  
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
        
        case 'Submit Failure Log':
            $Rpt_Num = $_POST['Rpt_Num'];
           echo "<input type='text' name='Rpt_Num' size ='5' value='$Rpt_Num' class='NavTextBox'>";
        break;
        
        case 'Update Failure Log':
           $Rpt_Num = $_POST['Rpt_Num'];
           echo "<input type='text' name='Rpt_Num' size ='5' value='$Rpt_Num' class='NavTextBox'>";
        break;
        }
        }
        if(empty($_POST['nav_btn'])){
           $query = "SELECT Failures_Idx FROM failures ORDER BY Failures_Idx ASC";
           $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $result1 = $row['Failures_Idx'];
            }
            } else {
            }
           $result = $result1 + 1;
           echo "<input type='text' name='Rpt_Num' size ='5' value='" . $result . "' class='NavTextBox'>";
        }
    ?><!--Navigation Bar-->
    <input type="submit" name="nav_btn"value=">">
    <input type="submit" name="nav_btn" value="Go"><A HREF="Failures.php">Make New Log</A><input type="button" onclick="openWin();" value="Help" />
    <br><br>

        <?php
        if (!empty($_POST['nav_btn'])) {
         switch($_POST['nav_btn']){//if the submit button is clicked
//////////////////////////////////////////////////////////////////////////////             
         case 'Go':
         $Rpt_Num = $_POST['Rpt_Num'];
           $query = "SELECT Major_System,
                            Doc_P_SA,
                            Closed,
                            Found_By,
                            Issued_To,
                            Prob_Desc,
                            Solution_Desc,
                            chk_MFR,
                            chk_Design,
                            chk_Supp,
                            chk_Doc,
                            chk_Part,
                            chk_Proc,
                            chk_Purc,
                            TimeLost,
                            Found_DT,
                            End_DT,
                            WorkOrder
                      FROM failures 
                      WHERE Failures_Idx = $Rpt_Num";
           $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $result1 = $row['Major_System'];
                $result2 = $row['Doc_P_SA'];
                $result3 = $row['Closed'];
                $result4 = $row['Found_By'];
                $result5 = $row['Issued_To'];
                $result6 = $row['Prob_Desc'];
                $result7 = $row['Solution_Desc'];
                $result8 = $row['chk_MFR'];
                $result9 = $row['chk_Design'];
                $result10 = $row['chk_Supp'];
                $result11 = $row['chk_Doc'];
                $result12 = $row['chk_Part'];
                $result13 = $row['chk_Proc'];
                $result14 = $row['chk_Purc'];
                $result15 = $row['TimeLost'];
                $result16 = $row['Found_DT'];
                $result17 = $row['End_DT'];
                $result18 = $row['WorkOrder'];
            }
            } else {
            }
           $Major_System = $result1;
           $Doc_P_SA = $result2;
           $Closed = $result3;
           $Found_By = $result4;
           $Issued_To = $result5;
           $Prob_Desc = $result6;
           $Solution_Desc = $result7;
           $chk_MFR = $result8;
           $chk_Design = $result9;
           $chk_Supp = $result10;
           $chk_Doc = $result11;
           $chk_Part = $result12;
           $chk_Proc = $result13;
           $chk_Purc = $result14;
           $TimeLost = $result15;
           $Found_DT = $result16;
                if($Found_DT == 0){
                    $Found_DT = 0;
                }
                else {
                    $Found_DT = date('Y-m-d', $Found_DT);
                }

           $End_DT = $result17;

           if($End_DT == 0){
               $End_DT = 0;
           }
           else {
                $End_DT = date('Y-m-d', $End_DT);
           }
           $WO_Num = $result18;
         
                 
            echo "Major System:  ";
            echo "<input type='text' name='Major_System' size ='17' value='$Major_System' class=''>";
            echo "Doc/Part/Subassy:  ";
            echo "<input type='text' name='Doc_P_SA' size ='15' value='$Doc_P_SA' class=''>&#160 &#160";
            
            if($Closed == 1){
                echo "    <td><input type='checkbox' name='Closed' value='1' checked>Closed</td>";
            }else{
             echo "    <td><input type='checkbox' name='Closed' value='1'>Closed</td>"; 
            }

            
            echo "<table>";
            echo "<tr class='blank'>";
            echo "   <td>";

            echo "<table>";
            echo    "<tr class=''>";
            echo        "<th style='width:33%'><u>Start Date:</u></th>";
            echo        "<th style='width:33%'><u>End Date:</u></th>";
            echo        "<th style='width:33%'><u>Build Delay Hours:  </u></th>";
            echo    "</tr>";
            echo    "<tr class=''>";
            echo        "<td><input type='date' name='Found_DT' size ='13' value='" . $Found_DT  . "' class=''></td>";
            echo        "<td><input type='date' name='End_DT' size ='13' value='" . $End_DT  . "' class=''></td>";
            echo        "<td><input type='text'  name='TimeLost' size ='10' value='$TimeLost' class=''></td>";
            echo    "</tr>";
            echo "</table><br>";

            echo "<td>Work Order# <Input type='text' name='WO_Num' value=$WO_Num></td>";

            echo "</td>";
            echo "</tr>";
            echo "</table>";

            echo "Description of the Problem: &#160 &#160 ";
            echo "Found By: <input type='text'  name='Found_By' size ='10' value='$Found_By' class=''>&#160 &#160 ";
            echo "Issued To: <input type='text'  name='Issued_To' size ='10' value='$Issued_To' class=''><br>";
            echo "<textarea cols='40' rows='7'  style='width:550px; height:100px;' class='' name='Prob_Desc'>$Prob_Desc</textarea>"; 

         echo "<table>";
         echo "<tr class='blank'>";
         if($chk_MFR == 1){
             echo "    <td><input type='checkbox' name='chk_MFR' value='1' checked>MFR Issue</td>";
         }else{
             echo "    <td><input type='checkbox' name='chk_MFR' value='1'>MFR Issue</td>"; 
         }

         if($chk_Design == 1){
             echo "    <td><input type='checkbox' name='chk_Design' value='1' checked>Design Issue</td>";
         }else{
             echo "    <td><input type='checkbox' name='chk_Design' value='1'>Design Issue</td>"; 
         }

         if($chk_Supp == 1){
             echo "    <td><input type='checkbox' name='chk_Supp' value='1' checked>Supp Quality</td>";
         }else{
             echo "    <td><input type='checkbox' name='chk_Supp' value='1'>Supp Quality</td>"; 
         }

         if($chk_Doc == 1){
             echo "    <td><input type='checkbox' name='chk_Doc' value='1' checked>DOC</td>";
         }else{
             echo "    <td><input type='checkbox' name='chk_Doc' value='1'>DOC</td>";
         }

         if($chk_Part == 1){
             echo "    <td><input type='checkbox' name='chk_Part' value='1' checked>Missing Parts</td>";
         }else{
             echo "    <td><input type='checkbox' name='chk_Part' value='1'>Missing Parts</td>";
         }

         echo "</tr>";
         echo "</table>";

         echo "Solution";
         echo "<textarea cols='40' rows='7'  style='width:550px; height:100px;' class='' name='Solution_Desc'>$Solution_Desc</textarea>"; 
                  echo "<table>";
         echo "<tr class='blank'>";

         if($chk_Proc == 1){
         echo "   <td><input type='checkbox' name='chk_Proc' value='1' checked>Added to Proc Spreadsheet</td>";
          }else{
         echo "   <td><input type='checkbox' name='chk_Proc' value='1'>Added to Proc Spreadsheet</td>";
         }
         if($chk_Proc == 1){
         echo "    <td><input type='checkbox' name='chk_Purc' value='1' checked>Informed Purch</td>";
         }else{
         echo "    <td><input type='checkbox' name='chk_Purc' value='1'>Informed Purch</td>";
         }
         echo "</tr>";
         echo "</table>";
         echo "<input type='Submit' value='Update Failure Log' name='nav_btn'>";
         break;
 //////////////////////////////////////////////////////////////////////////////              
        case '<':
           $Rpt_Num = $_POST['Rpt_Num'];
           $Rpt_Num = $Rpt_Num - 1;
           $query = "SELECT Major_System,
                            Doc_P_SA,
                            Closed,
                            Found_By,
                            Issued_To,
                            Prob_Desc,
                            Solution_Desc,
                            chk_MFR,
                            chk_Design,
                            chk_Supp,
                            chk_Doc,
                            chk_Part,
                            chk_Proc,
                            chk_Purc,
                            TimeLost,
                            Found_DT,
                            End_DT,
                            WorkOrder
                      FROM failures 
                      WHERE Failures_Idx = $Rpt_Num";
           $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $result1 = $row['Major_System'];
                $result2 = $row['Doc_P_SA'];
                $result3 = $row['Closed'];
                $result4 = $row['Found_By'];
                $result5 = $row['Issued_To'];
                $result6 = $row['Prob_Desc'];
                $result7 = $row['Solution_Desc'];
                $result8 = $row['chk_MFR'];
                $result9 = $row['chk_Design'];
                $result10 = $row['chk_Supp'];
                $result11 = $row['chk_Doc'];
                $result12 = $row['chk_Part'];
                $result13 = $row['chk_Proc'];
                $result14 = $row['chk_Purc'];
                $result15 = $row['TimeLost'];
                $result16 = $row['Found_DT'];
                $result17 = $row['End_DT'];
                $result18 = $row['WorkOrder'];
            }
            } else {
            }
           $Major_System = $result1;
           $Doc_P_SA = $result2;
           $Closed = $result3;
           $Found_By = $result4;
           $Issued_To = $result5;
           $Prob_Desc = $result6;
           $Solution_Desc = $result7;
           $chk_MFR = $result8;
           $chk_Design = $result9;
           $chk_Supp = $result10;
           $chk_Doc = $result11;
           $chk_Part = $result12;
           $chk_Proc = $result13;
           $chk_Purc = $result14;
           $TimeLost = $result15;
           $Found_DT = $result16;
                if($Found_DT == 0){
                    $Found_DT = 0;
                }
                else {
                    $Found_DT = date('Y-m-d', $Found_DT);
                }

           $End_DT = $result17;

           if($End_DT == 0){
               $End_DT = 0;
           }
           else {
                $End_DT = date('Y-m-d', $End_DT);
           }
           $WO_Num = $result18;
                 
            echo "Major System:  ";
            echo "<input type='text' name='Major_System' size ='17' value='$Major_System' class=''>";
            echo "Doc/Part/Subassy:  ";
            echo "<input type='text' name='Doc_P_SA' size ='15' value='$Doc_P_SA' class=''>&#160 &#160";
            
            if($Closed == 1){
                echo "    <td><input type='checkbox' name='Closed' value='1' checked>Closed</td>";
            }else{
             echo "    <td><input type='checkbox' name='Closed' value='1'>Closed</td>"; 
            }
            
            echo "<table>";
            echo "<tr class='blank'>";
            echo "   <td>";

            echo "<table>";
            echo    "<tr class=''>";
            echo        "<th style='width:33%'><u>Start Date:</u></th>";
            echo        "<th style='width:33%'><u>End Date:</u></th>";
            echo        "<th style='width:33%'><u>Build Delay Hours:  </u></th>";
            echo    "</tr>";
            echo    "<tr class=''>";
            echo        "<td><input type='date' name='Found_DT' size ='13' value='" . $Found_DT  . "' class=''></td>";
            echo        "<td><input type='date' name='End_DT' size ='13' value='" . $End_DT  . "' class=''></td>";
            echo        "<td><input type='text'  name='TimeLost' size ='10' value='$TimeLost' class=''></td>";
            echo    "</tr>";
            echo "</table><br>";

            echo "<td>Work Order# <Input type='text' name='WO_Num' value=$WO_Num></td>";

            echo "</td>";
            echo "</tr>";
            echo "</table>";

            echo "Description of the Problem: &#160 &#160 ";
            echo "Found By: <input type='text'  name='Found_By' size ='10' value='$Found_By' class=''>&#160 &#160 ";
            echo "Issued To: <input type='text'  name='Issued_To' size ='10' value='$Issued_To' class=''><br>";
            echo "<textarea cols='40' rows='7'  style='width:550px; height:100px;' class='' name='Prob_Desc'>$Prob_Desc</textarea>"; 

         echo "<table>";
         echo "<tr class='blank'>";
         if($chk_MFR == 1){
             echo "    <td><input type='checkbox' name='chk_MFR' value='1' checked>MFR Issue</td>";
         }else{
             echo "    <td><input type='checkbox' name='chk_MFR' value='1'>MFR Issue</td>"; 
         }

         if($chk_Design == 1){
             echo "    <td><input type='checkbox' name='chk_Design' value='1' checked>Design Issue</td>";
         }else{
             echo "    <td><input type='checkbox' name='chk_Design' value='1'>Design Issue</td>"; 
         }

         if($chk_Supp == 1){
             echo "    <td><input type='checkbox' name='chk_Supp' value='1' checked>Supp Quality</td>";
         }else{
             echo "    <td><input type='checkbox' name='chk_Supp' value='1'>Supp Quality</td>"; 
         }

         if($chk_Doc == 1){
             echo "    <td><input type='checkbox' name='chk_Doc' value='1' checked>DOC</td>";
         }else{
             echo "    <td><input type='checkbox' name='chk_Doc' value='1'>DOC</td>";
         }

         if($chk_Part == 1){
             echo "    <td><input type='checkbox' name='chk_Part' value='1' checked>Missing Parts</td>";
         }else{
             echo "    <td><input type='checkbox' name='chk_Part' value='1'>Missing Parts</td>";
         }

         echo "</tr>";
         echo "</table>";

         echo "Solution";
         echo "<textarea cols='40' rows='7'  style='width:550px; height:100px;' class='' name='Solution_Desc'>$Solution_Desc</textarea>"; 
                  echo "<table>";
         echo "<tr class='blank'>";

         if($chk_Proc == 1){
         echo "   <td><input type='checkbox' name='chk_Proc' value='1' checked>Added to Proc Spreadsheet</td>";
          }else{
         echo "   <td><input type='checkbox' name='chk_Proc' value='1'>Added to Proc Spreadsheet</td>";
         }
         if($chk_Proc == 1){
         echo "    <td><input type='checkbox' name='chk_Purc' value='1' checked>Informed Purch</td>";
         }else{
         echo "    <td><input type='checkbox' name='chk_Purc' value='1'>Informed Purch</td>";
         }
         echo "</tr>";
         echo "</table>";
         echo "<input type='Submit' value='Update Failure Log' name='nav_btn'>";
        break;
 //////////////////////////////////////////////////////////////////////////////              
        case '>':
           $Rpt_Num = $_POST['Rpt_Num'];
           $Rpt_Num = $Rpt_Num + 1;
           $query = "SELECT Major_System,
                            Doc_P_SA,
                            Closed,
                            Found_By,
                            Issued_To,
                            Prob_Desc,
                            Solution_Desc,
                            chk_MFR,
                            chk_Design,
                            chk_Supp,
                            chk_Doc,
                            chk_Part,
                            chk_Proc,
                            chk_Purc,
                            TimeLost,
                            Found_DT,
                            End_DT,
                            WorkOrder
                      FROM failures 
                      WHERE Failures_Idx = $Rpt_Num";
           $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $result1 = $row['Major_System'];
                $result2 = $row['Doc_P_SA'];
                $result3 = $row['Closed'];
                $result4 = $row['Found_By'];
                $result5 = $row['Issued_To'];
                $result6 = $row['Prob_Desc'];
                $result7 = $row['Solution_Desc'];
                $result8 = $row['chk_MFR'];
                $result9 = $row['chk_Design'];
                $result10 = $row['chk_Supp'];
                $result11 = $row['chk_Doc'];
                $result12 = $row['chk_Part'];
                $result13 = $row['chk_Proc'];
                $result14 = $row['chk_Purc'];
                $result15 = $row['TimeLost'];
                $result16 = $row['Found_DT'];
                $result17 = $row['End_DT'];
                $result18 = $row['WorkOrder'];
            }
            } else {
            }
           $Major_System = $result1;
           $Doc_P_SA = $result2;
           $Closed = $result3;
           $Found_By = $result4;
           $Issued_To = $result5;
           $Prob_Desc = $result6;
           $Solution_Desc = $result7;
           $chk_MFR = $result8;
           $chk_Design = $result9;
           $chk_Supp = $result10;
           $chk_Doc = $result11;
           $chk_Part = $result12;
           $chk_Proc = $result13;
           $chk_Purc = $result14;
           $TimeLost = $result15;
           $Found_DT = $result16;
                if($Found_DT == 0){
                    $Found_DT = 0;
                }
                else {
                    $Found_DT = date('Y-m-d', $Found_DT);
                }

           $End_DT = $result17;

           if($End_DT == 0){
               $End_DT = 0;
           }
           else {
                $End_DT = date('Y-m-d', $End_DT);
           }
           $WO_Num = $result18;
         
                 
            echo "Major System:  ";
            echo "<input type='text' name='Major_System' size ='17' value='$Major_System' class=''>";
            echo "Doc/Part/Subassy:  ";
            echo "<input type='text' name='Doc_P_SA' size ='15' value='$Doc_P_SA' class=''>&#160 &#160";
            
            if($Closed == 1){
                echo "    <td><input type='checkbox' name='Closed' value='1' checked>Closed</td>";
            }else{
             echo "    <td><input type='checkbox' name='Closed' value='1'>Closed</td>"; 
            }
            
            echo "<table>";
            echo "<tr class='blank'>";
            echo "   <td>";

            echo "<table>";
            echo    "<tr class=''>";
            echo        "<th style='width:33%'><u>Start Date:</u></th>";
            echo        "<th style='width:33%'><u>End Date:</u></th>";
            echo        "<th style='width:33%'><u>Build Delay Hours:  </u></th>";
            echo    "</tr>";
            echo    "<tr class=''>";
            echo        "<td><input type='date' name='Found_DT' size ='13' value='" . $Found_DT  . "' class=''></td>";
            echo        "<td><input type='date' name='End_DT' size ='13' value='" . $End_DT  . "' class=''></td>";
            echo        "<td><input type='text'  name='TimeLost' size ='10' value='$TimeLost' class=''></td>";
            echo    "</tr>";
            echo "</table><br>";

            echo "<td>Work Order# <Input type='text' name='WO_Num' value=$WO_Num></td>";

            echo "</td>";
            echo "</tr>";
            echo "</table>";

            echo "Description of the Problem: &#160 &#160 ";
            echo "Found By: <input type='text'  name='Found_By' size ='10' value='$Found_By' class=''>&#160 &#160 ";
            echo "Issued To: <input type='text'  name='Issued_To' size ='10' value='$Issued_To' class=''><br>";
            echo "<textarea cols='40' rows='7'  style='width:550px; height:100px;' class='' name='Prob_Desc'>$Prob_Desc</textarea>"; 

         echo "<table>";
         echo "<tr class='blank'>";
         if($chk_MFR == 1){
             echo "    <td><input type='checkbox' name='chk_MFR' value='1' checked>MFR Issue</td>";
             
         }else{
             echo "    <td><input type='checkbox' name='chk_MFR' value='1'>MFR Issue</td>"; 
         }

         if($chk_Design == 1){
             echo "    <td><input type='checkbox' name='chk_Design' value='1' checked>Design Issue</td>";
         }else{
             echo "    <td><input type='checkbox' name='chk_Design' value='1'>Design Issue</td>"; 
         }

         if($chk_Supp == 1){
             echo "    <td><input type='checkbox' name='chk_Supp' value='1' checked>Supp Quality</td>";
         }else{
             echo "    <td><input type='checkbox' name='chk_Supp' value='1'>Supp Quality</td>"; 
         }

         if($chk_Doc == 1){
             echo "    <td><input type='checkbox' name='chk_Doc' value='1' checked>DOC</td>";
         }else{
             echo "    <td><input type='checkbox' name='chk_Doc' value='1'>DOC</td>";
         }

         if($chk_Part == 1){
             echo "    <td><input type='checkbox' name='chk_Part' value='1' checked>Missing Parts</td>";
         }else{
             echo "    <td><input type='checkbox' name='chk_Part' value='1'>Missing Parts</td>";
         }

         echo "</tr>";
         echo "</table>";

         echo "Solution";
         echo "<textarea cols='40' rows='7'  style='width:550px; height:100px;' class='' name='Solution_Desc'>$Solution_Desc</textarea>"; 
                  echo "<table>";
         echo "<tr class='blank'>";

         if($chk_Proc == 1){
         echo "   <td><input type='checkbox' name='chk_Proc' value='1' checked>Added to Proc Spreadsheet</td>";
          }else{
         echo "   <td><input type='checkbox' name='chk_Proc' value='1'>Added to Proc Spreadsheet</td>";
         }
         if($chk_Proc == 1){
         echo "    <td><input type='checkbox' name='chk_Purc' value='1' checked>Informed Purch</td>";
         }else{
         echo "    <td><input type='checkbox' name='chk_Purc' value='1'>Informed Purch</td>";
         }
         echo "</tr>";
         echo "</table>";
         echo "<input type='Submit' value='Update Failure Log' name='nav_btn'>";
        break;
//////////////////////////////////////////////////////////////////////////////        
        case 'Submit Failure Log':
        $Rpt_Num = $_POST['Rpt_Num'];
        $Major_System = $_POST['Major_System'];
        $Doc_P_SA = $_POST['Doc_P_SA'];
        $Found_By = $_POST['Found_By'];
        $Prob_Desc = $_POST['Prob_Desc'];
        $Solution_Desc = $_POST['Solution_Desc'];
        $TimeLost = $_POST['TimeLost'];
        $WO_Num = $_POST['WO_Num'];
        $Issued_To = $_POST['Issued_To'];
            if (empty($Issued_To)) {
                $Issued_To = 0;
            }
        $Closed = $_POST['Closed'];
            if (empty($Closed)) {
                $Closed = 0;
            }
        $chk_MFR = $_POST['chk_MFR'];
            if (empty($chk_MFR)) {
                $chk_MFR = 0;
            }
        $chk_Design = $_POST['chk_Design'];
            if (empty($chk_Design)) {
                $chk_Design = 0;
            }
        $chk_Supp = $_POST['chk_Supp'];
            if (empty($chk_Supp)) {
                $chk_Supp = 0;
            }
        $chk_Doc = $_POST['chk_Doc'];
            if (empty($chk_Doc)) {
                $chk_Doc = 0;
            }
        $chk_Part = $_POST['chk_Part'];
            if (empty($chk_Part)) {
                $chk_Part = 0;
            }
        $chk_Proc = $_POST['chk_Proc'];
            if (empty($chk_Proc)) {
                $chk_Proc = 0;
            }
        $chk_Purc = $_POST['chk_Purc'];
            if (empty($chk_Purc)) {
                $chk_Purc = 0;
            }
            echo "Major System:  ";
            echo "<input type='text' name='Major_System' size ='17' value='$Major_System' class=''>";
            echo "Doc/Part/Subassy:  ";
            echo "<input type='text' name='Doc_P_SA' size ='15' value='$Doc_P_SA' class=''>&#160 &#160";
            
            if($Closed == 1){
                echo "    <td><input type='checkbox' name='Closed' value='1' checked>Closed</td>";
            }else{
             echo "    <td><input type='checkbox' name='Closed' value='1'>Closed</td>"; 
            }
            
            echo "<table>";
            echo "<tr class='blank'>";
            echo "   <td>";

            echo "<table>";
            echo    "<tr class=''>";
            echo        "<th style='width:33%'><u>Start Date:</u></th>";
            echo        "<th style='width:33%'><u>End Date:</u></th>";
            echo        "<th style='width:33%'><u>Build Delay Hours:  </u></th>";
            echo    "</tr>";
            echo    "<tr class=''>";
            echo        "<td><input type='date' name='Found_DT' size ='13' value='" . date('Y-m-d')  . "' class=''></td>";
            echo        "<td><input type='date' name='End_DT' size ='13' value='" . date('Y-m-d')  . "' class=''></td>";
            echo        "<td><input type='text'  name='TimeLost' size ='10' value='$TimeLost' class=''></td>";
            echo    "</tr>";
            echo "</table><br>";

            echo "<td>Work Order# <Input type='text' name='WO_Num' value=$WO_Num></td>";

            echo "</td>";
            echo "</tr>";
            echo "</table>";

            echo "Description of the Problem: &#160 &#160 ";
            echo "Found By: <input type='text'  name='Found_By' size ='10' value='$Found_By' class=''>&#160 &#160 ";
            echo "Issued To: <input type='text'  name='Issued_To' size ='10' value='$Issued_To' class=''><br>";
            echo "<textarea cols='40' rows='7'  style='width:550px; height:100px;' class='' name='Prob_Desc'>$Prob_Desc</textarea>"; 

         echo "<table>";
         echo "<tr class='blank'>";
         if($chk_MFR = 1){
             echo "    <td><input type='checkbox' name='chk_MFR' value='1' checked>MFR Issue</td>";
         }else{
             echo "    <td><input type='checkbox' name='chk_MFR' value='1'>MFR Issue</td>"; 
         }

         if($chk_Design = 1){
             echo "    <td><input type='checkbox' name='chk_Design' value='1'>Design Issue</td>";
         }else{
             echo "    <td><input type='checkbox' name='chk_Design' value='1'>Design Issue</td>"; 
         }

         if($chk_Supp = 1){
             echo "    <td><input type='checkbox' name='chk_Supp' value='1'>Supp Quality</td>";
         }else{
             echo "    <td><input type='checkbox' name='chk_Supp' value='1'>Supp Quality</td>"; 
         }

         if($chk_Doc = 1){
             echo "    <td><input type='checkbox' name='chk_Doc' value='1'>DOC</td>";
         }else{
             echo "    <td><input type='checkbox' name='chk_Doc' value='1'>DOC</td>";
         }

         if($chk_Part = 1){
             echo "    <td><input type='checkbox' name='chk_Part' value='1'>Missing Parts</td>";
         }else{
             echo "    <td><input type='checkbox' name='chk_Part' value='1'>Missing Parts</td>";
         }

         echo "</tr>";
         echo "</table>";

         echo "Solution";
         echo "<textarea cols='40' rows='7'  style='width:550px; height:100px;' class='' name='Solution_Desc'>$Solution_Desc</textarea>"; 
                  echo "<table>";
         echo "<tr class='blank'>";
         echo "   <td><input type='checkbox' name='chk_Proc' value='1'>Added to Proc Spreadsheet</td>";
         echo "    <td><input type='checkbox' name='chk_Purc' value='1'>Informed Purch</td>";
         echo "</tr>";
         echo "</table>";
         echo "<input type='Submit' value='Update Failure Log' name='nav_btn'>";
        break;
//////////////////////////////////////////////////////////////////////////////            
        case 'Update Failure Log':
        $Rpt_Num = $_POST['Rpt_Num'];
        $Major_System = $_POST['Major_System'];
        $Doc_P_SA = $_POST['Doc_P_SA'];
        $Found_By = $_POST['Found_By'];
        $Prob_Desc = $_POST['Prob_Desc'];
        $Solution_Desc = $_POST['Solution_Desc'];
        $TimeLost = $_POST['TimeLost'];
        $WO_Num = $_POST['WO_Num'];
        $Issued_To = $_POST['Issued_To'];
            if (empty($Issued_To)) {
                $Issued_To = 0;
            }
        $Closed = $_POST['Closed'];
            if (empty($Closed)) {
                $Closed = 0;
            }
        $chk_MFR = $_POST['chk_MFR'];
            if (empty($chk_MFR)) {
                $chk_MFR = 0;
            }
        $chk_Design = $_POST['chk_Design'];
            if (empty($chk_Design)) {
                $chk_Design = 0;
            }
        $chk_Supp = $_POST['chk_Supp'];
            if (empty($chk_Supp)) {
                $chk_Supp = 0;
            }
        $chk_Doc = $_POST['chk_Doc'];
            if (empty($chk_Doc)) {
                $chk_Doc = 0;
            }
        $chk_Part = $_POST['chk_Part'];
            if (empty($chk_Part)) {
                $chk_Part = 0;
            }
        $chk_Proc = $_POST['chk_Proc'];
            if (empty($chk_Proc)) {
                $chk_Proc = 0;
            }
        $chk_Purc = $_POST['chk_Purc'];
            if (empty($chk_Purc)) {
                $chk_Purc = 0;
            }
            echo "Major System:  ";
            echo "<input type='text' name='Major_System' size ='17' value='$Major_System' class=''>";
            echo "Doc/Part/Subassy:  ";
            echo "<input type='text' name='Doc_P_SA' size ='15' value='$Doc_P_SA' class=''>&#160 &#160";
            
            if($Closed == 1){
                echo "    <td><input type='checkbox' name='Closed' value='1' checked>Closed</td>";
            }else{
             echo "    <td><input type='checkbox' name='Closed' value='1'>Closed</td>"; 
            }
            
            echo "<table>";
            echo "<tr class='blank'>";
            echo "   <td>";

            echo "<table>";
            echo    "<tr class=''>";
            echo        "<th style='width:33%'><u>Start Date:</u></th>";
            echo        "<th style='width:33%'><u>End Date:</u></th>";
            echo        "<th style='width:33%'><u>Build Delay Hours:  </u></th>";
            echo    "</tr>";
            echo    "<tr class=''>";
            echo        "<td><input type='date' name='Found_DT' size ='13' value='" . date('Y-m-d')  . "' class=''></td>";
            echo        "<td><input type='date' name='End_DT' size ='13' value='" . date('Y-m-d')  . "' class=''></td>";
            echo        "<td><input type='text'  name='TimeLost' size ='10' value='$TimeLost' class=''></td>";
            echo    "</tr>";
            echo "</table><br>";
                        
            echo "<td>Work Order# <Input type='text' name='WO_Num' value=$WO_Num></td>";

            echo "</td>";
            echo "</tr>";
            echo "</table>";

            echo "Description of the Problem: &#160 &#160 ";
            echo "Found By: <input type='text'  name='Found_By' size ='10' value='$Found_By' class=''>&#160 &#160 ";
            echo "Issued To: <input type='text'  name='Issued_To' size ='10' value='$Issued_To' class=''><br>";
            echo "<textarea cols='40' rows='7'  style='width:550px; height:100px;' class='' name='Prob_Desc'>$Prob_Desc</textarea>"; 

         echo "<table>";
         echo "<tr class='blank'>";
         if($chk_MFR = 1){
             echo "    <td><input type='checkbox' name='chk_MFR' value='1' checked>MFR Issue</td>";
         }else{
             echo "    <td><input type='checkbox' name='chk_MFR' value='1'>MFR Issue</td>"; 
         }

         if($chk_Design = 1){
             echo "    <td><input type='checkbox' name='chk_Design' value='1'>Design Issue</td>";
         }else{
             echo "    <td><input type='checkbox' name='chk_Design' value='1'>Design Issue</td>"; 
         }

         if($chk_Supp = 1){
             echo "    <td><input type='checkbox' name='chk_Supp' value='1'>Supp Quality</td>";
         }else{
             echo "    <td><input type='checkbox' name='chk_Supp' value='1'>Supp Quality</td>"; 
         }

         if($chk_Doc = 1){
             echo "    <td><input type='checkbox' name='chk_Doc' value='1'>DOC</td>";
         }else{
             echo "    <td><input type='checkbox' name='chk_Doc' value='1'>DOC</td>";
         }

         if($chk_Part = 1){
             echo "    <td><input type='checkbox' name='chk_Part' value='1'>Missing Parts</td>";
         }else{
             echo "    <td><input type='checkbox' name='chk_Part' value='1'>Missing Parts</td>";
         }

         echo "</tr>";
         echo "</table>";

         echo "Solution";
         echo "<textarea cols='40' rows='7'  style='width:550px; height:100px;' class='' name='Solution_Desc'>$Solution_Desc</textarea>"; 
                  echo "<table>";
         echo "<tr class='blank'>";
         echo "   <td><input type='checkbox' name='chk_Proc' value='1'>Added to Proc Spreadsheet</td>";
         echo "    <td><input type='checkbox' name='chk_Purc' value='1'>Informed Purch</td>";
         echo "</tr>";
         echo "</table>";
         echo "<input type='Submit' value='Update Failure Log' name='nav_btn'>";
        break;
        }
        }
//////////////////////////////////////////////////////////////////////////////    
        if(empty($_POST['nav_btn'])){
            echo "Major System:  ";
            echo "<input type='text'  name='Major_System' title='ex: QEX10 JA Solar' size ='17' value='' class=''>      ";
            echo "Doc/Part/Subassy:  ";
            echo "<input type='text' title='ex: EPCE-215 or DOMA-160' name='Doc_P_SA' size ='15' value=''  class=''>&#160 &#160";
            echo "<input type='checkbox' name='Closed' value='1'>CLOSED<br><br>";
            
         echo "<table>";
         echo "<tr class='blank'>";
         echo "   <td>";
            
            echo "<table>";
            echo    "<tr class=''>";
            echo        "<th style='width:33%'><u>Start Date:</u></th>";
            echo        "<th style='width:33%'><u>End Date:</u></th>";
            echo        "<th style='width:33%'><u>Build Delay Hours:  </u></th>";
            echo    "</tr>";
            echo    "<tr class=''>";
            echo        "<td><input type='date' title='What day did this problem start?' name='Found_DT' size ='13' value='" . date('Y-m-d')  . "' class=''></td>";
            echo        "<td><input type='date' title='What day did this problem end?' name='End_DT' size ='13' value='" . date('Y-m-d')  . "' class=''></td>";
            echo        "<td><input type='text' title='About how much time did the problem delay this order? ex: 1.5' name='TimeLost' size ='10' value='' class=''></td>";
            echo    "</tr>";
            echo "</table><br>";

            echo "<td>Work Order# <Input type='text' title='Is this associated with a WO? ex: M15532' name='WO_Num' value=$WO_Num></td>";

            echo "</td>";
         echo "</tr>";
         echo "</table>";

            echo "Description of the Problem: &#160 &#160 ";
            echo "Found By: <input type='text'  title='Tyler' name='Found_By' size ='10' value='' class=''>&#160 &#160 ";
            echo "Issued To: <input type='text' title='Production'  name='Issued_To' size ='10' value='' class=''><br>";
            echo "<textarea cols='40' rows='7'  title='Enter your problem as best you can' style='width:550px; height:100px;' class='' name='Prob_Desc'></textarea>"; 

         echo "<table>";
         echo "<tr class='blank'>";
         echo "   <td><input type='checkbox' name='chk_MFR' value='1'>MFR Issue</td>";
         echo "    <td><input type='checkbox' name='chk_Design' value='1'>Design Issue</td>";
         echo "    <td><input type='checkbox' name='chk_Supp' value='1'>Supp Quality</td>";
         echo "    <td><input type='checkbox' name='chk_Doc' value='1'>DOC</td>";
         echo "    <td><input type='checkbox' name='chk_Part' value='1'>Missing Parts</td>";
         echo "</tr>";
         echo "</table>";



         echo "Solution";
         echo "<textarea cols='40' rows='7' title='Enter as much as you can about how to fix the above problem' style='width:550px; height:100px;' class='' name='Solution_Desc'></textarea>"; 
                  echo "<table>";
         echo "<tr class='blank'>";
         echo "   <td><input type='checkbox' name='chk_Proc' value='1'>Added to Proc Spreadsheet</td>";
         echo "    <td><input type='checkbox' name='chk_Purc' value='1'>Informed Purch</td>";
         echo "</tr>";
         echo "</table>";
         echo "<input type='Submit' value='Submit Failure Log' name='nav_btn'>";
        }
    ?>
        
        

        </form>
</div>
        <?php
        if (!empty($_POST['nav_btn'])) {
         switch($_POST['nav_btn']){//if the submit button is clicked
         
         case 'Go':
         break;
           
        case '<':
        break;
           
        case '>':
        break;
        
        case 'Submit Failure Log':
        $Rpt_Num = $_POST['Rpt_Num'];
        $Major_System = $_POST['Major_System'];
        $Doc_P_SA = $_POST['Doc_P_SA'];
        $WO_Num = $_POST['WO_Num'];
        $TimeLost = $_POST['TimeLost'];
            if (empty($TimeLost)) {
                $TimeLost = 0;
            }
        $Found_By = $_POST['Found_By'];
        $Prob_Desc = $_POST['Prob_Desc'];
        $Prob_Desc = mysql_real_escape_string(trim($Prob_Desc));
        $Solution_Desc = $_POST['Solution_Desc'];
            if (empty($Solution_Desc)) {
                $Solution_Desc = "N/A";
            }
        $Solution_Desc = mysql_real_escape_string(trim($Solution_Desc));
        $Issued_To = $_POST['Issued_To'];
            if (empty($Issued_To)) {
                $Issued_To = 0;
            }
        $Closed = $_POST['Closed'];
            if (empty($Closed)) {
                $Closed = 0;
            }
        $chk_MFR = $_POST['chk_MFR'];
            if (empty($chk_MFR)) {
                $chk_MFR = 0;
            }
        $chk_Design = $_POST['chk_Design'];
            if (empty($chk_Design)) {
                $chk_Design = 0;
            }
        $chk_Supp = $_POST['chk_Supp'];
            if (empty($chk_Supp)) {
                $chk_Supp = 0;
            }
        $chk_Doc = $_POST['chk_Doc'];
            if (empty($chk_Doc)) {
                $chk_Doc = 0;
            }
        $chk_Part = $_POST['chk_Part'];
            if (empty($chk_Part)) {
                $chk_Part = 0;
            }
        $chk_Proc = $_POST['chk_Proc'];
            if (empty($chk_Proc)) {
                $chk_Proc = 0;
            }
        $chk_Purc = $_POST['chk_Purc'];
            if (empty($chk_Purc)) {
                $chk_Purc = 0;
            }
        $Lost_Time = $_POST['Lost_Time'];
        $Found_DT = $_POST['Found_DT'];
        $Found_DT = strtotime($Found_DT);

        if(isset($Found_DT) && $Found_DT > 0){
            $Found_DT = $Found_DT;
            }
            else {
            $Found_DT = 0;
            }

        $End_DT = $_POST['End_DT'];
        $End_DT = strtotime($End_DT);
        if(isset($End_DT) && $End_DT > 0){
            $End_DT = $End_DT;
            }
            else {
            $End_DT = 0;
            }
        $sql = "INSERT INTO failures (Major_System, 
                                        Doc_P_SA,
                                        Closed, 
                                        Found_By, 
                                        Issued_To, 
                                        Prob_Desc, 
                                        Solution_Desc, 
                                        chk_MFR, 
                                        chk_Design, 
                                        chk_Supp, 
                                        chk_Doc, 
                                        chk_Part, 
                                        chk_Proc, 
                                        chk_Purc,
                                        TimeLost,
                                        Found_DT,
                                        End_DT,
                                        WorkOrder) 
                                      VALUES ('$Major_System', 
                                        '$Doc_P_SA', 
                                        $Closed, 
                                        '$Found_By', 
                                        '$Issued_To', 
                                        '$Prob_Desc', 
                                        '$Solution_Desc', 
                                        $chk_MFR, 
                                        $chk_Design, 
                                        $chk_Supp, 
                                        $chk_Doc, 
                                        $chk_Part, 
                                        $chk_Proc, 
                                        $chk_Purc,
                                        $TimeLost,
                                        $Found_DT,
                                        $End_DT,
                                        '$WO_Num')";
        
        mysqli_query($conn, $sql) or die("Cannot update " . $Major_System . $Doc_P_SA . $Closed . $Found_By . $Issued_To . $Prob_Desc . $Solution_Desc . $chk_MFR . $chk_Design . $chk_Supp . $chk_Doc . $chk_Part . $chk_Proc . $chk_Purc . " " . $TimeLost . " " . $Found_DT . " " . $End_DT);//update or error
            
        mysqli_close($conn);   
            
        break;
         
        case 'Update Failure Log':
        $Rpt_Num = $_POST['Rpt_Num'];
        $Major_System = $_POST['Major_System'];
        $Doc_P_SA = $_POST['Doc_P_SA'];
        $TimeLost = $_POST['TimeLost'];
        $Found_By = $_POST['Found_By'];
        $Prob_Desc = $_POST['Prob_Desc'];
        $Prob_Desc = mysql_real_escape_string(trim($Prob_Desc));
        $WO_Num = $_POST['WO_Num'];
        $Solution_Desc = $_POST['Solution_Desc'];
        $Solution_Desc = mysql_real_escape_string(trim($Solution_Desc));
        $Issued_To = $_POST['Issued_To'];
            if (empty($Issued_To)) {
                $Issued_To = 0;
            }
        $Closed = $_POST['Closed'];
            if (empty($Closed)) {
                $Closed = 0;
            }
        $chk_MFR = $_POST['chk_MFR'];
            if (empty($chk_MFR)) {
                $chk_MFR = 0;
            }
        $chk_Design = $_POST['chk_Design'];
            if (empty($chk_Design)) {
                $chk_Design = 0;
            }
        $chk_Supp = $_POST['chk_Supp'];
            if (empty($chk_Supp)) {
                $chk_Supp = 0;
            }
        $chk_Doc = $_POST['chk_Doc'];
            if (empty($chk_Doc)) {
                $chk_Doc = 0;
            }
        $chk_Part = $_POST['chk_Part'];
            if (empty($chk_Part)) {
                $chk_Part = 0;
            }
        $chk_Proc = $_POST['chk_Proc'];
            if (empty($chk_Proc)) {
                $chk_Proc = 0;
            }
        $chk_Purc = $_POST['chk_Purc'];
            if (empty($chk_Purc)) {
                $chk_Purc = 0;
            }

        $sql = "Update failures SET Major_System = '$Major_System',
                                        Doc_P_SA = '$Doc_P_SA',
                                        Closed = $Closed, 
                                        Found_By = '$Found_By', 
                                        Issued_To = '$Issued_To', 
                                        Prob_Desc = '$Prob_Desc', 
                                        Solution_Desc = '$Solution_Desc', 
                                        chk_MFR = $chk_MFR, 
                                        chk_Design = $chk_Design, 
                                        chk_Supp = $chk_Supp, 
                                        chk_Doc = $chk_Doc, 
                                        chk_Part = $chk_Part, 
                                        chk_Proc = $chk_Proc, 
                                        chk_Purc = $chk_Purc,
                                        TimeLost = $TimeLost,
                                        WorkOrder = '$WO_Num'
                                      WHERE Failures_Idx = $Rpt_Num";
        
        mysqli_query($conn, $sql) or die("<SCRIPT>alert(\"You had an error. Cannot update the report\\n" . $Major_System . "\\n" . $Doc_P_SA . "\\n" . $Closed . "\\n" . $Found_By . "\\n" . $Issued_To . "\\n" . $Prob_Desc . "\\n" . $Solution_Desc . "\\n" . $chk_MFR . "\\n" . $chk_Design . "\\n" . $chk_Supp . "\\n" . $chk_Doc . "\\n" . $chk_Part . "\\n" . $chk_Proc . "\\n" . $chk_Purc ."\\n" ."Please screen shot this window and send it to Tyler \");</SCRIPT><H1><FONT color=Red>YOU HAD A PROBLEM</Font><H1>");//update or error
            
        mysqli_close($conn); 
        break;
        }
        }
    ?>

<?php
        include ("Includes/footer.php");

?>

