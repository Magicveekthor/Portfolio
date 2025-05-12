<?php
#connection file
include "includes/db.php";

#Display categories
$services = "SELECT * FROM `opemzybim_services`";
$services_query = $mysqli -> query($services);

#delete blog post
if(isset($_GET['service_id'])){
    $service_id = $_GET['service_id'];
    $delete_service = "DELETE from opemzy_categories where service_id = '$service_id'";
    $query_delete_category = mysqli_query($mysqli, $delete_service) or die("Could not delete" .mysqli_error($mysqli));

    header("Location: services.php");
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
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i>
                        <li>
                            <a class="active" href="services.php">Services</a>
                        </li>
                    </ul>
                </div>
                <a href="addservice.php" class="btn-download">
                    <i class='bx bxs-cloud-download'></i>
                    <span class="text">Add Service</span>
                </a>
            </div>

            <div class="table-data">
                <div class="order">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Services</th>
                                <th>Description</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  while ($row = $services_query->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $row['service_id']; ?></td>
                                    <td><?php echo $row['service_title'] ?></td>
                                    <td>
                                        <?php 
                                            $service_descrip_string = $row['service_descrip']; 
                                            if (strlen($service_descrip_string) > 20) {
                                                $stringCut = substr($service_descrip_string, 0, 100);
                                                $service_descrip_string = substr($stringCut, 0, strrpos($stringCut, ' ')).' ...';
                                            }
                                            echo $service_descrip_string
                                        ?>
                                    </td>
                                    <td>
                                        <a href="edit_services.php?service_id=<?php echo $row['service_id']; ?>" class="status completed">Edit Service Info</a>
                                        <a href="services.php?service_id=<?php echo $row['service_id']; ?>" class="status pending">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        <!--MAIN -->
    </section>
    <!--CONTENT -->

    <script src="js/main.js"></script>
</body>
</html>