<?php 
session_start();

include "includes/db.php";

if(isset($_SESSION['admin_logged_in'])){
    header('Location: dashboard.php');
    exit;
}

$msg = '';

if(isset($_POST['login'])) {
    $email = $_POST['admin_username'];
    $password = $_POST['admin_password'];

    $stmt = $mysqli->prepare("SELECT * FROM `soul_admin` WHERE admin_username = ? AND admin_password = ? LIMIT 1");
    $stmt->bind_param('ss',$email, $password);

    if($stmt->execute()){
        $stmt->bind_result($admin_id, $admin_username, $admin_password,);
        $stmt->store_result();

        if($stmt->num_rows() == 1){
           $stmt->fetch();

           $_SESSION['admin_id'] = $admin_id;
           $_SESSION['admin_username'] = $admin_username;
           $_SESSION['admin_password'] = $admin_password;
           $_SESSION['admin_logged_in'] = true;

           header('Location: dashboard.php');
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Page | LAURA AMAH</title>
    <link rel="shortcut icon" href="images/soulwhite.png" type="image/png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="box">
        <div class="container">
            <div class="top-header">
                <span><img src="images/soul.png"></span>
                <header>Login</header>
            </div>
            <form method="POST">
                <div class="input-field">
                    <input type="text" name="admin_username" class="input" placeholder="Username">
                    <i class='bx bx-user'></i>
                </div>

                <div class="input-field">
                    <input type="password" name="admin_password" class="input" placeholder="Password">
                    <i class="bx bx-lock-alt"></i>
                </div>

                <div class="input-field">
                    <input type="submit" name="login" class="submit" value="Login">
                </div>

                <div class="bottom">
                    <div class="left">
                        <input type="checkbox" name="" id="check">
                        <label for="check">Remember Me</label>
                    </div>
                </div>
            </form>

            <div class="error">
                <label><a href="#"><?php echo $msg ?></a></label>
            </div>
        </div>
    </div>
</body>
</html>