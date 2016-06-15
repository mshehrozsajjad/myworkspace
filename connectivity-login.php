<?php

require 'components/database-login.php';


function SignUp()
{
	$userName = mysql_real_escape_string(strtolower(strip_tags(trim($_POST['user']))));
    $password =  mysql_real_escape_string(strip_tags(crypt($_POST['pass'],sha1('$1$uniquecheez$'))));
if(!empty($_POST['user']))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
{
	$query = mysql_query("SELECT * FROM websiteusers WHERE userName ='$userName' AND pass = '$password';") or die(mysql_error());
     if (mysql_num_rows($query)>0)  
	{   session_start();
        $_SESSION["Name"] = $userName;
        if(isset($_SESSION["WrongPass"] )){
            $_SESSION["WrongPass"] = NULL;
        }
        $sql = "UPDATE websiteusers SET activeStatus= '1' WHERE userName='$userName';";
        mysql_query($sql);
		header('Location: ./indexLogin.php');
	}
	if(!(mysql_num_rows($query)>0) or die(mysql_error()))
	{
        session_start();
        $_SESSION["WrongPass"] = "Wrong Password";
		header('Location: ./Login.php');
        
	}
	
}
}
if(isset($_POST['submit']))
{
	SignUp();
}
?>

