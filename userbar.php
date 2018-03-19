<nav class="navbar navbar-default userbar">
    <div class="navbar-header">
        <a class="navbar-brand" href="dashboard.php"><img src="../resources/img/logo.png" alt="logo" width="10%"/></a>
    </div>

    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?php /*echo $_SESSION['fname']; ?> <?php echo $_SESSION['lname'];*/ ?></a>
            <ul class="dropdown-menu menuitem">
                <li><a href="setting.php"><?php /*echo $_SESSION['email'];*/ ?></a></li>
            </ul>
        </li>
        <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span></a></li>
    </ul>
</nav>