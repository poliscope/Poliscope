<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create Your Profile</title>
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
        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah1')
                        .attr('src', e.target.result)
                        .width(400)
                        .height(270);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
		function myfun(parameter,parameter1){
			var x=document.getElementById(parameter).value;
			if(x=='null')
				document.getElementById(parameter).value=parameter1;
			else if(x!='null')
				document.getElementById(parameter).value='null';
		}
    </script>
</head>
<body>

<?php 
	session_start();
			if(isset($_SESSION['user']))
                                           {echo"";
										   }
else
                                        {
	                                     header('Location:index.php');
                                        }
	$conn=mysqli_connect("localhost","root","","poliscope");
if(mysqli_connect_error())
	{
		echo "Error in connecting to database: ".mysqli_connect_error();
	}
	else{
     $sql="select * from users where user_id=$_SESSION[user]";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	if(mysqli_num_rows($result)>0){
		if($row['profile_create']=='n')
			echo"";
		else
			header("Location:user.php?khudka=true");
	}
	}
	?>
  <div class="container text-center">   
 <h2>Personal Details</h2>
  <div class="row">
  <div class="col-sm-3" style="background-color:white;"></div>
  <div class="col-sm-6">
  <form action="userprofile_insert.php" name="f1" method="post" enctype="multipart/form-data">
  <input type="hidden" id="one" name="one" value="null">
  <input type="hidden" id="two" name="two" value="null">
  <input type="hidden" id="three" name="three" value="null">
  <input type="hidden" id="four" name="four" value="null">
  <input type="hidden" id="five" name="five" value="null">
  <input type="hidden" id="six" name="six" value="null">
  <input type="hidden" id="seven" name="seven" value="null">
  <input type="hidden" id="eight" name="eight" value="null">
    <div class="form-group">
      <label for="address">Address:</label>
      <input type="address" class="form-control input-lg" id="address" required name="add" placeholder="Enter Your Resedential Address">
    </div>
   
    <div class="form-group">
      <label for="inputsm">Qualification:</label>
      <input type="qualification" class="form-control" id="qualification" required name="qual" placeholder="Enter Your Qualification">
    </div>
    
    <div class="form-group">
      <label for="sel1">Central Constituency</label>
      <select class="form-control" id="sel1" required name="cc">
        <option></option>
		<?php
						$conn=mysqli_connect("localhost","root","","poliscope");
	                    if(mysqli_connect_error())
	                     {
		                     echo "Error in connecting to database: ".mysqli_connect_error();
	                     }
	                    else{
							$sql="select * from users where user_id='$_SESSION[user]'";
							$result=mysqli_query($conn,$sql);
							$row=mysqli_fetch_assoc($result);
							$central=$row['state'];
							$sql1="select * from central where cstate='$central'";
							$result1=mysqli_query($conn,$sql1);
							while($row1=mysqli_fetch_assoc($result1)){
								echo"<option value='$row1[name]'>$row1[name]</option>";
							}
						}
		?>
      </select>
    </div>
    
     <div class="form-group">
      <label for="sel1">State Constituency</label>
      <select class="form-control" id="sel1" required name="sc">
        <option></option>
		<?php
						$conn=mysqli_connect("localhost","root","","poliscope");
	                    if(mysqli_connect_error())
	                     {
		                     echo "Error in connecting to database: ".mysqli_connect_error();
	                     }
	                    else{
							$sql="select * from users where user_id='$_SESSION[user]'";
							$result=mysqli_query($conn,$sql);
							$row=mysqli_fetch_assoc($result);
							$state=$row['state'];
							$sql1="select * from state where state='$state'";
							$result1=mysqli_query($conn,$sql1);
							while($row1=mysqli_fetch_assoc($result1)){
								echo"<option value='$row1[name]'>$row1[name]</option>";
							}
						}
		?>
      </select>
    </div>
    
     <div class="form-group">
      <label for="sel1">Local Constituency</label>
      <select class="form-control" id="sel1" required name="lc">
        <option>Andheri</option>
		<?php
						$conn=mysqli_connect("localhost","root","","poliscope");
	                    if(mysqli_connect_error())
	                     {
		                     echo "Error in connecting to database: ".mysqli_connect_error();
	                     }
	                    else{
							$sql="select * from users where user_id='$_SESSION[user]'";
							$result=mysqli_query($conn,$sql);
							$row=mysqli_fetch_assoc($result);
							$city=$row['city'];
							$sql1="select * from local where city='$city'";
							$result1=mysqli_query($conn,$sql1);
							while($row1=mysqli_fetch_assoc($result1)){
								echo"<option value='$row1[name]'>$row1[name]</option>";
							}
						}
		?>
      </select>
    </div>
    
    
    
    <h3>Interests</h3>
    <div class="checkbox">
      <label><input type="checkbox" onclick="myfun('two','Justice and corruption')"> Justice and corruption</label>
        <label><input type="checkbox" onclick="myfun('five','Education')"> Eduacation	</label>
          <label><input type="checkbox" onclick="myfun('six','Employement')"> Employement</label>
            <label><input type="checkbox" onclick="myfun('seven','Health')"> Health</label>
            <label><input type="checkbox" onclick="myfun('three','Defence and Terrorism')"> Defence and Terrorism</label>
        <label><input type="checkbox" onclick="myfun('one','Economy')"> Economy</label>
          <label><input type="checkbox" onclick="myfun('four','Foreign Relations')"> Foreign Relations</label>
          <label><input type="checkbox" onclick="myfun('eight','Environment')"> Environment</label>
    </div>
    <h3>Profile pic</h3>
	<input type='file' name="image" onchange="readURL(this);" style="padding:8px 20px;"/><br/>
    <img id="blah" src="#" alt="your image"/><br><br>
    <button type="submit" class="btn btn-default">Save</button>
	<a href="user.php?khudka=true"><button type="button" class="btn btn-default">Skip</button></a>
  </form>
</div>

      </div>
      </div>

    
</body>
</html>
