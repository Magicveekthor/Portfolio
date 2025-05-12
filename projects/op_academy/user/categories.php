<?php
#connection file
include "includes/db.php";

#Display categories
$categories = "SELECT * FROM `opemzy_categories`";
$category_query = $mysqli -> query($categories);

#delete blog post
if(isset($_GET['category_id'])){
    $category_id = $_GET['category_id'];
    $delete_category = "DELETE from opemzy_categories where category_id = '$category_id'";
    $query_delete_category = mysqli_query($mysqli, $delete_category) or die("Could not delete" .mysqli_error($mysqli));

    header("Location: categories.php");
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
                    <h1>Categories</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i>
                        <li>
                            <a class="active" href="categories.php">Categories</a>
                        </li>
                    </ul>
                </div>
                <a href="addcategory.php" class="btn-download">
                    <i class='bx bxs-cloud-download'></i>
                    <span class="text">Add Category</span>
                </a>
            </div>

            <div class="table-data">
                <div class="order">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Project Category</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  while ($row = $category_query->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $row['category_id']; ?></td>
                                    <td><?php echo $row['category_name'] ?></td>
                                    <td>
                                        <a href="edit_categories.php?category_id=<?php echo $row['category_id']; ?>" class="status completed">Edit Project Info</a>
                                        <a href="categories.php?category_id=<?php echo $row['category_id']; ?>" class="status pending">Delete</a>
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