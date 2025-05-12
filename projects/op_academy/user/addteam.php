<?php
#connection file
include "includes/db.php";

$msg = '';

if(isset($_POST['submit'])) {
    $team_name = $_POST['team_name'];
    $team_email = $_POST['team_email'];
    $team_phone = $_POST['team_phone'];
    $team_department = $_POST['team_department'];
    $team_experience = $_POST['team_experience'];
    $team_position = $_POST['team_position'];
    $team_skills = implode(", ",$_POST['team_skills'] ?? []);
    $team_twitter = $_POST['team_twitter'];
    $team_instagram = $_POST['team_instagram'];
    $team_youtube = $_POST['team_youtube'];
    $team_philosophy = addslashes($_POST['team_philosophy']);
    $team_biography = addslashes($_POST['team_biography']);

    #inserting the cover image
    $target_dir = "assets/team/";
    $target_file = $target_dir .basename($_FILES['team_picture']['name']);
    $tmp_file = $_FILES['team_picture']['name'];
    move_uploaded_file(($_FILES['team_picture']['tmp_name']), $target_file);

    $insert_team = "INSERT INTO `opemzy_team` (team_name, team_department, team_position, team_experience, team_email, team_phone, team_biography, team_philosophy, team_skills, team_twitter, team_instagram, team_youtube, team_picture)
                    VALUES ('$team_name', '$team_department', '$team_position', '$team_experience', '$team_email', '$team_phone', '$team_biography', '$team_philosophy', '$team_skills', '$team_twitter', '$team_instagram', '$team_youtube', '$tmp_file')";
    $query_team = $mysqli -> query($insert_team);

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
                            <a class="active" href="">Add Team Member</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="table-data">
                <div class="container">
                    <div class="title">Add Team Member</div>

                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="project-details">
                                <div class="input-box">
                                    <span class="details">Full Name</span>
                                    <input type="text" name="team_name" placeholder="Enter Full Name" required>
                                </div>
                    
                                <div class="input-box">
                                    <span class="details">Email Address</span>
                                    <input type="email" name="team_email" placeholder="Enter Email Address" required>
                                </div>

                                <div class="input-box">
                                    <span class="details">Phone Number</span>
                                    <input type="text" name="team_phone" placeholder="Enter Phone Number" required>
                                </div>

                                <div class="input-box">
                                    <span class="details">Department</span>
                                    <input type="text" name="team_department" placeholder="Enter Office Department e.g Design, Working Drawing etc." required>
                                </div>

                                <div class="input-box">
                                    <span class="details">Years of Experience</span>
                                    <input type="text" name="team_experience" placeholder="Enter Years of Experience" required>
                                </div>

                                <div class="input-box">
                                    <span class="details">Position</span>
                                    <input type="text" name="team_position" placeholder="Enter Position e.g Architect, Intern etc" required>
                                </div>

                                <div class="input-box">
                                    <span class="details">Skills</span>
                                    <select id="multipleSelect" multiple name="team_skills[]" placeholder="Select Skills" data-search="false" data-silent-initial-value-set="true">
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
                                    <input type="text" name="team_twitter" placeholder="Enter Twitter Handle" required>
                                </div>

                                <div class="input-box">
                                    <span class="details">Instagram</span>
                                    <input type="text" name="team_instagram" placeholder="Enter Instagram Handle" required>
                                </div>

                                <div class="input-box">
                                    <span class="details">YouTube</span>
                                    <input type="text" name="team_youtube" placeholder="Enter Youtube Handle" required>
                                </div>

                                <div class="input-box">
                                    <span class="details">Philosophy</span>
                                    <textarea name="team_philosophy" placeholder="Enter Philosophy"></textarea>
                                </div>

                                <div class="input-box">
                                    <span class="details">Biography</span>
                                    <textarea name="team_biography" placeholder="Enter Biography"></textarea>
                                </div>

                                <div class="input-box">
                                    <span class="details">Staff Image</span>
                                    <input type="file" name="team_picture" required>
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