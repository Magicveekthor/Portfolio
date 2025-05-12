<?php
#connection file
include ("./admin/includes/db.php");

#get collections in the header
function getcollection() {
    global $mysqli;
    $select_categories = "SELECT * FROM `soul_category`";
    $result_category = mysqli_query($mysqli, $select_categories);

    while($row_data = mysqli_fetch_assoc($result_category)){
        $product_category = $row_data['product_category'];
        $category_image = $row_data['category_image'];

        echo "<div class='cate-item col-md-3 col-sm-12'>
                    <div class='demo-img'>
                        <a href='collection.php?product_category=$product_category' class='effect-img3 plus-zoom'><img src='admin/images/category/$category_image' alt='Soul Exclusive Collection' class='img-reponsive' style='width:100%; height:100%; object-fit:cover;'></a>
                    </div>
                    <div class='demo-text text-center'>$product_category</div>
                </div>";
    }
}


#get search collection
function search_collection() {
    global $mysqli;
    $select_categories = "SELECT * FROM `soul_category`";
    $result_category = mysqli_query($mysqli, $select_categories);

    while($row_data = mysqli_fetch_assoc($result_category)){
        $product_category = $row_data['product_category'];
        
        echo "<li><a href='collection.php?product_category=$product_category'>$product_category</a></li>";
    }
}

function mobile_collection() {
    global $mysqli;
    $select_categories = "SELECT * FROM `soul_category`";
    $result_category = mysqli_query($mysqli, $select_categories);

    while($row_data = mysqli_fetch_assoc($result_category)){
        $product_category = $row_data['product_category'];

        echo "<li class='level2'><a href='collection.php?product_category=$product_category' title='About Us'>$product_category</a></li>";
    }
}


#searching products function
function search_product(){
    global $mysqli;
        if(isset($_GET['search_data_product'])){
            $search_data_values = $_GET['search_data'];
            #display products
            $search_query = "SELECT * FROM `soul_products` where p_keyword LIKE '%$search_data_values%'";
            $result_query = mysqli_query($mysqli, $search_query);
            $num_of_rows = mysqli_num_rows($result_query);

            if($num_of_rows == 0) {
                echo "<div class='zoa-404'>
                        <div class='container'>
                            <div class='row'>
                                <div class='col-xs-12 col-sm-6 col-md-6' data-aos='fade-up' data-aos-duration='1000' data-aos-easing='ease-in-out'>
                                    <img src='img/404.png' class='img-responsive' alt=''>
                                </div>
                                <div class='col-xs-12 col-sm-6 col-md-6'>
                                    <h1>Whoops!</h1>
                                    <h3>Your style does not exist!</h3>
                                    <p>Any question? please contact us.</p>
                                    <a href='#' class='zoa-back'>Go back</a>
                                </div>
                            </div>
                        </div>
                    </div>";
            }

            while ($row = mysqli_fetch_assoc($result_query)){
                $id = $row['id'];
                $product_image = $row['cover_image'];
                $product_name = $row['p_name'];
                $product_price = $row['p_price'];


                echo "<div class='col-xs-6 col-sm-4 col-md-3 col-lg-3 product-item'>
                        <div class='product-img'>
                            <a href='single-product.php?id=$id'><img src='admin/images/products/covers/$product_image' alt='' class='img-responsive'></a>
                        </div>
                        <div class='product-info text-center'>
                            <h3 class='product-title'>
                                <a href='#'>$product_name</a>
                            </h3>
                            <div class='product-price'>
                                <span>$$product_price</span>
                            </div>
                        </div>
                    </div>";
            }
        }
}








?>