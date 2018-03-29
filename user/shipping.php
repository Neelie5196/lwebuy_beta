<?php
require_once '../connection/config.php';
session_start();
$user_id = $_SESSION['user_id'];

$query = "SELECT *
           FROM slot s
           JOIN item i
           ON i.slot_id = s.slot_id
           WHERE user_id='$user_id' AND action = 'In' AND payment_id is NULL";
$result = mysqli_query($con, $query);

$query1 = "SELECT *
          FROM rate
          WHERE rate_name = '1kg'";
$result1 = mysqli_query($con, $query1);
$results1 = mysqli_fetch_assoc($result1);

$query2 = "SELECT *
           FROM shipping
           WHERE user_id='$user_id' AND status = 'request'";
$result2 = mysqli_query($con, $query2);

$query5 = "SELECT *
           FROM shipping
           WHERE user_id='$user_id' AND status = 'proceed'";
$result5 = mysqli_query($con, $query5);

$query6 = "SELECT *
           FROM shipping
           WHERE user_id='$user_id' AND status = 'received'";
$result6 = mysqli_query($con, $query6);

$query7 = "SELECT *
           FROM shipping
           WHERE user_id='$user_id' AND status = 'topup'";
$result7 = mysqli_query($con, $query7);

if(isset($_POST['review']))
{    

    $shipping_id = $_POST['shipping_id'];
    $review = $_POST['reviews'];
	
	$result7 = mysqli_query($con, "UPDATE shipping SET review='$review', status='reviewed' WHERE shipping_id = '$shipping_id'") or die(mysqli_error($con));
    
    ?>
    <script>
    window.location.href='main.php#ship';
    </script>
    <?php
}
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
                    <td class="wborder"><button class="btn-link btntab" onclick="funcSProceed()">Proceeded</button></td>
                    <td><button class="btn-link btntab" onclick="funcSReceive()">Received</button></td>
                    <!--<td class="wborder"><button class="btn-link btntab" onclick="funcSPayment()">Others</button></td>-->
                </tr>
            </table>
        </div>
    </div>
    
    <div class="row">
        <div id="sitem">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <form action="shippingdetail.php" method="post">
                    <p>Below 1kg = RM <?php echo $results1['rate']; ?>, above 1kg each 0.5kg = RM <?php echo number_format((float)$results1['rate']/2, 2, '.', ''); ?></p>
                    <table class="purchasetable">
                        <tr class="center">
                            <th></th>
                            <th>Name</th>
                            <th>Order Code</th>
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
                            <td><input type="checkbox" weight="<?php echo $row['weight']; ?>" value="<?php echo $row['item_id']; ?>" name="item[]"></td>
                            <td><?php echo $row['item_description']; ?></td>
                            <td><?php echo $row['order_code']; ?></td>
                            <td><?php echo $row['datetime']; ?></td>
                            <td><?php echo $row['weight']; ?></td>
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

                        <tr>
                            <td colspan="5">
                                <input type="hidden" id="totalweight" name="totalweight" class="form-control" value="">
                                <input type="submit" class="btn btn-default btnAdd" name="addShipping" value="Ship" onclick="return val();">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        
        <div id="srequest">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th class="purchasecol1">Shipping Code</th>
                        <th class="purchasecol2">Ricipient Name</th>
                        <th class="purchasecol1">Recipient Contact</th>
                        <th class="purchasecol3">Recipient Address</th>
                        <th class="purchasecol1">No. of Items</th>
                        <th class="purchasecol2">Total Weight (kg)</th>
                        <th class="purchasecol2">Total Price</th>
                    </tr>

                    <?php
                        if(mysqli_num_rows($result2) > 0)
                        {
                            while($row = mysqli_fetch_array($result2))
                            {
                                $address = $row['address_id'];
                                $query3 = "SELECT *
                                          FROM address
                                          WHERE address_id='$address'";
                                $result3 = mysqli_query($con, $query3);
                                $results3 = mysqli_fetch_assoc($result3);
                                
                                $payment_id = $row['payment_id'];
                                $query4 = "SELECT *
                                           FROM item
                                           WHERE payment_id='$payment_id'";
                                $result4 = mysqli_query($con, $query4);
                    ?>

                    <tr class="bodyrow">
                        <td><?php echo $row['shipping_id']; ?></td>
                        <td><?php echo $row['receipient_name']; ?></td>
                        <td><?php echo $row['receipient_contact']; ?></td>
                        <td><?php echo $results3['address'].', '.$results3['postcode'].', '.$results3['city'].', '.$results3['state']; ?></td>
                        <td><?php echo mysqli_num_rows($result4); ?></td>
                        <td><?php echo $row['weight']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                    </tr>

                    <?php
                        }
                    }
                    else
                    {
                    ?>

                    <tr>
                        <td colspan="7">No requests submitted.</td>
                    </tr>

                    <?php
                        }
                    ?>
                </table>
            </div>
        </div>
        
        <!--<div id="spayment">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th class="purchasecol1">Shipping Code</th>
                        <th class="purchasecol2">Ricipient Name</th>
                        <th class="purchasecol1">Recipient Contact</th>
                        <th class="purchasecol2">Total Weight (kg)</th>
                        <th class="purchasecol1">Total Price</th>
                        <th class="purchasecol2">Topup Balance (RM)</th>
                        <th class="purchasecol05"></th>
                    </tr>
                    <?php
                        if(mysqli_num_rows($result7) > 0)
                        {
                            while($row = mysqli_fetch_array($result7))
                            {
                    ?>
                    <tr class="bodyrow">
                        <td><?php echo $row['shipping_id']; ?></td>
                        <td><?php echo $row['receipient_name']; ?></td>
                        <td><?php echo $row['receipient_contact']; ?></td>
                        <td><?php echo $row['weight']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['topup']; ?></td>
                        <td>
                            <a class="btn btn-default btn-xs" href="#">Pay</a>
                        </td>
                    </tr>
                    <?php
                        }
                    }
                    else
                    {
                    ?>
                    <tr>
                        <td colspan="8">No topup request.</td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
            </div>
        </div>-->
        
        <div id="sproceed">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="purchasetable">
                    <tr class="center">
                        <th class="purchasecol1">Shipping Code</th>
                        <th class="purchasecol2">Ricipient Name</th>
                        <th class="purchasecol2">Recipient Contact</th>
                        <th class="purchasecol3">Recipient Address</th>
                        <th class="purchasecol1">No. of Items</th>
                        <th class="purchasecol1">Total Weight (kg)</th>
                        <th class="purchasecol1">Total Price</th>
                        <th class="purchasecol1">Tracking No.</th>
                    </tr>

                    <?php
                        if(mysqli_num_rows($result5) > 0)
                        {
                            while($row = mysqli_fetch_array($result5))
                            {
                                $address = $row['address_id'];
                                $query3 = "SELECT *
                                          FROM address
                                          WHERE address_id='$address'";
                                $result3 = mysqli_query($con, $query3);
                                $results3 = mysqli_fetch_assoc($result3);
                                
                                $payment_id = $row['payment_id'];
                                $query4 = "SELECT *
                                           FROM item
                                           WHERE payment_id='$payment_id'";
                                $result4 = mysqli_query($con, $query4);
                    ?>

                    <tr class="bodyrow">
                        <td><?php echo $row['shipping_id']; ?></td>
                        <td><?php echo $row['receipient_name']; ?></td>
                        <td><?php echo $row['receipient_contact']; ?></td>
                        <td><?php echo $results3['address'].', '.$results3['postcode'].', '.$results3['city'].', '.$results3['state']; ?></td>
                        <td><?php echo mysqli_num_rows($result4); ?></td>
                        <td><?php echo $row['weight']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td>
                            <a class="btn btn-default btn-xs" href="javascript: void(0)" onclick="window.open('viewtracking.php?tracking_code=<?php echo $row['tracking_code']; ?>','windowname1','fullscreen=yes'); return false;"><?php echo $row['tracking_code']; ?></a>
                        </td>
                    </tr>

                    <?php
                        }
                    }
                    else
                    {
                    ?>

                    <tr>
                        <td colspan="8">No shipping paid or proceeded.</td>
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
                        <th class="purchasecol1">Shipping Code</th>
                        <th class="purchasecol2">Ricipient Name</th>
                        <th class="purchasecol2">Recipient Contact</th>
                        <th class="purchasecol3">Recipient Address</th>
                        <th class="purchasecol1">No. of Items</th>
                        <th class="purchasecol1">Total Weight (kg)</th>
                        <th class="purchasecol1">Total Price</th>
                        <th class="purchasecol1">Tracking No.</th>
                        <th></th>
                    </tr>

                    <?php
                        if(mysqli_num_rows($result6) > 0)
                        {
                            while($row = mysqli_fetch_array($result6))
                            {
                                $address = $row['address_id'];
                                $query3 = "SELECT *
                                          FROM address
                                          WHERE address_id='$address'";
                                $result3 = mysqli_query($con, $query3);
                                $results3 = mysqli_fetch_assoc($result3);
                                
                                $payment_id = $row['payment_id'];
                                $query4 = "SELECT *
                                           FROM item
                                           WHERE payment_id='$payment_id'";
                                $result4 = mysqli_query($con, $query4);
                    ?>

                    <tr class="bodyrow">
                        <td><?php echo $row['shipping_id']; ?></td>
                        <td><?php echo $row['receipient_name']; ?></td>
                        <td><?php echo $row['receipient_contact']; ?></td>
                        <td><?php echo $results3['address'].', '.$results3['postcode'].', '.$results3['city'].', '.$results3['state']; ?></td>
                        <td><?php echo mysqli_num_rows($result4); ?></td>
                        <td><?php echo $row['weight']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['tracking_code']; ?></td>
                        <?php
                          if($row['review']==NULL){
                            ?>
                                <td>
                                    <a data-toggle="modal" data-id="<?php echo $row['shipping_id']; ?>" class="btn btn-default btn-xs btnDelete sreview" href="#sreview"><span class="glyphicon glyphicon-edit"></span></a>
                                </td>
                            <?php
                          }else{
                              
                          }   
                        ?>
                        
                    </tr>

                    <?php
                        }
                    }
                    else
                    {
                    ?>

                    <tr>
                        <td colspan="9">No purchases received.</td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
            </div>
            
            <div class="modal fade" id="sreview" tabindex="-1" role="dialog" aria-labelledby="sreviewTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="sreviewTitle">Review</h5>
                         </div>
                          
                          <form method="post" action="shipping.php">
                              <div class="modal-body left">
                                  <p><input class="formfield" name="shipping_id" id="shipping_id" type="hidden" value="" /></p>
                                  <p><input class="formfield" name="reviews" type="textarea" rows="3" placeholder="Enter your comments here..." /></p>
                              </div>
                              
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                                  <input type="submit" class="btn btn-success btnSend" name="review" value="Send review" />
                              </div>
                          </form>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    /*Weight*/
    $(document).ready(function() {
        function recalculate() {
            var sum = 0;

            $("input[type=checkbox]:checked").each(function() {
                sum += parseFloat($(this).attr("weight"));
            });
            document.getElementById('totalweight').value = sum;
        }

        $("input[type=checkbox]").change(function() {
            recalculate();
        });
    });
    
    /*Validate*/
    function val(){
        var items = document.getElementsByName('item[]');
        var hasChecked = false;

        for (var i = 0; i < items.length; i++)
        {
            if (items[i].checked)
            {
                hasChecked = true;
                break;
            }
        }
        if (hasChecked == false)
        {
            alert("Please select at least one item");
            return false;
        }
        return true;
    }

$(document).on("click", ".sreview", function () {
    var shippingId = $(this).data('id');
    $(".modal-body #shipping_id").val( shippingId );
    $('#sreview').modal('show');
});
    
setInterval(function(){ location.reload(true); }, 300000);
</script>