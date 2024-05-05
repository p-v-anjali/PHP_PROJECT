<a href="Homepage.php">Home </a>

<?php
ob_start();

//include('SessionValidator.php');
//include('Head.php');
include('../Assets/Connection/Connection.php');
session_start();
if(isset($_POST['btn_submit']))
	{
		$complaint = $_POST['txt_complaint'];
		$complainttype = $_POST['sel_complainttype_name'];
		
		
		if($_POST['txt_complaint'])
		{
			$ins = "insert into tbl_complaint (complaint_content,complainttype_id,staff_id,complaint_date,complaint_time) values('".$complaint."','".$complainttype."','".$_SESSION["staffid"]."',curdate(),curtime())";
		
			if($con->query($ins))
			{
		header("Location:Complaint.php");
	}
	else
	{
		echo "<script>alert('Failed')</script>";
		echo $ins;
	
	}

		
			}
		}
		
include("Head.php");	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Complaint</title>

</head>
<br /><br /><br /><br /><br /><br />
<body>
<div align="center" id="tab">
<b><i><u><h1>Complaint</h1></u></i></b>
<br><br>
<form id="form1" name="form1" method="post" action="">
  <table >
    <tr>
      <td>Type</td>
      <td><label for="sel_complainttype_name"></label>
        <select name="sel_complainttype_name" id="sel_complainttype_name">
        <option value="">-----Select-----</option>
		<?php
        $sel="select*from tbl_complainttype";
		$row=$con->query($sel);
		$i=0;
		while($data=$row->fetch_assoc())
		{
			?>
          <option value="<?php echo $data["complainttype_id"]?>"><?php echo $data["complainttype_name"]?></option>
            <?php
		}
		?>
    </select>
		 </td>
     


   </tr>
    <tr>
      <td>Complaint</td>
      <td><label for="txt_complaint"></label>
      <textarea name="txt_complaint" id="txt_complaint" cols="45" rows="5" placeholder="Give Complaint in details"></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
      <p>&nbsp;</p>
     <table border="1" cellpadding="11" align="center">
        <tr>
          <td width="50" height="67">SI NO</td>
          <td width="100">Type</td>
          <td width="200">Content</td>
          <td width="100">Date</td>
           <td width="100">Time</td>
          <td width="58">Reply</td>
          </tr>
         <?php
	  $i=0;
	  $sel = "select * from tbl_complaint c inner join tbl_complainttype ct on ct.complainttype_id=c.complainttype_id where staff_id='".$_SESSION["staffid"]."'";
	  $row = $con->query($sel);
	  while($data = $row->fetch_assoc())
	  {
		  $i++;
	  
		  ?>
          <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $data['complainttype_name']; ?></td>
            <td><?php echo $data['complaint_content']; ?></td>
            <td><?php echo $data['complaint_date']; ?></td>
            <td><?php echo $data['complaint_time']; ?></td>
            <td><?php echo $data['complaint_reply']; ?></td>
      </tr>
      <?php
	  }
	  ?>
     </table>
</form>
</div>
<?php
//include('Foot.php');
ob_flush();
?>
</body>
<br /><br /><br /><br /><br /><br /><br />
<?php
include("Foot.php");
ob_flush();
?>
</html>