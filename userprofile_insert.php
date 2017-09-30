<html>
<body>
<?php
session_start();
$address=$_POST['add'];
$qualification=$_POST['qual'];
$local=$_POST['lc'];
$state_con=$_POST['sc'];
$central=$_POST['cc'];
$one=$_POST['one'];
$two=$_POST['two'];
$three=$_POST['three'];
$four=$_POST['four'];
$five=$_POST['five'];
$six=$_POST['six'];
$seven=$_POST['seven'];
$eight=$_POST['eight'];
$image = $_FILES['image']['tmp_name'];
$img = file_get_contents($image);
$conn = mysqli_connect('localhost','root','','poliscope');
	if(mysqli_connect_error())
	{
		echo "Error in connecting to database: ".mysqli_connect_error();
	}
	else{
	$sql4="UPDATE users set address='$address' where user_id=$_SESSION[user]";
	$sql5="UPDATE users set qualification='$qualification' where user_id=$_SESSION[user]";
	$sql6="UPDATE users set local='$local' where user_id=$_SESSION[user]";
	$sql7="UPDATE users set state_con='$state_con' where user_id=$_SESSION[user]";
	$sql8="UPDATE users set central='$central' where user_id=$_SESSION[user]";
	$sql9="UPDATE users set interest1='$one' where user_id=$_SESSION[user]";
	$sql10="UPDATE users set interest2='$two' where user_id=$_SESSION[user]";
	$sql11="UPDATE users set interest3='$three' where user_id=$_SESSION[user]";
	$sql12="UPDATE users set interest4='$four' where user_id=$_SESSION[user]";
	$sql14="UPDATE users set interest5='$five' where user_id=$_SESSION[user]";
	$sql15="UPDATE users set interest6='$six' where user_id=$_SESSION[user]";
	$sql16="UPDATE users set interest7='$seven' where user_id=$_SESSION[user]";
	$sql17="UPDATE users set interest8='$eight' where user_id=$_SESSION[user]";
	$sql13="UPDATE users set profile_create='y' where user_id=$_SESSION[user]";
 
    if($img===false){
		echo"";
		$check=1;
	}
	else{
    $sql = "UPDATE users set profile=? where user_id=$_SESSION[user]";
 
    $stmt = mysqli_prepare($conn,$sql);
 
    mysqli_stmt_bind_param($stmt, "s",$img);
    mysqli_stmt_execute($stmt);
	$check = mysqli_stmt_affected_rows($stmt);
    }
    if($check==1){
      if(mysqli_query($conn,$sql4)&&mysqli_query($conn,$sql5)&&mysqli_query($conn,$sql6)&&mysqli_query($conn,$sql7)&&mysqli_query($conn,$sql8)&&mysqli_query($conn,$sql9)&&mysqli_query($conn,$sql10)&&mysqli_query($conn,$sql11)&&mysqli_query($conn,$sql12)&&mysqli_query($conn,$sql13)&&mysqli_query($conn,$sql14)&&mysqli_query($conn,$sql15)&&mysqli_query($conn,$sql16)&&mysqli_query($conn,$sql17)){
       header("Location:user.php?khudka=true");
    }else{
        echo"<h1 align='center'>Sorry!Please try Again Later,Server Down Temporarily</h1>";
    
	}
	}
	else{
		echo"<h1 align='center'>Sorry!Some Error in Photo Uploaded</h1>";
	}
	}
?>
</body>
</html>
