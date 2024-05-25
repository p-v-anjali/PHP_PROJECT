<a href="Homepage.php">Home </a>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search Staff</title>
</head>

<body>
<?php
include("../Assets/Connection/Connection.php");
?>
<form id="form1" name="form1" method="post" action="">
  <table border="1" align="center" cellpadding="10" style="border-collapse:collapse">
      	<center><i><h1><b><u>Search Staff<i><h1><b></u></center>
        <tr>
   	 	<td height="44">DISTRICT</td>
      	<td><label for="txtdistrict"></label>
        <select name="txtdistrict" id="txtdistrict" onChange="getPlace(this.value)">
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
		?></select></td>
   	 	
   	 	  <td height="44">PLACE</td>
      	<td><label for="txtplace"></label>
        <select name="txtplace" id="ddlplace" onChange="getStaff()">
        <option value="">---select---</option>
        
      	</select></td>
       
   	
        
        </tr>
   	 	 </table>
  <div id="search">
  <table align="center" cellpadding="60">
  <tr>
  <?php
 
  $sel="select * from tbl_staff s inner join tbl_place p on p.place_id=s.place_id inner join tbl_district dt on dt.district_id=p.district_id  where s.staff_status=1";
  $row=$con->query($sel);
  $i=0;
  while($data=$row->fetch_assoc())
  {
	  $i++;
  ?>
  
  
  <td>
  <p><img src="../Assets/Files/StaffPhoto/<?php echo $data["staff_photo"]?>" width="200" height="200" />
  <br />
  Name :<b><?php echo $data["staff_name"]?></b><br />
  Contact :<b><?php echo $data["staff_contact"]?></b><br />
  Email :<b><?php echo $data["staff_email"]?></b><br />
  <b><a href="SendRequestStaff.php?did=<?php echo $data["staff_id"]?>">Send Request</b></a>
  

  
  <?php
  if($i==4)
  {
	  echo "</tr>";
	  $i=0;
	  echo "<tr>";
  }
  }
  ?>
  </table>
  </div>
</form>
</body>
</html>
<script src="../Assets/Jquery/jQuery.js"></script>
<script>
function getPlace(did)
{

	$.ajax({
	  url:"../Assets/AjaxPages/AjaxPlace.php?did="+did,
	  success: function(html){
		$("#ddlplace").html(html);
		getStaff();
	  }
	});
}
function getStaff()
{
var did=document.getElementById("txtdistrict").value;
var pid=document.getElementById("ddlplace").value;

	$.ajax({
	  url:"../Assets/AjaxPages/AjaxStaff.php?did="+did+"&pid="+pid,
	  success: function(html){
		$("#search").html(html);
	  }
	});
}
</script>