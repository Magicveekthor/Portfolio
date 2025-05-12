        <!-- Login Header Start -->
        <div class="section login-header">
            <!-- Login Header Wrapper Start -->
            <div class="login-header-wrapper navbar navbar-expand">

                    <!-- Header Logo Start -->
                    <div class="login-header-logo logo-2">
                        <a href="index.php"><img src="assets/images/logowhite.png" alt="Logo"></a></li>
                    </div>
                    <!-- Header Logo End -->

                <!-- Header Action Start -->
                <div class="login-header-action action-2 ml-auto">
                <?php
                    $select_profile  = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
                    $select_profile->execute([$user_id]);
                    if($select_profile->rowCount() > 0){
                        $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
                ?>
                    <a class="action author" href="#">
                        <img src="admin/assets/users/<?= $fetch_profile['image'] ?>" alt="<?= $fetch_profile ['name'] ?>">
                    </a>
                <?php } else { ?>
                    <a class="action author" href="#">
                        <img src="admin/assets/users/person_1.jpg" alt="<?= $fetch_profile ['Guest'] ?>">
                    </a>
                <?php } ?>

                    <div class="dropdown">
                        <button class="action more" data-bs-toggle="dropdown">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="" href="logout.php"><i class="icofont-logout"></i> Sign Out</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Header Action End -->

            </div>
            <!-- Login Header Wrapper End -->
        </div>
        <!-- Login Header End -->