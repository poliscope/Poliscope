<html>
<body>
<?php
session_start();
$first=$_POST['first'];
$last=$_POST['last'];
$dob=$_POST['bday'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$state=$_POST['state'];
$city=$_POST['city'];
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
    $sql2="Update users set state='$state' where user_id=$_SESSION[user]";
	$sql3="UPDATE users set city='$city' where user_id=$_SESSION[user]";
	$sql4="UPDATE users set address='$address' where user_id=$_SESSION[user]";
	$sql5="UPDATE users set qualification='$qualification' where user_id=$_SESSION[user]";
	$sql6="UPDATE users set local='$local' where user_id=$_SESSION[user]";
	$sql7="UPDATE users set state_con='$state_con' where user_id=$_SESSION[user]";
	$sql8="UPDATE users set central='$central' where user_id=$_SESSION[user]";
	$sql9="UPDATE users set interest1='$one' where user_id=$_SESSION[user]";
	$sql10="UPDATE users set interest2='$two' where user_id=$_SESSION[user]";
	$sql11="UPDATE users set interest3='$three' where user_id=$_SESSION[user]";
	$sql12="UPDATE users set interest4='$four' where user_id=$_SESSION[user]";
	$sql19="UPDATE users set interest5='$five' where user_id=$_SESSION[user]";
	$sql20="UPDATE users set interest6='$six' where user_id=$_SESSION[user]";
	$sql21="UPDATE users set interest7='$seven' where user_id=$_SESSION[user]";
	$sql22="UPDATE users set interest8='$eight' where user_id=$_SESSION[user]";
	$sql13="UPDATE users set profile_create='y' where user_id=$_SESSION[user]";
    $sql14="UPDATE users set first_name='$first' where user_id=$_SESSION[user]";
    $sql15="UPDATE users set last_name='$last' where user_id=$_SESSION[user]";
	$sql16="UPDATE users set dob='$dob' where user_id=$_SESSION[user]";
	$sql17="UPDATE users set gender='$gender' where user_id=$_SESSION[user]";
	$sql18="UPDATE users set email='$email' where user_id=$_SESSION[user]";
	if($img===false){
		echo"";
		$check=1;
		$checknw = 1;
		$checknw1 = 1;
		$checknw2 = 1;
		$checknw3 = 1;
	}
	else{
    $sql = "UPDATE users set profile=? where user_id=$_SESSION[user]";
 
    $stmt = mysqli_prepare($conn,$sql);
 
    mysqli_stmt_bind_param($stmt, "s",$img);
    mysqli_stmt_execute($stmt);
	$check = mysqli_stmt_affected_rows($stmt);
	
	$today = "SELECT * from posts where user_id = $_SESSION[user]";
	$todayresult = mysqli_query($conn,$today);
	$todayrow = mysqli_fetch_assoc($todayresult);
	if(mysqli_num_rows($todayresult)>0)
	$pol = $todayrow['politician_id'];
	else
    $pol = 0;
	
	$sqlnw = "UPDATE post set profile_pic=? where user_id=$_SESSION[user]";
	$stmtnw = mysqli_prepare($conn,$sqlnw);
 
    mysqli_stmt_bind_param($stmtnw, "s",$img);
    mysqli_stmt_execute($stmtnw);
	$checknw = mysqli_stmt_affected_rows($stmtnw);
	$sqlnw2 = "UPDATE comment set profile_pic=? where user_id=$_SESSION[user]";
	$stmtnw2 = mysqli_prepare($conn,$sqlnw2);
 
    mysqli_stmt_bind_param($stmtnw2, "s",$img);
    mysqli_stmt_execute($stmtnw2);
	$checknw2 = mysqli_stmt_affected_rows($stmtnw2);
	if($pol!=0){
    $sqlnw1 = "UPDATE post set profile_pic=? where poli_id=".$pol."";
	$stmtnw1 = mysqli_prepare($conn,$sqlnw1);
 
    mysqli_stmt_bind_param($stmtnw1, "s",$img);
    mysqli_stmt_execute($stmtnw1);
	$checknw1 = mysqli_stmt_affected_rows($stmtnw1);
	$sqlnw3 = "UPDATE comment set profile_pic=? where user_id=$_SESSION[user]";
	$stmtnw3 = mysqli_prepare($conn,$sqlnw3);
 
    mysqli_stmt_bind_param($stmtnw3, "s",$img);
    mysqli_stmt_execute($stmtnw3);
	$checknw3 = mysqli_stmt_affected_rows($stmtnw3);
	}
    else{
		$checknw1 = 1;
		$checknw3 = 1;
	}
	
	}
    if($check==1&&$checknw>=1&&$checknw1>=1){
      if(mysqli_query($conn,$sql2)&&mysqli_query($conn,$sql3)&&mysqli_query($conn,$sql4)&&mysqli_query($conn,$sql5)&&mysqli_query($conn,$sql6)&&mysqli_query($conn,$sql7)&&mysqli_query($conn,$sql8)&&mysqli_query($conn,$sql9)&&mysqli_query($conn,$sql10)&&mysqli_query($conn,$sql11)&&mysqli_query($conn,$sql12)&&mysqli_query($conn,$sql13)&&mysqli_query($conn,$sql14)&&mysqli_query($conn,$sql15)&&mysqli_query($conn,$sql16)&&mysqli_query($conn,$sql17)&&mysqli_query($conn,$sql18)&&mysqli_query($conn,$sql19)&&mysqli_query($conn,$sql20)&&mysqli_query($conn,$sql21)&&mysqli_query($conn,$sql22)){
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
