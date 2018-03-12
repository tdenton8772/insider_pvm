
<?php
if(isset($_POST['submit']))
{
     $SQL = "INSERT INTO chosenitems (ID, Name, Price) VALUES ('', '4-6 Days', '£75.00')";
     $result = mysql_query($SQL);
}
?>

