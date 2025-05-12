<?php
#connection file
include "admin/includes/db.php";

if(isset($_COOKIE['id'])){
    $user_id = $_COOKIE['id'];
} else {
    $user_id = '';
    // header('Location:index.php');
}

$message = '';

if(isset($_POST['register'])){
    $id = create_unique_id();

    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);

    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);

    $password = sha1($_POST['password']);
    $password = filter_var($password, FILTER_SANITIZE_STRING);

    $cpassword = sha1($_POST['cpassword']);
    $cpassword = filter_var($cpassword, FILTER_SANITIZE_STRING);

    $image = $_FILES['image']['name'];
    $image = filter_var($image, FILTER_SANITIZE_STRING);
    $ext = pathinfo($image, PATHINFO_EXTENSION);
    $rename = create_unique_id().'.'.$ext;
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_size = $_FILES['image']['size'];
    $image_folder = 'admin/assets/users/'.$rename;

    #checking the email address
    $select_user_email = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
    $select_user_email->execute([$email]);
    if($select_user_email->rowCount() > 0) {
        $message = 'Email address already taken';
    } else {
        if($password != $cpassword){
            $message = "Password does not match";
        } else {
            if($image_size > 2000000) {
                $message = 'image size is too large';
            } else {
                // Get the image dimensions
                list($width, $height) = getimagesize($image_tmp_name);

                // Check if the image is 1:1 ratio
                if ($width != $height) {
                    $message = 'Image must be of ratio 1:1';
                } else {
                    $insert_user = $conn->prepare("INSERT INTO `users`(id, name, email, password, image, premium_access) VALUES (?,?,?,?,?,?)");
                    $insert_user->execute([$id, $name, $email, $password, $rename, 'Not Paid']);
                    move_uploaded_file($image_tmp_name, $image_folder);
    
                    $verify_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ? LIMIT 1");
                    $verify_user->execute([$email, $password]);
                    $row = $verify_user->fetch(PDO::FETCH_ASSOC);
                }
    
                if($insert_user) {
                    if($verify_user->rowCount() > 0){
                        setcookie('id', $row['id'], time() + 60*60*24*30, '/');
                        header('Location: index.php');
                    } else {
                        $message = 'Something went wrong!';
                    }
                }                
            }
        }
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
                        <li class="active">Register</li>
                    </ul>
                    <h2 class="title">Registration <span>Form</span></h2>
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

        <!-- Register & Login Start -->
        <div class="section section-padding">
            <div class="container">

                <!-- Register & Login Wrapper Start -->
                <div class="register-login-wrapper">
                    <div class="row align-items-center">
                        <div class="col-lg-6">

                            <!-- Register & Login Images Start -->
                            <div class="register-login-images">
                                <div class="shape-1">
                                    <img src="assets/images/shape/shape-26.png" alt="Shape">
                                </div>


                                <div class="images">
                                    <img src="assets/images/register-login.png" alt="Register Login">
                                </div>
                            </div>
                            <!-- Register & Login Images End -->

                        </div>
                        <div class="col-lg-6">

                            <!-- Register & Login Form Start -->
                            <div class="register-login-form">
                                <h3 class="title">Registration <span>Form</span></h3>

                                <div class="field_error" style="color: red; font-size: 25px;"><?php echo $message ?></div> 

                                <div class="form-wrapper">
                                    <form action="#" method="post" enctype="multipart/form-data">
                                        <div class="single-form">
                                            <input type="text" name="name" placeholder="Name">
                                        </div>

                                        <div class="single-form">
                                            <input type="email" name="email" placeholder="Email">
                                        </div>

                                        <div class="single-form">
                                            <input type="password" name="password" placeholder="Password">
                                        </div>

                                        <div class="single-form">
                                            <input type="password" name="cpassword" placeholder="Confirm Password">
                                        </div>

                                        <div class="single-form">
                                            <input type="file" name="image">
                                        </div>
                                        
                                        <div class="single-form">
                                            <button name="register" class="btn btn-primary btn-hover-dark w-100">Create an account</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Register & Login Form End -->

                        </div>
                    </div>
                </div>
                <!-- Register & Login Wrapper End -->

            </div>
        </div>
        <!-- Register & Login End -->

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
</html>