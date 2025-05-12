<?php
#connection file
include "admin/includes/db.php";

if(isset($_COOKIE['id'])){
    $user_id = $_COOKIE['id'];
} else {
    $user_id = '';
    // header('Location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>OpemzyBIM Academy | Online Education for Architects & Students</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">
    <!-- CSS
	============================================ -->

    <!-- Google Fonts CSS -->  
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Icon Font CSS -->
    <!-- <link rel="stylesheet" href="assets/css/plugins/icofont.min.css">
    <link rel="stylesheet" href="assets/css/plugins/flaticon.css">
    <link rel="stylesheet" href="assets/css/plugins/font-awesome.min.css"> -->

    <!-- Plugins CSS -->
    <!-- <link rel="stylesheet" href="assets/css/plugins/animate.min.css">
    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/plugins/nice-select.css">
    <link rel="stylesheet" href="assets/css/plugins/apexcharts.css">
    <link rel="stylesheet" href="assets/css/plugins/jqvmap.min.css"> -->

    <!-- Main Style CSS -->
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->

    <!-- Slider css -->
    <link rel="stylesheet" href="assets/css/lightslider.css">


    <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->
    <link rel="stylesheet" href="assets/css/vendor/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">

</head>

<body>

    <div class="main-wrapper">

        <?php include "includes/header.php"; ?>

        <!-- Slider Start -->
        <div class="section slider-section">

            <!-- Slider Shape Start -->
            <div class="slider-shape">
                <img class="shape-1 animation-round" src="assets/images/shape/shape-8.png" alt="Shape">
            </div>
            <!-- Slider Shape End -->

            <div class="container">

                <!-- Slider Content Start -->
                <div class="slider-content">
                    <h4 class="sub-title">Start your favourite course</h4>
                    <h2 class="main-title">Now learning from anywhere, and build your <span>bright career.</span></h2>
                    <p>It has survived not only five centuries but also the leap into electronic typesetting.</p>
                    <a class="btn btn-primary btn-hover-dark" href="#payment">Start A Course</a>
                </div>
                <!-- Slider Content End -->

            </div>

            <!-- Slider Courses Box Start -->
            <div class="slider-courses-box">

                <img class="shape-1 animation-left" src="assets/images/shape/shape-5.png" alt="Shape">

                <div class="box-content">
                    <div class="box-wrapper">
                        <i class="flaticon-open-book"></i>
                        <span class="count">1,235</span>
                        <p>courses</p>
                    </div>
                </div>

                <img class="shape-2" src="assets/images/shape/shape-6.png" alt="Shape">

            </div>
            <!-- Slider Courses Box End -->

            <!-- Slider Rating Box Start -->
            <div class="slider-rating-box">

                <div class="box-rating">
                    <div class="box-wrapper">
                        <span class="count">4.8 <i class="flaticon-star"></i></span>
                        <p>Rating (86K)</p>
                    </div>
                </div>

                <img class="shape animation-up" src="assets/images/shape/shape-7.png" alt="Shape">

            </div>
            <!-- Slider Rating Box End -->

            <!-- Slider Images Start -->
            <div class="slider-images">
                <div class="images">
                    <img src="assets/images/slider/slider-1.png" alt="Slider">
                </div>
            </div>
            <!-- Slider Images End -->

            <!-- Slider Video Start -->
            <div class="slider-video">
                <img class="shape-1" src="assets/images/shape/shape-9.png" alt="Shape">

                <div class="video-play">
                    <img src="assets/images/shape/shape-10.png" alt="Shape">
                    <a href="https://www.youtube.com/watch?v=BRvyWfuxGuU" class="play video-popup"><i class="flaticon-play"></i></a>
                </div>
            </div>
            <!-- Slider Video End -->

        </div>
        <!-- Slider End -->

        <!-- All Courses Start -->
        <div class="section section-padding-02">
            <div class="container">

                <!-- All Courses Top Start -->
                <!-- <div class="courses-top">
                    <div class="section-title shape-01">
                        <h2 class="main-title">All <span>Courses</span> of Edule</h2>
                    </div>

                    
                    <div class="courses-search" method="post">
                        <form action="#">
                            <input type="text" placeholder="Search your course" maxlength="200">
                            <button type="submit"><i class="flaticon-magnifying-glass"></i></button>
                        </form>
                    </div>
                </div> -->
                <!-- All Courses Top End -->

                <!-- Section Title Start -->
                <div class="section-title shape-03 text-center">
                    <h5 class="sub-title">OpemzyBIM Academy</h5>
                    <h2 class="main-title">Popular <span> Courses</span></h2>
                </div>
                <!-- Section Title End -->
            </div>


                <!-- All Courses tab content Start -->
            <div class="slider-container">
                <!-- slider -->
                <ul id="autoWidth" class="cs-hidden">
                    <!-- 1 -->
                    <li class="item-a">
                        <!-- slider box -->
                        <div class="box" style="background-image: url(assets/images/courses/courses.jpg); background-position: center; background-size: cover; background-repeat: no-repeat;">
                            <!-- <p class="marvel">MARVEL</p>
                            <img src="img/Ant-Man.png" class="model">
                            <div class="details">
                                <img src="img/AntMan-logo.png" class="logo" width="100px" style="height: auto;">
                                <p>Bruce Bayne invite deadpool to kill the enemy how make disturb bat to the kill the anymens how make him will be ie</p>
                            </div> -->
                        </div>                
                    </li>

                        <!-- 2 -->
                    <li class="item-a">
                        <!-- slider box -->
                        <div class="box" style="background-image: url(assets/images/courses/courses1.jpg); background-position: center; background-size: cover; background-repeat: no-repeat;">
                            <!-- <p class="marvel">MARVEL</p>
                            <img src="img/DeadPool.png" class="model">
                            <div class="details">
                                <img src="img/DeadPool-logo.png" class="logo" width="100px" style="height: auto;">
                                <p>Bruce Bayne invite deadpool to kill the enemy how make disturb bat to the kill the anymens how make him will be ie</p>
                            </div> -->
                        </div>                
                    </li>

                        <!-- 3 -->
                    <li class="item-a">
                        <!-- slider box -->
                        <div class="box" style="background-image: url(assets/images/courses/courses2.jpg); background-position: center; background-size: cover; background-repeat: no-repeat;">
                            <!-- <p class="marvel">MARVEL</p>
                            <img src="img/IronMan.png" class="model" >
                            <div class="details">
                                <img src="img/IronMan-logo.png" class="logo" width="100px" style="height: auto;">
                                <p>Bruce Bayne invite deadpool to kill the enemy how make disturb bat to the kill the anymens how make him will be ie</p>
                            </div> -->
                        </div>                
                    </li>

                        <!-- 4 -->
                    <li class="item-a">
                        <!-- slider box -->
                        <div class="box" style="background-image: url(assets/images/courses/courses3.jpg); background-position: center; background-size: cover; background-repeat: no-repeat;">
                            <!-- <p class="marvel">MARVEL</p>
                            <img src="img/SpiderMan.png" class="model">
                            <div class="details">
                                <img src="img/SpiderMan-logo.png" class="logo" width="50px" style="height: auto;">
                                <p>Bruce Bayne invite deadpool to kill the enemy how make disturb bat to the kill the anymens how make him will be ie</p>
                            </div> -->
                        </div>                
                    </li>

                        <!-- 5 -->
                    <li class="item-a">
                        <!-- slider box -->
                        <div class="box" style="background-image: url(assets/images/courses/courses4.jpg); background-position: center; background-size: cover; background-repeat: no-repeat;">
                            <!-- <p class="marvel">MARVEL</p>
                            <img src="img/Thor.png" class="model">
                            <div class="details">
                                <img src="img/Thor-logo.png" class="logo" width="100px" style="height: auto;">
                                <p>Bruce Bayne invite deadpool to kill the enemy how make disturb bat to the kill the anymens how make him will be ie</p>
                            </div> -->
                        </div>                
                    </li>

                    <!-- 6 -->
                    <li class="item-a">
                        <!-- slider box -->
                        <div class="box" style="background-image: url(assets/images/courses/courses5.jpg); background-position: center; background-size: cover; background-repeat: no-repeat;">
                            <!-- <p class="marvel">MARVEL</p>
                            <img src="img/Venom.png" class="model">
                            <div class="details">
                                <img src="img/Venom-logo.png" class="logo" width="100px" style="height: auto;">
                                <p>Bruce Bayne invite deadpool to kill the enemy how make disturb bat to the kill the anymens how make him will be ie</p>
                            </div> -->
                        </div>                
                    </li>
                </ul>
            </div>
            <!-- All Courses tab content End -->


            <!-- All Courses BUtton Start -->
            <div class="courses-btn text-center">
                <a href="courses.php" class="btn btn-secondary btn-hover-primary">Other Courses</a>
            </div>
            <!-- All Courses BUtton End -->

            
        </div>
        <!-- All Courses End -->


        <!-- Testimonial End -->
        <div class="section section-padding-02 mt-n1">
            <div class="container">

                <!-- Section Title Start -->
                <div class="section-title shape-03 text-center">
                    <h5 class="sub-title">Student Testimonial</h5>
                    <h2 class="main-title">Feedback From <span> Students</span></h2>
                </div>
                <!-- Section Title End -->

                <!-- Testimonial Wrapper End -->
                <div class="testimonial-wrapper testimonial-active">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <!-- Single Testimonial Start -->
                            <div class="single-testimonial swiper-slide">
                                <div class="testimonial-author">
                                    <div class="author-thumb">
                                        <img src="assets/images/author/author-06.jpg" alt="Author">

                                        <i class="icofont-quote-left"></i>
                                    </div>

                                    <span class="rating-star">
											<span class="rating-bar" style="width: 80%;"></span>
                                    </span>
                                </div>
                                <div class="testimonial-content">
                                    <p>Lorem Ipsum has been the industry's standard dummy text since the 1500s, when an unknown printer took a galley of type and scrambled it to make type specimen book has survived not five centuries but also the leap into electronic.</p>
                                    <h4 class="name">Sara Alexander</h4>
                                    <span class="designation">Product Designer, USA</span>
                                </div>
                            </div>
                            <!-- Single Testimonial End -->

                            <!-- Single Testimonial Start -->
                            <div class="single-testimonial swiper-slide">
                                <div class="testimonial-author">
                                    <div class="author-thumb">
                                        <img src="assets/images/author/author-07.jpg" alt="Author">

                                        <i class="icofont-quote-left"></i>
                                    </div>

                                    <span class="rating-star">
											<span class="rating-bar" style="width: 80%;"></span>
                                    </span>
                                </div>
                                <div class="testimonial-content">
                                    <p>Lorem Ipsum has been the industry's standard dummy text since the 1500s, when an unknown printer took a galley of type and scrambled it to make type specimen book has survived not five centuries but also the leap into electronic.</p>
                                    <h4 class="name">Melissa Roberts</h4>
                                    <span class="designation">Product Designer, USA</span>
                                </div>
                            </div>
                            <!-- Single Testimonial End -->

                            <!-- Single Testimonial Start -->
                            <div class="single-testimonial swiper-slide">
                                <div class="testimonial-author">
                                    <div class="author-thumb">
                                        <img src="assets/images/author/author-03.jpg" alt="Author">

                                        <i class="icofont-quote-left"></i>
                                    </div>

                                    <span class="rating-star">
											<span class="rating-bar" style="width: 80%;"></span>
                                    </span>
                                </div>
                                <div class="testimonial-content">
                                    <p>Lorem Ipsum has been the industry's standard dummy text since the 1500s, when an unknown printer took a galley of type and scrambled it to make type specimen book has survived not five centuries but also the leap into electronic.</p>
                                    <h4 class="name">Sara Alexander</h4>
                                    <span class="designation">Product Designer, USA</span>
                                </div>
                            </div>
                            <!-- Single Testimonial End -->
                        </div>

                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <!-- Testimonial Wrapper End -->

            </div>
        </div>
        <!-- Testimonial End -->

        <!-- How It Work End -->
        <div class="section section-padding mt-n1">
            <div class="container">

                <!-- Section Title Start -->
                <div class="section-title shape-03 text-center">
                    <h5 class="sub-title">Over 1,235+ Course</h5>
                    <h2 class="main-title">How It <span> Work?</span></h2>
                </div>
                <!-- Section Title End -->

                <!-- How it Work Wrapper Start -->
                <div class="how-it-work-wrapper">

                    <!-- Single Work Start -->
                    <div class="single-work">
                        <img class="shape-1" src="assets/images/shape/shape-15.png" alt="Shape">

                        <div class="work-icon">
                            <i class="flaticon-transparency"></i>
                        </div>
                        <div class="work-content">
                            <h3 class="title">Find Your Course</h3>
                            <p>It has survived not only centurie also leap into electronic.</p>
                        </div>
                    </div>
                    <!-- Single Work End -->

                    <!-- Single Work Start -->
                    <div class="work-arrow">
                        <img class="arrow" src="assets/images/shape/shape-17.png" alt="Shape">
                    </div>
                    <!-- Single Work End -->

                    <!-- Single Work Start -->
                    <div class="single-work">
                        <img class="shape-2" src="assets/images/shape/shape-15.png" alt="Shape">

                        <div class="work-icon">
                            <i class="flaticon-forms"></i>
                        </div>
                        <div class="work-content">
                            <h3 class="title">Book A Seat</h3>
                            <p>It has survived not only centurie also leap into electronic.</p>
                        </div>
                    </div>
                    <!-- Single Work End -->

                    <!-- Single Work Start -->
                    <div class="work-arrow">
                        <img class="arrow" src="assets/images/shape/shape-17.png" alt="Shape">
                    </div>
                    <!-- Single Work End -->

                    <!-- Single Work Start -->
                    <div class="single-work">
                        <img class="shape-3" src="assets/images/shape/shape-16.png" alt="Shape">

                        <div class="work-icon">
                            <i class="flaticon-badge"></i>
                        </div>
                        <div class="work-content">
                            <h3 class="title">Get Certificate</h3>
                            <p>It has survived not only centurie also leap into electronic.</p>
                        </div>
                    </div>
                    <!-- Single Work End -->

                </div>

            </div>
        </div>
        <!-- How It Work End -->


        <!-- Pricing End -->
        <div class="section pricing__section" id="payment">
            <div class="wrapper">
                <div class="pricing_title section-title">
                    <h2 class="main-title">Choose Your <span>Plan</span></h2>
                    <div class="toggle__section">
                        <p>Join OPEMZYBIM Academy today and accelerate your architectural career with UNLIMITED access to architecture courses, resources & support.</p>
                    </div>
                </div>

                <div class="price__cards">
                    <div class="price__card bg__accent-2">
                        <div class="price__details">
                            <h3>Pro</h3>
                            <p>Send really big files regularly</p>
                            <ul>
                                <li>Encrypted file storage</li>
                                <li>Access your files from any device</li>
                                <li>Get Access to all our services</li>
                            </ul>
                        </div>
                        <hr>
                        <div class="price" id="pro">9.99</div>
                        <span>Per person, monthly</span>
                        <a href="#" class="btns bg__accent">Get Started</a>
                    </div>

                    <div class="price__card bg__accent">
                        <div class="price__details">
                            <h3>Premium</h3>
                            <p>Send really big files regularly</p>
                            <ul>
                                <li>Encrypted file storage</li>
                                <li>Access your files from any device</li>
                                <li>Get Access to all our services</li>
                            </ul>
                        </div>
                        <hr>
                        <div class="price" id="premium">9.99</div>
                        <span>Per person, yearly</span>
                        <a href="#" class="btns bg__primary">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pricing End -->

        <?php include "includes/footer.php" ?>

        <!--Back To Start-->
        <a href="#" class="back-to-top">
            <i class="icofont-simple-up"></i>
        </a>
        <!--Back To End-->

    </div>






    <!-- JS
    ============================================ -->
    <!-- Modernizer & jQuery JS -->
    <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Bootstrap JS -->
    <!-- <script src="assets/js/plugins/popper.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script> -->

    <!-- Plugins JS -->
    <!-- <script src="assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="assets/js/plugins/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/plugins/video-playlist.js"></script>
    <script src="assets/js/plugins/jquery.nice-select.min.js"></script>
    <script src="assets/js/plugins/ajax-contact.js"></script> -->

    <!-- Glider js -->
    <script src="assets/js/lightslider.js"></script>

    <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->
    <script src="assets/js/plugins.min.js"></script>


    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <script>
        $(document).ready(function() {
            $('#autoWidth').lightSlider({
                autoWidth:true,
                auto:true,
                loop:true,
                pauseOnHover: true,
                onSliderLoad: function() {
                    $('#autoWidth').removeClass('cS-hidden');
                } 
            });  
        });
    </script>

</body>
</html>