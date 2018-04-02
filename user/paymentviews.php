<?php
require_once '../connection/config.php';
session_start();
$payment_id = $_GET['payment_id'];

$query = "SELECT *
           FROM item
           WHERE payment_id='$payment_id'";
$result = mysqli_query($con, $query);

$query1 = "SELECT * 
        FROM shipping s
        JOIN address a
        ON a.address_id = s.address_id
        WHERE payment_id='$payment_id'";
$result1 = mysqli_query($con, $query1);
$results1 = mysqli_fetch_assoc($result1);

$query2 = "SELECT * FROM top_up WHERE payment_id='$payment_id'";
$result2 = mysqli_query($con, $query2);
$results2 = mysqli_fetch_assoc($result2);

$query6 = "SELECT * FROM payment WHERE payment_id='$payment_id'";
$result6 = mysqli_query($con, $query6);
$results6 = mysqli_fetch_assoc($result6);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>LWE Buy</title>

        <meta name="viewport" content="width=device-width, initialscale=1.0"/>

        <!-- Angularjs -->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
        
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>    

        <!--stylesheet-->
        <link href="../frameworks/css/style.css" rel="stylesheet"/>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
        
        <script src="../frameworks/js/lwe.js"></script>
        <script src="../frameworks/js/prototype-barcode.js"></script>
        <script src="../frameworks/js/prototype.js"></script>

    </head>

    <body class="userbg">
        <div class="row updaterow1 center">
            <h2 class="bigh2 pagetitle hidden-xs hidden-sm">Payment Details</h2>

            <h2 class="smh2 pagetitle hidden-md hidden-lg">Payment Details</h2>
        </div>
        
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12 updatecontainer">
                <table class="purchasetable">
                    <caption> 
                        <a data-toggle="modal" class="btn btn-default btnReceipt verifyPayment" href="#verifyPayment">View Receipt</a>
                    </caption>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12 payviewsdetails">
                <p>Receipient Name : <?php echo $results1['recipient_name']; ?></p>
                <p>Receipient Contact : <?php echo $results1['recipient_contact']; ?></p>
                <p>Remark : <?php echo $results1['remark']; ?></p>
                <p>Address : <?php echo $results1['address'].", ".$results1['postcode'].", ".$results1['city'].", ".$results1['state']; ?></p>
                <p>Country : <?php echo $results1['country']; ?></p>
            </div>
        </div>
        <div class="row">
            <form action="paymentsss.php" method="post">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 updatecontainer">
                        <table class="purchasetable">
                            <tr>
                                <th>Item Name</th>
                                <th>Order Code</th>
                                <th>Weight</th>
                            </tr>

                            <?php 
                                if(mysqli_num_rows($result) > 0)
                                {
                                    $counter = 0;

                                    while($row = mysqli_fetch_array($result))
                                    {
                                        $counter++;

                            ?>
                            <tr class="bodyrow">
                                <td><?php echo $row['item_description']; ?></td>
                                <td><?php echo $row['order_code']; ?></td>
                                <td><?php echo $row['weight']; ?></td>
                            </tr>
                            <input type="hidden" name="numbers" value="<?php echo $counter; ?>">
                            <input type="hidden" name="item_id[]" value="<?php echo $row['item_id']; ?>">
                            <?php
                                    }

                                }
                            else
                            {
                            ?>

                            <tr>
                                <td colspan="8">Error!</td>
                            </tr>

                            <?php
                            }
                            ?>
                            <tr>
                                <td colspan="2" class="right">Total Weight (KG) :</td>
                                <td><?php echo $results1['weight']; ?></td>
                                <input type="hidden" name="weight" value="<?php echo $results1['weight']; ?>">
                            </tr>
                            <tr>
                                <td colspan="2" class="right">Total Outstanding Payment (MYR) :</td>
                                <td><?php echo $results1['price']; ?></td>
                                <input type="hidden" name="price" value="<?php echo $results1['price']; ?>">
                            </tr>
                            <tr>
                                <td colspan="2" class="right">Total Paid (MYR) :</td>
                                <td><?php echo $results2['paid_amount']; ?></td>
                                <input type="hidden" name="paid_amount" value="<?php echo $results2['paid_amount']; ?>">
                            </tr>
                            <tr>
                                <td colspan="2" class="right">Total Top-up (MYR) :</td>
                                <td><?php echo $results2['top_up_amount']; ?></td>
                                <input type="hidden" name="top_up_amount" value="<?php echo $results2['top_up_amount']; ?>">
                                <input type="hidden" name="top_up_id" value="<?php echo $results2['top_up_id']; ?>">
                                <input type="hidden" name="payments_id" value="<?php echo $results2['payment_id']; ?>">
                            </tr>
                        </table>

                        <div class="btnpayview">
                            <p class="right">
                                <a href="main.php#ship" class="btn btn-secondary btnCancel btnmargin">Cancel</a>
                                <input type="submit" class="btn btn-success btnSend btnmargin" name="payment" value="Payment" />
                            </p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
        <div class="modal fade" id="verifyPayment" tabindex="-1" role="dialog" aria-labelledby="verifyPaymentTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title center" id="verifyPaymentTitle">Receipt</h5>
                    </div>
                    <div class="modal-body left">
                        <img src="../receipts/<?php echo $results6['file']; ?>" style="width: 500px; height: 450px;">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                </div>
                </div>
            </div>
        </div>
    </body>
</html>