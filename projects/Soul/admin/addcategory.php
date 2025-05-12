<?php 
#connection file
include 'includes/db.php';

$msg = "";

if(isset($_POST['submit'])){
    $product_category = $_POST['product_category'];

    #inserting the cover image 
    $target_dir = "images/category/";
    $target_file = $target_dir .basename($_FILES['category_image']['name']);
    $tmp_file = $_FILES['category_image']['name'];
    move_uploaded_file(($_FILES['category_image']['tmp_name']), $target_file);

    #category validation
    $cat_val = "SELECT * FROM `soul_category` where product_category = '$product_category'";
    $cat_query = mysqli_query($mysqli, $cat_val);
    $num_cat = mysqli_num_rows($cat_query);

    if($num_cat > 0){
        $msg = "Category or Serial Number Already Exists";
    } else {
        $insert_cat = "INSERT INTO soul_category (product_category,category_image) VALUES ('$product_category', '$tmp_file')";
        $query_cat = mysqli_query($mysqli, $insert_cat);

        if($query_cat){
            $msg = "Category uploaded";
        }
    }
}


#count messages
$messages = "SELECT * FROM soul_message where status2 = '1'";
$messages_result = mysqli_query($mysqli, $messages);
$messages_count = mysqli_num_rows($messages_result);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/soulwhite.png">
        <!-- Material icon -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet"/>
        <!-- CSS -->
        <link rel="stylesheet" href="css/styles.css" />
        <link rel="stylesheet" href="css/styles-responsive.css" />
        <title>Dashboard</title>
    </head>

    <body class="customers">
        <div class="dashboard-container customers">
            <!-- Sidebar -->
            <aside class="main-sidebar">
                <header class="aside-header">
                    <div class="brand">
                        <img src="images/soul.png" alt="Logo" />
                        <!-- <h3>Soul Exclusive</h3> -->
                    </div>
                    <div class="close" id="closeSidebar">
                        <span class="material-icons-sharp"> close </span>
                    </div>
                </header>

                <div class="sidebar" id="sidebar">
                    <ul class="list-items">
                        <li class="item">
                            <a href="dashboard.php">
                                <span class="material-icons-sharp">
                                    dashboard
                                </span>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="item">
                            <a href="customers.php">
                                <span class="material-icons-sharp">
                                    people
                                </span>
                                <span>Customers</span>
                            </a>
                        </li>
                        <li class="item">
                            <a href="categories.php">
                                <span class="material-icons-sharp">
                                    shopping_cart
                                </span>
                                <span>Categories</span>
                            </a>
                        </li>
                        <li class="item">
                            <a href="orders.php">
                                <span class="material-icons-sharp">
                                    insights
                                </span>
                                <span>Orders</span>
                            </a>
                        </li>
                        <li class="item">
                            <a href="messages.php">
                                <span class="material-icons-sharp">
                                    textsms
                                </span>
                                <span>Messages</span>
                                <span class="message-count"><?php echo $messages_count ?></span>
                            </a>
                        </li>
                        <li class="item">
                            <a href="products.php">
                                <span class="material-icons-sharp">
                                    inventory
                                </span>
                                <span>Products</span>
                            </a>
                        </li>
                        <li class="item">
                            <a href="reviews.php">
                                <span class="material-icons-sharp">
                                    report
                                </span>
                                <span>Reviews</span>
                            </a>
                        </li>
                        <li class="item">
                            <a href="addproduct.php">
                                <span class="material-icons-sharp"> add </span>
                                <span>Add New Product</span>
                            </a>
                        </li>
                        <li class="item">
                            <a href="addcategory.php" class="active">
                                <span class="material-icons-sharp"> add_shopping_cart </span>
                                <span>Add New Category</span>
                            </a>
                        </li>
                        <li class="item">
                            <a href="#">
                                <span class="material-icons-sharp">
                                    logout
                                </span>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>

            <!-- Main -->
            <main class="main-container">
                <div class="admin-header">
                    <h1 class="main-title">Dashboard</h1>
                    
                    <!-- Sidebar droite -->
                    <aside class="extrabar">
                        <header class="header-right">
                            <div class="profile">
                                <div class="profile-info">
                                    <p>Hello, <strong>Laura</strong></p>
                                    <small>Admin</small>
                                </div>
                                <div class="profile-image">
                                    <img src="images/team-4.jpg" alt="" width="100%" />
                                </div>
                            </div>
                        </header>
                    </aside>
                </div>

                <!-- RECENT ORDERS -->
                <section class="recent-orders">
                    <div class="ro-title">
                        <h2 class="recent-orders-title">Add New Category</h2>
                    </div>

                    <div class="table-data">
                        <div class="container">
                            <form method="post" enctype="multipart/form-data">
                                <div class="project-details">
                                    <div class="input-box">
                                        <span class="details">Category Name</span>
                                        <input type="text" name="product_category" placeholder="Enter category">
                                    </div>

                                    <div class="input-box">
                                        <span class="details">Category Image</span>
                                        <input type="file" name="category_image">
                                    </div>
                                </div>

                                <div class="field_error" style="color: #d4af37; font-size:30px; margin-bottom: 30px;"><?php echo $msg ?></div>

                                <div class="button">
                                    <input type="submit" name="submit" value="Upload"> 
                                </div>
                            </form>                    
                        </div>
                    </div>
                </section>
            </main>


        </div>

        <script src="js/script.js"></script>
    </body>
</html>
