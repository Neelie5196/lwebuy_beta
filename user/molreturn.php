<?php
require_once '../connection/config.php';
session_start();
$user_id = $_SESSION['user_id'];

    $vkey ="70f63dd3248105cd2e0b6d57c6d0bc3c" ; //Replace xxxxxxxxxxxx with your MOLPay Secret_Key

    /********************************
    *Don't change below parameters
    ********************************/
    $tranID = $_POST['tranID'];
    $orderid = $_POST['orderid'];
    $status = $_POST['status'];
    $domain = $_POST['domain'];
    $amount = $_POST['amount'];
    $currency = $_POST['currency'];
    $appcode = $_POST['appcode'];
    $paydate = $_POST['paydate'];
    $skey = $_POST['skey'];

    /***********************************************************
    * To verify the data integrity sending by MOLPay
    ************************************************************/
    $key0 = md5( $tranID.$orderid.$status.$domain.$amount.$currency );
    $key1 = md5( $paydate.$domain.$key0.$appcode.$vkey );

    if( $skey != $key1 ) $status= -1; // Invalid transaction.

    // Merchant might issue a requery to MOLPay to double check payment status with MOLPay.
    if ( $status == "00" ) 
    {
        $status = 'Paid';
        $title = 'Pay Order by';
        $molpay = 'MOLPay';
        $statuss = 'Waiting for Accept';
        
        $result = mysqli_query($con, "UPDATE order_item SET status='$status' WHERE payment_id='$orderid'") or die(mysqli_error($con));
        
        $result1 = mysqli_query($con, "INSERT INTO payment SET payment_id='$orderid', user_id='$user_id', title='$title $molpay', amount='$amount', status='$statuss'") or die(mysqli_error($con));
        ?>
        <script>
        alert('Successful to Pay');
        window.location.href='main.php#purchase';
        </script>
        <?php
    }
    else
    {
        $result = mysqli_query($con, "UPDATE order_item SET payment_id=NULL WHERE payment_id='$orderid'") or die(mysqli_error($con));
        ?>
        <script>
        alert('Error While Payment, Please try again');
        window.location.href='main.php#purchase';
        </script>
        <?php
    }
?>