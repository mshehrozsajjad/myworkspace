<?php

require 'components/database-login.php';

$value = mysql_real_escape_string(strtolower(strip_tags(trim($_GET['query']))));
$formfield = $_GET['field'];
    
if(!empty($_GET['query']) && $formfield == "user")   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
{
	$query = mysql_query("SELECT * FROM websiteusers WHERE userName ='$value';") or die(mysql_error());
     if (mysql_num_rows($query)>0)  
	{   
		echo "Username not available";
	}
	if(!(mysql_num_rows($query)>0) or die(mysql_error()))
	{
		echo "";
        
	}
}


    
if(!empty($_GET['query']) && $formfield == "email")   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
{
	$query = mysql_query("SELECT * FROM websiteusers WHERE email ='$value';") or die(mysql_error());
     if (mysql_num_rows($query)>0)  
	{   
		echo "Email address already registered";
	}
	if(!(mysql_num_rows($query)>0) or die(mysql_error()))
	{
        echo "";
	}
	

}
?>


