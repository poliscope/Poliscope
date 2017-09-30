<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
<head>
  <title>Central Page</title>
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
		  document.getElementById('post').value=x;
		}
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
                        .width(150)
                        .height(200);
                };
                reader.readAsDataURL(input.files[0]);
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
										include 'navbar1.php';?>

  
<div class="container text-center"style="margin-top:80px">    
  <div class="row">
  <div class="col-sm-4 well">
    <div class=" well">
              <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#demo">Politicians</button>
             <div id="demo" class="collapse">
			 <?php
										$_SESSION['polipage']=3;
	$conn = mysqli_connect('localhost','root','','poliscope');
        if(mysqli_connect_error())
        {
            echo "Error in connecting to database: ".mysqli_connect_error();
        }
        else{
			$sql="Select * from users as u inner join posts as p on p.const_category='central' and p.const=(Select const from posts where politician_id='$_SESSION[pol]') and u.user_id=p.user_id and p.user_id!=$_SESSION[user]";
			$result=mysqli_query($conn,$sql);
			if(mysqli_num_rows($result)>0){
				while($row=mysqli_fetch_assoc($result)){
                    echo"<div class='well'>
					      <form action='poliview.php?polisearch=true' method='post'>
                          <input type='hidden' value='$row[politician_id]' name='polid'>";
                          echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['profile'] ).'"class="img-circle" height="50" width="50" alt="Profile Pic" />';
						  echo"<input type='submit' value='$row[first_name] $row[last_name]'>";
                          echo"</form>
						 </div>";
       
				}
			}
			else echo"";
		}
	?>
             
    <!--<img src="bird.jpg"  alt="Avatar">   <h>User name</h>-->
        
  </div>
             </div>
                   <div class=" well">
                 <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#demo1">Social Prestige	<span class="badge">7</span></button>
                 <div id="demo1" class="collapse">
                
				<?php
		
			$arr_gold=[];
			$user_ids=[];
			$count=0;
			$id=$_SESSION['user'];
			$sql="Select * from posts where politician_id=$_SESSION[pol]";
			$result=mysqli_query($conn,$sql);
			$row=mysqli_fetch_assoc($result);
			$value=$row['const'];
			
			$n=mysqli_num_rows($result);
			$tempq4="select * from users where central='$value'";
			$tempq44=mysqli_query($conn,$tempq4);
			
			while($row1 = mysqli_fetch_assoc($tempq44))
			{		
		if($row1 ['user_id']>0)
		{
			$tempql="select * from post where user_id=$row1[user_id]";
		
			   $gold=0;
				   $tempqlr=mysqli_query($conn,$tempql);
				   
				   if(mysqli_num_rows($tempqlr)>0){
					  
					   while($tempqlrr=mysqli_fetch_assoc($tempqlr)){
						$sum=0;
						$prestige1=0;
						   if($tempqlrr['const']=="central")
						   {
								
								$sum=$tempqlrr['support']+$tempqlrr['oppose']+$tempqlrr['neutral'];
								if($sum!=0)
								{
									$prestige1=($tempqlrr['support']/$sum)*100;
								}			
						   }
						   if($prestige1>=50.00)
						   {   
							   $gold=$gold+1;
						   }	
					   }
				   }
				   $user_ids[$count]=$row1['user_id'];
				   $arr_gold[$count]=$gold;
				   $count++;
			}}
			//$kale = 0;
			//$tejas=0;
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
			//echo $count;
			if($count>10)
			{
				$i=0;
				while($i<10)
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
			
			
			
			
			
			
			
			
			
			
			
	
      
	$i=0;
	?>
				
				
				
  </div>
      </div>
      
    </div>
    <div class="col-sm-7">
    
      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-default text-left">
            <div class="panel-body">
            <form action="policentralcheck.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
     
      <input type="text" class="form-control" id="usr" placeholder="Discuss Political Ideas and isues.." name="des" value=""><br>
	  <img id="blah" src="#" class="img-square" height="50" width="50" alt="Image" style="margin-left: 10px;"/>
      <input type='file' name="image" onchange="readURL(this);" style=" padding:8px 10px;"/><br/>
    </div>
    <button type="submit" class="btn btn-default btn-sm">
    <img src='images/speakup.png' height='35'/>	SpeakUp
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
            <form action='polispeakcheck.php' method='post' enctype='multipart/form-data' name='f2'>
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
            $sql="select * from post as p inner join posts as po on p.const='central' and po.politician_id=$_SESSION[pol] and p.area=po.const order by p.post_id desc";
            $result=mysqli_query($conn,$sql);
			$row=mysqli_fetch_all($result,MYSQLI_ASSOC);
			$sql1="Select post_id from post_sup where poli_id='$_SESSION[pol]'";
			$result1=mysqli_query($conn,$sql1);
			$row1=mysqli_fetch_all($result1,MYSQLI_ASSOC);
			if(mysqli_num_rows($result)>0){
			$l=0;
			$length=sizeof($row);
			for($i=0;$i<$length;$i++)
			{
				if(array_search($row[$i]['post_id'],array_column($row1,'post_id'),true)!=FALSE){
					$temp[$l++]=$row[$i];
					unset($row[$i]);
				}
			}
			array_splice($row,0,0);
			for($j=0;$j<sizeof($row)-1;$j++)
			{
			for($i=0;$i<sizeof($row)-$j-1;$i++)
			{
				if(($row[$i]['support']+$row[$i]['oppose']+$row[$i]['neutral'])<($row[$i+1]['support']+$row[$i+1]['oppose']+$row[$i+1]['neutral']))
				{
				  $temporary=$row[$i];
				  $row[$i]=$row[$i+1];
				  $row[$i+1]=$temporary;
				}
			}
			}
			if(isset($temp)){
			for($j=0;$j<sizeof($temp)-1;$j++)
			{
			for($i=0;$i<sizeof($temp)-$j-1;$i++)
			{
				if(($temp[$i]['support']+$temp[$i]['oppose']+$temp[$i]['neutral'])<($temp[$i+1]['support']+$temp[$i+1]['oppose']+$temp[$i+1]['neutral']))
				{
				  $temporary=$temp[$i];
				  $temp[$i]=$temp[$i+1];
				  $temp[$i+1]=$temporary;
				}
			}
			}
			$row=array_merge($row,$temp);
			}
                $i=0;
                $j=0;
                $k=0.5;
				$z=0.75;
				
				
				
				
                for($no=0;$no<sizeof($row);$no++){
                    $i++;
                    $j--;
                    $k++;
					$z++;
					
					$type="";
			
			if($row[$no]['poli_id']!=NULL)
			{
				$type = "Politician";
			}
			else
			{
				$type = "";
			}
					
                    echo"<div class='col-sm-3'>
                         <div class='well'>
                         <p><B>$type</B><br>".$row[$no]['first']." ".$row[$no]['last']."</p>";
						 echo '<img src="data:image/jpeg;base64,'.base64_encode( $row[$no]['profile_pic'] ).'"class="img-circle" height="50" width="50" alt="Profile Pic" />';
                        //<img src="bird.jpg" class="img-circle" height="55" width="55" alt="Avatar">
                    echo"<p>".$row[$no]['modified_date']." ".$row[$no]['modified_time']."</p>
                         </div>
                         </div>";
				    if(!($row[$no]['image']!=null)&&!($row[$no]['speak']!=null)){
						echo"<div class='col-sm-9'>
                             <div class='well'>
                             <p>".$row[$no]['des']."</p>
							 <br><br><br><br>
							 <div class='om'>
							  <form action='policentraltemp.php?support=true' method='post'>
            <input type='hidden' value='".$row[$no]['support']."' id='".$i."' name='sup'>
            <input type='hidden' value='".$row[$no]['post_id']."' name='pid'>
            <img src='images/support.png' height='35'/><button type='submit' class='btn btn-success' onclick='return inc(".$i.")'>Support	<span class='badge'>".$row[$no]['support']."</span></button>
            </form></div>
			<div class='om'>
            <form action='policentraltemp.php?neutral=true' method='post'>
            <input type='hidden' value='".$row[$no]['neutral']."' id='".$k."' name='nut'>
            <input type='hidden' value='".$row[$no]['post_id']."' name='pid'>
            <img src='images/neutral.png' height='35'/><button type='submit' class='btn btn-warning' onclick='return neutral(".$k.")'>Neutral	<span class='badge'>".$row[$no]['neutral']."</span></button>
            </form></div>
			<div class='om'>
            <form action='policentraltemp.php?oppose=true' method='post'>
            <input type='hidden' value='".$row[$no]['oppose']."' id='".$j."' name='opp'>
            <input type='hidden' value='".$row[$no]['post_id']."' name='pid'>
            <img src='images/oppose.png' height='35'/><button type='submit' class='btn btn-danger' onclick='return dec(".$j.")'>Oppose	<span class='badge'>".$row[$no]['oppose']."</span></button>
            </form></div><br><br>
			<div class='om1'>
							 <form action='politemp.php?comment=true' method='post'>
                             <input type='hidden' value='".$row[$no]['post_id']."' name='pid'>
                             <img src='images/suggest.png' height='35'/><button type='submit' class='btn btn-default'>Suggests</button>
                             </form></div>
							 <div class='om1'>
							 <form name='f1'>
							 <input type='hidden' value='".$row[$no]['post_id']."' id='".$z."'>
                            <button type='button' class='btn btn-danger btn-md' data-toggle='modal' data-target='#myModal' onclick='myfunction(".$z.");'>Speak Up In Oppose</button>
                             </form></div>
           <div class='om1'>
			<button type='button' class=btn btn-basic '  data-toggle='collapse' data-target='#".$row[$no]['post_id']."'><span class='glyphicon glyphicon-stats'></span></button>
          </div>
		  <div id='".$row[$no]['post_id']."' class='collapse'><br>
             <br>";
		  
		  $r1=$row[$no]['support'];
$r2=$row[$no]['oppose'];
$r3=$row[$no]['neutral'];
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
                   else if(($row[$no]['image']!=null)&&!($row[$no]['speak']!=null)){
                        echo"<div class='col-sm-9'>
                             <div class='well'>
                             <p>".$row[$no]['des']."</p>
							 <div class='container'>
							 <div class='row'>
							 <div class='col-md-4'>
							 <div class='thumbnail'>";
						echo '<img src="data:image/jpeg;base64,'.base64_encode( $row[$no]['image'] ).'"alt="Your Posted Image" />';
                        echo"</div>
	                         </div>
	                         </div>
                             </div>";
					    echo"<div class='om'>
						<form action='policentraltemp.php?support=true' method='post'>
            <input type='hidden' value='".$row[$no]['support']."' id='".$i."' name='sup'>
            <input type='hidden' value='".$row[$no]['post_id']."' name='pid'>
            <img src='images/support.png' height='35'/><button type='submit' class='btn btn-success' onclick='return inc(".$i.")'>Support	<span class='badge'>".$row[$no]['support']."</span></button>
            </form></div>
			<div class='om'>
            <form action='policentraltemp.php?neutral=true' method='post'>
            <input type='hidden' value='".$row[$no]['neutral']."' id='".$k."' name='nut'>
            <input type='hidden' value='".$row[$no]['post_id']."' name='pid'>
            <img src='images/neutral.png' height='35'/><button type='submit' class='btn btn-warning' onclick='return neutral(".$k.")'>Neutral	<span class='badge'>".$row[$no]['neutral']."</span></button>
            </form></div>
			<div class='om'>
            <form action='policentraltemp.php?oppose=true' method='post'>
            <input type='hidden' value='".$row[$no]['oppose']."' id='".$j."' name='opp'>
            <input type='hidden' value='".$row[$no]['post_id']."' name='pid'>
            <img src='images/oppose.png' height='35'/><button type='submit' class='btn btn-danger' onclick='return dec(".$j.")'>Oppose	<span class='badge'>".$row[$no]['oppose']."</span></button>
            </form></div><br><br>
			<div class='om1'>
						<form action='politemp.php?comment=true' method='post'>
                             <input type='hidden' value='".$row[$no]['post_id']."' name='pid'>
                             <img src='images/suggest.png' height='35'/><button type='submit' class='btn btn-default'>Suggests</button>
                             </form></div>
							 <div class='om1'>
							 <form name='f1'>
							 <input type='hidden' value='".$row[$no]['post_id']."' id='".$z."'>
                            <button type='button' class='btn btn-danger btn-md' data-toggle='modal' data-target='#myModal' onclick='myfunction(".$z.");'>Speak Up In Oppose</button>
							</form></div>
            <div class='om1'>
			<button type='button' class=btn btn-basic '  data-toggle='collapse' data-target='#".$row[$no]['post_id']."'><span class='glyphicon glyphicon-stats'></span></button>
          </div>
		  <div id='".$row[$no]['post_id']."' class='collapse'><br>
             <br>";
		  
		  $r1=$row[$no]['support'];
$r2=$row[$no]['oppose'];
$r3=$row[$no]['neutral'];
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
					else if($row[$no]['speak']!=''){
					    echo"<div class='col-sm-9'>
                             <div class='well'>
                             <p>".$row[$no]['des']."</p>";
							 if($row[$no]['image']!=null){
							 echo"<div class='container'>
							 <div class='row'>
							 <div class='col-md-4'>
							 <div class='thumbnail'>";
						echo '<img src="data:image/jpeg;base64,'.base64_encode( $row[$no]['image'] ).'"alt="Your Posted Image" />';
                        echo"</div>
	                         </div>
	                         </div>
                             </div>";
							 }
						  $temp=$row[$no]['speak'];
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
		 <form action='policentraltemp.php?support=true' method='post'>
            <input type='hidden' value='".$row[$no]['support']."' id='".$i."' name='sup'>
            <input type='hidden' value='".$row[$no]['post_id']."' name='pid'>
            <img src='images/support.png' height='35'/><button type='submit' class='btn btn-success' onclick='return inc(".$i.")'>Support	<span class='badge'>".$row[$no]['support']."</span></button>
            </form></div>
			<div class='om'>
            <form action='policentraltemp.php?neutral=true' method='post'>
            <input type='hidden' value='".$row[$no]['neutral']."' id='".$k."' name='nut'>
            <input type='hidden' value='".$row[$no]['post_id']."' name='pid'>
            <img src='images/neutral.png' height='35'/><button type='submit' class='btn btn-warning' onclick='return neutral(".$k.")'>Neutral	<span class='badge'>".$row[$no]['neutral']."</span></button>
            </form></div>
			<div class='om'>
            <form action='policentraltemp.php?oppose=true' method='post'>
            <input type='hidden' value='".$row[$no]['oppose']."' id='".$j."' name='opp'>
            <input type='hidden' value='".$row[$no]['post_id']."' name='pid'>
            <img src='images/oppose.png' height='35'/><button type='submit' class='btn btn-danger' onclick='return dec(".$j.")'>Oppose	<span class='badge'>".$row[$no]['oppose']."</span></button>
            </form></div><br><br>
			<div class='om1'>
		 <form action='politemp.php?comment=true' method='post'>
                             <input type='hidden' value='".$row[$no]['post_id']."' name='pid'>
                             <img src='images/suggest.png' height='35'/><button type='submit' class='btn btn-default'>Suggests</button>
                             </form></div>
							 <div class='om'>
							 <form name='f1'>
							 <input type='hidden' value='".$row[$no]['post_id']."' id='".$z."'>
                            <button type='button' class='btn btn-danger btn-md' data-toggle='modal' data-target='#myModal' onclick='myfunction(".$z.");'>Speak Up In Oppose</button>
							</form></div>
            <div class='om'>
			<button type='button' class=btn btn-basic '  data-toggle='collapse' data-target='#".$row[$no]['post_id']."'><span class='glyphicon glyphicon-stats'></span></button>
       </div>
	   <div id='".$row[$no]['post_id']."' class='collapse'><br>
             <br>";
		  
		  $r1=$row[$no]['support'];
$r2=$row[$no]['oppose'];
$r3=$row[$no]['neutral'];
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
