<div class="header-area">
        <div class="main-header">
            <div class="header-top top-bg d-none d-lg-block" style="text-align:right">
            <?php if (isset($_SESSION["username"])) : ?>
                <p style="color:#FFFFFF;display: contents;">You are logged in as: <?php echo $_SESSION['username']; ?>!</p>
            <?php endif ?>
                <div class="container-fluid">
                    <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left d-flex">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-1 col-lg-1 col-md-1 col-sm-3">
                        <div class="logo">
                            <a href="index.php"><img src="assets/img/logo/logo22.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-8 col-md-7 col-sm-5">
                        <!-- Main-menu -->
                        <div class="main-menu f-right d-none d-lg-block">
                            <nav>                                                
                                <ul id="navigation">                                                                                                                                     
                                    <li><a href="index.php">Home</a></li>
                                    <li class="hot"><a href="product_list.php">Product List</a></li>
                                    <li><a href="#">Pages</a>
                                        <ul class="submenu">
                                            <li>
                                            <?php if (isset($_SESSION["username"])): ?>
                                            <?php if ($_SESSION["username"] == 'admin'): ?>     
                                            <li><a href="add_prod.php">Add Products</a></li>
                                            <li><a href="order_list.php">List of Orders</a></li>
                                            <li><a href="cart.php">Shopping Cart</a></li>
                                            <?php endif ?>
                                            <?php endif ?>
                                            <?php if (!isset($_SESSION["username"])): ?>                                       
                                            <a href="index.php?logout='0'">Sign in</a>
                                            <?php endif ?> 
                                            </li>
                                            <li> <?php if (isset($_SESSION["username"])): ?>                                       
                                            <a href="index.php?logout='1'">Logout</a>
                                            <?php endif ?>
                                            </li>
                                            <?php if (isset($_SESSION["username"])): ?>
                                            <?php if ($_SESSION["username"] != 'admin'): ?>     
                                            <li> <a href="user_order_list.php">My orders</a></li> 
                                            <li><a href="cart.php">Shopping Cart</a></li>
                                            <?php endif ?>
                                            <?php endif ?>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div> 
                    <div class="col-xl-5 col-lg-3 col-md-3 col-sm-3 fix-card">
                        <ul class="header-right f-right d-none d-lg-block d-flex justify-content-between">
                            <li class="d-none d-xl-block">
                            <!-- <li>
                                <div class="shopping-card">
                                    <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
                                </div>
                            </li> -->
                            <li class="d-none d-lg-block"> 
                                <?php if (!isset($_SESSION["username"])): ?>                                       
                                    <a href="index.php?logout='0'" class="btn_3" style="width: max-content; display: flex;">Sign in</a>
                                    
                                <?php endif ?>                                    
                                </li>

                            <li class="d-none d-lg-block"> 
                                <?php if (isset($_SESSION["username"])): ?>                                       
                                    <a href="index.php?logout='1'" class="btn_3" style="width: max-content; display: flex;">Logout</a>
                                    
                                <?php endif ?>
                            </li>
                        </ul>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                                   
                                    
                                    