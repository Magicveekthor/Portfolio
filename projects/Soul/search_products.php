<?php 
include "admin/includes/db.php";
include "includes/functions.php";
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
                    <?php 
                        search_product();
                    ?>
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
    <script>
        var popup =document.getElementById("popup");
        function closepop(){
            popup.classList.remove("active");
        }
    </script>
</body>
</html>