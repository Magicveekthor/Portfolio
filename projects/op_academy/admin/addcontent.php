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

if(isset($_POST['submit'])) {
    $id = create_unique_id();

    $status = $_POST['status'];
    $status = filter_var($status, FILTER_SANITIZE_STRING);

    $title = $_POST['title'];
    $title = filter_var($title, FILTER_SANITIZE_STRING);

    $description = $_POST['description'];
    $description = filter_var($description, FILTER_SANITIZE_STRING);

    $playlist_id = $_POST['playlist_id'];
    $playlist_id = filter_var($playlist_id, FILTER_SANITIZE_STRING);

    $thumb = $_FILES['thumb']['name'];
    $thumb = filter_var($thumb, FILTER_SANITIZE_STRING);
    $thumb_ext = pathinfo($thumb, PATHINFO_EXTENSION);
    $rename_thumb = create_unique_id().'.'.$thumb_ext;
    $thumb_tmp_name = $_FILES['thumb']['tmp_name'];
    $thumb_size = $_FILES['thumb']['size'];
    $thumb_folder = 'assets/course_thumbnail/'.$rename_thumb;

    $video = $_FILES['video']['name'];
    $video = filter_var($video, FILTER_SANITIZE_STRING);
    $video_ext = pathinfo($video, PATHINFO_EXTENSION);
    $rename_video = create_unique_id().'.'.$video_ext;
    $video_tmp_name = $_FILES['video']['tmp_name'];
    $video_folder = 'assets/content/'.$rename_video;

    $verify_content = $conn->prepare("SELECT * FROM `content` WHERE tutor_id = ? AND title = ? AND description = ?");
    $verify_content->execute([$tutor_id, $title, $description]);

    if($verify_content->rowCount() > 0) {
        $bad_message = 'content already added!';
    } else {
        if($thumb_size > 2000000) {
            $bad_message[] = 'Thumbnail should be less than 2MB';
        } else {
            $add_content = $conn->prepare("INSERT INTO `content`(id, tutor_id, playlist_id, title, description, video, thumb, status) VALUES (?,?,?,?,?,?,?,?)");
            $add_content->execute([$id, $tutor_id, $playlist_id, $title, $description, $rename_video, $rename_thumb, $status]);
            move_uploaded_file($thumb_tmp_name, $thumb_folder);
            move_uploaded_file($video_tmp_name, $video_folder);
            $good_message = 'Congratulations! New content added.';
        }
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

                        <form method="post" enctype="multipart/form-data">
                            <div class="project-details">
                                <div class="input-box">
                                    <span class="details">Content Status</span>
                                    <select class="form-select" name="status" required>
                                        <option disabled selected>Choose Status...</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>

                                <div class="input-box">
                                    <span class="details">Content Title</span>
                                    <input type="text" name="title" placeholder="Enter Content Title">
                                </div>

                                <div class="input-box">
                                    <span class="details">Playlist</span>
                                    <select class="form-select" name="playlist_id" required>
                                        <option disabled selected>Choose Playlist...</option>
                                        <?php
                                            $select_playlist = $conn->prepare("SELECT * FROM playlist WHERE tutor_id = ?");
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
                                    <span class="details">Content Thumbnail</span>
                                    <input type="file" name="thumb" accept="image/*" required>
                                </div>

                                <div class="input-box">
                                    <span class="details">Content Video</span>
                                    <input type="file" name="video" accept="video/*" required>
                                </div>

                                <div class="input-box">
                                    <span class="details">Content Description</span>
                                    <textarea name="description"></textarea>
                                </div>
                            </div>

                            <div class="field_error" style="color: #8CB675; margin-top: 15px; font-size: 25px;">
                                <?php echo $good_message ?>
                            </div> 

                            <div class="field_error" style="color: red; margin-top: 15px; font-size: 25px;">
                                <?php echo $bad_message ?>
                            </div> 

                            <div class="button">
                                <input type="submit" name="submit" value="Add Content"> 
                            </div>
                        </form>                    
                </div>
            </div>

        </main>
        <!--MAIN -->
    </section>
    <!--CONTENT -->

    <script src="js/main.js"></script>
</body>
</html>