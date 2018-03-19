<?php

require_once '../connection/config.php';
session_start();
$i= 0;
$purchaselistQuery = $db->prepare("
    SELECT *
    FROM shipping
    WHERE user_id=:user_id
");

$purchaselistQuery->execute([
    'user_id' => $_SESSION['user_id']
]);

$purchaselist = $purchaselistQuery->rowCount() ? $purchaselistQuery : [];

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

        <!--stylesheet-->
        <link href="../frameworks/css/style.css" rel="stylesheet"/>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body background="../resources/img/bg.jpg">
        <section class = "content"> 
		<center>
            <div class="row">
                <?php include_once('nav.php')?>
            </div>
   
            <div class="container">
                <h2>All Shipping</h2>
                <hr/>
            </div>
            
            <section class = "content">
                <div class="row">
			
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <?php if(!empty($purchaselist)): ?>
                        <table class="table thead-bordered table-hover purchaselist" style="width:80%">
                            <thead>
                                <tr>
                                    <th>#</th>
									<th>Tracking No</th>
									<th>Order No</th>
                                    <th>Deliver To</th>
                                    <th>Courier</th>
									<th>Order Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <?php foreach($purchaselist as $row):
							{                             
										$i++;
							}?>
                            <tbody class="purchase">
                                <tr>
									<td><?php echo $i; ?></td>
                                    <td><?php echo $row['tracking_code']; ?></td>
                                    <td><?php echo $row['order_number']; ?></td>
                                    <td><?php echo $row['ship_to']; ?></td>
									<td><?php echo $row['courier']; ?></td>
									<td><?php echo $row['order_date']; ?></td>
									<td><?php echo $row['status']; ?></td>
                                    
                                </tr>
                            </tbody>
                            <?php endforeach; ?>
                        </table>
                        <?php else: ?>
                            <p>No Record Found.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        </center>  
		</section>
    </body>
</html>