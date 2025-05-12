<?php 
session_start();
include ('../admin/includes/db.php');

if(isset($_POST['place_order'])) {

    #1. get user info and store it in databases
    $full_name = $_POST['full_name'];
    $user_email = $_POST['user_email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $postcode = $_POST['postcode'];
    $order_cost = $_SESSION['total'];
    $order_status = "Not paid";
    $order_date = date('Y-m-d H:i:s');

    #if user is not logged in
    if(!isset($_SESSION['logged_in'])) {
        $user_id = 'Guest';

        #if user is logged in
    } else {
        $user_id = $_SESSION['user_id'];
    }

    $stmt = $mysqli->prepare("INSERT INTO soul_orders (order_cost, order_status, user_id, full_name, email, user_phone, user_address, user_country, postcode, order_date)
                    VALUES (?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param('isssssssis', $order_cost, $order_status, $user_id, $full_name, $user_email, $phone, $address, $country, $postcode, $order_date);
    $stmt_status = $stmt->execute();

    if(!$stmt_status) {
        header('Location: home.php');
        exit();
    }

    #2. issue new order and store order info in databases
    $order_id = $stmt->insert_id;

    #3. get products from cart (from session)
    foreach($_SESSION['cart'] as $key => $value) {
        
        $product = $_SESSION['cart'][$key];
        $id = $product['id'];
        $p_name = $product['p_name'];
        $p_price = $product['p_price'];
        $p_color = $product['p_color'];
        $p_size = $product['p_size'];
        $p_quantity = $product['p_quantity'];
        $cover_image = $product['cover_image'];


        #4. store each single item in order_items databases
        $stmt1 = $mysqli->prepare("INSERT INTO soul_order_items(order_id, product_id, product_name, product_price, product_color, product_size, product_quantity, product_image, user_id, order_date)
                            VALUES(?,?,?,?,?,?,?,?,?,?)");
        $stmt1->bind_param('iisissisis',$order_id, $id, $p_name, $p_price, $p_color, $p_size, $p_quantity, $cover_image, $user_id, $order_date);
        $stmt1->execute();

    }

    #5. remove everything from cart --> dely until payment is done

    $_SESSION['order_id'] = $order_id;


    #6. inform user whether everything is fine or report error
    header("Location: ../payment.php?order_status=order placed successfully&user_email=$user_email");

    
}

?>