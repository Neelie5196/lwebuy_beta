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

	<body class="userbg" onload="timeouttimer()">

        <div class="row loginrow1"> 
        </div>
        
        <div class="row">
            <div class="col-xs-12 col-md-8 col-lg-8 col-md-push-2 col-lg-push-2 darkgreennormal">
                <h2 class="bigh2 center pagetitle hidden-xs hidden-sm">User Guide</h2>
                <h2 class="smh2 center pagetitle hidden-lg hidden-md">User Guide</h2>
          
				<p class="darkgreennormal">Select function to view steps</p>
  
                <p><button class="btn guidebtnservice left" type="button" data-toggle="collapse" data-target="#purchase"><span class="glyphicon glyphicon-triangle-bottom darkgreentriangle"></span> &emsp; Purchase an item</button></p> 
                <div id="purchase" class="collapse serviceinfo">
                    <table class="servicetbl">
                        <tr>
						<td>
                                <p class="coltitle">Step 1: Click 'Purchase'</p>						
                        </td>	
                        </tr>
						<td class="imgcol"><img src="../resources/img/guide/1purchase.JPG" alt="international express" width="100%" /></td>
						<tr>                     
                            <td>
							<p class="coltitle">Step 2: Copy item url</p>
                            </td>
                        </tr>
						<td class="imgcol"><img src="../resources/img/guide/3copyurl.JPG" alt="international parcel" width="100%" /></td>
                        <tr>
                            <td>
							<p class="coltitle">Step 3: Add the url and click 'Request'</p>
                            </td>
                        </tr>
						<td class="imgcol"><img src="../resources/img/guide/2addpurchase.JPG" alt="international parcel" width="100%" /></td>
                    </table>
                </div>
          
		        <p><button class="btn guidebtnservice left" type="button" data-toggle="collapse" data-target="#inventory"><span class="glyphicon glyphicon-triangle-bottom darkgreentriangle"></span> &emsp; Send item to LWE warehouse</button></p> 
                <div id="inventory" class="collapse serviceinfo">
                    <table class="servicetbl">
                        <tr>
                            <td>
                                <p class="coltitle">Step 1: Click 'Inventory'</p>
                            </td>
                        </tr>
						         <td class="imgcol"><img src="../resources/img/guide/inventory.JPG" alt="international express" width="100%" /></td>
                        <tr>
                           
                            <td>
                                <p class="coltitle">Step 2:Copy order code</p>
								<p></p>
                            </td>
                        </tr>
								<td class="imgcol"><img src="../resources/img/guide/trackingcode.JPG" alt="international parcel" width="100%" /></td>
                        <tr> 
                            <td>
                                <p class="coltitle">Step 3: Add the code and click 'Request'</p>
                                <p></p>
                            </td>
                        </tr>
						     <td class="imgcol"><img src="../resources/img/guide/additem.JPG" alt="postal packets" width="100%" /></td>
                    </table>
                </div>
				
				<p><button class="btn guidebtnservice left" type="button" data-toggle="collapse" data-target="#shipping"><span class="glyphicon glyphicon-triangle-bottom darkgreentriangle"></span> &emsp; Ship your item</button></p> 
                <div id="shipping" class="collapse serviceinfo">
                    <table class="servicetbl">
                        <tr>
                            <td>
                                <p class="coltitle">Step 1:Click 'Shipping'</p>
                            </td>
                        </tr>
						   <td class="imgcol"><img src="../resources/img/guide/ship.JPG" alt="international express" width="100%" /></td>
                        <tr>  
                            <td>
							<p class="coltitle">Step 2:Tick item, and click 'shipping'</p>
                            </td>
                        </tr>
						  <td class="imgcol"><img src="../resources/img/guide/shipping.JPG" alt="international parcel" width="100%" /></td>
                    </table>
                </div>
               
			   	<p><button class="btn guidebtnservice left" type="button" data-toggle="collapse" data-target="#paymentcredit"><span class="glyphicon glyphicon-triangle-bottom darkgreentriangle"></span> &emsp; Payment (Credit)</button></p> 
                <div id="paymentcredit" class="collapse serviceinfo">
                    <table class="servicetbl">
                        <tr>
                            <td>
                                <p class="coltitle">Step 1: Tick item to pay, and click 'Pay'</p>
                            </td>
                        </tr>
								   <td class="imgcol"><img src="../resources/img/guide/pay.JPG" alt="international express" width="100%" /></td>
                        <tr>
                            <td>
							 <p class="coltitle">Step 2: Choose Credit, and click 'pay'</p>
                            </td>
                        </tr>
						      <td class="imgcol"><img src="../resources/img/guide/credit.JPG" alt="international parcel" width="100%" /></td>
                    </table>
					</div>
				
				<p><button class="btn guidebtnservice left" type="button" data-toggle="collapse" data-target="#paymentmolpay"><span class="glyphicon glyphicon-triangle-bottom darkgreentriangle"></span> &emsp; Payment (Molpay)</button></p> 
                <div id="paymentmolpay" class="collapse serviceinfo">
                    <table class="servicetbl">
                        <tr>
                      
                            <td>
                                <p class="coltitle">Step 1: Tick item to pay, and click 'Pay'</p>
                            </td>
                        </tr>
						      <td class="imgcol"><img src="../resources/img/guide/pay.JPG" alt="international express" width="100%" /></td>
                        <tr> 
                            <td>
							 <p class="coltitle">Step 2: Choose Molpay, and click 'pay now' </p>
                            </td>
                        </tr>
						<td class="imgcol"><img src="../resources/img/guide/molpay.JPG" alt="international parcel" width="100%" /></td>
						<tr> 
                            <td>
							 <p class="coltitle">Step 3: Fill bank details, and click 'pay now'</p>
                            </td>
                        </tr>
						   <td class="imgcol"><img src="../resources/img/guide/molpay2.JPG" alt="international parcel" width="100%" /></td>
                    </table>
					</div>
               
			   	<p><button class="btn guidebtnservice left" type="button" data-toggle="collapse" data-target="#paymentreceipt"><span class="glyphicon glyphicon-triangle-bottom darkgreentriangle"></span> &emsp; Payment (Transaction receipt)</button></p> 
                <div id="paymentreceipt" class="collapse serviceinfo">
                    <table class="servicetbl">
                        <tr>
                            <td>
                                <p class="coltitle">Step 1: Tick item to pay, and click 'Pay'</p>
                            </td>
                        </tr>
				 <td class="imgcol"><img src="../resources/img/guide/pay.JPG" alt="international express" width="100%" /></td>
                        <tr>
                            <td>
							 <p class="coltitle">Step 2: Upload the receipt, and click 'Submit'</p>
                            </td>
                        </tr>
						<td class="imgcol"><img src="../resources/img/guide/receipt.JPG" alt="international parcel" width="100%" /></td>
                    </table>
					</div>
			   </div>
    
            </div>
    </body>
</html>