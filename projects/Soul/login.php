<?php 
session_start();

include "admin/includes/db.php";
include "includes/functions.php";

if(isset($_SESSION['logged_in'])){
    header('Location: my-account.php');
    exit;
}

$msg = '';

if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $mysqli->prepare("SELECT * FROM `soul_users` WHERE user_email = ? AND user_password = ? LIMIT 1");
    $stmt->bind_param('ss',$email, $password);

    if($stmt->execute()){
        $stmt->bind_result($user_id, $user_name, $user_email, $user_password, $user_street, $user_zip, $user_phone, $user_country);
        $stmt->store_result();

        if($stmt->num_rows() == 1){
           $stmt->fetch();

           $_SESSION['user_id'] = $user_id;
           $_SESSION['user_name'] = $user_name;
           $_SESSION['user_email'] = $user_email;
           $_SESSION['user_street'] = $user_street;
           $_SESSION['user_zip'] = $user_zip;
           $_SESSION['user_phone'] = $user_phone;
           $_SESSION['user_country'] = $user_country;
           $_SESSION['logged_in'] = true;

           header('Location: my-account.php');
        } else {
            //error
            $msg = "Invalid Credentials";
        }
    } else {
        //error
        $msg = "Could not verify credentials";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Login | LAURA AMAH</title>
    <link rel="shortcut icon" href="admin/images/soulwhite.png" type="image/png">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slick-theme.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
            <?php include 'includes/header.php';?>

            <div class="my-account">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 porfolio">
                           <ul class="nav nav-tabs">
                                <li class="active"><a href="#">Login</a></li>
                            </ul>

                            <div class="tab-content">
                                <div id="home" class="tab-pane fade in active">
                                    <div class="form">
                                        <form action="login.php" method="post">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6">
                                                    <label>Email Address</label><br>
                                                    <input type="email" name="email" required class="country">
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <label>Password</label><br>
                                                    <input type="password" name="password" required class="city">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6">
                                                    <p style="font-size: 24px; color:red;"><?php echo $msg ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 col-sm-3">
                                                    <button name="login" class="change">Login</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="content">
                                            <h5>New Customer?<span style="text-transform: uppercase;">click<a href="register.php" style="color:#333; text-decoration:underline"> here </a>to register</span></h5>
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