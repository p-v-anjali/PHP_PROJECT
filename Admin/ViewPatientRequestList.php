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
	<td width="58">Gender</td>
	<td width="60">Contact</td>
	<td width="47">Email</td>
	<td width="78">Password</td>
	<td width="104">District Name</td>
	<td width="51">Place</td>
	<td width="120">Photo</td>
	<td width="66">Address</td>
	<td width="66">Subject</td>
	<td colspan="2">Action</td>
	</tr>
	<?php
	$selQry="SELECT * FROM tbl_staffrequest s INNER JOIN tbl_patient p ON s.patient_id=p.patient_id INNER JOIN tbl_place c ON c.place_id=p.place_id INNER JOIN tbl_district d ON d.district_id=c.district_id";
	//echo $selQry;
	$row=$con->query($selQry);
	$i=0;
	while($result=$row->fetch_assoc())
	{
			$i++;
			?>
			<tr>
			<td><?php echo $i;?></td>
			<td><?php echo $result["patient_name"];?></td>
			<td><?php echo $result["patient_gender"];?></td>
			<td><?php echo $result["patient_contact"];?></td>
			<td><?php echo $result["patient_email"];?></td>
			<td><?php echo $result["patient_password"];?></td>
			<td><?php echo $result["district_name"];?></td>
			<td><?php echo $result["place_name"];?></td>
		
        
        <td><img src="../Assets/Files/patientPhoto/<?php echo $result["patient_photo"];?>" width="120" height="120"/></td>
		
			<td><?php echo $result["patient_address"];?></td>
			<td><?php echo $result["staffrequest_subject"];?></td>
        	<td>
            
            <a href="ViewPatientRequestList.php?aid=<?php echo $result["staffrequest_id"]?>">Accepted</a></td>
             <td width="70">
            <a href="ViewPatientRequestList.php?rid=<?php echo $result["staffrequest_id"]?>">Rejected</a></td>
            </tr>
    	<?php
	}
	?>
</table>
</form>
</body>
</html>

