<a href="Homepage.php">Home </a>
<?php
include("../Assets/Connection/connection.php");
if(isset($_POST["btn_submit"]))
{
		$msg=$_POST["txtreply"];
		
		$upQry="update tbl_complaint set complaint_reply='".$msg."',complaint_replydate=curdate(),complaint_status='1' where complaint_id='".$_GET["cid"]."'";
		//echo $upQry;
		if($con->query($upQry))
		{
	?>
    
		<script>
			alert("Reply Send");
			window.location="ComplaintList.php";
		 </script>
    <?php
	   }
	   else
	   {
    ?>
		<script>
			alert("Failed");
			window.location="ComplaintList.php";
		 </script>
         
     <?php
       }
}
	?>
			
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reply</title>
</head>

<body>
<b><center><i><u><h1>Complaint</h1></u></i></center></b>
<form id="form1" name="form1" method="post" action="">
  <table width="349" height="89" border="1" align="center" cellpadding="2" cellspacing="2">
    <tr>
    <tr>
    <?php
	$sel="select * from tbl_complaint c INNER JOIN tbl_complainttype ct ON ct.complainttype_id=c.complainttype_id where complaint_id='".$_GET["cid"]."'";
	//echo $sel;
	
	$row=$con->query($sel);
		$i=0;
		$row = $con->query($sel);
	  $data = $row->fetch_assoc()
	
		  
		?>
      <td width="103">Complaint Type</td>
      <td width="131"><?php echo $data["complainttype_name"]; ?></td>
    </tr>
    <tr>
      <td width="103">Content </td>
      <td width="131"><?php echo $data["complaint_content"]; ?></td>
    </tr>
    <tr>
      <td width="103">Date </td>
      <td width="131"><?php echo $data["complaint_date"]; ?></td>
    </tr>
      <td>Reply Message</td>
      <td><label for="txt_dist"></label>
      <textarea name="txtreply" id="txtreply" ></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  </table>
  
 </body>