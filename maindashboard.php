<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body class="fluid-container main-body">
<h1>Main MainDashboard</h1>
<nav class="navbar navbar-expand-lg justify-content-center">
    <div class="container-fluid">

        <!-- 1.Navbar -banner -->
        <a href="#" class="navbar-brand">
            <!-- Navbar Brand text -->
            <img src="images/logo.png" alt="no image" width="30" height="30"> D & SE Company
        </a>
        
        <!-- 2.Navbar-toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

        <!-- 3.navbar-content -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-auto mb-lg-0">
              
              <li class="nav-item customnavitem">
                <a class="nav-link  active border p-2" aria-current="page" href="#">Home</a>
              </li>

              <li class="nav-item customnavitem">
                <a class="nav-link  border p-2"  href="#">My Store</a>
              </li>

              <li class="nav-item customnavitem">
                <a class="nav-link  border p-2"  href="#">My Profile</a>
              </li>

              <li class="nav-item customnavitem">
                <a class="nav-link" href="#">Link</a>
              </li>

          
            </ul>

            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            
          </div>


    </div>
</nav>


<div class="row" id="maincontent">
    
  
  
  <!-- 1.left section -->
  <div class="col-2 border p-2  button_section  align-items-center justify-content-center"
    id="leftcontent_button_section">
  
    <div class="menucontent">
      <!-- 1.product Management Dropdown -->
      <div class="dropdown">
        <button class="btn btn-outline-primary dropdown-toggle btn-lg btn-block leftcontenetbutton" type="button"
          data-bs-toggle="dropdown" aria-expanded="true">Product Management</button>
  
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Manage Product</a>
          <a class="dropdown-item" href="#">New Add Product</a>
          <a class="dropdown-item" href="#">Add new Category</a>
  
        </div>
  
      </div>
  
  
      <!-- 2.Order management dropdown -->
      <div class="dropdown">
        <button class="btn btn-outline-primary dropdown-toggle btn-lg btn-block leftcontenetbutton" type="button" data-bs-toggle="dropdown"
          aria-expanded="false">Order Management</button>
  
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Pending Orders</a>
          <a class="dropdown-item" href="#">Completed Orders</a>
          <a class="dropdown-item" href="#">Add new Category</a>
  
        </div>
  
      </div>
  
  
    </div>
  
  
  </div>

    
    <div class="col-5 border p-1" id="centercontent">002</div>
    <div class="col-5 border p-1" id="rightcontent">003</div>
</div>


    
</body>
</html>