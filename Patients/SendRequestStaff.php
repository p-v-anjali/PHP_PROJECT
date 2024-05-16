<a href="Homepage.php">Home </a>

<?php
include("../Assets/Connection/Connection.php");
session_start();

$sel="select * from tbl_staff s inner join tbl_place p on p.place_id=s.place_id inner join tbl_district dt on dt.district_id=p.district_id where s.staff_id='".$_GET["did"]."'";
//echo $sel;
//$d=$con->query($district);
$Row=$con->query($sel);
$data=$Row->fetch_assoc();
if(isset($_POST["btnsend"]))
{
$did=$_GET["did"];
$pid=$_SESSION["patientid"];
$Subject=$_POST["txtsubject"];
$insQry="insert into tbl_staffrequest(staff_id,patient_id,staffrequest_subject,staffrequest_date,staffrequest_time,service_id)
values('".$did."','".$pid."','".$Subject."',curdate(),curtime(),'".$_POST["sels"]."')";
//echo $insQry;
if($con->query($insQry))
	{
			?>
    		<script>
			alert("Data Inserted");
			window.location("staffrequest.php");
			</script>
    		<?php
	}	
	else
	{
			?>
			<script>
			alert("Data insertion Failed");
			window.location("staffrequest.php");
			</script>
    		<?php
	}
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Send Request Staff</title>
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
      <td>E-Mail</td>
      <td><?php echo $data["staff_email"]; ?></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><?php echo $data["place_name"];?></td>
    </tr>
    <tr>
      <td>Experience</td>
        <td><?php echo $data["staff_experience"] ?></td>
     </tr>
      <tr>
      <td>Service</td>
       <td><label for="sels"></label>
         <select name="sels" id="sels">
         <option value="">---Select---</option>
         <?php
		 $selr="select * from tbl_service";
		 $rows=$con->query($selr);
		 while($datas=$rows->fetch_assoc())
		 {
			 
		 ?>
         <option value="<?php echo $datas["service_id"]?>"><?php echo $datas["service_name"]?></option>
         <?php
		 }
		 ?>
        </select></td> 
     </tr>
    <tr>
      <td>Subject</td>
      <td><label for="txtsubject"></label>
      <textarea name="txtsubject" id="txtsubject" cols="45" rows="5"></textarea></td>
    </tr>
    
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsend" id="btnsend" value="Send" /></td>
    </tr>
    
  </table>
</form>
</body>
</html>