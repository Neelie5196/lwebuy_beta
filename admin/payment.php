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
                        <th>Item Name</th>
                        <th>Link</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Remarks</th>
                        <th>Total Price</th>
                        <th>Payment Details</th>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a data-toggle="modal" class="btn btn-default btn-xs btnDelete" href="#purchasepay"><span class="glyphicon glyphicon-eye-open"></span></a>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="8">No new payments for purchase.</td>
                    </tr>
                </table>
            </div>
            
            <div class="modal fade" id="purchasepay" tabindex="-1" role="dialog" aria-labelledby="purchasepayTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="purchasepayTitle">Purchase Payment Details</h5>
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
                                <input type="submit" class="btn btn-success btnSend" name="approve" value="Proceed" />
                                
                                <a class="btn btnDecline" href="#declinePPayment" data-dismiss="modal" data-toggle="modal">Decline</a>
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
        
        <div id="pship">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th>Customer</th>
                        <th>Recipient Name</th>
                        <th>Recipient Contact</th>
                        <th>Recipient Address</th>
                        <th>No. of Items</th>
                        <th>Total Weight (kg)</th>
                        <th>Total Price</th>
                        <th>Payment Details</th>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a data-toggle="modal" class="btn btn-default btn-xs btnDelete" href="#shippingpay"><span class="glyphicon glyphicon-eye-open"></span></a>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="8">No new payments for shipping.</td>
                    </tr>
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