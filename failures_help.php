<?php
        require_once ("Includes/simplecms-config.php"); 
        require_once  ("Includes/connectDB.php");
        include("Includes/HelpHeader.php"); 

// Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            } 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
    <div id="main">
       
        <form action="" method="post">
            
<h1>How to Enter A Failure Report</h1>
        <h3>How to use the online Failure Log</h3>
            <p>
        
        Note: No fields are required. It is possible for you to submit a blank failure log and it will be accepted.<br> 
	    The preferred Browser for accessing the Insider is Chrome.<br> 
	    Mousing over a box will sometimes give you a hint about what to enter

        </p>
            <h3>Boxes</h3>
            <p>
                You do not need to press Make new log but it wont hurt if you do.<br><br>  
                Note the report number.<br><br>
                Under Major system enter information such as QEXL or QEX10 and the Customer ie QEX10 JA Solar. You have a maximum of 25 characters.<br><br>
                For Doc/Part/Subassy you should enter the specific identifying information for the part or document etc ie EPCE-215 or DOMA-160. You have a character limit of 25 here also. <br><br>
                If no other information or work is necessary to be completed on the failure check the closed box. We will still talk about it at the failure meeting even if it is closed. If it is open we are expecting more work to be done and a solution to be found or implemented. Please remember to close your open failures regularly.<br><br>
                Start date and end date should be selected. If they are left at their default it will be the date at which you first enter the failure for both start and end. Remember to update the end date when closing your open work orders. <br><br>
                Build delay hours is an estimate of how long this failure delayed the build or shipment of the product. This field can accept any number with one decimal place. <br><br>
                Work Order # should be filled out if the work order this failure is associated with is known. There will be times that a failure is not associated with a work order but typically if a failure is associated with a system it will be associated with a work order. <br><br>
                Found By is a box that can accept Alpha Numeric characters up to 25 characters in length. This should be filled out with who found the error.<br><br>
                Issued to is a box that can accept Alpha Numeric characters up to 25 characters in length. This should be filled out with the person or department you think could best address this failure. Not necessarily who cause it but who can/should fix it. <br><br>
                The Description of problem box is a box that can handle 65,535 bytes. You should not worry about putting too much information and over filling the box. In this box put as much information as you can type out, please do remember that brevity is the soul of wit, describing the problem. This description should include conditions and troubleshooting steps. <br><br>
                The check boxes below Description of Problem are there to help provide metrics. They are not required to be checked but can be helpful in trending. Check as many or as few you fell best fits this particular failure. <br><br>
                The Solution box is a box that can handle 65,535 bytes. You should not worry about putting too much information and over filling the box. In this box put as much information as you can type out, please do remember that brevity is the soul of wit, describing the solution. This solution does not have to be the perfect solution. It can be a proposed solution or something that we should try even though it might not work. If the failure is set to the closed status this box should contain the actual solution implemented. <br><br>
                The following two checkboxes should be used in the event we had a missing or damaged part. If we need to order parts or a part was bad we should check the box if we have placed the part on the PS and we should check the box if we have informed Purchasing.<br><br>
                The submit failure log button is only visible on new failures. After that button is pressed, the button will then say Update Failure log. If the failure is accepted by the Insider you can press Make New Log to enter another failure. If the failure was not accepted you will get an error message. Please screenshot the error message and send the message to Tyler. <br><br>

            </p>
        </form>
    
    </div>
        <?php
        include ("Includes/footer.php");

?>
    </body>
</html>
