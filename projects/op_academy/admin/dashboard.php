<?php
#connection file
include "includes/db.php";

if(isset($_COOKIE['tutor_id'])){
    $tutor_id = $_COOKIE['tutor_id'];
} else {
    $tutor_id = '';
    header('Location:index.php');
}

$count_content = $conn->prepare("SELECT * FROM `content` WHERE tutor_id = ?");
$count_content->execute([$tutor_id]);
$total_contents = $count_content->rowCount();

$count_playlist = $conn->prepare("SELECT * FROM `playlist` WHERE tutor_id = ?");
$count_playlist->execute([$tutor_id]);
$total_playlists = $count_playlist->rowCount();

$count_comments = $conn->prepare("SELECT * FROM `comments` WHERE tutor_id = ?");
$count_comments->execute([$tutor_id]);
$total_comments = $count_comments->rowCount();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | OPEMZY BIM</title>
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
            <form action="#" method="post">
                <div class="form-input">
                    <input name="search" type="search" placeholder="Search..." maxlength="100" name="search box">
                    <button name="submit" type="submit" class="search-btn"><i class='bx bx-search'></i></button>
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
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i>
                        <li>
                            <a class="active" href="dashboard.php">Home</a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="btn-download">
                    <?php
                        $select_profile  = $conn->prepare("SELECT * FROM `tutors` WHERE id = ?");
                        $select_profile->execute([$tutor_id]);
                        if($select_profile->rowCount() > 0){
                            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
                    ?>
                
                    <i class='bx bxs-user'></i>
                    <span class="text">Hello <?= $fetch_profile['username']; ?></span>

                    <?php } else { ?>
                        <i class='bx bxs-user'></i>
                        <span class="text">Hello Guest</span> 
                    <?php } ?>
                </a>
            </div>

            <ul class="box-info">
                <li>
                    <i class='bx bxs-graduation' ></i>
                    <span class="text">
                        <h3><?= $total_contents; ?></h3>
                        <p>Contents Uploaded</p>
                    </span>
                </li>

                <li>
                    <i class='bx bx-bar-chart-alt'></i>
                    <span class="text">
                        <h3><?= $total_playlists; ?></h3>
                        <p>Playlist</p>
                    </span>
                </li>

                <li>
                    <i class='bx bx-message-dots' ></i>
                    <span class="text">
                        <h3><?= $total_comments; ?></h3>
                        <p>Comments</p>
                    </span>
                </li>
            </ul>

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Team Members</h3>
                        <a href="team.php" class="link" style="text-decoration: underline;">VIEW MORE</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Position</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                        </tbody>
                    </table>
                </div>

                <div class="todo">
                    <div class="head">
                        <h3>Project Categories</h3>
                        <a href="categories.php" class="link" style="text-decoration: underline;">VIEW MORE</a>
                    </div>
                    <ul class="todo-list">
                        <li class="completed">
                            <p>Magic Veekthor</p>
                        </li>
                    </ul>
                </div>
            </div>
        </main>
        <!--MAIN -->
    </section>
    <!--CONTENT -->

    <script src="js/main.js"></script>
</body>
</html>