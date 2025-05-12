<?php
#connection file
include "includes/db.php";

$msg = '';

if(isset($_POST['submit'])) {
    $service_title = $_POST['service_title'];
    $service_descrip = addslashes($_POST['service_descrip']);

    #inserting the cover image
    $target_dir = "assets/services/";
    $target_file = $target_dir .basename($_FILES['service_picture']['name']);
    $tmp_file = $_FILES['service_picture']['name'];
    move_uploaded_file(($_FILES['service_picture']['tmp_name']), $target_file);

    $insert_service = "INSERT INTO opemzybim_services (service_title, service_descrip, service_picture) VALUES ('$service_title', '$service_descrip', '$tmp_file')";
    $query_service = $mysqli -> query($insert_service);
    header('Location: services.php');
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
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <a href="#" class="notification">
                <i class='bx bxs-bell'></i>
                <span class="num">8</span>
            </a>
            <a href="#" class="profile">
                <img src="img/8.jpg" alt="">
            </a>
        </nav>
        <!--NAVBAR -->

        <!--MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Services</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="team.php">Services</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i>
                        <li>
                            <a class="active" href="">Add Service</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="table-data">
                <div class="container">
                    <div class="title">Add New Service</div>

                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="project-details">
                                <div class="input-box">
                                    <span class="details">Service Title</span>
                                    <input type="text" name="service_title" placeholder="Enter Service Title">
                                </div>

                                <div class="input-box">
                                    <span class="details">Service Image</span>
                                    <input type="file" name="service_picture">
                                </div>

                                <div class="input-box">
                                    <span class="details">Description</span>
                                    <textarea name="service_descrip" placeholder="Enter Service Description"></textarea>
                                </div>
                            </div>

                            <!-- <div class="field_error" style="color: #d4af37; font-size:30px; margin-bottom: 30px;"><?php //echo $msg ?></div> -->

                            <div class="button">
                                <input type="submit" name="submit" value="Upload">
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