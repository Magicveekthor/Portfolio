<?php
#connection file
include "includes/db.php";

$msg = '';

if(isset($_POST['submit'])) {
    $blog_author = $_POST['blog_author'];
    $blog_topic = $_POST['blog_topic'];
    $blog_date = $_POST['blog_date'];
    $blog_post = addslashes($_POST['blog_post']);
    $blog_tags = $_POST['blog_tags'];
    $blog_category = $_POST['blog_category'];

    #inserting the cover image
    $target_dir = "assets/blog/";
    $target_file = $target_dir .basename($_FILES['blog_image']['name']);
    $tmp_file = $_FILES['blog_image']['name'];
    move_uploaded_file(($_FILES['blog_image']['tmp_name']), $target_file);

    $insert_blog = "INSERT INTO opemzy_blog (blog_author, blog_topic, blog_date, blog_post, blog_category, blog_tags, blog_image)
                        VALUES ('$blog_author', '$blog_topic', '$blog_date', '$blog_post', '$blog_category', '$blog_tags', '$tmp_file')";
    $query_blog = $mysqli -> query($insert_blog);

    header('Location: blog.php');
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
                    <h1>Blog</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i>
                        <li>
                            <a class="active" href="">Blog</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="table-data">
                <div class="container">
                    <div class="title">Add Blog Post</div>

                        <form action="#" method="post" enctype="multipart/form-data">
                            <div class="project-details">
                                <div class="input-box">
                                    <span class="details">Author</span>
                                    <input type="text" name="blog_author" placeholder="Enter Author's Name">
                                </div>

                                <div class="input-box">
                                    <span class="details">Title</span>
                                    <input type="text" name="blog_topic" placeholder="Enter Title">
                                </div>

                                <div class="input-box">
                                    <span class="details">Category</span>
                                    <input type="text" name="blog_category" placeholder="Enter Category">
                                </div>

                                <div class="input-box">
                                    <span class="details">Tags</span>
                                    <input type="text" name="blog_tags" placeholder="Enter Tags">
                                </div>

                                <div class="input-box">
                                    <span class="details">Date Published</span>
                                    <input type="date" name="blog_date" placeholder="Enter Date Published">
                                </div>

                                <div class="input-box">
                                    <span class="details">Cover Image</span>
                                    <input type="file" name="blog_image">
                                    <p><strong>Note:</strong> Cover image should be less than 3MB</p>
                                </div>

                                <div class="input-box">
                                    <span class="details">Post</span>
                                    <textarea name="blog_post" placeholder="Enter Post"></textarea>
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