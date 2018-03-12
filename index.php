    <?php 
        require_once ("Includes/simplecms-config.php"); 
        require_once  ("Includes/connectDB.php");
        include("Includes/header.php");         
     ?>


    <div id="main">
    <h3>PV Measurement Links</h3>

    <ol class="round">
         <li class="one">
            <h5><a href = "Calibration_Index.php">Calibrations</a></h5>
             Here you can access the calibration information
         </li>
         <li class="two">
            <h5><a href = "Production_Idx.php">Production Tools</a></h5>
             Here are the tools useful to production
         </li>
         <li class="three">
            <h5><a href = "Safety_Idx.php">Safety Program</a></h5>
             To access the safety program click here
         </li>
         <li class="four">
            <h5><a href = "Engineering_Idx.php">Engineering Tools</a></h5>
             Here are the tools useful for Engineering
         </li>
         <li class="five">
            <h5><a href = "ECO.php">ECOs</a></h5>
             Click here to make an ECO
         </li>
         <li class="six">
            <h5><a href = "http://insider/suite">Suite</a></h5>
             Click to open Suite - This replaces Sugar 
         </li>
         <li class="seven">
            <h5><a href = "http://pvmweb/wiki">Wiki</a></h5>
             Click to open the PVM Wiki
         </li>
        <li class="eight">
            <h5><a href = "http://app.asana.com">Asana Project Management</a></h5>
             Click to access Asana
         </li>
        <li class="asterisk">
            <div class="visit">
                To learn more about PV Measurements, visit <a href="http://www.PVMeasurements.com" title="PVMeasurements Website">http://www.pvmeasurements.com</a> 
            </div>
         </li>
    </ol>


    </div>

</div> <!-- End of outer-wrapper which opens in header.php -->

<?php 
    include ("Includes/footer.php");
 ?>