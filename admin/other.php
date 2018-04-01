<?php

require_once '../connection/config.php';
session_start();

$query = "SELECT * 
          FROM rate
          WHERE rate_name = 'LWE point'";
$result = mysqli_query($con, $query);
$results = mysqli_fetch_assoc($result);

$query1 = "SELECT * 
          FROM rate
          WHERE rate_name = '1kg'";
$result1 = mysqli_query($con, $query1);
$results1 = mysqli_fetch_assoc($result1);

$query2 = "SELECT * 
          FROM country";
$result2 = mysqli_query($con, $query2);
$results2 = mysqli_fetch_assoc($result2);

$query3 = "SELECT *
          FROM contact";
$result3 = mysqli_query($con, $query3);

if(isset($_POST['update-point']))
{    
    $pointratio = $_POST['pointratio'];
    $rate_id = $_POST['rate_id'];
	
	$update = mysqli_query($con, "UPDATE rate SET rate='$pointratio' WHERE rate_id = $rate_id ") or die(mysqli_error($con));
    ?>
    <script>
    alert('Credit rates updated');
    window.location.href='rate.php?success';
    </script>
    <?php
}

if(isset($_POST['update-weight']))
{    
    $weightratio = $_POST['weightratio'];
    $rate_id = $_POST['rate_id'];
	
	$update = mysqli_query($con, "UPDATE rate SET rate='$weightratio' WHERE rate_id = $rate_id ") or die(mysqli_error($con));
    ?>
    <script>
    alert('Weight rates updated');
    window.location.href='rate.php?success';
    </script>
    <?php
}

if(isset($_POST['update-currency']))
{    
    $currency = $_POST['currency'];
	
	$update = mysqli_query($con, "UPDATE country SET country_currency='$currency'") or die(mysqli_error($con));
    ?>
    <script>
    alert('Currency rates updated');
    window.location.href='rate.php?success';
    </script>
    <?php
}

if(isset($_POST['update-bankdetails']))
{    
	$cname = $_POST['cname'];
	$bname = $_POST['bname'];
	$accno = $_POST['accno'];
    $country_id = $_POST['country_id'];
	
	$update = mysqli_query($con, "UPDATE country SET country_name='$cname', bank='$bname', account_no='$accno' WHERE country_id = $country_id ") or die(mysqli_error($con));
    ?>
    <script>
    alert('Bank details updated');
    window.location.href='rate.php?success';
    </script>
    <?php
}

?>

<div class="col-xs-12 col-md-12 col-lg-12">
    <h2 class="bigh2 pagetitle hidden-xs hidden-sm">Others</h2>
    <h2 class="smh2 pagetitle hidden-md hidden-lg">Others</h2>
    
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <table class="tblITab">
                <tr>
                    <td class="wborder"><button class="btn-link btntab" id="btnorate" onclick="funcORate()">Payment Details</button></td>
                    <td><button class="btn-link btntab" id="btnomessage" onclick="funcOMessage()">Messages</button></td>
                </tr>
            </table>
        </div>
    </div>
    
    <div id="orate">
        <div class="row rateoutcontainer">
            <div class="col-xs-12 col-md-3 col-lg-3">
                <div class="ratecontainer">
                    <h3 class="bigh3 hidden-xs hidden-sm">Currency Ratio</h3>
                    <h3 class="smh3 hidden-md hidden-lg">Currency Ratio</h3>

                    <p class="rateline">1 RMB = RM <input type="number" class="ratefield" name="currency" step="0.01" value="<?php echo $results2['country_currency']; ?>" /></p>

                    <input type="hidden" name="rate_id" value="<?php echo $results['rate_id']; ?>"/>
                    <p><input type="submit" class="btn btnGo" name="update-currency" value="Save"></p>
                </div>
            </div>

            <div class="col-xs-12 col-md-3 col-lg-3">
                <div class="ratecontainer">
                    <h3 class="bigh3 hidden-xs hidden-sm">Weight Ratio</h3>
                    <h3 class="smh3 hidden-md hidden-lg">Weight Ratio</h3>

                    <p class="rateline">1KG = RM <input type="number" class="ratefield" name="weightratio" step="0.01" value="<?php echo $results1['rate']; ?>" /></p>

                    <input type="hidden" name="rate_id" value="<?php echo $results['rate_id']; ?>"/>
                    <p><input type="submit" class="btn btnGo" name="update-weight" value="Save"></p>
                </div>
            </div>

            <div class="col-xs-12 col-md-3 col-lg-3">
                <div class="ratecontainer">
                    <h3 class="bigh3 hidden-xs hidden-sm">Credit Ratio</h3>
                    <h3 class="smh3 hidden-md hidden-lg">Credit Ratio</h3>

                    <p class="rateline">LWE points = RM <input type="number" class="ratefield" name="pointratio" step="0.01" value="<?php echo $results['rate']; ?>" /></p>

                    <input type="hidden" name="rate_id" value="<?php echo $results['rate_id']; ?>"/>
                    <p><input type="submit" class="btn btnGo" name="update-point" value="Save"></p>
                </div>
            </div>

            <div class="col-xs-12 col-md-3 col-lg-3">
                <div class="ratecontainer">
                    <h3 class="bigh3 hidden-xs hidden-sm">Bank Details</h3>
                    <h3 class="smh3 hidden-md hidden-lg">Bank Details</h3>

                    <table class="banktable">
                        <tr>
                            <td class="left"><p>Country Name:</p></td>
                            <td><p><input type="text" name="cname" class="bankfield" step="0.01" value="<?php echo $results2['country_name']; ?>" /></p></td>
                        </tr>

                        <tr>
                            <td class="left"><p>Bank Name : </p></td>
                            <td><p><input type="text" name="bname" class="bankfield" step="0.01" value="<?php echo $results2['bank']; ?>" /></p></td>
                        </tr>

                        <tr>
                            <td class="left"><p>Account Number: </p></td>
                            <td><p><input type="number" name="accno" class="bankfield" step="0.01" value="<?php echo $results2['account_no']; ?>" /></p></td>
                        </tr>                    
                    </table>


                    <input type="hidden" name="country_id" value="<?php echo $results2['country_id']; ?>"/>

                    <p><input type="submit" class="btn btnGo" name="update-bankdetails" value="Save"></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="omessage">
    <table class="purchasetable">
        <tr>
            <th>Subject</th>
            <th>Name</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Tracking Code</th>
            <th>Message</th>
        </tr>
        
        <?php
            if (mysqli_num_rows($result3) > 0)
            {
                while ($row3 = mysqli_fetch_array($result3))
                {
                ?>
        
        <tr class="bodyrow">
            <td><?php echo $row3['subject']; ?></td>
            <td><?php echo $row3['name']; ?></td>
            <td><?php echo $row3['contact']; ?></td>
            <td><?php echo $row3['email']; ?></td>
            <td><?php echo $row3['trackcode']; ?></td>
            <td><?php echo $row3['message']; ?></td>
        </tr>
        
        <?php
                }
            }
        ?>
    </table>
</div>