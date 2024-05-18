<a href="Homepage.php">Home </a>

<?php
include("../Assets/Connection/Connection.php");
if(isset($_GET["aid"]))
{
		$upQry="update tbl_patient set patient_status ='1' where patient_id=".$_GET["aid"]."";
		
	if($con->query($upQry))
	{
				?>
            	<script>
				alert(" Accepted");
				window.location("Patientlist.php");
				</script>
            	<?php
	}
	else
	{
		
				?>
            	<script>
				alert("failed..");
				window.location("Patientlist.php");
				</script>
                <?php
      }
}
if(isset($_GET["rid"]))
{
	
		$upQry="update  tbl_patient set patient_status ='2' where patient_id=".$_GET['rid']."";
		if($con->query($upQry))
		{
				?>
            	<script>
				alert("Rejected");
				window.location("Patientlist.php");
				</script>
           	 	<?php
		}
		else
		{
				?>
            	<script>
				alert("failed..");
				window.location("Patientlist.php");	
				</script>
            	<?php
		}
}
?> 







<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Patient list</title>
</head>
<body>
<form>
  <table border="1" cellpadding="11" align="center">
<tr>
<td width="35" height="67">SI NO.</td>
<td>Name</td>
<td>Email</td>
<td>Contact</td>
<td width="58">Age</td>
<td width="58">Date Of Birth</td>
<td width="58">Gender</td>
<td width="104">District </td>
<td width="51">Place</td>
<td width="66">House Name</td>
<td width="66">Location</td>
<td width="66">Street</td>
<td width="66">Landmark</td>
<td width="66">Pincode</td>
<td width="86">Password</td>
<td width="120">Photo</td>
<td width="120">ID Proof</td>
<td colspan="2">Action</td>
</tr>
	<?php
	$selQry="select *from tbl_patient n inner join tbl_place p on n.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id";
	$row=$con->query($selQry);
	$i=0;
	while($result=$row->fetch_assoc())
	{
			$i++;
			?>
			<tr>
			<td><?php echo$i;?></td>
			<td><?php echo $result["patient_name"];?></td>
            <td><?php echo $result["patient_email"];?></td>
            <td><?php echo $result["patient_contact"];?></td>
			<td><?php echo $result["patient_age"];?></td>
			<td><?php echo $result["patient_dob"];?></td>
            <td><?php echo $result["patient_gender"];?></td>
          	<td><?php echo $result["district_name"];?></td>
			<td><?php echo $result["place_name"];?></td>
	        <td><?php echo $result["patient_house"];?></td>
            <td><?php echo $result["patient_location"];?></td>
            <td><?php echo $result["patient_street"];?></td>
            <td><?php echo $result["patient_landmark"];?></td>
            <td><?php echo $result["patient_pincode"];?></td>
			<td><?php echo $result["patient_password"];?></td>
			
        <td><img src="../Assets/Files/patientPhoto/<?php echo $result["patient_photo"];?>" width="120" height="120"/></td>
		<td><img src="../Assets/Files/PatientProof/<?php echo $result["patient_proof"];?>" width="120" height="120"/></td>
		
        <td width="75">
            <a href="PatientList.php?aid=<?php echo $result["patient_id"]?>">Accepted</a></td>
             <td width="70">
            <a href="PatientList.php?rid=<?php echo $result["patient_id"]?>">Rejected</a></td>
            </tr>
    	<?php
	}
	?>
</table>
</form>
</body>
</html>