<?php
#connection file
include "includes/db.php";

if(isset($_COOKIE['tutor_id'])){
    $tutor_id = $_COOKIE['tutor_id'];
} else {
    $tutor_id = '';
}

$message = '';

if(isset($_POST['register'])){
    $id = create_unique_id();

    $name = $_POST['username'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);

    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);

    $profession = $_POST['profession'];
    $profession = filter_var($profession, FILTER_SANITIZE_STRING);

    $password = sha1($_POST['password']);
    $password = filter_var($password, FILTER_SANITIZE_STRING);

    $cpassword = sha1($_POST['cpassword']);
    $cpassword = filter_var($cpassword, FILTER_SANITIZE_STRING);

    $image = $_FILES['image']['name'];
    $image = filter_var($image, FILTER_SANITIZE_STRING);
    $ext = pathinfo($image, PATHINFO_EXTENSION);
    $rename = create_unique_id().'.'.$ext;
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_size = $_FILES['image']['size'];
    $image_folder = 'assets/tutors/'.$rename;

    #checking the email address
    $select_tutor_email = $conn->prepare("SELECT * FROM `tutors` WHERE email = ?");
    $select_tutor_email->execute([$email]);
    if($select_tutor_email->rowCount() > 0) {
        $message = 'Email address already taken';
    } else {
        if($password != $cpassword){
            $message = "Password does not match";
        } else {
            if($image_size > 2000000) {
                $message = 'image size is too large';
            } else {
                // Get the image dimensions
                list($width, $height) = getimagesize($image_tmp_name);

                // Check if the image is 1:1 ratio
                if ($width != $height) {
                    $message = 'Image must be of ratio 1:1';
                } else {
                    $insert_tutor = $conn->prepare("INSERT INTO `tutors`(id, username, email, profession, password, image) VALUES (?,?,?,?,?,?)");
                    $insert_tutor->execute([$id, $name, $email, $profession, $password, $rename]);
                    move_uploaded_file($image_tmp_name, $image_folder);
    
                    $verify_tutor = $conn->prepare("SELECT * FROM `tutors` WHERE email = ? AND password = ? LIMIT 1");
                    $verify_tutor->execute([$email, $password]);
                    $row = $verify_tutor->fetch(PDO::FETCH_ASSOC);
                }
    
                if($insert_tutor) {
                    if($verify_tutor->rowCount() > 0){
                        setcookie('tutor_id', $row['id'], time() + 60*60*24*30, '/');
                        header('Location: dashboard.php');
                    } else {
                        $message = 'Something went wrong!';
                    }
                }                
            }
        }
    }

}



if(isset($_POST['login'])){
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);

    $password = sha1($_POST['password']);
    $password = filter_var($password, FILTER_SANITIZE_STRING);

    $verify_tutor = $conn->prepare("SELECT * FROM `tutors` WHERE email = ? AND password = ? LIMIT 1");
    $verify_tutor->execute([$email, $password]);
    $row = $verify_tutor->fetch(PDO::FETCH_ASSOC);

    if($verify_tutor->rowCount() > 0){
        setcookie('tutor_id', $row['id'], time() + 60*60*24*30, '/');
        header('Location: dashboard.php');
    } else {
        $message = 'Incorrect email or password!';
    }          
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/logo.png">
    <title>Admin Login | OPEMZY BIM</title>
    <link href="assets/logo/Asset8.png" rel="icon">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Login</span>

                <form action="#" method="post">
                    <div class="input-field">
                        <input type="text" name="email" placeholder="Enter your email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>

                    <div class="input-field">
                        <input type="password" name="password" class="password" placeholder="Enter your password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" class="text">Remember me</label>
                        </div>

                        <a href="#" class="text">Forgot Password?</a>
                    </div>    

                    <div class="input-field button">
                        <input type="submit" name="login" value="Login">
                    </div>

                    <div class="field_error" style="color: red;"><?php echo $message ?></div> 
                </form>

                <div class="login-signup">
                    <span class="text">Not a tutor?
                        <a href="#" class="text signup-link">Register!</a>
                    </span>
                </div>
            </div>

            <!-- Registration form -->
            <div class="form signup">
                <span class="title">Register</span>

                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="input-field">
                        <input type="text" name="username" maxlength="50" placeholder="Enter your name">
                        <i class="uil uil-user icon"></i>
                    </div>

                    <div class="input-field">
                        <input type="email" name="email" placeholder="Enter your email">
                        <i class="uil uil-envelope icon"></i>
                    </div>

                    <div class="input-field">
                        <input type="text" name="profession" placeholder="Enter your profession">
                        <i class="uil uil-graduation-cap icon"></i>
                    </div>

                    <div class="input-field">
                        <input type="password" name="password" class="password" placeholder="Enter your password">
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="input-field">
                        <input type="password" name="cpassword" class="password" placeholder="Confirm password">
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="input-field">
                        <input type="file" name="image" accept="image/*">
                    </div>
                    <p style="font-style: italic; padding-top: 7px; font-size: 14px;">The picture must be ratio 1:1</p>

                    <div class="field_error" style="color: #d4af37; font-size:30px; margin-bottom: 30px;"><?php echo $message ?></div>

                    <div class="input-field button">
                        <input type="submit" name="register" value="Register">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Already a tutor?
                        <a href="#" class="text login-link">Login Now!</a>
                    </span>
                </div>
            </div>
        </div>
    </div>


    <script>
        const container = document.querySelector(".container"),
              pwShowHide = document.querySelectorAll(".showHidePw"),
              pwFields = document.querySelectorAll(".password"),
              signUp = document.querySelector(".signup-link"),
              login = document.querySelector(".login-link");

       // js code to show/hide password and change icon
       pwShowHide.forEach(eyeIcon => {
            eyeIcon.addEventListener("click", () => {
                pwFields.forEach(pwField => {
                    if(pwField.type === "password"){
                        pwField.type = "text";

                        pwShowHide.forEach(icon => {
                            icon.classList.replace("uil-eye-slash", "uil-eye")
                        })
                    } else {
                        pwField.type = "password";

                        pwShowHide.forEach(icon => {
                            icon.classList.replace("uil-eye", "uil-eye-slash")
                        })
                    }
                })
            })
       });


       //js code to show and hide the forms
       signUp.addEventListener("click", () => {
            container.classList.add("active");
       });

       login.addEventListener("click", () => {
            container.classList.remove("active");
       });
    </script>
</body>
</html>