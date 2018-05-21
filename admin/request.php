<?php
require_once '../connection/config.php';
session_start();

$query = "SELECT *
           FROM order_item oi
           JOIN users us
           ON us.user_id = oi.user_id
           WHERE oi.status='request'";
$result = mysqli_query($con, $query);

if(isset($_POST['approve']))
{    

    $query1 = "SELECT * 
            FROM country
            WHERE country_name = 'Malaysia'";
    $result1 = mysqli_query($con, $query1);
    $results1 = mysqli_fetch_assoc($result1);
    $user_id = $_SESSION['user_id'];
    $order_item_id = $_POST['order_item_id'];
    $price = $_POST['uprice'];
    $status = 'Ready to Pay';
    $currency = $results1['country_currency'];
    $itemprice = $price * $currency;
    
    $result2 = mysqli_query($con, "UPDATE order_item SET price='$itemprice', status = '$status' WHERE order_item_id = $order_item_id") or die(mysqli_error($con));
    $resultapprove = mysqli_query($con, "INSERT INTO log SET action='approved request #$order_item_id and update item price to $itemprice', created_at=now(), user_id='$user_id'") or die(mysqli_error($con));
			
			$email = $_POST['email'];
			$to=$email;
			$subject="Your request had benn approved" ;
			$from = 'lwebuy.com';
			$body='Proceed to payment';
			$headers = "From:".$from;
			mail($to,$subject,$body,$headers);
  ?>
    <script>
    alert('Requests approved');
    window.location.href='main.php#adrequest';
    </script>
    <?php
}

if(isset($_POST['decline']))
{    
    $user_id = $_SESSION['user_id'];
    $order_item_id = $_POST['order_item_id'];
    $comment = $_POST['uprice'];
    $status = 'Declined';
    
    $result3 = mysqli_query($con, "UPDATE order_item SET comment='$comment', status = '$status' WHERE order_item_id = $order_item_id") or die(mysqli_error($con));
	$resultdecline = mysqli_query($con, "INSERT INTO log SET action='declined request #$order_item_id ', created_at=now(), user_id='$user_id'") or die(mysqli_error($con));

	$email = $_POST['email'];
			$to=$email;
			$subject="Your request had been decline" ;
			$from = 'lwebuy.com';
			$body='Please resubmit the request';
			$headers = "From:".$from;
			mail($to,$subject,$body,$headers);
		
   ?>
    <script>
    alert('Success to Decline');
    window.location.href='main.php#adrequest';
    </script>
    <?php
}

$query4 = "SELECT *
           FROM order_item oi
           JOIN users us
           ON us.user_id = oi.user_id
           WHERE status!='request' AND status!='ready to pay'";
$result4 = mysqli_query($con, $query4);

$query5 = "SELECT *
           FROM order_item oi
           JOIN users us
           ON us.user_id = oi.user_id
           WHERE status = 'ready to pay'";
$result5 = mysqli_query($con, $query5);

if(isset($_POST['editPrice']))
{   
	$user_id = $_SESSION['user_id'];
    $order_item_id = $_POST['orderItemId'];
    $price = $_POST['price'];
    
    $result7 = mysqli_query($con, "UPDATE order_item SET price='$price' WHERE order_item_id='$order_item_id'") or die(mysqli_error($con));
    $resultedit = mysqli_query($con, "INSERT INTO log SET action='edit item #$order_item_id price to $price ', created_at=now(), user_id='$user_id'") or die(mysqli_error($con));
    ?>
    <script>
    window.location.href='main.php#adrequest';
    </script>
    <?php
}

?>
<div class="col-xs-12 col-md-12 col-lg-12">
    <h2 class="bigh2 pagetitle hidden-xs hidden-sm">Pending Requests</h2>
    
    <h2 class="smh2 pagetitle hidden-md hidden-lg">Pending Requests</h2>
    
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <table class="tblATab">
                <tr>
                    <td class="wborder"><button class="btn-link btntab" id="btnrpurchase" onclick="funcRPurchase()">Purchases <?php if(mysqli_num_rows($result) > 0) {echo "(" . mysqli_num_rows($result) . ")";} ?></button></td>
                    <td class="wborder"><button class="btn-link btntab" id="btnrapprove" onclick="funcRApprove()">Approved Requests</button></td>
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
                        <th class="purchasecol2">Customer</th>
                        <th class="purchasecol3">Item Name</th>
                        <th class="purchasecol1">Link</th>
                        <th class="purchasecol1">Category</th>
                        <th class="purchasecol05">Quantity</th>
                        <th class="purchasecol2">Remarks</th>
                        <th class="purchasecol2"></th>
                    </tr>
                    <?php
                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_array($result))
                            {
                                ?>
                                <tr>
                                    <td><?php echo $row['fname']. " " . $row['lname']; ?></td>
                                    <td><?php echo $row['order_item']; ?></td>
                                    <td>
                                        <a href="#" class="btntab" onclick="window.open('<?php echo $row['link']; ?> ','','Toolbar=1,Location=0,Directories=0,Status=0,Menubar=0,Scrollbars=0,Resizable=0,fullscreen=yes');">View item</a>
                                    </td>
                                    <td><?php echo $row['category']; ?></td>
                                    <td><?php echo $row['quantity']; ?></td>
                                    <td><?php echo $row['remark']; ?></td>
                                    <td>
                                        <a data-toggle="modal" data-email="<?php echo $row['email']; ?>" data-id="<?php echo $row['order_item_id']; ?>" data-name="<?php echo $row['order_item']; ?>" data-category="<?php echo $row['category']; ?>" data-quantity="<?php echo $row['quantity']; ?>" data-remark="<?php echo $row['remark']; ?>" class="btn btnGo approveRequest" href="#approveRequest" onclick="apasslink('<?php echo $row['link']; ?>')">Review</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }else{
                            ?>
                                <tr>
                                    <td colspan="7">No pending requests.</td>
                                </tr>
                            <?php
                        }
                    ?>         
                </table>
            </div>
        
            <div class="modal fade" id="approveRequest" tabindex="-1" role="dialog" aria-labelledby="approveRequestTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="approveRequestTitle">Review Request</h5>
                        </div>

                        <form method="post" action="request.php">
                            <div class="modal-body left">
                                <input type="hidden" name="order_item_id" id="orderItemId" value="">
                             
								<input type="hidden" name="email" id="email"  value=""/>
                                <p class="requestp">Item name: <output name="name" id="name"></output></p>

                                <p class="requestp">URL:</p>
                                <div class="overflowurl"><a id="aitemurlbutton" target="_blank"></a></div>

                                <p class="requestp">Category: <output name="category" id="category"></output></p>

                                <p class="requestp">Quantity: <output name="quantity" id="quantity"></output></p>

                                <p class="requestp">Remarks: <output name="remark" id="remark"></output></p>

                                <p>
                                    <span class="requestp">Unit Price (RMB) / Reason: </span><br/>
                                    <input class="formfield" name="uprice" type="text" step="0.01" min="0.01" placeholder="Enter price per item or Decline Reason" required />
                                </p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btn-success btnSend" name="approve" value="Approve" />
                                <input type="submit" class="btn btnDecline" name="decline" value="Decline" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="rapprove">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th class="purchasecol2">Customer</th>
                        <th class="purchasecol3">Item Name</th>
                        <th class="purchasecol1">Link</th>
                        <th class="purchasecol1">Category</th>
                        <th class="purchasecol05">Quantity</th>
                        <th class="purchasecol1">Unit Price</th>
                        <th class="purchasecol1">Total Price</th>
                        <th class="purchasecol2">Remark</th>
                        <th class="purchasecol1"></th>
                    </tr>

                    <?php
                        if(mysqli_num_rows($result5) > 0)
                        {
                            while($row = mysqli_fetch_array($result5))
                            {
                                $total_price = $row['quantity']*$row['price'];
                    ?>

                    <tr class="bodyrow">
                        <td><?php echo $row['fname']." ".$row['lname']; ?></td>
                        <td><?php echo $row['order_item']; ?></td>
                        <td>
                            <a href="#" class="btntab" onclick="window.open('<?php echo $row['link']; ?> ','','Toolbar=1,Location=0,Directories=0,Status=0,Menubar=0,Scrollbars=0,Resizable=0,fullscreen=yes');">View item</a>
                        </td>
                        <td><?php echo $row['category']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo number_format((float)$total_price, 2, '.', ''); ?></td>
                        <td><?php echo $row['remark']; ?></td>
                        <td>
                            <a data-toggle="modal" data-id="<?php echo $row['order_item_id']; ?>" data-price="<?php echo $row['price']; ?>" class="btn btn-default btn-xs btnDelete editRPrice" href="#editRPrice"><span class="glyphicon glyphicon-pencil" title="Edit"></span></a>
                        </td>
                    </tr>

                    <?php
                        }
                    }
                    else
                    {
                    ?>

                    <tr>
                        <td colspan="8">No pending payments.</td>
                    </tr>

                    <?php
                        }
                    ?>
                </table>
            </div>
        
            <div class="modal fade" id="editRPrice" tabindex="-1" role="dialog" aria-labelledby="editRPriceTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editRPriceTitle">Edit Price</h5>
                        </div>

                        <form method="post" action="request.php">
                            <div class="modal-body left">
                                <input type="hidden" name="orderItemId" id="orderItemId" value=""/>
                                
                                <p><input class="formfield" name="price" id="price" type="number" placeholder="Unit Price" min='0.01' step="0.01" /></p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btn-success btnSend" name="editPrice" value="Save" />
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
                        <th class="purchasecol3">Item Name</th>
                        <th class="purchasecol1">Link</th>
                        <th class="purchasecol1">Category</th>
                        <th class="purchasecol05">Quantity</th>
                        <th class="purchasecol1">Remarks</th>
                        <th class="purchasecol1">Action</th>
                        <th class="purchasecol2">Reason</th>
                    </tr>
                    <?php
                        if(mysqli_num_rows($result4) > 0)
                        {
                            while($row = mysqli_fetch_array($result4))
                            {
                                ?>
                                <tr>
                                    <td><?php echo $row['fname']. " " . $row['lname']; ?></td>
                                    <td><?php echo $row['order_item']; ?></td>
                                    <td>
                                        <a href="#" class="btntab" onclick="window.open('<?php echo $row['link']; ?> ','','Toolbar=1,Location=0,Directories=0,Status=0,Menubar=0,Scrollbars=0,Resizable=0,fullscreen=yes');">View item</a>
                                    </td>
                                    <td><?php echo $row['category']; ?></td>
                                    <td><?php echo $row['quantity']; ?></td>
                                    <td><?php echo $row['remark']; ?></td>
                                    <td><?php echo $row['status']; ?></td>
                                    <td><?php echo $row['comment']; ?></td>
                                </tr>
                                <?php
                            }
                        }else{
                            ?>
                                <tr>
                                    <td colspan="8">No requests processed.</td>
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
    $(document).on("click", ".approveRequest", function () {
        var orderEmail = $(this).data('email');
        var orderItemId = $(this).data('id');
        var orderItemName = $(this).data('name');
        var orderItemLink = $(this).data('link');
        var orderItemCategory = $(this).data('category');
        var orderItemQuantity = $(this).data('quantity');
        var orderItemRemark = $(this).data('remark');
        $(".modal-body #email").val( orderEmail );
        $(".modal-body #orderItemId").val( orderItemId );
        $(".modal-body #name").val( orderItemName );
        $(".modal-body #link").val( orderItemLink );
        $(".modal-body #category").val( orderItemCategory );
        $(".modal-body #quantity").val( orderItemQuantity );
        $(".modal-body #remark").val( orderItemRemark );
        $('#approveRequest').modal('show');
    });

    $(document).on("click", ".declineRequest", function () {
        var orderItemId = $(this).data('id');
        var orderItemName = $(this).data('name');
        var orderItemLink = $(this).data('link');
        var orderItemCategory = $(this).data('category');
        var orderItemQuantity = $(this).data('quantity');
        var orderItemRemark = $(this).data('remark');
        $(".modal-body #orderItemId").val( orderItemId );
        $(".modal-body #name").val( orderItemName );
        $(".modal-body #link").val( orderItemLink );
        $(".modal-body #category").val( orderItemCategory );
        $(".modal-body #quantity").val( orderItemQuantity );
        $(".modal-body #remark").val( orderItemRemark );
        $('#declineRequest').modal('show');
    });
    
    function apasslink(itemurl)
    {
        document.getElementById("aitemurlbutton").setAttribute("href", itemurl);
        document.getElementById("aitemurlbutton").innerHTML = itemurl;
    }
    
    $(document).on("click", ".editRPrice", function () {
    var orderItemId = $(this).data('id');
    var orderItemPrice = $(this).data('price');
    $(".modal-body #orderItemId").val( orderItemId );
    $(".modal-body #price").val( orderItemPrice );
    $('#editRPrice').modal('show');
});
</script>