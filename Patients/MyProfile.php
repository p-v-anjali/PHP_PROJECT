<a href="Homepage.php">Home </a>

<?php
include("../Assets/Connection/Connection.php");
session_start();
$sql="select * from tbl_patient n inner join tbl_place p on n.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where patient_id='".$_SESSION["patientid"]."'";
//echo $sql;
//$d=$con->query($district);
$Rows=$con->query($sql);
$data=$Rows->fetch_assoc();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Profile</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table border="1" align="center" cellpadding="10" style="border-collapse:collapse">
    <tr>
      <td>Photo</td>
     <td><img src="../Assets/Files/PatientPhoto/<?php echo $data["patient_photo"];?>" width="120" height="120"/></td>
    </tr>
    <tr>
      <td width="103">Name :</td>
      <td width="131"><?php echo $data["patient_name"]; ?></td>
    </tr>
    <tr>
      <td>Gender :</td>
      <td><?php echo $data["patient_gender"]; ?></td>
    </tr>
    <tr>
      <td>Age :</td>
      <td><?php echo $data["patient_age"]; ?></td>
    </tr>
    <tr>
      <td>DOB :</td>
      <td><?php echo $data["patient_dob"]; ?></td>
    </tr>
    <tr>
      <td>E-Mail</td>
      <td><?php echo $data["patient_email"]; ?></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><?php echo $data["patient_password"]; ?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><?php echo $data["patient_contact"]; ?></td>
    </tr>
    <tr>
      <td>District</td>
      <td><?php echo $data["district_name"];?></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><?php echo $data["place_name"];?></td>
    </tr>
  </table>
</form>
</body>
</html>
