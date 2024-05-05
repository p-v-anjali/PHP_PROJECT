<a href="Homepage.php">Home </a>

<?php
ob_start();
session_start();
include("../Assets/Connection/Connection.php");
if(isset($_GET["pid"]))
{
	$up="update tbl_staffrequest set staffrequest_status=4 where staffrequest_id='".$_GET["pid"]."'";
	$con->query($up);
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Assigned Patient List</title>
</head>
<br /><br /><br /><br /><br /><br />
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
   <td width="78">Subject</td>
   <td width="80">Status</td>
   
 	<?php
      $selQry="SELECT * FROM tbl_staffrequest s INNER JOIN tbl_patient p ON s.patient_id=p.patient_id INNER JOIN tbl_place c ON c.place_id=p.place_id INNER JOIN tbl_district d ON d.district_id=c.district_id where s.staffrequest_status>=1 and s.staff_id='".$_SESSION["staffid"]."'";
	  //echo $selQry;
	  $row=$con->query($selQry);
	  $i=0;
	  while($data=$row->fetch_assoc())
	  {
		  $i++;
	   ?>
       	   		  <tr>
                  <td><?php echo $i?></td>
                  <td><?php echo $data["patient_name"]?></td>
                  
                  <td><img src="../Assets/Files/PatientPhoto/<?php echo $data["patient_photo"];?>" width="120" height="120"/></td>
                  
                  <td><?php echo $data["patient_gender"]?></td>
                  <td><?php echo $data["patient_contact"]?></td>
                  <td><?php echo $data["patient_email"]?></td>
               	  <td><?php echo $data["place_name"]?></td>
                  <td><?php echo $data["staffrequest_subject"]?></td>
                  <td>
                   <?php
				  if($data["staffrequest_status"]==1)
				  {
					  echo "";?> <?php
				  }
				  else if($data["staffrequest_status"]==3)
				  {
					  ?>
					 <a href="AssignedPatientList.php?pid=<?php echo $data["staffrequest_id"]?>">Work Completed</a><?php
				  }
				  
				   else if($data["staffrequest_status"]==4)
				  {
					  echo "Work Completed";?><?php
				  }
				  
                 else
				 {
					 echo"payment completed";
				 }
                  ?>
				 </td>
                 <?php
				
                 
	  				}
					include("Head.php");
	  			?>
             
    </table>
</form>
</body>
<br /><br /><br /><br /><br /><br />
<?php
include("Foot.php");
ob_flush();
?>
</html>