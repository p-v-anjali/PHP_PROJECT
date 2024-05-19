<a href="Homepage.php">Home </a>

<?php
session_start();

include("../Assets/Connection/Connection.php");
if(isset($_GET["pid"]))
{
	$_SESSION["request"]=$_GET["pid"];
	$up="update tbl_doctorrequest set doctorrequest_status=4 where doctorrequest_id='".$_SESSION["request"]."'";
	if($con->query($up))
	{
		header("Location:Prescription.php");
	}
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>	Scheduled Patient</title>
</head>
<body>
  <table width="1108" border="1">
    <tr>
      <td width="50" height="97">SI NO</td>
      <td width="100">Name</td>
      <td width="100">Photo</td>
      <td width="100">Gender</td>
      <td width="77">Contact</td>
      <td width="100">Email</td>
      <td width="100">Place</td>
      <td width="100">Subject</td>
      <td width="100">Message</td>
      <td width="100">Date</td>
      <td width="100">Time</td>
      <td width="100">Prescription</td>
      <td>Status</td>
     
    </tr>
    <?php
      $selQry="SELECT * FROM tbl_doctorrequest dr INNER JOIN tbl_patient p ON dr.patient_id=p.patient_id INNER JOIN tbl_place c ON c.place_id=p.place_id INNER JOIN tbl_district d ON d.district_id=c.district_id where  dr.doctorrequest_status>=3 and dr.doctor_id='".$_SESSION["doctorid"]."'";
	 // echo $selQry;
	  $i=0;
	  $row=$con->query($selQry);
	
	  while($result=$row->fetch_assoc())
	{
		$i++;
		?>
		<tr>
		<td><?php echo $i;?></td>
		<td><?php echo $result["patient_name"];?></td>
        
         <td><img src="../Assets/Files/patientPhoto/<?php echo $result["patient_photo"];?>" width="120" height="120"/></td>
		
		<td><?php echo $result["patient_gender"];?></td>
		<td><?php echo $result["patient_contact"];?></td>
		<td><?php echo $result["patient_email"];?></td>
		<td><?php echo $result["place_name"];?></td>
		<td><?php echo $result["doctorrequest_subject"];?></td>
		<td><?php echo $result["doctorrequest_message"];?></td>
        <td><?php echo $result["appointment_date"];?></td>
        <td><?php echo $result["appointment_time"];?></td>
        <td><a href="ScheduledPatient.php?pid=<?php echo $result["doctorrequest_id"]?>">Prescription</a></td>
        <?php
		if($result["doctorrequest_status"]==5)
		{
			?>
			<td class="green">Payment Completed</td>
            <?php
		}
		else
		{
			?>
			<td class="orange">Payment Not Completed</td>
            <?php
			
		}
		?>
       
       <?php
       }
	   ?>
       
       </table>
       </form>
</body>
</html>

