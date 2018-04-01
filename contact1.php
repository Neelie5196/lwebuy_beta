<?php
require_once 'connection/config.php';

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    if ($_POST['trackcode'] == null)
    {
        $trackcode = "";
    }
    else
    {
        $trackcode = $_POST['trackcode'];
    }
    
    $update = mysqli_query($con, "INSERT INTO contact SET name='$name', contact='$contact', email='$email', subject='$subject', trackcode='$trackcode', message='$message'");
    
    ?>

<script>
    alert("Message sent!");
    window.close();
</script>

<?php
}
?>

<!DOCTYPE html>
<html data-ng-app="myApp">
    <head>
        <title>LWE Buy</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initialscale=1.0"/>
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
        <div class="row contact">
            <div class="col-xs-12 col-md-8 col-lg-8 col-md-push-2 col-lg-push-2">
                <h1 class="bigh1 center hidden-xs hidden-sm">Leave us a message</h3>
                <h1 class="smh1 center hidden-md hidden-lg">Leave us a message</h3>
                
                <form action="contact1.php" method="post">
                    <p><input type="text" name="name" class="formfield" placeholder="Your Name (Required)" required autofocus /></p>

                    <p><input type="tel" name="contact" class="formfield" placeholder="Your Phone Number (Required)" required /></p>

                    <p><input type="email" name="email" class="formfield" placeholder="Your Email (Required)" required></p>

                    <p><input type="text" name="subject" class="formfield" placeholder="Subject (Required)" required></p>

                    <p><input type="text" name="trackcode" class="formfield" placeholder="Tracking Number (If Available)"></p>

                    <p><textarea cols="50" rows="5" class="formfield" name="message" placeholder="Enter your message here" required></textarea></p>

                    <p><input type="submit" class="btn btnAdd" name="submit" value="Submit"></p>
                </form>
            </div>
        </div>
    </body>
</html>