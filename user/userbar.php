<?php
require_once '../connection/config.php';

$user_id = $_SESSION['user_id'];

$query = "SELECT *
          FROM order_item
          WHERE user_id='$user_id' AND status = 'Ready to Pay'";
$result = mysqli_query($con, $query);
$count = mysqli_num_rows($result);

$query1 = "SELECT *
          FROM item it
          JOIN slot sl
          ON it.slot_id = sl.slot_id
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
        <a class="navbar-brand" href="#home" id="btnlogo" onclick="resettimeoutimer()"><img src="../resources/img/logo.png" alt="logo" width="50%"/></a>
    </div>
    
    <ul class="nav navbar-nav center menuitem">
        <li><a href="#home" id="btnhome" onclick="resettimeoutimer()">Home</a></li>
        <li><a href="#purchase" id="btnpurchase" onclick="resettimeoutimer()">Purchase<?php if ($count > 0) { ?><span class="notify"><?php echo $count ?></span><?php } ?></a></li>
        <li><a href="#inventory" id="btninventory" onclick="resettimeoutimer()">Inventory<?php if ($count1 > 0) { ?><span class="notify"><?php echo $count1 ?></span><?php } ?></a></li>
        <li><a href="#ship" id="btnship" onclick="resettimeoutimer()">Ship<?php if ($count2 > 0) { ?><span class="notify"><?php echo $count2 ?></span><?php } ?></a></li>
        <li><a href="#track" id="btntrack" onclick="resettimeoutimer()">Track</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right useritem right">
        <li><a id="btncredit" href="#credit" onclick="resettimeoutimer()" title="LWE Points"><span class="glyphicon glyphicon-piggy-bank"></span></a></li>
        <li><a id="btnuser" href="#user" onclick="resettimeoutimer()" title="My Profile"><span class="glyphicon glyphicon-user"></span></a></li>
        <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out" title="Log out"></span></a></li>
    </ul>
</nav>

<nav class="navbar navbar-default hidden-lg hidden-md smbar">
    <div class="navbar-header">
        
        <a class="navbar-brand" href="#home" id="btnlogos" onclick="resettimeoutimer()"><img src="../resources/img/logo.png" alt="logo" width="10%"/></a>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" onclick="resettimeoutimer()">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
        </button>
    
    </div>
    
    <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
            <li><a href="#home" id="btnhomes" onclick="resettimeoutimer()">Home</a></li>
            <li><a href="#purchase" id="btnpurchases" onclick="resettimeoutimer()">Purchase<?php if ($count > 0) { ?><span class="notifys"><?php echo $count ?></span><?php } ?></a></li>
            <li><a href="#inventory" id="btninventorys" onclick="resettimeoutimer()">Inventory</a></li>
            <li><a href="#ship" id="btnships" onclick="resettimeoutimer()">Ship<?php if ($count1 > 0) { ?><span class="notifys"><?php echo $count1 ?></span><?php } ?></a></li>
            <li><a href="#track" id="btntracks" onclick="resettimeoutimer()">Track</a></li>
        
            <li><a id="btncredits" href="#credit" onclick="resettimeoutimer()">Credits</a></li>
            <li><a id="btnusers" href="#user" onclick="resettimeoutimer()">My Account</a></li>
            <li><a href="../logout.php">Log Out</a></li>
        </ul>
    </div>
</nav>