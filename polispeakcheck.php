<html>
<head>

<title>Poliscope</title>
	<a href="homedemo.php">RETURN TO TIMELINE</a>
	<br><br><hr>
	<h1>Speakcheck:
    <link rel="stylesheet" type="text/css" href="css/user.css">
	<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    <meta charset=utf-8 />
</head>
<body>
<?php
session_start();
$id=$_POST['pid'];
$des=$_POST['des'];
$image = $_FILES['image']['tmp_name'];
$img = file_get_contents($image);
//echo"id=".$id;
$check=0;
$check1=FALSE;
$check2=0;
$conn = mysqli_connect('localhost','root','','poliscope');
	         if(mysqli_connect_error())
	         {
		       echo "Error in connecting to database: ".mysqli_connect_error();
	         }
	         else {
                 if($_SESSION['polipage']==1){
                     $const="local";
                     $temp="select * from posts where politician_id='$_SESSION[pol]'";
                     $tmprs=mysqli_query($conn,$temp);
                     $tmprow=mysqli_fetch_assoc($tmprs);
                     $area=$tmprow['const'];
                  }
                 if($_SESSION['polipage']==2){
                     $const="state";
                     $temp="select * from posts where politician_id='$_SESSION[pol]'";
                     $tmprs=mysqli_query($conn,$temp);
                     $tmprow=mysqli_fetch_assoc($tmprs);
                     $area=$tmprow['const'];
                 }

                 if($_SESSION['polipage']==3){
                     $const="central";
                     $temp="select * from posts where politician_id='$_SESSION[pol]'";
                     $tmprs=mysqli_query($conn,$temp);
                     $tmprow=mysqli_fetch_assoc($tmprs);
                     $area=$tmprow['const'];
                 }
                 
				 if($_SESSION['polipage']==12){
                     $temp="select * from posts where politician_id='$_SESSION[pol]'";
                     $tmprs=mysqli_query($conn,$temp);
                     $tmprow=mysqli_fetch_assoc($tmprs);
                     $area=$tmprow['const'];
					 $const=$tmprow['const_category'];
                 }
                 
                     $check1 = TRUE;
                 
                     $target_dir = "C:\wamp\www\poliscope\ ";

                     $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//image upload 

                     $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                     if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                         echo "File Format Not Suppoted";
						 $img=NULL;
                     } else {
						 echo"file format supported";
                         $video_path = $_FILES['fileToUpload']['name'];


                         $check1 = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
                     }

                 
				  $temp="select * from posts as p inner join users as u where politician_id='$_SESSION[pol]' and p.user_id=u.user_id ";
                     $tmprs=mysqli_query($conn,$temp);
                     $tmprow=mysqli_fetch_assoc($tmprs);
                     $fn=$tmprow['first_name'];
                     $ln=$tmprow['last_name'];
					 
				 

                 $sql="INSERT INTO `post`(`des`,`poli_id`,`modified_time`,`modified_date`,`speak`,`name`,`const`,`area`,`first`,`last`) VALUES ('$des','$_SESSION[pol]',CURRENT_TIME(),CURRENT_DATE(),'$id','$video_path','$const','$area','$fn','$ln')";


                 if(mysqli_query($conn,$sql)){
                     if($img==NULL){
                         echo"";
                         $check=1;
                     }
                     else{
						 //$check=1;
                         $sql1 = "UPDATE post set image=? where poli_id=$_SESSION[pol] and modified_time=CURRENT_TIME() and modified_date=CURRENT_DATE()";
                         $stmt1 = mysqli_prepare($conn,$sql1);

                         mysqli_stmt_bind_param($stmt1, "s",$img);
                         mysqli_stmt_execute($stmt1);
                         $check = mysqli_stmt_affected_rows($stmt1);
                     }
					 if($tmprow['profile']!=null){
			 $sql2 = "UPDATE post set profile_pic=? where poli_id=$_SESSION[pol] and modified_time=CURRENT_TIME() and modified_date=CURRENT_DATE()";
                        $stmt2 = mysqli_prepare($conn,$sql2);

            mysqli_stmt_bind_param($stmt2, "s",$tmprow['profile']);
            mysqli_stmt_execute($stmt2);
            $check2 = mysqli_stmt_affected_rows($stmt2);
			
		}
		else{
		    echo"";
            $check2=1;
		}
                     //echo $check."<br/>".$check1."<br/>".$check2;
                     if($check==1 && $check1==TRUE && $check2==1) {
                         if($_SESSION['polipage']==1)
                             header("Location:polilocaldemo.php");
                         if($_SESSION['polipage']==2)
                             header("Location:polistatedemo.php");

                         if($_SESSION['polipage']==3)
                             header("Location:policentraldemo.php");
                         if($_SESSION['polipage']==12)
                             header("Location:poliview.php");

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