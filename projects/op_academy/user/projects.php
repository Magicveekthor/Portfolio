<?php 
include "includes/db.php";

//BRING OUT THE DATA FROM THE DATABASE
$query_projects = "SELECT * FROM `opemzy_projects` order by project_id desc";
$read_projects = $mysqli -> query($query_projects);

#delete blog post
if(isset($_GET['project_id'])){
    $project_id = $_GET['project_id'];
    $delete_project = "DELETE from opemzy_projects where project_id = '$project_id'";
    $query_delete_project = mysqli_query($mysqli, $delete_project) or die("Could not delete" . mysqli_error($mysqli));

    header("Location: projects.php");
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
                    <h1>Projects</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i>
                        <li>
                            <a class="active" href="projects.php">Projects</a>
                        </li>
                    </ul>
                </div>
                <a href="addproject.php" class="btn-download">
                    <i class='bx bxs-cloud-download'></i>
                    <span class="text">Add Project</span>
                </a>
            </div>

            <div class="table-data">
                <div class="order">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Project Name</th>
                                <th>Collaborators</th>
                                <th>Category</th>
                                <th>Location</th>
                                <th>Year</th>
                                <th>Description</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $read_projects->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $row['project_id'] ?></td>
                                    <td>
                                        <img src="assets/projects/cover/<?php  echo $row['project_cover_image']; ?>">
                                        <p><?php echo $row['project_name']; ?></p>
                                    </td>
                                    <td><?php echo $row['project_collab']; ?></td>
                                    <td><?php echo $row['project_category']; ?></td>
                                    <td><?php echo $row['project_location']; ?></td>
                                    <td><?php echo $row['project_year'] ?></td>
                                    <td>
                                        <?php 
                                            $project_descrip_string = $row['project_descrip'];
                                            if (strlen($project_descrip_string) > 20) {
                                                $stringCut = substr($project_descrip_string, 0, 70);
                                                $project_descrip_string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...';
                                            }
                                            echo $project_descrip_string
                                        ?>
                                    </td>
                                    <td>
                                        <a href="edit_project_info.php?project_id=<?php echo $row['project_id']; ?>" class="status completed">Edit</a>
                                        <td><a href="team.php?project_id=<?php echo $row['project_id']; ?>" class="status pending">Delete</a></td>
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