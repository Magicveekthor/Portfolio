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


if(isset($_POST['delete_content'])) {
    $delete_id = $_POST['content_id'];
    $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

    $verify_content = $conn->prepare("SELECT * FROM `content` WHERE id = ?");
    $verify_content->execute([$delete_id]);

    if($verify_content->rowCount() > 0) {
        $fetch_content = $verify_content->fetch(PDO::FETCH_ASSOC);
        unlink('assets/course_thumbnail/'.$fetch_content['thumb']);
        unlink('assets/content/'.$fetch_content['video']);

        #delete comments
        $delete_comment = $conn->prepare("DELETE FROM `comments` WHERE content_id = ? ");
        $delete_comment->execute([$delete_id]);

        #delete contents
        $delete_content = $conn->prepare("DELETE FROM `contents` WHERE id = ?");
        $delete_content->execute([$delete_id]);

        $good_message = 'Content deleted successfully!';
    } else {
        $good_message = 'Content already deleted!';
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
    <link href="css/view_playlist.css" rel="stylesheet">
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
            <div class="head-title">
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
                <a href="addcontent.php" class="btn-download">
                    <i class='bx bxs-cloud-download'></i>
                    <span class="text">Add New Content</span>
                </a>
            </div>
            
            <?php
                $select_playlist = $conn->prepare("SELECT * FROM `playlist` WHERE id = ?");
                $select_playlist->execute([$get_id]);
                if($select_playlist->rowCount() > 0){
                    while($fetch_playlist = $select_playlist->fetch(PDO::FETCH_ASSOC)){
                    $playlist_id = $fetch_playlist['id'];
                    $count_content = $conn->prepare("SELECT * FROM `content` WHERE playlist_id = ?");
                    $count_content->execute([$get_id]);
                    $total_contents = $count_content->rowCount();
            ?>

            <div class="container">
                <div class="wrapper">
                    <div class="content">
                        <h2><?= $fetch_playlist['title'] ?></h2>
                        <p><?= nl2br(stripslashes($fetch_playlist['description'])) ?></p>
                        <p><strong>Date Created:</strong> <?= $fetch_playlist['date'] ?></p>
                        <p><strong>No. of Lessons:</strong> <td><?= $total_contents ?></td></p>
                    </div>
                    <div class="image">
                        <img src="assets/content/2113.jpg">
                    </div>
                </div>
            </div>
            
            <div class="content-section">
                <h1>Playlist Content</h1>
                <div class="content-cards">
                    <?php
                        $select_content = $conn->prepare("SELECT * FROM `content` WHERE tutor_id = ? AND playlist_id = ?");
                        $select_content->execute([$tutor_id, $get_id]);
                        if($select_content->rowCount() > 0){
                            while($fetch_content = $select_content->fetch(PDO::FETCH_ASSOC)){
                    ?>

                    <div class="content-card">
                        <div class="content-video">
                            <img src="assets/course_thumbnail/<?= $fetch_content['thumb'] ?>">
                        </div>

                        <div class="content-data">
                            <div class="head">
                                <div class="status">
                                    <?php
                                        if($fetch_content['status'] == "Active") {
                                            echo '<i class="bx bx-radio-circle-marked active"></i></i><span>Active</span>';
                                        } else {
                                            echo '<i class="bx bx-radio-circle-marked inactive"></i></i><span>Inactive</span>';
                                        }
                                    ?>
                                </div>
                                <div class="date">
                                    <?= $fetch_content['date'] ?><i class='bx bxs-calendar' ></i>
                                </div>
                            </div>
                            
                            <h2><a href="view_content.php?get_id=<?= $fetch_content['id'] ?>"><?= $fetch_content['title'] ?></a></h2>
                            <div class="content-button">
                                <a>
                                    <form method="post">
                                        <input type="hidden" name="content_id" value="<?= $fetch_content['id'] ?>">
                                        <input type="submit" value="Delete" name="delete_content" style="border: none; cursor:pointer;">
                                    </form>
                                </a>
                                <a href="editcontent.php?get_id=<?= $fetch_content['id'] ?>">Update</a>
                            </div>
                        </div>

                        <!-- GOOD & BAD MESSAGE PHP ALERT -->
                            <div class="field_error" style="color: #8CB675; margin-top: 15px; font-size: 25px;"><?php echo $good_message ?></div> 
                            <div class="field_error" style="color: red; margin-top: 15px; font-size: 25px;"><?php echo $bad_message ?></div> 
                        <!-- GOOD & BAD MESSAGE PHP ALERT -->
                    </div>

                    <?php 
                            }
                        } else {
                            echo '<p class="empty" style="color: red; font-size: 25px;">No content added yet!</p>';
                        }
                    ?>
                </div>
            </div>

            <?php } } ?> 
        </main>
        <!--MAIN -->
    </section>
    <!--CONTENT -->

    <script src="js/main.js"></script>
    <script>
        var video = document.querySelectorAll('video')

        video.forEach(play => play.addEventListener('click', () => {
            play.classList.toggle('active');
            if(play.paused){
                play.play();
                play.setAttribute('controls', '');
            } else {
                play.pause();
                play.currentTime = 0;
                play.removeAttribute('controls');
            }
        }));
    </script>
</body>
</html>