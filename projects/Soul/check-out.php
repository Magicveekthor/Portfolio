<?php 
include "admin/includes/db.php";
include "includes/functions.php";


session_start();

if(!empty($_SESSION['cart'] && isset($_POST['checkout']))) {
    if(isset($_SESSION['logged_in'])) {
        
        $user_id = $_SESSION['user_id'];

        $stmt3 = $mysqli->prepare("SELECT * FROM soul_users WHERE user_id=?");
        $stmt3->bind_param('i', $user_id);

        
        $fullname = $_SESSION['user_name'];
        $email = $_SESSION['user_email'];
        $phone = $_SESSION['user_phone'];
        $street = $_SESSION['user_street'];
        $country = $_SESSION['user_country'];
        $zip = $_SESSION['user_zip'];
    }

} else {
    header('Location:cart.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Check-out | LAURA AMAH</title>
    <link rel="shortcut icon" href="admin/images/soulwhite.png" type="image/png">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slick-theme.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
            <?php include 'includes/header.php';?>

            <div class="check-out">
                <div class="container">
                    <div class="titlell">
                        <h2>Checkout</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-7 col-sm-7">
                            <div class="form-name">
                                <div class="content">
                                    <h5>Returning Custumer?<span style="text-transform: uppercase;">click<a href="#" style="color:#333; text-decoration:underline"> here </a>to login</span></h5>
                                </div>
                                
                                <div class="billing">
                                    <h2 style="font-size: 26px; padding-bottom:20px;font-weight: bold">billing details</h2>
                                    <form action="includes/place-order.php" method="post">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <label class="out">full name *</span></label><br>
                                                <input type="text" name="full_name" required class="district" value="<?php if(isset($fullname)){echo $fullname;}  ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <label class="out">email address *</label><br>
                                                <input type="text" name="user_email" required class="country" value="<?php if(isset($email)){echo $email;} ?>">
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <label class="out">phone *</label><br>
                                                <input type="text" name="phone" required class="district" value="<?php if(isset($phone)){echo $phone;} ?>">
                                            </div>
                                        </div>
                                        <label class="out">address *</label><br>
                                        <input type="text" name="address" required class="district" value="<?php if(isset($street)){echo $street;} ?>">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 ">
                                                <label class="out">country *</label><br>
                                                <input type="text" name="country" required class="country" value="<?php if(isset($country)){echo $country;} ?>">
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <label class="out">Postcode/ZIP</label><br>
                                                <input type="text" name="postcode" required class="district" value="<?php if(isset($zip)){echo $zip;} ?>">
                                            </div>

                                            <div class="place-ober col-md-12 col-sm-12">
                                                <button type="submit" name="place_order" class="ober">place order</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-5 col-sm-5 ">
                            <div class="order">
                                <div class="content-order">
                                    <div class="table">
                                        <table>
                                            <caption>your order</caption>
                                            <thead>
                                                <tr>
                                                    <th>product</th>
                                                    <th></th>
                                                    <th>total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($_SESSION['cart'] as $key => $value){ ?>
                                                <tr>
                                                    <td><?php echo $value['p_name'] ?></td>
                                                    <td><i class="fa fa-times" aria-hidden="true"></i><?php echo $value['p_quantity'] ?></td>
                                                     <td>$<?php echo $value['p_quantity'] * $value['p_price'] ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="content-total">
                                        <!-- <div class="total">
                                            <h5 class="sub-total">sub total</h5>
                                            <h5 class="prince">$<?php echo $_SESSION['total'] ?></h5>
                                        </div> -->

                                        <div class="total">
                                            <h5 class="sub-total">shipping</h5>
                                            <h5 class="prince">$10</h5>
                                        </div>

                                        <div class="total">
                                            <h5 class="sub-total">total</h5>
                                            <h5 class="prince">$<?php echo $_SESSION['total'] ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include "includes/footer.php"; ?>


        
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/countdown.js"></script>
        <script src="js/main.js"></script>
</body>

</html>