<?php
include('../includes/connection.php');
include('../functions/ipaddress.php');
@session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payments Page</title>
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
    <h1 class="text-center">Confirm Order and Payments Information</h1>
    <div class="row">
        <div class="col-md-8 border p-2 bg-light rounded">
            <div class="container">
                <h2 class="text-primary">Cart Summary</h2>
                <p class="text-info">
                    Here The summary of your available products
                </p>
                <!-- Additional content or styling here -->
                <div class="fluid-container">
                    <div class="row ">
                        <form action="" method="POST">
                            <table class="table table-bordered text-center">


                                <?php
                                //fetch data from database and display

                                global $conn;
                                $Total_cart_price = 0;
                                $user_ip_address = getIPAddress1();

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
                                                <td><img src="<?php echo '../product_images/' . $table_product_image01 ?>" alt="<?php echo $table_product_image01 ?>" style="width: 50px; height: 50px; object-fit: contain;"></td>

                                                <td><input type="text" value="<?php echo $cart_product_quentity ?>" class="text-center border form-input" name="entered_product_quentity"></td>
                                                <?php

                                             
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
                        
                    </div>

                    <div class="d-flex p-4 mb-5">
                        <?php

                        global $conn;

                        $user_ip_address = getIPAddress1();

                        $select_carts_querry = "SELECT * FROM `cart_details` WHERE  User_IPaddress='$user_ip_address'";
                        $results_carts = mysqli_query($conn, $select_carts_querry);

                        $data_row_count = mysqli_num_rows($results_carts);

                        if ($data_row_count > 0) {
                            echo "
                    <h4 class='px-3'>Sub Total:RS <strong> $Total_cart_price/=</strong></h4>
                    
                    <button class='btn btn-primary px-3 mx-3'><a href='' class='text-light text-decoration-none'>Confirm Order</a></button>
                    
                    <button class='btn btn-primary px-3 mx-3'><a href='' class='text-light text-decoration-none'>Check out</a></button>

                    <button class='btn btn-primary px-3 mx-3'><a href='../productshome.php' class='text-light text-decoration-none'>Back to Product home</a></button>
                    
                    ";
                        } else {
                            echo "<button class='btn btn-primary px-3 mx-3'><a href='' class='text-light text-decoration-none'>Continue Shopping</a></button>";
                        }


                        

                        ?>



                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-4 border p-2 bg-info text-white">
            <div class="container">
                <h2>Payments Options</h2>
                <!-- Additional content or styling here -->
                <p>
                    <strong>Important Notice:</strong> Currently, we do not offer online payment options at this stage. Our payment method involves cash payment upon delivery of your order. We want to assure you that we are actively working to enhance our services, and in the near future, we plan to provide a variety of secure and convenient payment methods to better serve you. We appreciate your understanding and patience as we strive to improve your shopping experience. Thank you for choosing us, and we look forward to offering you more payment options soon!
                </p>


            </div>
        </div>

    </div>

</body>

</html>