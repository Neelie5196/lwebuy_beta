<?php
require_once '../connection/config.php';
session_start();

$query = "SELECT *
           FROM order_item oi
           JOIN users us
           ON us.user_id = oi.user_id
           WHERE oi.status='proceed'";
$result = mysqli_query($con, $query);

$query1 = "SELECT *
           FROM slot
           WHERE status='Not In Use'";
$result1 = mysqli_query($con, $query1);

$query01 = "SELECT * FROM item it JOIN slot st ON it.slot_id = st.slot_id WHERE action = 'In' ORDER BY datetime DESC";
$result01 = mysqli_query($con, $query01);

if(isset($_POST['createslot']))
{    
	$user_id = $_SESSION['user_id'];
    $slotaisle = $_POST['slotaisle'];
    $slotno = $_POST['slotno'];
    $status = 'Not In Use';
	
	$result2 = mysqli_query($con, "INSERT INTO slot SET slot_aisle='$slotaisle', slot_num='$slotno', status='$status'") or die(mysqli_error($con));
    $resultcreate = mysqli_query($con, "INSERT INTO log SET action='created slot $slotno', created_at=now(), user_id='$user_id'") or die(mysqli_error($con));
    ?>
    <script>
    alert('Success to Create');
    window.location.href='main.php#adwarehouse';
    </script>
    <?php
}

if (isset($_GET['slot_id']))
{
	$user_id = $_SESSION['user_id'];
    $slot_id = $_GET['slot_id'];

    $result3 = mysqli_query($con, "DELETE FROM slot WHERE slot_id=$slot_id") or die(mysqli_error($con));
    $resultdelete = mysqli_query($con, "INSERT INTO log SET action='deleted slot', created_at=now(), user_id='$user_id'") or die(mysqli_error($con));
    ?>
    <script>
    window.location.href='main.php#adwarehouse';
    </script>
    <?php

}

$query4 = "SELECT *
           FROM slot s
           JOIN users us
           ON us.user_id=s.user_id
           WHERE s.status='In Use'";
$result4 = mysqli_query($con, $query4);

$query6 = "SELECT *
           FROM warehouse";
$result6 = mysqli_query($con, $query6);

if(isset($_POST['createwarehouse']))
{    
	$user_id = $_SESSION['user_id'];
    $station_code = $_POST['stationcode'];
    $station_name = $_POST['stationname'];
    $country = $_POST['stationcountry'];
    $address = $_POST['stationaddress'];
	
	$result7 = mysqli_query($con, "INSERT INTO warehouse SET station_code='$station_code', station_name='$station_name', country_name='$country', address='$address'") or die(mysqli_error($con));
    $resultcwarehouse = mysqli_query($con, "INSERT INTO log SET action='created warehouse $station_code', created_at=now(), user_id='$user_id'") or die(mysqli_error($con));
    ?>
    ?>
    <script>
    alert('Success to Create');
    window.location.href='main.php#adwarehouse';
    </script>
    <?php
}

if(isset($_POST['editWarehouse']))
{   
	$user_id = $_SESSION['user_id'];
    $ware_id = $_POST['warehouse_id'];
    $station_code = $_POST['stationcode'];
    $station_name = $_POST['stationname'];
    $country = $_POST['stationcountry'];
    $address = $_POST['stationaddress'];
    
    $result8 = mysqli_query($con, "UPDATE warehouse SET station_code='$station_code', station_name='$station_name', country_name='$country', address='$address' WHERE ware_id='$ware_id'") or die(mysqli_error($con));
    $resultdelete = mysqli_query($con, "INSERT INTO log SET action='edited warehouse $station_code', created_at=now(), user_id='$user_id'") or die(mysqli_error($con));
    ?>
    ?>
    <script>
    alert('Success to Save');
    window.location.href='main.php#adwarehouse';
    </script>
    <?php
}

if (isset($_GET['ware_id']))
{
	$user_id = $_SESSION['user_id'];
    $ware_id = $_GET['ware_id'];

    $result9 = mysqli_query($con, "DELETE FROM warehouse WHERE ware_id=$ware_id") or die(mysqli_error($con));
    $resultdeletew = mysqli_query($con, "INSERT INTO log SET action='deleted warehouse', created_at=now(), user_id='$user_id'") or die(mysqli_error($con));
    ?>
    <script>
    window.location.href='main.php#adwarehouse';
    </script>
    <?php

}

?>
<div class="col-xs-12 col-md-12 col-lg-12">
    <h2 class="bigh2 pagetitle hidden-xs hidden-sm">Warehouse</h2>
    
    <h2 class="smh2 pagetitle hidden-md hidden-lg">Warehouse</h2>
    
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <table class="tblWTab">
                <tr>
                    <td class="wborder"><button class="btn-link btntab" id="btnwpending" onclick="funcWPending()">Pending Items</button></td>
                    <td class="wborder"><button class="btn-link btntab" id="btnwstore" onclick="funcWStore()">Items In-store</button></td>
                    <td class="wborder"><button class="btn-link btntab" id="btnwslot" onclick="funcWSlot()">Slots Management</button></td>
                    <td><button class="btn-link btntab" id="btnwwarehouse" onclick="funcWWarehouse()">Warehouses</button></td>
                </tr>
            </table>
        </div>
    </div>
    
    <div class="row">
        <div id="wpending">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th>Customer</th>
                        <th>Item Name</th>
                        <th>Tracking No.</th>
                        <th>Remarks</th>
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
                                    <td><?php echo $row['order_code']; ?></td>
                                    <td><?php echo $row['remark']; ?></td>
                                </tr>
                                <?php
                            }
                        }else{
                            ?>
                                <tr>
                                    <td colspan="4">No pending items.</td>
                                </tr>
                            <?php
                        }
                    ?>
                </table>
            </div>
        </div>
        
        <div id="wstore">
            <div class="row">
                <div class="col-xs-5 col-md-5 col-lg-5 col-xs-push-2 col-md-push-2 col-lg-push-2 updatecontainer">
                    <p>
                        <input type="text" name="search" class="formfield" placeholder="Enter keyword to search" id="keyword" onkeyup="filtertable()" autofocus />
                    </p>
                </div>

                <div class="col-xs-3 col-md-3 col-lg-3 col-xs-push-2 col-md-push-2 col-lg-push-2 updatecontainer">
                    <p>
                        Search by: 
                        <select class="formselect" id="filterby">
                            <option>Order code</option>
                            <option>Item name</option>
                            <option>Received at</option>
                        </select>
                    </p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <table class="purchasetable">
                        <tr>
                            <th>Order Code</th>
                            <th>Item Name</th>
                            <th>Received at</th>
                            <th>Aisle No.</th>
                            <th>Slot No.</th>
                        </tr>
                        
                        <?php
                            if(mysqli_num_rows($result01) > 0)
                            {
                                while($row01 = mysqli_fetch_array($result01))
                                {
                        ?>
                        <tr class="logrow">
                            <td class="ordercode"><?php echo $row01['order_code']; ?></td>
                            <td class="itemname"><?php echo $row01['item_description']; ?></td>
                            <td class="datetime"><?php echo $row01['datetime']; ?></td>
                            <td class="aisle"><?php echo $row01['slot_aisle']; ?></td>
                            <td class="slotno"><?php echo $row01['slot_num']; ?></td>
                        </tr>
                        
                        <?php
                                    }
                                }
                                else
                                {
                                ?>

                                <tr>
                                    <td colspan="7">No items in inventory.</td>
                                </tr>
                            <?php
                                }
                            ?>
                    </table>
                </div>
            </div>
        </div>
        
        <div id="wslot">
            <div class="col-xs-7 col-md-7 col-lg-7">
                <table class="purchasetable">
                    <caption><h3>In Use</h3></caption>
                    <tr class="center">
                        <th>Aisle No.</th>
                        <th>Slot No.</th>
                        <th>Customer</th>
                        <th>No. of Items</th>
                        <th></th>
                    </tr>
                    <?php
                        if(mysqli_num_rows($result4) > 0)
                        {
                            while($row = mysqli_fetch_array($result4))
                            {
                                $slot_id = $row['slot_id'];
                                $query5 = "SELECT *
                                           FROM item
                                           WHERE slot_id ='$slot_id' AND action = 'In'";
                                $result5 = mysqli_query($con, $query5);
                                ?>
                                <tr>
                                    <td><?php echo $row['slot_aisle']; ?></td>
                                    <td><?php echo $row['slot_num']; ?></td>
                                    <td><?php echo $row['fname']. " " . $row['lname']; ?></td>
                                    <td><?php echo mysqli_num_rows($result5); ?></td>
                                </tr>
                                <?php
                            }
                        }else{
                            ?>
                                <tr>
                                    <td colspan="4">No slots in use.</td>
                                </tr>
                            <?php
                        }
                    ?>
                </table>
            </div>
            
            <div class="col-xs-5 col-md-5 col-lg-5">
                <table class="purchasetable">
                    <caption><h3>Empty Slots</h3></caption>
                    <tr class="center">
                        <th>Aisle No.</th>
                        <th>Slot No.</th>
                        <th></th>
                    </tr>
                    <?php
                        if(mysqli_num_rows($result1) > 0)
                        {
                            while($row = mysqli_fetch_array($result1))
                            {
                                ?>
                                <tr>
                                    <td><?php echo $row['slot_aisle']; ?></td>
                                    <td><?php echo $row['slot_num']; ?></td>
                                    <td>
                                        <a href="warehouse.php?slot_id=<?php echo $row['slot_id']; ?>" class="btn btn-default btn-xs btnDelete" name="delete" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }else{
                            ?>
                                <tr>
                                    <td colspan="3">No empty slots.</td>
                                </tr>
                            <?php
                        }
                    ?>                    
                    <tr>
                        <td colspan="3">
                            <button type="button" class="btn btn-default btnAdd" data-toggle="modal" data-target="#addSlot">Add</button>
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="modal fade" id="addSlot" tabindex="-1" role="dialog" aria-labelledby="addSlotTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addSlotTitle">Add Slot</h5>
                        </div>

                        <form method="post" action="warehouse.php">
                            <div class="modal-body left">
                                <p>
                                    <input class="formfield" name="slotaisle" type="number" placeholder="Enter aisle number" required />
                                    <input class="formfield" name="slotno" type="number" placeholder="Enter slot number" required />
                                </p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btnSend btn-success" name="createslot" value="create" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="wwarehouse">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th>Station Code</th>
                        <th>Station Name</th>
                        <th>Country</th>
                        <th>Warehouse Address</th>
                        <th></th>
                    </tr>
                    <?php
                        if(mysqli_num_rows($result6) > 0)
                        {
                            while($row = mysqli_fetch_array($result6))
                            {
                                ?>
                                <tr>
                                    <td><?php echo $row['station_code']; ?></td>
                                    <td><?php echo $row['station_name']; ?></td>
                                    <td><?php echo $row['country_name']; ?></td>
                                    <td><?php echo $row['address']; ?></td>
                                    <td>
                                        <a data-toggle="modal" data-id="<?php echo $row['ware_id']; ?>" data-code="<?php echo $row['station_code']; ?>" data-name="<?php echo $row['station_name']; ?>" data-country="<?php echo $row['country_name']; ?>" data-address="<?php echo $row['address']; ?>" class="btn btn-default btn-xs btnDelete editWarehouse" href="#editWarehouse"><span class="glyphicon glyphicon-pencil" title="Edit"></span></a>

                                        <a href="warehouse.php?ware_id=<?php echo $row['ware_id']; ?>" class="btn btn-default btn-xs btnDelete" name="delete" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }else{
                            ?>
                                <tr>
                                    <td colspan="5">No warehouse.</td>
                                </tr>
                            <?php
                        }
                    ?>               
                    <tr>
                        <td colspan="5">
                            <button type="button" class="btn btn-default btnAdd" data-toggle="modal" data-target="#addWarehouse">Add</button>
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="modal fade" id="addWarehouse" tabindex="-1" role="dialog" aria-labelledby="addWarehouseTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addWarehouseTitle">Add Warehouse</h5>
                        </div>

                        <form method="post" action="warehouse.php">
                            <div class="modal-body left">
                                <p>
                                    <input class="formfield" name="stationcode" type="text" placeholder="Station Code" required />
                                </p>
                                
                                <p>
                                    <input class="formfield" name="stationname" type="text" placeholder="Station Name" required />
                                </p>
                                
                                <p>
                                    <input class="formfield" name="stationcountry" type="text" placeholder="Country" required />
                                </p>
                                
                                <p>
                                    <input class="formfield" name="stationaddress" type="text" placeholder="Address" required />
                                </p>                                
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btnSend btn-success" name="createwarehouse" value="Create" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="editWarehouse" tabindex="-1" role="dialog" aria-labelledby="editWarehouseTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editWarehouseTitle">Edit Warehouse</h5>
                        </div>

                        <form method="post" action="warehouse.php">
                            <div class="modal-body left">
                                <input class="formfield" name="warehouse_id" id="warehouse_id" type="hidden" value="" />
                                <p>
                                    <input class="formfield" name="stationcode" id="code" type="text" placeholder="Station Code" required />
                                </p>
                                
                                <p>
                                    <input class="formfield" name="stationname" id="name" type="text" placeholder="Station Name" required />
                                </p>
                                
                                <p>
                                    <input class="formfield" name="stationcountry" id="country" type="text" placeholder="Country" required />
                                </p>
                                
                                <p>
                                    <input class="formfield" name="stationaddress" id="address" type="text" placeholder="Address" required />
                                </p>                                
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btnSend btn-success" name="editWarehouse" value="Save" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>          
        </div>
    </div>
</div>
<script>
$(document).on("click", ".editWarehouse", function () {
    var warehouseId = $(this).data('id');
    var warehouseCode = $(this).data('code');
    var warehouseName = $(this).data('name');
    var warehouseCountry = $(this).data('country');
    var warehouseAddress = $(this).data('address');
    $(".modal-body #warehouse_id").val( warehouseId );
    $(".modal-body #code").val( warehouseCode );
    $(".modal-body #name").val( warehouseName );
    $(".modal-body #country").val( warehouseCountry );
    $(".modal-body #address").val( warehouseAddress );
    $('#editWarehouse').modal('show');
});

    
function filtertable()
{
    var keyword = document.getElementById("keyword").value.toLowerCase();
    var filterby = document.getElementById("filterby").value;

    var rows = document.getElementsByClassName("logrow");
    var ordercodes = document.getElementsByClassName("ordercode");
    var itemnames = document.getElementsByClassName("itemname");
    var datetime = document.getElementsByClassName("datetime");

    for (var a = 0; a < rows.length; a++)
        {
            rows[a].style.display = "none";
        }

    if(filterby == "Order code")
        {
            for(var b = 0; b < rows.length; b++)
                {
                    var searchtarget = ordercodes[b].innerHTML.toLowerCase();

                    if(searchtarget.includes(keyword))
                        {
                            rows[b].style.display = "table-row";
                        }
                }
        }
    else if(filterby == "Item name")
        {
            for(var b = 0; b < rows.length; b++)
                {
                    var searchtarget = itemnames[b].innerHTML.toLowerCase();

                    if(searchtarget.includes(keyword))
                        {
                            rows[b].style.display = "table-row";
                        }
                }
        }
    else if(filterby == "Received at")
        {
            for(var b = 0; b < rows.length; b++)
                {
                    var searchtarget = datetime[b].innerHTML.toLowerCase();

                    if(searchtarget.includes(keyword))
                        {
                            rows[b].style.display = "table-row";
                        }
                }
        }
}
</script>