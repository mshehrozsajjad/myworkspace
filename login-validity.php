<?php


require 'components/database-login.php';

	$userName = mysql_real_escape_string(strtolower(strip_tags(trim($_GET['query']))));
    
if(!empty($_GET['query']))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
{
	$query = mysql_query("SELECT * FROM websiteusers WHERE userName ='$userName';") or die(mysql_error());
     if (mysql_num_rows($query)>0)  
	{   
		echo " ";
	}
	if(!(mysql_num_rows($query)>0) or die(mysql_error()))
	{
		echo "Incorrect Username";
        
	}
	

}
?>


