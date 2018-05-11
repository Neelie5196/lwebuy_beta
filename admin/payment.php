<?php
require_once '../connection/config.php';

$query = "SELECT *
        FROM order_item oi
        JOIN payment p
        ON p.payment_id = oi.payment_id
        JOIN users us
        ON us.user_id = p.user_id
        WHERE oi.status = 'paid'
        GROUP BY oi.payment_id";
$result = mysqli_query($con, $query);

$query1 = "SELECT *
        FROM shipping s
        JOIN payment p
        ON p.payment_id = s.payment_id
        JOIN users us
        ON us.user_id = p.user_id
        WHERE s.status = 'request'";
$result1 = mysqli_query($con, $query1);

$query3 = "SELECT *
        FROM payment p
        JOIN users us
        ON us.user_id = p.user_id
        WHERE p.status = 'Waiting for approval'";
$result3 = mysqli_query($con, $query3);

$query4 = "SELECT *
        FROM payment p
        JOIN users us
        ON us.user_id = p.user_id
        WHERE p.status = 'Completed' OR p.status = 'Declined'";
$result4 = mysqli_query($con, $query4);

$query6 = "SELECT *
        FROM order_item oi
        JOIN payment p
        ON p.payment_id = oi.payment_id
        JOIN users us
        ON us.user_id = p.user_id
        WHERE oi.status = 'top-up'
        GROUP BY oi.payment_id";
$result6 = mysqli_query($con, $query6);

$query8 = "SELECT *
        FROM shipping s
        JOIN payment p
        ON p.payment_id = s.payment_id
        JOIN users us
        ON us.user_id = p.user_id
        WHERE s.status = 'top-up'
        GROUP BY s.payment_id";
$result8 = mysqli_query($con, $query8);

$outcount = mysqli_num_rows($result6) + mysqli_num_rows($result8);

$query10 = "SELECT *
        FROM refund rf
        JOIN users us
        ON us.user_id = rf.user_id
        WHERE transaction_code IS NULL";
$result10 = mysqli_query($con, $query10);

$query11 = "SELECT *
        FROM refund rf
        JOIN users us
        ON us.user_id = rf.user_id
        WHERE transaction_code IS NOT NULL";
$result11 = mysqli_query($con, $query11);

if(isset($_POST['refundsave']))
{
    $refund_id = $_POST['refund_id'];
    $transaction_code = $_POST['transaction_code'];
    
    $update = mysqli_query($con, "UPDATE refund SET transaction_code = '$transaction_code' WHERE refund_id = '$refund_id' ") or die(mysqli_error($con));
    ?>
    <script>
    alert('Payment refunded');
    window.location.href='main.php#adpayment';
    </script>
    <?php
}

if(isset($_POST['approvec']))
{
	
    $user_id = $_POST['user_id'];
    $payment_id = $_POST['payment_id'];
    $amount = $_POST['amount'];
	
	
	$query0 = "SELECT * FROM rate WHERE rate_name='LWE point'";
	$result0 = mysqli_query($con, $query0);
	$results0 = mysqli_fetch_assoc($result0);
	$point = $_POST['amount']*$results0['rate'];

	
    $update = mysqli_query($con, "UPDATE payment SET amount = '$amount', status='Completed' WHERE payment_id = '$payment_id' ") or die(mysqli_error($con));
	$resultapayment = mysqli_query($con, "INSERT INTO log SET action='received payment, total RM$amount', created_at=now(), user_id='$user_id', sort_by='approve_payment'") or die(mysqli_error($con));
	
	$query = "SELECT * 
              FROM point
              WHERE user_id = '$user_id'";
    $results = mysqli_query($con, $query);
    $resultss = mysqli_num_rows($results);
    if($resultss > 0){
        $result1 = mysqli_query($con, "UPDATE point SET point = point + '$point' WHERE user_id = $user_id ") or die(mysqli_error($con));
    }else{
        $result1 = mysqli_query($con, "INSERT INTO point SET user_id='$user_id', point='$point'") or die(mysqli_error($con));
    }
	
   
    ?>
    <script>
    alert('Reload Successufuly');
    window.location.href='main.php#adpayment';
    </script>
    <?php
}
if(isset($_POST['decline']))
{    
    $user_id = $_POST['user_id'];
    $payment_id = $_POST['payment_id'];

    $update = mysqli_query($con, "UPDATE payment SET amount = '-', status='Declined' WHERE payment_id = '$payment_id' ") or die(mysqli_error($con));
	$resultapayment = mysqli_query($con, "INSERT INTO log SET action='declined payment', created_at=now(), user_id='$user_id', sort_by='approve_payment'") or die(mysqli_error($con));
	
    ?>
    <script>
    alert('Success to Decline');
    window.location.href='main.php#adrequest';
    </script>
    <?php
}


?>
<link rel="stylesheet" href="../frameworks/css/lightbox.min.css">

<div class="col-xs-12 col-md-12 col-lg-12">
    <h2 class="bigh2 pagetitle hidden-xs hidden-sm">Payments</h2>
    
    <h2 class="smh2 pagetitle hidden-md hidden-lg">Payments</h2>
    
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <table class="tblPTab">
                <tr>
                    <td class="wborder"><button class="btn-link btntab" id="btnppurchase" onclick="funcPPurchase()">Purchases <?php if(mysqli_num_rows($result) > 0) {echo "(" . mysqli_num_rows($result) . ")";} ?></button></td>
                    <td class="wborder"><button class="btn-link btntab" id="btnpship" onclick="funcPShip()">Shipping <?php if(mysqli_num_rows($result1) > 0) {echo "(" . mysqli_num_rows($result1) . ")";} ?></button></td>
                    <td class="wborder"><button class="btn-link btntab" id="btnpcredit" onclick="funcPCredit()">Credit Reload <?php if(mysqli_num_rows($result3) > 0) {echo "(" . mysqli_num_rows($result3) . ")";} ?></button></td>
                    <td class="wborder"><button class="btn-link btntab" id="btnpoutstand" onclick="funcPOutstand()">Outstanding Payments <?php if($outcount > 0) {echo "(" . $outcount . ")";} ?></button></td>
                    <td class="wborder"><button class="btn-link btntab" id="btnprefund" onclick="funcPRefund()">Refund</button></td>
                    <td class="wborder"><button class="btn-link btntab" id="btnphistory" onclick="funcPHistory()">Payment History</button></td>
                    <td><button class="btn-link btntab" id="btnprhistory" onclick="funcPRHistory()">Refund History</button></td>
                </tr>
            </table>
        </div>
    </div>
    
    <div class="row">
        <div id="ppurchase">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th>Customer</th>
                        <th>Payment ID</th>
                        <th>Total Price (RM)</th>
                        <th>Payment Details</th>
                    </tr>
                    <?php 
                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_array($result))
                            {
                                ?>
                                <tr>
                                    <td><?php echo $row['fname']." ".$row['lname']; ?></td>
                                    <td><?php echo $row['payment_id']; ?></td>
                                    <td><?php echo $row['amount']; ?></td>
                                    <td>
                                        <a href="paymentview.php?payment_id=<?php echo $row['payment_id']; ?>" class="btntab"><span class="glyphicon glyphicon-eye-open" title="View more"></span></a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }else{
                            ?>
                                <tr>
                                    <td colspan="4">No new payments for purchase.</td>
                                </tr>
                            <?php
                        }
                    ?>
                </table>
            </div>
        </div>
        
        <div id="pship">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th>Customer</th>
                        <th>Recipient Name</th>
                        <th>Recipient Contact</th>
                        <th>No. of Items</th>
                        <th>Total Weight (kg)</th>
                        <th>Total Price</th>
                        <th>Payment Details</th>
                    </tr>
                    <?php 
                        if(mysqli_num_rows($result1) > 0)
                        {
                            while($row = mysqli_fetch_array($result1))
                            {
                                $payment_id = $row['payment_id'];
                                $query2 = "SELECT *
                                        FROM item
                                        WHERE payment_id = '$payment_id'";
                                $result2 = mysqli_query($con, $query2);
                                ?>
                                <tr>
                                    <td><?php echo $row['fname']." ".$row['lname']; ?></td>
                                    <td><?php echo $row['recipient_name']; ?></td>
                                    <td><?php echo $row['recipient_contact']; ?></td>
                                    <td><?php echo mysqli_num_rows($result2); ?></td>
                                    <td><?php echo $row['weight']; ?></td>
                                    <td><?php echo $row['price']; ?></td>
                                    <td>
                                        <a href="paymentviews.php?payment_id=<?php echo $row['payment_id']; ?>" class="btntab"><span class="glyphicon glyphicon-eye-open"></span></a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }else{
                            ?>
                                <tr>
                                    <td colspan="8">No new payments for shipping.</td>
                                </tr>
                            <?php
                        }
                    ?>
                </table>
            </div>
        </div>
        
        <div id="pcredit">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th>Customer</th>
                        <th>Reload Amount</th>
                        <th>Submission Date</th>
                        <th>Receipt</th>
                    </tr>
                    <?php 
                        if(mysqli_num_rows($result3) > 0)
                        {
                            while($row = mysqli_fetch_array($result3))
                            {
                                ?>
                                <tr>
                                    <td><?php echo $row['fname']." ".$row['lname']; ?></td>
                                    <td><?php echo $row['title']; ?></td>
                                    <td><?php echo $row['datetime']; ?></td>
                                  
									 <td><button type="button" class="btn btntab myModal" data-id="<?php echo $row['payment_id']; ?>" data-userid="<?php echo $row['user_id']; ?>" data-toggle="modal" data-target="#myModal" onclick="passimg('<?php echo $row['file']; ?>')">View Receipt</button></td>
                                </tr>
                                <?php
                            }
                        }else{
                            ?>
                                <tr>
                                    <td colspan="8">No credit reload payments.</td>
                                </tr>
                            <?php
                        }
                    ?>
                </table>
            </div>
            
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
				<form action="payment.php" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalTitle">Receipt</h5>
                        </div>

                        <div class="modal-body left">
                            <p class="center">
                                <img id="imgcontain" width="80%" />
								<input type="hidden" name="user_id" id="userId" value="" />
								<input type="hidden" name="payment_id" id="paymentId" value="" />
								<input class="formfield" name="amount" type="number" placeholder="Reload Amount" required />
                            </p>
                        </div>

                        <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                                <!-- auto generate shipping code when proceed -->
								<input type="submit" class="btn btn-success btnSend" name="approvec" value="Approve" />
                                <input type="submit" class="btn btnDecline" name="decline" value="Decline" />
                                
                            </div>
                    </div>
					</form>
                </div>
            </div>
        </div>
        
        <div id="poutstand">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th>Customer</th>
                        <th>Payment ID</th>
                        <th>Total Price (RM)</th>
                        <th>Paid Price (RM)</th>
                        <th>Top-up Price (RM)</th>
                        <th>Reason</th>
                    </tr>
                    <?php 
                        if(mysqli_num_rows($result6) > 0)
                        {
                            while($row = mysqli_fetch_array($result6))
                            {
                                $payment_id = $row['payment_id'];
                                $query7 = "SELECT * FROM top_up WHERE payment_id='$payment_id'";
                                $result7 = mysqli_query($con, $query7);
                                $results7 = mysqli_fetch_assoc($result7);
                                ?>
                                <tr>
                                    <td><?php echo $row['fname']." ".$row['lname']; ?></td>
                                    <td><?php echo $row['payment_id']; ?></td>
                                    <td><?php echo $row['amount']; ?></td>
                                    <td><?php echo $results7['paid_amount']; ?></td>
                                    <td><?php echo $results7['top_up_amount']; ?></td>
                                    <td><?php echo $results7['top_up_reason']; ?></td>
                                </tr>
                                <?php
                            }
                        }
                    ?>
                
                    <?php 
                        if(mysqli_num_rows($result8) > 0)
                        {
                            while($row = mysqli_fetch_array($result8))
                            {
                                $payment_id = $row['payment_id'];
                                $query9 = "SELECT * FROM top_up WHERE payment_id='$payment_id'";
                                $result9 = mysqli_query($con, $query9);
                                $results9 = mysqli_fetch_assoc($result9);
                                ?>
                                <tr>
                                    <td><?php echo $row['fname']." ".$row['lname']; ?></td>
                                    <td><?php echo $row['payment_id']; ?></td>
                                    <td><?php echo $row['amount']; ?></td>
                                    <td><?php echo $results9['paid_amount']; ?></td>
                                    <td><?php echo $results9['top_up_amount']; ?></td>
                                    <td><?php echo $results9['top_up_reason']; ?></td>
                                </tr>
                                <?php
                            }
                        }
                        
                        if(mysqli_num_rows($result6) == 0 && mysqli_num_rows($result8) == 0)
                        {
                   ?>
                    <tr>
                        <td colspan="6">No payments for outstanding fees.</td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
            </div>
        </div>
        
        <div id="prefund">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th>Customer</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Total Amount (RM)</th>
                        <th>Refund Amount (RM)</th>
                        <th>Admin Charge (RM)</th>
                        <th>Reason</th>
                        <th>Action</th>
                    </tr>
                    <?php 
                        if(mysqli_num_rows($result10) > 0)
                        {
                            while($row = mysqli_fetch_array($result10))
                            {
                                ?>
                                <tr>
                                    <td><?php echo $row['fname']." ".$row['lname']; ?></td>
                                    <td><?php echo $row['contact']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['total_amount']; ?></td>
                                    <td><?php echo $row['refund_amount']; ?></td>
                                    <td><?php echo $row['admin_charge']; ?></td>
                                    <td><?php echo $row['refund_reason']; ?></td>
                                    <td>
                                        <?php
                                            if($row['total_amount'] != NULL){
                                                ?>
                                                    <a data-toggle="modal" data-id="<?php echo $row['refund_id']; ?>" class="btn btnGo transactionCode" href="#transactionCode">Approve</a>
                                                <?php
                                            }else{
                                                ?>
                                                    <a href="paymentviewss.php?payment_id=<?php echo $row['payment_id']; ?>" class="btn btnGo">View Details</a>
                                                <?php
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        }else{
                            ?>
                                <tr>
                                    <td colspan="8">No outstanding payments to refund.</td>
                                </tr>
                            <?php
                        }
                    ?>
                </table>
            </div>
            <div class="modal fade" id="transactionCode" tabindex="-1" role="dialog" aria-labelledby="transactionCodeTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="transactionCodeTitle">Transaction Code</h5>
                        </div>

                        <form method="post" action="payment.php">
                            <div class="modal-body left">
                                <input type="hidden" name="refund_id" id="refundId" value="">
                                <p>
                                    <input class="formfield" name="transaction_code" type="text" placeholder="Transaction Code" required />
                                </p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btn-success btnSend" name="refundsave" value="Save" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="phistory">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th>Customer</th>
                        <th>Payment Event</th>
                        <th>Amount (MYR)</th>
                        <th>Status</th>
                        <th>Payment Receipt</th>
                    </tr>
                     <?php 
                        if(mysqli_num_rows($result4) > 0)
                        {
                            $payment=0;
                            while($row = mysqli_fetch_array($result4))
                            {
                                ?>
                                <tr>
                                    <td><?php echo $row['fname']." ".$row['lname']; ?></td>
                                    <td><?php echo $row['title']; ?></td>
                                    <td><?php echo $row['amount']; ?></td>
                                    <td><?php echo $row['status']; ?></td>
                                    <td>
                                        <?php
                                            if($row['file'] != NULL){
                                                ?>
                                                    <a href="../receipts/<?php echo $row['file']; ?>" data-lightbox="receipt"><span class="glyphicon glyphicon-eye-open"></span></a>
                                                <?php
                                            }else{
                                                ?>
                                                    <p>By Credit or MOLpay</p>
                                                <?php
                                            }
                                        ?>
                                        
                                    </td>
                                </tr>
                                <?php
                            }
                        }else{
                            ?>
                                <tr>
                                    <td colspan="5">No payments processed.</td>
                                </tr>
                            <?php
                        }
                    ?>
                </table>
            </div>
        
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalTitle">Receipt</h5>
                        </div>

                        <div class="modal-body left">
                            <p class="center">
                                <img id="imgcontain" width="80%" />
                            </p>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="prhistory">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th>Customer</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Total Amount (RM)</th>
                        <th>Refund Amount (RM)</th>
                        <th>Admin Charge (RM)</th>
                        <th>Reason</th>
                        <th>Transaction Code</th>
                    </tr>
                     <?php 
                        if(mysqli_num_rows($result11) > 0)
                        {
                            while($row = mysqli_fetch_array($result11))
                            {
                                ?>
                                <tr>
                                    <td><?php echo $row['fname']." ".$row['lname']; ?></td>
                                    <td><?php echo $row['contact']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['total_amount']; ?></td>
                                    <td><?php echo $row['refund_amount']; ?></td>
                                    <td><?php echo $row['admin_charge']; ?></td>
                                    <td><?php echo $row['refund_reason']; ?></td>
                                    <td><?php echo $row['transaction_code']; ?></td>
                                </tr>
                                <?php
                            }
                        }else{
                            ?>
                                <tr>
                                    <td colspan="8">No refunds processed.</td>
                                </tr>
                            <?php
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
$(document).on("click", ".transactionCode", function () {
    var refundId = $(this).data('id');
    $(".modal-body #refundId").val( refundId );
    $('#transactionCode').modal('show');
});
</script>
<script>
    function passimg(filename)
    {
        document.getElementById("imgcontain").setAttribute("src", "../receipts/" + filename);
    }
	
	$(document).on("click", ".myModal", function () {
    var paymentId = $(this).data('id');
    var userId = $(this).data('userid');
    $(".modal-body #paymentId").val( paymentId );
    $(".modal-body #userId").val( userId );
    $('#myModal').modal('show');
});
</script>
<script src="../frameworks/js/lightbox-plus-jquery.min.js"></script>