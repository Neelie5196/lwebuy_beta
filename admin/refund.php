<?php
require_once '../connection/config.php';
session_start();

$query = "SELECT *
        FROM refund rf
        JOIN users us
        ON us.user_id = rf.user_id
        WHERE transaction_code IS NULL";
$result = mysqli_query($con, $query);

$query1 = "SELECT *
        FROM refund rf
        JOIN users us
        ON us.user_id = rf.user_id
        WHERE transaction_code IS NOT NULL";
$result1 = mysqli_query($con, $query1);

if(isset($_POST['refundsave']))
{
    $refund_id = $_POST['refund_id'];
    $transaction_code = $_POST['transaction_code'];
    
    $result2 = mysqli_query($con, "UPDATE refund SET transaction_code = '$transaction_code' WHERE refund_id = '$refund_id' ") or die(mysqli_error($con));
    ?>
    <script>
    alert('Success to Save');
    window.location.href='main.php#adrequest';
    </script>
    <?php
}

?>
<div class="col-xs-12 col-md-12 col-lg-12">
    <h2 class="bigh2 pagetitle hidden-xs hidden-sm">Refund Requests</h2>
    
    <h2 class="smh2 pagetitle hidden-md hidden-lg">Refund Requests</h2>
    
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <table class="tblITab">
                <tr>
                    <td class="wborder"><button class="btn-link btntab" id="btnrpurchase" onclick="funcRPurchase()">Refund</button></td>
                    <td><button class="btn-link btntab" id="btnrhistory" onclick="funcRHistory()">History</button></td>
                </tr>
            </table>
        </div>
    </div>
    
    <div class="row">
        <div id="rpurchase">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th>Customer</th>
                        <th>Total Amount (RM)</th>
                        <th>Refund Amount (RM)</th>
                        <th>Admin Charge (RM)</th>
                        <th>Reason</th>
                        <th>Transaction Code</th>
                    </tr>
                    <?php 
                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_array($result))
                            {
                                ?>
                                <tr>
                                    <td><?php echo $row['fname']." ".$row['lname']; ?></td>
                                    <td><?php echo $row['total_amount']; ?></td>
                                    <td><?php echo $row['refund_amount']; ?></td>
                                    <td><?php echo $row['admin_charge']; ?></td>
                                    <td><?php echo $row['refund_reason']; ?></td>
                                    <td>
                                        <a data-toggle="modal" data-id="<?php echo $row['refund_id']; ?>" class="btn btnGo transactionCode" href="#transactionCode">Approve</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }else{
                            ?>
                                <tr>
                                    <td colspan="6">No refund is pending.</td>
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

                        <form method="post" action="request.php">
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
        
        <div id="rhistory">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th>Customer</th>
                        <th>Total Amount (RM)</th>
                        <th>Refund Amount (RM)</th>
                        <th>Admin Charge (RM)</th>
                        <th>Reason</th>
                        <th>Transaction Code</th>
                    </tr>
                     <?php 
                        if(mysqli_num_rows($result1) > 0)
                        {
                            while($row = mysqli_fetch_array($result1))
                            {
                                ?>
                                <tr>
                                    <td><?php echo $row['fname']." ".$row['lname']; ?></td>
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
                                    <td colspan="6">No refund record.</td>
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