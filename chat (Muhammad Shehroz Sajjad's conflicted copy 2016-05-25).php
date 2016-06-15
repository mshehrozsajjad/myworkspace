<?php

require 'components/database-login.php';
include 'components/session-check.php';
 
$username = strip_tags($_SESSION["Name"]);
$idtask = mysql_real_escape_string(strip_tags($_GET['taskid']));
$username2 = mysql_real_escape_string(strip_tags($_GET['username1']));

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Chat - Customer Module</title>
<link type="text/css" rel="stylesheet" href="style.css" />
    <style>
        /* CSS Document */
body {
    font:12px arial;
    color: #222;
    text-align:center;
    padding:35px; }
  
form, p, span {
    margin:0;
    padding:0; }
  
input { font:12px arial; }
  
a {
    color:#0000FF;
    text-decoration:none; }
  
    a:hover { text-decoration:underline; }
  
#wrapper, #loginform {
    margin:0 auto;
    padding-bottom:25px;
    background:#EBF4FB;
    width:504px;
    border:1px solid #ACD8F0; }
  
#loginform { padding-top:18px; }
  
    #loginform p { margin: 5px; }
  
#chatbox {
    text-align:left;
    margin:0 auto;
    margin-bottom:25px;
    padding:10px;
    background:#fff;
    height:270px;
    width:430px;
    border:1px solid #ACD8F0;
    overflow:auto; }
  
#usermsg {
    width:395px;
    border:1px solid #ACD8F0; }
  
#submit { width: 60px; }
  
.error { color: #ff0000; }
  
#menu { padding:12.5px 25px 12.5px 25px; }
  
.welcome { float:left; }
  
.logout { float:right; }
  
.msgln { margin:0 0 2px 0; }
    </style>
</head>
 <body>
<div id="wrapper">
    <div id="menu">
        <p class="welcome">Welcome,<?php echo $_SESSION['Name']; ?> <b></b></p>
        <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
        <div style="clear:both"></div>
    </div>
     
    <div id="chatbox">
                <?php
                $sql ="select * from userchat_reply where chat_id = '';";
                 $result = mysql_query($sql) or die(mysql_error());
                    while($rws = mysql_fetch_array($result)){ 
                 ?> 
        
        
                 <?php } ?>
    </div>
    
    <form name="message" action="">
        <input name="usermsg" type="text" id="usermsg" size="63" />
        <input name="submitmsg" type="submit"  id="submitmsg" value="Send" />
    </form>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript">
// jQuery Document
$(document).ready(function(){
 $("#exit").click(function(){
		var exit = confirm("Are you sure you want to end the session?");
		if(exit==true){window.location = 'index.php?logout=true';}		
	});
    $("#submitmsg").click(function(){	
		var clientmsg = $("#usermsg").val();
		$.post("post.php?taskid=<?php echo $idtask ?>", {text: clientmsg});				
		$("#usermsg").attr("value", "");
		return false;
	});
});
</script>
</body>
</html>