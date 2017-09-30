<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default">

<div class="navbar-header ">
            <img class="logo navbar-brand" src="images/logo2.png">
        </div>
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Poliscope</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href='homedemo.php'>HOME</a></li>
                <li><a href='centraldemo.php'>CENTRAL</a></li>
                <li><a href='statedemo.php'>STATE</a></li>
                <li><a href='localdemo.php'>LOCAL</a></li>
                <li><a href='user.php?khudka=true'>PROFILE</a></li>
    </ul>
  </div>
   <div class="rightitems">


        <div class="searchdiv">
            <div class="navsearch">
                <form action="friends1.php" method="post">
                    <input type="text" name="find">
                    <!--                    <input type="submit" class="search-button" value="">-->
                    <button id="close-image"><img src="images/search.png"></button>
                </form>
            </div>
        </div>

</nav>
  
<div class="container">
  <h3>Basic Navbar Example</h3>
  <p>A navigation bar is a navigation header that is placed at the top of the page.</p>
</div>

</body>
</html>
