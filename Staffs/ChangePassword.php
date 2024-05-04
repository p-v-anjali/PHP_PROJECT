<a href="Homepage.php">Home </a>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Password</title>
</head>
<br /><br /><br /><br /><br /><br /><br /><br />
<body>
<?php
ob_start();
	session_start();
	include("../Assets/Connection/connection.php");
	if(isset($_POST["btnsave"]))
	{
		$selq="select * from tbl_staff where staff_password='".$_POST["txtcurrent"]."' and staff_id='".$_SESSION["staffid"]."'";
		echo $selq;
		$row=$con->query($selq);
		if($data=$row->fetch_assoc())
		{
			if($_POST["txtnew"]==$_POST["txtcon"])
			{
				$up="update tbl_staff set staff_password='".$_POST["txtnew"]."' where staff_id='".$_SESSION["staffid"]."'";
				if($con->query($up))
		{
			?>
        <script>
		alert("Profile Updated");
		location.href="EditProfile.php";
		</script>
        <?php
		}
			}
			else
			{
				?>
        <script>
		alert("Password Mismatch");
		location.href="ChangePassword.php";
		</script>
        <?php
			}
		}
		else
		{
			?>
        <script>
		alert("Current Password Is Wrong");
		location.href="ChangePassword.php";
		</script>
        <?php
		}
	}
	include("Head.php");
	?>
<form id="form1" name="form1" method="post" action="">
  <table  border="1" cellpadding="10" align="center">
    <tr>
      <td>Current Password</td>
      <td><label for="txtcurrent"></label>
      <input type="password" name="txtcurrent" id="txtcurrent" required="required" autocomplete="off" /></td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><label for="txtnew"></label>
      <input type="password" name="txtnew" id="txtnew" required="required" autocomplete="off" /></td>
    </tr>
    <tr>
      <td>Confirm Password</td>
      <td><label for="txnew"></label>
      <input type="password" name="txtcon" id="txtcon" required="required" autocomplete="off" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btnsave" id="btnsave" value="Change" />
      <input type="submit" name="btnc" id="btnc" value="Cancel" /></td>
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