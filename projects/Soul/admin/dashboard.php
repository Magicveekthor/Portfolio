<?php 
#connection file
include "includes/db.php";
include "includes/function.php";

#Display products
$products = "SELECT * FROM `soul_products`";
$products_query = $mysqli -> query($products);

#Display categories
$categories = "SELECT * FROM `soul_category`";
$category_query = $mysqli -> query($categories);

#getting the available and out of stock
if(isset($_GET['type']) && $_GET['type']!=''){
    $type = get_safe_value($mysqli, $_GET['type']);
    if($type == 'status2'){
        $operation = get_safe_value($mysqli,$_GET['operation']);
        $id = get_safe_value($mysqli, $_GET['id']);
        if($operation == 'active') {
            $status2 = '1';
        } else {
            $status2 ='0';
        }
        $update_status_sql = "UPDATE soul_products SET status2 = '$status2' where id = '$id' ";
        mysqli_query($mysqli, $update_status_sql);

        header('location: products.php');
    }
}

#delete blog post
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $delete_products = "DELETE from soul_products where id = '$id'";
    $query_delete_products = mysqli_query($mysqli, $delete_category) or die("Could not delete" .mysqli_error($mysqli));

    header("Location: products.php");
}


#count products
$products = "SELECT * FROM soul_products";
$team_real2 = mysqli_query($mysqli, $products);
$team_count = mysqli_num_rows($team_real2);

#count category
$categories = "SELECT * FROM soul_category";
$project_result = mysqli_query($mysqli, $categories);
$project_count = mysqli_num_rows($project_result);

#count messages
$messages = "SELECT * FROM soul_message where status2 = '1'";
$messages_result = mysqli_query($mysqli, $messages);
$messages_count = mysqli_num_rows($messages_result);

#count messages
$messages_dashboard = "SELECT * FROM soul_message where status2 = '1'";
$messages_result_dashboard = mysqli_query($mysqli, $messages_dashboard);
$messages_count_dashboard = mysqli_num_rows($messages_result_dashboard);
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
        <div class="dashboard-container">
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
                            <a href="dashboard.php" class="active">
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
                            <a href="addcategory.php">
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
                <h1 class="main-title">Dashboard</h1>

                <!-- CARD -->
                <div class="insights">
                    <div class="card">
                        <div class="card-container">
                            <div class="card-header">
                                <span class="material-icons-sharp">
                                    inventory
                                </span>
                            </div>
                            <div class="card-body">
                                <div class="card-info">
                                    <h1>Products</h1>
                                </div>

                                <div class="card-progress">
                                    <div class="percentage">
                                        <h2><?php echo $team_count ?></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <small>Laura Amah</small>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-container">
                            <div class="card-header">
                                <span class="material-icons-sharp">
                                    shopping_cart
                                </span>
                            </div>
                            <div class="card-body">
                                <div class="card-info">
                                    <h1>Categories</h1>
                                </div>

                                <div class="card-progress">
                                    <div class="percentage">
                                        <h2><?php echo $project_count ?></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <small>Laura Amah</small>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-container">
                            <div class="card-header">
                                <span class="material-icons-sharp">
                                    textsms
                                </span>
                            </div>
                            <div class="card-body">
                                <div class="card-info">
                                    <h1>Messages</h1>
                                </div>

                                <div class="card-progress">
                                    <div class="percentage">
                                        <h2><?php echo $messages_count_dashboard ?></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <small>Laura Amah</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RECENT ORDERS -->
                <section class="recent-orders">
                    <div class="ro-title">
                        <h2 class="recent-orders-title">Recent Products</h2>
                        <a href="#" class="show-all">View All</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Prouduct Price</th>
                                <th>Size</th>
                                <th>Color</th>
                                <th>Status</th>
                                <th colspan="2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = $products_query -> fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><img src="images/products/covers/<?php echo $row['cover_image'] ?>"alt=""width="100%"></td>
                                    <td><?php echo $row['p_name'] ?></td>
                                    <td><?php echo $row['p_price'] ?></td>
                                    <td><?php echo $row['p_size'] ?></td>
                                    <td><?php echo $row['p_color']?></td>
                                    <td>
                                        <?php
                                            if($row['status2'] == 1){
                                                echo "<a href='?type=status2&operation=deactive&id=".$row['id']."' class='status completed'>Available</a>";
                                            } else {
                                                echo "<a href='?type=status2&operation=active&id=".$row['id']."' class='status pending'>Unavailable</a>";   
                                            }

                                        ?>
                                    </td>
                                    <td><a href="products.php?id=<?php echo $row['id']; ?>" class="status pending">Delete</a></td>
                                    
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </section>
            </main>

            <!-- Sidebar droite -->
            <aside class="extrabar">
                <header class="header-right">
                    <!-- <button class="toggle-menu-btn" id="openSidebar">
                        <span class="material-icons-sharp"> menu </span>
                    </button>

                    <div class="toggle-theme">
                        <span class="material-icons-sharp active">
                            tungsten
                        </span>
                        <span class="material-icons-sharp"> dark_mode </span>
                    </div> -->
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

                <!-- Stat -->
                <div class="analytics">
                    <h2>Categories</h2>
                        <?php while($row = $category_query -> fetch_assoc()) { ?>
                            <div class="order direct">
                                <div class="order-icon">
                                    <span class="material-icons-sharp">
                                        shopping_cart
                                    </span>
                                </div>
                                <div class="order-details">
                                    <div class="info">
                                        <h3><?php echo $row['product_category'] ?></h3>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <a class="new-product" href="addcategory.php">
                        <span class="material-icons-sharp"> add </span>
                        <h3>Add New Category</h3>
                    </a>
                </div>
            </aside>
        </div>

        <script src="js/script.js"></script>
    </body>
</html>
