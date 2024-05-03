<a href="Homepage.php">Home </a>

<?php
include("../Assets/Connection/Connection.php");
if(isset($_GET["aid"]))
{
		$upQry="update tbl_doctor set doctor_status ='1' where doctor_id=".$_GET["aid"]."";
		
	if($con->query($upQry))
	{
				?>
            	<script>
				alert(" Accepted");
				window.location("doctorlist.php");
				</script>
            	<?php
	}
	else
	{
		
				?>
            	<script>
				alert(" failed..");
				window.location("doctorlist.php");
				</script>
                <?php
      }
}
if(isset($_GET["rid"]))
{
	
		$upQry="update  tbl_doctor set doctor_status ='2' where doctor_id=".$_GET['rid']."";
		if($con->query($upQry))
		{
				?>
            	<script>
				alert("Rejected");
				window.location("doctorlist.php");
				</script>
           	 	<?php
		}
		else
		{
				?>
            	<script>
				alert("failed..");
				window.location("doctorlist.php");	
				</script>
            	<?php
		}
}
?> 







<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Doctor List</title>
</head>
<body>
<i><center><h1><b><u> Doctor List</u></b></h1></center></i>
<form>
<table width="2329" border="1" align="center" cellpadding="11">
<tr>
<td width="58" height="67">SI NO</td>
<td width="150">Name</td>
<td width="47">Email</td>
<td width="61">Contact</td>
<td width="45">Age</td>
<td width="110">Date Of Birth</td>
<td width="58">Gender</td>
<td width="40">Type</td>
<td width="96">Education</td>
<td width="89">Experience</td>
<td width="89">Consulting fees</td>
<td width="65">District </td>
<td width="44">Place</td>
<td width="55">House Name</td>
<td width="69">Location</td>
<td width="46">Street</td>
<td width="78">Landmark</td>
<td width="64">Pincode</td>
<td width="78">Password</td>
<td width="120">Photo</td>
<td width="120">ID Proof</td>
<td colspan="10">Action</td>
</tr>
	<?php
	$selQry="select * from tbl_doctor r inner join tbl_place p on r.place_id=p.place_id inner join tbl_district dt on dt.district_id=p.district_id inner join tbl_doctortype tp on tp.doctortype_id=r.doctortype_id";
	$row=$con->query($selQry);
	$i=0;
	while($result=$row->fetch_assoc())
	{
		$i++;
		?>
		<tr>
		<td height="144"><?php echo $i;?></td>
		<td><?php echo $result["doctor_name"];?></td>
        <td><?php echo $result["doctor_email"];?></td>
        <td><?php echo $result["doctor_contact"];?></td>
		<td><?php echo $result["doctor_age"];?></td>
		<td><?php echo $result["doctor_dob"];?></td>
		<td><?php echo $result["doctor_gender"];?></td>
        <td><?php echo $result["doctortype_name"];?></td>
        <td><?php echo $result["doctor_education"];?></td>
        <td><?php echo $result["doctor_experience"];?></td>
        <td><?php echo $result["doctor_fees"];?></td>
		<td><?php echo $result["district_name"];?></td>
		<td><?php echo $result["place_name"];?></td>
        <td><?php echo $result["doctor_house"];?></td>
        <td><?php echo $result["doctor_location"];?></td>
        <td><?php echo $result["doctor_street"];?></td>
        <td><?php echo $result["doctor_landmark"];?></td>
        <td><?php echo $result["doctor_pincode"];?></td>
        <td><?php echo $result["doctor_password"];?></td>
       
        		
        
       
		<td><img src="../Assets/Files/DoctorPhoto/<?php echo $result["doctor_photo"];?>" width="120" height="120"/></td>
         <td><img src="../Assets/Files/DoctorProof/<?php echo $result["doctor_proof"];?>" width="120" height="120"/></td>
        
        
		
		
        
        
        <td width="75">
            <a href="doctorList.php?aid=<?php echo $result["doctor_id"]?>">Accepted</a></td>
             <td width="70">
            <a href="doctorList.php?rid=<?php echo $result["doctor_id"]?>">Rejected</a></td>
            </tr>
    	<?php
	}
	?>
</table>
</form>
</body>
</html>


