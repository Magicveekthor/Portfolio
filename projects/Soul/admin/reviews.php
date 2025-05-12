<?php 
#connection file
include "includes/db.php";
include "includes/function.php";

#Display products
$reviews = "SELECT * FROM `soul_reviews`";
$reviews_query = $mysqli -> query($reviews);

#delete blog post
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $delete_products = "DELETE from soul_reviews where id = '$id'";
    $query_delete_products = mysqli_query($mysqli, $delete_products) or die("Could not delete" .mysqli_error($mysqli));

    header("Location: custoners.php");
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
                            <a href="reviews.php" class="active">
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
                        <h2 class="recent-orders-title">Customer Reviews</h2>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Product ID</th>
                                <th>Reviewer Name</th>
                                <th>Reviewer Email</th>
                                <th>Review Body</th>
                                <th>Review Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = $reviews_query -> fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $row['proid'] ?></td>
                                    <td><?php echo $row['review_name'] ?></td>
                                    <td><?php echo $row['review_email'] ?></td>
                                    <td><?php echo $row['review_body'] ?></td>
                                    <td><?php echo $row['review_date'] ?></td>
                                    <td><a href="customers.php?id=<?php echo $row['id']; ?>" class="status pending">Delete</a></td>
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
