<a href="Homepage.php">Home </a>

<?php
include("../Assets/Connection/Connection.php");
session_start();
if(isset($_GET["aid"]))
{
		$upQry="update tbl_staffrequest set staffrequest_status ='1' where staffrequest_id=".$_GET["aid"]."";
		echo $upQry;
	if($con->query($upQry))
	{
				?>
            	<script>
				alert(" Data Updated");
				window.location="PatientRequestAcceptedList.php";
				</script>
            	<?php
	}
	else
	{
		
				?>
            	<script>
				alert("Data updation failed");
				window.location="PatientRequestAcceptedList.php";
				</script>
                <?php
      }
}
if(isset($_GET["rid"]))
{
	
		$upQry="update  tbl_staffrequest set staffrequest_status ='2' where staffrequest_id=".$_GET['rid']."";
		echo $upQry;
		if($con->query($upQry))
		{
				?>
            	<script>
				alert("Rejected");
				window.location("PatientRequestRejectedList.php");
				</script>
           	 	<?php
		}
		else
		{
				?>
            	<script>
				alert("failed..");
				window.location("PatientRequestRejectedlist.php");	
				</script>
            	<?php
		}
}
?> 


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Patient Request List</title>
</head>

<body>
<body>
<form>
  <table border="1" cellpadding="11" align="center">
<tr>
<td width="55" height="67">SI NO.</td>
<td width="46">Name</td>
<td width="60">Contact</td>
<td width="47">Email</td>
<td width="51">Place</td>
<td width="100">Status</td>



	<?php
	$selQry="SELECT * FROM tbl_staffrequest sr INNER JOIN tbl_staff f ON sr.staff_id=f.staff_id INNER JOIN tbl_place c ON c.place_id=f.place_id INNER JOIN tbl_district d ON d.district_id=c.district_id where patient_id='".$_SESSION["patientid"]."'";
	//echo $selQry;
	$row=$con->query($selQry);
	$i=0;
	while($result=$row->fetch_assoc())
	{
		$i++;
		?>
		<tr>
		<td><?php echo $i;?></td>
		
        <td><?php echo $result["staff_name"];?></td>
        <td><?php echo $result["staff_contact"];?></td>
        <td><?php echo $result["staff_email"];?></td>
        <td><?php echo $result["place_name"];?></td>
       <td>
		
		<?php
		if($result["staffrequest_status"]=="0")
		{
			echo "Pending";
		}
		else if($result["staffrequest_status"]=="1")
		{
			echo "Accepeted"; ?> | <a href="StaffRequest.php?re=<?php echo $result["staffrequest_id"]?>">Staff Reached</a>
            <?php
		}
		else if($result["staffrequest_status"]=="2")
		{
			echo "Rejected";
		}
		else {
			echo "Hai";
		}
			?>
            
        
        </td>
        <?php
	}
		?>
        
</table>
</form>
</body>
</html>

