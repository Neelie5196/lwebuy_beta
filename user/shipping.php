<?php

/*
require_once '../connection/config.php';
session_start();
$i= 0;
$purchaselistQuery = $db->prepare("
    SELECT *
    FROM shipping
    WHERE user_id=:user_id
");

$purchaselistQuery->execute([
    'user_id' => $_SESSION['user_id']
]);

$purchaselist = $purchaselistQuery->rowCount() ? $purchaselistQuery : [];
*/

?>
 <div class="col-md-12 col-lg-12 hidden-xs hidden-sm">
    <h2 class="bigh2 pagetitle">Ship</h2>
    
    <div class="row">
        <div class="col-md-12 col-lg-12">
            
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
                
                <tr class="bodyrow" data-toggle="modal" data-target="#editPurchase">
                    <td>sdfghjk</td>
                    <td>sdfghjk</td>
                    <td>1</td>
                    <td>24</td>
                    <td>sdfghjk</td>
                    <td>dfghjk</td>
                    <td>4567</td>
                    <td>
                        <button type="button" class="btn btn-default btn-xs btnDelete"><span class="glyphicon glyphicon-trash"></span></button>
                        <button type="button" class="btn btn-default btn-xs btnDelete" data-toggle="modal1" data-target="#editPurchase"><span class="glyphicon glyphicon-pencil"></span></button>
                    </td>
                </tr>
                
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