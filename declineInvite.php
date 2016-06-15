<?php

require 'components/database-login.php';

function createProject()
{   
    $username = strip_tags($_SESSION["Name"]);
    $idprojects = mysql_real_escape_string(strip_tags($_GET['projectid']));
   
   
	$query = "DELETE FROM user_project WHERE project_id='$idprojects' and `user-name`='$username';";	
    $data = mysql_query ($query)or die(mysql_error());
    $query = "DELETE FROM user_dept WHERE project_id='$idprojects' and `user-name`='$username';";	
    $data = mysql_query ($query)or die(mysql_error());
    $query = "DELETE FROM user_task WHERE project_id='$idprojects' and `user_name`='$username';";	
    $data = @mysql_query ($query);
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

