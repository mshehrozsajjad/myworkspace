<?php


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once 'config.php'; 
if (TWITTER_CONSUMER_KEY === '' || TWITTER_CONSUMER_SECRET === '' || TWITTER_CONSUMER_KEY === 'TWITTER_CONSUMER_KEY_HERE' || TWITTER_CONSUMER_SECRET === 'CONSUMER_SECRET_HERE') {
	echo 'You need a consumer key and secret to test the sample code. Get one from <a href="https://dev.twitter.com/apps">dev.twitter.com/apps</a>';
	exit;
}
try{
require_once('src/twitteroauth/twitteroauth.php');
}
catch(Exception $e){
}
if(!isset( $_SESSION['oauth_token'] )){
	$connection = new TwitterOAuth(TWITTER_CONSUMER_KEY, TWITTER_CONSUMER_SECRET);
	$request_token = $connection->getRequestToken(TWITTER_OAUTH_CALLBACK);
	$_SESSION['oauth_token'] = $token = $request_token['oauth_token'];
	$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
	switch ($connection->http_code) {
		case 200:
			$url = strip_tags($connection->getAuthorizeURL($token));
			break;
		default:
			$error = 'Could not connect to Twitter. Refresh the page or try again later.';
	}
}else{
	$connection = new TwitterOAuth(TWITTER_CONSUMER_KEY, TWITTER_CONSUMER_SECRET, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
	$access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);
	$_SESSION['access_token'] = $access_token;
	$content = $connection->get('account/verify_credentials',['include_email' => 'true']);
	
	if( !empty( $content->id )){
		$tuid = $content->id;
		$tfname = $content->name;
		$tuname = $content->id;
        $temail = $content->email;
        //--------------------------
        $profileurl = $content->screen_name;
        $_SESSION['image']= $profileurl;
         $_SESSION['TWITERID'] = $tuid;           
        $_SESSION['Name'] = $tuname;
	    $_SESSION['EMAIL'] =  $temail;
        
        require 'socialLogin.php'; 
        checkuser($tuid,$tfname,$tuname,$temail); 
		

	}else{
		session_unset();
		session_destroy();
         header('Location: Signup.php');
	}
}
?>