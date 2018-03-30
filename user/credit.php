<?php
require_once '../connection/config.php';
session_start();
$user_id = $_SESSION['user_id'];

$query = "SELECT *
          FROM payment
          WHERE user_id='$user_id' AND status !='Completed'";
$result = mysqli_query($con, $query);

$query1 = "SELECT *
          FROM payment
          WHERE user_id='$user_id' AND status='Completed'";
$result1 = mysqli_query($con, $query1);
?>
<?php
if(isset($_POST["amount"]))
{    
		$file = $_FILES['treceipt'];
		$fileName = $file['name'];
		$fileTmpName = $file['tmp_name'];
		$fileError = $file['error'];
		$fileType = $file['type'];

		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));

		$allowed = array('jpg', 'jpeg', 'png', 'pdf');

		if (in_array($fileActualExt, $allowed)) {
			if ($fileError === 0) {
					$fileNameNew = uniqid('', true).".".$fileActualExt;
					$fileDestination = '../receipts/'.$fileNameNew;
					move_uploaded_file($fileTmpName, $fileDestination);
			} else {
				echo "There was an error uploading your file!";
			}
		} else {
			echo "You cannot upload files of this type!";
		}
	
	$user_id = $_SESSION['user_id'];
	$title = 'Reload Point';
	$amount = $_POST['amount'];
	$file = $fileName;
	$type = $fileType;
	$status = 'Waiting for approval';
	
	$result = mysqli_query($con, "INSERT INTO payment SET user_id='$user_id', datetime=now(), title='$title', amount='$amount', file = '$file', type = '$type',status='$status'") or die(mysqli_error($con));
    ?>
    <script>
    alert('Request Sent!');
    window.location.href='main.php#credit';
    </script>
    <?php
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
?>
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
                        <td><?php echo $row['title']; ?></td>
                        <td>RM <?php echo $row['amount']; ?></td>
                        <td><a href="" class="btntab" target="_blank">View receipt</a></td>
                        <td><?php echo $row['datetime']; ?></td>
                        <td>
                           <a href="credit.php?payment_id=<?php echo $row['payment_id']; ?>" class="btn btn-default btn-xs btnDelete" name="delete"><span class="glyphicon glyphicon-trash"></span></a>
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
                                <p><input class="formfield" id ="amount "name="amount" type="text" placeholder="Enter top up amount" required /></p>

                                <p>
                                    <label>Upload Transaction Receipt</label><br/>
                                    <input type="file" name="file" class="center" required />
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
                        if(mysqli_num_rows($result1) > 0)
                        {
                            while($row1 = mysqli_fetch_array($result1))
                            {
                    ?>
                    
                    <tr class="bodyrow">
                        <td><?php echo $row1['title']; ?></td>
                        <td><?php echo $row1['amount']; ?></td>
                        <td><a href="" class="btntab" target="_blank">View receipt</a></td>
                        <td><?php echo $row1['datetime']; ?></td>
						<td><?php echo $row1['datetime']; ?></td>
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
