<?php

require_once '../connection/config.php';
session_start();
$user_id = $_SESSION['user_id'];
$order_list_id = $_GET['order_list_id'];

$query = "SELECT *
          FROM order_item
          WHERE order_list_id = '$order_list_id'";
$result = mysqli_query($con, $query);

$query1 = "SELECT *
          FROM country
          WHERE country_name = 'MYR'";
$result1 = mysqli_query($con, $query1);
$results1 = mysqli_fetch_assoc($result1);

$query2 = "SELECT * FROM point WHERE user_id='$user_id'";
$result2 = mysqli_query($con, $query2);
$results2 = mysqli_fetch_assoc($result2);


$query3 = "SELECT *
          FROM rate
          WHERE rate_name = 'LWE point'";
$result3 = mysqli_query($con, $query3);
$results3 = mysqli_fetch_assoc($result3);

if(isset($_POST['submit']))
{    
    $status = 'Paid';
    
    $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_type = $_FILES['file']['type'];
	$folder="../receipts/";
    
    $title = 'Pay Order';
    $country_name = $results1['country_name'];
    $total_pay = $_POST['total_pay'];
    $statuss = 'Waiting for Accept';
    $current_rate = $results1['country_currency'];
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	
	$final_file=str_replace(' ','-',$new_file_name);
    
    
	$result4 = mysqli_query($con, "UPDATE order_item SET status='$status' WHERE order_list_id='$order_list_id'") or die(mysqli_error($con));
	$result5 = mysqli_query($con, "UPDATE order_list SET status='$statuss' WHERE order_list_id='$order_list_id'") or die(mysqli_error($con));
    
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
        $result6 = mysqli_query($con, "INSERT INTO payment SET user_id='$user_id', title='$title $order_list_id', amount='$country_name $total_pay', file='$final_file', type='$file_type', status='$statuss', from_order_list_id='$order_list_id', current_rate='$current_rate'") or die(mysqli_error($con));
		?>
		<script>
		alert('Successfully Submit');
        window.location.href='purchaselist.php?success';
        </script>
		<?php
	}
}

if(isset($_POST['pay']))
{    
    $status = 'Paid';
    $point_pay = $_POST['point_pay'];
    $title = 'Pay by';
    $points = 'Points';
    $statuss = 'Waiting for Accept';
    $current_rate = $results3['rate'];
    
    $result7 = mysqli_query($con, "UPDATE order_item SET status='$status' WHERE order_list_id='$order_list_id'") or die(mysqli_error($con));
    $result8 = mysqli_query($con, "UPDATE order_list SET status='$statuss' WHERE order_list_id='$order_list_id'") or die(mysqli_error($con));
    $result9 = mysqli_query($con, "UPDATE point SET point= point - '$point_pay' WHERE user_id = '$user_id' ") or die(mysqli_error($con));

    $result10 = mysqli_query($con, "INSERT INTO payment SET user_id='$user_id', title='$title $points', file='$point_pay $points', status='$statuss', from_order_list_id='$order_list_id', current_rate='$current_rate'") or die(mysqli_error($con));
    ?>
    <script>
    alert('Successfully Submit');
    window.location.href='purchaselist.php?success';
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
        <div class="row">
            <?php include_once('nav.php')?>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-6">
                    <h2>Payment</h2>
                </div>
            </div>
            
            <section class="content">
                <div class="row">
                    <center>
                        <div class="col-xs-8 col-md-8 col-lg-8 jumbotron">
                            <?php 
                                if(mysqli_num_rows($result) > 0)
                                {
                                    $counter = 0;
                                    $total = 0;
                                ?>
                                <h3>Purchase Product List</h3>
                                <table class="table thead-bordered table-hover" style="width:100%">
                                    <tbody>
                                        <tr>
                                            <th>#</th>
                                            <th style="text-align:left;"><strong>Name</strong></th>
                                            <th style="text-align:left;"><strong>Link</strong></th>
                                            <th style="text-align:left;"><strong>Type</strong></th>
                                            <th style="text-align:right;"><strong>Quantity</strong></th>
                                            <th style="text-align:right;"><strong>U.Price</strong></th>
                                            <th style="text-align:left;"><strong>Remark</strong></th>
                                        </tr>
                                        <?php
                                        while($row = mysqli_fetch_array($result))
                                        {
                                            $counter++;
                                            ?>
                                            <tr>
                                                <td><?php echo $counter; ?></td>
                                                <td style="text-align:left;"><strong><?php echo $row['order_item']; ?></strong></td>
                                                <td style="text-align:left;"><a href="<?php echo $row['link']; ?>" target="_blank">Item Link</a></td>
                                                <td style="text-align:left;"><?php echo $row['type']; ?></td>
                                                <td style="text-align:right;"><?php echo $row['quantity']; ?></td>
                                                <td style="text-align:right;"><?php echo "¥ ".$row['price']; ?></td>
                                                <td style="text-align:left;"><?php echo $row['remark']; ?></td>
                                            </tr>
                                        <?php
                                            $total += ($row["price"]*$row["quantity"]);
                                            $total_pay = $total*$results1['country_currency'];
                                            $point = $total*$results3['rate'];
                                        }
                                        ?>
                                        <tr>
                                            <td colspan="8" style="text-align:right;"><strong>Total Pay:</strong> <h3><?php echo $results1['country_name']." ".number_format((float)$total_pay, 2, '.', ''); ?></h3></td>
                                        </tr>
                                    </tbody>
                                </table>
                            <?php
                                }
                            ?>
                            <?php
                                if($results2['point'] >= $point){
                                    ?>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6 col-lg-6">
                                            <form action="payment.php?order_list_id=<?php echo $order_list_id; ?>" method="post" enctype="multipart/form-data">
                                                <h3>Upload Banking Receipt</h3>
                                                <div class="row">
                                                    <div class="col-xs-12 col-md-12 col-lg-12">
                                                        <label>Transaction receipt: </label>
                                                        <input type="file" name="file" required/>
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
                                            <form action="payment.php?order_list_id=<?php echo $order_list_id; ?>" method="post">
                                                <div class="row">
                                                    <div class="col-xs-12 col-md-12 col-lg-12">
                                                        <br />
                                                        <p><?php echo $point; ?> point</p>
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
                                            <form action="payment.php?order_list_id=<?php echo $order_list_id; ?>" method="post" enctype="multipart/form-data">
                                                <h3>Upload Banking Receipt</h3>
                                                <div class="row">
                                                    <div class="col-xs-12 col-md-12 col-lg-12">
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
                                        <p>Bank: <?php echo $results1['bank']; ?></p>
                                        <p>Account No: <?php echo $results1['account_no']; ?></p>
                                        <p>Account Name: <?php echo $results1['account_name']; ?></p>
                                        <?php
                                            if($results2 > 0){
                                                ?>
                                                    <input type="hidden" name="point" class="form-control" value="<?php echo $results2['point']; ?>">
                                                    <p>Current point: <?php echo $results2['point']; ?></p>
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
                    </center>
                </div>
            </section>
        </div>
    </body>
</html>