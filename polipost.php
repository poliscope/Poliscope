<?php
session_start();
?>
<html>
<head>
<body>
<?php


$conn = mysqli_connect('localhost','root','','poliscope');
if(mysqli_connect_error())
{
    echo "Error in connecting to database: ".mysqli_connect_error();
}
else {

    $temp = "Select * from posts where politician_id='$_SESSION[pol]'";
    $result = mysqli_query($conn, $temp);
    $row = mysqli_fetch_assoc($result);

    if ($row['const_category'] == 'Central') {


    header("Location:policentraldemo.php");
}

if ($row['const_category'] == 'State') {
    header("Location:polistatedemo.php");
}
if ($row['const_category'] == 'Local') {
    header("Location:polilocaldemo.php");
}}

?>
</body>
</head>
</html>