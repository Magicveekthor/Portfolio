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
                        <li class="active">Courses</li>
                    </ul>
                    <h2 class="title">My <span>Courses</span></h2>
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

        <!-- All Courses Start -->
        <div class="section section-padding-02">
            <div class="container">

                <!-- All Courses Top Start -->
                <div class="courses-top">

                    <!-- Section Title Start -->
                    <div class="section-title shape-01">
                        <h2 class="main-title">All <span>Courses</span> of OpemzyBIM</h2>
                    </div>
                    <!-- Section Title End -->

                    <!-- Courses Search Start -->
                    <div class="courses-search">
                        <form action="search_course.php" method="post">
                            <input type="text" name="search_box" placeholder="Search your course">
                            <button type="submit" name="search_btn"><i class="flaticon-magnifying-glass"></i></button>
                        </form>
                    </div>
                    <!-- Courses Search End -->

                </div>
                <!-- All Courses Top End -->

                <!-- All Courses Tabs Menu Start -->
                <div class="courses-tabs-menu courses-active">
                    <div class="swiper-container">
                        <ul class="swiper-wrapper nav">
                            <li class="swiper-slide"><button class="active" data-bs-toggle="tab" data-bs-target="#tabs1">Archviz</button></li>
                            <li class="swiper-slide"><button data-bs-toggle="tab" data-bs-target="#tabs2">Presentation</button></li>
                            <li class="swiper-slide"><button data-bs-toggle="tab" data-bs-target="#tabs3">Illustration</button></li>
                            <li class="swiper-slide"><button data-bs-toggle="tab" data-bs-target="#tabs4">3D Modelling</button></li>
                            <li class="swiper-slide"><button data-bs-toggle="tab" data-bs-target="#tabs5">Visualization</button></li>
                            <li class="swiper-slide"><button data-bs-toggle="tab" data-bs-target="#tabs6">Design & Practice</button></li>
                            <li class="swiper-slide"><button data-bs-toggle="tab" data-bs-target="#tabs7">BIM</button></li>
                        </ul>
                    </div>

                    <div class="swiper-button-next"><i class="icofont-rounded-right"></i></div>
                    <div class="swiper-button-prev"><i class="icofont-rounded-left"></i></div>
                </div>
                <!-- All Courses Tabs Menu End -->

                <!-- All Courses tab content Start -->
                <div class="tab-content courses-tab-content">
                    <div class="tab-pane fade show active" id="tabs1">

                        <!-- All Courses Wrapper Start -->
                        <div class="courses-wrapper">
                            <div class="row">
                                <?php 
                                    $select_courses = $conn->prepare("SELECT * FROM `playlist` WHERE status = ? AND p_category = ? ORDER by date DESC");
                                    $select_courses->execute(['active', 'Archviz']);
                                    if($select_courses->rowCount() > 0) {
                                        while($fetch_course = $select_courses->fetch(PDO::FETCH_ASSOC)){
                                            $playlist_id = $fetch_course['id'];

                                            #getting the number of videos per lessons
                                            $count_content = $conn->prepare("SELECT * FROM `content` WHERE playlist_id = ? AND status = ?");
                                            $count_content->execute([$playlist_id, 'active']);
                                            $total_contents = $count_content->rowCount();
                                            
                                            #getting the tutors details
                                            $select_tutor = $conn->prepare("SELECT * FROM `tutors` WHERE id = ?");
                                            $select_tutor->execute([$fetch_course['tutor_id']]);
                                            $fetch_tutor = $select_tutor->fetch(PDO::FETCH_ASSOC);
                                ?>
                                <div class="col-lg-4 col-md-6">
                                    <!-- Single Courses Start -->
                                    <div class="single-courses">
                                        <div class="courses-images">
                                            <a href="courses-details.php?get_id=<?= $playlist_id ?>"><img src="admin/assets/course_thumbnail/<?= $fetch_course['thumb'] ?>" alt="Courses"></a>
                                        </div>
                                        <div class="courses-content">
                                            <div class="courses-author">
                                                <div class="author">
                                                    <div class="author-thumb">
                                                        <a href="#"><img src="admin/assets/tutors/<?= $fetch_tutor['image'] ?>" alt="<?= $fetch_tutor['username'] ?>"></a>
                                                    </div>
                                                    <div class="author-name">
                                                        <a class="name" href="#"><?= $fetch_tutor['username'] ?></a>
                                                    </div>
                                                </div>
                                            </div>

                                            <h4 class="title"><a href="courses-details.php?get_id=<?= $playlist_id ?>"><?= $fetch_course['title'] ?></a></h4>
                                            <div class="courses-meta">
                                                <span> <i class="icofont-calendar"></i> 
                                                    <?php
                                                        $date = $fetch_course['date'];
                                                        $new_date = date("M d, Y", strtotime($date));
                                                        echo $new_date;
                                                    ?>
                                                </span>
                                                <span> <i class="icofont-read-book"></i> <?= $total_contents ?> Lectures </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Courses End -->
                                </div>
                                <?php 
                                    }
                                    } else {
                                        echo '<div class="col-lg-4 col-md-6"><p>No course added yet!</p></div>';
                                    }
                                ?>
                                <div class="col-lg-4 col-md-6">
                                    <!-- Single Courses Start -->
                                    <div class="single-courses">
                                        <div class="courses-images">
                                            <a href="courses-details.php"><img src="assets/images/courses/courses-02.jpg" alt="Courses"></a>
                                        </div>
                                        <div class="courses-content">
                                            <div class="courses-author">
                                                <div class="author">
                                                    <div class="author-thumb">
                                                        <a href="#"><img src="assets/images/author/author-02.jpg" alt="Author"></a>
                                                    </div>
                                                    <div class="author-name">
                                                        <a class="name" href="#">Pamela Foster</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <h4 class="title"><a href="courses-details.php">Create Amazing Color Schemes for Your UX Design Projects</a></h4>
                                            <div class="courses-meta">
                                                <span> <i class="icofont-clock-time"></i> 08 hr 15 mins</span>
                                                <span> <i class="icofont-read-book"></i> 29 Lectures </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Courses End -->
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <!-- Single Courses Start -->
                                    <div class="single-courses">
                                        <div class="courses-images">
                                            <a href="courses-details.php"><img src="assets/images/courses/courses-03.jpg" alt="Courses"></a>
                                        </div>
                                        <div class="courses-content">
                                            <div class="courses-author">
                                                <div class="author">
                                                    <div class="author-thumb">
                                                        <a href="#"><img src="assets/images/author/author-03.jpg" alt="Author"></a>
                                                    </div>
                                                    <div class="author-name">
                                                        <a class="name" href="#">Rose Simmons</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <h4 class="title"><a href="courses-details.php">Culture & Leadership: Strategies for a Successful Business</a></h4>
                                            <div class="courses-meta">
                                                <span> <i class="icofont-clock-time"></i> 08 hr 15 mins</span>
                                                <span> <i class="icofont-read-book"></i> 29 Lectures </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Courses End -->
                                </div>
                            </div>
                        </div>
                        <!-- All Courses Wrapper End -->

                    </div>

                    <div class="tab-pane fade" id="tabs2">
                        <div class="courses-wrapper">
                            <div class="row">
                                <?php 
                                    $select_courses = $conn->prepare("SELECT * FROM `playlist` WHERE status = ? AND p_category = ? ORDER by date DESC");
                                    $select_courses->execute(['active', 'Presentation']);
                                    if($select_courses->rowCount() > 0) {
                                        while($fetch_course = $select_courses->fetch(PDO::FETCH_ASSOC)){
                                            $playlist_id = $fetch_course['id'];

                                            #getting the number of videos per lessons
                                            $count_content = $conn->prepare("SELECT * FROM `content` WHERE playlist_id = ?");
                                            $count_content->execute([$playlist_id]);
                                            $total_contents = $count_content->rowCount();
                                            
                                            #getting the tutors details
                                            $select_tutor = $conn->prepare("SELECT * FROM `tutors` WHERE id = ?");
                                            $select_tutor->execute([$fetch_course['tutor_id']]);
                                            $fetch_tutor = $select_tutor->fetch(PDO::FETCH_ASSOC);
                                ?>
                                <div class="col-lg-4 col-md-6">
                                    <!-- Single Courses Start -->
                                    <div class="single-courses">
                                        <div class="courses-images">
                                            <a href="courses-details.php?get_id=<?= $playlist_id ?>"><img src="admin/assets/course_thumbnail/<?= $fetch_course['thumb'] ?>" alt="Courses"></a>
                                        </div>
                                        <div class="courses-content">
                                            <div class="courses-author">
                                                <div class="author">
                                                    <div class="author-thumb">
                                                        <a href="#"><img src="admin/assets/tutors/<?= $fetch_tutor['image'] ?>" alt="<?= $fetch_tutor['username'] ?>"></a>
                                                    </div>
                                                    <div class="author-name">
                                                        <a class="name" href="#"><?= $fetch_tutor['username'] ?></a>
                                                    </div>
                                                </div>
                                            </div>

                                            <h4 class="title"><a href="courses-details.php?get_id=<?= $playlist_id ?>"><?= $fetch_course['title'] ?></a></h4>
                                            <div class="courses-meta">
                                                <span> <i class="icofont-calendar"></i> 
                                                    <?php
                                                        $date = $fetch_course['date'];
                                                        $new_date = date("M d, Y", strtotime($date));
                                                        echo $new_date;
                                                    ?>
                                                </span>
                                                <span> <i class="icofont-read-book"></i> <?= $total_contents ?> Lectures </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Courses End -->
                                </div>
                                <?php 
                                    }
                                    } else {
                                        echo '<div class="col-lg-4 col-md-6"><p>No course added yet!</p></div>';
                                    }
                                ?>    
                                <div class="col-lg-4 col-md-6">
                                    <!-- Single Courses Start -->
                                        <div class="single-courses">
                                            <div class="courses-images">
                                                <a href="courses-details.php"><img src="assets/images/courses/courses-02.jpg" alt="Courses"></a>
                                            </div>
                                            <div class="courses-content">
                                                <div class="courses-author">
                                                    <div class="author">
                                                        <div class="author-thumb">
                                                            <a href="#"><img src="assets/images/author/author-02.jpg" alt="Author"></a>
                                                        </div>
                                                        <div class="author-name">
                                                            <a class="name" href="#">Pamela Foster</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <h4 class="title"><a href="courses-details.php">Create Amazing Color Schemes for Your UX Design Projects</a></h4>
                                                <div class="courses-meta">
                                                    <span> <i class="icofont-clock-time"></i> 08 hr 15 mins</span>
                                                    <span> <i class="icofont-read-book"></i> 29 Lectures </span>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- Single Courses End -->
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <!-- Single Courses Start -->
                                        <div class="single-courses">
                                            <div class="courses-images">
                                                <a href="courses-details.php"><img src="assets/images/courses/courses-02.jpg" alt="Courses"></a>
                                            </div>
                                            <div class="courses-content">
                                                <div class="courses-author">
                                                    <div class="author">
                                                        <div class="author-thumb">
                                                            <a href="#"><img src="assets/images/author/author-02.jpg" alt="Author"></a>
                                                        </div>
                                                        <div class="author-name">
                                                            <a class="name" href="#">Pamela Foster</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <h4 class="title"><a href="courses-details.php">Create Amazing Color Schemes for Your UX Design Projects</a></h4>
                                                <div class="courses-meta">
                                                    <span> <i class="icofont-clock-time"></i> 08 hr 15 mins</span>
                                                    <span> <i class="icofont-read-book"></i> 29 Lectures </span>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- Single Courses End -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- All Courses tab content End -->

                <!-- All Courses BUtton Start -->
                <!-- <div class="courses-btn text-center">
                    <a href="courses.php" class="btn btn-secondary btn-hover-primary">Other Course</a>
                </div> -->
                <!-- All Courses BUtton End -->

            </div>
        </div>
        <!-- All Courses End -->


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