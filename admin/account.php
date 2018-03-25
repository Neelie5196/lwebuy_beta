<div class="col-xs-12 col-md-12 col-lg-12">
    <h2 class="bigh2 pagetitle hidden-xs hidden-sm">Accounts</h2>
    
    <h2 class="smh2 pagetitle hidden-md hidden-lg">Accounts</h2>
    
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <table class="tblATab">
                <tr>
                    <td class="wborder"><button class="btn-link btntab" onclick="funcAAdmin()">Admins</button></td>
                    <td class="wborder"><button class="btn-link btntab" onclick="funcAStaff()">Staffs</button></td>
                    <td><button class="btn-link btntab" onclick="funcACustomer()">Customers</button></td>
                </tr>
            </table>
        </div>
    
        <div id="aadmin">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th>Admin ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Work Station</th>
                        <th></th>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a data-toggle="modal" class="btn btn-default btn-xs btnDelete" href="#stationDetail"><span class="glyphicon glyphicon-eye-open"></span></a>
                        </td>
                        
                        <td>
                            <a data-toggle="modal" class="btn btn-default btn-xs btnDelete" href="#editAdmin"><span class="glyphicon glyphicon-pencil"></span></a>
                            
                            <a href="" class="btn btn-default btn-xs btnDelete" name="delete"><span class="glyphicon glyphicon-trash"></span></a>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="6">No admin accounts.</td>
                    </tr>

                    <tr>
                        <td colspan="6">
                            <button type="button" class="btn btn-default btnAdd" data-toggle="modal" data-target="#addAdmin">Add</button>
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="modal fade" id="addAdmin" tabindex="-1" role="dialog" aria-labelledby="addAdminTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addAdminTitle">Add Admin</h5>
                        </div>

                        <form method="post" action="account.php">
                            <div class="modal-body left">
                                <p>
                                    <input class="formfield" name="fname" type="text" placeholder="First Name" required />
                                </p>
                                
                                <p>
                                    <input class="formfield" name="lname" type="text" placeholder="Last Name" required />
                                </p>
                                
                                <p>
                                    <input class="formfield" name="email" type="email" placeholder="Email" required />
                                </p>
                                
                                <p>
                                    <input class="formfield" name="contact" type="text" placeholder="Contact No." required />
                                </p>
                                
                                <p>
                                    <select class="formselect">
                                        <option class="formoption" selected required>Station</option>
                                        <option class="formoption"></option>
                                    </select>
                                </p>                                
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btnSend btn-success" name="addadmin" value="Save" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="editAdmin" tabindex="-1" role="dialog" aria-labelledby="editAdminTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editAdminTitle">Edit Admin</h5>
                        </div>

                        <form method="post" action="account.php">
                            <div class="modal-body left">
                                <p>
                                    <input class="formfield" name="fname" type="text" placeholder="First Name" required />
                                </p>
                                
                                <p>
                                    <input class="formfield" name="lname" type="text" placeholder="Last Name" required />
                                </p>
                                
                                <p>
                                    <input class="formfield" name="email" type="email" placeholder="Email" required />
                                </p>
                                
                                <p>
                                    <input class="formfield" name="contact" type="text" placeholder="Contact No." required />
                                </p>
                                
                                <p>
                                    <select class="formselect">
                                        <option class="formoption" selected required>Station</option>
                                        <option class="formoption"></option>
                                    </select>
                                </p>                                
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btnSend btn-success" name="edituser" value="Save" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="stationDetail" tabindex="-1" role="dialog" aria-labelledby="stationDetailTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="stationDetailTitle">Station Details</h5>
                        </div>

                        <form method="post" action="account.php">
                            <div class="modal-body left">
                                <p class="requestp">Station Code: </p>                  
                                <p class="requestp">Station Name: </p>                  
                                <p class="requestp">Country: </p>                  
                                <p class="requestp">Address: </p>                  
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="astaff">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th>Staff ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Work Station</th>
                        <th></th>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a data-toggle="modal" class="btn btn-default btn-xs btnDelete" href="#stationDetails"><span class="glyphicon glyphicon-eye-open"></span></a>
                        </td>
                        
                        <td>
                            <a data-toggle="modal" class="btn btn-default btn-xs btnDelete" href="#editStaff"><span class="glyphicon glyphicon-pencil"></span></a>
                            
                            <a href="" class="btn btn-default btn-xs btnDelete" name="delete"><span class="glyphicon glyphicon-trash"></span></a>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="6">No staff accounts.</td>
                    </tr>

                    <tr>
                        <td colspan="6">
                            <button type="button" class="btn btn-default btnAdd" data-toggle="modal" data-target="#addStaff">Add</button>
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="modal fade" id="addStaff" tabindex="-1" role="dialog" aria-labelledby="addStaffTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addstaffTitle">Add staff</h5>
                        </div>

                        <form method="post" action="account.php">
                            <div class="modal-body left">
                                <p>
                                    <input class="formfield" name="fname" type="text" placeholder="First Name" required />
                                </p>
                                
                                <p>
                                    <input class="formfield" name="lname" type="text" placeholder="Last Name" required />
                                </p>
                                
                                <p>
                                    <input class="formfield" name="email" type="email" placeholder="Email" required />
                                </p>
                                
                                <p>
                                    <input class="formfield" name="contact" type="text" placeholder="Contact No." required />
                                </p>
                                
                                <p>
                                    <select class="formselect">
                                        <option class="formoption" selected required>Station</option>
                                        <option class="formoption"></option>
                                    </select>
                                </p>                                
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btnSend btn-success" name="addstaff" value="Save" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="editStaff" tabindex="-1" role="dialog" aria-labelledby="editStaffTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editStaffTitle">Edit Staff</h5>
                        </div>

                        <form method="post" action="account.php">
                            <div class="modal-body left">
                                <p>
                                    <input class="formfield" name="fname" type="text" placeholder="First Name" required />
                                </p>
                                
                                <p>
                                    <input class="formfield" name="lname" type="text" placeholder="Last Name" required />
                                </p>
                                
                                <p>
                                    <input class="formfield" name="email" type="email" placeholder="Email" required />
                                </p>
                                
                                <p>
                                    <input class="formfield" name="contact" type="text" placeholder="Contact No." required />
                                </p>
                                
                                <p>
                                    <select class="formselect">
                                        <option class="formoption" selected required>Station</option>
                                        <option class="formoption"></option>
                                    </select>
                                </p>                                
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btnSend btn-success" name="edituser" value="Save" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="stationDetails" tabindex="-1" role="dialog" aria-labelledby="stationDetailsTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="stationDetailsTitle">Station Details</h5>
                        </div>

                        <form method="post" action="account.php">
                            <div class="modal-body left">
                                <p class="requestp">Station Code: </p>                  
                                <p class="requestp">Station Name: </p>                  
                                <p class="requestp">Country: </p>                  
                                <p class="requestp">Address: </p>                  
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="acustomer">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th>Customer ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Address</th>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a data-toggle="modal" class="btn btn-default btn-xs btnDelete" href="#customerAddress"><span class="glyphicon glyphicon-eye-open"></span></a>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="5">No customer accounts.</td>
                    </tr>
                </table>
            </div>
            
            <div class="modal fade" id="customerAddress" tabindex="-1" role="dialog" aria-labelledby="customerAddressTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="customerAddressTitle">Warehouse Staff</h5>
                        </div>

                        <form method="post" action="account.php">
                            <div class="modal-body left">
                                <table class="purchasetable">
                                    <tr class="center">
                                        <th>Address</th>
                                        <th>Postcode</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Country</th>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td colspan="5">Customer has not add an address.</td>
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