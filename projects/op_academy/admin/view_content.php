<?php

#connection file
include "includes/db.php";

$good_message = '';

$bad_message = '';

if(isset($_COOKIE['tutor_id'])){
    $tutor_id = $_COOKIE['tutor_id'];
} else {
    $tutor_id = '';
    header('Location:index.php');
}

if(isset($_GET['get_id'])) {
    $get_id = $_GET['get_id'];
} else {
    $get_id = '';
    header('Location:playlist.php');
}

if(isset($_POST['$delete_comment'])) {
    $delete_id = $_POST['comment_id'];
    $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

    $verify_comment = $conn->prepare("SELECT * FROM `comments` WHERE id = ?");
    $verify_comment->execute([$delete_id]);

    if($verify_comment->rowCount() > 0){
        $delete_comment = $conn->prepare("DELETE FROM `comments` WHERE id = ?");
        $delete_comment->execute([$delete_id]);
        $good_message = 'Comment deleted successfully!';
    } else {
        $bad_message = 'Comment already deleted!';
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | OPEMZY BIM</title>
    <!-- Bootstrap -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Css style -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/view_content.css" rel="stylesheet">
    <link href="assets/logo/Asset8.png" rel="icon">
</head>
<body>
    
    <!--SIDEBAR -->
    <?php include "includes/nav-link.php" ?>
    <!--SIDEBAR -->


    <!--CONTENT -->
    <section id="content">
        <!--NAVBAR -->
        <nav>
            <i class="bx bx-menu menus"></i>
            <a href="#" class="nav-link">Categories</a>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <a href="#" class="profile">
                <?php
                    $select_profile  = $conn->prepare("SELECT * FROM `tutors` WHERE id = ?");
                    $select_profile->execute([$tutor_id]);
                    if($select_profile->rowCount() > 0){
                        $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
                ?>
                
                <img src="assets/tutors/<?= $fetch_profile['image']; ?>" alt="">

                <?php } else { ?>
                    <img src="assets/tutors/guest.jpg" alt="">     
                <?php } ?>
            </a>
        </nav>
        <!--NAVBAR -->

        <!--MAIN -->
        <main>
            <!-- <div class="head-title">
                <div class="left">
                    <h1>Profile</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Playlist</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i>
                        <li>
                            <a class="active" href="team.php">Contents</a>
                        </li>
                    </ul>
                </div>
            </div> -->

            <section class="dashboard">

            <?php
                $select_content = $conn->prepare("SELECT * FROM `content` WHERE id = ?");
                $select_content->execute([$get_id]);
                if($select_content->rowCount() > 0){
                    while($fetch_content = $select_content->fetch(PDO::FETCH_ASSOC)) {
                        $content_id = $fetch_content['id'];

                        $count_comments = $conn->prepare("SELECT * FROM `comments`  WHERE tutor_id = ? AND content_id = ?");
                        $count_comments->execute([$tutor_id, $content_id]);
                        $total_comments = $count_comments->rowCount();
            ?>

                <div class="container">
                    <div class="main-video">
                        <div class="video">
                            <video src="assets/content/<?= $fetch_content['video'] ?>" poster="assets/course_thumbnail/<?= $fetch_content['thumb'] ?>" type="video/mp4" controls></video>
                            <div class="date">
                                <i class='bx bxs-calendar'></i><?= $fetch_content['date'] ?>
                            </div>
                            <h3 class="title"><?= $fetch_content['title'] ?></h3>
                        </div>

                        <div class="description">
                            <div class="heading">
                                <span class="title-desc">Description</span>
                            </div>
                            <div class="body">
                                <p><?= $fetch_content['description'] ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="video-list">
                        <div class="comments-section">
                            <?php
                                $select_comments = $conn->prepare("SELECT * FROM `comments` WHERE content_id = ? AND tutor_id = ?");
                                $select_comments->execute([$get_id, $tutor_id]);
                                if($select_comments -> rowCount() > 0){
                                    while($fetch_comment = $select_comments->fetch(PDO::FETCH_ASSOC)) {
                                        $comment_id = $fetch_comment['id'];

                                        #fetch the user that made the comment i.e in this case we are using the admin cause nobody has been registered
                                        #REMEBER TO CHANGE "tutors" to "users" to reflect the proper comments
                                        $select_commentor = $conn->prepare("SELECT * FROM `tutors` WHERE id = ?");
                                        $select_commentor->execute([$comment_id]);
                                        $fetch_commentor = $select_commentor->fetch(PDO::FETCH_ASSOC);
                            ?>

                            <div class="comments-container">
                                <div class="section-header">
                                    <span class="comments-title">Comments</span>
                                </div>

                                <div class="comments-content">
                                    <div class="comments-card">
                                        <div>
                                            <div class="comments-item">
                                                <div class="info">
                                                    <img src="assets/tutors/<?= $fetch_commentor['image']; ?>">
                                                    <div class="text-box">
                                                        <h3 class="name"><?= $fetch_commentor['username']; ?></h3>
                                                        <span class="job"><?= $fetch_comment['date'] ?></span>
                                                    </div>
                                                </div>
                                                <p><?= $fetch_comment['comment'] ?></p>

                                                <div class="content-button">
                                                    <a>
                                                        <form method="post">
                                                            <input type="hidden" name="comment_id" value="<?= $fetch_comment['id'] ?>">
                                                            <input type="submit" value="Delete Comment" name="delete_comment" style="border: none; cursor:pointer;">
                                                        </form>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <?php } } else { ?>
                                <div class="comments-container">
                                    <div class="section-header">
                                        <span class="comments-title">Comments</span>
                                    </div>
                                    <p class="empty" style="color: red; font-size: 25px;">No comment added yet!</p>
                                </div>

                            <?php } ?>
                        </div>                        
                    </div>
                </div>

                <?php 
                    }
                    } else {
                        echo '<p class="empty" style="color: red; font-size: 25px;">No content added yet!</p>';
                    } 
                ?>
	        </section>
        </main>
        <!--MAIN -->
    </section>
    <!--CONTENT -->

    <script src="js/main.js"></script>
    <script>
        let listVideo = document.querySelectorAll('.video-list .vid');
        let mainVideo = document.querySelector('.main-video video');
        let title =document.querySelector('.main-video .title');

        listVideo.forEach(video => {
            video.onclick = () => {
                listVideo.forEach(vid => vid.classList.remove('active'));
                video.classList.add('active');
                if(video.classList.contains('active')){
                    let src = video.children[0].getAttribute('src');
                    mainVideo.src = src;
                    let text = video.children[1].innerHTML;
                    title.innerHTML = text;
                };
            };
        });
    </script>
</body>
</html>