<?php
session_start();
if ($_SESSION['user_id'] == "")
{
    header('location: ../login.php');
    exit();
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

	<body class="linearbg" onload="timeouttimer()">
	<div class="row" id="usernav">
            <?php include_once "userbar.php" ?>
        </div>
        <div class="row loginrow1"> 
        </div>
        
        <div class="row">
            <div class="col-xs-12 col-md-8 col-lg-8 col-md-push-2 col-lg-push-2 contact">
                <h1 class="bigh1 center hidden-xs hidden-sm">User Guide</h1>
                <h1 class="smh1 center hidden-lg hidden-md">User Guide</h1>
                
             
                
				<p class="subtitle">Follow the step below</p>
             
  
                <p><button class="btn btnservice left" type="button" data-toggle="collapse" data-target="#purchase"><span class="glyphicon glyphicon-triangle-bottom"></span> &emsp; How to Purchase</button></p> 
                <div id="purchase" class="collapse serviceinfo">
                    <table class="servicetbl">
                        <tr>
                            <td class="imgcol"><img src="../resources/img/guide/1purchase.JPG" alt="international express" width="100%" /></td>
                            <td>
                                <p class="coltitle">Step 1:</p>
                                <p>Click 'Purchase' </p>
                            </td>
                        </tr>
						<tr>
                            <td class="imgcol"><img src="../resources/img/guide/3copyurl.JPG" alt="international parcel" width="100%" /></td>
                            <td>
							<p class="coltitle">Step 2:</p>
                                <p>Copy item url</p>
                            </td>
                        </tr>
                        <tr>
                            <td class="imgcol"><img src="../resources/img/guide/2addpurchase.JPG" alt="international parcel" width="100%" /></td>
                            <td>
							<p class="coltitle">Step 3:</p>
                                <p>Add the url and click 'Request'</p>
                            </td>
                        </tr>
                    </table>
                </div>
          
		        <p><button class="btn btnservice left" type="button" data-toggle="collapse" data-target="#inventory"><span class="glyphicon glyphicon-triangle-bottom"></span> &emsp; How to add inventory</button></p> 
                <div id="inventory" class="collapse serviceinfo">
                    <table class="servicetbl">
                        <tr>
                            <td class="imgcol"><img src="../resources/img/guide/inventory.JPG" alt="international express" width="100%" /></td>
                            <td>
                                <p class="coltitle">Step 1:</p>
                                <p>Click 'Inventory'</p>
                            </td>
                        </tr>
                        <tr>
                            <td class="imgcol"><img src="../resources/img/guide/trackingcode.JPG" alt="international parcel" width="100%" /></td>
                            <td>
                                <p class="coltitle">Step 2:</p>
								<p>Copy order code</p>
                            </td>
                        </tr>
                        <tr>
                            <td class="imgcol"><img src="../resources/img/guide/3payment.JPG" alt="postal packets" width="100%" /></td>
                            <td>
                                <p class="coltitle">Step 3:</p>
                                <p>Add the code and click 'Request'</p>
                            </td>
                        </tr>
                    </table>
                </div>
				
				<p><button class="btn btnservice left" type="button" data-toggle="collapse" data-target="#shipping"><span class="glyphicon glyphicon-triangle-bottom"></span> &emsp; Shipping</button></p> 
                <div id="shipping" class="collapse serviceinfo">
                    <table class="servicetbl">
                        <tr>
                            <td class="imgcol"><img src="../resources/img/guide/ship.JPG" alt="international express" width="100%" /></td>
                            <td>
                                <p class="coltitle">Step 1:</p>
                                <p>Click 'Shipping'</p>
                            </td>
                        </tr>
                        <tr>
                            <td class="imgcol"><img src="../resources/img/guide/2addpurchase.JPG" alt="international parcel" width="100%" /></td>
                            <td>
							<p class="coltitle">Step 2:</p>
                                <p>Tick item, and click 'shipping'</p>
                            </td>
                        </tr>
                    </table>
                </div>
               
			   	<p><button class="btn btnservice left" type="button" data-toggle="collapse" data-target="#paymentcredit"><span class="glyphicon glyphicon-triangle-bottom"></span> &emsp; Payment(credit)</button></p> 
                <div id="paymentcredit" class="collapse serviceinfo">
                    <table class="servicetbl">
                        <tr>
                            <td class="imgcol"><img src="../resources/img/guide/pay.JPG" alt="international express" width="100%" /></td>
                            <td>
                                <p class="coltitle">Step 1:</p>
                                <p>Tick item to pay, and click 'Pay'</p>
                            </td>
                        </tr>
                        <tr>
                            <td class="imgcol"><img src="../resources/img/guide/credit.JPG" alt="international parcel" width="100%" /></td>
                            <td>
							 <p class="coltitle">Step 2:</p>
                                <p>Choose Credit, and click 'pay' </p>
                            </td>
                        </tr>
                    </table>
					</div>
				
				<p><button class="btn btnservice left" type="button" data-toggle="collapse" data-target="#paymentmolpay"><span class="glyphicon glyphicon-triangle-bottom"></span> &emsp; Payment(molpay)</button></p> 
                <div id="paymentmolpay" class="collapse serviceinfo">
                    <table class="servicetbl">
                        <tr>
                            <td class="imgcol"><img src="../resources/img/guide/pay.JPG" alt="international express" width="100%" /></td>
                            <td>
                                <p class="coltitle">Step 1:</p>
                                <p>Tick item to pay, and click 'Pay'</p>
                            </td>
                        </tr>
                        <tr>
                            <td class="imgcol"><img src="../resources/img/guide/molpay.JPG" alt="international parcel" width="100%" /></td>
                            <td>
							 <p class="coltitle">Step 2:</p>
                                <p>Choose Molpay, and click 'pay now' </p>
                            </td>
                        </tr>
						<tr>
                            <td class="imgcol"><img src="../resources/img/guide/molpay2.JPG" alt="international parcel" width="100%" /></td>
                            <td>
							 <p class="coltitle">Step 3:</p>
                                <p>Fill bank details, and click 'pay now' </p>
                            </td>
                        </tr>
                    </table>
					</div>
               
			   	<p><button class="btn btnservice left" type="button" data-toggle="collapse" data-target="#paymentreceipt"><span class="glyphicon glyphicon-triangle-bottom"></span> &emsp; Payment(transaction)</button></p> 
                <div id="paymentreceipt" class="collapse serviceinfo">
                    <table class="servicetbl">
                        <tr>
                            <td class="imgcol"><img src="../resources/img/guide/pay.JPG" alt="international express" width="100%" /></td>
                            <td>
                                <p class="coltitle">Step 1:</p>
                               <p>Tick item to pay, and click 'Pay'</p>
                            </td>
                        </tr>
                        <tr>
                            <td class="imgcol"><img src="../resources/img/guide/receipt.JPG" alt="international parcel" width="100%" /></td>
                            <td>
                                <p>Upload the receipt, and click 'Submit'</p>
                            </td>
                        </tr>
                    </table>
					</div>
			   </div>
    
            </div>
    </body>
</html>