<?php
require_once '../connection/config.php';
session_start();
$payment_id = $_GET['payment_id'];

$query = "SELECT *
           FROM order_item
           WHERE payment_id='$payment_id'";
$result = mysqli_query($con, $query);

if(isset($_POST['updateordercode']))
{   
    $query1 = "SELECT *
                FROM payment
                WHERE payment_id='$payment_id'";
    $result1 = mysqli_query($con, $query1);
    $results1 = mysqli_fetch_assoc($result1);
    
    if($results1['status'] != 'Waiting for Accept'){
        $order_item_id = $_POST['order_item_id'];
        $order_code = $_POST['order_code'];

        for($i=0; $i<$_POST['numbers']; $i++){
            $result2 = mysqli_query($con, "UPDATE order_item SET order_code='$order_code[$i]' WHERE order_item_id = $order_item_id[$i]") or die(mysqli_error($con));
        }

        ?>
        <script>
        alert('Success to Update');
        window.location.href='paymentview.php?payment_id=<?php echo $payment_id; ?>';
        </script>
        <?php 
    }else{
        ?>
        <script>
        alert('Please approve the payment before proceed');
        window.location.href='paymentview.php?payment_id=<?php echo $payment_id; ?>';
        </script>
        <?php 
    }
}

if(isset($_POST['approve']))
{
    $payment_id = $_POST['payment_id'];
    $status = 'Completed';
    
    $result3 = mysqli_query($con, "UPDATE payment SET status = '$status' WHERE payment_id = $payment_id ") or die(mysqli_error($con));
    ?>
    <script>
    alert('Success to Update');
    window.location.href='main.php#adpayment';
    </script>
    <?php
}

if(isset($_POST['proceed']))
{   
    $query4 = "SELECT *
              FROM order_item
              WHERE status='paid' AND payment_id = '$payment_id'";
    $result4 = mysqli_query($con, $query4);
    $results4 = mysqli_fetch_assoc($result4);
    
    if($results4['order_code'] != NULL){
        $order_item_id = $_POST['order_item_id'];
        $status = 'Proceed';

        for($i=0; $i<$_POST['numbers']; $i++){
            $result5 = mysqli_query($con, "UPDATE order_item SET status='$status' WHERE order_item_id = $order_item_id[$i]") or die(mysqli_error($con));
        }
        ?>
        <script>
        alert('Success to Update');
        opener.window.location.href='main.php#adpayment';
        window.opener.location.reload(true); window.close();
        </script>
        <?php
    }else{
        ?>
        <script>
        alert(Please update the order code before proceed');
        window.location.href='paymentview.php?payment_id=<?php echo $payment_id; ?>';
        </script>
        <?php
    }
    
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
            <h2 class="bigh2 pagetitle hidden-xs hidden-sm">Payment Details</h2>

            <h2 class="smh2 pagetitle hidden-md hidden-lg">Payment Details</h2>
        </div>
        
        <div class="row">
            <form action="paymentview.php?payment_id=<?php echo $payment_id; ?>" method="post">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 updatecontainer">
                        <form action="designation.php" method="post">
                            
                            <table class="purchasetable">
                                <caption><a data-toggle="modal" data-id="<?php echo $payment_id; ?>" class="btn btn-default btnReceipt verifyPayment" href="#verifyPayment">View Receipt</a></caption>
                                <tr>
                                    <th>Name</th>
                                    <th>Link</th>
                                    <th>Category</th>
                                    <th>Quantity</th>
                                    <th>Remark</th>
                                    <th>Unit Price (MYR)</th>
                                    <th>Total Price (MYR)</th>
                                    <th>Order Code</th>
                                </tr>

                                <?php 
                                    if(mysqli_num_rows($result) > 0)
                                    {
                                        $counter = 0;
                                        $total = 0;
                                        $payment_id = 0;
                            
                                
                                        while($row = mysqli_fetch_array($result))
                                        {
                                            $counter++;
                                ?>
                                <tr class="bodyrow">
                                    <td><?php echo $row['order_item']; ?></td>
                                    <td><a href="#" class="btntab" onclick="window.open('<?php echo $row['link']; ?> ','','Toolbar=1,Location=0,Directories=0,Status=0,Menubar=0,Scrollbars=0,Resizable=0,fullscreen=yes');">View item</a></td>
                                    <td><?php echo $row['category']; ?></td>
                                    <td><?php echo $row['quantity']; ?></td>
                                    <td><?php echo $row['remark']; ?></td>
                                    <td><?php echo $row['price']; ?></td>
                                    <td><?php echo number_format((float)$row['price']*$row['quantity'], 2, '.', ''); ?></td><td></td>
                                    <td><input type="text" class="tblformfield" name="order_code[]" value="<?php echo $row['order_code']; ?>" required></td>
                                </tr>
                                
                                <input type="hidden" name="order_item_id[]" value="<?php echo $row['order_item_id']; ?>">

                                <tr>
                                    <td colspan="7" class="right">Total Outstanding Payment (MYR) :</td>
                                    <td class="right"><?php echo number_format((float)$total, 2, '.', ''); ?></td>
                                </tr>
                                
                                <input type="hidden" name="numbers" value="<?php echo $counter; ?>">
                                <tr>
                                    <td colspan="8">
                                        <input type="submit" class="btn btnAdd" name="update" value="Update" />
                                    </td>
                                </tr>
                                <?php
                                        $total += $row['price']*$row['quantity'];
                                        $payment_id = $row['payment_id'];
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
                            </table>
                            
                            <div class="btnpayview">
                                <p class="right">
                                    <button type="button" class="btn btn-secondary btnCancel btnmargin" onclick="window.close()" data-dismiss="modal">Cancel</button>
                                    <input type="submit" class="btn btn-success btnSend btnmargin" name="proceed" value="Proceed" />
                                    <a class="btn btnDecline btnmargin" href="#declinePPayment" data-toggle="modal">Decline</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </form>
        </div>
        
        <div class="modal fade" id="verifyPayment" tabindex="-1" role="dialog" aria-labelledby="verifyPaymentTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title center" id="verifyPaymentTitle">Verify Payment</h5>
                    </div>

                    <form method="post" action="paymentview.php?payment_id=<?php echo $payment_id; ?>">
                        <div class="modal-body left">
                            <img src="../receipts/<?php echo $results8['file']; ?>" style="width: 500px; height: 450px;">
                            <input type="hidden" name="payment_id" id="payment_id" value="">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                            <input type="submit" class="btn btn-success btnSend" name="approve" value="Approve" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="declinePPayment" tabindex="-1" role="dialog" aria-labelledby="declinePPaymentTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title center" id="declinePPaymentTitle">Decline Payment</h5>
                    </div>

                    <form method="post" action="paymentview.php?payment_id=<?php echo $payment_id; ?>">
                        <div class="modal-body left">
                            <p><input class="formfield" name="reason" type="text" placeholder="Reason" required /></p>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>

                            <input type="submit" class="btn btn-success btnSend" name="sendc" value="Send" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <script>
            $(document).on("click", ".verifyPayment", function () {
                var paymentID = $(this).data('id');
                $(".modal-body #payment_id").val( paymentID );
                $('#verifyPayment').modal('show');
            });
        </script>
    </body>
</html>