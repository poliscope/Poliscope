<html>
<head>
</head>
<body>
<?php
session_start();
$des=$_POST['des'];
$image = $_FILES['image']['tmp_name'];
echo"$image";
$img = file_get_contents($image);
$check3=0;
$check=0;
$check1=FALSE;
$check2=0;
$conn = mysqli_connect('localhost','root','','poliscope');
	         if(mysqli_connect_error())
	         {
		       echo "Error in connecting to database: ".mysqli_connect_error();
	         }
	         else {
               /*  if (empty($_FILES['image']['tmp_name'])) {
                     echo "Fuckoff ";
                     $video_path = "null";
                     $check1 = TRUE;
                 } else {
					 */
                     $target_dir = "C:\wamp\www\poliscope\ ";

                     $target_file = $target_dir . basename($_FILES["image"]["tmp_name"]);
//image upload 
$target_file1 = $target_dir . basename($_FILES["image"]["name"]);
                     $imageFileType = pathinfo($target_file1, PATHINFO_EXTENSION);

                     if ( $imageFileType != "jpeg" && $imageFileType != "jpg" && $imageFileType != "gif") {
                         echo "File Format Not Suppoted UPLOAD IMAGE";
						 $check3=1;
						 $img=NULL;
                     } else {
						 echo"file format supported";
					 
                         $video_path = $_FILES['image']['tmp_name'];
echo"$video_path";
					 }
                         $check1 = move_uploaded_file($_FILES["image"]["name"], $target_file);
                    
				 $const="home";
                 $temp="select * from users where user_id='$_SESSION[user]'";
                 $tmprs=mysqli_query($conn,$temp);
                 $tmprow=mysqli_fetch_assoc($tmprs);
                 $area=$tmprow['local'];
	             $fn=$tmprow['first_name'];
	             $ln=$tmprow['last_name'];
				 echo"<br>".$des.$_SESSION['user'].$video_path.$const.$area.$fn.$ln;
                 $sql="INSERT INTO `post`(`des`,`user_id`,`modified_time`,`modified_date`,`name`,`const`,`area`,`first`,`last`) VALUES ('$des','$_SESSION[user]',CURRENT_TIME(),CURRENT_DATE(),'$video_path','$const','$area','$fn','$ln')";


                 if(mysqli_query($conn,$sql)){
                     
					 if($img===FALSE || $check3==1){
                         echo"";
                         $check=1;
                     }
                     else{
						 //$check=1;
                         $sql1 = "UPDATE post set image=? where user_id=$_SESSION[user] and modified_time=CURRENT_TIME() and modified_date=CURRENT_DATE()";
                         $stmt1 = mysqli_prepare($conn,$sql1);

                         mysqli_stmt_bind_param($stmt1, "s",$img);
                         mysqli_stmt_execute($stmt1);
                         $check = mysqli_stmt_affected_rows($stmt1);
                     }
                    // echo$check."<br/>".$check1."<br/>";
					if($tmprow['profile']!=null){
			$sql2 = "UPDATE post set profile_pic=? where user_id=$_SESSION[user] and modified_time=CURRENT_TIME() and modified_date=CURRENT_DATE()";
            $stmt2 = mysqli_prepare($conn,$sql2);

            mysqli_stmt_bind_param($stmt2, "s",$tmprow['profile']);
            mysqli_stmt_execute($stmt2);
            $check2 = mysqli_stmt_affected_rows($stmt2);
			
		}
		else{
		    echo"";
            $check2=1;
		}echo"check ".$check."check1 ".$check1."check2 ".$check2;
                     if($check==1 &&  $check1!=TRUE )
                         header("Location:homedemo.php");
                     else
                         echo"<h1>Error in Photo Uploading Or Audio/Video Uploading!!!!</h1>";
                 }
                 else
                     echo"Server Down";
             }
?>
</body>
</html>