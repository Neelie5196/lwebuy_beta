<?php
require_once '../connection/config.php';
session_start();

$query = "SELECT *
           FROM shipping s
           JOIN users us
           ON us.user_id = s.user_id
           WHERE status = 'DELIVERED' AND review is NOT NULL";
$result = mysqli_query($con, $query);


?>
<div class="col-xs-12 col-md-12 col-lg-12">
    <h2 class="bigh2 pagetitle hidden-xs hidden-sm">Reviews</h2>
    
    <h2 class="smh2 pagetitle hidden-md hidden-lg">Reviews</h2>

    <div id="pagibtncontainer"></div>

    <?php 
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_array($result))
            {
                ?>
    <div class="adreview left">
                   
        <h5><?php echo $row['fname']." ".$row['lname']." "."(Tracking Code:".$row['tracking_code'].")"; ?></h5>
        <p><?php echo $row['review']; ?></p>
    </div>
        <?php
            }
        }else{
            ?>
    <p class="requestp">No reviews submitted.</p>

            <?php
        }
    ?>
</div>



<script>
    var reviews = document.getElementsByClassName("adreview");
    var btncontainer = document.getElementById("pagibtncontainer");
    
    for (var a = 3; a < reviews.length; a++)
        {
            reviews[a].style.display = "none";
        }
    
    if (reviews.length % 3 == 0)
        {
            var noofbtn = reviews.length / 3;
        }
    else
        {
            var noofbtn = Math.floor(reviews.length / 3) + 1;
        }
        
    if(noofbtn > 1)
        {
            for (var b = 0; b < noofbtn; b++)
                {
                    var pagibtn = document.createElement("button");

                    pagibtn.innerHTML = b+1;
                    pagibtn.setAttribute("onclick", "changepage(" + b + ")");
                    pagibtn.setAttribute("class", "btn btnpagi");
                    btncontainer.appendChild(pagibtn);
                }
        }
    
    var btns = document.getElementsByClassName("btnpagi");
    
    btns[0].style.fontWeight = "800";
    
    function changepage(m)
    {
        var count = 0;
        
        count += m * 3;
        dlimit = count + 3;
        
        for (var e = 0; e < btns.length; e++)
            {
                btns[e].style.fontWeight = "normal";
            }
        
        btns[m].style.fontWeight = "bold";
        
        for (var c = 0; c < reviews.length; c++)
            {
                reviews[c].style.display = "none";
            }
        
        for (var d = count; d < dlimit; d++)
            {
                reviews[d].style.display = "block";
            }
    }
</script>