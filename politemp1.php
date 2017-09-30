<html>
<body>
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
	$deep="Select * from posts where aadhar_no='$aadhar' and politician_id!=$_SESSION[pol]";
	$deepresult = mysqli_query($conn,$deep);
	if(mysqli_num_rows($deepresult)>0)
		header("Location:poliformupdate.php?valid=true");
	else{
    $sql2="Update posts set agenda='$agn' where politician_id=$_SESSION[pol]";
	$sql4="UPDATE posts set history='$his' where politician_id=$_SESSION[pol]";
	$sql5="UPDATE posts set const_category='$cconst' where politician_id=$_SESSION[pol]";
	$sql9="UPDATE posts set interest1='$one' where politician_id=$_SESSION[pol]";
	$sql10="UPDATE posts set interest2='$two' where politician_id=$_SESSION[pol]";
	$sql11="UPDATE posts set interest3='$three' where politician_id=$_SESSION[pol]";
	$sql12="UPDATE posts set interest4='$four' where politician_id=$_SESSION[pol]";
	$sql13="UPDATE posts set interest5='$five' where politician_id=$_SESSION[pol]";
	$sql14="UPDATE posts set interest6='$six' where politician_id=$_SESSION[pol]";
	$sql15="UPDATE posts set interest7='$seven' where politician_id=$_SESSION[pol]";
	$sql16="UPDATE posts set interest8='$eight' where politician_id=$_SESSION[pol]";
	$sql17="UPDATE posts set aadhar_no='$aadhar' where politician_id=$_SESSION[pol]";
	if(mysqli_query($conn,$sql2)&&mysqli_query($conn,$sql4)&&mysqli_query($conn,$sql5)&&mysqli_query($conn,$sql9)&&mysqli_query($conn,$sql10)&&mysqli_query($conn,$sql11)&&mysqli_query($conn,$sql12)&&mysqli_query($conn,$sql13)&&mysqli_query($conn,$sql14)&&mysqli_query($conn,$sql15)&&mysqli_query($conn,$sql16)&&mysqli_query($conn,$sql17)){
    if($img1===false){
		//echo"hi<br/>";
		$check1=1;
	}
	else{
    $sql2 = "UPDATE posts set cover=? where user_id='$_SESSION[user]'";
 
    $stmt1 = mysqli_prepare($conn,$sql2);
 
    mysqli_stmt_bind_param($stmt1, "s",$img1);
    mysqli_stmt_execute($stmt1);
    $check1 = mysqli_stmt_affected_rows($stmt1);
	//echo $check1."fo<br/>";
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
	if($check1=1&&$check2==1){
     header("Location:poliformupdate1.php?cconst=$cconst");
    }else{
        echo"<h1 align='center'>Sorry!Some Error in Photo Uploaded</h1>";
    }
	}
	else echo "<h1 align='center'>Sorry!Please try Again Later,Server Down Temporarily</h1>";
    }
	}
?>
</body>
</html>
