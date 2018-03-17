<?php

require_once '../connection/config.php';
session_start();
$user_id = $_SESSION['user_id'];
$order_list_id = $_GET['order_list_id'];

$query = "SELECT *
          FROM order_item
          WHERE order_list_id = '$order_list_id'";
$result = mysqli_query($con, $query);

$query1 = "SELECT *
          FROM country
          WHERE country_name = 'MYR'";
$result1 = mysqli_query($con, $query1);
$results1 = mysqli_fetch_assoc($result1);

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

		<!-- AngularJS -->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
		
        <!--stylesheet-->
        <link href="../frameworks/css/style.css" rel="stylesheet"/>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
        <style>
            .vl {
                border-left: 1px solid lightgrey;
                height: 200px;
            }
            .details p{
                font-size: 100%;
            }
        </style>
    </head>

    <body background="../resources/img/bg.jpg" ng-app="">
        <div class="row">
            <?php include_once('nav.php')?>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-6">
                    <h2>Payment</h2>
                </div>
            </div>
            
            <section class="content">
                <div class="row">
                    <center>
                        <div class="col-xs-8 col-md-8 col-lg-8 jumbotron">
                            <?php 
                                if(mysqli_num_rows($result) > 0)
                                {
                                    $counter = 0;
                                    $total = 0;
                                ?>
                                <h3>Purchase Product List</h3>
                                <table class="table thead-bordered table-hover" style="width:100%">
                                    <tbody>
                                        <tr>
                                            <th>#</th>
                                            <th style="text-align:left;"><strong>Name</strong></th>
                                            <th style="text-align:left;"><strong>Link</strong></th>
                                            <th style="text-align:left;"><strong>Type</strong></th>
                                            <th style="text-align:right;"><strong>Quantity</strong></th>
                                            <th style="text-align:right;"><strong>U.Price</strong></th>
                                            <th style="text-align:left;"><strong>Remark</strong></th>
                                        </tr>
                                        <?php
                                        while($row = mysqli_fetch_array($result))
                                        {
                                            $counter++;
                                            ?>
                                            <tr>
                                                <td><?php echo $counter; ?></td>
                                                <td style="text-align:left;"><strong><?php echo $row['order_item']; ?></strong></td>
                                                <td style="text-align:left;"><a href="<?php echo $row['link']; ?>" target="_blank">Item Link</a></td>
                                                <td style="text-align:left;"><?php echo $row['type']; ?></td>
                                                <td style="text-align:right;"><?php echo $row['quantity']; ?></td>
                                                <td style="text-align:right;"><?php echo "¥ ".$row['price']; ?></td>
                                                <td style="text-align:left;"><?php echo $row['remark']; ?></td>
                                            </tr>
                                        <?php
                                            $total += ($row["price"]*$row["quantity"]);
                                            $total_pay = $total*$results1['country_currency'];
                                        }
                                        ?>
                                        <tr>
                                            <td colspan="8" style="text-align:right;"><strong>Total Pay:</strong> <h3><?php echo $results1['country_name']." ".number_format((float)$total_pay, 2, '.', ''); ?></h3></td>
                                            
                                            <input class="form-control" name="total_pay" type="hidden" value="<?php echo number_format((float)$total, 2, '.', ''); ?>">
                                            <input class="form-control" name="currency" type="hidden" value="<?php echo $results1['country_currency']; ?>">
                                        </tr>
                                    </tbody>
                                </table>
                            <?php
                                }
                            ?>
                            <div class="row">
                                <div class="col-xs-12 col-md-6 col-lg-6">
                                    <form action="#.php" method="post" enctype="multipart/form-data">
                                        <h3>Upload Banking Receipt</h3>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <label>Transaction receipt: </label>
                                                <input type="file" name="file" required/>
                                                <br/>
                                                <input type="submit" class="btn btn-success" name="submit" value="Upload">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-xs-12 col-md-1 col-lg-1">
                                    <div class="vl"></div>
                                </div>
                                <div class="col-xs-12 col-md-5 col-lg-5">
                                    <form action="#.php" method="post">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <br />
                                                <p> point</p>
                                                <input type="submit" class="btn btn-success" name="pay" value="Pay Now">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4 col-md-4 col-lg-4 jumbotron">
                            <div class="row">
                                <div class="col-xs-12 col-md-12 col-lg-12">
                                    <p>Banking Details </p>
                                    <div class="details">
                                        <p>Bank: Maybank</p>
                                        <p>Account No: 123456789</p>
                                        <p>Account Name: Logistics Worldwide Express(M) Sdn Bhd</p>
                                        <?php
                                            $query2 = "SELECT * FROM point WHERE user_id='$user_id'";
                                            $result2 = mysqli_query($con, $query2);
                                            $results2 = mysqli_fetch_assoc($result2);

                                            if($results2 > 0){
                                                ?>
                                                    <input type="hidden" name="point" class="form-control" value="<?php echo $results2['point']; ?>">
                                                    <p>Current point: <?php echo $results2['point']; ?></p>
                                                <?php
                                            }else{
                                                ?>
                                                    <p>Current point: 0</p>
                                                <?php
                                            }
                                        ?>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </center>
                </div>
            </section>
            <div id="topupModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="reload.php" method="post" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h4 class="modal-title">Point Reload</h4>
                            </div>

                            <div class="modal-body">
                                <p>Enter point amount to reload</p>
                                <p>
                                    <input type="number" name="reloadamt" ng-model="reloadamt" ng-init="reloadamt=1"/>
                                </p>

                                <p>
                                    <input type="hidden" name="amount" value="{{reloadamt*<?php echo $results['value']; ?>}}">
                                    Amount to be paid: RM {{reloadamt*<?php echo $results['value']; ?> | number:2}}
                                </p>

                                <p>Instructions for top up:<br/>
                                    Please bank in amount to the following bank account and submit transaction details. Thank you.</p>
                                <p>
                                    Bank: Maybank<br/>
                                    Account No.: 123456789<br/>
                                    Account name: Logistics Worldwide Express(M) Sdn Bhd
                                </p>

                                <label for="file">Transaction receipt: </label>
                                <input type="file" name="file" id="file" required/>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" name="transaction">Submit</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>                                                    
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>