<?php
#connection file
include "admin/includes/db.php";

if(isset($_COOKIE['id'])){
    $user_id = $_COOKIE['id'];
} else {
    $user_id = '';
}

$message = '';

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);

    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);

    $subject = $_POST['subject'];
    $subject = filter_var($subject, FILTER_SANITIZE_STRING);

    $message = $_POST['message'];
    $message = filter_var($message, FILTER_SANITIZE_STRING);

    $verify_contact = $conn->prepare("SELECT * FROM `contact` WHERE name = ? AND email = ? AND subject = ? AND message = ?");
    $verify_contact->execute([$name, $email, $subject, $message]);

    if($verify_contact->rowCount() > 0){
        $message = 'Message sent already!';
    } else {
        $send_message = $conn->prepare("INSERT INTO `contact`(name, email, subject, message) VALUES(?,?,?,?)");
        $send_message->execute([$name, $email, $subject, $message]);
        $message = 'Message sent!';
    }
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


    <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->
    <link rel="stylesheet" href="assets/css/vendor/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">

</head>

<body>

    <div class="main-wrapper">

    <?php include "includes/header.php"; ?>

        <!-- Page Banner Start -->
        <div class="section page-banner">

            <img class="shape-1 animation-round" src="assets/images/shape/shape-8.png" alt="Shape">

            <img class="shape-2" src="assets/images/shape/shape-23.png" alt="Shape">

            <div class="container">
                <!-- Page Banner Start -->
                <div class="page-banner-content">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Contact Us</li>
                    </ul>
                    <h2 class="title">Contact <span>Us</span></h2>
                </div>
                <!-- Page Banner End -->
            </div>

            <!-- Shape Icon Box Start -->
            <div class="shape-icon-box">

                <img class="icon-shape-1 animation-left" src="assets/images/shape/shape-5.png" alt="Shape">

                <div class="box-content">
                    <div class="box-wrapper">
                        <i class="flaticon-badge"></i>
                    </div>
                </div>

                <img class="icon-shape-2" src="assets/images/shape/shape-6.png" alt="Shape">

            </div>
            <!-- Shape Icon Box End -->

            <img class="shape-3" src="assets/images/shape/shape-24.png" alt="Shape">

            <img class="shape-author" src="assets/images/author/author-11.jpg" alt="Shape">

        </div>
        <!-- Page Banner End -->


        <!-- Contact Start -->
        <div class="section section-padding">
            <div class="container">

                <!-- Contact Wrapper Start -->
                <p style="font-style: italic; padding-top: 7px; font-size: 23px;"><?php echo $message ?></p>
                <div class="contact-wrapper">
                    <div class="row align-items-center">
                        <div class="col-lg-6">

                            <!-- Contact Info Start -->
                            <div class="contact-info">

                                <img class="shape animation-round" src="assets/images/shape/shape-12.png" alt="Shape">

                                <!-- Single Contact Info Start -->
                                <div class="single-contact-info">
                                    <div class="info-icon">
                                        <i class="flaticon-phone-call"></i>
                                    </div>
                                    <div class="info-content">
                                        <h6 class="title">Phone No.</h6>
                                        <p><a href="tel:+2348137201302">+234 813 720 1302</a></p>
                                        <p><a href="tel:+2348037008047">+234 803 700 8047</a></p>
                                    </div>
                                </div>
                                <!-- Single Contact Info End -->
                                <!-- Single Contact Info Start -->
                                <div class="single-contact-info">
                                    <div class="info-icon">
                                        <i class="flaticon-email"></i>
                                    </div>
                                    <div class="info-content">
                                        <h6 class="title">Email Address.</h6>
                                        <p><a href="mailto:info@opemzybim.com">info@opemzybim.com</a></p>
                                    </div>
                                </div>
                                <!-- Single Contact Info End -->
                                <!-- Single Contact Info Start -->
                                <div class="single-contact-info">
                                    <div class="info-icon">
                                        <i class="flaticon-pin"></i>
                                    </div>
                                    <div class="info-content">
                                        <h6 class="title">Office Address.</h6>
                                        <p>45 Valley Cres, off Nza Street, Independence Layout, Enugu</p>
                                    </div>
                                </div>
                                <!-- Single Contact Info End -->
                            </div>
                            <!-- Contact Info End -->

                        </div>
                        <div class="col-lg-6">

                            <!-- Contact Form Start -->
                            <div class="contact-form">
                                <h3 class="title">Get in Touch <span>With Us</span></h3>

                                <div class="form-wrapper">
                                    <form method="POST">
                                        <!-- Single Form Start -->
                                        <div class="single-form">
                                            <input type="text" name="name" placeholder="Name">
                                        </div>
                                        <!-- Single Form End -->
                                        <!-- Single Form Start -->
                                        <div class="single-form">
                                            <input type="email" name="email" placeholder="Email">
                                        </div>
                                        <!-- Single Form End -->
                                        <!-- Single Form Start -->
                                        <div class="single-form">
                                            <input type="text" name="subject" placeholder="Subject">
                                        </div>
                                        <!-- Single Form End -->
                                        <!-- Single Form Start -->
                                        <div class="single-form">
                                            <textarea name="message" placeholder="Message"></textarea>
                                        </div>
                                        <!-- Single Form End -->
                                        <!-- Single Form Start -->
                                        <div class="single-form">
                                            <button name="submit" class="btn btn-primary btn-hover-dark w-100">Send Message <i class="flaticon-right"></i></button>
                                        </div>
                                        <!-- Single Form End -->
                                    </formd=>
                                </div>
                            </div>
                            <!-- Contact Form End -->

                        </div>
                    </div>
                </div>
                <!-- Contact Wrapper End -->

            </div>
        </div>
        <!-- Contact End -->

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
    <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap JS -->
    <!-- <script src="assets/js/plugins/popper.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script> -->

    <!-- Plugins JS -->
    <!-- <script src="assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="assets/js/plugins/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/plugins/video-playlist.js"></script>
    <script src="assets/js/plugins/jquery.nice-select.min.js"></script>
    <script src="assets/js/plugins/ajax-contact.js"></script> -->

    <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->
    <script src="assets/js/plugins.min.js"></script>


    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

</body>


<!-- Mirrored from template.hasthemes.com/edule/eduLe/contact.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Nov 2023 11:11:17 GMT -->
</html>