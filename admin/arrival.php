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
        <script src="../frameworks/js/prototype-barcode.js"></script>
        <script src="../frameworks/js/prototype.js"></script>

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
                <h2 class="bigh2 pagetitle hidden-xs hidden-sm">Delivered Shipments Update</h2>

                <h2 class="smh2 pagetitle hidden-md hidden-lg">Delivered Shipments Update</h2>

                <div class="row">
                    <div class="col-xs-6 col-md-6 col-lg-6 col-xs-push-6 col-md-push-3 col-lg-push-3 updatecontainer">
                        <form action="arrival.php" method="post">
                            <p><input type="text" name="search" class="formfield" placeholder="Enter tracking code here" required /></p>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 updatecontainer">
                        <form action="arrival.php" method="post">
                            <table class="purchasetable">
                                <tr>
                                    <th>Tracking Code</th>
                                    <th>Recipient Name</th>
                                    <th>Recipient Contact</th>
                                    <th>Recipient Address</th>
                                    <th>Total Weight (kg)</th>
                                    <th>Arrival Point</th>
                                </tr>

                                <tr class="bodyrow">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><input type="text" name="arrive" class="tblformfield" required /></td>
                                </tr>

                                <tr>
                                    <td colspan="6">
                                        <input type="submit" class="btn btnAdd" name="update" value="Update" />
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>