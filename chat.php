<!DOCTYPE html>
<html lang="en">

<head>
 
     <?php include 'components/session-check.php';
        require_once 'components/database-login.php';

        $userName = $_SESSION['Name'];
       $username = $_SESSION['Name'];
        $idtask = mysql_real_escape_string(strip_tags($_GET['taskid']));
   $username2 = mysql_real_escape_string(strip_tags($_GET['username1']));

        $query = "SELECT firstName,profession,picture from websiteusers where  userName = '$userName';";
        $result=mysql_query($query);	
        if (!$result){
        die("BAD!");
    }
        if (mysql_num_rows($result)==1){
        $row = mysql_fetch_array($result);
        $firstName = $row['firstName'];
        $profession = $row['profession'];
        $picture = $row['picture'];

    }
        else{
         $firstName =  "";
         $profession =  "";
         $picture =  "http://www.shawnee.edu/_resources/images/profile-placeholder.png";
    }

        $query = "SELECT taskname,taskdescription from tasks where  idtasks = '$idtask';";
        $result=mysql_query($query);	
        if (!$result){
        die("BAD2!");
    }
        if (mysql_num_rows($result)==1){
        $row = mysql_fetch_array($result);
        $taskname = $row['taskname'];
        $taskdescription = $row['taskdescription'];

    }
        else{
         header("Location: indexLogin.php");

    }


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
    <title>MyWorkSpace</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!--- AngularJs -->
 
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="css/myworkspace.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
     <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
  <script  src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  
</head>
<body class="hold-transition skin-green sidebar-mini" ng-app="" ng-init="name='<?php echo $firstName;?>'">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="indexLogin.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>M</b>WS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">MY<b>WORKSPACE</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo $picture?>" class="user-image" alt="User Image">
              <span class="hidden-xs">{{name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo $picture?>" class="img-circle" alt="User Image">

                <p>
                  {{name}} -<?php echo $profession;?>
                  
                </p>
              </li>
              <!-- Menu Body -->
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="components/logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $picture?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
        <li class="header">WORKSPACE</li>
        <li class="treeview">
          <a href="editprofile.php">
            <i class="fa fa-laptop"></i> <span>Edit Profile</span>
          </a>
          
        </li>
            <li class="treeview">
          <a href="indexLogin.php">
            <i class="fa fa-users"></i> <span>All Users</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
               <li><a href="./chatGroup.php?taskid=<?php echo $idtask ?>"><i class="fa fa-user"></i> Group Chat </a></li>
            <?php
              $sql = "SELECT user_name FROM user_task where taskid = '$idtask' and user_name != '$userName';";
                    $result = mysql_query($sql) or die(mysql_error());
                    while($rws = mysql_fetch_array($result)){ 
                    ?>
            <li><a href="./chat.php?taskid=<?php echo $idtask ?>&username1=<?php echo $rws['user_name'] ?>"><i class="fa fa-user"></i> <?php  echo  $rws['user_name']?></a></li>
              <?php 
                    } 
              ?>
          </ul>
        </li>
        <li class="treeview">
          <a href="indexLogin.php">
            <i class="fa fa-files-o"></i> <span>Projects</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
         <?php
              $sql = "select * from projects where projects.projectname  in (select user_project.projectname from user_project,websiteusers, projects where projects.projectname=user_project.projectname and projects.username=user_project.username and websiteusers.`username`=user_project.`user-name` and user_project.`user-name`='$userName' and user_project.has_accepted ='1') and projects.username in  (select user_project.username from user_project,websiteusers, projects where projects.projectname=user_project.projectname and projects.username=user_project.username and websiteusers.`username`=user_project.`user-name` and user_project.`user-name`='$userName'and user_project.has_accepted ='1');";
                    $result = mysql_query($sql) or die(mysql_error());
                    while($rws = mysql_fetch_array($result)){ 
                    ?>
            <li><a href="./project.php?projectid=<?php echo $rws['idprojects'] ?>"><i class="fa fa-circle-o"></i> <?php  echo  $rws['projectname']?></a></li>
              <?php 
                    } 
              ?>
          </ul>
        </li>
       
            
        
            
        
              
            
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Terms & Conditions</span>
          </a>
          
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>About Us</span>
          </a>
          
        </li>
       
        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

    </section>


    <!-- Main content -->
    <div>
<div class="col-sm-10 col-sm-offset-1">
        <div class="box box-success">
            <div class="box-header text-center">
                <h2><?php echo $taskname; ?>'s Chat </h2><hr/>
            </div>
            <div class="box-body">
                <div class="col-sm-12">
                 <div class="col-sm-12" style="height:400px;overflow:scroll;overflow-x: hidden;" id="chatbox" >
         
        
          
        </div>
       
       </div>
                <div class="col-sm-12">
                    <textarea style="width:100%" id="usermsg" rows="2" placeholder="Type Your Message" ></textarea>
                    
                
                </div>
                <div class="col-sm-4 pull-right">
                    <button class="btn btn-lg btn-primary btn-block" id="submitmsg"><span class="	glyphicon glyphicon-send"></span></button>
                </div>
                    </div>
                
    </div>



        </div>
    </div>


    </div>


    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.3
    </div>
    <strong>Copyright &copy; 2016 <a href="http://facebook.com/myworkspace121">Dr.Phoenix</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->

      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

<!-- ./wrapper -->


<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="plugins/chartjs/Chart.min.js"></script>
<script type="text/javascript">
            // jQuery Document
            $(document).ready(function() {
                $("#exit").click(function() {
                    var exit = confirm("Are you sure you want to end the session?");
                    if (exit == true) {
                        window.location = 'indexLogin.php';
                    }
                });
                $("#submitmsg").click(function() {
                   var clientmsg = $("#usermsg").val();
                     $.ajax({
			     url: "post.php?taskid=<?php echo $idtask ?>&username1=<?php echo $username2 ?>&chatid=<?php echo $idchat ?>",
                         data:{usermsg: clientmsg},
			     cache: false,
			    success: function(html){	
                    $("#usermsg").val("");
								
		  	}
		   });
		          
                });
                 var scrollContainer= document.getElementById("chatbox");
                function loadLog(){		
                    //var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 60;
                    var out = document.getElementById("chatbox");
                   // allow 1px inaccuracy by adding 1
                  var isScrolledToBottom = out.scrollHeight - out.clientHeight <= out.scrollTop + 1;
		     $.ajax({
			url: "messages.php?chatid=<?php echo $idchat ?>",
			cache: false,
			success: function(html){	
                
				$("#chatbox").html(html); //Insert chat log into the #chatbox div	
                
                
                //$('#chatbox').animate({scrollTop: $('#chatbox').get(0).scrollHeight}, 3000);
                //Auto-scroll	
                if(isScrolledToBottom)
                 $('#chatbox').scrollTop($('#chatbox')[0].scrollHeight - $('#chatbox')[0].clientHeight);
				
		  	},
		   });
	           }
               setInterval (loadLog, 1000);	
               $('#chatbox').scrollTop($('#chatbox')[0].scrollHeight - $('#chatbox')[0].clientHeight);
            });
        </script>

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
