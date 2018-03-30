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

?>

<div class="col-xs-12 col-md-12 col-lg-12">
    <h2 class="bigh2 pagetitle hidden-xs hidden-sm">Payments</h2>
    
    <h2 class="smh2 pagetitle hidden-md hidden-lg">Payments</h2>
    
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <table class="tblATab">
                <tr>
                    <td class="wborder"><button class="btn-link btntab" onclick="funcPPurchase()">Purchases</button></td>
                    <td class="wborder"><button class="btn-link btntab" onclick="funcPShip()">Shipping</button></td>
                    <td class="wborder"><button class="btn-link btntab" onclick="funcPCredit()">Credit Reload</button></td>
                    <td class="wborder"><button class="btn-link btntab" onclick="funcPOutstand()">Payments for Outstanding Fees</button></td>
                    <td><button class="btn-link btntab" onclick="funcPHistory()">History</button></td>
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
                                        <a href="paymentview.php?payment_id=<?php echo $row['payment_id']; ?>" class="btntab"><span class="glyphicon glyphicon-eye-open"></span></a>
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
                                    <td><?php echo $row['receipient_name']; ?></td>
                                    <td><?php echo $row['receipient_contact']; ?></td>
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
        
        <div id="pcredit">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th>Customer</th>
                        <th>Reload Amount</th>
                        <th>Amount Paid (MYR)</th>
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
                                    <td><?php echo $row['amount']; ?></td>
                                    <td>
                                        <a data-toggle="modal" class="btn btn-default btn-xs btnDelete" href="#creditpay"><span class="glyphicon glyphicon-eye-open"></span></a>
                                    </td>
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
            
            <div class="modal fade" id="creditpay" tabindex="-1" role="dialog" aria-labelledby="creditpayTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="creditpayTitle">Payment Receipt</h5>
                        </div>

                        <form method="post" action="payment.php">
                            <div class="modal-body">
                                <p class="center"><img src="" /></p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                                <!-- auto generate shipping code when proceed -->
                                <input type="submit" class="btn btn-success btnSend" name="approvec" value="Approve" />
                                
                                <a class="btn btnDecline" href="#declineCPayment" data-dismiss="modal" data-toggle="modal">Decline</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="declineCPayment" tabindex="-1" role="dialog" aria-labelledby="declineCPaymentTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="declineCPaymentTitle">Decline Payment</h5>
                        </div>

                        <form method="post" action="payment.php">
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
                                $payment = $row['payment_id'];
                                ?>
                                <tr>
                                    <td><?php echo $row['fname']." ".$row['lname']; ?></td>
                                    <td><?php echo $row['title']; ?></td>
                                    <td><?php echo $row['amount']; ?></td>
                                    <td><?php echo $row['status']; ?></td>
                                    <td>
                                        <a data-toggle="modal" class="btn btn-default btn-xs btnDelete creditpay" href="#creditPay"><span class="glyphicon glyphicon-eye-open"></span></a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }else{
                            ?>
                                <tr>
                                    <td colspan="4">No payments processed.</td>
                                </tr>
                            <?php
                        }
                    ?>
                </table>
            </div>
        </div>
        <div class="modal fade" id="creditPay" tabindex="-1" role="dialog" aria-labelledby="creditpayTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="creditpayTitle">Receipt</h5>
                    </div>
                    <div class="modal-body left">
                        <?php
                            $query5 = "SELECT * FROM payment WHERE payment_id='$payment'";
                            $result5 = mysqli_query($con, $query5);
                            $results5 = mysqli_fetch_assoc($result5);
                        ?>
                        <img src="../receipts/<?php echo $results5['file']; ?>" style="width: 500px; height: 450px;">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>