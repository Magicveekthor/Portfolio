<?php
#connection file
include "includes/db.php";

//BRING OUT THE DATA FROM THE DATABASE
$query_team = "SELECT * FROM `opemzy_team` LIMIT 4";
$read_team = $mysqli -> query($query_team);

#Display categories
$categories = "SELECT * FROM `opemzy_categories`";
$category_query = $mysqli -> query($categories);


#count category
$team = "SELECT * FROM opemzy_team";
$team_query = mysqli_query($mysqli, $team);
$team_count = mysqli_num_rows($team_query);

#count projects
$projects = "SELECT * FROM opemzy_projects";
$project_query = mysqli_query($mysqli, $projects);
$project_count = mysqli_num_rows($project_query);

#count blog
$blog = "SELECT * FROM opemzy_blog";
$blog_query = mysqli_query($mysqli, $blog);
$blog_count = mysqli_num_rows($blog_query);
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
                    <input name="search" type="search" placeholder="Search...">
                    <button name="submit" type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>


            <a href="#" class="notification">
                <i class='bx bxs-bell'></i>
                <span class="num">8</span>
            </a>
            <a href="#" class="profile">
                <img src="img/8.jpg" alt="">
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
                    <i class='bx bxs-user'></i>
                    <span class="text">Hello OPEMZY Admin</span>
                </a>
            </div>

            <ul class="box-info">
                <li>
                    <i class='bx bxs-heart'></i>
                    <span class="text">
                        <h3><?php echo $team_count ?></h3>
                        <p>Likes</p>
                    </span>
                </li>

                <li>
                <i class='bx bx-message-rounded-dots'></i>
                    <span class="text">
                        <h3><?php echo $project_count ?></h3>
                        <p>Comments</p>
                    </span>
                </li>

                <li>
                    <i class='bx bxs-file'></i>
                    <span class="text">
                        <h3><?php echo $blog_count ?></h3>
                        <p>Playlists</p>
                    </span>
                </li>
            </ul>

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>OPEMZYBIM Tutors</h3>
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
                            <?php while ($row=$read_team->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $row['team_id'] ?></td>
                                    <td>
                                        <img src="assets/team/<?php echo $row['team_picture']; ?>">
                                        <p><?php echo $row['team_name']; ?></p>
                                    </td>
                                    <td><?php echo $row['team_email']; ?></td>
                                    <td><?php echo $row['team_phone']; ?></td>
                                    <td><?php echo $row['team_position']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                <div class="todo">
                    <div class="head">
                        <h3>Popular Courses</h3>
                    </div>
                    <ul class="todo-list">
                        <?php while ($row=$category_query->fetch_assoc()) { ?>
                            <li class="completed">
                                <p><?php echo $row['category_name'] ?></p>
                            </li>
                        <?php } ?>
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