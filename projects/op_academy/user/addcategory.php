<?php 
#connection file
include "includes/db.php";

$msg = '';

if(isset($_POST['submit'])) {
    $category_name = $_POST['category_name'];

    #category validation
    $category_validation = "SELECT * FROM `opemzy_categories` where category_name = '$category_name'";
    $cat_query = mysqli_query($mysqli, $category_validation);
    $num_cat = mysqli_num_rows($cat_query);

    if($num_cat > 0) {
        $msg = "Category Already Exists";
    } else {
        $query_category = "INSERT INTO opemzy_categories(category_name) VALUES ('$category_name')";
        $insert_category = $mysqli -> query($query_category);

        if($insert_category){
            header('Location: categories.php');
        } else {
            $msg = "Category upload not successful";
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
                            <a href="team.php">Categories</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i>
                        <li>
                            <a class="active" href="">Add Category</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="table-data">
                <div class="container">
                    <div class="title">Add New Category</div>

                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="project-details">
                                <div class="input-box">
                                    <span class="details">Project Category</span>
                                    <input type="text" name="category_name" placeholder="Enter Project Category" required>
                                </div>
                            </div>

                            <div class="field_error" style="color: #d4af37; font-size:30px; margin-bottom: 30px;"><?php echo $msg ?></div>

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