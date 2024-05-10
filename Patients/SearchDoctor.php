<a href="Homepage.php">Home </a>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search Doctor</title>
</head>

<body>
<?php
include("../Assets/Connection/Connection.php");
?>
<form id="form1" name="form1" method="post" action="">
  <table border="1" align="center" cellpadding="10" style="border-collapse:collapse">
      	<center><i><h1><b><u>Search Doctor<i><h1><b></u></center>
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
        <select name="txtplace" id="ddlplace"  onchange="getDoctor()">
        <option value="">---select---</option>
        
      	</select></td>
          <td height="44">Type</td>
      	<td><label for="txtdistrict"></label>
        <select name="txttype" id="txttype" onChange="getDoctor()">
      	<option value="">---select---</option>
        <?php
		$selQry="select * from tbl_doctortype";
		$row=$con->query($selQry);
		$i=0;
		while($data=$row->fetch_assoc())
		{
			?>
            <option value="<?php echo $data["doctortype_id"]?>"><?php echo $data["doctortype_name"]?></option>
            <?php
		}
		?></select></td>
   	 	</tr>
  </table>
  <div id="search">
  <table align="center" cellpadding="60">
  <tr>
  <?php
  $sel="select * from tbl_doctor d inner join tbl_place p on p.place_id=d.place_id inner join tbl_district dt on dt.district_id=p.district_id inner join tbl_doctortype tp on tp.doctortype_id=d.doctortype_id where d.doctor_status=1";
  $row=$con->query($sel);
  $i=0;
  while($data=$row->fetch_assoc())
  {
	  $i++;
  ?>
  <td>
  <p><img src="../Assets/Files/DoctorPhoto/<?php echo $data["doctor_photo"]?>" width="200" height="200" />
  <br />
  Name :<b><?php echo $data["doctor_name"]?></b></br>
  Email :<b><?php echo $data["doctor_email"]?></b></br>
  Type :<b><?php echo $data["doctortype_name"]?></b></br>
  Consulting Fees:<b><?php echo $data["doctor_fees"]?></b></br>

   <b><a href="SendRequestDoctor.php?did=<?php echo $data["doctor_id"]?>">Send Request</a></b></br>

  
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
</form>
</div>
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
		 getDoctor()
	  }
	});
}
function getDoctor()
{
var did=document.getElementById("txtdistrict").value;
var pid=document.getElementById("ddlplace").value;
var tid=document.getElementById("txttype").value;
	$.ajax({
	  url:"../Assets/AjaxPages/AjaxDoctor.php?did="+did+"&pid="+pid+"&tid="+tid,
	  success: function(html){
		$("#search").html(html);
	  }
	});
}
</script>