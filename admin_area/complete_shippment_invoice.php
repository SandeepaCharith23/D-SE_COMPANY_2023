<?php
include('../includes/connection.php');
if (isset($_GET['invoice_number_id']) && isset($_GET['user_id'])) {
    $selected_invoice_number = $_GET['invoice_number_id'];
    $selected_invoice_holder_id = $_GET['user_id'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <h2>Marked invoice as Shipped invoice.</h2>

    <div class="container mt-5 border p-2 border shadow">
        <h2>Invoice Management</h2>

        <!-- 1.product invoice number-->
        <div class="form-outline mb-2 w-50 m-auto mt-4">
            <label for="prouctinvoicenumber" class="form-label">Invoice Number:</label>
            <input type="text" class="form-control mb-4" name="productInvoiceNumber" id="prouctinvoicenumber" autocomplete="OFF" value="<?php echo $selected_invoice_number  ?>" readonly required>
        </div>

        <!-- 2.product invoice number-->
        <div class="form-outline mb-4 w-50 m-auto mt-4">
            <label for="invoice_holder_name" class="form-label ">Invoice holder name:</label>
            <input type="text" class="form-control mb-4" name="invoice_holder_name" id="invoice_holder_name" autocomplete="OFF" value="<?php echo $selected_invoice_holder_id ?>" readonly>
        </div>

        <?php
        $select_invoice_details_querry="SELECT * FROM `user_order` WHERE invoice_number='$selected_invoice_number' AND user_id=$selected_invoice_holder_id";
        $invoice_details_array=mysqli_fetch_array(mysqli_query($conn,$select_invoice_details_querry));
        $invoice_amount=$invoice_details_array['total_amount'];
        $invoice_amount_formatted=number_format($invoice_amount,2);
        $invoice_total_products_count=$invoice_details_array['total_ordered_products'];
        $invoice_date=$invoice_details_array['order_date'];

        ?>
        
        <!-- 3.product invoice amount-->
        <div class="form-outline mb-4 mt-4 w-50 m-auto ">
            <label for="invoice_total_amount" class="form-label ">Invoice Total amount:</label>
            <input type="text" class="form-control mb-4" name="invoice_total_amount" id="invoice_total_amount" autocomplete="OFF" value="<?php echo  $invoice_amount_formatted?>" readonly>
        </div>

          <!-- 4.Invoice total product count-->
          <div class="form-outline mb-4 w-50 m-auto mt-4">
            <label for="invoice_total_product_count" class="form-label ">Total products in this invoice:</label>
            <input type="text" class="form-control mb-4" name="invoice_total_product_count" id="invoice_total_product_count" autocomplete="OFF" value="<?php echo  $invoice_total_products_count?>" readonly>
        </div>

        

        <!-- Trigger for  shipped Confirmation  Modal -->
        <button type="button" class="btn btn-danger mt-4" data-toggle="modal" data-target="#confirmshippmentinvoice">
            Mark invoice as a Shipped /Completed one.
        </button>

        <!-- Trigger for Dismiss ship Confirmation Modal -->
        <button type="button" class="btn btn-warning mt-4" data-toggle="modal" data-target="#dismissconfirmation">
            Back
        </button>
    </div>


    <!-- Confirmation shippment Modal -->
    <div class="modal" id="confirmshippmentinvoice">

        <form action="" method="POST">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Shipment Confirmation</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        Are you sure you mark this invoice as a shipped invoice?
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" name="confirm_shipment_button">Confirm</button>
                    </div>

                </div>
            </div>

        </form>
    </div>

    <!--Dismiss confirmation Modal -->
    <div class="modal" id="dismissconfirmation">
        <form action="" method="POST">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Dismiss Confirmation</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        Are you sure you want to discard changes?
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-warning">Discard changes</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
</body>

</html>

<?php
if(isset($_POST['confirm_shipment_button'])){
 echo "<script>console.log('confirm_shipment_button cliked')</script>";

 $update_user_order_querry="UPDATE `user_order` SET order_shipment_status='Shipped' WHERE user_id=$selected_invoice_holder_id AND invoice_number='$selected_invoice_number'";
 if(mysqli_query($conn,$update_user_order_querry))
 {
    echo "<script>alert('Successfully updated invoice details.')</script>";
    echo "<script>window.open('maindashboard.php?invoice_details', '_self');</script>";
 }

}

?>