<a href="Homepage.php">Home </a>

<?php
ob_start();
session_start();
include("Head.php");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home Page</title>
</head>
<br /><br /><br /><br /><br />
<body style="background:url(nurse.jpg)">
<form id="form1" name="form1" method="post" action="">
<table  align="center" cellpadding="10" style="border-collapse:collapse">
<p>&nbsp;</p>


  <tr>
    <td><i><h1><b><u>Welcome : Sr <?php echo $_SESSION["staffname"]?><i><h1><b><u></td>
  </tr>
  
</table>
<p>&nbsp;</p>
</body>
<br /><br /><br /><br /><br /><br />
<?php
include("Foot.php");
ob_flush();
?>
</html>