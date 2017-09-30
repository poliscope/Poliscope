<html>
<body>
<?php
session_start();
$const=$_POST['const'];
$conn = mysqli_connect('localhost','root','','poliscope');
	if(mysqli_connect_error())
	{
		echo "Error in connecting to database: ".mysqli_connect_error();
	}
	else{
   $sql="UPDATE posts set const='$const' where user_id=$_SESSION[user]";
   $sql1="UPDATE users set pol_create='y' where user_id=$_SESSION[user]";    
	 if(mysqli_query($conn,$sql)&&mysqli_query($conn,$sql1)) {
         header("Location:poliview.php");
         echo "";
     }
    else {
        echo "<h1 align='center'>Sorry!Please try Again Later,Server Down Temporarily</h1>";
    }
	
	
	
	}
?>
</body>
</html>
