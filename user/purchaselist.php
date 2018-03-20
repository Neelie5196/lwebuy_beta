<?php

require_once '../connection/config.php';
session_start();
$user_id = $_SESSION['user_id'];

$query1 = "SELECT *
           FROM order_list
           WHERE user_id='$user_id' AND status = 'request'
           ORDER BY datetime desc";
$result1 = mysqli_query($con, $query1);

$query2 = "SELECT *
           FROM order_list
           WHERE user_id='$user_id' AND status = 'ready to pay'
           ORDER BY datetime desc";
$result2 = mysqli_query($con, $query2);

$query3 = "SELECT *
           FROM order_list
           WHERE user_id='$user_id' AND status = 'paid'
           ORDER BY datetime desc";
$result3 = mysqli_query($con, $query3);

$query4 = "SELECT *
           FROM order_list
           WHERE user_id='$user_id' AND status = 'proceed'
           ORDER BY datetime desc";
$result4 = mysqli_query($con, $query4);

$query5 = "SELECT *
           FROM order_list
           WHERE user_id='$user_id' AND status = 'received'
           ORDER BY datetime desc";
$result5 = mysqli_query($con, $query5);

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
                <h2>Purchase</h2>
                <hr/>

                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <p class="right">
                            <a href='message.php' class='btn btn-default' name='contact'>Contact Admin</a>
                            <a href='purchase.php' class='btn btn-default' name='new'>New Purchase</a>
                        </p>
                    </div>
                </div>

                <div class="row botmar">
                    <div class="col-xs-12 col-md-12 col-lg-12 rowhead">
                        <strong>Request (<?php echo mysqli_num_rows($result1); ?>)</strong>
                        <?php
                            if(mysqli_num_rows($result1)>0){
                                ?>
                                    <button class="btn btn-success fltright" type="button" data-toggle="collapse" data-target="#collapse1">More</button>
                                <?php
                            }else{
                                
                            }
                        ?>
                    </div>
                </div>

                <section class="content">
                    <div class="row botmar">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <div class="span12 collapse" id="collapse1">
                                <?php 
                                    if(mysqli_num_rows($result1) > 0)
                                    {
                                    ?>
                                    <table class="table thead-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Order#</th>
                                                <th>Placed on</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                    <?php
                                        while($row = mysqli_fetch_array($result1))
                                        {
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td width="5%"><?php echo $row['order_list_id']; ?></td>
                                                    <td width="50%"><?php echo $row['datetime']; ?></td>
                                                    <td width="30%"><?php echo $row['status']; ?></td>
                                                    <td width="15%"><a href="#.php?order_list_id=<?php echo $row['order_list_id']; ?>" class="btn btn-xs btn-default">View</a></td>
                                                </tr>
                                            </tbody>
                                            <?php
                                            }
                                        }
                                    ?>
                                </table>       
                            </div>
                        </div>
                    </div>
                </section>

                <div class="row botmar">
                    <div class="col-xs-12 col-md-12 col-lg-12 rowhead">
                        <strong>Ready to Pay (<?php echo mysqli_num_rows($result2); ?>)</strong>
                        <?php
                            if(mysqli_num_rows($result2)>0){
                                ?>
                                    <button class="btn btn-success fltright" type="button" data-toggle="collapse" data-target="#collapse2">More</button>
                                <?php
                            }else{
                                
                            }
                        ?>
                    </div>
                </div>

                <section class="content">
                    <div class="row botmar">
                        <div class="span12 collapse" id="collapse2">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <?php 
                                    if(mysqli_num_rows($result2) > 0)
                                    {
                                    ?>
                                    <table class="table thead-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Order#</th>
                                                <th>Placed on</th>
                                                <th>Total Price (¥)</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                    <?php 
                                        while($row = mysqli_fetch_array($result2))
                                        {
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td width="5%"><?php echo $row['order_list_id']; ?></td>
                                                    <td width="40%"><?php echo $row['datetime']; ?></td>
                                                    <td width="20%"><?php echo $row['price']; ?></td>
                                                    <td width="20%"><?php echo $row['status']; ?></td>
                                                    <td width="15%"><a href="#.php?order_list_id=<?php echo $row['order_list_id']; ?>" class="btn btn-xs btn-default">View</a></td>
                                                </tr>
                                            </tbody>
                                            <?php
                                            }
                                        }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="row botmar">
                    <div class="col-xs-12 col-md-12 col-lg-12 rowhead">
                        <strong>Ready to Proceed (<?php echo mysqli_num_rows($result3); ?>)</strong>
                        <?php
                            if(mysqli_num_rows($result3)>0){
                                ?>
                                    <button class="btn btn-success fltright" type="button" data-toggle="collapse" data-target="#collapse3">More</button>
                                <?php
                            }else{
                                
                            }
                        ?>
                    </div>
                </div>

                <section class="content">
                    <div class="row botmar">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <div class="span12 collapse" id="collapse3">
                                 <?php 
                                    if(mysqli_num_rows($result3) > 0)
                                    {
                                    ?>
                                    <table class="table thead-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Order#</th>
                                                <th>Placed on</th>
                                                <th>Total Price (¥)</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                    <?php
                                        while($row = mysqli_fetch_array($result3))
                                        {
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td width="5%"><?php echo $row['order_list_id']; ?></td>
                                                    <td width="40%"><?php echo $row['datetime']; ?></td>
                                                    <td width="20%"><?php echo $row['price']; ?></td>
                                                    <td width="20%"><?php echo $row['status']; ?></td>
                                                    <td width="15%"><a href="#.php?order_list_id=<?php echo $row['order_list_id']; ?>" class="btn btn-xs btn-default">View</a></td>
                                                </tr>
                                            </tbody>
                                            <?php
                                            }
                                        }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="row botmar">
                    <div class="col-xs-12 col-md-12 col-lg-12 rowhead">
                        <strong>Proceeded (<?php echo mysqli_num_rows($result4); ?>)</strong>
                        <?php
                            if(mysqli_num_rows($result4)>0){
                                ?>
                                    <button class="btn btn-success fltright" type="button" data-toggle="collapse" data-target="#collapse4">More</button>
                                <?php
                            }else{
                                
                            }
                        ?>
                    </div>
                </div>

                <section class="content">
                    <div class="row botmar">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <div class="span12 collapse" id="collapse4">
                                <?php 
                                    if(mysqli_num_rows($result4) > 0)
                                    {
                                    ?>
                                    <table class="table thead-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Order#</th>
                                                <th>Placed on</th>
                                                <th>Total Price (¥)</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                    <?php
                                        while($row = mysqli_fetch_array($result4))
                                        {
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td width="5%"><?php echo $row['order_list_id']; ?></td>
                                                    <td width="40%"><?php echo $row['datetime']; ?></td>
                                                    <td width="20%"><?php echo $row['price']; ?></td>
                                                    <td width="20%"><?php echo $row['status']; ?></td>
                                                    <td width="15%"><a href="#.php?order_list_id=<?php echo $row['order_list_id']; ?>&timeline=Shipping" class="btn btn-xs btn-default">View</a></td>
                                                </tr>
                                            </tbody>
                                            <?php
                                            }
                                        }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
                
                <div class="row botmar">
                    <div class="col-xs-12 col-md-12 col-lg-12 rowhead">
                        <strong>Received (<?php echo mysqli_num_rows($result5); ?>)</strong>
                        <?php
                            if(mysqli_num_rows($result5)>0){
                                ?>
                                    <button class="btn btn-success fltright" type="button" data-toggle="collapse" data-target="#collapse4">More</button>
                                <?php
                            }else{
                                
                            }
                        ?>
                    </div>
                </div>

                <section class="content">
                    <div class="row botmar">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <div class="span12 collapse" id="collapse4">
                                <?php 
                                    if(mysqli_num_rows($result5) > 0)
                                    {
                                    ?>
                                    <table class="table thead-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Order#</th>
                                                <th>Placed on</th>
                                                <th>Total Price (¥)</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                    <?php
                                        while($row = mysqli_fetch_array($result5))
                                        {
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td width="5%"><?php echo $row['order_list_id']; ?></td>
                                                    <td width="40%"><?php echo $row['datetime']; ?></td>
                                                    <td width="20%"><?php echo $row['price']; ?></td>
                                                    <td width="20%"><?php echo $row['status']; ?></td>
                                                    <td width="15%"><a href="#.php?order_list_id=<?php echo $row['order_list_id']; ?>&timeline=Shipping" class="btn btn-xs btn-default">View</a></td>
                                                </tr>
                                            </tbody>
                                            <?php
                                            }
                                        }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </center>
        </div>
    </body>
</html>