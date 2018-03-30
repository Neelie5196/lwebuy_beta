<?php
$query = "SELECT *
          FROM order_item
          WHERE status = 'Request'";
$result = mysqli_query($con, $query);
$count = mysqli_num_rows($result);

$query1 = "SELECT *
            FROM order_item 
            WHERE status = 'paid'";
$result1 = mysqli_query($con, $query1);

$query2 = "SELECT *
        FROM shipping
        WHERE status = 'request'";
$result2 = mysqli_query($con, $query2);

$query3 = "SELECT *
        FROM payment p
        WHERE status = 'Waiting for approval'";
$result3 = mysqli_query($con, $query3);

$query4 = "SELECT *
        FROM order_item
        WHERE status = 'top-up'";
$result4 = mysqli_query($con, $query4);

$query5 = "SELECT *
        FROM shipping
        WHERE status = 'top-up'";
$result5 = mysqli_query($con, $query5);

$count1 = mysqli_num_rows($result1) + mysqli_num_rows($result2) + mysqli_num_rows($result3) + mysqli_num_rows($result4) + mysqli_num_rows($result5);
?>

<nav class="navbar navbar-default hidden-xs hidden-sm bigbar">
    <div class="navbar-header">
        <a class="navbar-brand" href="#home" id="btnlogo"><img src="../resources/img/logo.png" alt="logo" width="50%"/></a>
    </div>
    
    <ul class="nav navbar-nav center menuitem">
        <li><a href="#home" id="btnhome">Home</a></li>
        <li><a href="#adrequest" id="btnadrequest">Requests<?php if ($count > 0) { ?><span class="notify"><?php echo $count ?></span><?php } ?></a></li>
        <li><a href="#adpayment" id="btnadpayment">Payments<?php if ($count1 > 0) { ?><span class="notify"><?php echo $count1 ?></span><?php } ?></a></li>
        <li><a href="#adwarehouse" id="btnadwarehouse">Warehouse</a></li>
        <li><a href="#adupdate" id="btnadupdate">Updates</a></li>
        <li><a href="#adaccount" id="btnadaccount">Accounts</a></li>
        <li><a href="#adreview" id="btnadreview">Reviews</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right useritem right">
        <li><a id="btnuser" href="#user"><span class="glyphicon glyphicon-user"></span></a></li>
        <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span></a></li>
    </ul>
</nav>

<nav class="navbar navbar-default hidden-lg hidden-md smbar">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
        </button>
        
        <a class="navbar-brand" href="#home" id="btnlogo"><img src="../resources/img/logo.png" alt="logo" width="10%"/></a>
    </div>
    
    <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
            <li><a href="#home" id="btnhome">Home</a></li>
            <li><a href="#adrequest" id="btnadrequest">Requests</a></li>
            <li><a href="#adpayment" id="btnadpayment">Payments</a></li>
            <li><a href="#adwarehouse" id="btnadwarehouse">Warehouse</a></li>
            <li><a href="#adupdate" id="btnadupdate">Updates</a></li>
            <li><a href="#adaccount" id="btnadaccount">Accounts</a></li>
            <li><a href="#adreview" id="btnadreview">Reviews</a></li>
        
            <li><a id="btnuser" href="#user">My Account</a></li>
        <li><a href="../logout.php">Log Out</a></li>
        </ul>
    </div>
</nav>