<?php
require_once '../connection/config.php';
session_start();

if ($_SESSION['user_id'] == "")
{
    header('location: ../login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

$query = "SELECT *
           FROM shipping sh
           JOIN address ad
           ON sh.address_id = ad.address_id
           WHERE sh.status='Proceed'";
$result = mysqli_query($con, $query);

$query1 = "SELECT *
           FROM work_station ws
           JOIN users us
           ON ws.user_id = us.user_id
           JOIN warehouse wh
           ON wh.ware_id = ws.ware_id
           WHERE us.user_id = '$user_id'";
$result1 = mysqli_query($con, $query1);

if(isset($_POST['register']))
    {
        $t_code = $_POST['tcode'];
        
        $ostationid = $_POST['originstation'];
    
        $count = sizeof($t_code);
        
        $query2 = "SELECT * FROM warehouse WHERE ware_id = '$ostationid'";
        $result2 = mysqli_query($con, $query2);
        $results2 = mysqli_fetch_assoc($result2);
        
        $ostationname = $results2['station_name'];
        $ostationcode = $results2['station_code'];
        $ocountryname =  $results2['country_name'];
        $ocountrycode = $results2['country_code'];
                
        $eventDesc = 'Shipment info registered at ' . $ostationname . '.';
        
        for ($i = 0; $i < $count ; $i++)
        {
            $update0 = mysqli_query($con, "UPDATE shipping SET status = 'SHIPMENT REGISTERED' WHERE tracking_code = '$t_code[$i]'") or die(mysqli_error($con));
            
            $update1 = mysqli_query($con, "INSERT INTO shipping_update_details SET HawbNo='$t_code[$i]', StationCode='$ostationcode', StationDescription='$ostationname', CountryCode='$ocountrycode', CountryDescription='$ocountryname', EventCode='RDL', EventDescription='$eventDesc', ReasonCode='IS', ReasonDescription='Is Shipping', Remark=''") or die(mysqli_error($con));
            
            $query3 = "SELECT *
            FROM warehouse wh
            JOIN shipping sh
            ON wh.station_name = sh.destination_station
            WHERE tracking_code = '$t_code[$i]'";
            $result3 = mysqli_query($con, $query3);
            $results3 = mysqli_fetch_assoc($result3);

            $recipientname = $results3['recipient_name'];
            $dstationname = $results3['destination_station'];
            $dstationcode = $results3['station_code'];
            $dcountryname = $results3['country_name'];
            $dcountrycode = $results3['country_code'];
            
            $update2 = mysqli_query($con, "INSERT INTO shipping_update_summary SET HawbNo='$t_code[$i]', ShipmentDate=NOW(), DeliveryDate='', RecipientName='$recipientname', SignedName='', OriginStationCode='$ostationcode', OriginStationDescription='$ostationname', OriginCountryCode='$ocountrycode', OriginCountryDescription='$ocountryname', DestinationStationCode='$dstationcode', DestinationStationDescription='$dstationname', DestinationCountryCode='$dcountrycode', DestinationCountryDescription='$dcountryname', EventCode='IP', EventDescription='In Proceed', ReasonCode='IS', ReasonDescription='Is Shipping', Remark=''") or die(mysqli_error($con));
            
            $query4 = "SELECT *
                    FROM item im
                    JOIN shipping sg
                    ON im.payment_id = sg.payment_id
                    WHERE tracking_code = '$t_code[$i]'";
            $result4 = mysqli_query($con, $query4);

            if (mysqli_num_rows($result4) > 0)
            {
                while ($row4 = mysqli_fetch_array($result4))
                {
                    $item_id = $row4['item_id'];
                    $slot_id = $row4['slot_id'];
                    
                    $update3 = mysqli_query($con, "UPDATE item SET action = 'Out' WHERE item_id = '$item_id'") or die(mysqli_error($con));

                    $query5 = "SELECT * FROM item WHERE slot_id = '$slot_id' AND action = 'in'";
                    $result5 = mysqli_query($con, $query5);

                    if (mysqli_num_rows($result5) == 0)
                    {
                        $update4 = mysqli_query($con, "UPDATE slot SET user_id = NULL, status = 'Not In Use' WHERE slot_id = '$slot_id'") or die(mysqli_error($con));
                    }
                }
            }
        }
        ?>
        
<script>
alert('Shipment registered!');
window.location.href='registers.php';
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
                <h2 class="bigh2 pagetitle hidden-xs hidden-sm">Shipment Registration</h2>

                <h2 class="smh2 pagetitle hidden-md hidden-lg">Shipment Registration</h2>

                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 updatecontainer">
                        <form action="registers.php" method="post">
                            <?php
                            if(mysqli_num_rows($result1) > 0)
                            {
                                while($row1 = mysqli_fetch_array($result1))
                                {
                                    ?>
                                    
                            <input type="hidden" name="originstation" value="<?php echo $row1['ware_id']; ?>">
                            
                            <?php
                                }
                            }
                            ?>
                            
                            <table class="purchasetable">
                                <tr>
                                    <th></th>
                                    <th>Tracking Code</th>
                                    <th>Recipient Name</th>
                                    <th>Recipient Contact</th>
                                    <th>Recipient Address</th>
                                    <th>Total Weight (kg)</th>
                                    <th>Parcel Tag</th>
                                </tr>

                                <?php
                                    if(mysqli_num_rows($result) > 0)
                                    {
                                        while($row = mysqli_fetch_array($result))
                                        {
                                            ?>
                                
                                        <tr class="bodyrow">
                                            <td>
                                                <input type="checkbox" name="tcode[]" value="<?php echo $row['tracking_code']?>" /></td>
                                            <td><?php echo $row['tracking_code']; ?></td>
                                            <td><?php echo $row['recipient_name'];?></td>
                                            <td><?php echo $row['recipient_contact'];?></td>
                                            <td><?php echo $row['address'].", ".$row['postcode']." ".$row['city'].", ".$row['state'].", ".$row['country'];;?></td>
                                            <td><?php echo $row['weight']?></td>
                                            <td>
                                                <a href="tag.php?s_id=<?php echo $row['shipping_id']; ?>" class="btn btn-default btn-xs btnDelete" target="_blank" title="Print"><span class="glyphicon glyphicon-print"></span></a>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    }
                                    else
                                    {
                                    ?>
                                    
                                    <tr>
                                        <td colspan="7">No shipments ready for registration.</td>
                                    </tr>
                                <?php
                                    }
                                ?>

                                <tr>
                                    <td colspan="8">
                                        <input type="submit" class="btn btnAdd" name="register" value="Register" />
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>