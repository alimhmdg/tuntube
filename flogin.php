<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */session_start(); 
require_once __DIR__ . '/facebook-php-sdk/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '485739368288596', // Replace {app-id} with your app id
  'app_secret' => 'e2c092f0faa0b499df3fcfb4fa3288c6',
  'default_graph_version' => 'v2.6',
  ]);

$helper = $fb->getRedirectLoginHelper();
$_SESSION['FBRLH_state']=$_GET['state'];
$permissions = ['email','user_likes']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://localhost/tuntube/fb-callback.php', $permissions);

header("Location: ".$loginUrl);
?>