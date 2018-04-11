<?php

require_once '../connection/config.php';
session_start();

?>
<div class="col-xs-12 col-md-12 col-lg-12">
    <form action="viewtracking.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-xs-12 col-md-8 col-lg-8 col-md-push-2 col-lg-push-2">
                <textarea name="hawb" cols="25" rows="5" class="trackfield" placeholder="Enter tracking code here" autocomplete="off" required></textarea>
            </div>
        </div>
        <button type="submit" name="tracking_code" class="btn btnGo">Track</button>
    </form>                            
</div>

<script>
    setInterval(function(){ location.reload(true); }, 300000);
</script>