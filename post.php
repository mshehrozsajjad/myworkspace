<?php
        require 'components/database-login.php';
        include 'components/session-check.php';
   
         $username = strip_tags($_SESSION["Name"]);
         $reply = mysql_real_escape_string(strip_tags($_REQUEST['usermsg']));
         $username2 = mysql_real_escape_string(strip_tags($_REQUEST['username1']));
        $taskid = mysql_real_escape_string(strip_tags($_REQUEST['taskid']));
         $time = ''.date("D M d, Y G:i", time());
         $chatid = mysql_real_escape_string(strip_tags($_REQUEST['chatid']));


        if($reply != ""){
         $query = "INSERT INTO user_reply (reply,time,chat_id,user_id) VALUES ('$reply','$time','$chatid','$username')";
	     $data = mysql_query($query)or die(mysql_error());
        }
       
?>