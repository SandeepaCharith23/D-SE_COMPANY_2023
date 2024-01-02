<?php
include('includes/connection.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shop</title>
    <!-- link font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!--Link custom css file for slider-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <!-- link the css file link -->
    <link rel="stylesheet" href="css/style.css">

    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>

    <header class="productshomesheader">



        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand logo" href="index.php" class="logo"> <i class="fa fa-cogs"></i> D & SE Company PVT.LTD </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <a href="#">Home</a>
                    <a href="#products-display-section">Our Products</a>
                    <a href="#advertisements-banners-sec">Our Sponsers</a>
                    <a href="#advertisements-banners-sec">Our Sponsers</a>
                    <a href="#advertisements-banners-sec">Our Sponsers</a>
                    <a href="#advertisements-banners-sec">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <sup>0</sup>
                    </a>
                    <a href="#advertisements-banners-sec">Total price</a>
                </div>
            </div>
        </nav>

        <div class="icons">

            <div id="search-btn" class="fas fa-search"></div>
            <div id="login-btn" class="fas fa-user"></div>
        </div>


        <form action="" class="search-form" id="producthomesearchform">
            <input type="search" name="" placeholder="Search here..." id="search-box">
            <label for="search-box" class="fas fa-search"></label>
        </form>


    </header>

    <div id="headerbanner" class="headerbanner">

        <h1>Welcome to our online shop</h1>
        <p>In this stage we expect to display our products only ,Then you can contact us on whatsup and email.</p>

    </div>

    <div id="useraccountdisplaysection" class="useraccountdisplaysection">
        <nav class="navbar navbar-expand-lg navbar-dark bg-gradient m-2">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome guest</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
            </ul>
        </nav>
    </div>


    <section class="products-display-section" id="products-display-section">
        <div class="heading">
            <h1>Product Display</h1>
            <p>Here what we have in our store</p>
        </div>

        <div class="row">
            <div class="col-sm-10 productsdisplay">

                <!-- products -->
                <div class="row products-container">
                    <div class="col-md-4 mb-2">
                        <div class="card product" onclick="window.location.href='product_details.php'">
                            <img src="images/product_bag.png" class="card-img-top" alt="no product image">
                            <div class="card-body product-description">
                                <h1 class="card-title">Product Name</h1>
                                <span>Product Brand Name</span>
                                <p class="card-text">Product Description</p>
                                <h2>Rs.3000.00</h2>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>

                                <div class="product-add-to-cart">
                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                                <a href="#" class="btn btn-primary">See more</a>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="card product" onclick="window.location.href='product_details.php'">
                            <img src="images/product_bag.png" class="card-img-top" alt="no image">
                            <div class="card-body product-description">
                                <h1 class="card-title">Product Name</h1>
                                <span>Product Brand Name</span>
                                <p class="card-text">Product Description</p>
                                <h2>Rs.3000.00</h2>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>

                                <div class="product-add-to-cart">
                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                                <a href="#" class="btn btn-primary">See more</a>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="card product" onclick="window.location.href='product_details.php'">
                            <img src="images/product_bag.png" class="card-img-top" alt="no image">
                            <div class="card-body product-description">
                                <h1 class="card-title">Product Name</h1>
                                <span>Product Brand Name</span>
                                <p class="card-text">Product Description</p>
                                <h2>Rs.3000.00</h2>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>

                                <div class="product-add-to-cart">
                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                                <a href="#" class="btn btn-primary">See more</a>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="card product" onclick="window.location.href='product_details.php'">
                            <img src="images/product_bag.png" class="card-img-top" alt="no product image">
                            <div class="card-body product-description">
                                <h1 class="card-title">Product Name</h1>
                                <span>Product Brand Name</span>
                                <p class="card-text">Product Description</p>
                                <h2>Rs.3000.00</h2>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>

                                <div class="product-add-to-cart">
                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                                <a href="#" class="btn btn-primary">See more</a>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="card product" onclick="window.location.href='product_details.php'">
                            <img src="images/product_bag.png" class="card-img-top" alt="no image">
                            <div class="card-body product-description">
                                <h1 class="card-title">Product Name</h1>
                                <span>Product Brand Name</span>
                                <p class="card-text">Product Description</p>
                                <h2>Rs.3000.00</h2>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>

                                <div class="product-add-to-cart">
                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                                <a href="#" class="btn btn-primary">See more</a>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="card product" onclick="window.location.href='product_details.php'">
                            <img src="images/product_bag.png" class="card-img-top" alt="no image">
                            <div class="card-body product-description">
                                <h1 class="card-title">Product Name</h1>
                                <span>Product Brand Name</span>
                                <p class="card-text">Product Description</p>
                                <h2>Rs.3000.00</h2>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>

                                <div class="product-add-to-cart">
                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                                <a href="#" class="btn btn-primary">See more</a>

                            </div>
                        </div>
                    </div>



                </div>

            </div>

            <div class="col-sm-2 productcategoryandbrandsdisplay">




                <!-- product categories -->
                <h2 class="text-center m-1">Product Categories</h2>
                <!-- add data from database and display data-->

                <ul class="navbar-nav me-auto text-center ">
                    <?php
                    //1.selection querry
                    $select_category_querry = "SELECT * FROM `product_categories`";

                    //2.run the querry and get the result form db
                    $results_fromdb = mysqli_query($conn, $select_category_querry);

                    //3.Fetch the returned data to UI

                    while ($returned_rowdata = mysqli_fetch_assoc($results_fromdb)) {

                        $category_name = $returned_rowdata['Category_Name'];
                        $category_id = $returned_rowdata['Category_ID'];

                        echo "<li class='nav-item m-1 p-1 productcategorylisttile'>
                    <a href='productshome.php?cateId=$category_id' class='nav-link text-light'>
                        <h4> $category_name</h4>
                    </a>
                    </li>";
                    }

                    ?>
                </ul>

                <!-- product Brands -->
                <h2 class="text-center m-1 pt-3">Product Brands</h2>
                <ul class="navbar-nav me-auto text-center ">


                    <?php
                    //1.selection querry
                    $select_brands_querry = "SELECT * FROM `product_brands`";

                    //2.run the querry and get the result form db
                    $results_fromdb = mysqli_query($conn, $select_brands_querry);

                    //3.Fetch the returned data to UI

                    while ($returned_rowdata = mysqli_fetch_assoc($results_fromdb)) {

                        $brand_name = $returned_rowdata['Brand_Name'];
                        $brand_id = $returned_rowdata['Brand_ID'];

                        echo "<li class='nav-item m-1 p-1 productcategorylisttile'>
                    <a href='productshome.php?brandId=$brand_id' class='nav-link text-light'>
                        <h4> $brand_name</h4>
                    </a>
                    </li>";
                    }

                    ?>




                </ul>

            </div>
        </div>

    </section>

    <section class="product-display-pagination">
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#"><i class="fa fa-arrow-right"></i></a>
    </section>

    <section class="banner">
        <div class="banner-container" style="background-image: url(images/shopping_banner_small.jpg)">
            <h1>Novembr 11-11 Discount</h1>
            <p>Up to <span>50%</span> off discount for our products,Welcome to the grand celebration of shopping! At our e-commerce store, the excitement is at its peak with our exclusive 11-11 Discount Extravaganza. Prepare to be dazzled as we present an irresistible array of products at unbelievable prices. It's your chance to shop smart, save big, and experience the thrill of unbeatable discounts. This 11-11, make every purchase a celebration with us, where shopping meets savings, and the best deals await you!</p>
            <Button class="button">Explore more</Button>
        </div>
    </section>

    <section class="advertisements-banners-sec" id="advertisements-banners-sec">
        <div class="heading">
            <h1>Product Display</h1>
            <p>Here what we have in our store</p>
        </div>

        <div class="advertisements-banners">

            <div class="advertisement-banner-container" style="background-image: url(images/small_advertisement_baner02.jpg)">
                <h1>Shop Name</h1>
                <h2>Shop Main description-slogan</h2>
                <span>Introduction to shop</span>
                <Button class="button">Know More</Button>
            </div>

            <div class="advertisement-banner-container" style="background-image: url(images/small_advertisement_baner02.jpg)">
                <h1>Shop Name</h1>
                <h2>Shop Main description-slogan</h2>
                <span>Introduction to shop</span>
                <Button class="button">Know More</Button>
            </div>

            <div class="advertisement-banner-container" style="background-image: url(images/small_advertisement_baner02.jpg)">
                <h1>Shop Name</h1>
                <h2>Shop Main description-slogan</h2>
                <span>Introduction to shop</span>
                <Button class="button">Know More</Button>
            </div>

            <div class="advertisement-banner-container" style="background-image: url(images/small_advertisement_baner02.jpg)">
                <h1>Shop Name</h1>
                <h2>Shop Main description-slogan</h2>
                <span>Introduction to shop</span>
                <Button class="button">Know More</Button>
            </div>
        </div>
    </section>

    <section class="newsubscription-section">
        <div class="newsubscription-content">
            <h1>Sign Up for new Subscriptions</h1>
            <p>Get Email updates about our latest shop and <span>special offers</span> via Emails</p>

        </div>

        <div class="newsubscription-form">
            <input type="email" placeholder="Your Email address" class="textfield-box">
            <Button class="button">Subscribe</Button>
        </div>
    </section>

    <section class="products-home-footer">
        <div class="footer">

        </div>
    </section>

    <footer class="productshomefooter">

        <div class="footer-information">

            <div class="footer-column01 column">
                <div class="contact-details-column">
                    <!-- <img src="images/logo.png" alt="no image"> -->
                    <h2>Contact</h2>
                    <p><strong>Address</strong>:58/2,Mirigama</p>
                    <p><strong>Phone</strong>:+94 71-2222222</p>
                    <p><strong>Hours</strong>:9:00-18:00 ,Mon-Sat</p>
                </div>
                <h2>Follow Us</h2>
                <div class="social-media-column">

                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-whatsapp"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                </div>
            </div>

            <div class="footer-column02 column">
                <h2>About</h2>
                <a href="#home"><strong>About us</strong></a>
                <a href="#home"><strong>Delivery information</strong></a>
                <a href="#home"><strong>Privacy Policy</strong></a>
                <a href="#home"><strong>Terms & Conditions</strong></a>
                <a href="#home"><strong>Contact us</strong></a>

            </div>

            <div class="footer-column03 column">
                <h2>My Account</h2>

                <a href="#"><strong>Sign In</strong></a>
                <a href="#"><strong>My cart</strong></a>
                <a href="#"><strong>My Wishlist</strong></a>
                <a href="#"><strong>Track my order</strong></a>
                <a href="#"><strong>Help</strong></a>

            </div>

            <div class="footer-column04 column">
                <h2>Shipping information</h2>
                <p><strong>Shipping policies</strong></p>
                <p><strong>Delivery Times</strong></p>
                <p><strong>Tracking Orders</strong></p>
            </div>

            <div class="footer-column05 column">
                <h2>Install App</h2>
                <p>You can install our App-Available soon</p>

                <div class="install-icon-row">
                    <img src="images/banner_images/app_store.jpg" alt="no image">
                    <img src="images/banner_images/google_play.jpg" alt="no image">
                </div>

                <p>Secure payments methods-available soon</p>

                <div class="install-icon-row">
                    <img src="images/banner_images/payment_methods.png" alt="no image">

                </div>

            </div>

        </div>

        <div class="copy-rights-row">
            <p>Created by <span><i class="fas fa-copyright"></i><a href="http://www.ageesolution.com/">AG SOFT SOLUTION</a></span> | all rights reserved!</p>
        </div>




    </footer>

    <!-- link custom js file -->


    <script src="js/script.js"></script>
</body>

</html>