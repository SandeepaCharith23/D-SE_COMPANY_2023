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
    <title>My order</title>

    <!-- link font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!--Link custom css file for slider-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <!-- link the css file link -->
    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="../fonts/Italianno-Regular.ttf">

    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>

    <?php
    if ($_GET['user_id']) {
        $user_id = $_GET['user_id'];
        echo "user Id is " . $user_id;
        //echo "<script>console.log('hello .$user_id.');</script>";
    }



    ?>




    <h1 class="text-center">Order details and Payments Information</h1>
    <div class="row justify-content-evenly mb-3">
        <!-- Availabe items in the cart -->
        <div class="col-md-8 border p-2 bg-light rounded shadow ">
            <div class="container ">
                <h2 class="text-primary">Available Products in your cart</h2>
                <p class="text-info">
                    Here The summary of your available products
                </p>
                <!-- Additional content or styling here -->
                <div class="fluid-container">
                    <div class="row ">

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
                    <th>Product Sub Total</th>
                    
                    
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


                                        // $product_price = array($product_details_array['Product_UnitPrice']);

                                        //get the product unit price , product name,product image form product result
                                        $table_product_unit_price = $product_details_array['Product_UnitPrice'];
                                        $table_product_name = $product_details_array['Product_Name'];
                                        $table_product_image01 = $product_details_array['Product_Image01'];



                                        $product_price = floatval($cart_product_quentity) * floatval($table_product_unit_price);

                                        $Total_cart_price += $product_price;


                            ?>
                                        <tr>
                                            <td><?php echo $table_product_name ?></td>
                                            <td><img src="<?php echo '../product_images/' . $table_product_image01 ?>" alt="<?php echo $table_product_image01 ?>" style="width: 50px; height: 50px; object-fit: contain;"></td>

                                            <td><?php echo $cart_product_quentity ?></td>
                                            <?php


                                            ////code

                                            ?>
                                            <td>Rs.<?php echo "$table_product_unit_price" ?></td>
                                            <td>
                                                Rs.
                                                <?php
                                                // $product_sub_total_amount = $table_product_unit_price * $cart_product_quentity;
                                                $product_sub_total_amount = floatval($table_product_unit_price) * floatval($cart_product_quentity);

                                                echo number_format($product_sub_total_amount, 2);
                                                ?>
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




                    </div>

                    <div class="d-flex p-4 mb-5">
                        <?php

                        global $conn;

                        $user_ip_address = getIPAddress1();

                        function getusercredential($conn, $user_ip_address)
                        {
                            $select_user_credential_querry = "SELECT * FROM `user_table` WHERE User_IPaddress='$user_ip_address'";
                            $user_details_results = mysqli_query($conn, $select_user_credential_querry);
                            $user_details_array_result = mysqli_fetch_array($user_details_results);

                            $user_id = $user_details_array_result['User_ID'];

                            return $user_id;
                        };

                        $select_carts_querry = "SELECT * FROM `cart_details` WHERE  User_IPaddress='$user_ip_address'";
                        $results_carts = mysqli_query($conn, $select_carts_querry);

                        //get the product quentity $data_row_count=available product count
                        $data_row_count = mysqli_num_rows($results_carts);

                        if ($data_row_count > 0) {
                            echo "
                    <h4 class='px-3'>Total price for your cart: Rs <strong> $Total_cart_price /=</strong> + shipping cost/Delivery Cost </h4>  
                    ";
                        } else {
                            echo "<button class='btn btn-primary px-3 mx-3'><a href='' class='text-light text-decoration-none'>Continue Shopping</a></button>";
                        }




                        ?>



                    </div>

                </div>
            </div>
        </div>



        <!-- About delivery charges -->
        <div class="col-md-3 border shadow p-2">
            <div class="container">
                <h2> Delivery Charges in Sri Lanka</h2>
                <ul>
                    <li>Delivery charges in Sri Lanka are influenced by various factors:</li>
                    <ul>
                        <li>Distance between seller and delivery destination.</li>
                        <li>Chosen delivery service provider.</li>
                        <li>Weight and size of the package.</li>
                    </ul>
                    <li>Urban and rural areas may have different charges.</li>
                    <li>Express delivery options often come at a higher cost than standard services.</li>
                    <li>Goods type, delivery speed, and promotions can impact charges.</li>
                    <li>Review delivery policies to understand total cost, including customs duties for international shipments.</li>
                    <li>Transparent pricing ensures customers have clear information before completing online purchases.</li>
                    <li>Prices may vary during peak periods such as holidays.</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row justify-content-evenly mb-3">

        <!-- Billing address and shipping address -->
        <div class="col-md-8 border p-2 bg-light rounded shadow  ">
            <div class="container p-2">
                <?php
                $select_user_details_querry = "SELECT * FROM `user_table` WHERE User_ID= $user_id ";
                $results_user = mysqli_query($conn, $select_user_details_querry);
                while ($user_details_array = mysqli_fetch_array($results_user)) {
                    $currentusername = $user_details_array['User_Name'];
                    $currentuseraddress = $user_details_array['User_Address'];
                    $currentusermobilenumber = $user_details_array['User_MobilePhone'];
                    $currentuseremailaddress = $user_details_array['User_Email'];
                    $currentuserphonenumber = $user_details_array['User_MobilePhone'];
                    // echo $username;
                }
                ?>

                <form method="POST">
                    <h2>Order Information</h2>
                    <!-- Billing Address -->
                    <div class="form-group mb-3">
                        <label for="billingAddress">Billing Address-Default address of current user</label>
                        <input class="form-control" id="billingAddress" name="billingAddress" rows="3" placeholder="Enter billing address" value="<?php echo $currentuseraddress ?>" readonly></input>
                    </div>

                    <!-- Delivery Address -->
                    <div class="form-group mb-3">
                        <label for="deliveryAddress">Delivery Address-Where to deliver? can be edited</label>
                        <input class="form-control" id="deliveryAddress" name="deliveryAddress" rows="3" placeholder="Enter delivery address" value="<?php echo $currentuseraddress ?>"></input>
                    </div>

                    <!-- Payment Method -->
                    <div class="form-group mb-3">
                        <label for="paymentMethod">Payment Method-In this stage ,We only accept Cash on Delivery.</label>
                        <select class="form-control" id="paymentMethod" name="product_payment_method">
                            <option>Cash on Delivery</option>
                            <option disabled>Online payment</option>

                        </select>
                    </div>

                    <!-- Email Address -->
                    <div class="form-group mb-3">
                        <label for="emailAddress">Email Address</label>
                        <input type="email" class="form-control" id="emailAddress" placeholder="Enter email" value="<?php echo $currentuseremailaddress ?>" readonly>
                    </div>

                    <!-- whatsup contact details -->
                    <div class="form-group mb-3">
                        <label for="contactnumber">Contact phone number/whatsup account</label>
                        <input type="phonenumber" class="form-control" id="contactnumber" placeholder="Enter your contact number +947XXXXXXX" value="<?php echo $currentuserphonenumber ?>" readonly>
                    </div>

                    <!-- invoice number -->
                    <div class="form-group mb-3">
                        <label for="Invoiceid" class="form-label">Invoice Number:</label>
                        <input type="text" class="form-control" id="Invoiceid" required value="<?php echo $invoicenumber = mt_rand(); ?>" readonly>
                    </div>

                    <!-- Total price -->
                    <div class="form-group mb-3">
                        <label for="itemTotal" class="form-label">Total price for available items-Rs.</label>
                        <input type="text" class="form-control" id="itemTotal" required value="<?php echo number_format($Total_cart_price, 2) ?>" readonly>
                    </div>

                    <!-- Delivery fee -->
                    <div class="form-group mb-3">
                        <label for="deliveryFee" class="form-label">Delivery Fee-Rs.250.00- Rs.350.00</label>
                        <input type="number" class="form-control" id="deliveryFee" value="350.00" readonly>
                    </div>

                    <!-- Total payment -->
                    <div class="mb-3">
                        <label for="totalPayment" class="form-label">Total Payment</label>
                        <input type="text" class="form-control" id="totalPayment" value="<?php echo number_format(($Total_cart_price + 350.00), 2); ?>" readonly>
                    </div>

                    <!-- Total product quentity -->
                    <div class="mb-3">
                        <label for="totalitemQuentity" class="form-label">Available product quentity in order</label>
                        <input type="text" class="form-control" id="totalitemQuentity" value="<?php echo number_format(($data_row_count), 0); ?>" readonly>
                    </div>


                    <div class="text-muted mb-3">VAT included where applicable and Delivery charges can be change according to weight and the distance.</div>

                    <!-- confirm order button -->
                    <div class="d-grid mb-2">
                        <button type="submit" name="confirm_order_button" id="confirmorderbutton" class="btn btn-danger">Confirm Order</button>


                    </div>


                </form>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="col-md-3 border shadow p-2 ">
            <div class="container">
                <h2 class="mb-4">Order Summary</h2>


                <div class="mb-3">
                    <label for="Invoiceid" class="form-label">Invoice Number:</label>
                    <input type="text" class="form-control" id="Invoiceid" required value="<?php echo $invoicenumber ?>" readonly>
                </div>

                <div class="mb-3">
                    <label for="itemTotal" class="form-label">Item Total-Rs.</label>
                    <input type="text" class="form-control" id="itemTotal" required value="<?php echo number_format($Total_cart_price, 2) ?>" readonly>
                </div>

                <div class="mb-3">
                    <label for="deliveryFee" class="form-label">Delivery Fee-Rs.250.00- Rs.350.00</label>
                    <input type="number" class="form-control" id="deliveryFee" value="350.00" readonly>
                </div>

                <div class="mb-3">
                    <label for="deliveryDiscount" class="form-label">Delivery Discount-Rs.</label>
                    <input type="number" class="form-control" id="deliveryDiscount" value="0.00" readonly>
                </div>

                <div class="mb-3">
                    <label for="totalPayment" class="form-label">Total Payment</label>
                    <input type="text" class="form-control" id="totalPayment" value="<?php echo number_format(($Total_cart_price + 350.00), 2); ?>" readonly>
                </div>









            </div>
        </div>

    </div>



</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_order_button'])) {
    echo "<script>console.log('Inside function');</script>";
   
    echo "<script>console.log('Invoice number is $invoicenumber');</script>";
    $product_status = "Cash on delivery";
    $product_payment_method = $_POST['product_payment_method'];
    $order_billing_address = $_POST['billingAddress'];
    $order_delivery_address = $_POST['deliveryAddress'];
    echo "<script>console.log('product payment method is $product_payment_method');</script>";
    echo "<script>console.log('product status is $product_status');</script>";
    echo "<script>console.log('product amount is $Total_cart_price');</script>";
    echo "<script>console.log('Order billing address  is $order_billing_address');</script>";
    echo "<script>console.log('Order delivering address  is $order_delivery_address');</script>";


    //insert order as a user orders
    $insert_order_querry = "INSERT INTO `user_order`(user_id, total_amount, invoice_number, total_ordered_products, order_date, order_status, payment_method, billing_address, delivery_address) VALUES ($user_id,$Total_cart_price,$invoicenumber,$data_row_count,NOW(),'$product_status','$product_payment_method','$order_billing_address','$order_delivery_address')";
    if (mysqli_query($conn, $insert_order_querry)) {
        echo "<script>alert('Order is successfully submitted ,you will be contact from our staff.');</script>";
        echo "<script>console.log('insert data into user order table')</script>";
    }

    //get all available product id and quenties from cart table
    $select_carts_querry1 = "SELECT * FROM `cart_details` WHERE  User_IPaddress='$user_ip_address'";
    $results_carts1 = mysqli_query($conn, $select_carts_querry1);
    //$order_id = mt_rand();

    while($cart_details1_array=mysqli_fetch_array($results_carts1)){
        $cart_product_id=$cart_details1_array['Product_Id'];
        $cart_product_quentity=$cart_details1_array['Product_Quentity'];

        echo "<script>console.log('selected product id is $cart_product_id and quantity is $cart_product_quentity');</script>";
        
        //Insert order as a pending order
       // INSERT INTO `pending_orders`(`order_id`, `user_id`, `invoice_number`, `product_id`, `product_quentity`, `order_status`)
    $insert_pending_order = "INSERT INTO `pending_orders`(user_id,invoice_number,product_id, product_quentity, order_status) VALUES( $user_id,$invoicenumber,$cart_product_id,$cart_product_quentity,'$product_status')";
    $result_pending_orders = mysqli_query($conn, $insert_pending_order);

    echo "<script>alert('Order is saved in pending list');</script>";
    echo "<script>console.log('insert data into pending orders table')</script>";
    }

    


    //    //Delete cart detail from the cart details
    $delete_cart_querry = "DELETE  FROM `cart_details` WHERE User_IPaddress='$user_ip_address'";
    $result_delete_cart = mysqli_query($conn, $delete_cart_querry);

    echo "<script>alert('Order is delete from cart details');</script>";
    echo "<script>console.log('Delete data from cart table')</script>";
    echo "<script>window.open('user_profile.php','_self')</script>";
}
?>