<?php

//connect data base
//include('./includes/connection.php');

//display stored product from database-without any specification
function getproducts()
{

    //create global connection
    global $conn;

    //check if user click any brand or category-any specifications
    if (!isset($_GET['cateId'])) {

        if (!isset($_GET['brandId'])) {
            //1.create search querry
            $select_products_query = "SELECT * FROM `products` ORDER BY RAND() LIMIT 0,6";

            //2.excute query and fetch data
            $results_products = mysqli_query($conn, $select_products_query);

            //3.execute through while loop 
            //   $row_products_data=mysqli_fetch_assoc($results_products);


            //   echo $row_products_data['Product_Name'];
            while ($row_products_data = mysqli_fetch_assoc($results_products)) {
                $product_ID = $row_products_data['Product_ID'];
                $product_name = $row_products_data['Product_Name'];
                $product_keywords = $row_products_data['Product_Keyword'];
                $product_category_ID = $row_products_data['Category_ID'];
                $product_brand_ID = $row_products_data['Brand_ID'];
                $product_description = $row_products_data['Product_Description'];
                $product_quentity = $row_products_data['Product_Quentity'];
                $product_unitprice = $row_products_data['Product_UnitPrice'];
                $product_image01 = $row_products_data['Product_Image01'];
                $product_date = $row_products_data['Product_Date'];
                $product_status = $row_products_data['Product_Status'];
                echo "
        <div class='col-md-4 mb-2'>
        <div class='card product' onclick='#' >
        <img src='product_images/$product_image01' class='card-img-top' alt='$product_name'>
        <div class='card-body product-description'>
        <h1 class='card-title'>$product_name</h1>
        <span>$product_brand_ID</span>
        <p class='card-text'>$product_description</p>
        <h2>$product_unitprice</h2>
        <div class='stars'>
        <i class='fas fa-star'></i>
        <i class='fas fa-star'></i>
        </div>
        <div class='product-add-to-cart'>
        <a href='#'><i class='fa fa-shopping-cart'></i></a>
        </div>
        <a href='#' class='btn btn-primary'>See more</a>
        </div>
        </div>
        </div>
        ";
            }
        }
    }
   
}


//get the products category wise
function get_unique_category_products()
{

    //create global connection
    global $conn;

    //check if user click any brand or category-any specifications
    if (isset($_GET['cateId'])) {
             
            //get the product category
            $selected_product_category=$_GET['cateId'];
        
            //1.create search querry
            $select_products_query = "SELECT * FROM `products` WHERE Category_ID =$selected_product_category ";

            //2.excute query and fetch data
            $results_products = mysqli_query($conn, $select_products_query);

            //2.1.check that is there any product ??
            $numof_searched_results=mysqli_num_rows($results_products);

            //3.execute through while loop 
            //   $row_products_data=mysqli_fetch_assoc($results_products);

            if($numof_searched_results==0)
            {
                echo "<h1>Sorry ,There are no stocks available to selected category <h1>";
            }
            
            else{

            //   echo $row_products_data['Product_Name'];
            while ($row_products_data = mysqli_fetch_assoc($results_products)) {
                $product_ID = $row_products_data['Product_ID'];
                $product_name = $row_products_data['Product_Name'];
                $product_keywords = $row_products_data['Product_Keyword'];
                $product_category_ID = $row_products_data['Category_ID'];
                $product_brand_ID = $row_products_data['Brand_ID'];
                $product_description = $row_products_data['Product_Description'];
                $product_quentity = $row_products_data['Product_Quentity'];
                $product_unitprice = $row_products_data['Product_UnitPrice'];
                $product_image01 = $row_products_data['Product_Image01'];
                $product_date = $row_products_data['Product_Date'];
                $product_status = $row_products_data['Product_Status'];
                echo "
                <div class='col-md-4 mb-2'>
                <div class='card product' onclick='#' >
                <img src='product_images/$product_image01' class='card-img-top' alt='$product_name'>
                <div class='card-body product-description'>
                <h1 class='card-title'>$product_name</h1>
                <span>$product_brand_ID</span>
                <p class='card-text'>$product_description</p>
                <h2>$product_unitprice</h2>
                <div class='stars'>
                <i class='fas fa-star'></i>
                <i class='fas fa-star'></i>
                </div>
                <div class='product-add-to-cart'>
                <a href='#'><i class='fa fa-shopping-cart'></i></a>
                </div>
                <a href='#' class='btn btn-primary'>See more</a>
                </div>
                </div>
                </div>
                  ";
            }
        }
        
    }
   
}

//get the products category wise
function get_unique_brand_products()
{

    //create global connection
    global $conn;

    //check if user click any brand or category-any specifications
    if (isset($_GET['brandId'])) {
             
            //get the product brand
            $selected_product_brand=$_GET['brandId'];
        
            //1.create search querry
            $select_products_query = "SELECT * FROM `products` WHERE Brand_ID =$selected_product_brand ";

            //2.excute query and fetch data
            $results_products = mysqli_query($conn, $select_products_query);

              //2.1.check that is there any product ??
              $numof_searched_results=mysqli_num_rows($results_products);

              //3.execute through while loop 
              //   $row_products_data=mysqli_fetch_assoc($results_products);
  
              if($numof_searched_results==0)
              {
                  echo "<h1>Sorry ,There are no stocks available to selected Brand <h1>";
              }
              
              else{


            //   echo $row_products_data['Product_Name'];
                while ($row_products_data = mysqli_fetch_assoc($results_products)) {
                $product_ID = $row_products_data['Product_ID'];
                $product_name = $row_products_data['Product_Name'];
                $product_keywords = $row_products_data['Product_Keyword'];
                $product_category_ID = $row_products_data['Category_ID'];
                $product_brand_ID = $row_products_data['Brand_ID'];
                $product_description = $row_products_data['Product_Description'];
                $product_quentity = $row_products_data['Product_Quentity'];
                $product_unitprice = $row_products_data['Product_UnitPrice'];
                $product_image01 = $row_products_data['Product_Image01'];
                $product_date = $row_products_data['Product_Date'];
                $product_status = $row_products_data['Product_Status'];
                echo "
                <div class='col-md-4 mb-2'>
                <div class='card product' onclick='#' >
                <img src='product_images/$product_image01' class='card-img-top' alt='$product_name'>
                <div class='card-body product-description'>
                <h1 class='card-title'>$product_name</h1>
                <span>$product_brand_ID</span>
                <p class='card-text'>$product_description</p>
                <h2>$product_unitprice</h2>
                <div class='stars'>
                <i class='fas fa-star'></i>
                <i class='fas fa-star'></i>
                </div>
                <div class='product-add-to-cart'>
                <a href='#'><i class='fa fa-shopping-cart'></i></a>
                </div>
                <a href='#' class='btn btn-primary'>See more</a>
                </div>
                </div>
                </div>
                  ";
            }

          }
        
    }
   
}


//display saved categories
function getcategories(){
       //set global connection
       global $conn;
       
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
}

function getbrands(){
      //set global connection
      global $conn;
     
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
}

?>