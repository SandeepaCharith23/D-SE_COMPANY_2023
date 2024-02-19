<?php
include('../includes/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
    global $conn;

    $select_all_available_products="SELECT * FROM `products`";
    $all_available_products_result=mysqli_query($conn,$select_all_available_products);
    $availabel_product_count=mysqli_num_rows($all_available_products_result);
     
    ?>

   <h1 class="text-center mt-3">Available products count is <?php echo $availabel_product_count?> </h1>
    <table class="table table-bordered mt-2 text-center">
        <thead class="bg-info">
        <tr> 
          <th>Product Name</th>
          <th>Product Name</th>
          <th>Product Category</th>
          <th>Product Brand</th> 
          <th>Product Quentity</th>
          <th>Product Unitprice</th> 
          <th>Product Image</th>
          <th>Product Status</th>
          <th>Product Edit</th> 
          <th>Product Delete</th>  

        </tr>
        </thead>
        <tbody>
           <?php

           while($availabel_products_array=mysqli_fetch_array($all_available_products_result))
           {
            $available_product_id=$availabel_products_array['Product_ID'];
            $available_product_name=$availabel_products_array['Product_Name'];
            $available_product_category_id=$availabel_products_array['Category_ID'];
            $available_product_brand_id=$availabel_products_array['Brand_ID'];
            $available_product_quentity=$availabel_products_array['Product_Quentity'];
            $available_product_unitprice=$availabel_products_array['Product_UnitPrice'];
            $available_product_image01=$availabel_products_array['Product_Image01'];
            $available_product_status=$availabel_products_array['Product_Status'];

            $select_category_name_querry="SELECT * FROM `product_categories` WHERE Category_ID='$available_product_category_id'";
            $category_result_array=mysqli_fetch_array(mysqli_query($conn,$select_category_name_querry));
            $available_product_category_name=$category_result_array['Category_Name'];

            $select_brand_name_querry="SELECT * FROM `product_brands` WHERE Brand_ID='$available_product_category_id'";
            $brand_result_array=mysqli_fetch_array(mysqli_query($conn,$select_brand_name_querry));
            $available_product_brand_name=$brand_result_array['Brand_Name'];

            //get available balance quentity
            // $select_products_from_pending_orders_querry="SELECT * FROM `pending_orders` WHERE product_ids=$available_product_id";
            
           




            echo "
            <tr>
            <td>$available_product_id</td>
            <td>$available_product_name</td>
            <td>$available_product_category_name</td>
            <td>$available_product_brand_name</td>
            <td>$available_product_quentity</td>
            <td>$available_product_unitprice</td>
            <td><img src='../product_images/$available_product_image01' style='width:50px;height:50px;'></td>
            <td>$available_product_status</td>
            <td><a href='maindashboard.php?edit_product'>Edit</a></td>
            <td><a href=''>Delete</a></td>
            </tr>
            
            ";
            
           }

           
           
           
           ?>

        </tbody>
        
    </table>
    
</body>
</html>