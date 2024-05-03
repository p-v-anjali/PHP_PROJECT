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
<body  style="background:url(docter.jpeg); background-repeat: no-repeat;" >
<table align="center" cellpadding="10" style="border-collapse:collapse">

<tr>
<font size =6 color="black"
<br/><br/><br/>
<td><p><i><h1><b><u><center>Welcome : Dr <?php echo $_SESSION["doctorname"];?></center><i><h1><b><u></p></td>
</font>
</tr>
</table>
<br/><br/>





<?php
include("Foot.php");
ob_flush();
?>
</body>
</html>

