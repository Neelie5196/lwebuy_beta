<?php
/*

require_once '../connection/config.php';
session_start();
$user_id = $_SESSION['user_id'];
$order_item = $_POST['order_item'];

$query = "SELECT *
           FROM order_item
           WHERE order_item_id IN (".implode(',',$order_item).")";
$result = mysqli_query($con, $query);

$query1 = "SELECT *
           FROM order_item
           WHERE order_item_id IN (".implode(',',$order_item).")";
$result1 = mysqli_query($con, $query1);

$query10 = "SELECT *
           FROM order_item
           WHERE order_item_id IN (".implode(',',$order_item).")";
$result10 = mysqli_query($con, $query10);

$query2 = "SELECT *
          FROM country
          WHERE country_name = 'Malaysia'";
$result2 = mysqli_query($con, $query2);
$results2 = mysqli_fetch_assoc($result2);

$query3 = "SELECT * FROM point WHERE user_id='$user_id'";
$result3 = mysqli_query($con, $query3);
$results3 = mysqli_fetch_assoc($result3);

$query4 = "SELECT *
          FROM rate
          WHERE rate_name = 'LWE point'";
$result4 = mysqli_query($con, $query4);
$results4 = mysqli_fetch_assoc($result4);

if(isset($_POST['submit']))
{   
    $unique_id = rand(10000,100000). $user_id;
    $payment_id = $unique_id;
    $status = 'Paid';
    
    $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_type = $_FILES['file']['type'];
	$folder="../receipts/";
    
    $title = 'Pay Order';
    $total_pay = $_POST['total_pay'];
    $statuss = 'Waiting for Accept';
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	
	$final_file=str_replace(' ','-',$new_file_name);
    
	$result5 = mysqli_query($con, "UPDATE order_item SET payment_id='$payment_id', status='$status' WHERE order_item_id IN (".implode(',',$order_item).")") or die(mysqli_error($con));
    
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
        $result6 = mysqli_query($con, "INSERT INTO payment SET payment_id='$payment_id', user_id='$user_id', title='$title', amount='$total_pay', file='$final_file', type='$file_type', status='$statuss'") or die(mysqli_error($con));
		?>
		<script>
		alert('Successfully Submit');
        window.parent.location.reload();window.close();
        </script>
		<?php
	}
}

if(isset($_POST['point_pay']))
{    
    $unique_id = rand(10000,100000). $user_id;
    $payment_id = $unique_id;
    $status = 'Paid';
    $point_pay = $_POST['point_pay'];
    $title = 'Pay order by';
    $points = 'Points';
    $statuss = 'Waiting for Accept';
    
    $result7 = mysqli_query($con, "UPDATE order_item SET payment_id='$payment_id', status='$status' WHERE order_item_id IN (".implode(',',$order_item).")") or die(mysqli_error($con));
    $result8 = mysqli_query($con, "UPDATE point SET point= point - '$point_pay' WHERE user_id = '$user_id' ") or die(mysqli_error($con));
    $result9 = mysqli_query($con, "INSERT INTO payment SET payment_id='$payment_id',user_id='$user_id', title='$title $points', amount='$point_pay $points', status='$statuss'") or die(mysqli_error($con));
    ?>
    <script>
    alert('Successfully Submit');
    window.parent.location.reload();window.close();
    </script>
    <?php
}
*/

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
                            <h4>Your credit: </h4>
                            <h4>Amount to pay (credits): </h4>
                            
                            <!-- show if not enough credit -->
                            <p class="center warning">Insufficient credit.</p>
                            <p class="center"><a class="btn btn-default btnGo" href="main.php#credit">Top up now</a></p>
                            
                            <!-- show if enough credit -->
                            <p class="center"><a class="btn btn-default btnGo">Pay</a></p>
                        </div>
                        
                        <div id="pcard">
                            <!-- wait for client to give MolPay details first-->
                        </div>
                        
                        <div id="ptrans">
                            <form method="post" action="credit.php">
                                <p class="center paytrans">
                                    <label>Upload Transaction Receipt</label><br/>
                                    <input type="file" name="file" class="center" />
                                </p>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
            
            <div class="col-xs-5 col-md-4 col-lg-4 col-xs-push-1 col-md-push-4 col-lg-push-2 pdetailscontainer">
                <h3>Payment Details</h3>
                
                <table class="itemstable center">
                    <tr class="ptoprow">
                        <td class="left">Item</td>
                        <td>Quantity</td>
                        <td>Price (MYR)</td>
                    </tr>
                    
                    <tr>
                        <td class="left"><p></p></td>
                        <td><p></p></td>
                        <td><p></p></td>
                    </tr>
                    
                    <tr>
                        <td colspan="2" class="left"><p>Total price (MYR)</p></td>
                        <td class="coltotal"><p></p></td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>