<?php
require_once '../connection/config.php';
session_start();

$user_id = $_SESSION['user_id'];

$query = "SELECT *
          FROM payment
          WHERE user_id='$user_id' AND status = 'Waiting for approval'";
$result = mysqli_query($con, $query);

$query1 = "SELECT *
          FROM payment
          WHERE user_id='$user_id' AND status='Completed' OR user_id='$user_id' AND status='Declined'";
$result1 = mysqli_query($con, $query1);

$query2 = "SELECT *
          FROM payment
          WHERE user_id='$user_id'";
$result2 = mysqli_query($con, $query2);
$results2 = mysqli_fetch_assoc($result2);
?>
<?php
if(isset($_POST["add"]))
{    
	$unique_id = rand(10000,100000). $user_id;
    $payment_id = $unique_id;
    $status = 'Waiting for Approval';
    
    $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_type = $_FILES['file']['type'];
	$folder="../receipts/";
	$type = $file_type;
    $title = 'Reload Point';
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	
	$final_file=str_replace(' ','-',$new_file_name);
    
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
	
	$result = mysqli_query($con, "INSERT INTO payment SET  payment_id='$payment_id', user_id='$user_id', title='$title',file = '$file', type = '$type',status='$status'") or die(mysqli_error($con));
    ?>
    <script>
     window.location.href='main.php#credit';
    </script>
    <?php
}
}
if(isset($_POST["reupload"]))
{    
	$payment_id = $_POST['payment_id'];
    $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_type = $_FILES['file']['type'];
	$folder="../receipts/";
	$type = $file_type;
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	
	$final_file=str_replace(' ','-',$new_file_name);
    
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
	
	$resultload = mysqli_query($con, "UPDATE payment SET file = '$file' WHERE payment_id='$payment_id'") or die(mysqli_error($con));
    ?>
    <script>
	window.location.href='main.php#credit';
    </script>
    <?php
}
}
?>
<?php
if (isset($_GET['payment_id']))
{
    $payment_id = $_GET['payment_id'];
    $result2 = mysqli_query($con, "DELETE FROM payment WHERE payment_id=$payment_id") or die(mysqli_error($con));
    ?>
    <script>
    window.location.href='main.php#credit';
    </script>
    <?php

}

$query12 = "SELECT * FROM users WHERE user_id='$user_id'";
$result12 = mysqli_query($con, $query12);
$results12 = mysqli_fetch_assoc($result12);

$query19 = "SELECT * 
          FROM point
          WHERE user_id = '$user_id'";
$result19 = mysqli_query($con, $query19);
$results19 = mysqli_fetch_assoc($result19);

$query20 = "SELECT * 
          FROM rate
          WHERE rate_name = 'LWE point'";
$result20 = mysqli_query($con, $query20);
$results20 = mysqli_fetch_assoc($result20);

if(isset($_POST['molPay']))
{    
    $unique_id = rand(10000,100000). $user_id;
    $payment_id = $unique_id;
    $amount = number_format((float)$_POST['amount'], 2, '.', '');
    $merchantID = 'SB_parcelgateway';
    $orderid = $payment_id;
    $verifykey = '93c210aa2652f010892f41c659c677a4';
    $vcode = md5( $amount.$merchantID.$orderid.$verifykey );
    
    $bill_name = $_POST['bill_name'];
    $bill_email = $_POST['bill_email'];
    $bill_mobile = $_POST['bill_mobile'];
    $bill_desc = $_POST['bill_desc'];
    $country = $_POST['country'];
    
    ?>
    <script>
    window.location.href='https://sandbox.molpay.com/MOLPay/pay/SB_parcelgateway/index.php?amount=<?php echo $amount; ?>&orderid=<?php echo $orderid; ?>&bill_name=<?php echo $bill_name; ?>&bill_email=<?php echo $bill_email; ?>&bill_mobile=<?php echo $bill_mobile; ?>&bill_desc=<?php echo $bill_desc; ?>&country=<?php echo $country; ?>&vcode=<?php echo $vcode; ?>';
    </script>
    <?php
}
?>
<link rel="stylesheet" href="../frameworks/css/lightbox.min.css">
<div class="col-xs-12 col-md-12 col-lg-12">
    <h2 class="bigh2 pagetitle hidden-xs hidden-sm">Credits</h2>
    
    <h2 class="smh2 pagetitle hidden-md hidden-lg">Credits</h2>
    
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <table class="tblCTab">
                <tr>
                    <td class="wborder"><button class="btn-link btntab" id="btncrequest" onclick="funcCRequest()">Requests</button></td>
                    <td><button class="btn-link btntab" id="btnchistory" onclick="funcCHistory()">Transaction History</button></td>
                </tr>
            </table>
        </div>
    </div>
    
    <div class="row">
        <div id="crequest">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <?php
                    if($results19['user_id']>0){
                        ?>
                        <p class="requestp">Current point : <?php echo $results19['point']." points"; ?></p>
                        <?php
                    }
                ?>
                <p class="requestp">Today's point rate (1 LWE point : MYR) = 1 : <?php echo $results20['rate']; ?></p>
                <table class="purchasetable">
                    <tr class="center">
                        <th class="purchasecol3">Event</th>
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
                        <td><?php echo $row['title']; ?></td>
                        <td><button type="button" class="btn btntab" data-toggle="modal" data-target="#myModal" onclick="passimg('<?php echo $row['file']; ?>')" title="View receipt"><span class="glyphicon glyphicon-eye-open"></span></button></td>
                        <td><?php echo $row['datetime']; ?></td>
                        <td>	
                           <a href="credit.php?payment_id=<?php echo $row['payment_id']; ?>" class="btn btn-default btn-xs btnDelete" name="delete" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
						    <a data-toggle="modal" data-id="<?php echo $row['payment_id']; ?>" data-file="<?php echo $row['file']; ?>" class="btn btn-default btn-xs btnDelete editCredit" href="#editCredit" title="Re-upload"><span class="glyphicon glyphicon-pencil"></span></a>
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
                            <button type="button" class="btn btn-default btnAdd" data-toggle="modal" data-target="#addCredits">Add</button>
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

                        <form method="post" action="credit.php" enctype="multipart/form-data">
                            <div class="modal-body left">
                                

                                <p>
                                    <label>Upload Transaction Receipt</label><br/>
                                    <input type="file" name="file" class="center" accept="image/*" required />
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
			
			<div class="modal fade" id="editCredit" tabindex="-1" role="dialog" aria-labelledby="addCreditTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addCreditTitle">Re-upload Receipt</h5>
                        </div>

                        <form method="post" action="credit.php" enctype="multipart/form-data">
                            <div class="modal-body left">
									<input type="hidden" name="payment_id" id="paymentId" value=""/>
                                <p>
                                    <label>Upload Transaction Receipt</label><br/>
                                    <input type="file" name="file" class="center" accept="image/*" required />
                                </p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btn-success btnSend" name="reupload" value="Request" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            
			
            <div class="modal fade" id="addCredits" tabindex="-1" role="dialog" aria-labelledby="addCreditsTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addCreditsTitle">Top Up Credit</h5>
                        </div>
                        <div class="modal-body left">
                            <div class="row">
                                <div class="col-xs-12 col-md-6 col-lg-6">
                                    <button type="button" class="btn btn-default btnAdd" data-toggle="modal" data-target="#addCreditss" data-dismiss="modal">MOLPay</button>
                                </div>
                                <div class="col-xs-12 col-md-6 col-lg-6">
                                    <button type="button" class="btn btn-default btnAdd" data-toggle="modal" data-target="#addCredit" data-dismiss="modal">Upload Receipt</button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="addCreditss" tabindex="-1" role="dialog" aria-labelledby="addCreditssTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="credit.php" method= "POST">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addCreditssTitle">Top Up Credit</h5>
                            </div>
                            <div class="modal-body left">
                                <input type="number" name= "amount" value="" min="0.01" step="0.01" placeholder="Reload Amount (RM)" required>
                                <input type="hidden" name= "orderid" value="<?php echo $payment_id; ?>">
                                <input type="hidden" name= "bill_name" value="<?php echo $results12['fname']." ".$results12['lname']; ?>">
                                <input type="hidden" name= "bill_email" value="<?php echo $results12['email']; ?>">
                                <input type="hidden" name= "bill_mobile" value="<?php echo $results12['contact']; ?>">
                                <input type="hidden" name= "bill_desc" value="Credit Payment">
                                <input type="hidden" name= "country" value="MYR">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btn-success" name="molPay" value="PAY NOW">
                            </div>
                        </form>
                    </div>
                </div>
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
        
        <div id="chistory">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th class="purchasecol3">Event</th>
                        <th class="purchasecol2">Amount</th>
                        <th class="purchasecol2">Transaction Receipt</th>
                        <th class="purchasecol25">Status</th>
                    </tr>
                    
                    <?php
                        if(mysqli_num_rows($result1) > 0)
                        {
                            while($row1 = mysqli_fetch_array($result1))
                            {
                    ?>
                    
                    <tr class="bodyrow">
                        <td><?php echo $row1['title']; ?></td>
                        <td><?php echo $row1['amount']; ?></td>
						<td>
                            <?php
                                if($row1['file'] != NULL){
                                    ?>
                                        <a href="../receipts/<?php echo $row1['file']; ?>" data-lightbox="receipt" title="View receipt"><span class="glyphicon glyphicon-eye-open"></span></a>
                                    <?php
                                }else{
                                    ?>
                                        <p>By Credit or MOLpay</p>
                                    <?php
                                }
                            ?>
                        </td>
                        <td><?php echo $row1['status']; ?></td>
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
                </table>
            </div>
        </div>
    </div>
</div>
<script src="../frameworks/js/lightbox-plus-jquery.min.js"></script>

<script>
    function passimg(filename)
    {
        document.getElementById("imgcontain").setAttribute("src", "../receipts/" + filename);
    }
</script>
<script>
$(document).on("click", ".editCredit", function () {
    var paymentId = $(this).data('id');
    $(".modal-body #paymentId").val( paymentId );
    $('#editCredit').modal('show');
});

</script>
