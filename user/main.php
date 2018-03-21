<?php

//require_once '../connection/config.php';
//session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>LWE Buy</title>

        <meta name="viewport" content="width=device-width, initialscale=1.0"/>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>    

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

    <body class="userbg">
        <div class="row">
            <?php include_once "../userbar.php" ?>
        </div>
        
        <div class="row userrow2 center" id="mainview">
            
        </div>
        
        <div class="row userrow4">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <p>
                    <a href="contact1.php"><span class="glyphicon glyphicon-envelope btnfoot" title="Email us"></span></a>
                    <a href="contact2.php"><span class="glyphicon glyphicon-earphone btnfoot" title="Call us"></span></a>
                    Copyright &copy; 2018 Logistics Worldwide Express. All Rights Reserved | Web Design by Clement, Samuel & Eileen
                </p>
            </div>
        </div>
    </body>
</html>