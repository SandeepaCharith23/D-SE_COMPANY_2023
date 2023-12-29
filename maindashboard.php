<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Dashboard</title>
    <!-- link font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link rel="stylesheet" href="css/style.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body class="fluid-container main-body">
<h1 class="text-center">MainDashboard-D&SE Company</h1>
<nav class="navbar navbar-expand-lg navbar-dark bg-info p-2 justify-content-center">
    <div class="container-fluid p-0">

        <!-- 1.Navbar -banner -->
        <a href="#" class="navbar-brand">
            <!-- Navbar Brand text -->
            <img src="images/logo.png" alt="no image" width="30" height="30"> D & SE Company
        </a>
        
        <!-- 2.Navbar-toggler -->
        <button class="navbar-toggler custom_toggler_button" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

        <!-- 3.navbar-content -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-auto mb-lg-0">
              
              <li class="nav-item custom_navitem">
                <a class="nav-link  active border p-2" aria-current="page" href="#">Home</a>
              </li>

              <li class="nav-item custom_navitem">
                <a class="nav-link  border p-2"  href="#">Products</a>
              </li>

              <li class="nav-item custom_navitem">
                <a class="nav-link  border p-2"  href="#">Register</a>
              </li>

              <li class="nav-item custom_navitem">
                <a class="nav-link  border p-2"  href="#">Cart</a>
              </li>

              <li class="nav-item custom_navitem">
                <a class="nav-link  border p-2"  href="#">Total Price</a>
              </li>

              <li class="nav-item custom_navitem">
                <a class="nav-link" href="#">Link</a>
              </li>

          
            </ul>

           
            
        </div>


    </div>
</nav>
<div class="container-fluid text-center m-4">
  <form class="d-flex custom_searchbar" role="search">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success  custom_searchbutton" type="submit">Search</button>
  </form>

</div>

<!-- admin banner section -->
<div class="row">

  <div class="col-md-3 border">
    <div class="container p-2 pe-1 ps-1 align-items-center" style="width: 15rem;">
      <h4>Welcome admin/User</h4>
      <div class="card admin_banner">
        <img class="card-img-top p-1" src="images/userimage01.jpg" alt="no image" style="width:10rem; height: 10rem;">
        <div class="card-body custom-card-body">
         <h4>Hi Dasun</h4>
         <button class="btn btn-primary">See More</button>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-9 mb-1 border">
    <div class="container-fluid p-2 analyse_section">
      <h4>Analyse Report</h4>
    </div>
  </div>
</div>

<div class="row" id="maincontent">
 
  <!-- 1.left section -->
  <div class="col-md-2  border p-2  button_section  align-items-center justify-content-center"
    id="leftcontent_button_section">
  
    <div class="menucontent text-center mb-2">
      <!-- 1.product Management Dropdown -->
      <div class="dropdown p-2 mb-3 d-grid">
      
          
          <button class="btn btn-outline-primary dropdown-toggle btn-lg btn-block leftcontenetbutton" type="button"
          data-bs-toggle="dropdown" aria-expanded="true">
          Product Management
          </button>
       
  
        <div class="dropdown-menu w-100 text-center border-black">
          <a class="dropdown-item " href="#">Manage Product</a>
          <a class="dropdown-item" href="#">New Add Product</a>
          <a class="dropdown-item" href="#">Add new Category</a>
  
        </div>
  
      </div>
  
  
      <!-- 2.Order management dropdown -->
      <div class="dropdown p-2 mb-3 d-grid ">
        <button class="btn btn-outline-primary dropdown-toggle btn-lg btn-block leftcontenetbutton" type="button" data-bs-toggle="dropdown"
          aria-expanded="false">Order Management</button>
  
        <div class="dropdown-menu w-100 text-center border-black">
          <a class="dropdown-item" href="#">Pending Orders</a>
          <a class="dropdown-item" href="#">Completed Orders</a>
          <a class="dropdown-item" href="#">Add new Category</a>
  
        </div>
  
      </div>

       <!-- 3.product Categories Dropdown -->
       <div class="dropdown p-2 mb-3 d-grid">
      
          
      <button class="btn btn-outline-primary dropdown-toggle btn-lg btn-block leftcontenetbutton" type="button"
      data-bs-toggle="dropdown" aria-expanded="true">
      Product Categories
      </button>
   

    <div class="dropdown-menu w-100 text-center border-black">
     
      <a class="dropdown-item" href="#">Add new Category</a>
      <a class="dropdown-item" href="#">Edit Category</a>

    </div>

  </div>
  
  
    </div>
  
  
  </div>

    
    <div class="col-md-5 border p-1" id="centercontent">002</div>
    <div class="col-md-5 border p-1" id="rightcontent">003</div>
</div>

<div class="container-fluid bg-info p-3 text-center footer custom_footer">
  <p>All rights reserved @ Sandeepa Charith</p>
</div>


    
</body>
</html>