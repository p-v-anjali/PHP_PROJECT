<a href="Homepage.php">Home </a>

<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST["btnsubmit"]))
{
		$doctortype=$_POST["txtdoctortypename"];
		$insQry="insert into tbl_doctortype(doctortype_name)values('".$doctortype."')";
		if($con->query($insQry))
		{
				?>
            	<script>
				alert("Data inserted");
				window.location("DoctorType.php");
				</script>
            	<?php
		}
		else
		{
				?>
            	<script>
				alert("Data insertion failed");
				window.location="DoctorType.php";
				</script>
                <?php
		}
}
				   
				   
if(isset($_GET["did"]))
{		
		$did=$_GET["did"];
		$delqry="delete from tbl_doctortype where doctortype_id='".$did."'";
		if($con->query($delqry))
		{
				?>
           		<script>
				alert("deleted..");
				location.href="DoctorType.php";
				</script>
            	<?php
		}
		else
		{
				?>
            	<script>
				alert("failed..");
				location.href="DoctorType.php";
				</script>
            	<?php
		}
}
?> 
        
				
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Docto Type</title>
</head>
<body>
		<form id="form1" name="form1" method="post" action="">
  		<table border="1" align="center"cellpadding="10" style="border-collapse:collapse">
    	<tr>
      	<td width="167">DoctorType Name</td>
      	<td width="114"><label for="txtdoctortypename"></label>
      	<input type="text" name="txtdoctortypename" id="txtdoctortypename"  required="required" autocomplete="off" /></td>
   	 	</tr>
   		<tr>
      	<td><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" /></td>
      	<td><input type="reset" name="btncancel" id="btncancel" value="Cancel" /></td>
    	</tr>
  		</table>
		</form>
</body>
</html>


<table border="1" cellpadding="11" align="center">
<tr>
<th>SI No</th>
<th>Doctortype Name</th>
<th>Action</th>
</tr>
	<?php
	$selqry="select * from tbl_doctortype";
	$rows=$con->query($selqry);
	$i=0;
	while($result=$rows->fetch_assoc())
	{
			$i++;
			?>
        	<tr>
        	<td><?php  echo $i; ?></td>
        	<td><?php echo $result["doctortype_name"];?></td>
        	<td><a href="DoctorType.php?did=<?php echo $result["doctortype_id"]?>">delete</a></td>
        	</td>
        	</tr>
			<?php
  }
?>          
</table>