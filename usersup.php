<html>
<head>
    <title>Poliscope</title>
    <link rel="stylesheet" type="text/css" href="css/user.css">

</head>

<body>
<?php //include('navbar.php'); ?>

<?php
session_start();
$id=$_POST['supid'];
$conn = mysqli_connect('localhost','root','','poliscope');
if(mysqli_connect_error())
{
    echo "Error in connecting to database: ".mysqli_connect_error();
}
else{
	$temp="select * from support where userid='$_SESSION[user]' and supid='$id'";
	$tempr=mysqli_query($conn,$temp);
	if(mysqli_num_rows($tempr)>0){
		$temp1="DELETE from `support` where userid='$_SESSION[user]' and supid='$id'";
	      if (mysqli_query($conn, $temp1))
			  if(!empty($_GET["poli"]))
                header("Location:poliview.php?id=$id");
			  else
				header("Location:user.php?id=$id");
	}
	else{
          if(!empty($_GET["poli"])) {
             $sql = "INSERT INTO `support`(`userid`,`supid`,`category`) VALUES('$_SESSION[user]','$id','politician')";

             if (mysqli_query($conn, $sql)) {
              header("Location:poliview.php?id=$id");
             }
             else{
              echo"insert failed";
             }
         }
         else {
             $sql = "INSERT INTO `support`(`userid`,`supid`,`category`) VALUES('$_SESSION[user]','$id','citizen')";

             if (mysqli_query($conn, $sql)) {
              header("Location:user.php?id=$id");
             }
             else{
               echo"insert failed";
             }
         }
	}
}




?>
</body>
</html>