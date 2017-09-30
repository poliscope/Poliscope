<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create/Update Politician Profile</title>
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
	function AjaxFunction()
{
var httpxml;
try
  {
  // Firefox, Opera 8.0+, Safari
  httpxml=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
		  try
   			 		{
   				 httpxml=new ActiveXObject("Msxml2.XMLHTTP");
    				}
  			catch (e)
    				{
    			try
      		{
      		httpxml=new ActiveXObject("Microsoft.XMLHTTP");
     		 }
    			catch (e)
      		{
      		alert("Your browser does not support AJAX!");
      		return false;
      		}
    		}
  }
function stateck() 
    {
    if(httpxml.readyState==4)
      {
//alert(httpxml.responseText);
var myarray = JSON.parse(httpxml.responseText);
// Remove the options from 2nd dropdown list 
for(j=document.f1.const.options.length-1;j>=0;j--)
{
document.f1.const.remove(j);
}


for (i=0;i<myarray.data.length;i++)
{
var optn = document.createElement("OPTION");
optn.text = myarray.data[i].name;
optn.value = myarray.data[i].name;  // You can change this to subcategory 
document.f1.const.options.add(optn);

} 
      }
    } // end of function stateck
	var url="dd.php";
var cat_name=document.getElementById('cc1').value;
url=url+"?cat_name="+cat_name;
url=url+"&sid="+Math.random();
httpxml.onreadystatechange=stateck;
//alert(url);
httpxml.open("GET",url,true);
httpxml.send(null);
  }
  
  
  function AjaxFunction1()
{
var httpxml;
try
  {
  // Firefox, Opera 8.0+, Safari
  httpxml=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
		  try
   			 		{
   				 httpxml=new ActiveXObject("Msxml2.XMLHTTP");
    				}
  			catch (e)
    				{
    			try
      		{
      		httpxml=new ActiveXObject("Microsoft.XMLHTTP");
     		 }
    			catch (e)
      		{
      		alert("Your browser does not support AJAX!");
      		return false;
      		}
    		}
  }
function stateck() 
    {
    if(httpxml.readyState==4)
      {
//alert(httpxml.responseText);
var myarray = JSON.parse(httpxml.responseText);
// Remove the options from 2nd dropdown list 
for(j=document.f1.const.options.length-1;j>=0;j--)
{
document.f1.const.remove(j);
}


for (i=0;i<myarray.data.length;i++)
{
var optn = document.createElement("OPTION");
optn.text = myarray.data[i].name;
optn.value = myarray.data[i].name;  // You can change this to subcategory 
document.f1.const.options.add(optn);

} 
      }
    } // end of function stateck
	var url="dd1.php";
var cat_name=document.getElementById('cc2').value;
url=url+"?cat_name="+cat_name;
url=url+"&sid="+Math.random();
httpxml.onreadystatechange=stateck;
//alert(url);
httpxml.open("GET",url,true);
httpxml.send(null);
  }
  function AjaxFunction2()
{
var httpxml;
try
  {
  // Firefox, Opera 8.0+, Safari
  httpxml=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
		  try
   			 		{
   				 httpxml=new ActiveXObject("Msxml2.XMLHTTP");
    				}
  			catch (e)
    				{
    			try
      		{
      		httpxml=new ActiveXObject("Microsoft.XMLHTTP");
     		 }
    			catch (e)
      		{
      		alert("Your browser does not support AJAX!");
      		return false;
      		}
    		}
  }
function stateck() 
    {
    if(httpxml.readyState==4)
      {
//alert(httpxml.responseText);
var myarray = JSON.parse(httpxml.responseText);
// Remove the options from 2nd dropdown list 
for(j=document.f1.const.options.length-1;j>=0;j--)
{
document.f1.const.remove(j);
}


for (i=0;i<myarray.data.length;i++)
{
var optn = document.createElement("OPTION");
optn.text = myarray.data[i].name;
optn.value = myarray.data[i].name;  // You can change this to subcategory 
document.f1.const.options.add(optn);

} 
      }
    } // end of function stateck
	var url="dd2.php";
var cat_name=document.getElementById('cc3').value;
url=url+"?cat_name="+cat_name;
url=url+"&sid="+Math.random();
httpxml.onreadystatechange=stateck;
//alert(url);
httpxml.open("GET",url,true);
httpxml.send(null);
  }
  </script>
</head>
<body>




<?php
echo"<br><br>";
session_start();
			if(isset($_SESSION['user']))
                                           {echo"";
										   }
else
                                        {
	                                     header('Location:index.php');
                                        }
$cconst=$_GET['cconst'];

 echo"<div class='container text-center'style='margin-top:50px'>   
 <h2>Political Details</h2>
  <div class='row'>
  <div class='col-sm-3' style='background-color:white;'></div>
  <div class='col-sm-6'>";




echo"<form action='polinsert.php' name='f1' method='post' enctype='multipart/form-data'>
     <div class='form-group'>";
	 if($cconst=='Local'){
      echo"<label for='sel1'>Select City </label>
           <select required class='form-control' id='cc1' onchange='AjaxFunction()'>
		   <option></option>
           <option>Mumbai</option>
           </select>";
	 }
     if($cconst=='State'){
      echo"<label for='sel1'>Select State</label>
           <select required class='form-control' id='cc2' onchange='AjaxFunction1()'>
		   <option></option>
           <option value='Maharashtra'>Maharashtra</option>
           </select>";
     }
     if($cconst=='Central'){
      echo"<label for='sel1'>Select State</label>
           <select required class='form-control' id='cc3' onchange='AjaxFunction2()'>
		   <option></option>
           <option value='Maharashtra'>Maharashtra</option>
           </select>";
    }
	echo"<label for='sel1'>Select Constituency</label>
         <select required class='form-control' name='const' id='c2'>
		 <option></option>
         </select><br>";
    echo"<button type='submit' class='btn btn-default'>Save</button>
	
         <a href='polidelete.php'><button type='button' class='btn btn-default'>Cancel</button></a>
	     </div>
		 </form>";
 ?>
    </div>
    </div>
    </div>
<?php include 'navbar.php';?>
    
</body>
</html>

