<a href="Homepage.php">Home </a>


<?php
ob_start();
include("../Assets/Connection/Connection.php");

session_start();


if(isset($_POST["btnupdate"]))
{
	$contact = $_POST["txtcontact"];
	$email = $_POST["txtemail"];
	$name= $_POST["txtname"];
	
	$education=$_POST["txteducation"];
	$experience=$_POST["txtexperience"];
	
	
	$upQry="update tbl_doctor set doctor_name='".$name."', doctor_contact='".$contact."',doctor_email='".$email."',doctor_address='".$address."',doctor_education='".$education."',doctor_experience='".$experience."'where doctor_id='".$_SESSION["doctorid"]."'";
	
	
	if($con->query($upQry))
	{
		?>
        <script>
		         alert("Data Updated");
		</script>
        <?php
		header("location:MyProfile.php");
	}
	else
	{
		?>
        <script>
		         alert("Data Updation failed");
				 window.location("MyProfile.php");
		</script>
        <?php
	}
}
$sql="select * from tbl_doctor r inner join tbl_place p on r.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where 
doctor_id='".$_SESSION["doctorid"]."'";
//$d=$con->query($district);
$Row=$con->query($sql);
$data=$Row->fetch_assoc();
include("Head.php");
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Profile</title>
</head>
<br /><br /><br /><br /><br /><br />
<body>
<center><b><u><h1> Edit Profile</h1></u></b></center>
<form id="form1" name="form1" method="post" action="">
  <table border="1" align="center" cellpadding="10" style="border-collapse:collapse">
    <tr>
      <td>Name</td>
      <td><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" value=" <?php echo $data["doctor_name"]?> " /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txtcontact"></label>
      <input type="text" name="txtcontact" id="txtcontact" value="<?php echo $data["doctor_contact"]?>"  /> </td>
  </tr>
    <tr>
      <td>Email</td>
      <td><label for="txtemail"></label>
      <input type="text" name="txtemail" id="txtemail" value="<?php echo $data["doctor_email"]?>"  /></td>
    </tr>
   <tr>
      <td>Education</td>
      <td><label for="txteducation"></label>
      <input type="text" name="txteducation" id="txteducation" value="<?php echo $data["doctor_education"]?>"  /></td>
    </tr>
    <tr>
      <td>Experience</td>
      <td><label for="txtexperience"></label>
      <input type="text" name="txtexperience" id="txtexperience" value="<?php echo $data["doctor_experience"]?>"  /></td>
    </tr>
    <tr>
      <td><input type="submit" name="btnupdate" id="btnupdate" value="Update" /></td>
      
    </tr>
  </table>
</form>
</body>
<br /><br /><br /><br /><br /><br />
 <?php
include("Foot.php");
ob_flush();
?>
</html>
