<html>

<head>

    <style>

      

        

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



        /*body {*/
        /*margin: 0;*/
        /*padding: 0;*/
        /*background: #ccc;*/
        /*}*/
        /*@font-face {*/
        /*!*src: url("");*!*/
        /*!*font-weight:400;*!*/

        /*font-family: theboldfont;*/
        /*src: url('/fonts/theboldfont.ttf'); !* IE9 Compat Modes *!*/
        /*src: url('/fonts/got.ttf#iefix') format('embedded-opentype'), !* IE6-IE8 *!*/
        /*url('/fonts/theboldfont.woff') format('woff'), !* Modern Browsers *!*/
        /*url('/fonts/theboldfont.ttf')  format('truetype') !* Safari, Android, iOS *!*/
        /*!*, url('webfont.svg#svgFontName') format('svg'); !* Legacy iOS *!*!*/
        /*}*/

        /* CreativCSS */
        .navigation {
            padding-left: 0px !important;
            background: linear-gradient(to right,  #7FCEFF , #FFC56A);
        }

        .brand-logo {

            padding: 6px !important;
            margin-left: 10px !important;
            margin-right: 10px !important;
        }

        .navbar-inverse .navbar-nav > li > a {
            color: white !important;
            font-family: 'Raleway', sans-serif;
            letter-spacing: 3px;
            padding-left: 20px;
            transition: 0.4s all;
        }

        .navbar-inverse .navbar-nav > li > a:hover {
            color: black !important;
            font-family: 'Raleway', sans-serif;
            letter-spacing: 3px;
            background: !important;
            -webkit-box-shadow: -7px 11px 40px -12px rgba(148,148,148,1);
            -moz-box-shadow: -7px 11px 40px -12px rgba(148,148,148,1);
            box-shadow: -7px 11px 40px -12px rgba(148,148,148,1);
            transition: 0.4s all;
        }

        .search {
            border-radius: 40px !important;
        }

        .search-btn {
            border-radius: 40px !important;
            transition: 0.3s all;
        }

        .search-btn:hover {
            background-color: #36a1c1 !important;
            color: white !important;
            transition: 0.3s all;
        }
        /* CreativCSS End */

        header{
            position: fixed;
            width: 100%;
            box-shadow: 1px 1px 7px #4B546A;
            overflow: hidden;
        }



        .logo {
            position: relative !important;
            margin-left: 0px !important;
            height: 70px !important;
        }

        .navbar-toggle {
            background: white !important;
            border-color: white !important;
        }

        .navbar-toggle .icon-bar {
            background: green !important;
        }

        /*.navbar-header {
            background: linear-gradient(to right, #3399CC , #48DB6D);
        }*/

        .grad {
            height: 80px;
            background:  #7FCEFF ; /* For browsers that do not support gradients */
            background: -webkit-linear-gradient(left,  #7FCEFF , #FFC56A); /* For Safari 5.1 to 6.0 */
            background: -o-linear-gradient(right,  #7FCEFF , #FFC56A); /* For Opera 11.1 to 12.0 */
            background: -moz-linear-gradient(right, #7FCEFF , #FFC56A); /* For Firefox 3.6 to 15 */
            background: linear-gradient(to right,  #7FCEFF , #FFC56A); /* Standard syntax (must be last) */
        }
        .nav1 ul {
            list-style: none;
            /*background-color: #25acfe;*/
            /*text-align: center;*/
            padding: 0;
            /*margin: 0;*/
            margin-top: 0;
            margin-left: 22%;
        }
        .nav1 li {
            width: 14.35%;
            border-bottom: none;
            height: 75px;
            line-height: 75px;
            font-size: 1.9em;
            display: inline-block;
            margin-right: -4px;

        }

        .nav1 a {
            text-decoration: none;
            color: #ffffff;
            display: block;
            transition: .1s background-color;
            font-family: 'theboldfont', sans-serif;
            font-weight: bolder;
            text-align: center;
            /*float: left;*/
        }

        .nav1 a:hover {
            text-shadow: 0px 0px 12px #2d75ff;
        }

        .leftitems{
            /*float: left;*/

        }

        .rightitems{
            /*float: right;*/


        }




        .nav1 a.active {
            background-color: #fff;
            color: #444;
            cursor: default;
        }
        @font-face {
            font-family: TheBoldFont;
            src: url(/fonts/theboldfont.ttf);

        }

        @media screen and (min-width: 700px) {

            .nav1 li {

                width: 13.50%;
                border-bottom: none;
                height: 55px;
                line-height: 75px;
                font-size: 1.5em;
            }

            /* Option 1 - Display Inline */
            .nav1 li {
                display: inline-block;
                margin-right: -4px;
            }
            /*.nav li a{*/
            /*font-family: TheBoldFont;*/
            /*}*/
        }

        /*@media screen and (max-width: 700px) {*/

        /*.nav1 li {*/

        /*width: 14.35%;*/
        /*border-bottom: none;*/
        /*height: 55px;*/
        /*line-height: 55px;*/
        /*font-size: 1.7em;*/
        /*}*/

        /*!* Option 1 - Display Inline *!*/
        /*.nav1 li {*/
        /*display: inline-block;*/
        /*margin-right: -4px;*/

        /*}*/
        /*}*/




        .searchdiv{
            position: absolute;
            float: right;
            top: 22%;
            right: 3.4%;
            height: 80px;
            min-width: 250px;
            /*border: dotted;*/
        }

        .navsearch{
            /*position: absolute;*/
            /*!*margin-left: 93%;*!*/
            /*!*width: 100%;*!*/
            /*top: 0px;*/
            /*right: 5%;*/
            /*!*margin-right: 0px;*!*/
            /*float: right;*/
            /*padding: 0px;*/
            /*position: relative;*/
            display: inline-block;
        }

        .navsearch form input[type="text"] {
            padding: 6px;
            border: solid 1px #dcdcdc;
            transition: box-shadow 0.3s, border 0.3s;
            border-radius: 15px;
        }
        .navsearch form input[type="text"]:focus,
        .navsearch form input[type="text"].focus {
            border: solid 1px #2d75ff;
            box-shadow: 0 0 6px 1px #009693;
        }

        .search-button{
            background: url('/images/search.png') left center no-repeat;
            /*padding-left: 16px;*/
            /*margin-left: 50px;*/
            height: 45px;
            width: 45px;
            /*border: none;*/
            /*opacity: 0.5;*/
        }






        .navsearch button {
            display: inline-block;
            top: 0px;
            height: 45px;
            width: 45px;
            /*padding: 0px;*/
            margin: 0px;
            padding-left: 3px;
            vertical-align: middle;
            /*border: none;*/
            background-color: Transparent;
            border: none;
            cursor: pointer;

        }

        #close-image img {
            /*display: block;*/
            height: 35px;
            width: 35px;
        }



















        /*.nav_bar {*/
        /*width: 100%;  !* i'm assuming full width *!*/
        /*height: 10%; !* change it to desired width *!*/
        /*background-color: #00bbbb; !* change to desired color *!*/


        /*}*/
        .logo {

            display: inline-block;
            position: absolute;
            vertical-align: top;
            height: 70px;
            width: auto;
            margin-left: 10px;
            margin-right: 10px;
            margin-top: 5px;    /* if you want it vertically middle of the navbar. */
            /*margin-bottom: 5px;*/

        }

        .navimg{
            position: absolute;
            margin-left: 80%;
            /*width: 100%;*/
            top: 0px;
            /*margin-right: 0px;*/
            float: right;

        }
        .navimg ul{
            list-style: none;
            width: 200px;
            height: 40px;
            padding: 0;
            margin: 0;
            line-height: 55px;

        }
        .navimg li{
            display: inline-block;
            height: 40px;


        }
        .navimg img{
            height: 49px;
            margin-top: 3px;
            margin-right: 40px;
        }

        .navimg img:hover {
            background-color: #70edb1;
            cursor: pointer;

        }





        .dropbtn {
            background-image:url(/images/setting.png);
            /*background-color: #3ED57E;*/
            /*color: white;*/
            background-size: 55px 55px;
            width: 55px;
            height: 55px;
            /*color: transparent;*/
            /*padding: 16px;*/
            /*font-size: 16px;*/
            border: none;
            cursor: pointer;
        }

        .dropdown {
            position: absolute;
            /*margin-left: 93%;*/
            /*width: 100%;*/
            top: 0px;
            right: 0%;
            /*margin-right: 0px;*/
            float: right;

            /*position: relative;*/
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {background-color: #f1f1f1}

        .dropdown:hover .dropdown-content {
            display: block;
        }

        /*.dropdown:hover .dropbtn {*/
        /*background-color: #2F95A8;*/
        /*}*/





        .dropbtn2 {

            /*background-image:url(/images/noti.png);*/
            /*background-color: #3ED57E;*/
            /*color: white;*/
            background-size: 55px 55px;
            width: 55px;
            height: 55px;
            /*color: transparent;*/


            /*padding: 16px;*/
            /*font-size: 16px;*/
            border: none;
            cursor: pointer;
        }

        .dropdown2 {
            position: absolute;
            /*margin-left: 93%;*/
            /*width: 100%;*/
            top: 0px;
            right: 17%;
            /*margin-right: 0px;*/
            float: right;

            /*position: relative;*/
            display: inline-block;
        }

        .dropdown-content2 {
            display: none;
            position: absolute;
            right: 0;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        }

        .dropdown-content2 a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content2 a:hover {background-color: #f1f1f1}

        .dropdown2:hover .dropdown-content2 {
            display: block;
        }

        .dropdown2:hover .dropbtn2 {
            background-color: #2F95A8;
        }




        .namepic{
            position: absolute;
            /*margin-left: 93%;*/
            /*width: 100%;*/
            top: 0px;
            /*right: 5%;*/
            left: 84%;
            height: 55px;
            width: 150px;
            /*margin-right: 0px;*/
            float: right;

            /*position: relative;*/
            display: inline-block;

        }



        /*.search-button{*/
        /*background: url('/images/search.png') left center no-repeat;*/
        /*!*padding-left: 16px;*!*/
        /*height: 35px;*/
        /*width: 35px;*/
        /*!*border: none;*!*/
        /*!*opacity: 0.5;*!*/
        /*}*/






        /*.dropdown button {*/
        /*display: inline-block;*/
        /*top: 0px;*/
        /*height: 30px;*/
        /*width: 30px;*/
        /*padding: 0px;*/
        /*margin: 0;*/
        /*vertical-align: middle;*/
        /*!*border: none;*!*/
        /*background-color: Transparent;*/
        /*border: none;*/
        /*cursor: pointer;*/

        /*}*/
        .dropbtn{
            background: transparent;
        }

        #setting-image img {
            /*display: block;*/
            height: 45px;
            width: 45px;
        }

    </style>

</head>

<body>
    <nav class="navbar navbar-inverse navigation navbar-fixed-top  ">

        <div class="container-fluid">
            <a class="navbar-brand "><img src="images/logo with shadow.png"></a>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="homedemo.php">Home</a></li>
                    <li><a href="centraldemo.php" style="font-weight: bold; background-color: 	#7FCEFF;">Central</a></li>
                    <li><a href="statedemo.php">State</a></li>
                    <li><a href="localdemo.php">Local</a></li>
                </ul>

                <form class="navbar-form navbar-right" action="friends1.php" method="post" role="search">

                    <div class="form-group input-group">

                        <input type="text" class="form-control" name="find" placeholder="Search People..">

                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>

                        </div>

                    </div>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="user.php?khudka=true"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                    <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
                </ul>

            </div>
        </div>
    </nav>

</body>
</html>