<?php
define('TWITTER_CONSUMER_KEY', 'PpfhowtfHrIGgipmIK3Kj43pC');
define('TWITTER_CONSUMER_SECRET', '3gn9u4yHTFOSrrcB3TvA6emzcqJ8oxyuOpiq8REYlvCErtI8ZL');
define('TWITTER_OAUTH_CALLBACK', 'http://my-workspace.azurewebsites.net/twitterconfig.php');



function __autoload($class)
{
	$parts = explode('_', $class);
	$path = implode(DIRECTORY_SEPARATOR,$parts);
	require_once $path . '.php';
}
?>