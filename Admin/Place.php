<a href="Homepage.php">Home </a>

<?php
include("../Assets/Connection/Connection.php");
if (isset ($_POST["btnsubmit"]))
{
	$Place=$_POST["txtplacename"];
	$Pincode=$_POST["txtplacepincode"];
	$District=$_POST["txtdistrict"];
	$insQry="insert into tbl_place(place_name,place_pincode,district_id)values('".$Place."','".$Pincode."','".$District."')";
	//echo $insQry;
	if($con->query($insQry))
	{
			?>
    		<script>
			alert("Data Inserted");
			window.location("Place.php");
			</script>
       		<?php
	}
	else
	{
			?>
			<script>
			alert("Data insertion Failed");
			window.location("Place.php");
  			</script>
    		<?php
	}
}


if (isset ($_GET["delID"]))
{
	$delQry="delete from tbl_place where place_id='".$_GET["delID"]."'";
	if($con->query($delQry))
	{
			?>
    		<script>
			alert("Record Deleted");
			window.location="Place.php";
			</script>
    		<?php
	}
else
	{
			?>
			<script>
			alert("Record deletion Failed");
			window.location("Place.php");
			</script>
    		<?php
	}
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Place</title>
</head>
<body>
		<form id="form1" name="form1" method="post" action="">
		<table border="1" align="center" cellpadding="10" style="border-collapse:collapse">
		<tr>
    	<td>DISTRICT</td>
      	<td><label for="txtdistrict"></label>
        <select name="txtdistrict" id="txtdistrict">
        <option value="">---select---</option>
        <?php
		$selQry="select * from tbl_district";
		$row=$con->query($selQry);
		$i=0;
		while($data=$row->fetch_assoc())
		{
			?>
            <option value="<?php echo $data["district_id"]?>"><?php echo $data["district_name"]?></option>
            <?php
		}
		?>
      	</select></td>
    	</tr>
    	<tr>
      	<td width="152">PLACE NAME</td>
      	<td width="175"><label for="txtplacename"></label>
      	<input type="text" name="txtplacename" id="txtplacename" /></td>
    	</tr>
    	<tr>
      	<td>PLACE PINCODE</td>
      	<td><label for="txtplacepincode"></label>
      	<input type="text" name="txtplacepincode" id="txtplacepincode" /></td>
   		</tr>
    	<tr>
      	<td><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" /></td>
      	<td><input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>
    	</tr>
  	</table>
	</form>
</body>
</html>


<table border="1" cellpadding="11"align="center">
<tr>
<td>SI NO.</td>
<td>Place Name</td>
<td>Pincode</td>
<td>District Name</td>
<td>Action</td>
</tr>
	<?php
	$selQry="select *from tbl_place p inner join tbl_district d on p.district_id=d.district_id";
	$row=$con->query($selQry);
	$i=0;
	while($data=$row->fetch_assoc())
	{
			$i++;
			?>
			<tr>
   		 	<td><?php echo $i;?></td>
    		<td><?php echo $data["place_name"];?></td>
    		<td><?php echo $data["place_pincode"];?></td>
    		<td><?php echo $data["district_name"];?></td>
    		<td><a href="Place.php?delID=<?php echo $data["place_id"];?>">Delete</a></td>
   		 	</tr>
    		<?php
	}
	?>
</table>