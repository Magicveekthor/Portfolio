<?php 
include "admin/includes/db.php";
include "includes/functions.php";

session_start();

// if(empty($_SESSION['cart'])) {
//     header('Location: home.php');
// }

if(isset($_POST['add_to_cart'])) {

    #if user has already added a product to cart
    if(isset($_SESSION['cart'])) {
        $products_array_ids = array_column($_SESSION['cart'],"id");
        #if products has already been added in cart or not
        if(!in_array($_POST['id'], $products_array_ids)){

            $id = $_POST['id'];
    
            $product_array = array('id' => $_POST['id'], 'p_name' => $_POST['p_name'], 'p_price' => $_POST['p_price'], 'p_color' => $_POST['p_color'], 'p_size' => $_POST['p_size'], 'p_quantity' => $_POST['quantity'], 'cover_image' => $_POST['cover_image']);
            $_SESSION['cart'][$id] = $product_array;

            #product has already been added (else)
        } else {
            echo '<script>alert("Product already in cart")</script>';
        }
        #if this is the first produst
    } else {
        $id = $_POST['id'];
        $p_name = $_POST['p_name'];
        $p_price = $_POST['p_price'];
        $p_color = $_POST['p_color'];
        $p_size = $_POST['p_size'];
        $p_quantity = $_POST['quantity'];
        $cover_image = $_POST['cover_image'];

        $product_array = array('id' => $id, 'p_name' => $p_name, 'p_price' => $p_price, 'p_color' => $p_color, 'p_size' => $p_size, 'p_quantity' => $p_quantity, 'cover_image' => $cover_image);
        
        $_SESSION['cart'][$id] = $product_array;
    }

    //calculate total cart
    calculateTotalCart();

    //remove product from cart
} else if(isset($_POST['remove_product'])){

    $id = $_POST['id'];
    unset($_SESSION['cart'][$id]);

    //calculate total cart
    calculateTotalCart();

} else if(isset($_POST['edit_quantity'])) {
    $id = $_POST['id'];
    $p_quantity = $_POST['p_quantity'];

    $product_array = $_SESSION['cart'][$id];

    $product_array['p_quantity'] = $p_quantity;

    $_SESSION['cart'][$id] = $product_array;

    //calculate total cart
    calculateTotalCart();
}


function calculateTotalCart(){
    $total_price = 0;
    $total_quantity = 0;
    $delivery = 10;

    foreach($_SESSION['cart'] as $key => $value){
        $product = $_SESSION['cart'][$key];

        $price = $product['p_price'];
        $quantity = $product['p_quantity'];

        $total_price = $total_price + ($price * $quantity);
        $total_quantity = $quantity + $total_quantity;
    }

    $_SESSION['total'] = $total_price + $delivery;
    $_SESSION['quantity'] = $total_quantity;
    $_SESSION['delivery'] = $delivery;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Cart | LAURA AMAH</title>
    <link rel="shortcut icon" href="admin/images/soulwhite.png" type="image/png">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slick-theme.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
        <?php include 'includes/header.php';?>

        <!-- Shopping cart -->
        <div class="container">
            <div class="zoa-cart">
            <ul class="account-tab">
                <li class="active"><a data-toggle="tab" href="#cart" aria-expanded="false">Shopping Cart</a></li>
                <!-- <li class=""><a data-toggle="tab" href="#wishlist" aria-expanded="true">Wishlist</a></li> -->
            </ul>
            <div class="tab-content">
                <div id="cart" class="tab-pane fade in active">
                    <div class="shopping-cart">
                        <div class="table-responsive">
                            <table class="table cart-table">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Product</th>
                                        <th class="product-name">Description</th>
                                        <th class="product-name">Color</th>
                                        <th class="product-name">Size</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total Price</th>
                                        <th class="product-remove">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  if(isset($_SESSION['cart'])){ ?>
                                    <?php foreach($_SESSION['cart'] as $key => $value){ ?>
                                    <tr class="item_cart">
                                        <td class=" product-name">
                                            <div class="product-img">
                                                <img src="admin/images/products/covers/<?php echo $value['cover_image'] ?>" alt="Product">
                                            </div>
                                        </td>
                                        <td class="product-desc">
                                            <div class="product-info">
                                                <a href="#" title=""><?php echo $value['p_name'] ?> </a>
                                                <span>#SKU: 113106</span>
                                            </div>
                                        </td>
                                        <td class="product-same">
                                            <div class="product-info">
                                                <p><?php echo $value['p_color'] ?></p>
                                            </div>
                                        </td>
                                        <td class="product-same">
                                            <div class="product-info">
                                                <p><?php echo $value['p_size'] ?></p>
                                            </div>
                                        </td>
                                        <td class="product-same total-price">
                                            <p class="price">$<?php echo $value['p_price'] ?></p>
                                        </td>
                                        <form method="POST" action="cart.php">
                                            <td class="bcart-quantity single-product-detail" style="padding-right: 20px;">
                                                <div class="cart-qtt" style="display: flex; gap: 6px;">
                                                    <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
                                                    <input type="text" name="p_quantity" value="<?php echo $value['p_quantity'] ?>">
                                                    <input type="submit" value="Update Quantity" name="edit_quantity">
                                                </div>
                                            </td>
                                        </form>
                                        <td class="total-price">
                                            <p class="price">$<?php echo $value['p_quantity'] * $value['p_price'] ?></p>
                                        </td>
                                        <form method="POST" action="cart.php">
                                            <td class="product-remove">
                                                <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
                                                <input type="submit" name="remove_product" class="btn-del" value="Remove">
                                            </td>
                                        </form>
                                    </tr>
                                    <?php } ?>

                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="table-cart-bottom">
                            <div class="row">
                                <!-- <div class="col-md-7 col-sm-6 col-xs-12">
                                    <div class="cart-btn-group">
                                        <a href="#" class="btn-continue">Continue shopping</a>
                                        <a href="#" class="btn-clear">clear cart</a>
                                    </div>
                                    <div class="coupon-group">
                                        <form class="form_coupon" action="#" method="post">
                                            <input type="email" value="" placeholder="COUPON CODE" name="EMAIL" id="mail" class="newsletter-input form-control">
                                            <div class="input-icon">
                                                <img src="img/coupon.png" alt="">
                                            </div>
                                        </form>
                                    <a href="#" class="btn-update">Update cart</a>
                                    </div>
                                </div> -->
                                <div class="col-md-5 col-sm-6 col-xs-12">
                                    <div class="cart-text">
                                        <!-- <div class="cart-element">
                                            <p>Total products:</p>
                                            <p>$118.00</p>
                                        </div> -->
                                        
                                            <div class="cart-element">
                                                <p>Estimated shipping costs:</p>
                                                <?php if(empty($_SESSION['cart'])) { ?>
                                                    <p>0.00</p>
                                                <?php } else { ?>
                                                    <p>$<?php echo $_SESSION['delivery'] ?></p>
                                                <?php } ?>
                                            </div>

                                            <div class="cart-element text-bold">
                                            <?php if(isset($_SESSION['cart'])) { ?>
                                                <p>Total:</p>
                                                <p>$<?php echo $_SESSION['total']; ?></p>
                                            <?php } ?>
                                            </div>
                                    </div>
                                    <form method="POST" action="check-out.php">
                                        <?php 
                                        if(empty($_SESSION['cart'])) {
                                            echo "<a href='shop.php' class='zoa-btn zoa-checkout'>Start Shopping</a>";
                                        } else {
                                            echo "<button type='submit' name='checkout' class='zoa-btn zoa-checkout'>Checkout</button>";
                                        }
                                        ?>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div id="wishlist" class="tab-pane fade">
                    <div class="shopping-cart">
                        <div class="table-responsive">
                            <table class="table cart-table">
                                
                                <tbody>
                                    <tr class="item_cart">
                                        <td class="product-remove pd-right-30">
                                            <a href="#" class="btn-del"><i class="ion-ios-close-empty"></i></a>
                                        </td>
                                        <td class=" product-name">
                                            <div class="product-img">
                                                <img src="img/product/cart_product_1.jpg" alt="Product">
                                            </div>
                                        </td>
                                        <td class="product-desc">
                                            <div class="product-info">
                                                <a href="#" title="">Harman Kardon Onyx Studio </a>
                                                <span>#SKU: 113106</span>
                                            </div>
                                        </td>
                                        <td class="wl total-price">
                                            <p class="price">$19.00</p>
                                        </td>
                                        <td>
                                            <a href="#" class="zoa-select">Select Options</a>
                                        </td>
                                        <td>
                                            <a href="#" class="zoa-btn zoa-wl-addcart">ADD TO CART</a>
                                        </td>
                                    </tr>
                                     <tr class="item_cart">
                                        <td class="product-remove pd-right-30">
                                            <a href="#" class="btn-del"><i class="ion-ios-close-empty"></i></a>
                                        </td>
                                        <td class=" product-name">
                                            <div class="product-img">
                                                <img src="img/product/cart_product_3.jpg" alt="Product">
                                            </div>
                                        </td>
                                        <td class="product-desc">
                                            <div class="product-info">
                                                <a href="#" title="">Harman Kardon Onyx Studio </a>
                                                <span>#SKU: 113106</span>
                                            </div>
                                        </td>
                                        <td class="wl total-price">
                                            <p class="price">$19.00</p>
                                        </td>
                                        <td>
                                            <a href="#" class="zoa-select">Select Options</a>
                                        </td>
                                        <td>
                                            <a href="#" class="zoa-btn zoa-wl-addcart">ADD TO CART</a>
                                        </td>
                                    </tr>
                                </tbody>    
                            </table>
                        </div>
                        <div class="table-cart-bottom v2">
                            <div class="cart-btn-group v2">
                                        <a href="#" class="btn-continue">Continue shopping</a>
                                        <a href="#" class="btn-clear">Share my wishlist via mail <img src="img/Icon_mail.png" alt=""></a>
                                    </div>
                        </div>
                    </div>
                </div> -->
            
            </div>
            </div>   
        </div>
        <!-- End Shopping cart -->
        
        <?php include "includes/footer.php"; ?>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/countdown.js"></script>
    <script src="js/main.js"></script>
</body>
</html>