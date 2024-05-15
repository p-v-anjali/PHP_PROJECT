<a href="Homepage.php">Home </a>

<?php

include("../Assets/Connection/Connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Patient Request Accepted List</title>
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
   <td width="78">Subject</td>
   <td width="78">Message</td>
   <td width="78">Appoinment</td>
  
   
   

 <?php
      $selQry="SELECT * FROM tbl_doctorrequest dr INNER JOIN tbl_patient p ON dr.patient_id=p.patient_id INNER JOIN tbl_place c ON c.place_id=p.place_id INNER JOIN tbl_district d ON d.district_id=c.district_id where dr.doctorrequest_status=1";
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
                  <td><?php echo $data["doctorrequest_subject"]?></td>
               	  <td><?php echo $data["doctorrequest_message"]?></td>
                 <td><a href="Appoinment.php?pid=<?php echo $data["doctorrequest_id"]?>">View More</a></td>

                 
       <?php
	  }
	   ?>
       </table>
       </form>
</body>
</html>