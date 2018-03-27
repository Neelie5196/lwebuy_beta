<?php
require_once '../connection/config.php';
session_start();

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
        WHERE s.status = 'paid'";
$result1 = mysqli_query($con, $query1);

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
                                        <a href="#" class="btntab" onclick="window.open('paymentview.php?payment_id=<?php echo $row['payment_id']; ?> ','','Toolbar=1,Location=0,Directories=0,Status=0,Menubar=0,Scrollbars=0,Resizable=0,fullscreen=yes');"><span class="glyphicon glyphicon-eye-open"></span></a>
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
                                        <a data-toggle="modal" class="btn btn-default btn-xs btnDelete" href="#shippingpay"><span class="glyphicon glyphicon-eye-open"></span></a>
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
            
            <div class="modal fade" id="shippingpay" tabindex="-1" role="dialog" aria-labelledby="shippingpayTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="shippingpayTitle">Shipping Payment Details</h5>
                        </div>

                        <form method="post" action="payment.php">
                            <div class="modal-body left">
                                <p class="requestp">Payment Type: </p>

                                <p class="requestp">Amount to be paid: </p>

                                <p class="requestp">Paid amount: </p>

                                <!-- for transaction receipts type only -->
                                <p class="requestp">Receipt:</p>
                                
                                <p class="center"><img src="" /></p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                                <!-- auto generate shipping code when proceed -->
                                <input type="submit" class="btn btn-success btnSend" name="approves" value="Proceed" />
                                
                                <a class="btn btnDecline" href="#declineSPayment" data-dismiss="modal" data-toggle="modal">Decline</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="declineSPayment" tabindex="-1" role="dialog" aria-labelledby="declineSPaymentTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="declineSPaymentTitle">Decline Payment</h5>
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
        
        <div id="pcredit">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th>Customer</th>
                        <th>Reload Amount</th>
                        <th>Amount Paid (MYR)</th>
                        <th>Payment Type</th>
                        <th>Receipt</th>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a data-toggle="modal" class="btn btn-default btn-xs btnDelete" href="#creditpay"><span class="glyphicon glyphicon-eye-open"></span></a>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="8">No credit reload payments.</td>
                    </tr>
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
                        <th>Payment Type</th>
                        <th>Payment Receipt</th>
                        <th>Action</th>
                        <th>Reason</th>
                    </tr>
                    
                    <tr>
                        <td colspan="7">No payments processed.</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>