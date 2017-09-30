<html>

<head>
  <title>Update Politicians Profile</title>
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
									  include 'navbar1.php';
										
	$conn=mysqli_connect("localhost","root","","poliscope");
    if(mysqli_connect_error())
	{
		echo "Error in connecting to database: ".mysqli_connect_error();
	}
	else{
     $sql="select * from posts where politician_id=$_SESSION[pol]";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	if(mysqli_num_rows($result)>0)
	 echo "";
    else
		echo"Sorry!!DATA Does not exist";
	}
     echo" <div class='container text-center'>
            <h2>Personel Details</h2>
            <div class='row'>
            <div class='col-sm-3' style='background-color:white;'></div>
            <div class='col-sm-6'>
            <form action='politemp1.php' name='f2' method='post' enctype='multipart/form-data'>
			<input type='hidden' id='one' name='one' value='$row[interest1]'>
			<input type='hidden' id='two' name='two' value='$row[interest2]'>
			<input type='hidden' id='three' name='three' value='$row[interest3]'>
			<input type='hidden' id='four' name='four' value='$row[interest4]'>
			<input type='hidden' id='five' name='five' value='$row[interest5]'>
            <input type='hidden' id='six' name='six' value='$row[interest6]'>
            <input type='hidden' id='seven' name='seven' value='$row[interest7]'>
            <input type='hidden' id='eight' name='eight' value='$row[interest8]'> 
		    <div class='form-group'>
            <label for='sel1'>Constituency Level</label>
            <select class='form-control' name='cc' id='cc1' required onchange='AjaxFunction()'>";
					    if($row['const_category']=='Local')
                            echo"<option selected>Local</option>";
					    else 
							echo"<option>Local</option>";
						if($row['const_category']=='State')
							echo"<option selected>State</option>";
						else
                            echo"<option>State</option>";
						if($row['const_category']=='Central')
							echo"<option selected>Central</option>";
						else
                            echo"<option>Central</option>";
        
               echo"</select>
                </div>
                <div class='form-group'>
                <label for='inputsm'>Political History</label>
                <input type='history' class='form-control' id='history' name='history' value='$row[history]'></td>
                <div>
                <div class='form-group'>
				<label for='agenda'>Political Agenda</label>
                <input type='address' class='form-control input-lg' id='agenda' name='agn' value='$row[agenda]'>
                </div>
				<div class='form-group'>
                <label for='aadhar'>Aadhar Id:</label>
                <input type='text' class='form-control input-lg' id='aadharno' placeholder='Your aadhar card number' name='aadhar'>
                </div>";
				                        if (!empty($_GET["valid"])) {
  				                        echo "<font color=red> Aadhar number already exist,Please enter valid Aadhar number</font><br/>";
  				                        }
                echo"<h3> Aadhar Card Photo</h3>
                <input type='file' name='aadharpic' onchange='readURL2(this);' style='padding:8px 20px;'/><br/>";
                echo '<img id="blah2" src="data:image/jpeg;base64,'.base64_encode( $row['aadhar_pic'] ).'" alt="Aadhar card photo" width="150" height="200"/><br/><br/>';
                echo "<h3>Interests</h3>
				<div class='checkbox'>";
					if($row['interest1']!='null'){
						$val0='"one"';
						$val00='"Economy"';
						$st='"y"';
                    echo"<label><input type='checkbox' onclick='myfun($val0,$val00,$st)' checked>Economy</label>";
					}
				    else{
						$val0='"one"';
						$val00='"Economy"';
						$st='"n"';
					echo"<label><input type='checkbox' onclick='myfun($val0,$val00,$st)'>Economy</label>";
					}
					if($row['interest2']!='null'){
						$val1='"two"';
						$val01='"Justice and corruption"';
						$st='"y"';
					echo"<label><input type='checkbox' onclick='myfun($val1,$val01,$st)' checked>Justice and corruption</label>";
					}
					else{
						$val1='"two"';
						$val01='"Justice and corruption"';
						$st='"n"';
					echo"<label><input type='checkbox' onclick='myfun($val1,$val01,$st)'>Justice and corruption</label>";
				    }
					if($row['interest3']!='null'){
						$val2='"three"';
						$val10='"Defence and Terrorism"';
						$st='"y"';
					echo"<label><input type='checkbox' onclick='myfun($val2,$val10,$st)' checked>Defence and Terrorism</label>";
				    }
					else{
						$val2='"three"';
						$val10='"Defence and Terrorism"';
						$st='"n"';
					echo"<label><input type='checkbox' onclick='myfun($val2,$val10,$st)'>Defence and Terrorism</label>";
				    }
					if($row['interest4']!='null'){
						$val3='"four"';
						$val11='"Foreign Affairs"';
						$st='"y"';
                    echo"<label><input type='checkbox' onclick='myfun($val3,$val11,$st)' checked>Foreign Affairs</label>";
				    }
					else{
						$val3='"four"';
						$val11='"Foreign Affairs"';
						$st='"n"';
					echo"<label><input type='checkbox' onclick='myfun($val3,$val11,$st)'>Foreign Affairs</label>";
                    }
					if($row['interest5']!='null'){
						$val4='"five"';
						$val110='"Education"';
						$st='"y"';
                    echo"<label><input type='checkbox' onclick='myfun($val4,$val110,$st)' checked>Education</label>";
				    }
					else{
						$val4='"five"';
						$val110='"Education"';
						$st='"n"';
					echo"<label><input type='checkbox' onclick='myfun($val4,$val110,$st)'>Education</label>";
                    }
					if($row['interest6']!='null'){
						$val5='"six"';
						$val111='"Employement"';
						$st='"y"';
                    echo"<label><input type='checkbox' onclick='myfun($val5,$val111,$st)' checked>Employement</label>";
				    }
					else{
						$val5='"six"';
						$val111='"Employement"';
						$st='"n"';
					echo"<label><input type='checkbox' onclick='myfun($val5,$val111,$st)'>Employement</label>";
                    }
					if($row['interest7']!='null'){
						$val6='"seven"';
						$val101='"Health"';
						$st='"y"';
                    echo"<label><input type='checkbox' onclick='myfun($val6,$val101,$st)' checked>Health</label>";
				    }
					else{
						$val6='"seven"';
						$val101='"Health"';
						$st='"n"';
					echo"<label><input type='checkbox' onclick='myfun($val6,$val101,$st)'>Health</label>";
                    }
					if($row['interest8']!='null'){
						$val7='"eight"';
						$val001='"Environment"';
						$st='"y"';
                    echo"<label><input type='checkbox' onclick='myfun($val7,$val001,$st)' checked>Environment</label>";
				    }
					else{
						$val7='"eight"';
						$val001='"Environment"';
						$st='"n"';
					echo"<label><input type='checkbox' onclick='myfun($val7,$val001,$st)'>Environment</label>";
                    }
					echo"</div>
                    <h3>Political Symbol pic upload</h3>
					<div class='col-sm-3'></div><input type='file' name='image1' onchange='readURL1(this);' style='padding:8px 20px;'/><br/>";
					echo '<img id="blah1" src="data:image/jpeg;base64,'.base64_encode( $row['cover'] ).'" alt="Profile Pic" width="150" height="200"/><br/><br/>';
					echo"<button type='submit' class='btn btn-info' onclick='return mycheck()'>Save</button>
                    <a href='poliview.php'><button type='button' class='btn btn-danger'>Cancel</button></a>
            </form>
	        </div>
			</div>
            </div>";
?>

</body>

</html>