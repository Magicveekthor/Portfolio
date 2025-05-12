<?php 
include "admin/includes/db.php";
include "includes/functions.php";

if(isset($_GET['product_category'])){
    $product_category = $_GET['product_category'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Collection | LAURA AMAH</title>
    <link rel="shortcut icon" href="admin/images/soulwhite.png" type="image/png">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slick-theme.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
        <?php include 'includes/header.php';?>

        <!-- Content -->
        <div class="shop-heading text-center">
            <h1><?php echo $product_category ?></h1>
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shop</li>
            </ul>
        </div>
        <div class="container container-content">
            <div class="shop-top">
                <div class="shop-element right">
                    <div class="view-mode view-group">
                        <a class="list-icon list"><i class="fa fa-circle" aria-hidden="true"></i></a>
                        <a class="grid-icon col active"><i class="zoa-icon-view-3"></i></a>
                    </div>
                </div>
            </div>
            <div class="product-collection-grid product-grid bd-bottom">
                <div class="row engoc-row-equal">

                    <?php
                        $query_product = "SELECT * FROM soul_products where p_categories = '$product_category'";
                        $result_product = mysqli_query($mysqli, $query_product);
                        $num_of_rows = mysqli_num_rows($result_product);

                        if($num_of_rows == 0) {
                            echo "<div class='zoa-404'>
                                    <div class='container'>
                                        <div class='row' data-aos='fade-up' data-aos-duration='1000' data-aos-easing='ease-in-out'>
                                            <div class='col-xs-12 col-sm-6 col-md-6'>
                                                <img src='img/404.png' class='img-responsive' alt=''>
                                            </div>
                                            <div class='col-xs-12 col-sm-6 col-md-6'>
                                                <h1>Whoops!</h1>
                                                <h3>Your style does not exist!</h3>
                                                <p>Any question? please contact us.</p>
                                                <a href='shop.php' class='zoa-back'>Continue Shopping</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>";
                        }

                        while($row = $result_product->fetch_assoc()) { ?>

                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 product-item">
                        <div class="product-img">
                            <a href="single-product.php?id=<?php echo $row['id']; ?>"><img src="admin/images/products/covers/<?php echo $row['cover_image'] ?>" alt="" class="img-responsive"></a>
                        </div>
                        <div class="product-info text-center">
                            <h3 class="product-title">
                                <a href="#"><?php echo $row['p_name'] ?></a>
                            </h3>
                            <div class="product-price">
                                <span>$<?php echo $row['p_price'] ?></span>
                            </div>
                        </div>
                    </div>

                    <?php } ?>


                    <!-- <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 product-item">
                        <div class="product-img">
                            <a href="#"><img src="img/product/product_3.jpg" alt="" class="img-responsive"></a>
                            
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
                            <div class="color-group">
                                <a href="#" class="circle gray"></a>
                                <a href="#" class="circle yellow active"></a>
                                <a href="#" class="circle white"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 product-item">
                        <div class="product-img">
                            <a href="#"><img src="img/product/product_4.jpg" alt="" class="img-responsive"></a>
                            
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
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 product-item">
                        <div class="product-img">
                            <a href="#"><img src="img/product/product_1.jpg" alt="" class="img-responsive"></a>
                            <div class="ribbon zoa-hot"><span>Hot</span></div>
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
                            <div class="short-desc">
                                <p class="product-desc">Round neck sweater with long sleeves. Features a knotted opening in the <br> front. Phasellus gravida dolor in sem placerat sodales lullam feugiat non <br>dolor id commodo.</p>
                            </div>
                            <div class="product-price">
                                <span>$20.9</span>
                            </div>
                            <div class="product-bottom-group">
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
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 product-item">
                        <div class="product-img">
                            <a href="#"><img src="img/product/product_2.jpg" alt="" class="img-responsive"></a>
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
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 product-item">
                        <div class="product-img">
                            <a href="#"><img src="img/product/product_3.jpg" alt="" class="img-responsive"></a>
                            
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
                            <div class="color-group">
                                <a href="#" class="circle gray"></a>
                                <a href="#" class="circle yellow active"></a>
                                <a href="#" class="circle white"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 product-item">
                        <div class="product-img">
                            <a href="#"><img src="img/product/product_4.jpg" alt="" class="img-responsive"></a>
                            
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
                    </div> -->
                </div>
            </div>
        </div>

        <?php include "includes/footer.php"; ?>
        <!-- EndContent -->
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/countdown.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="js/main.js"></script>
    <script>
        var popup =document.getElementById("popup");
        function closepop(){
            popup.classList.remove("active");
        }

        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting){
                    entry.target.classList.add("in-view")
                    entry.target.classList.remove("not-in-view")
                } else {
                    entry.target.classList.remove("in-view")
                    entry.target.classList.add("not-in-view")
                }
            })
        }, {
            rootMargin: "0px",
            threshold: [0, 0.1, 1]
        },
        );

        const tags = document.querySelectorAll(".product-item, .hover-images, .newsletter, footer")
        tags.forEach((tag) => {
            observer.observe(tag)
        })
    </script>
</body>
</html>