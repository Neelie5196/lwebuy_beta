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
                <h2 class="bigh2 pagetitle hidden-xs hidden-sm">Shipment Registration</h2>

                <h2 class="smh2 pagetitle hidden-md hidden-lg">Shipment Registration</h2>

                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 updatecontainer">
                        <form action="delivered.php" method="post">
                            <table class="purchasetable">
                                <tr>
                                    <th></th>
                                    <th>Tracking Code</th>
                                    <th>Recipient Name</th>
                                    <th>Recipient Contact</th>
                                    <th>Recipient Address</th>
                                    <th>Total Weight (kg)</th>
                                    <th>Destination Station</th>
                                    <th>Parcel Tag</th>
                                </tr>

                                <tr class="bodyrow">
                                    <td>
                                        <input type="checkbox" />
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <select class="tblformselect">
                                            <option class="formoption"></option>
                                        </select>
                                    </td>
                                    <td>
                                        <a data-toggle="modal" class="btn btn-default btn-xs btnDelete" href="#printtag"><span class="glyphicon glyphicon-print"></span></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="8">
                                        <input type="submit" class="btn btnAdd" name="register" value="Register" />
                                    </td>
                                </tr>
                            </table>
                        </form>

                        <div class="modal fade" id="printtag" tabindex="-1" role="dialog" aria-labelledby="printtagTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="printtagTitle">Tag Preview</h5>
                                    </div>

                                    <form method="post" action="account.php">
                                        <div class="modal-body left">
                                            <div id="parceltag">
                                                <div class="parceltag">
                                                    <h1>
                                                        <img src="../resources/img/logo-black.png"/>
                                                        Logistics Worldwide Express
                                                    </h1>
                                                    <hr/>

                                                    <p>Weight(KG): </p>

                                                    <script type="text/javascript">
                                                        function printDiv(parceltag)
                                                        {
                                                            var printContents = document.getElementById(parceltag).innerHTML;
                                                            var originalContents = document.body.innerHTML;
                                                            document.body.innerHTML = printContents;
                                                            window.print();
                                                            location.reload(true);
                                                        }
                                                        function generateBarcode()
                                                        {
                                                            $("barcode").update();
                                                            var value = '214124';
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

                                                    <table>
                                                        <tr>
                                                            <td><h3>Ship to:</h3></td>
                                                            <td><h3>Recipient contact:</h3></td>
                                                        </tr>

                                                        <tr>
                                                            <td><p></p></td>
                                                            <td><p></p></td>
                                                        </tr>
                                                    </table>

                                                    <h3>Address</h3>

                                                    <p></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btnCancel" data-dismiss="modal">Cancel</button>
                                            <button class="btn btn-success btnSend" onclick="printDiv('parceltag')">Print</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>