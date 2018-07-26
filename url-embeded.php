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
                <li class="menu-item"><a href="?page=new-video">Add Vidéo</a></li>
                <li class="menu-item"><a href="index.php">Home</a></li>
            
            </ul>
    
        </nav>

   <?php
   if(isset($_GET['search'])){
       include_once 'search.php';
   }
   ?>
     <?php
     if(isset($_SESSION['newurl']))
     {
         ?>
         <p style="padding: 10px;
background: #3fa83f;
margin: 20px auto;
margin-top: 70px;
margin-bottom: 0;
width: 85%;
color: #fff;
font-weight: bold;
line-height: 1.8;
text-align: center;
font-size: 20px;
">Video embeded Successfully : <a href="<?php echo $_SESSION['newurl'];?>" target="_blank" style="outline: 0;">Click Here</a></p>
         <?php
     }
     ?>
<!-- script -->
    
       <script src="http://code.jquery.com/jquery-3.2.1.js"></script>
        
        <script src="js.js"></script>
        
    </body>


</html>