<?php
require_once '../connection/config.php';
session_start();
$user_id = $_SESSION['user_id'];

$query1 = "SELECT * FROM state";
$result1 = mysqli_query($con, $query1);

if(isset($_POST['addAddress']))
{    
    $address = $_POST['address'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $postcode = $_POST['postcode'];
    
    $result2 = mysqli_query($con, "INSERT INTO address SET user_id = '$user_id', address='$address', state='$state', city='$city', country='$country', postcode='$postcode'") or die(mysqli_error($con));
    
    ?>
    <script>
    window.opener.location.reload(true); window.close();
    </script>
    <?php
}

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

        <!--stylesheet-->
        <link href="../frameworks/css/style.css" rel="stylesheet"/>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
        
    </head>

    <body class="linearbg">
        <div class="row contact">
            <div class="col-xs-12 col-md-8 col-lg-8 col-md-push-2 col-lg-push-2">
                <h1 class="bigh1 center hidden-xs hidden-sm">Add New Address</h1>
                <h1 class="smh1 center hidden-md hidden-lg">Add New Address</h1>
                
                <form action="addAddress.php" method="post">
                    <p><input class="formfield" name="address" type="text" placeholder="Address" required /></p>

                    <p><input class="formfield" name="postcode" type="text" placeholder="Postcode" required /></p>

                    <p><input class="formfield" name="city" type="text" placeholder="City" required /></p>
                
                    <p>
                        <select required name="state" class="formfield">
                            <option class="formoption">Select a state</option>
                            <?php 
                                if(mysqli_num_rows($result1) > 0)
                                {
                                    while($row = mysqli_fetch_array($result1))
                                    {
                                        ?>
                                            <option class="formselect" value="<?php echo $row['state_name']; ?>">
                                                <?php echo $row['state_name']; ?>
                                            </option>
                                        <?php
                                    }
                                }
                            ?>
                        </select>
                    </p>

                    <p><input class="formfield" name="country" type="text" value="Malaysia" readonly /></p>
                    
                    <p><input type="submit" class="btn btnAdd" name="addAddress" value="Save" /></p>
                </form>
            </div>
        </div>
    </body>
</html>