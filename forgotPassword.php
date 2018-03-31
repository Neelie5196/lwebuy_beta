<?php
session_start();
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>
<!DOCTYPE html>
<html data-ng-app="">
    <head>
        <title>Reset your password</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initialscale=1.0"/>
        
        <!-- Angularjs -->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
        
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <!--stylesheet-->
        <link href="frameworks/css/style.css" rel="stylesheet"/>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="linearbg">
        <div class="row loginrow1">
            <div class="col-xs-6 col-md-6 col-lg-6">
                <p>
                    <a href="index.php" class="aback">&lt;&emsp;Back to homepage</a>
                </p>
            </div>
            
            <div class="col-xs-6 col-md-6 col-lg-6 right">
                <p>
                    Already a member?
                    <a class="btn btn-default btnreglogin" href="login.php">Login</a>
                </p>
            </div>
        </div>
        <div class="row loginrow2">
            <div class="col-xs-2 col-md-2 col-lg-2 col-xs-push-5 col-md-push-5 col-lg-push-5 center">
                <img src="resources/img/logo-box.PNG" width="50%" />
            </div>
        </div>
        <!--<div class="row regrow2">
            <div class="col-xs-2 col-md-2 col-lg-2 col-xs-push-5 col-md-push-5 col-lg-push-5 center">
                <img src="resources/img/logo-box.PNG" width="50%" />
            </div>
        </div>-->
        <div class="row loginrow3">
            <div class="col-md-12 col-lg-12 hidden-xs hidden-sm">
				 <?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
			   <div class="logincontainer">
				<h2>Enter the Email of Your Account to Reset New Password</h2>
					<form class="form-inline" action="userAccount.php" method="post">
						<input type="email" class="formfield" id="email" name="email"  placeholder="EMAIL" required autofocus/>
						<p><button type="submit" class="btn btn-default btnlogin" name="register">Submit</button></p>
					</form>

                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 hidden-md hidden-lg">
				 <?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
			   <div class="logincontainers">
				<h2>Enter the Email of Your Account to Reset New Password</h2>
                    	<h2>Enter the Email of Your Account to Reset New Password</h2>
					<form class="form-inline" action="userAccount.php" method="post">
						<input type="email" class="formfield" id="email" name="email"  placeholder="EMAIL" required autofocus/>
						<p><button type="submit" class="btn btn-default btnlogin" name="register">Submit</button></p>
					</form>
                </div>
            </div>
        </div>
    </body>    
</html>
<body>
</body>