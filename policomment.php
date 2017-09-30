<!DOCTYPE html>
<html lang="en">
<head>
  <title>Comment Page</title>
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
  <script>
function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
</head>
<body>
 <div class="container text-centre"style="margin-top:50px">
 <?php
 session_start();
			if(isset($_SESSION['user']))
                                           {echo"";
										   }
else
                                        {
	                                     header('Location:index.php');
                                        }
 $conn = mysqli_connect('localhost','root','','poliscope');
 if(mysqli_connect_error())
 {
 echo "Error in connecting to database: ".mysqli_connect_error();
 }
 else {
 
 echo"<ul class='pager'>";
	if($_SESSION['polipage']==1)
    echo"<li class='previous'><a href='polilocaldemo.php'><span class='glyphicon glyphicon-arrow-left'></span>	Back</a></li>
    <br><br>";
	if($_SESSION['polipage']==2)
    echo"<li class='previous'><a href='polistatedemo.php'><span class='glyphicon glyphicon-arrow-left'></span>	Back</a></li>
    <br><br>";
	if($_SESSION['polipage']==3)
    echo"<li class='previous'><a href='policentraldemo.php'><span class='glyphicon glyphicon-arrow-left'></span>	Back</a></li>
    <br><br>";
    if($_SESSION['polipage']==4)
	echo"<li class='previous'><a href='poliview.php?id=$_SESSION[tempid]'><span class='glyphicon glyphicon-arrow-left'></span>	Back</a></li>
    <br><br>";
	$sql="Select * from post where post_id=$_SESSION[sp]";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
    echo"<div class='row'>
        <div class='col-sm-3'>
          <div class='well'>
           <p>$row[first] $row[last]</p>";
		   echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['profile_pic'] ).'" class="img-circle" height="55" width="55" alt="Profile Pic" />';
           echo"<p>$row[modified_date] $row[modified_time]</p>
          </div>
        </div>
        <div class='col-sm-6'>
          <div class='well'>
            <p>$row[des].</p>
            <div class='container'>
			<div class='row'>
			<div class='col-md-4'>
			<div class='thumbnail'>";
			echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"alt="Your Posted Image" />';
            echo"</div>
	             </div>
	             </div>
                 </div>
          </div>
    <div class='container text-center'>    
    <div class='row'>
    <div class='col-sm-12'>
    <div class='row'>
        <div class='col-sm-7'>
          <div class='panel panel-default text-left'>
            <div class='panel-body'>
			<form action='policommentcheck.php' method='post' enctype='multipart/form-data'>
              <div class='form-group'>
                <label for='usr'>Write Suggestions:</label>
                <input type='text' class='form-control' id='usr' name='des1' value=''>
              </div>
              <button type='submit' class='btn btn-default btn-sm'>
               <img src='images/suggest.png' height='25'/> Suggest
	          </button> 
            </form>			  
            </div>
          </div>
        </div>
    </div>";
	$sql1="select * from comment where post_id='$_SESSION[sp]' order by number desc";
	$result1=mysqli_query($conn,$sql1);
	if(mysqli_num_rows($result1)>0){
	while($row1=mysqli_fetch_assoc($result1)){
		
		$type="";
			
			if($row1['poli_id']!=NULL)
			{
				$type = "Politician";
			}
			else
			{
				$type = "";
			}
		
		
    echo"<div class='row'>
           <div class='col-sm-2'>
             <div class='well'>
                <p><B>$type</B><br>$row1[first] $row1[last]</p>";
				echo '<img src="data:image/jpeg;base64,'.base64_encode( $row1['profile_pic'] ).'" class="img-circle" height="55" width="55" alt="Profile Pic" />';
                echo"<p>$row1[modified_date] $row1[modified_time]</p>
             </div>
            </div>
            <div class='col-sm-5'>
            <div class='well'>
            <p>$row1[des].</p>
            </div>
            </div>
        </div>";
    }
   }
   else echo"";   
   echo"</div>
   </div>
   </div>
   </div>
   </div>";
   }
   ?>
</div>
<?php include 'navbar1.php';?>
</body>
</html>
