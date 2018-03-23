<div class="col-xs-12 col-md-12 col-lg-12">
    <h2 class="bigh2 pagetitle hidden-xs hidden-sm">Credits</h2>
    
    <h2 class="smh2 pagetitle hidden-md hidden-lg">Credits</h2>
    
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <table class="tblCTab">
                <tr>
                    <td class="wborder"><button class="btn-link btntab" onclick="funcCRequest()">Requests</button></td>
                    <td><button class="btn-link btntab" onclick="funcCHistory()">Transaction History</button></td>
                </tr>
            </table>
        </div>
    </div>
    
    <div class="row">
        <div id="crequest">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th class="purchasecol3">Event</th>
                        <th class="purchasecol2">Amount</th>
                        <th class="purchasecol2">Transaction Receipt</th>
                        <th class="purchasecol3">Submission Date</th>
                        <th class="purchasecol1"></th>
                    </tr>
                    
                    <?php
                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_array($result))
                            {
                    ?>
                    
                    <tr class="bodyrow">
                        <td></td>
                        <td></td>
                        <td><a href="" class="btntab" target="_blank">View receipt</a></td>
                        <td></td>
                        <td>
                            <a href="" class="btn btn-default btn-xs btnDelete" name="delete"><span class="glyphicon glyphicon-trash"></span></a>
                        </td>
                    </tr>
                    
                    <?php
                        }
                    }
                    else
                    {
                    ?>

                    <tr>
                        <td colspan="5">No pending requests.</td>
                    </tr>

                    <?php
                        }
                    ?>

                    <tr>
                        <td colspan="5">
                            <button type="button" class="btn btn-default btnAdd" data-toggle="modal" data-target="#addCredit">Add</button>
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="modal fade" id="addCredit" tabindex="-1" role="dialog" aria-labelledby="addCreditTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addCreditTitle">Top Up Credit</h5>
                        </div>

                        <form method="post" action="credit.php">
                            <div class="modal-body left">
                                <p><input class="formfield" name="Amount" type="text" placeholder="Enter top up amount" required /></p>

                                <p>
                                    <label class="btnfile btn btn-sm" for="treceipt">Upload Transaction Receipt</label>
                                    <input type="file" id="treceipt" name="treceipt" required />
                                </p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btn-success btnSend" name="add" value="Request" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="chistory">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th class="purchasecol3">Event</th>
                        <th class="purchasecol2">Amount</th>
                        <th class="purchasecol2">Transaction Receipt</th>
                        <th class="purchasecol25">Submission Date</th>
                        <th class="purchasecol25">Approval Date</th>
                    </tr>
                    
                    <?php
                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_array($result))
                            {
                    ?>
                    
                    <tr class="bodyrow">
                        <td></td>
                        <td></td>
                        <td><a href="" class="btntab" target="_blank">View receipt</a></td>
                        <td></td>
                        <td></td>
                    </tr>
                    
                    <?php
                        }
                    }
                    else
                    {
                    ?>

                    <tr>
                        <td colspan="5">No transaction history.</td>
                    </tr>

                    <?php
                        }
                    ?>
        </div>
    </div>
</div>