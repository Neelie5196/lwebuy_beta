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

function funcPRequest() {
    document.getElementById("prequest").style.display = "block";
    document.getElementById("ppayment").style.display = "none";
    document.getElementById("pproceed").style.display = "none";
    document.getElementById("preceive").style.display = "none";
    document.getElementById("pdecline").style.display = "none";
}

function funcPPayment() {
    document.getElementById("prequest").style.display = "none";
    document.getElementById("ppayment").style.display = "block";
    document.getElementById("pproceed").style.display = "none";
    document.getElementById("preceive").style.display = "none";
    document.getElementById("pdecline").style.display = "none";
}

function funcPProceed() {
    document.getElementById("prequest").style.display = "none";
    document.getElementById("ppayment").style.display = "none";
    document.getElementById("pproceed").style.display = "block";
    document.getElementById("preceive").style.display = "none";
    document.getElementById("pdecline").style.display = "none";
}

function funcPReceive() {
    document.getElementById("prequest").style.display = "none";
    document.getElementById("ppayment").style.display = "none";
    document.getElementById("pproceed").style.display = "none";
    document.getElementById("preceive").style.display = "block";
    document.getElementById("pdecline").style.display = "none";
}

function funcPDecline() {
    document.getElementById("prequest").style.display = "none";
    document.getElementById("ppayment").style.display = "none";
    document.getElementById("pproceed").style.display = "none";
    document.getElementById("preceive").style.display = "none";
    document.getElementById("pdecline").style.display = "block";
}

function funcIPending() {
    document.getElementById("ipending").style.display = "block";
    document.getElementById("ireceive").style.display = "none";
}

function funcIReceive() {
    document.getElementById("ipending").style.display = "none";
    document.getElementById("ireceive").style.display = "block";
}