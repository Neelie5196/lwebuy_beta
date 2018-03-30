<?php
require_once '../connection/config.php';
session_start();

$user_id = $_SESSION['user_id'];

$query = "SELECT *
           FROM work_station ws
           JOIN users us
           ON ws.user_id = us.user_id
           JOIN warehouse wh
           ON wh.ware_id = ws.ware_id
           WHERE us.user_id = '$user_id'";

$result = mysqli_query($con, $query);

$query1 = "SELECT *
          FROM users us
          JOIN order_item oi
          ON oi.user_id = us.user_id
          WHERE status = 'Proceed'";                    
$result1 = mysqli_query($con, $query1);

$query2 = "SELECT * 
          FROM users us
          JOIN request rq
          ON rq.user_id = us.user_id
          WHERE status = 'Request'";
$result2 = mysqli_query($con, $query2);

if(isset($_POST['update']))
{
    $o_codes = $_POST['ocode'];
    $weights = $_POST['weight'];
    
    $count = sizeof($o_codes);
    
    for ($i = 0; $i < $count; $i++)
    {
        $query5 = "SELECT *
                  FROM order_item 
                  WHERE order_code = '$o_codes[$i]'";
        $result5 = mysqli_query($con, $query5);
        $results5 = mysqli_fetch_assoc($result5);
        
        $query6 = "SELECT *
                  FROM request 
                  WHERE order_code = '$o_codes[$i]'";
        $result6 = mysqli_query($con, $query6);
        $results6 = mysqli_fetch_assoc($result6);
        
        if(!empty($results5))
        {
            $user_id = $results5['user_id'];
            $order_item = $results5['order_item'];
            
            $query7 = "SELECT * 
                      FROM slot
                      WHERE user_id = '$user_id'";
            $result7 = mysqli_query($con, $query7);
            $results7 = mysqli_fetch_assoc($result7);
            
            if (!empty($results7))
            {
                $slot_id = $results7['slot_id'];
                
                $update0 = mysqli_query($con, "UPDATE order_item SET status = 'Received' WHERE order_code = '$o_codes[$i]'") or die(mysqli_error($con));
                
                $update1 = mysqli_query($con, "INSERT INTO item SET slot_id='$slot_id', from_order='Purchase Request', item_description='$order_item', order_code='$o_codes[$i]', weight='$weight[i]', action='In'") or die(mysqli_error($con));
            }
            else
            {
                $query9 = "SELECT *
                           FROM slot
                           WHERE status = 'Not in Use'
                           ORDER BY RAND()
                           LIMIT 1";
                $result9 = mysqli_query($con, $query9);
                $results9 = mysqli_fetch_assoc($result9);
                
                if(!empty($results9))
                {
                    $slot_id = $results9['slot_id'];
                    
                    $update0 = mysqli_query($con, "UPDATE order_item SET status = 'Received' WHERE order_code = '$o_codes[$i]'") or die(mysqli_error($con));
                    
                    $update1 = mysqli_query($con, "UPDATE slot SET status = 'In Use', user_id = '$user_id' WHERE slot_id = $slot_id ") or die(mysqli_error($con));
                    
                    $update2 = mysqli_query($con, "INSERT INTO item SET slot_id='$slot_id', from_order='Purchase Request', item_description='$order_item', order_code='$o_codes[$i]', weight='$weight[i]', action='In'") or die(mysqli_error($con));
                }
                else
                {
                ?>

                <script>
                alert('No available slots. Add more slots to update order <?php echo $o_codes[$i] ?>');
                </script>

<?php
                }
            }
        }
        
        if(!empty($results6))
        {
            $userid = $results6['user_id'];
            $order_item = $results6['order_item'];
            
            
            
            $query8 = "SELECT * 
                      FROM slot
                      WHERE user_id = '$user_id'";
            $result8 = mysqli_query($con, $query8);
            $results8 = mysqli_fetch_assoc($result8);
            
            if (!empty($results8))
            {
                $slot_id = $results8['slot_id'];
                
                $update0 = mysqli_query($con, "UPDATE request SET status = 'Received' WHERE order_code = '$o_codes[$i]'") or die(mysqli_error($con));
                
                $update1 = mysqli_query($con, "INSERT INTO item SET slot_id='$slot_id', from_order='Inventory Request', item_description='$order_item', order_code='$o_codes[$i]', weight='$weight[i]', action='In'") or die(mysqli_error($con));
            }
            if(!empty($results9))
                {
                    $slot_id = $results9['slot_id'];
                    
                    $update0 = mysqli_query($con, "UPDATE request SET status = 'Received' WHERE order_code = '$o_codes[$i]'") or die(mysqli_error($con));
                    
                    $update1 = mysqli_query($con, "UPDATE slot SET status = 'In Use', user_id = '$user_id' WHERE slot_id = $slot_id ") or die(mysqli_error($con));
                    
                    $update2 = mysqli_query($con, "INSERT INTO item SET slot_id='$slot_id', from_order='Inventory Request', item_description='$order_item', order_code='$o_codes[$i]', weight='$weight[i]', action='In'") or die(mysqli_error($con));
                }
                else
                {
                ?>

                <script>
                alert('No available slots. Add more slots to update order <?php echo $o_codes[$i] ?>');
                </script>

<?php
                }
        }
        
    }
    ?>

    <script>
    alert('Inventories updated!');
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
                <h2 class="bigh2 pagetitle hidden-xs hidden-sm">Inventory Arrival Update</h2>

                <h2 class="smh2 pagetitle hidden-md hidden-lg">Inventory Arrival Update</h2>

                <div class="row">
                    <div class="col-xs-6 col-md-6 col-lg-6 col-xs-push-6 col-md-push-3 col-lg-push-3 updatecontainer">
                        <p>
                            <input type="text" name="search" class="formfield" placeholder="Enter tracking code here" id="codeinput" required autofocus />
                            <button id="myBtn" class="hidden-xs hidden-sm hidden-md hidden-lg" onclick="selectItem()"></button>
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 updatecontainer">
                        <form action="uinventory.php" method="post">
                            
                            <?php
                                if(mysqli_num_rows($result) > 0)
                                {
                                    while($row = mysqli_fetch_array($result))
                                    {
                                        ?>

                                <input type="hidden" name="originstation" value="<?php echo $row['station_name']; ?>">

                                <?php
                                    }
                                }
                                ?>
                            
                            <table class="purchasetable">
                                <tr>
                                    <th></th>
                                    <th>Customer Name</th>
                                    <th>Item Name</th>
                                    <th>Order Code</th>
                                    <th>Slot Aisle</th>
                                    <th>Slot Number</th>
                                    <th>Weight (kg)</th>
                                </tr>
                                
                                <?php
                                if(mysqli_num_rows($result1) > 0)
                                {
                                    while($row1 = mysqli_fetch_array($result1))
                                    {
                                        ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="trackcheck" name="ocode[]" value="<?php echo $row1['order_code']?>" disabled />
                                    </td>
                                    <td><?php echo $row1['fname'] . " " . $row1['lname']; ?></td>
                                    <td><?php echo $row1['order_item']; ?></td>
                                    <td><?php echo $row1['order_code']; ?></td>
                                    
                                    <?php
                                        $user_id = $row1['user_id'];
                                        $query3 = "SELECT *
                                                   FROM slot
                                                   WHERE user_id= '$user_id' ";
                                        $result3 = mysqli_query($con, $query3);
                                        $results3 = mysqli_fetch_assoc($result3);

                                        if(!empty($results3))
                                        {
                                    ?>
                                    <td><?php echo $results3['slot_aisle']; ?></td>
                                    <td><?php echo $results3['slot_num']; ?></td>
                                    
                                    <?php
                                        }
                                        else
                                        {
                                    ?>
                                    
                                    <td colspan="2">User has no slot yet</td>
                                    
                                    <?php
                                            
                                        }
                                ?>
                                    
                                    <td>
                                        <input type="text" name="weight[]" class="tblformfield textinput" disabled />
                                    </td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
                                
                                <?php
                                if(mysqli_num_rows($result2) > 0)
                                {
                                    while($row2 = mysqli_fetch_array($result2))
                                    {
                                        ?>
                                
                                <tr>
                                    <td>
                                        <input type="checkbox" class="trackcheck" name="ocode[]" value="<?php echo $row2['order_code']?>" disabled />
                                    </td>
                                    <td><?php echo $row2['fname'] . " " . $row2['lname']; ?></td>
                                    <td><?php echo $row2['order_item']; ?></td>
                                    <td><?php echo $row2['order_code']; ?></td>
                                    
                                    <?php
                                        $user_id = $row2['user_id'];
                                        $query4 = "SELECT *
                                                   FROM slot
                                                   WHERE user_id= '$user_id' ";
                                        $result4 = mysqli_query($con, $query4);
                                        $results4 = mysqli_fetch_assoc($result4);

                                        if(!empty($results4))
                                        {
                                    ?>
                                    <td><?php echo $results4['slot_aisle']; ?></td>
                                    <td><?php echo $results4['slot_num']; ?></td>
                                    
                                    <?php
                                        }
                                        else
                                        {
                                    ?>
                                    
                                    <td colspan="2">User has not slot yet</td>
                                    
                                    <?php
                                        
                                        }
                                ?>
                                    
                                    <td>
                                        <input type="text" name="weight[]" class="tblformfield textinput" disabled />
                                    </td>
                                </tr>
                                
                                <?php
                                    }
                                }
                                ?>
                                
                                <tr>
                                    <td colspan="7">
                                        <input type="submit" class="btn btnAdd" name="update" value="Update" />
                                    </td>
                                </tr>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
        document.getElementById("codeinput").addEventListener("keyup", function(event) {
          event.preventDefault();
          if (event.keyCode === 13) {
            document.getElementById("myBtn").click();
              }
            });

        function selectItem()
        {
            var inputtext = document.getElementsByClassName("textinput");
            var checkboxes = document.getElementsByClassName("trackcheck");
            var count = checkboxes.length;

            for (var i = 0; i < count; i++)
                {
                    if (checkboxes[i].value == document.getElementById("codeinput").value)
                        {
                            inputtext[i].disabled = false;
                            inputtext[i].required = true;
                            inputtext[i].style.backgroundColor = "rgba(139, 184, 54, 0.3)";
                            checkboxes[i].disabled = false;
                            checkboxes[i].checked = true;
                        }
                }
            
            document.getElementById("codeinput").select();
        }
        </script>
    </body>
</html>