<?php
include('../includes/connection.php');

if (isset($_GET['selected_invoice_id'])) {
    $selected_invoice_id = $_GET['selected_invoice_id'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2 class="text-center text-success">Selected Invoice details</h2>
    <table class="table table-bordered mt-2 text-center">
        <thead class="bg-info">
            <tr>
                <th>Serial number</th>
                <th>Product Name</th>
                <th>Product Image</th>
                <th>Product Quentity</th>
                <th>Product Unitprice</th>
                <th>Product SubTotal</th>

        <tbody>
            <?php
            $get_pending_orders_querry = "SELECT * FROM `pending_orders` WHERE  invoice_number=$selected_invoice_id";
            $results_pending_orders = mysqli_query($conn, $get_pending_orders_querry);
            $serial_number = 1;
            while ($pending_orders_array = mysqli_fetch_array($results_pending_orders)) {
                $pending_order_id = $pending_orders_array['order_id'];
                $pending_order_user_id = $pending_orders_array['user_id'];
                $pending_order_invoice_number = $pending_orders_array['invoice_number'];
                $pending_order_product_id = $pending_orders_array['product_id'];
                $pending_order_product_quentity = $pending_orders_array['product_quentity'];
                $pending_order_status = $pending_orders_array['order_status'];
                $pending_order_shippment_status = $pending_orders_array['order_shipment_status'];

                //get invoice details
                $select_invoice_details_querry = "SELECT * FROM `user_order` WHERE invoice_number=$pending_order_invoice_number";
                $select_invoice_details_array = mysqli_fetch_array(mysqli_query($conn, $select_invoice_details_querry));

                $pending_order_invoice_total_amount = $select_invoice_details_array['total_amount'];
                $pending_order_online_payment_status = $select_invoice_details_array['order_status'];
                $pending_order_invoice_total_amount_formatted = number_format($pending_order_invoice_total_amount, 2);

                //get the product details
                $select_product_details_querry = "SELECT * FROM `products` WHERE Product_ID=$pending_order_product_id";
                $select_product_details_array = mysqli_fetch_array(mysqli_query($conn, $select_product_details_querry));

                $pending_order_product_name = $select_product_details_array['Product_Name'];
                $pending_order_product_unit_price = $select_product_details_array['Product_UnitPrice'];
                $pending_order_product_image = $select_product_details_array['Product_Image01'];
                $pending_order_product_sub_total = $pending_order_product_quentity * $pending_order_product_unit_price;
                $pending_order_product_sub_total_formatted = number_format($pending_order_product_sub_total, 2);

                //get the user details
                $selected_user_details_querry = "SELECT * FROM `user_table` WHERE User_ID=$pending_order_user_id";
                $select_user_details_array = mysqli_fetch_array(mysqli_query($conn, $selected_user_details_querry));

                $pending_order_user_name = $select_user_details_array['User_Name'];
                $pending_order_user_contact_number = $select_user_details_array['User_MobilePhone'];
                $pending_order_user_address = $select_user_details_array['User_Address'];

                echo "
                    <tr>
                    <td>$serial_number</td>
                    <td>$pending_order_product_name</td>
                    <td><img src='../product_images/$pending_order_product_image' style='width:50px;height:50px;'></td>
                    <td>$pending_order_product_quentity</td>
                    <td>$pending_order_product_unit_price</td>
                    <td>$pending_order_product_sub_total_formatted</td>
                   
                </tr>";

                $serial_number++;
            }

            ?>


        </tbody>
        </tr>
        </thead>
    </table>

    <div class="conatiner border p-2 shadow">
         <p>
            <ul>
                <li>Invoice Number: <?php echo $pending_order_invoice_number ?></li>
                <li>Invoice total Amount-Rs <?php echo $pending_order_invoice_total_amount_formatted ?></li>
                <li>Order current status: <?php echo $pending_order_shippment_status ?></li>
            </ul>
         </p>
    </div>

</body>

</html>