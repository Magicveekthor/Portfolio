<?php
#connection file
include "includes/db.php";

#Display categories
$reviews = "SELECT * FROM `opemzy_review`";
$reviews_query = $mysqli -> query($reviews);

#delete blog post
if(isset($_GET['review_id'])){
    $review_id = $_GET['review_id'];
    $delete_reviews = "DELETE from opemzy_review where review_id = '$review_id'";
    $query_delete_reviews = mysqli_query($mysqli, $delete_reviews) or die("Could not delete" .mysqli_error($mysqli));

    header("Location: blog_review.php");
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
                    <h1>Blog Reviews</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i>
                        <li>
                            <a class="active" href="categories.php">Blog Reviews</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="table-data">
                <div class="order">
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Comment</th>
                                <th>Blog Post ID</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  while ($row = $reviews_query->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $row['review_name'] ?></td>
                                    <td><?php echo $row['review_email']  ?></td>
                                    <td><?php echo $row['review_comment']  ?></td>
                                    <td><?php echo $row['proid'] ?></td>
                                    <td>
                                        <a href="blog_review.php?review_id=<?php echo $row['review_id']; ?>" class="status pending">Delete</a>
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