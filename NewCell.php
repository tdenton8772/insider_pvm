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
           $query = "SELECT SN_Index FROM sn_main ORDER BY SN_Index ASC";
           $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $result1 = $row['SN_Index'];
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
            $Rpt_Num = $_POST['Rpt_Num'];
            $Tab_Number = 1;
            $sql = "Select Main.SN_Index,
                Main.SN,
                Size.Size_Name,
                Material.Material_Name,
                Window.Window_Name,
                Temp.Temp_Name,
                Connector.Connector_Name,
                Cal.Calibration_Name,
                Custom.Custom_Name,
                Main.Man_Date,
                Main.Other_Features,
                DOMA39.QE_Cal_FN,
                DOMA39.Ref_Cell_QE_FN,
                DOMA39.STD_RefCell_ID,
                DOMA39.Cal_Val,
                DOMA39.Cal_Ver_FN,
                Data.Tab_Index,
                Data.Test_FN,
                Data.Test_C,
                Data.Test_VOC,
                Data.Test_Isc,
                Data.Test_FF,
                Data.Test_Pmax,
                Data.Test_Eff


            From sn_main Main
                Join doma_039 DOMA39
                ON Main.sn_index = DOMA39.sn_Index

                Join test_data Data 
                ON DOMA39.039_Index = Data.test_Index

                Join pn_size Size
                ON Main.PN_Size = Size.Size_Index

                Join pn_material Material
                On Main.PN_Material = Material.Material_Index

                Join pn_window Window
                ON Main.PN_Window = Window.Window_Index

                Join pn_temp Temp
                ON Main.PN_Temp = Temp.Temp_Index

                Join pn_connector Connector
                ON Main.PN_Connector = Connector.Connector_Index

                Join pn_calibration Cal
                ON Main.PN_Cal = Cal.Calibration_Index

                Join pn_custom Custom
                ON Main.PN_Custom = Custom.Custom_Index

            Where Main.sn_Index = $Rpt_Num
            And Data.Tab_Index = $Tab_Number";
                
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $SN_Index = $row['SN_Index'];
                $SN = $row['SN'];
                $Size = $row['Size_Name'];
                $Material = $row['Material_Name'];
                $Window = $row['Window_Name'];
                $Temp = $row['Temp_Name'];
                $Connector = $row['Connector_Name'];
                $Calibration = $row['Calibration_Name'];
                $Custom = $row['Custom_Name'];
                $Man_Date = $row['Man_Date'];
                $Other = $row['Other_Features'];
                $QE_Cal_FN = $row['QE_Cal_FN'];
                $Ref_Cell_QE_FN = $row['Ref_Cell_QE_FN'];
                $STD_RefCell_ID = $row['STD_RefCell_ID'];
                $Cal_Val = $row['Cal_Val'];
                $Cal_Ver_FN = $row['Cal_Ver_FN'];
                $Tab_Index = $row['Tab_Index'];
                $Test_FN_1 = $row['Test_FN'];
                $Test_C_1 = $row['Test_C'];
                $Test_VOC_1 = $row['Test_VOC'];
                $Test_Isc_1 = $row['Test_Isc'];
                $Test_FF_1 = $row['Test_FF'];
                $Test_Pmax_1 = $row['Test_Pmax'];
                $Test_Eff_1 = $row['Test_Eff'];
            }    
                
             $Tab_Number = 2;
             $sql = "Select Data.Tab_Index,
                Data.Test_FN,
                Data.Test_C,
                Data.Test_VOC,
                Data.Test_Isc,
                Data.Test_FF,
                Data.Test_Pmax,
                Data.Test_Eff


            From sn_main Main
                Join doma_039 DOMA39
                ON Main.sn_Index = DOMA39.sn_Index

                Join test_data Data 
                ON DOMA39.039_Index = Data.test_Index

                Join pn_size Size
                ON Main.PN_Size = Size.Size_Index

                Join pn_material Material
                On Main.PN_Material = Material.Material_Index

                Join pn_window Window
                ON Main.PN_Window = Window.Window_Index

                Join pn_temp Temp
                ON Main.PN_Temp = Temp.Temp_Index

                Join pn_connector Connector
                ON Main.PN_Connector = Connector.Connector_Index

                Join pn_calibration Cal
                ON Main.PN_Cal = Cal.Calibration_Index

                Join pn_custom Custom
                ON Main.PN_Custom = Custom.Custom_Index

            Where Main.SN_Index = $Rpt_Num
                And Data.Tab_Index = $Tab_Number";
                $result2 = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result2) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result2)) {
                $Tab_Index = $row['Tab_Index'];
                $Test_FN_2 = $row['Test_FN'];
                $Test_C_2 = $row['Test_C'];
                $Test_VOC_2 = $row['Test_VOC'];
                $Test_Isc_2 = $row['Test_Isc'];
                $Test_FF_2 = $row['Test_FF'];
                $Test_Pmax_2 = $row['Test_Pmax'];
                $Test_Eff_2 = $row['Test_Eff'];
            }

            $Tab_Number = 3;
            $sql = "Select Data.Tab_Index,
                Data.Test_FN,
                Data.Test_C,
                Data.Test_VOC,
                Data.Test_Isc,
                Data.Test_FF,
                Data.Test_Pmax,
                Data.Test_Eff


            From sn_main Main
                Join doma_039 DOMA39
                ON Main.sn_Index = DOMA39.sn_Index

                Join test_data Data 
                ON DOMA39.039_Index = Data.test_Index

                Join pn_size Size
                ON Main.PN_Size = Size.Size_Index

                Join pn_material Material
                On Main.PN_Material = Material.Material_Index

                Join pn_window Window
                ON Main.PN_Window = Window.Window_Index

                Join pn_temp Temp
                ON Main.PN_Temp = Temp.Temp_Index

                Join pn_connector Connector
                ON Main.PN_Connector = Connector.Connector_Index

                Join pn_calibration Cal
                ON Main.PN_Cal = Cal.Calibration_Index

                Join pn_custom Custom
                ON Main.PN_Custom = Custom.Custom_Index

            Where Main.SN_Index = $Rpt_Num
                And Data.Tab_Index = $Tab_Number";
                $result3 = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result3) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result3)) {
                $Tab_Index = $row['Tab_Index'];
                $Test_FN_3 = $row['Test_FN'];
                $Test_C_3 = $row['Test_C'];
                $Test_VOC_3 = $row['Test_VOC'];
                $Test_Isc_3 = $row['Test_Isc'];
                $Test_FF_3 = $row['Test_FF'];
                $Test_Pmax_3 = $row['Test_Pmax'];
                $Test_Eff_3 = $row['Test_Eff'];
            }
            $Tab_Number = 4;
            $sql = "Select Data.Tab_Index,
                Data.Test_FN,
                Data.Test_C,
                Data.Test_VOC,
                Data.Test_Isc,
                Data.Test_FF,
                Data.Test_Pmax,
                Data.Test_Eff


            From sn_main Main
                Join doma_039 DOMA39
                ON Main.sn_Index = DOMA39.sn_Index

                Join test_data Data 
                ON DOMA39.039_Index = Data.test_Index

                Join pn_size Size
                ON Main.PN_Size = Size.Size_Index

                Join pn_material Material
                On Main.PN_Material = Material.Material_Index

                Join pn_window Window
                ON Main.PN_Window = Window.Window_Index

                Join pn_temp Temp
                ON Main.PN_Temp = Temp.Temp_Index

                Join pn_connector Connector
                ON Main.PN_Connector = Connector.Connector_Index

                Join pn_calibration Cal
                ON Main.PN_Cal = Cal.Calibration_Index

                Join pn_custom Custom
                ON Main.PN_Custom = Custom.Custom_Index

            Where Main.SN_Index = $Rpt_Num
                And Data.Tab_Index = $Tab_Number";
                $result4 = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result4) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result4)) {
                $Tab_Index = $row['Tab_Index'];
                $Test_FN_4 = $row['Test_FN'];
                $Test_C_4 = $row['Test_C'];
                $Test_VOC_4 = $row['Test_VOC'];
                $Test_Isc_4 = $row['Test_Isc'];
                $Test_FF_4 = $row['Test_FF'];
                $Test_Pmax_4 = $row['Test_Pmax'];
                $Test_Eff_4 = $row['Test_Eff'];
            }
            $Tab_Number = 5;
            $sql = "Select Data.Tab_Index,
                Data.Test_FN,
                Data.Test_C,
                Data.Test_VOC,
                Data.Test_Isc,
                Data.Test_FF,
                Data.Test_Pmax,
                Data.Test_Eff


            From sn_main Main
                Join doma_039 DOMA39
                ON Main.sn_Index = DOMA39.sn_Index

                Join test_data Data 
                ON DOMA39.039_Index = Data.test_Index

                Join pn_size Size
                ON Main.PN_Size = Size.Size_Index

                Join pn_material Material
                On Main.PN_Material = Material.Material_Index

                Join pn_window Window
                ON Main.PN_Window = Window.Window_Index

                Join pn_temp Temp
                ON Main.PN_Temp = Temp.Temp_Index

                Join pn_connector Connector
                ON Main.PN_Connector = Connector.Connector_Index

                Join pn_calibration Cal
                ON Main.PN_Cal = Cal.Calibration_Index

                Join pn_custom Custom
                ON Main.PN_Custom = Custom.Custom_Index

            Where Main.SN_Index = $Rpt_Num
                And Data.Tab_Index = $Tab_Number";
                $result5 = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result5) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result5)) {
                $Tab_Index = $row['Tab_Index'];
                $Test_FN_5 = $row['Test_FN'];
                $Test_C_5 = $row['Test_C'];
                $Test_VOC_5 = $row['Test_VOC'];
                $Test_Isc_5 = $row['Test_Isc'];
                $Test_FF_5 = $row['Test_FF'];
                $Test_Pmax_5 = $row['Test_Pmax'];
                $Test_Eff_5 = $row['Test_Eff'];
            }
            
            $Tab_Number = 6;
            $sql = "Select Data.Tab_Index,
                Data.Test_FN,
                Data.Test_C,
                Data.Test_VOC,
                Data.Test_Isc,
                Data.Test_FF,
                Data.Test_Pmax,
                Data.Test_Eff


            From sn_main Main
                Join doma_039 DOMA39
                ON Main.sn_Index = DOMA39.sn_Index

                Join test_data Data 
                ON DOMA39.039_Index = Data.test_Index

                Join pn_size Size
                ON Main.PN_Size = Size.Size_Index

                Join pn_material Material
                On Main.PN_Material = Material.Material_Index

                Join pn_window Window
                ON Main.PN_Window = Window.Window_Index

                Join pn_temp Temp
                ON Main.PN_Temp = Temp.Temp_Index

                Join pn_connector Connector
                ON Main.PN_Connector = Connector.Connector_Index

                Join pn_calibration Cal
                ON Main.PN_Cal = Cal.Calibration_Index

                Join pn_custom Custom
                ON Main.PN_Custom = Custom.Custom_Index

            Where Main.SN_Index = $Rpt_Num
                And Data.Tab_Index = $Tab_Number";
                $result6 = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result6) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result6)) {
                $Tab_Index = $row['Tab_Index'];
                $Test_FN_6 = $row['Test_FN'];
                $Test_C_6 = $row['Test_C'];
                $Test_VOC_6 = $row['Test_VOC'];
                $Test_Isc_6 = $row['Test_Isc'];
                $Test_FF_6 = $row['Test_FF'];
                $Test_Pmax_6 = $row['Test_Pmax'];
                $Test_Eff_6 = $row['Test_Eff'];
            }
           
            $Tab_Number = 7;
            $sql = "Select Data.Tab_Index,
                Data.Test_FN,
                Data.Test_C,
                Data.Test_VOC,
                Data.Test_Isc,
                Data.Test_FF,
                Data.Test_Pmax,
                Data.Test_Eff


            From sn_main Main
                Join doma_039 DOMA39
                ON Main.sn_Index = DOMA39.sn_Index

                Join test_data Data 
                ON DOMA39.039_Index = Data.test_Index

                Join pn_size Size
                ON Main.PN_Size = Size.Size_Index

                Join pn_material Material
                On Main.PN_Material = Material.Material_Index

                Join pn_window Window
                ON Main.PN_Window = Window.Window_Index

                Join pn_temp Temp
                ON Main.PN_Temp = Temp.Temp_Index

                Join pn_connector Connector
                ON Main.PN_Connector = Connector.Connector_Index

                Join pn_calibration Cal
                ON Main.PN_Cal = Cal.Calibration_Index

                Join pn_custom Custom
                ON Main.PN_Custom = Custom.Custom_Index

            Where Main.SN_Index = $Rpt_Num
                And Data.Tab_Index = $Tab_Number";
                $result7 = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result7) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result7)) {
                $Tab_Index = $row['Tab_Index'];
                $Test_FN_7 = $row['Test_FN'];
                $Test_C_7 = $row['Test_C'];
                $Test_VOC_7 = $row['Test_VOC'];
                $Test_Isc_7 = $row['Test_Isc'];
                $Test_FF_7 = $row['Test_FF'];
                $Test_Pmax_7 = $row['Test_Pmax'];
                $Test_Eff_7 = $row['Test_Eff'];
            }
            $Tab_Number = 8;
            $sql = "Select Data.Tab_Index,
                Data.Test_FN,
                Data.Test_C,
                Data.Test_VOC,
                Data.Test_Isc,
                Data.Test_FF,
                Data.Test_Pmax,
                Data.Test_Eff


            From sn_main Main
                Join doma_039 DOMA39
                ON Main.sn_Index = DOMA39.sn_Index

                Join test_data Data 
                ON DOMA39.039_Index = Data.test_Index

                Join pn_size Size
                ON Main.PN_Size = Size.Size_Index

                Join pn_material Material
                On Main.PN_Material = Material.Material_Index

                Join pn_window Window
                ON Main.PN_Window = Window.Window_Index

                Join pn_temp Temp
                ON Main.PN_Temp = Temp.Temp_Index

                Join pn_connector Connector
                ON Main.PN_Connector = Connector.Connector_Index

                Join pn_calibration Cal
                ON Main.PN_Cal = Cal.Calibration_Index

                Join pn_custom Custom
                ON Main.PN_Custom = Custom.Custom_Index

            Where Main.SN_Index = $Rpt_Num
                And Data.Tab_Index = $Tab_Number";
                $result8 = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result8) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result8)) {
                $Tab_Index = $row['Tab_Index'];
                $Test_FN_8 = $row['Test_FN'];
                $Test_C_8 = $row['Test_C'];
                $Test_VOC_8 = $row['Test_VOC'];
                $Test_Isc_8 = $row['Test_Isc'];
                $Test_FF_8 = $row['Test_FF'];
                $Test_Pmax_8 = $row['Test_Pmax'];
                $Test_Eff_8 = $row['Test_Eff'];
            }
            }
            }
            }
            }
            }
            }
            }
            $Tab_Number = 9;
            $sql = "Select Data.Tab_Index,
                Data.Test_FN,
                Data.Test_C,
                Data.Test_VOC,
                Data.Test_Isc,
                Data.Test_FF,
                Data.Test_Pmax,
                Data.Test_Eff,
                Data.Test_Size

            From sn_main Main
                Join doma_039 DOMA39
                ON Main.sn_Index = DOMA39.sn_Index

                Join test_data Data 
                ON DOMA39.039_Index = Data.test_Index

                Join pn_size Size
                ON Main.PN_Size = Size.Size_Index

                Join pn_material Material
                On Main.PN_Material = Material.Material_Index

                Join pn_window Window
                ON Main.PN_Window = Window.Window_Index

                Join pn_temp Temp
                ON Main.PN_Temp = Temp.Temp_Index

                Join pn_connector Connector
                ON Main.PN_Connector = Connector.Connector_Index

                Join pn_calibration Cal
                ON Main.PN_Cal = Cal.Calibration_Index

                Join pn_custom Custom
                ON Main.PN_Custom = Custom.Custom_Index

            Where Main.SN_Index = $Rpt_Num
                And Data.Tab_Index = $Tab_Number";
                $result9 = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result9) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result9)) {
                $Tab_Index = $row['Tab_Index'];
                $Test_FN_9 = $row['Test_FN'];
                $Test_C_9 = $row['Test_C'];
                $Test_VOC_9 = $row['Test_VOC'];
                $Test_Isc_9 = $row['Test_Isc'];
                $Test_FF_9 = $row['Test_FF'];
                $Test_Pmax_9 = $row['Test_Pmax'];
                $Test_Eff_9 = $row['Test_Eff'];
                $Test_Size_9 = $row['Test_Size'];
            }
            }
            } else {
            }

            echo "Reference Cell ID: PVM<input type='text' name='SN' size='2' class='HeavyTextBox' value=$SN><br><br>";
            echo "PVMRC-";
            
            echo "<input type=text size = 5 disabled=true value=$Size>-";
            echo "<input type=text size = 5 disabled=true value=$Material>-";
            echo "<input type=text size = 5 disabled=true value=$Window>-";
            echo "<input type=text size = 5 disabled=true value=$Temp>-";
            echo "<input type=text size = 5 disabled=true value=$Connector>-";
            echo "<input type=text size = 5 disabled=true value=$Calibration>-";
            echo "<input type=text size = 5 disabled=true value=$Custom><br><br>";

echo "Other Features: <textarea cols='40' rows='5' style='width:400px; height:50px;' name='Other_Feat' class='HeavyTextBox'>$Other</textarea><br><br>";
echo "Manufacture Date: <input type='date' name='Man_Date' size='30' class='HeavyTextBox' value='" . date('Y-m-d') . "'<br><br>";
echo "<hr>";
echo "Std. Photodiode Cal QE Filename: <input type='text' name='QE_Cal_FN' size='40' class='HeavyTextBox' value=\"$QE_Cal_FN\"><br><br>";

echo "RefCell QE Filename: <input type='text' name='RefCell_Cal_FN' size='35' class='HeavyTextBox' value=\"$Ref_Cell_QE_FN\"><br><br>";

echo "PVM RefCell ID: <input type='text' name='PVM_Std_RefCell_ID' size='20' class='HeavyTextBox' value=$STD_RefCell_ID> &#160 Calibration Value(Isc): <input type='text' name='Cal_Isc' size='5' class='HeavyTextBox' value=$Cal_Val><br><br>";

echo "Calibration Verification Filename: <input type='text' name='CalVerFN' size='40' class='HeavyTextBox' value=\"$Cal_Ver_FN\"><br><br>";
echo "<hr>";
echo "Date of IV Measurement: <input type='date' name='CalDate' class='HeavyTextBox' value='" . date('Y-m-d') . "'<br><br>";

echo "<table>";
       echo "<tr class='Cal'>";
            echo "<th style='width:60%'><u>File Name</u></th>";
            echo "<th><u>Temp (C)</u></th>";
            echo "<th><u>VOC (V)</u></th>";
            echo "<th><u>Isc (mA)</u></th>";
            echo "<th><u>FF (%)</u></th>";
            echo "<th><u>Pmax</u></th>";
            echo "<th><u>Eff</u></th>";
       echo "</tr>";
        
        echo "<tr class='alt'>";
            echo "<td><input type='text' name='FN_1' size='40' style='font-size: 8pt' class='defaultTextBox' value=$Test_FN_1></td>";
            echo "<td><input type='text' name='Temp_1' size='3' class='defaultTextBox' value=$Test_C_1></td>";
            echo "<td><input type='text' name='VOC_1' size='3' class='defaultTextBox' value=$Test_VOC_1></td>";
            echo "<td><input type='text' name='ISC_1' size='3' class='defaultTextBox' value=$Test_Isc_1></td>";
            echo "<td><input type='text' name='FF_1' size='3' class='defaultTextBox' value=$Test_FF_1></td>";
            echo "<td><input type='text' name='Pmax_1' size='3' class='defaultTextBox' value=$Test_Pmax_1></td>";
            echo "<td><input type='text' name='Eff_1' size='3' class='defaultTextBox' value=$Test_Eff_1></td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td><input type='text' name='FN_2' size='40' style='font-size: 8pt' class='defaultTextBox' value=$Test_FN_2></td>";
            echo "<td><input type='text' name='Temp_2' size='3' class='defaultTextBox' value=$Test_C_2></td>";
            echo "<td><input type='text' name='VOC_2' size='3' class='defaultTextBox' value=$Test_VOC_2></td>";
            echo "<td><input type='text' name='ISC_2' size='3' class='defaultTextBox' value=$Test_Isc_2></td>";
            echo "<td><input type='text' name='FF_2' size='3' class='defaultTextBox' value=$Test_FF_2></td>";
            echo "<td><input type='text' name='Pmax_2' size='3' class='defaultTextBox' value=$Test_Pmax_2></td>";
            echo "<td><input type='text' name='Eff_2' size='3' class='defaultTextBox' value=$Test_Eff_2></td>";
        echo "</tr>";

        echo "<tr class='alt'>";
            echo "<td><input type='text' name='FN_3' size='40' style='font-size: 8pt' class='defaultTextBox' value=$Test_FN_3></td>";
            echo "<td><input type='text' name='Temp_3' size='3' class='defaultTextBox' value=$Test_C_3></td>";
            echo "<td><input type='text' name='VOC_3' size='3' class='defaultTextBox' value=$Test_VOC_3></td>";
            echo "<td><input type='text' name='ISC_3' size='3' class='defaultTextBox' value=$Test_Isc_3></td>";
            echo "<td><input type='text' name='FF_3' size='3' class='defaultTextBox' value=$Test_FF_3></td>";
            echo "<td><input type='text' name='Pmax_3' size='3' class='defaultTextBox' value=$Test_Pmax_3></td>";
            echo "<td><input type='text' name='Eff_3' size='3' class='defaultTextBox' value=$Test_Eff_3></td>";
        echo "</tr>";

        echo "<tr class=''>";
            echo "<td><input type='text' name='FN_4' size='40' style='font-size: 8pt' class='defaultTextBox' value=$Test_FN_4></td>";
            echo "<td><input type='text' name='Temp_4' size='3' class='defaultTextBox' value=$Test_C_4></td>";
            echo "<td><input type='text' name='VOC_4' size='3' class='defaultTextBox' value=$Test_VOC_4></td>";
            echo "<td><input type='text' name='ISC_4' size='3' class='defaultTextBox' value=$Test_Isc_4></td>";
            echo "<td><input type='text' name='FF_4' size='3' class='defaultTextBox' value=$Test_FF_4></td>";
            echo "<td><input type='text' name='Pmax_4' size='3' class='defaultTextBox' value=$Test_Pmax_4></td>";
            echo "<td><input type='text' name='Eff_4' size='3' class='defaultTextBox' value=$Test_Eff_4></td>";
        echo "</tr>";

        echo "<tr class='alt'>";
            echo "<td><input type='text' name='FN_5' size='40' style='font-size: 8pt' class='defaultTextBox' value=$Test_FN_5></td>";
            echo "<td><input type='text' name='Temp_5' size='3' class='defaultTextBox' value=$Test_C_5></td>";
            echo "<td><input type='text' name='VOC_5' size='3' class='defaultTextBox' value=$Test_VOC_5></td>";
            echo "<td><input type='text' name='ISC_5' size='3' class='defaultTextBox' value=$Test_Isc_5></td>";
            echo "<td><input type='text' name='FF_5' size='3' class='defaultTextBox' value=$Test_FF_5></td>";
            echo "<td><input type='text' name='Pmax_5' size='3' class='defaultTextBox' value=$Test_Pmax_5></td>";
            echo "<td><input type='text' name='Eff_5' size='3' class='defaultTextBox' value=$Test_Eff_5></td>";
        echo "</tr>";

        echo "<tr class=''>";
            echo "<td><input type='text' name='FN_6' size='40' style='font-size: 8pt' class='defaultTextBox' value=$Test_FN_6></td>";
            echo "<td><input type='text' name='Temp_6' size='3' class='defaultTextBox' value=$Test_C_6></td>";
            echo "<td><input type='text' name='VOC_6' size='3' class='defaultTextBox' value=$Test_VOC_6></td>";
            echo "<td><input type='text' name='ISC_6' size='3' class='defaultTextBox' value=$Test_Isc_6></td>";
            echo "<td><input type='text' name='FF_6' size='3' class='defaultTextBox' value=$Test_FF_6></td>";
            echo "<td><input type='text' name='Pmax_6' size='3' class='defaultTextBox' value=$Test_Pmax_6></td>";
            echo "<td><input type='text' name='Eff_6' size='3' class='defaultTextBox' value=$Test_Eff_6></td>";
        echo "</tr>";

        echo "<tr class='alt'>";
            echo "<td><input type='text' name='FN_7' size='40' style='font-size: 8pt' class='defaultTextBox' value=$Test_FN_7></td>";
            echo "<td><input type='text' name='Temp_7' size='3' class='defaultTextBox' value=$Test_C_7></td>";
            echo "<td><input type='text' name='VOC_7' size='3' class='defaultTextBox' value=$Test_VOC_7></td>";
            echo "<td><input type='text' name='ISC_7' size='3' class='defaultTextBox' value=$Test_Isc_7></td>";
            echo "<td><input type='text' name='FF_7' size='3' class='defaultTextBox' value=$Test_FF_7></td>";
            echo "<td><input type='text' name='Pmax_7' size='3' class='defaultTextBox' value=$Test_Pmax_7></td>";
            echo "<td><input type='text' name='Eff_7' size='3' class='defaultTextBox' value=$Test_Eff_7></td>";
        echo "</tr>";

        echo "<tr class=''>";
            echo "<td><input type='text' name='FN_8' size='40' style='font-size: 8pt' class='defaultTextBox' value=$Test_FN_8></td>";
            echo "<td><input type='text' name='Temp_8' size='3' class='defaultTextBox' value=$Test_C_8></td>";
            echo "<td><input type='text' name='VOC_8' size='3' class='defaultTextBox' value=$Test_VOC_8></td>";
            echo "<td><input type='text' name='ISC_8' size='3' class='defaultTextBox' value=$Test_Isc_8></td>";
            echo "<td><input type='text' name='FF_8' size='3' class='defaultTextBox' value=$Test_FF_8></td>";
            echo "<td><input type='text' name='Pmax_8' size='3' class='defaultTextBox' value=$Test_Pmax_8></td>";
            echo "<td><input type='text' name='Eff_8' size='3' class='defaultTextBox' value=$Test_Eff_8></td>";
        echo "</tr>";
echo "</table>";
    echo "<br>";
echo "<h3>Outside Laboratry Calibration Measurements</h3>";
echo "<table>";
       echo "<tr class='Cal'>";
            echo "<th style='width:100%'><u>Test Report#</u></th>";
            echo "<th><u>Size (cm2)</u></th>";
            echo "<th><u>Temp (C)</u></th>";
            echo "<th><u>VOC (V)</u></th>";
            echo "<th><u>Isc (mA)</u></th>";
            echo "<th><u>FF (%)</u></th>";
            echo "<th><u>Pmax</u></th>";
            echo "<th><u>Eff</u></th>";
       echo "</tr>";
        
        echo "<tr class='alt'>";
            echo "<td><input type='text' name='FN_O' size='30' style='font-size: 8pt' class='defaultTextBox' value=$Test_FN_9></td>";
            echo "<td><input type='text' name='Size_O' size='3' class='defaultTextBox' value=$Test_Size_9></td>";
            echo "<td><input type='text' name='Temp_O' size='3' class='defaultTextBox' value=$Test_C_9></td>";
            echo "<td><input type='text' name='VOC_O' size='3' class='defaultTextBox' value=$Test_VOC_9></td>";
            echo "<td><input type='text' name='ISC_O' size='3' class='defaultTextBox' value=$Test_Isc_9></td>";
            echo "<td><input type='text' name='FF_O' size='3' class='defaultTextBox' value=$Test_FF_9></td>";
            echo "<td><input type='text' name='Pmax_O' size='3' class='defaultTextBox' value=$Test_Pmax_9></td>";
            echo "<td><input type='text' name='Eff_O' size='3' class='defaultTextBox' value=$Test_Eff_9></td>";
        echo "</tr>";
echo "</table>";
echo "<br>";
echo "<INPUT TYPE='Submit' VALUE='Update Record' NAME='nav_btn'>";
echo "<br>";
         break;
           
        case '<':
            $Rpt_Num = $_POST['Rpt_Num'];
            $Rpt_Num = $Rpt_Num - 1;
            $Tab_Number = 1;
            $sql = "Select Main.SN_Index,
                Main.SN,
                Size.Size_Name,
                Material.Material_Name,
                Window.Window_Name,
                Temp.Temp_Name,
                Connector.Connector_Name,
                Cal.Calibration_Name,
                Custom.Custom_Name,
                Main.Man_Date,
                Main.Other_Features,
                DOMA39.QE_Cal_FN,
                DOMA39.Ref_Cell_QE_FN,
                DOMA39.STD_RefCell_ID,
                DOMA39.Cal_Val,
                DOMA39.Cal_Ver_FN,
                Data.Tab_Index,
                Data.Test_FN,
                Data.Test_C,
                Data.Test_VOC,
                Data.Test_Isc,
                Data.Test_FF,
                Data.Test_Pmax,
                Data.Test_Eff


            From sn_main Main
                Join doma_039 DOMA39
                ON Main.sn_index = DOMA39.sn_Index

                Join test_data Data 
                ON DOMA39.039_Index = Data.test_Index

                Join pn_size Size
                ON Main.PN_Size = Size.Size_Index

                Join pn_material Material
                On Main.PN_Material = Material.Material_Index

                Join pn_window Window
                ON Main.PN_Window = Window.Window_Index

                Join pn_temp Temp
                ON Main.PN_Temp = Temp.Temp_Index

                Join pn_connector Connector
                ON Main.PN_Connector = Connector.Connector_Index

                Join pn_calibration Cal
                ON Main.PN_Cal = Cal.Calibration_Index

                Join pn_custom Custom
                ON Main.PN_Custom = Custom.Custom_Index

            Where Main.sn_Index = $Rpt_Num
            And Data.Tab_Index = $Tab_Number";
                
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $SN_Index = $row['SN_Index'];
                $SN = $row['SN'];
                $Size = $row['Size_Name'];
                $Material = $row['Material_Name'];
                $Window = $row['Window_Name'];
                $Temp = $row['Temp_Name'];
                $Connector = $row['Connector_Name'];
                $Calibration = $row['Calibration_Name'];
                $Custom = $row['Custom_Name'];
                $Man_Date = $row['Man_Date'];
                $Other = $row['Other_Features'];
                $QE_Cal_FN = $row['QE_Cal_FN'];
                $Ref_Cell_QE_FN = $row['Ref_Cell_QE_FN'];
                $STD_RefCell_ID = $row['STD_RefCell_ID'];
                $Cal_Val = $row['Cal_Val'];
                $Cal_Ver_FN = $row['Cal_Ver_FN'];
                $Tab_Index = $row['Tab_Index'];
                $Test_FN_1 = $row['Test_FN'];
                $Test_C_1 = $row['Test_C'];
                $Test_VOC_1 = $row['Test_VOC'];
                $Test_Isc_1 = $row['Test_Isc'];
                $Test_FF_1 = $row['Test_FF'];
                $Test_Pmax_1 = $row['Test_Pmax'];
                $Test_Eff_1 = $row['Test_Eff'];
            }    
                
             $Tab_Number = 2;
             $sql = "Select Data.Tab_Index,
                Data.Test_FN,
                Data.Test_C,
                Data.Test_VOC,
                Data.Test_Isc,
                Data.Test_FF,
                Data.Test_Pmax,
                Data.Test_Eff


            From sn_main Main
                Join doma_039 DOMA39
                ON Main.sn_Index = DOMA39.sn_Index

                Join test_data Data 
                ON DOMA39.039_Index = Data.test_Index

                Join pn_size Size
                ON Main.PN_Size = Size.Size_Index

                Join pn_material Material
                On Main.PN_Material = Material.Material_Index

                Join pn_window Window
                ON Main.PN_Window = Window.Window_Index

                Join pn_temp Temp
                ON Main.PN_Temp = Temp.Temp_Index

                Join pn_connector Connector
                ON Main.PN_Connector = Connector.Connector_Index

                Join pn_calibration Cal
                ON Main.PN_Cal = Cal.Calibration_Index

                Join pn_custom Custom
                ON Main.PN_Custom = Custom.Custom_Index

            Where Main.SN_Index = $Rpt_Num
                And Data.Tab_Index = $Tab_Number";
                $result2 = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result2) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result2)) {
                $Tab_Index = $row['Tab_Index'];
                $Test_FN_2 = $row['Test_FN'];
                $Test_C_2 = $row['Test_C'];
                $Test_VOC_2 = $row['Test_VOC'];
                $Test_Isc_2 = $row['Test_Isc'];
                $Test_FF_2 = $row['Test_FF'];
                $Test_Pmax_2 = $row['Test_Pmax'];
                $Test_Eff_2 = $row['Test_Eff'];
            }

            $Tab_Number = 3;
            $sql = "Select Data.Tab_Index,
                Data.Test_FN,
                Data.Test_C,
                Data.Test_VOC,
                Data.Test_Isc,
                Data.Test_FF,
                Data.Test_Pmax,
                Data.Test_Eff


            From sn_main Main
                Join doma_039 DOMA39
                ON Main.sn_Index = DOMA39.sn_Index

                Join test_data Data 
                ON DOMA39.039_Index = Data.test_Index

                Join pn_size Size
                ON Main.PN_Size = Size.Size_Index

                Join pn_material Material
                On Main.PN_Material = Material.Material_Index

                Join pn_window Window
                ON Main.PN_Window = Window.Window_Index

                Join pn_temp Temp
                ON Main.PN_Temp = Temp.Temp_Index

                Join pn_connector Connector
                ON Main.PN_Connector = Connector.Connector_Index

                Join pn_calibration Cal
                ON Main.PN_Cal = Cal.Calibration_Index

                Join pn_custom Custom
                ON Main.PN_Custom = Custom.Custom_Index

            Where Main.SN_Index = $Rpt_Num
                And Data.Tab_Index = $Tab_Number";
                $result3 = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result3) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result3)) {
                $Tab_Index = $row['Tab_Index'];
                $Test_FN_3 = $row['Test_FN'];
                $Test_C_3 = $row['Test_C'];
                $Test_VOC_3 = $row['Test_VOC'];
                $Test_Isc_3 = $row['Test_Isc'];
                $Test_FF_3 = $row['Test_FF'];
                $Test_Pmax_3 = $row['Test_Pmax'];
                $Test_Eff_3 = $row['Test_Eff'];
            }
            $Tab_Number = 4;
            $sql = "Select Data.Tab_Index,
                Data.Test_FN,
                Data.Test_C,
                Data.Test_VOC,
                Data.Test_Isc,
                Data.Test_FF,
                Data.Test_Pmax,
                Data.Test_Eff


            From sn_main Main
                Join doma_039 DOMA39
                ON Main.sn_Index = DOMA39.sn_Index

                Join test_data Data 
                ON DOMA39.039_Index = Data.test_Index

                Join pn_size Size
                ON Main.PN_Size = Size.Size_Index

                Join pn_material Material
                On Main.PN_Material = Material.Material_Index

                Join pn_window Window
                ON Main.PN_Window = Window.Window_Index

                Join pn_temp Temp
                ON Main.PN_Temp = Temp.Temp_Index

                Join pn_connector Connector
                ON Main.PN_Connector = Connector.Connector_Index

                Join pn_calibration Cal
                ON Main.PN_Cal = Cal.Calibration_Index

                Join pn_custom Custom
                ON Main.PN_Custom = Custom.Custom_Index

            Where Main.SN_Index = $Rpt_Num
                And Data.Tab_Index = $Tab_Number";
                $result4 = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result4) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result4)) {
                $Tab_Index = $row['Tab_Index'];
                $Test_FN_4 = $row['Test_FN'];
                $Test_C_4 = $row['Test_C'];
                $Test_VOC_4 = $row['Test_VOC'];
                $Test_Isc_4 = $row['Test_Isc'];
                $Test_FF_4 = $row['Test_FF'];
                $Test_Pmax_4 = $row['Test_Pmax'];
                $Test_Eff_4 = $row['Test_Eff'];
            }
            $Tab_Number = 5;
            $sql = "Select Data.Tab_Index,
                Data.Test_FN,
                Data.Test_C,
                Data.Test_VOC,
                Data.Test_Isc,
                Data.Test_FF,
                Data.Test_Pmax,
                Data.Test_Eff


            From sn_main Main
                Join doma_039 DOMA39
                ON Main.sn_Index = DOMA39.sn_Index

                Join test_data Data 
                ON DOMA39.039_Index = Data.test_Index

                Join pn_size Size
                ON Main.PN_Size = Size.Size_Index

                Join pn_material Material
                On Main.PN_Material = Material.Material_Index

                Join pn_window Window
                ON Main.PN_Window = Window.Window_Index

                Join pn_temp Temp
                ON Main.PN_Temp = Temp.Temp_Index

                Join pn_connector Connector
                ON Main.PN_Connector = Connector.Connector_Index

                Join pn_calibration Cal
                ON Main.PN_Cal = Cal.Calibration_Index

                Join pn_custom Custom
                ON Main.PN_Custom = Custom.Custom_Index

            Where Main.SN_Index = $Rpt_Num
                And Data.Tab_Index = $Tab_Number";
                $result5 = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result5) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result5)) {
                $Tab_Index = $row['Tab_Index'];
                $Test_FN_5 = $row['Test_FN'];
                $Test_C_5 = $row['Test_C'];
                $Test_VOC_5 = $row['Test_VOC'];
                $Test_Isc_5 = $row['Test_Isc'];
                $Test_FF_5 = $row['Test_FF'];
                $Test_Pmax_5 = $row['Test_Pmax'];
                $Test_Eff_5 = $row['Test_Eff'];
            }
            
            $Tab_Number = 6;
            $sql = "Select Data.Tab_Index,
                Data.Test_FN,
                Data.Test_C,
                Data.Test_VOC,
                Data.Test_Isc,
                Data.Test_FF,
                Data.Test_Pmax,
                Data.Test_Eff


            From sn_main Main
                Join doma_039 DOMA39
                ON Main.sn_Index = DOMA39.sn_Index

                Join test_data Data 
                ON DOMA39.039_Index = Data.test_Index

                Join pn_size Size
                ON Main.PN_Size = Size.Size_Index

                Join pn_material Material
                On Main.PN_Material = Material.Material_Index

                Join pn_window Window
                ON Main.PN_Window = Window.Window_Index

                Join pn_temp Temp
                ON Main.PN_Temp = Temp.Temp_Index

                Join pn_connector Connector
                ON Main.PN_Connector = Connector.Connector_Index

                Join pn_calibration Cal
                ON Main.PN_Cal = Cal.Calibration_Index

                Join pn_custom Custom
                ON Main.PN_Custom = Custom.Custom_Index

            Where Main.SN_Index = $Rpt_Num
                And Data.Tab_Index = $Tab_Number";
                $result6 = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result6) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result6)) {
                $Tab_Index = $row['Tab_Index'];
                $Test_FN_6 = $row['Test_FN'];
                $Test_C_6 = $row['Test_C'];
                $Test_VOC_6 = $row['Test_VOC'];
                $Test_Isc_6 = $row['Test_Isc'];
                $Test_FF_6 = $row['Test_FF'];
                $Test_Pmax_6 = $row['Test_Pmax'];
                $Test_Eff_6 = $row['Test_Eff'];
            }
           
            $Tab_Number = 7;
            $sql = "Select Data.Tab_Index,
                Data.Test_FN,
                Data.Test_C,
                Data.Test_VOC,
                Data.Test_Isc,
                Data.Test_FF,
                Data.Test_Pmax,
                Data.Test_Eff


            From sn_main Main
                Join doma_039 DOMA39
                ON Main.sn_Index = DOMA39.sn_Index

                Join test_data Data 
                ON DOMA39.039_Index = Data.test_Index

                Join pn_size Size
                ON Main.PN_Size = Size.Size_Index

                Join pn_material Material
                On Main.PN_Material = Material.Material_Index

                Join pn_window Window
                ON Main.PN_Window = Window.Window_Index

                Join pn_temp Temp
                ON Main.PN_Temp = Temp.Temp_Index

                Join pn_connector Connector
                ON Main.PN_Connector = Connector.Connector_Index

                Join pn_calibration Cal
                ON Main.PN_Cal = Cal.Calibration_Index

                Join pn_custom Custom
                ON Main.PN_Custom = Custom.Custom_Index

            Where Main.SN_Index = $Rpt_Num
                And Data.Tab_Index = $Tab_Number";
                $result7 = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result7) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result7)) {
                $Tab_Index = $row['Tab_Index'];
                $Test_FN_7 = $row['Test_FN'];
                $Test_C_7 = $row['Test_C'];
                $Test_VOC_7 = $row['Test_VOC'];
                $Test_Isc_7 = $row['Test_Isc'];
                $Test_FF_7 = $row['Test_FF'];
                $Test_Pmax_7 = $row['Test_Pmax'];
                $Test_Eff_7 = $row['Test_Eff'];
            }
            $Tab_Number = 8;
            $sql = "Select Data.Tab_Index,
                Data.Test_FN,
                Data.Test_C,
                Data.Test_VOC,
                Data.Test_Isc,
                Data.Test_FF,
                Data.Test_Pmax,
                Data.Test_Eff


            From sn_main Main
                Join doma_039 DOMA39
                ON Main.sn_Index = DOMA39.sn_Index

                Join test_data Data 
                ON DOMA39.039_Index = Data.test_Index

                Join pn_size Size
                ON Main.PN_Size = Size.Size_Index

                Join pn_material Material
                On Main.PN_Material = Material.Material_Index

                Join pn_window Window
                ON Main.PN_Window = Window.Window_Index

                Join pn_temp Temp
                ON Main.PN_Temp = Temp.Temp_Index

                Join pn_connector Connector
                ON Main.PN_Connector = Connector.Connector_Index

                Join pn_calibration Cal
                ON Main.PN_Cal = Cal.Calibration_Index

                Join pn_custom Custom
                ON Main.PN_Custom = Custom.Custom_Index

            Where Main.SN_Index = $Rpt_Num
                And Data.Tab_Index = $Tab_Number";
                $result8 = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result8) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result8)) {
                $Tab_Index = $row['Tab_Index'];
                $Test_FN_8 = $row['Test_FN'];
                $Test_C_8 = $row['Test_C'];
                $Test_VOC_8 = $row['Test_VOC'];
                $Test_Isc_8 = $row['Test_Isc'];
                $Test_FF_8 = $row['Test_FF'];
                $Test_Pmax_8 = $row['Test_Pmax'];
                $Test_Eff_8 = $row['Test_Eff'];
            }
            }
            }
            }
            }
            }
            }
            }
            $Tab_Number = 9;
            $sql = "Select Data.Tab_Index,
                Data.Test_FN,
                Data.Test_C,
                Data.Test_VOC,
                Data.Test_Isc,
                Data.Test_FF,
                Data.Test_Pmax,
                Data.Test_Eff,
                Data.Test_Size

            From sn_main Main
                Join doma_039 DOMA39
                ON Main.sn_Index = DOMA39.sn_Index

                Join test_data Data 
                ON DOMA39.039_Index = Data.test_Index

                Join pn_size Size
                ON Main.PN_Size = Size.Size_Index

                Join pn_material Material
                On Main.PN_Material = Material.Material_Index

                Join pn_window Window
                ON Main.PN_Window = Window.Window_Index

                Join pn_temp Temp
                ON Main.PN_Temp = Temp.Temp_Index

                Join pn_connector Connector
                ON Main.PN_Connector = Connector.Connector_Index

                Join pn_calibration Cal
                ON Main.PN_Cal = Cal.Calibration_Index

                Join pn_custom Custom
                ON Main.PN_Custom = Custom.Custom_Index

            Where Main.SN_Index = $Rpt_Num
                And Data.Tab_Index = $Tab_Number";
                $result9 = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result9) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result9)) {
                $Tab_Index = $row['Tab_Index'];
                $Test_FN_9 = $row['Test_FN'];
                $Test_C_9 = $row['Test_C'];
                $Test_VOC_9 = $row['Test_VOC'];
                $Test_Isc_9 = $row['Test_Isc'];
                $Test_FF_9 = $row['Test_FF'];
                $Test_Pmax_9 = $row['Test_Pmax'];
                $Test_Eff_9 = $row['Test_Eff'];
                $Test_Size_9 = $row['Test_Size'];
            }
            }
            } else {
            }

            echo "Reference Cell ID: PVM<input type='text' name='SN' size='2' class='HeavyTextBox' value=$SN><br><br>";
            echo "PVMRC-";
            
            echo "<input type=text size = 5 disabled=true value=$Size>-";
            echo "<input type=text size = 5 disabled=true value=$Material>-";
            echo "<input type=text size = 5 disabled=true value=$Window>-";
            echo "<input type=text size = 5 disabled=true value=$Temp>-";
            echo "<input type=text size = 5 disabled=true value=$Connector>-";
            echo "<input type=text size = 5 disabled=true value=$Calibration>-";
            echo "<input type=text size = 5 disabled=true value=$Custom><br><br>";

echo "Other Features: <textarea cols='40' rows='5' style='width:400px; height:50px;' name='Other_Feat' class='HeavyTextBox'>$Other</textarea><br><br>";
echo "Manufacture Date: <input type='date' name='Man_Date' size='30' class='HeavyTextBox' value='" . date('Y-m-d') . "'<br><br>";
echo "<hr>";
echo "Std. Photodiode Cal QE Filename: <input type='text' name='QE_Cal_FN' size='40' class='HeavyTextBox' value=\"$QE_Cal_FN\"><br><br>";

echo "RefCell QE Filename: <input type='text' name='RefCell_Cal_FN' size='35' class='HeavyTextBox' value=\"$Ref_Cell_QE_FN\"><br><br>";

echo "PVM RefCell ID: <input type='text' name='PVM_Std_RefCell_ID' size='20' class='HeavyTextBox' value=$STD_RefCell_ID> &#160 Calibration Value(Isc): <input type='text' name='Cal_Isc' size='5' class='HeavyTextBox' value=$Cal_Val><br><br>";

echo "Calibration Verification Filename: <input type='text' name='CalVerFN' size='40' class='HeavyTextBox' value=\"$Cal_Ver_FN\"><br><br>";
echo "<hr>";
echo "Date of IV Measurement: <input type='date' name='CalDate' class='HeavyTextBox' value='" . date('Y-m-d') . "'<br><br>";

echo "<table>";
       echo "<tr class='Cal'>";
            echo "<th style='width:60%'><u>File Name</u></th>";
            echo "<th><u>Temp (C)</u></th>";
            echo "<th><u>VOC (V)</u></th>";
            echo "<th><u>Isc (mA)</u></th>";
            echo "<th><u>FF (%)</u></th>";
            echo "<th><u>Pmax</u></th>";
            echo "<th><u>Eff</u></th>";
       echo "</tr>";
        
        echo "<tr class='alt'>";
            echo "<td><input type='text' name='FN_1' size='40' style='font-size: 8pt' class='defaultTextBox' value=$Test_FN_1></td>";
            echo "<td><input type='text' name='Temp_1' size='3' class='defaultTextBox' value=$Test_C_1></td>";
            echo "<td><input type='text' name='VOC_1' size='3' class='defaultTextBox' value=$Test_VOC_1></td>";
            echo "<td><input type='text' name='ISC_1' size='3' class='defaultTextBox' value=$Test_Isc_1></td>";
            echo "<td><input type='text' name='FF_1' size='3' class='defaultTextBox' value=$Test_FF_1></td>";
            echo "<td><input type='text' name='Pmax_1' size='3' class='defaultTextBox' value=$Test_Pmax_1></td>";
            echo "<td><input type='text' name='Eff_1' size='3' class='defaultTextBox' value=$Test_Eff_1></td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td><input type='text' name='FN_2' size='40' style='font-size: 8pt' class='defaultTextBox' value=$Test_FN_2></td>";
            echo "<td><input type='text' name='Temp_2' size='3' class='defaultTextBox' value=$Test_C_2></td>";
            echo "<td><input type='text' name='VOC_2' size='3' class='defaultTextBox' value=$Test_VOC_2></td>";
            echo "<td><input type='text' name='ISC_2' size='3' class='defaultTextBox' value=$Test_Isc_2></td>";
            echo "<td><input type='text' name='FF_2' size='3' class='defaultTextBox' value=$Test_FF_2></td>";
            echo "<td><input type='text' name='Pmax_2' size='3' class='defaultTextBox' value=$Test_Pmax_2></td>";
            echo "<td><input type='text' name='Eff_2' size='3' class='defaultTextBox' value=$Test_Eff_2></td>";
        echo "</tr>";

        echo "<tr class='alt'>";
            echo "<td><input type='text' name='FN_3' size='40' style='font-size: 8pt' class='defaultTextBox' value=$Test_FN_3></td>";
            echo "<td><input type='text' name='Temp_3' size='3' class='defaultTextBox' value=$Test_C_3></td>";
            echo "<td><input type='text' name='VOC_3' size='3' class='defaultTextBox' value=$Test_VOC_3></td>";
            echo "<td><input type='text' name='ISC_3' size='3' class='defaultTextBox' value=$Test_Isc_3></td>";
            echo "<td><input type='text' name='FF_3' size='3' class='defaultTextBox' value=$Test_FF_3></td>";
            echo "<td><input type='text' name='Pmax_3' size='3' class='defaultTextBox' value=$Test_Pmax_3></td>";
            echo "<td><input type='text' name='Eff_3' size='3' class='defaultTextBox' value=$Test_Eff_3></td>";
        echo "</tr>";

        echo "<tr class=''>";
            echo "<td><input type='text' name='FN_4' size='40' style='font-size: 8pt' class='defaultTextBox' value=$Test_FN_4></td>";
            echo "<td><input type='text' name='Temp_4' size='3' class='defaultTextBox' value=$Test_C_4></td>";
            echo "<td><input type='text' name='VOC_4' size='3' class='defaultTextBox' value=$Test_VOC_4></td>";
            echo "<td><input type='text' name='ISC_4' size='3' class='defaultTextBox' value=$Test_Isc_4></td>";
            echo "<td><input type='text' name='FF_4' size='3' class='defaultTextBox' value=$Test_FF_4></td>";
            echo "<td><input type='text' name='Pmax_4' size='3' class='defaultTextBox' value=$Test_Pmax_4></td>";
            echo "<td><input type='text' name='Eff_4' size='3' class='defaultTextBox' value=$Test_Eff_4></td>";
        echo "</tr>";

        echo "<tr class='alt'>";
            echo "<td><input type='text' name='FN_5' size='40' style='font-size: 8pt' class='defaultTextBox' value=$Test_FN_5></td>";
            echo "<td><input type='text' name='Temp_5' size='3' class='defaultTextBox' value=$Test_C_5></td>";
            echo "<td><input type='text' name='VOC_5' size='3' class='defaultTextBox' value=$Test_VOC_5></td>";
            echo "<td><input type='text' name='ISC_5' size='3' class='defaultTextBox' value=$Test_Isc_5></td>";
            echo "<td><input type='text' name='FF_5' size='3' class='defaultTextBox' value=$Test_FF_5></td>";
            echo "<td><input type='text' name='Pmax_5' size='3' class='defaultTextBox' value=$Test_Pmax_5></td>";
            echo "<td><input type='text' name='Eff_5' size='3' class='defaultTextBox' value=$Test_Eff_5></td>";
        echo "</tr>";

        echo "<tr class=''>";
            echo "<td><input type='text' name='FN_6' size='40' style='font-size: 8pt' class='defaultTextBox' value=$Test_FN_6></td>";
            echo "<td><input type='text' name='Temp_6' size='3' class='defaultTextBox' value=$Test_C_6></td>";
            echo "<td><input type='text' name='VOC_6' size='3' class='defaultTextBox' value=$Test_VOC_6></td>";
            echo "<td><input type='text' name='ISC_6' size='3' class='defaultTextBox' value=$Test_Isc_6></td>";
            echo "<td><input type='text' name='FF_6' size='3' class='defaultTextBox' value=$Test_FF_6></td>";
            echo "<td><input type='text' name='Pmax_6' size='3' class='defaultTextBox' value=$Test_Pmax_6></td>";
            echo "<td><input type='text' name='Eff_6' size='3' class='defaultTextBox' value=$Test_Eff_6></td>";
        echo "</tr>";

        echo "<tr class='alt'>";
            echo "<td><input type='text' name='FN_7' size='40' style='font-size: 8pt' class='defaultTextBox' value=$Test_FN_7></td>";
            echo "<td><input type='text' name='Temp_7' size='3' class='defaultTextBox' value=$Test_C_7></td>";
            echo "<td><input type='text' name='VOC_7' size='3' class='defaultTextBox' value=$Test_VOC_7></td>";
            echo "<td><input type='text' name='ISC_7' size='3' class='defaultTextBox' value=$Test_Isc_7></td>";
            echo "<td><input type='text' name='FF_7' size='3' class='defaultTextBox' value=$Test_FF_7></td>";
            echo "<td><input type='text' name='Pmax_7' size='3' class='defaultTextBox' value=$Test_Pmax_7></td>";
            echo "<td><input type='text' name='Eff_7' size='3' class='defaultTextBox' value=$Test_Eff_7></td>";
        echo "</tr>";

        echo "<tr class=''>";
            echo "<td><input type='text' name='FN_8' size='40' style='font-size: 8pt' class='defaultTextBox' value=$Test_FN_8></td>";
            echo "<td><input type='text' name='Temp_8' size='3' class='defaultTextBox' value=$Test_C_8></td>";
            echo "<td><input type='text' name='VOC_8' size='3' class='defaultTextBox' value=$Test_VOC_8></td>";
            echo "<td><input type='text' name='ISC_8' size='3' class='defaultTextBox' value=$Test_Isc_8></td>";
            echo "<td><input type='text' name='FF_8' size='3' class='defaultTextBox' value=$Test_FF_8></td>";
            echo "<td><input type='text' name='Pmax_8' size='3' class='defaultTextBox' value=$Test_Pmax_8></td>";
            echo "<td><input type='text' name='Eff_8' size='3' class='defaultTextBox' value=$Test_Eff_8></td>";
        echo "</tr>";
echo "</table>";
    echo "<br>";
echo "<h3>Outside Laboratry Calibration Measurements</h3>";
echo "<table>";
       echo "<tr class='Cal'>";
            echo "<th style='width:100%'><u>Test Report#</u></th>";
            echo "<th><u>Size (cm2)</u></th>";
            echo "<th><u>Temp (C)</u></th>";
            echo "<th><u>VOC (V)</u></th>";
            echo "<th><u>Isc (mA)</u></th>";
            echo "<th><u>FF (%)</u></th>";
            echo "<th><u>Pmax</u></th>";
            echo "<th><u>Eff</u></th>";
       echo "</tr>";
        
        echo "<tr class='alt'>";
            echo "<td><input type='text' name='FN_O' size='30' style='font-size: 8pt' class='defaultTextBox' value=$Test_FN_9></td>";
            echo "<td><input type='text' name='Size_O' size='3' class='defaultTextBox' value=$Test_Size_9></td>";
            echo "<td><input type='text' name='Temp_O' size='3' class='defaultTextBox' value=$Test_C_9></td>";
            echo "<td><input type='text' name='VOC_O' size='3' class='defaultTextBox' value=$Test_VOC_9></td>";
            echo "<td><input type='text' name='ISC_O' size='3' class='defaultTextBox' value=$Test_Isc_9></td>";
            echo "<td><input type='text' name='FF_O' size='3' class='defaultTextBox' value=$Test_FF_9></td>";
            echo "<td><input type='text' name='Pmax_O' size='3' class='defaultTextBox' value=$Test_Pmax_9></td>";
            echo "<td><input type='text' name='Eff_O' size='3' class='defaultTextBox' value=$Test_Eff_9></td>";
        echo "</tr>";
echo "</table>";
echo "<br>";
echo "<INPUT TYPE='Submit' VALUE='Update Record' NAME='nav_btn'>";
echo "<br>";
        break;
           
        case '>':
        $Rpt_Num = $_POST['Rpt_Num'];
            $Rpt_Num = $Rpt_Num + 1;
            $Tab_Number = 1;
            $sql = "Select Main.SN_Index,
                Main.SN,
                Size.Size_Name,
                Material.Material_Name,
                Window.Window_Name,
                Temp.Temp_Name,
                Connector.Connector_Name,
                Cal.Calibration_Name,
                Custom.Custom_Name,
                Main.Man_Date,
                Main.Other_Features,
                DOMA39.QE_Cal_FN,
                DOMA39.Ref_Cell_QE_FN,
                DOMA39.STD_RefCell_ID,
                DOMA39.Cal_Val,
                DOMA39.Cal_Ver_FN,
                Data.Tab_Index,
                Data.Test_FN,
                Data.Test_C,
                Data.Test_VOC,
                Data.Test_Isc,
                Data.Test_FF,
                Data.Test_Pmax,
                Data.Test_Eff


            From sn_main Main
                Join doma_039 DOMA39
                ON Main.sn_index = DOMA39.sn_Index

                Join test_data Data 
                ON DOMA39.039_Index = Data.test_Index

                Join pn_size Size
                ON Main.PN_Size = Size.Size_Index

                Join pn_material Material
                On Main.PN_Material = Material.Material_Index

                Join pn_window Window
                ON Main.PN_Window = Window.Window_Index

                Join pn_temp Temp
                ON Main.PN_Temp = Temp.Temp_Index

                Join pn_connector Connector
                ON Main.PN_Connector = Connector.Connector_Index

                Join pn_calibration Cal
                ON Main.PN_Cal = Cal.Calibration_Index

                Join pn_custom Custom
                ON Main.PN_Custom = Custom.Custom_Index

            Where Main.sn_Index = $Rpt_Num
            And Data.Tab_Index = $Tab_Number";
                
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $SN_Index = $row['SN_Index'];
                $SN = $row['SN'];
                $Size = $row['Size_Name'];
                $Material = $row['Material_Name'];
                $Window = $row['Window_Name'];
                $Temp = $row['Temp_Name'];
                $Connector = $row['Connector_Name'];
                $Calibration = $row['Calibration_Name'];
                $Custom = $row['Custom_Name'];
                $Man_Date = $row['Man_Date'];
                $Other = $row['Other_Features'];
                $QE_Cal_FN = $row['QE_Cal_FN'];
                $Ref_Cell_QE_FN = $row['Ref_Cell_QE_FN'];
                $STD_RefCell_ID = $row['STD_RefCell_ID'];
                $Cal_Val = $row['Cal_Val'];
                $Cal_Ver_FN = $row['Cal_Ver_FN'];
                $Tab_Index = $row['Tab_Index'];
                $Test_FN_1 = $row['Test_FN'];
                $Test_C_1 = $row['Test_C'];
                $Test_VOC_1 = $row['Test_VOC'];
                $Test_Isc_1 = $row['Test_Isc'];
                $Test_FF_1 = $row['Test_FF'];
                $Test_Pmax_1 = $row['Test_Pmax'];
                $Test_Eff_1 = $row['Test_Eff'];
            }    
                
             $Tab_Number = 2;
             $sql = "Select Data.Tab_Index,
                Data.Test_FN,
                Data.Test_C,
                Data.Test_VOC,
                Data.Test_Isc,
                Data.Test_FF,
                Data.Test_Pmax,
                Data.Test_Eff


            From sn_main Main
                Join doma_039 DOMA39
                ON Main.sn_Index = DOMA39.sn_Index

                Join test_data Data 
                ON DOMA39.039_Index = Data.test_Index

                Join pn_size Size
                ON Main.PN_Size = Size.Size_Index

                Join pn_material Material
                On Main.PN_Material = Material.Material_Index

                Join pn_window Window
                ON Main.PN_Window = Window.Window_Index

                Join pn_temp Temp
                ON Main.PN_Temp = Temp.Temp_Index

                Join pn_connector Connector
                ON Main.PN_Connector = Connector.Connector_Index

                Join pn_calibration Cal
                ON Main.PN_Cal = Cal.Calibration_Index

                Join pn_custom Custom
                ON Main.PN_Custom = Custom.Custom_Index

            Where Main.SN_Index = $Rpt_Num
                And Data.Tab_Index = $Tab_Number";
                $result2 = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result2) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result2)) {
                $Tab_Index = $row['Tab_Index'];
                $Test_FN_2 = $row['Test_FN'];
                $Test_C_2 = $row['Test_C'];
                $Test_VOC_2 = $row['Test_VOC'];
                $Test_Isc_2 = $row['Test_Isc'];
                $Test_FF_2 = $row['Test_FF'];
                $Test_Pmax_2 = $row['Test_Pmax'];
                $Test_Eff_2 = $row['Test_Eff'];
            }

            $Tab_Number = 3;
            $sql = "Select Data.Tab_Index,
                Data.Test_FN,
                Data.Test_C,
                Data.Test_VOC,
                Data.Test_Isc,
                Data.Test_FF,
                Data.Test_Pmax,
                Data.Test_Eff


            From sn_main Main
                Join doma_039 DOMA39
                ON Main.sn_Index = DOMA39.sn_Index

                Join test_data Data 
                ON DOMA39.039_Index = Data.test_Index

                Join pn_size Size
                ON Main.PN_Size = Size.Size_Index

                Join pn_material Material
                On Main.PN_Material = Material.Material_Index

                Join pn_window Window
                ON Main.PN_Window = Window.Window_Index

                Join pn_temp Temp
                ON Main.PN_Temp = Temp.Temp_Index

                Join pn_connector Connector
                ON Main.PN_Connector = Connector.Connector_Index

                Join pn_calibration Cal
                ON Main.PN_Cal = Cal.Calibration_Index

                Join pn_custom Custom
                ON Main.PN_Custom = Custom.Custom_Index

            Where Main.SN_Index = $Rpt_Num
                And Data.Tab_Index = $Tab_Number";
                $result3 = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result3) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result3)) {
                $Tab_Index = $row['Tab_Index'];
                $Test_FN_3 = $row['Test_FN'];
                $Test_C_3 = $row['Test_C'];
                $Test_VOC_3 = $row['Test_VOC'];
                $Test_Isc_3 = $row['Test_Isc'];
                $Test_FF_3 = $row['Test_FF'];
                $Test_Pmax_3 = $row['Test_Pmax'];
                $Test_Eff_3 = $row['Test_Eff'];
            }
            $Tab_Number = 4;
            $sql = "Select Data.Tab_Index,
                Data.Test_FN,
                Data.Test_C,
                Data.Test_VOC,
                Data.Test_Isc,
                Data.Test_FF,
                Data.Test_Pmax,
                Data.Test_Eff


            From sn_main Main
                Join doma_039 DOMA39
                ON Main.sn_Index = DOMA39.sn_Index

                Join test_data Data 
                ON DOMA39.039_Index = Data.test_Index

                Join pn_size Size
                ON Main.PN_Size = Size.Size_Index

                Join pn_material Material
                On Main.PN_Material = Material.Material_Index

                Join pn_window Window
                ON Main.PN_Window = Window.Window_Index

                Join pn_temp Temp
                ON Main.PN_Temp = Temp.Temp_Index

                Join pn_connector Connector
                ON Main.PN_Connector = Connector.Connector_Index

                Join pn_calibration Cal
                ON Main.PN_Cal = Cal.Calibration_Index

                Join pn_custom Custom
                ON Main.PN_Custom = Custom.Custom_Index

            Where Main.SN_Index = $Rpt_Num
                And Data.Tab_Index = $Tab_Number";
                $result4 = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result4) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result4)) {
                $Tab_Index = $row['Tab_Index'];
                $Test_FN_4 = $row['Test_FN'];
                $Test_C_4 = $row['Test_C'];
                $Test_VOC_4 = $row['Test_VOC'];
                $Test_Isc_4 = $row['Test_Isc'];
                $Test_FF_4 = $row['Test_FF'];
                $Test_Pmax_4 = $row['Test_Pmax'];
                $Test_Eff_4 = $row['Test_Eff'];
            }
            $Tab_Number = 5;
            $sql = "Select Data.Tab_Index,
                Data.Test_FN,
                Data.Test_C,
                Data.Test_VOC,
                Data.Test_Isc,
                Data.Test_FF,
                Data.Test_Pmax,
                Data.Test_Eff


            From sn_main Main
                Join doma_039 DOMA39
                ON Main.sn_Index = DOMA39.sn_Index

                Join test_data Data 
                ON DOMA39.039_Index = Data.test_Index

                Join pn_size Size
                ON Main.PN_Size = Size.Size_Index

                Join pn_material Material
                On Main.PN_Material = Material.Material_Index

                Join pn_window Window
                ON Main.PN_Window = Window.Window_Index

                Join pn_temp Temp
                ON Main.PN_Temp = Temp.Temp_Index

                Join pn_connector Connector
                ON Main.PN_Connector = Connector.Connector_Index

                Join pn_calibration Cal
                ON Main.PN_Cal = Cal.Calibration_Index

                Join pn_custom Custom
                ON Main.PN_Custom = Custom.Custom_Index

            Where Main.SN_Index = $Rpt_Num
                And Data.Tab_Index = $Tab_Number";
                $result5 = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result5) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result5)) {
                $Tab_Index = $row['Tab_Index'];
                $Test_FN_5 = $row['Test_FN'];
                $Test_C_5 = $row['Test_C'];
                $Test_VOC_5 = $row['Test_VOC'];
                $Test_Isc_5 = $row['Test_Isc'];
                $Test_FF_5 = $row['Test_FF'];
                $Test_Pmax_5 = $row['Test_Pmax'];
                $Test_Eff_5 = $row['Test_Eff'];
            }
            
            $Tab_Number = 6;
            $sql = "Select Data.Tab_Index,
                Data.Test_FN,
                Data.Test_C,
                Data.Test_VOC,
                Data.Test_Isc,
                Data.Test_FF,
                Data.Test_Pmax,
                Data.Test_Eff


            From sn_main Main
                Join doma_039 DOMA39
                ON Main.sn_Index = DOMA39.sn_Index

                Join test_data Data 
                ON DOMA39.039_Index = Data.test_Index

                Join pn_size Size
                ON Main.PN_Size = Size.Size_Index

                Join pn_material Material
                On Main.PN_Material = Material.Material_Index

                Join pn_window Window
                ON Main.PN_Window = Window.Window_Index

                Join pn_temp Temp
                ON Main.PN_Temp = Temp.Temp_Index

                Join pn_connector Connector
                ON Main.PN_Connector = Connector.Connector_Index

                Join pn_calibration Cal
                ON Main.PN_Cal = Cal.Calibration_Index

                Join pn_custom Custom
                ON Main.PN_Custom = Custom.Custom_Index

            Where Main.SN_Index = $Rpt_Num
                And Data.Tab_Index = $Tab_Number";
                $result6 = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result6) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result6)) {
                $Tab_Index = $row['Tab_Index'];
                $Test_FN_6 = $row['Test_FN'];
                $Test_C_6 = $row['Test_C'];
                $Test_VOC_6 = $row['Test_VOC'];
                $Test_Isc_6 = $row['Test_Isc'];
                $Test_FF_6 = $row['Test_FF'];
                $Test_Pmax_6 = $row['Test_Pmax'];
                $Test_Eff_6 = $row['Test_Eff'];
            }
           
            $Tab_Number = 7;
            $sql = "Select Data.Tab_Index,
                Data.Test_FN,
                Data.Test_C,
                Data.Test_VOC,
                Data.Test_Isc,
                Data.Test_FF,
                Data.Test_Pmax,
                Data.Test_Eff


            From sn_main Main
                Join doma_039 DOMA39
                ON Main.sn_Index = DOMA39.sn_Index

                Join test_data Data 
                ON DOMA39.039_Index = Data.test_Index

                Join pn_size Size
                ON Main.PN_Size = Size.Size_Index

                Join pn_material Material
                On Main.PN_Material = Material.Material_Index

                Join pn_window Window
                ON Main.PN_Window = Window.Window_Index

                Join pn_temp Temp
                ON Main.PN_Temp = Temp.Temp_Index

                Join pn_connector Connector
                ON Main.PN_Connector = Connector.Connector_Index

                Join pn_calibration Cal
                ON Main.PN_Cal = Cal.Calibration_Index

                Join pn_custom Custom
                ON Main.PN_Custom = Custom.Custom_Index

            Where Main.SN_Index = $Rpt_Num
                And Data.Tab_Index = $Tab_Number";
                $result7 = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result7) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result7)) {
                $Tab_Index = $row['Tab_Index'];
                $Test_FN_7 = $row['Test_FN'];
                $Test_C_7 = $row['Test_C'];
                $Test_VOC_7 = $row['Test_VOC'];
                $Test_Isc_7 = $row['Test_Isc'];
                $Test_FF_7 = $row['Test_FF'];
                $Test_Pmax_7 = $row['Test_Pmax'];
                $Test_Eff_7 = $row['Test_Eff'];
            }
            $Tab_Number = 8;
            $sql = "Select Data.Tab_Index,
                Data.Test_FN,
                Data.Test_C,
                Data.Test_VOC,
                Data.Test_Isc,
                Data.Test_FF,
                Data.Test_Pmax,
                Data.Test_Eff


            From sn_main Main
                Join doma_039 DOMA39
                ON Main.sn_Index = DOMA39.sn_Index

                Join test_data Data 
                ON DOMA39.039_Index = Data.test_Index

                Join pn_size Size
                ON Main.PN_Size = Size.Size_Index

                Join pn_material Material
                On Main.PN_Material = Material.Material_Index

                Join pn_window Window
                ON Main.PN_Window = Window.Window_Index

                Join pn_temp Temp
                ON Main.PN_Temp = Temp.Temp_Index

                Join pn_connector Connector
                ON Main.PN_Connector = Connector.Connector_Index

                Join pn_calibration Cal
                ON Main.PN_Cal = Cal.Calibration_Index

                Join pn_custom Custom
                ON Main.PN_Custom = Custom.Custom_Index

            Where Main.SN_Index = $Rpt_Num
                And Data.Tab_Index = $Tab_Number";
                $result8 = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result8) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result8)) {
                $Tab_Index = $row['Tab_Index'];
                $Test_FN_8 = $row['Test_FN'];
                $Test_C_8 = $row['Test_C'];
                $Test_VOC_8 = $row['Test_VOC'];
                $Test_Isc_8 = $row['Test_Isc'];
                $Test_FF_8 = $row['Test_FF'];
                $Test_Pmax_8 = $row['Test_Pmax'];
                $Test_Eff_8 = $row['Test_Eff'];
            }
            }
            }
            }
            }
            }
            }
            }
            $Tab_Number = 9;
            $sql = "Select Data.Tab_Index,
                Data.Test_FN,
                Data.Test_C,
                Data.Test_VOC,
                Data.Test_Isc,
                Data.Test_FF,
                Data.Test_Pmax,
                Data.Test_Eff,
                Data.Test_Size

            From sn_main Main
                Join doma_039 DOMA39
                ON Main.sn_Index = DOMA39.sn_Index

                Join test_data Data 
                ON DOMA39.039_Index = Data.test_Index

                Join pn_size Size
                ON Main.PN_Size = Size.Size_Index

                Join pn_material Material
                On Main.PN_Material = Material.Material_Index

                Join pn_window Window
                ON Main.PN_Window = Window.Window_Index

                Join pn_temp Temp
                ON Main.PN_Temp = Temp.Temp_Index

                Join pn_connector Connector
                ON Main.PN_Connector = Connector.Connector_Index

                Join pn_calibration Cal
                ON Main.PN_Cal = Cal.Calibration_Index

                Join pn_custom Custom
                ON Main.PN_Custom = Custom.Custom_Index

            Where Main.SN_Index = $Rpt_Num
                And Data.Tab_Index = $Tab_Number";
                $result9 = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result9) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result9)) {
                $Tab_Index = $row['Tab_Index'];
                $Test_FN_9 = $row['Test_FN'];
                $Test_C_9 = $row['Test_C'];
                $Test_VOC_9 = $row['Test_VOC'];
                $Test_Isc_9 = $row['Test_Isc'];
                $Test_FF_9 = $row['Test_FF'];
                $Test_Pmax_9 = $row['Test_Pmax'];
                $Test_Eff_9 = $row['Test_Eff'];
                $Test_Size_9 = $row['Test_Size'];
            }
            }
            } else {
            }

            echo "Reference Cell ID: PVM<input type='text' name='SN' size='2' class='HeavyTextBox' value=$SN><br><br>";
            echo "PVMRC-";
            
            echo "<input type=text size = 5 disabled=true value=$Size>-";
            echo "<input type=text size = 5 disabled=true value=$Material>-";
            echo "<input type=text size = 5 disabled=true value=$Window>-";
            echo "<input type=text size = 5 disabled=true value=$Temp>-";
            echo "<input type=text size = 5 disabled=true value=$Connector>-";
            echo "<input type=text size = 5 disabled=true value=$Calibration>-";
            echo "<input type=text size = 5 disabled=true value=$Custom><br><br>";

echo "Other Features: <textarea cols='40' rows='5' style='width:400px; height:50px;' name='Other_Feat' class='HeavyTextBox'>$Other</textarea><br><br>";
echo "Manufacture Date: <input type='date' name='Man_Date' size='30' class='HeavyTextBox' value='" . date('Y-m-d') . "'<br><br>";
echo "<hr>";
echo "Std. Photodiode Cal QE Filename: <input type='text' name='QE_Cal_FN' size='40' class='HeavyTextBox' value=\"$QE_Cal_FN\"><br><br>";

echo "RefCell QE Filename: <input type='text' name='RefCell_Cal_FN' size='35' class='HeavyTextBox' value=\"$Ref_Cell_QE_FN\"><br><br>";

echo "PVM RefCell ID: <input type='text' name='PVM_Std_RefCell_ID' size='20' class='HeavyTextBox' value=$STD_RefCell_ID> &#160 Calibration Value(Isc): <input type='text' name='Cal_Isc' size='5' class='HeavyTextBox' value=$Cal_Val><br><br>";

echo "Calibration Verification Filename: <input type='text' name='CalVerFN' size='40' class='HeavyTextBox' value=\"$Cal_Ver_FN\"><br><br>";
echo "<hr>";
echo "Date of IV Measurement: <input type='date' name='CalDate' class='HeavyTextBox' value='" . date('Y-m-d') . "'<br><br>";

echo "<table>";
       echo "<tr class='Cal'>";
            echo "<th style='width:60%'><u>File Name</u></th>";
            echo "<th><u>Temp (C)</u></th>";
            echo "<th><u>VOC (V)</u></th>";
            echo "<th><u>Isc (mA)</u></th>";
            echo "<th><u>FF (%)</u></th>";
            echo "<th><u>Pmax</u></th>";
            echo "<th><u>Eff</u></th>";
       echo "</tr>";
        
        echo "<tr class='alt'>";
            echo "<td><input type='text' name='FN_1' size='40' style='font-size: 8pt' class='defaultTextBox' value=$Test_FN_1></td>";
            echo "<td><input type='text' name='Temp_1' size='3' class='defaultTextBox' value=$Test_C_1></td>";
            echo "<td><input type='text' name='VOC_1' size='3' class='defaultTextBox' value=$Test_VOC_1></td>";
            echo "<td><input type='text' name='ISC_1' size='3' class='defaultTextBox' value=$Test_Isc_1></td>";
            echo "<td><input type='text' name='FF_1' size='3' class='defaultTextBox' value=$Test_FF_1></td>";
            echo "<td><input type='text' name='Pmax_1' size='3' class='defaultTextBox' value=$Test_Pmax_1></td>";
            echo "<td><input type='text' name='Eff_1' size='3' class='defaultTextBox' value=$Test_Eff_1></td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td><input type='text' name='FN_2' size='40' style='font-size: 8pt' class='defaultTextBox' value=$Test_FN_2></td>";
            echo "<td><input type='text' name='Temp_2' size='3' class='defaultTextBox' value=$Test_C_2></td>";
            echo "<td><input type='text' name='VOC_2' size='3' class='defaultTextBox' value=$Test_VOC_2></td>";
            echo "<td><input type='text' name='ISC_2' size='3' class='defaultTextBox' value=$Test_Isc_2></td>";
            echo "<td><input type='text' name='FF_2' size='3' class='defaultTextBox' value=$Test_FF_2></td>";
            echo "<td><input type='text' name='Pmax_2' size='3' class='defaultTextBox' value=$Test_Pmax_2></td>";
            echo "<td><input type='text' name='Eff_2' size='3' class='defaultTextBox' value=$Test_Eff_2></td>";
        echo "</tr>";

        echo "<tr class='alt'>";
            echo "<td><input type='text' name='FN_3' size='40' style='font-size: 8pt' class='defaultTextBox' value=$Test_FN_3></td>";
            echo "<td><input type='text' name='Temp_3' size='3' class='defaultTextBox' value=$Test_C_3></td>";
            echo "<td><input type='text' name='VOC_3' size='3' class='defaultTextBox' value=$Test_VOC_3></td>";
            echo "<td><input type='text' name='ISC_3' size='3' class='defaultTextBox' value=$Test_Isc_3></td>";
            echo "<td><input type='text' name='FF_3' size='3' class='defaultTextBox' value=$Test_FF_3></td>";
            echo "<td><input type='text' name='Pmax_3' size='3' class='defaultTextBox' value=$Test_Pmax_3></td>";
            echo "<td><input type='text' name='Eff_3' size='3' class='defaultTextBox' value=$Test_Eff_3></td>";
        echo "</tr>";

        echo "<tr class=''>";
            echo "<td><input type='text' name='FN_4' size='40' style='font-size: 8pt' class='defaultTextBox' value=$Test_FN_4></td>";
            echo "<td><input type='text' name='Temp_4' size='3' class='defaultTextBox' value=$Test_C_4></td>";
            echo "<td><input type='text' name='VOC_4' size='3' class='defaultTextBox' value=$Test_VOC_4></td>";
            echo "<td><input type='text' name='ISC_4' size='3' class='defaultTextBox' value=$Test_Isc_4></td>";
            echo "<td><input type='text' name='FF_4' size='3' class='defaultTextBox' value=$Test_FF_4></td>";
            echo "<td><input type='text' name='Pmax_4' size='3' class='defaultTextBox' value=$Test_Pmax_4></td>";
            echo "<td><input type='text' name='Eff_4' size='3' class='defaultTextBox' value=$Test_Eff_4></td>";
        echo "</tr>";

        echo "<tr class='alt'>";
            echo "<td><input type='text' name='FN_5' size='40' style='font-size: 8pt' class='defaultTextBox' value=$Test_FN_5></td>";
            echo "<td><input type='text' name='Temp_5' size='3' class='defaultTextBox' value=$Test_C_5></td>";
            echo "<td><input type='text' name='VOC_5' size='3' class='defaultTextBox' value=$Test_VOC_5></td>";
            echo "<td><input type='text' name='ISC_5' size='3' class='defaultTextBox' value=$Test_Isc_5></td>";
            echo "<td><input type='text' name='FF_5' size='3' class='defaultTextBox' value=$Test_FF_5></td>";
            echo "<td><input type='text' name='Pmax_5' size='3' class='defaultTextBox' value=$Test_Pmax_5></td>";
            echo "<td><input type='text' name='Eff_5' size='3' class='defaultTextBox' value=$Test_Eff_5></td>";
        echo "</tr>";

        echo "<tr class=''>";
            echo "<td><input type='text' name='FN_6' size='40' style='font-size: 8pt' class='defaultTextBox' value=$Test_FN_6></td>";
            echo "<td><input type='text' name='Temp_6' size='3' class='defaultTextBox' value=$Test_C_6></td>";
            echo "<td><input type='text' name='VOC_6' size='3' class='defaultTextBox' value=$Test_VOC_6></td>";
            echo "<td><input type='text' name='ISC_6' size='3' class='defaultTextBox' value=$Test_Isc_6></td>";
            echo "<td><input type='text' name='FF_6' size='3' class='defaultTextBox' value=$Test_FF_6></td>";
            echo "<td><input type='text' name='Pmax_6' size='3' class='defaultTextBox' value=$Test_Pmax_6></td>";
            echo "<td><input type='text' name='Eff_6' size='3' class='defaultTextBox' value=$Test_Eff_6></td>";
        echo "</tr>";

        echo "<tr class='alt'>";
            echo "<td><input type='text' name='FN_7' size='40' style='font-size: 8pt' class='defaultTextBox' value=$Test_FN_7></td>";
            echo "<td><input type='text' name='Temp_7' size='3' class='defaultTextBox' value=$Test_C_7></td>";
            echo "<td><input type='text' name='VOC_7' size='3' class='defaultTextBox' value=$Test_VOC_7></td>";
            echo "<td><input type='text' name='ISC_7' size='3' class='defaultTextBox' value=$Test_Isc_7></td>";
            echo "<td><input type='text' name='FF_7' size='3' class='defaultTextBox' value=$Test_FF_7></td>";
            echo "<td><input type='text' name='Pmax_7' size='3' class='defaultTextBox' value=$Test_Pmax_7></td>";
            echo "<td><input type='text' name='Eff_7' size='3' class='defaultTextBox' value=$Test_Eff_7></td>";
        echo "</tr>";

        echo "<tr class=''>";
            echo "<td><input type='text' name='FN_8' size='40' style='font-size: 8pt' class='defaultTextBox' value=$Test_FN_8></td>";
            echo "<td><input type='text' name='Temp_8' size='3' class='defaultTextBox' value=$Test_C_8></td>";
            echo "<td><input type='text' name='VOC_8' size='3' class='defaultTextBox' value=$Test_VOC_8></td>";
            echo "<td><input type='text' name='ISC_8' size='3' class='defaultTextBox' value=$Test_Isc_8></td>";
            echo "<td><input type='text' name='FF_8' size='3' class='defaultTextBox' value=$Test_FF_8></td>";
            echo "<td><input type='text' name='Pmax_8' size='3' class='defaultTextBox' value=$Test_Pmax_8></td>";
            echo "<td><input type='text' name='Eff_8' size='3' class='defaultTextBox' value=$Test_Eff_8></td>";
        echo "</tr>";
echo "</table>";
    echo "<br>";
echo "<h3>Outside Laboratry Calibration Measurements</h3>";
echo "<table>";
       echo "<tr class='Cal'>";
            echo "<th style='width:100%'><u>Test Report#</u></th>";
            echo "<th><u>Size (cm2)</u></th>";
            echo "<th><u>Temp (C)</u></th>";
            echo "<th><u>VOC (V)</u></th>";
            echo "<th><u>Isc (mA)</u></th>";
            echo "<th><u>FF (%)</u></th>";
            echo "<th><u>Pmax</u></th>";
            echo "<th><u>Eff</u></th>";
       echo "</tr>";
        
        echo "<tr class='alt'>";
            echo "<td><input type='text' name='FN_O' size='30' style='font-size: 8pt' class='defaultTextBox' value=$Test_FN_9></td>";
            echo "<td><input type='text' name='Size_O' size='3' class='defaultTextBox' value=$Test_Size_9></td>";
            echo "<td><input type='text' name='Temp_O' size='3' class='defaultTextBox' value=$Test_C_9></td>";
            echo "<td><input type='text' name='VOC_O' size='3' class='defaultTextBox' value=$Test_VOC_9></td>";
            echo "<td><input type='text' name='ISC_O' size='3' class='defaultTextBox' value=$Test_Isc_9></td>";
            echo "<td><input type='text' name='FF_O' size='3' class='defaultTextBox' value=$Test_FF_9></td>";
            echo "<td><input type='text' name='Pmax_O' size='3' class='defaultTextBox' value=$Test_Pmax_9></td>";
            echo "<td><input type='text' name='Eff_O' size='3' class='defaultTextBox' value=$Test_Eff_9></td>";
        echo "</tr>";
echo "</table>";
echo "<br>";
echo "<INPUT TYPE='Submit' VALUE='Update Record' NAME='nav_btn'>";
echo "<br>";
        break;
        
        }
        }
        if(empty($_POST['nav_btn'])){

    
            echo "Reference Cell ID: PVM<input type='text' name='SN' size='2' class='HeavyTextBox'><br><br>";
            echo "PVMRC-";
            echo "<SELECT name='Size'>";
            echo "<OPTION VALUE=0>Size</option>";
        
                $sql = "SELECT size_name, size_index FROM pn_size";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='".$row['size_index']."'>".$row['size_name']."</option>";
                    }
                } else {
                    echo "0 results";
                }
            echo "</SELECT>-";
            echo "<SELECT name='Material'>";
            echo "<OPTION VALUE=0>Mat</option>";
        
                $sql = "SELECT material_name, material_index FROM pn_material";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='".$row['material_index']."'>".$row['material_name']."</option>";
                    }
                } else {
                    echo "0 results";
                }
            echo "</SELECT>-";
    
            echo "<SELECT name='Window'>";
            echo "<OPTION VALUE=0>Window</option>";
                $sql = "SELECT window_name, window_index FROM pn_window";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='".$row['window_index']."'>".$row['window_name']."</option>";
                    }
                } else {
                    echo "0 results";
                }

            echo "</SELECT>-";
   
            echo "<SELECT name='Temp'>";
            echo "<OPTION VALUE=0>Temp</option>";
        
                $sql = "SELECT Temp_Name, Temp_Index FROM pn_temp";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='".$row['Temp_Index']."'>".$row['Temp_Name']."</option>";
                    }
                } else {
                    echo "0 results";
                }
            echo "</SELECT>-";
            echo "<SELECT name='Connector'>";
            echo "<OPTION VALUE=0>Connector</option>";
      
            $sql = "SELECT Connector_name, Connector_Index FROM pn_connector";
            $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='".$row['Connector_Index']."'>".$row['Connector_name']."</option>";
                    }
                } else {
                    echo "0 results";
                }
            echo "</SELECT>-";
            echo "<SELECT name='Cal'>";
            echo "<OPTION VALUE=0>Cal</option>"; 

                $sql = "SELECT Calibration_name, Calibration_index FROM pn_calibration";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='".$row['Calibration_index']."'>".$row['Calibration_name']."</option>";
                    }
                } else {
                    echo "0 results";
                }
            echo "</SELECT>-";
            echo "<SELECT name='Custom'>";
            echo "<OPTION VALUE=0>Custom</option>";
 
                $sql = "SELECT Custom_name, Custom_index FROM pn_custom";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='".$row['Custom_index']."'>".$row['Custom_name']."</option>";
                    }
                } else {
                    echo "0 results";
                }
            echo "</SELECT><br><br>";

echo "Other Features: <textarea cols='40' rows='5' style='width:400px; height:50px;' name='Other_Feat' class='HeavyTextBox'>None</textarea><br><br>";
echo "Manufacture Date: <input type='date' name='Man_Date' size='30' class='HeavyTextBox' value='" . date('Y-m-d') . "'<br><br>";
echo "<hr>";
echo "Std. Photodiode Cal QE Filename: <input type='text' name='QE_Cal_FN' size='30' class='HeavyTextBox'><br><br>";

echo "RefCell QE Filename: <input type='text' name='RefCell_Cal_FN' size='30' class='HeavyTextBox'><br><br>";

echo "PVM RefCell ID: <input type='text' name='PVM_Std_RefCell_ID' size='20' class='HeavyTextBox'> &#160 Calibration Value(Isc): <input type='text' name='Cal_Isc' size='5' class='HeavyTextBox'><br><br>";

echo "Calibration Verification Filename: <input type='text' name='CalVerFN' size='40' class='HeavyTextBox'><br><br>";
echo "<hr>";
echo "Date of IV Measurement: <input type='date' name='CalDate' class='HeavyTextBox' value='" . date('Y-m-d') . "'<br><br>";

echo "<table>";
       echo "<tr class='Cal'>";
            echo "<th style='width:60%'><u>File Name</u></th>";
            echo "<th><u>Temp (C)</u></th>";
            echo "<th><u>VOC (V)</u></th>";
            echo "<th><u>Isc (mA)</u></th>";
            echo "<th><u>FF (%)</u></th>";
            echo "<th><u>Pmax</u></th>";
            echo "<th><u>Eff</u></th>";
       echo "</tr>";
        
        echo "<tr class='alt'>";
            echo "<td><input type='text' name='FN_1' size='40' style='font-size: 8pt' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='Temp_1' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='VOC_1' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='ISC_1' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='FF_1' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='Pmax_1' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='Eff_1' size='3' class='defaultTextBox'></td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td><input type='text' name='FN_2' size='40' style='font-size: 8pt' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='Temp_2' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='VOC_2' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='ISC_2' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='FF_2' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='Pmax_2' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='Eff_2' size='3' class='defaultTextBox'></td>";
        echo "</tr>";

        echo "<tr class='alt'>";
            echo "<td><input type='text' name='FN_3' size='40' style='font-size: 8pt' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='Temp_3' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='VOC_3' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='ISC_3' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='FF_3' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='Pmax_3' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='Eff_3' size='3' class='defaultTextBox'></td>";
        echo "</tr>";

        echo "<tr>";
            echo "<td><input type='text' name='FN_4' size='40' style='font-size: 8pt' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='Temp_4' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='VOC_4' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='ISC_4' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='FF_4' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='Pmax_4' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='Eff_4' size='3' class='defaultTextBox'></td>";
        echo "</tr>";

        echo "<tr class='alt'>";
            echo "<td><input type='text' name='FN_5' size='40' style='font-size: 8pt' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='Temp_5' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='VOC_5' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='ISC_5' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='FF_5' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='Pmax_5' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='Eff_5' size='3' class='defaultTextBox'></td>";
        echo "</tr>";

        echo "<tr>";
            echo "<td><input type='text' name='FN_6' size='40' style='font-size: 8pt' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='Temp_6' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='VOC_6' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='ISC_6' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='FF_6' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='Pmax_6' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='Eff_6' size='3' class='defaultTextBox'></td>";
        echo "</tr>";

        echo "<tr class='alt'>";
            echo "<td><input type='text' name='FN_7' size='40' style='font-size: 8pt' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='Temp_7' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='VOC_7' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='ISC_7' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='FF_7' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='Pmax_7' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='Eff_7' size='3' class='defaultTextBox'></td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td><input type='text' name='FN_8' size='40' style='font-size: 8pt' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='Temp_8' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='VOC_8' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='ISC_8' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='FF_8' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='Pmax_8' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='Eff_8' size='3' class='defaultTextBox'></td>";
        echo "</tr>";
echo "</table>";
    echo "<br>";
echo "<h3>Outside Laboratry Calibration Measurements</h3>";
echo "<table>";
       echo "<tr class='Cal'>";
            echo "<th style='width:100%'><u>Test Report#</u></th>";
            echo "<th><u>Size (cm2)</u></th>";
            echo "<th><u>Temp (C)</u></th>";
            echo "<th><u>VOC (V)</u></th>";
            echo "<th><u>Isc (mA)</u></th>";
            echo "<th><u>FF (%)</u></th>";
            echo "<th><u>Pmax</u></th>";
            echo "<th><u>Eff</u></th>";
       echo "</tr>";
        
        echo "<tr class='alt'>";
            echo "<td><input type='text' name='FN_O' size='30' style='font-size: 8pt' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='Size_O' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='Temp_O' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='VOC_O' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='ISC_O' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='FF_O' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='Pmax_O' size='3' class='defaultTextBox'></td>";
            echo "<td><input type='text' name='Eff_O' size='3' class='defaultTextBox'></td>";
        echo "</tr>";
echo "</table>";
echo "<br>";
echo "<INPUT TYPE='Submit' VALUE='Create Record' NAME='nav_btn'>";
echo "<br>";
    }
    ?>

</form>

</div>


<?php
    if (!empty($_POST['nav_btn'])) {
    switch($_POST['nav_btn']){//if the submit button is clicked
       
    case 'Create Record':           
	$Other_Feat = $_POST['Other_Feat'];
    $SN = $_POST['SN'];
    $Size = $_POST['Size'];
    $Material = $_POST['Material'];
    $Window = $_POST['Window'];
    $Temp = $_POST['Temp'];
    $Connector = $_POST['Connector'];
    $Cal = $_POST['Cal'];
    $Custom = $_POST['Custom'];
    $Man_Date = $_POST['Man_Date'];
    $Fmt_Man_Date = strtotime(str_replace('/', '-', $Man_Date));
    //error_log(print_r($Fmt_Man_Date));
    $query1="Insert INTO sn_main (SN, PN_Size, PN_Material, PN_Window, PN_Temp, PN_Connector, PN_Cal, PN_Custom, Man_Date, Other_Features) VALUES ('$SN', $Size, $Material, $Window, $Temp, $Connector, $Cal, $Custom, $Fmt_Man_Date, '$Other_Feat')";

    //Adds record of RefCell to Database
    mysqli_query($conn, $query1) or die("Cannot update ". $SN . " ".   $Size. " ". $Material. " ". $Window. " ". $Temp. " ". $Connector. " ". $Cal. " ". $Custom. " ". $Fmt_Man_Date);//update or error
    
    $query2 = "SELECT sn_Index FROM sn_main WHERE SN = '$SN'";
    $result = mysqli_query($conn, $query2);  
            
            if (mysqli_num_rows($result) > 0) {
            // output data of each row   
            while($row = mysqli_fetch_assoc($result)) {
                $result1 = $row['sn_Index'] ;
                //echo $row['sn_Index']. "<br>";
            }
            }
            else {
            echo "0 results";
            }

    $QE_Cal_FN = $_POST['QE_Cal_FN'];
    $RefCell_Cal_FN = $_POST['RefCell_Cal_FN'];
    $PVM_Std_RefCell_ID = $_POST['PVM_Std_RefCell_ID'];
    $Cal_Isc = $_POST['Cal_Isc'];
    $CalVerFN = $_POST['CalVerFN'];

    $query3 ="Insert INTO doma_039 (sn_index, QE_Cal_FN, Ref_Cell_QE_FN, STD_RefCell_ID, Cal_Val, Cal_Ver_FN) VALUES ($result1, '$QE_Cal_FN', '$RefCell_Cal_FN', '$PVM_Std_RefCell_ID', $Cal_Isc, '$CalVerFN')";
    //$query3 ="Insert INTO doma_039 (sn_index, STD_RefCell_ID) VALUES ($result1, $RefCell_Cal_FN)";
    //Adds record of RefCell to Database
    mysqli_query($conn, $query3) or die("Cannot update ". " ". $result1 . " ". $QE_Cal_FN . " ". $RefCell_Cal_FN . " ". $PVM_Std_RefCell_ID . " ". $Cal_Isc . " ". $CalVerFN);//update or error
	    
    $FN_1 = $_POST['FN_1'];
    $FN_2 = $_POST['FN_2'];
    $FN_3 = $_POST['FN_3'];
    $FN_4 = $_POST['FN_4'];
    $FN_5 = $_POST['FN_5'];
    $FN_6 = $_POST['FN_6'];
    $FN_7 = $_POST['FN_7'];
    $FN_8 = $_POST['FN_8'];
    $FN_O = $_POST['FN_O'];

    $Temp_1 = $_POST['Temp_1'];
    $Temp_2 = $_POST['Temp_2'];
    $Temp_3 = $_POST['Temp_3'];
    $Temp_4 = $_POST['Temp_4'];
    $Temp_5 = $_POST['Temp_5'];
    $Temp_6 = $_POST['Temp_6'];
    $Temp_7 = $_POST['Temp_7'];
    $Temp_8 = $_POST['Temp_8'];
    $Temp_O = $_POST['Temp_O'];
    
    $VOC_1 = $_POST['VOC_1'];
    $VOC_2 = $_POST['VOC_2'];
    $VOC_3 = $_POST['VOC_3'];
    $VOC_4 = $_POST['VOC_4'];
    $VOC_5 = $_POST['VOC_5'];
    $VOC_6 = $_POST['VOC_6'];
    $VOC_7 = $_POST['VOC_7'];
    $VOC_8 = $_POST['VOC_8'];
    $VOC_O = $_POST['VOC_O'];
    
    $ISC_1 = $_POST['ISC_1'];
    $ISC_2 = $_POST['ISC_2'];
    $ISC_3 = $_POST['ISC_3'];
    $ISC_4 = $_POST['ISC_4'];
    $ISC_5 = $_POST['ISC_5'];
    $ISC_6 = $_POST['ISC_6'];
    $ISC_7 = $_POST['ISC_7'];
    $ISC_8 = $_POST['ISC_8'];
    $ISC_O = $_POST['ISC_O'];

    $FF_1 = $_POST['FF_1'];
    $FF_2 = $_POST['FF_2'];
    $FF_3 = $_POST['FF_3'];
    $FF_4 = $_POST['FF_4'];
    $FF_5 = $_POST['FF_5'];
    $FF_6 = $_POST['FF_6'];
    $FF_7 = $_POST['FF_7'];
    $FF_8 = $_POST['FF_8'];
    $FF_O = $_POST['FF_O'];

    $Pmax_1 = $_POST['Pmax_1'];
    $Pmax_2 = $_POST['Pmax_2'];
    $Pmax_3 = $_POST['Pmax_3'];
    $Pmax_4 = $_POST['Pmax_4'];
    $Pmax_5 = $_POST['Pmax_5'];
    $Pmax_6 = $_POST['Pmax_6'];
    $Pmax_7 = $_POST['Pmax_7'];
    $Pmax_8 = $_POST['Pmax_8'];
    $Pmax_O = $_POST['Pmax_O'];

    $Eff_1 = $_POST['Eff_1'];
    $Eff_2 = $_POST['Eff_2'];
    $Eff_3 = $_POST['Eff_3'];
    $Eff_4 = $_POST['Eff_4'];
    $Eff_5 = $_POST['Eff_5'];
    $Eff_6 = $_POST['Eff_6'];
    $Eff_7 = $_POST['Eff_7'];
    $Eff_8 = $_POST['Eff_8'];
    $Eff_O = $_POST['Eff_O'];

    $Size_O = $_POST['Size_O'];

    $query4 = "SELECT 039_Index FROM doma_039 WHERE sn_index = '$result1'";
    $result2 = mysqli_query($conn, $query4);     

            if (mysqli_num_rows($result2) > 0) {
            // output data of each row   
            while($row = mysqli_fetch_assoc($result2)) {
                $result3 = $row['039_Index'];
                //echo $row['sn_Index']. "<br>";
            }
            }
            else {
            echo "0 results";
            }

    $query5 ="Insert INTO test_data (Test_Index, Tab_Index, Test_FN, Test_C, Test_VOC, Test_Isc, Test_FF, Test_Pmax, Test_Eff) VALUES ($result3, 1, '$FN_1', $Temp_1, $VOC_1, $ISC_1, $FF_1, $Pmax_1, $Eff_1)";
    $query6 ="Insert INTO test_data (Test_Index, Tab_Index, Test_FN, Test_C, Test_VOC, Test_Isc, Test_FF, Test_Pmax, Test_Eff) VALUES ($result3, 2, '$FN_2', $Temp_2, $VOC_2, $ISC_2, $FF_2, $Pmax_2, $Eff_2)";
    $query7 ="Insert INTO test_data (Test_Index, Tab_Index, Test_FN, Test_C, Test_VOC, Test_Isc, Test_FF, Test_Pmax, Test_Eff) VALUES ($result3, 3, '$FN_3', $Temp_3, $VOC_3, $ISC_3, $FF_3, $Pmax_3, $Eff_3)";
    $query8 ="Insert INTO test_data (Test_Index, Tab_Index, Test_FN, Test_C, Test_VOC, Test_Isc, Test_FF, Test_Pmax, Test_Eff) VALUES ($result3, 4, '$FN_4', $Temp_4, $VOC_4, $ISC_4, $FF_4, $Pmax_4, $Eff_4)";
    $query9 ="Insert INTO test_data (Test_Index, Tab_Index, Test_FN, Test_C, Test_VOC, Test_Isc, Test_FF, Test_Pmax, Test_Eff) VALUES ($result3, 5, '$FN_5', $Temp_5, $VOC_5, $ISC_5, $FF_5, $Pmax_5, $Eff_5)";
    $query10 ="Insert INTO test_data (Test_Index, Tab_Index, Test_FN, Test_C, Test_VOC, Test_Isc, Test_FF, Test_Pmax, Test_Eff) VALUES ($result3, 6, '$FN_6', $Temp_6, $VOC_6, $ISC_6, $FF_6, $Pmax_6, $Eff_6)";
    $query11 ="Insert INTO test_data (Test_Index, Tab_Index, Test_FN, Test_C, Test_VOC, Test_Isc, Test_FF, Test_Pmax, Test_Eff) VALUES ($result3, 7, '$FN_7', $Temp_7, $VOC_7, $ISC_7, $FF_7, $Pmax_7, $Eff_7)";
    $query12 ="Insert INTO test_data (Test_Index, Tab_Index, Test_FN, Test_C, Test_VOC, Test_Isc, Test_FF, Test_Pmax, Test_Eff) VALUES ($result3, 8, '$FN_8', $Temp_8, $VOC_8, $ISC_8, $FF_8, $Pmax_8, $Eff_8)";
    $query13 ="Insert INTO test_data (Test_Index, Tab_Index, Test_FN, Test_C, Test_VOC, Test_Isc, Test_FF, Test_Pmax, Test_Eff, Test_Size) VALUES ($result3, 9, '$FN_O', $Temp_0, $VOC_O, $ISC_O, $FF_O, $Pmax_O, $Eff_O, $Size_O)";
    
    $query5a ="Insert INTO test_data (Test_Index, Tab_Index) VALUES ($result3, 1)";
    $query6a ="Insert INTO test_data (Test_Index, Tab_Index) VALUES ($result3, 2)";
    $query7a ="Insert INTO test_data (Test_Index, Tab_Index) VALUES ($result3, 3)";
    $query8a ="Insert INTO test_data (Test_Index, Tab_Index) VALUES ($result3, 4)";
    $query9a ="Insert INTO test_data (Test_Index, Tab_Index) VALUES ($result3, 5)";
    $query10a ="Insert INTO test_data (Test_Index, Tab_Index) VALUES ($result3, 6)";
    $query11a ="Insert INTO test_data (Test_Index, Tab_Index) VALUES ($result3, 7)";
    $query12a ="Insert INTO test_data (Test_Index, Tab_Index) VALUES ($result3, 8)";
    $query13a ="Insert INTO test_data (Test_Index, Tab_Index) VALUES ($result3, 9)";

if (!empty($FN_1)) {    
	@mysqli_query($conn, $query5) or die("Cannot update Row 1 of Test Data");
}

if (!empty($FN_2)){
    @mysqli_query($conn, $query6) or die("Cannot update Row 2 of Test Data"); 
}

if (!empty($FN_3)){
    @mysqli_query($conn, $query7) or die("Cannot update Row 3 of Test Data"); 
}

if (!empty($FN_4)){
    @mysqli_query($conn, $query8) or die("Cannot update Row 4 of Test Data");
}

if (!empty($FN_5)){
    @mysqli_query($conn, $query9) or die("Cannot update Row 5 of Test Data");
}

if (!empty($FN_6)){ 
    @mysqli_query($conn, $query10) or die("Cannot update Row 6 of Test Data");
}

if (!empty($FN_7)){
    @mysqli_query($conn, $query11) or die("Cannot update Row 7 of Test Data");
}

if (!empty($FN_8)){
    @mysqli_query($conn, $query12) or die("Cannot update Row 8 of Test Data");
}

if (!empty($FN_O)){
   @mysqli_query($conn, $query13) or die("Cannot update Outside Lab Test Data");
}

    break;
    }

    }

        mysqli_close($conn);
        include ("Includes/footer.php");

?>