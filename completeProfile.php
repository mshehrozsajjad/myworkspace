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



function completeProfile()
{   
    $username = strip_tags($_SESSION["Name"]);
    $image_filename = mysql_real_escape_string(strip_tags(trim($_POST['image'])));
	$firstname = mysql_real_escape_string(strip_tags(trim($_POST['firstname'])));
    $middlename = mysql_real_escape_string(strip_tags(trim($_POST['middlename'])));
    $lastname = mysql_real_escape_string(strip_tags(trim($_POST['lastname'])));
    $mobile = mysql_real_escape_string(strip_tags(trim($_POST['mobile'])));
    $country = mysql_real_escape_string(strip_tags((trim($_POST['country']))));
    $profession = mysql_real_escape_string(strip_tags(trim($_POST['profession'])));
    $gender = mysql_real_escape_string(strip_tags(trim($_POST['gender'])));
    $birthday = mysql_real_escape_string(strip_tags(trim($_POST['bday'])));
    $shortbio = mysql_real_escape_string(strip_tags(trim($_POST['shortbio'])));
	$experience = mysql_real_escape_string(strip_tags(trim($_POST['Experience'])));
    $today = mysql_real_escape_string(strip_tags(trim(date("d-m-Y"))));
    
        if(!empty($_FILES['image']['name'])){
       
	\Cloudinary\Uploader::upload($_FILES['image']['tmp_name'], array("public_id" => "$username"));
		
     $newfilename = "https://res.cloudinary.com/shery97/image/upload/v1463873546/$username.jpg"; 
	$query = "UPDATE websiteusers SET firstname='$firstname', middlename='$middlename',lastname='$lastname', dob='$birthday',gender='$gender',profession='$profession',country='$country',picture='$newfilename',shortbio='$shortbio',experience='$experience', mobile='$mobile', ProfileComplete = '1' WHERE username='$username';";	
    }
    else{
        $query = "UPDATE websiteusers SET firstname='$firstname', middlename='$middlename',lastname='$lastname', dob='$birthday',gender='$gender',profession='$profession',country='$country',shortbio='$shortbio',experience='$experience', mobile='$mobile', ProfileComplete = '1' WHERE username='$username';";	
    }
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
      
        completeProfile();
		
	}
	if(!$row = mysql_fetch_array($query) or die(mysql_error()))
	{
		
        header('Location: login.php');
	}
	
}
}
if(isset($_POST['submit']))
{
	Profile();
}
?>