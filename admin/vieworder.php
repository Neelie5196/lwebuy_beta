<?php

require_once '../connection/config.php';
session_start();
error_reporting();
$user_id = $_GET['user_id'];

$query1 = "SELECT *
           FROM order_item
           WHERE status='request' AND user_id='$user_id'";
$result1 = mysqli_query($con, $query1);

$query2 = "SELECT * 
          FROM country
          WHERE country_name = 'Malaysia'";
$result2 = mysqli_query($con, $query2);
$results2 = mysqli_fetch_assoc($result2);

if(isset($_POST['updateprice']))
{    

    $query = "SELECT * 
            FROM country
            WHERE country_name = 'Malaysia'";
    $result = mysqli_query($con, $query);
    $results = mysqli_fetch_assoc($result);
    
    $user_id = $_POST['user_id'];
    $order_item_id = $_POST['order_item_id'];
    $price = $_POST['price'];
    $status = 'Ready to Pay';
    $currency = $results['country_currency'];

    for($i=0; $i<$_POST['numbers']; $i++){
        $itemprice = $price[$i] * $currency;
        $result3 = mysqli_query($con, "UPDATE order_item SET price='$itemprice' WHERE order_item_id = $order_item_id[$i]") or die(mysqli_error($con));
    }
    
    ?>
    <script>
    alert('Success to Update');
    window.location.href='vieworder.php?user_id=<?php echo $user_id; ?>&success';
    </script>
    <?php
}

if(isset($_POST['acceptrequest']))
{   
    $user_id = $_POST['user_id'];
    $query4 = "SELECT *
              FROM order_item
              WHERE status='request'";
    $result4 = mysqli_query($con, $query4);
    $results4 = mysqli_fetch_assoc($result4);
    
    if($results4['price'] != NULL){
        $status = 'Ready to Pay';

        $result5 = mysqli_query($con, "UPDATE order_item SET status='$status' WHERE user_id = $user_id") or die(mysqli_error($con));
        ?>
        <script>
        alert('Success to Update');
        window.location.href='orderrequest.php?&success';
        </script>
        <?php
    }else{
        ?>
        <script>
        alert('Please update the price before accept');
        window.location.href='vieworder.php?user_id=<?php echo $user_id; ?>&fail';
        </script>
        <?php
    }
    
}

?>

<!DOCTYPE html>
<html ng-app="">
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

    <body>
        <center>
            <div class="container">
                <h2>Order Request Item</h2>
                <hr/>
            </div>
            <section class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12 jumbotron">
                            <?php 
                                if(mysqli_num_rows($result1) > 0)
                                {
                                    $counter=0;
                                ?>
                                <form action="vieworder.php?user_id=<?php echo $user_id; ?>" method="post">
                                    <table class="table thead-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Link</th>
                                                <th>Category</th>
                                                <th>Quantity</th>
                                                <th>Remark</th>
                                                <th>U.Price (RMB)</th>
                                                <th>Total Price (RM)</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <?php
                                            while($row = mysqli_fetch_array($result1))
                                            {
                                                $counter++;
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $counter; ?></td>
                                                    <td><?php echo $row['order_item']; ?></td>
                                                    <td>
                                                        <a href="#" class="btntab" onclick="window.open('<?php echo $row['link']; ?> ','','Toolbar=1,Location=0,Directories=0,Status=0,Menubar=0,Scrollbars=0,Resizable=0,fullscreen=yes');">View item</a>
                                                    </td>
                                                    <td><?php echo $row['category']; ?></td>
                                                    <td><?php echo $row['quantity']; ?></td>
                                                    <td><?php echo $row['remark']; ?></td>
                                                    <td><input type="number" step="0.01" min="0.01" name="price[]" value="<?php echo number_format((float)$row['price']/$results2['country_currency'], 2, '.', ''); ?>" required/></td>
                                                    <td><?php echo $row['price']; ?></td>
                                                    <td>
                                                        <a data-toggle="modal" data-id="<?php echo $row['order_item_id']; ?>" class="btn btn-default btn-xs btnDelete" href="#"><span class="glyphicon glyphicon-remove"></span></a>
                                                    </td>
                                                    <input type="hidden" name="order_item_id[]" value="<?php echo $row['order_item_id']; ?>">
                                                    <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                                                </tr>
                                            </tbody>
                                            <?php
                                        }
                                    }else{
                                        ?>
                                            <p>Error.</p>
                                        <?php
                                    }
                                ?>
                                </table>
                                <input type="hidden" name="numbers" value="<?php echo $counter; ?>">
                                <input type="submit" class="btn btn-warning" name="updateprice" value="Update">
                            </form>
                        </div>
                        <form action="vieworder.php?user_id=<?php echo $user_id; ?>" method="post">
                            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                            <input type="submit" class="btn btn-success" name="acceptrequest" value="Accept">
                        </form>
                    </div>
                </div>
            </section>
        </center>
    </body>
</html>