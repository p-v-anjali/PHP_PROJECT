<a href="Homepage.php">Home </a>

<?php
include("../Assets/Connection/Connection.php");
session_start();

$sql="select * from tbl_prescription where doctorrequest_id='".$_GET["pid"]."'";
//echo $sql;

$Rows=$con->query($sql);
$data=$Rows->fetch_assoc();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Prescription</title>
</head>

<body>
<div id="pri">
<b><i><center><h1>View Prescription</h1></center></i></b>
		
<form id="form1" name="form1" method="post" action="">
  <table border="1" align="center" cellpadding="10" style="border-collapse:collapse">
    
    <tr>
      <td width="103">Prescription:</td>
      <td width="131"><?php echo $data["prescription_details"]; ?></td>
    </tr>
    
    </table>
    </div>
    <center><input type="button" onClick="printDiv('pri')" id="invoice-print"  class="btn btn-success" value="Print" /></center>
</form>
</body>
</html>
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>