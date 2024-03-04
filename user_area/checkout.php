<?php
include('../includes/connection.php');
include('../functions/common_functions.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D & SE Company</title>
    <!-- link font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!--Link custom css file for slider-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <!-- link the css file link -->
    <link rel="stylesheet" href="../css/style.css">

    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>

    <header class="productshomesheader border">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand logo" href="../index.php" class="logo"> <i class="fa fa-cogs"></i> D & SE Company PVT.LTD </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">


                    <ul class="nav-item">
                        <a href="#">Subscribe Us</a>
                    </ul>
                    <ul class="nav-item">
                        <a href="#">Subscribe Us</a>
                    </ul>

                    <ul class="nav-item">
                        <a href="#">Subscribe Us</a>
                    </ul>

                    <ul class="nav-item">
                        <a href="#">Our contact details</a>
                    </ul>
                    <ul class="nav-item">
                        <a href="../my_cart.php">
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
    </header>




    <!-- user account details and logout or login button -->
    <div id="useraccountdisplaysection" class="useraccountdisplaysection">
        <nav class="navbar navbar-expand-lg navbar-dark bg-gradient m-2">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <?php
                        if (!isset($_SESSION['username'])) {
                            echo "Welocome guest";
                        } else {
                            echo "Welcome  " . $_SESSION['username'];
                        }
                        ?>
                    </a>
                </li>

                <?php
                if (!isset($_SESSION['username'])) {
                    echo "
                            <li class='nav-item'>
                            <a class='nav-link' href='..\user_area\login_page.php'>Log in
                            </a>
                            </li>
                            ";
                } else {
                    echo "
                            <li class='nav-item'>
                            <a class='nav-link' href='..\user_area\login_out.php'>Log Out
                            </a>
                            </li>
                            ";
                }
                ?>


            </ul>
        </nav>
    </div>


    <!--Form-->
    <div class="row p-1">
        <div class="col-md-12">
            <div class="row">
                <?php
                if (!isset($_SESSION['username'])) {
                    //if user doesnot login
                    include('login_page.php');
                } else {
                    //echo "Please login again to continue shopping";
                    include('payment_page.php');
                    //include('registration_page.php.');
                }

                ?>


            </div>
        </div>
    </div>



    <!-- include footer -->
    <footer class="productshomefooter border border-3">

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
                    <img src="../images/banner_images/app_store.jpg" alt="no image">
                    <img src="../images/banner_images/google_play.jpg" alt="no image">
                </div>

                <p>Secure payments methods-available soon</p>

                <div class="install-icon-row">
                    <img src="../images/banner_images/payment_methods.png" alt="no image">

                </div>

            </div>

        </div>

        <div class="copy-rights-row">
            <p>Created by <span><i class="fas fa-copyright"></i><a href="http://www.ageesolution.com/">AG SOFT SOLUTION</a></span> | all rights reserved!</p>
        </div>




    </footer>

    <!-- link custom js file -->
    <script src="../js/script.js"></script>
</body>

</html>