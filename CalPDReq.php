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
    
    

    <?php
        if (!empty($_POST['nav_btn'])) {
         switch($_POST['nav_btn']){//if the submit button is clicked
         
         case 'Go':
            echo "<form action=\"\" method=\"post\">";
            $Rpt_Num = $_POST['Rpt_Num'];
           echo "<input type='text' name='Rpt_Num' size ='5' value='$Rpt_Num' class='NavTextBox'>";
         break;
           
        case '<':
        echo "<form action=\"\" method=\"post\">";
            $Rpt_Num = $_POST['Rpt_Num'];
            $Rpt_Num = $Rpt_Num - 1;
           echo "<input type='text' name='Rpt_Num' size ='5' value='$Rpt_Num' class='NavTextBox'>";
        break;
           
        case '>':
        echo "<form action=\"\" method=\"post\">";
            $Rpt_Num = $_POST['Rpt_Num'];
            $Rpt_Num = $Rpt_Num + 1;
           echo "<input type='text' name='Rpt_Num' size ='5' value='$Rpt_Num' class='NavTextBox'>";
        break;

        case 'Create Report':
        echo "<form action=\"insert.php\" enctype=\"multipart/form-data\" method=\"post\" name=\"changer\">";
        break;
        
        case 'Update Request':
        echo "<form action=\"insert.php\" method=\"post\">";
           $Rpt_Num = $_POST['Rpt_Num'];
           echo "<input type='text' name='Rpt_Num' size ='5' value='$Rpt_Num' class='NavTextBox'>";
        break;

        case 'Find Si PD':
        echo "<form action=\"insert.php\" enctype=\"multipart/form-data\" method=\"post\" name=\"changer\">";
        echo "<input name='SiGe' value=1 type=\"hidden\">";
            $PD = $_POST['PD'];
            
            echo "Report Number: ";
            echo "<SELECT name='Cal_Num'>";
     
                    $sql = "SELECT PD_Index FROM pd_main WHERE PD_SN = '$PD'";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        $result1 = $row['PD_Index'];
                    }
                        
                        $sql2 = "Select Cal_Index FROM pd_cal Where SN_index = $result1";
                        $result = mysqli_query($conn, $sql2);

                            if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                    $result1 = $row['Cal_Index'];
                                    echo "<option value='$result1'>$result1</option>";
                                }
                                
                            } else {
                            

                        $query = "SELECT MAX(Cal_Index) Cal_Index FROM pd_cal";
                        $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                    $result1 = $row['Cal_Index'];
                                }
                                
                            $result1 = $result1 + 1;
                            echo "<option value='$result1'>$result1</option>";
                                } else {
                                    echo "<option value='1'>1</option>";
                                }
                            }
                } else {
                    
                    $sql1 = "SELECT MAX(PD_Index) PD_Index FROM pd_main";
                    $result3 = mysqli_query($conn, $sql1);
                    if (mysqli_num_rows($result3) > 0) {
                    // output data of each row
                        while($row = mysqli_fetch_assoc($result3)) {
                            $result1 = $row['PD_Index'];
                            $result1 = $result1 + 1;
                        }
                    }
                    $sql2 = "SELECT MAX(Cal_Index) Cal_Index FROM pd_cal";
                    $result4 = mysqli_query($conn, $sql2);

                    if (mysqli_num_rows($result4) > 0) {
                    // output data of each row
                        while($row = mysqli_fetch_assoc($result4)) {
                            $result1 = $row['Cal_Index'];
                            $result1 = $result1 + 1;
                        }
                        echo "<option value='$result1'>$result1</option>";
                    } else {
                    
                        }
                }
                

                    
      
                    echo "</SELECT>";
                    echo "&#160 &#160 Si Photodiode Number: ";
                    echo "<input type='text' name='PD_Number' size ='5' value='$PD' class='NavTextBox'>";
        break;

        case 'Find Ge PD':
                echo "<form action=\"insert.php\" enctype=\"multipart/form-data\" method=\"post\" name=\"changer\">";
        echo "<input name='SiGe' value=2 type=\"hidden\">";
            $PD = $_POST['GePD'];
            
            echo "Report Number: ";
            echo "<SELECT name='Cal_Num'>";
     
                    $sql = "SELECT PD_Index FROM pd_main WHERE PD_SN = '$PD'";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        $result1 = $row['PD_Index'];
                    }
                        
                        $sql2 = "Select Cal_Index FROM pd_cal Where SN_index = $result1";
                        $result = mysqli_query($conn, $sql2);

                            if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                    $result1 = $row['Cal_Index'];
                                    echo "<option value='$result1'>$result1</option>";
                                }
                                
                            } else {
                            

                        $query = "SELECT MAX(Cal_Index) Cal_Index FROM pd_cal";
                        $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                    $result1 = $row['Cal_Index'];
                                }
                                
                            $result1 = $result1 + 1;
                            echo "<option value='$result1'>$result1</option>";
                                } else {
                                    echo "<option value='1'>1</option>";
                                }
                            }
                } else {
                    
                    $sql1 = "SELECT MAX(PD_Index) PD_Index FROM pd_main";
                    $result3 = mysqli_query($conn, $sql1);
                    if (mysqli_num_rows($result3) > 0) {
                    // output data of each row
                        while($row = mysqli_fetch_assoc($result3)) {
                            $result1 = $row['PD_Index'];
                            $result1 = $result1 + 1;
                        }
                    }
                    $sql2 = "SELECT MAX(Cal_Index) Cal_Index FROM pd_cal";
                    $result4 = mysqli_query($conn, $sql2);

                    if (mysqli_num_rows($result4) > 0) {
                    // output data of each row
                        while($row = mysqli_fetch_assoc($result4)) {
                            $result1 = $row['Cal_Index'];
                            $result1 = $result1 + 1;
                        }
                        echo "<option value='$result1'>$result1</option>";
                    } else {
                    
                        }
                }
                

                    
      
                    echo "</SELECT>";
                    echo "&#160 &#160 Ge Photodiode Number: ";
                    echo "<input type='text' name='PD_Number' size ='5' value='$PD' class='NavTextBox'>";
        break;
         }
        }
//***********************************************
        if(empty($_POST['nav_btn'])){
           echo "<form action=\"\" method=\"post\">";
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
           echo "Report number: ";
           /*echo "<input type='submit' name='nav_btn' value='<'>";*/
           
           $GeQuery = "Select MAX(PD_SN) PD
                        
                        From pd_main Main
                            Left Join pd_cal Cal
                            On Main.PD_Index = Cal.SN_Index

                        Where PD_Type = 2";
           $Geresult = mysqli_query($conn, $GeQuery);

            if (mysqli_num_rows($Geresult) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($Geresult)) {
                $Geresult1 = $row['PD'];
            }
            } else {
            }
            $Geresult1 = $Geresult1 + 1;
           echo "<input type='text' name='Rpt_Num' size ='5' value='" . $result . "' class='NavTextBox'>";
           /*echo "<input type='submit' name='nav_btn' value='>'>";*/
           echo "<input type='submit' name='nav_btn' value='Go'><br><br>";

           
            echo "<input type='submit' name='nav_btn' value='Find Si PD'>";
            echo "<input type='text' name='PD' size ='5' value='' class='NavTextBox'><br><hr>";

            echo "<input type='submit' name='nav_btn' value='Find Ge PD'>";
            echo "<input type='text' name='GePD' size ='5' value='" . $Geresult1 . "' class='NavTextBox'>";

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
                
        case 'Find Si PD':
            $PD = $_POST['PD'];
                    $sql = "SELECT PD_Index FROM pd_main WHERE PD_SN = '$PD'";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        $result1 = $row['PD_Index'];
                        $SN_Index = $result1;
                            $testsql = "SELECT Main.PD_SN,
                                            Main.PD_Customer,
                                            Cal.Cal_Index,
                                            Cal.Temp,
                                            Cal.NIST_Idx,
                                            Cal.Humidity,
                                            NIST.Nist_Name,
                                            Meas.Meas_Idx,
                                            Meas.Meas_SN,
                                            Meas.System_Model,
                                            Meas.Cal_Date,
                                            Cal.pd_Type,
                                            Type_1.Type,
                                            docPDF.Doc_Name PDFDoc,
                                            docTXT.Doc_Name TXTDoc
                                        FROM pd_main Main
                                            INNER JOIN pd_cal Cal
                                            ON Main.PD_Index = Cal.SN_Index 
                                            INNER JOIN nist_pd_std NIST
                                            ON Cal.NIST_Idx = NIST.NIST_Idx
                                            INNER JOIN meas_sys Meas
                                            ON Cal.Meas_Idx = Meas.Meas_Idx
                                            Inner JOIN pd_type Type_1
                                            ON Cal.PD_Type = Type_1.pdType_Idx
                                            Left Join documents docPDF
                                            ON Cal.PDcalPDF_Idx = docPDF.Doc_Index
                                            Left Join documents docTXT
                                            ON Cal.PDcalTXT_Idx = docTXT.Doc_Index
                                        WHERE PD_SN = '$PD'";
                            $TestData = mysqli_query($conn, $testsql); 
                            if(mysqli_num_rows($TestData) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($TestData)) {
                                $PD_SN = $row['PD_SN'];
                                $Customer = $row['PD_Customer'];
                                $Cal_Idx = $row['Cal_Idx'];
                                $Temp = $row['Temp'];
                                $Humidity = $row['Humidity'];
                                $Nist_Name = $row['Nist_Name'];
                                $Nist_Idx = $row['Nist_Idx'];
                                $Meas_Idx = $row['Meas_Idx'];
                                $Meas_SN = $row['Meas_SN'];
                                $System_Model = $row['System_Model'];
                                $Cal_Date = $row['Cal_Date'];
                                $PD_Type = $row['PD_Type'];
                                $Type = $row['Type'];
                                $PDFDoc = $row['PDFDoc'];
                                $TXTDoc = $row['TXTDoc'];
                            }}
                    }
                    } else {
                        $SN_Index = NULL;
                    }                    
                    echo "Date: <input type='date' name='Caldate' value='" . date('Y-m-d') . "'><br><br>";
                    echo "Customer: <input type='text' name='Customer' value='$Customer'><br><br>";
                    echo "Humidity(%): <input type='text' name='Humidity' value='$Humidity'><br><br>";
                    echo "Temperature(C): <input type='text' name='Temp' value='$Temp'><br><br>";
                
                    echo "NIST Standard: <SELECT name='NIST_Idx'>";
                    echo "<OPTION VALUE=$Nist_Idx>$Nist_Name</option>"; 
                        $sql = "SELECT NIST_Idx, NIST_Name FROM nist_pd_std";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='".$row['NIST_Idx']."'>".$row['NIST_Name']."</option>";
                            }
                        } 
                echo "</SELECT><br><br>"; 

                echo "Calibration System: <SELECT name='Sys_Idx'>";
                    echo "<OPTION VALUE=$Meas_Idx>$Meas_SN - $System_Model</option>"; 
                        $sql = "SELECT Meas_Idx, System_Model, Meas_SN FROM meas_sys";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='".$row['Meas_Idx']."'>".$row['Meas_SN']." - ".$row['System_Model']."</option>";
                            }
                        } 
                echo "</SELECT><br><br>"; 

                echo "<table>";
                    echo "<tr>";
                        echo "<th><CENTER>Please Select PDF Cal Cert</center></th>";
                        echo "<th><CENTER>Please Select TXT Cal Cert</center></th>";
                 
                    echo "</tr>";
                    
                    echo "<tr>";
                        echo "<td>The current PDF File is: <input name='pdf_name' type='text' value='$PDFDoc' disabled></td>";
                        echo "<td>The current TXT File is: <input name='txt_name' type='text' value='$TXTDoc' disabled></td>";
                    echo "</tr>";
                    
                    echo "<tr>";
                        echo "<td><input name=\"MAX_FILE_SIZE\" value=\"10000000\" type=\"hidden\"><input name=\"pdf\" type=\"file\"></td>";
                        echo "<td><input name=\"MAX_FILE_SIZE\" value=\"1000000\" type=\"hidden\"><input name=\"txt\" type=\"file\"></td>";
                    echo "</tr>";
                echo "</table>";
                
                if(is_null($SN_Index)){
                    echo "<input type='submit' name='nav_btn' value='Create Report'>";
                }else{
                    echo "<input type='submit' name='nav_btn' value='Update Report'>";
                }
        break;

        case 'Find Ge PD':
            $PD = $_POST['GePD'];
                    $sql = "SELECT PD_Index FROM pd_main WHERE PD_SN = '$PD'";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        $result1 = $row['PD_Index'];
                        $SN_Index = $result1;
                            $testsql = "SELECT Main.PD_SN,
                                            Main.PD_Customer,
                                            Cal.Cal_Index,
                                            Cal.Temp,
                                            Cal.NIST_Idx,
                                            Cal.Humidity,
                                            NIST.Nist_Name,
                                            Meas.Meas_Idx,
                                            Meas.Meas_SN,
                                            Meas.System_Model,
                                            Meas.Cal_Date,
                                            Cal.pd_Type,
                                            Type_1.Type,
                                            docPDF.Doc_Name PDFDoc,
                                            docTXT.Doc_Name TXTDoc
                                        FROM pd_main Main
                                            INNER JOIN pd_cal Cal
                                            ON Main.PD_Index = Cal.SN_Index 
                                            INNER JOIN nist_pd_std NIST
                                            ON Cal.NIST_Idx = NIST.NIST_Idx
                                            INNER JOIN meas_sys Meas
                                            ON Cal.Meas_Idx = Meas.Meas_Idx
                                            Inner JOIN pd_type Type_1
                                            ON Cal.PD_Type = Type_1.pdType_Idx
                                            Left Join documents docPDF
                                            ON Cal.PDcalPDF_Idx = docPDF.Doc_Index
                                            Left Join documents docTXT
                                            ON Cal.PDcalTXT_Idx = docTXT.Doc_Index
                                        WHERE PD_SN = '$PD'";
                            $TestData = mysqli_query($conn, $testsql); 
                            if(mysqli_num_rows($TestData) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($TestData)) {
                                $PD_SN = $row['PD_SN'];
                                $Customer = $row['PD_Customer'];
                                $Cal_Idx = $row['Cal_Idx'];
                                $Temp = $row['Temp'];
                                $Humidity = $row['Humidity'];
                                $Nist_Name = $row['Nist_Name'];
                                $Nist_Idx = $row['Nist_Idx'];
                                $Meas_Idx = $row['Meas_Idx'];
                                $Meas_SN = $row['Meas_SN'];
                                $System_Model = $row['System_Model'];
                                $Cal_Date = $row['Cal_Date'];
                                $PD_Type = $row['PD_Type'];
                                $Type = $row['Type'];
                                $PDFDoc = $row['PDFDoc'];
                                $TXTDoc = $row['TXTDoc'];
                            }}
                    }
                    } else {
                        $SN_Index = NULL;
                    }                    
                    echo "Date: <input type='date' name='Caldate' value='" . date('Y-m-d') . "'><br><br>";
                    echo "Customer: <input type='text' name='Customer' value='$Customer'><br><br>";
                    echo "Humidity(%): <input type='text' name='Humidity' value='$Humidity'><br><br>";
                    echo "Temperature(C): <input type='text' name='Temp' value='$Temp'><br><br>";
                
                    echo "NIST Standard: <SELECT name='NIST_Idx'>";
                    echo "<OPTION VALUE=$Nist_Idx>$Nist_Name</option>"; 
                        $sql = "SELECT NIST_Idx, NIST_Name FROM nist_pd_std";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='".$row['NIST_Idx']."'>".$row['NIST_Name']."</option>";
                            }
                        } 
                echo "</SELECT><br><br>"; 

                echo "Calibration System: <SELECT name='Sys_Idx'>";
                    echo "<OPTION VALUE=$Meas_Idx>$Meas_SN - $System_Model</option>"; 
                        $sql = "SELECT Meas_Idx, System_Model, Meas_SN FROM meas_sys";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='".$row['Meas_Idx']."'>".$row['Meas_SN']." - ".$row['System_Model']."</option>";
                            }
                        } 
                echo "</SELECT><br><br>"; 

                echo "<table>";
                    echo "<tr>";
                        echo "<th><CENTER>Please Select PDF Cal Cert</center></th>";
                        echo "<th><CENTER>Please Select TXT Cal Cert</center></th>";
                 
                    echo "</tr>";
                    
                    echo "<tr>";
                        echo "<td>The current PDF File is: <input name='pdf_name' type='text' value='$PDFDoc' disabled></td>";
                        echo "<td>The current TXT File is: <input name='txt_name' type='text' value='$TXTDoc' disabled></td>";
                    echo "</tr>";
                    
                    echo "<tr>";
                        echo "<td><input name=\"MAX_FILE_SIZE\" value=\"100000000\" type=\"hidden\"><input name=\"pdf\" type=\"file\"></td>";
                        echo "<td><input name=\"MAX_FILE_SIZE\" value=\"1000000\" type=\"hidden\"><input name=\"txt\" type=\"file\"></td>";
                    echo "</tr>";
                echo "</table>";
                
                if(is_null($SN_Index)){
                    echo "<input type='submit' name='nav_btn' value='Create Report'>";
                }else{
                    echo "<input type='submit' name='nav_btn' value='Update Report'>";
                }
        break;
        }
        }
        if(empty($_POST['nav_btn'])){

        }
    ?>
        </form>
</div>


<?php
switch($_POST['nav_btn']){//if the submit button is clicked
  case '':
  break;

  case 'Update Request': 
    break;

  case 'Create Report':
    $Date = $_POST['Caldate'];
    $Customer = $_POST['Customer'];
    $Humidity = $_POST['Humidity'];
    $Temp = $_POST['Temp'];
    $NIST_Idx = $_POST['NIST_Idx'];
    $Sys_Idx = $_POST['Sys_Idx'];
    $Fmt_Date = strtotime(str_replace('/', '-', $Date));
    $Cal_Num = $_POST['Cal_Num'];
    $PD_Num = $_POST['PD_Number'];
    $pdf = $_FILES['pdf'];
    $SiGe = $_POST['SiGe'];

$ins_Query1 = "Insert Into pd_main (PD_SN, PD_Customer) values ('$PD_Num', '$Customer')";

$FindCalQ = "Select PD_Index From pd_main Where PD_SN = $PD_Num";
$ResFindCalQ = mysqli_query($conn, $FindCalQ);

                        if (mysqli_num_rows($ResFindCalQ) > 0) {
                        // output data of each row
                            while($row = mysqli_fetch_assoc($ResFindCalQ)) {
                                $PD_Index = $row['PD_Index'];
                            }                           
                        } else {
                            
                        $maxSN_idx = "Select MAX(PD_Index) PD_Index From pd_main";
                        $ResFindCalQ = mysqli_query($conn, $maxSN_idx);
                        if (mysqli_num_rows($ResFindCalQ) > 0) {
                        // output data of each row
                            while($row = mysqli_fetch_assoc($ResFindCalQ)) {
                                $PD_Index = $row['PD_Index'];
                            }
                        }
                        }

$ins_Query2 = "Insert Into pd_cal (SN_Index, PD_Type, NIST_Idx, Temp, Humidity, Meas_Idx) values ($PD_Index, $SiGe, $NIST_Idx, $Temp, $Humidity, $Sys_Idx)";

echo "<SCRIPT>alert(\"$ins_Query1 $ins_Query2\");</SCRIPT>";

@mysqli_query($conn, $ins_Query1) or die("Query1 Failure");
@mysqli_query($conn, $ins_Query2) or die("Query2 Failure");

    break;

}

        include ("Includes/footer.php");

?>