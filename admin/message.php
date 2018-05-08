<!DOCTYPE html>
<html>
<head>
<title>Reply</title>
</head>
<body>
<div class ="container">
<h2>Contact us!</h2>
<form name="sendemail" action="" method="post">
<label>Email:</label>
<input class= "mail" name="email" type="text"/>
<label>Message:</label>
<textarea type="text" name="message"></textarea>
<input type="submit" name="submit" value="Send"/>
</form>
<?php
if(isset($_POST['submit']))
{
	$email=$_POST['email'];
	
	$message = $_POST['message'];
	$to=$email;
	$subject="Sign up Confirmation";
	$from = 'lwebuy.com';
	$body=$_POST['message'];;
	$headers = "From:".$from;
	mail($to,$subject,$body,$headers);
	 ?>
            <script>
            alert('Email Sent');
            window.location.href='main.php#adother';
            </script>
     <?php
}
else{
	 ?>
            <script>
            alert('Something Wrong');
            window.location.href='main.php#adother';
            </script>
     <?php
}
?>
</div>
</body>
</html>