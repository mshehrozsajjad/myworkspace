<?php

require 'components/database-login.php';


function NewUser()
{
	$firstName =mysql_real_escape_string(strip_tags(trim( $_POST['name'])));
    $lastName = mysql_real_escape_string(strip_tags(trim($_POST['lastname'])));
	$userName = mysql_real_escape_string(strtolower(strip_tags(trim($_POST['user']))));
	$email = mysql_real_escape_string(strtolower(strip_tags(trim($_POST['email']))));
	$password = mysql_real_escape_string(strip_tags(trim(crypt($_POST['pass'],sha1('$1$uniquecheez$')))));
    $activeStatus = 1;
	$query = "INSERT INTO websiteusers (firstName,lastName,userName,email,pass,activeStatus) VALUES ('$firstName','$lastName','$userName','$email','$password','$activeStatus');";
	$data = mysql_query ($query)or die(mysql_error());
	if($data)
	{
	
     session_start();
        $_SESSION["Name"] = $userName;
		header('Location: ./indexLogin.php');
	}
}

function SignUp()
{
if(!empty($_POST['user']))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
{
	$query = mysql_query("SELECT * FROM websiteusers WHERE userName = '$_POST[user]' AND pass = '$_POST[pass]';") or die(mysql_error());
     if (mysql_num_rows($query)>0)  
	{   
        
		header('Location: ./indexLogin.php');
	}
	if(!$row = mysql_fetch_array($query) or die(mysql_error()))
	{
		newuser();
	}
	
}
}
if(isset($_POST['submit']))
{
	SignUp();
}
?>

