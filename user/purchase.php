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
    window.location.href='purchase.php?';
    </script>
    <?php

}

if (isset($_GET['empty']))
{
    
    $result3 = mysqli_query($con, "DELETE FROM order_item WHERE status IS NULL AND user_id=$user_id") or die(mysqli_error($con));
    
    ?>
    <script>
    window.location.href='purchase.php';
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

?>

<div class="col-md-12 col-lg-12 hidden-xs hidden-sm">
    <h2 class="bigh2 pagetitle">Purchase</h2>
    
    <div class="row">
        <div class="col-md-12 col-lg-12">
            
            <?php 
                if(mysqli_num_rows($result) > 0)
                {
            ?>
            
            <table class="purchasetable">
                <tr>
                    <th class="purchasecol2">Name</th>
                    <th class="purchasecol2">Link</th>
                    <th class="purchasecol2">Category</th>
                    <th class="purchasecol1">Quantity</th>
                    <th class="purchasecol2">Remark</th>
                    <th class="purchasecol1">Status</th>
                    <th class="purchasecol1">Total Price</th>
                    <th class="purchasecol1"></th>
                </tr>
                
                <?php
                    while($row = mysqli_fetch_array($result))
                    {
                ?>
                
                <tr class="bodyrow" data-toggle="modal" data-target="#editPurchase">
                    <td><?php echo $row['order_item']; ?></td>
                    <td><a href="<?php echo $row['link']; ?>" target="_blank">View item</a></td>
                    <td><?php echo $row['category']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['remark']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td>
                        <a href="purchase.php?order_item_id=<?php echo $row['order_item_id']; ?>" class="btn btn-default btn-xs btnDelete" name="delete"><span class="glyphicon glyphicon-trash"></span></a>
                        <button type="button" class="btn btn-default btn-xs btnDelete" data-toggle="modal1" data-target="#editPurchase"><span class="glyphicon glyphicon-pencil"></span></button>
                    </td>
                </tr>
                
                <?php
                    }
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
        
        <div class="modal fade" id="editPurchase" tabindex="-1" role="dialog" aria-labelledby="editPurchaseTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="EditPurchaseTitle">Edit Purchase</h5>
                    </div>
                    
                    <form method="post" action="purchase.php">
                        <div class="modal-body left">
                            <p><input class="formfield" name="name" type="text" placeholder="Name" required /></p>
                            
                            <p><input class="formfield" name="link" type="text" placeholder="URL" required /></p>
                            
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
                            
                            <p><input class="formfield" name="quantity" type="number" placeholder="Quantity" required /></p>
                            
                            <p><input class="formfield" name="remark" type="text" placeholder="Remarks" required /></p>
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
</div>