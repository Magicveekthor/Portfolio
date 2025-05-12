<?php 
#connection file
include "includes/db.php";

$id = $_GET['id'];

if(isset($_GET['id'])) {
    $result_product = mysqli_query($mysqli, "SELECT * FROM `soul_products` where id = '$id'");
    $check_product = mysqli_num_rows($result_product);

    if($check_product > 0) {
        $row_products = mysqli_fetch_assoc($result_product);
        $p_name = $row_products['p_name'];
        $p_price = $row_products['p_price'];
        $p_keyword = $row_products['p_keyword'];
        $p_categories = $row_products['p_categories'];
        $p_size = $row_products['p_size'];
        $p_color = $row_products['p_color'];
        $p_material = $row_products['p_material'];
        $p_type = $row_products['p_type'];
        $p_descrip = $row_products['p_descrip'];
        $tmp_file = $row_products['cover_image'];
    } else {
        header('Location: products.php');
        die();
    }
}

if(isset($_POST['submit'])){
    $p_name = $_POST['p_name'];
    $p_price = $_POST['p_price'];
    $p_keyword = $_POST['p_keyword'];
    $p_categories = $_POST['p_categories'];
    $p_size = implode(", ",$_POST['p_size'] ?? []);
    $p_color = implode(", ",$_POST['p_color'] ?? []);
    $p_material = $_POST['p_material'];
    $p_type = $_POST['p_type'];
    $p_descrip = $_POST['p_descrip'];

    #inserting the cover image 
    $target_dir = "images/products/covers/";
    $target_file = $target_dir .basename($_FILES['cover_image']['name']);
    $tmp_file2 = $_FILES['cover_image']['name'];
    move_uploaded_file(($_FILES['cover_image']['tmp_name']), $target_file);

    if($tmp_file2 == ""){
        $update_products = mysqli_query($mysqli, "UPDATE soul_products SET p_name = '$p_name', p_price = '$p_price', p_keyword = '$p_keyword', p_categories = '$p_categories',
        p_size = '$p_size', p_color = '$p_color', p_material = '$p_material', p_type = '$p_type', p_descrip = '$p_descrip', cover_image = '$tmp_file' where id = '$id'");
    } else {
        $update_products = mysqli_query($mysqli, "UPDATE soul_products SET p_name = '$p_name', p_price = '$p_price', p_keyword = '$p_keyword', p_categories = '$p_categories',
        p_size = '$p_size', p_color = '$p_color', p_material = '$p_material', p_type = '$p_type', p_descrip = '$p_descrip', cover_image = '$tmp_file2' where id = '$id'");
    }

    #inserting multiple times
    $last_id = $mysqli -> $id;
    $c = count($_FILES['img']['name']);

    if($product_query){
        if($c < 10) {
            for ($i = 0; $i < $c; $i++){
                $img_name = $_FILES['img']['name'][$i];
                move_uploaded_file($_FILES['img']['tmp_name'][$i], "images/products/details/" .$img_name);
                $query_multi = "INSERT INTO soul_product_detail (images, proid) VALUES('$img_name', '$last_id')";
                $insert_multi = $mysqli -> query($query_multi);
            }
        }
    }

    header('Location: products.php');
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
        <!-- Multiple Select -->
        <link rel="stylesheet" href="css/virtual-select.min.css">
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
                            <a href="addproduct.php" class="active">
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
                        <h2 class="recent-orders-title">Add New Product</h2>
                    </div>

                    <div class="table-data">
                        <div class="container">
                            <form method="post" enctype="multipart/form-data">
                                <div class="project-details">
                                    <div class="input-box">
                                        <span class="details">Product Name</span>
                                        <input type="text" name="p_name" value="<?php echo $p_name ?>">
                                    </div>

                                    <div class="input-box">
                                        <span class="details">Product Price</span>
                                        <input type="text" name="p_price" value="<?php echo $p_price ?>">
                                    </div>

                                    <div class="input-box">
                                        <span class="details">Product Keywords</span>
                                        <input type="text" name="p_keyword" value="<?php echo $p_keyword ?>">
                                    </div>

                                    <div class="input-box">
                                        <span class="details">Product Category</span>
                                        <select name="p_categories">
                                            <option><?php echo $p_categories ?></option>
                                            <?php 
                                            $select_categories = "SELECT * FROM `soul_category`";
                                            $select_categories_query = mysqli_query($mysqli, $select_categories);
                                            while($row_data = mysqli_fetch_assoc($select_categories_query)){
                                                $product_category = $row_data['product_category'];
                                                $id = $row_data['id'];
                                                echo"<option value='$product_category'>$product_category</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="input-box">
                                        <span class="details">Product Size</span>
                                        <select id="multipleSelect" multiple name="p_size[]" placeholder="<?php echo $p_size ?>" data-search="false" data-silent-initial-value-set="true">
                                            <option value="<?php echo $p_size ?>" selected><?php echo $p_size ?></option>
                                            <option value="Small">Small</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Large">Large</option>
                                            <option value="XL">XL</option>
                                        </select>
                                    </div>

                                    <div class="input-box">
                                        <span class="details">Product Color</span>
                                        <select id="multipleSelect" multiple name="p_color[]" placeholder="<?php echo $p_color ?>" data-search="false" data-silent-initial-value-set="true">
                                            <option value="<?php echo $p_color ?>" selected><?php echo $p_color ?></option>
                                            <option value="Red">Red</option>
                                            <option value="Blue">Blue</option>
                                            <option value="Yellow">Yellow</option>
                                            <option value="Black">Black</option>
                                            <option value="Brown">Brown</option>
                                        </select>
                                    </div>

                                    <div class="input-box">
                                        <span class="details">Product Material/Texture</span>
                                        <input type="text" name="p_material" value="<?php echo $p_material ?>">
                                    </div>

                                    <div class="input-box">
                                        <span class="details">Product Type</span>
                                        <input type="text" name="p_type" value="<?php echo $p_type ?>">
                                    </div>

                                    <div class="input-box">
                                        <span class="details">Product Cover Image</span>
                                        <input type="file" name="cover_image">
                                        <img style="width:80px; height:80px; margin-top:5px;" src="images/products/covers/<?php echo $tmp_file; ?>">
                                    </div>

                                    <div class="input-box">
                                        <span class="details">Add More Product images</span>
                                        <input type="file" name="img[]" multiple>
                                    </div>

                                    <div class="input-box">
                                        <span class="details">Project Description</span>
                                        <textarea name="p_descrip"><?php echo $p_descrip ?></textarea>
                                    </div>
                                </div>

                                <div class="field_error" style="color: #000; font-size:25px; margin-bottom: 30px;"></div>

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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="js/virtual-select.min.js"></script>
        <script type="text/javascript">
            VirtualSelect.init({ 
                ele: '#multipleSelect' 
            });
        </script>

    </body>
</html>