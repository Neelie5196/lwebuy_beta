<?php
/*$type = $_SESSION['type'];*/
?>

<div class="col-xs-12 col-md-12 col-lg-12">
    <!--<div class="row">
        <div class="col-md-12 col-lg-12">
            <h1 class="bigh1">LOGISTICS WORLDWIDE EXPRESS</h1>
        </div>
    </div>-->

    <div class="row adrow1">
        <div class="col-xs-12 col-md-4 col-lg-4 adnoti">
            <a href="">
                <div>
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12 left">
                            <p class="notititle">Pending Requests</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12 right">
                            <p class="notino">0</p>
                        </div>
                    </div>            
                </div>
            </a>
        </div>
            
        <div class="col-xs-12 col-md-4 col-lg-4 adnoti">
            <a href="">
                <div>                
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12 left">
                            <p class="notititle">Pending payments</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12 right">
                            <p class="notino">0</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
            
        <div class="col-xs-12 col-md-4 col-lg-4 adnoti">
            <a href="">
                <div>
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12 left">
                            <p class="notititle">New Feedbacks</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12 right">
                            <p class="notino">0</p>
                        </div>
                    </div>  
                </div>
            </a>
        </div>
            
    </div>
    
    <div class="row">
        <div class="bigadstats hidden-xs hidden-sm">
            <div class="col-md-3 col-lg-3">
                <h6>0
                    <?php
                        /*$query7 = "SELECT * FROM users";
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
                        }*/
                    ?>
                </h6>
                <p>users</p>
            </div>

            <div class="col-md-3 col-lg-3">
                <h6>0
                    <?php
                        /*$query8 = "SELECT * FROM order_list";
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
                        }*/
                    ?>
                </h6>
                <p>completed purchases</p>
            </div>

            <div class="col-md-3 col-lg-3">
                <h6>0
                    <?php
                        /*$query9 = "SELECT * FROM shipping";
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
                        }*/
                    ?>
                </h6>
                <p>items shipped</p>
            </div>
        
            <div class="col-md-3 col-lg-3">
                <h6>0
                    <?php
                       /* $query0 = "SELECT * FROM payment";
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
                        }*/
                    ?>
                </h6>
                <p>earned</p>
            </div>        
        </div>
    
        
        <div class="smadstats center hidden-md hidden-lg">
            <div class="col-sm-6 col-xs-6">
                <h6>0
                    <?php
                        /*$query7 = "SELECT * FROM users";
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
                        }*/
                    ?>
                </h6>
                <p>users</p>
            </div>

            <div class="col-sm-6 col-xs-6">
                <h6>0
                    <?php
                       /* $query8 = "SELECT * FROM order_list";
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
                        }*/
                    ?>
                </h6>
                <p>completed purchases</p>
            </div>

            <div class="col-sm-6 col-xs-6">
                <h6>0
                    <?php
                        /*$query9 = "SELECT * FROM shipping";
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
                        }*/
                    ?>
                </h6>
                <p>items shipped</p>
            </div>

            <div class="col-sm-6 col-xs-6">
                <h6>0
                    <?php
                        /*$query0 = "SELECT * FROM payment";
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
                        }*/
                    ?>
                </h6>
                <p>earned</p>
            </div>
        </div>
    </div>
</div>
   