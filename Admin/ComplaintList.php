<a href="Homepage.php">Home </a>

<?php
session_start();
include("../Assets/Connection/Connection.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>  Complaint List</title>
</head>
<body>

<center><b><i><u><h1>Doctor's Complaint</h1></u></i></b></center>
<form enctype="multipart/form-data">
	<table border="1"  cellpadding="10"align="center">
 	<tr>
   	<td width="55" height="75">SI NO.</td>
    <td width="58">Name</td>
   	<td width="87">Complaint Type</td>
  	<td width="87">Complaint Content</td>
    <td width="77">Comlaint Date</td>
	<td width="87">Complaint Time</td>
  	<td width="78">Action</td>
   	
 	</tr>
 		<?php
      		$selQry="select * from tbl_complaint c inner join tbl_complainttype ct on c.complainttype_id=ct.complainttype_id inner join tbl_doctor d on c.doctor_id=d.doctor_id where complaint_status='0'";
			//echo $selQry;
	  		$row=$con->query($selQry);
	  		$i=0;
	  		while($data=$row->fetch_assoc())
	  		{
		  		$i++;
	   ?>
       	   			<tr>
                  	<td><?php echo $i?></td>
                    <td><?php echo $data["doctor_name"]?></td>
                  	<td><?php echo $data["complainttype_name"]?></td>
                  	<td><?php echo $data["complaint_content"]?></td>
                    <td><?php echo $data["complaint_date"];?></td>
					<td><?php echo $data["complaint_time"];?></td>
                  	<td><a href="ComplaintReply.php?cid=<?php echo $data["complaint_id"]?>">Reply</a></td>
					</tr>
                    <?php
			}

	   ?>
       </table>
       </form>
       


<center><b><i><u><h1>Patient's Complaint</h1></u></i></b></center>
<form>	<table border="1"  cellpadding="10"align="center">
 	<tr>
   	<td width="67" height="66">SI NO.</td>
    <td width="46">Name</td>
   	<td width="87">Complaint Type</td>
  	<td width="87">Complaint Content</td>
    <td width="77">Comlaint Date</td>
	<td width="112">Complaint Time</td>
  	<td width="53">Action</td>
   	
 	</tr>
 		<?php
      		$selQry="select * from tbl_complaint c inner join tbl_complainttype ct on c.complainttype_id=ct.complainttype_id inner join tbl_patient p on c.patient_id=p.patient_id  where complaint_status='0'";
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
                  	<td><?php echo $data["complainttype_name"]?></td>
                  	<td><?php echo $data["complaint_content"]?></td>
                    <td><?php echo $data["complaint_date"];?></td>
					<td><?php echo $data["complaint_time"];?></td>
                  	<td><a href="ComplaintReply.php?cid=<?php echo $data["complaint_id"]?>">Reply</a></td>
					</tr>
                    <?php
		}
                
       
	  		
	   ?>
</table>
</form>




<center><b><i><u><h1>Staff's Complaint</h1></u></i></b></center>
<form>	<table border="1"  cellpadding="10"align="center">
 	<tr>
   	<td width="67" height="66">SI NO.</td>
    <td width="46">Name</td>
   	<td width="87">Complaint Type</td>
  	<td width="87">Complaint Content</td>
    <td width="77">Comlaint Date</td>
	<td width="87">Complaint Time</td>
  	<td width="78">Action</td>
   	
 	</tr>
 		<?php
      		$selQry="select * from tbl_complaint c inner join tbl_complainttype ct on c.complainttype_id=ct.complainttype_id inner join tbl_staff s on c.staff_id=s.staff_id  where complaint_status='0'";
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
                  	<td><?php echo $data["complainttype_name"]?></td>
                  	<td><?php echo $data["complaint_content"]?></td>
                    <td><?php echo $data["complaint_date"];?></td>
					<td><?php echo $data["complaint_time"];?></td>
                  	<td><a href="ComplaintReply.php?cid=<?php echo $data["complaint_id"]?>">Reply</a></td>
					</tr>
                    <?php
		}
                
       
	  		
	   ?>
</table>
</form>
</body>
</html>


