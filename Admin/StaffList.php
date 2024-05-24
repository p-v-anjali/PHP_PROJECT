<a href="Homepage.php">Home </a>

<?php
include("../Assets/Connection/Connection.php");
if(isset($_GET["aid"]))
{
		$upQry="update tbl_staff set staff_status ='1' where staff_id=".$_GET["aid"]."";
		
		if($con->query($upQry))
		{
				?>
            	<script>
				alert(" Data Updated");
				window.location("stafflist.php");
				</script>
            	<?php
		}
		else
		{
		
				?>
            	<script>
				alert("Data updation failed");
				window.location("stafflist.php");
				</script>
                <?php
      	}
}
if(isset($_GET["rid"]))
{
	
		$upQry="update  tbl_staff set staff_status ='2' where staff_id=".$_GET['rid']."";
		if($con->query($upQry))
		{
				?>
            	<script>
				alert("Rejected");
				window.location("stafflist.php");
				</script>
           	 	<?php
		}
		else
		{
				?>
            	<script>
				alert("failed..");
				window.location("stafflist.php");	
				</script>
            	<?php
		}
}
?> 







<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Staff List</title>
</head>
<body>
<form>
  <table border="1"  cellpadding="10"align="center">
<tr>
<td width="55" height="67">SI NO.</td>
<td>Name</td>
<td>Email</td>
<td>Contact</td>
<td width="58">Age</td>
<td width="58">Date Of Birth</td>
<td width="58">Gender</td>
<td width="120">Service</td>
<td width="66">Experience</td>
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
	$selQry="select *from tbl_staff s inner join tbl_place p on s.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id inner join
	tbl_service sr on sr.service_id=s.service_id";
	//echo $selQry;
	$row=$con->query($selQry);
	$i=0;
	while($result=$row->fetch_assoc())
	{
			$i++;
			?>
			<tr>
			<td height="142"><?php echo $i;?></td>
			<td><?php echo $result["staff_name"];?></td>
            <td><?php echo $result["staff_email"];?></td>
            <td><?php echo $result["staff_contact"];?></td>
			<td><?php echo $result["staff_age"];?></td>
			<td><?php echo $result["staff_dob"];?></td>
            <td><?php echo $result["staff_gender"];?></td>
			<td><?php echo $result["service_name"];?></td>
            <td><?php echo $result["staff_experience"];?></td>
          	<td><?php echo $result["district_name"];?></td>
			<td><?php echo $result["place_name"];?></td>
	        <td><?php echo $result["staff_house"];?></td>
            <td><?php echo $result["staff_location"];?></td>
            <td><?php echo $result["staff_street"];?></td>
            <td><?php echo $result["staff_landmark"];?></td>
            <td><?php echo $result["staff_pincode"];?></td>
			<td><?php echo $result["staff_password"];?></td>
			<td><img src="../Assets/Files/StaffPhoto/<?php echo $result["staff_photo"];?>" width="120" height="120"/></td>
			<td><img src="../Assets/Files/StaffProof/<?php echo $result["staff_proof"];?>" width="120" height="120"/></td>
	
        	<td>
            <a href="staffList.php?aid=<?php echo $result["staff_id"]?>">Accepted</a></td>
             <td width="70">
            <a href="staffList.php?rid=<?php echo $result["staff_id"]?>">Rejected</a></td>
            </tr>
            <?php
	}

	?>
</table>
</form>
</body>
</html>


