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
    <form name="myForm" action="" method="post" onmouseover="checkFilled()">        
        <script>
            function checkFilled() {
                var inputVal1 = document.getElementById("Area1");
                var inputVal2 = document.getElementById("Area2");
                var inputVal3 = document.getElementById("VOC1");
                var inputVal4 = document.getElementById("VOC2");
                var inputVal5 = document.getElementById("Pmax1");
                var inputVal6 = document.getElementById("Pmax2");
                var inputVal7 = document.getElementById("Isc1");
                var inputVal8 = document.getElementById("Isc2");
                var inputVal9 = document.getElementById("FF1");
                var inputVal10 = document.getElementById("FF2");
                var inputVal11 = document.getElementById("Eff1");
                var inputVal12 = document.getElementById("Eff2");
                var colourM = "yellow";
                var colourH = "red";

                var consPerDif1 = 0.05;
                var consPerDif2 = 0.02;

                //1******************
                var diff1 = (Math.abs((inputVal1.value - inputVal2.value)) / inputVal1.value);
                if (diff1 > consPerDif1) {
                    inputVal2.style.backgroundColor = colourH;
                }
                else if (diff1 > consPerDif2) {
                    inputVal2.style.backgroundColor = colourM;
                }
                else {
                    inputVal2.style.backgroundColor = "";
                }

                //1******************
                var diff2 = (Math.abs((inputVal3.value - inputVal4.value)) / inputVal3.value);
                if (diff2 > consPerDif1) {
                    inputVal4.style.backgroundColor = colourH;
                }
                else if (diff2 > consPerDif2) {
                    inputVal4.style.backgroundColor = colourM;
                }
                else {
                    inputVal4.style.backgroundColor = "";
                }
                //1******************
                var diff3 = (Math.abs((inputVal5.value - inputVal6.value)) / inputVal5.value);
                if (diff3 > consPerDif1) {
                    inputVal6.style.backgroundColor = colourH;
                }
                else if (diff3 > consPerDif2) {
                    inputVal6.style.backgroundColor = colourM;
                }
                else {
                    inputVal6.style.backgroundColor = "";
                }
                //1******************
                var diff4 = (Math.abs((inputVal7.value - inputVal8.value)) / inputVal7.value);
                if (diff4 > consPerDif1) {
                    inputVal8.style.backgroundColor = colourH;
                }
                else if (diff4 > consPerDif2) {
                    inputVal8.style.backgroundColor = colourM;
                }
                else {
                    inputVal8.style.backgroundColor = "";
                }
                //1******************
                var diff5 = (Math.abs((inputVal9.value - inputVal10.value)) / inputVal9.value);
                if (diff5 > consPerDif1) {
                    inputVal10.style.backgroundColor = colourH;
                }
                else if (diff5 > consPerDif2) {
                    inputVal10.style.backgroundColor = colourM;
                }
                else {
                    inputVal10.style.backgroundColor = "";
                }
                //1******************
                var diff6 = (Math.abs((inputVal11.value - inputVal12.value)) / inputVal11.value);
                if (diff6 > consPerDif1) {
                    inputVal12.style.backgroundColor = colourH;
                }
                else if (diff6 > consPerDif2) {
                    inputVal12.style.backgroundColor = colourM;
                }
                else {
                    inputVal12.style.backgroundColor = "";
                }


            }
            function reload() {
                document.forms["myForm"].submit();
            }
            checkFilled();
            windows.onload = checkfilled()
</SCRIPT>
        
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
        
        case 'Update Request':
           $Rpt_Num = $_POST['Rpt_Num'];
           echo "<input type='text' name='Rpt_Num' size ='5' value='$Rpt_Num' class='NavTextBox'>";
        break;

        case 'Enter 3rd Party Data':
        case 'Update 3rd Party Data':
            echo "<SCRIPT>reload()</SCRIPT>";
            break;

        case 'Find RefCell':

            $Ref_Cell = $_POST['Ref_Cell'];
            echo "Report Number: ";
            echo "<SELECT name='Rpt_Num'>";
     
                    $sql = "SELECT sn_Index FROM sn_main WHERE SN = $Ref_Cell";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        $result1 = $row['sn_Index'];
                    }
                    } else {
                    }

                    $sql2 = "Select Request_Idx FROM cal_request Where sn_index = $result1";
                    $result = mysqli_query($conn, $sql2);

                    if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        $result1 = $row['Request_Idx'];
                        echo "<option value='$result1'>$result1</option>";
                    }

                    } else {
                        $query = "SELECT MAX(Request_Idx) FROM cal_request ORDER BY Request_Idx ASC";
                        $result = mysqli_query($conn, $query);

                        if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                            $result1 = $row['Request_Idx'];
                        }
                        $result1 = $result1 + 1;
                        echo "<option value='$result1'>$result1</option>";
                        } else {
                        }
                    }
      
                    echo "</SELECT>";
                    echo "&#160 &#160 Ref Cell Number: ";
                    echo "<input type='text' name='Ref_Cell' size ='5' value='$Ref_Cell' class='NavTextBox'>";
        break;
         }
        }
        if(empty($_POST['nav_btn'])){
                    echo "<SCRIPT>";
                    echo "onkeypress=\"if ((event.keyCode | event.which) == 13) { document.getElementById('nav_btn').click(); return false;\" }";
                    echo "</SCRIPT>";
           $query = "SELECT MAX(Request_Idx) FROM cal_request ORDER BY Request_Idx ASC";
           $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $result1 = $row['NM_Index'];
            }
            } else {
            }
           $result = $result1 + 1;
           echo "Report number: ";
           /*echo "<input type='submit' name='nav_btn' value='<'>";*/


           echo "<input type='text' name='Rpt_Num' size ='5' value='" . $result . "' class='NavTextBox'>";
           /*echo "<input type='submit' name='nav_btn' value='>'>";*/
           echo "<input type='submit' name='nav_btn' value='Go'><br><br>";

           echo "<input type='text' name='Ref_Cell' size ='5' value='' class='NavTextBox'><br>";
           echo "<input type='submit' name='nav_btn' value='Find RefCell'><br><br>";
        }
    ?><!--Navigation Bar-->


        
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
        
        case 'Update Request':
        break;

        case 'Create Request':
        break;

        case 'Enter 3rd Party Data':
        case 'Update 3rd Party Data':         
        case 'Find RefCell':
            $Ref_Cell = $_POST['Ref_Cell'];

                    $sql = "SELECT sn_Index FROM sn_main WHERE SN = $Ref_Cell";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        $result1 = $row['sn_Index'];
                        $SN_Index = $result1;
                            $testsql = "Select test.Test_C,
                                         test.Test_VOC,
                                         test.Test_ISC,
                                         test.Test_FF,
                                         test.Test_Pmax,
                                         test.Test_Eff
                                         FROM  test_data test
                                         INNER JOIN doma_039 DOMA
                                         ON DOMA.039_index = test.test_index
                                         INNER JOIN sn_main Main
                                         ON Main.sn_index = DOMA.sn_index
                                         Where Main.SN = $Ref_Cell
                                         and test.test_C = 25";
                            $TestData = mysqli_query($conn, $testsql); 
                            if(mysqli_num_rows($TestData) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($TestData)) {
                                $VOC = $row['Test_VOC'];
                                $Isc = $row['Test_ISC'];
                                $FF = $row['Test_FF'];
                                $Pmax = $row['Test_Pmax'];
                                $Eff = $row['Test_Eff'];
                            }}
                       $sql3 = "Select material.Material_Name,
                                size.Measurement
                                From sn_main Main
                                inner join pn_size size
                                on size.size_index = Main.PN_size
                                inner join pn_material material
                                on material.material_index = Main.PN_Material
                                Where Main.SN = $Ref_Cell";
                        $result5 = mysqli_query($conn, $sql3);
                        while($row = mysqli_fetch_assoc($result5)) {
                            $Type = $row['Material_Name'];
                            $Size = $row['Measurement'];
                        }
                    }
                    } else {
                        $SN_Index = NULL;
                    }
                    

                    $sql2 = "Select Request_Idx FROM cal_request Where sn_index = $result1 ORDER BY Request_Idx ASC";
                    $result = mysqli_query($conn, $sql2);
                    if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                    $result4 = $row['Request_Idx'];

                    $sql2 = "SELECT SN_Index, Name, Organization, Department, Phone, Email, Authorized, Org_Man, Type, Other, Description FROM cal_request  WHERE Request_Idx = $result4";
                        $result3 = mysqli_query($conn, $sql2);
                        while($row = mysqli_fetch_assoc($result3)) {
                            $SN_Index = $row['sn_Index'];
                            $Name = $row['Name'];
                            $Organization = $row['Organization'];
                            $Department = $row['Department'];
                            $Phone = $row['Phone'];
                            $Email = $row['Email'];
                            $Authorized = $row['Authorized'];
                            $Org_Man = $row['Org_Man'];
                            $Other = $row['Other'];
                            $Description = $row['Description'];
                        }
                    $sql3 = "Select test.Test_C,
                                         test.Test_FN,
                                         test.Test_VOC,
                                         test.Test_ISC,
                                         test.Test_FF,
                                         test.Test_Pmax,
                                         test.Test_Size,
                                         test.Test_Eff
                                         FROM  test_data test
                                         INNER JOIN doma_039 DOMA
                                         ON DOMA.039_index = test.test_index
                                         INNER JOIN sn_main Main
                                         ON Main.sn_index = DOMA.sn_index
                                         Where Main.SN = $Ref_Cell
                                         and test.Tab_Index = 9";

                      $result3rdparty = mysqli_query($conn, $sql3);
                      while($row = mysqli_fetch_assoc($result3rdparty)) {
                            $FN_T = $row['Test_FN'];
                            $VOC_F = $row['Test_VOC'];
                            $Isc_F = $row['Test_ISC'];
                            $FF_F = $row['Test_FF'];
                            $Pmax_F = $row['Test_Pmax'];
                            $Size_F = $row['Test_Size'];
                            $Eff_F = $row['Test_Eff'];
                      }
                    }
                    }

                    else {
                    }



            echo "Request Date: ";
            echo "<input type='date' name='Req_Date' size ='10' value='" . date('Y-m-d') . "' class='NavTextBox'><br>";
            echo "<H3>Requestor's Information</h3>";
            echo "<table>";
                echo "<tr>";
                    echo "<td width='15%'>Requestors Name: </td>";
                    echo "<td><input type='text' name='Req_Name' size ='20' value='".$Name."' class='NavTextBox'></td>";
                    echo "<td><input type='checkbox' name='CL_Attached' value='1'>Cover Letter Attached<br>";
                    echo "<input type='checkbox' name='Data_Attached' value='1'>Requestor's Data Attached";
                    echo "</td>";
            echo "</tr>";
            
            echo "<tr>";
                echo "<td>Organization: </td>";
                echo "<td><input type='text' name='Organization' size ='20' value='". $Organization."' class='NavTextBox'></td>";
                echo "<td rowspan ='5'>";
                echo "<table border='1' bordercolor='00FF00'><tr><td><b>Notes</b><br>";
                echo "<blockquote> Calibration services requested with this form are non-accreddited and limited to packaged reference cells that meet the following criteria</blockquote>";
                echo "1) The active area must be smaller than 5cm x 5cm.<br>";
                echo "2) Open circuit voltage is less than 10V.<br>";
                echo "3) Short Circuit current less than 5A.<br>";
                echo "4) Single Junction Devices only<br>";
                echo "5) A 4 Wire connection is provided to the device<br>";
                echo "6) An attached T-Type, K-Type, J-Type thermocouple or 100 ohm Pt. RTD is provided with the device.<br>";
                echo "7) The device is temperature controlled throu an aluminum package or other means.<br>";               
                echo "</td></tr></table>";
                echo "</td>";
            echo "</tr>";
            
            echo "<tr>";
                echo "<td>Department: </td>";
                echo "<td><input type='text' name='Department' size ='20' value='". $Department . "' class='NavTextBox'></td>";
            echo "</tr>";
            
            echo "<tr>";
                echo "<td>Phone Number: </td>";
                echo "<td><input type='text' name='Phone' size ='20' value='".$Phone."' class='NavTextBox'></td>";
            echo "</tr>";
            
            echo "<tr>";            
                echo "<td>Email Address: </td>";
                echo "<td><input type='text' name='Email' size ='20' value='".$Email."' class='NavTextBox'></td>";
            echo "</tr>";
            
            echo "<tr>";            
                echo "<td>Authorized Persons: </td>";
                echo "<td><textarea cols='20' rows='3'  class='NavTextBox' style='font-size:small; width:165px; height:50px;' class='' name='Authorized'>$Authorized</textarea></td>";
            echo "</tr>";
                  
            echo "</table>";
            echo "<H3>Device Information</h3>";
             echo "<table>";
                echo "<tr>";
                    echo "<td>Original Manufacturer: </td>";
                    echo "<td><input type='text' name='Org_Man' size ='10' value='" . $Org_Man . "' class='NavTextBox'></td>";
                    echo "<td></td>";
                    echo "<td></td>";
            echo "</tr>";
            
            $Ref_ID = $_POST['Ref_Cell'];

            echo "<tr>";
                echo "<td>Device ID: </td>";
                echo "<td><input type='text' name='Ref_Cell' size ='10' value='" . $Ref_ID . "' class='NavTextBox'></td>";
                echo "<td></td>";
                echo "<td></td>";
            echo "</tr>";
            
            echo "<tr>";
                echo "<td>Device Type: </td>";
                echo "<td><input type='text' name='Type' size ='10' value='".$Type."' class='NavTextBox'></td>";
                echo "<td>If 'Other', Describe: </td>";
                echo "<td><input type='text' name='Other' size ='10' value='".$Other."' class='NavTextBox'></td>";                
            echo "</tr>";
            echo "</table>";

            echo "<h3>Physical Description and Instructions:</h3>";

            echo "<blockquote>Include filters/window type, temperature sensor type and location, connector type and pin out description, etc. Also ";
            echo "include any specific calibration instructions unique to this device </blockquote>";
            echo "<textarea cols='40' rows='4'  style='width:550px; height:50px;' class='' name='Description'>$Description</textarea>"; 
            echo "<h3>Expected Calibration Values:</h3>";

            echo "<table>";
                echo "<tr>";
                    echo "<td>Area (cm2): </td>";
                    echo "<td><input type='text' name='Area' id='Area1' onchange='checkFilled();' onload='checkfilled()' disabled=disabled size ='10' value='".$Size."' class='NavTextBox'></td>";
                    echo "<td>VOC: </td>";
                    echo "<td><input type='text' name='VOC' id='VOC1' onchange='checkFilled();' onload='checkfilled()' disabled=disabled size ='10' value='".$VOC."' class='NavTextBox'></td>";
                    echo "<td>Pmax(mW): </td>";
                    echo "<td><input type='text' name='Pmax' id='Pmax1' onchange='checkFilled();' onload='checkfilled()' disabled=disabled size ='10' value='".$Pmax."' class='NavTextBox'></td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>Isc(mA): </td>";
                    echo "<td><input type='text' name='Isc' id='Isc1' onchange='checkFilled();' onload='checkfilled()' disabled=disabled size ='10' value='".$Isc."' class='NavTextBox'></td>";
                    echo "<td>FF(%): </td>";
                    echo "<td><input type='text' name='FF' id='FF1' onchange='checkFilled();' onload='checkfilled()' disabled=disabled size ='10' value='".$FF."' class='NavTextBox'></td>";
                    echo "<td>Eff(%): </td>";
                    echo "<td><input type='text' name='Eff' id='Eff1' onchange='checkFilled();' onload='checkfilled()' disabled=disabled size ='10' value='$Eff' class='NavTextBox'></td>";
                echo "</tr>";
            echo "</table>";

            echo "<h3>3rd Party Calibration Values:</h3>";

            echo "<table>";
                echo "<tr>";
                    echo "<td>Test Report #: </td>";
                    echo "<td><input type='text' name='FN_F' id='FN_2' onchange='checkFilled();' size ='10' value='".$FN_T."' class='NavTextBox'></td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>Area (cm2): </td>";
                    echo "<td><input type='text' name='Area_F' id='Area2' onchange='checkFilled();' onload='checkfilled()' size ='10' value='".$Size_F."' class='NavTextBox'></td>";
                    echo "<td>VOC: </td>";
                    echo "<td><input type='text' name='VOC_F' id='VOC2' onchange='checkFilled();' onload='checkfilled()' size ='10' value='".$VOC_F."' class='NavTextBox'></td>";
                    echo "<td>Pmax(mW): </td>";
                    echo "<td><input type='text' name='Pmax_F' id='Pmax2' onchange='checkFilled();' onload='checkfilled()' size ='10' value='".$Pmax_F."' class='NavTextBox'></td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>Isc(mA): </td>";
                    echo "<td><input type='text' name='Isc_F' id='Isc2' onchange='checkFilled();' onload='checkfilled()' size ='10' value='".$Isc_F."' class='NavTextBox'></td>";
                    echo "<td>FF(%): </td>";
                    echo "<td><input type='text' name='FF_F' id='FF2' onchange='checkFilled();' onload='checkfilled()' size ='10' value='".$FF_F."' class='NavTextBox'></td>";
                    echo "<td>Eff(%): </td>";
                    echo "<td><input type='text' name='Eff_F' id='Eff2' onchange='checkFilled();' onload='checkfilled()' size ='10' value='".$Eff_F."' class='NavTextBox'></td>";
                echo "</tr>";
            echo "</table>";

            $sql = "SELECT sn_Index FROM sn_main WHERE SN = $Ref_Cell";
            $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        $result1 = $row['sn_Index'];
                    }
                    } else {
                    }

                    $sql2 = "SELECT Data.Index

                            FROM sn_main SN
                            inner join doma_039 DOMA 
                                on DOMA.sn_index = SN.sn_Index
                            inner join test_data Data 
                                on Data.Test_Index = DOMA.039_index
                            WHERE SN = $Ref_Cell
                            and Data.tab_index = 9";
                    $result = mysqli_query($conn, $sql2);

                    if (mysqli_num_rows($result) > 0) {
                    // output data of each row
            echo "<input type='submit' name='nav_btn' value='Update 3rd Party Data'>";
                    } else {
            echo "<input type='submit' name='nav_btn' value='Enter 3rd Party Data'>";
                    }
         
        break;
        if(empty($_POST['nav_btn'])){
        }}
        }
    ?>
        </form>
</div>


<?php
switch($_POST['nav_btn']){//if the submit button is clicked

  case 'Update 3rd Party Data':
  $Ref_Cell = $_POST['Ref_Cell'];
  $Rpt_Num = $_POST['Rpt_Num'];
  $sql = "SELECT Data.Index

         FROM sn_main SN
         inner join doma_039 DOMA 
            on DOMA.sn_index = SN.sn_Index
        inner join test_data Data 
            on Data.Test_Index = DOMA.039_index
        WHERE SN = $Ref_Cell
            and Data.tab_index = 9";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
                    // output data of each row
  	while($row = mysqli_fetch_assoc($result)) {
        $Index = $row['Index'];
    }

    } else {
        $Index = NULL;
    }             

    if(empty($Index)){
        
    }
    else{
        
    }

  $Area_F = $_POST['Area_F'];
  $Isc_F = $_POST['Isc_F'];
  $VOC_F = $_POST['VOC_F'];
  $FF_F = $_POST['FF_F'];
  $Pmax_F = $_POST['Pmax_F'];
  $Eff_F = $_POST['Eff_F'];
  $FN_F = $_POST['FN_F'];
  $sqlUpdate = "UPDATE test_data TD SET 
                    TD.Test_Size = $Area_F,
                    TD.Test_Isc = $Isc_F,
                    TD.Test_VOC = $VOC_F,
                    TD.Test_FF = $FF_F,
                    TD.Test_Pmax = $Pmax_F,
                    TD.Test_Eff = $Eff_F,
                    TD.Test_FN = '$FN_F'
                    Where TD.Index = $Index";
    //$sqlUpdate = "INSERT INTO near_miss (NM_Desc, Causes, Corr_Action, Investigator, No_Comp) VALUES ('$NM_Desc', '$Causes', '$Corr_Action', '$Investigator', '$No_Comp') WHERE NM_Index = $Rpt_Num";
    @mysqli_query($conn, $sqlUpdate) or die("Cannot update " . $Index . " ". $Area_F  . " " . $Isc_F . " " . $VOC_F . " " . $FF_F . " " . $Pmax_F . " " . $Eff_F . " " . $FN_F);//update or error
    echo $Rpt_Num;        
    mysqli_close($conn);  
    break;




  case 'Enter 3rd Party Data':
  $Ref_Cell = $_POST['Ref_Cell'];
  $Rpt_Num = $_POST['Rpt_Num'];
  $sql = "SELECT Data.Test_Index

         FROM sn_main SN
         inner join doma_039 DOMA 
            on DOMA.sn_index = SN.sn_Index
        inner join test_data Data 
            on Data.Test_Index = DOMA.039_index
        WHERE SN = '$Ref_Cell'
            and Data.tab_index = 1";

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
  $Area_F = $_POST['Area_F'];
  $Isc_F = $_POST['Isc_F'];
  $VOC_F = $_POST['VOC_F'];
  $FF_F = $_POST['FF_F'];
  $Pmax_F = $_POST['Pmax_F'];
  $Eff_F = $_POST['Eff_F'];
  $FN_F = $_POST['FN_F'];
    $sqlInsert = "INSERT INTO test_data (Test_Index, Tab_Index, Test_FN, Test_VOC, Test_Isc, Test_FF, Test_Pmax, Test_Eff, Test_Size) VALUES ($Index1, 9, '$FN_F', $VOC_F, $Isc_F, $FF_F, $Pmax_F, $Eff_F, $Area_F)";
    @mysqli_query($conn, $sqlInsert) or die("Cannot update " . " " . $Index1 . " 9 " . $FN_F  . " " . $VOC_F . " " . $Isc_F . " " . $FF_F . " " . $Pmax_F . " " . $Eff_F . " " . $Area_F);//update or error
    echo $Rpt_Num;        
    mysqli_close($conn);  
    break;

}

        include ("Includes/footer.php");

?>