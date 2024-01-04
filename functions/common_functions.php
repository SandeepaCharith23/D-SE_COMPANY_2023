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
        <div class='card product' onclick='' >
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
        
        <a href='productshome.php?add_to_cart_product_id=$product_ID' class='product_card_button'>Add To cart</a>
        
        <a href='product_details.php?product_id=$product_ID&category_id=$product_category_ID' class='product_card_button'>View Product</a>
        
        </div>
        </div>
        </div>
        ";
            }
        }
    }
}


//display Selected product from database-see more button click
function get_selected_product()
{

    //create global connection
    global $conn;

    //check if user click any brand or category-any specifications

    if (isset($_GET['product_id'])) {
        //selected product ID
        $selected_product_id = $_GET['product_id'];

        //1.create search querry
        $select_products_query = "SELECT * FROM `products` WHERE Product_ID=$selected_product_id";

        //2.excute query and fetch data
        $results_products = mysqli_query($conn, $select_products_query);


        //count data
        $numberoddata = mysqli_num_rows($results_products);

        if ($numberoddata == 0) {
            echo "no records";
        } else {

            $row_products_data = mysqli_fetch_assoc($results_products);


            $product_ID = $row_products_data['Product_ID'];
            $product_name = $row_products_data['Product_Name'];
            $product_keywords = $row_products_data['Product_Keyword'];
            $product_category_ID = $row_products_data['Category_ID'];
            $product_brand_ID = $row_products_data['Brand_ID'];
            $product_description = $row_products_data['Product_Description'];
            $product_quentity = $row_products_data['Product_Quentity'];
            $product_unitprice = $row_products_data['Product_UnitPrice'];
            $product_image01 = $row_products_data['Product_Image01'];
            $product_image02 = $row_products_data['Product_Image02'];
            $product_image03 = $row_products_data['Product_Image03'];
            $product_image04 = $row_products_data['Product_Image04'];
            $product_date = $row_products_data['Product_Date'];
            $product_status = $row_products_data['Product_Status'];


            echo "
                    <h1>$product_name</h1>
                    <h2>$product_brand_ID</h2>

                    <div class='product-container'>
                    <div class='product-images-column'>
                    <div class='main-image-sec'>
    
                     <img class='main-image' src='product_images/$product_image01' alt='no image' id='main_image'>
                    </div>
    
    
                    <div class='product-images-row'>
                    <div class='product-smallimage-col'>
                    <img src='product_images/$product_image01' class='product-images-small' alt='no image' id='small-image01'>
                   </div>

                     <div class='product-smallimage-col'>
                     <img src='product_images/$product_image02' class='product-images-small' alt='no image' id='small-image02'>
                    </div>

                    <div class='product-smallimage-col'>
                     <img src='product_images/$product_image03' class='product-images-small' alt='no image' id='small-image03'>
                     </div>
                    <div class='product-smallimage-col'>
                    <img src='product_images/$product_image04' class='product-images-small' alt='no image' id='small-image04'>
                    </div>
            
                </div>
    
            </div>
                     <div class='product-details-column'>
                     <h1>$product_name / $product_category_ID</h1>
                     <h4>Product Category description</h4>
                     <h2>Rs.$product_unitprice</h2>

                     <div class='select-sizes-section'>
                     <h4>Select your size</h4>
                      <select name='sizes' id='sizes'>
                      <option>Select Sizes</option>
                      <option>Small</option>
                      <option>Medium</option>
                      <option>Large</option>
                      <option>Extra Large</option>
                    </select>
             </div>

           <div class='select-quentity-section'>
            <h4>Select your quentity</h4>
            <input type='number' min='1' max='100' value='1'>
            
            <a href='productshome.php?add_to_cart_product_id=$product_ID' class='product_addtocart_button' onclick='add_to_cart()'>Add to cart</a>
            </div>
       
        <h4>Product Details</h4>
        <p>$product_description</p>

    </div>
   </div>
                    
                    
                    ";
        }
    }
}

///////////////////

//display Selected product from database-see more button click
function get_selected_product_related_products()
{

    //create global connection
    global $conn;

    //check if user click any brand or category-any specifications

    if (isset($_GET['category_id']) && isset($_GET['product_id'])) {
        //selected product ID
        $selected_product_category = $_GET['category_id'];
        $selected_product_Id = $_GET['product_id'];

        //1.create search querry
        $select_products_query = "SELECT * FROM `products` WHERE Category_ID=$selected_product_category AND Product_ID <> $selected_product_Id ";

        //2.excute query and fetch data
        $results_products = mysqli_query($conn, $select_products_query);


        //count data
        $numberoddata = mysqli_num_rows($results_products);

        if ($numberoddata == 0) {
            echo "<h2>No related Products avaliable to select Category</h2>";
        } else {

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
                $product_image02 = $row_products_data['Product_Image02'];
                $product_image03 = $row_products_data['Product_Image03'];
                $product_image04 = $row_products_data['Product_Image04'];
                $product_date = $row_products_data['Product_Date'];
                $product_status = $row_products_data['Product_Status'];


                echo "
                <div class='col-md-4 mb-2'>
            <div class='card product' onclick='#'>
                <img src='product_images/$product_image01' class='card-img-top p-4 border' alt='$product_name'>
                <div class='card-body product-description'>
                    <h1 class='card-title'>$product_name</h1>
                    <p class='card-text'>$product_description</p>
                    <h2>$product_unitprice</h2>
                    <a href='product_details.php?product_id=$product_ID&category_id=$product_category_ID' class='btn btn-primary'>View Product</a>
                </div>
            </div>
        </div>
                
                ";
            }
        }
    }
}

////////////////////////

//display all stored product from database-without any limitation
function get_all_products_withoutlimit()
{

    //create global connection
    global $conn;

    //check if user click any brand or category-any specifications
    if (!isset($_GET['cateId'])) {

        if (!isset($_GET['brandId'])) {
            //1.create search querry
            $select_products_query = "SELECT * FROM `products` ORDER BY RAND()";

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
        <a href='productshome.php?add_to_cart_product_id=$product_ID' class='product_card_button'>Add To cart</a>
        
        <a href='product_details.php?product_id=$product_ID&category_id=$product_category_ID' class='product_card_button'>View Product</a>
        
        </div>
        </div>
        </div>
        ";
            }
        }
    }
}



//search bar
function search_product_bysearchbar()
{


    //create global connection
    global $conn;

    //check that user click search button in nav bar
    if (isset($_GET['search_data_product'])) {

        //get the keyword which search by user
        $searched_data_value = $_GET['search_data'];

        //1.create search querry
        $search_products_query = "SELECT * FROM `products` where Product_Keyword LIKE '%$searched_data_value%'";

        //2.excute query and fetch data
        $results_products = mysqli_query($conn, $search_products_query);

        //2.1.check that is there any product ??
        $numof_searched_results = mysqli_num_rows($results_products);

        //3.execute through while loop 
        //   $row_products_data=mysqli_fetch_assoc($results_products);

        if ($numof_searched_results == 0) {
            echo "<h1>Sorry ,There are no stocks available to Searched Items <h1>";
        } else {

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
        <a href='productshome.php?add_to_cart_product_id=$product_ID' class='product_card_button'>Add To cart</a>
        
        <a href='product_details.php?product_id=$product_ID&category_id=$product_category_ID' class='product_card_button'>View Product</a>
        
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
        $selected_product_category = $_GET['cateId'];

        //1.create search querry
        $select_products_query = "SELECT * FROM `products` WHERE Category_ID =$selected_product_category ";

        //2.excute query and fetch data
        $results_products = mysqli_query($conn, $select_products_query);

        //2.1.check that is there any product ??
        $numof_searched_results = mysqli_num_rows($results_products);

        //3.execute through while loop 
        //   $row_products_data=mysqli_fetch_assoc($results_products);

        if ($numof_searched_results == 0) {
            echo "<h1>Sorry ,There are no stocks available to selected category <h1>";
        } else {

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
                <a href='productshome.php?add_to_cart_product_id=$product_ID' class='product_card_button'>Add To cart</a>
        
                <a href='product_details.php?product_id=$product_ID&category_id=$product_category_ID' class='product_card_button'>View Product</a>
                
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
        $selected_product_brand = $_GET['brandId'];

        //1.create search querry
        $select_products_query = "SELECT * FROM `products` WHERE Brand_ID =$selected_product_brand ";

        //2.excute query and fetch data
        $results_products = mysqli_query($conn, $select_products_query);

        //2.1.check that is there any product ??
        $numof_searched_results = mysqli_num_rows($results_products);

        //3.execute through while loop 
        //   $row_products_data=mysqli_fetch_assoc($results_products);

        if ($numof_searched_results == 0) {
            echo "<h1>Sorry ,There are no stocks available to selected Brand <h1>";
        } else {


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
                <a href='productshome.php?add_to_cart_product_id=$product_ID' class='product_card_button'>Add To cart</a>
        
                <a href='product_details.php?product_id=$product_ID&category_id=$product_category_ID' class='product_card_button'>View Product</a>
                
                </div>
                </div>
                </div>
                  ";
            }
        }
    }
}


//display saved categories
function getcategories()
{
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

function getbrands()
{
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


//get the IP address of the client
function getIPAddress() {  
    // whether IP is from the shared internet  
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
        $ip = $_SERVER['HTTP_CLIENT_IP'];  
    }  
    // whether IP is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
    }  
    // whether IP is from the remote address  
    else {  
        $ip = $_SERVER['REMOTE_ADDR'];  
    }  
    return $ip;
    
} 


//function-add to cart 
function add_to_cart(){
   

    if(isset($_GET['add_to_cart_product_id']))
    {  
        //get the connection
        global $conn;

        //get the Ip or proxy address of a user
        $ip_address=getIPAddress();

        //get the product id
        $added_product_id=$_GET['add_to_cart_product_id'];

        //select all data from cart_details
        $selct_query="SELECT * FROM `cart_details` WHERE Product_Id=$added_product_id AND User_IPaddress='$ip_address'";

        //execute and get the result querry
        $result_query=mysqli_query($conn,$selct_query);

        //get the result count
        $num_of_rows=mysqli_num_rows($result_query);

        if($num_of_rows > 0)
        {
            echo "<script>alert('This Product already present in your cart');</script>";
            echo "<script>window.open('productshome.php','_self')</script>";
        }

        else{
            //add product to cart_details
            $insert_querry="INSERT INTO`cart_details`(Product_Id,User_IPaddress,Product_Quentity) VALUES($added_product_id,'$ip_address',0)";
        
            //execute
            $result_query=mysqli_query($conn,$insert_querry);
            echo "<script>alert('This Product is added to cart');</script>";
            echo "<script>window.open('productshome.php','_self')</script>";

        }

        
        


    }


}

//function to get the itemcount of the cart
function cart_item_count(){
    if(isset($_GET['add_to_cart_product_id']))
    {  
        //1.when user click a product -add to cart button count will be increased
        //get the connection
        global $conn;

        //get the Ip or proxy address of a user
        $ip_address=getIPAddress();


        //select all data from cart_details specified the user Ip address
        $selct_query="SELECT * FROM `cart_details` WHERE  User_IPaddress='$ip_address'";

        //execute and get the result querry
        $result_query=mysqli_query($conn,$selct_query);

        //get the result count
        $products_in_cart=mysqli_num_rows($result_query);

    }

        else{

            //2.when user doesnot click a product -add to cart button --count will read 
            //add product to cart_details
                  //get the connection
        global $conn;

        //get the Ip or proxy address of a user
        $ip_address=getIPAddress();


        //select all data from cart_details specified the user Ip address
        $selct_query="SELECT * FROM `cart_details` WHERE  User_IPaddress='$ip_address'";

        //execute and get the result querry
        $result_query=mysqli_query($conn,$selct_query);

        //get the result count
        $products_in_cart=mysqli_num_rows($result_query);
         
        }

        echo $products_in_cart;


      
}


?>



