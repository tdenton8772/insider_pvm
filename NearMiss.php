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
           $query = "SELECT NM_Index FROM near_miss ORDER BY NM_Index ASC";
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
    
        <h2>Near Miss Report</h2>
        <hr>
        <blockquote>
            A near miss is a potential hazard or incident that has not resulted in any personal injury. Unsafe working
            conditions, unsafe employee work habits, improper use of equipment or use of malfunctioning equipment
            have the potential to cause work related injuries. It is everyone's responsibility to report and/or correct these
            potential accidents immediatly. Please complete this form as a means to report these near-miss
            situations
        </blockquote>
        <hr>

        Department/location:  
    <?php
        if (!empty($_POST['nav_btn'])) {
         switch($_POST['nav_btn']){//if the submit button is clicked
         
         case 'Go':
            $Rpt_Num = $_POST['Rpt_Num'];
            $sql = "SELECT dept.Department From department dept inner join near_miss NM on dept.dept_index = NM.Dept_index Where NM.NM_Index = " . $Rpt_Num;
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $result1 = $row['Department'];
            }
            } else {
            }
           $result = $result1;
           echo "<input type='text' name='Dept_Idx' value='" . $result1 . "' class='NavTextBox'>";
         break;
           
        case '<':
            $Rpt_Num = $_POST['Rpt_Num'];
            $Rpt_Num = $Rpt_Num - 1;
            $sql = "SELECT dept.Department From department dept inner join near_miss NM on dept.dept_index = NM.Dept_index Where NM.NM_Index = " . $Rpt_Num;
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $result1 = $row['Department'];
            }
            } else {
            }
           $result = $result1;
           echo "<input type='text' name='Dept_Idx' value='" . $result1 . "' class='NavTextBox'>";
        break;
           
        case '>':
            $Rpt_Num = $_POST['Rpt_Num'];
            $Rpt_Num = $Rpt_Num + 1;
            $sql = "SELECT dept.Department From department dept inner join near_miss NM on dept.dept_index = NM.Dept_index Where NM.NM_Index = " . $Rpt_Num;
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $result1 = $row['Department'];
            }
            } else {
            }
           $result = $result1;
           echo "<input type='text' name='Dept_Idx' value='" . $result1 . "' class='NavTextBox'>";
        break;
        
        case 'Submit Near Miss Report':
            $result = $_POST['Dept_Idx'];
            $sql = "SELECT Department From department Where Dept_Index = " . $result;
            $result = mysqli_query($conn, $sql) or die("This did not work");
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    $result1 = $row['Department'];
                }
                } else {
                    $result1 = "No Response";
                }

           $result = $result1;
           echo "<input type='text' name='Dept_Idx' value='" . $result  . "' class='NavTextBox'>";
        break;
        
        case 'Update Report':
            $result = $_POST['Dept_Idx'];
           echo "<input type='text' name='Dept_Idx' value='" . $result  . "' class='NavTextBox'>";
        break;
      
        }
        }
        if(empty($_POST['nav_btn'])){ //This handles the initial load
             echo "<SELECT name='Dept_Idx'>";
                echo "<OPTION VALUE=0>Department</option>";
                    echo "<?php";  
                        $sql = "SELECT Dept_Index, Department FROM Department";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='".$row['Dept_Index']."'>".$row['Department']."</option>";
                            }
                        } 
                    echo "?>";
            echo "</SELECT>"; 
        }
    ?>

    &#160

       <?php
        if (!empty($_POST['nav_btn'])) {
         switch($_POST['nav_btn']){//if the submit button is clicked
         
         case 'Go':
            $Rpt_Num = $_POST['Rpt_Num'];
            $sql1 = "SELECT Incident_DT FROM near_miss WHERE NM_Index = $Rpt_Num";
            $result2 = mysqli_query($conn, $sql1);

            if (mysqli_num_rows($result2) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result2)) {
                $result3 = $row['Incident_DT'];
            }
            } else {
                $result3 = "No Results";
            }
            $result = $result3;
            echo "Incident Date: <input type='date' name='Incident_D' class='NavTextBox' value='" . date('Y-m-d', $result) . "';><br><br>";
         break;
           
        case '<':
            $Rpt_Num = $_POST['Rpt_Num'];
            $Rpt_Num = $Rpt_Num - 1;
            $sql1 = "SELECT Incident_DT FROM near_miss WHERE NM_Index = $Rpt_Num";
            $result2 = mysqli_query($conn, $sql1);

            if (mysqli_num_rows($result2) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result2)) {
                $result3 = $row['Incident_DT'];
            }
            } else {
                $result3 = "No Results";
            }
            $result = $result3;
            echo "Incident Date: <input type='date' name='Incident_D' class='NavTextBox' value='" . date('Y-m-d', $result) . "';><br><br>";
        break;
           
        case '>':
            $Rpt_Num = $_POST['Rpt_Num'];
            $Rpt_Num = $Rpt_Num + 1;
            $sql1 = "SELECT Incident_DT FROM near_miss WHERE NM_Index = $Rpt_Num";
            $result2 = mysqli_query($conn, $sql1);

            if (mysqli_num_rows($result2) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result2)) {
                $result3 = $row['Incident_DT'];
            }
            } else {
                $result3 = "No Results";
            }
            $result = $result3;
            echo "Incident Date: <input type='date' name='Incident_D' class='NavTextBox' value='" . date('Y-m-d', $result) . "';><br><br>";
        break;
        
        case 'Submit Near Miss Report':
            $result = $_POST['Incident_D'];
            echo "Incident Date: <input type='date' name='Incident_D' class='NavTextBox' value='" . date('Y-m-d', $result) . "';><br><br>";
        break;
        
        case 'Update Report':
            $result = $_POST['Incident_D']; 
            echo "Incident Date: <input type='date' name='Incident_D' class='NavTextBox' value='" . date('Y-m-d', $result) . "';><br><br>";
        break;
        }
        }
        if(empty($_POST['nav_btn'])){
            echo "Incident Date: <input type='date' name='Incident_D' value='" . date('Y-m-d') . "';><br><br>";

        }
    ?><!--Incident Date-->
    
       <?php
        if (!empty($_POST['nav_btn'])) {
         switch($_POST['nav_btn']){//if the submit button is clicked
         
         case 'Go':
            $Rpt_Num = $_POST['Rpt_Num'];
            $sql1 = "SELECT Incident_DT FROM near_miss WHERE NM_Index = $Rpt_Num";
            $result2 = mysqli_query($conn, $sql1);

            if (mysqli_num_rows($result2) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result2)) {
                $result3 = $row['Incident_DT'];
            }
            } else {
                $result3 = "No Results";
            }
            $result = $result3;
            echo "Incident Time: <input type='time' class='NavTextBox' name='Incident_T' value='" . date('H:i', $result) . "';><br><br>";
         break;
           
        case '<':
            $Rpt_Num = $_POST['Rpt_Num'];
            $Rpt_Num = $Rpt_Num - 1;
            $sql1 = "SELECT Incident_DT FROM near_miss WHERE NM_Index = $Rpt_Num";
            $result2 = mysqli_query($conn, $sql1);

            if (mysqli_num_rows($result2) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result2)) {
                $result3 = $row['Incident_DT'];
            }
            } else {
                $result3 = "No Results";
            }
            $result = $result3;
            echo "Incident Time: <input type='time' class='NavTextBox' name='Incident_T' value='" . date('H:i', $result) . "';><br><br>";
        break;
           
        case '>':
            $Rpt_Num = $_POST['Rpt_Num'];
            $Rpt_Num = $Rpt_Num + 1;
            $sql1 = "SELECT Incident_DT FROM near_miss WHERE NM_Index = $Rpt_Num";
            $result2 = mysqli_query($conn, $sql1);

            if (mysqli_num_rows($result2) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result2)) {
                $result3 = $row['Incident_DT'];
            }
            } else {
                $result3 = "No Results";
            }
            $result = $result3;
            echo "Incident Time: <input type='time' class='NavTextBox' name='Incident_T' value='" . date('H:i', $result) . "';><br><br>";
        break;
        
        case 'Submit Near Miss Report':
            $result = $_POST['Incident_T'];
            echo "Incident Time: <input type='time' class='NavTextBox' name='Incident_T' value='" . date('H:i', $result) . "';><br><br>";
        break;
        
        case 'Update Report':
            $result = $_POST['Incident_T'];
            echo "Incident Time: <input type='time' class='NavTextBox' name='Incident_T' value='" . date('H:i', $result) . "';><br><br>";
        break;
        }
        }
        if(empty($_POST['nav_btn'])){
             echo "Incident Time: <input type='time' name='Incident_T' value='" . date('H:i') . "';><br><br>";

        }
    ?><!--Incident Time-->

          
        Please check all that apply:<br>
    <?php
        if (!empty($_POST['nav_btn'])) {
         switch($_POST['nav_btn']){//if the submit button is clicked
         
         case 'Go':
            $Rpt_Num = $_POST['Rpt_Num'];
            $sql1 = "SELECT Box_1, Box_2, Box_3, Box_4 FROM near_miss WHERE NM_Index = $Rpt_Num";
            $result2 = mysqli_query($conn, $sql1);

            if (mysqli_num_rows($result2) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result2)) {
                $result3 = $row['Box_1'];
                $result4 = $row['Box_2'];
                $result5 = $row['Box_3'];
                $result6 = $row['Box_4'];
            }
            } else {
                $result3 = 0;
                $result4 = 0;
                $result5 = 0;
                $result6 = 0;
            }
                $Box_1 = $result3;
                $Box_2 = $result4;
                $Box_3 = $result5;
                $Box_4 = $result6;
         echo "<table>";
         echo "<tr class='blank'>";
          if ($Box_1 == 1) {
                echo "    <td><input type='checkbox' name='audit' value='1' checked>Unsafe Act</td>";
            }else{
               echo "    <td><input type='checkbox' name='audit' value='1'>Unsafe Act</td>"; 
            }
          if ($Box_2 == 1) {
                echo "    <td><input type='checkbox' name='prestart' value='1' checked>Unsafe Equipment</td>";
            }else{
               echo "    <td><input type='checkbox' name='prestart' value='1'>Unsafe Equipment</td>"; 
            }
         echo "</tr>";
         echo "<tr class='blank'>";
          if ($Box_3 == 1) {
             echo "    <td><input type='checkbox' name='toolbox' value='1' checked>Unsafe Condition</td>";
            }else{
             echo "    <td><input type='checkbox' name='toolbox' value='1'>Unsafe Condition</td>";
            }
           if ($Box_4 == 1) {
             echo "    <td><input type='checkbox' name='visual' value='1' checked>Unsafe use of Equipment</td>";
            }else{
             echo "    <td><input type='checkbox' name='visual' value='1'>Unsafe use of Equipment</td>";
            }
         echo "</tr>";
         echo "</table><br>";
         break;
           
        case '<':
            $Rpt_Num = $_POST['Rpt_Num'];
            $Rpt_Num = $Rpt_Num - 1;
            $sql1 = "SELECT Box_1, Box_2, Box_3, Box_4 FROM near_miss WHERE NM_Index = $Rpt_Num";
            $result2 = mysqli_query($conn, $sql1);

            if (mysqli_num_rows($result2) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result2)) {
                $result3 = $row['Box_1'];
                $result4 = $row['Box_2'];
                $result5 = $row['Box_3'];
                $result6 = $row['Box_4'];
            }
            } else {
                $result3 = 0;
                $result4 = 0;
                $result5 = 0;
                $result6 = 0;
            }
                $Box_1 = $result3;
                $Box_2 = $result4;
                $Box_3 = $result5;
                $Box_4 = $result6;
         echo "<table>";
         echo "<tr class='blank'>";
          if ($Box_1 == 1) {
                echo "    <td><input type='checkbox' name='audit' value='1' checked>Unsafe Act</td>";
            }else{
               echo "    <td><input type='checkbox' name='audit' value='1'>Unsafe Act</td>"; 
            }
          if ($Box_2 == 1) {
                echo "    <td><input type='checkbox' name='prestart' value='1' checked>Unsafe Equipment</td>";
            }else{
               echo "    <td><input type='checkbox' name='prestart' value='1'>Unsafe Equipment</td>"; 
            }
         echo "</tr>";
         echo "<tr class='blank'>";
          if ($Box_3 == 1) {
             echo "    <td><input type='checkbox' name='toolbox' value='1' checked>Unsafe Condition</td>";
            }else{
             echo "    <td><input type='checkbox' name='toolbox' value='1'>Unsafe Condition</td>";
            }
           if ($Box_4 == 1) {
             echo "    <td><input type='checkbox' name='visual' value='1' checked>Unsafe use of Equipment</td>";
            }else{
             echo "    <td><input type='checkbox' name='visual' value='1'>Unsafe use of Equipment</td>";
            }
         echo "</tr>";
         echo "</table><br>";
        break;
           
        case '>':
                    $Rpt_Num = $_POST['Rpt_Num'];
            $Rpt_Num = $Rpt_Num - 1;
            $sql1 = "SELECT Box_1, Box_2, Box_3, Box_4 FROM near_miss WHERE NM_Index = $Rpt_Num";
            $result2 = mysqli_query($conn, $sql1);

            if (mysqli_num_rows($result2) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result2)) {
                $result3 = $row['Box_1'];
                $result4 = $row['Box_2'];
                $result5 = $row['Box_3'];
                $result6 = $row['Box_4'];
            }
            } else {
                $result3 = 0;
                $result4 = 0;
                $result5 = 0;
                $result6 = 0;
            }
                $Box_1 = $result3;
                $Box_2 = $result4;
                $Box_3 = $result5;
                $Box_4 = $result6;
         echo "<table>";
         echo "<tr class='blank'>";
          if ($Box_1 == 1) {
                echo "    <td><input type='checkbox' name='audit' value='1' checked>Unsafe Act</td>";
            }else{
               echo "    <td><input type='checkbox' name='audit' value='1'>Unsafe Act</td>"; 
            }
          if ($Box_2 == 1) {
                echo "    <td><input type='checkbox' name='prestart' value='1' checked>Unsafe Equipment</td>";
            }else{
               echo "    <td><input type='checkbox' name='prestart' value='1'>Unsafe Equipment</td>"; 
            }
         echo "</tr>";
         echo "<tr class='blank'>";
          if ($Box_3 == 1) {
             echo "    <td><input type='checkbox' name='toolbox' value='1' checked>Unsafe Condition</td>";
            }else{
             echo "    <td><input type='checkbox' name='toolbox' value='1'>Unsafe Condition</td>";
            }
           if ($Box_4 == 1) {
             echo "    <td><input type='checkbox' name='visual' value='1' checked>Unsafe use of Equipment</td>";
            }else{
             echo "    <td><input type='checkbox' name='visual' value='1'>Unsafe use of Equipment</td>";
            }
         echo "</tr>";
         echo "</table><br>";
        break;
        
        case 'Submit Near Miss Report':
         echo "<table>";
         echo "<tr class='blank'>";
         echo "   <td><input type='checkbox' name='audit' value='1'>Unsafe Act</td>";
         echo "    <td><input type='checkbox' name='prestart' value='1'>Unsafe Equipment</td>";
         echo "</tr>";
         echo "<tr class='blank'>";
         echo "    <td><input type='checkbox' name='toolbox' value='1'>Unsafe Condition</td>";
         echo "    <td><input type='checkbox' name='visual' value='1'>Unsafe use of Equipment</td>";
         echo "</tr>";
         echo "</table><br>";
        break;
        
        case 'Update Report':
         echo "<table>";
         echo "<tr class='blank'>";
         echo "   <td><input type='checkbox' name='audit' value='1'>Unsafe Act</td>";
         echo "    <td><input type='checkbox' name='prestart' value='1'>Unsafe Equipment</td>";
         echo "</tr>";
         echo "<tr class='blank'>";
         echo "    <td><input type='checkbox' name='toolbox' value='1'>Unsafe Condition</td>";
         echo "    <td><input type='checkbox' name='visual' value='1'>Unsafe use of Equipment</td>";
         echo "</tr>";
         echo "</table><br>";
        break;
        }
        }
        if(empty($_POST['nav_btn'])){
         echo "<table>";
         echo "<tr class='blank'>";
         echo "   <td><input type='checkbox' name='audit' value='1'>Unsafe Act</td>";
         echo "    <td><input type='checkbox' name='prestart' value='1'>Unsafe Equipment</td>";
         echo "</tr>";
         echo "<tr class='blank'>";
         echo "    <td><input type='checkbox' name='toolbox' value='1'>Unsafe Condition</td>";
         echo "    <td><input type='checkbox' name='visual' value='1'>Unsafe use of Equipment</td>";
         echo "</tr>";
         echo "</table><br>";
        }
    ?>


         Description of incident of potential hazard:<br>

<?php
   if (!empty($_POST['nav_btn'])) { 
   switch($_POST['nav_btn']){//if the submit button is clicked
    
    case 'Go':
            $Rpt_Num = $_POST['Rpt_Num'];
            $sql1 = "SELECT Haz_Desc FROM near_miss WHERE NM_Index = $Rpt_Num";
            $result2 = mysqli_query($conn, $sql1);

            if (mysqli_num_rows($result2) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result2)) {
                $result3 = $row['Haz_Desc'];
            }
            } else {
            }
      echo "<textarea cols='40' rows='7' style='width:550px; height:50px;' class='NavTextBox' name='Haz_Desc'>" . $result3 . "</textarea>"; 
     break;

    case '<':
            $Rpt_Num = $_POST['Rpt_Num'];
            $Rpt_Num = $Rpt_Num - 1;
            $sql1 = "SELECT Haz_Desc FROM near_miss WHERE NM_Index = $Rpt_Num";
            $result2 = mysqli_query($conn, $sql1);

            if (mysqli_num_rows($result2) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result2)) {
                $result3 = $row['Haz_Desc'];
            }
            } else {
            }

      echo "<textarea cols='40' rows='7' style='width:550px; height:50px;' class='NavTextBox' name='Haz_Desc'>" . $result3 . "</textarea>"; 
     break;

     case '>':
            $Rpt_Num = $_POST['Rpt_Num'];
            $Rpt_Num = $Rpt_Num - 1;
            $sql1 = "SELECT Haz_Desc FROM near_miss WHERE NM_Index = $Rpt_Num";
            $result2 = mysqli_query($conn, $sql1);

            if (mysqli_num_rows($result2) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result2)) {
                $result3 = $row['Haz_Desc'];
            }
            } else {
            }

      echo "<textarea cols='40' rows='7' style='width:550px; height:50px;' class='NavTextBox' name='Haz_Desc'>" . $result3 . "</textarea>"; 
      break;
      
      case 'Submit Near Miss Report':
            $result = $_POST['Haz_Desc'];
            echo "<textarea cols='40' rows='7' style='width:550px; height:50px;' class='NavTextBox' name='Haz_Desc'>" . $result . "</textarea>"; 
     break;

      case 'Update Report':
            $result = $_POST['Haz_Desc'];
            echo "<textarea cols='40' rows='7' style='width:550px; height:50px;' class='NavTextBox' name='Haz_Desc'>" . $result . "</textarea>"; 
     break;
}
}
if (empty($_POST['nav_btn'])) {
        echo "<textarea cols='40' rows='7' style='width:550px; height:50px;' class='' name='Haz_Desc'></textarea>"; 
}
?> <!--Description of incident-->
         <br><br>
        
<?php
   if (!empty($_POST['nav_btn'])) { 
   switch($_POST['nav_btn']){//if the submit button is clicked
    case 'Go':
            $Rpt_Num = $_POST['Rpt_Num'];
            $sql1 = "SELECT Empl_Name FROM near_miss WHERE NM_Index = $Rpt_Num";
            $result2 = mysqli_query($conn, $sql1);

            if (mysqli_num_rows($result2) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result2)) {
                $result3 = $row['Empl_Name'];
            }
            } else {
            }

      echo "Employee Name:<input type='text' class='NavTextBox' name='Empl_Name' value='" . $result3 . "'>"; 
     break;
         case '<':
            $Rpt_Num = $_POST['Rpt_Num'];
            $Rpt_Num = $Rpt_Num - 1;
            $sql1 = "SELECT Empl_Name FROM near_miss WHERE NM_Index = $Rpt_Num";
            $result2 = mysqli_query($conn, $sql1);

            if (mysqli_num_rows($result2) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result2)) {
                $result3 = $row['Empl_Name'];
            }
            } else {
            }

      echo "Employee Name:<input type='text' name='Empl_Name' class='NavTextBox' value='" . $result3 . "'>"; 
     break;

    case '>':
            $Rpt_Num = $_POST['Rpt_Num'];
            $Rpt_Num = $Rpt_Num + 1;
            $sql1 = "SELECT Empl_Name FROM near_miss WHERE NM_Index = $Rpt_Num";
            $result2 = mysqli_query($conn, $sql1);

            if (mysqli_num_rows($result2) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result2)) {
                $result3 = $row['Empl_Name'];
            }
            } else {
            }
            echo "Employee Name:<input type='text' name='Empl_Name' class='NavTextBox' value='" . $result3 . "'>"; 
     break;
     
     case 'Submit Near Miss Report':
            $result = $_POST['Empl_Name'];
            echo  "Employee Name:<input type='text' name='Empl_Name' class='NavTextBox' value='" . $result . "'>"; 
     break;

      case 'Update Report':
            $result = $_POST['Empl_Name'];
            echo "Employee Name:<input type='text' name='Empl_Name' class='NavTextBox' value='" . $result . "'>"; 
     break;
}
}
if (empty($_POST['nav_btn'])) {
        echo "Employee Name:<input type='text' name='Empl_Name' value=''>"; 
}
?><!--Employee Name-->

&#160 

Report Date:
        <?php 
         if (!empty($_POST['nav_btn'])) {
         switch($_POST['nav_btn']){//if the submit button is clicked
         
         case 'Go':
            $Rpt_Num = $_POST['Rpt_Num'];
            $sql1 = "SELECT Rpt_Date FROM near_miss WHERE NM_Index = $Rpt_Num";
            $result2 = mysqli_query($conn, $sql1);

            if (mysqli_num_rows($result2) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result2)) {
                $result3 = $row['Rpt_Date'];
            }
            } else {
                $result3 = "No Results";
            }
            $result = $result3;
            echo "<input type='date' name='Rpt_Date' class='NavTextBox' value='" . date('Y-m-d', $result) . "';><br><br>";
         break;
           
        case '<':
            $Rpt_Num = $_POST['Rpt_Num'];
            $Rpt_Num = $Rpt_Num - 1;
            $sql1 = "SELECT Rpt_Date FROM near_miss WHERE NM_Index = $Rpt_Num";
            $result2 = mysqli_query($conn, $sql1);

            if (mysqli_num_rows($result2) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result2)) {
                $result3 = $row['Rpt_Date'];
            }
            } else {
                $result3 = "No Results";
            }
            $result = $result3;
            echo "<input type='date' name='Rpt_Date' class='NavTextBox' value='" . date('Y-m-d', $result) . "';><br><br>";
        break;
           
        case '>':
            $Rpt_Num = $_POST['Rpt_Num'];
            $Rpt_Num = $Rpt_Num + 1;
            $sql1 = "SELECT Rpt_Date FROM near_miss WHERE NM_Index = $Rpt_Num";
            $result2 = mysqli_query($conn, $sql1);

            if (mysqli_num_rows($result2) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result2)) {
                $result3 = $row['Rpt_Date'];
            }
            } else {
                $result3 = "No Results";
            }
            $result = $result3;
            echo "<input type='date' name='Rpt_Date' class='NavTextBox' value='" . date('Y-m-d', $result) . "';><br><br>";
        break;
        
        case 'Submit Near Miss Report':
            $result = $_POST['Rpt_Date'];
            echo "<input type='date' name='Rpt_Date' class='NavTextBox' value='" . date('Y-m-d', $result) . "';><br><br>";
        break;
        
        case 'Update Report':
            $result = $_POST['Rpt_Date']; 
            echo "<input type='date' name='Rpt_Date' class='NavTextBox' value='" . date('Y-m-d', $result) . "';><br><br>";
        break;
        }
        }
        if(empty($_POST['nav_btn'])){
            echo "<input type='date' name='Rpt_Date' value='" . date('Y-m-d') . "';><br><br>";

        }
    ?><!--Report Date-->
        
        
        <!--input type="date" name="Rpt_Date"  value="<?php echo date('Y-m-d'); ?>"-->
         
    <input type="Submit" value="Submit Near Miss Report" name="nav_btn">
        <hr>
    <!-------------------------------------------------------------------------------------------------->
        
            <?php
        if (!empty($_POST['nav_btn'])) {
         switch($_POST['nav_btn']){//if the submit button is clicked
         
         case 'Go':
            $Rpt_Num = $_POST['Rpt_Num'];
            $sql1 = "SELECT NM_Desc FROM near_miss WHERE NM_Index = $Rpt_Num"; 
            $sql2 = "SELECT Causes FROM near_miss WHERE NM_Index = $Rpt_Num"; 
            $sql3 = "SELECT Corr_Action FROM near_miss WHERE NM_Index = $Rpt_Num"; 
            $sql4 = "SELECT Investigator FROM near_miss WHERE NM_Index = $Rpt_Num";    
            $sql5 = "SELECT No_Comp FROM near_miss WHERE NM_Index = $Rpt_Num"; 
  /////////////////////////////////////////////////////          
            $result1 = mysqli_query($conn, $sql1);
                if (mysqli_num_rows($result1) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result1)) {
                $result6 = $row['NM_Desc'];
            }
            } else {
                $result6 = "No Results";
            }

            $result1 = $result6;
            
   /////////////////////////////////////////////////////
            $result2 = mysqli_query($conn, $sql2);
                if (mysqli_num_rows($result2) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result2)) {
                $result7 = $row['Causes'];
            }
            } else {
                $result7 = "No Results";
            }

            $result2 = $result7;
            
    /////////////////////////////////////////////////////
            $result3 = mysqli_query($conn, $sql3);
                if (mysqli_num_rows($result3) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result3)) {
                $result8 = $row['Corr_Action'];
            }
            } else {
                $result8 = "No Results";
            }

            $result3 = $result8;
            
    /////////////////////////////////////////////////////
            $result4 = mysqli_query($conn, $sql4);
                if (mysqli_num_rows($result4) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result4)) {
                $result9 = $row['Investigator'];
            }
            } else {
                $result9 = "No Results";
            }

            $result4 = $result9;
            
    /////////////////////////////////////////////////////
            $result5 = mysqli_query($conn, $sql5);
                if (mysqli_num_rows($result5) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result5)) {
                $result10 = $row['No_Comp'];
            }
            } else {
                $result10 = "No Results";
            }

            $result5 = $result10;
            
    /////////////////////////////////////////////////////
            echo "<h3>Near Miss Investigation</h3>";
            echo "Description of the near miss condition:";
            echo "<textarea cols='40' rows='7' style='width:500px; height:25px;' class='NavTextBox' name='NM_Desc'> $result1 </textarea><br>";
            echo "Causes (primary and contributing):";
            echo "<textarea cols='40' rows='7' style='width:500px; height:25px;' class='NavTextBox' name='Causes'>$result2</textarea><br>";
            echo "Corrective action taken: Remove the hazard, replace, repair, or retrain in the proper procedures)";
            echo "<textarea cols='40' rows='7' style='width:500px; height:50px;' class='NavTextBox' name='Corr_Action'>$result3</textarea><br>";
            echo "Investigator:<input type='text' name='Investigator' class ='NavTextBox' value='$result4'> &#160 Report Date:<input type='date' name='Follow_Date' value='" . date('Y-m-d', $result) . "';><br>";
            echo "If not completed, why:";
            echo "<textarea cols='40' rows='7' style='width:500px; height:25px;' class='NavTextBox' name='No_Comp'>$result5</textarea><br>";
            echo "<input type='Submit' value='Update Report' name='nav_btn'>";
         break;
           
        case '<':
        $Rpt_Num = $_POST['Rpt_Num'];
        $Rpt_Num = $Rpt_Num - 1;
            $sql1 = "SELECT NM_Desc FROM near_miss WHERE NM_Index = $Rpt_Num"; 
            $sql2 = "SELECT Causes FROM near_miss WHERE NM_Index = $Rpt_Num"; 
            $sql3 = "SELECT Corr_Action FROM near_miss WHERE NM_Index = $Rpt_Num"; 
            $sql4 = "SELECT Investigator FROM near_miss WHERE NM_Index = $Rpt_Num";    
            $sql5 = "SELECT No_Comp FROM near_miss WHERE NM_Index = $Rpt_Num"; 
  /////////////////////////////////////////////////////          
            $result1 = mysqli_query($conn, $sql1);
                if (mysqli_num_rows($result1) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result1)) {
                $result6 = $row['NM_Desc'];
            }
            } else {
                $result6 = "No Results";
            }

            $result1 = $result6;
            
   /////////////////////////////////////////////////////
            $result2 = mysqli_query($conn, $sql2);
                if (mysqli_num_rows($result2) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result2)) {
                $result7 = $row['Causes'];
            }
            } else {
                $result7 = "No Results";
            }

            $result2 = $result7;
            
    /////////////////////////////////////////////////////
            $result3 = mysqli_query($conn, $sql3);
                if (mysqli_num_rows($result3) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result3)) {
                $result8 = $row['Corr_Action'];
            }
            } else {
                $result8 = "No Results";
            }

            $result3 = $result8;
            
    /////////////////////////////////////////////////////
            $result4 = mysqli_query($conn, $sql4);
                if (mysqli_num_rows($result4) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result4)) {
                $result9 = $row['Investigator'];
            }
            } else {
                $result9 = "No Results";
            }

            $result4 = $result9;
            
    /////////////////////////////////////////////////////
            $result5 = mysqli_query($conn, $sql5);
                if (mysqli_num_rows($result5) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result5)) {
                $result10 = $row['No_Comp'];
            }
            } else {
                $result10 = "No Results";
            }

            $result5 = $result10;
            
    /////////////////////////////////////////////////////
            echo "<h3>Near Miss Investigation</h3>";
            echo "Description of the near miss condition:";
            echo "<textarea cols='40' rows='7' style='width:500px; height:25px;' class='NavTextBox' name='NM_Desc'> $result1 </textarea><br>";
            echo "Causes (primary and contributing):";
            echo "<textarea cols='40' rows='7' style='width:500px; height:25px;' class='NavTextBox' name='Causes'>$result2</textarea><br>";
            echo "Corrective action taken: Remove the hazard, replace, repair, or retrain in the proper procedures)";
            echo "<textarea cols='40' rows='7' style='width:500px; height:50px;' class='NavTextBox' name='Corr_Action'>$result3</textarea><br>";
            echo "Investigator:<input type='text' name='Investigator' class = 'NavTextBox' value='$result4'> &#160 Report Date:<input type='date' name='Follow_Date' value='" . date('Y-m-d', $result) . "';><br>";
            echo "If not completed, why:";
            echo "<textarea cols='40' rows='7' style='width:500px; height:25px;' class='NavTextBox' name='No_Comp'>$result5</textarea><br>";
            echo "<input type='Submit' value='Update Report' name='nav_btn'>";
        break;
           
        case '>':
        $Rpt_Num = $_POST['Rpt_Num'];
        $Rpt_Num = $Rpt_Num + 1;
            $sql1 = "SELECT NM_Desc FROM near_miss WHERE NM_Index = $Rpt_Num"; 
            $sql2 = "SELECT Causes FROM near_miss WHERE NM_Index = $Rpt_Num"; 
            $sql3 = "SELECT Corr_Action FROM near_miss WHERE NM_Index = $Rpt_Num"; 
            $sql4 = "SELECT Investigator FROM near_miss WHERE NM_Index = $Rpt_Num";    
            $sql5 = "SELECT No_Comp FROM near_miss WHERE NM_Index = $Rpt_Num"; 
  /////////////////////////////////////////////////////          
            $result1 = mysqli_query($conn, $sql1);
                if (mysqli_num_rows($result1) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result1)) {
                $result6 = $row['NM_Desc'];
            }
            } else {
                $result6 = "No Results";
            }

            $result1 = $result6;
            
   /////////////////////////////////////////////////////
            $result2 = mysqli_query($conn, $sql2);
                if (mysqli_num_rows($result2) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result2)) {
                $result7 = $row['Causes'];
            }
            } else {
                $result7 = "No Results";
            }

            $result2 = $result7;
            
    /////////////////////////////////////////////////////
            $result3 = mysqli_query($conn, $sql3);
                if (mysqli_num_rows($result3) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result3)) {
                $result8 = $row['Corr_Action'];
            }
            } else {
                $result8 = "No Results";
            }

            $result3 = $result8;
            echo $result3;
    /////////////////////////////////////////////////////
            $result4 = mysqli_query($conn, $sql4);
                if (mysqli_num_rows($result4) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result4)) {
                $result9 = $row['Investigator'];
            }
            } else {
                $result9 = "No Results";
            }

            $result4 = $result9;
            
    /////////////////////////////////////////////////////
            $result5 = mysqli_query($conn, $sql5);
                if (mysqli_num_rows($result5) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result5)) {
                $result10 = $row['No_Comp'];
            }
            } else {
                $result10 = "No Results";
            }

            $result5 = $result10;
            
    /////////////////////////////////////////////////////
            echo "<h3>Near Miss Investigation</h3>";
            echo "Description of the near miss condition:";
            echo "<textarea cols='40' rows='7' style='width:500px; height:25px;' class='NavTextBox' name='NM_Desc'> $result1 </textarea><br>";
            echo "Causes (primary and contributing):";
            echo "<textarea cols='40' rows='7' style='width:500px; height:25px;' class='NavTextBox' name='Causes'>$result2</textarea><br>";
            echo "Corrective action taken: Remove the hazard, replace, repair, or retrain in the proper procedures)";
            echo "<textarea cols='40' rows='7' style='width:500px; height:50px;' class='NavTextBox' name='Corr_Action'>$result3</textarea><br>";
            echo "Investigator:<input type='text' name='Investigator' class ='NavTextBox' value='$result4'> &#160 Report Date:<input type='date' name='Follow_Date' value='" . date('Y-m-d', $result) . "';><br>";
            echo "If not completed, why:";
            echo "<textarea cols='40' rows='7' style='width:500px; height:25px;' class='NavTextBox' name='No_Comp'>$result5</textarea><br>";
            echo "<input type='Submit' value='Update Report' name='nav_btn'>";
        break;
        
        case 'Submit Near Miss Report': 
            echo "<h3>Near Miss Investigation</h3>";
            echo "Description of the near miss condition:";
            echo "<textarea cols='40' rows='7' style='width:500px; height:25px;' class='' name='NM_Desc'></textarea><br>";
            echo "Causes (primary and contributing):";
            echo "<textarea cols='40' rows='7' style='width:500px; height:25px;' class='' name='Causes'></textarea><br>";
            echo "Corrective action taken: Remove the hazard, replace, repair, or retrain in the proper procedures)";
            echo "<textarea cols='40' rows='7' style='width:500px; height:50px;' class='' name='Corr_Action'></textarea><br>";
            echo "Investigator:<input type='text' name='Investigator'> &#160 Report Date:<input type='date' name='Follow_Date'  value='" . date('Y-m-d', $result) . "';><br>";
            echo "If not completed, why:";
            echo "<textarea cols='40' rows='7' style='width:500px; height:25px;' class='' name='No_Comp'></textarea><br>";
            echo "<input type='Submit' value='Update Report' name='nav_btn'>";
        break;
        
        case 'Update Report':
            $Rpt_Num = $_POST['Rpt_Num'];
            $NM_Desc = $_POST['NM_Desc'];
            $Causes = $_POST['Causes'];
            $Corr_Action = $_POST['Corr_Action'];
            $Investigator = $_POST['Investigator'];
            $No_Comp = $_POST['No_Comp'];
            echo "<h3>Near Miss Investigation</h3>";
            echo "Description of the near miss condition:";
            echo "<textarea cols='40' rows='7' style='width:500px; height:25px;' class='NavTextBox' name='NM_Desc'>$NM_Desc</textarea><br>";
            echo "Causes (primary and contributing):";
            echo "<textarea cols='40' rows='7' style='width:500px; height:25px;' class='NavTextBox' name='Causes'>$Causes</textarea><br>";
            echo "Corrective action taken: Remove the hazard, replace, repair, or retrain in the proper procedures)";
            echo "<textarea cols='40' rows='7' style='width:500px; height:50px;' class='NavTextBox' name='Corr_Action'>$Corr_Action</textarea><br>";
            echo "Investigator:<input type='text' name='Investigator' class ='NavTextBox' value = '$Investigator'> &#160 Report Date:<input type='date' name='Follow_Date'  value='" . date('Y-m-d', $result) . "';><br>";
            echo "If not completed, why:";
            echo "<textarea cols='40' rows='7' style='width:500px; height:25px;' class='NavTextBox' name='No_Comp'>$No_Comp</textarea><br>";
            echo "<input type='Submit' value='Update Report' name='nav_btn'>";
        break;
        }
        }
        if(empty($_POST['nav_btn'])){
        }
    ?><!--Investigation Report-->

    </form>

</div>
<!-------------------------------------------------------------------------------------------------->

<?php
  switch($_POST['nav_btn']){//if the submit button is clicked
  case 'Submit Near Miss Report':
    $Rpt_Num = $_POST['Rpt_Num'];
    //echo $Rpt_Num . "<br>";
    $Department = $_POST['Dept_Idx'];
    $Incident_D = $_POST['Incident_D'];
    $Incident_D = strtotime($Incident_D);

    $Incident_T = $_POST['Incident_T'];
    $Incident_T = strtotime($Incident_T);
    $Incident_T = ($Incident_T % 86400) - 21600;

    $Incident_DT = $Incident_D + $Incident_T; 
    echo $Incident_D . " " . $Incident_T . " " . $Incident_DT;
    $Box_1 = $_POST['audit'];
    if (empty($Box_1)) {
        $Box_1 = 0;
    }
    $Box_2 = $_POST['prestart'];
        if (empty($Box_2)) {
        $Box_2 = 0;
    }
    $Box_3 = $_POST['visual'];
    if (empty($Box_3)) {
        $Box_3 = 0;
    }
    $Box_4 = $_POST['incident'];
    if (empty($Box_4)) {
        $Box_4 = 0;
    }
    $Haz_Desc = $_POST['Haz_Desc'];
    $Empl_Name = $_POST['Empl_Name'];
    $Rpt_Date = $_POST['Rpt_Date'];
    $Fmt_Rpt_Date = strtotime(str_replace('/', '-', $Rpt_Date));
    $NM_Desc = $_POST['NM_Desc'];
    $Causes = $_POST['Causes'];
    $Corr_Action = $_POST['Corr_Action'];
    $Investigator = $_POST['Investigator'];
    $No_Comp = $_POST['No_Comp'];

    
    $query1="Insert INTO near_miss (Dept_Index, Incident_DT,  Box_1, Box_2, Box_3, Box_4, Haz_Desc, Empl_Name, Rpt_Date) VALUES ($Department, $Incident_DT, $Box_1, $Box_2, $Box_3, $Box_4, '$Haz_Desc', '$Empl_Name', $Fmt_Rpt_Date)";
    

    //Adds record of RefCell to Database
    mysqli_query($conn, $query1) or die("Cannot update " . "a" . $Department . "a" . $Box_1 . " " . $Box_2 . " " . $Box_3 . " " . $Box_4 . " " . $Incident_DT);//update or error
            
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