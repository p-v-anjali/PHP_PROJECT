<a href="Homepage.php">Home </a>

<?php
ob_start();
include("../Assets/Connection/Connection.php");
session_start();

$sql="select * from tbl_doctor r inner join tbl_place p on r.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id inner join
	tbl_doctortype tp on tp.doctortype_id=r.doctortype_id where doctor_id='".$_SESSION["doctorid"]."'";
//$d=$con->query($district);
$Row=$con->query($sql);
$data=$Row->fetch_assoc();
include("Head.php");
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Profile</title>
</head>
<br /><br /><br /><br /><br /><br />
<body>
<form id="form1" name="form1" method="post" action="">
  <table border="1" align="center" cellpadding="10" style="border-collapse:collapse">
    <tr>
      <td>Photo</td>
      <td><img src="../Assets/Files/DoctorPhoto/<?php echo $data["doctor_photo"];?>" width="120" height="120"/></td>
    </tr>
    <tr>
      <td width="103">Name </td>
      <td width="131"><?php echo $data["doctor_name"]; ?></td>
    </tr>
    <tr>
      <td>Gender </td>
      <td><?php echo $data["doctor_gender"]; ?></td>
    </tr>
    <tr>
      <td>E-Mail</td>
      <td><?php echo $data["doctor_email"]; ?></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><?php echo $data["doctor_password"]; ?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><?php echo $data["doctor_contact"]; ?></td>
    </tr>
    <tr>
      <td>District</td>
      <td><?php echo $data["district_name"];?></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><?php echo $data["place_name"];?></td>
    </tr>
    <tr>
      <td>Type</td>
      <td><?php echo $data["doctortype_name"] ?></td>
      </tr>
    <tr>
      <td>Education</td>
      <td><?php echo $data["doctor_education"] ?></td>
      </tr>
    <tr>
      <td>Experience</td>
        <td><?php echo $data["doctor_experience"] ?></td>
     </tr>
  </table>
</form>
</body>
<br /><br /><br /><br /><br /><br /><br />
 <?php
include("Foot.php");
ob_flush();
?>
</html>