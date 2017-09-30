<!DOCTYPE html>
<head>
    <title>Poliscope</title>
    <link rel="stylesheet" type="text/css" href="css/index_form.css">
    <link rel="stylesheet" type="text/css" href="css/index_page.css">

    <!--Raleway Font -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        function myfun(){
            var pswd=document.getElementById("pass1").value;
            var cpswd=document.getElementById("pass2").value;
            if(pswd!=cpswd){
                alert("Confirm Password and Password must be same");
                return false;
            }
        }
    </script>

</head>
<body>
<!--    --><?php //include('navbar.php'); ?>
  <div id="container_images">
    <div class="text-center" id="logo" style="width: 100%;">
      <img src="images/poliscope logo white.png" alt="Poliscope_logo" style="width:50%;height:auto; ">
    </div>

    <div id="bot_image" style="margin-left: 25%; position: absolute;">
      <img src="images/Indian-Parliament4.png" alt="Poliscope_logo" style="width:65%;height:auto; ">
    </div>
  
  </div>
  <br>
  <br>
<div class="container-fluid">
 
  

      <div class=" col-sm-6" id="login">
          <h2 class="register_title" style="margin-bottom: 10px; color:black;">Login</h2>

          <form class="form-signin" style="padding: 10px" action="login_request.php" method="post">
              <input style="margin-bottom: 0px;" type="text" class="form-control" name="username" placeholder="Email Address" required="" autofocus="" />
              <br>
              <input style="margin-top: 0px;" type="password" class="form-control" name="password" placeholder="Password" required=""/>
              <br>
              <button class="btn btn-lg btn-primary btn-block button" type="submit">Login</button>

          </form>

           <?php
                 if (!empty($_GET["invalid"])) {
  				echo "<font color=red> Invalid Username or Password </font><br/>";
  			   }
  			   if (!empty($_GET["exist"])) {
  				echo "<font color=red> Username does not exist</font>
  				       <h3>Register for Free!!!</h3><br/>";
  				}
                 	if (!empty($_GET["set_id"])) {
  				echo "<font color=red>Your session has expired. Please login again.</font><br/>";
  				}
                 if (!empty($_GET["userexist"])) {
  				echo "<font color=red> Username already exist</font><br/>";
  				}

           ?>

      </div>

      <div class=" col-sm-6" id="sign_up">
          <h2 class="register_title"style="color:black;">Register</h2>

          <form action="user_registration.php" method="post" >
            <div class="form-group">
              <input type="text" class="form-control" name="fname" placeholder="First Name">
              <input type="text" class="form-control" name="lname" placeholder="Last Name">

              <!-- Select Male/Female -->
              <div class="radio">
                <label style="padding-left: 0px;">
                  <input type="radio" name="gender" value="male" id="m" checked>
                  Male
                </label>

                <label>
                  <input type="radio" name="gender" value="female" id="f">
                  Female
                </label>
              </div>

              DOB:  <input type="date" name="bday" required>

              <br>

              <input type="email" class="form-control" name="email" placeholder="Email Id" />
              <input type="password" class="form-control" name="password1" id="pass1" placeholder="Password" required/>
              <input type="password" class="form-control" name="password2" id="pass2" placeholder="Re-enter Password" required style="margin-bottom: 20px;" >
			  
			 
  
  
  
	<div class="col-sm-4" style="background-color:none;">	</div>
<div class="row">
	<div class="col-sm-4" style="background-color:none;">
      <label for="sel1">State:</label>
      <select required class="form-control col-sm-4" id="sel1" name="state">
	  <option value="">State</option>
			<option value="Maharashtra">Maharashtra</option>	
       
      </select></div>
	  </div>
	  
	  
	  <div class="col-sm-4" style="background-color:none;">	</div>
	   <div class="row">
 
		<div class="col-sm-4" style="background-color:none;">		
      <label for="sel1">City:</label>
      <select class="form-control col-sm-4" id="sel1" name="city">
	  <option value="">City</option>
        <option value="Mumbai">Mumbai</option>
      </select>
	  </div>
       </div>
	   <br>

              <button style="margin-bottom: 70px;" class="btn btn-lg btn-primary btn-block button" type="submit" onclick="return myfun()">Sign Up</button>
            </div>
          </form>

          <!-- Existing Form
          <form  style="padding: 40px" action="user_registration.php" method="post">
              <input type="text" class="form-control" name="fname" placeholder="First Name"  />
              <input type="text" class="form-control" name="lname" placeholder="Last Name"  /><br/>
              <br>
              <input type="radio" name="gender" value="male" id="m" checked> Male
              <input type="radio" name="gender" value="female" id="f"> Female
              <br>
              <br>DOB:  <input type="date" name="bday" required> <br>
              <input type="email" class="form-control" name="email" placeholder="Email Id" />
              <input type="password" class="form-control" name="password1" id="pass1" placeholder="Password" required/>
              <input type="password" class="form-control" name="password2" id="pass2" placeholder="Re-enter Password" required/>
              <br>
              <button class="btn btn-lg btn-primary btn-block button" type="submit" onclick="return myfun()">Sign Up</button>
          </form>
          -->

      

 
  </div>
</div>
</body>
</html>
