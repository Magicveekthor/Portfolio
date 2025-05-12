<?php 
include "includes/db.php";

$project_id = $_GET['project_id'];
if(isset($_GET['project_id'])) {
    $result_project = mysqli_query($mysqli, "SELECT * FROM `opemzy_projects` where project_id = '$project_id'");
    $check_project = mysqli_num_rows($result_project);

    if($check_project > 0){
        $row_project = mysqli_fetch_assoc($result_project);
        $project_name = $row_project['project_name'];
        $project_collab = $row_project['project_collab'];
        $project_category = $row_project['project_category'];
        $project_location = $row_project['project_location'];
        $project_year = $row_project['project_year'];
        $project_descrip = $row_project['project_descrip'];
        $tmp_file = $row_project['project_cover_image'];
    } else {
        header('Location: projects.php');
        die();
    }
}

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
    $tmp_file2 = $_FILES['project_cover_image']['name'];
    move_uploaded_file(($_FILES['project_cover_image']['tmp_name']), $target_file);

    if($tmp_file2 == ""){
        $update_project = mysqli_query($mysqli, "UPDATE opemzy_projects SET project_name = '$project_name', project_collab = '$project_collab', project_location = '$project_location', project_year = '$project_year', project_descrip = '$project_descrip', project_cover_image = '$tmp_file' where project_id = '$project_id'");
    } else {
        $update_project = mysqli_query($mysqli, "UPDATE opemzy_projects SET project_name = '$project_name', project_collab = '$project_collab', project_location = '$project_location', project_year = '$project_year', project_descrip = '$project_descrip', project_cover_image = '$tmp_file2' where project_id = '$project_id'");
    }

    $last_id = $mysqli -> $project_id;
    $c = count($_FILES['img']['name']);

    if($update) {
        if($c < 10) {
            for ($i = 0; $i < $c; $i++) {
                $img_name = $_FILES['img']['name'][$i];
                move_uploaded_file($_FILES['img']['tmp_name'][$i], "assets/projects/details/" .$img_name);
                $query_multi = "INSERT INTO opemzy_project_details (images, proid) VALUES ('$img_name','$last_id')";
                $insert_multi = $mysqli -> query($query_multi);
            }
        } else if ($c == 0) {

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
                            <a class="active" href="">Edit Project Info</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="table-data">
                <div class="container">
                    <div class="title">Edit Project</div>

                        <form action="#" method="post" enctype="multipart/form-data">
                            <div class="project-details">
                                <div class="input-box">
                                    <span class="details">Project Name</span>
                                    <input type="text" name="project_name" value="<?php if (isset($project_name)) {echo $project_name;} ?>">
                                </div>

                                <div class="input-box">
                                    <span class="details">Client/Collaborators</span>
                                    <input type="text" name="project_collab" value="<?php if (isset($project_collab)) {echo $project_collab;} ?>">
                                </div>
                    
                                <div class="input-box">
                                    <span class="details">Category</span>
                                    <select class="form-select" name="project_category">
                                        <option><?php if (isset($project_category)) {echo $project_category;} ?></option>
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
                                    <input type="text" name="project_location" value="<?php if (isset($project_location)) {echo $project_location;} ?>">
                                </div>

                                <div class="input-box">
                                    <span class="details">Year</span>
                                    <input type="text" name="project_year" value="<?php if (isset($project_year)) {echo $project_year;} ?>">
                                </div>

                                <div class="input-box">
                                    <span class="details">Cover Image</span>
                                    <input type="file" name="cover_image">
                                    <img style="width:50px; height:50px; margin-top:5px; border-radius:50%;" src="assets/projects/cover/<?php echo $tmp_file; ?>">
                                </div>

                                <div class="input-box">
                                    <span class="details">Project Images</span>
                                    <input type="file" name="img[]" multiple>
                                </div>

                                <div class="input-box">
                                    <span class="details">Description</span>
                                    <textarea name="project_descrip"><?php if (isset($project_descrip)) {echo $project_descrip;} ?></textarea>
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