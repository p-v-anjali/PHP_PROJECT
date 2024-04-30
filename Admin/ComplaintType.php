<a href="Homepage.php">Home </a>
<?php

include("../Assets/Connection/Connection.php");

if(isset($_POST["btnsub"]))
		{
					$ctype=$_POST["txttype"];
					$insqry="insert into tbl_complainttype(complainttype_name)values('".$ctype."')";
					if($con->query($insqry))
						{
			?>
								<script>
										alert("Data Inserted");
										window.location="ComplaintType.php";
								</script>
			<?php
						}
						else
						{
			?>
								<script>
										alert("Data Insertion Failed");
										window.location="ComplaintType.php";
								</script>
			<?php
			
						}
			}
			
		
	

if(isset($_GET["did"]))
		{
			$did=$_GET["did"];
			$delqry="delete from tbl_complainttype where complainttype_id='".$did."'";
			if($con->query($delqry))
			{
				?>
            <script>
			alert("deleted..");
			location.href="ComplaintType.php";
			</script>
            <?php
			}
			else
			{
				?>
            <script>
			alert("failed..");
			location.href="ComplaintType.php";
			</script>
            <?php
			}
		}
		?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Complaint Type</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="241" border="1" align="center">
    <tr>
      <td width="112" height="42">Complaint Type</td>
      <td width="72"><label for="txttype"></label>
      <input type="text" name="txttype" id="txttype" /></td>
    </tr>
    <tr>
      <td height="49"><input type="submit" name="btnsub" id="btnsub" value="Submit" /></td>
      <td><input type="submit" name="btncan" id="btncan" value="Cancel" /></td>
    </tr>
  </table>
</form>
</body>
</html>

<table border="1" align="center">
<tr>
<td>SI NO.</td>
<td>Complaint Type</td>
<td>ACTION</td>
</tr>
<?php
$selqry="select *from tbl_complainttype";
$row=$con->query($selqry);
$i=0;
while($result=$row->fetch_assoc())
{
	$i++;
	?>
	<tr>
    <td><?php echo $i;?></td>
    <td><?php echo $result["complainttype_name"];?></td>
    <td><a href="ComplaintType.php?did=<?php echo $result["complainttype_id"]?>">Delete</a></td>
    </tr>
    <?php
}
?>
</table>