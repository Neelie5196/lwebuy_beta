<?php
require 'connection/config.php';
session_start();

if(isset($_GET['email']) && isset($_GET['code']))
{
	$email=$_GET['email'];
	$code=$_GET['code'];
	$query = "select email from users where email='$email' and code='$code'";
	$result = mysqli_query($con, $query);
	
	if(mysqli_num_rows($result)==1)
	{
		while($row=mysqli_fetch_array($result))
		{
			$email=$row['email'];
		}
		$update_user=mysqli_query($con,"UPDATE users SET verify='yes' where email='$email'")or die(mysqli_error($con));

		?>
		<script>
		alert('Your email had been activated, you can login now');
		window.location.href='login.php?success';
		</script>
		<?php
	}
	else{
		?>
		<script>
		alert('Some error occurred,Please try again');
		window.location.href='login.php?fail';
		</script>
		<?php
	}
}

?>