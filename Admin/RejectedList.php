<?php
include("../Assets/Connection/Connection.php");
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rejected list</title>
</head>
<body><form>
<table border="1" align="center">
 <tr>
     <td>SI NO.</td>
     <td>Name</td>
     <td>Gender</td>
     <td>Contact</td>
     <td>Email</td>
     <td>Username</td>
     <td>Password</td>
     <td>Address</td>
 </tr>
 <?php
      $selQry="select * from tbl_user where user_vstatus='2'";
	  $row=$con->query($selQry);
	  $i=0;
	  while($data=$row->fetch_assoc())
	  {
		  $i++;
	   ?>
       	   <tr>
                  <td><?php echo $i?></td>
                  <td><?php echo $data["user_name"]?></td>
                  <td><?php echo $data["user_gender"]?></td>
                  <td><?php echo $data["user_contact"]?></td>
                  <td><?php echo $data["user_email"]?></td>
                  <td><?php echo $data["user_username"]?></td>
                  <td><?php echo $data["user_password"]?></td>
                  <td><?php echo $data["user_address"]?></td>
                 
               
            </tr>
       <?php
	  }
	   ?>
       </table>
       </form>
       </body>
       </html>



