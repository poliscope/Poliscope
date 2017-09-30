<html>
<head>
    <title>Poliscope</title>
    <link rel="stylesheet" type="text/css" href="css/index_form.css">
    <link rel="stylesheet" type="text/css" href="css/index_page.css">


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

    <div id="logo" style="width: 100%; margin-left: 25%; ">

        <img src="images/logo.png" alt="Poliscope_logo" style="width:50%;height:auto; ">

    </div>

    <div id="bot_image" style="margin-left: 25%;">

        <img src="images/bot1.png" alt="Poliscope_logo" style="width:70%;height:auto; ">

    </div>

</div>

<div id="forms">

    <div class="sign" id="sign_up">
        <h1>Register</h1>

        <form  style="padding: 40px" action="user_registration.php" method="post">
            <input type="text" class="form-control" name="fname" placeholder="First Name"  />
            <input type="text" class="form-control" name="lname" placeholder="Last Name"  /><br/>
            <br>
            <input type="radio" name="gender" value="male" id="m" checked> Male
            <input type="radio" name="gender" value="female" id="f"> Female
            <br>
            <br>DOB:<input type="date" name="bday" required> <br>
            <input type="email" class="form-control" name="email" placeholder="Email Id" />
            <input type="password" class="form-control" name="password1" id="pass1" placeholder="Password" required/>
            <input type="password" class="form-control" name="password2" id="pass2" placeholder="Re-enter Password" required/>
            <br>
			<select required style="padding:8px 20px;" name="state">
			<option value="">State</option>
			<option value="Maharashtra">Maharashtra</option>
			</select><br/>
            <select required style="padding:8px 20px;" name="city">
			<option value="">City</option>
			<option value="Mumbai">Mumbai</option>
			</select><br/>
            <button class="btn btn-lg btn-primary btn-block button" type="submit" onclick="return myfun()">Sign Up</button>
        </form>



    </div>

    <div class="log" id="login">
        <h1>Login</h1>

        <form class="form-signin" style="padding: 10px" action="login_request.php" method="post">
            <input type="text" class="form-control" name="username" placeholder="Email Address" required="" autofocus="" />
            <br>
            <input type="password" class="form-control" name="password" placeholder="Password" required=""/>
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

 
         ?>



    </div>





</div>


</body>


</html>