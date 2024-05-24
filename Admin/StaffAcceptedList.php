<a href="Homepage.php">Home </a>

<?php
include("../Assets/Connection/Connection.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Staff Accepted List</title>
</head>
<body><form enctype="multipart/form-data">
	<table border="1"  cellpadding="10"align="center">
 	<tr>
   	<td width="33" height="75">SI NO.</td>
<td width="53">Name</td>
<td width="47">Email</td>
<td width="75">Contact</td>
<td width="58">Age</td>
<td width="58">Date Of Birth</td>
<td width="58">Gender</td>
<td width="83">Service</td>
<td width="100">Experience</td>
<td width="116">District</td>
<td width="73">Place</td>
<td width="66">House Name</td>
<td width="66">Location</td>
<td width="66">Street</td>
<td width="66">Landmark</td>
<td width="66">Pincode</td>
<td width="86">Password</td>
<td width="120">Photo</td>
<td width="120">ID Proof</td>>
   	
 	</tr>
 		<?php
      		$selQry="select * from tbl_staff s inner join tbl_place p on s.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id  inner join
	tbl_service sr on sr.service_id=s.service_id where staff_status='1'";
	  		$row=$con->query($selQry);
	  		$i=0;
	  		while($data=$row->fetch_assoc())
	  		{
		  		$i++;
	   ?>
       	   			<tr>
                  	<td><?php echo $i?></td>
                  	<td><?php echo $data["staff_name"]?></td>
                    <td><?php echo $data["staff_email"]?></td>
                    <td><?php echo $data["staff_contact"]?></td>
                    <td><?php echo $data["staff_age"];?></td>
					<td><?php echo $data["staff_dob"];?></td>
                    <td><?php echo $data["staff_gender"]?></td>
                    <td><?php echo $data["service_name"]?></td>
                    <td><?php echo $data["staff_experience"]?></td>
                    <td><?php echo $data["district_name"];?></td>
                  	<td><?php echo $data["place_name"]?></td>
					<td><?php echo $data["staff_house"]?></td>
                    <td><?php echo $data["staff_location"]?></td>
                    <td><?php echo $data["staff_street"]?></td>
                    <td><?php echo $data["staff_landmark"]?></td>
                    <td><?php echo $data["staff_pincode"]?></td
                  	<td><?php echo $data["staff_password"]?></td>
                    
                  	
                   <td><img src="../Assets/Files/StaffPhoto/<?php echo $data["staff_photo"];?>" width="120" height="120"/></td>
                   <td><img src="../Assets/Files/StaffProof/<?php echo $data["staff_proof"];?>" width="120" height="120"/></td>
                   </tr>
       <?php
	  		}
	   ?>
</table>
</form>
</body>
</html>


