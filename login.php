<?php
require_once 'connection/config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['login'])) 
    {
        $mysqli = new mysqli($dbhost,$dbuser,$dbpass,$dbname) or die($mysqli->error);
        
        /* User login process, checks if user exists and password is correct */
        
        // Escape email to protect against SQL injections
        $email = $mysqli->escape_string($_POST['email']);
        $password = $mysqli->escape_string($_POST['password']);
        $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");
        
        if ( $result->num_rows == 0 )
        {
            $_SESSION['message'] = "User does not exist!";
            ?>

            <script>
            alert('Invalid user');
            window.location.href='login.php?fail';
            </script>

        <?php
                
        }
        else
        {
            $user = $result->fetch_assoc();
            
			if(password_verify($password, $user["password"]))  
            {    
                $_SESSION['user_id'] = $user['user_id'];
				$_SESSION['fname'] = $user['fname'];
                $_SESSION['lname'] = $user['lname'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['type'] = $user['type'];
                $_SESSION['contact'] = $user['contact'];
            
                
                if($user['type'] == 'admin')
                {
					$result = mysqli_query($con, "UPDATE users
													SET login_status = 'Online'
													WHERE user_id = '$_SESSION[user_id]';");
                    header("location: admin/main.php");
                }
                else if($user['type'] == 'staff')
                {	
					$result = mysqli_query($con, "UPDATE users
								SET login_status = 'Online'
								WHERE user_id = '$_SESSION[user_id]';");
                    header("location: staff/main.php");
                }
                else if($user['type'] == 'customer')
                {
						$result = mysqli_query($con, "UPDATE users
						SET login_status = 'Online'
						WHERE user_id = '$_SESSION[user_id]';");
                    header("location: user/main.php");
                }
                            
                
            }
            else
            {
			     ?>
            <script>
            alert('Wrong Password');
            window.location.href='login.php?fail';
            </script>
            <?php
			   
            }
        }
    }
}
?>
<!DOCTYPE html>
<html data-ng-app="">
    <head>
        <title>LWE Buy Login</title>
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
                    Not a member?
                    <a class="btn btn-default btnreglogin" href="register.php">Register</a>
                </p>
            </div>
        </div>
        
        <div class="row loginrow2">
            <div class="col-xs-2 col-md-2 col-lg-2 col-xs-push-5 col-md-push-5 col-lg-push-5 center">
                <img src="resources/img/logo-box.PNG" width="50%" />
            </div>
        </div>
        
        <div class="row loginrow3">
            <div class="col-md-12 col-lg-12 hidden-xs hidden-sm">
                <div class="logincontainer">
                    <form action="login.php" method="post" autocomplete="off">
                        <p>
                            <label for="email">EMAIL ADDRESS </label><br/>
                            <input type="email" class="formfield" id="email" name="email" required autofocus/>
                        </p>

                        <p>
                            <label for="password">PASSWORD: </label>
                            <input type="password" class="formfield" id="password" name="password" required/>
                        </p>

                        <p><a href="forgotPassword.php">Forgot password?</a></p>

                        <p>
                            <button type="submit" class="btn btn-default btnlogin" name="login">Login</button>
                        </p>
                    </form>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 hidden-md hidden-lg">
                <div class="logincontainers">
                    <form action="login.php" method="post" autocomplete="off">
                        <div class="form-group">
                            <p>
                                <label for="email">EMAIL ADDRESS </label><br/>
                                <input type="email" class="formfield" id="email" name="email" required autofocus/>
                            </p>

                            <p>
                                <label for="password">PASSWORD </label>
                                <input type="password" class="formfield" id="password" name="password" required/>
                            </p>

                            <p class="fgtpass"><a href="forgotPassword.php">Forgot password?</a></p>

                            <p>
                                <button type="submit" class="btn btn-default btnlogin" name="login">Login</button>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>