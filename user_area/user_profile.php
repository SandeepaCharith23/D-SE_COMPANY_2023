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

    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .dashboard-container {
            display: flex;
            margin: 0 auto;
            padding: 20px;
        }

        .profile-column {
            width: 25vw;
            padding-right: 10px;
            border-right: 1px solid #ccc;
        }

        .content-column {
            width: 75%;
            padding-left: 20px;
        }

        .profile-picture {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 10px;
        }

        .profile-section {
            margin-bottom: 10px;
        }

        .profile-section h3 {
            margin-bottom: 10px;
        }

        .sub-section {
            margin-left: 10px;
            align-items: center;
        }
    </style>
</head>

<body>


<header class="productshomesheader" >

    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">

            <nav class="navbar navbar-expand-lg" style=" width:40%">
                <div class="container-fluid">
                    <a class="navbar-brand logo" href="../productshome.php" class="logo"> <i class="fa fa-cogs"></i> D & SE Company PVT.LTD </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../display_all_products.php">Our Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../my_cart.php">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <sup>
                                        <?php cart_item_count(); ?>
                                    </sup>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Total price:
                                    <?php total_cart_price(); ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- <div class="icons">
                <div id="login-btn-user" class="fas fa-user"></div>
            </div> -->

            <form action="../search_product.php" class="search-form" id="producthomesearchform" method="GET" style="top: 20%; width: 50%; left: 70%;">
                <div class="d-flex">
                    <input class="form-control me-2" type="search" name="search_data" placeholder="Search here..." id="search-box" aria-label="Search" style="width: 100%;">
                    <input type="submit" class="btn btn-outline-dark" value="Search" name="search_data_product" style="width: 40%;">
                </div>
            </form>

        </div>
    </div>

</header>



    <!-- user account details and logout or login button -->
    <div id="useraccountdisplaysection" class="useraccountdisplaysection " style="top: 180%;">
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
                            <a class='nav-link' href='user_area\login_page.php'>Log in
                            </a>
                            </li>
                            ";
                } else {
                    echo "
                            <li class='nav-item'>
                            <a class='nav-link' href='login_out.php'>Log Out
                            </a>
                            </li>
                            ";
                }
                ?>

              


            </ul>
        </nav>
    </div>
    
    <!-- dashboard container -->
    <div class="dashboard-container">
        <!-- Main Column -->
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 p-2  justify-content-start  shadow ">
            <div class="text-center">
                <?php 
                  $username=$_SESSION['username'];

                  $select_user_details_querry="SELECT * FROM `user_table` WHERE User_Name= '$username'";
                  $results_user=mysqli_query($conn,$select_user_details_querry);
                  $result_user_array=mysqli_fetch_array($results_user);
                  $userimage=$result_user_array['User_ProfileImage'];
                  $userfirstname=$result_user_array['User_FirstName'];
                  $userlastname=$result_user_array['User_LastName'];
                  $useremailaddress=$result_user_array['User_Email'];
                  $usermobilenumber=$result_user_array['User_MobilePhone'];
                  $useraddress=$result_user_array['User_Address'];
                  $userpostcode=$result_user_array['User_PostalCode'];
                  $userprovince=$result_user_array['User_Province'];
                  $userdistrict=$result_user_array['User_District'];
                  $usercity=$result_user_array['User_City'];
                 // echo "<script>alert('user image catches')</script>"; 
                ?>
            <img src="../images/profileimages/<?php echo $userimage?>" alt="Profile Picture" class="profile-picture">
            <h3><?php echo $username?></h3>

            </div>
            
            
            <div class="profile-section border shadow justify-content-center">
                
                <div class="sub-section mt-2">
                    <h3>Manage My Account</h3>
                    <ul>
                        <li><a href="user_profile.php?my_profille">My Profile</a></li>
                        <li><a href="user_profile.php?my_payment_options">My Payment Options</a></li>
                        <li><a href="user_profile.php?delete_account">Delete Account</a></li>
                        <li><a href="login_out.php">Logout</a></li>
                    </ul>
                </div>
                <div class="sub-section">
                    <h3>My Orders</h3>
                    <ul>
                        <li><a href="user_profile.php?my_orders">My Orders</a></li>
                        <li><a href="user_profile.php?my_pending_orders">My Pending Orders</a></li>
                        <li><a href="user_profile.php?my_cancellations">My Cancellations</a></li>
                    </ul>
                </div>
                <div class="sub-section">
                    <h3>My Reviews</h3>
                </div>
                <div class="sub-section">
                    <h3>My Wishlist</h3>
                </div>
            </div>
        </div>

        <!-- Content Column -->
        <div class="col-md-9 p-2  justify-content-start  shadow content-column">
            <!-- Content goes here -->
            <?php
             get_user_pending_orders();
             if(isset($_GET['my_profille']))
             {
                //redirect to edit user details page
                include('edit_account_details.php');
             }

             if(isset($_GET['my_orders']))
             {
                //redirect to edit user details page
                include('user_orders.php');
             }

             if(isset($_GET['delete_account']))
             {
                //redirect to edit user details page
                include('delete_user_account.php');
             }
            ?>
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

        <!--Form-->
        <div class="row p-1">
            <div class="col-md-12">
                <div class="row">



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

<?php

function get_user_pending_orders(){
    global $conn;
    $currentusername=$_SESSION['username'];
    
    //get the user details according to given username in session.
    $select_user_details_querry="SELECT * FROM `user_table` WHERE User_Name='$currentusername'";
    $user_details_resultes=mysqli_query($conn,$select_user_details_querry);
    $user_details_array=mysqli_fetch_array($user_details_resultes);
    if($user_details_array){
         $currentuserID=$user_details_array['User_ID'];
         //echo "<script>console.log('current user id is'.$currentuserID)</script>";

         //check if user click any button my profile,my payment options,delete account ,my orders or my cancellation,.
         if(!isset($_GET['my_profille'])){
            if(!isset($_GET['my_payment_options'])){
                if(!isset($_GET['delete_account'])){
                    if(!isset($_GET['my_orders'])){
                        if(!isset($_GET['my_cancellations'])){
                              // get the current available pending orders count and display it.
                              $getting_user_orders_querry="SELECT * FROM `user_order` WHERE user_id=$currentuserID AND order_status='pending'";
                              $user_orders_results=mysqli_query($conn,$getting_user_orders_querry);
                              $user_order_count=mysqli_num_rows($user_orders_results);

                              if($user_order_count>0)
                              {
                                 echo "<h3 class='text-center mt-5'>You have $user_order_count user orders which are pending to confirm. </h3>
                                 <p class='text-center'><a href=''>Oder details</a></p>";
                              } else{
                                echo "<h3 class='text-center mt-5'>You have 0 user orders which are pending to confirm. </h3>
                                <p class='text-center'><a href=''>Explore market</a></p>";
                              }
           
                        };
           
                    };
           
                };
           
            };
           
         };
    }
}

?>