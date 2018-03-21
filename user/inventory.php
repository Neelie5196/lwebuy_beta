<?php


?>
 <div class="col-xs-12 col-md-12 col-lg-12">
    <h2 class="bigh2 pagetitle hidden-xs hidden-sm">Inventory</h2>
    
    <h2 class="smh2 pagetitle hidden-md hidden-lg">Inventory</h2>
    
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <table class="tblITab">
                <tr>
                    <td class="wborder"><button class="btn-link btntab" onclick="funcIPending()">Pending</button></td>
                    <td class="wborder"><button class="btn-link btntab" onclick="funcIReceive()">Received</button></td>
                </tr>
            </table>
        </div>
    </div>
    
    <div class="row">
        <div id="ipending">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th>Name</th>
                        <th>Tracking Code</th>
                        <th>Remarks</th>
                        <th></th>
                    </tr>

                    <?php
                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_array($result))
                            {
                    ?>

                    <tr class="bodyrow" data-toggle="modal" data-target="#editRPurchase">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="" class="btn btn-default btn-xs btnDelete" name="delete"><span class="glyphicon glyphicon-trash"></span></a>
                            <button type="button" class="btn btn-default btn-xs btnDelete" data-toggle="modal6" data-target="#editItem"><span class="glyphicon glyphicon-pencil"></span></button>
                        </td>
                    </tr>

                    <?php
                        }
                    }
                    else
                    {
                    ?>

                    <tr>
                        <td colspan="4">No pending items.</td>
                    </tr>

                    <?php
                        }
                    ?>
                    
                    <tr>
                        <td colspan="4">
                            <button type="button" class="btn btn-default btnAdd" data-toggle="modal" data-target="#addItem">Add</button>
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="modal fade" id="addItem" tabindex="-1" role="dialog" aria-labelledby="addItemTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addItemTitle">Add Item</h5>
                        </div>

                        <form method="post" action="purchase.php">
                            <div class="modal-body left">
                                <p><input class="formfield" name="name" type="text" placeholder="Name" required /></p>

                                <p><input class="formfield" name="trackcode" type="text" placeholder="Tracking Code" required /></p>

                                <p><input class="formfield" name="remark" type="text" placeholder="Remarks" /></p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btn-success btnSend" name="addItem" value="Send" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="editItem" tabindex="-1" role="dialog" aria-labelledby="editRItemTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="EditItemTitle">Edit Item</h5>
                        </div>

                        <form method="post" action="purchase.php">
                            <div class="modal-body left">
                                <p><input class="formfield" name="name" type="text" placeholder="Name" value="" required /></p>

                                <p><input class="formfield" name="trackcode" type="text" placeholder="Tracking Code" value="" required /></p>

                                <p><input class="formfield" name="remark" type="text" placeholder="Remarks" value="" /></p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btn-success btnSend" name="addItem" value="Send" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="ireceive">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th></th>
                        <th>Name</th>
                        <th>Tracking Code</th>
                        <th>Weight (kg)</th>
                        <th>Remarks</th>
                    </tr>

                    <?php
                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_array($result))
                            {
                    ?>

                    <tr class="bodyrow">
                        <td><input type="checkbox" name="pay" /></td>
                        <td></td>
                        <td></td>
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
                        <td colspan="5">No items inventory.</td>
                    </tr>

                    <?php
                        }
                    ?>
                    
                    <tr>
                        <td colspan="5">
                            <button type="button" class="btn btn-default btnAdd" data-toggle="modal" data-target="#addShipping">Ship</button>
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="modal fade" id="addShipping" tabindex="-1" role="dialog" aria-labelledby="addShippingTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addShippingTitle">Shipping Form</h5>
                        </div>

                        <form method="post" action="purchase.php">
                            <div class="modal-body left">
                                <p><input class="formfield" name="name" type="text" placeholder="Recipient Name" value="" required /></p>

                                <p><input class="formfield" name="contact" type="text" placeholder="Recipient Contact" value="" required /></p>

                                <p><input class="formfield" name="address" type="text" placeholder="Recipient Address" value="" required /></p>

                                <p><input class="formfield" name="remark" type="text" placeholder="Remarks" value="" /></p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btn-success btnSend" name="addItem" value="Pay now" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>