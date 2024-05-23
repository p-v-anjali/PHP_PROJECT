<a href="Homepage.php">Home </a>

<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST["btnsubmit"]))
{
		$Service=$_POST["txtservicename"];
		$insQry="insert into tbl_service(service_name,service_amount)values('".$Service."','".$_POST["txt_am"]."')";
		if($con->query($insQry))
		{
				?>
            	<script>
				alert("Data inserted");
				window.location("Service.php");
				</script>
            	<?php
		}
		else
		{
				?>
            	<script>
				alert("Data insertion failed");
				window.location("Servicet.php");
				</script>
                <?php
		}
}
				   
				   
if(isset($_GET["did"]))
{		
		$sid=$_GET["sid"];
		$delqry="delete from tbl_service where service_id='".$sid."'";
		if($con->query($delqry))
		{
				?>
           		<script>
				alert("deleted..");
				location.href="Service.php";
				</script>
            	<?php
		}
		else
		{
				?>
            	<script>
				alert("failed..");
				location.href="Service.php";
				</script>
            	<?php
		}
}
?> 
        
				
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Service</title>
</head>
<body>
		<b><i><center><h1>Service</h1></center></i></b>
		<form id="form1" name="form1" method="post" action="">
  		<table border="1" align="center" cellpadding="10" style="border-collapse:collapse">
    	<tr>
      	<td width="167">Service Name</td>
      	<td width="114"><label for="txtservicename"></label>
      	<input type="text" name="txtservicename" id="txtservicename" required="required" autocomplete="off"/></td>
   	 	</tr>
        <tr>
      	<td width="167">Service Amount</td>
      	<td width="114"><label for="txtservicename"></label>
      	<input type="text" name="txt_am" id="txt_am" required="required" autocomplete="off"/></td>
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
<th>Service Name</th>
<th>Service Amount</th>
<th>Action</th>
</tr>
	<?php
	$selqry="select * from tbl_service";
	$rows=$con->query($selqry);
	$i=0;
	while($result=$rows->fetch_assoc())
	{
			$i++;
			?>
        	<tr>
        	<td><?php echo $i; ?></td>
        	<td><?php echo $result["service_name"];?></td>
            <td><?php echo $result["service_amount"];?></td>
        	<td><a href="Service.php?did=<?php echo $result["service_id"]?>">delete</a></td>
        	</td>
        	</tr>
			<?php
  }
?>          
</table>