<!DOCTYPE html>
<html lang="en">
<head>
  <title>Search Result Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
  </style>
</head>
<body>

  <div class="container text-center"style="margin-top:80px">   
  <h2>People you are searching...</h2><br>
<?php


session_start();
			if(isset($_SESSION['user']))
                                           {echo"";
										   }
else
                                        {
	                                     header('Location:index.php');
                                        }
$name=$_POST['find'];
$conn = mysqli_connect('localhost','root','','poliscope');
if(mysqli_connect_error())
{
    echo "Error in connecting to database: ".mysqli_connect_error();
}
else{
  //  $sql="Select * from users where first_name='$name' or last_name='$name'";
    $sql="Select * from users ";
    $result=mysqli_query($conn,$sql);
	$i=-1;
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            $name=strtolower($name);
            $first=strtolower($row['first_name']);
            $last=strtolower($row['last_name']);
			if (strpos($name, ' ') == true) {

                list($part1, $part2) = explode(' ', $name);
                if ($part1 == $first || $part2 == $last)
                { 
			      $i=$i+1;
				  if(($i%2)==0){
			      echo"<div class='row'>
                       <div class='col-sm-3' style='background-color:white;'></div>";
			      }
                  echo"<div class='col-sm-3 '>
				       <div class='well'>
					   <form action='user.php?search=true' method='post'>";
                  echo' <img src="data:image/jpeg;base64,'.base64_encode( $row['profile'] ).'" class="img-circle" height="60" width="60" alt="PROFILE PIC">';
                  echo"<h><input type='hidden' value='$row[user_id]' name='userid'>
				       <input type='submit' value='$row[first_name] $row[last_name]'></h><br>
                       <h>$row[city]</h>
					   </form>
                       </div>
                       </div>";
				  if(($i%2)!=0)
				     echo"</div>";
                }
			}
			else{
                if ($name == $first || $name == $last) {
				  $i=$i+1;
				  if(($i%2)==0){
			      echo"<div class='row'>
                       <div class='col-sm-3' style='background-color:white;'></div>";
			      }
                  echo"<div class='col-sm-3 '>
				       <div class='well'>
					   <form action='user.php?search=true' method='post'>";
                  echo' <img src="data:image/jpeg;base64,'.base64_encode( $row['profile'] ).'" class="img-circle" height="60" width="60" alt="PROFILE PIC">';
                  echo"<h><input type='hidden' value='$row[user_id]' name='userid'>
				       <input type='submit' value='$row[first_name] $row[last_name]'></h><br>
                       <h>$row[city]</h>
					   </form>
                       </div>
                       </div>";
				  if(($i%2)!=0)
				     echo"</div>";
			   }
			}
		}
	}
}
?>
<?php include 'navbar1.php'; ?>
      </div>

    
</body>
</html>
