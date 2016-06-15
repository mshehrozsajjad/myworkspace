<!DOCTYPE html>
<html lang="en">

<head>

    <?php include 'components/session-check.php';
        require_once 'components/database-login.php';

        $userName = $_SESSION['Name'];
        $idprojects = mysql_real_escape_string(strip_tags($_GET['projectid']));
        $iddepartment = mysql_real_escape_string(strip_tags($_GET['departmentid']));
        $idtask = mysql_real_escape_string(strip_tags($_GET['taskid']));


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
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>
        <script type="text/javascript" src="https://api.filestackapi.com/filestack.js"></script>

        <script>
            filepicker.setKey("Af43oW9RQQCugHqL5sbYPz")
        </script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

</head>

<body class="hold-transition skin-green sidebar-mini sidebar-collapse" id="mybody" ng-app="" ng-init="name='<?php echo $firstName;?>'">
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
                <a href="#" class="sidebar-toggle visible-xs" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope-o"></i>
                                <span class="label label-success">4</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 4 messages</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <!-- start message -->
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="../<?php echo $picture?>" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <!-- end message -->
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="../dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                            AdminLTE Design Team
                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                          </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="../dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                            Developers
                            <small><i class="fa fa-clock-o"></i> Today</small>
                          </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="../dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                            Sales Department
                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                          </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="../dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                            Reviewers
                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                          </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>
                        <!-- end message -->

                        <!-- Start Notifications -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning">10</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 10 notifications</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-red"></i> 5 new members joined
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-user text-red"></i> You changed your username
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>
                        <!-- end message -->

                        <!-- end task item -->

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
                                        {{name}} -
                                        <?php echo $profession;?>

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
                            <a href="#" data-toggle="control-sidebar" id="mybtn"><i class="fa fa-gears"></i></a>
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
          <a href="indexLogin.php">
            <i class="fa fa-clone"></i> <span>Departments</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <?php
              $sql = "select * from department d where departmentname in (select dept_name from department d, user_dept du where du.dept_name=d.departmentname and du.user_name=d.`user-name` and du.dept_id=d.iddepartment and du.`user-name`='$userName') and d.project_id in (select du.project_id from department d, user_dept du where du.dept_name=d.departmentname and du.user_name=d.`user-name` and du.dept_id=d.iddepartment and du.project_id='$idprojects');";
                    $result = mysql_query($sql) or die(mysql_error());
                    while($rws = mysql_fetch_array($result)){ 
                    ?>
            <li><a href="./department.php?projectid=<?php echo $idprojects ?>&departmentid=<?php echo $rws['iddepartment'] ?>"><i class="fa fa-circle-o"></i> <?php  echo  $rws['departmentname']?></a></li>
              <?php 
                    } 
              ?>
          </ul>
        </li>
        
        
        <li class="treeview">
          <a href="indexLogin.php">
            <i class="fa fa-sticky-note-o"></i> <span>Tasks</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <?php
              $sql = "select * from tasks where idtasks  in (select taskid from user_task ut,websiteusers w, tasks t where t.idtasks=ut.taskid and t.username=ut.username and ut.taskname=t.taskname and ut.user_name=w.username and ut.project_id=t.project_id and ut.dept_id=t.dept_id and ut.user_name='$userName' and ut.project_id='$idprojects'and ut.dept_id='$iddepartment');";
                    $result = mysql_query($sql) or die(mysql_error());
                    while($rws = mysql_fetch_array($result)){ 
                    ?>
            <li><a href="tasks.php?projectid=<?php echo $idprojects ?>&departmentid=<?php echo $iddepartment?>&taskid=<?php echo $rws['idtasks'] ?>"><i class="fa fa-circle-o"></i> <?php  echo  $rws['taskname']?></a></li>
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
            <div class="col-sm-12">
           <div class="row">
 <div class="col-sm-12" id="Department">
    <div class="box box-success">
      
      <div class="row">
        <div class="col-sm-12 text-center" >
          <div class="row"><h1><?php echo $taskname;?></h1>
          <hr> </div>
          <div class="row">
          <h4 style="color:Gray;"><?php echo $taskdescription;?></h4>
          </div>
          </div>
        </div>
        </div>
        </div>
       <?php 
                      $query = "SELECT can_edit from user_dept where  `user-name` = '$userName' AND project_id = '$idprojects' AND dept_id = '$iddepartment';";
                    $result=mysql_query($query);	
                     if (!$result){
                     die("BAD!");
                     }
                      if (mysql_num_rows($result)==1){
                     $row = mysql_fetch_array($result);
                     $canEdit = $row['can_edit'];
    
                    }
                    if($canEdit == '1'){ ?>
                    <script>$("#Department").attr("class","col-sm-7 text-center")</script>
        <div class="col-sm-5">
           <div class="box box-success">
                 <div class="box-body ">
                  <div class="col-sm-5" type="button"data-toggle="modal" data-target="#myModal">
                      <a href="#">
                      <div class="adduser text-center" style="color:white;background-color:#00a65a">
                         <h1 style="font-size:50px;"><span class="glyphicon glyphicon-plus-sign" style="margin-top:30px;" ></span> </h1>
                         <h4>Add Users</h4>
                      </div>
                      </a>
                  </div>

                  <div class="col-sm-5 col-sm-offset-1" type="button" data-toggle="modal" data-target="#myModal1">
                      <a href="#">
                      <div class="adduser text-center" style="color:white;background-color:#00a65a">
                         <h1 style="font-size:50px;"><span class="glyphicon glyphicon-user" style="margin-top:30px;" ></span> </h1>
                         <h4>Manage Users</h4>
                      </div>
                      </a>
                  </div>
                        
                  
        
                 </div>
           </div>
        </div>
            <?php } ?>
     
      </div>
        </div>

      <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Users To Your Task</h4>
            </div>
            <div class="modal-body" >
               <form class="form-horizontal" role="form" method='post' action="addUserInTask.php?projectid=<?php echo $idprojects ?>&departmentid=<?php echo $iddepartment ?>&taskid=<?php echo $idtask ?>">
                                <div class="form-group text-center">
                                    

                                    <div class="col-sm-12" style="margin-top:0px;">
                                        <select name="username[]" class="selectpicker" data-live-search="true" multiple data-width="100%" data-selected-text-format="count > 2" data-size="4" title="Search by Name Or Username" required>
                                            <?php
                    $sql ="select * from websiteusers w where  w.username not in (select user_name from user_task ut,websiteusers w, tasks t where t.idtasks=ut.taskid and ut.user_name=w.username and ut.taskid='$idtask');";
                     $result = mysql_query($sql) or die(mysql_error());
                        while($rws = mysql_fetch_array($result)){ 

                     ?>
                                                <option data-subtext="<?php echo $rws['username']?>" value="<?php echo $rws['username']?> " data-tokens="<?php echo $rws['username']?> <?php echo $rws['middlename']?> <?php echo $rws['lastname']?> <?php echo $rws['firstname']?> ">
                                                    <?php echo $rws['firstname']?>
                                                        <?php echo $rws['lastname']?>
                                                </option>

                                                <?php } ?>
                                        </select>

                                    </div>
                                    
                                      <div class="col-sm-12 " style="margin-top:150px;">
                                      
                                        <div class="col-sm-8 col-sm-offset-2">
                                        <button type="submit" class="btn btn-block bt-lg btn-success" name="submit">Add Users</button>
                                        <span></span>
                                        </div>
                                        </div>
                                    </div>

                                
                            </form>
                
                 </div>
                  </div>
                   </div>
                   </div>

        <div id="myModal1" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Manage Users From Project</h4>
            </div>
            <div class="modal-body" style="overflow: scroll;height:400px;">
                <h3 style="text-decoration:underline;">ADMIN</h3>
               <?php
                    $sql = "select * from websiteusers w where  w.username  in (select user_name from user_task ut,websiteusers w, tasks t where t.idtasks=ut.taskid and ut.user_name=w.username and ut.taskid='$idtask' and ut.can_edit ='1');";
                    $result = mysql_query($sql) or die(mysql_error());
                    while($rws = mysql_fetch_array($result)){ 
                    ?>    
                    <div style="display:inline">
                        <div class="row"  >

                            <div class="col-sm-3 hidden-xs" >

                              <img class="img-rounded " src="<?php echo $rws['picture']?>"style="height:100px;width:100px;  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                            </div>
                        <div class="col-sm-9 " >
                        <h3><?php echo $rws['firstname'] ?></h3>
                        <span class="text-muted">
                         <strong>Username: </strong><?php  echo  $rws['username']?><a href="removeUser.php?username1=<?php  echo  $rws['username']?>&taskid=<?php  echo  $idtask?>" style="text-decoration:none;">
                          </span>
                         <button class="btn btn-danger pull-right ">Remove</button></a>
                     
                      </div>
                            </div>
                     </div>
                     <hr/>
                      <?php } ?> 
                <h3 style="text-decoration:underline;">USERS</h3>
                       <?php
                    $sql = "select * from websiteusers w where  w.username  in (select user_name from user_task ut,websiteusers w, tasks t where t.idtasks=ut.taskid and ut.user_name=w.username and ut.taskid='$idtask' and ut.can_edit ='0');";
                    $result = mysql_query($sql) or die(mysql_error());
                    while($rws = mysql_fetch_array($result)){ 
                    ?>
                    
                    <div style="display:inline">
                        <div class="row">

                            <div class="col-sm-3 hidden-xs" >

                        <img class="img-rounded " src="<?php echo $rws['picture']?>"style="height:100px;width:100px;  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
          </div>
                    <div class="col-sm-9 " >
                     <h3><?php echo $rws['firstname'] ?></h3>
                     <span class="text-muted">
                      
                         <strong>Username: </strong><?php  echo  $rws['username']?>><a href="removeUser.php?username1=<?php  echo  $rws['username']?>&taskid=<?php  echo  $idtask?>" style="text-decoration:none;">
                          </span>
                         <button class="btn btn-danger pull-right ">Remove</button></a>
                     <a href="makeAdmin.php?projectid=<?php  echo  $rws['username']?>" style="text-decoration:none;"><button class="btn btn-success pull-right" style="margin-right:5px;">Make Admin</button></a>
                      </div>
                            </div>
                     </div>
                     <hr/>
                      <?php } ?> 
                
                 </div>
                  </div>
                   </div>
                   </div>           

    
 


                
                   
    <div class="col-sm-5">
        
    <div class="box box-success" style="height: 600px;">
        <div class="box-header with-border text-center">
                <h2> Notice Board </h2>
        </div>
          <div class="box-body text-center" >
              <div class="col-xs-12">
              <textarea row='5'style='width:100%' placeholder="Add to Notice Board"></textarea>
              
              </div>
              <div class="col-xs-4 pull-right">
              <button class="btn btn-lg btn-block btn-success ">Post</button>
                  </div>
              <marquee behavior="scroll" direction="up" scrollamount="3" class="col-sm-12" style="margin-top:10px,height:100%" height="350px">
                  
                  <h2><strong>Admin</strong> Wrote:</h2>
                  <p>
              It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                 
              </marquee>
              
              
        </div>
         
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-sm-4 text-center">
    <div class="box box-success">
            <div class="box-header with-border text-center">
                <h2> Chat Box </h2>
            </div>
            <div class="box-body">
              <div class="box-body">
              <div class="container-fluid">
                  <a href="chatGroup.php?taskid=<?php echo $idtask ?>">
                  <div class="text-center col-md-offset-1 col-md-3" >
                    <img class="groupChat" src="https://cdn3.iconfinder.com/data/icons/pix-glyph-set/50/520643-group-512.png"/>
                    <span class="caption"><h5 style="overflow:hidden;text-overflow:ellipses">Group Chat</h5></span>
                    </div>
                 </a>
               
                 <?php
                 $sql ="SELECT user_name FROM user_task where taskid = '$idtask' and user_name != '$userName';";
                 $result = mysql_query($sql) or die(mysql_error());
                 while($rws = mysql_fetch_array($result)){ 
                        
                 $chatuser = $rws['user_name'];       
                 $sql1 ="SELECT username,firstname,picture,activeStatus FROM websiteusers where username = '$chatuser';";
                 $result1 = mysql_query($sql1) or die(mysql_error());
                  if(mysql_num_rows($result1)==1){
                      $rws1 = mysql_fetch_array($result1);
                      if($rws1['activeStatus']=='0'){
                          $status = "gray";
                      }
                      else{
                           $status = "#80f906";
                      }
                 ?>
                 <a href="chat.php?taskid=<?php echo $idtask ?>&username1=<?php echo $rws1['username']?>">
                  <div class="text-center col-md-offset-1 col-md-3">
                    <img class="userIcon" style=" border:  6px double <?php echo $status;?>;" src="<?php echo $rws1['picture']?>"/>
                    <span class="caption"><h5 style="overflow:hidden;text-overflow:ellipses"><?php echo $rws1['firstname']?></h5></span>
                    </div>
                 </a>
                 <?php }}?>
                 
                  
                  
              </div>
            </div>
                
             
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      <div class="row">  
          <div class="col-sm-3 text-center">
        <div class="box box-success">
            
            <div class="box-body">
                 <strong><h2>Task Deadline :&nbsp;
                  </h2></strong>
                <h3 style="color:red;">9hrs 30min <span style="color:gray;">Remaining</span></h3>
                
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
          <!--- END DIV -->
      <div class="col-sm-3 ">
        <div class="box box-success">
            
            <div class="box-body">
                 <strong class="text-center"><h4>Upload File :&nbsp;
                     
                 <input type="filepicker" data-fp-apikey="Af43oW9RQQCugHqL5sbYPz" onchange="filepicker.pick({hide: true,maxSize: 25*1024*1024}, onSuccess(Blob){console.log(replaceHtmlChars(JSON.stringify(Blob)))}, onError(FPError){}, onProgress(FPProgress){})"data-fp-button-text="Add File">
                  </h4></strong>
                <button type="button" class="btn btn-info btn-lg btn-block" data-toggle="modal" data-target="#myModal2">All Files</button>
                <!-- Modal -->
                    <div id="myModal2" class="modal fade" role="dialog">
                            <div class="modal-dialog"  >

                                    <!-- Modal content-->
                                <div class="modal-content">
                                <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">All Files</h4>
      </div>
      <div class="modal-body" style="overflow: scroll;height:300px;">
          <a href="">
              <h3>File Name</h3>
              <h5 class="text-muted"><strong>Uploaded by: </strong>Shehroz</h5><hr/>
          </a>
           <a href="">
              <h3>File Name</h3>
              <h5 class="text-muted"><strong>Uploaded by: </strong>Shehroz</h5><hr/>
          </a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
                    </div>
                <!---Modal-->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
          <!----- END DIV --->
          
      <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                    <!-- Modal content-->
                                <div class="modal-content">
                                <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
                    </div>
                <!---Modal-->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        
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
                <span class="label label-success pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 70%"></div>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
<script>

while ($('#mybtn').is(':hidden')) {
    // device is == eXtra Small
} else {
    $('#mybody').attr('class','hold-transition skin-green sidebar-mini sidebar-collapse');
}
</script>
</body>
</html>
