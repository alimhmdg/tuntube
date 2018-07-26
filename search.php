<?php
require_once 'database.php';
$db =new Database();?>
<section style="width: 90%; margin: 3% 5%;">
    <?php
if(!empty($_GET['t_search'])){
    $t_search = $_GET['t_search'];
    $query = "select * from embeded where title='$t_search'";
    $playlist = $db->Select('embeded' ,'',['title' => $t_search]);
    if($playlist != null){

        for($i=0; $i < count($playlist);$i++)
        {
            ?><div class="play">
            <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tuntube/embeded.php?vid=<?php echo $playlist[$i]['code_link']; ?>" style="width: 100%;">
                <p><?php echo $playlist[$i]['title']; ?></p>
                <img src="https://img.youtube.com/vi/<?php echo $playlist[$i]['code_link']; ?>/hqdefault.jpg">
            </a>
            </div>
    <div class="clear"></div>    
                <?php
        }
    }
    else{
        header("location:404.php");
    }
    } else
{
    ?><p style="color: #333;font-weight: bold;text-align: center;">No Videos Embeded Untile Now</p><?php
}

?>
</section>
