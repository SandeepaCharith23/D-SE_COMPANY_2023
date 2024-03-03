<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Main Dashboard</title>
  <!-- link font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

  <link rel="stylesheet" href="../css/style.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <style>
    .profile-picture {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      margin: 10px;
    }

    .sub-section {
      margin-left: 10px;
      align-items: center;
    }
  </style>

</head>

<body class="fluid-container main-body">
  <h1 class="text-center">Admin Dashboard-D&SE Company</h1>

  <!-- 1.navigation bar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-info p-2 justify-content-center">
    <div class="container-fluid p-0">

      <!-- 1.Navbar -banner -->
      <a href="#" class="navbar-brand">
        <!-- Navbar Brand text -->
        <img src="../images/logo.png" alt="no image" width="30" height="30"> D & SE Company
      </a>

      <!-- 2.Navbar-toggler -->
      <button class="navbar-toggler custom_toggler_button" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- 3.navbar-content -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-auto mb-lg-0">

          <!-- <li class="nav-item custom_navitem">
            <a class="nav-link  active border p-2" aria-current="page" href="#">Home</a>
          </li>

          <li class="nav-item custom_navitem">
            <a class="nav-link  border p-2" href="#">Products</a>
          </li>

          <li class="nav-item custom_navitem">
            <a class="nav-link  border p-2" href="#">Register</a>
          </li>
 -->


        </ul>



      </div>


    </div>
  </nav>


  <!-- 2.search bar -->
  <div class="container-fluid text-center m-4">
    <form class="d-flex custom_searchbar" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success  custom_searchbutton" type="submit">Search</button>
    </form>

  </div>


  <div class="row">

    <!-- 01.left column--admin banner section and button section -->
    <div class="col-md-2 border">
      <!-- 01.01 admin details -->
      <div class="container mt-2 p-2 pe-1 ps-1 align-items-center text-center" style="width: 15rem;">
        <h4>Welcome admin-User</h4>
        <div class="card admin_banner ">
          <img class="card-img-top p-1" src="../images/userimage01.jpg" class="profile-picture" style="width: 100px; height: 100px; border-radius: 50%;" alt="no image">
          <div class="card-body custom-card-body">
            <h4>Hi Dasun</h4>
            <button class="btn btn-primary"> profile</button>
          </div>
        </div>
      </div>

      <!-- 01.02.buttton section -->
      <div class="border m-auto p-3 ">
        <div class="mx-2 p-3 border shadow">
          <!-- 1.product Management Dropdown -->

          <h3>Manage products</h3>
          <ul>
            <li> <a href="maindashboard.php?available_products">Available Product</a></li>
            <li> <a href="maindashboard.php?insert_products">Add new Product</a></li>

          </ul>

          <!-- 2.Order management dropdown -->
          <h3>Order Managemnet</h3>
          <ul>
            <li><a href="maindashboard.php?pending_orders">Shipment Pending Orders</a></li>
            <li><a href="maindashboard.php?completed_orders">Shipment completed Orders</a></li>
            <li><a href="maindashboard.php?invoice_details">Invoices details</a></li>

          </ul>

          <h3>User managemnet</h3>
          <ul>
            <li><a href="maindashboard.php?available_users">Available users</a></li>
          </ul>

          <!-- 3.product Categories Dropdown -->
          <h3>Product Categories and Brands</h3>
          <ul>
            <li><a href="maindashboard.php?insert_categories">Add new Category</a></li>
            <li><a href="maindashboard.php?edit_categories">Available Categories</a></li>
            <li><a href="maindashboard.php?insert_brands">Add new Brand</a></li>
            <li><a href="maindashboard.php?edit_brands">Available Brands</a></li>
          </ul>

        </div>
      </div>

    </div>


    <!-- 02.Right column--admin banner section and button section -->
    <div class="col-md-10 mb-1 border shadow">
      <div class="container-fluid p-2 content_section">


        <?php
        if (isset($_GET['available_products'])) {
          //redirect to edit user details page
          include('view_all_products.php');
         // echo "<h1 class='text-center'>Available products</h1>";
        }

        if (isset($_GET['insert_products'])) {
          include('insert_product.php');
        }

        if (isset($_GET['edit_categories'])) {
          include('view_all_categories.php');
        }

        if(isset($_GET['edit_selected_category_id']))
        {
          include('edit_selected_category.php');
        }

        if (isset($_GET['insert_categories'])) {
          include('insert_categories.php');
        }


        if (isset($_GET['insert_brands'])) {
          include('insert_brands.php');
        }

        if (isset($_GET['edit_brands'])) {
          include('view_all_brands.php');
        }

        
        if (isset($_GET['edit_selected_brand_id'])) {
          include('edit_selected_brand.php');
        }

        if(isset($_GET['edit_product']))
        {
          include('edit_product_details.php');
        }

        if(isset($_GET['delete_product']))
        {
          include('delete_selected_product.php');
        }
        
        if(isset($_GET['delete_selected_category_id']))
        {
          include('delete_selected_category.php');
        }

        if(isset($_GET['delete_selected_brand_id']))
        {
          include('delete_selected_brand.php');
        }

        if(isset($_GET['pending_orders']))
        {
          include('all_pending_orders.php');
        }

        if (
          isset($_GET['user_id']) &&
          isset($_GET['order_invoice_number']) &&
          isset($_GET['product_id'])
        ) {
          // Include the file when all parameters are set
          include('complete_shippment.php');
        }

        
        if(isset($_GET['completed_orders']))
        {
          include('completed_orders.php');
        }

        if(isset($_GET['invoice_details']))
        {
          include('invoices_details.php');
        }

        if (
          isset($_GET['invoice_number_id']) &&
          isset($_GET['user_id'])
        ) {
          // Include the file when all parameters are set
          include('complete_shippment_invoice.php');
        }

        if(isset($_GET['available_users']))
        {
          include('all_available_user.php');
        }

        if (
          isset($_GET['selected_user_name']) &&
          isset($_GET['selected_user_emailaddress'])
        ) {
          // Include the file when all parameters are set
          include('suspend_user.php');
        }

       

        if (
          isset($_GET['selected_user_name_activate']) &&
          isset($_GET['selected_user_emailaddress_activate'])
        ) {
          // Include the file when all parameters are set
          include('activate_account.php');
        }

        if(isset($_GET['user_id']))
        {
          include('selected_user_details.php');
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