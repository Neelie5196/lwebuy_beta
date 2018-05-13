<?php

require_once '../connection/config.php';
session_start();

if ($_SESSION['user_id'] == "")
{
    header('location: ../login.php');
    exit();
}
$total = 0;
$user_id = $_SESSION['user_id'];
$order_item = $_POST['order_item_id'];
$paid_amount = $_POST['paid_amount'];
$top_up_amount = $_POST['top_up_amount'];
$top_up_id = $_POST['top_up_id'];
$payments_id = $_POST['payments_id'];

$query = "SELECT *
           FROM order_item
           WHERE order_item_id IN (".implode(',',$order_item).")";
$result = mysqli_query($con, $query);

$query1 = "SELECT *
           FROM order_item
           WHERE order_item_id IN (".implode(',',$order_item).")";
$result1 = mysqli_query($con, $query1);

$query2 = "SELECT *
          FROM country
          WHERE country_name = 'Malaysia'";
$result2 = mysqli_query($con, $query2);
$results2 = mysqli_fetch_assoc($result2);

$query4 = "SELECT *
          FROM rate
          WHERE rate_name = 'LWE point'";
$result4 = mysqli_query($con, $query4);
$results4 = mysqli_fetch_assoc($result4);

$query11 = "SELECT *
           FROM order_item
           WHERE order_item_id IN (".implode(',',$order_item).")";
$result11 = mysqli_query($con, $query11);

$query12 = "SELECT * FROM point WHERE user_id='$user_id'";
$result12 = mysqli_query($con, $query12);
$results12 = mysqli_fetch_assoc($result12);

if(isset($_POST['topupsubmit']))
{   
    $unique_id = substr(time(),5). $user_id;
    $payment_id = $unique_id;
    $status = 'Paid';
    
    $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_type = $_FILES['file']['type'];
	$folder="../receipts/";
    
    $title = "Top-Up payment";
    $top_up_amount  = $_POST['top_up_amount'];
    $top_up_id = $_POST['top_up_id'];
    $statuss = 'Waiting for Accept';
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	
	$final_file=str_replace(' ','-',$new_file_name);
    
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
        $result5 = mysqli_query($con, "INSERT INTO payment SET payment_id='$payment_id', user_id='$user_id', title='$title $payments_id', amount='$top_up_amount', file='$final_file', type='$file_type', status='$statuss', top_up_id='$top_up_id'") or die(mysqli_error($con));
        
        $result6 = mysqli_query($con, "UPDATE order_item SET top_up_id='$top_up_id', status='$status' WHERE order_item_id IN (".implode(',',$order_item).")") or die(mysqli_error($con));
		?>
		<script>
		alert('Successfully Submit');
        window.location.href='main.php#purchase';
        </script>
		<?php
	}
}


if(isset($_POST['paybycredit']))
{    
    $unique_id = substr(time(),5). $user_id;
    $payment_id = $unique_id;
    $status = 'Paid';
    
    $point = $_POST['point'];
    $title = 'Top-Up payment by';
    $points = 'Points';
    $statuss = 'Completed';
    
    $result13 = mysqli_query($con, "INSERT INTO payment SET payment_id='$payment_id', user_id='$user_id', title='$title $points', amount='$top_up_amount', status='$statuss', top_up_id='$top_up_id'") or die(mysqli_error($con));
        
    $result14 = mysqli_query($con, "UPDATE order_item SET top_up_id='$top_up_id', status='$status' WHERE order_item_id IN (".implode(',',$order_item).")") or die(mysqli_error($con));
    
    $result15 = mysqli_query($con, "UPDATE point SET point= point - '$point' WHERE user_id = '$user_id' ") or die(mysqli_error($con));
    
    ?>
    <script>
    alert('Successfully Submit');
    window.location.href='main.php#purchase';
    </script>
    <?php
}

$query14 = "SELECT * FROM users WHERE user_id='$user_id'";
$result14 = mysqli_query($con, $query14);
$results14 = mysqli_fetch_assoc($result14);

$query15 = "SELECT *
           FROM order_item
           WHERE order_item_id IN (".implode(',',$order_item).")";
$result15 = mysqli_query($con, $query15);

if(isset($_POST['molPay']))
{    
    $payment_id = $_POST['payment_id'];
    $amount = $_POST['amount'];
    $orderid = $_POST['orderid'];
    $bill_name = $_POST['bill_name'];
    $bill_email = $_POST['bill_email'];
    $bill_mobile = $_POST['bill_mobile'];
    $bill_desc = $_POST['bill_desc'];
    $country = $_POST['country'];
    $vcode = $_POST['vcode'];
    
    $result16 = mysqli_query($con, "UPDATE order_item SET top_up_id='$top_up_id' WHERE order_item_id IN (".implode(',',$order_item).")") or die(mysqli_error($con));
    
    ?>
    <script>
    window.location.href='https://sandbox.molpay.com/MOLPay/pay/SB_parcelgateway/index.php?amount=<?php echo $amount; ?>&orderid=<?php echo $orderid; ?>&bill_name=<?php echo $bill_name; ?>&bill_email=<?php echo $bill_email; ?>&bill_mobile=<?php echo $bill_mobile; ?>&bill_desc=<?php echo $bill_desc; ?>&country=<?php echo $country; ?>&vcode=<?php echo $vcode; ?>';
    </script>
    <?php
}

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

        <script src="../frameworks/js/lwe.js"></script>
    </head>


    <body class="userbg" ng-app="">
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12 center">
                <h2 class="bigh2 pagetitle hidden-xs hidden-sm">Payment</h2>
                
                <h2 class="smh2 pagetitle hidden-md hidden-lg">Payment</h2>
            </div>
        </div>
        
        <div class="row">
            <div class="col-xs-5 col-md-4 col-lg-4 col-xs-push-1 col-md-push-2 col-lg-push-2 paymentcontainer">
                                
                <div class="row center btnpaymentcontainer">
                    <div class="col-xs-4 col-md-4 col-lg-4">
                        <button type="button" class="btn btnpayment" onclick="funcCredit()" title="Pay by credits"><span class="glyphicon glyphicon-piggy-bank"></span></button>
                    </div>
                    
                    <div class="col-xs-4 col-md-4 col-lg-4">
                        <button type="button" class="btn btnpayment" onclick="funcCard()" title="Pay by card"><span class="glyphicon glyphicon-credit-card"></span></button>
                    </div>
                    
                    <div class="col-xs-4 col-md-4 col-lg-4">
                        <button type="button" class="btn btnpayment" onclick="funcTrans()" title="Pay by transaction"><span class="glyphicon glyphicon-open-file"></span></button>
                    </div>                    
                </div>
                
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 payformcontainer">
                        <div id="pcredit">
                            <form method="post" action="paymentss.php">
                                <?php
                                    if(mysqli_num_rows($result11) > 0)
                                    {
                                        while($row = mysqli_fetch_array($result11))
                                        {
                                    ?>
                                    <input type="hidden" value="<?php echo $row['order_item_id']; ?>" name="order_item_id[]">
                                    <?php
                                            $point = $top_up_amount*$results4['rate'];
                                        }
                                    }
                                    if($results12['point'] < $point){
                                        ?>
                                        <!-- show if not enough credit -->
                                        <p class="center warning">Insufficient credit.</p>
                                        <p class="center"><a class="btn btn-default btnGo" href="main.php#credit">Top up now</a></p>
                                        <?php
                                    }else{
                                        ?>
                                        <!-- show if enough credit -->
                                        <h4>Your credit: <?php echo $results12['point']; ?></h4>
                                        <h4>Amount to pay (credits): <?php echo $point; ?></h4>
                                        <input type="hidden" value="<?php echo $point; ?>" name="point">
                                        <input name="top_up_amount" type="hidden" value="<?php echo number_format((float)$top_up_amount, 2, '.', ''); ?>">
                                        <input type="hidden" name="top_up_id" value="<?php echo $top_up_id; ?>">
                                        <input type="hidden" name="paid_amount" value="<?php echo $paid_amount; ?>">
                                        <input type="hidden" name="payments_id" value="<?php echo $payments_id; ?>">
                                        <p class="center"><input type="submit" class="btn btn-success" name="paybycredit" value="Pay"></p>
                                        <?php
                                    }
                                ?> 
                            </form>
                        </div>
                        
                        <div id="pcard">
                            <h3>MOLPay</h3>
                            <form action="paymentss.php" method= "POST">
                                <?php
                                    $unique_id = substr(time(),5). $user_id;
                                    $payment_id = $unique_id;
                                    $amount = number_format((float)$top_up_amount, 2, '.', '');
                                    $merchantID = 'SB_parcelgateway';
                                    $orderid = $payment_id;
                                    $verifykey = '93c210aa2652f010892f41c659c677a4';
                                    $vcode = md5( $amount.$merchantID.$orderid.$verifykey );
                                ?>
                                <input type="hidden" name= "amount" value="<?php echo $top_up_amount; ?>" >
                                <input type="hidden" name="top_up_id" value="<?php echo $top_up_id; ?>">
                                <input type="hidden" name= "orderid" value="<?php echo $payment_id; ?>">
                                <input type="hidden" name= "bill_name" value="<?php echo $results14['fname']." ".$results14['lname']; ?>">
                                <input type="hidden" name= "bill_email" value="<?php echo $results14['email']; ?>">
                                <input type="hidden" name= "bill_mobile" value="<?php echo $results14['contact']; ?>">
                                <input type="hidden" name= "bill_desc" value="Top-up Payment">
                                <input type="hidden" name= "country" value="MYR">
                                <input type="hidden" name= "vcode" value="<?php echo $vcode; ?>">
                                <?php
                                    if(mysqli_num_rows($result15) > 0)
                                    {
                                        while($row = mysqli_fetch_array($result15))
                                        {
                                    ?>
                                        <input type="hidden" value="<?php echo $row['order_item_id']; ?>" name="order_item_id[]">
                                    <?php
                                        }
                                    }
                                ?>
                                <input name="top_up_amount" type="hidden" value="<?php echo number_format((float)$top_up_amount, 2, '.', ''); ?>">
                                <input type="hidden" name="paid_amount" value="<?php echo $paid_amount; ?>">
                                <input type="hidden" name="payments_id" value="<?php echo $payments_id; ?>">
                                <input type="hidden" name= "payment_id" value="<?php echo $payment_id; ?>">
                                <p class="center"><input type="submit" class="btn btn-success" name="molPay" value="PAY NOW"></p>
                            </form>
                        </div>
                        
                        <div id="ptrans">
                            <form method="post" action="paymentss.php" enctype="multipart/form-data">
                                <h3>Banking Details</h3>
                                <p>Bank: <?php echo $results2['bank']; ?></p>
                                <p>Account No: <?php echo $results2['account_no']; ?></p>
                                <p>Account Name: <?php echo $results2['account_name']; ?></p>

                                <?php
                                    while($row = mysqli_fetch_array($result))
                                    {
                                ?>
                                    <input type="hidden" value="<?php echo $row['order_item_id']; ?>" name="order_item_id[]">
                                <?php
                                    }

                                ?>
                                <p class="center paytrans">
                                    <label>Upload Transaction Receipt</label><br/>
                                    <input type="file" name="file" id="file" accept="image/*" required/>
                                    <input name="top_up_amount" type="hidden" value="<?php echo number_format((float)$top_up_amount, 2, '.', ''); ?>">
                                    <input type="hidden" name="top_up_id" value="<?php echo $top_up_id; ?>">
                                    <input type="hidden" name="paid_amount" value="<?php echo $paid_amount; ?>">
                                    <input type="hidden" name="payments_id" value="<?php echo $payments_id; ?>">
                                </p>

                                <p class="center paytrans"><input type="submit" class="btn btn-success" name="topupsubmit" value="Submit"></p>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
            
            <div class="col-xs-5 col-md-4 col-lg-4 col-xs-push-1 col-md-push-4 col-lg-push-2 pdetailscontainer">
                <h3>Payment Details</h3>
                
                <table class="itemstable center">
                    <tr class="ptoprow">
                        <th>Name</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Remarks</th>
                    </tr>
                    
                    <?php
                        while($row = mysqli_fetch_array($result1))
                        {
                            $total_price = $row['quantity']*$row['price'];
                    ?>
                    
                    <tr>
                        <input type="hidden" value="<?php echo $row['order_item_id']; ?>" name="order_item[]">
                        <td><?php echo $row['order_item']; ?></td>
                        <td><?php echo $row['category']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo number_format((float)$total_price, 2, '.', ''); ?></td>
                        <td><?php echo $row['remark']; ?></td>
                    </tr>
                    
                    <?php
                            $total += number_format((float)$total_price, 2, '.', '');
                            $total_pay = $total;
                        }
                    ?>
                    
                    <tr>
                        <td colspan="4" class="right">Total Amount (MYR)</td>
                        <td class="right"><?php echo number_format((float)$total_pay, 2, '.', ''); ?></td>
                    </tr>
                    <tr>
                        <td colspan="4" class="right">Total Paid (MYR)</td>
                        <td class="right"><?php echo number_format((float)$paid_amount, 2, '.', ''); ?></td>
                        <input type="hidden" name="paid_amount" value="<?php echo number_format((float)$paid_amount, 2, '.', ''); ?>">
                    </tr>
                    <tr>
                        <td colspan="4" class="right">Total Outstanding (MYR)</td>
                        <td class="right coltotal"><?php echo number_format((float)$top_up_amount, 2, '.', ''); ?></td>
                        <input type="hidden" name="top_up_amount" value="<?php echo number_format((float)$top_up_amount, 2, '.', ''); ?>">
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>