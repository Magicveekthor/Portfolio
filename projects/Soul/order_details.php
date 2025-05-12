<?php 
session_start();

include "admin/includes/db.php";
include "includes/functions.php";

/*
Not paid 
Shipped
Delivered
*/

if(isset($_POST['order_details']) && isset($_POST['order_id'])) {
    $order_id = $_POST['order_id'];
    $order_status = $_POST['order_status'];

    $stmt = $mysqli->prepare("SELECT * FROM soul_order_items WHERE order_id=?");
    $stmt->bind_param('i', $order_id);
    $stmt->execute();
    $order_details = $stmt->get_result();

    $order_total_price = calculateTotalPrice($order_details);
} else {
    header('Location: my-account.php');
    exit();
}

function calculateTotalPrice($order_details){
    $total = 0;
    $delivery = 10;

    foreach($order_details as $row) {

        $product_price = $row['product_price'];
        $product_quantity = $row['product_quantity'];

        $total = $total + ($product_price * $product_quantity) + $delivery;
    }
    return $total;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Orders | LAURA AMAH</title>
    <link rel="shortcut icon" href="admin/images/soulwhite.png" type="image/png">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slick-theme.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
        <?php include 'includes/header.php';?>


        <!-- Content -->
        <div class="container container-content">
            <ul class="breadcrumb v2">
                <li><a href="#">Home</a></li>
                <li><a href="#">My Account</a></li>
                <li class="active">Order Details</li>
            </ul>
        </div>

        <div class="container container-content">

            <?php if($order_status == "Not paid"){ ?>
                <form method="POST" action="payment.php">
                    <div class="row" style="margin-bottom: 36px;">
                        <div class="col-md-2 col-sm-2">
                            <input type="hidden" name="order_id" value="<?php echo $_POST['order_id'] ?>">
                            <input type="hidden" name="order_total_price" value="<?php echo $order_total_price ?>">
                            <input type="hidden" name="order_status" value="<?php echo $order_status ?>">
                            <button name="pay_now" class="change">Pay Now</button>
                        </div>
                    </div>
                </form>
            <?php } ?>

            <?php foreach($order_details as $row) { ?>
            <div class="single-product-detail single-product-details">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="flex product-img-slide">
                            <div class="product-images">
                                <div class="main-img js-product-slider">
                                    <a href="#" class="hover-images effect"><img src="admin/images/products/covers/<?php echo $row['product_image'] ?>" alt="photo" class="img-responsive"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                            
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="single-product-info product-info product-grid-v2">
                            <h3 class="product-title" style="margin-bottom: 40px;"><a href="#"><?php echo $row['product_name'] ?></a></h3>
                            <!-- <div class="short-desc">
                                <p class="product-desc">The vast array of uncompleted construction projects in Nigeria is troubling, to say the least. Lots of Public projects are either abandoned or suffer from a long slowdown after huge mobilization. It is common practice to see the project not built within the stipulated time and budget. Research has identified the main cause of this to be poor project analysis and management.</p>
                            </div> -->
                            <div class="size-group">
                                <label>Color :</label>
                                <h2><?php echo $row['product_color'] ?></h2>
                            </div>
                            <div class="product-size">
                                <div class="size-group">
                                    <label>Size :</label>
                                    <h2><?php echo $row['product_size'] ?></h2>
                                </div>
                            </div>
                            <div class="product-size">
                                <div class="size-group">
                                    <label>Quantity :</label>
                                    <h2>x<?php echo $row['product_quantity'] ?></h2>
                                </div>
                            </div>
                            <div class="product-size">
                                <div class="size-group">
                                    <label>Total :</label>
                                    <h2>$
                                        <?php
                                            $_SESSION['total_price'] = $row['product_quantity'] * $row['product_price'];
                                            echo $_SESSION['total_price']; 
                                        ?>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
            <?php } ?>
            <!-- EndContent -->


            <?php include "includes/footer.php"; ?>

        </div>

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/countdown.js"></script>
        <script src="js/main.js"></script>

        <script>
            var popup =document.getElementById("popup");
            function closepop(){
                popup.classList.remove("active");
            }
        </script>
</body>
</html>