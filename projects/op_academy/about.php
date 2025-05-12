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
                        <li class="active">About</li>
                    </ul>
                    <h2 class="title">About <span>OpemzyBIM.</span></h2>
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

        <!-- About Start -->
        <div class="section">

            <div class="section-padding-02 mt-n10">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">

                            <!-- About Images Start -->
                            <div class="about-images">
                                <div class="images">
                                    <img src="assets/images/about.jpg" alt="About">
                                </div>
                            </div>
                            <!-- About Images End -->

                        </div>
                        <div class="col-lg-6">

                            <!-- About Content Start -->
                            <div class="about-content">
                                <h5 class="sub-title">Welcome to OpemzyBIM.</h5>
                                <h2 class="main-title">You can join with OpemzyBIM and upgrade your skill for your <span>bright future.</span></h2>
                                <p>Lorem Ipsum has been the industr’s standard dummy text ever since unknown printer took galley type and scmbled make type specimen book. It has survived not only five centuries.</p>
                                <a href="courses.php" class="btn btn-primary btn-hover-dark">Start A Course</a>
                            </div>
                            <!-- About Content End -->

                        </div>
                    </div>
                </div>
            </div>

            <div class="section-padding-02 mt-n6">
                <div class="container">

                    <!-- About Items Wrapper Start -->
                    <div class="about-items-wrapper">
                        <div class="row">
                            <div class="col-lg-4">
                                <!-- About Item Start -->
                                <div class="about-item">
                                    <div class="item-icon-title">
                                        <div class="item-icon">
                                            <i class="flaticon-tutor"></i>
                                        </div>
                                        <div class="item-title">
                                            <h3 class="title">Top Instructors</h3>
                                        </div>
                                    </div>
                                    <p>Lorem Ipsum has been the industry's standard dumy text since the when took and scrambled to make type specimen book has survived.</p>
                                    <p>Lorem Ipsum has been the industry's standard dumy text since the when took and scrambled make.</p>
                                </div>
                                <!-- About Item End -->
                            </div>
                            <div class="col-lg-4">
                                <!-- About Item Start -->
                                <div class="about-item">
                                    <div class="item-icon-title">
                                        <div class="item-icon">
                                            <i class="flaticon-coding"></i>
                                        </div>
                                        <div class="item-title">
                                            <h3 class="title">Portable Program</h3>
                                        </div>
                                    </div>
                                    <p>Lorem Ipsum has been the industry's standard dumy text since the when took and scrambled to make type specimen book has survived.</p>
                                    <p>Lorem Ipsum has been the industry's standard dumy text since the when took and scrambled make.</p>
                                </div>
                                <!-- About Item End -->
                            </div>
                            <div class="col-lg-4">
                                <!-- About Item Start -->
                                <div class="about-item">
                                    <div class="item-icon-title">
                                        <div class="item-icon">
                                            <i class="flaticon-increase"></i>
                                        </div>
                                        <div class="item-title">
                                            <h3 class="title">Improve Quickly</h3>
                                        </div>
                                    </div>
                                    <p>Lorem Ipsum has been the industry's standard dumy text since the when took and scrambled to make type specimen book has survived.</p>
                                    <p>Lorem Ipsum has been the industry's standard dumy text since the when took and scrambled make.</p>
                                </div>
                                <!-- About Item End -->
                            </div>
                        </div>
                    </div>
                    <!-- About Items Wrapper End -->

                </div>
            </div>

        </div>
        <!-- About End -->

        <!-- Team Member's Start -->
        <div class="section section-padding mt-n1">
            <div class="container">

                <!-- Section Title Start -->
                <div class="section-title shape-03 text-center">
                    <h5 class="sub-title">Team Members</h5>
                    <h2 class="main-title">OpemzyBIM Skilled <span> Instructor</span></h2>
                </div>
                <!-- Section Title End -->

                <!-- Team Wrapper Start -->
                <div class="team-wrapper">
                    <div class="row row-cols-lg-5 row-cols-sm-3 row-cols-2 ">
                        <?php
                            $select_tutors = $conn->prepare("SELECT * FROM `tutors`");
                            $select_tutors->execute();
                            if($select_tutors->rowCount() > 0){
                                while($fetch_tutor = $select_tutors->fetch(PDO::FETCH_ASSOC)){
                                    $tutor_id = $fetch_tutor['id'];

                                    $count_content = $conn->prepare("SELECT * FROM `playlist` WHERE tutor_id = ? && status = ?");
                                    $count_content->execute([$tutor_id, 'active']);
                                    $total_content = $count_content->rowCount();
                        ?>
                        <div class="col">
                            <!-- Single Team Start -->
                            <div class="single-team">
                                <div class="team-thumb">
                                    <img src="admin/assets/tutors/<?= $fetch_tutor['image'] ?>" alt="Author">
                                </div>
                                <div class="team-content">
                                    <h4 class="name"><?= $fetch_tutor['username'] ?></h4>
                                    <span class="designation"><?= $fetch_tutor['profession'] ?></span>
                                    <span class="designation"><?= $total_content ?> Course(s)</span>
                                </div>
                            </div>
                            <!-- Single Team End -->
                        </div>
                        <?php
                                }
                            }
                        ?>
                        
                        <div class="col">
                            <!-- Single Team Start -->
                            <div class="single-team">
                                <div class="team-thumb">
                                    <img src="assets/images/author/author-02.jpg" alt="Author">
                                </div>
                                <div class="team-content">
                                    <h4 class="name">Mitchell Colon</h4>
                                    <span class="designation">BBA, Instructor</span>
                                </div>
                            </div>
                            <!-- Single Team End -->
                        </div>

                        <div class="col">
                            <!-- Single Team Start -->
                            <div class="single-team">
                                <div class="team-thumb">
                                    <img src="assets/images/author/author-03.jpg" alt="Author">
                                </div>
                                <div class="team-content">
                                    <h4 class="name">Sonya Gordon</h4>
                                    <span class="designation">MBA, Instructor</span>
                                </div>
                            </div>
                            <!-- Single Team End -->
                        </div>

                        <div class="col">
                            <!-- Single Team Start -->
                            <div class="single-team">
                                <div class="team-thumb">
                                    <img src="assets/images/author/author-04.jpg" alt="Author">
                                </div>
                                <div class="team-content">
                                    <h4 class="name">Archie Neal</h4>
                                    <span class="designation">BBS, Instructor</span>
                                </div>
                            </div>
                            <!-- Single Team End -->
                        </div>
                    </div>
                </div>
                <!-- Team Wrapper End -->

            </div>
        </div>
        <!-- Team Member's End -->


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
    <script src="assets/js/plugins.min.js"></script>


    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

</body>
</html>