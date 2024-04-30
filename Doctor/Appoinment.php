<a href="Homepage.php">Home </a>

<?php
session_start();
if(isset($_GET["pid"]))
{
	$_SESSION["rid"]=$_GET["pid"];
}
include("../Assets/Connection/Connection.php");



if(isset($_POST["btnupdate"]))
{
	
	$up="update tbl_doctorrequest set doctorrequest_status='3',appointment_date='".$_POST["txtdate"]."',appointment_time='".$_POST["txttime"]."' where doctorrequest_id='".$_SESSION["rid"]."'";
	$con->query($up);
	//echo $up;
	if($con->query($up))
	{
		?>
        <script>
		         alert("Data Updated");
				 window.location="Appoinment.php";
		</script>
        <?php
		
	}
	else
	{
		?>
        <script>
		         alert("Data Updation failed");
				 window.location="Appoinment.php";
		</script>
        <?php
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Appoinment</title>
</head>
<body>
<center><b><u><h1>Appoinment</h1></u></b></center>
<form id="form1" name="form1" method="post" action="">
	 <table border="1" align="center" cellpadding="10" style="border-collapse:collapse">
   
   
  
<?php
      $selQry="SELECT * FROM tbl_doctorrequest dr INNER JOIN tbl_patient p ON dr.patient_id=p.patient_id INNER JOIN tbl_place c ON c.place_id=p.place_id INNER JOIN tbl_district d ON d.district_id=c.district_id where  dr.doctorrequest_id='".$_SESSION["rid"]."'";
	  $row=$con->query($selQry);
	  $data=$row->fetch_assoc();
	  ?>
	<tr>
      <td>Photo</td>
      <td><img src="../Assets/Files/PatientPhoto/<?php echo $data["patient_photo"];?>" width="120" height="120"/></td>
    </tr>
    <tr>
      <td width="103">Name </td>
      <td width="131"><?php echo $data["patient_name"]; ?></td>
    </tr>
    <tr>
      <td>Gender </td>
      <td><?php echo $data["patient_gender"]; ?></td>
    </tr>
     <tr>
      <td>Contact</td>
      <td><?php echo $data["patient_contact"]; ?></td>
    </tr>
    <tr>
	   <td>Email</td>
      <td><?php echo $data["patient_email"]; ?></td>
    </tr>
     <tr>
	   <td>Place</td>
      <td><?php echo $data["place_name"]; ?></td>
    </tr>
      <tr>
	   <td>Subject</td> 	   
         <td><?php echo $data["doctorrequest_subject"]?></td>          
        </tr>
      <tr>         
         <td>Message</td> 	   
         <td><?php echo $data["doctorrequest_message"]?></td>         
        </tr>
      <tr>
        <td>Date</td>
        <td><label for="txtdate"></label>
        <input type="date" name="txtdate" id="txtdate" /></td>
      </tr>
      <tr>
        <td>Time</td>
        <td><label for="txttime"></label>
        <input type="time" name="txttime" id="txttime" /></td>
      </tr>
      <tr>
       
        <td colspan="2" align="center"><input type="submit" name="btnupdate" id="btnupdate" value="Update" /></td>
      </tr>         
                  
                  
               	 
       <?php
	
	   ?>
       </table>
       </form>
</body>
</html>
