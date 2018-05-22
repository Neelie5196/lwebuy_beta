<?php

require_once '../connection/config.php';
session_start();

$user_id = $_SESSION['user_id'];
$email=$_GET['email'];
$query = "SELECT *
           FROM contact
           WHERE email='$email'";
$result = mysqli_query($con, $query);
$results = mysqli_fetch_assoc($result);
?>

<?php
if(isset($_POST['submit']))
{
	$email=$_POST['email'];
	$message = $_POST['message'];
	$to=$email;
	$subject="Reply:";
	$from = 'lwebuy.com';
	$body=$_POST['message'];;
	$headers = "From:".$from;
	mail($to,$subject,$body,$headers);
	?>
            <script>
            alert('Email Sent');
            window.close();
            </script>
     <?php	

}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>LWE Buy</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initialscale=1.0"/>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<!-- AngularJS -->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
		
        <!--stylesheet-->
        <link href="../frameworks/css/style.css" rel="stylesheet"/>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->

        <script src="../frameworks/js/lwe.js"></script>
    </head>
    <body class="userbg" ng-app="">
<div class="col-xs-12 col-md-12 col-lg-12">
    <h2 class="bigh2 pagetitle hidden-xs hidden-sm center" >Reply Message</h2>
    <h2 class="smh2 pagetitle hidden-md hidden-lg center">Reply Message</h2>
    
    <form name="sendmail" action="message.php" method="post">
        <div>
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div class="center">
						<p>
                            <label>Email:</label>
                            <input class="center msgformfield" name="email" type="text"  value="<?php echo $results['email']; ?>" disabled/>
                        </p>
                        <p><label>Message:</label></p>
                        <p><textarea class="msgfield" rows=10 cols=100 name="message"></textarea></p>
                        <p><input class="btn btn-sm btnGo" type="submit" name="submit" value="Send"/></p>
                    </div>
                </div>
        </div>
    </form>
</div>
  </body>
</html>