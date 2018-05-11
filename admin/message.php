<?php

require_once '../connection/config.php';
session_start();

$user_id = $_SESSION['user_id'];

$query = "SELECT *
           FROM contact
           WHERE m_id='$m_id'";
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
            window.location.href='main.php#adother';
            </script>
     <?php	

}
?>
<!DOCTYPE html>
<html>
<div class="col-xs-12 col-md-12 col-lg-12">
    <h2 class="bigh2 pagetitle hidden-xs hidden-sm">Reply Message</h2>
    <h2 class="smh2 pagetitle hidden-md hidden-lg">Reply Message</h2>
    <form name="sendmail" action="message.php" method="post">
        <div id="orate">
            <div class="row rateoutcontainer">
                <div class="col-xs-12 col-md-3 col-lg-3">
                    <div class="ratecontainer">
							<input type="hidden" name="m_id" value="<?php echo $m_id; ?>">
							<label>Email:</label>
							 <p><input class= "mail" name="email" type="text"  value="<?php echo $results['email']; ?>"/></p>
							 <label>Message:</label>
							<p><textarea type="text" name="message"></textarea></p>
							<input type="submit" name="submit" value="Send"/>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</html>