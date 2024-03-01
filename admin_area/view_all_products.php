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

  <!-- <?php
  global $conn;

  $select_all_available_products = "SELECT * FROM `products`";
  $all_available_products_result = mysqli_query($conn, $select_all_available_products);
  $availabel_product_count = mysqli_num_rows($all_available_products_result);

  ?> -->

<?php
    global $conn;

    // Number of rows to display on each page
    $rowsPerPage = 30;

    // Calculate the current page (default to 1 if not set)
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

    // Calculate the offset to start fetching rows
    $offset = ($currentPage - 1) * $rowsPerPage;

    $select_all_available_products = "SELECT * FROM `products` LIMIT $offset, $rowsPerPage";
    $all_available_products_result = mysqli_query($conn, $select_all_available_products);
    $availabel_product_count = mysqli_num_rows($all_available_products_result);
    ?>

  <h1 class="text-center mt-3">Available products count is <?php echo $availabel_product_count ?> </h1>
  <table class="table table-bordered mt-2 text-center">
    <thead class="bg-info">
      <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Product Category</th>
        <th>Product Brand</th>
        <th>Product Starting Quentity</th>
        <th>Product in Pending orders</th>
        <th>Total balance products in stock</th>
        <th>Product Unitprice</th>
        <th>Product Image</th>
        <th>Product Status</th>
        <th>Product Edit</th>
        <th>Product Delete</th>

      </tr>
    </thead>
    <tbody>
      <?php

      while ($availabel_products_array = mysqli_fetch_array($all_available_products_result)) {
        $available_product_id = $availabel_products_array['Product_ID'];
        $available_product_name = $availabel_products_array['Product_Name'];
        $available_product_category_id = $availabel_products_array['Category_ID'];
        $available_product_brand_id = $availabel_products_array['Brand_ID'];
        $available_product_quentity = $availabel_products_array['Product_Quentity'];
        $available_product_unitprice = $availabel_products_array['Product_UnitPrice'];
        $available_product_image01 = $availabel_products_array['Product_Image01'];
        $available_product_status = $availabel_products_array['Product_Status'];

        $select_category_name_querry = "SELECT * FROM `product_categories` WHERE Category_ID='$available_product_category_id'";
        $category_result_array = mysqli_fetch_array(mysqli_query($conn, $select_category_name_querry));
        $available_product_category_name = $category_result_array['Category_Name'];

        $select_brand_name_querry = "SELECT * FROM `product_brands` WHERE Brand_ID='$available_product_brand_id'";
        $brand_result_array = mysqli_fetch_array(mysqli_query($conn, $select_brand_name_querry));
        $available_product_brand_name = $brand_result_array['Brand_Name'];

        //get available balance quentity
        //echo "<script>console.log('Start of the available product querry')</script>";

        $select_products_from_pending_orders_querry = "SELECT * FROM `pending_orders` WHERE product_id = $available_product_id";
        $result_pending_orders = mysqli_query($conn, $select_products_from_pending_orders_querry);

        $total_pending_products = 0;


        while ($selected_product_available_in_pending_orders_array = mysqli_fetch_array($result_pending_orders)) {
          $product_quentity_available_in_pending_orders = $selected_product_available_in_pending_orders_array['product_quentity'];

          // $total_pending_products=array_sum($product_quentity_available_in_pending_orders);
          // Sum up the quantity for each pending order
          $total_pending_products += $product_quentity_available_in_pending_orders;

          // Example: Print the quantity
          //  echo "<script>console.log('Product id -$available_product_id ,Total product quentity: $total_pending_products')</script>";
          //  echo "<script>console.log('Product id -$available_product_id ,Quentity Pending Orders: $product_quentity_available_in_pending_orders')</script>";
        }

        // echo "<script>console.log('$product_quentity_available_in_pending_orders')</script>";
        $balance_product_quentity = $available_product_quentity - $total_pending_products;
        //echo "<script>console.log('End of the available product querry')</script>";



        echo "
            <tr>
            <td>$available_product_id</td>
            <td>$available_product_name</td>
            <td>$available_product_category_name</td>
            <td>$available_product_brand_name</td>
            <td>$available_product_quentity</td>
            <td>$total_pending_products</td>
            <td>$balance_product_quentity</td>
            <td>$available_product_unitprice</td>
            <td><img src='../product_images/$available_product_image01' style='width:50px;height:50px;'></td>
            <td>$available_product_status</td>
            <td><a href='maindashboard.php?edit_product=$available_product_id'>Edit</a></td>
            <td><a href='maindashboard.php?delete_product=$available_product_id''>Delete</a></td>
            </tr>
            
            ";
      }




      ?>

    </tbody>

  </table>

    <!-- Pagination links -->
    <div id="paginationLinks" class="text-center">
        <?php
        $total_rows_query = "SELECT COUNT(*) as total FROM `products`";
        $total_rows_result = mysqli_query($conn, $total_rows_query);
        $total_rows_array = mysqli_fetch_assoc($total_rows_result);
        $total_rows = $total_rows_array['total'];

        $total_pages = ceil($total_rows / $rowsPerPage);

        for ($i = 1; $i <= $total_pages; $i++) {
            echo "<a href='?page=$i'>$i</a> ";
        }
        ?>
    </div>

    

</body>

</html>