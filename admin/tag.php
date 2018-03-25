<?php
require_once '../connection/config.php';
session_start();
$s_id = $_GET['s_id'];

$query = "SELECT *
          FROM shipping sh
          JOIN users us
          ON us.user_id = sh.user_id
          JOIN address ad
          on ad.a_id = sh.a_id
          WHERE s_id='$s_id'";
$result = mysqli_query($con, $query);
$results = mysqli_fetch_assoc($result);

?>

<html>
    <head>
        <title>LWE Buy</title>
        
        <script src="../frameworks/js/prototype.js" type="text/javascript"></script>
        <script src="../frameworks/js/prototype-barcode.js" type="text/javascript"></script>
    
        <link href="../frameworks/css/style.css" rel="stylesheet"/>
    </head>
    
    <body class="homepagebg" onload="generateBarcode()">
        <div id="parceltag">
            <div class="parceltag">
                <h1>
                    <img src="../resources/img/logo-black.png" alt="blacklogo"/>
                    Logistics Worldwide Express
                </h1>
                <hr/>
                
                <p>Weight(KG): <?php echo $results['weight'] ?></p>
                <script type="text/javascript">
                    function printDiv(parceltag)
                    {
                        var printContents = document.getElementById(parceltag).innerHTML;
                        var originalContents = document.body.innerHTML;

                        document.body.innerHTML = printContents;

                        window.print();

                        document.body.innerHTML = originalContents;
                    }
                </script>
                
                <div id="barcode" class="barcode">
                    <!-- will do later -->
                </div>
                
                <table>
                    <tr>
                        <td><h3>Ship to:</h3></td>
                        <td><h3>Recipient contact:</h3></td>
                    </tr>
                    
                    <tr>
                        <td><p><?php echo $results['recipient_name']; ?></p></td>
                        <td><p><?php echo $results['recipient_contact']; ?></p></td>
                    </tr>
                </table>
                
                <h3>Address</h3>
                
                <p><?php echo $results['address'] . ", " . $results['postcode'] . " " . $results['city'] . ", " . $results['state'] . ", " . $results['country']; ?></p>
                

            </div>
        </div>
        
        <p>
            <button onclick="printDiv('parceltag')">Print</button>
            <a href="shippinglist.php"><button>Back</button></a>
            <a href="updateshipping.php?tracking_code=<?php echo $results['tracking_code']; ?>"><button>Update</button></a>
        </p>
    </body>
</html>