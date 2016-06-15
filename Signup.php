<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'components/login-check.php' ;
        
        include 'twitterconfigSignup.php';
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
        <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body style="  background-image: url(images/bg.png);">

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
                    <div class="col-sm-6 col-sm-offset-3 form-box">
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Register to our site</h3>
                                <p>Enter your credentials to create your account:</p>
                            </div>
                            <div class="form-top-right">
                                <i class="fa fa-lock"></i>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <form role="form" action="connectivity-sign-up.php" method="post" class="login-form">
                                <div class="form-group">
                                    <label for="inputName" class="sr-only">Name</label>
                                    <input type="text" id="name" name="name" minlength="3" class="form-control" placeholder="Firstname" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="inputLastName" class="sr-only">Name</label>
                                    <input type="text" id="lastname" name="lastname" minlength="3" class="form-control" placeholder="Lastname" required autofocus>
                                </div>
                                <div class="form-group" id="emailGroup">
                                    <label for="inputEmail" class="sr-only">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email" required autofocus onblur="validateSignUp(this.value,'email')">
                                    <span id="emailIcon"></span>
                                    <small id="emailStatus">                                        
                                        </small>
                                </div>
                                <div class="form-group" id="userGroup">

                                    <label class="sr-only" for="form-username">Username</label>
                                    <input id="user" type="text" name="user" placeholder="Username" minlength="5" class="form-username form-control" required autofocus onblur="validateSignUp(this.value,'user')">
                                    <span id="userIcon"></span>
                                    <small id="userStatus"> </small>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-password">Password</label>
                                    <input type="password" name="pass" placeholder="Password..." minlength="6" class="form-password form-control" required autofocus>
                                </div>
                                <div class="form-group">
                                <div class="g-recaptcha" data-sitekey="6LeJISETAAAAADyV7GgtUJcFZqO7p6HoT29n_YKR"></div>
                                </div>
                                <button type="submit" name="submit" class="btn">Sign Up!</button>
                                <div class="text-center">
                                    <h3 style="color:white;">Already have an account? <div class="btn btn-lg"><a id="sign" href="./Login.php">Sign In</a></div></h3>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 social-login animated fadeInUpBig">
                        <h2 style="color:white;">...or Connect with:</h2>
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