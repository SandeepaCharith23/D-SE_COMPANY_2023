<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- link font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!--Link custom css file for slider-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <!-- link the css file link -->
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="fonts/Italianno-Regular.ttf">

    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>

    <!-- 1-child-header and banner -->
    <?php
    include('includes/connection.php');
    include('includes/headersection01.php');
    include('functions/ipaddress.php');
    include('functions/common_functions.php');
   

    ?>

    <!-- 2-child-user details -->
    <div id="useraccountdisplaysection" class="useraccountdisplaysection">
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

    <!-- 3-child-Cart details table -->
    <div class="bg-light">
        <h2 class="text-center">Cart details</h2>
    </div>
    <div class="fluid-container">
        <div class="row p-4">
            <form action="" method="POST">
                <table class="table table-bordered text-center">


                    <?php
                    //fetch data from database and display

                    global $conn;
                    $Total_cart_price = 0;
                    $user_ip_address = getIPAddress();

                    $select_carts_querry = "SELECT * FROM `cart_details` WHERE  User_IPaddress='$user_ip_address'";
                    $results_carts = mysqli_query($conn, $select_carts_querry);

                    $data_row_count = mysqli_num_rows($results_carts);

                    if ($data_row_count > 0) {

                        echo "
                    <thead>
                    <th>Product Name</th>
                    <th>Product Image</th>
                    <th>Product Quentity</th>
                    <th>Product Unitprice</th>
                    <!-- <th>Product total</th> -->
                    <th>Remove</th>
                    <th colspan='2'>Operations</th>
                    </thead>
                    <tbody>";

                        //display all available product
                        while ($carts_array = mysqli_fetch_array($results_carts)) {
                            $cart_product_id = $carts_array['Product_Id'];
                            $cart_product_quentity = $carts_array['Product_Quentity'];

                            $product_details_query = "SELECT * FROM `products` WHERE Product_ID=$cart_product_id";
                            $product_details_result = mysqli_query($conn, $product_details_query);

                            while ($product_details_array = mysqli_fetch_array($product_details_result)) {
                                //get the unit price of the product and set it into array to store as product_price


                                $product_price = array($product_details_array['Product_UnitPrice']);

                                //get the product unit price , product name,product image form product result
                                $table_product_unit_price = $product_details_array['Product_UnitPrice'];
                                $table_product_name = $product_details_array['Product_Name'];
                                $table_product_image01 = $product_details_array['Product_Image01'];

                                //set the product_values in cart.using array sum
                                $current_cart_products_value = array_sum($product_price);

                                //add values
                                $Total_cart_price += $current_cart_products_value;


                    ?>
                                <tr>
                                    <td><?php echo $table_product_name ?></td>
                                    <td><img src="<?php echo 'product_images/' . $table_product_image01 ?>" alt="<?php echo $table_product_image01 ?>" style="width: 50px; height: 50px; object-fit: contain;"></td>

                                    <td><input type="text" value="<?php echo $cart_product_quentity ?>" class="text-center border form-input" name="entered_product_quentity"></td>
                                    <?php

                                    ////code
                                    //get the entered quentity and update card_details tables in database
                                    $user_ip_address = getIPAddress();
                                    if (isset($_POST['update_cart'])) {
                                        $updated_product_quentity = $_POST['entered_product_quentity'];

                                        // //update database
                                        // $update_cart_details_query="UPDATE `cart_details` SET Product_Quentity=$updated_product_quentity  WHERE User_IPaddress='$user_ip_address'";
                                        // mysqli_query($conn,$update_cart_details_query);

                                        // Update database using prepared statement
                                        $update_cart_details_query = "UPDATE `cart_details` SET Product_Quentity = ? WHERE User_IPaddress = ? AND Product_Id= ? ";

                                        $stmt = $conn->prepare($update_cart_details_query);
                                        $stmt->bind_param('isi', $updated_product_quentity, $user_ip_address, $cart_product_id);
                                        $stmt->execute();

                                        //update total price
                                        // Convert string variables to numbers (int or float)
                                        $table_product_unit_price = floatval($table_product_unit_price);
                                        $updated_product_quentity = intval($updated_product_quentity);

                                        // Perform multiplication after converting to numbers
                                        $Total_cart_price = $Total_cart_price * $updated_product_quentity;


                                        echo "<script>window.open('my_cart.php','_self')</script>";
                                    }
                                    ////code

                                    ?>
                                    <td>Rs.<?php echo "$table_product_unit_price" ?></td>
                                    <!-- <td>
                            Rs.
                            <?php
                                $product_sub_total_amount = $table_product_unit_price * $cart_product_quentity;
                                echo $product_sub_total_amount;
                            ?>
                        </td> -->
                                    <td>
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="removeitem[]" value="<?php echo $cart_product_id ?>">
                                        <label class="form-check-label" for="exampleCheck1">Remove Item form cart</label>
                                    </td>
                                    <td>

                                        <input type="submit" value="Update Cart" name="update_cart" class="btn btn-primary px-3 mx-3">


                                        <input type="submit" value="Remove Item" name="remove_item_form_cart" class="btn btn-primary px-3 mx-3" onclick="displayRemoveItemMessage()">

                                        <script>
                                            function displayRemoveItemMessage() {
                                                // Display an alert when the button is clicked
                                                alert('Please select item(s) to remove by checking the checkboxes.');

                                            }
                                        </script>

                                    </td>
                                </tr>

                    <?php
                            }
                        }
                    } else {

                        echo "<h2 class='text-center text-danger'>There are no products avaliable in this cart</h2>";
                    }

                    ?>

                    </tbody>
                </table>
            </form>

            <!-- function to remove item -->
            <?php
            function remove_item_fromcart()
            {


                global $conn;
                if (isset($_POST['remove_item_form_cart'])) {

                    //checkbox must click and it store value in array-foreach loop run through array -removeitem[] 
                    foreach ($_POST['removeitem'] as $remove_id) {
                        echo $remove_id;

                        //delete query
                        $selected_product_delete_query = "DELETE FROM `cart_details` WHERE Product_Id=$remove_id";

                        //execute query
                        $result_delete_query = mysqli_query($conn, $selected_product_delete_query);

                        if ($result_delete_query) {
                            //when the delete process done redirect user to the my_cart
                            echo "<script>window.open('my_cart.php','_self')</script>";
                        }
                    }
                }
            }

            //invoke function
            echo $remove_item = remove_item_fromcart();
            ?>
        </div>

        <div class="d-flex p-4 mb-5">
            <?php

            global $conn;

            $user_ip_address = getIPAddress();

            $select_carts_querry = "SELECT * FROM `cart_details` WHERE  User_IPaddress='$user_ip_address'";
            $results_carts = mysqli_query($conn, $select_carts_querry);

            $data_row_count = mysqli_num_rows($results_carts);

            if ($data_row_count > 0) {
                echo "
                    <h4 class='px-3'>Sub Total:RS <strong> $Total_cart_price/=</strong></h4>
                    
                    <button class='btn btn-primary px-3 mx-3'><a href='productshome.php' class='text-light text-decoration-none'>Continue Shopping</a></button>
                    
                    <button class='btn btn-primary px-3 mx-3'><a href='user_area/checkout.php' class='text-light text-decoration-none'>Check out</a></button>
                    
                    ";
            } else {
                echo "<button class='btn btn-primary px-3 mx-3'><a href='productshome.php' class='text-light text-decoration-none'>Continue Shopping</a></button>";
            }


            //if continue shopping is click by user
            if(isset($_POST[''])){}

            ?>
            
            

        </div>

    </div>

    <!-- 4-child-footer-->
    <?php

    include('includes/footer.php');
    ?>

</body>

</html>