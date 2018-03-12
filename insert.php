<?php
// Create MySQL login values and
        require_once ("Includes/simplecms-config.php"); 
        require_once  ("Includes/connectDB.php");
        include("Includes/header.php");    
// set them to your login information.

// Make the connect to MySQL or die

// and display an error.

$conn = mysqli_connect($servername, $username, $password, $dbname);

$Cal_Num = $_POST['Cal_Num'];



$link = mysql_connect($servername, $username, $password);

if (!$link) {

die('Could not connect: ' . mysql_error());

}


// Select your database

mysql_select_db ($dbname);

// Make sure the user actually

// selected and uploaded a file

if (isset($_FILES['pdf']) && $_FILES['pdf']['size'] > 0) {


// Temporary file name stored on the server

$tmpName = $_FILES['pdf']['tmp_name'];
$perName = $_FILES['pdf']['name'];
$perSize = $_FILES['pdf']['size'];
// Read the file

$fp = fopen($tmpName, 'r');
$data = fread($fp, filesize($tmpName));

$data = addslashes($data);
fclose($fp);



// Create the query and insert

// into our database.

$query = "INSERT INTO documents ";

$query .= "(Document, Doc_Name, size) VALUES ('$data', '$perName', $perSize)";

$results = mysql_query($query, $link); 

// Print results

print "Thank you, your file has been uploaded.";
print $perName;

$FindPDF = "Select Doc_Index
            From documents DOC
            Where DOC.Doc_Name = '$perName'";

            $FindPDFQ = mysqli_query($conn, $FindPDF);

                        if (mysqli_num_rows($FindPDFQ) > 0) {
                        // output data of each row
                            while($row = mysqli_fetch_assoc($FindPDFQ)) {
                                $PDF_Idx = $row['Doc_Index'];                                                                
                            }                        
                        } else {
                        $maxPDF_idx = "Select MAX(Doc_Index) Doc_Index From documents";
                        $FindPDFQ1 = mysqli_query($conn, $maxPDF_idx);
                        if (mysqli_num_rows($FindPDFQ1) > 0) {
                        // output data of each row
                            while($row = mysqli_fetch_assoc($FindPDFQ1)) {
                                $PDF_Idx = $row['Doc_Index'];
                            }
                            $PDF_Idx = $PDF_Idx + 1;
                        }
                        }


}

else {

print "No pdf selected/uploaded";

}


// Close our MySQL Link

mysql_close($link);


//****************************************************************************************


$link = mysql_connect($servername, $username, $password);

if (!$link) {

die('Could not connect: ' . mysql_error());

}


// Select your database

mysql_select_db ($dbname);

// Make sure the user actually

// selected and uploaded a file

if (isset($_FILES['txt']) && $_FILES['txt']['size'] > 0) {


// Temporary file name stored on the server

$tmpName = $_FILES['txt']['tmp_name'];
$perName = $_FILES['txt']['name'];
$perSize = $_FILES['txt']['size'];
// Read the file

$fp = fopen($tmpName, 'r');
$data = fread($fp, filesize($tmpName));

$data = addslashes($data);
fclose($fp);



// Create the query and insert

// into our database.

$query = "INSERT INTO documents ";

$query .= "(Document, Doc_Name, size) VALUES ('$data', '$perName', $perSize)";

$results = mysql_query($query, $link); 

// Print results

print "Thank you, your file has been uploaded.";
$FindTXT = "Select Doc_Index
            From documents DOC
            Where DOC.Doc_Name = '$perName'";

            $FindTXTQ = mysqli_query($conn, $FindTXT);

                        if (mysqli_num_rows($FindTXTQ) > 0) {
                        // output data of each row
                            while($row = mysqli_fetch_assoc($FindTXTQ)) {
                                $TXT_Idx = $row['Doc_Index'];                                                                
                            }                        
                        } else {
                        $maxTXT_idx = "Select MAX(Doc_Index) Doc_Index From documents";
                        $FindTXTQ1 = mysqli_query($conn, $maxTXT_idx);
                        if (mysqli_num_rows($FindTXTQ1) > 0) {
                        // output data of each row
                            while($row = mysqli_fetch_assoc($FindTXTQ1)) {
                                $TXT_Idx = $row['Doc_Index'];
                            }
                            $PTXT_Idx = $TXT_Idx + 1;
                        }
                        }

}

else {

print "No txt selected/uploaded";

}


// Close our MySQL Link

mysql_close($link);
         


?>

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
    $SiGe = $_POST['SiGe'];

$ins_Query1 = "Insert Into pd_main (PD_SN, PD_Customer) values ('$PD_Num', '$Customer')";
@mysqli_query($conn, $ins_Query1) or die("Query1 Failure");


$FindCalQ = "Select PD_Index From pd_main Where PD_SN = $PD_Num";
$ResFindCalQ = mysqli_query($conn, $FindCalQ);

                        if (mysqli_num_rows($ResFindCalQ) > 0) {
                        // output data of each row
                            while($row = mysqli_fetch_assoc($ResFindCalQ)) {
                                $PD_Index = $row['PD_Index'];                                                                
                            }              
       
                        } else {

                        $maxSN_idx = "Select MAX(PD_Index) PD_Index From pd_main";
                        $ResFindCalQ1 = mysqli_query($conn, $maxSN_idx);
                        if (mysqli_num_rows($ResFindCalQ1) > 0) {
                        // output data of each row
                            while($row = mysqli_fetch_assoc($ResFindCalQ1)) {
                                $PD_Index = $row['PD_Index'];
                            }
                            $PD_Index = $PD_Index + 1;
                        }
                        }

$ins_Query2 = "Insert Into pd_cal (SN_Index, PD_Type, NIST_Idx, Temp, Humidity, Meas_Idx) values ($PD_Index, $SiGe, $NIST_Idx, $Temp, $Humidity, $Sys_Idx)";




@mysqli_query($conn, $ins_Query2) or die("Query2 Failure");


$sql_Update = "Update pd_cal SET PDcalPDF_Idx = $PDF_Idx,
                                        PDCalTxt_Idx = $TXT_Idx
                                      WHERE Cal_Index = $Cal_Num";
       

mysqli_query($conn, $sql_Update) or die("Cannot Update Report");//update or error 
mysql_close($conn);
    break;

}
echo '<script type="text/javascript">
          window.location = "CalPDReq.php"
     </script>';

        include ("Includes/footer.php");

?>
