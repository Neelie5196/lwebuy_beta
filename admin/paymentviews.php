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

$query6 = "SELECT * FROM payment WHERE payment_id='$payment_id'";
$result6 = mysqli_query($con, $query6);
$results6 = mysqli_fetch_assoc($result6);

if(isset($_POST['approve']))
{
    $payment_id = $_POST['payment_id'];
    $station = $_POST['station'];
    $status = 'Completed';
    
    $result3 = mysqli_query($con, "UPDATE payment SET status = '$status' WHERE payment_id = $payment_id ") or die(mysqli_error($con));
    $result7 = mysqli_query($con, "UPDATE shipping SET destination_station = '$station' WHERE payment_id = $payment_id ") or die(mysqli_error($con));
    ?>
    <script>
    alert('Success to Update');
    window.location.href='paymentviews.php?payment_id=<?php echo $payment_id; ?>';
    </script>
    <?php
}

$query2 = "SELECT * FROM shipping WHERE payment_id='$payment_id'";
$result2 = mysqli_query($con, $query2);
$results2 = mysqli_fetch_assoc($result2);

if(isset($_POST['proceed']))
{   
    $query4 = "SELECT *
                FROM payment
                WHERE payment_id='$payment_id'";
    $result4 = mysqli_query($con, $query4);
    $results4 = mysqli_fetch_assoc($result4);
    
    if($results1['status'] != 'Waiting for Accept'){
        $status = 'Proceed';
        $statuss = 'Completed';

        $result5 = mysqli_query($con, "UPDATE shipping SET status='$status' WHERE payment_id = '$payment_id'") or die(mysqli_error($con));
        ?>
        <script>
        alert('Success to Update');
        window.location.href='main.php#adpayment';
        </script>
        <?php
    }else{
        ?>
        <script>
        alert('Please approve the payment before proceed');
        window.location.href='paymentviews.php?payment_id=<?php echo $payment_id; ?>';
        </script>
        <?php
    }
    
}

$query6 = "SELECT * FROM warehouse";
$result6 = mysqli_query($con, $query6);

$query7 = "SELECT *
            FROM payment
            WHERE payment_id='$payment_id'";
$result7 = mysqli_query($con, $query7);
$results7 = mysqli_fetch_assoc($result7);

$query8 = "SELECT * FROM warehouse";
$result8 = mysqli_query($con, $query8);

if(isset($_POST['topup']))
{
    $payment_id = $_POST['payment_id'];
    $paid_amount = $_POST['paid_amount'];
    $top_up_amount = $_POST['top_up_amount'];
    $top_up_reason = $_POST['top_up_reason'];
    $shipping_id = $_POST['shipping_id'];
    $status = 'Top-up';

    $result9 = mysqli_query($con, "INSERT INTO top_up SET payment_id='$payment_id', paid_amount='$paid_amount', top_up_amount='$top_up_amount', top_up_reason='$top_up_reason'") or die(mysqli_error($con));

    $result11 = mysqli_query($con, "UPDATE shipping SET status='$status' WHERE shipping_id = $shipping_id") or die(mysqli_error($con));
    
    ?>
    <script>
    alert('Success to send request');
    window.location.href='main.php#adpayment';
    </script>
    <?php
}

$query11 = "SELECT *
           FROM shipping
           WHERE payment_id='$payment_id' AND top_up_id IS NOT NULL";
$result11 = mysqli_query($con, $query11);

if(isset($_POST['approves']))
{
    $payments_id = $_POST['payments_id'];
    $status = 'Completed';
    
    $result12 = mysqli_query($con, "UPDATE payment SET status = '$status' WHERE payment_id = $payments_id ") or die(mysqli_error($con));
    ?>
    <script>
    alert('Success to Update');
    window.location.href='paymentviews.php?payment_id=<?php echo $payment_id; ?>';
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
            <h2 class="bigh2 pagetitle hidden-xs hidden-sm">Payment Details</h2>

            <h2 class="smh2 pagetitle hidden-md hidden-lg">Payment Details</h2>
        </div>
        
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12 updatecontainer">
                <table class="purchasetable">
                    <caption> 
                        <?php
                            if($results7['title'] != 'Pay shipping by Points'){
                                ?>
                                    <a data-toggle="modal" class="btn btn-default btnReceipt verifyPayment" href="#verifyPayment">View Receipt</a>
                                <?php
                            }else{
                                ?>
                                    <form method="post" action="paymentviews.php?payment_id=<?php echo $payment_id; ?>">
                                        <input type="hidden" name="payment_id" value="<?php echo $_GET['payment_id']; ?>">
                                        <input type="submit" class="btn btn-success btnSend" name="approve" value="Pay by LWE point" />
                                        <select class="formselect" name="station" >
                                            <option class="formoption" selected required>Station</option>
                                            <?php 
                                                if(mysqli_num_rows($result8) > 0)
                                                {
                                                    while($row = mysqli_fetch_array($result8))
                                                    {
                                                        ?>
                                                            <option class="formoption" value="<?php echo $row['station_name']; ?>">
                                                                <?php echo $row['station_name']; ?>
                                                            </option>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </select>

                                    </form>
                                <?php
                            }
                        ?>
                        <?php 
                            if(mysqli_num_rows($result11) > 0)
                            {
                                while($row = mysqli_fetch_array($result11))
                                {
                                    $top_up_id = $row['top_up_id'];
                                    $query12 = "SELECT * FROM payment WHERE top_up_id='$top_up_id'";
                                    $result12 = mysqli_query($con, $query12);
                                    $results12 = mysqli_fetch_assoc($result12);
                                    ?>
                                    
                                    <a data-toggle="modal" class="btn btn-default btnReceipt verifyPayment1" href="#verifyPayment1">View Receipt</a>
                                    <?php
                                }
                            }else{

                            }
                        ?>
                    </caption>
                </table>
            </div>
        </div>
        <div class="row">
            <form action="paymentviews.php?payment_id=<?php echo $payment_id; ?>" method="post">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 updatecontainer">
                        <table class="purchasetable">
                            <p>Receipient Name : <?php echo $results1['receipient_name']; ?></p>
                            <p>Receipient Contact : <?php echo $results1['receipient_contact']; ?></p>
                            <p>Remark : <?php echo $results1['remark']; ?></p>
                            <p>Address : <?php echo $results1['address'].", ".$results1['postcode'].", ".$results1['city'].", ".$results1['state']; ?></p>
                            <p>Country : <?php echo $results1['country']; ?></p>
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
                            </tr>
                            <tr>
                                <td colspan="2" class="right">Total Outstanding Payment (MYR) :</td>
                                <td><?php echo $results1['price']; ?></td>
                            </tr>

                        </table>

                        <div class="btnpayview">
                            <p class="right">
                                <button type="button" class="btn btn-secondary btnCancel btnmargin">Cancel</button>
                                <input type="submit" class="btn btn-success btnSend btnmargin" name="proceed" value="Proceed" />
                                <a class="btn btnDecline btnmargin" href="#topupPPayment" data-toggle="modal">Top-up</a>
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
                        <h5 class="modal-title center" id="verifyPaymentTitle">Verify Payment</h5>
                    </div>

                    <form method="post" action="paymentviews.php?payment_id=<?php echo $payment_id; ?>">
                        <div class="modal-body left">
                            <img src="../receipts/<?php echo $results6['file']; ?>" style="width: 500px; height: 450px;">
                            <input type="hidden" name="payment_id" value="<?php echo $_GET['payment_id']; ?>">
                            <select class="formselect" name="station" >
                                <option class="formoption" selected required>Station</option>
                                <?php 
                                    if(mysqli_num_rows($result6) > 0)
                                    {
                                        while($row = mysqli_fetch_array($result6))
                                        {
                                            ?>
                                                <option class="formoption" value="<?php echo $row['station_name']; ?>">
                                                    <?php echo $row['station_name']; ?>
                                                </option>
                                            <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <a href="main.php#adpayment" class="btn btn-secondary btnCancel">Cancel</a>
                            <input type="submit" class="btn btn-success btnSend" name="approve" value="Approve" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="verifyPayment1" tabindex="-1" role="dialog" aria-labelledby="verifyPaymentTitle1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title center" id="verifyPaymentTitle1">Verify Payment1</h5>
                    </div>

                    <form method="post" action="paymentviews.php?payment_id=<?php echo $payment_id; ?>">
                        <div class="modal-body left">
                            <img src="../receipts/<?php echo $results12['file']; ?>" style="width: 500px; height: 450px;">
                            <input type="text" name="payments_id" value="<?php echo $results12['payment_id']; ?>">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                            <input type="submit" class="btn btn-success btnSend" name="approves" value="Approve" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="topupPPayment" tabindex="-1" role="dialog" aria-labelledby="topupPPaymentTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title center" id="topupPPaymentTitle">Top-up Payment</h5>
                    </div>

                    <form method="post" action="paymentviews.php?payment_id=<?php echo $payment_id; ?>">
                        <div class="modal-body left">
                            <p><input class="formfield" name="shipping_id" type="hidden" value="<?php echo $results2['shipping_id']; ?>" /></p>
                            <p><input class="formfield" name="payment_id" type="hidden" value="<?php echo $payment_id ?>" /></p>
                            <p><input class="formfield" name="paid_amount" type="number" step="0.01" min="0" placeholder="Paid Amount" required /></p>
                            <p><input class="formfield" name="top_up_amount" type="number" step="0.01" min="0.01" placeholder="Top-up Amount" required /></p>
                            <p><input class="formfield" name="top_up_reason" type="text" placeholder="Reason" required /></p>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>

                            <input type="submit" class="btn btn-success btnSend" name="topup" value="Submit request" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>