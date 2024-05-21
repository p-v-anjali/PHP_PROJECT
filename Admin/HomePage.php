<?php

session_start();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home Page</title>
</head>

<body>
<a href="../Guest/Login.php">logout</a>
<form id="form1" name="form1" method="post" action="">
  		<table border="1" align="center" cellpadding="10" style="border-collapse:collapse">
       <tr>
      	<td><i><h1><b><u>Welcome : <?php echo $_SESSION["adminname"];?><i><h1><b><u></td>
    	</tr>
        <tr>
      	<td><a href="Service.php"><b>Service</b></a></td>
    	</tr>
        <tr>
      	<td><a href="District.php"><b>District</b></a></td>
    	</tr>
        <tr>
      	<td><a href="Place.php"><b>Place</b></a></td>
    	</tr>
    	<tr>
      	<td><a href="Product.php"><b>Product</b></a></td>
    	</tr>
        <tr>
      	<td><a href="Category.php"><b>Category</b></a></td>
   	 	</tr>
        <tr>
      	<td><a href="SubCategory.php"><b>Sub Category</b></a></td>
    	</tr>
         <tr>
      	<td><a href="DoctorType.php"><b>Doctor Type</b></a></td>
    	</tr>
        <tr>
      	<td><a href="DoctorList.php"><b>Doctor List</b></a></td>
   	 	</tr>
        <tr>
      	<td><a href="DoctorAcceptedList.php"><b>Doctor Accepted List</b></a></td>
   		 </tr>
    	<tr>
      	<td><a href="DoctorRejectedList.php"><b>Doctor Rejected List</b></a></td>
   	 	</tr>
        <tr>
      	<td><a href="StaffList.php"><b>Staff List</b></a></td>
   	 	</tr>
    	<tr>
      	<td><a href="StaffAcceptedList.php"><b>Staff Accepted List</b></a></td>
    	</tr>
        <tr>
      	<td><a href="StaffRejectedList.php"><b>Staff Rejected List</b></a></td>
   	 	</tr>
        <tr>
      	<td><a href="PatientList.php"><b>Patient List</b></a></td>
   	 	</tr>
    	<tr>
      	<td><a href="PatientAcceptedList.php"><b>Patient Accepted List</b></a></td>
    	</tr>
        <tr>
      	<td><a href="PatientRejectedList.php"><b>Patient Rejected List</b></a></td>
   	 	</tr>
        <tr>
      	<td><a href="ViewPatientRequestList.php"><b>View Patient Request List</b></a></td>
   	 	</tr>
        <tr>
      	<td><a href="PatientRequestAcceptedList.php"><b>Patient Request Accepted List</b></a></td>
   	 	</tr>
        <tr>
      	<td><a href="PatientRequestRejectedList.php"><b>Patient Request Rejected List</b></a></td>
   	 	</tr>
        <tr>
      	<td><a href="ComplaintType.php"><b>Complaint Type</b></a></td>
        </tr>
        <tr>
      	<td><a href="ComplaintList.php"><b>Complaint List</b></a></td>
        </tr>
        
        <tr>
      	<td><a href="FeedbackList.php"><b>Feedback List</b></a></td>
        </tr>
        <tr>
    	</table>
</form>
</body>
</html>