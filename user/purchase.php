<?php

require_once '../connection/config.php';
session_start();
$user_id = $_SESSION['user_id'];

$query = "SELECT *
          FROM order_item
          WHERE user_id='$user_id' AND status = 'request'";
$result = mysqli_query($con, $query);

if(isset($_POST['addpurchaserequest']))
{    

    $name = $_POST['name'];
    $link = $_POST['link'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $remark = $_POST['remark'];
    $status = 'Request';
    
    $nametoupload = addslashes($name);
    $linktoupload = str_replace("'", "%27", $link);
    $categorytoupload = addslashes($category);
    $remarktoupload = addslashes($remark);
    
    $result1 = mysqli_query($con, "INSERT INTO order_item SET user_id = '$user_id', order_item = '$nametoupload', link = '$linktoupload', category = '$categorytoupload', quantity = '$quantity', remark = '$remarktoupload', status = '$status'") or die(mysqli_error($con));
    
    ?>
    <script>
    window.location.href='main.php#purchase';
    </script>
    <?php
}

if (isset($_GET['order_item_id']))
{
    $order_item_id = $_GET['order_item_id'];

    $result2 = mysqli_query($con, "DELETE FROM order_item WHERE order_item_id=$order_item_id") or die(mysqli_error($con));
    
    ?>
    <script>
    window.location.href='main.php#purchase';
    </script>
    <?php

}

$query3 = "SELECT * FROM category";
$result3 = mysqli_query($con, $query3);

$query4 = "SELECT * FROM category";
$result4 = mysqli_query($con, $query4);

if(isset($_POST['edit']))
{   
    $order_item_id = $_POST['orderItemId'];
    $name = $_POST['name'];
    $link = $_POST['link'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $remark = $_POST['remark'];
    
    $nametoupload = addslashes($name);
    $linktoupload = str_replace("'", "%27", $link);
    $categorytoupload = addslashes($category);
    $remarktoupload = addslashes($remark);
    
    $result5 = mysqli_query($con, "UPDATE order_item SET order_item='$nametoupload', link='$linktoupload', category='$categorytoupload', quantity='$quantity', remark='$remarktoupload' WHERE order_item_id='$order_item_id'") or die(mysqli_error($con));
    
    ?>
    <script>
    window.location.href='main.php#purchase';
    </script>
    <?php
}

$query6 = "SELECT *
           FROM order_item
           WHERE user_id='$user_id' AND status = 'ready to pay' AND payment_id is NULL";
$result6 = mysqli_query($con, $query6);

if(isset($_POST['edit1']))
{   
    $order_item_id = $_POST['orderItemId'];
    $quantity = $_POST['quantity'];
    
    $result7 = mysqli_query($con, "UPDATE order_item SET quantity='$quantity' WHERE order_item_id='$order_item_id'") or die(mysqli_error($con));
    
    ?>
    <script>
    window.location.href='main.php#purchase';
    </script>
    <?php
}

$query8 = "SELECT *
           FROM order_item
           WHERE user_id='$user_id' AND status = 'paid' OR user_id='$user_id' AND status = 'proceed'";
$result8 = mysqli_query($con, $query8);

$query9 = "SELECT *
           FROM order_item
           WHERE user_id='$user_id' AND status = 'received'";
$result9 = mysqli_query($con, $query9);

$query10 = "SELECT *
           FROM order_item
           WHERE user_id='$user_id' AND status = 'declined'";
$result10 = mysqli_query($con, $query10);

$query11 = "SELECT *
           FROM order_item oi
           JOIN top_up tu
           ON tu.payment_id = oi.payment_id
           WHERE oi.user_id='$user_id' AND status = 'top-up'
           GROUP BY oi.payment_id";
$result11 = mysqli_query($con, $query11);

$query20 = "SELECT * 
          FROM country";
$result20 = mysqli_query($con, $query20);
$results20 = mysqli_fetch_assoc($result20);
?>


<div class="col-xs-12 col-md-12 col-lg-12">
    <h2 class="bigh2 pagetitle hidden-xs hidden-sm">Purchase</h2>
    
    <h2 class="smh2 pagetitle hidden-md hidden-lg">Purchase</h2>
    
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <table class="tblTab">
                <tr>
                    <td class="wborder"><button class="btn-link btntab" id="btnprequest" onclick="funcPRequest()">Requests <?php if(mysqli_num_rows($result) > 0) {echo "(" . mysqli_num_rows($result) . ")";} ?></button></td>
                    <td class="wborder"><button class="btn-link btntab" id="btnppayment" onclick="funcPPayment()">Pending Payments <?php if(mysqli_num_rows($result6) > 0) {echo "(" . mysqli_num_rows($result6) . ")";} ?></button></td>
                    <td class="wborder"><button class="btn-link btntab" id="btnpinsuff" onclick="funcPInsuff()">Insufficient Payments <?php if(mysqli_num_rows($result11) > 0) {echo "(" . mysqli_num_rows($result11) . ")";} ?></button></td>
                    <td class="wborder"><button class="btn-link btntab" id="btnpproceed" onclick="funcPProceed()">Proceeded <?php if(mysqli_num_rows($result8) > 0) {echo "(" . mysqli_num_rows($result8) . ")";} ?></button></td>
                    <td class="wborder"><button class="btn-link btntab" id="btnpreceive" onclick="funcPReceive()">Received</button></td>
                    <td><button class="btn-link btntab" id="btnpdecline" onclick="funcPDecline()">Declined</button></td>
                </tr>
            </table>
        </div>
    </div>
    
    <div class="row">
        <div id="prequest">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <p class="requestp">Today's exchange rate (RMB : MYR) = 1 : <?php echo $results20['country_currency']; ?></p>
                <table class="purchasetable">
                    <tr class="center">
                        <th class="purchasecol2">Name</th>
                        <th class="purchasecol2">Link</th>
                        <th class="purchasecol1">Category</th>
                        <th class="purchasecol1">Quantity</th>
                        <th class="purchasecol2">Remark</th>
                        <th class="purchasecol1"></th>
                    </tr>

                    <?php
                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_array($result))
                            {
                    ?>

                    <tr class="bodyrow">
                        <td><?php echo $row['order_item']; ?></td>
                        <td>
                            <a href="#" class="btntab" onclick="window.open('<?php echo $row['link']; ?> ','','Toolbar=1,Location=0,Directories=0,Status=0,Menubar=0,Scrollbars=0,Resizable=0,fullscreen=yes');">View item</a>
                        </td>
                        <td><?php echo $row['category']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['remark']; ?></td>
                        <td>
                            <a href="purchase.php?order_item_id=<?php echo $row['order_item_id']; ?>" class="btn btn-default btn-xs btnDelete" name="delete" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
                            
                            <a data-toggle="modal" data-id="<?php echo $row['order_item_id']; ?>" data-name="<?php echo $row['order_item']; ?>" data-link="<?php echo $row['link']; ?>" data-category="<?php echo $row['category']; ?>" data-quantity="<?php echo $row['quantity']; ?>" data-remark="<?php echo $row['remark']; ?>" class="btn btn-default btn-xs btnDelete editRPurchase" href="#editRPurchase" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
                        </td>
                    </tr>

                    <?php
                        }
                    }
                    else
                    {
                    ?>

                    <tr>
                        <td colspan="8">No requests submitted.</td>
                    </tr>

                    <?php
                        }
                    ?>

                    <tr>
                        <td colspan="8">
                            <button type="button" class="btn btn-default btnAdd" data-toggle="modal" data-target="#addPurchase">Add</button>
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="modal fade" id="addPurchase" tabindex="-1" role="dialog" aria-labelledby="addPurchaseTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addPurchaseTitle">Add Purchase</h5>
                        </div>

                        <form method="post" action="purchase.php">
                            <div class="modal-body left">
                                <p><input class="formfield" name="name" type="text" placeholder="Name" autofocus required /></p>

                                <p><input class="formfield" name="link" type="text" placeholder="URL" required /></p>

                                <p>
                                    <select name="category" class="formselect" required>
                                        <option class="formoption" selected>Category</option>
                                        <?php 
                                            if(mysqli_num_rows($result3) > 0)
                                            {
                                                while($row = mysqli_fetch_array($result3))
                                                {
                                                    ?>
                                                        <option class="formoption" value="<?php echo $row['category_name']; ?>">
                                                            <?php echo $row['category_name']; ?>
                                                        </option>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    </select>
                                </p>

                                <p><input class="formfield" name="quantity" type="number" placeholder="Quantity" min='1' required /></p>

                                <p><input class="formfield" name="remark" type="text" placeholder="Remarks" required /></p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btn-success btnSend" name="addpurchaserequest" value="Request" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="editRPurchase" tabindex="-1" role="dialog" aria-labelledby="editRPurchaseTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="EditRPurchaseTitle">Edit Purchase</h5>
                        </div>

                        <form method="post" action="purchase.php">
                            <div class="modal-body left">
                                <input type="hidden" name="orderItemId" id="orderItemId" value=""/>
                                
                                <p><input class="formfield" name="name" id="name" type="text" placeholder="Name" required /></p>

                                <p><input class="formfield" name="link" id="link" type="text" placeholder="URL" required /></p>

                                <p>
                                    <select name="category" class="formselect" required>
                                        <option class="formoption" value="" selected>Category</option>
                                        <?php 
                                            if(mysqli_num_rows($result4) > 0)
                                            {
                                                while($row = mysqli_fetch_array($result4))
                                                {
                                                    ?>
                                                        <option class="formoption" value="<?php echo $row['category_name']; ?>">
                                                            <?php echo $row['category_name']; ?>
                                                        </option>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    </select>
                                </p>

                                <p><input class="formfield" name="quantity" id="quantity" type="number" placeholder="Quantity" min="1" required /></p>

                                <p><input class="formfield" name="remark" id="remark" type="text" placeholder="Remarks" required /></p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btn-success btnSend" name="edit" value="Save" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="ppayment">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <form action="payment.php" method="post">
                    <table class="purchasetable">
                        <tr class="center">
                            <th class="purchasecol05"></th>
                            <th class="purchasecol1.5">Name</th>
                            <th class="purchasecol1.5">Link</th>
                            <th class="purchasecol1">Category</th>
                            <th class="purchasecol05">Quantity</th>
                            <th class="purchasecol1">Unit Price</th>
                            <th class="purchasecol1">Total Price</th>
                            <th class="purchasecol2">Remark</th>
                            <th class="purchasecol1"></th>
                        </tr>

                        <?php
                            if(mysqli_num_rows($result6) > 0)
                            {
                                while($row = mysqli_fetch_array($result6))
                                {
                                    $total_price = $row['quantity']*$row['price'];
                        ?>

                        <tr class="bodyrow">
                            <td><input type="checkbox" value="<?php echo $row['order_item_id']; ?>" name="order_item[]"></td>
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
                                <a href="purchase.php?order_item_id=<?php echo $row['order_item_id']; ?>" class="btn btn-default btn-xs btnDelete" name="delete" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>

                                <a data-toggle="modal" data-id="<?php echo $row['order_item_id']; ?>" data-quantity="<?php echo $row['quantity']; ?>" class="btn btn-default btn-xs btnDelete editPPurchase" href="#editPPurchase"><span class="glyphicon glyphicon-pencil" title="Edit"></span></a>
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

                        <tr>
                            <td colspan="9">
                                <input type="submit" class="btn btn-default btnAdd" name="pay" value="Pay" onclick="return val();">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        
            <div class="modal fade" id="editPPurchase" tabindex="-1" role="dialog" aria-labelledby="editPPurchaseTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="EditPPurchaseTitle">Edit Purchase</h5>
                        </div>

                        <form method="post" action="purchase.php">
                            <div class="modal-body left">
                                <input type="hidden" name="orderItemId" id="orderItemId" value=""/>
                                
                                <p><input class="formfield" name="quantity" id="quantity" type="number" placeholder="Quantity" min='1' /></p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btn-success btnSend" name="edit1" value="Save" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="pinsuff">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th>Payment ID</th>
                        <th>Total Price (RM)</th>
                        <th>Paid Price (RM)</th>
                        <th>Top-up Price (RM)</th>
                        <th>Reason</th>
                        <th>Payment Details</th>
                    </tr>
                    <?php 
                        if(mysqli_num_rows($result11) > 0)
                        {
                            while($row = mysqli_fetch_array($result11))
                            {
                                $payment_id = $row['payment_id'];
                                $query12 = "SELECT *
                                           FROM order_item
                                           WHERE payment_id='$payment_id'";
                                $result12 = mysqli_query($con, $query12);
                                
                                if(mysqli_num_rows($result12) > 0)
                                {
                                    $total = 0;
                                    while($row1 = mysqli_fetch_array($result12))
                                    {
                                        $total += $row1['price']*$row1['quantity'];
                                    }
                                }
                                ?>
                                <tr>
                                    <td><?php echo $row['payment_id']; ?></td>
                                    <td><?php echo number_format((float)$total, 2, '.', ''); ?></td>
                                    <td><?php echo $row['paid_amount']; ?></td>
                                    <td><?php echo $row['top_up_amount']; ?></td>
                                    <td><?php echo $row['top_up_reason']; ?></td>
                                    <td><a href="paymentview.php?payment_id=<?php echo $row['payment_id']; ?>" class="btntab"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                                </tr>
                                <?php
                            }
                        }else{
                            ?>
                                <tr>
                                    <td colspan="8">No insufficient payments made.</td>
                                </tr>
                            <?php
                        }
                    ?>
                </table>
            </div>
        </div>
        
        <div id="pproceed">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th class="purchasecol1.5">Name</th>
                        <th class="purchasecol1">Link</th>
                        <th class="purchasecol1">Category</th>
                        <th class="purchasecol05">Quantity</th>
                        <th class="purchasecol1">Unit Price</th>
                        <th class="purchasecol1">Total Price</th>
                        <th class="purchasecol1.5">Remark</th>
                        <th class="purchasecol1">Status</th>
                    </tr>

                    <?php
                        if(mysqli_num_rows($result8) > 0)
                        {
                            while($row = mysqli_fetch_array($result8))
                            {
                                $total_price = $row['quantity']*$row['price'];
                    ?>

                    <tr class="bodyrow">
                        <td><?php echo $row['order_item']; ?></td>
                        <td>
                            <a href="#" class="btntab" onclick="window.open('<?php echo $row['link']; ?> ','','Toolbar=1,Location=0,Directories=0,Status=0,Menubar=0,Scrollbars=0,Resizable=0,fullscreen=yes');">View item</a>
                        </td>
                        <td><?php echo $row['category']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo number_format((float)$total_price, 2, '.', ''); ?></td>
                        <td><?php echo $row['remark']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                    </tr>

                    <?php
                        }
                    }
                    else
                    {
                    ?>

                    <tr>
                        <td colspan="8">No purchases paid or proceeded.</td>
                    </tr>

                    <?php
                        }
                    ?>
                </table>
            </div>
        </div>
        
        <div id="preceive">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th class="purchasecol2">Name</th>
                        <th class="purchasecol2">Link</th>
                        <th class="purchasecol1">Category</th>
                        <th class="purchasecol05">Quantity</th>
                        <th class="purchasecol1">Unit Price</th>
                        <th class="purchasecol1">Total Price</th>
                        <th class="purchasecol2">Remark</th>
                    </tr>

                    <?php
                        if(mysqli_num_rows($result9) > 0)
                        {
                            while($row = mysqli_fetch_array($result9))
                            {
                                $total_price = $row['quantity']*$row['price'];
                    ?>

                    <tr class="bodyrow">
                        <td><?php echo $row['order_item']; ?></td>
                        <td>
                            <a href="#" class="btntab" onclick="window.open('<?php echo $row['link']; ?> ','','Toolbar=1,Location=0,Directories=0,Status=0,Menubar=0,Scrollbars=0,Resizable=0,fullscreen=yes');">View item</a>
                        </td>
                        <td><?php echo $row['category']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo number_format((float)$total_price, 2, '.', ''); ?></td>
                        <td><?php echo $row['remark']; ?></td>
                    </tr>

                    <?php
                        }
                    }
                    else
                    {
                    ?>

                    <tr>
                        <td colspan="8">No purchases received.</td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
            </div>
        </div>
        
        <div id="pdecline">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th class="purchasecol2">Name</th>
                        <th class="purchasecol1">Link</th>
                        <th class="purchasecol1">Category</th>
                        <th class="purchasecol05">Quantity</th>
                        <th class="purchasecol2">Remark</th>
                        <th class="purchasecol2">Comments</th>
                    </tr>

                    <?php
                        if(mysqli_num_rows($result10) > 0)
                        {
                            while($row = mysqli_fetch_array($result10))
                            {
                    ?>

                    <tr class="bodyrow">
                        <td><?php echo $row['order_item']; ?></td>
                        <td>
                            <a href="#" class="btntab" onclick="window.open('<?php echo $row['link']; ?> ','','Toolbar=1,Location=0,Directories=0,Status=0,Menubar=0,Scrollbars=0,Resizable=0,fullscreen=yes');">View item</a>
                        </td>
                        <td><?php echo $row['category']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['remark']; ?></td>
                        <td><?php echo $row['comment']; ?></td>
                        <td></td>
                    </tr>

                    <?php
                        }
                    }
                    else
                    {
                    ?>

                    <tr>
                        <td colspan="8">No declined purchases.</td>
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
$(document).on("click", ".editRPurchase", function () {
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
    $('#editRPurchase').modal('show');
});
    
$(document).on("click", ".editPPurchase", function () {
    var orderItemId = $(this).data('id');
    var orderItemQuantity = $(this).data('quantity');
    $(".modal-body #orderItemId").val( orderItemId );
    $(".modal-body #quantity").val( orderItemQuantity );
    $('#editPPurchase').modal('show');
});
    
    /*Validate*/
    function val(){
        var items = document.getElementsByName('order_item[]');
        var hasChecked = false;

        for (var i = 0; i < items.length; i++)
        {
            if (items[i].checked)
            {
                hasChecked = true;
                break;
            }
        }
        if (hasChecked == false)
        {
            alert("Please select at least one item");
            return false;
        }
        return true;
    }
</script>

