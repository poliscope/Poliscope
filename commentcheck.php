<html>
<head>
</head>
<body>
<?php
session_start();
$des=$_POST['des1'];
/*$image = $_FILES['image1']['tmp_name'];
$img = file_get_contents($image);
$check=0;
$check1=FALSE;*/
$check2=0;
$conn = mysqli_connect('localhost','root','','poliscope');
	         if(mysqli_connect_error())
	         {
		       echo "Error in connecting to database: ".mysqli_connect_error();
	         }
	         else {
                 $temp="select * from users where user_id='$_SESSION[user]'";
                 $tmprs=mysqli_query($conn,$temp);
                 $tmprow=mysqli_fetch_assoc($tmprs);
				 $fn=$tmprow['first_name'];
	             $ln=$tmprow['last_name'];
                 $sql="INSERT INTO `comment`(`post_id`,`des`,`user_id`,`modified_time`,`modified_date`,`first`,`last`) VALUES ('$_SESSION[sp]','$des','$_SESSION[user]',CURRENT_TIME(),CURRENT_DATE(),'$fn','$ln')";


                 if(mysqli_query($conn,$sql)){
                     /*if($img===FALSE){
                         echo"";
                         $check=1;
                     }
                     else{
						 //$check=1;
                         $sql1 = "UPDATE comment set image=? where user_id=$_SESSION[user] and modified_time=CURRENT_TIME() and modified_date=CURRENT_DATE()";
                         $stmt1 = mysqli_prepare($conn,$sql1);

                         mysqli_stmt_bind_param($stmt1, "s",$img);
                         mysqli_stmt_execute($stmt1);
                         $check = mysqli_stmt_affected_rows($stmt1);
                     }*/
					 if($tmprow['profile']!=null){
			         $sql2 = "UPDATE comment set profile_pic=? where post_id=$_SESSION[sp] and modified_time=CURRENT_TIME() and modified_date=CURRENT_DATE()";
                     $stmt2 = mysqli_prepare($conn,$sql2);

                     mysqli_stmt_bind_param($stmt2, "s",$tmprow['profile']);
                     mysqli_stmt_execute($stmt2);
                     $check2 = mysqli_stmt_affected_rows($stmt2);
			
		             }
		            else{
		            echo"";
                    $check2=1;
		            }
                     //echo$check."<br/>".$check1."<br/>";
                     if($check2==1){
						 header("Location:comment.php");
					 }
                     else
                         echo"<h1>Error in Photo Uploading Or Audio/Video Uploading!!!!</h1>";
                 }
                 else
                     echo"Server Down";
             }
?>
</body>
</html>