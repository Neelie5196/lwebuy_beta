<?php

require_once '../connection/config.php';
session_start();

if ($_SESSION['user_id'] == "")
{
    header('location: ../login.php');
    exit();
}

$hawb = $_POST['hawb'];

$query4 = "SELECT * 
          FROM shipping_update_summary
          WHERE HawbNo = '$hawb'";
$result4 = mysqli_query($con, $query4);
$results4 = mysqli_fetch_assoc($result4);

$query5 = "SELECT * 
           FROM shipping_update_details
           WHERE HawbNo = '$hawb'";
$result5 = mysqli_query($con, $query5);

?>

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
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
        
        <script src="../frameworks/js/lwe.js"></script>
    </head>

    <body class="userbg">
        <div class="row updaterow1">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <p>
                    <a href="main.php#track" class="aback">&lt;&emsp;Track other items</a>
                </p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-xs-12 col-md-6 col-lg-6 col-md-push-3 col-lg-push-3 track">
                <h4 class="bigtrackh2">Tracking No: <?php echo $hawb ?></h4>
                
                <?php
                    if($results4 > 0){
                        ?>

                <p>Status: <?php echo $results4['ReasonDescription']; ?></p>
                
                <p>Customer Ref: <?php echo $results4['XR1']; ?></p>
                                
                <p>Carrier No: <?php echo $results4['HawbNo']; ?></p>

                <p>Send Date: <?php echo $results4['ShipmentDate']; ?></p>

                <p>Delivered Date: <?php echo $results4['DeliveryDate']; ?></p>
                    
                <p><button class="btn btnAdd" type="button" data-toggle="collapse" data-target="#collapse">More Shipping Details</button></p>
                    <?php
                        }else{
                        
                        echo '<p class="center">Tracking Summary Not found</p>';
                    }
                ?>

                <div class="collapse" id="collapse">
                    <?php 
                    if(mysqli_num_rows($result5) > 0)
                    {
                    ?>
                    <table class="purchasetable tracktable">
                        <tr>
                            <th>Date</th>
                            <th>Location</th>
                            <th>Description</th>
                            <th>Remarks</th>
                        </tr>
                    <?php
                        while($row = mysqli_fetch_array($result5))
                        {
                            ?>
                        <tr>
                            <td><?php echo $row['TransactionDate']; ?></td>
                            <td><?php echo $row['StationDescription']; ?></td>
                            <td><?php echo $row['EventDescription']; ?></td>
                            <td><?php echo $row['Remark']; ?></td>
                        </tr>
                            <?php
                            }
                        }else{
                        ?>
                            <p>Error.</p>
                        <?php
                        }
                    ?>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>