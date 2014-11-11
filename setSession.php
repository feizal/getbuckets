<?php
	session_start();
	require 'dbconfig.php';
	require 'functions.php';
	    // added in v4.0.5
	require_once( 'Facebook/HttpClients/FacebookHttpable.php' );
	require_once( 'Facebook/HttpClients/FacebookCurl.php' );
	require_once( 'Facebook/HttpClients/FacebookCurlHttpClient.php' );

	// added in v4.0.0
	require_once( 'Facebook/FacebookSession.php' );
	require_once( 'Facebook/FacebookRedirectLoginHelper.php' );
	require_once( 'Facebook/FacebookRequest.php' );
	require_once( 'Facebook/FacebookResponse.php' );
	require_once( 'Facebook/FacebookSDKException.php' );
	require_once( 'Facebook/FacebookRequestException.php' );
	require_once( 'Facebook/FacebookOtherException.php' );
	require_once( 'Facebook/FacebookAuthorizationException.php' );
	require_once( 'Facebook/GraphObject.php' );
	require_once( 'Facebook/GraphUser.php' );
	require_once( 'Facebook/GraphSessionInfo.php' );
	require_once( 'Facebook/Entities/AccessToken.php' );

	// added in v4.0.5
	use Facebook\HttpClients\FacebookHttpable;
	use Facebook\HttpClients\FacebookCurl;
	use Facebook\HttpClients\FacebookCurlHttpClient;

	// added in v4.0.0
	use Facebook\FacebookSession;
	use Facebook\FacebookRedirectLoginHelper;
	use Facebook\FacebookRequest;
	use Facebook\FacebookResponse;
	use Facebook\FacebookSDKException;
	use Facebook\FacebookRequestException;
	use Facebook\FacebookOtherException;
	use Facebook\FacebookAuthorizationException;
	use Facebook\GraphObject;
	use Facebook\GraphUser;
	use Facebook\GraphSessionInfo;
	use Facebook\Entities\AccessToken;

	    $app_id = '728010273913035';
    	$app_secret = 'da03938d7ee958efcb6683a0adfca758';
    	FacebookSession::setDefaultApplication($app_id, $app_secret);

	    $helper = new FacebookRedirectLoginHelper("http://bckets.com/setSession.php", $app_id, $app_secret);
	    
	    try {
	    $session = $helper->getSessionFromRedirect();
	    }
	    catch(FacebookRequestException $ex) { }
	    catch(\Exception $ex) { }

	    $_SESSION['fb_token'] = $session->getToken();

	    $user_id = $session->getSessionInfo()->asArray()['user_id'];
	    $_SESSION['fb_id'] = $user_id;

	    try {
			} catch (FacebookRequestException $ex) {
			  // Session not valid, Graph API returned an exception with the reason.
			  echo $ex->getMessage();
			} catch (\Exception $ex) {
			  // Graph API returned info, but it may mismatch the current app or have expired.
			  echo $ex->getMessage();
			}  
		  try {
			    $user_profile = (new FacebookRequest(
			      $session, 'GET', '/me'
			    ))->execute()->getGraphObject(GraphUser::className());

			   $email = $user_profile->getProperty('email');
			   $username = $user_profile->getProperty('username');
			   $fname = $user_profile->getProperty('first_name');

			   checkuser($user_id,$fname,$email,$connection);
			   $_SESSION['fb_name'] = $user_profile->getName();
			   header("location: index.php");

			  } catch(FacebookRequestException $e) {

			    echo "Exception occured, code: " . $e->getCode();
			    echo " with message: " . $e->getMessage();

			  }   
?>