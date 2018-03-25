<?php
//$type = $_SESSION['type'];
?>

<nav class="navbar navbar-default userbar">
    <div class="navbar-header">
        <a class="navbar-brand" href="#home" id="btnlogo"><img src="../resources/img/logo.png" alt="logo" width="50%"/></a>
    </div>

    <ul class="nav navbar-nav center menuitem">
        <li><a href="#home" id="btnhome">Home</a></li>
        <li><a href="#adrequest" id="btnadrequest">Requests</a></li>
        <li><a href="#adpayment" id="btnadpayment">Payments</a></li>
        <li><a href="#adupdate" id="btnadupdate">Updates</a></li>
        <li><a href="#adaccount" id="btnadaccount">Accounts</a></li>
        <li><a href="#adfeedback" id="btnadfeedback">Feedbacks</a></li>
    </ul>
    
    <ul class="nav navbar-nav navbar-right useritem right">
        <li><a id="btncredit" href="#credit"><span class="glyphicon glyphicon-piggy-bank"></span></a></li>
        <li><a id="btnuser" href="#user"><span class="glyphicon glyphicon-user"></span></a></li>
        <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span></a></li>
    </ul>
</nav>