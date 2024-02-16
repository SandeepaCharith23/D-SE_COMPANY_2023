<?php
include('../includes/connection.php');
global $conn;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_GET['order_id'])) {
    $current_click_order_id = $_GET['order_id'];
    echo " Order Id is :$current_click_order_id";

    // Select order details
    $select_user_order_details = "SELECT * FROM `user_order` WHERE order_id=$current_click_order_id";
    $order_details_array = mysqli_fetch_array(mysqli_query($conn, $select_user_order_details));
    $current_order_total_price = number_format($order_details_array['total_amount'], 2);
    $current_order_total_price_float = floatval($order_details_array['total_amount']);
    $current_order_invoice_number = $order_details_array['invoice_number'];
    $current_order_user_id = $order_details_array['user_id'];
    $current_order_payment_mode="Online payment";
    $current_order_transaction_id=1;
    $current_order_status="Online payment";
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['confirm_payment'])) {
        echo "<script>console.log('inside confirm button')</script>";
        
        //insert data into online payment table. 
        $insert_online_payment_querry= "INSERT INTO `user_online_payments`(`payment_order_id`, `payment_invoice_number`, `payment_total_amount`, `payment_mode`, `payment_date`, `payment_user_id`, `payment_transaction_id`, `payment_status`) VALUES ($current_click_order_id ,$current_order_invoice_number ,$current_order_total_price_float,'$current_order_payment_mode',NOW(),$current_order_user_id,$current_order_transaction_id,'$current_order_status')";
        if(mysqli_query($conn,$insert_online_payment_querry)){
           // echo "<script>alert('Confirm online payment')</script>";
            echo "<h3 class='text-center'>Successfully completed the payment via online payment method.</h3>";
           // echo "<script>window.open('user_profile.php?my_orders','_self')</script>";
            echo "<script>console.log('payment completed')</script>";
        };

        //update the order status as complete in user order tabel
        $update_user_order_querry="UPDATE `user_order` SET `order_status`='online payment complete' WHERE order_id=$current_click_order_id";
        if(mysqli_query($conn,$update_user_order_querry)){
            echo "<script>alert('Successfully update user orders')</script>";
            echo "<script>window.open('user_profile.php','_self')</script>";
        }

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Payment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }

        .logo {
            width: 50px;
            height: 50px;
        }

        .payment-form {
            max-width: 600px;
            margin: auto;
        }

        .card {
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="container payment-form">
        <form action="" method="POST">
            <h2 class="text-center mb-4">Online Payment</h2>
            

            <!-- Order Summary -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Order Summary</h5>
                    <!-- Display order details here -->
                    <p>Oder invoice number: <?php echo $current_order_invoice_number ?> </p>
                    <p>Total price for order: <?php echo $current_order_total_price ?></p>
                </div>
            </div>

            <!-- Payment Methods -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Payment Methods</h5>
                    <select name="payment_mode" required>
                        <option value="">Select payment Mode</option>
                        <option value="Paypal">Paypal</option>
                        <option value="ApplePay">Apple pay</option>
                        <option value="GooglePay">Google pay</option>
                        <option value="VisaCard">Visa card</option>
                        <option value="MasterCard">Master card</option>
                    </select>
                </div>
            </div>

            <!-- Promo Codes / Vouchers -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Promo Codes / Vouchers</h5>

                    <div class="form-group">
                        <label for="promoCode">Enter Promo Code:</label>
                        <input type="text" class="form-control" id="promoCode" placeholder="Enter code">
                    </div>
                    <button type="submit" class="btn btn-primary">Apply</button>

                </div>
            </div>

            <!-- Terms and Conditions -->
            <div class="form-check mb-4">
                <input type="checkbox" class="form-check-input" id="agreeTerms" required>
                <label class="form-check-label" for="agreeTerms">I agree to the <a href="#">Terms and Conditions</a></label>
            </div>


            <!-- Payment Button -->
            <button type="submit" class="btn btn-success btn-block" name="confirm_payment">Confirm Payment</button>

        </form>
    </div>



</body>

</html>