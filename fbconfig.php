<?php
session_start();
// added in v4.0.0
require_once 'autoload.php';
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;
// init app with app id and secret
FacebookSession::setDefaultApplication( '907733999339027','136504f8478c64a2c0b034cf1a7835e0' );
// login helper with redirect_uri
    $helper = new FacebookRedirectLoginHelper('http://my-workspace.azurewebsites.net/fbconfig.php' );
try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}
// see if we have a session
if ( isset( $session ) ) {
  // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me?locale=en_US&fields=id,first_name,last_name,middle_name,email,about' );
  $response = $request->execute();
  // get response
  $graphObject = $response->getGraphObject();
     	$fbid = $graphObject->getProperty('id');              // To Get Facebook ID
 	    $fbfname = $graphObject->getProperty('first_name'); // To Get Facebook full name
	   $fblname = $graphObject->getProperty('last_name');
       $fbmname = $graphObject->getProperty('middle_name');
       
         $fbabout = $graphObject->getProperty('about');
        $femail = $graphObject->getProperty('email');    // To Get Facebook email ID
	/* ---- Session Variables -----*/
	    $_SESSION['FBID'] = $fbid;           
        $_SESSION['Name'] = $fbfname;
	    $_SESSION['EMAIL'] =  $femail;
    /* ---- header location after session ----*/
    require 'fblogin.php'; 
    checkuser($fbid,$fbfname,$fblname,$femail,$fbmname,$fbabout); 
  
} else {
  $loginUrl = $helper->getLoginUrl();
 header("Location: ".$loginUrl);
}
?>