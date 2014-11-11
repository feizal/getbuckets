<?php
    session_start();
    require 'functions.php';  // Include functions
    require 'dbconfig.php';
    require_once('Facebook/FacebookSession.php');
    require_once('Facebook/FacebookRedirectLoginHelper.php');
    require_once('Facebook/FacebookRequest.php');
    require_once('Facebook/FacebookResponse.php');
    require_once('Facebook/FacebookSDKException.php');
    require_once('Facebook/FacebookRequestException.php');
    require_once('Facebook/FacebookAuthorizationException.php');
    require_once('Facebook/GraphObject.php');
    require_once('Facebook/HttpClients/FacebookCurl.php');
    require_once('Facebook/HttpClients/FacebookHttpable.php');
    require_once('Facebook/HttpClients/FacebookCurlHttpClient.php');
    require_once('Facebook/Entities/AccessToken.php');
    require_once('Facebook/GraphUser.php');
    use Facebook\FacebookSession;
    use Facebook\FacebookRedirectLoginHelper;
    use Facebook\FacebookRequest;
    use Facebook\FacebookResponse;
    use Facebook\FacebookSDKException;
    use Facebook\FacebookRequestException;
    use Facebook\FacebookAuthorizationException;
    use Facebook\GraphObject;
    use Facebook\HttpClients\FacebookCurl;
    use Facebook\HttpClients\FacebookHttpable;
    use Facebook\HttpClients\FacebookCurlHttpClient;
    use Facebook\Entities\AccessToken;
    use Facebook\GraphUser;
     
    $app_id = '728010273913035';
    $app_secret = 'da03938d7ee958efcb6683a0adfca758';
     
    FacebookSession::setDefaultApplication($app_id, $app_secret);

    $helper = new FacebookRedirectLoginHelper("http://bckets.com/setSession.php", $app_id, $app_secret);

    $session = new FacebookSession($_SESSION['fb_token']);

    $logoutUrl = $helper->getLogoutUrl($session,'http://bckets.com/logout.php');
    
?>