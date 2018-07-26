<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
require 'tw-autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;
define('CONSUMER_KEY','awR2uSYsrZ8bGcSHf6YYhOB8m'); // add your app consumer key between single quotes
define('CONSUMER_SECRET','NGNTVHo01uRM16R30TCJZgQakqRzjkZdVo6ZoGSDtV4D51rR7o'); // add your app consumer secret key between single quotes
define('OAUTH_CALLBACK', 'http://localhost/fc_login/tw-callback.php'); // your app callback URL


if (!isset($_SESSION['access_token'])) {
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
	$request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));
	//$request_token = $connection->getRequestToken(OAUTH_CALLBACK);
        //$url = $request_token->getAuthorizeUrl($request_token); 
        $_SESSION['oauth_token'] = $request_token['oauth_token'];
	$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
      
	$url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
	header("Location:".$url);
        //echo $url;
     //   echo '<br>';
 //       echo $_SESSION['oauth_token'];
   //     echo $_SESSION['oauth_token_secret'];
} else {
        $access_token = $_SESSION['access_token'];
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
	$use = $connection->get("account/verify_credentials",['include_entities' => 'false','include_email'=>'true','skip_status'=>'true']);	
//print_r($user);
        $user_id = $use->id;
        
        
        $users = $connection->get('users/search', array('q' => $_SESSION['page_id']));
	//var_dump($users);
        //$a = json_decode($users, true);
	foreach ($users as  $user) {
        if($user->screen_name == $_SESSION['page_id'])
        {
        echo $user->screen_name." Follow user <br>";
        $rt = $connection->post('friendships/create', array("user_id" => $user->id));
        $_SESSION["followed"] = 1 ;
        
        $site_url ="http://".$_SERVER['HTTP_HOST'] ."/tuntube/embeded.php?vid=".$_SESSION['code'];
        header("Location: " .$site_url);
	exit ;     
        
        }
        }
        $site_url ="http://".$_SERVER['HTTP_HOST'] ."/tuntube/embeded.php?vid=".$_SESSION['code'];
        $_SESSION["followed"] = 0 ;
        header("Location: " .$site_url);
	exit ; 
        //
        /*$fbid =  $user->id_str;
        $fbfullname =  $user->name;
        $femail =  $user->email;
        $screen_name = $user->screen_name ;
        $_SESSION['FBID'] = $fbid;           
        $_SESSION['FULLNAME'] = $fbfullname;
        $_SESSION['EMAIL'] =  $femail;
        $_SESSION['gend'] = 'male';
        $_SESSION['pic_link'] = "https://twitter.com/$screen_name/profile_image?size=original";
        *///$folowrs = $connection->get("https://api.twitter.com/1.1/followers/ids.json?");
        
        
        ////$ff = $user->users;
        //var_dump($ff);
        

}
?>
