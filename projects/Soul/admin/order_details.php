<?php 
#connection file
include "includes/db.php";
include "includes/function.php";

if(isset($_POST['order_details']) && isset($_POST['order_id'])) {
    $order_id = $_POST['order_id'];
    $order_status = $_POST['order_status'];

    $stmt = $mysqli->prepare("SELECT * FROM soul_order_items WHERE order_id=?");
    $stmt->bind_param('i', $order_id);
    $stmt->execute();
    $order_details = $stmt->get_result();

    $order_total_price = calculateTotalPrice($order_details);
} else {
    header('Location: my-account.php');
    exit();
}

function calculateTotalPrice($order_details){
    $total = 0;

    foreach($order_details as $row) {

        $product_price = $row['product_price'];
        $product_quantity = $row['product_quantity'];

        $total = $total + ($product_price * $product_quantity);
    }
    return $total;
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
                            <a href="orders.php" class="active">
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
                        <h2 class="recent-orders-title">Order History</h2>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Product Color</th>
                                <th>Product Size</th>
                                <th>Product Price</th>
                                <th>Product Quality</th>
                                <th>Product Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($order_details as $row) { ?>
                                <tr>
                                    <td><img src="images/products/covers/<?php echo $row['product_image'] ?>"></td>
                                    <td><?php echo $row['product_name'] ?></td>
                                    <td><?php echo $row['product_color'] ?></td>
                                    <td><?php echo $row['product_size'] ?></td>
                                    <td><?php echo $row['product_price'] ?></td>
                                    <td><?php echo $row['product_quantity'] ?></td>
                                    <td>
                                        <?php $_SESSION['total_price'] = $row['product_quantity'] * $row['product_price'];
                                                echo $_SESSION['total_price']. '.00';  
                                        ?>
                                    </td>
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
