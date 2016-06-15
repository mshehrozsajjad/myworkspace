<?php

require 'components/database-login.php';
require 'src/Cloudinary.php';
require 'src/Uploader.php';
require 'src/Api.php';

\Cloudinary::config(array( 
  "cloud_name" => "shery97", 
  "api_key" => "956172634322563", 
  "api_secret" => "K8WM8gksAPB6yZrkQHzwKM69vcE" 
));


function createProject()
{   
    $username = strip_tags($_SESSION["Name"]);
	
    $projectname = mysql_real_escape_string(strip_tags($_POST['projectname']));
    $projectdescription = mysql_real_escape_string(strip_tags($_POST['projectdescription']));
   
    
	$query = "INSERT INTO projects (projectname, projectdescription,username) VALUES ('$projectname', '$projectdescription','$username')";
	$data = mysql_query ($query)or die(mysql_error());
    
   
     $projectid =   mysql_insert_id();
     if(!empty($_FILES['image']['name'])){
       
	\Cloudinary\Uploader::upload($_FILES['image']['tmp_name'], array("public_id" => "$projectid"));
		
     $newfilename = "https://res.cloudinary.com/shery97/image/upload/v1463873546/$projectid.jpg"; 
	$query = "UPDATE projects SET projectpicture ='$newfilename' where idprojects = '$projectid';";	
    $data = mysql_query ($query)or die(mysql_error());
    }
   
     
    $query = "INSERT INTO user_project (`user-name`,`project_id`,projectname,username,can_edit,has_accepted) VALUES ('$username','$projectid','$projectname','$username','1','1')";
	$data = mysql_query ($query)or die(mysql_error());
	if($data)
	{
		header('Location: indexLogin.php');
	}
}

function Profile()
{
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
}
if(isset($_POST['submit']))
{
	Profile();
}
?>

