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

if(isset($_POST['delete_playlist'])) {
    $delete_id = $_POST['delete_id'];
    $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

    $verify_playlist = $conn->prepare("SELECT * FROM `playlist` WHERE id = ?");
    $verify_playlist->execute([$delete_id]);

    if($verify_playlist->rowCount() > 0){
        $fetch_thumb = $verify_playlist->fetch(PDO::FETCH_ASSOC);
        $prev_thumb = $fetch_thumb['thumb'];
        if($prev_thumb != ''){
            unlink('assets/course_thumbnail/'.$prev_thumb);
        }

        #delete bookmark
        // $delete_bookmark = $conn->prepare("DELETE FROM `bookmark` WHERE playlist_id = ?");
        // $delete_bookmark->execute([$delete_id]);

        #delete playlist
        $delete_playlist = $conn->prepare("DELETE FROM `playlist` WHERE id = ?");
        $delete_playlist->execute([$delete_id]);

        $good_message = 'Playlist deleted';

    } else {
        $bad_message = 'Playlist not found';
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
                            <a class="active" href="services.php">Playlist</a>
                        </li>
                    </ul>
                </div>
                <a href="addplaylist.php" class="btn-download">
                    <i class='bx bxs-cloud-download'></i>
                    <span class="text">Create New Playlist</span>
                </a>
            </div>

            <div class="field_error" style="color: #8CB675; margin-top: 15px; font-size: 25px;"><?php echo $good_message ?></div> 

            <div class="field_error" style="color: red; margin-top: 15px; font-size: 25px;"><?php echo $bad_message ?></div> 

            <div class="table-data">
                <div class="order">
                    <table>
                        <thead>
                            <tr>
                                <th>Playlist Image</th>
                                <th>Playlist Title</th>
                                <th>Playlist Videos</th>
                                <th>Playlist Description</th>
                                <th>Date Created</th>
                                <th>Status</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $select_playlist = $conn->prepare("SELECT * FROM `playlist` WHERE tutor_id = ?");
                                $select_playlist->execute([$tutor_id]);
                                if($select_playlist->rowCount() > 0){
                                    while($fetch_playlist = $select_playlist->fetch(PDO::FETCH_ASSOC)){
                                        $playlist_id = $fetch_playlist['id'];
                                        $count_content = $conn->prepare("SELECT * FROM `content` WHERE playlist_id = ?");
                                        $count_content->execute([$playlist_id]);
                                        $total_contents = $count_content->rowCount();
                                    
                            ?>
                                <tr>
                                    <td><img src="assets/course_thumbnail/<?= $fetch_playlist['thumb']; ?>"></td>
                                    <td><a href="view_playlist.php?get_id=<?= $playlist_id; ?>"><?= $fetch_playlist['title'] ?></a></td>
                                    <td><?= $total_contents ?></td>
                                    <td>
                                        <?php 
                                            $playlist_string = $fetch_playlist['description'];
                                            if (strlen($playlist_string) > 20) {
                                                $stringCut = substr($playlist_string, 0, 100);
                                                $playlist_string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...';
                                            }
                                            echo $playlist_string 
                                        ?>
                                    </td>
                                    <td><?= $fetch_playlist['date'] ?></td>
                                    <td>
                                        <?php
                                            if($fetch_playlist['status'] == 'Active') {
                                                echo '<a href="#" class="status completed">Active</a>';
                                            } else {
                                                echo '<a href="#" class="status process">Inactive</a>';
                                            }
                                        ?>
                                    </td>
                                    <td><a href="editplaylist.php?get_id=<?= $playlist_id; ?>" class="status edit">Update</a></td>
                                    <td>
                                        <form method="post">
                                            <input type="hidden" name="delete_id" value="<?= $playlist_id ?>">
                                            <input type="submit" value="Delete" name="delete_playlist" class="status pending" style="border: none; cursor:pointer;">
                                        </form>
                                    </td>
                                </tr>
                            <?php } } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        <!--MAIN -->
    </section>
    <!--CONTENT -->

    <script src="js/main.js"></script>
</body>
</html>