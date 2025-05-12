<?php 
include "admin/includes/db.php";
include "includes/functions.php";

session_start();

$msg = "";
if(isset($_POST['submit_message'])){
    $fullname = $_POST['fullname'];
    $email_address = $_POST['email_address'];
    $phone_number = $_POST['phone_number'];
    $messages = $_POST['messages'];

    $insert_message = "INSERT INTO `soul_message` (fullname, email_address, phone_number, messages, status2)
    VALUES('$fullname', '$email_address', '$phone_number', '$messages', '1')";
    $product_query = mysqli_query($mysqli, $insert_message);

    if($product_query){
        $msg = "Thank you for your feedback! We will get back to you shortly";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Contact | LAURA AMAH</title>
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
        <div class="container container-content">
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Contact</li>
            </ul>
        </div>
        <div class="container">
            <div class="contact-form">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 contact-item" data-aos="fade-right" data-aos-duration="1000" data-aos-easing="ease-in-out">
                        <div class="contact-img hover-images">
                            <a href="#" class="">
                                <img src="img/contact_img.jpg" alt="" class="img-responsive">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12" data-aos="fade-left" data-aos-duration="1000" data-aos-easing="ease-in-out">
                        <h3 class="contact-title">Contact us</h3>
                        <p style="color: green"><?php echo $msg ?></p>
                        <form method="post" class="form-customer form-login">
                            <div class="form-group">
                                <input type="text" name="fullname" class="form-control form-account" placeholder="Full Name">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email_address" class="form-control form-account" placeholder="E-mail">
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone_number" class="form-control form-account" placeholder="Office / Mobile">
                            </div>
                            <div class="form-group">
                                <textarea rows="7" name="messages" name="note" placeholder="Tell Us More" class="form-control form-account"></textarea>
                            </div>
                            <div class="btn-button-group mg-top-30 mg-bottom-15">
                                <button type="submit" name="submit_message" class="zoa-btn btn-login hover-white">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="contact-bottom">
                <div class="row">
                    <div class="col-md-4 col-sm-12 col-xs-12 about-element" data-aos="zoom-in" data-aos-duration="1000" data-aos-easing="ease-in-out">
                        <h3>call me</h3>
                        <p>+01 2 345 678 90</p> 
                        <p>+01 2 987 654 21</p>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12 about-element" data-aos="zoom-in" data-aos-duration="1000" data-aos-easing="ease-in-out">
                        <h3>address</h3>
                        <p>113 Sail-docomo st. </p>
                         <p>Montreal (melboun). USA</p>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12 about-element" data-aos="zoom-in" data-aos-duration="1000" data-aos-easing="ease-in-out">
                        <h3>working on</h3>
                        <p>Mon - Fri:&nbsp;&nbsp;&nbsp;     9:80am - 6:30pm</p>
                        <p>Mon - Fri:&nbsp;&nbsp;&nbsp;    9:80am - 6:30pm</p>
                        <p>Sun  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;       off</p>
                    </div>
                </div>
            </div>
        </div>
        
        <?php include "includes/footer.php"; ?>
        <!-- EndContent -->
    </div>
    <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/countdown.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="js/main.js"></script>
</body>
</html>