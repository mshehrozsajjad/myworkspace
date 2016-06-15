<?php

require 'components/database-login.php';

function createProject()
{   
    $username = strip_tags($_SESSION["Name"]);
    $username2 = mysql_real_escape_string(strip_tags($_GET['username1']));
    $idtasks = mysql_real_escape_string(strip_tags($_GET['taskid']));
   
   
	$query = "UPDATE user_task SET can_edit='1' WHERE user_name='$username1';";	
    $data = mysql_query ($query)or die(mysql_error());
    header('Location: indexLogin.php');


}

    session_start();
if(isset($_SESSION["Name"]))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
{
    $userName = strip_tags($_SESSION["Name"]);
      
	$query = mysql_query("SELECT * FROM websiteusers WHERE userName = '$userName';");
     if (mysql_num_rows($query)>0)  
	{   
        createProject();
	}
	if(!$row = mysql_fetch_array($query) or die(mysql_error()))
	{
		
        header('Location: Login.php');
	}
	
}

?>

