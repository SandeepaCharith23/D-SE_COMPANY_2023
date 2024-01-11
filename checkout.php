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

    <header class="productshomesheader border">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand logo" href="index.php" class="logo"> <i class="fa fa-cogs"></i> D & SE Company PVT.LTD </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">


                    <ul class="nav-item">
                        <a href="#">Subscri be Us</a>
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
    </header>




    <div id="useraccountdisplaysection" class="useraccountdisplaysection" style="background-color: blue;">
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


    <!--Form-->
    <div class="row p-1">
        <div class="col-md-12">
            <div class="row">
                <?php
                if (isset($_SESSION['username'])) {
                    //if user doesnot login
                    include('user_area/login_page.php');
                } else {
                    echo "Please login again to continue shopping";
                    include('user_area/registration_page.php');
                }

                ?>


            </div>
        </div>
    </div>



    <!-- include footer -->
    <?php
    include('includes/footer.php');

    ?>

    <!-- link custom js file -->
    <script src="js/script.js"></script>
</body>

</html>