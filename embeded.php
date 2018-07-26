<?php
session_start();
require_once 'database.php';
$db = new Database();
$found = TRUE;
if(isset($_GET['vid']))
{
 //   var_dump($_GET['vid']);
    $where = array("code_link" => $_GET['vid']);
   $allvideos = $db->Select("embeded","",$where);
   
   if(empty($allvideos)){$found = FALSE;}
   $id = $allvideos[0]['id'];
   $query = "select * from embeded where id != $id";
   $playlist = $db->Select_Query($query);
}
else 
{
$allvideos = $db->Select("embeded");
}
?>
<html>
<head>

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
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

    </style>
</head>

    
    <body>
        <nav id="menu" style="position: absolute;top: 0;">
    
            <h1 id="logo" style="line-height: 20px;">TUNTUBE</h1>
                
                  <ul class="menu-all">
                       
                       <div class="site_sub_header">
		<div class="wrapper">
  			<nav class="nav_secondary">


                <!--<li class="menu-item" style="margin-right: 0;background:none;">


                    <form method="get" action="index.php" id="search">
                        <input name="t_search" type="text" size="40" style="height: 25px;" placeholder="Search..." />
                        <input name ='search' style="display: none;" value="search" type="submit" >
                    </form> </li>-->
                        <li class="menu-item"> <a href="#" style="text-decoration: none;color: #fff;">Search</a>
<fieldset class="site_search">
    <form method="get" action="index.php">
        <input style="color: #333;" type="text" placeholder="Type something to search..." name="t_search">
        <input class="btn-dark" type="submit" name="search" value="GO !">
                          </form>
		        </fieldset>
					      </li>
                        </nav>
		</div>
                           </div>
                      
                      <li class="menu-item"><a href="#" style="text-decoration: none;color: #fff;">Contact</a></li> 
                <li class="menu-item"><a href="#" style="text-decoration: none;color: #fff;">Advert With Us</a></li>
                <li class="menu-item"><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/tuntube/index.php" style="text-decoration: none;color: #fff;">Add Vidéo</a></li>
                <li class="menu-item"><a href="Home.php" style="text-decoration: none;color: #fff;">Home</a></li>
            
            </ul>
    
        </nav>
<section style="width: 90%; margin: 3% 5%;margin-top: 100px;">
    <?php
    if($found == TRUE)
    {
    ?>
    <div style="width: 60%;margin-right: 10%;float: left;" class="infointro">
        
        <?php
        if(count($allvideos) > 0)
        {
            ////////////////////////////////
            
            $_SESSION['page_id'] = $allvideos[0]['page_id'];
                $_SESSION['code'] =$allvideos[0]['code_link'] ;
  
            //         var_dump($_SESSION);
 //           var_dump($allvideos[0]);
            if ($allvideos[0]['page'] == "facebook")
               {
 
                    if(isset($_SESSION['Liked'])){
                        
                        if($_SESSION['Liked'] == 1){
                            
                            unset($_SESSION['Liked']);
                            session_destroy();
                            ?>
                        <iframe src="https://www.youtube.com/embed/<?php echo $allvideos[0]['code_link']; ?>"  frameborder="0" style= "width:100%;height:400px;" allowfullscreen></iframe>
                
                   <?php }
                   else{
                       $src= "https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2F".$allvideos[0]['page_id_id']."&tabs=timeline&width=400px&height=400px&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=485739368288596"; 
                       echo ' <iframe src="'.$src.'"width="400px" height="400px" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true">';       
                       ?>
                        <!--div style="text-align: center;"><iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2F"."&tabs=timeline&width=400px&height=400px&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=485739368288596" width="400px" height="400px" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe></div-->
                        
                <a href="flogin.php" class="btn btn-primary btn-lg btn-block" style="background: red;">Play Video</a>
                 <?php      
                    }
                    
                   }
                
                else
                {
                        $src= "https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2F".$allvideos[0]['page_id_id']."&tabs=timeline&width=400px&height=400px&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=485739368288596"; 
                        echo ' <iframe src="'.$src.'"width="400px" height="400px" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true">';       
                   ?>
                       
                <!--div style="text-align: center;"><iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FMy-way-to-paradise-624110947701041&tabs=timeline&width=400px&height=400px&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=485739368288596" width="400px" height="400px" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe></div-->
                <a href="flogin.php" class="btn btn-primary btn-lg btn-block" style="background: red;">Play Video</a>       
                <?php }
                
                }
                
            else if ($allvideos[0]['page'] == "youtube"){
                    if(isset($_SESSION['subscribed'])){
                        
                        if($_SESSION['subscribed'] == 1){
                            unset($_SESSION['subscribed']);
                        session_destroy();

                            $_SESSION['code'] =  $allvideos[0]['code_link'] ;         
                            ?>
                        <iframe src="https://www.youtube.com/embed/<?php echo $allvideos[0]['code_link']; ?>"  frameborder="0" style= "width:100%;height:400px;" allowfullscreen></iframe>
                
                   <?php }
                   else{?>
                        <!--iframe src="https://www.youtube.com/embed/<?php echo $allvideos[0]['code_link']; ?>"  frameborder="0" style= "width:100%;height:400px;" allowfullscreen></iframe-->
                       <div style=" background: url('https://img.youtube.com/vi/<?php echo $allvideos[0]['code_link']; ?>/hqdefault.jpg');background-size: cover;height: 550px;">
                           <a href="subscribe.php" class="btn btn-primary btn-lg btn-block"  style=" background: red; position: absolute; width: 400px;  margin-top: 180px; margin-left: 150px;">subscribe</a>
                       </div>
                 <?php      
                    }
                    
                   }
                
                else
                {?>
                       
        <!--iframe src="https://www.youtube.com/embed/<?php echo $allvideos[0]['code_link']; ?>"  frameborder="0" style= "width:100%;height:400px;" allowfullscreen></iframe-->
                    <div style=" background: url('https://img.youtube.com/vi/<?php echo $allvideos[0]['code_link']; ?>/hqdefault.jpg');background-size: cover;height: 550px;">
                        <a href="subscribe.php" class="btn btn-primary btn-lg btn-block"  style=" background: red; position: absolute; width: 400px;  margin-top: 180px; margin-left: 150px;">subscribe</a>
                    </div>
                <?php }
                 
            }
            else if ($allvideos[0]['page'] == "twitter"){
                    if(isset($_SESSION['followed'])){
                        
                        if($_SESSION['followed'] == 1){
                        unset($_SESSION['followed']);
                        session_destroy();
                        
                            $_SESSION['code'] =  $allvideos[0]['code_link'] ;?>
                        <iframe src="https://www.youtube.com/embed/<?php echo $allvideos[0]['code_link']; ?>"  frameborder="0" style= "width:100%;height:400px;" allowfullscreen></iframe>
                
                   <?php }
                   else{?>
                        <!--iframe src="https://www.youtube.com/embed/<?php echo $allvideos[0]['code_link']; ?>"  frameborder="0" style= "width:100%;height:400px;" allowfullscreen></iframe-->

                       <div style=" background: url('https://img.youtube.com/vi/<?php echo $allvideos[0]['code_link']; ?>/hqdefault.jpg');background-size: cover;height: 550px;">
                           <a href="tw-index.php" class="btn btn-primary btn-lg btn-block"  style=" background: red; position: absolute; width: 400px;  margin-top: 180px; margin-left: 150px;">Follow</a>
                       </div>
                       <?php
                    }
                    
                   }
                
                else
                {?>
                       
        <!--iframe src="https://www.youtube.com/embed/<?//php echo $allvideos[0]['code_link']; ?>"  frameborder="0" style= "width:100%;height:400px;" allowfullscreen></iframe-->
                    <div style=" background: url('https://img.youtube.com/vi/<?php echo $allvideos[0]['code_link']; ?>/hqdefault.jpg');background-size: cover;height: 550px;">
                        <a href="tw-index.php" class="btn btn-primary btn-lg btn-block"  style=" background: red; position: absolute; width: 400px;  margin-top: 180px; margin-left: 150px;">Follow</a>
                    </div>
                <?php }
                 
            }
            
            else if ($allvideos[0]['page'] == "website"){
                    if(isset($_SESSION['visit'])){
                                
                        if($_SESSION['visit'] == 1){
                            unset($_SESSION['visit']);
                            session_destroy();
                           $_SESSION['code'] = $allvideos[0]['code_link'];
                    ?>
                        <iframe src="https://www.youtube.com/embed/<?php echo $allvideos[0]['code_link']; ?>"  frameborder="0" style= "width:100%;height:400px;" allowfullscreen></iframe>
                
                   <?php }
                   else{?>
        <div style=" background: url('https://img.youtube.com/vi/<?php echo $allvideos[0]['code_link']; ?>/hqdefault.jpg');background-size: cover;height: 550px;">
        <button onclick="<?php
                        $link1 = 'http://'.$_SERVER['HTTP_HOST'].'/tuntube/embeded.php?vid='.$_SESSION['code'];
                        $link2 = $_SESSION['page_id'];
                        $_SESSION['visit'] = 1;
                        ?>
                            var link1 = '<?php echo $link1;?>';
                            var link2 = '<?php echo $link2;?>';
                            var open_link_google = window.open('','_parent');
                            open_link_google.location= link1;
                            var open_link_yahoo = window.open('','_blank');
                            open_link_yahoo.location= link2;"
                            class="btn btn-primary btn-lg btn-block" style=" background: red; position: absolute; width: 400px;  margin-top: 180px; margin-left: 150px;">visit
        </button></div>
                   <?php      
                   }}
                    
                   
            
            
                else
                {?>
                    <div style=" background: url('https://img.youtube.com/vi/<?php echo $allvideos[0]['code_link']; ?>/hqdefault.jpg');background-size: cover;height: 550px;">
                        <button onclick="<?php
                        $_SESSION['visit'] = 1;
                        $link1 = 'http://'.$_SERVER['HTTP_HOST'].'/tuntube/embeded.php?vid='.$_SESSION['code'];
                        $link2 = $_SESSION['page_id'];
                        ?>
                                var link1 = '<?php echo $link1;?>';
                                var link2 = '<?php echo $link2;?>';
                                var open_link_google = window.open('','_parent');
                                open_link_google.location= link1;
                                var open_link_yahoo = window.open('','_blank');
                                open_link_yahoo.location= link2;"
                                class="btn btn-primary btn-lg btn-block" style=" background: red; position: absolute; width: 400px;  margin-top: 180px; margin-left: 150px;">visit
                        </button></div>
                <?php }
                 
            }
            
        }
               
                
            ////////////////////////////////
            
        
        else
        {
            ?><p style="color: #333;font-weight: bold;text-align: center;">No Videos Embeded Untile Now</p><?php 
        }
        ?>
    </div>
    <div style="width: 30%;float: left;">
        <?php
        if($_GET['vid'])
        {
        if(count($playlist) > 0)
        {
            for($i=0; $i < count($playlist);$i++)
            {
                ?><div class="playlist">
            <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tuntube/embeded.php?vid=<?php echo $playlist[$i]['code_link']; ?>" style="width: 100%;">
                <img src="https://img.youtube.com/vi/<?php echo $playlist[$i]['code_link']; ?>/hqdefault.jpg">
                <p><?php echo $playlist[$i]['title']; ?></p>
            </a>
        </div><?php
            }
        }
        else
        {
            ?><p style="color: #333;font-weight: bold;text-align: center;">No Videos Embeded Untile Now</p><?php 
        }  
        }
        else
        {
        if(count($allvideos) > 1)
        {
            for($i=1; $i < count($allvideos);$i++)
            {
                ?><div class="playlist">
                    <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tuntube/embeded.php?vid=<?php echo $allvideos[$i]['code_link']; ?>" style="width: 100%;">
                <img src="https://img.youtube.com/vi/<?php echo $allvideos[$i]['code_link']; ?>/hqdefault.jpg">
                <p><?php echo $allvideos[$i]['title']; ?></p>
            </a>
        </div><?php
            }
        }
        else
        {
            ?><p style="color: #333;font-weight: bold;text-align: center;">No Videos Embeded Untile Now</p><?php 
        }
        }
        
        ?>
    </div>
       <?php
    }
 else {
     ?><p style="text-align: center;
font-weight: bold;
font-size: 30px;
font-family: Arial;
"><span style="
    display: block;
    color: red;
    font-weight: bold;
    font-family: Tahoma;
    margin-bottom: 15px;">Oops</span>This Video Not Found</p><?php   
    }
    $false = TRUE;
       ?>
</section>
        <div class="clear"></div><br>
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
           
       <script src="http://code.jquery.com/jquery-3.2.1.js"></script>
        
         <script src="js.js"></script>
        
    </body>


</html>