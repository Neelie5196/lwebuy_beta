<?php

require_once '../connection/config.php';
session_start();

if ($_SESSION['user_id'] == "")
{
    header('location: ../login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$item = $_POST['item'];
$totalweight = $_POST['totalweight'];

$query = "SELECT * FROM address WHERE user_id = '$user_id'";
$result = mysqli_query($con, $query);

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

    <body class="userbg" ng-app="">
        <div class="row updaterow1">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <p>
                    <a href="main.php#ship" class="aback">&lt;&emsp;Back to main page</a>
                </p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12 center">
                <h2 class="bigh2 pagetitle hidden-xs hidden-sm">Shipping Details</h2>
                
                <h2 class="smh2 pagetitle hidden-md hidden-lg">Shipping Details</h2>
            </div>
        </div>
        
        <div class="row">
            <form action="payments.php" method="post">
                <div class="col-xs-5 col-md-4 col-lg-4 col-xs-push-1 col-md-push-2 col-lg-push-2 shipformcontainer">
                    <p>
                        <label>Recipient Name: </label><br/>
                        <input class="formfield" name="name" type="text" required />
                    </p>

                    <p>
                        <label>Recipient Contact: </label><br/>
                        <input class="formfield" name="contact" type="text" required />
                    </p>

                    <p>
                        <label>Address:</label><br/>
                        <select class="formselects" name="address" >
                            <option class="formoptions" selected required>Address</option>
                            <?php 
                                if(mysqli_num_rows($result) > 0)
                                {
                                    while($row = mysqli_fetch_array($result))
                                    {
                                        ?>
                                            <option class="formoption" value="<?php echo $row['address_id']; ?>">
                                                <?php echo $row['address'].", ".$row['postcode'].", ".$row['city'].", ".$row['state']; ?>
                                            </option>
                                        <?php
                                    }
                                }
                            ?>
                        </select>
                        <a class="btn btnGo" href="javascript: void(0)" onclick="window.open('addAddress.php','windowname1','fullscreen=yes'); return false;">Add address</a>
                    </p>

                    <p>
                        <label>Remarks: </label><br/>
                        <input class="formfield" name="remark" type="text" />
                    </p>
                    
                    <p><input type="submit" class="btn btnAdd" name="pay" value="Pay Now" onclick="return val();"></p>
                </div>


                <div class="col-xs-5 col-md-4 col-lg-4 col-xs-push-1 col-md-push-4 col-lg-push-2 pdetailscontainer">
                    <h3>Selected Items</h3>

                    <?php
                        if(mysqli_num_rows($result3) > 0)
                        {
                    ?>

                    <table class="itemstable center">
                        <tr class="ptoprow">
                            <td>Name</td>
                            <td>Order Code</td>
                            <td>Received On</td>
                            <td>Weight (kg)</td>
                        </tr>

                        <?php
                            while($row = mysqli_fetch_array($result3))
                            {
                        ?>

                        <tr>
                            <input type="hidden" value="<?php echo $row['item_id']; ?>" name="item[]">
                            <td><p><?php echo $row['item_description']; ?></p></td>
                            <td><p><?php echo $row['order_code']; ?></p></td>
                            <td><?php echo $row['datetime']; ?></td>
                            <td><p><?php echo $row['weight']; ?></p></td>
                        </tr>

                        <?php
                            }
                        ?>

                        <tr>
                            <td colspan="3" class="left"><p>Total weight (kg)</p></td>
                            <td class="coltotal">
                                <p>
                                    <input type="hidden" id="totalweight" name="totalweight" class="form-control" value="<?php echo number_format((float)$totalweight, 2, '.', ''); ?>">
                                    <?php echo number_format((float)$totalweight, 2, '.', ''); ?>
                                </p>
                            </td>
                        </tr>


                        <tr>
                            <td colspan="3" class="left"><p>Total Price (MYR)</p></td>
                            <td class="">
                                <p>
                                    <?php
                                        $totalprice = $results4['rate'] * $totalweight;
                                    ?>

                                    <input type="hidden" name="pricetotal" class="form-control" value="<?php echo $totalprice; ?>">

                                    <?php
                                            echo $totalprice;
                                    ?>
                                </p>
                            </td>
                        </tr>
                    </table>
                    
                    <?php
                        }
                    ?>
                </div>
            </form>
        </div>
    </body>
</html>