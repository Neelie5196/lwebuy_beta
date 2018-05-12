<?php
require_once '../connection/config.php';
session_start();

if ($_SESSION['user_id'] == "")
{
    header('location: ../login.php');
    exit();
}

$payment_id = $_GET['payment_id'];

$query = "SELECT *
           FROM order_item
           WHERE payment_id='$payment_id'";
$result = mysqli_query($con, $query);

$query6 = "SELECT * FROM payment WHERE payment_id='$payment_id'";
$result6 = mysqli_query($con, $query6);
$results6 = mysqli_fetch_assoc($result6);

$query15 = "SELECT *
           FROM order_item
           WHERE payment_id='$payment_id'";
$result15 = mysqli_query($con, $query15);

$query16 = "SELECT *
           FROM order_item
           WHERE payment_id='$payment_id'";
$result16 = mysqli_query($con, $query16);

if(isset($_POST['refundpayment']))
{       
    $order_item_id = $_POST['order_item_id'];
    $total_amount = $_POST['total_amount'];
    $refund_amount = $_POST['refund_amount'];
    $admin_charge = $_POST['admin_charge'];
    $transaction_code = $_POST['transaction_code'];
    $status = 'Declined';

    $result7 = mysqli_query($con, "UPDATE refund SET total_amount='$total_amount', refund_amount='$refund_amount', admin_charge='$admin_charge', transaction_code='$transaction_code' WHERE payment_id = '$payment_id'") or die(mysqli_error($con));

    $result13 = mysqli_query($con, "UPDATE payment SET status = '$status' WHERE payment_id = $payment_id ") or die(mysqli_error($con));

    for($i=0; $i<$_POST['numbers']; $i++){
        $result16 = mysqli_query($con, "UPDATE order_item SET payment_id = NULL WHERE order_item_id = $order_item_id[$i]") or die(mysqli_error($con));

    }
    ?>
    <script>
    alert('Success to Refund');
    window.location.href='main.php#adpayment';
    </script>
    <?php
}

if(isset($_POST['refundpayment1']))
{       
    $order_item_id = $_POST['order_item_id'];
    $total_amount = $_POST['total_amount'];
    $refund_amount = $_POST['refund_amount'];
    $admin_charge = $_POST['admin_charge'];
    $transaction_code = 'Refund Credit';
    $user_id = $_POST['user_id'];
    $status = 'Declined';

    $result17 = mysqli_query($con, "UPDATE refund SET total_amount='$total_amount', refund_amount='$refund_amount', admin_charge='$admin_charge', transaction_code='$transaction_code' WHERE payment_id = '$payment_id'") or die(mysqli_error($con));

    $result18 = mysqli_query($con, "UPDATE payment SET status = '$status' WHERE payment_id = $payment_id ") or die(mysqli_error($con));
    
    $result19 = mysqli_query($con, "UPDATE point SET point = point + '$refund_amount' WHERE user_id = $user_id ") or die(mysqli_error($con));

    for($i=0; $i<$_POST['numbers']; $i++){
        $result20 = mysqli_query($con, "UPDATE order_item SET payment_id = NULL WHERE order_item_id = $order_item_id[$i]") or die(mysqli_error($con));

    }
    ?>
    <script>
    alert('Success to Refund');
    window.location.href='main.php#adpayment';
    </script>
    <?php
}

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
            <h2 class="bigh2 pagetitle hidden-xs hidden-sm">Refund Payment Details</h2>

            <h2 class="smh2 pagetitle hidden-md hidden-lg">Refund Payment Details</h2>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12 updatecontainer">                        
                <table class="purchasetable">
                    <caption>
                    <?php
                        if($results6['title'] == 'Pay order by Points'){
                            echo $results6['title']." ".$results6['amount'];
                        }else if($results6['title'] == 'Pay Order by MOLPay'){
                            echo $results6['title']." ".$results6['amount'];
                        }else{
                            ?>
                                <a data-toggle="modal" class="btn btn-default btnReceipt declinePayment" href="#declinePayment">View Receipt</a>
                            <?php
                        }
                    ?>
                    </caption>
                </table>
            </div>
        </div>
        <div class="row">
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
                                $counter = 0;
                                $total = 0;

                                while($row = mysqli_fetch_array($result))
                                {
                                    $counter++;
                                    $total += $row['price']*$row['quantity'];
                        ?>
                        <tr class="bodyrow">
                            <td><?php echo $row['order_item']; ?></td>
                            <td><a href="#" class="btntab" onclick="window.open('<?php echo $row['link']; ?> ','','Toolbar=1,Location=0,Directories=0,Status=0,Menubar=0,Scrollbars=0,Resizable=0,fullscreen=yes');">View item</a></td>
                            <td><?php echo $row['category']; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td><?php echo $row['remark']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td><?php echo number_format((float)$row['price']*$row['quantity'], 2, '.', ''); ?></td>
                        </tr>

                        <input type="hidden" name="order_item_id[]" value="<?php echo $row['order_item_id']; ?>">
                        <input type="hidden" name="numbers" value="<?php echo $counter; ?>">
                        <?php
                                }

                            }
                        else
                        {
                        ?>

                        <tr>
                            <td colspan="7">Error!</td>
                        </tr>

                        <?php
                        }
                        ?>
                        <tr>
                            <td colspan="6" class="right">Total Outstanding Payment (MYR) :</td>
                            <td class="center"><?php echo number_format((float)$total, 2, '.', ''); ?></td>
                        </tr>

                    </table>


                    <div class="btnpayview">
                        <p class="right">
                            <a href="main.php#adpayment" class="btn btn-secondary btnCancel btnmargin">Cancel</a>
                            <?php
                                if($results6['title'] != 'Pay order by Points'){
                                    ?>
                                        <a class="btn btnmargin btn-info" href="#refundPPayment" data-toggle="modal" data-dismiss="modal">Refund</a>
                                    <?php
                                }else{
                                    ?>
                                        <a class="btn btnmargin btn-info" href="#refundPPayment1" data-toggle="modal" data-dismiss="modal">Refund</a>
                                    <?php
                                }
                            ?>
                            
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="declinePayment" tabindex="-1" role="dialog" aria-labelledby="declinePaymentTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title center" id="declinePaymentTitle">Decline Payment</h5>
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
        
        <div class="modal fade" id="refundPPayment" tabindex="-1" role="dialog" aria-labelledby="refundPPaymentTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title center" id="refundPPaymentTitle">Decline Payment</h5>
                    </div>

                    <form method="post" action="paymentviewss.php?payment_id=<?php echo $payment_id; ?>">
                        <div class="modal-body left">
                            <?php 
                                if(mysqli_num_rows($result15) > 0)
                                {
                                    $counter = 0;
                                    while($row = mysqli_fetch_array($result15))
                                    {
                                        $counter++;
                                        ?>
                                            <input type="hidden" name="order_item_id[]" value="<?php echo $row['order_item_id']; ?>">
                                            <input type="hidden" name="numbers" value="<?php echo $counter; ?>">
                                        <?php
                                    }

                                }
                            ?>
                            <p><input class="formfield" name="payment_id" type="hidden" value="<?php echo $payment_id ?>" /></p>
                            <p><input class="formfield" name="total_amount" type="number" step="0.01" min="0" placeholder="Total Amount" required /></p>
                            <p><input class="formfield" name="refund_amount" type="number" step="0.01" min="0" placeholder="Refund Amount" required /></p>
                            <p><input class="formfield" name="admin_charge" type="number" step="0.01" min="0" placeholder="Admin Charge" required /></p>
                            <p><input class="formfield" name="transaction_code" type="text" placeholder="Transaction Code" required /></p>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>

                            <input type="submit" class="btn btn-info" name="refundpayment" value="Refund payment" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="refundPPayment1" tabindex="-1" role="dialog" aria-labelledby="refundPPayment1Title" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title center" id="refundPPayment1Title">Decline Payment</h5>
                    </div>

                    <form method="post" action="paymentviewss.php?payment_id=<?php echo $payment_id; ?>">
                        <div class="modal-body left">
                            <?php 
                                if(mysqli_num_rows($result16) > 0)
                                {
                                    $counter = 0;
                                    while($row = mysqli_fetch_array($result16))
                                    {
                                        $counter++;
                                        ?>
                                            <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                                            <input type="hidden" name="order_item_id[]" value="<?php echo $row['order_item_id']; ?>">
                                            <input type="hidden" name="numbers" value="<?php echo $counter; ?>">
                                        <?php
                                    }

                                }
                            ?>
                            <p><input class="formfield" name="payment_id" type="hidden" value="<?php echo $payment_id ?>" /></p>
                            <p><input class="formfield" name="total_amount" type="number" step="0.01" min="0" placeholder="Total Amount" required /></p>
                            <p><input class="formfield" name="refund_amount" type="number" step="0.01" min="0" placeholder="Refund Amount" required /></p>
                            <p><input class="formfield" name="admin_charge" type="number" step="0.01" min="0" placeholder="Admin Charge" required /></p>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>

                            <input type="submit" class="btn btn-info" name="refundpayment1" value="Refund payment" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>