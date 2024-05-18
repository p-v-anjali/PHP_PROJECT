<a href="Homepage.php">Home </a>

<?php
include("../Assets/Connection/Connection.php");
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Patient Accepted List</title>
</head>
<body><form enctype="multipart/form-data">
<table border="1" cellpadding="11" align="center">
<tr>
<td width="35" height="67">SI NO.</td>
<td>Name</td>
<td>Email</td>
<td>Contact</td>
<td>Age</td>
<td>Date Of Birth</td>
<td>Gender</td>
<td>District </td>
<td>Place</td>
<td>House Name</td>
<td>Location</td>
<td>Street</td>
<td>Landmark</td>
<td>Pincode</td>
<td>Password</td>
<td>Photo</td>
<td>ID Proof</td>
</tr>
 <?php
      $selQry="select * from tbl_patient n inner join tbl_place p on n.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where patient_status='1'";
	  $row=$con->query($selQry);
	  $i=0;
	  while($data=$row->fetch_assoc())
	  {
		  $i++;
	   		?>
       	  		 	<tr>
                  	<td><?php echo $i?></td>
                  	<td><?php echo $data["patient_name"]?></td>
                   	<td><?php echo $data["patient_email"]?></td>
                   	<td><?php echo $data["patient_contact"]?></td>
                    <td><?php echo $data["patient_age"];?></td>
				  	<td><?php echo $data["patient_dob"];?></td>
                   	<td><?php echo $data["patient_gender"]?></td>
                 	<td><?php echo $data["district_name"];?></td>
                 	<td><?php echo $data["place_name"]?></td>
                   	<td><?php echo $data["patient_house"];?></td>
                    <td><?php echo $data["patient_location"];?></td>
                    <td><?php echo $data["patient_street"];?></td>
                    <td><?php echo $data["patient_landmark"];?></td>
                    <td><?php echo $data["patient_pincode"];?></td>
                    <td><?php echo $data["patient_password"];?></td>
                    
                 	
                    <td><img src="../Assets/Files/PatientPhoto/<?php echo $data["patient_photo"];?>" width="120" height="120"/></td>
     			   	<td><img src="../Assets/Files/PatientProof/<?php echo $data["patient_proof"];?>" width="120" height="120"/></td>
               	 	</tr>
       <?php
	  }
	   ?>
       </table>
       </form>
       </body>
       </html>
               
            
                  
				  
                 
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                   