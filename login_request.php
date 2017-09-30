<?php
session_start();
?>

<html>
<body>

<?php
$username=$_POST['username'];
$password=$_POST['password'];
$hash = password_hash($passwod, PASSWORD_DEFAULT);

$conn = mysqli_connect('localhost','root','','poliscope');
if(mysqli_connect_error())
	{
		echo "Error in connecting to database: ".mysqli_connect_error();
	}
	else{
	$sql="select * from users where email='$username'";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	if(mysqli_num_rows($result)>0){
	$u_id=$row['user_id'];
	$_SESSION['user']=$u_id;
	if($password==$row['password']){
			header("Location:user_create.php");
		}
		else{
			header("Location:index.php?invalid=true");
		}
	}
	 else
		 header("Location:index.php?exist=true");
	}
	?>
</body>
</html>