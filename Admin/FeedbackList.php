<a href="HomePage.php">Home</a>
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

<i><center><h1><b><u> Doctor's Feedback</u></b></h1></center></i>
<form id="form1" name="form1" method="post" action="">
 <center> <table width="703" height="80" border="1">
    <tr>
      <th width="52" height="40"  scope="col">Sl No</th>
      <th width="125" scope="col">Name</th>
      <th width="311" scope="col">Feedback</th>
      <th width="187" scope="col">Feedback Date</th>
      <th width="187" scope="col">Feedback Time</th>
    </tr>
     <?php
	$selectQry="select * from tbl_feedback k inner join tbl_doctor d on k.doctor_id=d.doctor_id";
	//echo $selectQry;
	$row=$con->query($selectQry);
	$i=0;
	while($data=$row->fetch_assoc())
	{
	$i++;
	?>
    <tr>
      <td height="32"><?php echo $i ?></td>
      <td><?php echo $data["doctor_name"] ?></td>
      <td><?php echo $data["feedback_content"] ?></td>
      <td><?php echo $data["feedback_date"] ?></td>
     <td><?php echo $data["feedback_time"] ?></td>
    </tr>
    <?php
	}
	?>
  </table>
  </center>
</form>


<i><center><h1><b><u> Staff's Feedback</u></b></h1></center></i>
<form id="form1" name="form1" method="post" action="">
 <center> <table width="703" height="95" border="1">
    <tr>
      <th width="52" height="42" scope="col">Sl No</th>
      <th width="125" scope="col">Name</th>
      <th width="311" scope="col">Feedback</th>
      <th width="187" scope="col">Feedback date</th>
      <th width="187" scope="col">Feedback Time</th>
    </tr>
     <?php
	$selectQry="select * from tbl_feedback k inner join tbl_staff s on k.staff_id=s.staff_id";
	//echo $selectQry;
	$row=$con->query($selectQry);
	$i=0;
	while($data=$row->fetch_assoc())
	{
	$i++;
	?>
    <tr>
      <td height="45"><?php echo $i ?></td>
      <td><?php echo $data["staff_name"] ?></td>
      <td><?php echo $data["feedback_content"] ?></td>
      <td><?php echo $data["feedback_date"] ?></td>
       <td><?php echo $data["feedback_time"] ?></td>
    </tr>
    <?php
	}
	?>
  </table>
  </center>
</form>
<i><center>
  <h1><b><u> Patient's Feedback</u></b></h1></center></i>
<form id="form1" name="form1" method="post" action="">
 <center> <table width="703" height="85" border="1">
    <tr>
      <th width="52" height="42" scope="col">Sl No</th>
      <th width="125" scope="col">Name</th>
      <th width="311" scope="col">Feedback</th>
      <th width="187" scope="col">Feedback date</th>
      <th width="187" scope="col">Feedback Time</th>
    </tr>
     <?php
	$selectQry="select * from tbl_feedback k inner join tbl_patient p on k.patient_id=p.patient_id";
	//echo $selectQry;
	$row=$con->query($selectQry);
	$i=0;
	while($data=$row->fetch_assoc())
	{
	$i++;
	?>
    <tr>
      <td height="35"><?php echo $i ?></td>
      <td><?php echo $data["patient_name"] ?></td>
      <td><?php echo $data["feedback_content"] ?></td>
      <td><?php echo $data["feedback_date"] ?></td>
        <td><?php echo $data["feedback_time"] ?></td>
    </tr>
    <?php
	}
	?>
  </table>
  </center>
</form>

</body>
</html>