<?php
require_once '../connection/config.php';
session_start();

if ($_SESSION['user_id'] == "")
{
    header('location: ../login.php');
    exit();
}

$query = "SELECT * FROM address ad JOIN shipping sh ON ad.address_id = sh.address_id JOIN users us ON sh.user_id = us.user_id ORDER BY status ASC";
$result = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>LWE Buy</title>

        <meta name="viewport" content="width=device-width, initialscale=1.0" />

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
                <h2 class="bigh2 pagetitle hidden-xs hidden-sm">All Shipments</h2>

                <h2 class="smh2 pagetitle hidden-md hidden-lg">All Shipments</h2>

                <div class="row">
                    <div class="col-xs-5 col-md-5 col-lg-5 col-xs-push-2 col-md-push-2 col-lg-push-2 updatecontainer">
                        <p>
                            <input type="text" name="search" class="formfield" placeholder="Enter keyword to search" id="keyword" onkeyup="filtertable()" autofocus />
                        </p>
                    </div>
                    
                    <div class="col-xs-3 col-md-3 col-lg-3 col-xs-push-2 col-md-push-2 col-lg-push-2 updatecontainer">
                        <p>
                            Search by: 
                            <select class="formselect" id="filterby">
                                <option>Tracking code</option>
                                <option>Username</option>
                                <option>Recipient name</option>
                                <option>Recipient contact</option>
                                <option>Recipient address</option>
                                <option>Status</option>
                            </select>
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 updatecontainer">
                            
                        <table class="purchasetable" id="checkintable">
                            <tr>
                                <th>Tracking Code</th>
                                <th>Username</th>
                                <th>Recipient Name</th>
                                <th>Recipient Contact</th>
                                <th>Recipient Address</th>
                                <th>Total Weight (kg)</th>
                                <th>Price (MYR)</th>
                                <th>Status</th>
                                <th>View Details</th>
                            </tr>

                            <?php
                                if(mysqli_num_rows($result) > 0)
                                {
                                    while($row = mysqli_fetch_array($result))
                                    {
                                        ?>

                                    <tr class="bodyrow">
                                        <td class="trackingcode"><?php echo $row['tracking_code']; ?></td>
                                        <td class="username"><?php echo $row['fname'] . " " . $row['lname']; ?></td>
                                        <td class="recipientname"><?php echo $row['recipient_name']; ?></td>
                                        <td class="recipientcontact"><?php echo $row['recipient_contact']; ?></td>
                                        <td class="address"><?php echo $row['address'] . ", " . $row['postcode']. " " . $row['city'] . ", " . $row['state'] . ", " . $row['country']; ?></td>
                                        <td class="weight"><?php echo $row['weight']; ?></td>
                                        <td class="price"><?php echo $row['price']; ?></td>
                                        <td class="status"><?php echo $row['status']; ?></td>
                                        <td><a href="../user/viewtrackings.php?tracking_code=<?php echo $row['tracking_code']; ?>" target="_blank"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                                    </tr>
                                <?php
                                    }
                                }
                                else
                                {
                                ?>

                                <tr>
                                    <td colspan="7">No shipments record.</td>
                                </tr>
                            <?php
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
            function filtertable()
            {
                var keyword = document.getElementById("keyword").value.toLowerCase();
                var filterby = document.getElementById("filterby").value;
                
                var rows = document.getElementsByClassName("bodyrow");
                var trackcodes = document.getElementsByClassName("trackingcode");
                var usernames = document.getElementsByClassName("username");
                var recipnames = document.getElementsByClassName("recipientname");
                var recipcontacts = document.getElementsByClassName("recipientcontact");
                var addresses = document.getElementsByClassName("address");
                var statuses = document.getElementsByClassName("status");
                
                for (var a = 0; a < rows.length; a++)
                    {
                        rows[a].style.display = "none";
                    }
                
                if(filterby == "Tracking code")
                    {
                        for(var b = 0; b < rows.length; b++)
                            {
                                var searchtarget = trackcodes[b].innerHTML.toLowerCase();
                                
                                if(searchtarget.includes(keyword))
                                    {
                                        rows[b].style.display = "table-row";
                                    }
                            }
                    }
                else if(filterby == "Username")
                    {
                        for(var b = 0; b < rows.length; b++)
                            {
                                var searchtarget = usernames[b].innerHTML.toLowerCase();
                                
                                if(searchtarget.includes(keyword))
                                    {
                                        rows[b].style.display = "table-row";
                                    }
                            }
                    }
                else if(filterby == "Recipient name")
                    {
                        for(var b = 0; b < rows.length; b++)
                            {
                                var searchtarget = recipnames[b].innerHTML.toLowerCase();
                                
                                if(searchtarget.includes(keyword))
                                    {
                                        rows[b].style.display = "table-row";
                                    }
                            }
                    }
                else if(filterby == "Recipient contact")
                    {
                        for(var b = 0; b < rows.length; b++)
                            {
                                var searchtarget = recipcontacts[b].innerHTML.toLowerCase();
                                
                                if(searchtarget.includes(keyword))
                                    {
                                        rows[b].style.display = "table-row";
                                    }
                            }
                    }
                else if(filterby == "Recipient address")
                    {
                        for(var b = 0; b < rows.length; b++)
                            {
                                var searchtarget = addresses[b].innerHTML.toLowerCase();
                                
                                if(searchtarget.includes(keyword))
                                    {
                                        rows[b].style.display = "table-row";
                                    }
                            }
                    }
                else if(filterby == "Status")
                    {
                        for(var b = 0; b < rows.length; b++)
                            {
                                var searchtarget = statuses[b].innerHTML.toLowerCase();
                                
                                if(searchtarget.includes(keyword))
                                    {
                                        rows[b].style.display = "table-row";
                                    }
                            }
                    }
            }
        </script>
    </body>
</html>