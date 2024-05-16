
<a href="Homepage.php">Home </a>

<?php
include("../Assets/Connection/Connection.php");
session_start();

$sel="select * from tbl_doctor d inner join tbl_place p on p.place_id=d.place_id inner join tbl_district dt on dt.district_id=p.district_id inner join tbl_doctortype tp on tp.doctortype_id=d.doctortype_id where d.doctor_id='".$_GET["did"]."'";
//$d=$con->query($district);
$Row=$con->query($sel);
$data=$Row->fetch_assoc();
if(isset($_POST["btnsend"]))
{
$did=$_GET["did"];
$pid=$_SESSION["patientid"];
$Subject=$_POST["txtsubject"];
$Message=$_POST["txtmessage"];
$insQry="insert into tbl_doctorrequest(doctor_id,patient_id,doctorrequest_subject,doctorrequest_message,doctorrequest_date,doctorrequest_time)
values('".$did."','".$pid."','".$Subject."','".$Message."',curdate(),curtime())";
//echo $insQry;
if($con->query($insQry))
	{
			?>
    		<script>
			alert("Data Inserted");
			window.location("doctorrequest.php");
			</script>
    		<?php
	}	
	else
	{
			?>
			<script>
			alert("Data insertion Failed");
			window.location("doctorrequest.php");
			</script>
    		<?php
	}
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Send Request Doctor</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table border="1" align="center" cellpadding="10" style="border-collapse:collapse">
    <tr>
      <td colspan="2" align="center"><img src="../Assets/Files/DoctorPhoto/<?php echo $data["doctor_photo"];?>" width="120" height="120"/></td>
    </tr>
    <tr>
      <td width="103">Name </td>
      <td width="131"><?php echo $data["doctor_name"]; ?></td>
    </tr>
   
    <tr>
      <td>E-Mail</td>
      <td><?php echo $data["doctor_email"]; ?></td>
    </tr>
    <tr>
      <td>Experience</td>
        <td><?php echo $data["doctor_experience"] ?></td>
     </tr>
    <tr>
      <td>Subject</td>
      <td><label for="txtsubject"></label>
      <textarea name="txtsubject" id="txtsubject" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td>Message</td>
      <td><label for="txtmessage"></label>
      <textarea name="txtmessage" id="txtmessage" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsend" id="btnsend" value="Send" /></td>
    </tr>
    
  </table>
</form>
</body>
</html>