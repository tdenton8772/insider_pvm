<?php
        require_once ("Includes/simplecms-config.php"); 
        require_once  ("Includes/connectDB.php");
        include("Includes/header.php");   
?>
<div id="main">
         
<p align="right">ECO Number: <input type="submit" value="<"><input type="text" name="" size ="5"><input type="submit" value=">"></p>
    <h2>Engineering Change Order</h2>
<hr>
   <table width="100%" >
    <tr>
        <td>Cancel Date: <input type="date" name=""></td>
        <td>Issue Date: <input type="date" name=""></td>
        <td>Close Date: <input type="date" name=""></td>
    </tr> 
   </table>
   <br>


   <table width="100%">
    <tr class="Cal">
        <th width="40%">Department</th>
        <th width="40%">E-Signature</th>
        <th>Postpone Process</th>
    </tr>
    <tr class="alt">
        <td>Originator</td>
        <td><input type="text" name="" class="defaultTextBox"></td>
        <td></td>
    </tr> 
    <tr>
        <td>Responsible Eng</td>
        <td><input type="text" name="" class="defaultTextBox"></td>
        <td></td>
    </tr> 
    <tr class="alt">
        <td>Engineering Mgr</td>
        <td><input type="text" name="" class="defaultTextBox"></td>
        <td></td>
    </tr> 
    <tr>
        <td>Manufacturing</td>
        <td><input type="text" name="" class="defaultTextBox"></td>
        <td></td>
    </tr> 
    <tr class="alt">
        <td>Sales</td>
        <td><input type="text" name="" class="defaultTextBox"></td>
        <td></td>
   </table>
    <br>
   Reason for ECO:<br>
   <textarea cols="40" rows="7" style="width:575px; height:30px;" class=""></textarea><br>

   ASSY/Products Affected:
    <input type="text" name=""><br>

   Problem/Improvement/Addendum(Be Specific):<br>
   <textarea cols="40" rows="7" style="width:575px; height:50px;" class=""></textarea><br>
    <br>

   Specific Description of Change/Addendum:<br>
   <textarea cols="40" rows="7" style="width:575px; height:50px;" class=""></textarea><br>
    <br>
</div>

<?php
        include ("Includes/footer.php");

?>

