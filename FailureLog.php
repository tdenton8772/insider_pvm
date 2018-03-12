<?php
        require_once ("Includes/simplecms-config.php"); 
        require_once  ("Includes/connectDB.php");
        include("Includes/header.php"); 
            
// Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            
// Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            } 
            else {
                //echo "Connected successfully";
            }
    function noResults($str){
        alert("Error: ".$str);
    }
?>


<script>
    function enableDisable(bEnable, textboxID)
    {
         document.getElementById(textboxID).disabled = !bEnable
         document.getElementById(textboxID).value = "";
    }
</script>

<div id="main">
    <form action="" method="post">

    Number of Open Reports: 
    <?php
        
        if (!empty($_POST['nav_btn'])) {
            
         switch($_POST['nav_btn']){//if the submit button is clicked
         
       
        case 'Query':
           $query = "SELECT COUNT(Failures_Idx) Cnt_Fail FROM failures Where Closed = 0";
           $result = mysqli_query($conn, $query);

           if (mysqli_num_rows($result) > 0) {
            // output data of each row
            //$result1 = mysqli_num_rows($result);

            while($row = mysqli_fetch_assoc($result)) {
                $result1 = $row['Cnt_Fail'];   
            }
            } else {
            }
           $result = $result1;
           echo "<input type='text' name='Rpt_Num' size ='5' value='" . $result . "' class='NavTextBox'>";
        break;
        
        case 'Update Failure Log':

        break;
        }
        }
        if(empty($_POST['nav_btn'])){
            
           $query = "SELECT COUNT(Failures_Idx) Cnt_Fail FROM failures Where Closed = 0";
           $result = mysqli_query($conn, $query);

           if (mysqli_num_rows($result) > 0) {
            // output data of each row
            //$result1 = mysqli_num_rows($result);

            while($row = mysqli_fetch_assoc($result)) {
                $result1 = $row['Cnt_Fail'];   
            }
            } else {
            }
           $result = $result1;
           echo "<input type='text' name='Rpt_Num' size ='5' value='" . $result . "' class='NavTextBox'>";
        }
    ?><!--Navigation Bar-->

        <?php
        if (!empty($_POST['nav_btn'])) {
         switch($_POST['nav_btn']){//if the submit button is clicked
//////////////////////////////////////////////////////////////////////////////             
          
        case 'Query':
        $FoundBox = $_POST['FoundBox'];
        $AssignedBox = $_POST['AssignedBox'];
        $MajorBox = $_POST['MajorBox'];
        $DocBox = $_POST['DocBox'];
        if($_POST['chk_Open'] == 'Open')
        {
            $chk_Open = 0;
        }elseif($_POST['chk_Open'] == 'Closed'){
            $chk_Open = 1;
        }else{
            $chk_Open = '%';
        }

        if($_POST['chk_MFR'] == '1')
        {
            $chk_MFR = 1;
        }
        if($_POST['chk_Design'] == '1')
        {
            $chk_Design = 1;
        }
        if($_POST['chk_Supp'] == '1')
        {
            $chk_Supp = 1;
        }
        if($_POST['chk_DOC'] == '1')
        {
            $chk_DOC = 1;
        }
        if($_POST['chk_Part'] == '1')
        {
            $chk_Part = 1;
        }

        if(isset($_POST['FromDateBox'])){
            $FromDateBox = strtotime($_POST['FromDateBox']);
            }
            else {
            $FromDateBox = 0;
            }
        if(isset($_POST['ToDateBox'])){
            $ToDateBox = strtotime($_POST['ToDateBox']) + 86400;            
            }
            else {
            $ToDateBox = strtotime(date("Y-m-d", time()+86400));
            }
                $query = "SELECT Failures_Idx FROM failures Where Closed = 0 ORDER BY Failures_Idx ASC";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) > 0) {
                    $result1 = mysqli_num_rows($result);
                    
                    while($row = mysqli_fetch_assoc($result)) {
                        $result1 = $row['Failures_Idx'];
                        }
                    echo "</table>";

                    echo "<table>";
                    echo "<tr class='blank'>";
                        if($chk_Open == 0){
                            echo "    <td><input type='radio' name='chk_Open' value='Open' checked>Open</td>";
                            echo "    <td><input type='radio' name='chk_Open' value='Closed'>Closed</td>";
                            echo "    <td><input type='radio' name='chk_Open' value='Both'>Both</td><br>";
                        }elseif($chk_Open == 1){
                            echo "    <td><input type='radio' name='chk_Open' value='Open' checked>Open</td>";
                            echo "    <td><input type='radio' name='chk_Open' value='Closed' Checked>Closed</td>";
                            echo "    <td><input type='radio' name='chk_Open' value='Both'>Both</td><br>";
                        }else{
                            echo "    <td><input type='radio' name='chk_Open' value='Open'>Open</td>";
                            echo "    <td><input type='radio' name='chk_Open' value='Closed'>Closed</td>";
                            echo "    <td><input type='radio' name='chk_Open' value='Both' checked>Both</td><br>";
                            
                        }
                        
                    echo "</tr>";
                    echo "</table><HR>";

                    echo "<table>";
                    echo "<tr class=''>";

                    echo "<td><input type='checkbox' id='checkBox' onclick='enableDisable(this.checked, \"FoundBox\")'>Found By: </input>";
                    echo "<input type='text' id='FoundBox' name='FoundBox' size='15' disabled='true' required value='$FoundBox' /><td>";
                    
                    echo "<td><input type='checkbox' id='checkBox' onclick='enableDisable(this.checked, \"AssignedBox\")'>Assigned To: </input>";
                    echo "<input type='text' id='AssignedBox' name='AssignedBox' size='15' disabled='true' required value='$AssignedBox' /><td>";

                    echo "<td><input type='checkbox' id='checkBox' onclick='enableDisable(this.checked, \"MajorBox\")'>Major System: </input>";
                    echo "<input type='text' id='MajorBox' size='15' name='MajorBox' disabled='true' required value='$MajorBox' /></td>";
                   
                    echo "<td><input type='checkbox' id='checkBox' onclick='enableDisable(this.checked, \"DocBox\")'>Doc or Part Number: </input>";
                    echo "<input type='text' id='DocBox' size='15' name='DocBox' disabled='true' required value='$DocBox' /></td>";
                    
                    echo "</tr>";
                    echo "</table><HR>";
                    
                    echo "<input type='checkbox' id='checkBox' onclick='enableDisable(this.checked, \"FromDateBox\");enableDisable(this.checked, \"ToDateBox\") '>Date Range: </input>";
                    echo "<input type='date' id='FromDateBox' name='FromDateBox' disabled='true' value=" . date('Y-m-d', $FromDateBox) . " required />";
                    echo "<input type='date' id='ToDateBox' name='ToDateBox' disabled='true' value=" . date('Y-m-d', $ToDateBox) . " required /><br><HR>";
                    
                    
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

         if($chk_DOC == 1){
             echo "    <td><input type='checkbox' name='chk_DOC' value='1' checked>DOC</td>";
         }else{
             echo "    <td><input type='checkbox' name='chk_DOC' value='1'>DOC</td>";
         }

         if($chk_Part == 1){
             echo "    <td><input type='checkbox' name='chk_Part' value='1' checked>Missing Parts</td>";
         }else{
             echo "    <td><input type='checkbox' name='chk_Part' value='1'>Missing Parts</td>";
         }

         echo "</tr>";
         echo "</table><HR>";
         echo "<input type='submit' name='nav_btn' value='Query'>";
                

                $Finalquery = "SELECT Failures_Idx,
                                    Major_System,
                                    Doc_P_Sa,
                                    Closed,
                                    Found_By,
                                    Issued_To,
                                    Prob_Desc,
                                    Solution_Desc

                                FROM failures 

                                Where Closed Like '$chk_Open' 
                                    and Major_System LIKE '%$MajorBox%'
                                    and Doc_P_Sa LIKE '%$DocBox%'
                                    and Found_By LIKE '%$FoundBox%'
                                    and Issued_To LIKE '%$AssignedBox%'
                                    and Found_DT > $FromDateBox 
                                    and End_DT < $ToDateBox
                                ORDER BY Failures_Idx ASC";
                
                $result = mysqli_query($conn, $Finalquery) or noResults(mysqli_error_list(sel_db));
                
                echo "<Table borders='1'>";
                echo "<tr class = ''>";
                echo "<th width=5%>Log Number</th>";
                echo "<th>Major System</th>";
                echo "<th>Doc/Part Number</th>";
                echo "<th>Found By</th>";
                echo "<th>Assigned To</th>";
                echo "<th width=30%>Problem Description</th>";
                echo "<th width=30%>Solution Description</th>";
                if (mysqli_num_rows($result) > 0) {
                    $result1 = mysqli_num_rows($result);
                    
                    while($row = mysqli_fetch_assoc($result)) {
                        $result1 = $row['Failures_Idx'];
                        $result2 = $row['Major_System'];
                        $result3 = $row['Doc_P_Sa'];
                        $result5 = $row['Found_By'];
                        $result6 = $row['Issued_To'];
                        $result7 = $row['Prob_Desc'];
                        $result8 = $row['Solution_Desc'];

                            echo "<tr><td>$result1</td>";
                            echo "<td>$result2</td>";
                            echo "<td>$result3</td>";
                            echo "<td>$result5</td>";
                            echo "<td>$result6</td>";
                            echo "<td>$result7</td>";
                            echo "<td>$result8</td></tr>";
                            }
                    
                    }
                } else {
                    echo "No Results we found";
                }
                echo "</table>";

        }
        }
//////////////////////////////////////////////////////////////////////////////    
        if(empty($_POST['nav_btn'])){
                $query = "SELECT Failures_Idx FROM failures Where Closed = 0 ORDER BY Failures_Idx ASC";
                $result = mysqli_query($conn, $query);
                
                if (mysqli_num_rows($result) > 0) {
                    $result1 = mysqli_num_rows($result);
                    
                    while($row = mysqli_fetch_assoc($result)) {
                        $result1 = $row['Failures_Idx'];
                            $query_Num = "Select";
                    }
                    echo "<table>";
                    echo "<tr class='blank'>";
                        if($chk_Open == 1){
                            echo "    <td><input type='radio' name='chk_Open' value='Open' checked>Open</td>";
                            echo "    <td><input type='radio' name='chk_Open' value='Closed'>Closed</td><br>";
                            echo "    <td><input type='radio' name='chk_Open' value='Both' checked>Both</td>";
                        }elseif($chk_Open == 0){
                            echo "    <td><input type='radio' name='chk_Open' value='Open' checked>Open</td>";
                            echo "    <td><input type='radio' name='chk_Open' value='Closed' Checked>Closed</td><br>";
                            echo "    <td><input type='radio' name='chk_Open' value='Both'>Both</td>";
                        }else{
                            echo "    <td><input type='radio' name='chk_Open' value='Open'>Open</td>";
                            echo "    <td><input type='radio' name='chk_Open' value='Closed'>Closed</td>";
                            echo "    <td><input type='radio' name='chk_Open' value='Both'>Both</td>";
                        }

                    echo "</tr>";
                    echo "</table><HR>";

                    echo "<table>";
                    echo "<tr class=''>";

                    echo "<td><input type='checkbox' id='checkBox' onclick='enableDisable(this.checked, \"FoundBox\")'>Found By: </input>";
                    echo "<input type='text' id='FoundBox' name='FoundBox' size='15' disabled='true' required value='' /><td>";
                    
                    echo "<td><input type='checkbox' id='checkBox' onclick='enableDisable(this.checked, \"AssignedBox\")'>Assigned To: </input>";
                    echo "<input type='text' id='AssignedBox' name='AssignedBox' size='15' disabled='true' required /><td>";

                    echo "<td><input type='checkbox' id='checkBox' onclick='enableDisable(this.checked, \"MajorBox\")'>Major System: </input>";
                    echo "<input type='text' id='MajorBox' size='15' name='MajorBox' disabled='true' required /></td>";
                   
                    echo "<td><input type='checkbox' id='checkBox' onclick='enableDisable(this.checked, \"DocBox\")'>Doc or Part Number: </input>";
                    echo "<input type='text' id='DocBox' size='15' name='DocBox' disabled='true' required /></td>";
                    
                    echo "</tr>";
                    echo "</table><HR>";
                    
                    echo "<input type='checkbox' id='checkBox' onclick='enableDisable(this.checked, \"FromDateBox\");enableDisable(this.checked, \"ToDateBox\") '>Date Range: </input>";
                    echo "<input type='date' id='FromDateBox' name='FromDateBox' disabled='true' required />";
                    echo "<input type='date' id='ToDateBox' name='ToDateBox' disabled='true' required /><br><HR>";
                    
                    
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

         if($chk_DOC == 1){
             echo "    <td><input type='checkbox' name='chk_DOC' value='1' checked>DOC</td>";
         }else{
             echo "    <td><input type='checkbox' name='chk_DOC' value='1'>DOC</td>";
         }

         if($chk_Part == 1){
             echo "    <td><input type='checkbox' name='chk_Part' value='1' checked>Missing Parts</td>";
         }else{
             echo "    <td><input type='checkbox' name='chk_Part' value='1'>Missing Parts</td>";
         }

         echo "</tr>";
         echo "</table><HR>";
         echo "<input type='submit' name='nav_btn' value='Query'>";
                } else {
                }
                

        }
    ?>
        
        

        </form>
</div>
        <?php
        if (!empty($_POST['nav_btn'])) {
         switch($_POST['nav_btn']){//if the submit button is clicked
         
         case 'Query':
         $FoundBox = $_POST['FoundBox'];

         break;
           
        case '<':
        break;
           
        case '>':
        break;
        
        case 'Submit Failure Log':
        break;
        }
        }
    ?>

<?php
        include ("Includes/footer.php");

?>