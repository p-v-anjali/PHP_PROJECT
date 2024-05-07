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

<p>&nbsp;</p>
<form id="form1" name="form1" method="post" action="">
<table border="1" align="center" cellpadding="10" style="border-collapse:collapse">
<p>&nbsp;</p>
	<tr>
	  <td><i><h1><b><u>Welcome : Dr.<?php echo $_SESSION["doctorname"]?><i><h1><b><u></td>
  </tr>
	<tr>
    <td><a href="MyProfile.php"><b>Profile</b></a></td>
  </tr>
  <tr>
    <td><a href="EditProfile.php"><b>Edit Profile</b></a></td>
  </tr>
  <tr>
    <td><a href="ChangePassword.php"><b>Change password</b></a></td>
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
    <td><a href="ScheduledPatient.php"><b>Scheduled Patient</b></a></td>
  </tr>
  <tr>
    <td><a href="Complaint.php"><b>Complaint</b></a></td>
  </tr>
   <tr>
    <td><a href="ComplaintReply.php"><b>Complaint Reply</b></a></td>
  </tr>
  <tr>
    <td><a href="Feedback.php"><b>Feedback</b></a></td>
  </tr
></table>
<p>&nbsp;</p>
</body>
</html>