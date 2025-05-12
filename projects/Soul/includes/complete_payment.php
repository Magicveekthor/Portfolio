<?php
session_start();
include ('../admin/includes/db.php');
include_once "../Email.php";

if(isset($_GET['transaction_id']) && isset($_GET['order_id']) && isset($_GET['user_email'])){
    $order_id = $_GET['order_id'];
    $order_status = "Paid";
    $transaction_id = $_GET['transaction_id'];
    $user_email = $_GET['user_email'];
    $payment_date = date('Y-m-d H:i:s');

    #if user is not logged in
    if(!isset($_SESSION['logged_in'])) {
        $user_id = 'Guest';

        #if user is logged in
    } else {
        $user_id = $_SESSION['user_id'];
    }

    //Change order status to paid
    $stmt = $mysqli->prepare("UPDATE soul_orders SET order_status=? where order_id=?");
    $stmt->bind_param('si',$order_status, $order_id);
    $stmt->execute();

    //store payment info
    $stmt1 = $mysqli->prepare("INSERT INTO soul_payments (order_id, user_id, transaction_id, payment_date) VALUES (?,?,?,?)");
    $stmt1->bind_param('isss', $order_id, $user_id, $transaction_id, $payment_date);
    $stmt1->execute();

    //send email
    orderComplete($user_email);


    //go to user account
    if(!isset($_SESSION['logged_in'])) {
        header("Location: ../success.php");
    } else {
        header("Location: ../my-account.php?payment_message=Your order has been placed successfully!");
    }
} else {
    header("Location: ../my-account.php");
    exit();
}


?>