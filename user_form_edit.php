<html>

<head>
    <title>Edit Your Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
		function myfun(parameter,parameter1,parameter2){
			if(parameter2=='n'){
			document.getElementById(parameter).value=parameter1;
			}
			else if(parameter2=='y'){
			document.getElementById(parameter).value='null';
			}
		}
    </script>
</head>


<body>

    <?php 
	session_start();
	include('navbar.php');
	$conn=mysqli_connect("localhost","root","","poliscope");
if(mysqli_connect_error())
	{
		echo "Error in connecting to database: ".mysqli_connect_error();
	}
	else{
     $sql="select * from users where user_id=$_SESSION[user]";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	if(mysqli_num_rows($result)>0)
	 echo "";
    else
		echo"Sorry!!DATA Does not exist";
	}
     echo" <div class='container text-centre'>
	 
	 <div class='col-sm-4'></div>
	  <div class='col-sm-8'></div>
	 <div align='center' style='padding-top:5%;'>
        <h2>Personel Details:</h2>
		
        <h5>* required</h5>
        <table style='border-collapse:separate; border-spacing:10px 40px;'>
            <form action='userprofile_update.php'class='form-horizontal' name='f2' method='post' enctype='multipart/form-data'>
			<input type='hidden' id='one' name='one' value='$row[interest1]'>
			<input type='hidden' id='two' name='two' value='$row[interest2]'>
			<input type='hidden' id='three' name='three' value='$row[interest3]'>
			<input type='hidden' id='four' name='four' value='$row[interest4]'>
			<input type='hidden' id='five' name='five' value='$row[interest5]'>
            <input type='hidden' id='six' name='six' value='$row[interest6]'>
            <input type='hidden' id='seven' name='seven' value='$row[interest7]'>
            <input type='hidden' id='eight' name='eight' value='$row[interest8]'>
			    <tr>
				    <td><b>First Name*</b></td>
					<td><input type='text' required style='padding:8px 20px;' name='first' value='$row[first_name]'></td>
				</tr>
				<tr>
				    <td><b>Last Name*</b></td>
					<td><input type='text' required style='padding:8px 20px;' name='last' value='$row[last_name]'></td>
				</tr>
				<tr>
				    <td><b>DOB*</b></td>
					<td><input type='date' required style='padding:8px 20px;' name='bday' value='$row[dob]'></td>
				</tr>";
				if($row['gender']=='male'){
					echo"<tr>
				    <td><b>Gender*</b></td>
					<td><input type='radio' required style='padding:8px 20px;' name='gender' value ='male' checked>Male
					    <input type='radio' required style='padding:8px 20px;' name='gender' value ='female'>Female</td>
				    </tr>";
				}
				else if($row['gender']=='female'){
					echo"<tr>
				    <td><b>Gender*</b></td>
					<td><input type='radio' required style='padding:8px 20px;' name='gender' value ='male'>Male
					    <input type='radio' required style='padding:8px 20px;' name='gender' value ='female' checked>Female</td>
				    </tr>";
				}
                 echo"<tr>
				    <td><b>Email-id*</b></td>
					<td><input type='email' required style='padding:8px 20px;' name='email' value='$row[email]'></td>
				    </tr>
				<tr>
				 <td><b>State*</b></td>
                    <td><select required style='padding:8px 20px;' name='state'>";
					    if($row['state']=='Maharashtra')
						echo"<option value='Maharashtra' selected>Maharashtra</option>";
					    else 
			            echo"<option value='Maharashtra'>Maharashtra</option>";
			            echo"</select></td>
                </tr>
				<tr>
                    <td><b>City*</b></td>
                    <td><select required style='padding:8px 20px;' name='city'>";
					    if($row['city']=='Mumbai')
						echo"<option value='Mumbai' selected>Mumbai</option>";
					    else 
			            echo"<option value='Mumbai'>Mumbai</option>";
			            echo"</select></td>
                </tr>
				<tr>
                    <td><b>Address:*</b></td>
                    <td><textarea cols='67' rows='4' required name='add'>$row[address]</textarea></td>
                </tr>
                <tr>
                    <td><b>Qualification*</b></td>
                    <td><input type='text' required style='padding:8px 20px;' name='qual' value='$row[qualification]'></td>
                </tr>
                <tr>
                    <td><b>Local Constituency:*</b></td>
                    <td><select style='padding:8px 20px;' name='lc'>
					    <option value='Andheri'>Andheri</option>";
					    $city=$row['city'];
						$sql3="select * from local where city='$city'";
						$result3=mysqli_query($conn,$sql3);
						while($row3=mysqli_fetch_assoc($result3)){
						if($row3['name']==$row['local'])
							 echo"<option value='$row3[name]' selected>$row3[name]</option>";
						else
							 echo"<option value='$row3[name]'>$row3[name]</option>";
					    }
		   echo"</td>
                </tr>
                <tr>
                    <td><b>State Constituency:*</b></td>
                    <td><select style='padding:8px 20px;' name='sc'>";
				        $state=$row['state'];
						$sql2="select * from state where state='$state'";
						$result2=mysqli_query($conn,$sql2);
						while($row2=mysqli_fetch_assoc($result2)){
						if($row2['name']==$row['state_con'])
							 echo"<option value='$row2[name]' selected>$row2[name]</option>";
						else
							 echo"<option value='$row2[name]'>$row2[name]</option>";
					    }
		   echo"</td>
                </tr>
                <tr>
                    <td><b>Central Constituency:*</b></td>
                    <td><select style='padding:8px 20px;' name='cc'>";
					     $central=$row['state'];
						 $sql1="select * from central where cstate='$central'";
						 $result1=mysqli_query($conn,$sql1);
						 while($row1=mysqli_fetch_assoc($result1)){
						 if($row1['name']==$row['central'])
							 echo"<option value='$row1[name]' selected>$row1[name]</option>";
						 else
							 echo"<option value='$row1[name]'>$row1[name]</option>";
						 }
			   echo"</td>
                </tr>
                <tr>
                    <td><b>Interests*</b></td>
					<td>";
					if($row['interest1']!='null'){
						$val0='"one"';
						$val00='"Economy"';
						$st='"y"';
                    echo"<input type='checkbox' onclick='myfun($val0,$val00,$st)' checked>Economy&nbsp;";
					}
				    else{
						$val0='"one"';
						$val00='"Economy"';
						$st='"n"';
					echo"<input type='checkbox' onclick='myfun($val0,$val00,$st)'>Economy&nbsp;";
					}
					if($row['interest2']!='null'){
						$val1='"two"';
						$val01='"Justice and corruption"';
						$st='"y"';
					echo"<input type='checkbox' onclick='myfun($val1,$val01,$st)' checked>Justice and corruption&nbsp;";
					}
					else{
						$val1='"two"';
						$val01='"Justice and corruption"';
						$st='"n"';
					echo"<input type='checkbox' onclick='myfun($val1,$val01,$st)'>Justice and corruption&nbsp;";
				    }
					if($row['interest3']!='null'){
						$val2='"three"';
						$val10='"Defence and Terrorism"';
						$st='"y"';
					echo"<input type='checkbox' onclick='myfun($val2,$val10,$st)' checked>Defence and Terrorism&nbsp;";
				    }
					else{
						$val2='"three"';
						$val10='"Defence and Terrorism"';
						$st='"n"';
					echo"<input type='checkbox' onclick='myfun($val2,$val10,$st)'>Defence and Terrorism&nbsp;";
				    }
					if($row['interest4']!='null'){
						$val3='"four"';
						$val11='"Foreign Affairs"';
						$st='"y"';
                    echo"<input type='checkbox' onclick='myfun($val3,$val11,$st)' checked>Foreign Affairs&nbsp;";
				    }
					else{
						$val3='"four"';
						$val11='"Foreign Affairs"';
						$st='"n"';
					echo"<input type='checkbox' onclick='myfun($val3,$val11,$st)'>Foreign Affairs&nbsp;";
                    }
					if($row['interest5']!='null'){
						$val4='"five"';
						$val110='"Education"';
						$st='"y"';
                    echo"<input type='checkbox' onclick='myfun($val4,$val110,$st)' checked>Education&nbsp;";
				    }
					else{
						$val4='"five"';
						$val110='"Education"';
						$st='"n"';
					echo"<input type='checkbox' onclick='myfun($val4,$val110,$st)'>Education&nbsp;";
                    }
					if($row['interest6']!='null'){
						$val5='"six"';
						$val111='"Employement"';
						$st='"y"';
                    echo"<input type='checkbox' onclick='myfun($val5,$val111,$st)' checked>Employement&nbsp;";
				    }
					else{
						$val5='"six"';
						$val111='"Employement"';
						$st='"n"';
					echo"<input type='checkbox' onclick='myfun($val5,$val111,$st)'>Employement&nbsp;";
                    }
					if($row['interest7']!='null'){
						$val6='"seven"';
						$val101='"Health"';
						$st='"y"';
                    echo"<input type='checkbox' onclick='myfun($val6,$val101,$st)' checked>Health&nbsp;";
				    }
					else{
						$val6='"seven"';
						$val101='"Health"';
						$st='"n"';
					echo"<input type='checkbox' onclick='myfun($val6,$val101,$st)'>Health&nbsp;";
                    }
					if($row['interest8']!='null'){
						$val7='"eight"';
						$val001='"Environment"';
						$st='"y"';
                    echo"<input type='checkbox' onclick='myfun($val7,$val001,$st)' checked>Environment&nbsp;";
				    }
					else{
						$val7='"eight"';
						$val001='"Environment"';
						$st='"n"';
					echo"<input type='checkbox' onclick='myfun($val7,$val001,$st)'>Environment&nbsp;";
                    }
					echo"</td>
                </tr>
                <tr>
                    <td><b>Profile Photo:</b></td>
                    <td>";
					echo '<img id="blah" src="data:image/jpeg;base64,'.base64_encode( $row['profile'] ).'" alt="Profile Pic" width="150" height="200"/>';
					echo"</td>
				</tr>";
					echo"<tr>
					     <td></td>
					     <td><input type='file' name='image' onchange='readURL(this);' style='padding:8px 20px;'/></td>
                         </tr>";
					echo"<tr>
                         <td colspan='2'><input type='submit' value='Save' style='padding:10px 205px;'></td>
                         </tr>
                         <tr>
                         <td colspan='2'><a href='user.php?khudka=true'><input type='button' value='Skip' style='padding:8px 205px;'></a></td>
                         </tr>
            </form>
        </table></div></div>
	</div></div>";
?>
</body>

</html>