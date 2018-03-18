<?php

require_once '../connection/config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(isset($_POST['add']))
{    

    $name = $_POST['name'];
    $link = $_POST['link'];
    $type = $_POST['type'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $remark = $_POST['remark'];
    
	
	$result1 = mysqli_query($con, "INSERT INTO order_item SET user_id='$user_id', order_item='$name', link='$link', type='$type', quantity='$quantity', price='$price', remark='$remark'") or die(mysqli_error($con));
}

$query = "SELECT *
          FROM order_item
          WHERE user_id='$user_id' AND order_list_id IS NULL";
$result = mysqli_query($con, $query);

if (isset($_GET['order_item_id']))
{
    $order_item_id = $_GET['order_item_id'];

    $result2 = mysqli_query($con, "DELETE FROM order_item WHERE order_item_id=$order_item_id") or die(mysqli_error($con));
    
    ?>
    <script>
    window.location.href='purchase.php?success';
    </script>
    <?php

}

if (isset($_GET['empty']))
{
    
    $result3 = mysqli_query($con, "DELETE FROM order_item WHERE order_list_id IS NULL AND user_id=$user_id") or die(mysqli_error($con));
    
    ?>
    <script>
    window.location.href='purchase.php?success';
    </script>
    <?php

}

if(isset($_POST['payment']))
{    
    $unique_id = rand(1000,100000). $user_id;
    $order_list_id = $unique_id;
    $status = 'Ready to Pay';
    $price = $_POST['total_price'];
    
    $result4 = mysqli_query($con, "UPDATE order_item SET order_list_id='$order_list_id', status='$status' WHERE order_list_id IS NULL AND user_id='$user_id'") or die(mysqli_error($con));
    
	$result5 = mysqli_query($con, "INSERT INTO order_list SET order_list_id='$order_list_id', user_id='$user_id', status='$status', price='$price'") or die(mysqli_error($con));
    ?>
    <script>
    window.location.href='payment.php?order_list_id=<?php echo $order_list_id; ?>';
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

        <!--stylesheet-->
        <link href="../frameworks/css/style.css" rel="stylesheet"/>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
        
    </head>

    <body>
        <div class="row">
            <?php include_once('nav.php')?>
        </div>
        
        <div class="container">
            <center>
                <h2>Purchase Product</h2>
                <hr/>
                <section class="content">
                    <div class="row botmar">
                        <div class="col-xs-12 col-md-12 col-lg-12 rowhead">
                            <strong>Product Details</strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <form method="post" action="purchase.php">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <label>Name:</label>
                                            </td>
                                            <td>
                                                <input class="form-control" name="name" type="text" required>
                                            </td>
                                            <td>
                                                <label>Link:</label>
                                            </td>
                                            <td>
                                                <input class="form-control" name="link" type="text" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Type:</label>
                                            </td>
                                            <td>
                                                <input class="form-control" name="type" type="text" required>
                                            </td>
                                            <td>
                                                <label>Quantity:</label>
                                            </td>
                                            <td>
                                                <input class="form-control" name="quantity" type="number" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Price:</label>
                                            </td>
                                            <td>
                                                <div class="input-group"> 
                                                    <span class="input-group-addon">¥</span>
                                                    <input class="form-control" name="price" type="number" value="0.01" min="0.01" step="0.01" required />
                                                </div>
                                            </td>
                                            <td>
                                                <label>Remark:</label>
                                            </td>
                                            <td>
                                                <input class="form-control" name="remark" type="text">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <input type="submit" class="btn btn-success fltright" name="add" value="Add to list">
                            </form>
                        </div>
                    </div>
                </section>
                <br/>
                <section class="content">
                    <div class="row botmar">
                        <div class="col-xs-12 col-md-12 col-lg-12 rowhead">
                            <strong>Purchase Product List</strong>
                            <a href="purchase.php?empty=empty" class="btn btn-danger fltright">Empty List</a>
                        </div>
                    </div>
                    <form action="purchase.php" method="post">
                        <div class="row">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <?php 
                                    if(mysqli_num_rows($result) > 0)
                                    {
                                        $counter = 0;
                                        $total = 0;
                                    ?>
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
                                                <th style="text-align:center;"><strong>Action</strong></th>
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
                                                    <td style="text-align:center;">
                                                        <a href="purchase.php?order_item_id=<?php echo $row['order_item_id']; ?>" class="btn btn-xs btn-danger delete-button" name="delete">Remove</a>
                                                    </td>
                                                </tr>
                                            <?php
                                                $total += ($row["price"]*$row["quantity"]);
                                            }
                                            ?>
                                            <tr>
                                                <td colspan="8" style="text-align:right;"><strong>Total:</strong> <?php echo "¥ ".number_format((float)$total, 2, '.', ''); ?></td>
                                                <input class="form-control" name="total_price" type="hidden" value="<?php echo number_format((float)$total, 2, '.', ''); ?>">
                                            </tr>
                                        </tbody>
                                    </table>
                                <input type="submit" class="btn btn-warning fltright" name="payment" value="Payment">
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </form>
                </section>
            </center>
        </div>
        
        <div><?php include('../footer.php') ?></div>
    </body>
</html>