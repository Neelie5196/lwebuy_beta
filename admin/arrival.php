<div class="col-xs-12 col-md-12 col-lg-12">
    <h2 class="bigh2 pagetitle hidden-xs hidden-sm">Delivered Shipments Update</h2>
    
    <h2 class="smh2 pagetitle hidden-md hidden-lg">Delivered Shipments Update</h2>
    
    <div class="row">
        <div class="col-xs-6 col-md-6 col-lg-6 col-xs-push-6 col-md-push-3 col-lg-push-3 updatecontainer">
            <form action="arrival.php" method="post">
                <p><input type="text" name="search" class="formfield" placeholder="Enter tracking code here" required /></p>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12 updatecontainer">
            <form action="arrival.php" method="post">
                <table class="purchasetable">
                    <tr>
                        <th>Tracking Code</th>
                        <th>Recipient Name</th>
                        <th>Recipient Contact</th>
                        <th>Recipient Address</th>
                        <th>Total Weight (kg)</th>
                        <th>Arrival Point</th>
                    </tr>
                    
                    <tr class="bodyrow">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><input type="text" name="arrive" class="tblformfield" required /></td>
                    </tr>
                    
                    <tr>
                        <td colspan="6">
                            <input type="submit" class="btn btnAdd" name="update" value="Update" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>