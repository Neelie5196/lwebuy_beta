<nav class="navbar navbar-default userbar">
    <div class="navbar-header">
        <a class="navbar-brand" href="#home" id="btnlogo"><img src="../resources/img/logo.png" alt="logo" width="50%"/></a>
    </div>

    <ul class="nav navbar-nav center menuitem">
        <li><a href="#home" id="btnhome">Home</a></li>
        <li><a href="#purchase" id="btnpurchase">Purchase</a></li>
        <li><a href="#inventory" id="btninventory">Inventory</a></li>
        <li><a href="#ship" id="btnship">Ship</a></li>
    </ul>
    
    <ul class="nav navbar-nav navbar-right useritem right">
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?php /*echo $_SESSION['fname']; ?> <?php echo $_SESSION['lname'];*/ ?></a>
            <ul class="dropdown-menu menuitem">
                <li><a href="setting.php"><?php /*echo $_SESSION['email'];*/ ?></a></li>
            </ul>
        </li>
        <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span></a></li>
    </ul>
</nav>