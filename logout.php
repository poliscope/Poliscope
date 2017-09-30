<?php
session_start();
$bool=session_destroy();
if($bool)
header("Location:index.php");
else echo "Could not found";
?>