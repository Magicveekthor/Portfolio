<?php 
include "admin/includes/db.php";
include "includes/functions.php";

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>About Us | LAURA AMAH</title>
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
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">About Us</li>
            </ul>
        </div>
        <div class="container container-content">
            <div class="zoa-about text-center">
                <h3>About us</h3>
                <div class="about-banner">
                    <div class="hover-images"><img src="img/about/about-banner.jpg" class="img-responsive" alt=""></div>
                    <div class="zoa-info">
                        <div class="container">
                            <div class="zoa-inside flex align-items-center justify-center">
                                <p>LAURA AMAH - United Kingdom store. <span>OPEN</span> NOW</p>
                                <p>+44 7776 946313</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="about-content bd-bottom">
                <div class="row">
                <div class="col-md-7 col-sm-6 col-xs-12">
                        <div class="about-sm">
                            <div class="hover-images">
                                <img src="img/about/small_img.jpg" class="img-responsive" alt="">
                            </div>
                        </div>
                    <div class="about-info">

                        <h2>
                                A wayward<br> <span>vision</span> in <br>
                                fashion
                            </h2>
                        <div class="about-desc">
                            <p>Housing an international selection of upcoming to established designers for over fifteen years. </p>
                            <p>LAURA AMAH stands for a personal and obstinate selection. Surprising with new designers every season, great attention is given to the unique & personal identity of all in-store designers. From clothing to jewellery, shoes & bags, each piece is chosen with special care.</p>
                        </div>
                        <div class="sign">
                            <img src="img/about/signature.jpg" class="img-responsive" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-6 col-xs-12">
                    <div class="about-img">
                        <div class="hover-images"><img src="img/about/about-2.jpg" class="img-responsive" alt=""></div>
                    </div>
                </div>
                </div>
            </div>
            <div class="about-bottom bd-bottom">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12 about-element">
                        <h3>origin</h3>
                        <p>an aesthetically pleasing name, leaving<br> room for personal interpretation<br> through its actions.</p>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 about-element">
                        <h3>team</h3>
                        <p>three young individuals, convinced <br>that a lot has yet to be explored <br>in an indispensable and ubiquitous </p>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 about-element">
                        <h3>practicality</h3>
                        <p>garments should look good, and<br> simultaneously making them <br>versatile is a nice challenge. </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="container">
            <div class="about-brand">
                <div class="owl-carousel owl-theme js-owl-team">
                    <div class="brand-item">
                        <a href="#" class="hover-images"><img src="img/about/brand-urbane.png" class="img-responsive" alt=""></a>
                    </div>
                    <div class="brand-item">
                        <a href="#" class="hover-images"><img src="img/about/brand-nordic.png" class="img-responsive" alt=""></a>
                    </div>
                    <div class="brand-item">
                        <a href="#" class="hover-images"><img src="img/about/brand-cupcake.jpg" class="img-responsive" alt=""></a>
                    </div>
                    <div class="brand-item">
                        <a href="#" class="hover-images"><img src="img/about/brand-moment.png" class="img-responsive" alt=""></a>
                    </div>
                    <div class="brand-item">
                        <a href="#" class="hover-images"><img src="img/about/brand-antonio.png" class="img-responsive" alt=""></a>
                    </div>
                    <div class="brand-item">
                        <a href="#" class="hover-images"><img src="img/about/brand-arttech.png" class="img-responsive" alt=""></a>
                    </div>
                    <div class="brand-item">
                        <a href="#" class="hover-images"><img src="img/about/brand-arttech.png" class="img-responsive" alt=""></a>
                    </div>
                    <div class="brand-item">
                        <a href="#" class="hover-images"><img src="img/about/brand-arttech.png" class="img-responsive" alt=""></a>
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
</body>
</html>