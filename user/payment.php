<?php

require_once '../connection/config.php';
session_start();
$user_id = $_SESSION['user_id'];
$order_item = $_POST['order_item'];

$query = "SELECT *
           FROM order_item
           WHERE order_item_id IN (".implode(',',$order_item).")";
$result = mysqli_query($con, $query);

$query1 = "SELECT *
           FROM order_item
           WHERE order_item_id IN (".implode(',',$order_item).")";
$result1 = mysqli_query($con, $query1);

$query10 = "SELECT *
           FROM order_item
           WHERE order_item_id IN (".implode(',',$order_item).")";
$result10 = mysqli_query($con, $query10);

$query2 = "SELECT *
          FROM country
          WHERE country_name = 'Malaysia'";
$result2 = mysqli_query($con, $query2);
$results2 = mysqli_fetch_assoc($result2);

$query3 = "SELECT * FROM point WHERE user_id='$user_id'";
$result3 = mysqli_query($con, $query3);
$results3 = mysqli_fetch_assoc($result3);

$query4 = "SELECT *
          FROM rate
          WHERE rate_name = 'LWE point'";
$result4 = mysqli_query($con, $query4);
$results4 = mysqli_fetch_assoc($result4);

if(isset($_POST['submit']))
{   
    $unique_id = rand(10000,100000). $user_id;
    $payment_id = $unique_id;
    $status = 'Paid';
    
    $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_type = $_FILES['file']['type'];
	$folder="../receipts/";
    
    $title = 'Pay Order';
    $total_pay = $_POST['total_pay'];
    $statuss = 'Waiting for Accept';
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	
	$final_file=str_replace(' ','-',$new_file_name);
    
	$result5 = mysqli_query($con, "UPDATE order_item SET payment_id='$payment_id', status='$status' WHERE order_item_id IN (".implode(',',$order_item).")") or die(mysqli_error($con));
    
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
        $result6 = mysqli_query($con, "INSERT INTO payment SET payment_id='$payment_id', user_id='$user_id', title='$title', amount='$total_pay', file='$final_file', type='$file_type', status='$statuss'") or die(mysqli_error($con));
		?>
		<script>
		alert('Successfully Submit');
        window.parent.location.reload();window.close();
        </script>
		<?php
	}
}

if(isset($_POST['point_pay']))
{    
    $unique_id = rand(10000,100000). $user_id;
    $payment_id = $unique_id;
    $status = 'Paid';
    $point_pay = $_POST['point_pay'];
    $title = 'Pay order by';
    $points = 'Points';
    $statuss = 'Waiting for Accept';
    
    $result7 = mysqli_query($con, "UPDATE order_item SET payment_id='$payment_id', status='$status' WHERE order_item_id IN (".implode(',',$order_item).")") or die(mysqli_error($con));
    $result8 = mysqli_query($con, "UPDATE point SET point= point - '$point_pay' WHERE user_id = '$user_id' ") or die(mysqli_error($con));
    $result9 = mysqli_query($con, "INSERT INTO payment SET payment_id='$payment_id',user_id='$user_id', title='$title $points', amount='$point_pay $points', status='$statuss'") or die(mysqli_error($con));
    ?>
    <script>
    alert('Successfully Submit');
    window.parent.location.reload();window.close();
    </script>
    <?php
}

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
        <style>
            .vl {
                border-left: 1px solid lightgrey;
                height: 200px;
            }
            .details p{
                font-size: 100%;
            }
        </style>
    </head>

    <body background="../resources/img/bg.jpg" ng-app="">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-6">
                    <h2>Payment</h2>
                </div>
            </div>
            
            <section class="content">
                <div class="row">
                    <center>
                        <?php
                            if(mysqli_num_rows($result1) > 0)
                                    {
                                        $total = 0;
                        ?>
                        <div class="col-xs-8 col-md-8 col-lg-8 jumbotron">
                            <h3>Purchase Product List</h3>
                            <table class="purchasetable">
                                <tr class="center">
                                    <th class="purchasecol2">Name</th>
                                    <th class="purchasecol1">Link</th>
                                    <th class="purchasecol2">Category</th>
                                    <th class="purchasecol1">Quantity</th>
                                    <th class="purchasecol1">U.Price</th>
                                    <th class="purchasecol1">T.Price</th>
                                    <th class="purchasecol2">Remark</th>
                                </tr>

                                <?php
                                        while($row = mysqli_fetch_array($result1))
                                        {
                                            $total_price = $row['quantity']*$row['price'];
                                ?>

                                <tr class="bodyrow">
                                    <input type="hidden" value="<?php echo $row['order_item_id']; ?>" name="order_item[]">
                                    <td><?php echo $row['order_item']; ?></td>
                                    <td><a href="<?php echo $row['link']; ?>" target="_blank">View item</a></td>
                                    <td><?php echo $row['category']; ?></td>
                                    <td><?php echo $row['quantity']; ?></td>
                                    <td><?php echo $row['price']; ?></td>
                                    <td><?php echo number_format((float)$total_price, 2, '.', ''); ?></td>
                                    <td><?php echo $row['remark']; ?></td>
                                </tr>
                                <?php
                                        $total += number_format((float)$total_price, 2, '.', '');
                                        $total_pay = $total;
                                        $point = $total*$results4['rate'];
                                        }

                                ?>
                                <tr>
                                    <td>
                                        <td colspan="8" style="text-align:right;"><strong>Total Pay:</strong> <h3>RM <?php echo number_format((float)$total_pay, 2, '.', ''); ?></h3>
                                    </td>
                                </tr>
                            </table>
                            <?php
                                if($results3['point'] >= $point){
                                    ?>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6 col-lg-6">
                                            <form action="payment.php" method="post" enctype="multipart/form-data">
                                                <h3>Upload Banking Receipt</h3>
                                                <div class="row">
                                                    <div class="col-xs-12 col-md-12 col-lg-12">
                                                        <?php
                                                            while($row = mysqli_fetch_array($result))
                                                            {
                                                        ?>
                                                            <input type="hidden" value="<?php echo $row['order_item_id']; ?>" name="order_item[]">
                                                        <?php
                                                            }

                                                        ?>
                                                        <label>Transaction receipt: </label>
                                                        <input type="file" name="file" required />
                                                        <input class="form-control" name="total_pay" type="hidden" value="<?php echo number_format((float)$total_pay, 2, '.', ''); ?>">
                                                        <br/>
                                                        <input type="submit" class="btn btn-success" name="submit" value="Upload">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-xs-12 col-md-1 col-lg-1">
                                            <div class="vl"></div>
                                        </div>
                                        <div class="col-xs-12 col-md-5 col-lg-5">
                                            <form action="payment.php" method="post" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-xs-12 col-md-12 col-lg-12">
                                                        <br />
                                                        <?php
                                                            while($row = mysqli_fetch_array($result10))
                                                            {
                                                        ?>
                                                            <input type="hidden" value="<?php echo $row['order_item_id']; ?>" name="order_item[]">
                                                        <?php
                                                            }

                                                        ?>
                                                        <p><?php echo number_format((float)$point, 2, '.', ''); ?> point</p>
                                                        <input class="form-control" name="point_pay" type="hidden" value="<?php echo number_format((float)$point, 2, '.', ''); ?>">
                                                        <input type="submit" class="btn btn-success" name="pay" value="Pay by Point">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <?php
                                }else{
                                    ?>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12 col-lg-12">
                                            <form action="payment.php" method="post" enctype="multipart/form-data">
                                                <h3>Upload Banking Receipt</h3>
                                                <div class="row">
                                                    <div class="col-xs-12 col-md-12 col-lg-12">
                                                        <?php
                                                            while($row = mysqli_fetch_array($result))
                                                            {
                                                        ?>
                                                            <input type="hidden" value="<?php echo $row['order_item_id']; ?>" name="order_item[]">
                                                        <?php
                                                            }
                                                        
                                                        ?>
                                                        <label>Transaction receipt: </label>
                                                        <input type="file" name="file" required/>
                                                        <input class="form-control" name="total_pay" type="hidden" value="<?php echo number_format((float)$total_pay, 2, '.', ''); ?>">
                                                        <br/>
                                                        <input type="submit" class="btn btn-success" name="submit" value="Upload">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <?php
                                }
                            ?>
                        </div>
                        <div class="col-xs-4 col-md-4 col-lg-4 jumbotron">
                            <div class="row">
                                <div class="col-xs-12 col-md-12 col-lg-12">
                                    <p>Banking Details </p>
                                    <div class="details">
                                        <p>Bank: <?php echo $results2['bank']; ?></p>
                                        <p>Account No: <?php echo $results2['account_no']; ?></p>
                                        <p>Account Name: <?php echo $results2['account_name']; ?></p>
                                        <?php
                                            if($results3 > 0){
                                                ?>
                                                    <input type="hidden" name="point" class="form-control" value="<?php echo $results3['point']; ?>">
                                                    <p>Current point: <?php echo $results3['point']; ?></p>
                                                <?php
                                            }else{
                                                ?>
                                                    <p>Current point: 0</p>
                                                <?php
                                            }
                                        ?>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                    </center>
                </div>
            </section>
        </div>
    </body>
</html>