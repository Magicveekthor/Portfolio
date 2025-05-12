<?php 
include "admin/includes/db.php";
include "includes/functions.php";
require_once 'vendor/autoload.php';

session_start();

if(isset($_POST['pay_now'])) {
    $transaction_id = rand();
    $order_status = $_POST['order_status'];
    $order_total_price = $_POST['order_total_price'];
    $user_email = $_SESSION['user_email'];
}

if(isset($_GET['user_email'])) {
    $user_email = $_GET['user_email'];
}



if(isset($_POST['order_status']) && $_POST['order_status'] == "Not paid")  {
    $order_id = $_POST['order_id'];
    if(!isset($_SESSION['logged_in'])) {
        $user_email = $_POST['user_email'];
        #if user is logged in
    } else {
        $user_email = $_SESSION['user_email'];
    }
} else if(isset($_SESSION['total']) && $_SESSION['total'] != 0) { 
    $transaction_id = rand();
    $order_total_price = strval($_SESSION['total']);
    $order_id = $_SESSION['order_id'];
    // if(!isset($_SESSION['logged_in'])) {
    //     $user_email = $_POST['user_email'];
    //     #if user is logged in
    // } else {
    //     $user_email = $_SESSION['user_email'];
    // }
}





$stripe_secret_key = "sk_test_51O2WhKAIWV5PtCxaP4ssjmU8QQcuQ7YsjDvcRuTqoTYtmNWO2B8nvWQpbSusCLS5yjO9vDw28LEzU7v7bzOqDy4A006W7bBEvh";

\Stripe\Stripe::setApiKey($stripe_secret_key);
$checkout_session = \Stripe\Checkout\Session::create([
    "mode" => "payment",
    "success_url" => "http://localhost/soul/includes/complete_payment.php?transaction_id=$transaction_id&order_id=$order_id&user_email=$user_email",
    "line_items" => [
        [
            "quantity" => 1,
            "price_data" => [
                "currency" => "gbp",
                "unit_amount" => $order_total_price * 100,
                "product_data" => [
                    "name" => "LAURA AMAH COLLECTION"
                ]
            ]
        ]
    ]
]);

http_response_code(303);
header("Location: " . $checkout_session->url);
?>

