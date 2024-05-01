<a href="Homepage.php">Home </a>

<?php
session_start();
include("../Assets/Connection/Connection.php");

if(isset($_GET["pid"]))
{
	$up="update tbl_staffrequest set staffrequest_status=3 where staffrequest_id='".$_GET["pid"]."'";
	$con->query($up);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Assigned Staffs</title>
</head>
<body><form enctype="multipart/form-data">
<table border="1" cellpadding="11" align="center">
 	<tr>
   <td width="33" height="72">SI NO.</td>
   <td width="46">Name</td>
   <td width="123">Photo</td>
   <td width="59">Gender</td>
   <td width="60">Contact</td>
   <td width="47">Email</td>
   <td width="78">Place</td>
   <td width="100">Status</td>
  
   
 	<?php
      $selQry="SELECT * FROM tbl_staffrequest s  inner join tbl_service ss on ss.service_id=s.service_id INNER JOIN tbl_staff t ON s.staff_id=t.staff_id INNER JOIN tbl_place c ON c.place_id=t.place_id INNER JOIN tbl_district d ON d.district_id=c.district_id where s.patient_id='".$_SESSION["patientid"]."'";
	  //echo $selQry;
	  $row=$con->query($selQry);
	  $i=0;
	  while($data=$row->fetch_assoc())
	  {
		  $i++;
	   ?>
       	   		  <tr>
                  <td><?php echo $i?></td>
                  <td><?php echo $data["staff_name"]?></td>
                  
                  <td><img src="../Assets/Files/StaffPhoto/<?php echo $data["staff_photo"];?>" width="120" height="120"/></td>
                  
                  <td><?php echo $data["staff_gender"]?></td>
                  <td><?php echo $data["staff_contact"]?></td>
                  <td><?php echo $data["staff_email"]?></td>
               	  <td><?php echo $data["staff_name"]?></td>
                  <td>
                  <?php
				  if($data["staffrequest_status"]==1)
				  {
					  echo "Accepted";?> |<a href="AssignedStaffs.php?pid=<?php echo $data["staffrequest_id"]?>">Staff Reached</a><?php
				  }
				  else if($data["staffrequest_status"]==3)
				  {
					  echo "Staff Reached Home...";
				  }
				  else if($data["staffrequest_status"]==2)
				  {
					  echo "Rejected";
				  }
				   else if($data["staffrequest_status"]==4)
				  {
					  echo "Work Completed";?>|<a href="StaffPayment.php?pid=<?php echo $data["staffrequest_id"]?>&fees=<?php echo $data["service_amount"]?>">Pay Now</a><?php
				  }
				   else if($data["staffrequest_status"]==5)
				  {
					  echo "Payment Completed";
				  }
				  else 
				  {
					  echo "Pending...";
				  }
                  ?></td>
                 <?php
				
                 
	  				}
	  			?>
                  

</table>
</form>
</body>
</html>