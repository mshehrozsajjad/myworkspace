        <!DOCTYPE html>
        <html lang="en">

        <head>
            <?php include 'components/login-check.php' ;

            include 'twitterconfig.php';
            ?>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>MyWorkSpace</title>

            <!-- CSS -->
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
            <link rel="stylesheet" href="css/bootstrap.min.css">
            <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
            <link rel="stylesheet" href="css/form-elements.css">
              <link href="css/animate.css" rel="stylesheet">
            <link rel="stylesheet" href="css/style.css">

            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->

            <!-- Favicon and touch icons -->
            <link rel="shortcut icon" href="assets/ico/favicon.png">
            <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
            <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
            <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
            <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

        </head>

        <body>`
            <script src="login_username_validity.js"></script>

            <!-- Top content -->
            <div class="top-content">

                <div class="inner-bg">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-8 col-sm-offset-2 text animated fadeInDownBig">
                                <h1><strong>MyWorkSpace</strong> Login Form</h1>
                                <div class="description">
                                    <p>

                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6  form-box">
                                <div class="form-top">
                                    <div class="form-top-left">
                                        <h3>Login to our site</h3>
                                        <p>Enter your username and password to log on:</p>
                                    </div>
                                    <div class="form-top-right">
                                        <i class="fa fa-lock"></i>
                                    </div>
                                </div>
                                <div class="form-bottom">
                                    <form role="form" action="connectivity-login.php" method="post" class="login-form" id="loginForm">
                                        <div class="form-group " id="userGroup">
                                            <label class="sr-only" for="form-username">Username</label>

                                            <input id="username" type="text" name="user" placeholder="Username..." class="form-username form-control"  required onblur="validate(this.value)">
                                            <span id="userIcon"></span>

                                            <small id="userStatus" >

                                            </small>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="form-password">Password</label>
                                            <input type="password" name="pass" placeholder="Password..." class="form-password form-control"  required >
                                             <small id="passwordStatus" >
                                                <?php  if (session_status() === PHP_SESSION_NONE) session_start();
                                                if(isset($_SESSION["WrongPass"])){ ?>
                                                <strong><span style="color:#ffbb33">WRONG PASSWORD</span> TRY AGAIN!</strong>
                                                <?php }?>
                                             </small>
                                        </div>
                                        <button type="submit" name="submit" class="btn">Sign in!</button>
                                        <div class="text-center">
                                        <h3 style="color:white;">Don't have an account? <div class="btn btn-lg"><a id="sign" href="./Signup.php">Register Now<a></div></h3>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="col-sm-6 social-login animated fadeInUpBig" style="margin-top:125px;">
                                <h2 style="color:white;">...or login with:</h2>
                                <div class="social-login-buttons">
                                    <a class="btn btn-link-2" href="./fbconfig.php">
                                        <i class="fa fa-facebook"></i> Facebook
                                    </a>
                                    <a class="btn btn-link-2" href="<?php echo strip_tags($url);?>">
                                        <i class="fa fa-twitter"></i> Twitter
                                    </a>

                                </div>
                            </div>

                    </div>
                </div>

            </div>


            <!-- Javascript -->
            <script src="js/jquery.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/jquery.backstrech.js"></script>
            <script src="js/scripts.js"></script>

            <!--[if lt IE 10]>
                <script src="assets/js/placeholder.js"></script>
            <![endif]-->

        </body>

        </html>