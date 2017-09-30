<?php

  $conn=mysqli_connect("localhost","root","","poliscope");
	if(mysqli_connect_error())
	{
		echo "Error in connecting to database: ".mysqli_connect_error();
		//echo"here we are";
	}
	else{


if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    // Verify data
    $email = mysql_escape_string($_GET['email']); // Set email variable
    $hash = mysql_escape_string($_GET['hash']); // Set hash variable

echo "email is ".$email;
echo " hash is ".$hash;
$sql="SELECT email, hash FROM users WHERE email='$email' AND hash='$hash'";
$search = mysqli_query($conn,$sql);// or die(mysql_error()); 
$match  = mysqli_num_rows($search);
echo $match;
  if($match > 0){

$sql="UPDATE users SET verified='1' WHERE email='$email' AND hash='$hash'";
mysqli_query($conn,$sql) or die(mysql_error());
			header("Location:index.php");
  }
  else
  	echo "User not found";

}
}

?>