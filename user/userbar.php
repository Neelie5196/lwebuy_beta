<?php
require_once '../connection/config.php';

$user_id = $_SESSION['user_id'];

$query = "SELECT *
          FROM order_item
          WHERE user_id='$user_id' AND status = 'Ready to Pay'";
$result = mysqli_query($con, $query);
$count = mysqli_num_rows($result);

$query1 = "SELECT *
          FROM request
          WHERE user_id='$user_id' AND status = 'Received'";
$result1 = mysqli_query($con, $query1);
$count1 = mysqli_num_rows($result1);

$query2 = "SELECT *
          FROM shipping
          WHERE user_id='$user_id' AND status = 'DELIVERED'";
$result2 = mysqli_query($con, $query2);
$count2 = mysqli_num_rows($result2);
?>

<nav class="navbar navbar-default hidden-xs hidden-sm bigbar">
    <div class="navbar-header">
        <a class="navbar-brand" href="#home" id="btnlogo"><img src="../resources/img/logo.png" alt="logo" width="50%"/></a>
    </div>
    
    <ul class="nav navbar-nav center menuitem">
        <li><a href="#home" id="btnhome">Home</a></li>
        <li><a href="#purchase" id="btnpurchase">Purchase<?php if ($count > 0) { ?><span class="notify"><?php echo $count ?></span><?php } ?></a></li>
        <li><a href="#inventory" id="btninventory">Inventory<?php if ($count1 > 0) { ?><span class="notify"><?php echo $count1 ?></span><?php } ?></a></li>
        <li><a href="#ship" id="btnship">Ship<?php if ($count2 > 0) { ?><span class="notify"><?php echo $count2 ?></span><?php } ?></a></li>
        <li><a href="#track" id="btntrack">Track</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right useritem right">
        <li><a id="btncredit" href="#credit"><span class="glyphicon glyphicon-piggy-bank"></span></a></li>
        <li><a id="btnuser" href="#user"><span class="glyphicon glyphicon-user"></span></a></li>
        <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span></a></li>
    </ul>
</nav>

<nav class="navbar navbar-default hidden-lg hidden-md smbar">
    <div class="navbar-header" style="border:solid 1px black">
        
        <a class="navbar-brand" href="#home" id="btnlogo"><img src="../resources/img/logo.png" alt="logo" width="10%"/></a>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
        </button>
    
    </div>
    
    <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
            <li><a href="#home" id="btnhome">Home</a></li>
            <li><a href="#purchase" id="btnpurchase">Purchase<?php if ($count > 0) { ?><span class="notify"><?php echo $count ?></span><?php } ?></a></li>
            <li><a href="#inventory" id="btninventory">Inventory</a></li>
            <li><a href="#ship" id="btnship">Ship<?php if ($count1 > 0) { ?><span class="notify"><?php echo $count1 ?></span><?php } ?></a></li>
            <li><a href="#track" id="btntrack">Track</a></li>
        
            <li><a id="btncredit" href="#credit">Credits</span></a></li>
            <li><a id="btnuser" href="#user">My Account</a></li>
            <li><a href="../logout.php">Log Out</a></li>
        </ul>
    </div>
</nav>