<?php
if(isset($_GET['email']) && isset($_GET['code']))
{
	$email=$_GET['email'];
	$code=$_GET['code'];
	mysql_connect('localhost','root','');
	mysql_select_db('lwe_beta');
	$select=mysql_query("select email from users where email='$email' and code='$code'");
	if(mysql_num_rows($select)==1)
	{
		while($row=mysql_fetch_array($select))
		{
			$email=$row['email'];
		}
		$update_user=mysql_query("UPDATE users SET verify='yes' where email='$email'");

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