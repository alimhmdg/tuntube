<?php
session_start();  //session start

require_once 'database.php';
require_once __DIR__ . '/facebook-php-sdk/autoload.php';

// Include required libraries

use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;


$fb = new Facebook([
  'app_id' => '485739368288596', // Replace {app-id} with your app id
  'app_secret' => 'e2c092f0faa0b499df3fcfb4fa3288c6',
  'default_graph_version' => 'v2.6',
   //'persistent_data_handler'=>'session'
   ]);

$helper = $fb->getRedirectLoginHelper();
if (isset($_GET['state'])) {
    $helper->getPersistentDataHandler()->set('state', $_GET['state']);
}

//
try {
  $accessToken = $helper->getAccessToken();
} catch(FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
//

if (! isset($accessToken)) {
  if ($helper->getError()) {
    header('HTTP/1.0 401 Unauthorized');
    echo "Error: " . $helper->getError() . "\n";
    echo "Error Code: " . $helper->getErrorCode() . "\n";
    echo "Error Reason: " . $helper->getErrorReason() . "\n";
    echo "Error Description: " . $helper->getErrorDescription() . "\n";
  } else {
    header('HTTP/1.0 400 Bad Request');
    echo 'Bad request';
  }
  exit;
}

// Logged in
// 
try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get('/me?locale=en_US&fields=id,name,email,picture,gender,likes', $accessToken);
} catch(FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}



$use = $response->getGraphUser();
 
try {
    $page_id = $_SESSION['page_id'];
    
//$page_name = $fb->get("/".$page_id ,$accessToken)['name'];

//$page_link = $fb->get("/".$page_id, $accessToken)['link'];

    $likes = $use->getProperty('likes');
    foreach ($likes as $like){
        if($like['name']==$page_id){
            $site_url ="http://".$_SERVER['HTTP_HOST'] ."/tuntube/embeded.php?vid=".$_SESSION['code'];
      //      $url = 'https://www.facebook.com/logout.php?next=' . $site_url .'&access_token='.$accessToken;
    $_SESSION['Liked'] = 1 ; 
    header("Location: ".$site_url );
    exit ;
        }
        
    }
    $site_url ="http://".$_SERVER['HTTP_HOST'] ."/tuntube/embeded.php?vid=".$_SESSION['code'];
    //$url = 'https://www.facebook.com/logout.php?next=' . $site_url .'&access_token='.$accessToken;
     $_SESSION['Liked'] = 0 ;
     header("Location: ". $site_url);
     exit ;
        } catch (Facebook\Exceptions\FacebookAuthenticationException $e) {
    error_log($e);
  }

?>






