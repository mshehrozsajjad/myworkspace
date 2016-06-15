<?php

require 'components/database-login.php';
include 'components/session-check.php';
 
$username = strip_tags($_SESSION["Name"]);
$idtask = mysql_real_escape_string(strip_tags($_GET['taskid']));
$username2 = mysql_real_escape_string(strip_tags($_GET['username1']));

    $query = "select * from user_chat where (user_one = '$username' and user_two = '$username2' and taskid = '$idtask') OR (user_one = '$username2' and user_two = '$username' and taskid = '$idtask');";
    $result=mysql_query($query);	
    if (mysql_num_rows($result)==1){
    $row = mysql_fetch_array($result);
    $idchat = $row['idchat'];
}
    else{
    $sql ="INSERT INTO user_chat (taskid,user_one,user_two) VALUES ('$idtask','$username','$username2');";
    $result = mysql_query($sql) or die(mysql_error());
    $idchat =   mysql_insert_id();
    }



?>

    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <title>Chat - Customer Module</title>
        <link type="text/css" rel="stylesheet" href="style.css" />
        <style>
            /* CSS Document */
            
            body {
                font: 12px arial;
                color: #222;
                text-align: center;
                padding: 35px;
            }
            
            form,
            p,
            span {
                margin: 0;
                padding: 0;
            }
            
            input {
                font: 12px arial;
            }
            
            a {
                color: #0000FF;
                text-decoration: none;
            }
            
            a:hover {
                text-decoration: underline;
            }
            
            #wrapper,
            #loginform {
                margin: 0 auto;
                padding-bottom: 25px;
                background: #EBF4FB;
                width: 504px;
                border: 1px solid #ACD8F0;
            }
            
            #loginform {
                padding-top: 18px;
            }
            
            #loginform p {
                margin: 5px;
            }
            
            #chatbox {
                text-align: left;
                margin: 0 auto;
                margin-bottom: 25px;
                padding: 10px;
                background: #fff;
                height: 270px;
                width: 430px;
                border: 1px solid #ACD8F0;
                overflow: auto;
            }
            
            #usermsg {
                width: 395px;
                border: 1px solid #ACD8F0;
            }
            
            #submit {
                width: 60px;
            }
            
            .error {
                color: #ff0000;
            }
            
            #menu {
                padding: 12.5px 25px 12.5px 25px;
            }
            
            .welcome {
                float: left;
            }
            
            .logout {
                float: right;
            }
            
            .msgln {
                margin: 0 0 2px 0;
            }
        </style>
    </head>

    <body>
        <div id="wrapper">
            <div id="menu">
                <p class="welcome">Welcome,
                    <?php echo $_SESSION['Name']; ?> <b></b></p>
                <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
                <div style="clear:both"></div>
            </div>

            <div id="chatbox">
                <?php
                $sql ="select * from user_reply where chat_id = '$idchat';";
                 $result = mysql_query($sql) or die(mysql_error());
                    while($rws = mysql_fetch_array($result)){ 
                 ?>
                    <h4><?php echo $rws['user_id']?></h4>
                    <p><?php echo $rws['reply']?></p>
                    <?php } ?>
            </div>

            
                <input name="usermsg" type="text" id="usermsg" size="63" />
                <button id="submitmsg" name="submit">Submit</button>
            
        </div>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
        -
    </body>

    </html>