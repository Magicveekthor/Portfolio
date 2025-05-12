        <!-- Header Section Start -->
        <div class="header-section">

            <!-- Header Top Start -->
            <div class="header-top d-none d-lg-block">
                <div class="container">

                    <!-- Header Top Wrapper Start -->
                    <div class="header-top-wrapper">

                        <!-- Header Top Left Start -->
                        <div class="header-top-left">
                            <p> Design, Learn, Transform</p>
                        </div>
                        <!-- Header Top Left End -->

                        <!-- Header Top Medal Start -->
                        <div class="header-top-medal">
                            <div class="top-info">
                                <p><i class="flaticon-phone-call"></i> <a href="tel:9702621413">+234 803 700 8047</a></p>
                                <p><i class="flaticon-email"></i> <a href="mailto:info@opemzybim.com">info@opemzybim.com</a></p>
                            </div>
                        </div>
                        <!-- Header Top Medal End -->

                        <!-- Header Top Right Start -->
                        <div class="header-top-right">
                            <ul class="social">
                                <li><a href="https://www.facebook.com/opemzy"><i class='bx bxl-facebook'></i></a></li>
                                <li><a href="https://www.youtube.com/@architectsden"><i class='bx bxl-youtube' ></i></a></li>
                                <li><a href="https://www.instagram.com/opemzy_bim/"><i class='bx bxl-instagram' ></i></a></li>
                            </ul>
                        </div>
                        <!-- Header Top Right End -->

                    </div>
                    <!-- Header Top Wrapper End -->

                </div>
            </div>
            <!-- Header Top End -->

            <!-- Header Main Start -->
            <div class="header-main">
                <div class="container">

                    <!-- Header Main Start -->
                    <div class="header-main-wrapper">

                        <!-- Header Logo Start -->
                        <div class="header-logo">
                            <a href="index.php"><img src="assets/images/logo.png" alt="Logo"></a>
                        </div>
                        <!-- Header Logo End -->

                        <!-- Header Menu Start -->
                        <div class="header-menu d-none d-lg-block">
                            <ul class="nav-menu">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="about.php">About</a></li>
                                <li><a href="courses.php">Courses</a></li>

                                <?php
                                    $select_profile  = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
                                    $select_profile->execute([$user_id]);
                                    if($select_profile->rowCount() > 0){
                                        $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
                                ?>
                                <li><a href="#">Profile</a></li>
                                <?php } ?>

                                <li><a href="contact.php">Contact</a></li>
                            </ul>

                        </div>
                        <!-- Header Menu End -->

                        <!-- Header Sing In & Up Start -->
                        <?php
                            $select_profile  = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
                            $select_profile->execute([$user_id]);
                            if($select_profile->rowCount() > 0){
                                $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <!-- Header Action Start -->
                        <div class="login-header-action">
                            <a class="action author" href="#">
                                <img src="admin/assets/users/<?= $fetch_profile['image'] ?>" alt="<?= $fetch_profile ['name'] ?>">
                            </a>
                            <div class="header-sign-in-up d-none d-lg-block">
                                <ul>
                                    <li><a class="sign-in" href="logout.php">Sign Out</a></li>
                                </ul>
                            </div>
                        </div>

                        <?php } else { ?>
                            <!-- Header Action End -->
                            <div class="header-sign-in-up d-none d-lg-block">
                                <ul>
                                    <li><a class="sign-in" href="login.php">Sign In</a></li>
                                    <li><a class="sign-up" href="register.php">Sign Up</a></li>
                                </ul>
                            </div>
                            <!-- Header Sing In & Up End -->
                        <?php } ?>
                        

                        <!-- Header Mobile Toggle Start -->
                        <div class="header-toggle d-lg-none">
                            <a class="menu-toggle" href="javascript:void(0)">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                        <!-- Header Mobile Toggle End -->

                    </div>
                    <!-- Header Main End -->

                </div>
            </div>
            <!-- Header Main End -->

        </div>
        <!-- Header Section End -->

        <!-- Mobile Menu Start -->
        <div class="mobile-menu">

            <!-- Menu Close Start -->
            <a class="menu-close" href="javascript:void(0)">
                <i class="icofont-close-line"></i>
            </a>
            <!-- Menu Close End -->
            <?php
                $select_profile  = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
                $select_profile->execute([$user_id]);
                if($select_profile->rowCount() > 0){
                    $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
            ?>

            <!-- Mobile Top Medal Start -->
            <div class="mobile-top">
                <p><i class="flaticon-tutor"></i> Hello, <?= $fetch_profile['name'] ?></p>
                <p><i class="flaticon-email"></i> <?= $fetch_profile['email'] ?></p>
            </div>
            <!-- Mobile Top Medal End -->

            <!-- Header Action Start -->
            <div class="login-header-action" style="margin-top: 20px; margin-left: 116px;">
                <a class="action author" href="logout.php">Sign Out</a>
            </div>
            <!-- Header Action End -->            
            
            <?php } else { ?>
            <!-- Mobile Sing In & Up Start -->
            <div class="mobile-sign-in-up">
                <ul>
                    <li><a class="sign-in" href="login.php">Sign In</a></li>
                    <li><a class="sign-up" href="register.php">Sign Up</a></li>
                </ul>
            </div>
            <!-- Mobile Sing In & Up End -->
            <?php } ?>

            <!-- Mobile Menu Start -->
            <div class="mobile-menu-items">
                <ul class="nav-menu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="courses.php">Courses</a></li>
                    <li>
                        <a href="#">Pages </a>
                        <ul class="sub-menu">
                            <li><a href="404-error.php">404 Error</a></li>
                            <li><a href="after-enroll.php">After Enroll</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>

            </div>
            <!-- Mobile Menu End -->

            <!-- Mobile Menu End -->
            <div class="mobile-social">
                <ul class="social">
                    <li><a href="https://www.facebook.com/opemzy"><i class='bx bxl-facebook'></i></a></li>
                    <li><a href="https://www.youtube.com/@architectsden"><i class='bx bxl-youtube' ></i></a></li>
                    <li><a href="https://www.instagram.com/opemzy_bim/"><i class='bx bxl-instagram' ></i></a></li>
                </ul>
            </div>
            <!-- Mobile Menu End -->

        </div>
        <!-- Mobile Menu End -->

        <!-- Overlay Start -->
        <div class="overlay"></div>
        <!-- Overlay End -->