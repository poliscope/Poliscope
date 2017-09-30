<?php
session_start();
$his=$_POST['history'];
$agn=$_POST['agn'];
$aadhar = $_POST['aadhar'];
$cconst=$_POST['cc'];
$one=$_POST['one'];
$two=$_POST['two'];
$three=$_POST['three'];
$four=$_POST['four'];
$five=$_POST['five'];
$six=$_POST['six'];
$seven=$_POST['seven'];
$eight=$_POST['eight'];
$image1 = $_FILES['image1']['tmp_name'];
$img1 = file_get_contents($image1);
$aadharpic = $_FILES['aadharpic']['tmp_name'];
$adp = file_get_contents($aadharpic);
$check1=0;
$check2=0;
$conn = mysqli_connect('localhost','root','','poliscope');
	if(mysqli_connect_error())
	{
		echo "Error in connecting to database: ".mysqli_connect_error();
	}
   else{
    $deep="Select * from posts where aadhar_no='$aadhar'";
	$deepresult = mysqli_query($conn,$deep);
	if(mysqli_num_rows($deepresult)>0)
		header("Location:policreate.php?valid=true");
	else{
   $sql="INSERT INTO `posts`(`user_id`,`history`,`agenda`,`aadhar_no`,`const_category`,`interest1`, `interest2`, `interest3`, `interest4`,`interest5`,`interest6`,`interest7`,`interest8`) VALUES ('$_SESSION[user]','$his','$agn','$aadhar','$cconst','$one','$two','$three','$four','$five','$six','$seven','$eight')";
   if(mysqli_query($conn,$sql)){
   if($img1===false){
		//echo"hi<br/>";
		$check1=1;
	}
	else{
    $sql2 = "UPDATE posts set cover=? where user_id=$_SESSION[user]";
    $stmt1 = mysqli_prepare($conn,$sql2);
 
    mysqli_stmt_bind_param($stmt1, "s",$img1);
    mysqli_stmt_execute($stmt1);
    $check1 = mysqli_stmt_affected_rows($stmt1);
	echo $check1."fo<br/>".$_SESSION['user'];
	}
	if($adp===false){
		//echo"hi<br/>";
		$check2=1;
	}
	else{
    $sql3 = "UPDATE posts set aadhar_pic=? where user_id=$_SESSION[user]";
    $stmt2 = mysqli_prepare($conn,$sql3);
 
    mysqli_stmt_bind_param($stmt2, "s",$adp);
    mysqli_stmt_execute($stmt2);
    $check2 = mysqli_stmt_affected_rows($stmt2);
	//echo $check1."fo<br/>".$_SESSION['user'];
	}
	if($check1==1&&$check2==1)
	   header("Location:policreate1.php?cconst=$cconst");
	else
	   echo "<h1 align='center'>Sorry!Some Error in Photo Uploaded</h1>";
	}
	else
		echo "<h1 align='center'>Sorry!Please try Again Later,Server Down Temporarily</h1>";
   }
   }
?>