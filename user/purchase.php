<?php

require_once '../connection/config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(isset($_POST['add']))
{    

    $name = $_POST['name'];
    $link = $_POST['link'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $remark = $_POST['remark'];
    
	
	$result1 = mysqli_query($con, "INSERT INTO order_item SET user_id='$user_id', order_item='$name', link='$link', category='$category', quantity='$quantity', remark='$remark'") or die(mysqli_error($con));
    
    ?>
    <script>
    window.location.href='main.php#purchase';
    </script>
    <?php
}

$query = "SELECT *
          FROM order_item
          WHERE user_id='$user_id' AND status IS NULL";
$result = mysqli_query($con, $query);

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

if (isset($_GET['empty']))
{
    
    $result3 = mysqli_query($con, "DELETE FROM order_item WHERE status IS NULL AND user_id=$user_id") or die(mysqli_error($con));
    
    ?>
    <script>
    window.location.href='main.php#purchase';
    </script>
    <?php

}

if(isset($_POST['request']))
{   
    $status = 'Request';
    
    $result4 = mysqli_query($con, "UPDATE order_item SET status='$status' WHERE status IS NULL AND user_id='$user_id'") or die(mysqli_error($con));
    
    ?>
    <script>
    alert('Success to Submit Request');
    window.location.href='purchaselist.php';
    </script>
    <?php
}

$query5 = "SELECT * FROM category";
$result5 = mysqli_query($con, $query5);

$query6 = "SELECT * FROM category";
$result6 = mysqli_query($con, $query6);

if(isset($_POST['edit']))
{   
    $order_item_id = $_POST['orderItemId'];
    $name = $_POST['name'];
    $link = $_POST['link'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $remark = $_POST['remark'];
    
    $result7 = mysqli_query($con, "UPDATE order_item SET order_item='$name', link='$link', category='$category', quantity='$quantity', remark='$remark' WHERE order_item_id='$order_item_id'") or die(mysqli_error($con));
    
    ?>
    <script>
    alert('Success to Update');
    window.location.href='main.php#purchase';
    </script>
    <?php
}
?>


<div class="col-xs-12 col-md-12 col-lg-12">
    <h2 class="bigh2 pagetitle hidden-xs hidden-sm">Purchase</h2>
    
    <h2 class="smh2 pagetitle hidden-md hidden-lg">Purchase</h2>
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <table class="tblTab">
                <tr>
                    <td class="wborder"><button class="btn-link btntab" onclick="funcPRequest()">Requests</button></td>
                    <td class="wborder"><button class="btn-link btntab" onclick="funcPPayment()">Pending Payments</button></td>
                    <td class="wborder"><button class="btn-link btntab" onclick="funcPProceed()">Proceeded</button></td>
                    <td class="wborder"><button class="btn-link btntab" onclick="funcPReceive()">Received</button></td>
                    <td><button class="btn-link btntab" onclick="funcPDecline()">Declined</button></td>
                </tr>
            </table>
        </div>
    </div>
    
    <div class="row">
        <div id="prequest">
            <div class="col-xs-12 col-md-12 col-lg-12">
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
                        <td><a href="<?php echo $row['link']; ?>" target="_blank">View item</a></td>
                        <td><?php echo $row['category']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['remark']; ?></td>
                        <td>
                            <a href="purchase.php?order_item_id=<?php echo $row['order_item_id']; ?>" class="btn btn-default btn-xs btnDelete" name="delete"><span class="glyphicon glyphicon-trash"></span></a>
                            
                            <a data-toggle="modal" data-id="<?php echo $row['order_item_id']; ?>" data-name="<?php echo $row['order_item']; ?>" data-link="<?php echo $row['link']; ?>" data-category="<?php echo $row['category']; ?>" data-quantity="<?php echo $row['quantity']; ?>" data-remark="<?php echo $row['remark']; ?>" class="btn btn-default btn-xs btnDelete editRPurchase" href="#editRPurchase"><span class="glyphicon glyphicon-pencil"></span></a>
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
                                <p><input class="formfield" name="name" type="text" placeholder="Name" required /></p>

                                <p><input class="formfield" name="link" type="text" placeholder="URL" required /></p>

                                <p>
                                    <select name="category" class="formselect" required>
                                        <option class="formoption" selected>Category</option>
                                        <?php 
                                            if(mysqli_num_rows($result5) > 0)
                                            {
                                                while($row = mysqli_fetch_array($result5))
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

                                <p><input class="formfield" name="quantity" type="number" placeholder="Quantity" required /></p>

                                <p><input class="formfield" name="remark" type="text" placeholder="Remarks" required /></p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btn-success btnSend" name="add" value="Send" />
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
                                        <option class="formoption" selected>Category</option>
                                        <?php 
                                            if(mysqli_num_rows($result6) > 0)
                                            {
                                                while($row = mysqli_fetch_array($result6))
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

                                <p><input class="formfield" name="quantity" id="quantity" type="number" placeholder="Quantity" required /></p>

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
                <table class="purchasetable">
                    <tr class="center">
                        <th class="purchasecol05"></th>
                        <th class="purchasecol2">Name</th>
                        <th class="purchasecol2">Link</th>
                        <th class="purchasecol1">Category</th>
                        <th class="purchasecol05">Quantity</th>
                        <th class="purchasecol2">Remark</th>
                        <th class="purchasecol1">Total Price</th>
                        <th class="purchasecol1"></th>
                    </tr>

                    <?php
                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_array($result))
                            {
                    ?>

                    <tr class="bodyrow" data-toggle="modal" data-target="#editPPurchase">
                        <td><input type="checkbox" name="pay" /></td>
                        <td><?php echo $row['order_item']; ?></td>
                        <td><a href="<?php echo $row['link']; ?>" target="_blank">View item</a></td>
                        <td><?php echo $row['category']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['remark']; ?></td>
                        <td></td>
                        <td>
                            <a href="purchase.php?order_item_id=<?php echo $row['order_item_id']; ?>" class="btn btn-default btn-xs btnDelete" name="delete"><span class="glyphicon glyphicon-trash"></span></a>
                            <button type="button" class="btn btn-default btn-xs btnDelete" data-toggle="modal2" data-target="#editPPurchase"><span class="glyphicon glyphicon-pencil"></span></button>
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
                        <td colspan="8">
                            <a href="payment.php" class="btn btn-default btnAdd">Pay</a>
                        </td>
                    </tr>
                </table>
            </div>
        
            <div class="modal fade" id="editPPurchase" tabindex="-1" role="dialog" aria-labelledby="editPPurchaseTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="EditPPurchaseTitle">Edit Purchase</h5>
                        </div>

                        <form method="post" action="purchase.php">
                            <div class="modal-body left">
                                <p><input class="formfield" name="name" type="text" placeholder="Name" disabled /></p>

                                <p><input class="formfield" name="link" type="text" placeholder="URL" disabled /></p>

                                <p>
                                    <select name="category" class="formselect" disabled>
                                        <option class="formoption" selected>Category</option>
                                        <?php 
                                            if(mysqli_num_rows($result6) > 0)
                                            {
                                                while($row = mysqli_fetch_array($result6))
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

                                <p><input class="formfield" name="quantity" type="number" placeholder="Quantity" disabled /></p>

                                <p><input class="formfield" name="remark" type="text" placeholder="Remarks" /></p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btn-success btnSend" name="edit" value="Send" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="pproceed">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th class="purchasecol2">Name</th>
                        <th class="purchasecol2">Link</th>
                        <th class="purchasecol1">Category</th>
                        <th class="purchasecol05">Quantity</th>
                        <th class="purchasecol2">Remark</th>
                        <th class="purchasecol1">Total Price</th>
                    </tr>

                    <?php
                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_array($result))
                            {
                    ?>

                    <tr class="bodyrow" data-toggle="modal" data-target="#editPPurchase">
                        <td><?php echo $row['order_item']; ?></td>
                        <td><a href="<?php echo $row['link']; ?>" target="_blank">View item</a></td>
                        <td><?php echo $row['category']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['remark']; ?></td>
                        <td></td>
                    </tr>

                    <?php
                        }
                    }
                    else
                    {
                    ?>

                    <tr>
                        <td colspan="8">No purchases proceeded.</td>
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
                        <th class="purchasecol2">Remark</th>
                        <th class="purchasecol1">Total Price</th>
                        <th class="purchasecol05">Feedbacks</th>
                    </tr>

                    <?php
                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_array($result))
                            {
                    ?>

                    <tr class="bodyrow" data-toggle="modal" data-target="#editPPurchase">
                        <td><?php echo $row['order_item']; ?></td>
                        <td><a href="<?php echo $row['link']; ?>" target="_blank">View item</a></td>
                        <td><?php echo $row['category']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['remark']; ?></td>
                        <td><button type="button" class="btn btn-default btn-xs btnEdit" data-toggle="modal3" data-target="#pfeedback"><span class="glyphicon glyphicon-edit"></span></button></td>
                        
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
         
            <div class="modal fade" id="pfeeedback" tabindex="-1" role="dialog" aria-labelledby="pfeedbackTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="pfeedbackTitle">Feedbacks</h5>
                        </div>

                        <form method="post" action="purchase.php">
                            <div class="modal-body left">
                                <p><input class="formfield" name="feedback" type="textarea" placeholder="Enter your comments here..." disabled /></p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btn-success btnSend" name="edit" value="Send" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="pdecline">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th class="purchasecol2">Name</th>
                        <th class="purchasecol2">Link</th>
                        <th class="purchasecol1">Category</th>
                        <th class="purchasecol05">Quantity</th>
                        <th class="purchasecol2">Remark</th>
                        <th class="purchasecol1">Comments</th>
                    </tr>

                    <?php
                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_array($result))
                            {
                    ?>

                    <tr class="bodyrow" data-toggle="modal" data-target="#editPPurchase">
                        <td><?php echo $row['order_item']; ?></td>
                        <td><a href="<?php echo $row['link']; ?>" target="_blank">View item</a></td>
                        <td><?php echo $row['category']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
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
</script>