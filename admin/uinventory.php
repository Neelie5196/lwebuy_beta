<div class="col-xs-12 col-md-12 col-lg-12">
    <h2 class="bigh2 pagetitle hidden-xs hidden-sm">Inventory Items Arrival</h2>
    
    <h2 class="smh2 pagetitle hidden-md hidden-lg">Inventory Item Arrival</h2>
    
    <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-6 col-md-push-3 col-lg-push-3 updatecontainer">
            <form action="delivered.php" method="post">
                <p><input type="text" name="search" class="formfield" placeholder="Enter tracking code here" required /></p>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12 updatecontainer">
            <form action="delivered.php" method="post">
                <table class="purchasetable">
                    <tr>
                        <th>Tracking Code</th>
                        <th>Customer Name</th>
                        <th>Slot Number</th>
                        <th>Weight (kg)</th>
                    </tr>
                    
                    <tr class="bodyrow">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><input type="text" name="weight" class="tblformfield" required /></td>
                    </tr>
                    
                    <tr>
                        <td colspan="4">
                            <input type="submit" class="btn btnAdd" name="update" value="Update" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>