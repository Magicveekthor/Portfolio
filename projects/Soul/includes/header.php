    <!-- push menu-->
    <div class="pushmenu menu-home5">
        <div class="menu-push">
            <span class="close-left js-close"><i class="ion-ios-close-empty f-40"></i></span>
            <div class="clearfix"></div>
            <form role="search" method="get" id="searchform" class="searchform" action="https://landing.engotheme.com/search">
                <div>
                    <label class="screen-reader-text" for="q"></label>
                    <input type="text" placeholder="Search for products" value="" name="q" id="q" autocomplete="off">
                    <input type="hidden" name="type" value="product">
                    <button type="submit" id="searchsubmit"><i class="ion-ios-search-strong"></i></button>
                </div>
            </form>
            <ul class="nav-home5 js-menubar">
                <li class="level1 active dropdown">
                    <a href="home.php">Home</a>
                </li>
                <li class="level1">
                    <a href="about.php" title="Shop">About</a>
                </li>
                <li class="level1">
                    <a href="shop.php" title="Shop">Shop</a>
                </li>
                <li class="level1">
                    <a href="#">Collection</a>
                    <span class="icon-sub-menu"></span>
                    <ul class="menu-level1 js-open-menu">
                        <?php mobile_collection(); ?>
                    </ul>
                </li>
                <li class="level1"><a href="contact.php">Contact</a></li>
            </ul>
            <ul class="mobile-account">
                <li><a href="#"><i class="fa fa-unlock-alt"></i>Login</a></li>
                <li><a href="#"><i class="fa fa-user-plus"></i>Register</a></li>
            </ul>
            <h4 class="mb-title">connect and follow</h4>
            <div class="mobile-social mg-bottom-30">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>
        </div>
    </div>
    <!-- end push menu-->

    <!-- Search form -->
    <div class="search-form-wrapper header-search-form">
        <div class="container">
            <div class="search-results-wrapper">
                <div class="btn-search-close">
                    <i class="ion-ios-close-empty"></i>
                </div>
            </div>
            <ul class="zoa-category text-center">
                <li><a href="shop.php">All Categories</a></li>
                <?php search_collection(); ?>
            </ul>
            <form method="GET" action="search_products.php" role="search" class="search-form  has-categories-select">
                <input class="search-input" name="search_data" type="text" placeholder="Enter your keywords..." autocomplete="off">
                <button type="submit" name="search_data_product" id="search-btn"><i class="ion-ios-search-strong"></i></button>
            </form>
        </div>
    </div>
    <!-- End search form -->

    <div class="wrappage">
        <header id="header" class="header-v2">
            <!-- <div class="topbar hidden-xs hidden-sm">
                <button type="button" class="js-promo close"><i class="ion-ios-close-empty black" aria-hidden="true"></i></button>
                <div class="container container-content">
                    <div class="row flex">
                        <div class="col col-sm-4">
                            <div class="topbar-left">
                                <span>Hotline: +01 234 567 890</span>
                                <div class="topbar-social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col col-sm-4 justify-content-center">
                            <p>Summer sale discount off 50%! <a href="#">Shop Now</a></p>
                        </div>
                        <div class="col col-sm-4 justify-content-end">
                            <div class="topbar-right">
                                <div class="element element-currency">
                                    <a id="label3" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    
                                      <span>$ USD</span>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="label3">
                                        <li><a href="#">USD</a></li>
                                        <li><a href="#">AUD</a></li>
                                        <li><a href="#">EUR</a></li>
                                    </ul>
                                </div>
                                <div class="element element-leaguage">
                                    <a id="label2" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <img src="img/icon-l.html" alt="">
                                      <span>English</span>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="label2">
                                        <li><a href="#">EN</a></li>
                                        <li><a href="#">DE</a></li>
                                        <li><a href="#">FR</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="header-center">
                <div class="container container-content">
                    <div class="row flex align-items-center justify-content-between">
                        <div class="col-md-4 col-xs-4 col-sm-4 col2 hidden-lg hidden-md">
                            <div class="topbar-right">
                                <div class="element">
                                    <a href="#" class="icon-pushmenu js-push-menu">
                                        <svg width="26" height="16" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 66 41" style="enable-background:new 0 0 66 41;" xml:space="preserve">
                                            <style type="text/css">
                                            .st0 {
                                                fill: none;
                                                stroke: #000000;
                                                stroke-width: 3;
                                                stroke-linecap: round;
                                                stroke-miterlimit: 10;
                                            }
                                            </style>
                                            <g>
                                                <line class="st0" x1="1.5" y1="1.5" x2="64.5" y2="1.5" />
                                                <line class="st0" x1="1.5" y1="20.5" x2="64.5" y2="20.5" />
                                                <line class="st0" x1="1.5" y1="39.5" x2="64.5" y2="39.5" />
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-4 col-sm-4 col2 justify-content-center">
                            <a href="home.php"><img src="admin/images/soul.png" alt="" class="img-reponsive" style="width: 100px;"></a>
                        </div>
                        <div class="col-md-9 col-xs-4 col-sm-4 col2 flex justify-content-end">
                            <ul class="nav navbar-nav js-menubar hidden-xs hidden-sm">
                                <li class="level1 active dropdown"><a href="home.php" title="Home">Home</a></li>
                                <li class="level1 active dropdown"><a href="about.php" title="Home">About</a></li>
                                <li class="level1 dropdown hassub"><a href="shop.php" title="Shop">Shop</a></li>
                                <li class="level1 hassub dropdown">
                                    <a href="#" title="Collection">Collection</a>
                                    <div class="menu-level-1 dropdown-menu style3">
                                        <div class="row">
                                            <?php getcollection(); ?>
                                        </div>
                                    </div>
                                </li>
                                <li class="level1 active dropdown"><a href="contact.php" title="Blog">Contact</a></li>
                            </ul>
                            <div class="topbar-left">
                                <div class="element element-search hidden-xs hidden-sm">
                                    <a href="#" class="zoa-icon search-toggle">
                                        <svg width="20" height="20" version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 90 90" style="enable-background:new 0 0 90 90;" xml:space="preserve">
                                            <g>
                                                <path d="M0,39.4C0,50,4.1,59.9,11.6,67.3c7.4,7.5,17.3,11.6,27.8,11.6c9.5,0,18.5-3.4,25.7-9.5l19.8,19.7c1.2,1.2,3.1,1.2,4.2,0
        c0.6-0.6,0.9-1.3,0.9-2.1s-0.3-1.5-0.9-2.1L69.3,65.1c6.2-7.1,9.5-16.2,9.5-25.7c0-10.5-4.1-20.4-11.6-27.9C59.9,4.1,50,0,39.4,0
        C28.8,0,19,4.1,11.6,11.6S0,28.9,0,39.4z M63.1,15.8c6.3,6.3,9.8,14.7,9.8,23.6S69.4,56.7,63.1,63s-14.7,9.8-23.6,9.8
        S22.2,69.3,15.9,63C9.5,56.8,6,48.4,6,39.4s3.5-17.3,9.8-23.6S30.5,6,39.4,6S56.8,9.5,63.1,15.8z" />
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                                <div class="element element-user hidden-xs hidden-sm">
                                    <a href="login.php" class="zoa-icon js-user">
                                        <svg width="19" height="20" version="1.1" id="Layer_3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 102.8" style="enable-background:new 0 0 100 102.8;" xml:space="preserve">
                                            <g>
                                                <path d="M75.7,52.4c-2.1,2.3-4.4,4.3-7,6C82.2,58.8,93,69.9,93,83.5v12.3H7V83.5c0-13.6,10.8-24.7,24.3-25.1c-2.6-1.7-5-3.7-7-6
        C10.3,55.9,0,68.5,0,83.5v15.8c0,1.9,1.6,3.5,3.5,3.5h93c1.9,0,3.5-1.6,3.5-3.5V83.5C100,68.5,89.7,55.9,75.7,52.4z" />
                                                <g>
                                                    <path d="M50,58.9c-16.2,0-29.5-13.2-29.5-29.5S33.8,0,50,0s29.5,13.2,29.5,29.5S66.2,58.9,50,58.9z M50,7
            C37.6,7,27.5,17.1,27.5,29.5S37.6,51.9,50,51.9s22.5-10.1,22.5-22.5S62.4,7,50,7z" />
                                                </g>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                                <div class="element element-cart">
                                    <a href="cart.php" class="zoa-icon icon-cart">
                                        <svg width="20" height="20" version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 55.4 55.4" style="enable-background:new 0 0 55.4 55.4;" xml:space="preserve">
                                            <g>
                                                <rect x="0.2" y="17.4" width="55" height="3.4" />
                                            </g>
                                            <g>
                                                <polygon points="7.1,55.4 3.4,27.8 3.4,24.1 7.3,24.1 7.3,27.6 10.5,51.6 44.9,51.6 48.1,27.6 48.1,24.1 52,24.1 52,27.9 
        48.3,55.4   " />
                                            </g>
                                            <g>
                                                <path d="M14,31.4c-0.1,0-0.3,0-0.5-0.1c-1-0.2-1.6-1.3-1.4-2.3L19,1.5C19.2,0.6,20,0,20.9,0c0.1,0,0.3,0,0.4,0
        c0.5,0.1,0.9,0.4,1.2,0.9c0.3,0.4,0.4,1,0.3,1.5l-6.9,27.5C15.6,30.8,14.8,31.4,14,31.4z" />
                                            </g>
                                            <g>
                                                <path d="M41.5,31.4c-0.9,0-1.7-0.6-1.9-1.5L32.7,2.4c-0.1-0.5,0-1.1,0.3-1.5s0.7-0.7,1.2-0.8c0.1,0,0.3,0,0.4,0
        c0.9,0,1.7,0.6,1.9,1.5L43.4,29c0.1,0.5,0,1-0.2,1.5c-0.3,0.5-0.7,0.8-1.1,0.9c-0.2,0-0.3,0-0.4,0.1C41.6,31.4,41.6,31.4,41.5,31.4
        z" />
                                            </g>
                                        </svg>
                                        <?php if(isset($_SESSION['quantity']) && $_SESSION['quantity'] != 0) { ?>
                                            <span class="count cart-count"><?php echo $_SESSION['quantity'] ?></span>
                                        <?php } ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- /header -->