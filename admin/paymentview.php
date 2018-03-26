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
<html ng-app="">
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
        
    </head>

    <body>
        <center>
            <div class="container">
                <h2>Purchase Payment Details</h2>
                <hr/>
            </div>
            <section class="content">
                <div class="container">
                    <div class="row">
                        <form action="paymentview.php?payment_id=<?php echo $payment_id; ?>" method="post">
                            <div class="col-xs-12 col-md-12 col-lg-12 jumbotron">
                                <?php 
                                    if(mysqli_num_rows($result) > 0)
                                    {
                                        $counter = 0;
                                        $total = 0;
                                        $payment_id = 0;
                                    ?>
                                    <table class="table thead-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Link</th>
                                                <th>Category</th>
                                                <th>Quantity</th>
                                                <th>Remark</th>
                                                <th>U.Price (RM)</th>
                                                <th>Total Price (RM)</th>
                                                <th>Order Code</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            while($row = mysqli_fetch_array($result))
                                            {
                                                $counter++;
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $counter; ?></td>
                                                    <td><?php echo $row['order_item']; ?></td>
                                                    <td>
                                                        <a href="#" class="btntab" onclick="window.open('<?php echo $row['link']; ?> ','','Toolbar=1,Location=0,Directories=0,Status=0,Menubar=0,Scrollbars=0,Resizable=0,fullscreen=yes');">View item</a>
                                                    </td>
                                                    <td><?php echo $row['category']; ?></td>
                                                    <td><?php echo $row['quantity']; ?></td>
                                                    <td><?php echo $row['remark']; ?></td>
                                                    <td><?php echo $row['price']; ?></td>
                                                    <td><?php echo number_format((float)$row['price']*$row['quantity'], 2, '.', ''); ?></td>
                                                    <td><input type="text" name="order_code[]" value="<?php echo $row['order_code']; ?>" required></td>
                                                </tr>
                                                <input type="hidden" name="order_item_id[]" value="<?php echo $row['order_item_id']; ?>">
                                            </tbody>
                                            <?php
                                                $total += $row['price']*$row['quantity'];
                                                $payment_id = $row['payment_id'];
                                        }
                                    }else{
                                        ?>
                                            <p>Error.</p>
                                        <?php
                                    }
                                ?>
                                </table>
                                <input type="hidden" name="numbers" value="<?php echo $counter; ?>">
                                <input type="submit" class="btn btn-warning" name="updateordercode" value="Update">
                                <h2 style="text-align: right; padding-right: 70px;"><small>RM</small> <?php echo number_format((float)$total, 2, '.', ''); ?></h2>
                                <tfoot>
                                    <tr>
                                        <td>
                                            <label style="float: left;">Payment :</label><em style="float:left;">
                                            <a data-toggle="modal" data-id="<?php echo $payment_id; ?>" class="btn btn-default btn-xs btnDelete verifyPayment" href="#verifyPayment">Verify</a></em>
                                        </td>
                                    </tr>
                                </tfoot>                            
                            </div>
                            <button type="button" class="btn btn-secondary btnCancel" onclick="window.close()" data-dismiss="modal">Cancel</button>
                            <input type="submit" class="btn btn-success btnSend" name="proceed" value="Proceed" />
                            <a class="btn btnDecline" href="#declinePPayment" data-dismiss="modal" data-toggle="modal">Decline</a>
                        </form>
                    </div>
                </div>
            </section>
            <div class="modal fade" id="verifyPayment" tabindex="-1" role="dialog" aria-labelledby="verifyPaymentTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="verifyPaymentTitle">Verify Payment</h5>
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
                            <h5 class="modal-title" id="declinePPaymentTitle">Decline Payment</h5>
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
        </center>
    </body>
</html>