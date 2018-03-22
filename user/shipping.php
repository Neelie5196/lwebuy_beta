<?php

?>
 <div class="col-xs-12 col-md-12 col-lg-12">
    <h2 class="bigh2 pagetitle hidden-xs hidden-sm">Shipping</h2>
    
    <h2 class="smh2 pagetitle hidden-md hidden-lg">shipping</h2>
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <table class="tblSTab">
                <tr>
                    <td class="wborder"><button class="btn-link btntab" onclick="funcSItem()">Items In-Store</button></td>
                    <td class="wborder"><button class="btn-link btntab" onclick="funcSRequest()">Requests</button></td>
                    <td class="wborder"><button class="btn-link btntab" onclick="funcSPayment()">Pending Payments</button></td>
                    <td class="wborder"><button class="btn-link btntab" onclick="funcSProceed()">Proceeded</button></td>
                    <td class="wborder"><button class="btn-link btntab" onclick="funcSReceive()">Received</button></td>
                    <td><button class="btn-link btntab" onclick="funcSDecline()">Declined</button></td>
                </tr>
            </table>
        </div>
    </div>
    
    <div class="row">
        <div id="sitem">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th></th>
                        <th>Name</th>
                        <th>Received On</th>
                        <th>Weight (kg)</th>
                    </tr>

                    <?php
                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_array($result))
                            {
                    ?>

                    <tr class="bodyrow">
                        <td><input type="checkbox" value=""></td>
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
                        <td colspan="4">No items in inventory.</td>
                    </tr>

                    <?php
                        }
                    ?>
                    
                    <tr>
                        <td colspan="4">
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
                                 <p><input class="formfield" name="name" type="text" placeholder="Recipient Name" required /></p>
 
                                 <p><input class="formfield" name="contact" type="text" placeholder="Recipient Contact" required /></p>
 
                                 <p><input class="formfield" name="address" type="text" placeholder="Recipient Address" required /></p>
 
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
        
        <div id="srequest">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th class="purchasecol2">Ricipient Name</th>
                        <th class="purchasecol1">Recipient Contact</th>
                        <th class="purchasecol3">Recipient Address</th>
                        <th class="purchasecol1">No. of Items</th>
                        <th class="purchasecol2">Total Weight (kg)</th>
                        <th class="purchasecol2"></th>
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
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="purchase.php?order_item_id=<?php echo $row['order_item_id']; ?>" class="btn btn-default btn-xs btnDelete" name="delete"><span class="glyphicon glyphicon-trash"></span></a>
                            
                            <a data-toggle="modal1" data-id="<?php echo $row['order_item_id']; ?>" data-name="<?php echo $row['order_item']; ?>" data-link="<?php echo $row['link']; ?>" data-category="<?php echo $row['category']; ?>" data-quantity="<?php echo $row['quantity']; ?>" data-remark="<?php echo $row['remark']; ?>" class="btn btn-default btn-xs btnDelete" href="#editRShipping"><span class="glyphicon glyphicon-pencil"></span></a>
                        </td>
                    </tr>

                    <?php
                        }
                    }
                    else
                    {
                    ?>

                    <tr>
                        <td colspan="6">No requests submitted.</td>
                    </tr>

                    <?php
                        }
                    ?>
                </table>
            </div>
            
            <div class="modal fade" id="editRShipping" tabindex="-1" role="dialog" aria-labelledby="editRShippingTitle" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="editRShippingTitle">Shipping Form</h5>
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
        
        <div id="spayment">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th class="purchasecol05"></th>
                        <th class="purchasecol2">Ricipient Name</th>
                        <th class="purchasecol1">Recipient Contact</th>
                        <th class="purchasecol25">Recipient Address</th>
                        <th class="purchasecol1">No. of Items</th>
                        <th class="purchasecol1">Total Weight (kg)</th>
                        <th class="purchasecol1">Price</th>
                        <th class="purchasecol05"></th>
                    </tr>

                    <?php
                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_array($result))
                            {
                    ?>

                    <tr class="bodyrow">
                        <td><input type="checkbox" value=""></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="purchase.php?order_item_id=<?php echo $row['order_item_id']; ?>" class="btn btn-default btn-xs btnDelete" name="delete"><span class="glyphicon glyphicon-trash"></span></a>
                            
                            <a data-toggle="modal2" data-id="<?php echo $row['order_item_id']; ?>" data-name="<?php echo $row['order_item']; ?>" data-link="<?php echo $row['link']; ?>" data-category="<?php echo $row['category']; ?>" data-quantity="<?php echo $row['quantity']; ?>" data-remark="<?php echo $row['remark']; ?>" class="btn btn-default btn-xs btnDelete" href="#editPShipping"><span class="glyphicon glyphicon-pencil"></span></a>
                        </td>
                    </tr>

                    <?php
                        }
                    }
                    else
                    {
                    ?>

                    <tr>
                        <td colspan="8">No pending payment.</td>
                    </tr>

                    <?php
                        }
                    ?>
                    
                    <tr>
                        <td colspan="8">
                            <input type="submit" class="btn btn-default btnAdd" name="pay" value="Pay" onclick="return val();">
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="modal fade" id="editPShipping" tabindex="-1" role="dialog" aria-labelledby="editPShippingTitle" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="editPShippingTitle">Shipping Form</h5>
                         </div>
 
                         <form method="post" action="purchase.php">
                             <div class="modal-body left">
                                 <p><input class="formfield" name="name" type="text" placeholder="Recipient Name" value="" required /></p>
 
                                 <p><input class="formfield" name="contact" type="text" placeholder="Recipient Contact" value="" required /></p>
 
                                 <p><input class="formfield" name="address" type="text" placeholder="Recipient Address" value="" disabled /></p>
 
                                 <p><input class="formfield" name="remark" type="text" placeholder="Remarks" value="" disabled /></p>
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
        
        <div id="sproceed">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th class="purchasecol2">Ricipient Name</th>
                        <th class="purchasecol2">Recipient Contact</th>
                        <th class="purchasecol3">Recipient Address</th>
                        <th class="purchasecol1">No. of Items</th>
                        <th class="purchasecol1">Total Weight (kg)</th>
                        <th class="purchasecol1">Tracking No.</th>
                        <th class="purchasecol1">Price</th>
                    </tr>

                    <?php
                        if(mysqli_num_rows($result8) > 0)
                        {
                            while($row = mysqli_fetch_array($result8))
                            {
                                $total_price = $row['quantity']*$row['price'];
                    ?>

                    <tr class="bodyrow">
                        <td></td>
                        <td></td>
                        <td></td>
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
                        <td colspan="7">No shipping paid or proceeded.</td>
                    </tr>

                    <?php
                        }
                    ?>
                </table>
            </div>
        </div>
        
        <div id="sreceive">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th class="purchasecol2">Ricipient Name</th>
                        <th class="purchasecol2">Recipient Contact</th>
                        <th class="purchasecol3">Recipient Address</th>
                        <th class="purchasecol1">No. of Items</th>
                        <th class="purchasecol1">Total Weight (kg)</th>
                        <th class="purchasecol1">Tracking No.</th>
                        <th class="purchasecol1">Price</th>
                        <th></th>
                    </tr>

                    <?php
                        if(mysqli_num_rows($result9) > 0)
                        {
                            while($row = mysqli_fetch_array($result9))
                            {
                                $total_price = $row['quantity']*$row['price'];
                    ?>

                    <tr class="bodyrow">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><button type="button" class="btn btn-default btn-xs btnDelete" data-toggle="modal3" data-target="#sfeedback"><span class="glyphicon glyphicon-edit"></span></button></td>
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
            
            <div class="modal fade" id="sfeedback" tabindex="-1" role="dialog" aria-labelledby="sfeedbackTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="sfeedbackTitle">Feedback Form</h5>
                         </div>
                          
                          <form method="post" action="purchase.php">
                              <div class="modal-body left">
                                  <p><input class="formfield" name="feedback" type="textarea" rows="3" placeholder="Enter your comments here..." disabled /></p>
                              </div>
                              
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                                  <input type="submit" class="btn btn-success btnSend" name="feedback" value="Send feedback" />
                              </div>
                          </form>
                      </div>
                </div>
            </div>
        </div>
        
        <div id="sdecline">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th class="purchasecol1">Order No.</th>
                        <th class="purchasecol2">Ricipient Name</th>
                        <th class="purchasecol1">Recipient Contact</th>
                        <th class="purchasecol25">Recipient Address</th>
                        <th class="purchasecol1">No. of Items</th>
                        <th class="purchasecol1">Total Weight (kg)</th>
                        <th class="purchasecol25">Comments</th>
                    </tr>

                    <?php
                        if(mysqli_num_rows($result10) > 0)
                        {
                            while($row = mysqli_fetch_array($result10))
                            {
                    ?>

                    <tr class="bodyrow">
                        <td></td>
                        <td></td>
                        <td></td>
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
                        <td colspan="7">No declined purchases.</td>
                    </tr>

                    <?php
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>