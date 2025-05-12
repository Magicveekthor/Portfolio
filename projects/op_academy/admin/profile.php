<?php

#connection file
include "includes/db.php";

$good_message = '';

$bad_message = '';

if(isset($_COOKIE['tutor_id'])){
    $tutor_id = $_COOKIE['tutor_id'];
} else {
    $tutor_id = '';
    header('Location:index.php');
}

if(isset($_POST['update'])) {

    $select_tutor = $conn->prepare("SELECT * FROM `tutors` WHERE id = ? LIMIT 1");
    $select_tutor->execute([$tutor_id]);
    $fetch_tutor = $select_tutor->fetch(PDO::FETCH_ASSOC);

    $name = $_POST['username'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);

    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);

    $profession = $_POST['profession'];
    $profession = filter_var($profession, FILTER_SANITIZE_STRING);

    if(!empty($name)) {
        $update_name = $conn->prepare("UPDATE `tutors` SET username = ? WHERE id = ?");
        $update_name->execute([$name, $tutor_id]);
        $good_message = 'Name updated successfully';
    }
     
    if(!empty($profession)) {
        $update_profession = $conn->prepare("UPDATE `tutors` SET profession = ? WHERE id = ?");
        $update_profession->execute([$profession, $tutor_id]);
        $good_message = 'Profession updated successfully';
    }

    if(!empty($email)) {
        $select_tutor_email = $conn->prepare("SELECT * FROM `tutors` WHERE email = ?");
        $select_tutor_email->execute([$email]);

        if($select_tutor_email->rowCount() > 0){
            $bad_message = 'Email already taken!';
        } else {
            $update_email = $conn->prepare("UPDATE `tutors` SET email = ? WHERE id = ?");
            $update_email->execute([$email, $tutor_id]);
            $good_message = 'Email Address updated successfully!';
        }
    }

    $prev_image = $fetch_tutor['image'];
    $image = $_FILES['image']['name'];
    $image = filter_var($image, FILTER_SANITIZE_STRING);
    $ext = pathinfo($image, PATHINFO_EXTENSION);
    $rename = create_unique_id().'.'.$ext;
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_size = $_FILES['image']['size'];
    $image_folder = 'assets/tutors/'.$rename;

    if(!empty($image)) {
        if($image_size > 2000000) {
            $bad_message = 'Warning: Image size is too large!';
        } else {
            // Get the image dimensions
            list($width, $height) = getimagesize($image_tmp_name);

            // Check if the image is 1:1 ratio
            if ($width != $height) {
                $bad_message = 'Warning: Image must be of ratio 1:1';
            } else {
                $update_image = $conn->prepare("UPDATE `tutors` SET image = ? WHERE id = ?");
                $update_image->execute([$rename, $tutor_id]);
                move_uploaded_file($image_tmp_name, $image_folder);
                if($prev_image != '' AND $prev_image != $rename) {
                    unlink('assets/tutors/'.$prev_image);
                }
                $good_message = 'Image updated successfully!';
            }
        }
    }

    #passwords (current, new and old)
    $empty_pass = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
    $prev_pass = $fetch_tutor['password'];
    $old_password = sha1($_POST['old_password']);
    $old_password = filter_var($old_password, FILTER_SANITIZE_STRING);
    $new_password = sha1($_POST['new_password']);
    $new_password = filter_var($new_password, FILTER_SANITIZE_STRING);
    $cpassword = sha1($_POST['cpassword']);
    $cpassword = filter_var($cpassword, FILTER_SANITIZE_STRING);

    if($old_password != $empty_pass) {
        if($old_password != $prev_pass) {
            $bad_message = 'Old password does not match!';
        } elseif($new_password != $cpassword) {
            $bad_message = 'New password does not match!';
        } else {
            if($new_password != $empty_pass) {
                $update_password = $conn->prepare("UPDATE `tutors` SET password = ? WHERE id = ?");
                $update_password->execute([$cpassword, $tutor_id]);
                $good_message = 'Password updated successfully!';
            } else {
                $bad_message = 'Please enter a new password!';
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | OPEMZY BIM</title>
    <!-- Bootstrap -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Css style -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/addproject.css" rel="stylesheet">
    <link href="assets/logo/Asset8.png" rel="icon">
</head>
<body>
    
    <!--SIDEBAR -->
    <?php include "includes/nav-link.php" ?>
    <!--SIDEBAR -->


    <!--CONTENT -->
    <section id="content">
        <!--NAVBAR -->
        <nav>
            <i class="bx bx-menu menus"></i>
            <a href="#" class="nav-link">Categories</a>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <a href="#" class="profile">
                <?php
                    $select_profile  = $conn->prepare("SELECT * FROM `tutors` WHERE id = ?");
                    $select_profile->execute([$tutor_id]);
                    if($select_profile->rowCount() > 0){
                        $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
                ?>
                
                <img src="assets/tutors/<?= $fetch_profile['image']; ?>" alt="">

                <?php } else { ?>
                    <img src="assets/tutors/guest.jpg" alt="">     
                <?php } ?>
            </a>
        </nav>
        <!--NAVBAR -->

        <!--MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Profile</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i>
                        <li>
                            <a class="active" href="team.php">Tutor's Info</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="table-data">
                <div class="container">
                    <div class="title">Profile</div>

                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="project-details">
                                <div class="input-box">
                                    <span class="details">Full Name</span>
                                    <input type="text" name="username" placeholder="<?= $fetch_profile['username'] ?>">
                                </div>
                    
                                <div class="input-box">
                                    <span class="details">Email Address</span>
                                    <input type="email" name="email" placeholder="<?= $fetch_profile['email'] ?>">
                                </div>

                                <div class="input-box">
                                    <span class="details">Profession</span>
                                    <input type="text" name="profession" placeholder="<?= $fetch_profile['profession'] ?>">
                                </div>

                                <div class="input-box">
                                    <span class="details">Old Password</span>
                                    <input type="password" name="old_password" placeholder="Enter Old Password">
                                </div>

                                <div class="input-box">
                                    <span class="details">New Password</span>
                                    <input type="password" name="new_password" placeholder="Enter New Password">
                                </div>

                                <div class="input-box">
                                    <span class="details">Confirm New Password</span>
                                    <input type="password" name="cpassword" placeholder="Confirm New Password">
                                </div>

                                <div class="input-box">
                                    <span class="details">Instructor Image</span>
                                    <input type="file" name="image">
                                    <p style="font-style: italic; padding-top: 7px; font-size: 14px;"><strong>Note:</strong> Image must be of ratio 1:1</p>
                                </div>
                            </div>

                            <div class="field_error" style="color: #8CB675; margin-top: 15px; font-size: 25px;"><?php echo $good_message ?></div> 

                            <div class="field_error" style="color: red; margin-top: 15px; font-size: 25px;"><?php echo $bad_message ?></div> 

                            <div class="button">
                                <input type="submit" name="update" value="Update Profile">
                            </div>
                        </form>                    
                </div>
            </div>
        </main>
        <!--MAIN -->
    </section>
    <!--CONTENT -->

    <script src="js/main.js"></script>
</body>
</html>