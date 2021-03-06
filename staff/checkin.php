<?php
require_once '../connection/config.php';
session_start();

$user_id = $_SESSION['user_id'];

$query = "SELECT *
           FROM shipping sh
           JOIN address ad
           ON sh.address_id = ad.address_id
           WHERE sh.status='SHIPMENT REGISTERED'";
$result = mysqli_query($con, $query);

$query1 = "SELECT *
           FROM work_station ws
           JOIN users us
           ON ws.user_id = us.user_id
           JOIN warehouse wh
           ON wh.ware_id = ws.ware_id
           WHERE us.user_id = '$user_id'";
$result1 = mysqli_query($con, $query1);


if(isset($_POST['checkin']))
    {
        $t_code = $_POST['tcode'];
        
        $ostationid = $_POST['originstation'];
        
        $query2 = "SELECT * FROM warehouse WHERE ware_id = '$ostationid'";
        $result2 = mysqli_query($con, $query2);
        $results2 = mysqli_fetch_assoc($result2);
        
        $ostationname = $results2['station_name'];
        $ostationcode = $results2['station_code'];
        $ocountryname =  $results2['country_name'];
        $ocountrycode = $results2['country_code'];
                
        $eventDesc = 'Pickup shipment checked in at ' . $ostationname . '.';
        
        foreach ($t_code as $t)
        {
            $update0 = mysqli_query($con, "UPDATE shipping SET status = 'SHIPMENT RECEIVED' WHERE tracking_code = $t") or die(mysqli_error($con));
            
            $update1 = mysqli_query($con, "INSERT INTO shipping_update_details SET HawbNo='$t', StationCode='$ostationcode', StationDescription='$ostationname', CountryCode='$ocountrycode', CountryDescription='$ocountryname', EventCode='PKI', EventDescription='$eventDesc', ReasonCode='IS', ReasonDescription='Is Shipping', Remark=''") or die(mysqli_error($con));
        }
?>
      
<script>
alert('Shipment checked in!');
window.location.href='checkin.php';
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
                <h2 class="bigh2 pagetitle hidden-xs hidden-sm">Shipments Check In</h2>

                <h2 class="smh2 pagetitle hidden-md hidden-lg">Shipments Check In</h2>

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
                        <form action="checkin.php" method="post">
                            
                            <?php
                            if(mysqli_num_rows($result1) > 0)
                            {
                                while($row1 = mysqli_fetch_array($result1))
                                {
                                    ?>
                                    
                            <input type="hidden" name="originstation" value="<?php echo $row1['station_name']; ?>">
                            
                            <?php
                                }
                            }
                            ?>
                            
                            <table class="purchasetable" id="checkintable">
                                <tr>
                                    <th></th>
                                    <th>Tracking Code</th>
                                    <th>Recipient Name</th>
                                    <th>Recipient Contact</th>
                                    <th>Recipient Address</th>
                                    <th>Total Weight (kg)</th>
                                    <th>Destination Station</th>
                                </tr>
                                
                                <?php
                                    if(mysqli_num_rows($result) > 0)
                                    {
                                        while($row = mysqli_fetch_array($result))
                                        {
                                            ?>
                                
                                        <tr class="bodyrow">
                                            <td>
                                                <input type="checkbox" class="trackcheck" name="tcode[]" value="<?php echo $row['tracking_code']?>" disabled />
                                            </td>
                                            <td><?php echo $row['tracking_code']; ?></td>
                                            <td><?php echo $row['recipient_name'];?></td>
                                            <td><?php echo $row['recipient_contact'];?></td>
                                            <td><?php echo $row['address'].", ".$row['postcode']." ".$row['city'].", ".$row['state'].", ".$row['country'];;?></td>
                                            <td><?php echo $row['weight']?></td>
                                            <td><?php echo $row['destination_station']?></td>
                                        </tr>
                                    <?php
                                        }
                                    }
                                    else
                                    {
                                    ?>
                                    
                                    <tr>
                                        <td colspan="7">No shipments ready for check in.</td>
                                    </tr>
                                <?php
                                    }
                                ?>
                        
                                <tr>
                                    <td colspan="7">
                                        <input type="submit" class="btn btnAdd" name="checkin" value="Check In" />
                                    </td>
                                </tr>
                            </table>
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
            var checkboxes = document.getElementsByClassName("trackcheck");
            var count = checkboxes.length;

            for (var i = 0; i < count; i++)
                {
                    if (checkboxes[i].value == document.getElementById("codeinput").value)
                        {
                            checkboxes[i].disabled = false;
                            checkboxes[i].checked = true;
                        }
                }
            
            document.getElementById("codeinput").select();
        }
        </script> 
    </body>
</html>