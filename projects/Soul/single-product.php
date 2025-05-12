<?php 
session_start();

include "admin/includes/db.php";
include "includes/functions.php";


if(isset($_SESSION['logged_in'])) {
        
    $user_id = $_SESSION['user_id'];

    $stmt3 = $mysqli->prepare("SELECT * FROM soul_users WHERE user_id=?");
    $stmt3->bind_param('i', $user_id);
    $fullname = $_SESSION['user_name'];
    $email = $_SESSION['user_email'];
}


if(isset($_GET['id'])) {
    #products at single product page
    $id = $_GET['id'];
    $stmt = $mysqli->prepare("SELECT * FROM `soul_products` WHERE id = ?");
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $single_product = $stmt->get_result();//this is an array
} else {
    header("Location: home.php");
}


if(isset($_POST['review'])) {
    $review_name = $_POST['review_name'];
    $review_email = $_POST['review_email'];
    $review_body = $_POST['review_body'];
    $id = $_GET['id'];
    $date = date("Y/m/d");

    $insert_review = "INSERT INTO `soul_reviews`(review_name, review_email, review_body, review_date, proid) VALUES('$review_name', '$review_email', '$review_body', '$date', '$id')";
    $query_review = mysqli_query($mysqli, $insert_review);
}

$id = $_GET['id'];
$review_count = "SELECT * FROM `soul_reviews` WHERE proid = '$id'";
$review_count2 = mysqli_query($mysqli, $review_count);
$review_count3 = mysqli_num_rows($review_count2);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Shop | LAURA AMAH</title>
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
                <li><a href="#">Category</a></li>
                <li class="active">Single Product</li>
            </ul>
        </div>
        <div class="container container-content">

            <?php while($row = $single_product->fetch_assoc()) { ?>
            <div class="single-product-detail">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="flex product-img-slide">
                            <div class="product-images">
                                <!-- <div class="ribbon zoa-sale"><span>-15%</span></div> -->
                                <div class="main-img js-product-slider">
                                    <?php
                                        $product_images = "SELECT * FROM soul_products as p join soul_product_detail as d on p.id=d.proid where d.proid =".$row['id'];
                                        $read_product = $mysqli -> query($product_images);
                                        foreach ($read_product as $value) {
                                    ?>
                                    <a href="#" class="hover-images effect"><img src="admin/images/products/details/<?php echo $value['images'] ?>" alt="photo" class="img-responsive"></a>
                                    <?php } ?>     
                                </div>
                            </div>
                            <div class="multiple-img-list-ver2 js-click-product">
                                <?php
                                    $product_images = "SELECT * FROM soul_products as p join soul_product_detail as d on p.id=d.proid where d.proid =".$row['id'];
                                    $read_product = $mysqli -> query($product_images);
                                    foreach ($read_product as $value) {
                                ?>
                                <div class="product-col">
                                    <div class="img active">
                                        <img src="admin/images/products/details/<?php echo $value['images'] ?>" alt="photo" class="img-responsive">
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                            
                    <form method="POST" action="cart.php">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="single-product-info product-info product-grid-v2">
                                <h3 class="product-title"><a href="#"><?php echo $row['p_name'] ?></a></h3>
                                <div class="product-price">
                                    <!-- <span class="old thin">$59.00</span> -->
                                    <span>$<?php echo $row['p_price'] ?></span>
                                </div>
                                <div class="short-desc">
                                    <p class="product-desc"><?php echo $row['p_descrip'] ?></p>
                                </div>
                                <div class="size-group">
                                    <label>Color :</label>
                                    <select class="single-option-selector" name="p_color" data-option="option1" id="productSelect-option-0">
                                        <?php
                                        $colors = explode(",", $row['p_color']);

                                        // List the options based on the retrieved values
                                        foreach ($colors as $color) {
                                            echo '<option value="' . $color . '">' . $color . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="product-size">
                                    <div class="size-group">
                                        <label>Size :</label>
                                        <select class="single-option-selector" name="p_size" data-option="option1" id="productSelect-option-0">
                                            <?php
                                            $sizes = explode(",", $row['p_size']);

                                            // List the options based on the retrieved values
                                            foreach ($sizes as $size) {
                                                echo '<option value="' . $size . '">' . $size . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <a href="#" class="size-guide">Size guide</a>
                                </div>
                                    <div class="single-product-button-group">
                                        <div class="flex align-items-center element-button">
                                            <div class="zoa-qtt">
                                                <!-- <button type="button" class="quantity-left-minus btn btn-number js-minus" data-type="minus" data-field="">
                                                </button> -->
                                                <input type="hidden" name="id" value="<?php echo $row['id']?>">
                                                <input type="hidden" name="cover_image" value="<?php echo $row['cover_image'] ?>">
                                                <input type="hidden" name="p_name" value="<?php echo $row['p_name'] ?>">
                                                <input type="hidden" name="p_price" value="<?php echo $row['p_price'] ?>">
                                                <input type="number" name="quantity" value="1" class="product_quantity_number js-number">
                                                <!-- <button type="button" class="quantity-right-plus btn btn-number js-plus" data-type="plus" data-field="">
                                                </button> -->
                                            </div>
                                            <button type="submit" name="add_to_cart" class="zoa-btn zoa-addcart">
                                                <i class="zoa-icon-cart"></i>add to cart
                                            </button>
                                        </div>
                                    </div>
                                <div class="product-tags">
                                    <div class="element-tag">
                                        <label>Keywords :</label>
                                        <a href="#"><?php echo $row['p_keyword']?></a>
                                    </div>
                                    <div class="element-tag">
                                        <label>Material/Texture :</label>
                                        <a href="#"><?php echo $row['p_material']?></a>
                                    </div>
                                    <div class="element-tag">
                                        <label>Product Type :</label>
                                        <a href="#"><?php echo $row['p_type'] ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="single-product-tab bd-bottom">
                <ul class="tabs text-center">
                    <li class="active"><a data-toggle="pill" href="#desc">Description</a></li>
                    <li><a data-toggle="pill" href="#review">Reviews<span class="review-number"><?php echo $review_count3 ?></span></a></li>
                </ul>
                <div class="tab-content">
                    <div id="desc" class="tab-pane fade in active">
                        <div class="content-desc text-center">
                            <p>
                                <?php echo $row['p_descrip'] ?>
                            </p>
                        </div>
                    </div>
                    <div id="review" class="tab-pane fade in ">
                        <ul class="review-content">
                            <?php 
                                $product_reviews = "SELECT * FROM `soul_products` as p join `soul_reviews` as d on p.id=d.proid where d.proid =".$row['id'];
                                $read_reviews = $mysqli -> query($product_reviews);
                                foreach($read_reviews as $value) {
                            ?>
                                <li class="element-review">
                                    <p class="r-name"><?php echo $value['review_name'] ?></p>
                                    <p class="r-date"><?php echo $value['review_date'] ?></p>
                                    <p class="r-desc">
                                        <?php echo $value['review_body'] ?>
                                    </p>
                                </li>
                            <?php } ?>
                        </ul>
                        <div class="review-form">
                            <h3 class="review-heading">Your Rating</h3>
                            <form method="POST">
                                <div class="cmt-form">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="name" class="form-control" name="review_name" value="<?php if(isset($fullname)){echo $fullname;}  ?>" placeholder="Name *">
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="email" id="email" class="form-control" name="review_email" value="<?php if(isset($email)){echo $email;}  ?>" placeholder="Email Address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <textarea id="message" class="form-control" name="review_body" rows="9" placeholder="Your reviews"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <button type="submit" name="review" class="zoa-btn">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php } ?>

            <!-- <div class="container container-content">
                <div class="product-related">
                    <h3 class="related-title text-center">Related products</h3>
                    <div class="owl-carousel owl-theme owl-cate v2 js-owl-cate">
                        <div class="product-item">
                            <div class="product-img">
                                <a href="#"><img src="img/product/related_1.jpg" alt="" class="img-responsive"></a>
                                <div class="ribbon zoa-sale"><span>-15%</span></div>
                                <div class="product-button-group">
                                    <a href="#" class="zoa-btn zoa-quickview">
                                        <span class="zoa-icon-quick-view"></span>
                                    </a>
                                    <a href="#" class="zoa-btn zoa-wishlist">
                                        <span class="zoa-icon-heart"></span>
                                    </a>
                                    <a href="#" class="zoa-btn zoa-addcart">
                                        <span class="zoa-icon-cart"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="product-info text-center">
                                <h3 class="product-title">
                                    <a href="#">Grosgrain tie cotton top</a>
                                </h3>
                                <div class="product-price">
                                    <span class="old">$25.5</span>
                                    <span>$20.9</span>
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="product-img">
                                <a href="#"><img src="img/product/related_2.jpg" alt="" class="img-responsive"></a>
                                <div class="product-button-group">
                                    <a href="#" class="zoa-btn zoa-quickview">
                                        <span class="zoa-icon-quick-view"></span>
                                    </a>
                                    <a href="#" class="zoa-btn zoa-wishlist">
                                        <span class="zoa-icon-heart"></span>
                                    </a>
                                    <a href="#" class="zoa-btn zoa-addcart">
                                        <span class="zoa-icon-cart"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="product-info text-center">
                                <h3 class="product-title">
                                    <a href="#">Grosgrain tie cotton top</a>
                                </h3>
                                <div class="product-price">
                                    <span>$20.9</span>
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="product-img">
                                <a href="#"><img src="img/product/related_3.jpg" alt="" class="img-responsive"></a>
                                <div class="ribbon zoa-sale"><span>-15%</span></div>
                                <div class="product-button-group">
                                    <a href="#" class="zoa-btn zoa-quickview">
                                        <span class="zoa-icon-quick-view"></span>
                                    </a>
                                    <a href="#" class="zoa-btn zoa-wishlist">
                                        <span class="zoa-icon-heart"></span>
                                    </a>
                                    <a href="#" class="zoa-btn zoa-addcart">
                                        <span class="zoa-icon-cart"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="product-info text-center">
                                <h3 class="product-title">
                                    <a href="#">Grosgrain tie cotton top</a>
                                </h3>
                                <div class="product-price">
                                    <span class="old">$25.5</span>
                                    <span>$20.9</span>
                                </div>
                                <div class="color-group">
                                    <a href="#" class="circle gray"></a>
                                    <a href="#" class="circle yellow active"></a>
                                    <a href="#" class="circle white"></a>
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="product-img">
                                <a href="#"><img src="img/product/related_4.jpg" alt="" class="img-responsive"></a>
                                <div class="ribbon zoa-hot"><span>hot</span></div>
                                <div class="product-button-group">
                                    <a href="#" class="zoa-btn zoa-quickview">
                                        <span class="zoa-icon-quick-view"></span>
                                    </a>
                                    <a href="#" class="zoa-btn zoa-wishlist">
                                        <span class="zoa-icon-heart"></span>
                                    </a>
                                    <a href="#" class="zoa-btn zoa-addcart">
                                        <span class="zoa-icon-cart"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="product-info text-center">
                                <h3 class="product-title">
                                    <a href="#">Grosgrain tie cotton top</a>
                                </h3>
                                <div class="product-price">
                                    <span>$20.9</span>
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="product-img">
                                <a href="#"><img src="img/product/related_5.jpg" alt="" class="img-responsive"></a>
                                <div class="ribbon zoa-new"><span>new</span></div>
                                <div class="product-button-group">
                                    <a href="#" class="zoa-btn zoa-quickview">
                                        <span class="zoa-icon-quick-view"></span>
                                    </a>
                                    <a href="#" class="zoa-btn zoa-wishlist">
                                        <span class="zoa-icon-heart"></span>
                                    </a>
                                    <a href="#" class="zoa-btn zoa-addcart">
                                        <span class="zoa-icon-cart"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="product-info text-center">
                                <h3 class="product-title">
                                    <a href="#">Grosgrain tie cotton top</a>
                                </h3>
                                <div class="product-price">
                                    <span>$20.9</span>
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="product-img">
                                <a href="#"><img src="img/product/related_5.jpg" alt="" class="img-responsive"></a>
                                <div class="ribbon zoa-new"><span>new</span></div>
                                <div class="product-button-group">
                                    <a href="#" class="zoa-btn zoa-quickview">
                                        <span class="zoa-icon-quick-view"></span>
                                    </a>
                                    <a href="#" class="zoa-btn zoa-wishlist">
                                        <span class="zoa-icon-heart"></span>
                                    </a>
                                    <a href="#" class="zoa-btn zoa-addcart">
                                        <span class="zoa-icon-cart"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="product-info text-center">
                                <h3 class="product-title">
                                    <a href="#">Grosgrain tie cotton top</a>
                                </h3>
                                <div class="product-price">
                                    <span>$20.9</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            

            <?php include "includes/footer.php"; ?>
            <!-- EndContent -->

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


