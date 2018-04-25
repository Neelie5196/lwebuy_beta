<?php
require_once '../connection/config.php';
session_start();

if ($_SESSION['user_id'] == "")
{
    header('location: ../login.php');
    exit();
}

$s_id = $_GET['s_id'];

$query = "SELECT *
         FROM shipping sh
         JOIN address ad
         ON sh.address_id = ad.address_id
         WHERE sh.status='Proceed'";
$result = mysqli_query($con, $query);
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
            <?php
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_array($result))
                {
                    ?>
            <div class="parceltag">
                <h1>
                    <img src="../resources/img/logo-black.png" alt="blacklogo"/>
                    Logistics Worldwide Express
                </h1>
                <hr/>
                    
                <p>Weight(KG): <?php echo $row['weight'] ?></p>
                <script type="text/javascript">
                    function printDiv(parceltag)
                    {
                        var printContents = document.getElementById(parceltag).innerHTML;
                        var originalContents = document.body.innerHTML;

                        document.body.innerHTML = printContents;

                        window.print();

                        document.body.innerHTML = originalContents;
                    }

                    function generateBarcode()
                    {
                        $("barcode").update();
                        var value = '<?php echo $row['tracking_code']; ?>';
                        var btype = 'code128';
                        var renderer ='css';

                        var settings = 
                        {
                          output:renderer,
                          bgColor: '#FFFFFF',
                          color: '#000000',
                          barWidth: 2,
                          barHeight: 100,
                          addQuietZone: false
                        };

                        $("barcode").update().show().barcode(value, btype, settings);      
                    }

                    $(function()
                      {
                        generateBarcode();
                        }
                     );
                </script>
                
                <div id="barcode" class="barcode">

                </div>
                
                <table class="tbltag">
                    <tr>
                        <td><h3>Ship to:</h3></td>
                        <td><h3>Recipient contact:</h3></td>
                    </tr>
                    
                    <tr>
                        <td><p><?php echo $row['recipient_name']; ?></p></td>
                        <td><p><?php echo $row['recipient_contact']; ?></p></td>
                    </tr>
                </table>
                
                <h3>Address</h3>
                
                <p><?php echo $row['address'] . ", " . $row['postcode'] . " " . $row['city'] . ", " . $row['state'] . ", " . $row['country']; ?></p>
                

            </div>
            
            <?php
                }
            }
            ?>
        </div>
        
        <p>
            <button onclick="printDiv('parceltag')">Print</button>
            <button onclick="window.close()">Close</button>
        </p>
    </body>
</html>