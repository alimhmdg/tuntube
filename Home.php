<?php
session_start();
require_once 'database.php';
$db = new Database();
?>
<!DOCTYPE html>
<html>
<head>

    <style>

        #search {

        }


        #search input[type="text"] {
            background: url(images/Search-white.png) no-repeat 10px 6px #444;
            border: 0 none;
            font: bold 12px Arial,Helvetica,Sans-serif;
            color: #d7d7d7;
            width:150px;
            padding: 6px 15px 6px 35px;
            -webkit-border-radius: 20px;
            -moz-border-radius: 20px;
            border-radius: 20px;
            text-shadow: 0 2px 2px rgba(0, 0, 0, 0.3);
            -webkit-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.1), 0 1px 3px rgba(0, 0, 0, 0.2) inset;
            -moz-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.1), 0 1px 3px rgba(0, 0, 0, 0.2) inset;
            box-shadow: 0 1px 0 rgba(255, 255, 255, 0.1), 0 1px 3px rgba(0, 0, 0, 0.2) inset;
            -webkit-transition: all 0.7s ease 0s;
            -moz-transition: all 0.7s ease 0s;
            -o-transition: all 0.7s ease 0s;
            transition: all 0.7s ease 0s;
        }

        #search input[type="text"]:focus {
            background: url(search-dark.png) no-repeat 10px 6px #fcfcfc;
            color: #6a6f75;
            width: 200px;
            -webkit-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.1), 0 1px 0 rgba(0, 0, 0, 0.9) inset;
            -moz-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.1), 0 1px 0 rgba(0, 0, 0, 0.9) inset;
            box-shadow: 0 1px 0 rgba(255, 255, 255, 0.1), 0 1px 0 rgba(0, 0, 0, 0.9) inset;
            text-shadow: 0 2px 3px rgba(0, 0, 0, 0.1);
        }
        .home{
            display: inline;
            width: 19%;
            text-align: center;
            float: left;
            margin-bottom: 50px;
            box-shadow:5px 10px 5px #888888;
            padding: 10px 0;
            margin-right: 1%;
        }
        .home-top{
            width: 1090px;
            margin: 20px auto;
            border:2px solid #d9d9d9;
            padding: 0px 20px 10px;

        }



        .home a p{color: #3796d7;font-weight: bold;padding: 0 5px;text-align: left;}
        .home-top a p{color: #fff;font-weight: bold;background-color: #4890c1;margin-bottom: 20px;padding: 5px 10px;text-align: left;}
        fieldset.site_search {
    display: none;
    position:absolute;
    top:60px;
    right:110px;
    z-index:400;
    width:350px;
    padding:.5em .5em; 
    background: #E5EBF1;

        

}
fieldset.site_search input[type="text"] {
    
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box; 
    width:100%!important; 
    max-width:100%!important;
    padding:10px 13px;
    background:#fff; 
    outline:none;
    -moz-border-radius: 4px;
    border-radius: 8px;
    border: 1px solid #ddd;
    font-size:1em;
    margin:0 10px 0 0;

}


fieldset.site_search input[type="text"]:focus, fieldset.site_search textarea:focus {
    
    border:1px solid #26a69a;
    -moz-box-shadow: 0 3px 8px rgba(1,61,125,0.3);
    box-shadow: 0 3px 8px rgba(1,61,125,0.3);}

fieldset.site_search input[type="submit"] 
{
    text-decoration:none;
    display:inline-block; 
    *display:inline; 
    *zoom:1; 
    background: #009688;
    border: 0; 
    color: #fff!important; 
    line-height: 140%;
    font-size: 17px; 
    margin: 0 0 0 0;
    padding: .7em 2em;
    cursor: pointer;
    -moz-border-radius:4px; 
    border-radius:80px;
    margin-top: 4px;

}


fieldset.site_search input[type="submit"]:hover,fieldset.site_search input[type="submit"]:focus, fieldset.site_search input[type="submit"]:active {
    
    background: #26a69a;

}


    </style>
    <meta charset="utf-8">
    <meta name="author" content="Oussema Mesfar">
    <meta name="description" content="Get  Youtube subscribers Facebook Likes Twiter followers and Website visitors" >

    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/facicon.ico">


    <!-- my code -->
    <title> TUNTUBE </title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>
<!-- web body -->

<div id="container"></div>
<!-- main menu -->



<nav id="menu">

    <h1 id="logo">TUNTUBE</h1>

    <ul class="menu-all">

        <div class="site_sub_header">
            <div class="wrapper">
                <nav class="nav_secondary">
                    <!--<li class="menu-item" style="margin-right: 0;background:none;">

                        <form method="get" action="index.php" id="search">
                            <input name="t_search" type="text" size="40" placeholder="Search..." />
                            <input name ='search' style="display: none" value="search" type="submit" >
                        </form>
                    </li>-->
                    <li class="menu-item"> <a href="#">Search</a>
<fieldset class="site_search">
    <form method="get" action="index.php">
        <input type="text" placeholder="Type something to search..." name="t_search">
        <input class="btn-dark" type="submit" name="search" value="GO !">
                          </form>
		        </fieldset>
					      </li>
                </nav>
            </div>
        </div>

        <li class="menu-item"><a href="#">Contact</a></li>
        <li class="menu-item"><a href="#">Advert With Us</a></li>
        <li class="menu-item"><a href="index.php">Add Vidéo</a></li>
        <li class="menu-item"><a href="Home.php">Home</a></li>

    </ul>

</nav>

<?php
if(isset($_GET['search'])){
    include_once 'search.php';
}
?>



<?php
    $play = $db->Select_Query("Select * from embeded ORDER BY id DESC");
    if($play != null)
        {
            if(isset($_GET['num']))
            {
                $i = $_GET['num'] + 1;
                $L = $i + 10;
            }
            else
            {
               $i = 1;
               $L = 11;
            }
        ?>

<div style="text-align: center ;">
<div class="home-top">
            <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tuntube/embeded.php?vid=<?php echo $play[0]['code_link']; ?>" style="width: 100%;">
                <p><?php echo $play[0]['title']; ?></p>
                <img src="https://img.youtube.com/vi/<?php echo $play[0]['code_link']; ?>/hqdefault.jpg">
                
            </a>

</div>

</div>

<div class="clear"></div>

<br>

<div style="width: 1100px;margin: 15px auto;padding: 0px;" >

<?php 
$pn = count($play) / 10;
if(is_float($pn))
{
    $pn = intval($pn) + 1 ;
}
?>
    <nav>
        <ul style="list-style: none;">
            <?php for($p=0;$p<$pn;$p++)
            { 
                if($p == 0)
                {
                    $padd = "0px 10px";
                }
                else
                {
                    $padd = "0px 12px";
                }
            ?>
            
            <li style="display: inline;background-color: #fff;padding:<?php echo $padd; ?>;margin-right: 0;border: 1px solid #eee;">
                <a href="?page=Home&num=<?php echo $p * 10; ?>" style="color: #4890c1;font-size: 15px;font-weight: bold;"><?php echo $p+1; ?></a>
            </li>
                <?php
            } ?>
            
        </ul>
    </nav>
<?php

        for($i; $i < count($play);$i++)
        {
            if($i == $L)
            {
                break;
            }
            ?><div class="home">
            <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tuntube/embeded.php?vid=<?php echo $play[$i]['code_link']; ?>" style="width: 100%;">
                <img src="https://img.youtube.com/vi/<?php echo $play[$i]['code_link']; ?>/hqdefault.jpg" style="width: 100%;">
                <p><?php echo $play[$i]['title']; ?></p>
            </a>
            </div>

            <?php
        }
    }
    ?>
</div>
<div class="clear"></div>
<!-- footer -->
<section id="wsfooter">


    <div class="row1">
        <div class="col-3">
            <header class="tut-title">About TunTube</header>
            <p>Dear user, from this option you can add your Facebook page like's button on a video chosen from Youtube.Dear user, from this option you can add your Facebook page like's button on a video chosen from Youtube.Dear user, from this option you can add your Facebook page like's button on a video chosen from Youtube.Dear user, </p><br>

            <hr>


        </div>

        <div class="col-3 ">
            <header class="tut-title">How to use</header>
            <p>Dear user, to build your video you must first click on "ADD VIDEO" then chose your social media a press "START", filin the boxes with link of a video choosen from youtube and your social media link then wirte a title and upload a thumbnail and press "BUILD" wait some secondes then a link will appera copy it and share it to get fans. </p><br>



            <hr>

        </div>

        <div class="col-3">
            <header class="tut-title">Social Media</header>
            <ul class="sm1">
                <li class="sm2"><i class="fa fa-facebook-square" aria-hidden="true"></i></li>
                <li class="sm2"><i class="fa fa-youtube-square" aria-hidden="true"></i></li>
                <li class="sm2"><i class="fa fa-twitter-square" aria-hidden="true"></i></li>






            </ul>

            <hr>

        </div>
    </div>

    <div id="copy">Copyright © 2017 tuntube.com, By Mesfar Oussema. All rights reserved.</div>

</section>




<!-- script -->

<script src="http://code.jquery.com/jquery-3.2.1.js"></script>
<script src="js.js"></script>


</body>


</html>