<?php
require_once '../connection/config.php';
session_start();

$query = "SELECT *
           FROM log lo
		   JOIN users us
		   ON us.user_id = lo.user_id";
$result = mysqli_query($con, $query);


?>
<div class="col-xs-12 col-md-12 col-lg-12">
    <h2 class="bigh2 pagetitle hidden-xs hidden-sm">Log</h2>
    
    <h2 class="smh2 pagetitle hidden-md hidden-lg">Log</h2>
    
    
    <div class="row">
        <div id="rpurchase">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th class="purchasecol2">Record</th>
                    </tr>
                    <?php
                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_array($result))
                            {
                                ?>
                                <tr>
									<td><?php echo $row['fname']. " " . $row['lname']; ?></td>
                                    <td><?php echo $row['action']; ?></td>
									<td> at </td>
                                    <td><?php echo $row['created_at']; ?></td>
                                    
                                </tr>
                                <?php
                            }
                        }else{
                            ?>
                                <tr>
                                    <td colspan="7">No history.</td>
                                </tr>
                            <?php
                        }
                    ?>         
                </table>
            </div>

        </div>
        
    </div>
</div>
