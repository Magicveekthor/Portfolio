<?php 
#connection file
include "includes/db.php";
include "includes/function.php";

#Display categories
$products = "SELECT * FROM `soul_products`";
$products_query = $mysqli -> query($products);

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
                            <a href="products.php" class="active">
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
                        <h2 class="recent-orders-title">Products</h2>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Serial Number</th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Prouduct Price</th>
                                <th>Size</th>
                                <th>Color</th>
                                <th>Material/Texture</th>
                                <th>Product Type</th>
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
                                    <td><?php echo $row['p_material'] ?></td>
                                    <td><?php echo $row['p_type'] ?></td>
                                    <td>
                                        <?php
                                            if($row['status2'] == 1){
                                                echo "<a href='?type=status2&operation=deactive&id=".$row['id']."' class='status completed'>Available</a>";
                                            } else {
                                                echo "<a href='?type=status2&operation=active&id=".$row['id']."' class='status pending'>Unavailable</a>";   
                                            }

                                        ?>
                                    </td>
                                    <td><a href="edit_product.php?id=<?php echo $row['id'] ?>" class="status process">Edit</a></td>
                                    <td><a href="products.php?id=<?php echo $row['id']; ?>" class="status pending">Delete</a></td>
                                    
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </section>
            </main>


        </div>

        <script src="js/script.js"></script>
    </body>
</html>
