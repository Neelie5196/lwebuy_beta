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

    <body>
        <div class="row">
            <?php include_once('nav.php')?>
        </div>
        
        <div class="container">
            <center>
                <h2>Purchase Product</h2>
                <hr/>
                <section class="content">
                    <div class="row botmar">
                        <div class="col-xs-12 col-md-12 col-lg-12 rowhead">
                            <strong>Product Details</strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <form method="post" action="addpurchase.php">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <label>Name:</label>
                                            </td>
                                            <td>
                                                <input class="form-control" name="name" type="text" required>
                                            </td>
                                            <td>
                                                <label>Link:</label>
                                            </td>
                                            <td>
                                                <input class="form-control" name="link" type="text" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Type:</label>
                                            </td>
                                            <td>
                                                <input class="form-control" name="type" type="text" required>
                                            </td>
                                            <td>
                                                <label>Quantity:</label>
                                            </td>
                                            <td>
                                                <input class="form-control" name="quantity" type="number" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Price:</label>
                                            </td>
                                            <td>
                                                <div class="input-group"> 
                                                    <span class="input-group-addon">¥</span>
                                                    <input class="form-control" name="price" type="number" value="0.01" min="0.01" step="0.01" required />
                                                </div>
                                            </td>
                                            <td>
                                                <label>Remark:</label>
                                            </td>
                                            <td>
                                                <input class="form-control" name="remark" type="text" required>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <input type="submit" class="btn btn-success fltright" name="add" value="Add to list">
                            </form>
                        </div>
                    </div>
                </section>
                <br/>
                <section class="content">
                    <div class="row botmar">
                        <div class="col-xs-12 col-md-12 col-lg-12 rowhead">
                            <strong>Purchase Product List</strong>
                            <button class="btn btn-danger fltright" type="button">Empty List</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <form method="post" action="addpurchase.php">
                                
                            </form>
                        </div>
                    </div>
                </section>
            </center>
        </div>
        
        <div><?php include('../footer.php') ?></div>
    </body>
</html>