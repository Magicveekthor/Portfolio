<?php 
session_start();

include "admin/includes/db.php";
include "includes/functions.php";
include_once "Email.php";

if (isset($_SESSION['logged_in'])) {
    header('Location: my-account.php');
    exit;
}

$msg = '';

if(isset($_POST['register'])){
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    #if the passwords don't match
    if($password !== $confirmpassword) {
        $msg = "Passwords don't match";
    }

    #if the password is less than 6 letters
    else if(strlen($password) < 6){
        $msg = "Password must be more than 6 characters";
    }

    else {
        //Check whether user exists
        $stmt1 = $mysqli->prepare("SELECT count(*) FROM soul_users where user_email = ?");
        $stmt1->bind_param('s',$email);
        $stmt1->execute();
        $stmt1->bind_result($num_rows);
        $stmt1->store_result();
        $stmt1->fetch();

        if($num_rows != 0){
            $msg = 'Email already exist!';
        } else {
            //Create new user
            $stmt = $mysqli->prepare("INSERT INTO `soul_users`(user_name, user_email, user_password) VALUES(?,?,?)");
            $stmt->bind_param('sss', $fullname, $email, $password);


            //send email
            registerUser($email, $fullname);

            //if account was created successfully
            if($stmt->execute()){
                $user_id = $stmt->insert_id;
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_email'] = $email;
                $_SESSION['user_name'] = $fullname;
                $_SESSION['logged_in'] = true;

                header('location: login.php');

                //account could not be created
            } else {
                $msg = 'Account creation unsuccessful';
            }
        }
    }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Register | LAURA AMAH</title>
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
                                <li class="active"><a href="#">Register</a></li>
                            </ul>

                            <div class="tab-content">
                                <div id="menu1" class="tab-pane fade in active">
                                    <div class="form">
                                        <form method="post">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6">
                                                    <label>Full Name</label><br>
                                                    <input type="text" name="fullname" required class="country">
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                  <label>Email Address</label><br>
                                                  <input type="email" name="email" required class="city">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6">
                                                    <label>Password</label><br>
                                                    <input type="password" name="password" required class="zipcode">
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <label>Confirm Password</label><br>
                                                    <input type="password" name="confirmpassword" required class="phone">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6">
                                                    <p style="font-size: 24px; color:red;"><?php echo $msg ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 col-sm-3">
                                                    <button name="register" class="change">Register</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="content">
                                            <h5>Returning Customer?<span style="text-transform: uppercase;">click<a href="login.php" style="color:#333; text-decoration:underline"> here </a>to login</span></h5>
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