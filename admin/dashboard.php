<?php
$type = $_SESSION['type'];
?>

<div class="col-md-12 col-lg-12 hidden-sm hidden-xs homerow">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <h1 class="bigh1">LOGISTICS WORLDWIDE EXPRESS</h1>
        </div>
    </div>

    <div id="text-carousel" class="carousel slide" data-ride="carousel">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-md-push-3 col-lg-push-3">
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="carousel-content">
                            <div>
                                <h2>The choice that delivers</h2>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="carousel-content">
                            <div>
                                <h2>Borderless logistics</h2>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="carousel-content">
                            <div>                          
                                <h2>People partnership</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row bigadstats center">
            
        <a href="#accounts">
            <div class="col-md-3 col-lg-3">
                <h6>
                    <?php
                        $query7 = "SELECT * FROM users";
                        $result7 = mysqli_query($con, $query7);
                        $count7 = 0;
                        if(mysqli_num_rows($result7) > 0)
                        {
                            while($row = mysqli_fetch_array($result7))
                            {
                                if ($row['type']=="customer")
                                {
                                    $count7 += 1;
                                }
                                else
                                {
                                    $count7 = $count7;
                                }
                            }
                            echo $count7;
                        }else{
                            echo '0';
                        }
                    ?>
                </h6>
                <p>users</p>
            </div>
        </a>
        
        <a href="#purchase">
            <div class="col-md-3 col-lg-3">
                <h6>
                    <?php
                        $query8 = "SELECT * FROM order_list";
                        $result8 = mysqli_query($con, $query8);
                        $count8 = 0;
                        if(mysqli_num_rows($result8) > 0)
                        {
                            while($row = mysqli_fetch_array($result8))
                            {
                                if ($row['status']=="Received")
                                {
                                    $count8 += 1;
                                }
                                else
                                {
                                    $count8 = $count8;
                                }
                            }
                            echo $count8;
                        }else{
                            echo '0';
                        }
                    ?>
                </h6>
                <p>completed purchases</p>
            </div>
        </a>
        
        <a href="#inventory">
            <div class="col-md-3 col-lg-3">
                <h6>
                    <?php
                        $query9 = "SELECT * FROM shipping";
                        $result9 = mysqli_query($con, $query9);
                        $count9 = 0;
                        if(mysqli_num_rows($result9) > 0)
                        {
                            while($row = mysqli_fetch_array($result9))
                            {
                                if ($row['status']=="Received")
                                {
                                    $count9 += 1;
                                }
                                else
                                {
                                    $count9 = $count9;
                                }
                            }
                            echo $count9;
                        }else{
                            echo '<p>0</p>';
                        }
                    ?>
                </h6>
                <p>items shipped</p>
            </div>
        </a>
        
        <a href="#shipping">
            <div class="col-md-3 col-lg-3">
                <h6>
                    <?php
                        $query0 = "SELECT * FROM payment";
                        $result0 = mysqli_query($con, $query0);
                        $count0 = 0;
                        if(mysqli_num_rows($result0) > 0)
                        {
                            while($row = mysqli_fetch_array($result0))
                            {
                                if ($row['status']=="Completed")
                                {
                                    $count0 += $row['amount'];
                                }
                                else
                                {
                                    $count0 = $count0;
                                }
                            }
                            echo $count0;
                        }else{
                            echo '0';
                        }
                    ?>
                </h6>
                <p>earned</p>
            </div>        
        </a>
    </div>
</div>

<div class="col-xs-12 col-sm-12 hidden-md hidden-lg">
    <div class="row">
        <div class="col-xs-12 col-sm-12">
            <h1 class="smh1">LOGISTICS WORLDWIDE EXPRESS</h1>
        </div>
    </div>

    <div id="text-carousel" class="carousel slide" data-ride="carousel">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="carousel-content">
                            <div>
                                <h2 class="smh2">The choice that delivers</h2>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="carousel-content">
                            <div>
                                <h2 class="smh2">Borderless logistics</h2>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="carousel-content">
                            <div>                          
                                <h2 class="smh2">People partnership</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row smadstats center">
        <div class="col-sm-3 col-xs-3">
            <h6>
                <?php
                    $query7 = "SELECT * FROM users";
                    $result7 = mysqli_query($con, $query7);
                    $count7 = 0;
                    if(mysqli_num_rows($result7) > 0)
                    {
                        while($row = mysqli_fetch_array($result7))
                        {
                            if ($row['type']=="customer")
                            {
                                $count7 += 1;
                            }
                            else
                            {
                                $count7 = $count7;
                            }
                        }
                        echo $count7;
                    }else{
                        echo '0';
                    }
                ?>
            </h6>
            <p>users</p>
        </div>
        
        <div class="col-sm-3 col-xs-3">
            <h6>
                <?php
                    $query8 = "SELECT * FROM order_list";
                    $result8 = mysqli_query($con, $query8);
                    $count8 = 0;
                    if(mysqli_num_rows($result8) > 0)
                    {
                        while($row = mysqli_fetch_array($result8))
                        {
                            if ($row['status']=="Received")
                            {
                                $count8 += 1;
                            }
                            else
                            {
                                $count8 = $count8;
                            }
                        }
                        echo $count8;
                    }else{
                        echo '0';
                    }
                ?>
            </h6>
            <p>completed purchases</p>
        </div>
        
        <div class="col-sm-3 col-xs-3">
            <h6>
                <?php
                    $query9 = "SELECT * FROM shipping";
                    $result9 = mysqli_query($con, $query9);
                    $count9 = 0;
                    if(mysqli_num_rows($result9) > 0)
                    {
                        while($row = mysqli_fetch_array($result9))
                        {
                            if ($row['status']=="Received")
                            {
                                $count9 += 1;
                            }
                            else
                            {
                                $count9 = $count9;
                            }
                        }
                        echo $count9;
                    }else{
                        echo '<p>0</p>';
                    }
                ?>
            </h6>
            <p>items shipped</p>
        </div>
        
        <a href="shippinglist.php">
            <div class="col-sm-3 col-xs-3">
                <h6>
                    <?php
                        $query0 = "SELECT * FROM payment";
                        $result0 = mysqli_query($con, $query0);
                        $count0 = 0;
                        if(mysqli_num_rows($result0) > 0)
                        {
                            while($row = mysqli_fetch_array($result0))
                            {
                                if ($row['status']=="Completed")
                                {
                                    $count0 += $row['amount'];
                                }
                                else
                                {
                                    $count0 = $count0;
                                }
                            }
                            echo $count0;
                        }else{
                            echo '0';
                        }
                    ?>
                </h6>
                <p>earned</p>
            </div>
        </a>
    </div>
</div>