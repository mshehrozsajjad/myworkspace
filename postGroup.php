<?php
        require 'components/database-login.php';
        include 'components/session-check.php';
   
         $username = strip_tags($_SESSION["Name"]);
         $reply = mysql_real_escape_string(strip_tags($_REQUEST['usermsg']));
         $taskid = mysql_real_escape_string(strip_tags($_REQUEST['taskid']));
         $time = ''.date("D M d, Y G:i", time());
         

        if($reply != ""){
         $query = "INSERT INTO group_chat (reply,time,taskid,user_id) VALUES ('$reply','$time','$taskid','$username')";
	     $data = mysql_query($query)or die(mysql_error());
        }
       
?>