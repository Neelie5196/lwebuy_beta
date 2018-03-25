<div class="col-xs-12 col-md-12 col-lg-12">
    <h2 class="bigh2 pagetitle hidden-xs hidden-sm">Pending Requests</h2>
    
    <h2 class="smh2 pagetitle hidden-md hidden-lg">Pending Requests</h2>
    
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <table class="tblITab">
                <tr>
                    <td class="wborder"><button class="btn-link btntab" onclick="funcRPurchase()">Purchases</button></td>
                    <td><button class="btn-link btntab" onclick="funcRHistory()">History</button></td>
                </tr>
            </table>
        </div>
    </div>
    
    <div class="row">
        <div id="rpurchase">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th class="purchasecol2">Customer</th>
                        <th class="purchasecol1">Item Name</th>
                        <th class="purchasecol3">Link</th>
                        <th class="purchasecol1">Category</th>
                        <th class="purchasecol05">Quantity</th>
                        <th class="purchasecol2">Remarks</th>
                        <th class="purchasecol2"></th>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>                            
                            <a data-toggle="modal" class="btn btnGo" href="#approveRequest">Approve</a>
                            <a data-toggle="modal" class="btn btnDecline" href="#declineRequest">Decline</a>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="7">No pending requests.</td>
                    </tr>
                </table>
            </div>
        
            <div class="modal fade" id="approveRequest" tabindex="-1" role="dialog" aria-labelledby="approveRequestTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="approveRequestTitle">Approve Request</h5>
                        </div>

                        <form method="post" action="request.php">
                            <div class="modal-body left">
                                <p class="requestp">Item name: </p>

                                <p class="requestp">URL: </p>

                                <p class="requestp">Category: </p>

                                <p class="requestp">Quantity: </p>

                                <p class="requestp">Remarks: </p>

                                <p>
                                    <input class="formfield" name="uprice" type="text" placeholder="Unit Price" required />
                                </p>

                                <p>
                                    <input class="formfield" name="tprice" type="text" placeholder="Total Price" required />
                                </p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btn-success btnSend" name="add" value="Approve" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="declineRequest" tabindex="-1" role="dialog" aria-labelledby="declineRequestTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="declineRequestTitle">Decline Request</h5>
                        </div>

                        <form method="post" action="request.php">
                            <div class="modal-body left">
                                <p class="requestp">Item name: </p>

                                <p class="requestp">URL: </p>

                                <p class="requestp">Category: </p>

                                <p class="requestp">Quantity: </p>

                                <p class="requestp">Remarks: </p>

                                <p>
                                    <input class="formfield" name="reason" type="text" placeholder="Reason" required />
                                </p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btnDecline" name="decline" value="Decline" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="rhistory">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th class="purchasecol1">Customer</th>
                        <th class="purchasecol1">Name</th>
                        <th class="purchasecol3">Link</th>
                        <th class="purchasecol1">Category</th>
                        <th class="purchasecol05">Quantity</th>
                        <th class="purchasecol1">Remarks</th>
                        <th class="purchasecol1">Action</th>
                        <th class="purchasecol2">Reason</th>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td colspan="8">No requests processed.</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>