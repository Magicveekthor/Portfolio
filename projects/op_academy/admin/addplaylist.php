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

    $p_catgory = $_POST['p_catgory'];
    $p_catgory = filter_var($p_catgory, FILTER_SANITIZE_STRING);

    $search_tag = $_POST['search_tag'];
    $search_tag = filter_var($search_tag, FILTER_SANITIZE_STRING);

    $description = addslashes($_POST['description']);
    $description = filter_var($description, FILTER_SANITIZE_STRING);

    $thumb = $_FILES['thumb']['name'];
    $thumb = filter_var($thumb, FILTER_SANITIZE_STRING);
    $ext = pathinfo($thumb, PATHINFO_EXTENSION);
    $rename = create_unique_id().'.'.$ext;
    $thumb_tmp_name = $_FILES['thumb']['tmp_name'];
    $thumb_size = $_FILES['thumb']['size'];
    $thumb_folder = 'assets/course_thumbnail/'.$rename;

    $verify_playlist = $conn->prepare("SELECT * FROM `playlist` WHERE tutor_id = ? AND title = ? AND description = ?");
    $verify_playlist->execute([$tutor_id, $title, $description]);

    if($verify_playlist->rowCount() > 0) {
        $bad_message = 'Playlist already created!';
    } else {
        $length = strlen($title);
        if ($length < 50 || $length > 58) {
            $bad_message = 'Title must be between 50 and 58 characters long';
        } else {
            $add_playlist = $conn->prepare("INSERT INTO `playlist`(id, tutor_id, title, description, p_category, search_tag, thumb, status) VALUES (?,?,?,?,?,?,?,?)");
            $add_playlist->execute([$id, $tutor_id, $title, $description, $p_catgory, $search_tag, $rename, $status]);
            move_uploaded_file($thumb_tmp_name, $thumb_folder);
            $good_message = 'Congratulations! New playlist created.';
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
                    <h1>Playlist</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i>
                        <li>
                            <a class="active" href="playlist.php">Create New Playlist</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="table-data">
                <div class="container">
                    <div class="title">Create New Playlist</div>
                    <form action="#" method="post" enctype="multipart/form-data">
                        <div class="project-details">
                            <div class="input-box">
                                <span class="details">Playlist Status</span>
                                <select class="form-select" name="status" required>
                                    <option>Choose Status...</option>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>

                            <div class="input-box">
                                <span class="details">Playlist Title</span>
                                <input type="text" name="title" placeholder="Enter Playlist Title">
                            </div>

                            <div class="input-box">
                                <span class="details">Playlist Catgeory</span>
                                <select class="form-select" name="p_catgegory" required>
                                    <option disabled selected>Choose Catgeory...</option>
                                    <option value="Visulization">Visulization</option>
                                    <option value="Archviz">Archviz</option>
                                    <option value="Illustration">Illustration</option>
                                    <option value="3D Modelling">3D Modelling</option>
                                    <option value="Presentation">Presentation</option>
                                    <option value="Design">Design & Practice</option>
                                    <option value="BIM">BIM</option>
                                </select>
                            </div>

                            <div class="input-box">
                                <span class="details">Playlist Search Tag</span>
                                <input type="text" name="search_tag" placeholder="Enter Playlist Search Tag (e.g design, visulization, ...)">
                                <p style="font-style: italic; padding-top: 7px; font-size: 14px;"><strong>Note:</strong> Kindly separate each tag with a comma</p>
                            </div>

                            <div class="input-box">
                                <span class="details">Playlist Thumbnail</span>
                                <input type="file" name="thumb" accept="image/*" required>
                            </div>

                            <div class="input-box">
                                <span class="details">Playlist Description</span>
                                <textarea name="description"></textarea>
                            </div>
                        </div>

                        <div class="field_error" style="color: #8CB675; margin-top: 15px; font-size: 25px;"><?php echo $good_message ?></div> 

                        <div class="field_error" style="color: red; margin-top: 15px; font-size: 25px;"><?php echo $bad_message ?></div> 

                        <div class="button">
                            <input type="submit" name="submit" value="Create Playlist"> 
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