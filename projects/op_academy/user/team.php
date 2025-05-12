<?php 
include "includes/db.php";

//BRING OUT THE DATA FROM THE DATABASE
$query_team = "SELECT * FROM `opemzy_team`";
$read_team = $mysqli -> query($query_team);

#delete blog post
if(isset($_GET['team_id'])){
    $team_id = $_GET['team_id'];
    $delete_team = "DELETE from opemzy_team where team_id = '$team_id'";
    $query_delete_team = mysqli_query($mysqli, $delete_team) or die("Could not delete" . mysqli_error($mysqli));

    header("Location: team.php");
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
                    <h1>Team Members</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i>
                        <li>
                            <a class="active" href="team.php">Team</a>
                        </li>
                    </ul>
                </div>
                <a href="addteam.php" class="btn-download">
                    <i class='bx bxs-cloud-download'></i>
                    <span class="text">Add Team Member</span>
                </a>
            </div>

            <div class="table-data">
                <div class="order">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Department</th>
                                <th>Position</th>
                                <th>Experience</th>
                                <th>Email Address</th>
                                <th>Phone Number</th>
                                <th>Biography</th>
                                <th>Philosophy</th>
                                <th>Skills</th>
                                <th>Twitter</th>
                                <th>Instagram</th>
                                <th>YouTube</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while ($row=$read_team->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row['team_id'] ?></td>
                                <td>
                                    <img src="assets/team/<?php echo $row['team_picture']; ?>">
                                    <p><?php echo $row['team_name']; ?></p>
                                </td>
                                <td><?php echo $row['team_department']; ?></td>
                                <td><?php echo $row['team_position']; ?></td>
                                <td><?php echo $row['team_experience'] ?></td>
                                <td><?php echo $row['team_email']; ?></td>
                                <td><?php echo $row['team_phone']; ?></td>
                                <td>
                                    <?php 
                                        $team_biography_string = $row['team_biography'];
                                            if (strlen($team_biography_string) > 20) {
                                                $stringCut = substr($team_biography_string, 0, 25);
                                                $team_biography_string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...';
                                            }
                                        echo $team_biography_string
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        $team_philosophy_string = $row['team_philosophy'];
                                            if (strlen($team_philosophy_string) > 20) {
                                                $stringCut = substr($team_philosophy_string, 0, 25);
                                                $team_philosophy_string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...';
                                            }
                                        echo $team_philosophy_string
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        $team_skills_string = $row['team_skills'];
                                        if (strlen($team_skills_string) > 20) {
                                            $stringCut = substr($team_skills_string, 0, 25);
                                            $team_skills_string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...';
                                        }
                                        echo $team_skills_string 
                                    ?>
                                </td>
                                <td><?php echo $row['team_twitter']; ?></td>
                                <td><?php echo $row['team_instagram']; ?></td>
                                <td><?php echo $row['team_youtube']; ?></td>
                                <td>
                                    <a href="edit_staff.php?team_id=<?php echo $row['team_id']; ?>" class="status completed">Edit</a>
                                    <td><a href="team.php?team_id=<?php echo $row['team_id']; ?>" class="status pending">Delete</a></td>
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