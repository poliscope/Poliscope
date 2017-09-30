<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Poliscope</title>
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
	
	
	.box1{
	display: block;
    padding: 10px;
	margin-left:15px;
   
    text-align: justify;

}

  </style>
  <script>
  function supporting(int x) {
	  
    document.getElementById("demo").innerHTML = "";
}
  function supporters(int x) {
	  
    document.getElementById("demo1").innerHTML = "";
}
  
  
  
  </script>
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
        if(!empty($_GET["search"])){
			$flag=0;
            $id=$_POST['userid'];
		}
		else if(!empty($_GET["id"])){
			$flag=0;
            $id=$_GET['id'];
		}
		else if(!empty($_GET["itself"])||(!empty($_GET["itself1"]))){
			$flag=1;
			$id=$_POST['supid'];
		}
		else if(!empty($_GET["khudka"])){
			$flag=0;
			$id=$_SESSION['user'];
		}
        $conn = mysqli_connect('localhost','root','','poliscope');
        if(mysqli_connect_error())
        {
            echo "Error in connecting to database: ".mysqli_connect_error();
        }
        else{
			$_SESSION['page'] = 5;
			$_SESSION['comment_sess'] = $id;
            $sql="select * from users where user_id='$id'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);
            echo"

<div class='container text-center'style='margin-top:80px'>
  <div class='row'>
    <div class='col-sm-3 well'>
      <div class='well'>
        <p>$row[first_name]"."   "."$row[last_name]</p>";
        echo' <img src="data:image/jpeg;base64,'.base64_encode( $row['profile'] ).'" class="img-circle" height="100" width="100" alt="PROFILE PIC">';
      echo"</div>
      <div class='well'>
      <h>Personal Information</h>
      <div class='well'>
      
      Gender:<p> $row[gender]</p>
      DoB:<p> $row[dob]</p>
      Qualification:<p>$row[qualification]</p>
      Email:<p>$row[email]</p>
      State:<p>$row[state]</p>
      City:<p>$row[city]</p>
      Locality:<p>$row[address]</p>
     
      
      </div>
      <h>Constituencies</h>
      <div class='well'>
      
      Central:<p>$row[central]</p>
      State:<p>$row[state_con]</p>
      Local:<p>$row[local]</p>
      
      </div>
         <div class='well'>
        <p>Interests</p>
        <p>";
		if($row['interest1']!='null')
			echo"
          <span class='label label-default'>$row[interest1]</span>";
		  if($row['interest2']!='null')
         echo" <span class='label label-primary'>$row[interest2]</span>";
	  if($row['interest3']!='null')
          echo"<span class='label label-success'>$row[interest3]</span>";
	  if($row['interest4']!='null')
         echo" <span class='label label-info'>$row[interest4]</span>";
	  if($row['interest5']!='null')
         echo" <span class='label label-info'>$row[interest5]</span>";
	  if($row['interest6']!='null')
         echo" <span class='label label-info'>$row[interest6]</span>";
	  if($row['interest7']!='null')
         echo" <span class='label label-info'>$row[interest7]</span>";
	  if($row['interest8']!='null')
         echo" <span class='label label-info'>$row[interest8]</span>";
         
      echo"  </p>
        
      </div>
      </div>
      
    </div>
    <div class='col-sm-7'>
    
      <div class='row'>
        <div class='col-sm-12'>
        
         
          <h>Medals</h>
          <div class='panel panel-default text-left'>
            <div class='panel-body'>
            
             ";
			 
			  $tempql="select * from post where user_id='$id'";
			  
			   $gold=0;
				       $silver=0;
				       $bronze=0;
				   $tempqlr=mysqli_query($conn,$tempql);

				   if(mysqli_num_rows($tempqlr)>0){
					  
					   while($tempqlrr=mysqli_fetch_assoc($tempqlr)){
						$sum=0;
						$prestige1=0;
						$prestige2=0;
						$prestige3=0;
						   if($tempqlrr['const']=="central")
						   {
								//echo "In central";
								$sum=$tempqlrr['support']+$tempqlrr['oppose']+$tempqlrr['neutral'];
								if($sum!=0)
								{
									$prestige1=($tempqlrr['support']/$sum)*100;
								}			
						   }
						   else if($tempqlrr['const']=="state")
						   {
							   //echo "In state";
								$sum=$tempqlrr['support']+$tempqlrr['oppose']+$tempqlrr['neutral'];
								if($sum!=0)
								{	
									$prestige2=($tempqlrr['support']/$sum)*100;
								}			
						   }
						   else if($tempqlrr['const']=="local")
						   {
							   //echo "In local";
								$sum=$tempqlrr['support']+$tempqlrr['oppose']+$tempqlrr['neutral'];
								if($sum!=0)
								{
									$prestige3=($tempqlrr['support']/$sum)*100;
								}			
						   }
						   //echo $prestige1;
						   //echo"<br>";
						   //echo $prestige2;
						   //echo"<br>";
						   //echo $prestige3;
						   //echo"<br>";
						   if($prestige1>=50.00)
						   {   
							   $gold=$gold+1;
						   }	
						   if($prestige2>=50.00)
						   {
							   $silver=$silver+1;
						   }
						   if($prestige3>=50.00)
						   {
							   $bronze=$bronze+1;
						   }
					   }
				   }
					  
             echo"<div class='col-sm-1'></div><div class='col-sm-3 well box1'>";
           echo"<img src='images/goldmedal.png'class='img-square' height='70' width='70' alt='Avatar'>";
           echo"	<h>$gold</h>
            </div>
           ";
					  
		  
              echo"<div class='col-sm-3 well box1'>";
           echo"<img src='images/silver medal.png'class='img-square' height='70' width='70' alt='Avatar'>";
            echo"	<h>$silver</h>
            </div>";
		  
		    
              echo"<div class='col-sm-3 well box1'>";
              
             echo"<img src='images/bronze medal.png' class='img-square' height='70' width='70' alt='Avatar'>";
            echo"	<h>$bronze</h>
            </div>";
				   
			echo"
            </div>
              </div>
              <div class='row'>
			";
echo"
			<form action='usersup.php' method='post' name='f2'>
                <input type='hidden' value='$id' name='supid'>";
			 if($id!=$_SESSION['user']) {
					$temp="select * from support where userid='$_SESSION[user]' and supid='$id'";
	                $tempr=mysqli_query($conn,$temp);
	                if(mysqli_num_rows($tempr)>0)
                      echo "<div class='col-sm-4'></div><div class='col-sm-4 well'><input class='btn btn-danger' type='submit' value='unsupport'></div>";
				    else 
					  echo "<div class='col-sm-4'></div><div class='col-sm-4 well'><input class='btn btn-success' type='submit' value='support'></div>";
                }
				echo"</div></form>";
           
		   if($_SERVER["REQUEST_METHOD"]=="POST"&&$flag==1){
			if(!empty($_GET["itself"]))
			$supporting=$_POST['supporting'];
			if(!empty($_GET["itself1"]))
			$supporter=$_POST['supporters'];
		   }
			$sql2="select * from support where supid='$id'";
$result2=mysqli_query($conn,$sql2);
$num=0;
                    if(mysqli_num_rows($result2)>0)
                    {
                        while($row2=mysqli_fetch_assoc($result2))
                        {
                     $num++;

                        }
                    }
					else echo"";
$sql3="select * from support where userid='$id'";
$result3=mysqli_query($conn,$sql3);
$num1=0;
                    if(mysqli_num_rows($result3)>0)
                    {
                        while($row2=mysqli_fetch_assoc($result3))
                        {
                     $num1++;

                        }
                    }
			
			echo"<div class='col-sm-1'></div>
			<form action='user.php?itself=true' method='post'>
<input type='hidden' value='$id' name='supid'>

            <div class='col-sm-4 well'>
              <button type='button' value='Supporting $num1' name='supporting'  class='btn btn-primary' data-toggle='collapse' data-target='#demo' onclick='supporting($id)'>Supporting $num1</button>
            </form>

			";
			echo"<div id='demo' class='collapse'><br>";
			
		
				
				$sql4="select * from support as s inner join users as u where s.supid=u.user_id and s.userid='$id'";
					$result4=mysqli_query($conn,$sql4);
					if(mysqli_num_rows($result4)>0){
						while($row4=mysqli_fetch_assoc($result4))
						{
			echo"
             <div class='well'>";
   echo' <img src="data:image/jpeg;base64,'.base64_encode( $row4['profile'] ).'" class="img-circle" height="50" width="50" alt="Avatar"> ';
   echo"<h>$row4[first_name] $row4[last_name]</h>
     </div>   
  ";
			}}
			echo"</div>";
             echo"</div><div class='col-sm-2'></div>
			 <form action='user.php?itself1=true' method='post'>
<input type='hidden' value='$id' name='supid'> 
                   <div class='col-sm-4 well'>
                 <button type='button' value='Supporters $num' name='supporters'  class='btn btn-primary' data-toggle='collapse' data-target='#demo1' onclick='supporters($id)'>Supporters $num</button>
 </form>";
  echo"<div id='demo1' class='collapse'><br>";


	
	 $sql5="select * from support as s inner join users as u where s.userid=u.user_id and s.supid='$id'";
					$result5=mysqli_query($conn,$sql5);
					if(mysqli_num_rows($result5)>0){
						while($row5=mysqli_fetch_assoc($result5))
						{echo"
                 
                 <div class='well'>";
     echo'<img src="data:image/jpeg;base64,'.base64_encode( $row5['profile'] ).'"  class="img-circle" height="50" width="50" alt="Avatar"> ';
	echo" <h>$row5[first_name] $row5[last_name]</h>
        
    </div>
";}}echo" </div>";

                echo"</div>
  
            
          
        ";
		
		
		
		
		
		
		
		
		 echo"
		 <div class='col-sm-12'>
		 <br><br><br>
          <h1>Old Posts</h1>
          ";
		  //echo"<h1>".$id."</h1>".$_SESSION['user'];
		   $temp5 = "select * from post where user_id=$id order by post_id desc";
		   
            $tempr5 = mysqli_query($conn, $temp5);
			$temp12="select * from posts as p inner join users as u on  p.user_id=u.user_id where u.user_id='$id' ";
				$tempr12=mysqli_query($conn,$temp12);
				 if(mysqli_num_rows($tempr12)>0){
					$temprow12=mysqli_fetch_assoc($tempr12);
					$id12=$temprow12['user_id'];
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
		  
           echo'<img src="data:image/jpeg;base64,' . base64_encode($temprow5['profile_pic']) . '" class="img-circle" height="50" width="50" alt="Avatar">';
            
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
			echo '<img src="data:image/jpeg;base64,'.base64_encode( $temprow5['image'] ).'"class="img-square" height="100" width="200" alt="Your Posted Image" />';
            echo"</div>";
			}echo"<br><br><br>
			
  <div class='om1'>
			<form action='temp.php?comment=true' method='post'>
                                        <input type='hidden' value='$temprow5[post_id]' name='pid'>
										<img src='images/suggest.png' height='30'/><input type='submit' class='btn btn-default' value='Suggest'>
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
			}
			echo"</div></div></div></div>";		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
    if($id!=$_SESSION['user'])
          echo"";
     else{ 
       echo"<div class='col-sm-2 well'>";
	        $anu = "SELECT * from posts where user_id=$_SESSION[user]";
			$anuresult=mysqli_query($conn,$anu);
			$anurow=mysqli_fetch_assoc($anuresult);
			if(mysqli_num_rows($anuresult)>0){
            echo"<div class='well'>
            <p><a href='poliview.php'>Politician Profile</a></p>
            </div>";
			}
			else{
				echo"<div class='well'>
            <p><a href='policreate.php'>Create Politician Profile</a></p>
            </div>";
			}
            echo"<div class='well'>
            <p><a href='user_form_edit.php'>Edit Profile</a></p>
            </div>
			</div>";
	  }
    echo"</div>
</div>
			";}
		   ?>
<?php include 'navbar.php';?>

</body>
</html>