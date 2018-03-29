<?php
require_once '../connection/config.php';
session_start();
$payment_id = $_GET['payment_id'];

$query = "SELECT *
           FROM order_item
           WHERE payment_id='$payment_id'";
$result = mysqli_query($con, $query);

$query6 = "SELECT * FROM top_up WHERE payment_id='$payment_id'";
$result6 = mysqli_query($con, $query6);
$results6 = mysqli_fetch_assoc($result6);

$query7 = "SELECT *
            FROM payment
            WHERE payment_id='$payment_id'";
$result7 = mysqli_query($con, $query7);
$results7 = mysqli_fetch_assoc($result7);

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
                    <?php
                        if($results7['title'] != 'Pay order by Points'){
                            ?>
                                <a data-toggle="modal" class="btn btn-default btnReceipt verifyPayment" href="#verifyPayment">View Receipt</a>
                            <?php
                        }else{
                            ?>
                                <form method="post" action="paymentview.php?payment_id=<?php echo $payment_id; ?>">
                                    <input type="hidden" name="payment_id" value="<?php echo $_GET['payment_id']; ?>">
                                    <input type="submit" class="btn btn-success btnSend" name="approve" value="Pay by LWE point" />
                                </form>
                            <?php
                        }
                    ?>
                    </caption>
                </table>
            </div>
        </div>
        <div class="row">
            <form action="paymentss.php" method="post">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 updatecontainer">                        
                        <table class="purchasetable">                            
                            <tr>
                                <th>Name</th>
                                <th>Link</th>
                                <th>Category</th>
                                <th>Quantity</th>
                                <th>Remark</th>
                                <th>Unit Price (MYR)</th>
                                <th>Total Price (MYR)</th>
                            </tr>

                            <?php 
                                if(mysqli_num_rows($result) > 0)
                                {
                                    $total = 0;

                                    while($row = mysqli_fetch_array($result))
                                    {
                                        $total += $row['price']*$row['quantity'];
                            ?>
                            <tr class="bodyrow">
                                <input type="hidden" name="order_item_id[]" value="<?php echo $row['order_item_id']; ?>">
                                <td><?php echo $row['order_item']; ?></td>
                                <td><a href="#" class="btntab" onclick="window.open('<?php echo $row['link']; ?> ','','Toolbar=1,Location=0,Directories=0,Status=0,Menubar=0,Scrollbars=0,Resizable=0,fullscreen=yes');">View item</a></td>
                                <td><?php echo $row['category']; ?></td>
                                <td><?php echo $row['quantity']; ?></td>
                                <td><?php echo $row['remark']; ?></td>
                                <td><?php echo $row['price']; ?></td>
                                <td><?php echo number_format((float)$row['price']*$row['quantity'], 2, '.', ''); ?></td>
                            </tr>

                            
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
                                <td colspan="6" class="right">Total Amount (MYR) :</td>
                                <td class="right"><?php echo number_format((float)$total, 2, '.', ''); ?></td>
                            </tr>
                            <tr>
                                <td colspan="6" class="right">Total Paid (MYR) :</td>
                                <td class="right"><?php echo number_format((float)$results6['paid_amount'], 2, '.', ''); ?></td>
                                <input type="hidden" name="paid_amount" value="<?php echo number_format((float)$results6['paid_amount'], 2, '.', ''); ?>">
                            </tr>
                            <tr>
                                <td colspan="6" class="right">Total Top-up (MYR) :</td>
                                <td class="right"><?php echo number_format((float)$results6['top_up_amount'], 2, '.', ''); ?></td>
                                <input type="hidden" name="top_up_amount" value="<?php echo number_format((float)$results6['top_up_amount'], 2, '.', ''); ?>">
                                <input type="hidden" name="top_up_id" value="<?php echo $results6['top_up_id']; ?>">
                                <input type="hidden" name="payments_id" value="<?php echo $payment_id; ?>">
                            </tr>
                            
                        </table>

                        
                        <div class="btnpayview">
                            <p class="right">
                                <a href="main.php#purchase" class="btn btn-secondary btnCancel btnmargin">Cancel</a>
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
                        <h5 class="modal-title center" id="verifyPaymentTitle">Payment</h5>
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