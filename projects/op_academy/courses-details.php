<?php
#connection file
include "admin/includes/db.php";

if(isset($_COOKIE['id'])){
    $user_id = $_COOKIE['id'];
} else {
    $user_id = '';
    // header('Location:index.php');
}

if(isset($_GET['get_id'])) {
    $get_id = $_GET['get_id'];
} else {
    $get_id = '';
    header('Location: courses.php');
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
                        <li class="active">Course Details</li>
                    </ul>
                    <h2 class="title">Course <span> Details</span></h2>
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

        <!-- Courses Start -->
        <div class="section section-padding mt-n10">
            <div class="container">
                <?php
                    $select_playlist = $conn->prepare("SELECT * FROM `playlist` WHERE id = ? AND status = ? LIMIT 1");
                    $select_playlist->execute([$get_id, 'active']);
                    if($select_playlist->rowCount() > 0) {
                        while($fetch_playlist = $select_playlist->fetch(PDO::FETCH_ASSOC)){
                            $playlist_id = $fetch_playlist['id'];

                            $count_content = $conn->prepare("SELECT * FROM `content` WHERE playlist_id = ? AND status = ?");
                            $count_content->execute([$playlist_id, 'active']);
                            $total_content = $count_content->rowCount();

                            $select_tutor = $conn->prepare("SELECT * FROM `tutors` WHERE id = ? LIMIT 1");
                            $select_tutor->execute([$fetch_playlist['tutor_id']]);
                            $fetch_tutor = $select_tutor->fetch(PDO::FETCH_ASSOC);
                ?>
                <div class="row gx-10">
                    <div class="col-lg-8">

                        <!-- Courses Details Start -->
                        <div class="courses-details">

                            <div class="courses-details-images">
                                <img src="admin/assets/course_thumbnail/<?= $fetch_playlist['thumb'] ?>" alt="Courses Details">

                                <!-- <div class="courses-play">
                                    <img src="assets/images/courses/circle-shape.png" alt="Play">
                                    <a class="play video-popup" href="https://www.youtube.com/watch?v=Wif4ZkwC0AM"><i class="flaticon-play"></i></a>
                                </div> -->
                            </div>

                            <h2 class="title"><?= $fetch_playlist['title'] ?></h2>

                            <div class="courses-details-admin">
                                <div class="admin-author">
                                    <div class="author-thumb">
                                        <img src="admin/assets/tutors/<?= $fetch_tutor['image'] ?>" alt="<?= $fetch_tutor['username'] ?>">
                                    </div>
                                    <div class="author-content">
                                        <span class="name"><?= $fetch_tutor['username'] ?></span>
                                    </div>
                                </div>
                                <!-- <div class="admin-rating">
                                    <span class="rating-count">4.9</span>
                                    <span class="rating-star">
											<span class="rating-bar" style="width: 80%;"></span>
                                    </span>
                                    <span class="rating-text">(5,764 Rating)</span>
                                </div> -->
                            </div>

                            <!-- Courses Details Tab Start -->
                            <div class="courses-details-tab">

                                <!-- Details Tab Menu Start -->
                                <div class="details-tab-menu">
                                    <ul class="nav justify-content-center">
                                        <li><button class="active" data-bs-toggle="tab" data-bs-target="#description">Description</button></li>
                                        <li><button data-bs-toggle="tab" data-bs-target="#reviews">Reviews</button></li>
                                    </ul>
                                </div>
                                <!-- Details Tab Menu End -->

                                <!-- Details Tab Content Start -->
                                <div class="details-tab-content">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="description">

                                            <!-- Tab Description Start -->
                                            <div class="tab-description">
                                                <div class="description-wrapper">
                                                    <h3 class="tab-title">Description:</h3>
                                                    <p><?= nl2br(stripslashes($fetch_playlist['description'])) ?></p>
                                                </div>
                                            </div>
                                            <!-- Tab Description End -->

                                        </div>

                                        <div class="tab-pane fade" id="reviews">

                                            <!-- Tab Reviews Start -->
                                            <div class="tab-reviews">
                                                <h3 class="tab-title">Student Reviews:</h3>

                                                <div class="reviews-wrapper reviews-active">
                                                    <div class="swiper-container">
                                                        <div class="swiper-wrapper">

                                                            <!-- Single Reviews Start -->
                                                            <div class="single-review swiper-slide">
                                                                <div class="review-author">
                                                                    <div class="author-thumb">
                                                                        <img src="assets/images/author/author-06.jpg" alt="Author">
                                                                        <i class="icofont-quote-left"></i>
                                                                    </div>
                                                                    <div class="author-content">
                                                                        <h4 class="name">Sara Alexander</h4>
                                                                        <span class="designation">Product Designer, USA</span>
                                                                        <span class="rating-star">
																				<span class="rating-bar" style="width: 100%;"></span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <p>Lorem Ipsum has been the industry's standard dummy text since the 1500 when unknown printer took a galley of type and scrambled to make type specimen book has survived not five centuries but also the leap into electronic type and book.</p>
                                                            </div>
                                                            <!-- Single Reviews End -->

                                                            <!-- Single Reviews Start -->
                                                            <div class="single-review swiper-slide">
                                                                <div class="review-author">
                                                                    <div class="author-thumb">
                                                                        <img src="assets/images/author/author-07.jpg" alt="Author">
                                                                        <i class="icofont-quote-left"></i>
                                                                    </div>
                                                                    <div class="author-content">
                                                                        <h4 class="name">Karol Bachman</h4>
                                                                        <span class="designation">Product Designer, USA</span>
                                                                        <span class="rating-star">
																				<span class="rating-bar" style="width: 100%;"></span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <p>Lorem Ipsum has been the industry's standard dummy text since the 1500 when unknown printer took a galley of type and scrambled to make type specimen book has survived not five centuries but also the leap into electronic type and book.</p>
                                                            </div>
                                                            <!-- Single Reviews End -->

                                                            <!-- Single Reviews Start -->
                                                            <div class="single-review swiper-slide">
                                                                <div class="review-author">
                                                                    <div class="author-thumb">
                                                                        <img src="assets/images/author/author-03.jpg" alt="Author">
                                                                        <i class="icofont-quote-left"></i>
                                                                    </div>
                                                                    <div class="author-content">
                                                                        <h4 class="name">Gertude Culbertson</h4>
                                                                        <span class="designation">Product Designer, USA</span>
                                                                        <span class="rating-star">
																				<span class="rating-bar" style="width: 100%;"></span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <p>Lorem Ipsum has been the industry's standard dummy text since the 1500 when unknown printer took a galley of type and scrambled to make type specimen book has survived not five centuries but also the leap into electronic type and book.</p>
                                                            </div>
                                                            <!-- Single Reviews End -->

                                                        </div>
                                                        <!-- Add Pagination -->
                                                        <div class="swiper-pagination"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Tab Reviews End -->

                                        </div>
                                    </div>
                                </div>
                                <!-- Details Tab Content End -->

                            </div>
                            <!-- Courses Details Tab End -->

                        </div>
                        <!-- Courses Details End -->

                    </div>
                    <div class="col-lg-4">
                        <!-- Courses Details Sidebar Start -->
                        <div class="sidebar">

                            <!-- Sidebar Widget Information Start -->
                            <div class="sidebar-widget widget-information">
                                <div class="info-list">
                                    <ul>
                                        <li><i class="icofont-man-in-glasses"></i> <strong>Instructor</strong> <span><?= $fetch_tutor['username'] ?></span></li>
                                        <li><i class="icofont-ui-video-play"></i> <strong>Lectures</strong> <span><?= $total_content ?></span></li>
                                        <li><i class="icofont-book-alt"></i> <strong>Language</strong> <span>English</span></li>
                                        <li><i class="icofont-calendar"></i> <strong>Date</strong> <span><?php $date = $fetch_playlist['date']; $new_date = date("M d, Y", strtotime($date)); echo $new_date; ?></span></li>
                                    </ul>
                                </div>
                                <div class="info-btn">
                                    <a href="after-enroll.php?get_id=<?= $fetch_playlist['id'] ?>" class="btn btn-primary btn-hover-dark">Enroll Now</a>
                                </div>
                            </div>
                            <!-- Sidebar Widget Information End -->

                        </div>
                        <!-- Courses Details Sidebar End -->
                    </div>
                </div>
                <?php
                    }
                    } else {
                        echo '<div class="col-lg-4 col-md-6"><p>No course added yet!</p></div>';
                    }
                ?>
            </div>
        </div>
        <!-- Courses End -->

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