<?php
include("../Assets/Connection/Connection.php");
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Accepted List</title>
</head>
<body><form enctype="multipart/form-data">
<table border="1" align="center">
 <tr>
   <td width="33" height="107">SI NO.</td>
   <td width="46">Name</td>
   <td width="59">Gender</td>
   <td width="60">Contact</td>
   <td width="47">Email</td>
   <td width="78">Username</td>
   <td width="25">Photo</td>
   <td width="78">Password</td>
   <td width="123">Address</td>
 </tr>
 <?php
      $selQry="select * from tbl_user where user_vstatus='1'";
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
                  <td><label for="photo"></label>
                  <input type="file" name="photo" id="photo" /></td>
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
