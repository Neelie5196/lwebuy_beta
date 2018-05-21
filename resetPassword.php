<?php
require_once 'connection/config.php';
session_start();
if(empty($_GET['fp_code']))
{
	$fp_code = '';
}else{
	$fp_code = $_GET['fp_code'];
}
if(isset($_POST['resetSubmit'])){
		
			  if($_POST['fp_code'] == ""){
				?>
				<script>
				alert('You does not authorized to reset new password of this account.');
				//window.location.href='resetpassword?fail';
				</script>
				<?php
			}else{
				 if($_POST['password'] !== $_POST['confirm_password']){
					 ?>
						<script>
						alert('Confirm password must match with the password.');
						window.location.href='resetpassword.php?fail';
						</script>
					 <?php
					 }
					 else{
						 $password = $_POST['password'];
						 $password = password_hash($password, PASSWORD_DEFAULT); 
						 $fp_code = $_POST['fp_code'];
						
		
						 $update_user=mysqli_query($con,"UPDATE users SET password='$password' WHERE forgot_pass_identity='$fp_code'")or die(mysqli_error($con));
							?>
							<script>
							alert('Your account password has been reset successfully. Please login with your new password.');
							window.location.href='login.php?success';
							</script>
							<?php
					 }
			}

}
?>

<!DOCTYPE html>
<html>
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
				    <p>Reset Your Password</p>
					<form class="form-inline" action="resetPassword.php" method="post">
					<input type="hidden" name="fp_code" class="formfield" value="<?php echo $fp_code ?>"/>
					<p><input type="password" name="password" class="formfield" placeholder="PASSWORD" required=""></p>
					<p><input type="password" name="confirm_password" class="formfield" placeholder="CONFIRM PASSWORD" required=""></p>
					<div class="send-button">
					
					<p><button type="submit" class="btn btn-default btnlogin" name="resetSubmit">Reset Password</button></p>
					</div>
			</form>

                </div>
            </div>
        </div>
    </body>   
</html>