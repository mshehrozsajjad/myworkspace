<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'components/session-check.php';
    require_once 'components/database-login.php';
    require 'src/Cloudinary.php';
    require 'src/Uploader.php';
    require 'src/Api.php';

\Cloudinary::config(array( 
  "cloud_name" => "shery97", 
  "api_key" => "956172634322563", 
  "api_secret" => "K8WM8gksAPB6yZrkQHzwKM69vcE" 
));
    $userName = $_SESSION['Name'];
    
    
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
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
  <script  src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  
</head>
<body class="hold-transition skin-blue sidebar-mini" ng-app="" ng-init="name='<?php echo $firstName;?>'">
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
          <!-- Messages: style can be found in dropdown.less-->
          
                  <!-- end message -->
                  
                  <!-- end task item -->
                
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               <img src="<?php  echo $picture?>" class="user-image" alt="User Image">
              <span class="hidden-xs">{{name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo $picture?>" class="img-circle" alt="User Image">

                <p>
                  {{name}} - <?php echo $profession;?>
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
    <section class="content-header">
     
    </section>

    <!-- Main content -->
    
      <div class="col-md-12" style="margin-bottom:10px;">
       
    <img src="images/project.jpg" class="img-rounded img-responsive" alt="Dashboard" >
    
    </div>
    
       <div class="col-md-12">
    <div class="box box-primary">
            <div class="box-header with-border">
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="container-fluid">
    
  <div class="row">
      <!-- left column -->
      <div class="col-sm-12">
          
        <form class="form-horizontal" role="form" method="post" action="completeProject.php"  enctype="multipart/form-data">
      <div class="col-md-3 col-sm-5 col-lg-3">
        <div class="text-center">
          <img src="http://www.shawnee.edu/_resources/images/profile-placeholder.png" style="width:150px; height:150px;" class="avatar img-circle" alt="avatar" >
          <h6>Upload Project Photo</h6>
          
          <input type="file" class="form-control"name="image">
        </div>
      </div>
            <!-- edit form column -->
      
      <div class="col-md-9 col-sm-7  personal-info">
        
          <div class="form-group">
            <label class="col-md-3 control-label">Project Name*</label>
            <div class="col-md-8">
              <input class="form-control" type="text" placeholder="Your Project Name" name="projectname" maxlength="35" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"  >Project Description*</label>
            <div class="col-md-8">
             <textarea class="form-control" rows="5" id="comment" placeholder="Your Project Description MAX LIMIT 500 characters" name="projectdescription" maxlength="500" required></textarea>
            </div>
          </div>
           <div class="form-group">
               <div class="col-md-3">
                   </div>
            <div class="col-md-8">
              <button type="submit" class="btn btn-block btn-primary" name="submit">Submit</button>
              <span></span>
              
            </div>
          </div>
        </form>
        </div>
      </div>
  </div>
</div>
</div>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
       </div>
    </div>

    <!-- /.content -->
 
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
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

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
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
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
  <script type="text/javascript">
    
        $('#datepicker').datepicker();
   
</script>
</body>
</html>
