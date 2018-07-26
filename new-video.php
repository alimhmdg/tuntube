<?php
require_once 'database.php';

$db = new Database();
function get_page($url){
  
    $arr = explode("/", $url);
    if(count($arr) == 1){
        $page_name = $url ; 
    }
    
    else{
    $arr2 = explode('.', $arr[2]);
    
    if(in_array('facebook', $arr2) == TRUE){
    $page_name = $arr[3];
    
    }
    else if(in_array('twitter', $arr2) == TRUE){
    $page_name = $arr[3];

    }
    else if(in_array('youtube', $arr2) == TRUE){
    $page_name = $arr[4];
    
    }
    else{
    $page_name = $url ;
    
    }
    }
return $page_name;
}

if(isset($_POST['build']) and $_POST['build'] == "build")
{
    $url = $_POST['video_link'];
    $match;
    if(preg_match("/(youtube.com|youtu.be)\/(watch)?(\?v=)?(\S+)?/", $url, $match)){    
   $data['page'] = $_SESSION['page'];
   $data['video_link'] =  $_POST['video_link'];
   $data['page_link']  =  $_POST['page_link'];
   $data['title']      =  $_POST['title'];
   $code = substr($_POST['video_link'],32);
   $data['code_link']       =  $code ;
   if($_SESSION['page']=='facebook'){
   $data['page_id'] = $_POST['page_Name'];
   $data['page_id_id'] = get_page($data['page_link']);
   }
   else{
       $data['page_id'] = get_page($data['page_link']);
   }
   $check = $db->Add("embeded",$data);
   }
   else
    {
       header("location:404.php");
    }
    //
   //$_SESSION['page_id'] = get_page($data['page_link']) ;
   
   if($check == TRUE)
   {
       $_SESSION["loading"] = "http://".$_SERVER['HTTP_HOST']."/tuntube/embeded.php?vid".$code;
   }
   else
   {
       header("location:404.php");
   }
   
}
?>
<?php

if($_SESSION['page'] == 'facebook'){
    $var = '<label for="Facebook-Link"> Page Link :</label> 
 <input id="Facebook-Link" class="input" name="page_link" type="text" placeholder="www.facebook.com/tuntube.com/" size="30"><br>
           ';
}
else if($_SESSION['page'] == 'youtube'){
    $var = '<label for="Facebook-Link"> Channal Link :</label> 
 <input id="Facebook-Link" class="input" name="page_link" type="text" placeholder="www.youtube.com/channals/channal-id" size="30"><br>
           ';
}
else if($_SESSION['page'] == 'twitter'){
    $var = '<label for="Facebook-Link"> Twitter Link :</label> 
 <input id="Facebook-Link" class="input" name="page_link" type="text" placeholder="www.twitter.com/screen-name" size="30"><br>
           ';
}
else if($_SESSION['page'] == 'website'){
    $var = '<label for="Facebook-Link"> Website Url:</label> 
 <input id="Facebook-Link" class="input" name="page_link" type="text" placeholder="www.tuntube.com" size="30"><br>
           ';
}



?>
    

<section id="startingSM">

    <h1 class="h111">Let's build the vidéo with <?php echo $_SESSION['page'];?></h1>
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
              unset($_SESSION['newurl']);
     }
     ?>
    <div class="box">
        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">

            <label for="Video-Link">Vidéo Link : </label>
            <input required id="Video-Link" class="input" name="video_link" type="text" placeholder="www.youtube.com/watch/tuntube" size="30"><br>
            <?php echo $var;
            if($_SESSION['page']=='facebook'){
            echo'<label for="Facebook-Link"> Page Name :</label>
            <input id="Facebook-Page" class="input" name="page_Name" type="text" placeholder="Page Name" size="30" required="required"><br>';
                } ?>
            <label for="Title">Title : </label>
            <input required id="Title" class="input" name="title" type="text" placeholder="My vidéo in TUNTUBE" size="30"><br>
            
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <?php
        if(isset($_SESSION["loading"]))
        {
                   ?>
<div id="loader" class="cssload-loader" style="margin: 50px 0;">
    <div style="margin-top: 30px;"></div>
            <div style="margin-top: 30px;"></div>
            <div style="margin-top: 30px;"></div>
            <div style="margin-top: 30px;"></div>
            <div style="margin-top: 30px;"></div>
        </div>
        <?php
        $_SESSION['newurl'] = $_SESSION['loading'];
        unset($_SESSION["loading"]);
        $pp = $_SESSION['page'];
        header("refresh:3;url=?$pp=new-video");
        
        }
        ?>
        <input id="submit" type="submit" value="build" name="build">
        </form>
         </div>
</section>
<script type="javascript">$('#submit').click(function(){
        $('#loader').show(); //<----here
        $.ajax({
            ....
            success:function(result){
            $('#loader').hide();  //<--- hide again
        }
    }</script>
</body>