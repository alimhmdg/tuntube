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
            width: 20%;
            text-align: center;
            float: left;
            margin-bottom: 50px;
        }
       .home a p{color: #222;font-weight: bold;}
        

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



   <br>
        <section id="button">
        <h1 class="h11">CHOOSE YOUR SOCIAL MEDIA</h1>
        
            
            
            <div class="row">
            <div class="col-fb col-left">
            <form action="index.php" method="get">
            <header class="tut-title">Facebook</header>
            <p>Dear user, from this option you can add your Facebook page like's button on a video chosen from Youtube. Visitors can play it only when they press "LIKE". So build your vidéo and share it to get more fans.</p><br>
            <footer><button class="cta1" type="submit" name="facebook" value="new-video">Start</button></footer>
            </form>
            </div>
                
            <div class="col-yt">
                <form action="index.php" method="get">
            <header class="tut-title">Youtube</header>
            <p>Dear user, from this option you can add your Youtube channel subscribe's button on a video chosen from Youtube. Visitors can play it only when they press "SUBSCRIBE". So build your vidéo and share it to get more fans.</p>
                <footer><button class="cta" type="submit" name="youtube" value="new-video">Start</button></footer>
                </form>
            </div>
               
            <div class="col-tw">
                <form action="index.php" method="get">
            <header class="tut-title">Twitter</header>
            <p>Dear user, from this option you can add your Twitter account follow's button on a video chosen from Youtube. Visitors can play it only when they press "FOLLOW". So build your vidéo and share it to get more fans.</p>
                <footer><button class="cta2" type="submit" name="twitter" value="new-video">Start</button></footer>
                </form>
            </div>
                
            <div class="col-wb">
                <form action="index.php" method="get">
            <header class="tut-title">WebSite</header>
            <p>Dear user, from this option you can add your Website visit button on a video chosen from Youtube. Visitors can play it only when they press "VISIT". So build your vidéo and share it to get more visitors.</p><br>
                <footer><button class="cta4" type="submit" name="website" value="new-video">Start</button></footer>
                </form>
            </div>
        </div>
        </section>
          <?php
          if(isset($_GET['facebook']))
                {
              $_SESSION['page'] = "facebook";
                    include 'new-video.php';
                }
             else if (isset($_GET['youtube'])){
              $_SESSION['page'] = "youtube";
                    include 'new-video.php';
             }
             else if(isset($_GET['website'])) {
             
              $_SESSION['page'] = "website";
                    include 'new-video.php';
                 
             }
             else if(isset($_GET['twitter'])){
                 
              $_SESSION['page'] = "twitter";
                    include 'new-video.php';
             }

                
                else 
                {
                    ?><div style="margin-top: 100px;"></div><?php
                }
          ?>

    <div style="width: 1100px;margin: 15px auto;padding: 0px;">        
   <?php
   /*$play = $db->Select_Query("Select * from embeded ORDER BY id DESC LIMIT 10");
   if($play != null){
       if(count($play) > 15)
       {
           $num = 15;
       }
       else 
       {
           $num = count($play);
       }
       for($i=0; $i < $num;$i++)
       {
           ?><div class="home">
           <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tuntube/embeded.php?vid=<?php echo $play[$i]['code_link']; ?>" style="width: 100%;">
               <img src="https://img.youtube.com/vi/<?php echo $play[$i]['code_link']; ?>/default.jpg">
               <p><?php echo $play[$i]['title']; ?></p>
           </a>
           </div>

           <?php
       }
   }
   */?>
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