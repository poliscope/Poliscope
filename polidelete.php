<?php
session_start();
$conn = mysqli_connect('localhost','root','','poliscope');
        if(mysqli_connect_error())
        {
            echo "Error in connecting to database: ".mysqli_connect_error();
        }
        else{
		$sql="delete from posts where user_id=$_SESSION[user]";
		if(mysqli_query($conn,$sql))
		  header("Location:user.php?khudka=true");
		else
		  echo "Cannot Delete sorry";
		 }
?>