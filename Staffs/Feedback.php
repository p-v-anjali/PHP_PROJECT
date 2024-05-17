<a href="Homepage.php">Home </a>

<?php
ob_start();
session_start();
//include("Head.php");
include('../Assets/Connection/Connection.php');
//include('SessionValidator.php');
if(isset($_POST['btn_save']))
{
		$feedback = $_POST['txt_feedback'];
		
		$ins = "insert into tbl_feedback(feedback_content,staff_id,feedback_date,feedback_time)values('".$feedback."','".$_SESSION["staffid"]."',curdate(),curtime())";
		echo $ins;
			if($con->query($ins))
			{
				?>
					 		<script type="text/javascript">
                                alert("Feedback Sumbitted");
                                setTimeout(function(){window.location.href='HomePage.php'},40);
                            </script>                
				<?php
			}
			else
			{
				echo "<script>alert('Failed')</script>";
				echo $ins;
			}
}
		
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Feedback</title>

</head>

<body>
<div align="center" id="tab">
<i><u><h1>Feedback</h1></u></i>
<br><br>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Feedback</td>
      <td><label for="txt_feedback"></label>
        <textarea name="txt_feedback" id="txt_feedback" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td align="center" colspan="2"><input type="submit" name="btn_save" id="btn_save" value="Submit" /></td>
      </tr>
  </table>
</form>
</div>
</body>
<?php
//include('Foot.php');
?>
</html>