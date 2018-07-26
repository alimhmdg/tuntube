<?php
/**
 * Library Requirements
 *
 * 1. Install composer (https://getcomposer.org)
 * 2. On the command line, change to this directory (api-samples/php)
 * 3. Require the google/apiclient library
 *    $ composer require google/apiclient:~2.0
 *//*
if (!file_exists(__DIR__ . '/vendor/autoload.php')) {
  throw new \Exception('please run "composer require google/apiclient:~2.0" in "' . __DIR__ .'"');
}
require_once __DIR__ . '/vendor/autoload.php';*/
require_once ('libraries/Google/autoload.php');

session_start();
/*
 * You can acquire an OAuth 2.0 client ID and client secret from the
 * {{ Google Cloud Console }} <{{ https://cloud.google.com/console }}>
 * For more information about using OAuth 2.0 to access Google APIs, please see:
 * <https://developers.google.com/youtube/v3/guides/authentication>
 * Please ensure that you have enabled the YouTube Data API for your project.
 */
$OAUTH2_CLIENT_ID = '116378363503-8l4rjo4bhblfu9o121kb5uoan2slho6b.apps.googleusercontent.com';
$OAUTH2_CLIENT_SECRET = '9MPuAqNnpWZur2Jm8RoZJafq';
$client = new Google_Client();
$client->setClientId($OAUTH2_CLIENT_ID);
$client->setClientSecret($OAUTH2_CLIENT_SECRET);
$client->setScopes('https://www.googleapis.com/auth/youtube');
$redirect = filter_var('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'],FILTER_SANITIZE_URL);
$client->setRedirectUri($redirect);
// Define an object that will be used to make all API requests.
$youtube = new Google_Service_YouTube($client);
// Check if an auth token exists for the required scopes
$tokenSessionKey = 'token-' . $client->prepareScopes();
if (isset($_GET['code'])) {
  if (strval($_SESSION['state']) !== strval($_GET['state'])) {
    die('The session state did not match.');
  }
  $client->authenticate($_GET['code']);
  $_SESSION[$tokenSessionKey] = $client->getAccessToken();
  header('Location: ' . $redirect);
  exit;
}
if (isset($_SESSION[$tokenSessionKey])) {
  $client->setAccessToken($_SESSION[$tokenSessionKey]);
}
// Check to ensure that the access token was successfully acquired.
if ($client->getAccessToken()) {
  $htmlBody = '';
  try {
    // This code subscribes the authenticated user to the specified channel.
    // Identify the resource being subscribed to by specifying its channel ID
    // and kind.
    $resourceId = new Google_Service_YouTube_ResourceId();
    $resourceId->setChannelId($_SESSION['page_id']);
    //var_dump($_SESSION);
   // exit ;
    $resourceId->setKind('youtube#channel');
    // Create a snippet object and set its resource ID.
    $subscriptionSnippet = new Google_Service_YouTube_SubscriptionSnippet();
    $subscriptionSnippet->setResourceId($resourceId);
    // Create a subscription request that contains the snippet object.
    $subscription = new Google_Service_YouTube_Subscription();
    $subscription->setSnippet($subscriptionSnippet);
    // Execute the request and return an object containing information
    // about the new subscription.
    $subscriptionResponse = $youtube->subscriptions->insert('id,snippet',
        $subscription, array());      
    $site_url ="http://".$_SERVER['HTTP_HOST'] ."/tuntube/embeded.php?vid=".$_SESSION['code'];
    $_SESSION['subscribed'] = 1;
    header("Location: ".$site_url);
    exit ;
    } catch (Google_Service_Exception $e) {
    $htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',
        htmlspecialchars($e->getMessage()));
  } catch (Google_Exception $e) {
    $htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',
        htmlspecialchars($e->getMessage()));
  }
  $_SESSION[$tokenSessionKey] = $client->getAccessToken();
} elseif ($OAUTH2_CLIENT_ID == 'REPLACE_ME') {
  echo'
  <h3>Client Credentials Required</h3>
  <p>
    You need to set <code>\$OAUTH2_CLIENT_ID</code> and
    <code>\$OAUTH2_CLIENT_ID</code> before proceeding.
  <p>';
} else {
  // If the user has not authorized the application, start the OAuth 2.0 flow.
  $state = mt_rand();
  $client->setState($state);
  $_SESSION['state'] = $state;
  $authUrl = $client->createAuthUrl();
  
  header("Location:".$authUrl);
  exit ;
}
?>
