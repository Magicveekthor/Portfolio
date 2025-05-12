<?php
session_start();

include "admin/includes/db.php";
include "includes/functions.php";

#1. Determine page number
if(isset($_GET['page_no']) && $_GET['page_no']) {
    #if user has already entered page
    $page_no = $_GET['page_no'];
} else {
    #if user just entered the page then default page is 1
    $page_no = 1;
}

#2. return number of products
$stmt = $mysqli->prepare("SELECT COUNT(*) As total_records FROM `soul_products`");
$stmt->execute();
$stmt->bind_result($total_records);
$stmt->store_result();
$stmt->fetch();


#3. Set the total number of products
$total_records_per_page = 12;
$offset = ($page_no - 1) * $total_records_per_page; //concept of pagination

$previous_page = $page_no - 1;
$next_page = $page_no + 1;

$adjacents = "2";
$total_no_of_pages = ceil($total_records/$total_records_per_page);


#4. get all products
$stmt1 = $mysqli->prepare("SELECT * FROM `soul_products` LIMIT $offset, $total_records_per_page");
$stmt1->execute();
$categories = $stmt1->get_result();




#if the products are not so plenty then we will use this one
// $stmt = $mysqli->prepare("SELECT * FROM `soul_products`");
// $stmt->execute();
// $categories = $stmt->get_result();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Shop | LAURA AMAH</title>
    <link rel="shortcut icon" href="admin/images/soulwhite.png" type="image/png">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slick-theme.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
        <?php include 'includes/header.php';?>

        <!-- Content -->
        <div class="shop-heading text-center">
            <h1>All Clothing</h1>
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shop</li>
            </ul>
        </div>
        <div class="container container-content">
            <div class="shop-top">
                <div class="shop-element right">
                    <div class="view-mode view-group">
                        <a class="list-icon list"><i class="fa fa-circle" aria-hidden="true"></i></a>
                        <a class="grid-icon col active"><i class="zoa-icon-view-3"></i></a>
                    </div>
                </div>
            </div>
            <div class="product-collection-grid product-grid bd-bottom">
                <div class="row engoc-row-equal">

                <!-- <div class="col-md-3 col-sm-3 col-xs-12 col-left collection-sidebar" id="filter-sidebar">
                    <form>
                        <div class="close-sidebar-collection hidden-lg hidden-md">
                            <span>Filter</span><i class="icon_close ion-close"></i>
                        </div>
                        <div class="widget-filter filter-cate no-pd-top">
                            <h3>Categories</h3>
                            <ul>
                                <li><input type="radio" name="category"><label>Mens</label></li>
                                <li><input type="radio" name="category"><label>Womens</label></li>
                                <li><input type="radio" name="category"><label>Kids</label></li>
                                <li><input type="radio" name="category"><label>Accessories</label></li>
                            </ul>
                        </div>
                        <div class="widget-filter filter-cate no-pd-top">
                            <h3>Colors</h3>
                            <ul>
                                <li><input type="radio" name="category"><label>Red</label></li>
                                <li><input type="radio" name="category"><label>White</label></li>
                                <li><input type="radio" name="category"><label>Grey</label></li>
                            </ul>
                        </div>
                        <div class="widget-filter filter-cate no-pd-top">
                            <h3>Sizes</h3>
                            <ul>
                                <li><input type="radio" name="category"><label>S</label></li>
                                <li><input type="radio" name="category"><label>M</label></li>
                                <li><input type="radio" name="category"><label>L</label></li>
                                <li><input type="radio" name="category"><label>XL</label></li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <button name="change_account" class="change">Filter</button>
                        </div>
                    </form>
                </div> -->

                <div class="col-md-12 col-sm-12 col-xs-12 collection-list">

                    <?php while($row = $categories->fetch_assoc()) { ?>

                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 product-item">
                        <div class="product-img">
                            <a href="single-product.php?id=<?php echo $row['id']; ?>"><img src="admin/images/products/covers/<?php echo $row['cover_image'] ?>" alt="" class="img-responsive"></a>
                        </div>
                        <div class="product-info text-center">
                            <h3 class="product-title">
                                <a href="#"><?php echo $row['p_name'] ?></a>
                            </h3>
                            <div class="product-price">
                                <span>$<?php echo $row['p_price'] ?></span>
                            </div>
                        </div>
                    </div>

                    <?php } ?>


                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 product-item">
                        <div class="product-img">
                            <a href="#"><img src="img/product/product_3.jpg" alt="" class="img-responsive"></a>
                        </div>
                        <div class="product-info text-center">
                            <h3 class="product-title">
                                <a href="#">Grosgrain tie cotton top</a>
                            </h3>
                            <div class="product-price">
                                <span>$20.9</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 product-item">
                        <div class="product-img">
                            <a href="#"><img src="img/product/product_4.jpg" alt="" class="img-responsive"></a>
                        </div>
                        <div class="product-info text-center">
                            <h3 class="product-title">
                                <a href="#">Grosgrain tie cotton top</a>
                            </h3>
                            <div class="product-price">
                                <span>$20.9</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 product-item">
                        <div class="product-img">
                            <a href="#"><img src="img/product/product_2.jpg" alt="" class="img-responsive"></a>
                        </div>
                        <div class="product-info text-center">
                            <h3 class="product-title">
                                <a href="#">Grosgrain tie cotton top</a>
                            </h3>
                            <div class="product-price">
                                <span>$20.9</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 product-item">
                        <div class="product-img">
                            <a href="#"><img src="img/product/product_3.jpg" alt="" class="img-responsive"></a>
                        </div>
                        <div class="product-info text-center">
                            <h3 class="product-title">
                                <a href="#">Grosgrain tie cotton top</a>
                            </h3>
                            <div class="product-price">
                                <span>$20.9</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 product-item">
                        <div class="product-img">
                            <a href="#"><img src="img/product/product_4.jpg" alt="" class="img-responsive"></a>
                        </div>
                        <div class="product-info text-center">
                            <h3 class="product-title">
                                <a href="#">Grosgrain tie cotton top</a>
                            </h3>
                            <div class="product-price">
                                <span>$20.9</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <nav aria-label="Page navigation example" class="example">
                        <ul class="pagination">
                            <li class="page-item <?php if($page_no <= 1){echo 'disabled';} ?>">
                                <a class="page-link" href="<?php if($page_no <= 1){echo '#';}else{echo "?page_no=".$page_no - 1;} ?>">Previous</a>
                            </li>

                            <!-- <li class="page-item"><a class=page-link href="?page_no=1">1</a></li>
                            <li class="page-item"><a class=page-link href="?page_no=2">2</a></li> -->

                            <?php //if($page_no >= 3) { ?>
                                <!-- <li class="page-item"><a class=page-link href="#">...</a></li> -->
                                <!-- <li class="page-item"><a class=page-link href="<?php //echo "?page_no=".$page_no ?>"><?php //echo $page_no ?></a></li> -->
                            <?php // } ?>

                            <li class="page-item <?php if($page_no >= $total_no_of_pages){echo 'disabled';} ?>"">
                                <a class="page-link" href="<?php if($page_no >= $total_no_of_pages){echo '#';}else{echo "?page_no=".$page_no + 1;} ?>">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

        </div>

        <?php include "includes/footer.php"; ?>
        <!-- EndContent -->
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/countdown.js"></script>
    <script src="js/main.js"></script>
    <!-- <script>
        var popup =document.getElementById("popup");
        function closepop(){
            popup.classList.remove("active");
        }

        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting){
                    entry.target.classList.add("in-view")
                    entry.target.classList.remove("not-in-view")
                } else {
                    entry.target.classList.remove("in-view")
                    entry.target.classList.add("not-in-view")
                }
            })
        }, {
            rootMargin: "0px",
            threshold: [0, 0.1, 1]
        },
        );

        const tags = document.querySelectorAll(".product-item, .hover-images, .newsletter, footer")
        tags.forEach((tag) => {
            observer.observe(tag)
        })
    </script> -->
</body>
</html>