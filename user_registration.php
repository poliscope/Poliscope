<html>
<body>

<?php
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $gender=$_POST['gender'];
  $email=$_POST['email'];
  $password=$_POST['password1'];
  $dob=$_POST['bday'];
  $state=$_POST['state'];
  $city=$_POST['city'];
  $conn=mysqli_connect("localhost","root","","poliscope");
	if(mysqli_connect_error())
	{
		echo "Error in connecting to database: ".mysqli_connect_error();
	}
	else{
		$checking = "Select * from users where email='$email'";
		$checkingresult = mysqli_query($conn,$checking);
		if(mysqli_num_rows($checkingresult)>0)
			header("Location:index.php?userexist=true");
		else{
		$sql="INSERT INTO users(`first_name`, `last_name`, `gender`, `dob`, `email`, `password`, `state`, `city`, `address`, `qualification`, `local`, `state_con`, `central`, `interest1`, `interest2`, `interest3`, `interest4`,`profile_create`,`pol_create`) VALUES ('$fname','$lname','$gender','$dob','$email','$password','$state','$city','null','null','null','null','null','null','null','null','null','n','n')";
		if(mysqli_query($conn,$sql)){
			header("Location:index.php");
		}
		else{
			echo"<h1 align='center'>Sorry!Please Try Again Later,Server Down Temporarily</h1>";
		}
		}
	}
?>

</body>
</html>