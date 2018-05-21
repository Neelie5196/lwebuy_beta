<?php

require_once '../connection/config.php';
session_start();

if ($_SESSION['user_id'] == "")
{
    header('location: ../login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$item = $_POST['item'];
$totalweight = $_POST['totalweight'];

$query = "SELECT * FROM address WHERE user_id = '$user_id'";
$result = mysqli_query($con, $query);

$query3 = "SELECT *
           FROM item
           WHERE item_id IN (".implode(',',$item).")";
$result3 = mysqli_query($con, $query3);

$query4 = "SELECT *
          FROM rate
          WHERE rate_name = '1kg'";
$result4 = mysqli_query($con, $query4);
$results4 = mysqli_fetch_assoc($result4);

$query01 = "SELECT * FROM recipient_names WHERE user_id = '$user_id'";
$result01 = mysqli_query($con, $query01);

$query02 = "SELECT * FROM recipient_contact WHERE user_id = '$user_id'";
$result02 = mysqli_query($con, $query02);

$query03 = "SELECT * FROM state";
$result03 = mysqli_query($con, $query03);
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
    </head>

    <body class="userbg" ng-app="">
        <div class="row updaterow1">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <p>
                    <a href="main.php#ship" class="aback">&lt;&emsp;Back to main page</a>
                </p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12 center">
                <h2 class="bigh2 pagetitle hidden-xs hidden-sm">Shipping Details</h2>
                
                <h2 class="smh2 pagetitle hidden-md hidden-lg">Shipping Details</h2>
            </div>
        </div>
        
        <div class="row">
            <form action="payments.php" method="post">
                <div class="col-xs-5 col-md-4 col-lg-4 col-xs-push-1 col-md-push-2 col-lg-push-2 shipformcontainer">
                    <p>
                        <label>Recipient Name: </label><br/>
                        <select class="formselect" class="formselects" name="recipientname" id="recipientname" onchange="checkrecipname()" required>
                            <option  class="formoptions" id="recipientname" selected>New</option>
                            
                            <?php
                            
                            if(mysqli_num_rows($result01) > 0)
                                {
                                    while($row01 = mysqli_fetch_array($result01))
                                    {
                                        ?>
                            
                            <option class="formoptions" value="<?php echo $row01['recipient_name'];?>"><?php echo $row01['recipient_name'];?></option>
                            
                            <?php
                                    }
                            }
                            
                            ?>
                        </select>
                    </p>
                    
                    <p><input class="formfield" type="text" name="newrecipientname" id="newrecipientname" required /></p>
                    <p><input type="checkbox" name="savenewrecipname" id="saverecipname" value="save" /> <label for="saverecipname" id="namechecklbl">Remember this name</label></p>

                    <p>
                        <label>Recipient Contact: </label><br/>
                        <select class="formselects" name="recipientcontact" id="recipientcontact" onchange="checkrecipcontact()" required>
                            <option class="formoptions" id="recipientcontact" selected>New</option>
                            
                            <?php
                            
                            if(mysqli_num_rows($result02) > 0)
                                {
                                    while($row02 = mysqli_fetch_array($result02))
                                    {
                                        ?>
                            
                            <option class="formoptions" value="<?php echo $row02['recipient_contact'];?>"><?php echo $row02['recipient_contact'];?></option>
                            
                            <?php
                                    }
                            }
                            
                            ?>
                        </select>
                    </p>
                    
                    <p><input class="formfield" name="newcontact" id="newcontact" type="text" required /></p>
                    <p><input type="checkbox" name="savecontact" id="savecontact" value="save" /> <label for="savecontact" id="contactchecklbl">Remember this contact</label></p>

                    <p>
                        <label>Address:</label><br/>
                        <select class="formselects" name="address" onchange="checkaddress()" id="selectedaddress" required>
                            <option class="formoptions" selected>New</option>
                            <?php 
                                if(mysqli_num_rows($result) > 0)
                                {
                                    while($row = mysqli_fetch_array($result))
                                    {
                                        ?>
                                            <option class="formoption" value="<?php echo $row['address_id']; ?>">
                                                <?php echo $row['address'].", ".$row['postcode'].", ".$row['city'].", ".$row['state']; ?>
                                            </option>
                                        <?php
                                    }
                                }
                            ?>
                        </select>
                    </p>
                    
                    <p><input class="formfield" name="newaddress" id="newaddress" type="text" placeholder="Address" required /></p>

                    <p><input class="formfield" name="postcode" id="postcode" type="text" placeholder="Postcode" required /></p>

                    <p><input class="formfield" name="city" id="city" type="text" placeholder="City" required /></p>
                
                    <p>
                        <select required name="state" id="state" class="formfield">
                            <option class="formoption">Select a state</option>
                            <?php 
                                if(mysqli_num_rows($result03) > 0)
                                {
                                    while($row03 = mysqli_fetch_array($result03))
                                    {
                                        ?>
                                            <option class="formselect" value="<?php echo $row03['state_name']; ?>">
                                                <?php echo $row03['state_name']; ?>
                                            </option>
                                        <?php
                                    }
                                }
                            ?>
                        </select>
                    </p>

                    <p><input class="formfield" name="country" id="country" type="text" value="Malaysia" readonly /></p>

                    <p>
                        <label>Remarks: </label><br/>
                        <input class="formfield" name="remark" type="text" />
                    </p>
                    
                    <p><input type="submit" class="btn btnAdd" name="pay" value="Pay Now" onclick="return val();"></p>
                </div>


                <div class="col-xs-5 col-md-4 col-lg-4 col-xs-push-1 col-md-push-4 col-lg-push-2 pdetailscontainer">
                    <h3>Selected Items</h3>

                    <?php
                        if(mysqli_num_rows($result3) > 0)
                        {
                    ?>

                    <table class="itemstable center">
                        <tr class="ptoprow">
                            <td>Name</td>
                            <td>Order Code</td>
                            <td>Received On</td>
                            <td>Weight (kg)</td>
                        </tr>

                        <?php
                            while($row = mysqli_fetch_array($result3))
                            {
                        ?>

                        <tr>
                            <input type="hidden" value="<?php echo $row['item_id']; ?>" name="item[]">
                            <td><p><?php echo $row['item_description']; ?></p></td>
                            <td><p><?php echo $row['order_code']; ?></p></td>
                            <td><?php echo $row['datetime']; ?></td>
                            <td><p><?php echo $row['weight']; ?></p></td>
                        </tr>

                        <?php
                            }
                        ?>

                        <tr>
                            <td colspan="3" class="left"><p>Total weight (kg)</p></td>
                            <td class="coltotal">
                                <p>
                                    <input type="hidden" id="totalweight" name="totalweight" class="form-control" value="<?php echo number_format((float)$totalweight, 2, '.', ''); ?>">
                                    <?php echo number_format((float)$totalweight, 2, '.', ''); ?>
                                </p>
                            </td>
                        </tr>


                        <tr>
                            <td colspan="3" class="left"><p>Total Price (MYR)</p></td>
                            <td class="">
                                <p>
                                    <?php
                                        $totalprice = $results4['rate'] * $totalweight;
                                    ?>

                                    <input type="hidden" name="pricetotal" class="form-control" value="<?php echo $totalprice; ?>">

                                    <?php
                                            echo $totalprice;
                                    ?>
                                </p>
                            </td>
                        </tr>
                    </table>
                    
                    <?php
                        }
                    ?>
                </div>
            </form>
        </div>
    </body>
    
    <script>
        function checkrecipname()
        {
            var selectedrecipname = document.getElementById("recipientname").value;
            var newnameinput = document.getElementById("newrecipientname");
            var savenamecheck = document.getElementById("saverecipname");
            var namechklbl = document.getElementById("namechecklbl");
            
            if(selectedrecipname == "New")
                {
                    newnameinput.style.display = "block";
                    newnameinput.disabled = false;
                    newnameinput.required = true;
                    newnameinput.style.borderBottom = "solid 0.5px #2f9142";
                    
                    savenamecheck.disabled = false;
                    savenamecheck.style.display = "block";
                    namechklbl.style.display = "block";
                }
            else
                {
                    newnameinput.style.display = "none";
                    newnameinput.disabled = true;
                    newnameinput.required = false;
                    newnameinput.style.border = "none";
                    
                    savenamecheck.disabled = true;
                    savenamecheck.style.display = "none";
                    namechklbl.style.display = "none";
                }
        }

        function checkrecipcontact()
        {
            var selectedcontact = document.getElementById("recipientcontact").value;
            var newcontactinput = document.getElementById("newcontact");
            var savecontactcheck = document.getElementById("savecontact");
            var contactchklbl = document.getElementById("contactchecklbl");
            
            if(selectedcontact == "New")
                {
                    newcontactinput.style.display = "block";
                    newcontactinput.disabled = false;
                    newcontactinput.required = true;
                    newcontactinput.style.borderBottom = "solid 0.5px #2f9142";
                    
                    savecontactcheck.disabled = false;
                    savecontactcheck.style.display = "block";
                    contactchklbl.style.display = "block";
                }
            else
                {
                    newcontactinput.style.display = "none";
                    newcontactinput.disabled = true;
                    newcontactinput.required = false;
                    newcontactinput.style.border = "none";
                    
                    savecontactcheck.disabled = true;
                    savecontactcheck.style.display = "none";
                    contactchklbl.style.display = "none";
                }
        }
        
        function checkaddress()
        {
            var selectedadd = document.getElementById("selectedaddress").value;
            var newadd = document.getElementById("newaddress");
            var postcode = document.getElementById("postcode");
            var city = document.getElementById("city");
            var state = document.getElementById("state");
            var country = document.getElementById("country");
            
            if(selectedadd == "New")
                {
                    newadd.style.display = "block";
                    newadd.disabled = false;
                    newadd.required = true;
                    newadd.style.borderBottom = "solid 0.5px #2f9142";
                    
                    postcode.style.display = "block";
                    postcode.disabled = false;
                    postcode.required = true;
                    postcode.style.borderBottom = "solid 0.5px #2f9142";
                    
                    city.style.display = "block";
                    city.disabled = false;
                    city.required = true;
                    city.style.borderBottom = "solid 0.5px #2f9142";
                    
                    state.style.display = "block";
                    state.disabled = false;
                    state.required = true;
                    
                    country.style.display = "block";
                    country.disabled = false;
                    country.style.borderBottom = "solid 0.5px #2f9142";
                }
            else
                {
                    newadd.style.display = "none";
                    newadd.disabled = true;
                    newadd.required = false;
                    newadd.style.border = "none";
                    
                    postcode.style.display = "none";
                    postcode.disabled = true;
                    postcode.required = false;
                    postcode.style.border = "none";
                    
                    city.style.display = "none";
                    city.disabled = true;
                    city.required = false;
                    city.style.border = "none";
                    
                    state.style.display = "none";
                    state.disabled = true;
                    state.required = false;
                    
                    country.style.display = "none";
                    country.disabled = true;
                    country.style.border = "none";
                }
        }
    </script>
</html>