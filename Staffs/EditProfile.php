<a href="Homepage.php">Home </a>

<?php

include("../Assets/Connection/Connection.php");

session_start();


if(isset($_POST["btnupdate"]))
{
	$contact = $_POST["txtcontact"];
	$email = $_POST["txtemail"];
	$name= $_POST["txtname"];
	$address= $_POST["txtaddress"];
	
	
	$upQry="update tbl_staff set staff_name='".$name."', staff_contact='".$contact."',staff_email='".$email."',staff_address='".$address."'
	 where staff_id='".$_SESSION["staffid"]."'";
	
	
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
$sql="select * from tbl_staff s inner join tbl_place p on s.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where 
staff_id='".$_SESSION["staffid"]."'";
//$d=$con->query($district);
$Row=$con->query($sql);
$data=$Row->fetch_assoc();

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Profile</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table border="1" align="center" cellpadding="10" style="border-collapse:collapse">
    <tr>
      <td>Name</td>
      <td><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" value=" <?php echo $data["staff_name"]?> " /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txtcontact"></label>
      <input type="text" name="txtcontact" id="txtcontact" value="<?php echo $data["staff_contact"]?>"  /> </td>
  </tr>
    <tr>
      <td>Email</td>
      <td><label for="txtemail"></label>
      <input type="text" name="txtemail" id="txtemail" value="<?php echo $data["staff_email"]?>"  /></td>
    </tr>
   
    <tr>
      <td><input type="submit" name="btnupdate" id="btnupdate" value="Update" /></td>
      
    </tr>
  </table>
</form>
</body>
</html>
