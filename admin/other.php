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

if(isset($_POST['read']))
{
    $messageid = $_POST['messageid'];
    $read = "read";
    
    $update01 = mysqli_query($con, "UPDATE contact SET status='$read' WHERE m_id = '$messageid'") or die(mysqli_error($con));
    
    ?>
    <script>
    window.location.href='main.php#adother';
    </script>
    <?php
}

if(isset($_POST['update-point']))
{    
	$user_id = $_SESSION['user_id'];
    $pointratio = $_POST['pointratio'];
    $rate_id = $_POST['rate_id'];
	
	$update = mysqli_query($con, "UPDATE rate SET rate='$pointratio' WHERE rate_id = '$rate_id' ") or die(mysqli_error($con));
	$resultpoint = mysqli_query($con, "INSERT INTO log SET action='updated point rate to $pointratio', created_at=now(), user_id='$user_id'") or die(mysqli_error($con));
    ?>
    <script>
    alert('Credit rates updated');
    window.location.href='main.php#adother';
    </script>
    <?php
}

if(isset($_POST['update-weight']))
{    
	$user_id = $_SESSION['user_id'];
    $weightratio = $_POST['weightratio'];
    $rate_ids = $_POST['rate_ids'];
	
	$update = mysqli_query($con, "UPDATE rate SET rate='$weightratio' WHERE rate_id = '$rate_ids' ") or die(mysqli_error($con));
	$resultweight = mysqli_query($con, "INSERT INTO log SET action='updated weight price to $weightratio', created_at=now(), user_id='$user_id'") or die(mysqli_error($con));
    ?>
    <script>
    alert('Weight rates updated');
    window.location.href='main.php#adother';
    </script>
    <?php
}

if(isset($_POST['update-currency']))
{    
	$user_id = $_SESSION['user_id'];
    $currency = $_POST['currency'];
	
	$update = mysqli_query($con, "UPDATE country SET country_currency='$currency'") or die(mysqli_error($con));
	$resultcurrency = mysqli_query($con, "INSERT INTO log SET action='updated currency to $currency', created_at=now(), user_id='$user_id'") or die(mysqli_error($con));
   ?>
    <script>
    alert('Currency rates updated');
    window.location.href='main.php#adother';
    </script>
    <?php
}

if(isset($_POST['update-bankdetails']))
{    
	$user_id = $_SESSION['user_id'];
	$cname = $_POST['cname'];
	$bname = $_POST['bname'];
	$accno = $_POST['accno'];
    $country_id = $_POST['country_id'];
	
	$update = mysqli_query($con, "UPDATE country SET country_name='$cname', bank='$bname', account_no='$accno' WHERE country_id = $country_id ") or die(mysqli_error($con));
    $resultcurrency = mysqli_query($con, "INSERT INTO log SET action='updated bank details', created_at=now(), user_id='$user_id'") or die(mysqli_error($con));
	?>
    <script>
    alert('Bank details updated');
    window.location.href='main.php#adother';
    </script>
    <?php
}

?>

<div class="col-xs-12 col-md-12 col-lg-12">
    <h2 class="bigh2 pagetitle hidden-xs hidden-sm">Others</h2>
    <h2 class="smh2 pagetitle hidden-md hidden-lg">Others</h2>
    <form action="other.php" method="post">
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="tblATab">
                    <tr>
                        <td class="wborder"><button class="btn-link btntab" type="button" id="btnorate" onclick="funcORate()">Payment Details</button></td>
                        <td class="wborder"><button class="btn-link btntab" type="button" id="btnomessage" onclick="funcOMessage()">Messages <?php if(mysqli_num_rows($result3) > 0) {echo "(" . mysqli_num_rows($result3) . ")";} ?></button></td>
                        <td><button class="btn-link btntab" type="button" id="btnolog" onclick="funcOLog()">Acitivty Log</button></td>
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

                        <input type="hidden" name="rate_ids" value="<?php echo $results1['rate_id']; ?>"/>
                        <p><input type="submit" class="btn btnGo" name="update-weight" value="Save"></p>
                    </div>
                </div>

                <div class="col-xs-12 col-md-3 col-lg-3">
                    <div class="ratecontainer">
                        <h3 class="bigh3 hidden-xs hidden-sm">Credit Ratio</h3>
                        <h3 class="smh3 hidden-md hidden-lg">Credit Ratio</h3>

                        <p class="rateline">1 LWE points = RM <input type="number" class="ratefield" name="pointratio" step="0.01" value="<?php echo $results['rate']; ?>" /></p>

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
                                <td><p><input type="text" class="bankfield" value="<?php echo $results2['country_name']; ?>" disabled /></p></td>
                                <input type="hidden" name="cname" class="bankfield" value="<?php echo $results2['country_name']; ?>" />
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
    </form>

    <div id="omessage">
        <table class="purchasetable">
            <tr>
                <th>Subject</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Tracking Code</th>
                <th>Message</th>
                <th></th>
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
                <td class="left"><?php echo $row3['message']; ?></td>
                <td>
                    <form action="other.php" method="post">
                        <input class="btn btn-sm btnGo" type="submit" name="read" value="Mark as read">
                        <a class="btn btn-sm btnGo" type="button" target="_blank" href="message.php?email=<?php echo $row3['email']; ?>">Reply</a>
                    </form>
                </td>
            </tr>

            <?php
                    }
                }
            ?>
        </table>
    </div>
    
    <div id="olog">
        <table class="purchasetable">
            <tr>
                <th></th>
            </tr>
        </table>
    </div>
</div>