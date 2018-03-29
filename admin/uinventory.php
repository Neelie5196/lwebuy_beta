<?php
require_once '../connection/config.php';
session_start();

if(isset($_POST['receivesave']))
{	
    $status = 'Received';
    $statuss = 'In Use';
    $request_id = $_POST['request_id'];
    $from = 'Receive Request';
    $user_id = $_POST['user_id'];
    $slot_id = $_POST['slot_id'];
    $order_item = $_POST['order_item'];
    $order_code = $_POST['order_code'];
    $weight = $_POST['weight'];
    $action = 'In';
    
    $result = mysqli_query($con, "UPDATE request SET status = '$status' WHERE request_id = $request_id ") or die(mysqli_error($con));
    
    $query1 = "SELECT * 
              FROM slot
              WHERE user_id = '$user_id'";
    $results1 = mysqli_query($con, $query1);

    if($resultss1 = mysqli_num_rows($results1) > 0){
        $result1 = mysqli_query($con, "INSERT INTO item SET slot_id='$slot_id', from_order='$from', item_description='$order_item', order_code='$order_code', weight='$weight', action='$action'") or die(mysqli_error($con));
    }else{
        $result1 = mysqli_query($con, "UPDATE slot SET status = '$statuss', user_id = '$user_id' WHERE slot_id = $slot_id ") or die(mysqli_error($con));
        $result2 = mysqli_query($con, "INSERT INTO item SET slot_id='$slot_id', from_order='$from', item_description='$order_item', order_code='$order_code', weight='$weight', action='$action'") or die(mysqli_error($con));
    }
    ?>
    <script>
    alert('Success to Save');
    window.location.href='uinventory.php';
    </script>
    <?php
}

if(isset($_POST['ordersave']))
{	
    $status = 'Received';
    $statuss = 'In Use';
    $order_item_id = $_POST['order_item_id'];
    $from = 'Order Item';
    $user_id = $_POST['user_id'];
    $slot_id = $_POST['slot_id'];
    $order_item = $_POST['order_item'];
    $order_code = $_POST['order_code'];
    $weight = $_POST['weight'];
    $action = 'In';
    
    $result = mysqli_query($con, "UPDATE order_item SET status = '$status' WHERE order_item_id = $order_item_id ") or die(mysqli_error($con));
    
    $query2 = "SELECT * 
              FROM slot
              WHERE user_id = '$user_id'";
    $results2 = mysqli_query($con, $query2);

    if($resultss2 = mysqli_num_rows($results2) > 0){
        $result1 = mysqli_query($con, "INSERT INTO item SET slot_id='$slot_id', from_order='$from', item_description='$order_item', order_code='$order_code', weight='$weight', action='$action'") or die(mysqli_error($con));
    }else{
        $result1 = mysqli_query($con, "UPDATE slot SET status = '$statuss', user_id = '$user_id' WHERE slot_id = $slot_id ") or die(mysqli_error($con));
        $result2 = mysqli_query($con, "INSERT INTO item SET slot_id='$slot_id', from_order='$from', item_description='$order_item', order_code='$order_code', weight='$weight', action='$action'") or die(mysqli_error($con));
    }
    ?>
    <script>
    alert('Success to Save');
    window.location.href='uinventory.php';
    </script>
    <?php
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>LWE Buy</title>

        <meta name="viewport" content="width=device-width, initialscale=1.0"/>

        <!-- Angularjs -->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
        
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>    

        <!--stylesheet-->
        <link href="../frameworks/css/style.css" rel="stylesheet"/>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
        
        <script src="../frameworks/js/lwe.js"></script>
        <script src="../frameworks/js/prototype-barcode.js"></script>
        <script src="../frameworks/js/prototype.js"></script>

    </head>

    <body class="userbg">
        <div class="row updaterow1">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <p>
                    <a href="main.php#adupdate" class="aback">&lt;&emsp;Select another update</a>
                </p>
            </div>
        </div>
        
        <div class="row userrow2 center" id="updateview">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <h2 class="bigh2 pagetitle hidden-xs hidden-sm">Inventory Items Arrival</h2>

                <h2 class="smh2 pagetitle hidden-md hidden-lg">Inventory Item Arrival</h2>

                <div class="row">
                    <div class="col-xs-6 col-md-6 col-lg-6 col-xs-push-3 col-md-push-3 col-lg-push-3 updatecontainer">
                        <form action="uinventory.php" method="post">
                            <p><input type="text" name="search" class="formfield" placeholder="Enter order code here" autofocus required /></p>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 updatecontainer">
                        <form action="uinventory.php" method="post">
                            <?php
                                if(isset($_POST['search']))
                                {
                                    $search = $_POST['search'];
                                    $query = "SELECT * 
                                              FROM users us
                                              JOIN request rq
                                              ON rq.user_id = us.user_id
                                              WHERE rq.order_code = '$search' AND status = 'Request'";
                                    $result = mysqli_query($con, $query);

                                    $querys = "SELECT *
                                              FROM users us
                                              JOIN order_item oi
                                              ON oi.user_id = us.user_id
                                              WHERE oi.order_code = '$search' AND status = 'Proceed'";                    
                                    $result1 = mysqli_query($con, $querys);



                                    if($results = mysqli_num_rows($result) > 0){
                                        while ($line = mysqli_fetch_array($result))
                                        {
                                        ?>
                                            <div class="row">
                                                <table class="purchasetable">
                                                    <thead>
                                                        <tr>
                                                            <th>Customer Name</th>
                                                            <th>Item Name</th>
                                                            <th>Tracking Code</th>
                                                            <th>Slot Aisle</th>
                                                            <th>Slot Number</th>
                                                            <th>Weight (kg)</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <input type="hidden" name="request_id" value="<?php echo $line['request_id']; ?>">
                                                            <input type="hidden" name="user_id" value="<?php echo $line['user_id']; ?>">
                                                            <input type="hidden" name="order_item" value="<?php echo $line['order_item']; ?>">
                                                            <input type="hidden" name="order_code" value="<?php echo $line['order_code']; ?>">
                                                            <td><?php echo $line['fname']; ?> <?php echo $line['lname']; ?></td>
                                                            <td><?php echo $line['order_item']; ?></td>
                                                            <td><?php echo $line['order_code']; ?></td>
                                                            <?php
                                                                $user_id = $line['user_id'];
                                                                $query4 = "SELECT *
                                                                           FROM slot
                                                                           WHERE user_id= '$user_id' ";
                                                                $result4 = mysqli_query($con, $query4);
                                                                $results4 = mysqli_fetch_assoc($result4);

                                                                if(!empty($results4))
                                                                {
                                                                    ?>
                                                                        <input type="hidden" name="slot_id" value="<?php echo $results4['slot_id']; ?>">
                                                                        <td><?php echo $results4['slot_aisle']; ?></td>
                                                                        <td><?php echo $results4['slot_num']; ?></td>
                                                                    <?php
                                                                }else{
                                                                    $query5 = "SELECT *
                                                                               FROM slot
                                                                               WHERE status = 'Not in Use'
                                                                               ORDER BY RAND()
                                                                               LIMIT 1";
                                                                    $result5 = mysqli_query($con, $query5);
                                                                    $results5 = mysqli_fetch_assoc($result5);

                                                                    if(!empty($results5))
                                                                    {
                                                                        ?>
                                                                            <input type="hidden" name="slot_id" value="<?php echo $results5['slot_id']; ?>">
                                                                            <td><?php echo $results5['slot_aisle']; ?></td>
                                                                            <td><?php echo $results5['slot_num']; ?></td>
                                                                        <?php
                                                                    }else{
                                                                        echo '<p>There is no empty slot.</p>';
                                                                    }
                                                                }
                                                            ?>

                                                            <td><input type="text" name="weight" class="tblformfield" required /></td>
                                                            <td><input type="submit" class="btn btn-xs btn-default" name="receivesave" value="Save"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php  
                                        }
                                    }else if($resultss = mysqli_num_rows($result1) > 0){
                                        while ($line = mysqli_fetch_array($result1)) 
                                        {
                                        ?>
                                            <div class="row">
                                                <table  class="purchasetable">
                                                    <thead>
                                                        <tr>
                                                            <th>Customer Name</th>
                                                            <th>Item Name</th>
                                                            <th>Tracking Code</th>
                                                            <th>Slot Aisle</th>
                                                            <th>Slot Number</th>
                                                            <th>Weight (kg)</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <input type="hidden" name="order_item_id" value="<?php echo $line['order_item_id']; ?>">
                                                            <input type="hidden" name="user_id" value="<?php echo $line['user_id']; ?>">
                                                            <input type="hidden" name="order_item" value="<?php echo $line['order_item']; ?>">
                                                            <input type="hidden" name="order_code" value="<?php echo $line['order_code']; ?>">
                                                            <td><?php echo $line['fname']; ?> <?php echo $line['lname']; ?></td>
                                                            <td><?php echo $line['order_item']; ?></td>
                                                            <td><?php echo $line['order_code']; ?></td>
                                                            <?php
                                                                $user_id = $line['user_id'];
                                                                $query4 = "SELECT *
                                                                           FROM slot
                                                                           WHERE user_id= '$user_id' ";
                                                                $result4 = mysqli_query($con, $query4);
                                                                $results4 = mysqli_fetch_assoc($result4);

                                                                if(!empty($results4))
                                                                {
                                                                    ?>
                                                                        <input type="hidden" name="slot_id" value="<?php echo $results4['slot_id']; ?>">
                                                                        <td><?php echo $results4['slot_aisle']; ?></td>
                                                                        <td><?php echo $results4['slot_num']; ?></td>
                                                                    <?php
                                                                }else{
                                                                    $query5 = "SELECT *
                                                                               FROM slot
                                                                               WHERE status = 'Not in Use'
                                                                               ORDER BY RAND()
                                                                               LIMIT 1";
                                                                    $result5 = mysqli_query($con, $query5);
                                                                    $results5 = mysqli_fetch_assoc($result5);

                                                                    if(!empty($results5))
                                                                    {
                                                                        ?>
                                                                            <input type="hidden" name="slot_id" value="<?php echo $results5['slot_id']; ?>">
                                                                            <td><?php echo $results5['slot_aisle']; ?></td>
                                                                            <td><?php echo $results5['slot_num']; ?></td>
                                                                        <?php
                                                                    }else{
                                                                        echo '<p>There is no empty slot.</p>';
                                                                    }
                                                                }
                                                            ?>
                                                            <td><input type="text" name="weight" class="form-control" style="border-radius: 30px; width: 100%;" required></td>
                                                            <td><input type="submit" class="btn btn-xs btn-default" name="ordersave" value="Save"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php  
                                        }
                                    }else{
                                        ?>
                                            <p>Invalid item.</p>
                                        <?php
                                    }
                                }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>