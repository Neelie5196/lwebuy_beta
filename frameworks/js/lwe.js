$(document).ready(function () {
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
        else if (window.location.hash == "#adreview")
            {
                $("#mainview").load('review.php');
            }
        else if (window.location.hash == "#adwarehouse")
            {
                $("#mainview").load('warehouse.php');
            }
        else if (window.location.hash == "#track")
            {
                $("#mainview").load('tracking.php');
            }
        else if (window.location.hash == "#adother")
            {
                $("#mainview").load('other.php');
            }
        else if (window.location.hash == "#other")
            {
                $("#mainview").load('other.php');
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
    $("#btnadreview").click(function(){
        $("#mainview").load('review.php');
    });
});

$(document).ready(function(){
    $("#btnnotreview").click(function(){
        $("#mainview").load('review.php');
    });
});

$(document).ready(function(){
    $("#btnadwarehouse").click(function(){
        $("#mainview").load('warehouse.php');
    });
});

$(document).ready(function(){
    $("#btntrack").click(function(){
        $("#mainview").load('tracking.php');
    });
});
$(document).ready(function(){
    $("#btnadother").click(function(){
        $("#mainview").load('other.php');
    });
});

$(document).ready(function(){
    $("#btnhomes").click(function(){
        $("#mainview").load('dashboard.php');
    });
});

$(document).ready(function(){
    $("#btnlogos").click(function(){
        $("#mainview").load('dashboard.php');
    });
});

$(document).ready(function(){
    $("#btnpurchases").click(function(){
        $("#mainview").load('purchase.php');
    });
});

$(document).ready(function(){
    $("#btnships").click(function(){
        $("#mainview").load('shipping.php');
    });
});

$(document).ready(function(){
    $("#btninventorys").click(function(){
        $("#mainview").load('inventory.php');
    });
});

$(document).ready(function(){
    $("#btnusers").click(function(){
        $("#mainview").load('user.php');
    });
});

$(document).ready(function(){
    $("#btncredits").click(function(){
        $("#mainview").load('credit.php');
    });
});

$(document).ready(function(){
    $("#btnadrequests").click(function(){
        $("#mainview").load('request.php');
    });
});

$(document).ready(function(){
    $("#btnnotrequests").click(function(){
        $("#mainview").load('request.php');
    });
});

$(document).ready(function(){
    $("#btnadpayments").click(function(){
        $("#mainview").load('payment.php');
    });
});

$(document).ready(function(){
    $("#btnnotpayments").click(function(){
        $("#mainview").load('payment.php');
    });
});

$(document).ready(function(){
    $("#btnadupdates").click(function(){
        $("#mainview").load('update.php');
    });
});

$(document).ready(function(){
    $("#btnadaccounts").click(function(){
        $("#mainview").load('account.php');
    });
});

$(document).ready(function(){
    $("#btnadreviews").click(function(){
        $("#mainview").load('review.php');
    });
});

$(document).ready(function(){
    $("#btnnotreviews").click(function(){
        $("#mainview").load('review.php');
    });
});

$(document).ready(function(){
    $("#btnadwarehouses").click(function(){
        $("#mainview").load('warehouse.php');
    });
});

$(document).ready(function(){
    $("#btntracks").click(function(){
        $("#mainview").load('tracking.php');
    });
});

$(document).ready(function(){
    $("#btnadothers").click(function(){
        $("#mainview").load('other.php');
    });
});

$(document).ready(function(){
    $("#btnothers").click(function(){
        $("#mainview").load('other.php');
    });
});

$(document).ready(function(){
    $("#btnother").click(function(){
        $("#mainview").load('other.php');
    });
});

function funcPRequest() {
    document.getElementById("prequest").style.display = "block";
    document.getElementById("ppayment").style.display = "none";
    document.getElementById("pinsuff").style.display = "none";
    document.getElementById("pproceed").style.display = "none";
    document.getElementById("preceive").style.display = "none";
    document.getElementById("pdecline").style.display = "none";
    
    document.getElementById("btnprequest").style.fontWeight = "bold";
    document.getElementById("btnppayment").style.fontWeight = "normal";
    document.getElementById("btnpinsuff").style.fontWeight = "normal";
    document.getElementById("btnpproceed").style.fontWeight = "normal";
    document.getElementById("btnpreceive").style.fontWeight = "normal";
    document.getElementById("btnpdecline").style.fontWeight = "normal";
}

function funcPPayment() {
    document.getElementById("prequest").style.display = "none";
    document.getElementById("ppayment").style.display = "block";
    document.getElementById("pinsuff").style.display = "none";
    document.getElementById("pproceed").style.display = "none";
    document.getElementById("preceive").style.display = "none";
    document.getElementById("pdecline").style.display = "none";
    
    document.getElementById("btnprequest").style.fontWeight = "normal";
    document.getElementById("btnppayment").style.fontWeight = "bold";
    document.getElementById("btnpinsuff").style.fontWeight = "normal";
    document.getElementById("btnpproceed").style.fontWeight = "normal";
    document.getElementById("btnpreceive").style.fontWeight = "normal";
    document.getElementById("btnpdecline").style.fontWeight = "normal";
}

function funcPInsuff() {
    document.getElementById("prequest").style.display = "none";
    document.getElementById("ppayment").style.display = "none";
    document.getElementById("pinsuff").style.display = "block";
    document.getElementById("pproceed").style.display = "none";
    document.getElementById("preceive").style.display = "none";
    document.getElementById("pdecline").style.display = "none";
    
    document.getElementById("btnprequest").style.fontWeight = "normal";
    document.getElementById("btnppayment").style.fontWeight = "normal";
    document.getElementById("btnpinsuff").style.fontWeight = "bold";
    document.getElementById("btnpproceed").style.fontWeight = "normal";
    document.getElementById("btnpreceive").style.fontWeight = "normal";
    document.getElementById("btnpdecline").style.fontWeight = "normal";
}

function funcPProceed() {
    document.getElementById("prequest").style.display = "none";
    document.getElementById("ppayment").style.display = "none";
    document.getElementById("pinsuff").style.display = "none";
    document.getElementById("pproceed").style.display = "block";
    document.getElementById("preceive").style.display = "none";
    document.getElementById("pdecline").style.display = "none";
    
    document.getElementById("btnprequest").style.fontWeight = "normal";
    document.getElementById("btnppayment").style.fontWeight = "normal";
    document.getElementById("btnpinsuff").style.fontWeight = "normal";
    document.getElementById("btnpproceed").style.fontWeight = "bold";
    document.getElementById("btnpreceive").style.fontWeight = "normal";
    document.getElementById("btnpdecline").style.fontWeight = "normal";
}

function funcPReceive() {
    document.getElementById("prequest").style.display = "none";
    document.getElementById("ppayment").style.display = "none";
    document.getElementById("pinsuff").style.display = "none";
    document.getElementById("pproceed").style.display = "none";
    document.getElementById("preceive").style.display = "block";
    document.getElementById("pdecline").style.display = "none";
    
    document.getElementById("btnprequest").style.fontWeight = "normal";
    document.getElementById("btnppayment").style.fontWeight = "normal";
    document.getElementById("btnpinsuff").style.fontWeight = "normal";
    document.getElementById("btnpreceive").style.fontWeight = "bold";
    document.getElementById("btnpproceed").style.fontWeight = "normal";
    document.getElementById("btnpdecline").style.fontWeight = "normal";
}

function funcPDecline() {
    document.getElementById("prequest").style.display = "none";
    document.getElementById("ppayment").style.display = "none";
    document.getElementById("pinsuff").style.display = "none";
    document.getElementById("pproceed").style.display = "none";
    document.getElementById("preceive").style.display = "none";
    document.getElementById("pdecline").style.display = "block";
    
    document.getElementById("btnprequest").style.fontWeight = "normal";
    document.getElementById("btnppayment").style.fontWeight = "normal";
    document.getElementById("btnpinsuff").style.fontWeight = "normal";
    document.getElementById("btnpreceive").style.fontWeight = "normal";
    document.getElementById("btnpproceed").style.fontWeight = "normal";
    document.getElementById("btnpdecline").style.fontWeight = "bold";
}

function funcIPending() {
    document.getElementById("ipending").style.display = "block";
    document.getElementById("ireceive").style.display = "none";
    document.getElementById("iwarehouse").style.display = "none";
    
    document.getElementById("btnipending").style.fontWeight = "bold";
    document.getElementById("btnireceive").style.fontWeight = "normal";
    document.getElementById("btniwarehouse").style.fontWeight = "normal";
}

function funcIReceive() {
    document.getElementById("ipending").style.display = "none";
    document.getElementById("ireceive").style.display = "block";
    document.getElementById("iwarehouse").style.display = "none";
    
    document.getElementById("btnipending").style.fontWeight = "normal";
    document.getElementById("btnireceive").style.fontWeight = "bold";
    document.getElementById("btniwarehouse").style.fontWeight = "normal";
}

function funcIWarehouse() {
    document.getElementById("ipending").style.display = "none";
    document.getElementById("ireceive").style.display = "none";
    document.getElementById("iwarehouse").style.display = "block";
    
    document.getElementById("btnipending").style.fontWeight = "normal";
    document.getElementById("btnireceive").style.fontWeight = "normal";
    document.getElementById("btniwarehouse").style.fontWeight = "bold";
}

function funcSItem() {
    document.getElementById("sitem").style.display = "block";
    document.getElementById("srequest").style.display = "none";
    document.getElementById("sinsuff").style.display = "none";
    document.getElementById("sproceed").style.display = "none";
    document.getElementById("sreceive").style.display = "none";
    
    document.getElementById("btnsitem").style.fontWeight = "bold";
    document.getElementById("btnsrequest").style.fontWeight = "normal";
    document.getElementById("btnsinsuff").style.fontWeight = "normal";
    document.getElementById("btnsproceed").style.fontWeight = "normal";
    document.getElementById("btnsreceive").style.fontWeight = "normal";
}

function funcSRequest() {
    document.getElementById("sitem").style.display = "none";
    document.getElementById("srequest").style.display = "block";
    document.getElementById("sinsuff").style.display = "none";
    document.getElementById("sproceed").style.display = "none";
    document.getElementById("sreceive").style.display = "none";
    
    document.getElementById("btnsitem").style.fontWeight = "normal";
    document.getElementById("btnsrequest").style.fontWeight = "bold";
    document.getElementById("btnsinsuff").style.fontWeight = "normal";
    document.getElementById("btnsproceed").style.fontWeight = "normal";
    document.getElementById("btnsreceive").style.fontWeight = "normal";
}

function funcSInsuff() {
    document.getElementById("sitem").style.display = "none";
    document.getElementById("srequest").style.display = "none";
    document.getElementById("sinsuff").style.display = "block";
    document.getElementById("sproceed").style.display = "none";
    document.getElementById("sreceive").style.display = "none";

    document.getElementById("btnsitem").style.fontWeight = "normal";
    document.getElementById("btnsrequest").style.fontWeight = "normal";
    document.getElementById("btnsinsuff").style.fontWeight = "bold";
    document.getElementById("btnsproceed").style.fontWeight = "normal";
    document.getElementById("btnsreceive").style.fontWeight = "normal";
}

function funcSProceed() {
    document.getElementById("sitem").style.display = "none";
    document.getElementById("srequest").style.display = "none";
    document.getElementById("sinsuff").style.display = "none";
    document.getElementById("sproceed").style.display = "block";
    document.getElementById("sreceive").style.display = "none";

    document.getElementById("btnsitem").style.fontWeight = "normal";
    document.getElementById("btnsrequest").style.fontWeight = "normal";
    document.getElementById("btnsinsuff").style.fontWeight = "normal";
    document.getElementById("btnsproceed").style.fontWeight = "bold";
    document.getElementById("btnsreceive").style.fontWeight = "normal";
}

function funcSReceive() {
    document.getElementById("sitem").style.display = "none";
    document.getElementById("srequest").style.display = "none";
    document.getElementById("sinsuff").style.display = "none";
    document.getElementById("sproceed").style.display = "none";
    document.getElementById("sreceive").style.display = "block";

    document.getElementById("btnsitem").style.fontWeight = "normal";
    document.getElementById("btnsrequest").style.fontWeight = "normal";
    document.getElementById("btnsinsuff").style.fontWeight = "normal";
    document.getElementById("btnsproceed").style.fontWeight = "normal";
    document.getElementById("btnsreceive").style.fontWeight = "bold";
}

function funcCRequest() {
    document.getElementById("crequest").style.display = "block";
    document.getElementById("chistory").style.display = "none";
    
    document.getElementById("btncrequest").style.fontWeight = "bold";
    document.getElementById("btnchistory").style.fontWeight = "normal";
}

function funcCHistory() {
    document.getElementById("crequest").style.display = "none";
    document.getElementById("chistory").style.display = "block";

    document.getElementById("btncrequest").style.fontWeight = "normal";
    document.getElementById("btnchistory").style.fontWeight = "bold";
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
    document.getElementById("rpurchase").style.display = "block";
    document.getElementById("rapprove").style.display = "none";
    document.getElementById("rhistory").style.display = "none";
    
    document.getElementById("btnrpurchase").style.fontWeight = "bold";
    document.getElementById("btnrapprove").style.fontWeight = "normal";
    document.getElementById("btnrhistory").style.fontWeight = "normal";
}

function funcRApprove() {
    document.getElementById("rpurchase").style.display = "none";
    document.getElementById("rapprove").style.display = "block";
    document.getElementById("rhistory").style.display = "none";
    
    document.getElementById("btnrpurchase").style.fontWeight = "normal";
    document.getElementById("btnrapprove").style.fontWeight = "bold";
    document.getElementById("btnrhistory").style.fontWeight = "normal";
}

function funcRHistory() {
    document.getElementById("rpurchase").style.display ="none";
    document.getElementById("rapprove").style.display = "none";
    document.getElementById("rhistory").style.display ="block";
    
    document.getElementById("btnrpurchase").style.fontWeight = "normal";
    document.getElementById("btnrapprove").style.fontWeight = "normal";
    document.getElementById("btnrhistory").style.fontWeight = "bold";
}

function funcWPending() {
    document.getElementById("wpending").style.display = "block";
    document.getElementById("wslot").style.display = "none";
    document.getElementById("wwarehouse").style.display = "none";
    document.getElementById("wstore").style.display = "none";
    
    document.getElementById("btnwpending").style.fontWeight = "bold";
    document.getElementById("btnwslot").style.fontWeight = "normal";
    document.getElementById("btnwwarehouse").style.fontWeight = "normal";
    document.getElementById("btnwstore").style.fontWeight = "normal";
}

function funcWSlot() {
    document.getElementById("wpending").style.display = "none";
    document.getElementById("wslot").style.display = "block";
    document.getElementById("wwarehouse").style.display = "none";
    document.getElementById("wstore").style.display = "none";
    
    document.getElementById("btnwpending").style.fontWeight = "normal";
    document.getElementById("btnwslot").style.fontWeight = "bold";
    document.getElementById("btnwwarehouse").style.fontWeight = "normal";
    document.getElementById("btnwstore").style.fontWeight = "normal";
}

function funcWWarehouse() {
    document.getElementById("wpending").style.display = "none";
    document.getElementById("wslot").style.display = "none";
    document.getElementById("wwarehouse").style.display = "block";
    document.getElementById("wstore").style.display = "none";
    
    document.getElementById("btnwpending").style.fontWeight = "normal";
    document.getElementById("btnwslot").style.fontWeight = "normal";
    document.getElementById("btnwwarehouse").style.fontWeight = "bold";
    document.getElementById("btnwstore").style.fontWeight = "normal";
}

function funcWStore() {
    document.getElementById("wpending").style.display = "none";
    document.getElementById("wslot").style.display = "none";
    document.getElementById("wwarehouse").style.display = "none";
    document.getElementById("wstore").style.display = "block";
    
    document.getElementById("btnwpending").style.fontWeight = "normal";
    document.getElementById("btnwslot").style.fontWeight = "normal";
    document.getElementById("btnwwarehouse").style.fontWeight = "normal";
    document.getElementById("btnwstore").style.fontWeight = "bold";
}

function funcAAdmin() {
    document.getElementById("aadmin").style.display = "block";
    document.getElementById("astaff").style.display = "none";
    document.getElementById("acustomer").style.display = "none";
    
    document.getElementById("btnaadmin").style.fontWeight = "bold";
    document.getElementById("btnastaff").style.fontWeight = "normal";
    document.getElementById("btnacustomer").style.fontWeight = "normal";
}

function funcAStaff() {
    document.getElementById("aadmin").style.display = "none";
    document.getElementById("astaff").style.display = "block";
    document.getElementById("acustomer").style.display = "none";
    
    document.getElementById("btnaadmin").style.fontWeight = "normal";
    document.getElementById("btnastaff").style.fontWeight = "bold";
    document.getElementById("btnacustomer").style.fontWeight = "normal";
}

function funcACustomer() {
    document.getElementById("aadmin").style.display = "none";
    document.getElementById("astaff").style.display = "none";
    document.getElementById("acustomer").style.display = "block";
    
    document.getElementById("btnaadmin").style.fontWeight = "normal";
    document.getElementById("btnastaff").style.fontWeight = "normal";
    document.getElementById("btnacustomer").style.fontWeight = "bold";
}

function funcPPurchase() {
    document.getElementById("ppurchase").style.display = "block";
    document.getElementById("pship").style.display = "none";
    document.getElementById("pcredit").style.display ="none";
    document.getElementById("poutstand").style.display = "none";
    document.getElementById("prefund").style.display = "none";
    document.getElementById("phistory").style.display = "none";
    document.getElementById("prhistory").style.display = "none";
    
    document.getElementById("btnppurchase").style.fontWeight = "bold";
    document.getElementById("btnpship").style.fontWeight = "normal";
    document.getElementById("btnpcredit").style.fontWeight = "normal";
    document.getElementById("btnpoutstand").style.fontWeight = "normal";
    document.getElementById("btnprefund").style.fontWeight = "normal";
    document.getElementById("btnphistory").style.fontWeight = "normal";
    document.getElementById("btnprhistory").style.fontWeight = "normal";
}

function funcPShip() {
    document.getElementById("ppurchase").style.display = "none";
    document.getElementById("pship").style.display = "block";
    document.getElementById("pcredit").style.display ="none";
    document.getElementById("poutstand").style.display = "none";
    document.getElementById("prefund").style.display = "none";
    document.getElementById("phistory").style.display = "none";
    document.getElementById("prhistory").style.display = "none";
    
    document.getElementById("btnppurchase").style.fontWeight = "normal";
    document.getElementById("btnpship").style.fontWeight = "bold";
    document.getElementById("btnpcredit").style.fontWeight = "normal";
    document.getElementById("btnprefund").style.fontWeight = "normal";
    document.getElementById("btnpoutstand").style.fontWeight = "normal";
    document.getElementById("btnphistory").style.fontWeight = "normal";
    document.getElementById("btnprhistory").style.fontWeight = "normal";
}

function funcPCredit() {
    document.getElementById("ppurchase").style.display = "none";
    document.getElementById("pship").style.display = "none";
    document.getElementById("pcredit").style.display ="block";
    document.getElementById("poutstand").style.display = "none";
    document.getElementById("prefund").style.display = "none";
    document.getElementById("phistory").style.display = "none";
    document.getElementById("prhistory").style.display = "none";
    
    document.getElementById("btnppurchase").style.fontWeight = "normal";
    document.getElementById("btnpship").style.fontWeight = "normal";
    document.getElementById("btnpcredit").style.fontWeight = "bold";
    document.getElementById("btnprefund").style.fontWeight = "normal";
    document.getElementById("btnpoutstand").style.fontWeight = "normal";
    document.getElementById("btnphistory").style.fontWeight = "normal";
    document.getElementById("btnprhistory").style.fontWeight = "normal";
}

function funcPOutstand() {
    document.getElementById("ppurchase").style.display = "none";
    document.getElementById("pship").style.display = "none";
    document.getElementById("pcredit").style.display ="none";
    document.getElementById("poutstand").style.display = "block";
    document.getElementById("prefund").style.display = "none";
    document.getElementById("phistory").style.display = "none";
    document.getElementById("prhistory").style.display = "none";
    
    document.getElementById("btnppurchase").style.fontWeight = "normal";
    document.getElementById("btnpship").style.fontWeight = "normal";
    document.getElementById("btnpcredit").style.fontWeight = "normal";
    document.getElementById("btnprefund").style.fontWeight = "normal";
    document.getElementById("btnpoutstand").style.fontWeight = "bold";
    document.getElementById("btnphistory").style.fontWeight = "normal";
    document.getElementById("btnprhistory").style.fontWeight = "normal";
}

function funcPRefund() {
    document.getElementById("ppurchase").style.display = "none";
    document.getElementById("pship").style.display = "none";
    document.getElementById("pcredit").style.display ="none";
    document.getElementById("poutstand").style.display = "none";
    document.getElementById("prefund").style.display = "block";
    document.getElementById("phistory").style.display = "none";
    document.getElementById("prhistory").style.display = "none";
    
    document.getElementById("btnppurchase").style.fontWeight = "normal";
    document.getElementById("btnpship").style.fontWeight = "normal";
    document.getElementById("btnpcredit").style.fontWeight = "normal";
    document.getElementById("btnpoutstand").style.fontWeight = "normal";
    document.getElementById("btnprefund").style.fontWeight = "bold";
    document.getElementById("btnphistory").style.fontWeight = "normal";
    document.getElementById("btnprhistory").style.fontWeight = "normal";
}

function funcPHistory() {
    document.getElementById("ppurchase").style.display = "none";
    document.getElementById("pship").style.display = "none";
    document.getElementById("pcredit").style.display ="none";
    document.getElementById("poutstand").style.display = "none";
    document.getElementById("prefund").style.display = "none";
    document.getElementById("phistory").style.display = "block";
    document.getElementById("prhistory").style.display = "none";
    
    document.getElementById("btnppurchase").style.fontWeight = "normal";
    document.getElementById("btnpship").style.fontWeight = "normal";
    document.getElementById("btnpcredit").style.fontWeight = "normal";
    document.getElementById("btnprefund").style.fontWeight = "normal";
    document.getElementById("btnpoutstand").style.fontWeight = "normal";
    document.getElementById("btnphistory").style.fontWeight = "bold";
    document.getElementById("btnprhistory").style.fontWeight = "normal";
}

function funcPRHistory() {
    document.getElementById("ppurchase").style.display = "none";
    document.getElementById("pship").style.display = "none";
    document.getElementById("pcredit").style.display ="none";
    document.getElementById("poutstand").style.display = "none";
    document.getElementById("prefund").style.display = "none";
    document.getElementById("phistory").style.display = "none";
    document.getElementById("prhistory").style.display = "block";
    
    document.getElementById("btnppurchase").style.fontWeight = "normal";
    document.getElementById("btnpship").style.fontWeight = "normal";
    document.getElementById("btnpcredit").style.fontWeight = "normal";
    document.getElementById("btnprefund").style.fontWeight = "normal";
    document.getElementById("btnpoutstand").style.fontWeight = "normal";
    document.getElementById("btnphistory").style.fontWeight = "normal";
    document.getElementById("btnprhistory").style.fontWeight = "bold";
}

function funcORate() {
    document.getElementById("orate").style.display = "block";
    document.getElementById("omessage").style.display = "none";
    document.getElementById("olog").style.display = "none";
    
    document.getElementById("btnorate").style.fontWeight = "bold";
    document.getElementById("btnomessage").style.fontWeight = "normal";
    document.getElementById("btnolog").style.fontWeight = "normal";
}

function funcOMessage() {
    document.getElementById("orate").style.display = "none";
    document.getElementById("omessage").style.display = "block";
    document.getElementById("olog").style.display = "none";
    
    document.getElementById("btnorate").style.fontWeight = "normal";
    document.getElementById("btnomessage").style.fontWeight = "bold";
    document.getElementById("btnolog").style.fontWeight = "normal";
}

function funcOLog() {
    document.getElementById("orate").style.display = "none";
    document.getElementById("omessage").style.display = "none";
    document.getElementById("olog").style.display = "block";
    
    document.getElementById("btnorate").style.fontWeight = "normal";
    document.getElementById("btnomessage").style.fontWeight = "normal";
    document.getElementById("btnolog").style.fontWeight = "bold";
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