<a href="Homepage.php">Home </a>

<?php
use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
include("../Assets/Connection/Connection.php");
session_start();
	require '../Assets/phpMail/src/Exception.php';
require '../Assets/phpMail/src/PHPMailer.php';
require '../Assets/phpMail/src/SMTP.php';
if(isset($_GET["aid"]))
{
	
		$upQry="update tbl_doctorrequest set doctorrequest_status ='1' where doctorrequest_id=".$_GET["aid"]."";
		
	if($con->query($upQry))
	{
	


    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'helpdeskactivemoments@gmail.com'; // Your gmail
    $mail->Password = 'tynwkmislsenykio'; // Your gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
  
    $mail->setFrom('helpdeskactivemoments@gmail.com'); // Your gmail
  
    $mail->addAddress($_GET["user"]);
  
    $mail->isHTML(true);
  
    $mail->Subject = "Your Appointment Is Confirmed";
    $mail->Body = "Hello, Your Appointment is Confirmed By Doctor and Will Please Check Other Details on Your Login";
  if($mail->send())
  {
    echo "Sended";
  }
  else
  {
    echo "Failed";
  }
				?>
            	<script>
				alert(" Data Updated");
				window.location("PatientRequestAcceptedList.php");
				</script>
            	<?php
	}
	else
	{
		
				?>
            	<script>
				alert("Data updation failed");
				window.location("PatientRequestAcceptedList.php");
				</script>
                <?php
      }
}
if(isset($_GET["rid"]))
{
	
		$upQry="update  tbl_doctorrequest set doctorrequest_status ='2' where doctorrequest_id=".$_GET['rid']."";
		
		if($con->query($upQry))
		{
			


    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'helpdeskactivemoments@gmail.com'; // Your gmail
    $mail->Password = 'tynwkmislsenykio'; // Your gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
  
    $mail->setFrom('helpdeskactivemoments@gmail.com'); // Your gmail
  
    $mail->addAddress($_GET["user"]);
  
    $mail->isHTML(true);
  
    $mail->Subject = "Your Appointment Is Rejected";
    $mail->Body = "Hello, Your Appointment is Rejected By Doctor and Will Please Check Other Details on Your Login";
  if($mail->send())
  {
    echo "Sended";
  }
  else
  {
    echo "Failed";
  }
				?>
            	<script>
				alert("Rejected");
				window.location="PatientRequestRejectedList.php";
				</script>
           	 	<?php
		}
		else
		{
				?>
            	<script>
				alert("failed..");
				window.location="PatientRequestRejectedlist.php";	
				</script>
            	<?php
		}
}
?> 


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Patient Request List</title>
</head>

<body>
<body>
<form>
  <table border="1" cellpadding="11" align="center">
<tr>
<td width="55" height="67">SI NO.</td>
<td width="46">Name</td>
<td width="58">Gender</td>
<td width="60">Contact</td>
<td width="47">Email</td>
<td width="104">District Name</td>
<td width="51">Place</td>
<td width="120">Photo</td>
<td width="66">Address</td>
<td width="66">Subject</td>
<td width="66">Message</td>
<td colspan="2">Action</td>
</tr>
	<?php
	$selQry="SELECT * FROM tbl_doctorrequest dr INNER JOIN tbl_patient p ON dr.patient_id=p.patient_id INNER JOIN tbl_place c ON c.place_id=p.place_id INNER JOIN tbl_district d ON d.district_id=c.district_id where doctor_id='".$_SESSION["doctorid"]."' and doctorrequest_status=0";
	//echo $selQry;
	$row=$con->query($selQry);
	$i=0;
	while($result=$row->fetch_assoc())
	{
		$i++;
		?>
		<tr>
		<td><?php echo $i;?></td>
		<td><?php echo $result["patient_name"];?></td>
		<td><?php echo $result["patient_gender"];?></td>
		<td><?php echo $result["patient_contact"];?></td>
		<td><?php echo $result["patient_email"];?></td>
		<td><?php echo $result["district_name"];?></td>
		<td><?php echo $result["place_name"];?></td>
		
        
        <td><img src="../Assets/Files/patientPhoto/<?php echo $result["patient_photo"];?>" width="120" height="120"/></td>
		
		<td><?php echo $result["patient_address"];?></td>
		<td><?php echo $result["doctorrequest_subject"];?></td>
		<td><?php echo $result["doctorrequest_message"];?></td>
        <td>
            <a href="ViewPatientRequestList.php?aid=<?php echo $result["doctorrequest_id"]?>&user=<?php echo $result["patient_email"];?>">Accepted</a></td>
             <td width="70">
            <a href="ViewPatientRequestList.php?rid=<?php echo $result["doctorrequest_id"]?>&user=<?php echo $result["patient_email"];?>">Rejected</a></td>
            </tr>
    	<?php
	}
	?>
</table>
</form>
</body>
</html>

