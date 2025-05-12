<?php 
include "includes/db.php";

//BRING OUT THE DATA FROM THE DATABASE
$query_blog = "SELECT * FROM `opemzy_blog`";
$read_blog = $mysqli -> query($query_blog);

#delete blog post
if(isset($_GET['blog_id'])){
    $blog_id = $_GET['blog_id'];
    $delete_blog = "DELETE from opemzy_blog where blog_id = '$blog_id'";
    $query_blog_project = mysqli_query($mysqli, $delete_blog) or die("Could not delete" . mysqli_error($mysqli));

    header("Location: blog.php");
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
                <a href="addblog.php" class="btn-download">
                    <i class='bx bxs-cloud-download'></i>
                    <span class="text">Add Blog Post</span>
                </a>
            </div>

            <div class="table-data">
                <div class="order">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Date Published</th>
                                <th>Category</th>
                                <th>Blog Post</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $read_blog->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $row['blog_id'] ?></td>
                                    <td>
                                        <img src="assets/blog/<?php echo $row['blog_image']; ?>">
                                        <p>
                                            <?php 
                                                $blog_topic_string = $row['blog_topic'];
                                                    if (strlen($blog_topic_string) > 60) {
                                                        $stringCut = substr($blog_topic_string, 0, 40);
                                                        $blog_topic_string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...';
                                                    }
                                                echo $blog_topic_string 
                                            ?>
                                        </p>
                                    </td>
                                    <td><?php echo $row['blog_author'] ?></td>
                                    <td><?php echo $row['blog_date'] ?></td>
                                    <td><?php echo $row['blog_category']; ?></td>
                                    <td>
                                        <?php 
                                            $blog_post_string = $row['blog_post'];
                                            if (strlen($blog_post_string) > 20) {
                                                $stringCut = substr($blog_post_string, 0, 50);
                                                $blog_post_string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...';
                                            }
                                            echo $blog_post_string 
                                        ?>
                                    </td>
                                    <td>
                                        <a href="edit_blog.php?blog_id=<?php echo $row['blog_id']; ?>" class="status completed">Edit</a>
                                        <td><a href="blog.php?blog_id=<?php echo $row['blog_id']; ?>" class="status pending">Delete</a></td>
                                    </td>
                                </tr>
                            <?php } ?>
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