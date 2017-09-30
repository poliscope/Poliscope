<html>
<body>

<?php
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $gender=$_POST['gender'];
  $email=$_POST['email'];
  $password=$_POST['password1'];
  //$hash = password_hash($password, PASSWORD_DEFAULT);
  $dob=$_POST['bday'];
  $state=$_POST['state'];
  $city=$_POST['city'];
  $conn=mysqli_connect("localhost","root","","poliscope");
  $hash = md5( rand(0,1000) );
echo " random generated is " . $hash;
/////////////////////////////////////////////////

use PHPMailer\PHPMailer\PHPMailer;
require 'Mailer/vendor/autoload.php';
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Set the hostname of the mail server
$mail->Host = 'smtp.zoho.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "poliscope@zoho.com";
//Password to use for SMTP authentication
$mail->Password = "hello123";
//Set who the message is to be sent from
$mail->setFrom('poliscope@zoho.com', 'poliscope');
//Set an alternative reply-to address
$mail->addReplyTo('poliscope@zoho.com', 'Admin@poliscope.com');
//Set who the message is to be sent to
$mail->addAddress($email, $fname);
//Set the subject line
$mail->Subject = 'Email verification';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

$mail->isHTML(false);
$mail->Body = 'Click to verify your access at poliscope '.$fname.'   http://localhost/baba/baba/poliscope/verify.php?email='.$email.'&hash='.$hash;
 
//Replace the plain text body with one created manually
$mail->AltBody = 'I guess there may be some error';
//Attach an image file
//$mail->addAttachment('images/poliscope.png');
//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}
///////////////////////////////////////////////



	if(mysqli_connect_error())
	{
	//	echo "Error in connecting to database: ".mysqli_connect_error();
		echo"here we are";
	}
	else{
		$sql="INSERT INTO users(`first_name`, `last_name`, `gender`, `dob`, `email`, `password`, `state`, `city`, `address`, `qualification`, `local`, `state_con`, `central`, `interest1`, `interest2`, `interest3`, `interest4`,`profile_create`,`pol_create`,`hash`) VALUES ('$fname','$lname','$gender','$dob','$email','$password','$state','$city','null','null','null','null','null','null','null','null','null','n','n','$hash')";
		if(mysqli_query($conn,$sql)){
			header("Location:index.php");
		}
		else{
			echo"<h1 align='center'>Sorry!Please Try Again Later,Server Down Temporarily</h1>";
		}
	//*/
	}
?>

</body>
</html>