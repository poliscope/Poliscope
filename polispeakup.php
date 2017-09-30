<html>
<head>
    <title>Poliscope</title>

    <link rel="stylesheet" type="text/css" href="css/user.css">
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    <meta charset=utf-8 />
    <script>
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
        function inc(){
            var x=parseInt(document.getElementById('sup').value);
            var y=x+1;
            document.getElementById('sup').value=y;
        }
        function dec(){
            var x=parseInt(document.getElementById('opp').value);
            var y=x+1;
            document.getElementById('opp').value=y;
        }
        function neutral(){
            var x=parseInt(document.getElementById('nut').value);
            var y=x+1;
            document.getElementById('nut').value=y;
        }

    </script>
</head>

<body>
<?php
session_start();
			if(isset($_SESSION['user']))
                                           {echo"";
										   }
else
                                        {
	                                     header('Location:index.php');
                                        }
										?>
<div id="container" style="width: 100%;">
    <div class="rightcol">
    </div>
    <div class="leftcol">
    </div>
    <div class='centercol'>
      

        <table>
            <form action="polispeakcheck.php" method="post" enctype="multipart/form-data">
                <tr>
                    <!--                        <td>Description:</td>-->
                    <td><textarea cols="87" rows="5" Placeholder="Whats in your mind?" name="des" value="null"></textarea></td>
                </tr>

                <tr>
                    <!--                        <td><b>Image:</b></td>-->
                    <td colspan="2" align="left"><input type='file' name="image" onchange="readURL(this);" style="padding:8px 10px;"/><br/>
                        <img id="blah" src="#" alt="your image"/></td>
                </tr>
                <tr>
                    <!--                        <td>Audio or Video</td>-->
                    <td><input type="file" name="fileToUpload"/></td>
                </tr>
                <tr>
                    <td colspan="2" align="right"><input type="submit" value="Post" style="padding:10px 80px;"></td>
                </tr>
            </form>
        </table>
    </div>
    <?php include('navbar.php'); ?>


</body>


</html>