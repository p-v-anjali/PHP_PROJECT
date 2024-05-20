<a href="Homepage.php">Home </a>
<?php
include("../Assets/Connection/Connection.php");
session_start();

?> 


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Patient Request List</title>
<style>
.green{
	background-color:green;
	text-align:center;
}
.orange{
	background-color:orange;
	text-align:center;
}
.red{
	background-color:red;
	text-align:center;
}
</style>
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
<td width="46">Place</td>
<td width="46">Status</td>
<td width="46">Appointment Date</td>
<td width="46">Appointment Time</td>


</tr>
	<?php
	$selQry="SELECT * FROM tbl_doctorrequest dr INNER JOIN tbl_doctor t ON dr.doctor_id=t.doctor_id INNER JOIN tbl_place c ON c.place_id=t.place_id INNER JOIN tbl_district d ON d.district_id=c.district_id where patient_id='".$_SESSION["patientid"]."'";
	$row=$con->query($selQry);
	$i=0;
	while($result=$row->fetch_assoc())
	{
		$i++;
		?>
		<tr>
		<td><?php echo $i;?></td>
		<td><?php echo $result["doctor_name"];?></td>
        <td><?php echo $result["doctor_contact"];?></td>
        <td><?php echo $result["doctor_email"];?></td>
		<td><?php echo $result["place_name"];?></td>
        
		
			<?php
		if($result["doctorrequest_status"]==0)
		{
			?>
			<td class="orange"><?php echo "Pending";?></td>
            <?php
		}
		else if($result["doctorrequest_status"]==1)
		{
			?>
            <td class="green">
			<?php echo "Accepeted";?></td>
            <?php
		}
		else if($result["doctorrequest_status"]==2)
		{
			?>
            <td class="red">
			<?php echo "Rejected";?></td><?php
		}
		else if($result["doctorrequest_status"]==3)
		{
			?>
            <td class="green">
			<?php echo "Appointment Fixed After View Doctor U can View Here the Prescribtion Here...";?></td><?php
		}
		else if($result["doctorrequest_status"]==4)
		{
			?>
            <td class="green">
			<a href="DoctorPayment.php?fees=<?php echo $result["doctor_fees"]?>&rid=<?php echo $result["doctorrequest_id"]?>">Pay Now</a></td><?php
		}
		else if($result["doctorrequest_status"]==5)
		{
			?>
            <td class="green">
			<a href="ViewPrescription.php?pid=<?php echo $result["doctorrequest_id"]?>">View Prescription</a></td><?php
		}
		
		else
		{
		
			?>
           <td></td> 
        
        
        


    	<?php
		}
		?>
        <td><?php echo $result["appointment_date"]?></td>
        <td><?php echo $result["appointment_time"]?></td>
        <?php
		
	}
	?>
</table>
</form>
</body>
</html>

</html>
       
     
    
