<a href="Homepage.php">Home </a>

<?php
include("../Assets/Connection/Connection.php");
session_start();
$sql="select * from tbl_staff s inner join tbl_place p on s.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id  inner join
	tbl_service sr on sr.service_id=s.service_id where staff_id='".$_SESSION["staffid"]."'";
//$d=$con->query($district);
$Row=$con->query($sql);
$data=$Row->fetch_assoc();
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
      <td><img src="../Assets/Files/StaffPhoto/<?php echo $data["staff_photo"];?>" width="120" height="120"/></td>
    </tr>
    <tr>
      <td width="103">Name </td>
      <td width="131"><?php echo $data["staff_name"]; ?></td>
    </tr>
    <tr>
      <td>Gender </td>
      <td><?php echo $data["staff_gender"]; ?></td>
    </tr>
    <tr>
      <td>E-Mail</td>
      <td><?php echo $data["staff_email"]; ?></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><?php echo $data["staff_password"]; ?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><?php echo $data["staff_contact"]; ?></td>
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
      <td>Address</td>
      <td><?php echo $data["staff_address"] ?></td>
    </tr>
    <tr>
    <td>Service</td>
      <td><?php echo $data["service_name"] ?></td>
    </tr>
      
  </table>
</form>
</body>
</html>
