<html>
<head>
</head>
<body>
<?php
session_start();
$des=$_POST['des'];
$image = $_FILES['image']['tmp_name'];
$img = file_get_contents($image);
$check2=0;
$check=0;
$check1=FALSE;
$conn = mysqli_connect('localhost','root','','poliscope');
if(mysqli_connect_error())
{
    echo "Error in connecting to database: ".mysqli_connect_error();
}
else {
    
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

    
    $const="local";
    $temp="select * from users as u inner join posts as p on u.user_id=p.user_id and p.politician_id='$_SESSION[pol]'";
    $tmprs=mysqli_query($conn,$temp);
    $tmprow=mysqli_fetch_assoc($tmprs);
    $area=$tmprow['const'];
    $fn=$tmprow['first_name'];
	$ln=$tmprow['last_name'];
    $sql="INSERT INTO `post`(`des`,`poli_id`,`modified_time`,`modified_date`,`name`,`const`,`area`,`first`,`last`) VALUES ('$des','$_SESSION[pol]',CURRENT_TIME(),CURRENT_DATE(),'$video_path','$const','$area','$fn','$ln')";


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
        // echo$check."<br/>".$check1."<br/>";
        if($check==1 && $check1==TRUE && $check2==1)
            header("Location:polilocaldemo.php");
        else
            echo"<h1>Error in Photo Uploading Or Audio/Video Uploading!!!!</h1>";
    }
    else
        echo"Server Down";
}
?>
</body>
</html>