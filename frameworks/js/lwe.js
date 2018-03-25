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
    else if (window.location.hash == "#user")
        {
            $("#mainview").load('user.php');
        }
    else if (window.location.hash == "#credit")
        {
            $("#mainview").load('credit.php');
        }
    else if (window.location.hash == "#adrequest")
        {
            $("#mainview").load('request.php');
        }
    else if (window.location.hash == "#adpayment")
        {
            $("#mainview").load('payment.php');
        }
    else if (window.location.hash == "#adupdate")
        {
            $("#mainview").load('update.php');
        }
    else if (window.location.hash == "#adaccount")
        {
            $("#mainview").load('account.php');
        }
    else if (window.location.hash == "#adfeedback")
        {
            $("#mainview").load('feedback.php');
        }
    else if (window.location.hash == "#adwarehouse")
        {
            $("#mainview").load('warehouse.php');
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

$(document).ready(function(){
    $("#btnuser").click(function(){
        $("#mainview").load('user.php');
    });
});

$(document).ready(function(){
    $("#btncredit").click(function(){
        $("#mainview").load('credit.php');
    });
});

$(document).ready(function(){
    $("#btnadrequest").click(function(){
        $("#mainview").load('request.php');
    });
});

$(document).ready(function(){
    $("#btnnotrequest").click(function(){
        $("#mainview").load('request.php');
    });
});

$(document).ready(function(){
    $("#btnadpayment").click(function(){
        $("#mainview").load('payment.php');
    });
});

$(document).ready(function(){
    $("#btnnotpayment").click(function(){
        $("#mainview").load('payment.php');
    });
});

$(document).ready(function(){
    $("#btnadupdate").click(function(){
        $("#mainview").load('update.php');
    });
});

$(document).ready(function(){
    $("#btnadaccount").click(function(){
        $("#mainview").load('account.php');
    });
});

$(document).ready(function(){
    $("#btnadfeedback").click(function(){
        $("#mainview").load('feedback.php');
    });
});

$(document).ready(function(){
    $("#btnnotfeedback").click(function(){
        $("#mainview").load('feedback.php');
    });
});

$(document).ready(function(){
    $("#btnadwarehouse").click(function(){
        $("#mainview").load('warehouse.php');
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

function funcSItem() {
    document.getElementById("sitem").style.display = "block";
    document.getElementById("srequest").style.display = "none";
    document.getElementById("spayment").style.display = "none";
    document.getElementById("sproceed").style.display = "none";
    document.getElementById("sreceive").style.display = "none";
    document.getElementById("sdevline").style.display = "none";
}

function funcSRequest() {
    document.getElementById("sitem").style.display = "none";
    document.getElementById("srequest").style.display = "block";
    document.getElementById("spayment").style.display = "none";
    document.getElementById("sproceed").style.display = "none";
    document.getElementById("sreceive").style.display = "none";
    document.getElementById("sdevline").style.display = "none";
}

function funcSPayment() {
    document.getElementById("sitem").style.display = "none";
    document.getElementById("srequest").style.display = "none";
    document.getElementById("spayment").style.display = "block";
    document.getElementById("sproceed").style.display = "none";
    document.getElementById("sreceive").style.display = "none";
    document.getElementById("sdevline").style.display = "none";
}

function funcSProceed() {
    document.getElementById("sitem").style.display = "none";
    document.getElementById("srequest").style.display = "none";
    document.getElementById("spayment").style.display = "none";
    document.getElementById("sproceed").style.display = "block";
    document.getElementById("sreceive").style.display = "none";
    document.getElementById("sdevline").style.display = "none";
}

function funcSReceive() {
    document.getElementById("sitem").style.display = "none";
    document.getElementById("srequest").style.display = "none";
    document.getElementById("spayment").style.display = "none";
    document.getElementById("sproceed").style.display = "none";
    document.getElementById("sreceive").style.display = "block";
    document.getElementById("sdevline").style.display = "none";
}

function funcSDecline() {
    document.getElementById("sitem").style.display = "none";
    document.getElementById("srequest").style.display = "none";
    document.getElementById("spayment").style.display = "none";
    document.getElementById("sproceed").style.display = "none";
    document.getElementById("sreceive").style.display = "none";
    document.getElementById("sdecline").style.display = "block";
}

function funcCRequest() {
    document.getElementById("crequest").style.display = "block";
    document.getElementById("chistory").style.display = "none";
}

function funcCHistory() {
    document.getElementById("crequest").style.display = "none";
    document.getElementById("chistory").style.display = "block";
}

function funcShowChgPassword() {
    document.getElementById("chgPass").style.display = "block";
    document.getElementById("btnShowChg").style.display = "none";
    document.getElementById("curpassword").required = true;
    document.getElementById("newpassword").required = true;
    document.getElementById("renewpassword").required = true;
}

function funcHideChgPassword() {
    document.getElementById("chgPass").style.display = "none";
    document.getElementById("btnShowChg").style.display = "block";
    document.getElementById("curpassword").required = false;
    document.getElementById("newpassword").required = false;
    document.getElementById("renewpassword").required = false;
}

function funcShowChgPasswords() {
    document.getElementById("chgPasss").style.display = "block";
    document.getElementById("btnShowChgs").style.display = "none";
    document.getElementById("curpasswords").required = true;
    document.getElementById("newpasswords").required = true;
    document.getElementById("renewpasswords").required = true;
}

function funcHideChgPasswords() {
    document.getElementById("chgPasss").style.display = "none";
    document.getElementById("btnShowChgs").style.display = "block";
    document.getElementById("curpasswords").required = false;
    document.getElementById("newpasswords").required = false;
    document.getElementById("renewpasswords").required = false;
}

function funcCredit() {
    document.getElementById("pcredit").style.display ="block";
    document.getElementById("pcard").style.display = "none";
    document.getElementById("ptrans").style.display = "none";
}

function funcCard() {
    document.getElementById("pcredit").style.display ="none";
    document.getElementById("pcard").style.display = "block";
    document.getElementById("ptrans").style.display = "none";
}

function funcTrans() {
    document.getElementById("pcredit").style.display ="none";
    document.getElementById("pcard").style.display = "none";
    document.getElementById("ptrans").style.display = "block";
}

function funcRPurchase() {
    document.getElementById("rpurchase").style.display ="block";
    document.getElementById("rhistory").style.display ="none";
}

function funcRHistory() {
    document.getElementById("rpurchase").style.display ="none";
    document.getElementById("rhistory").style.display ="block";
}

function funcWPending() {
    document.getElementById("wpending").style.display = "block";
    document.getElementById("wslot").style.display = "none";
    document.getElementById("wwarehouse").style.display = "none";
}

function funcWSlot() {
    document.getElementById("wpending").style.display = "none";
    document.getElementById("wslot").style.display = "block";
    document.getElementById("wwarehouse").style.display = "none";
}

function funcWWarehouse() {
    document.getElementById("wpending").style.display = "none";
    document.getElementById("wslot").style.display = "none";
    document.getElementById("wwarehouse").style.display = "block";
}

function checkPass() {

    if (document.getElementById("newpassword").value == document.getElementById("renewpassword").value)
        {
            document.getElementById("passno").style.display = "none";
        }
    else
        {
            document.getElementById("passno").style.display = "block";
        }
}

function checkPasss() {

    if (document.getElementById("newpasswords").value == document.getElementById("renewpasswords").value)
        {
            document.getElementById("passnos").style.display = "none";
        }
    else
        {
            document.getElementById("passnos").style.display = "block";
        }
}