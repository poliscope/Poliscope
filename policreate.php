<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create Politicians Profile</title>
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
  <script type="text/javascript">
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
		function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah2')
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
        function mycheck(){
			var x = document.getElementById('aadharno').value;
			if(x.length<12||x.length>12){
				alert("Please enter valid aadhar card number");
				return false;
			}
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
										if (!empty($_GET["valid"])) {
  				                        echo "<font color=red> Aadhar number already exist,Please enter valid Aadhar number</font><br/>";
  				                        }
										?>
  <div class="container text-center">   
 <h2>Political Details</h2>
  <div class="row">
  <div class="col-sm-3" style="background-color:white;"></div>
  <div class="col-sm-6">
  <form action="temp1.php" name="f1" method="post" enctype="multipart/form-data">
  <input type="hidden" id="one" name="one" value="null">
  <input type="hidden" id="two" name="two" value="null">
  <input type="hidden" id="three" name="three" value="null">
  <input type="hidden" id="four" name="four" value="null">
  <input type="hidden" id="five" name="five" value="null">
  <input type="hidden" id="six" name="six" value="null">
  <input type="hidden" id="seven" name="seven" value="null">
  <input type="hidden" id="eight" name="eight" value="null">
   <div class="form-group">
      <label for="sel1">Constituency Level</label>
      <select class="form-control" name="cc" id="cc1" required onchange="AjaxFunction()">
        <option>Local</option>
        <option>State</option>
        <option>Central</option>
        
      </select>
   </div>
    
    <div class="form-group">
      <label for="inputsm">Political History:</label>
      <input type="history" class="form-control" id="history" placeholder="Enter your politial history" name="history" required>
    </div>
    
    <div class="form-group">
      <label for="agenda">Political Agenda:</label>
      <input type="address" class="form-control input-lg" id="agenda" placeholder="what things you are going to do for people?" name="agn" required>
    </div>
   
    <div class="form-group">
      <label for="aadhar">Aadhar Id:</label>
      <input type="text" class="form-control input-lg" id="aadharno" placeholder="Your aadhar card number" name="aadhar" required>
    </div>
    
   <h3> Aadhar Card Photo</h3>
   <input type='file' name="aadharpic" onchange="readURL2(this);" style="padding:8px 20px;"/><br/>
   <img id="blah2" src="#" alt="Aadhar card photo" style="width:100%;"/><br/><br/>
    
    
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
   
    
    
  
    
   <h3> Political Symbol pic upload</h3>
   <input type='file' name="image1" onchange="readURL1(this);" style="padding:8px 20px;"/><br/>
   <img id="blah1" src="#" alt="your political view" style="width:100%;"/><br/><br/>
     <button type="submit" class="btn btn-default" onclick="return mycheck()">Save</button>
     <a href="user.php?khudka=true"><button type="button" class="btn btn-danger">Cancel</button></a>
  </form>
  
</div>

      </div>
      </div>

    <?php include 'navbar.php';?>
</body>
</html>


