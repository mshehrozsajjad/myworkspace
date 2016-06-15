<?php
require 'components/database-login.php';
function checkuser($fuid,$ffname,$funame,$femail){
    	
    $check = mysql_query("select * from websiteusers where  email = '$femail';");
	$check = mysql_num_rows($check);
	if (empty($check)) { // if new user . Insert a new record	
        	
        $password =crypt( $fuid+35,sha1('$1$uniquecheez$'));           
     
	$query = "INSERT INTO websiteusers (firstName,lastName,userName,email,pass,activeStatus) VALUES ('$ffname','','$funame','$femail','$password','1');";
	mysql_query($query);
    $query = "SELECT userName from websiteusers where  email = '$femail';";
    $result = mysql_query($query);
        $row = mysql_fetch_array($result);
        $result = $row['userName'];
         $_SESSION["Name"] = $result;	
    header('Location: ./indexLogin.php');
	} else {
        session_start();  
        $query = "SELECT userName from websiteusers where  email = '$femail';";
         $result = mysql_query($query);
        $row = mysql_fetch_array($result);
        $result = $row['userName'];
         $_SESSION["Name"] = $result;
        $sql = "UPDATE websiteusers SET activeStatus= '1' WHERE email = '$femail';";
        mysql_query($sql);
        header('Location: ./indexLogin.php');
	}

    }
?>