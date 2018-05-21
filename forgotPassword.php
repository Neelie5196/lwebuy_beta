<?php
require_once 'connection/config.php';
session_start();
?>
<?php
if(isset($_POST['forgotSubmit'])){
		$mysqli = new mysqli($dbhost,$dbuser,$dbpass,$dbname) or die($mysqli->error);
        /* User input email, checks if email exists  */
        
        // Escape email to protect against SQL injections
        $email = $mysqli->escape_string($_POST['email']);
        $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");
        
		if ( $result->num_rows == 0 )
        {
            $_SESSION['message'] = "User does not exist!";
            ?>

            <script>
            alert('No user');
            window.location.href='forgotpassword.php?fail';
            </script>

        <?php
                
        }
		else{
				$email = $_POST['email'];
				$uniqidStr = md5(uniqid(mt_rand()));;
				$updateforgotpass = mysqli_query($con, "UPDATE users SET forgot_pass_identity='$uniqidStr' WHERE email='$email'") or die(mysqli_error($con));
				$resetPassLink = 'localhost/lwebuy_beta/resetPassword.php?fp_code='.$uniqidStr;
	
				$to = $email;
				$subject = "Password Update Request";
				$mailContent = 'Dear User, 
				<br/>Recently a request was submitted to reset a password for your account. If this was a mistake, just ignore this email and nothing will happen.
				<br/>To reset your password, visit the following link: <a href="'.$resetPassLink.'">'.$resetPassLink.'</a>
				<br/><br/>Regards,
				<br/>LWECARE';
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				//additional headers
				$headers .= 'From: LWE<lwe@example.com>' . "\r\n";
				//send email
				mail($to,$subject,$mailContent,$headers);
			?>

            <script>
            alert('Please check your e-mail, we have sent a password reset link to your registered email');
            window.location.href='forgotpassword.php?;
            </script>

        <?php
		}
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

        <div class="row loginrow3">
            <div class="col-md-12 col-lg-12 col-xs-12">
                <div class="logincontainer">
				    <p>Enter the Email of Your Account to Reset Password</p>
                    
					<form class="form-inline" action="forgotPassword.php" method="post">
                        <p><input type="email" class="formfield" id="email" name="email"  placeholder="Email" required autofocus/></p>
						<p><button type="submit" class="btn btn-default btnlogin" name="forgotSubmit">Submit</button></p>
					</form>

                </div>
            </div>
        </div>
    </body>    
</html>
<body>
</body>