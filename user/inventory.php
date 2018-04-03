<?php
require_once '../connection/config.php';
session_start();
$user_id = $_SESSION['user_id'];

$query = "SELECT *
          FROM request
          WHERE user_id='$user_id' AND status = 'request'";
$result = mysqli_query($con, $query);

$query5 = "SELECT *
          FROM warehouse";
$result5 = mysqli_query($con, $query5);

if(isset($_POST['request']))
{    

    $name = $_POST['name'];
    $trackcode = $_POST['trackcode'];
    $remark = $_POST['remark'];
    $status = 'Request';
	
	$result1 = mysqli_query($con, "INSERT INTO request SET user_id='$user_id', order_item='$name', order_code='$trackcode', remark='$remark', status='$status'") or die(mysqli_error($con));
    
    ?>
    <script>
    window.location.href='main.php#inventory';
    </script>
    <?php
}

if (isset($_GET['request_id']))
{
    $request_id = $_GET['request_id'];

    $result2 = mysqli_query($con, "DELETE FROM request WHERE request_id=$request_id") or die(mysqli_error($con));
    
    ?>
    <script>
    window.location.href='main.php#inventory';
    </script>
    <?php

}

if(isset($_POST['edit']))
{   
    $request_id = $_POST['request_id'];
    $name = $_POST['name'];
    $trackcode = $_POST['trackcode'];
    $remark = $_POST['remark'];
    
    $result3 = mysqli_query($con, "UPDATE request SET order_item='$name', order_code='$trackcode', remark='$remark' WHERE request_id='$request_id'") or die(mysqli_error($con));
    
    ?>
    <script>
    window.location.href='main.php#inventory';
    </script>
    <?php
}

$query4 = "SELECT *
          FROM item it
          JOIN slot sl
          ON it.slot_id = sl.slot_id
          WHERE user_id='$user_id'";
$result4 = mysqli_query($con, $query4);

?>
 <div class="col-xs-12 col-md-12 col-lg-12">
    <h2 class="bigh2 pagetitle hidden-xs hidden-sm">Inventory</h2>
    
    <h2 class="smh2 pagetitle hidden-md hidden-lg">Inventory</h2>
    
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <table class="tblVTab">
                <tr>
                    <td class="wborder"><button class="btn-link btntab" id="btnipending" onclick="funcIPending()">Pending</button></td>
                    <td class="wborder"><button class="btn-link btntab" id="btnireceive" onclick="funcIReceive()">Received</button></td>
                    <td><button class="btn-link btntab" id="btniwarehouse" onclick="funcIWarehouse()">Warehouse Details</button></td>
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
                        <th>Tracking No.</th>
                        <th>Remarks</th>
                        <th></th>
                    </tr>

                    <?php
                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_array($result))
                            {
                    ?>

                    <tr class="bodyrow">
                        <td><?php echo $row['order_item']; ?></td>
                        <td><?php echo $row['order_code']; ?></td>
                        <td><?php echo $row['remark']; ?></td>
                        <td>
                            <a href="inventory.php?request_id=<?php echo $row['request_id']; ?>" class="btn btn-default btn-xs btnDelete" name="delete"><span class="glyphicon glyphicon-trash"></span></a>
                            
                            <a data-toggle="modal" data-id="<?php echo $row['request_id']; ?>" data-name="<?php echo $row['order_item']; ?>" data-trackcode="<?php echo $row['order_code']; ?>" data-remark="<?php echo $row['remark']; ?>" class="btn btn-default btn-xs btnDelete editItem" href="#editItem"><span class="glyphicon glyphicon-pencil"></span></a>
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

                        <form method="post" action="inventory.php">
                            <div class="modal-body left">
                                <p><input class="formfield" name="name" type="text" placeholder="Name" required /></p>

                                <p><input class="formfield" name="trackcode" type="text" placeholder="Tracking Code" required /></p>

                                <p><input class="formfield" name="remark" type="text" placeholder="Remarks" /></p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btn-success btnSend" name="request" value="Request" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="editItem" tabindex="-1" role="dialog" aria-labelledby="editItemTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editItemTitle">Edit Item</h5>
                        </div>

                        <form method="post" action="inventory.php">
                            <div class="modal-body left">
                                <input type="hidden" name="request_id" id="request_id" value=""/>
                                
                                <p><input class="formfield" name="name" id="name" type="text" placeholder="Name" value="" required /></p>

                                <p><input class="formfield" name="trackcode" id="trackcode" type="text" placeholder="Tracking Code" value="" required /></p>

                                <p><input class="formfield" name="remark" type="text" id="remark" placeholder="Remarks" value="" /></p>
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
        
        <div id="ireceive">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th>Name</th>
                        <th>Tracking No.</th>
                        <th>Weight (kg)</th>
                        <th>Received On</th>
                    </tr>

                    <?php
                        if(mysqli_num_rows($result4) > 0)
                        {
                            while($row = mysqli_fetch_array($result4))
                            {
                    ?>

                    <tr class="bodyrow">
                        <td><?php echo $row['item_description']; ?></td>
                        <td><?php echo $row['order_code']; ?></td>
                        <td><?php echo $row['weight']; ?></td>
                        <td><?php echo $row['datetime']; ?></td>
                    </tr>

                    <?php
                        }
                    }
                    else
                    {
                    ?>

                    <tr>
                        <td colspan="5">No items in inventory.</td>
                    </tr>

                    <?php
                        }
                    ?>
                </table>
            </div>
        </div>
        
        <div id="iwarehouse">
            <table class="purchasetable">
                <tr>
                    <th>Station Name</th>
                    <th>Country</th>
                    <th>Address</th>
                </tr>
                
                <?php
                    if(mysqli_num_rows($result5) > 0)
                    {
                        while($row5 = mysqli_fetch_array($result5))
                        {
                            ?>
                    
                <tr class="bodyrow">
                    <td><?php echo $row5['station_name'] ?></td>
                    <td><?php echo $row5['country_name'] ?></td>
                    <td><?php echo $row5['address'] ?></td>
                </tr>
                
                <?php
                        }
                    }
                ?>
            </table>
        </div>
    </div>
</div>
<script>
$(document).on("click", ".editItem", function () {
    var orderItemRequestId = $(this).data('id');
    var orderItemName = $(this).data('name');
    var orderItemTrackCode = $(this).data('trackcode');
    var orderItemRemark = $(this).data('remark');
    $(".modal-body #request_id").val( orderItemRequestId );
    $(".modal-body #name").val( orderItemName );
    $(".modal-body #trackcode").val( orderItemTrackCode );
    $(".modal-body #remark").val( orderItemRemark );
    $('#editItem').modal('show');
});

setInterval(function(){ location.reload(true); }, 300000);
</script>