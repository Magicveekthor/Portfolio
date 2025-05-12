<?php
#connection file
include "admin/includes/db.php";

if(isset($_COOKIE['id'])){
    $user_id = $_COOKIE['id'];
} else {
    $user_id = '';
    header('Location:index.php#payment');
}

// Prepare the query to check the status
$query = $conn->prepare("SELECT premium_access FROM `users` WHERE id = ?");
$query->execute([$user_id]);
$fetch_status = $query->fetch(PDO::FETCH_ASSOC);

// Check if the user has not paid for premium access
if ($fetch_status && $fetch_status['premium_access'] === 'Not Paid') {
    //header('Location: 404-error.php');
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

        <?php include "includes/header-admin.php" ?>

        <!-- Courses Enroll Start -->
        <div class="section">

            <!-- Courses Enroll Wrapper Start -->
            <div class="courses-enroll-wrapper">

                <!-- Courses Video Player Start -->
                <div class="courses-video-player">

                    <!-- Courses Video Container Start -->
                    <div class="vidcontainer">
                        <video id="myvid"></video>

                        <div class="video-play-bar">
                            <div class="topControl">
                                <div class="progress">
                                    <span class="bufferBar"></span>
                                    <span class="timeBar"></span>
                                </div>
                                <div class="time">
                                    <span class="current"></span> /
                                    <span class="duration"></span>
                                </div>
                            </div>

                            <div class="controllers">
                                <div class="controllers-left">
                                    <button class="prevvid disabled" title="Previous video"><i class="icofont-ui-previous"></i></button>
                                    <button class="btnPlay" title="Play/Pause video"></button>
                                    <button class="nextvid" title="Next video"><i class="icofont-ui-next"></i></button>
                                    <button class="sound sound2" title="Mute/Unmute sound"></button>
                                    <div class="volume" title="Set volume">
                                        <span class="volumeBar"></span>
                                    </div>
                                </div>

                                <div class="controllers-right">
                                    <button class="btnspeed" title="Video speed"><i class="fa fa-gear"></i></button>
                                    <ul class="speedcnt">
                                        <li class="spdx50">1.5</li>
                                        <li class="spdx25">1.25</li>
                                        <li class="spdx1 selected">Normal</li>
                                        <li class="spdx050">0.5</li>
                                    </ul>
                                    <button class="btnFS" title="full screen"></button>
                                </div>
                            </div>
                        </div>

                        <div class="bigplay" title="play the video">
                            <i class="fa fa-play"></i>
                        </div>

                        <div class="loading">
                            <div class="spinner-border spinner">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>

                    </div>
                    <!-- Courses Video Container End -->

                    <!-- Courses Enroll Content Start -->
                    <div class="courses-enroll-content">

                    <?php
                        $select_playlist = $conn->prepare("SELECT * FROM `playlist` WHERE id = ? AND status = ? LIMIT 1");
                        $select_playlist->execute([$get_id, 'active']);
                            if($select_playlist->rowCount() > 0) {
                                while($fetch_playlist = $select_playlist->fetch(PDO::FETCH_ASSOC)){
                                    $playlist_id = $fetch_playlist['id'];

                                    $count_content = $conn->prepare("SELECT * FROM `content` WHERE playlist_id = ? AND status = ? ");
                                    $count_content->execute([$playlist_id, 'active']);
                                    $total_content = $count_content->rowCount();

                                    $select_tutor = $conn->prepare("SELECT * FROM `tutors` WHERE id = ? LIMIT 1");
                                    $select_tutor->execute([$fetch_playlist['tutor_id']]);
                                    $fetch_tutor = $select_tutor->fetch(PDO::FETCH_ASSOC);
                    ?>                       

                        <!-- Courses Enroll Title Start -->
                        <div class="courses-enroll-title">
                            <h2 class="title"><?= $fetch_playlist['title'] ?></h2>
                        </div>
                        <!-- Courses Enroll Title End -->

                        <!-- Courses Enroll Tab Start -->
                        <div class="courses-enroll-tab">
                            <div class="enroll-tab-menu">
                                <ul class="nav">
                                    <li><button class="active" data-bs-toggle="tab" data-bs-target="#tab1">Overview</button></li>
                                    <li><button data-bs-toggle="tab" data-bs-target="#tab2">Comments</button></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Courses Enroll Tab End -->

                        <!-- Courses Enroll Tab Content Start -->
                        <div class="courses-enroll-tab-content">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab1">

                                    <!-- Overview Start -->
                                    <div class="overview">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="enroll-tab-title">
                                                    <h3 class="title">Course Details</h3>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="enroll-tab-content">
                                                    <p><?= nl2br(stripslashes($fetch_playlist['description'])) ?></p>

                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <th>Lectures <span>:</span></th>
                                                                <td><?= $total_content ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Language <span>:</span></th>
                                                                <td>English</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Overview End -->


                                    <hr>


                                    <!-- Instructor Start -->
                                    <div class="instructor">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="enroll-tab-title">
                                                    <h3 class="title">Instructor</h3>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="enroll-tab-content">

                                                    <!-- Single Instructor Start -->
                                                    <div class="single-instructor">
                                                        <div class="review-author">
                                                            <div class="author-thumb">
                                                                <img src="admin/assets/tutors/<?= $fetch_tutor['image'] ?>" alt="Author">
                                                            </div>
                                                            <div class="author-content">
                                                                <h4 class="name"><?= $fetch_tutor['username'] ?></h4>
                                                                <span class="designation"><?= $fetch_tutor['profession'] ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Single Instructor End -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Instructor End -->
                                
                                </div>

                                    <div class="tab-pane fade" id="tab2">

                                    <!-- Instructor Start -->
                                    <div class="instructor">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="enroll-tab-title">
                                                    <h3 class="title">Comments</h3>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="enroll-tab-content">

                                                    <!-- Single Instructor Start -->
                                                    <div class="single-instructor">
                                                        <div class="review-author">
                                                            <div class="author-thumb">
                                                                <img src="assets/images/author/author-06.jpg" alt="Author">
                                                            </div>
                                                            <div class="author-content">
                                                                <h4 class="name">Sara Alexander</h4>
                                                                <span class="designation">Student</span>
                                                            </div>
                                                        </div>
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been industry's standard dummy text ever since the 1500s when andom unknown printer took a galley of type scrambled it to make a type specimen book.</p>
                                                    </div>
                                                    <!-- Single Instructor End -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <hr>


                                    <!-- Reviews Form Start -->
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="enroll-tab-title">
                                                    <h3 class="title">Write a Comment</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-body reviews-form">
                                            <form action="#">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <!-- Single Form Start -->
                                                        <div class="single-form">
                                                            <input type="text" placeholder="Enter your name">
                                                        </div>
                                                        <!-- Single Form End -->
                                                    </div>

                                                    <div class="col-md-6">
                                                    <!-- Single Form Start -->
                                                        <div class="single-form">
                                                            <input type="text" placeholder="Enter your Email">
                                                        </div>
                                                    <!-- Single Form End -->
                                                    </div>

                                                    <div class="col-md-12">
                                                        <!-- Single Form Start -->
                                                        <div class="single-form">
                                                            <textarea placeholder="Write your comments here"></textarea>
                                                        </div>
                                                        <!-- Single Form End -->
                                                    </div>

                                                    <div class="col-md-12">
                                                        <!-- Single Form Start -->
                                                        <div class="single-form">
                                                            <button class="btn btn-primary btn-hover-dark">Submit Review</button>
                                                        </div>
                                                    <!-- Single Form End -->
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    <!-- Reviews Form End -->  
                                    </div>                               
                            </div>
                        </div>
                        <!-- Courses Enroll Tab Content End -->
                        <?php
                            }
                            } else {
                                echo '<div class="col-lg-4 col-md-6"><p>No course added yet!</p></div>';
                            }
                        ?>
                    </div>
                    <!-- Courses Enroll Content End -->
                </div>
                <!-- Courses Video Player End -->

                <!-- Courses Video Playlist Start -->
                <div class="courses-video-playlist">
                    <div class="playlist-title">
                        <h3 class="title">Course Content</h3>
                        <span><?= $total_content ?> Lessons</span>
                    </div>

                    <!-- Video Playlist Start  -->
                    <div class="video-playlist">
                        <div class="accordion" id="videoPlaylist">
                            <div data-bs-parent="#videoPlaylist">
                                <nav class="vids">
                                    <?php
                                        // Include the getID3 library
                                        require_once 'getID3/getid3/getid3.php';

                                        $select_content = $conn->prepare("SELECT * FROM `content` WHERE playlist_id = ? AND status = ?");
                                        $select_content->execute([$get_id, 'active']);
                                        if($select_content->rowCount() > 0) {
                                            while($fetch_content = $select_content->fetch(PDO::FETCH_ASSOC)){ 
                                                $content_id = $fetch_content['id'];  
                                                
                                                $select_tutor = $conn->prepare("SELECT * FROM `tutors` WHERE id = ?");
                                                $select_tutor->execute([$fetch_content['tutor_id']]);
                                                $fetch_tutor = $select_tutor->fetch(PDO::FETCH_ASSOC);
                                                
                                                // Get the path to the video file
                                                $video_path = 'admin/assets/content/' . $fetch_content['video'];
                                                
                                                // Initialize getID3 engine
                                                $getID3 = new getID3;
                                                
                                                // Analyze the video file
                                                $file_info = $getID3->analyze($video_path);
                                                
                                                // Get the duration in seconds
                                                $duration_seconds = $file_info['playtime_seconds'] ?? 0;
                                                
                                                // Convert duration to minutes and seconds format
                                                $minutes = ceil($duration_seconds / 60);  // Round up to the nearest whole minute
                                                $duration_formatted = sprintf('%02d minutes', $minutes);
                                    ?>
                                    <a class="link" href="<?= $video_path ?>">
                                        <p><?= $fetch_content['title'] ?></p>
                                        <span class="total-duration"><?= $duration_formatted ?></span>
                                    </a>
                                    <?php
                                        }
                                    } else {
                                        echo '<div class="col-lg-4 col-md-6"><p>No course added yet!</p></div>';
                                    }
                                    ?>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- Video Playlist End  -->

                </div>
                <!-- Courses Video Playlist End -->

            </div>
            <!-- Courses Enroll Wrapper End -->

        </div>
        <!-- Courses Enroll End -->

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


<!-- Mirrored from template.hasthemes.com/edule/eduLe/after-enroll.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Nov 2023 11:11:05 GMT -->
</html>