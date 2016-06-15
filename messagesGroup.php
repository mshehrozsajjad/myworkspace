<?php
        require 'components/database-login.php';
        include 'components/session-check.php';
   
         $username = strip_tags($_SESSION["Name"]);
         $chatid = mysql_real_escape_string(strip_tags($_GET['chatid']));


     $sql ="select * from group_chat where taskid = '$chatid';";
     $result = mysql_query($sql) or die(mysql_error());
     
     while($rws = mysql_fetch_array($result)){
           $sender= $rws['user_id'] ;
            $msg = $rws['reply'] ;
         $time = $rws['time'] ;
               if($sender == $username){                             
     echo "<div class='col-xs-12'><div class='bubble you'>
     <h4>Me:</h4><p style='font-size:16px'> $msg</p><hr/><span class=' pull-right' style='font-size:12px'>$time</span>
     </div></div>";
               }
         else{ 
            echo "<div class='col-xs-12'><div class='bubble me'>
     <h4>$sender Says:</h4><p style='font-size:16px'> $msg</p><hr/><span style='font-size:12px'>$time</span>
     </div></div>";
              
             }
         
     }
?>