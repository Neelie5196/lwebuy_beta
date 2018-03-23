<?php

require_once '../connection/config.php';
session_start();
$user_id = $_SESSION['user_id'];
$item = $_POST['item'];
$totalweight = $_POST['totalweight'];

$query = "SELECT * FROM address WHERE user_id = '$user_id'";
$result = mysqli_query($con, $query);

$query1 = "SELECT * FROM state";
$result1 = mysqli_query($con, $query1);

if(isset($_POST['addAddress']))
{    
    $address = $_POST['address'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $postcode = $_POST['postcode'];
    
    $result2 = mysqli_query($con, "INSERT INTO address SET user_id = '$user_id', address='$address', state='$state', city='$city', country='$country', postcode='$postcode'") or die(mysqli_error($con));
    
    ?>
    <script>
    window.location.href='main.php#ship';
    </script>
    <?php
}

$query3 = "SELECT *
           FROM item
           WHERE item_id IN (".implode(',',$item).")";
$result3 = mysqli_query($con, $query3);

$query4 = "SELECT *
          FROM rate
          WHERE rate_name = '1kg'";
$result4 = mysqli_query($con, $query4);
$results4 = mysqli_fetch_assoc($result4);



?>

<!DOCTYPE html>
<html data-ng-app="myApp">
    <head>
        <title>LWE Buy</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initialscale=1.0"/>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<!-- AngularJS -->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
		
        <!--stylesheet-->
        <link href="../frameworks/css/style.css" rel="stylesheet"/>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body background="../resources/img/bg.jpg" ng-app="">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-6">
                    <h2>Shipping Details</h2>
                </div>
            </div>
            <section class="content">
                <form action="payments.php" method="post" class="botmar">
                    <div class="row botmar">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <strong>Address</strong>
                        </div>
                    </div>
                    <div class="row botmar">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <?php
                                if(mysqli_num_rows($result) > 0)
                                {
                                    while($row = mysqli_fetch_array($result))
                                    {
                                        ?>
                                            <div class="col-xs-2 col-md-2 col-lg-2 adcontainer">
                                                <div>
                                                    <p>
                                                        <?php echo $row["address"]; ?>,<br/>
                                                        <?php echo $row["postcode"]; ?>, <?php echo $row["city"]; ?>,<br/>
                                                        <?php echo $row["state"]; ?>, <?php echo $row["country"]; ?><br/>
                                                    </p>
                                                    <p><input type="checkbox" value="<?php echo $row["address_id"]; ?>" name="address[]" class="address"></p>
                                                </div>
                                            </div>
                                        <?php
                                    }
                                }
                            ?>
                            <div class="col-xs-2 col-md-2 col-lg-2 adcontainer">
                                <br/>
                                <br/>
                                <button class="btn btn-default" type="button" data-toggle="modal" data-target="#addAddress">+</button>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="row botmar">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <strong>Recipient Information</strong>
                        </div>
                    </div>
                    <div class="row botmar">
                        <div class="col-xs-12 col-md-6 col-lg-4">
                            <div class="row">
                                <div class="col-xs-12 col-md-12 col-lg-12">
                                    <p><input class="formfield" name="name" type="text" placeholder="Recipient Name" required /></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-4">
                            <div class="row">
                                <div class="col-xs-12 col-md-12 col-lg-12">
                                    <p><input class="formfield" name="contact" type="text" placeholder="Recipient Contact" required /></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-4">
                            <div class="row">
                                <div class="col-xs-12 col-md-12 col-lg-12">
                                    <p><input class="formfield" name="remark" type="text" placeholder="Remarks" value="" /></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="row botmar">
                        <div class="col-xs-12 col-md-8 col-lg-8">
                            <strong>Shipping Item</strong>
                        </div>
                        <div class="col-xs-12 col-md-4 col-lg-4">
                            <strong>Shipping Price</strong>
                        </div>
                    </div>
                    <div class="row">
                        <center>
                            <?php
                                if(mysqli_num_rows($result3) > 0)
                                    {
                            ?>
                            <div class="col-xs-8 col-md-8 col-lg-8 jumbotron">
                                <table class="purchasetable">
                                    <tr class="center">
                                        <th>Name</th>
                                        <th>Order Code</th>
                                        <th>Received On</th>
                                        <th>Weight (kg)</th>
                                    </tr>

                                    <?php
                                        while($row = mysqli_fetch_array($result3))
                                        {
                                    ?>

                                    <tr class="bodyrow">
                                        <input type="hidden" value="<?php echo $row['item_id']; ?>" name="item[]">
                                        <td><?php echo $row['item_description']; ?></td>
                                        <td><?php echo $row['order_code']; ?></td>
                                        <td><?php echo $row['datetime']; ?></td>
                                        <td><?php echo $row['weight']; ?></td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                    <tr>
                                        <td>
                                            <input type="hidden" id="totalweight" name="totalweight" class="form-control" value="<?php echo $totalweight; ?>">
                                            <td colspan="8" style="text-align:right;"><strong>Total Weight:</strong> <h3><?php echo $totalweight; ?>KG</h3>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-xs-4 col-md-4 col-lg-4 jumbotron">
                                <div class="row">
                                    <div class="col-xs-12 col-md-12 col-lg-12">
                                        <?php
                                            $over = '0';
                                            $over1 = '0.5';
                                            if($totalweight <= 1){
                                        ?>
                                            <input type="hidden" name="pricetotal" class="form-control" value="<?php echo $results4['rate']; ?>">
                                            <h4>Total Shipping Fee: RM <?php echo $results4['rate']; ?></h4>
                                        <?php
                                            }else{
                                                while ($over < $totalweight){
                                                    $over += $over1;
                                                }
                                        ?>
                                            <input type="hidden" name="pricetotal" class="form-control" value="<?php echo number_format((float)$over*$results4['rate'], 2, '.', ''); ?>">
                                            <h4>Total Shipping Fee</h4>
                                            <h3><small>RM </small><?php echo number_format((float)$over*$results4['rate'], 2, '.', ''); ?></h3>
                                        <?php
                                            }   
                                        ?>
                                        <br/>
                                        <input type="submit" class="btn btn-success" name="pay" value="Pay Now" onclick="return val();">
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                        </center>
                    </div>
                </form>
                
            </section>
        </div>
        <div class="modal fade" id="addAddress" tabindex="-1" role="dialog" aria-labelledby="addAddressTitle" aria-hidden="true">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <form action="shippingdetail.php" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addShippingTitle">New Address</h5>
                        </div>


                        <div class="modal-body left">
                            
                            <?php
                                if(mysqli_num_rows($result3) > 0)
                                {
                                    while($row = mysqli_fetch_array($result3))
                                    {
                                        ?>
                                            <input class="formfield" name="item[]" type="hidden" value="<?php echo $row['item_id']; ?>" />
                                        <?php
                                    }
                                }
                            ?>
                            <input type="hidden" name="totalweight" class="form-control" value="<?php echo $totalweight; ?>">
                            
                            <p><input class="formfield" name="address" type="text" placeholder="Address" required /></p>

                            <p><input class="formfield" name="postcode" type="text" placeholder="Postcode" required /></p>

                            <p><input class="formfield" name="city" type="text" placeholder="City" required /></p>

                            <p>
                                <select name="state" class="formselect" required>
                                    <option class="formoption" selected>Selangor</option>
                                    <?php 
                                        if(mysqli_num_rows($result1) > 0)
                                        {
                                            while($row = mysqli_fetch_array($result1))
                                            {
                                                ?>
                                                    <option class="formoption" value="<?php echo $row['state_name']; ?>">
                                                        <?php echo $row['state_name']; ?>
                                                    </option>
                                                <?php
                                            }
                                        }
                                    ?>
                                </select>
                            </p>

                            <p><input class="formfield" name="country" type="text" value="Malaysia" readonly /></p>

                        </div>

                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn btn-success btnSend" name="addAddress" value="Save" />
                        </div>
                     </form>
                 </div>
             </div>
         </div>
    </body>
</html>
<script>
    /*Validate*/
    function val(){
        var items = document.getElementsByName('address[]');
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
            alert("Please select at least one address");
            return false;
        }
        return true;
    }
</script>