<?php

require_once '../connection/config.php';
session_start();

$query = "SELECT *
        FROM order_item oi
        JOIN users us
        ON us.user_id = oi.user_id
        WHERE oi.status = 'request'
        GROUP BY oi.user_id";
$result = mysqli_query($con, $query);

$query1 = "SELECT *
        FROM order_item oi
        JOIN users us
        ON us.user_id = oi.user_id
        WHERE oi.status = 'ready to pay'
        GROUP BY oi.user_id";
$result1 = mysqli_query($con, $query1);

$query2 = "SELECT *
        FROM order_item oi
        JOIN payment p
        ON p.payment_id = oi.payment_id
        JOIN users us
        ON us.user_id = p.user_id
        WHERE oi.status = 'paid'
        GROUP BY oi.payment_id";
$result2 = mysqli_query($con, $query2);

$query3 = "SELECT *
        FROM order_item oi
        JOIN users us
        ON us.user_id = oi.user_id
        WHERE oi.status = 'proceed'
        GROUP BY oi.user_id";
$result3 = mysqli_query($con, $query3);

$query4 = "SELECT *
        FROM order_item oi
        JOIN users us
        ON us.user_id = oi.user_id
        WHERE oi.status = 'received'
        GROUP BY oi.user_id";
$result4 = mysqli_query($con, $query4);

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
        <center>
            <div class="row">
                <?php include_once('nav.php')?>
            </div>
            
            <div class="container">
                <h2>Order</h2>
                <hr/>
            </div>
            <section class="content">
                <div class="row botmar">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <?php 
                            if(mysqli_num_rows($result) > 0)
                            {
                            ?>
                            <table class="table thead-bordered table-hover" style="width:80%">
                                <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php
                                    while($row = mysqli_fetch_array($result))
                                    {
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $row['user_id']; ?></td>
                                                <td><?php echo $row['fname']." ".$row['lname']; ?></td>
                                                <td>
                                                    <a class="btn btn-default btn-xs" href="vieworder.php?user_id=<?php echo $row['user_id']; ?>&status=request">View</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <?php
                                    }
                                }else{
                                    ?>
                                        <p>There is no order request.</p>
                                    <?php
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="row botmar">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <?php 
                            if(mysqli_num_rows($result1) > 0)
                            {
                            ?>
                            <table class="table thead-bordered table-hover" style="width:80%">
                                <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php
                                    while($row = mysqli_fetch_array($result1))
                                    {
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $row['user_id']; ?></td>
                                                <td><?php echo $row['fname']." ".$row['lname']; ?></td>
                                                <td>
                                                    <a class="btn btn-default btn-xs" href="vieworder.php?user_id=<?php echo $row['user_id']; ?>&status=waiting">View</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <?php
                                    }
                                }else{
                                    ?>
                                        <p>There is no waiting payment.</p>
                                    <?php
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="row botmar">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <?php 
                            if(mysqli_num_rows($result2) > 0)
                            {
                            ?>
                            <table class="table thead-bordered table-hover" style="width:80%">
                                <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php
                                    while($row = mysqli_fetch_array($result2))
                                    {
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $row['user_id']; ?></td>
                                                <td><?php echo $row['fname']." ".$row['lname']; ?></td>
                                                <td>
                                                    <a class="btn btn-default btn-xs" href="vieworder.php?user_id=<?php echo $row['user_id']; ?>&status=paid">View</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <?php
                                    }
                                }else{
                                    ?>
                                        <p>There is no order paid.</p>
                                    <?php
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="row botmar">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <?php 
                            if(mysqli_num_rows($result3) > 0)
                            {
                            ?>
                            <table class="table thead-bordered table-hover" style="width:80%">
                                <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php
                                    while($row = mysqli_fetch_array($result3))
                                    {
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $row['user_id']; ?></td>
                                                <td><?php echo $row['fname']." ".$row['lname']; ?></td>
                                                <td>
                                                    <a class="btn btn-default btn-xs" href="vieworder.php?user_id=<?php echo $row['user_id']; ?>&status=proceed">View</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <?php
                                    }
                                }else{
                                    ?>
                                        <p>There is no order in proceed.</p>
                                    <?php
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="row botmar">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <?php 
                            if(mysqli_num_rows($result4) > 0)
                            {
                            ?>
                            <table class="table thead-bordered table-hover" style="width:80%">
                                <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php
                                    while($row = mysqli_fetch_array($result4))
                                    {
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $row['user_id']; ?></td>
                                                <td><?php echo $row['fname']." ".$row['lname']; ?></td>
                                                <td>
                                                    <a class="btn btn-default btn-xs" href="vieworder.php?user_id=<?php echo $row['user_id']; ?>&status=received">View</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <?php
                                    }
                                }else{
                                    ?>
                                        <p>There is no order received.</p>
                                    <?php
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </section>
        </center>
    </body>
</html>