<?php
// 1. Access user ID and user details (assuming '../includes/connection.php' establishes the database connection)
include('../includes/connection.php');

?>

<h1 class="text-center">All Invoices</h1>

<table class="table table-bordered mt-5 ml-3 text-center border shadow">
    <thead>  <tr>
            <th>Serial Number</th>
            <th>Invoice Number</th>
            <th>Total Products</th>
            <th>Total Price</th>
            <th>Date</th>
            <th>User Name</th>
            <th>User Contact number</th>
            <th>Order Payment Status</th>
            <th>Order Shipment Status</th>
            <th>Mark as Shipment Complete</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $select_user_orders_query = "SELECT uo.*, ut.User_Name, ut.User_MobilePhone
                                     FROM user_order uo
                                     INNER JOIN user_table ut ON uo.user_id = ut.User_ID
                                     ORDER BY order_date";
        $user_orders_result = mysqli_query($conn, $select_user_orders_query);

        if (!$user_orders_result) {
            echo "Error: " . mysqli_error($conn);
            exit();  }

        $user_order_serial_number = 1;

        while ($user_orders_array = mysqli_fetch_assoc($user_orders_result)) {
            $user_order_id = $user_orders_array['order_id'];
            $user_order_invoice_number = $user_orders_array['invoice_number'];
            $user_order_total_ordered_products = $user_orders_array['total_ordered_products'];
            $user_order_total_price = number_format($user_orders_array['total_amount'], 2);
            $user_order_date = $user_orders_array['order_date'];
            $user_order_status = $user_orders_array['order_status'];
            $user_order_shipping_status = $user_orders_array['order_shipment_status'];
            $order_user_id = $user_orders_array['user_id'];
            $user_details_user_name = $user_orders_array['User_Name']; 
            $user_details_user_contact_number = $user_orders_array['User_MobilePhone'];
            $order_status_display = ($user_order_status == "Cash on delivery") ? "Cash on delivery" : "Online payment-complete payment";

          echo "
        <tr>
         <td>$user_order_serial_number</td>
         <td>$user_order_invoice_number</td>
         <td>$user_order_total_ordered_products</td>
         <td>$user_order_total_price</td>
         <td>$user_order_date</td>
         <td>$user_details_user_name</td>
         <td>$user_details_user_contact_number</td>
         <td>$order_status_display</td>
         <td>$user_order_shipping_status</td>
         <td>";

          if ($user_order_shipping_status == 'Shipped') {
            echo "<a href='maindashboard.php' class='bg-success p-2 text-white'>Already Shipped</a>";

          } else {
            echo "<a href='maindashboard.php?invoice_number_id=$user_order_invoice_number&user_id=$order_user_id'>Mark as Shipped</a>";
          }

          echo "</td></tr>";


            $user_order_serial_number++;
        }

        mysqli_close($conn);  ?>

    </tbody>
</table>
