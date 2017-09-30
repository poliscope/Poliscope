<?php
session_start();
?>


<html lang="en">

<head>
    <title>Poliscope</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript">
	function myFunction(newid){
            var x=parseInt(document.getElementById(newid).value);
            var y=x+1;
            document.getElementById('post').value=x;
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

		
	
		
		<!--Load the Ajax API-->
    

    // Load the Visualization API and the piechart package.
   
		
		
		</script>
		

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>    
 
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
	

		.navbar-brand {
  padding: 0px;
}
.navbar-brand>img {
 
  

    width: auto%;
   height: 100%;
	margin-left:7px;

}


	@media only screen and (max-width : 768px){
   .navbar-brand {
  
  transform: translateX(-50%);
  left: 50%;
  position: absolute;
}
 .navbar-brand>img {
  height: 100%;
   padding: 7px 15px;
  width: auto;
   
}
}

.box{
	display: block;
    padding: 10px;
    margin-right: 40px;
    text-align: justify;

}
.box1{
	display: block;
    padding: 10px;
	margin-left:15px;
   
    text-align: justify;

}


	


  </style>
  

   
</head>
<body>
<?php 
if(isset($_SESSION['user']))
                                           {echo"";
										   }
else
                                        {
	                                     header('Location:index.php');
                                        }
										include 'navbar1.php';
?>
<div class='modal fade' id='myModal' role='dialog'>
    <div class='modal-dialog'>
    
      
      <div class='modal-content'>
        <div class='col-sm-12'>
    
      <div class='row'>
        <div class='col-sm-12'>
          <div class='panel panel-default text-left'>
            <div class='panel-body'>
            <form action='polispeakcheck.php' method='post' enctype='multipart/form-data' name='f2'>
    <div class='form-group'>
	  <input type='hidden' value='' id='post' name='pid'>
      <input type='text' class='form-control' id='usr' placeholder='Speakup in oppose...' name='des' value=''>
	  <img id='blah1' src='#' alt='Image' style='margin-left: 10px;'/>
      <input type='file' name='image' onchange='readURL1(this);' style='padding:8px 10px;'/><br/>
    </div>
	
	<img src='images/speakup.png' height='35'/><button type='submit' class='btn btn-default btn-sm'>
    <span <img src='images/suggest.png' height='35'/></span> Speakup
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
 <?php
					$_SESSION['polipage']=4;
        $conn = mysqli_connect('localhost','root','','poliscope');
        if(mysqli_connect_error())
        {
            echo "Error in connecting to database: ".mysqli_connect_error();
        }
        else{
            if(!empty($_GET["polisearch"])){
                $id=$_POST['polid'];
                //$_SESSION['pol']=$id;
                $temp="Select * from users where user_id in(Select user_id from posts where politician_id='$id')";
                $result=mysqli_query($conn,$temp);
                $row = mysqli_fetch_assoc($result);
                $flag=0;
            }
			else if(!empty($_GET["id"])){
                $id=$_GET['id'];
                //$_SESSION['pol']=$id;
                $temp="Select * from users where user_id in(Select user_id from posts where politician_id='$id')";
                $result=mysqli_query($conn,$temp);
                $row = mysqli_fetch_assoc($result);
                $flag=0;
            }
            /*else if((!empty($_GET["itself1"]))){
                $flag=1;
                $id=$_POST['supid'];
                $temp="Select * from users where user_id in(Select user_id from posts where politician_id='$id')";
                $result=mysqli_query($conn,$temp);
                $row = mysqli_fetch_assoc($result);
            }*/
            else {
                $flag=0;
                $sql1 = "select * from posts where user_id=$_SESSION[user]";
                $result1 = mysqli_query($conn, $sql1);
                $row1 = mysqli_fetch_assoc($result1);
                $id = $row1['politician_id'];
                $_SESSION['pol'] = $id;
                $sql = "select * from users where user_id=$_SESSION[user]";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
            }
echo"
<div class='container text-center' style='margin-top: 65px'>    
  <div class='row'>
  
 
   
	

  
    <div class='col-sm-3 well'>
      <div class='well'>
        <p><a href='#'>$row[first_name]  $row[last_name]</a></p>";
        echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['profile'] ).'"class="img-circle" height="50" width="50" alt="Profile Pic" />';
     echo" </div>";
	 
	  $tempq="select * from posts where politician_id='$id'";
				   $te=mysqli_query($conn,$tempq);
				   if(mysqli_num_rows($te)>0){
					 
		 
		  while($teq=mysqli_fetch_assoc($te)){
		$id1=$teq['user_id'];	
	 if($id1==$_SESSION['user'])
	 {
	 
	 echo"<a href='poliformupdate.php' class='button'>Edit Political Info</a>";
	 }
				   }}
	 echo"
	 <div class='well'>
      <h>Personal Information</h>
	  
      <div class='well'>
      
      Gender:<p>$row[gender]</p>
      DoB:<p>$row[dob]</p>
      Qualification:<p>BE</p>
      Email:<p>$row[email]</p>
      State:<p>$row[state]</p>
      City:<p>$row[city]</p>
      Locality:<p>$row[address]</p>
     
      
      </div>
	  ";
	 $sql2="select * from posts where politician_id='$id'";
            $result2=mysqli_query($conn,$sql2);
            $row2=mysqli_fetch_assoc($result2);
	  echo"
      <h>Constituencies</h>
      <div class='well'>
      
      $row2[const_category]<p>$row2[const]</p>
       </div>
      <h>Political History</h>
      <div class='well'>
     <p>$row2[history]</p>
     </div>
         <div class='well'>
        <p><a href='#'>Interests</a></p>
        <p>
		";
		if($row2['interest1']!='null')
			echo"
          <span class='label label-default'>$row2[interest1]</span>";
		  if($row2['interest2']!='null')
         echo" <span class='label label-primary'>$row2[interest2]</span>";
	  if($row2['interest3']!='null')
          echo"<span class='label label-success'>$row2[interest3]</span>";
	  if($row2['interest4']!='null')
         echo" <span class='label label-info'>$row2[interest4]</span>";
	  if($row2['interest5']!='null')
         echo" <span class='label label-info'>$row2[interest5]</span>";
	  if($row2['interest6']!='null')
         echo" <span class='label label-info'>$row2[interest6]</span>";
	  if($row2['interest7']!='null')
         echo" <span class='label label-info'>$row2[interest7]</span>";
	  if($row2['interest8']!='null')
         echo" <span class='label label-info'>$row2[interest8]</span>";
      echo" 
        </p>
        
      </div>
      </div>
      
    </div>
    <div class='col-sm-7'>
    
      <div class='row'>
        <div class='col-sm-12'>
        <h>Political Symbol</h>
         <div class='panel panel-default'>
    <div class='panel-body'>";
    echo'<img src="data:image/jpeg;base64,'.base64_encode( $row2['cover'] ).'"width="100%" height="220px" alt="Cover Pic" />';
  echo"</div></div>";
   
					 $tempql="select * from post where poli_id='$id'";
				   $tempqlr=mysqli_query($conn,$tempql);
				   if(mysqli_num_rows($tempqlr)>0){
					   $gold=0;
				       $silver=0;
				       $bronze=0;
         echo" <h>Medals</h>";
		 
		  while($tempqlrr=mysqli_fetch_assoc($tempqlr)){
						   $sum=$tempqlrr['support']+$tempqlrr['oppose']+$tempqlrr['neutral'];
						   if($sum!=0)
						   $prestige=($tempqlrr['support']/$sum)*100;
					       else
							   $prestige=0.00;
						   //echo $prestige."<br/>";
						   if($prestige>75.00)
							   $gold=$gold+1;
						   if($prestige>65.00&&$prestige<=75.00)
							   $silver=$silver+1;
						   if($prestige>=50.00&&$prestige<=65.00)
							   $bronze=$bronze+1;
					   }
					   echo"
          <div class='panel panel-default text-middle'>
            <div class='panel-body'>
            ";
			echo"<div class='col-sm-1'></div>";
            echo" <div class='col-sm-3 well box1'>";
             
			 
            						   echo"<img src='images/goldmedal.png'class='img-square' height='70' width='70' alt='Avatar'>";
            echo"&nbsp;&nbsp;$gold";
            echo"</div>";
			
			 echo"
             <div class='col-sm-3 well box1'>
			 ";
            echo"<img src='images/silver medal.png'class='img-square' height='70' width='70' alt='Avatar'>";
						   echo"&nbsp;&nbsp;$silver</div>";
						   
			  
			 
				  echo"
            
             <div class='col-sm-3 well box1'>";
			
             echo"<img src='images/bronze medal.png' class='img-square' height='70' width='70' alt='Avatar'>";
						   echo"&nbsp;&nbsp;$bronze</div>";
				   }
			 echo"
				   
            </div>
              </div>";
				   
  
  
  echo"
  AGENDA:<div class='panel panel-default'>  <div class='panel-body'><div class='well'>
		    <p>$row2[agenda]</p>
		   </div></div>
</div><div class='col-sm-12'>";
echo"</form>";
                $sql2="select * from support where supid='$id' and category='politician'";
                $result2=mysqli_query($conn,$sql2);
                $num=0;
                    if(mysqli_num_rows($result2)>0)
                    {
                        while($row3=mysqli_fetch_assoc($result2))
                        {
                     $num++;

                        }
                    }
           echo" <div class='col-sm-4'></div><div class='col-sm-4 well'>
			
<input type='submit' class='btn btn-primary' data-toggle='collapse' data-target='#demo' value='Supporters $num' name='supporters'>		";		 
                echo"<div id='demo' class='collapse'><br>";


	
	 $sql5="select * from support as s inner join users as u where s.userid=u.user_id and s.supid='$id' and s.category='politician'";
					$result5=mysqli_query($conn,$sql5);
					if(mysqli_num_rows($result5)>0){
						while($row5=mysqli_fetch_assoc($result5))
						{echo"
                 
                 <div class='well'>";
     echo'<img src="data:image/jpeg;base64,'.base64_encode( $row5['profile'] ).'"  class="img-circle" height="50" width="50" alt="Avatar"> ';
	echo" <h>$row5[first_name] $row5[last_name]</h>
        
    </div>
";}}echo" </div>";
                 
             // <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo">Supporters	<span class="badge">7</span></button>
             /*<div id="demo" class="collapse">
             <div class="well"><br>
    <img src="bird.jpg" class="img-circle" height="50" width="50" alt="Avatar">   <h><a href="#">User name</a></h>
     
             
                   
                </div>
  
            </div>
			*/
         echo" </div></div>";
		 if($_SERVER["REQUEST_METHOD"]=="POST"&&$flag==1) {
                $supporter=$_POST['supporters'];
                if(isset($supporter)){
                    $sql5="select * from support as s inner join users as u where s.userid=u.user_id and s.supid='$id'";
                    $result5=mysqli_query($conn,$sql5);
                    if(mysqli_num_rows($result5)>0){
                        while($row5=mysqli_fetch_assoc($result5))
                        {
                            echo"madar<div class='row'>
        <div class='col-sm-3'>
          <div class='well'>";
                            echo '<img src="data:image/jpeg;base64,'.base64_encode( $row5['profile'] ).'" class="img-circle" height="55" width="55" alt="Avatar">';
                            echo"<h3>$row5[first_name] $row5[last_name]<h3></div></div></div>";
                        }
                    }
                    else echo"";
                }
            }
            else echo"";
 
					
			  $temp3="select * from posts where user_id='$_SESSION[user]'";
				$tempr3=mysqli_query($conn,$temp3);
				if(mysqli_num_rows($tempr3)>0) {
                    $temprow3 = mysqli_fetch_assoc($tempr3);
                    $id2=$temprow3['politician_id'];
                    if($id==$id2){
                        $temp10="select * from posts where politician_id='$id'";
                        $tempr10=mysqli_query($conn,$temp10);
                        if(mysqli_num_rows($tempr10)>0) {
                            $temprow10 = mysqli_fetch_assoc($tempr10);
			  echo "<form action='polipost.php' method='post' name='f2'>
			  <input type='submit' class='btn btn-primary btn-block' value='ADDRESS PEOPLE $temprow10[const_category]' name='polipost' method='post'>
				
				</form>";

						 }
                    }
                    else echo "";

				}echo"
						<form action='usersup.php?poli=true' method='post' name='f2'>
                <input type='hidden' value='$id' name='supid'>";
				$f=0;
				$temp1="select * from posts where user_id='$_SESSION[user]'";
				$tempr1=mysqli_query($conn,$temp1);
				if(mysqli_num_rows($tempr1)>0){
					$temprow=mysqli_fetch_assoc($tempr1);
					$id1=$temprow['politician_id'];
					if($id!=$id1)
						$f=1;
				}
				else
					$f=1;
                if($f==1) {
					$temp="select * from support where userid='$_SESSION[user]' and supid='$id'";
	                $tempr=mysqli_query($conn,$temp);
	                if(mysqli_num_rows($tempr)>0)
                      echo "<input type='submit' value='unsupport'>";
				    else
					  echo "<input type='submit' value='support'>";
                }
				
						
						

          
          echo"
          <h1>Old Posts</h1>
          ";
		  //echo"<h1>".$id."</h1>";
		   $temp5 = "select * from post where poli_id='$id' order by post_id desc";
		   
            $tempr5 = mysqli_query($conn, $temp5);
			$temp12="select * from posts as p inner join users as u on  p.user_id=u.user_id where p.politician_id='$id' ";
				$tempr12=mysqli_query($conn,$temp12);
				 if(mysqli_num_rows($tempr12)>0){
					$temprow12=mysqli_fetch_assoc($tempr12);
					$id12=$temprow12['politician_id'];
					if($id!=$id12)
						$f1=1;
				}
				else
					$f1=1;
				
				
            if (mysqli_num_rows($tempr5) > 0) {
                $i=0;
                $j=0;
                $k=0.5;
				$z=0.75;
                while ($temprow5= mysqli_fetch_assoc($tempr5)) {
					 $i++;
                    $j--;
                    $k++;
					echo"
					
          <div class='row'>
		  
        <div class='col-sm-3'>
          <div class='well'>
		  
		   $temprow5[first] $temprow5[last] ";
		  
           echo'<img src="data:image/jpeg;base64,' . base64_encode($temprow12['profile']) . '" class="img-square" height="80" width="100" alt="Avatar">';
            
			echo"<p> $temprow5[modified_date] $temprow5[modified_time]</p>
			
          </div>
        </div>

        <div class='col-sm-9'>
          <div class='well'>
		  
		  ";$f1=0;
		  
				
				echo"
            <p> $temprow5[des].</p>";
			if($temprow5['image']!=null){
			echo"<div class='thumbnail'>";
			echo '<img src="data:image/jpeg;base64,'.base64_encode( $temprow5['image'] ).'"alt="Your Posted Image" />';
            echo"</div>";
			}echo"<br><br><br>
			 <div class='om'>
            <form action='poliviewtemp.php?support=true' method='post'>
                               <input type='hidden' value='$temprow5[support]' id='".$i."' name='sup'>
                               <input type='hidden' value='$temprow5[post_id]' name='pid'>
							   <input type='hidden' value='$id' name='poliid'>
                             <img src='images/support.png' height='35'/><input type='submit' value='Support $temprow5[support]' class='btn btn-success' onclick='return inc(".$i.")'>
							   
                               </form>
							   
							   </div>
							   &nbsp;&nbsp;
							   <div class='om'>
             <form action='poliviewtemp.php?neutral=true' method='post'>
                               <input type='hidden' value='$temprow5[neutral]' id='".$k."' name='nut'>
                               <input type='hidden' value='$temprow5[post_id]' name='pid'>
							   <input type='hidden' value='$id' name='poliid'>
                            <img src='images/neutral.png' height='35'/><input type='submit' value='Neutral $temprow5[neutral]' class='btn btn-warning' onclick='return neutral(".$k.")'>
                               </form>
							   
							   </div>
							   &nbsp;&nbsp;
							   <div class='om'>
							   <form action='poliviewtemp.php?oppose=true' method='post'>
                               <input type='hidden' value='$temprow5[oppose]' id='".$j."' name='opp'>
                               <input type='hidden' value='$temprow5[post_id]' name='pid'>
							   <input type='hidden' value='$id' name='poliid'>
                               <img src='images/oppose.png' height='35'/><input type='submit' class='btn btn-danger' value='Oppose $temprow5[oppose]' onclick='return dec(".$j.")'>
                                </form>
								
  
  </div>&nbsp;&nbsp;&nbsp;&nbsp;<br>
  <div class='om1'>
			<form action='politemp.php?comment=true' method='post'>
                                        <input type='hidden' value='$temprow5[post_id]' name='pid'>
                                        <input type='hidden' value='$id' name='poliid'>
										<img src='images/suggest.png' height='30'/><input type='submit' class='btn btn-default' value='Suggest'>
                                        </form>
										</div>
										<div class='om1'>
										 <form name='f1'>
							 <input type='hidden' value='$temprow5[post_id]' id='".$z."'>
                            <button type='button' class='btn btn-danger btn-md' data-toggle='modal' data-target='#myModal' onclick='myfunction(".$z.");'>Speak Up In Oppose</button>
							</form>
             </div>
  
 
  ";
  if(!empty($_GET['check1']))
                       echo"<h4>You are already supporting these post</h4>";
                   if(!empty($_GET['check']))
                       echo"<h4>You are already opposing these post</h4>";
                    if(!empty($_GET['checknut']))
                    echo"<h4>You are already neutral for these post</h4>";
				echo"
  <button type='button' class=btn btn-basic '  data-toggle='collapse' data-target='#$temprow5[post_id]'><span class='glyphicon glyphicon-stats'></span></button>
          <div id='$temprow5[post_id]' class='collapse'>
		  
		  
		  
		  ";
		  
		  
		
		  echo"<br>";
		  
		  $r1=$temprow5['support'];
$r2=$temprow5['oppose'];
$r3=$temprow5['neutral'];
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
		  
		  
		  echo"
		  </div>
		  </div>
          
        </div>
      </div>";
	  
		}
			echo"</div></div></div>";	
				
      
    
			}
			else echo"</div>";
			echo"<div class='col-sm-2 well'>
         
      <div class='well'>
           <p><a href='user.php?id=$row2[user_id]'>Politicians User Profile</a></p>
       </div>
    </div>";
				   }
				   
?>
</body>
</html>
