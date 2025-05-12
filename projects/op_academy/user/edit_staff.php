<?php 
#connection file
include 'includes/db.php';

$team_id = $_GET['team_id'];
if(isset($_GET['team_id'])) {
    $result_team = mysqli_query($mysqli, "SELECT * FROM `opemzy_team` where team_id = '$team_id'");
    $check_team = mysqli_num_rows($result_team);

    if($check_team > 0){
        $row_team = mysqli_fetch_assoc($result_team);
        $team_name = $row_team['team_name'];
        $team_department = $row_team['team_department'];
        $team_position = $row_team['team_position'];
        $team_experience = $row_team['team_experience'];
        $team_email = $row_team['team_email'];
        $team_phone = $row_team['team_phone'];
        $team_biography = $row_team['team_biography'];
        $team_philosophy = $row_team['team_philosophy'];
        $team_skills = $row_team['team_skills'];
        $team_twitter = $row_team['team_twitter'];
        $team_instagram = $row_team['team_instagram'];
        $team_youtube = $row_team['team_youtube'];
        $tmp_file = $row_team['team_picture'];
    } else {
        header('Location: team.php');
        die();
    }
}

if(isset($_POST['submit'])) {
    $team_name = $_POST['team_name'];
    $team_email = $_POST['team_email'];
    $team_phone = $_POST['team_phone'];
    $team_department = $_POST['team_department'];
    $team_position = $_POST['team_position'];
    $team_experience = $_POST['team_experience'];
    $team_skills = implode(", ",$_POST['team_skills'] ?? []);
    $team_twitter = $_POST['team_twitter'];
    $team_instagram = $_POST['team_instagram'];
    $team_youtube = $_POST['team_youtube'];
    $team_philosophy = addslashes($_POST['team_philosophy']);
    $team_biography = addslashes($_POST['team_biography']);

    #inserting the cover image
    $target_dir = "assets/team/";
    $target_file = $target_dir .basename($_FILES['team_picture']['name']);
    $tmp_file2 = $_FILES['team_picture']['name'];
    move_uploaded_file(($_FILES['team_picture']['tmp_name']), $target_file);

    if($tmp_file2 == ""){
        $update_team = mysqli_query($mysqli, "UPDATE opemzy_team SET team_name = '$team_name', team_department = '$team_department', team_position = '$team_position', team_experience = '$team_experience', team_email = '$team_email', team_phone = '$team_phone', team_biography = '$team_biography', team_philosophy = '$team_philosophy', team_skills = '$team_skills', team_twitter = '$team_twitter', team_instagram = '$team_instagram', team_youtube = '$team_youtube', team_picture = '$tmp_file' where team_id = '$team_id'");
    } else {
        $update_team = mysqli_query($mysqli, "UPDATE opemzy_team SET team_name = '$team_name', team_department = '$team_department', team_position = '$team_position', team_experience = '$team_experience', team_email = '$team_email', team_phone = '$team_phone', team_biography = '$team_biography', team_philosophy = '$team_philosophy', team_skills = '$team_skills', team_twitter = '$team_twitter', team_instagram = '$team_instagram', team_youtube = '$team_youtube', team_picture = '$tmp_file2' where team_id = '$team_id'");
    }

    header('Location: team.php');

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
    <!-- Multiple Select -->
    <link rel="stylesheet" href="css/virtual-select.css">
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
                    <h1>Team</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="team.php">Team</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i>
                        <li>
                            <a class="active" href="">Edit Team Member</a>
                        </li>
                    </ul>
                </div>
                <!-- <a href="" class="btn-download">
                    <i class='bx bxs-cloud-download'></i>
                    <span class="text">Add Project</span>
                </a> -->
            </div>

            <div class="table-data">
                <div class="container">
                    <div class="title">Add Team Member</div>

                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="project-details">
                                <div class="input-box">
                                    <span class="details">Full Name</span>
                                    <input type="text" name="team_name" value="<?php if (isset($team_name)) {echo $team_name;} ?>">
                                </div>
                    
                                <div class="input-box">
                                    <span class="details">Email Address</span>
                                    <input type="email" name="team_email" value="<?php if (isset($team_email)) {echo $team_email;} ?>">
                                </div>

                                <div class="input-box">
                                    <span class="details">Phone Number</span>
                                    <input type="text" name="team_phone" value="<?php if (isset($team_phone)) {echo $team_phone;} ?>">
                                </div>

                                <div class="input-box">
                                    <span class="details">Department</span>
                                    <input type="text" name="team_department" value="<?php if (isset($team_department)) {echo $team_department;} ?>">
                                </div>

                                <div class="input-box">
                                    <span class="details">Years of Experience</span>
                                    <input type="text" name="team_experience" value="<?php if (isset($team_experience)) {echo $team_experience;} ?>">
                                </div>

                                <div class="input-box">
                                    <span class="details">Position</span>
                                    <input type="text" name="team_position" value="<?php if (isset($team_position)) {echo $team_position;} ?>">
                                </div>

                                <div class="input-box">
                                    <span class="details">Skills</span>
                                    <select id="multipleSelect" multiple name="team_skills[]" placeholder="<?php if (isset($team_skills)) {echo $team_skills;} ?>"" data-search="false" data-silent-initial-value-set="true">
                                        <option value="<?php if (isset($team_skills)) {echo $team_skills;} ?>"><?php if (isset($team_skills)) {echo $team_skills;} ?></option>
                                        <option value="Autodesk Revit">Autodesk Revit</option>
                                        <option value="Autodesk AutoCad">Autodesk AutoCad</option>
                                        <option value="D5 Render">D5 Render</option>
                                        <option value="Lumion">Lumion</option>
                                        <option value="3Ds Max">3Ds Max</option>
                                        <option value="Corona">Corona</option>
                                        <option value="Vray">Vray</option>
                                        <option value="Adobe InDesign">Adobe InDesign</option>
                                        <option value="Adobe Premiere">Adobe Premiere</option>
                                        <option value="Adobe Photoshop">Adobe Photoshop</option>
                                        <option value="Adobe Illustrator">Adobe Illustrator</option>
                                        <option value="HTML">HTML</option>
                                        <option value="CSS">CSS</option>
                                        <option value="JavaScript">JavaScript</option>
                                        <option value="PhP/MySQL">PhP/MySQL</option>
                                    </select>
                                </div>

                                <div class="input-box">
                                    <span class="details">Twitter</span>
                                    <input type="text" name="team_twitter" value="<?php if (isset($team_twitter)) {echo $team_twitter;} ?>">
                                </div>

                                <div class="input-box">
                                    <span class="details">Instagram</span>
                                    <input type="text" name="team_instagram" value="<?php if (isset($team_instagram)) {echo $team_instagram;} ?>">
                                </div>

                                <div class="input-box">
                                    <span class="details">YouTube</span>
                                    <input type="text" name="team_youtube" value="<?php if (isset($team_youtube)) {echo $team_youtube;} ?>">
                                </div>

                                <div class="input-box">
                                    <span class="details">Staff Image</span>
                                    <input type="file" name="team_picture">
                                    <img style="width:50px; height:50px; margin-top:5px; border-radius:50%;" src="assets/team/<?php echo $tmp_file; ?>">
                                </div>

                                <div class="input-box">
                                    <span class="details">Philosophy</span>
                                    <textarea name="team_philosophy"><?php if (isset($team_philosophy)) {echo $team_philosophy;} ?></textarea>
                                </div>

                                <div class="input-box">
                                    <span class="details">Biography</span>
                                    <textarea name="team_biography"><?php if (isset($team_biography)) {echo $team_biography;} ?></textarea>
                                </div>
                            </div>

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
    <script src="js/virtual-select.js"></script>
        <script type="text/javascript">
            VirtualSelect.init({ 
                ele: '#multipleSelect' 
            });
        </script>
</body>
</html>