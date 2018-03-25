<div class="col-xs-12 col-md-12 col-lg-12">
    <h2 class="bigh2 pagetitle hidden-xs hidden-sm">Warehouse</h2>
    
    <h2 class="smh2 pagetitle hidden-md hidden-lg">Warehouse</h2>
    
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <table class="tblTab">
                <tr>
                    <td class="wborder"><button class="btn-link btntab" onclick="funcWPending()">Pending Items</button></td>
                    <td class="wborder"><button class="btn-link btntab" onclick="funcWSlot()">Slots Management</button></td>
                    <td><button class="btn-link btntab" onclick="funcWWarehouse()">Warehouses</button></td>
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

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td colspan="4">No pending items.</td>
                    </tr>
                </table>
            </div>
        </div>
        
        <div id="wslot">
            <div class="col-xs-7 col-md-7 col-lg-7">
                <table class="purchasetable">
                    <caption><h3>In Use</h3></caption>
                    <tr class="center">
                        <th>Slot No.</th>
                        <th>Customer</th>
                        <th>No. of Items</th>
                        <th></th>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td colspan="4">No slots in use.</td>
                    </tr>
                </table>
            </div>
            
            <div class="col-xs-5 col-md-5 col-lg-5">
                <table class="purchasetable">
                    <caption><h3>Empty Slots</h3></caption>
                    <tr class="center">
                        <th>Slot No.</th>
                        <th></th>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <a href="" class="btn btn-default btn-xs btnDelete" name="delete"><span class="glyphicon glyphicon-trash"></span></a>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">No empty slots.</td>
                    </tr>
                    
                    <tr>
                        <td colspan="2">
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
                                    <input class="formfield" name="slotno" type="number" placeholder="Enter slot number" required />
                                </p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btnSend btn-success" name="add" value="Save" />
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

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a data-toggle="modal" class="btn btn-default btn-xs btnDelete" href="#warehouseStaff"><span class="glyphicon glyphicon-eye-open"></span></a>
                            
                            <a data-toggle="modal" class="btn btn-default btn-xs btnDelete" href="#editWarehouse"><span class="glyphicon glyphicon-pencil"></span></a>
                            
                            <a href="" class="btn btn-default btn-xs btnDelete" name="delete"><span class="glyphicon glyphicon-trash"></span></a>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="5">No warehouse.</td>
                    </tr>
                    
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
                                <input type="submit" class="btn btnSend btn-success" name="add" value="Save" />
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
                                <input type="submit" class="btn btnSend btn-success" name="add" value="Save" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="warehouseStaff" tabindex="-1" role="dialog" aria-labelledby="warehouseStaffTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="warehouseStafTitlef">Warehouse Staff</h5>
                        </div>

                        <form method="post" action="request.php">
                            <div class="modal-body left">
                                <table class="purchasetable">
                                    <tr class="center">
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td colspan="3">No staff.</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</div>