<a href="Homepage.php">Home </a>

<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST["btnsubmit"]))
{
	$Category=$_POST["txtcategoryname"];
	$insQry="insert into tbl_category(category_name)values('".$Category."')";
	if($con->query($insQry))
		{
			?>
            <script>
			alert("Data inserted");
			window.location("Category.php");
			</script>
            <?php
		}
	else
		{
				?>
            	<script>
				alert("Data insertion failed");
				window.location("Category.php");
				</script>
                <?php
		}
          
}
				   
				   
if(isset($_GET["did"]))
		{
			$did=$_GET["did"];
			$delqry="delete from tbl_category where category_id='".$did."'";
			if($con->query($delqry))
			{
				?>
           		<script>
				alert("deleted..");
				location.href="Category.php";
				</script>
            	<?php
			}
			else
			{
				?>
            	<script>
				alert("failed..");
				location.href="Category.php";
				</script>
            	<?php
			}
		}
?> 


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Category</title>
</head>
<body>
		<form id="form1" name="form1" method="post" action="">
  		<table  border="1" align="center" cellpadding="10" style="border-collapse:collapse">
    	<tr>
      	<td width="173">Category Name</td>
     	 <td width="150"><label for="txtcategoryname"></label>
      	<input type="text" name="txtcategoryname" id="txtcategoryname"  required="required" autocomplete="off"/></td>
   		</tr>
    	<tr>
      	<td><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" /></td>
      	<td><input type="reset" name="btncancel" id="btncancel" value="Cancel" /></td>
    	</tr>
 	 	</table>
	</form>
</body>
</html>


<table border="1" cellpadding="10" align="center">
<tr>
<th>SI No</th>
<th>Category</th>
<th>Action</th>
</tr>
    <?php
	$selqry="select * from tbl_Category";
	$rows=$con->query($selqry);
	$i=0;
	while($result=$rows->fetch_assoc())
	{
			$i++;
			?>
        	<tr>
        	<td><?php echo $i; ?></td>
        	<td><?php echo $result["category_name"];?></td>
        	<td><a href="Category.php?did=<?php echo $result["category_id"]?>">Delete</a></td>
        	</td>
        	</tr>
			<?php
 	 }
 
?>          
</table>