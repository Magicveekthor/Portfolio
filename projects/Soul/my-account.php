<?php 
session_start();

include "admin/includes/db.php";
include "includes/functions.php";

if(!isset($_SESSION['logged_in'])) {
    header('Location: login.php');    
}

$msg = '';

if(isset($_POST['change_account'])){
    $fullname = $_POST['fullname'];
    $street = $_POST['street'];
    $zipcode = $_POST['zipcode'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];

    $user_id = $_SESSION['user_id'];

    //Check whether user exists
    $stmt2 = $mysqli->prepare("UPDATE soul_users SET user_name=?, user_street=?, user_zip=?, user_phone=?, user_country=? where user_id=?");
    $stmt2->bind_param('sssssi', $fullname, $street, $zipcode, $phone, $country, $user_id);

    if ($stmt2->execute()) {
        $_SESSION['user_name'] = $fullname;
        $_SESSION['user_street'] = $street;
        $_SESSION['user_zip'] = $zipcode;
        $_SESSION['user_phone'] = $phone;
        $_SESSION['user_country'] = $country;
        $msg = "Data updated successfully!"; 
    } else {
        $msg = "Something went wrong: " . $stmt2->error;
    }
}


#get order
if(isset($_SESSION['logged_in'])){

    $user_id = $_SESSION['user_id'];

    $stmt3 = $mysqli->prepare("SELECT * FROM soul_orders WHERE user_id=?");
    $stmt3->bind_param('i', $user_id);

    $stmt3->execute();

    $orders = $stmt3->get_result();
}

if(isset($_GET['logout'])) {
    if(isset($_SESSION['logged_in'])) {
        unset($_SESSION['logged_in']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_password']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_street']);
        unset($_SESSION['user_zip']);
        unset($_SESSION['user_phone']);
        unset($_SESSION['user_country']);
        header('Location: login.php');
        exit;
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Account | Soul Exclusive</title>
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
            <div class="container container-content">
                <ul class="breadcrumb v2">
                    <li><a href="home.php">Home</a></li>
                    <li class="active">My Account</li>
                </ul>
            </div>

            <div class="my-account">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 howday">
                            <div class="titlelt">
                                <h2>Hello, <strong> <?php if(isset($_SESSION['user_name'])){echo $_SESSION['user_name'];}  ?>!</strong></h2>
                                <!-- <div class="address">
                                    <ul class="nav ">
                                        <li><a href="#"><img src="img/Icon_User.jpg" alt="Icon_User.jpg"> Account detail</a></li>
                                        <li class="active"><a href="#"><img src="img/Icon_Add.jpg" alt="Icon_User.jpg"> BillinG Address</a></li>
                                        <li><a href="#"><img src="img/Icon_Listing.jpg" alt="Icon_User.jpg"> My orders</a></li>
                                    </ul>
                                </div> -->

                                <div class="login">
                                    <ul class="nav ">
                                        <li class="active"><a href="my-account.php"><img src="img/Icon_Add.jpg" alt="Icon_User.jpg">Account Details</a></li>
                                        <li><a href="change_password.php"><img src="img/Icon_Lock.jpg" alt="Icon_User.jpg"> change password</a></li>
                                        <li><a href="my-account.php?logout=1"><img src="img/Icon_Off.jpg" alt="Icon_User.jpg"> log out</a></li>
                                    </ul>
                                </div>

                            </div> 
                        </div>
                        
                        <?php if(isset($_GET['payment_message'])) { ?>
                            <div class="col-md-4 col-sm-4">
                                <div class="success_message"><?php echo $_GET['payment_message'] ?></div>
                            </div>
                        <?php } ?>
                        
                        <div class="col-md-8 col-sm-8 porfolio">
                           <ul class="nav nav-tabs">
                                <li class="active"><a href="#home">My Orders</a></li>
                                <li><a href="#menu1">Billing Adress</a></li>
                            </ul>

                            

                            <div class="tab-content">
                                <div id="menu1" class="tab-pane fade">
                                  <div class="form">
                                        <form method="post">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6">
                                                     <label>Full Name</label><br>
                                                    <input type="text" name="fullname" value="<?php if(isset($_SESSION['user_name'])){echo $_SESSION['user_name'];}  ?>" required class="country">
                                                 </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <label>Email Address</label><br>
                                                     <input type="text" name="email" disabled value="<?php if(isset($_SESSION['user_email'])){echo $_SESSION['user_email'];}  ?>" required class="city">
                                                 </div>
                                            </div>
                                            <label>Street address</label>
                                            <input type="text" name="street" value="<?php if(isset($_SESSION['user_street'])){echo $_SESSION['user_street'];}  ?>" class="city">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6">
                                                    <label>ZIP</label><br>
                                                    <input type="text" value="<?php if(isset($_SESSION['user_zip'])){echo $_SESSION['user_zip'];}  ?>" name="zipcode" class="zipcode">
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <label>Phone</label><br>
                                                    <input type="text" value="<?php if(isset($_SESSION['user_phone'])){echo $_SESSION['user_phone'];}  ?>" name="phone" class="phone">
                                                </div>
                                             </div>
                                            <label class="mail">Country</label><br>
                                            <input type="text" value="<?php if(isset($_SESSION['user_country'])){echo $_SESSION['user_country'];}  ?>" name="country" class="gmail">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6">
                                                    <p style="font-size: 24px; color:red;"><?php echo $msg ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 col-sm-3">
                                                    <button name="change_account" class="change">Save Changes</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div id="home" class="tab-pane fade in active">
                                <div class="tab-content">
                                    <div id="cart" class="tab-pane fade in active">
                                        <div class="shopping-cart">
                                            <div class="table-responsive" style="margin-top: 27px;">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Order Cost</th>
                                                            <th scope="col">Order Status</th>
                                                            <th scope="col">Order Date</th>
                                                            <th scope="col">Order Info</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php while($row = $orders->fetch_assoc()) { ?>
                                                            <tr>
                                                                <th scope="row"><?php echo $row['order_id'] ?></th>
                                                                <td><?php echo $row['order_cost'] ?></td>
                                                                <td><?php echo $row['order_status'] ?></td>
                                                                <td><?php echo $row['order_date'] ?></td>
                                                                <td>
                                                                    <form method="POST" action="order_details.php" class="my-account">
                                                                        <input type="hidden" value="<?php echo $row['order_status'] ?>" name="order_status">
                                                                        <input type="hidden" value="<?php echo $row['order_id'] ?>" name="order_id">   
                                                                        <input type="submit" name="order_details" value="View More">
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>           
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        <!-- EndContent -->

        <?php include "includes/footer.php"; ?>



        </div>
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/countdown.js"></script>
        <script src="js/main.js"></script>

        <script>
            $(document).ready(function(){
                $(".nav-tabs a").click(function(){
                    $(this).tab('show');
                });
                $('.nav-tabs a').on('shown.bs.tab', function(event){
                    var x = $(event.target).text();         // active tab
                    var y = $(event.relatedTarget).text();  // previous tab
                    $(".act span").text(x);
                    $(".prev span").text(y);
                });
            });
        </script>
</body>
</html>