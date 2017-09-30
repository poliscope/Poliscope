<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
<head>
  <title>Home</title>
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
	
	
	.om{
		display:inline-block;
		
	}
	.om1{
		display:inline-block;
		
	}
	
  </style>
  <script>
        function myfunction(newid){
		  var x=document.getElementById(newid).value;
		  //alert(x);
		  document.getElementById('post').value=x;
		}
        function readURL(input) {
				
            if (input.files && input.files[0]) {
				var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(50)
                        .height(50);
                };
                reader.readAsDataURL(input.files[0]);
				//alert("You selected "+input.files[0].name+input.files[0].name.indexOf("jpeg"));
			}
				if(input.files[0].name.indexOf("jpeg")!== -1 || input.files[0].name.indexOf("jpg") !== -1 || input.files[0].name.indexOf("gif") !== -1){
              
			   
            }
			else{alert("please select image");
			}
			
        }
		function readURL1(input) {
              if (input.files && input.files[0]) {
				var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah1')
                        .attr('src', e.target.result)
                        .width(50)
                        .height(50);
                };
                reader.readAsDataURL(input.files[0]);
				//alert("You selected "+input.files[0].name+input.files[0].name.indexOf("jpeg"));
			}
				if(input.files[0].name.indexOf("jpeg")!== -1 || input.files[0].name.indexOf("jpg") !== -1 || input.files[0].name.indexOf("gif") !== -1){
              
			   
            }
			else{alert("please select image");
			}
        }
        function inc(newid){
            var x=parseInt(document.getElementById(newid).value);
            var y=x+1;
            document.getElementById(newid).value=y;
        }
        function dec(newid){
            var x=parseInt(document.getElementById(newid).value);
            var y=x+1;
            document.getElementById(newid).value=y;
        }
        function neutral(newid){
            var x=parseInt(document.getElementById(newid).value);
            var y=x+1;
            document.getElementById(newid).value=y;
        }
    </script>
</head>
<body>
<?php if(isset($_SESSION['user']))
                                           {echo"";
										   }
else
                                        {
	                                     header('Location:index.php');
                                        }

										include 'includes/navbar_user.php';?>

  
<div class="container text-center" style="margin-top:80px">  
  
  <div class="row">
  <div class="col-sm-4 well">
    <div class=" well">
              <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#demo">People you may support</button>
             <div id="demo" class="collapse">
			 <?php
			 $_SESSION['page']=1;
	$conn = mysqli_connect('localhost','root','','poliscope');
        if(mysqli_connect_error())
        {
            echo "Error in connecting to database: ".mysqli_connect_error();
        }
        else{
			$p=0;
			$find=array();
			$sqldo1="Select * from support where userid=$_SESSION[user] and category='citizen'";
			$resultdo1=mysqli_query($conn,$sqldo1);
			if(mysqli_num_rows($resultdo1)>0){
				while($rowdo1=mysqli_fetch_assoc($resultdo1)){
					$sqldo2="Select * from users where user_id in(Select supid from support where userid=$rowdo1[supid] and category='citizen')";
					$resultdo2=mysqli_query($conn,$sqldo2);
			        if(mysqli_num_rows($resultdo2)>0){
					  while($rowdo2=mysqli_fetch_assoc($resultdo2)){
						  $find[$p++]=$rowdo2['user_id'];
						  if($rowdo2['user_id']!=$_SESSION['user']){
                           echo"<div class='well'>
					             <form action='user.php?search=true' method='post'>
                                 <input type='hidden' value='$rowdo2[user_id]' name='userid'>";
                           echo '<img src="data:image/jpeg;base64,'.base64_encode( $rowdo2['profile'] ).'"class="img-circle" height="50" width="50" alt="Profile Pic" />';
						   echo"<input type='submit' value='$rowdo2[first_name] $rowdo2[last_name]'>";
                           echo"</form>
						        </div>";
						  }
						  else echo"";
					  }
					}
					else echo"";
                    $sqldo3="Select * from users where user_id in (Select userid from support where supid=$rowdo1[supid] and category='citizen')";
					$resultdo3=mysqli_query($conn,$sqldo3);
			        if(mysqli_num_rows($resultdo3)>0){
					  while($rowdo3=mysqli_fetch_assoc($resultdo3)){
						  $found=0;
						  for($q=0;$q<count($find);$q++){
							  if($find[$q]==$rowdo3['user_id'])
								  $found=1;
						  }
						  /*if(array_key_exists('$rowdo3[user_id]',$find)==true)
							  $found=1;*/
						  if($found==0){
						  $find[$p++]=$rowdo3['user_id'];
						  if($rowdo3['user_id']!=$_SESSION['user']){
                           echo"<div class='well'>
					             <form action='user.php?search=true' method='post'>
                                 <input type='hidden' value='$rowdo3[user_id]' name='userid'>";
                           echo '<img src="data:image/jpeg;base64,'.base64_encode( $rowdo3['profile'] ).'"class="img-circle" height="50" width="50" alt="Profile Pic" />';
						   echo"<input type='submit' value='$rowdo3[first_name] $rowdo3[last_name]'>";
                           echo"</form>
						        </div>";
						  }
						  else echo"";
						 }
						 else echo"";
						 
					  }
					}
					else echo"";
				}
			}
			else echo"";
			$sqldo4="Select * from support where supid=$_SESSION[user] and category='citizen'";
			$resultdo4=mysqli_query($conn,$sqldo4);
			if(mysqli_num_rows($resultdo4)>0){
				while($rowdo4=mysqli_fetch_assoc($resultdo4)){
					$sqldo5="Select * from users where user_id in(Select supid from support where userid=$rowdo4[userid] and category='citizen')";
					$resultdo5=mysqli_query($conn,$sqldo5);
			        if(mysqli_num_rows($resultdo5)>0){
					  while($rowdo5=mysqli_fetch_assoc($resultdo5)){
						  $found1=0;
						  for($q=0;$q<count($find);$q++){
							  if($find[$q]==$rowdo5['user_id'])
								  $found1=1;
						  }
						  /*if(array_key_exists('$rowdo5[user_id]',$find)==true)
							  $found1=1;*/
						  if($found1==0){
						  $find[$p++]=$rowdo5['user_id'];
						  if($rowdo5['user_id']!=$_SESSION['user']){
                           echo"<div class='well'>
					             <form action='user.php?search=true' method='post'>
                                 <input type='hidden' value='$rowdo5[user_id]' name='userid'>";
                           echo '<img src="data:image/jpeg;base64,'.base64_encode( $rowdo5['profile'] ).'"class="img-circle" height="50" width="50" alt="Profile Pic" />';
						   echo"<input type='submit' value='$rowdo5[first_name] $rowdo5[last_name]'>";
                           echo"</form>
						        </div>";
						  }
						  else echo"";
						 }
						 else echo "";
					  }
					}
					else echo"";
                    $sqldo6="Select * from users where user_id in(Select userid from support where supid=$rowdo4[userid] and category='citizen')";
					$resultdo6=mysqli_query($conn,$sqldo6);
			        if(mysqli_num_rows($resultdo6)>0){
					  while($rowdo6=mysqli_fetch_assoc($resultdo6)){
						  $found2=0;
						  for($q=0;$q<count($find);$q++){
							  if($find[$q]==$rowdo6['user_id'])
								  $found2=1;
						  }
						  /*if(array_key_exists('$rowdo6[user_id]',$find)==true)
							  $found2=1;*/
						  if($found2==0){
						  $find[$p++]=$rowdo6['user_id'];
						  if($rowdo6['user_id']!=$_SESSION['user']){
                           echo"<div class='well'>
					             <form action='user.php?search=true' method='post'>
                                 <input type='hidden' value='$rowdo6[user_id]' name='userid'>";
                           echo '<img src="data:image/jpeg;base64,'.base64_encode( $rowdo6['profile'] ).'"class="img-circle" height="50" width="50" alt="Profile Pic" />';
						   echo"<input type='submit' value='$rowdo6[first_name] $rowdo6[last_name]'>";
                           echo"</form>
						        </div>";
						  }
						  else echo"";
						 }
						 else echo"";
					  }
					}
					else echo"";
				}
			}
			else echo"";
		}
	?>
             
    <!--<img src="bird.jpg"  alt="Avatar">   <h>User name</h>-->
        
  </div>
             </div>
			 <div class=" well">
			 <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#demo1">Social Prestige</button>
             <div id="demo1" class="collapse">
			    <?php
			      $conn = mysqli_connect('localhost','root','','poliscope');
                  if(mysqli_connect_error())
                 {
                    echo "Error in connecting to database: ".mysqli_connect_error();
                  }
                 else{
                 $anuu="Select * from support where userid=$_SESSION[user] and category='citizen'";
                 $resultanuu=mysqli_query($conn,$anuu);
                 if(mysqli_num_rows($resultanuu)>0){
					 $user_ids=[];
					 $arr_gold=[];
					 $count=0;
					 while($rowanuu=mysqli_fetch_assoc($resultanuu)){
						 $kps = "Select * from post where user_id=".$rowanuu['supid']."";
						 $reskps = mysqli_query($conn,$kps);
						 if(mysqli_num_rows($reskps)>0){
							 $gold=0;
							 while($rowkps=mysqli_fetch_assoc($reskps)){
								 $sum = $rowkps['support']+$rowkps['oppose']+$rowkps['neutral'];
								 if($sum!=0)
								 $prestige = ($rowkps['support']/$sum)*100;
							     else
								 $prestige = 0.0;
								 if($prestige>=50.0){
									 $gold=$gold+1;
								 }
							 }
							 if($gold!=0){
							 $user_ids[$count] = $rowanuu['supid'];
							 $arr_gold[$count] = $gold;
							 $count++;
							 }
						 }
					 }
					 for($kale=0;$kale<$count;$kale++)
			         {
				        for($tejas=0;$tejas<$count-1;$tejas++)
				          {
					       if($arr_gold[$tejas]<$arr_gold[$tejas+1])
					       {
						     $kale1 = $arr_gold[$tejas];
						     $arr_gold[$tejas]=$arr_gold[$tejas+1];
						     $arr_gold[$tejas+1]=$kale1;
						     $kale1 = $user_ids[$tejas];
						     $user_ids[$tejas]=$user_ids[$tejas+1];
						     $user_ids[$tejas+1]=$kale1;
					       }
				          }
			         }
					 if($count>5)
			         {
				         $i=0;
				         while($i<5)
				         {
					         $sql="Select * from users where user_id=$user_ids[$i]";
					         $result=mysqli_query($conn,$sql);
					         $row=mysqli_fetch_assoc($result);
					         echo"<div class='well'>
					         <img src='images/goldmedal.png'class='img-square' height='30' alt='Avatar'>$arr_gold[$i]
					         <form action='user.php?search=true' method='post'>
                             <input type='hidden' value='$row[user_id]' name='userid'>";
                             echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['profile'] ).'"class="img-circle" height="50" width="50" alt="Profile Pic" />';
					         echo"<input type='submit' value='$row[first_name] $row[last_name]'>";
                             echo"</form>
					         </div>";
					    $i++;
				        }
			         }
					 else
			        {
				      $i=0;
				      while($i<$count)
				     {
					  $sql="Select * from users where user_id=$user_ids[$i]";
					  $result=mysqli_query($conn,$sql);
					  $row=mysqli_fetch_assoc($result);
					  echo"<div class='well'>
					  <img src='images/goldmedal.png'class='img-square' height='30' alt='Avatar'>$arr_gold[$i]
					  <form action='user.php?search=true' method='post'>
                      <input type='hidden' value='$row[user_id]' name='userid'>";
                      echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['profile'] ).'"class="img-circle" height="50" width="50" alt="Profile Pic" />';
					  echo"<input type='submit' value='$row[first_name] $row[last_name]'>";
                      echo"</form>
					  </div>";
					  $i++;
				    }
			        }
				 }				 
                 else{
					 echo"You are not supporting anyone!!Start supporting people to see social prestige";
				 }
				 }
                ?>
            </div>
            </div>			
    </div>
    <div class="col-sm-7">
    
      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-default text-left">
            <div class="panel-body">
            <form action="homecheck.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
     
      <input type="text" class="form-control" id="usr" placeholder="Discuss Political Ideas and isues.." name="des" value=""><br>
	  <img id="blah" src="#" class="img-square" height="50" width="50" alt="Image" style="margin-left: 10px;"/>
      <input type='file' name="image" onchange="readURL(this); "style=" padding:8px 10px;"/><br/>
    </div>
	
    <button type="submit" class="btn btn-default btn-sm">
    <img src='images/speakup.png' height='35'/> SpeakUp
	</button>
  </form>
             
              
                <!--<button type="button" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-picture"></span>Image-->
                 
              
            </div>
          </div>
        </div>
      </div>
      <div class='modal fade' id='myModal' role='dialog'>
    <div class='modal-dialog'>
    
      
      <div class='modal-content'>
        <div class='col-sm-12'>
    
      <div class='row'>
        <div class='col-sm-12'>
          <div class='panel panel-default text-left'>
            <div class='panel-body'>
            <form action='speakcheck.php' method='post' enctype='multipart/form-data' name='f2'>
    <div class='form-group'>
	  <input type='hidden' value='' id='post' name='pid'>
      <input type='text' class='form-control' id='usr' placeholder='Discuss Political Ideas and isues..' name='des' value=''>
	  <img id='blah1' src='#' alt='Image' style='margin-left: 10px;'/>
      <input type='file' name='image' onchange='readURL1(this);' style='padding:8px 10px;'/><br/>
    </div>
    <button type='submit' class='btn btn-default btn-sm'>
     <img src='images/speakup.png' height='35'/>	SpeakUp
	</button>
  </form>   
              
            </div>
          </div>
        </div>
      </div>
      </div>
      
    </div>
  </div>
            <br><br>
            </div>
      <div class="row">
	  <?php
	  $conn = mysqli_connect('localhost','root','','poliscope');
        if(mysqli_connect_error())
        {
            echo "Error in connecting to database: ".mysqli_connect_error();
        }
        else{
			if(!empty($_GET["check1"]))
                echo"<h4>You are already supporting these post</h4>";
            if(!empty($_GET["check"]))
                echo"<h4>You are already opposing these post</h4>";
            if(!empty($_GET["checknut"]))
                echo"<h4>You are already neutral for these post</h4>";
            //$sql="select * from support as s inner join post as p on s.userid='$_SESSION[user]' and s.supid=p.user_id and p.post_id in('select * from post where user_id='$_SESSION[user]'';) order by p.post_id desc";
                 $const="home";
                 $sql="select * from users as u inner join post as p on p.user_id=u.user_id and p.post_id in(select post_id from post where post_id IN(select post_id from post where user_id='$_SESSION[user]' and const='$const') or post_id IN(select p.post_id from post as p inner join support as s ON s.userid='$_SESSION[user]' and s.supid=p.user_id and p.const='$const')) order by p.post_id desc";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
                $i=0;
                $j=0;
                $k=0.5;
				$z=0.75;
                while($row=mysqli_fetch_assoc($result)){
                    $i++;
                    $j--;
                    $k++;
					$z++;
                    echo"<div class='col-sm-3'>
                         <div class='well'>
                         <p>$row[first] $row[last]</p>";
						 echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['profile_pic'] ).'"class="img-circle" height="50" width="50" alt="Profile Pic" />';
                        //<img src="bird.jpg" class="img-circle" height="55" width="55" alt="Avatar">
                    echo"<p>$row[modified_date] $row[modified_time]</p>
                         </div>
                         </div>";
				    if(!($row['image']!=null)&&!($row['speak']!=null)){
						echo"<div class='col-sm-9'>
                             <div class='well'>
                             <p>$row[des]</p>
							 <br><br><br><br>
							 <div class='om'>
							  <form action='hometemp.php?support=true' method='post'>
            <input type='hidden' value='$row[support]' id='".$i."' name='sup'>
            <input type='hidden' value='$row[post_id]' name='pid'>
             <img src='images/support.png' height='35'/><button type='submit' class='btn btn-success' onclick='return inc(".$i.")'>Support	<span class='badge'>$row[support]</span></button>
            </form></div>&nbsp;&nbsp;
			<div class='om'>
            <form action='hometemp.php?neutral=true' method='post'>
            <input type='hidden' value='$row[neutral]' id='".$k."' name='nut'>
            <input type='hidden' value='$row[post_id]' name='pid'>
             <img src='images/neutral.png' height='35'/><button type='submit' class='btn btn-warning' onclick='return neutral(".$k.")'>Neutral	<span class='badge'>$row[neutral]</span></button>
            </form></div>&nbsp;&nbsp;
			<div class='om'>
            <form action='hometemp.php?oppose=true' method='post'>
            <input type='hidden' value='$row[oppose]' id='".$j."' name='opp'>
            <input type='hidden' value='$row[post_id]' name='pid'>
             <img src='images/oppose.png' height='35'/><button type='submit' class='btn btn-danger' onclick='return dec(".$j.")'>Oppose	<span class='badge'>$row[oppose]</span></button>
            </form></div><br><br>
			<div class='om1'>
							 <form action='temp.php?comment=true' method='post'>
                             <input type='hidden' value='$row[post_id]' name='pid'>
                              <img src='images/suggest.png' height='35'/><button type='submit' class='btn btn-default'>Suggests</button>
                             </form></div>&nbsp;&nbsp;
							 <div class='om1'>
							 <form name='f1'>
							 <input type='hidden' value='$row[post_id]' id='".$z."'>
                            <button type='button' class='btn btn-danger btn-md' data-toggle='modal' data-target='#myModal' onclick='myfunction(".$z.");'>Speak Up In Oppose</button>
                             </form></div>&nbsp;&nbsp;
           <div class='om1'>
			<button type='button' class=btn btn-basic '  data-toggle='collapse' data-target='#$row[post_id]'><span class='glyphicon glyphicon-stats'></span></button>
			</div>
          <div id='$row[post_id]' class='collapse'><br>
             <br>";
		  
		  $r1=$row['support'];
$r2=$row['oppose'];
$r3=$row['neutral'];
$r5=$r1+$r2+$r3;
if($r5!=0){
$r1=($r1/$r5)*100;
$r2=($r2/$r5)*100;
$r3=($r3/$r5)*100;
}//echo" support =$r1 && neutral =$r2 && oppose =$r3 ";
		  echo"<div class='progress'>
	<div class='progress-bar progress-bar-success progress-bar-striped' role='progressbar' style='width:$r1%'>
       $r1%
    </div>
    <div class='progress-bar progress-bar-warning progress-bar-striped' role='progressbar' style='width:$r3%'>
       $r3%
    </div>
    <div class='progress-bar progress-bar-danger progress-bar-striped' role='progressbar' style='width:$r2%'>
       $r2%
    </div>
		  </div>
		  ";
            echo"</div>
            
          </div>
          
        </div> ";
		}
                   else if(($row['image']!=null)&&!($row['speak']!=null)){
                        echo"<div class='col-sm-9'>
                             <div class='well'>
                             <p>$row[des]</p>
							 <div class='container'>
							 <div class='row'>
							 <div class='col-md-4'>
							 <div class='thumbnail'>";
						echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"alt="Your Posted Image" />';
                        echo"</div>
	                         </div>
	                         </div>
                             </div>";
					    echo"<div class='om'>
						<form action='hometemp.php?support=true' method='post'>
            <input type='hidden' value='$row[support]' id='".$i."' name='sup'>
            <input type='hidden' value='$row[post_id]' name='pid'>
             <img src='images/support.png' height='35'/><button type='submit' class='btn btn-success' onclick='return inc(".$i.")'>Support	<span class='badge'>$row[support]</span></button>
            </form></div>
			<div class='om'>
            <form action='hometemp.php?neutral=true' method='post'>
            <input type='hidden' value='$row[neutral]' id='".$k."' name='nut'>
            <input type='hidden' value='$row[post_id]' name='pid'>
             <img src='images/neutral.png' height='35'/><button type='submit' class='btn btn-warning' onclick='return neutral(".$k.")'>Neutral	<span class='badge'>$row[neutral]</span></button>
            </form></div>
			<div class='om'>
            <form action='hometemp.php?oppose=true' method='post'>
            <input type='hidden' value='$row[oppose]' id='".$j."' name='opp'>
            <input type='hidden' value='$row[post_id]' name='pid'>
             <img src='images/oppose.png' height='35'/><button type='submit' class='btn btn-danger' onclick='return dec(".$j.")'>Oppose	<span class='badge'>$row[oppose]</span></button>
            </form></div><br><br>
			<div class='om1'>
						<form action='temp.php?comment=true' method='post'>
                             <input type='hidden' value='$row[post_id]' name='pid'>
                              <img src='images/suggest.png' height='35'/><button type='submit' class='btn btn-default'>Suggests</button>
                             </form></div>
							 <div class='om1'>
							 <form name='f1'>
							 <input type='hidden' value='$row[post_id]' id='".$z."'>
                            <button type='button' class='btn btn-danger btn-md' data-toggle='modal' data-target='#myModal' onclick='myfunction(".$z.");'>Speak Up In Oppose</button>
							</form></div>
            <div class='om1'>
			<button type='button' class=btn btn-basic '  data-toggle='collapse' data-target='#$row[post_id]'><span class='glyphicon glyphicon-stats'></span></button>
			</div>
          <div id='$row[post_id]' class='collapse'><br>
             <br>";
		  
		  $r1=$row['support'];
$r2=$row['oppose'];
$r3=$row['neutral'];
$r5=$r1+$r2+$r3;
if($r5!=0){
$r1=($r1/$r5)*100;
$r2=($r2/$r5)*100;
$r3=($r3/$r5)*100;
}//echo" support =$r1 && neutral =$r2 && oppose =$r3 ";
		  echo"<div class='progress'>
	<div class='progress-bar progress-bar-success progress-bar-striped' role='progressbar' style='width:$r1%'>
       $r1%
    </div>
    <div class='progress-bar progress-bar-warning progress-bar-striped' role='progressbar' style='width:$r3%'>
       $r3%
    </div>
    <div class='progress-bar progress-bar-danger progress-bar-striped' role='progressbar' style='width:$r2%'>
       $r2%
    </div>
		  </div>
		  ";
            echo"</div>
            
          </div>
          
        </div> ";
					}
					else if($row['speak']!=''){
					    echo"<div class='col-sm-9'>
                             <div class='well'>
                             <p>$row[des]</p>";
							 if($row['image']!=null){
							 echo"<div class='container'>
							 <div class='row'>
							 <div class='col-md-4'>
							 <div class='thumbnail'>";
						echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"alt="Your Posted Image" />';
                        echo"</div>
	                         </div>
	                         </div>
                             </div>";
							 }
						  $temp=$row['speak'];
						  $tempsql="select * from post where post_id=$temp";
						  $tempsqlr=mysqli_query($conn,$tempsql);
						  $tempsqlrr=mysqli_fetch_assoc($tempsqlr);
	echo"<p>In Oppose Of</p>";
    echo"<div class='panel panel-default'>
    <div class='panel-body'>
    
    <div class='media'>
    <div class='media-left'>";
      echo '<img src="data:image/jpeg;base64,'.base64_encode( $tempsqlrr['profile_pic'] ).'"class="img-circle" height="50" width="50" alt="Profile Pic" />';
    echo"</div>
    <div class='media-body'>
      <h4 class='media-heading'>$tempsqlrr[first] $tempsqlrr[last] </h4>
      <p>$tempsqlrr[des]</p>";
	 if($tempsqlrr['image']!=null){
      echo"<div class='media-left'>";
      echo '<img src="data:image/jpeg;base64,'.base64_encode( $tempsqlrr['image'] ).'"class="img-square" height="150" width="150""alt="Cover Pic" />';
      echo"</div>";
	}
    echo"</div></div>
         </div>
         </div>";
		 echo"<div class='om'>
		 <form action='hometemp.php?support=true' method='post'>
            <input type='hidden' value='$row[support]' id='".$i."' name='sup'>
            <input type='hidden' value='$row[post_id]' name='pid'>
             <img src='images/support.png' height='35'/><button type='submit' class='btn btn-success' onclick='return inc(".$i.")'>Support	<span class='badge'>$row[support]</span></button>
            </form></div>
			<div class='om'>
            <form action='hometemp.php?neutral=true' method='post'>
            <input type='hidden' value='$row[neutral]' id='".$k."' name='nut'>
            <input type='hidden' value='$row[post_id]' name='pid'>
             <img src='images/neutral.png' height='35'/><button type='submit' class='btn btn-warning' onclick='return neutral(".$k.")'>Neutral	<span class='badge'>$row[neutral]</span></button>
            </form></div>
			<div class='om'>
            <form action='hometemp.php?oppose=true' method='post'>
            <input type='hidden' value='$row[oppose]' id='".$j."' name='opp'>
            <input type='hidden' value='$row[post_id]' name='pid'>
             <img src='images/oppose.png' height='35'/><button type='submit' class='btn btn-danger' onclick='return dec(".$j.")'>Oppose	<span class='badge'>$row[oppose]</span></button>
            </form></div><br><br>
			<div class='om1'>
		 <form action='temp.php?comment=true' method='post'>
                             <input type='hidden' value='$row[post_id]' name='pid'>
                              <img src='images/suggest.png' height='35'/><button type='submit' class='btn btn-default'>Suggests</button>
                             </form></div>
							 <div class='om1'>
							 <form name='f1'>
							 <input type='hidden' value='$row[post_id]' id='".$z."'>
                            <button type='button' class='btn btn-danger btn-md' data-toggle='modal' data-target='#myModal' onclick='myfunction(".$z.");'>Speak Up In Oppose</button>
							</form></div>
            <div class='om1'>
			<button type='button' class=btn btn-basic '  data-toggle='collapse' data-target='#$row[post_id]'><span class='glyphicon glyphicon-stats'></span></button>
         </div>
		 <div id='$row[post_id]' class='collapse'><br>
             <br>";
		  
		  $r1=$row['support'];
$r2=$row['oppose'];
$r3=$row['neutral'];
$r5=$r1+$r2+$r3;
if($r5!=0){
$r1=($r1/$r5)*100;
$r2=($r2/$r5)*100;
$r3=($r3/$r5)*100;
}//echo" support =$r1 && neutral =$r2 && oppose =$r3 ";
		  echo"<div class='progress'>
	<div class='progress-bar progress-bar-success progress-bar-striped' role='progressbar' style='width:$r1%'>
       $r1%
    </div>
    <div class='progress-bar progress-bar-warning progress-bar-striped' role='progressbar' style='width:$r3%'>
       $r3%
    </div>
    <div class='progress-bar progress-bar-danger progress-bar-striped' role='progressbar' style='width:$r2%'>
       $r2%
    </div>
		  </div>
		  ";
            echo"</div>
            
          </div>
          
        </div> ";
					
	}
					else
                        echo"";
            
        }
		}
		}
        ?>
      </div>
    </div>
   </div>
  </div>
	
</body>
</html>
