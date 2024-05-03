<a href="Homepage.php">Home </a>

<?php
include("../Assets/Connection/Connection.php");
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Doctor Rejected List</title>
</head>
<body>
<i><center><h1><b><u> Doctor Rejected List</u></b></h1></center></i>
<form enctype="multipart/form-data">
<table border="1" cellpadding="11" align="center">
 <tr>
<td width="50" height="67">SI NO</td>
<td width="53">Name</td>
<td width="47">Email</td>
<td width="75">Contact</td>
<td width="58">Age</td>
<td width="58">Date Of Birth</td>
<td width="58">Gender</td>
<td width="83">Type</td>
<td width="83">Education</td>
<td width="100">Experience</td>
<td width="150">Consulting fees</td>
<td width="116">District Name</td>
<td width="73">Place</td>
<td width="66">House Name</td>
<td width="66">Location</td>
<td width="66">Street</td>
<td width="66">Landmark</td>
<td width="66">Pincode</td>
<td width="86">Password</td>
<td width="120">Photo</td>
<td width="120">ID Proof</td>
   </tr>
 <?php
      $selQry="select * from tbl_doctor u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id inner join tbl_doctortype dt on u.doctortype_id=dt.doctortype_id where doctor_status='2'";
	  $row=$con->query($selQry);
	  $i=0;
	  while($data=$row->fetch_assoc())
	  {
		  $i++;
	   ?>
       	   <tr>
		<td><?php echo $i;?></td>
		<td><?php echo $data["doctor_name"];?></td>
        <td><?php echo $data["doctor_email"];?></td>
        <td><?php echo $data["doctor_contact"];?></td>
		<td><?php echo $data["doctor_age"];?></td>
		<td><?php echo $data["doctor_dob"];?></td>
		<td><?php echo $data["doctor_gender"];?></td>
        <td><?php echo $data["doctortype_name"];?></td>
        <td><?php echo $data["doctor_education"];?></td>
        <td><?php echo $data["doctor_experience"];?></td>
        <td><?php echo $data["doctor_fees"];?></td>
		<td><?php echo $data["district_name"];?></td>
		<td><?php echo $data["place_name"];?></td>
        <td><?php echo $data["doctor_house"];?></td>
        <td><?php echo $data["doctor_location"];?></td>
        <td><?php echo $data["doctor_street"];?></td>
        <td><?php echo $data["doctor_landmark"];?></td>
        <td><?php echo $data["doctor_pincode"];?></td>
        <td><?php echo $data["doctor_password"];?></td>

                 
        <td><img src="../Assets/Files/DoctorPhoto/<?php echo $data["doctor_photo"];?>" width="120" height="120"/></td>
        <td><img src="../Assets/Files/DoctorProof/<?php echo $data["doctor_proof"];?>" width="120" height="120"/></td>
                  
                  
            </tr>
       <?php
	  }
	   ?>
       </table>
       </form>
       </body>
       </html>




