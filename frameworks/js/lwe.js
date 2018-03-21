$(document).ready(function(){
    if (window.location.hash == "#home")
        {
            $("#mainview").load('dashboard.php');
        }
    else if (window.location.hash == "#purchase")
        {
            $("#mainview").load('purchase.php');
        }
    else if (window.location.hash == "#ship")
        {
            $("#mainview").load('shipping.php');
        }
    else if (window.location.hash == "#inventory")
        {
            $("#mainview").load('inventory.php');
        }
    else
        {
            $("#mainview").load('dashboard.php');
        }
});

$(document).ready(function(){
    $("#btnhome").click(function(){
        $("#mainview").load('dashboard.php');
    });
});

$(document).ready(function(){
    $("#btnlogo").click(function(){
        $("#mainview").load('dashboard.php');
    });
});

$(document).ready(function(){
    $("#btnpurchase").click(function(){
        $("#mainview").load('purchase.php');
    });
});

$(document).ready(function(){
    $("#btnship").click(function(){
        $("#mainview").load('shipping.php');
    });
});

$(document).ready(function(){
    $("#btninventory").click(function(){
        $("#mainview").load('inventory.php');
    });
});