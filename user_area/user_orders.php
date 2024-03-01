<?php
//1.access user id and user details 
$username = $_SESSION['username'];
$get_user_details_querry = "SELECT * FROM `user_table` WHERE User_Name='$username'";
$user_details_results = mysqli_query($conn, $get_user_details_querry);
$user_details = mysqli_fetch_assoc($user_details_results);
$current_user_id = $user_details['User_ID'];
?>

<h1 class="text-center">Hello <?php echo $user_details['User_Name'] ?> ,Here are your orders.</h1>

<table class="table table-bordered mt-5 ml-3 text-center border shadow">
  <thead>
    <tr>
      <th>Serial Number</th>
      <th>Invoice Number</th>
      <th>Total products</th>
      <th>Total price</th>
      <th>Date</th>
      <th>Order payment status</th>
      <th>Order shippment status</th>
      <th>Pay Online</th>
    </tr>
  </thead>

  <tbody class="text-center">
    <?php
    $select_user_orders_querry = "SELECT * FROM `user_order` WHERE user_id=$current_user_id";
    $user_details_result = mysqli_query($conn, $select_user_orders_querry);
    $user_order_serial_number = 1;


    while ($user_orders_array = mysqli_fetch_assoc($user_details_result)) {
      $user_order_id = $user_orders_array['order_id'];
      $user_order_invoice_numebr = $user_orders_array['invoice_number'];
      $user_order_total_ordered_products = $user_orders_array['total_ordered_products'];
      $user_order_total_price = number_format($user_orders_array['total_amount'], 2);
      $user_order_date = $user_orders_array['order_date'];
      $user_order_status = $user_orders_array['order_status'];
      $user_order_shipping_status = $user_orders_array['order_shipment_status'];

      if ($user_order_status == "Cash on delivery") {
        //echo "<script>console.log('current order status is cash on delivery')</script>";
        $user_order_status = "Cash on delivery";
      } else {
        $user_order_status = "Online payment-complete payment";
      }


      echo "
            <tr>
            <td>$user_order_serial_number</td>
            <td>$user_order_invoice_numebr</td>
            <td>$user_order_total_ordered_products</td>
            <td>$user_order_total_price</td>
            <td>$user_order_date</td>
            <td>$user_order_status</td>
            <td>$user_order_shipping_status</td> 
            ";



      if ($user_order_status == 'Online payment-complete payment') {
        echo " <td>Online paid</td>";
      } else {
        // echo "<td><a href='confirm_online_payment.php?order_id=$user_order_id' >Pay online</a></td> </tr>";
        echo "<td><a href='confirm_online_payment.php?order_id=$user_order_id' style='pointer-events: none; cursor: not-allowed;' class='bg-success p-2 text-white' >Pay online</a></td> </tr>";
      }

      // End of the table row
      echo "</tr>";

      //echo "<script>console.log('end of the while loop')</script>";

      //serial number
      $user_order_serial_number++;
    }

    ?>


  </tbody>
</table>