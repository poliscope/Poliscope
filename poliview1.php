<?php
session_start();
?>
<html>
<head>
    <title>Poliscope</title>
    <link rel="stylesheet" type="text/css" href="css/user.css">

	
	<script>
	function inc(new i)
	{
		var x=parseInt(document.getElementById(newid).value);
	var y=x+1;
	document.getElementById(newid).value=y;
	}
	function dec(new i)
	{
		var x=parseInt(document.getElementById(newid).value);
	var y=x+1;
	document.getElementById(newid).value=y;
		
	}
	function neutral(new i)
	{
		var x=parseInt(document.getElementById(newid).value);
	var y=x+1;
	document.getElementById(newid).value=y;
	}
	
	
	</script>
</head>

<body>


<div id="container" style="width: 100%;">



    <div class="leftcol">
    </div>


    <div class='centercol'>

        <br><br>



        <br><br><br>
</div>


<?php include('navbar.php'); ?>
<div id="container" style="width: 100%;">
    <div class="left-col">
        <?php
        $_SESSION['polion']=1;
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
            else if((!empty($_GET["itself1"]))){
                $flag=1;
                $id=$_POST['supid'];
                $temp="Select * from users where user_id in(Select user_id from posts where politician_id='$id')";
                $result=mysqli_query($conn,$temp);
                $row = mysqli_fetch_assoc($result);
            }
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
            echo"<div class='propic morph pic' id='pro_pic'>";
            echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['profile'] ).'" width="175px" height="175px" alt="Profile Pic" />';
            echo"</div>


            <div class='linfo'>
                <div class='name'>
                    <h2>$row[first_name]"."   "."$row[last_name]</h2>
                </div>
                <div class='name'>
                    <h3>Gender: $row[gender]</h3>
                </div>
                <div class='name'>
                    <h3>Email-id:  $row[email]</h3>
                </div>
                <div class='name'>
                    <h3>State: $row[state]</h3>
                </div>
                <div class='name'>
                    <h3>City: $row[city]</h3>
                </div>
                <div class='address'>
                    <b>Address:</b><p>$row[address]</p>
                </div>
                <div class='bday'>
                    <h3>DOB: $row[dob]</h3>
                </div>
                <div class='edu'>
                    <h3>Qualification: $row[qualification]</h3>
                </div>
            </div>";


    $sql2="select * from posts where politician_id=$id";
            $result2=mysqli_query($conn,$sql2);
            $row2=mysqli_fetch_assoc($result2);
        echo"
        <div class='center-col'>
         <div class='coverpic' style='height:100%;'>
            ";
			echo '<img src="data:image/jpeg;base64,'.base64_encode( $row2['cover'] ).'"width="100%" height="220px" alt="Cover Pic" />';
       
            echo"</div><div>
                <h4>HISTORY:$row2[history]</h4>
            </div>
            <div>
			    <h4>CONSTITUENCY CATEGORY:$row2[const_category]</h4>
			</div>
            <div>
                <h4>CONSTITUENCY:$row2[const]</h4>
            </div>
            
			
			<div>
                <h4>Interests:";
            if($row2['interest1']!='null')
                echo "$row2[interest1]"."  ";
			
            if($row2['interest2']!='null')
                echo "$row2[interest2]"."  ";
            if($row2['interest3']!='null')
                echo "$row2[interest3]"."  ";

            if($row2['interest4']!='null')
                echo "$row2[interest4]"."  ";

			
           echo"
            </div>
            
            <div>
             ";







				$temp3="select * from posts  where politician_id=$id";
				$tempr3=mysqli_query($conn,$temp3);
				if(mysqli_num_rows($tempr3)>0) {
                    $temprow3 = mysqli_fetch_assoc($tempr3);

                    echo"<form action='polipost.php' method='post' name='f2'>
                
				<input type='submit' value='post $temprow3[const_category]' name='polipost' method='post'>
				
				</form>
				";
				}



echo"

         </div>
            <div>";
               echo" <a href='poliupdate.php' class='button'>Edit Info</a>
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
				echo"</form>";
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
            echo"
 <form action='poliview.php?itself1=true' method='post'>
<input type='hidden' value='$id' name='supid'> 
 <input type='submit' value='Supporters $num' name='supporters'>
 </form>
            </div>
            </div>";
            if($_SERVER["REQUEST_METHOD"]=="POST"&&$flag==1) {
                $supporter=$_POST['supporters'];
                if(isset($supporter)){
                    $sql5="select * from support as s inner join users as u where s.userid=u.user_id and s.supid='$id'";
                    $result5=mysqli_query($conn,$sql5);
                    if(mysqli_num_rows($result5)>0){
                        while($row5=mysqli_fetch_assoc($result5))
                        {
                            echo"<div class='propic morph pic' id='pro_pic'>";
                            echo '<img src="data:image/jpeg;base64,'.base64_encode( $row5['profile'] ).'" width="175px" height="175px" alt="Profile Pic" />';
                            echo"<h3>$row5[first_name] $row5[last_name]<h3>
							</div>";
                        }
                    }
                    else echo"";
                }
            }
            else echo"";
			echo"</div>";
			}
        ?>


        <div class="centercol">
          <a href="user.php?khudka=true">View User's Profile</a>
		  <?php
		  $conn = mysqli_connect('localhost','root','','poliscope');
        if(mysqli_connect_error())
        {
            echo "Error in connecting to database: ".mysqli_connect_error();
        }
        else{
		  $temp5 = "select * from post where poli_id='$id'";
            $tempr5 = mysqli_query($conn, $temp5);
                if (mysqli_num_rows($tempr5) > 0) {
                    $i=0;
                    $j=0;
                    $k=0.5;
                    while ($temprow5= mysqli_fetch_assoc($tempr5)) {
                        $i++;
                        $j--;
                        $k++;
                        echo "<div>";
                        if ($temprow5['image'] != null)
                            echo '<img src="data:image/jpeg;base64,' . base64_encode($temprow5['image']) . '"width="100%" height="220px" alt="Cover Pic" >';
                        else
                            echo "";
                        if ($temprow5['name'] != 'null')
                            echo "$temprow5[name]<br/>";
                        else
                            echo "";


                        echo "$temprow5[first] $temprow5[last] $temprow5[des]
                        $temprow5[modified_date] $temprow5[modified_time]
               </div><br/>
               
";
echo"                <div style='width: 90%; margin-left: 5%; margin-right:5% ; display: inline-block'>
                       
                                <div style='float: left'>
                               <form action='politemp.php?support=true' method='post'>
                               <input type='hidden' value='$temprow5[support]' id='".$i."' name='sup'>
                               <input type='hidden' value='$temprow5[post_id]' name='pid'>
                               <input type='submit' value='Support $temprow5[support]' onclick='return inc(".$i.")'>
                               </form></div>
                               
                               <div style='float: left'>
                                <form action='politemp.php?neutral=true' method='post'>
                               <input type='hidden' value='$temprow5[neutral]' id='".$k."' name='nut'>
                               <input type='hidden' value='$temprow5[post_id]' name='pid'>
                               <input type='submit' value='NEUTRAL $temprow5[neutral]' onclick='return neutral(".$k.")'>
                               </form></div>
                               
                               <div style='float: left'>
                               <form action='politemp.php?oppose=true' method='post'>
                               <input type='hidden' value='$temprow5[oppose]' id='".$j."' name='opp'>
                               <input type='hidden' value='$temprow5[post_id]' name='pid'>
                               <input type='submit' value='Oppose $temprow5[oppose]' onclick='return dec(".$j.")'>
                                </form>
                                </div>
                                
                                
                                
                               <div style='float: right'>
                               <form action='polipost.php?comment=true' method='post'>
                               <input type='hidden' value='$temprow5[post_id]' name='pid'>
                               <input type='submit' value='SUGGEST '>
                               </form></div>
                               
                              
                               <div style='float: right'> 
                               <form action='polipost.php?speak=true' method='post'>
                                <input type='hidden' value='$temprow5[post_id]' name='pid'>
                               <input type='submit' value='SPEAKUP'>
                               </form></div>
                               
                               </div>
                               
                               <hr/>
							   ";
}
                }
		}
				?>
        </div>
		<div class="rightcol">
<?php
				  $conn=mysqli_connect("localhost","root","","poliscope");
                  if(mysqli_connect_error())
	              {
		           echo "Error in connecting to database: ".mysqli_connect_error();
	              }
	             else{
					 $tempql="select * from post where poli_id='$id'";
				   $tempqlr=mysqli_query($conn,$tempql);
				   if(mysqli_num_rows($tempqlr)>0){
					   $gold=0;
				       $silver=0;
				       $bronze=0;
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
					   if($gold>0){
						   echo"<img src='gold.jpg' height='250' width='250' alt='gold medal'/>";
						   echo"<h3>".$gold."</h3>";
					   }
					   if($silver>0){
						   echo"<img src='silver.jpg' height='250' width='250' alt='silver medal'/>";
						   echo"<h3>".$silver."</h3>";
					   }
					   if($bronze>0){
						   echo"<img src='bronze.jpg' height='250' width='250' alt='bronze medal'/>";
						   echo"<h3>".$bronze."</h3>";
					   }
				   }
				   else echo "";
				 }
				 ?>
			</div>

    </div>

    <?php include('navbar.php'); ?>



</body>


</html>