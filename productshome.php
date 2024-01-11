<?php
include('includes/connection.php');
include('functions/common_functions.php');

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
                    <ul class="nav-item">
                        <a href="#">Home</a>
                    </ul>
                    <ul class="nav-item">
                        <a href="display_all_products.php">Our Products</a>
                    </ul>
                    <ul class="nav-item">
                        <a href="#ourdiscountbannersection">Our Discounts</a>
                    </ul>
                    <ul class="nav-item">
                        <a href="#advertisements-banners-sec">Our Sponsers</a>
                    </ul>

                    <ul class="nav-item">
                        <a href="#newsubscription-section">Subscribe Us</a>
                    </ul>

                    <ul class="nav-item">
                        <a href="#newsubscription-section">Our contact details</a>
                    </ul>
                    <ul class="nav-item">
                        <a href="my_cart.php">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <sup>
                                <?php
                                cart_item_count();

                                ?>
                            </sup>
                        </a>
                    </ul>
                    <ul class="nav-item">
                        <a href="#">Total price:
                            <?php
                            total_cart_price();

                            ?>
                        </a>
                    </ul>







                </div>
            </div>
        </nav>

        <div class="icons">

            <div id="search-btn" class="fas fa-search"></div>
            <div id="login-btn" class="fas fa-user"></div>
        </div>


        <form action="search_product.php" class="search-form" id="producthomesearchform" method="GET">
            <input class="form-control me-2" type="search" name="search_data" placeholder="Search here..." id="search-box" aria-label="Search" style="width: 50%;">
            <!-- <label for="search-box" class="fas fa-search"></label> -->
            <!-- <Button class="btn btn-outline-dark" type="submit">Search</Button> -->
            <input type="submit" class="btn btn-outline-dark" value="Search" name="search_data_product" style="width: 10%;">
        </form>


    </header>

    <!-- execute add to cart function -->
    <?php
    add_to_cart();

    ?>

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



                    <!-- fetch all product data from database -->
                    <?php
                    //use common_function
                    getproducts();
                    get_unique_category_products();
                    get_unique_brand_products();
                    // getIPAddress();

                    // $ip = getIPAddress();  
                    // echo 'User Real IP Address - '.$ip; 

                    ?>

                    <!-- product tile -->
                    <!-- <div class="col-md-4 mb-2">
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
                    </div> -->

                    <!-- <div class="col-md-4 mb-2">
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
                    </div> -->



                </div>

            </div>

            <div class="col-sm-2 productcategoryandbrandsdisplay">




                <!-- product categories -->
                <h2 class="text-center m-1">Product Categories</h2>
                <!-- add data from database and display data-->

                <ul class="navbar-nav me-auto text-center ">
                    <?php

                    //use common_function
                    getcategories();

                    ?>
                </ul>

                <!-- product Brands -->
                <h2 class="text-center m-1 pt-3">Product Brands</h2>
                <ul class="navbar-nav me-auto text-center ">


                    <?php
                    //use common_function
                    getbrands();

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


    <!-- display our discounts or any banner -->
    <section class="banner" id="ourdiscountbannersection">
        <div class="banner-container" style="background-image: url(images/shopping_banner_small.jpg)">
            <h1>Novembr 11-11 Discount</h1>
            <p>Up to <span>50%</span> off discount for our products,Welcome to the grand celebration of shopping! At our e-commerce store, the excitement is at its peak with our exclusive 11-11 Discount Extravaganza. Prepare to be dazzled as we present an irresistible array of products at unbelievable prices. It's your chance to shop smart, save big, and experience the thrill of unbeatable discounts. This 11-11, make every purchase a celebration with us, where shopping meets savings, and the best deals await you!</p>
            <Button class="button">Explore more</Button>
        </div>
    </section>

    <!-- display our advertisements or our sponsers -->
    <section class="advertisements-banners-sec" id="advertisements-banners-sec">
        <div class="heading">
            <h1>Our sponsers</h1>
            <p>proud sponsers in our store</p>
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


    <!-- subscribe new customers -->
    <section class="newsubscription-section" id="newsubscription-section">
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

    <!-- include footer -->
    <?php
    include('includes/footer.php');

    ?>

    <!-- link custom js file -->


    <script src="js/script.js"></script>
</body>

</html>