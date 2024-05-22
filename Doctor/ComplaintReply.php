<a href="Homepage.php">Home </a>

<?php
			include("../Assets/Connection/Connection.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<center><i><h1><b><u>Reply of Complaints</u></b></h1></i></center>
<form id="form1" name="form1" method="post" action="">
 <center> <table width="765" height="106" border="1">
 
    	<tr>
      	<th width="57" height="56" scope="col">Sl No</th>
     	<th width="168" scope="col">Complaint Type</th>
      	<th width="169" scope="col">Complaint Content</th>
      	<th width="167" scope="col">Complaint Date</th>
        <th width="170" scope="col">Complaint Reply</th>
        <th width="170" scope="col">Complaint Reply Date</th>
         </tr>
     
   
<?php
$selectQry="select * from tbl_complaint c inner join tbl_doctor d on c.doctor_id=d.doctor_id inner join tbl_complainttype ct on ct.complainttype_id=c.complainttype_id where complaint_status='1'";
	//echo $selectQry;
	$row=$con->query($selectQry);
	$i=0;
	while($data=$row->fetch_assoc())
	{
	$i++;
	?>
    <tr>
      <td height="42"><?php echo $i ?></td>
    
        <td><?php echo $data["complainttype_name"] ?></td>
      	<td><?php echo $data["complaint_content"] ?></td>
      	<td><?php echo $data["complaint_date"] ?></td>
       	<td><?php echo $data["complaint_reply"] ?></td>
        <td><?php echo $data["complaint_replydate"] ?></td>
       
    </tr>
    <?php
	}
	?>
  </table>
  </center>
</form>
<p>&nbsp;</p>
</body>
</html>