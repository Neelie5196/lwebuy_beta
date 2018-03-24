<?php

require_once '../connection/config.php';
session_start();
$user_id = $_SESSION['user_id'];

$query = "SELECT *
           FROM users
           WHERE user_id='$user_id'";
$result = mysqli_query($con, $query);
$results = mysqli_fetch_assoc($result);

?>
<?php
if (isset($_POST['saveprofile']))
{
    $user_id = $_POST['user_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
	$cp = $_POST['cp'];
    $np = $_POST['np'];
    $cnp = $_POST['cnp'];
	
    $result = mysqli_query($con, "UPDATE users SET fname='$fname', lname='$lname', contact='$contact', email='$email' WHERE user_id=$user_id") or die(mysqli_error($con));
	
	
    if($cp != "" && $np!= "" && $cnp != "")
    {
        if($cp!=$np)
        {
            if($np==$cnp)
            {
				$password = $_POST['np'];
				$password = password_hash($password, PASSWORD_DEFAULT); 
                $result = mysqli_query($con, "UPDATE users SET password='$password' WHERE user_id=$user_id") or die(mysqli_error($con));
            }
            else
            {
                ?>
                <script>
                alert('Make sure new password and confirm password are match.');
				window.location.href='main.php#user';
                </script>
                <?php
            }
        }
        else
        {
            ?>
            <script>
            alert('Make sure new password different with old password.');
            window.location.href='main.php#user';
            </script>
            <?php
        }
    }
    ?>
		<script>
		alert('Successfully Update');
        window.location.href='main.php#user';
        </script>
		<?php
}
  
?>

<div class="col-xs-12 col-md-12 col-lg-12">
    <h2 class="bigh2 pagetitle hidden-xs hidden-sm">My Profile</h2>
    
    <h2 class="smh2 pagetitle hidden-md hidden-lg">My Profile</h2>
    
    <div class="row profilecontainer hidden-xs hidden-sm">
        <form class="form-inline left" action="user.php" method="post">
            <p>
                <label for="fname">First name</label><br/>
                <input type="text" class="formfield" id="fname" name="fname" value="<?php echo $results['fname']; ?>" required/>
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
			</p>

            <p>
                <label for="lname">Last name</label><br/>
                <input type="text" class="formfield" id="lname" name="lname" value="<?php echo $results['lname']; ?>" required/>
            </p>

            <p>
                <label for="contact">Contact number </label><br/>
                <input type="text" class="formfield" id="contact" name="contact" value="<?php echo $results['contact']; ?>" required/>
            </p>

            <p>
                <label for="email">Email </label><br/>
                <input type="email" class="formfield" id="email" name="email" value="<?php echo $results['email']; ?>" required/>
            </p>

            <p><button type="button" class="btn btn-link btntab" onclick="funcShowChgPassword()" id="btnShowChg">Click here to change password</button></p>
            
            <div id="chgPass">
                <p>
                    <label for="password">Current Password </label><br/>
                    <input type="password" class="formfield" id="cp" name="cp"value="<?php echo $results['password']; ?>" readonly required/>
                </p>

                <p>
                    <label for="password">New Password </label><br/>
                    <input type="password" class="formfield" id="np" name="np" onkeyup="checkPass()" />
                </p>

                <p>
                    <label for="repassword">Retype New Password </label><br/>
                    <input type="password" class="formfield" id="cnp" name="cnp" onkeyup="checkPass()" /><br/>
                    <span id="passno">Password does not match</span>
                </p>
                
                <p><button type="button" class="btn btn-link btntab" onclick="funcHideChgPassword()">Click here hide password section</button></p>
            </div>
            
            <p><button type="submit" class="btn btn-default btnAdd" name="saveprofile">Save</button></p>
        </form>
    </div>
    
    <div class="row profilecontainers hidden-md hidden-lg">
        <form class="form-inline left" action="user.php" method="post">
            <p>
                <label for="fname">First name</label><br/>
                <input type="text" class="formfield" id="fname" name="fname" required/>
            </p>

            <p>
                <label for="lname">Last name</label><br/>
                <input type="text" class="formfield" id="lname" name="lname" required/>
            </p>

            <p>
                <label for="contact">Contact number </label><br/>
                <input type="text" class="formfield" id="contact" name="contact" required/>
            </p>

            <p>
                <label for="email">Email </label><br/>
                <input type="email" class="formfield" id="email" name="email" required/>
            </p>
            
            <p><button type="button" class="btn btn-link btntab" onclick="funcShowChgPasswords()" id="btnShowChgs">Click here to change password</button></p>
            
            <div id="chgPasss">
                <p>
                    <label for="password">Current Password </label><br/>
                    <input type="password" class="formfield" id="curpasswords" name="curpassword"/>
                </p>

                <p>
                    <label for="password">New Password </label><br/>
                    <input type="password" class="formfield" id="newpasswords" name="newpassword" onkeyup="checkPasss()" />
                </p>

                <p>
                    <label for="repassword">Retype New Password </label><br/>
                    <input type="password" class="formfield" id="renewpasswords" name="renewpassword" onkeyup="checkPasss()" /><br/>
                    <span id="passnos">Password does not match</span>
                </p>
                
                <p><button type="button" class="btn btn-link btntab" onclick="funcHideChgPasswords()">Click here hide password section</button></p>
            </div>

            <p><button type="submit" class="btn btn-default btnAdd" name="saveprofile">Save</button></p>
        </form>
    </div>
</div>