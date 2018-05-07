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
           WHERE sh.status='SHIPMENT RECEIVED' OR sh.status='In Transit'";
$result = mysqli_query($con, $query);

$query1 = "SELECT *
           FROM work_station ws
           JOIN users us
           ON ws.user_id = us.user_id
           JOIN warehouse wh
           ON wh.ware_id = ws.ware_id
           WHERE us.user_id = '$user_id'";
$result1 = mysqli_query($con, $query1);


if(isset($_POST['update']))
    {
        $t_code = $_POST['tcode'];
        $arrive = addslashes($_POST['arriveat']);
        $ostationid = $_POST['originstation'];
        
        $count = sizeof($t_code);
        
        $query2 = "SELECT * FROM warehouse WHERE ware_id = '$ostationid'";
        $result2 = mysqli_query($con, $query2);
        $results2 = mysqli_fetch_assoc($result2);
        
        $ostationname = $results2['station_name'];
        $ostationcode = $results2['station_code'];
        $ocountryname = $results2['country_name'];
        $ocountrycode = $results2['country_code'];
                
        
        for ($i = 0; $i < $count ; $i++)
        {
            $eventDesc = 'Shipment arrived at ' . $arrive[$i] . '.';
            
            $update0 = mysqli_query($con, "UPDATE shipping SET status = 'In Transit' WHERE tracking_code = $t_code[$i]") or die(mysqli_error($con));
            
            $update1 = mysqli_query($con, "INSERT INTO shipping_update_details SET HawbNo='$t_code[$i]', StationCode='$ostationcode', StationDescription='$ostationname', CountryCode='$ocountrycode', CountryDescription='$ocountryname', EventCode='DPT', EventDescription='$eventDesc', ReasonCode='IS', ReasonDescription='Is Shipping', Remark=''") or die(mysqli_error($con));
        }
?>
     
<script>
alert('Shipment updated!');
window.location.href='arrival.php';
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
        <script>
            $(document).ready(function(){
                $(".trackcheck").click(function(){
                    var inputtext1 = document.getElementsByClassName("textinput");
                    var checkboxes1 = document.getElementsByClassName("trackcheck");
                    
                    for (var a = 0; a < checkboxes1.length; a++)
                    {
                        
                        if (checkboxes1[a].checked == false)
                            {
                                checkboxes1[a].disabled = true;
                                inputtext1[a].disabled = true;
                                inputtext1[a].required = false;
                                inputtext1[a].style.background = "none";
                            }
                    }
                });
            });
        </script>

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
                <h2 class="bigh2 pagetitle hidden-xs hidden-sm">Shipments Arrival Update</h2>

                <h2 class="smh2 pagetitle hidden-md hidden-lg">Shipments Arrival Update</h2>

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
                        <form action="arrival.php" method="post">
                            
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
                                    <th>Arrival Point</th>
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
                                    <td><input type="text" name="arriveat[]" class="tblformfield textinput" disabled /></td>
                                </tr>

                                <?php
                                        }
                                    }
                                    else
                                    {
                                    ?>
                                    
                                    <tr>
                                        <td colspan="7">No shipments available.</td>
                                    </tr>
                                <?php
                                    }
                                ?>
                                
                                <tr>
                                    <td colspan="7">
                                        <input type="submit" class="btn btnAdd" name="update" value="Update" />
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