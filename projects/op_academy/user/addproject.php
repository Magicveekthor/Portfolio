<?php
#connection file
include "includes/db.php";

$msg = '';

if(isset($_POST['submit'])) {
    $project_name = $_POST['project_name'];
    $project_collab = $_POST['project_collab'];
    $project_category = $_POST['project_category'];
    $project_location = $_POST['project_location'];
    $project_year = $_POST['project_year'];
    $project_descrip = addslashes($_POST['project_descrip']);

    #inserting the cover image
    $target_dir = "assets/projects/cover/";
    $target_file = $target_dir .basename($_FILES['project_cover_image']['name']);
    $tmp_file = $_FILES['project_cover_image']['name'];
    move_uploaded_file(($_FILES['project_cover_image']['tmp_name']), $target_file);

    $insert_project = "INSERT INTO opemzy_projects (project_name, project_collab, project_category, project_location, project_year, project_descrip, project_cover_image)
                        VALUES ('$project_name', '$project_collab', '$project_category', '$project_location', '$project_year', '$project_descrip', '$tmp_file')";
    $query_project = $mysqli -> query($insert_project);

    #inserting the multiple images
    $last_id = $mysqli -> insert_id;
    $c = count($_FILES['img']['name']);

    if($query_project) {
        if($c < 10) {
            for ($i = 0; $i < $c; $i++) {
                $img_name = $_FILES['img']['name'][$i];
                move_uploaded_file($_FILES['img']['tmp_name'][$i], "assets/projects/details/" .$img_name);
                $query_multi = "INSERT INTO opemzy_project_details (images, proid) VALUES ('$img_name','$last_id')";
                $insert_multi = $mysqli -> query($query_multi);
            }
        } else {
            $msg = "Project Picures should not exceed 10 pictures";
        }
    }

    header('Location: projects.php');
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
                    <h1>Projects</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Projects</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i>
                        <li>
                            <a class="active" href="">Add Projects</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="table-data">
                <div class="container">
                    <div class="title">Add Project</div>

                        <form action="#" method="post" enctype="multipart/form-data">
                            <div class="project-details">
                                <div class="input-box">
                                    <span class="details">Project Name</span>
                                    <input type="text" name="project_name" placeholder="Enter Project Name">
                                </div>

                                <div class="input-box">
                                    <span class="details">Client/Collaborators</span>
                                    <input type="text" name="project_collab" placeholder="Enter Project Name">
                                </div>
                    
                                <div class="input-box">
                                    <span class="details">Category</span>
                                    <select class="form-select" name="project_category">
                                        <option>Select Project Category...</option>
                                        <?php
                                            $project_category = "SELECT * FROM `opemzy_categories`";
                                            $project_category_query = mysqli_query($mysqli, $project_category);
                                            while($row = mysqli_fetch_assoc($project_category_query)) {
                                                $category_name = $row['category_name'];
                                                echo "<option value='$category_name'>$category_name</option>";
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="input-box">
                                    <span class="details">Location</span>
                                    <input type="text" name="project_location" placeholder="Enter Project Name">
                                </div>

                                <div class="input-box">
                                    <span class="details">Year</span>
                                    <input type="text" name="project_year" placeholder="Enter Project Name">
                                </div>

                                <div class="input-box">
                                    <span class="details">Cover Image</span>
                                    <input type="file" name="project_cover_image">
                                </div>

                                <div class="input-box">
                                    <span class="details">Project Images</span>
                                    <input type="file" name="img[]" multiple>
                                </div>

                                <div class="input-box">
                                    <span class="details">Description</span>
                                    <textarea name="project_descrip"></textarea>
                                </div>
                            </div>

                            <div class="button">
                                <input type="submit" name="submit" value="Upload"> 
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