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


if(isset($_POST['delete_comment'])) {
    $delete_id = $_POST['comment_id'];
    $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

    $verify_comment = $conn->prepare("SELECT * FROM `comments` WHERE id = ?");
    $verify_comment->execute([$delete_id]);

    if($verify_comment->rowCount() > 0){
        $delete_comment = $conn->prepare("DELETE FROM `comments` WHERE id = ?");
        $delete_comment->execute([$delete_id]);
        $good_message = 'Comment deleted successfully!';
    } else {
        $bad_message = 'Comment already deleted!';
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
                    <h1>Comments</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i>
                        <li>
                            <a class="active" href="services.php">Comments</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="field_error" style="color: #8CB675; margin-top: 15px; font-size: 25px;"><?php echo $good_message ?></div> 

            <div class="field_error" style="color: red; margin-top: 15px; font-size: 25px;"><?php echo $bad_message ?></div> 

            <div class="table-data">
                <div class="order">
                    <table>
                        <thead>
                            <tr>
                                <th>Content Title</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Comment</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $select_comments = $conn->prepare("SELECT * FROM `comments` WHERE tutor_id = ?");
                                $select_comments->execute([$tutor_id]);
                                if($select_comments -> rowCount() > 0){
                                    while($fetch_comment = $select_comments->fetch(PDO::FETCH_ASSOC)) {
                                        $comment_id = $fetch_comment['id'];

                                        #fetch the user that made the comment i.e in this case we are using the admin cause nobody has been registered 
                                        #REMEBER TO CHANGE "tutors" to "users" to reflect the proper comments
                                        $select_commentor = $conn->prepare("SELECT * FROM `tutors` WHERE id = ?");
                                        $select_commentor->execute([$comment_id]);
                                        $fetch_commentor = $select_commentor->fetch(PDO::FETCH_ASSOC);
                                        
                                        #fetch the particular content we are commenting on
                                        $select_content = $conn->prepare("SELECT * FROM `content` WHERE id = ?");
                                        $select_content->execute([$fetch_comment['content_id']]);
                                        $fetch_content = $select_content->fetch(PDO::FETCH_ASSOC);
                            ?>
                                <tr>
                                    <td>
                                        <?php 
                                            $playlist_string = $fetch_comment['comment'];
                                            if (strlen($playlist_string) > 20) {
                                                $stringCut = substr($playlist_string, 0, 100);
                                                $playlist_string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...';
                                            }
                                            echo $playlist_string 
                                        ?>
                                    </td>
                                    <td><?= $fetch_commentor['username']; ?></td>
                                    <td><?= $fetch_comment['date'] ?></td>
                                    <td><a href="view_content.php?get_id=<?= $fetch_content['id'] ?>"><?= $fetch_content['title'] ?></a></td>
                                    <td>
                                        <form method="post">
                                            <input type="hidden" name="comment_id" value="<?= $fetch_comment['id'] ?>">
                                            <input type="submit" value="Delete" name="delete_comment" class="status pending" style="border: none; cursor:pointer;">
                                        </form>
                                    </td>
                                </tr>
                            <?php } } ?>
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