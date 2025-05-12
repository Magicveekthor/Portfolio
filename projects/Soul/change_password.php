<?php 
session_start();

include "admin/includes/db.php";
include "includes/functions.php";

if(!isset($_SESSION['logged_in'])) {
    header('Location: login.php');    
}


$msg = '';

if(isset($_POST['change_password'])) {
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $user_email = $_SESSION['user_email'];

    #if the passwords don't match
    if($password !== $confirmpassword) {
        $msg = "Passwords don't match";

    #if the password is less than 6 letter
    }else if(strlen($password) < 6){
        $msg = "Password must be more than 6 characters";

    #if no errors
    }else {
        $stmt = $mysqli->prepare("UPDATE soul_users SET user_password=? where user_email=?");
        $stmt->bind_param('ss',$password, $user_email);

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                $msg = "Password changed successfully!";
            } else {
                $msg = "Email not found in the database.";
            }
        } else {
            $msg = "Something went wrong: " . $stmt->error;
        }
    }
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
    <title>Change Password | LAURA AMAH</title>
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

                            <div class="login">
                                <ul class="nav ">
                                    <li><a href="my-account.php""><img src="img/Icon_Add.jpg" alt="Icon_User.jpg">Account Details</a></li>
                                    <li class="active"><a href="change_password.php"><img src="img/Icon_Lock.jpg" alt="Icon_User.jpg"> change password</a></li>
                                    <li><a href="my-account.php?logout=1"><img src="img/Icon_Off.jpg" alt="Icon_User.jpg"> log out</a></li>
                                </ul>
                            </div>

                        </div> 
                    </div>
                    <div class="col-md-8 col-sm-8 porfolio">
                       <ul class="nav nav-tabs">
                            <li class="active"><a href="#">Change Password</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">
                              <div class="form">
                                    <form method="post">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <label>Password</label><br>
                                                <input type="password" name="password" placeholder="Enter new password" required class="country">
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <label>Confirm Password</label><br>
                                                <input type="password" name="confirmpassword" placeholder="Confirm new password" required class="city">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <p style="font-size: 24px; color:red;"><?php echo $msg ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 col-sm-3">
                                                <button name="change_password" class="change">Save Changes</button>
                                            </div>
                                        </div>
                                    </form>
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