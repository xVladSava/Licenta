<div class="header-area">
            <div class="main-header ">
                <div class="header-top top-bg d-none d-lg-block">
                   <div class="container-fluid">
                       <div class="col-xl-12">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="header-info-left d-flex">
                                </div>
                                <!-- <div class="header-info-right">
                                <ul>
                                    <li><a href="login.php">My Account </a></li>
                                    <li><a href="cart.php">Cart</a></li>
                                </ul>
                                </div> -->
                            </div>
                       </div>
                   </div>
                </div>
               <div class="header-bottom  header-sticky">
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
                                        <!-- <li><a href="Catagori.html">Catagori</a></li> -->
                                        <li class="hot"><a href="product_list.php">Product List</a>
                                            <!-- <ul class="submenu">
                                                <li><a href="product_list.php"> Product List</a></li>
                                                <li><a href="single-product.php"> Product Details</a></li>
                                            </ul> -->
                                        </li>
                                        <!-- <li><a href="blog.html">Blog</a>
                                            <ul class="submenu">
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="single-blog.html">Blog Details</a></li>
                                            </ul>
                                        </li> -->
                                        <li><a href="#">Pages</a>
                                            <ul class="submenu">
                                                <li>
                                                    <?php if (!isset($_SESSION["username"])): ?>                                       
                                                    <a href="index.php?logout='0'">Sign in</a>
                                                    <?php endif ?> 
                                                </li>
                                                <li> <?php if (isset($_SESSION["username"])): ?>                                       
                                                <a href="index.php?logout='1'">Logout</a>
                                                
                                                <?php endif ?>
                                                </li>

                                                <!-- <li><a href="cart.php">Card</a></li> -->
                                                <!-- <li><a href="elements.html">Element</a></li> -->
                                                <li><a href="about.php">About</a></li>
                                                <li><a href="#">Contact Us</a></li>
                                                <!-- <li><a href="confirmation.html">Confirmation</a></li> -->
                                                <li><a href="cart.php">Shopping Cart</a></li>
                                                <li><a href="checkout.php">Product Checkout</a></li>
                                            </ul>
                                        </li>
                                        <!-- <li><a href="contact.html">Contact</a></li> -->
                                    </ul>
                                </nav>
                            </div>
                        </div> 
                        <div class="col-xl-5 col-lg-3 col-md-3 col-sm-3 fix-card">
                            <ul class="header-right f-right d-none d-lg-block d-flex justify-content-between">
                                <li class="d-none d-xl-block">
                                    <!-- <div class="form-box f-right ">
                                        <input type="text" name="Search" placeholder="Search products">
                                        <div class="search-icon">
                                            <i class="fas fa-search special-tag"></i>
                                        </div>
                                    </div>
                                 </li>
                                <li class=" d-none d-xl-block">
                                    <div class="favorit-items">
                                        <i class="far fa-heart"></i>
                                    </div>
                                </li> -->
                                <li>
                                    <div class="shopping-card">
                                        <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
                                    </div>
                                </li>
                                <li class="d-none d-lg-block"> 
                                   <?php if (!isset($_SESSION["username"])): ?>                                       
                                        <a href="index.php?logout='0'" class="btn header-btn">Sign in</a>
                                        
                                    <?php endif ?>                                    
                                    </li>

                                <li class="d-none d-lg-block"> 
                                    <?php if (isset($_SESSION["username"])): ?>                                       
                                        <a href="index.php?logout='1'" class="btn header-btn">Logout</a>
                                        
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
                                   
                                    
                                    