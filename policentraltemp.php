<html>
<head>
</head>
<body>
<?php

session_start();
$pid=$_POST['pid'];
//echo $pid;
//$_SESSION['sp']=$pid;
$conn = mysqli_connect('localhost','root','','poliscope');
if(mysqli_connect_error())
{
    echo "Error in connecting to database: ".mysqli_connect_error();
}
else{
    if(!empty($_GET["neutral"])){
        //echo"Neutral<br/>";
        $checknut=0;
        $checknut1=0;
        $checknut2=0;
        $checknutfinal=0;
        $checknutfinal1=0;
        $checknutfinal2=0;
        $nut=$_POST['nut'];
        $sql="Select * from post_sup where post_id='$pid'";
        $result=mysqli_query($conn,$sql);



        while($row=mysqli_fetch_assoc($result)){
            if($row['poli_id']==$_SESSION['pol'])
            {
                if($row['neutral']=='y')
                    $checknut=1;
                if($row['support']=='y')
                    $checknut1=1;
                if($row['oppose']=='y')
                    $checknut2=1;
            }
        }
        if($checknut==1)
            header("Location:policentraldemo.php?checknut=true");
        if($checknut1==1){

            $sql1="UPDATE post_sup set support='n' where post_id='$pid' and poli_id='$_SESSION[pol]'";

            $sql3="UPDATE post_sup set neutral='y' where post_id='$pid' and poli_id='$_SESSION[pol]'";


            $sql4="Select * from post where post_id='$pid'";
            $result1=mysqli_query($conn,$sql4);
            $row1=mysqli_fetch_assoc($result1);
            $temp=$row1['support'];

            if($temp!=0)
                $temp=$temp-1;
            else
                echo"";

            $sql5="UPDATE post set support=$temp where post_id='$pid'";

            $sql6="UPDATE post set neutral=$nut where post_id='$pid'";
            if(mysqli_query($conn,$sql1)&&mysqli_query($conn,$sql3)&&mysqli_query($conn,$sql5)&&mysqli_query($conn,$sql6))
                $checknutfinal=1;
        }
        if($checknut2==1){
            $sql2="UPDATE post_sup set oppose='n' where post_id='$pid' and poli_id='$_SESSION[pol]'";
            $sql3="UPDATE post_sup set neutral='y' where post_id='$pid' and poli_id='$_SESSION[pol]'";
            $sql4="Select * from post where post_id='$pid'";
            $result1=mysqli_query($conn,$sql4);
            $row1=mysqli_fetch_assoc($result1);
            $temp1=$row1['oppose'];
            if($temp1!=0)
                $temp1=$temp1-1;
            else
                echo"";
            $sql5="UPDATE post set oppose=$temp1 where post_id='$pid'";
            $sql6="UPDATE post set neutral=$nut where post_id='$pid'";
            if(mysqli_query($conn,$sql2)&&mysqli_query($conn,$sql3)&&mysqli_query($conn,$sql5)&&mysqli_query($conn,$sql6))
                $checknutfinal1=1;
        }


        if($checknut!=1&&$checknut1!=1&&$checknut2!=1){
            $sql2="INSERT INTO post_sup(`post_id`,`poli_id`,`support`,`oppose`,`neutral`) VALUES('$pid','$_SESSION[pol]','n','n','y')";
            $sql6="UPDATE post set neutral='$nut' where post_id='$pid'";
            if(mysqli_query($conn,$sql2)&&mysqli_query($conn,$sql6))
                $checknutfinal2=1;
        }
        if($checknutfinal==1||$checknutfinal1==1||$checknutfinal2==1)
            header("Location:policentraldemo.php");
        else
            echo"Sorry!!! an error,please try again later!!";
    }



    if(!empty($_GET["oppose"])){
        //echo"Oppose<br/>";
        $check=0;
        $checknut=0;
        $check1=0;
        $check2=0;
        $newcheck=0;
        $checknutfinal=0;
        $opp=$_POST['opp'];
        $sql="Select * from post_sup where post_id='$pid'";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
            if($row['poli_id']==$_SESSION['pol'])
            {
                if($row['neutral']=='y')
                    $checknut=1;
                if($row['support']=='y')
                    $check=1;
                if($row['oppose']=='y')
                    $newcheck=1;
            }
        }
        if($newcheck==1)
            header("Location:policentraldemo.php?check=true");
        if($check==1){
            $sql1="UPDATE post_sup set support='n' where post_id='$pid' and poli_id='$_SESSION[pol]'";
            $sql2="UPDATE post_sup set oppose='y' where post_id='$pid' and poli_id='$_SESSION[pol]'";

            $sql3="Select * from post where post_id='$pid'";
            $result1=mysqli_query($conn,$sql3);
            $row1=mysqli_fetch_assoc($result1);
            $temp=$row1['support'];
            if($temp!=0)
                $temp=$temp-1;
            else
                echo"";
            $sql4="UPDATE post set support=$temp where post_id='$pid'";
            $newsql="UPDATE post set oppose=$opp where post_id='$pid'";

            if(mysqli_query($conn,$sql1)&&mysqli_query($conn,$sql2)&&mysqli_query($conn,$sql4)&&mysqli_query($conn,$newsql))
                $check1=1;
        }
        if($checknut==1){
            $sql2="UPDATE post_sup set oppose='y' where post_id='$pid' and poli_id='$_SESSION[pol]'";
            $sql9="UPDATE post_sup set neutral='n' where post_id='$pid' and poli_id='$_SESSION[pol]'";
            $sql3="Select * from post where post_id='$pid'";
            $result1=mysqli_query($conn,$sql3);
            $row1=mysqli_fetch_assoc($result1);
            $temp1=$row1['neutral'];
            if($temp1!=0)
                $temp1=$temp1-1;
            else
                echo"";
            $sql5="UPDATE post set neutral=$temp1 where post_id='$pid'";
            $newsql="UPDATE post set oppose=$opp where post_id='$pid'";
            if(mysqli_query($conn,$sql2)&&mysqli_query($conn,$sql9)&&mysqli_query($conn,$sql5)&&mysqli_query($conn,$newsql))
                $checknutfinal=1;
        }
        if($newcheck!=1&&$check!=1&&$checknut!=1)
        {
            $sql5="INSERT INTO post_sup(`post_id`,`poli_id`,`support`,`oppose`,`neutral`) VALUES('$pid','$_SESSION[pol]','n','y','n')";
            $sql6="UPDATE post set oppose='$opp' where post_id='$pid'";
            if(mysqli_query($conn,$sql5)&&mysqli_query($conn,$sql6))
                $check2=1;
        }
        if($check1==1||$check2==1||$checknutfinal==1)
            header("Location:policentraldemo.php");
        else
            echo"some error,please try again later!!";
    }


    if(!empty($_GET["support"])){
        //echo"support<br/>";
        $check3=0;
        $checknut=0;
        $check4=0;
        $check5=0;
        $newcheck1=0;
        $checknutfinal=0;
        $sup=$_POST['sup'];
        $sql7="Select * from post_sup where post_id='$pid'";
        $result2=mysqli_query($conn,$sql7);
        while($row2=mysqli_fetch_assoc($result2)){
            if($row2['poli_id']==$_SESSION['pol'])
            {
                if($row2['neutral']=='y')
                    $checknut=1;
                if($row2['oppose']=='y')
                    $check3=1;
                if($row2['support']=='y')
                    $newcheck1=1;
            }
        }
        if($newcheck1==1)
            header("Location:policentraldemo.php?check1=true");
        if($check3==1){
            $sql8="UPDATE post_sup set oppose='n' where post_id='$pid' and poli_id='$_SESSION[pol]'";
            $sql9="UPDATE post_sup set support='y' where post_id='$pid' and poli_id='$_SESSION[pol]'";
            $sql10="Select * from post where post_id='$pid'";
            $result3=mysqli_query($conn,$sql10);
            $row3=mysqli_fetch_assoc($result3);
            $temp=$row3['oppose'];
            if($temp!=0)
                $temp=$temp-1;
            else
                echo"";

            $sql11="UPDATE post set oppose='$temp' where post_id='$pid'";

            $newsql1="UPDATE post set support='$sup' where post_id='$pid'";
            if(mysqli_query($conn,$sql8)&&mysqli_query($conn,$sql9)&&mysqli_query($conn,$sql11)&&mysqli_query($conn,$newsql1))
                $check4=1;
        }
        if($checknut==1){
            $sql9="UPDATE post_sup set support='y' where post_id='$pid' and poli_id='$_SESSION[pol]'";
            $sql88="UPDATE post_sup set neutral='n' where post_id='$pid' and poli_id='$_SESSION[pol]'";
            $sql10="Select * from post where post_id='$pid'";
            $result3=mysqli_query($conn,$sql10);
            $row3=mysqli_fetch_assoc($result3);
            $temp1=$row3['neutral'];
            if($temp1!=0)
                $temp1=$temp1-1;
            else
                echo"";
            $sql20="UPDATE post set neutral='$temp1' where post_id='$pid'";
            $newsql1="UPDATE post set support=$sup where post_id='$pid'";
            if(mysqli_query($conn,$sql9)&&mysqli_query($conn,$sql20)&&mysqli_query($conn,$sql88)&&mysqli_query($conn,$newsql1))
                $checknutfinal=1;
        }
        if($newcheck1!=1&&$check3!=1&&$checknut!=1){
            $sql12="INSERT INTO post_sup(`post_id`,`poli_id`,`support`,`oppose`,`neutral`) VALUES('$pid','$_SESSION[pol]','y','n','n')";
            $sql13="UPDATE post set support=$sup where post_id='$pid'";
            if(mysqli_query($conn,$sql12)&&mysqli_query($conn,$sql13))
                $check5=1;
        }
        if($check4==1||$check5==1||$checknutfinal==1)
            header("Location:policentraldemo.php");
        else
            echo"some error,please try again later!!";
    }
}
?>
</body>
</html>