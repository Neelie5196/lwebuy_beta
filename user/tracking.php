<?php

require_once '../connection/config.php';
session_start();

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
        <link href="../frameworks/css/style.css" rel="stylesheet"/>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
        
    </head>

    <body background="../resources/img/bg.jpg">
        <div class="row">
            <?php include_once('nav.php')?>
        </div>

        <center>
            <div class="container">
                <div class="row" style="padding-top: 50px; padding-bottom: 25px;">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <img src="../resources/img/logo.png" width="200" height="75">
                    </div>
                </div>
                <div class="row" style="padding-bottom: 25px;">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <h2>Track Logistics Worldwide Express</h2>
                    </div>
                </div>
            </div>

            <section class = "content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <form action="track.php" method="post" enctype="multipart/form-data">
                                <div class="row" style="padding-bottom: 25px;">
                                    <div class="col-xs-12 col-md-12 col-lg-12">
                                        <textarea name="hawb" cols="25" rows="5" class="form-control" placeholder="Enter tracking number here" style="border-radius: 30px; width: 25%;" autocomplete="off" required></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Track <span class="glyphicon glyphicon-search"></span></button>
                            </form>                            
                        </div>
                    </div>
                </div>
            </section>
        </center>
    </body>
</html>