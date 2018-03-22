<?php
require 'connection/config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['register'])) 
    {
        
        $mysqli = new mysqli($dbhost,$dbuser,$dbpass,$dbname) or die($mysqli->error);
        
        $email = $mysqli->escape_string($_POST['email']);
        
        $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");
        
        if ( $result->num_rows > 0 )
        {
            ?>
            <script>
            alert('This email already has an account, Please try other email');
            window.location.href='register.php?fail';
            </script>
            <?php
        }
        else
        {
            $lname = $_POST['lname'];
            $fname = $_POST['fname'];
            $email = $_POST['email'];
            $contact = $_POST['contact'];
            $password = $_POST['password'];
			$password = password_hash($password, PASSWORD_DEFAULT); 
			
			
            $sql = "INSERT INTO users (email, password, lname, fname, type, contact) VALUES ('$email', '$password', '$lname', '$fname', 'customer', '$contact')";
            mysqli_query($con, $sql);
            ?>
            <script>
            alert('Register Successful');
            window.location.href='login.php?success';
            </script>
            <?php
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
                    Already a member?
                    <a class="btn btn-default btnreglogin" href="login.php">Login</a>
                </p>
            </div>
        </div>
        
        <!--<div class="row regrow2">
            <div class="col-xs-2 col-md-2 col-lg-2 col-xs-push-5 col-md-push-5 col-lg-push-5 center">
                <img src="resources/img/logo-box.PNG" width="50%" />
            </div>
        </div>-->
        
        <div class="row loginrow3">
            <div class="col-md-12 col-lg-12 hidden-xs hidden-sm">
                <div class="logincontainer">
                    <form class="form-inline" action="register.php" method="post">
                        <p>
                            <label for="fname">First name</label><br/>
                            <input type="text" class="formfield" id="fname" name="fname" required autofocus/>
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

                        <p>
                            <label for="password">Password </label><br/>
                            <input type="password" class="formfield" id="password" name="password" data-ng-model="password" required/>
                        </p>

                        <p>
                            <label for="repassword">Retype password </label><br/>
                            <input type="password" class="formfield" id="repassword" name="repassword" data-ng-model="repassword" required/><br/>
                            <span data-ng-show="password!=repassword">Password does not match</span>
                        </p>

                        <p><button type="submit" class="btn btn-default btnlogin" name="register">Submit</button></p>
                    </form>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 hidden-md hidden-lg">
                <div class="logincontainers">
                    <form class="form-inline" action="register.php" method="post">
                        <p>
                            <label for="fname">First name</label><br/>
                            <input type="text" class="formfield" id="fname" name="fname" required autofocus/>
                        </p>

                        <p>
                            <label for="lname">Last name</label><br/>
                            <input type="text" class="formfield" id="lname" name="lname" required/>
                        </p>

                        <p>
                            <label for="email">Email </label><br/>
                            <input type="email" class="formfield" id="email" name="email" required/>
                        </p>

                        <p>
                            <label for="password">Password </label><br/>
                            <input type="password" class="formfield" id="password" name="password" data-ng-model="password" required/>
                        </p>

                        <p>
                            <label for="repassword">Retype password </label><br/>
                            <input type="password" class="formfield" id="repassword" name="repassword" data-ng-model="repassword" required/><br/>
                            <span data-ng-show="password!=repassword">Password does not match</span>
                        </p>

                        <p><button type="submit" class="btn btn-default btnlogin" name="register">Submit</button></p>
                    </form>
                </div>
            </div>
        </div>
    </body>    
</html>