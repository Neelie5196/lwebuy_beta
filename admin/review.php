<?php
require_once '../connection/config.php';
session_start();

$query = "SELECT *
           FROM shipping s
           JOIN users us
           ON us.user_id = s.user_id";
$result = mysqli_query($con, $query);


?>
<div class="col-xs-12 col-md-12 col-lg-12">
    <h2 class="bigh2 pagetitle hidden-xs hidden-sm">Reviews</h2>
    
    <h2 class="smh2 pagetitle hidden-md hidden-lg">Reviews</h2>
    
    <!-- loop all reviews -->
    <div class="adreview left">
                <table class="purchasetable">
                    <tr class="center">
                        <th>Customer</th>
                        <th>Review</th>
                    </tr>
                    <?php 
                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_array($result))
                            {
                                ?>
                                <tr>
                                    <td><?php echo $row['fname']." ".$row['lname']; ?></td>
                                    <td><?php echo $row['review']; ?></td>
                                </tr>
                                <?php
                            }
                        }else{
                            ?>
                                <tr>
                                    <td colspan="4">No review submitted.</td>
                                </tr>
                            <?php
                        }
                    ?>
                </table>
        </div>
</div>