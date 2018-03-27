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

?>

<?php
if(isset($_POST['update-point']))
{    
    $pointratio = $_POST['pointratio'];
    $rate_id = $_POST['rate_id'];
	
	$result = mysqli_query($con, "UPDATE rate SET rate='$pointratio' WHERE rate_id = $rate_id ") or die(mysqli_error($con));
    ?>
    <script>
    alert('Success to Update');
    window.location.href='rate.php?success';
    </script>
    <?php
}

if(isset($_POST['update-weight']))
{    
    $weightratio = $_POST['weightratio'];
    $rate_id = $_POST['rate_id'];
	
	$result = mysqli_query($con, "UPDATE rate SET rate='$weightratio' WHERE rate_id = $rate_id ") or die(mysqli_error($con));
    ?>
    <script>
    alert('Success to Update');
    window.location.href='rate.php?success';
    </script>
    <?php
}

if(isset($_POST['update-currency']))
{    
    $currency = $_POST['currency'];
	$cname = $_POST['cname'];
	$bname = $_POST['bname'];
	$accno = $_POST['accno'];
    $country_id = $_POST['country_id'];
	
	$result = mysqli_query($con, "UPDATE country SET country_currency='$currency', country_name='$cname', bank='$bname', account_no='$accno' WHERE country_id = $country_id ") or die(mysqli_error($con));
    ?>
    <script>
    alert('Success to Update');
    window.location.href='rate.php?success';
    </script>
    <?php
}

?>

<div class="col-xs-12 col-md-12 col-lg-12">
    <h2 class="bigh2 pagetitle hidden-xs hidden-sm">Adjust Rate</h2>
    <h2 class="smh2 pagetitle hidden-md hidden-lg">Adjust Rate</h2>
    
    <div class="adreview left">
      <form action="rate.php" method="post">
                    <div class="col-xs-12 col-md-6 col-lg-6">
                        <div class="row udashrow1">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <h2>Point Ratio</h2>
                                <hr/>
                                <center>
                                    <h4>
                                        LWE points = RM <input type="number" name="pointratio" step="0.01" value="<?php echo $results['rate']; ?>" style="width: 20%;" />
                                        <br/><br/>
                                        <input type="hidden" name="rate_id" value="<?php echo $results['rate_id']; ?>"/>
                                        <input type="submit" class="btn btn-success" name="update-point" value="Save">
                                    </h4>
                                </center>
                            </div>
                        </div>
                    </div>
                </form>
    <div align="center">
    <br />

    </div>
    <br /><br />
   </div>
    </div>
			<form action="rate.php" method="post">
                    <div class="col-xs-12 col-md-6 col-lg-6">
                        <div class="row udashrow1">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <h2>Weight Ratio</h2>
                                <hr/>
                                <center>
                                    <h4>
                                        1KG = RM <input type="number" name="weightratio" step="0.01" value="<?php echo $results1['rate']; ?>" style="width: 20%;" />
                                        <br/><br/>
                                        <input type="hidden" name="rate_id" value="<?php echo $results1['rate_id']; ?>"/>
                                        <input type="submit" class="btn btn-success" name="update-weight" value="Save">
                                    </h4>
                                </center>
                            </div>
                        </div>
                    </div>
                </form>
		
		<div class="row">
                <form action="rate.php" method="post">
                    <div class="col-xs-12 col-md-6 col-lg-6">
                        <div class="row udashrow1">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <h2>Bank Details</h2>
                                <hr/>
								<center>
                                    <h4>
                                        1 RMB = RM <input type="number" name="currency" step="0.01" value="<?php echo $results2['country_currency']; ?>" style="width: 20%;" />
                                        Country Name : <input type="text" name="cname" step="0.01" value="<?php echo $results2['country_name']; ?>" style="width: 20%;" />
										Bank Name : <input type="text" name="bname" step="0.01" value="<?php echo $results2['bank']; ?>" style="width: 20%;" />
										Account Number: <input type="number" name="accno" step="0.01" value="<?php echo $results2['account_no']; ?>" style="width: 20%;" />
										<br/><br/>
                                        <input type="hidden" name="country_id" value="<?php echo $results2['country_id']; ?>"/>
                                        <input type="submit" class="btn btn-success" name="update-currency" value="Save">
                                    </h4>
                                </center>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


