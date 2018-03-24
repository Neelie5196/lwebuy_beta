<?php
$type = $_SESSION['type'];
?>

<nav class="navbar navbar-default userbar">
    <div class="navbar-header">
        <a class="navbar-brand" href="#home" id="btnlogo"><img src="../resources/img/logo.png" alt="logo" width="50%"/></a>
    </div>

    <ul class="nav navbar-nav center menuitem">
        <li><a href="#home" id="btnhome">Home</a></li>
        <li><a href="#purchase" id="btnpurchase">Purchase</a></li>
        <li><a href="#inventory" id="btninventory">Inventory</a></li>
        <li><a href="#ship" id="btnship">Ship</a></li>
        
        <?php if($type == 'admin') { ?>
        <li><a href="#accounts" id="btnaccount">Accounts</a></li>
        <?php } ?>
    </ul>
    
    <ul class="nav navbar-nav navbar-right useritem right">
        <li><a id="btncredit" href="#credit"><span class="glyphicon glyphicon-piggy-bank"></span></a></li>
        <li><a id="btnuser" href="#user"><span class="glyphicon glyphicon-user"></span></a></li>
        <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span></a></li>
    </ul>
</nav>