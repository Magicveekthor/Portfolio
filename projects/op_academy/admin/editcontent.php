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

if(isset($_POST['submit'])){
    $status = $_POST['status'];
    $status = filter_var($status, FILTER_SANITIZE_STRING);

    $title = $_POST['title'];
    $title = filter_var($title, FILTER_SANITIZE_STRING);

    $description = $_POST['description'];
    $description = filter_var($description, FILTER_SANITIZE_STRING);

    $playlist_id = $_POST['playlist'];
    $playlist_id = filter_var($playlist_id, FILTER_SANITIZE_STRING);

    $update_content = $conn->prepare("UPDATE `content` SET title = ?, description = ?, status = ? WHERE id = ?");
    $update_content->execute([$title, $description, $status, $get_id]);

    if(!empty($playlist_id)){
        $update_playlist = $conn->prepare("UPDATE `content` SET playlist_id = ? WHERE id = ?");
        $update_playlist->execute([$playlist_id, $get_id]);
    }

    #old thumbnail variable
    $old_thumb = $_POST['old_thumb'];
    $old_thumb = filter_var($old_thumb, FILTER_SANITIZE_STRING);

    $thumb = $_FILES['thumb']['name'];
    $thumb = filter_var($thumb, FILTER_SANITIZE_STRING);
    $thumb_ext = pathinfo($thumb, PATHINFO_EXTENSION);
    $rename_thumb = create_unique_id().'.'.$thumb_ext;
    $thumb_tmp_name = $_FILES['thumb']['tmp_name'];
    $thumb_size = $_FILES['thumb']['size'];
    $thumb_folder = 'assets/course_thumbnail/'.$rename_thumb;


    if(!empty($thumb)) {
        if($thumb_size > 2000000) {
            $bad_message[] = 'Thumbnail should be less than 2MB';
        } else {
            $update_thumb = $conn->prepare("UPDATE `content` SET thumb = ? WHERE id = ?");
            $update_thumb->execute([$rename_thumb, $get_id]);
            move_uploaded_file($thumb_tmp_name, $thumb_folder);
            if($old_thumb != '') {
                unlink('assets/course_thumbnail/'.$old_thumb);
            }
        }
    }


    #old video variable
    $old_video = $_POST['old_video'];
    $old_video = filter_var($old_video, FILTER_SANITIZE_STRING);

    $video = $_FILES['video']['name'];
    $video = filter_var($video, FILTER_SANITIZE_STRING);
    $video_ext = pathinfo($video, PATHINFO_EXTENSION);
    $rename_video = create_unique_id().'.'.$video_ext;
    $video_tmp_name = $_FILES['video']['tmp_name'];
    $video_folder = 'assets/content/'.$rename_video;

    if(!empty($video)) {
        $update_video = $conn->prepare("UPDATE `content` SET video = ? WHERE id = ?");
        $update_video->execute([$rename_video, $get_id]);
        move_uploaded_file($video_tmp_name, $video_folder);
        if($old_video != '') {
            unlink('assets/content/'.$old_video);
        }
    }

    $good_message = 'Content updated successfully';
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
    <link href="css/addproject.css" rel="stylesheet">
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
                            <a class="active" href="team.php">Add New Content</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="table-data">
                <div class="container">
                    <div class="title">Add New Content</div>

                        <?php
                            $select_content = $conn->prepare("SELECT * FROM `content` WHERE id = ?");
                            $select_content->execute([$get_id]);
                            if($select_content->rowCount() > 0){
                                while($fetch_content = $select_content->fetch(PDO::FETCH_ASSOC)) {
                        ?>

                        <form method="post" enctype="multipart/form-data">
                            <!-- hidden and old id -->
                            <input type="hidden" name="old_video" value="<?= $fetch_content['video'] ?>">
                            <input type="hidden" name="old_thumb" value="<?= $fetch_content['thumb'] ?>">
                            <!-- hidden and old id -->


                            <div class="project-details">
                                <div class="input-box">
                                    <span class="details">Update content status</span>
                                    <select class="form-select" name="status" required>
                                        <option value="<?= $fetch_content['status'] ?>" selected><?= $fetch_content['status'] ?> (Current Selection)</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>

                                <div class="input-box">
                                    <span class="details">Update title</span>
                                    <input type="text" name="title" value="<?= $fetch_content['title'] ?>">
                                </div>

                                <div class="input-box">
                                    <span class="details">Update playlist</span>
                                    <select class="form-select" name="playlist">
                                        <option value="<?= $fetch_content['playlist_id'] ?>" selected>Select Playlist...</option>
                                        <?php
                                            $select_playlist = $conn->prepare("SELECT * FROM playlist WHERE tutor_id = ? ORDER BY title");
                                            $select_playlist->execute([$tutor_id]); 
                                            if($select_playlist->rowCount() > 0) {
                                                while($fetch_playlist = $select_playlist->fetch(PDO::FETCH_ASSOC)) {  
                                        ?>
                                        <option value="<?= $fetch_playlist['id'] ?>"><?= $fetch_playlist['title'] ?></option>
                                        <?php
                                                }
                                            } else {
                                                echo '<option disabled>No playlist created!</option>';
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="input-box">
                                    <span class="details">Update content description</span>
                                    <textarea name="description"><?= $fetch_content['description'] ?></textarea>
                                </div>

                                <div class="input-box">
                                    <span class="details">Update content thumbnail</span>
                                    <input type="file" name="thumb" accept="image/*">
                                    <img class="media" src="assets/course_thumbnail/<?= $fetch_content['thumb']; ?>">
                                </div>

                                <div class="input-box">
                                    <span class="details">Update content video</span>
                                    <input type="file" name="video" accept="video/*">
                                    <video class="media" src="assets/content/<?= $fetch_content['video'] ?>" controls></video>
                                </div>
                            </div>

                            <div class="field_error" style="color: #8CB675; margin-top: 15px; font-size: 25px;">
                                <?php echo $good_message ?>
                            </div> 

                            <div class="field_error" style="color: red; margin-top: 15px; font-size: 25px;">
                                <?php echo $bad_message ?>
                            </div> 

                            <div class="button">
                                <input type="submit" name="submit" value="Update Content"> 
                            </div>
                        </form>     
                        
                        <?php
                                }
                            } else {
                                echo '<p class="empty" style="color: red; font-size: 25px;">No content added yet!</p>';
                            }
                        ?>
                </div>
            </div>

        </main>
        <!--MAIN -->
    </section>
    <!--CONTENT -->

    <script src="js/main.js"></script>
</body>
</html>