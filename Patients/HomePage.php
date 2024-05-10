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
<table border="1" align="center" cellpadding="10" style="border-collapse:collapse">

<tr>
<td><p><i><h1><b><u>Welcome : <?php echo $_SESSION["patientname"];?><i><h1><b><u></p></td>
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
    <td><a href="SearchDoctor.php"><b>Search Doctor</b></a></td>
  </tr>
  <tr>
    <td><a href="SearchStaff.php"><b>Search Staff</b></a></td>
  </tr>
  <tr>
    <td><a href="DoctorRequest.php"><b>Doctor Request</b></a></td>
  </tr>
  <tr>
    <td><a href="StaffRequest.php"><b>Staff Request</b></a></td>
  </tr>
  <tr>
    <td><a href="AssignedStaffs.php"><b>Assigned Staffs</b></a></td>
  </tr>
 <tr>
    <td><a href="Complaint.php"><b>Complaint</b></a></td>
  </tr>
  <tr>
    <td><a href="ComplaintReply.php"><b>Complaint Reply</b></a></td>
  </tr>
  <tr>
    <td><a href="Feedback.php"><b>Feedback</b></a></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>