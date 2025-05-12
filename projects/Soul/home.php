<?php 
session_start();

include "admin/includes/db.php";
include "includes/functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Home | LAURA AMAH</title>
    <link rel="shortcut icon" href="admin/images/soulwhite.png" type="image/png">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slick-theme.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" /> -->
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
        <?php include 'includes/header.php';?>



        <!-- content -->
        <div class="slide v3">
            <div class="js-slider-v4">
                <div class="slide-img">
                    <video src="videos/1.mp4" autoplay loop muted playsinline></video>
                    <div class="box-center content2">
                        <h3>Laura Amah</h3>
                        <a href="shop.php" class="slide-btn">Shop Now</a>
                    </div>
                </div>
                <div class="slide-img">
                    <video src="videos/2.mp4" autoplay loop muted playsinline></video>
                    <div class="box-center content2">
                        <h3>Anna Collection</h3>
                        <a href="shop.php" class="slide-btn">Shop Now</a>
                    </div>
                </div>
                <div class="slide-img">
                    <video src="videos/3.mp4" autoplay loop muted playsinline></video>
                    <div class="box-center content2">
                        <h3>Anna Collection</h3>
                        <a href="shop.php" class="slide-btn">Shop Now</a>
                    </div>
                </div>
            </div>
           <div class="custom">
                <div class="pagingInfo" style="color: #fff"></div>
            </div>
        </div> 


        <!-- End content -->
        <div class="trend-product pad">
            <div class="container container-content">
                <div class="row first">
                    <div class="col-md-5 col-sm-6 col-xs-12 animate">
                        <div class="trend-img hover-images">
                            
                            <img class="img-responsive" src="img/home1/trend.png" alt="">
                            
                            <div class="box-center align-items-end">
                                <h3 class="zoa-category-box-title">
                                    <a href="#">#trend</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-6 col-xs-12">
                        <div class="row engoc-row-equal">

                            <?php include("admin/server/get_featured_products.php"); ?>

                            <?php while($row = $featured_products->fetch_assoc()) { ?>
                                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 product-item">
                                    <div class="product-img">
                                        <a href="single-product.php?id=<?php echo $row['id']; ?>"><img src="admin/images/products/covers/<?php echo $row['cover_image'] ?>" alt="" class="img-responsive"></a>
                                        <!-- <div class="ribbon zoa-new"><span>New</span></div> -->

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
                            
                            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 product-item">
                                <div class="product-img">
                                    <a href="#"><img src="img/home1/product_3.jpg" alt="" class="img-responsive"></a>
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
                            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 product-item">
                                <div class="product-img">
                                    <a href="#"><img src="img/home1/product_4.jpg" alt="" class="img-responsive"></a>
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
                            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 product-item">
                                <div class="product-img">
                                    <a href="#"><img src="img/home1/product_5.jpg" alt="" class="img-responsive"></a>
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
                            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 product-item">
                                <div class="product-img">
                                    <a href="#"><img src="img/home1/product_6.jpg" alt="" class="img-responsive"></a>
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
                </div>
            </div>
        </div>
        <div class="single-banner">
            <div class="container container-content">
                <div class="banner-img hover-images">
                    <img src="img/home1/home-1-bg.png" alt="" class="img-responsive">
                
                    <div class="box-center">
                        <div class="content">
                            <a class="text" href="#">#spring collect</a>
                            <h2>-50%</h2>
                            <a href="shop.php" class="zoa-btn btn-shopnow">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php include "includes/footer.php"; ?>
        <!-- End Footer -->
    </div>
    <a href="#" class="zoa-btn scroll_top"><i class="ion-ios-arrow-up"></i></a>


    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/countdown.js"></script>
    <!-- <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script> -->
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