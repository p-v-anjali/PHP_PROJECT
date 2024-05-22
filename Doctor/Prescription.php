<a href="Homepage.php">Home </a>
<?php
include("../Assets/Connection/Connection.php");
session_start();


if(isset($_POST["btnsubmit"]))
{
	$Prescription=$_POST["txtpre"];
     $drid=$_GET["pid"];
	$in="insert into tbl_prescription(prescription_details,doctorrequest_id)values('".$Prescription."','".$_SESSION["request"]."')";
		
	//echo $in;
	if($con->query($in))
	{
		?>
        <script>
		         alert("Data Updated");
				 window.location="Prescription.php";
		</script>
        <?php
		
	}
	else
	{
		?>
        <script>
		         alert("Data Updation failed");
				 window.location="Precription.php";
		</script>
        <?php
	}
}
?>


	
	

	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Prescription</title>
</head>

<body>

<p>&nbsp;</p>
<form id="form1" name="form1" method="post" action="">
<table border="1" align="center" cellpadding="10" style="border-collapse:collapse">
<p>&nbsp;</p>
	<tr>
	  

<center><h1><u><i>Prescription</i></u></h1></center>
  </tr>

<form name="form1" method="post" action="">
 <table  border="1"align="center" cellpadding="10" style="border-collapse:collapse">
    
      <td width="142">Prescription</td>
      <td width="157"><label for="txtpre"></label>
      <textarea name="txtpre" id="txtpre" cols="45" rows="5"></textarea></td>
    
    <tr>
      <td height="31" colspan="2"align="center">
      <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />        <input type="reset" name="btncancel" id="btncancel" value="Cancel"></td>
    </tr>
  </table>
</form>
</body>
</html>
