<?php

include('../includes/connection.php');
 if (
    isset($_GET['user_id']) &&
    isset($_GET['order_invoice_number']) &&
    isset($_GET['product_id'])
  ) {
    $selected_product_user_id=$_GET['user_id'];
    $selected_product_invoice_number=$_GET['order_invoice_number'];
    $selected_product_id=$_GET['product_id'];

    echo "<script>console.log('userid : $selected_product_user_id')</script>";
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
    <h5>Complete shippement</h5>

    <!--Product shippment complete example-->
    <div class=" border p-2 mt-3 mb-3">
        <h1 class="text-center">Product Shippment details</h1>

        <!-- add a product form -->

        <div class="border p-4 mt-3 mb-3">
            <form action="" method="POST" enctype="multipart/form-data" class="mt-3  mb-3 add_product_form">
                <?php
                $select_invoice_details="SELECT * FROM `user_order` WHERE invoice_number=$selected_product_invoice_number";
                $invoice_details_array=mysqli_fetch_array(mysqli_query($conn,$select_invoice_details));
                $product_invoice_total_amount=$invoice_details_array['total_amount'];
                $product_invoice_total_amount_formatted=number_format($product_invoice_total_amount,2);
                
                ?>
            
                <!-- 1.product invoice number-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="prouctinvoicenumber" class="form-label">Invoice Number:</label>
                    <input type="text" class="form-control" name="productInvoiceNumber" id="prouctinvoicenumber"   autocomplete="OFF" value="<?php echo $selected_product_invoice_number ?>" readonly required>    
                </div> 
                
                <!-- 2.product invoice Total-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="productinvoicetotal" class="form-label">Total Invoice Amount:</label>
                    <input type="text" class="form-control" name="productinvoicetotal" id="productinvoicetotal"   autocomplete="OFF" value="<?php echo $product_invoice_total_amount_formatted  ?>" readonly required>    
                </div> 

                <?php
                $select_user_details="SELECT * FROM `user_table` WHERE User_ID=$selected_product_user_id";
                $user_details_array=mysqli_fetch_array(mysqli_query($conn,$select_user_details));
                $product_ordered_person_name=$user_details_array['User_Name'];
                $product_ordered_person_address=$user_details_array['User_Address'];
                $product_ordered_person_mobile_number=$user_details_array['User_MobilePhone'];
                $product_ordered_person_address_province=$user_details_array['User_Province'];
                $product_ordered_person_address_district=$user_details_array['User_District'];
                $product_ordered_person_address_city=$user_details_array['User_City'];
                $product_ordered_person_address_postalcode=$user_details_array['User_PostalCode'];
                
                ?>

               <!-- 3.product ordered person name -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="prouctName" class="form-label">Ordered person Name:</label>
                    <input type="text" class="form-control" name="productName" id="productName"   autocomplete="OFF" value="<?php echo $product_ordered_person_name ?>" readonly required>    
                </div>

                <!-- 4.product ordered person Contact address -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="productorderedpersoncontactaddress" class="form-label">Ordered person Contact address details:</label>
                    <input type="text" class="form-control" name="productorderedpersoncontactaddress" id="productorderedpersoncontactaddress"   autocomplete="OFF" value="<?php echo $product_ordered_person_address.' *  Province: ' .$product_ordered_person_address_province. ' *  District: '.$product_ordered_person_address_district .' *  City: '.$product_ordered_person_address_city .' * Postal code: '.$product_ordered_person_address_postalcode?>" readonly required>    
                </div>

                <!-- 5.product ordered person Contact number -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="productorderedpersoncontactNumber" class="form-label">Ordered person Contact Number:</label>
                    <input type="text" class="form-control" name="productorderedpersoncontactNumber" id="productorderedpersoncontactNumber"   autocomplete="OFF" value="<?php echo $product_ordered_person_mobile_number ?>" readonly required>    
                </div>

                <?php
                $select_product_details="SELECT * FROM `products` WHERE Product_ID=$selected_product_id";
                $product_details_array=mysqli_fetch_array(mysqli_query($conn,$select_product_details));
                $product_name=$product_details_array['Product_Name'];
                $product_unit_price=$product_details_array['Product_UnitPrice'];
                $product_image=$product_details_array['Product_Image01'];
                
                ?>

                <!-- 6.product name -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="productid" class="form-label">Product id :</label>
                    <input type="text" class="form-control" name="productid" id="productid"   autocomplete="OFF" value="<?php echo $selected_product_id?>" readonly required>    
                </div>

                <!-- 6.product name -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="prouctName" class="form-label">Product name :</label>
                    <input type="text" class="form-control" name="productName" id="productName"   autocomplete="OFF" value="<?php echo $product_name?>" readonly required>    
                </div>

                <!-- 7.product Image -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="productImage" class="form-label">Product Image:</label>
                    <img src="../product_images/<?php echo $product_image?>" style="width: 100px;height: 100px;">    
                </div>

                <?php
                $select_product_cart_details="SELECT * FROM `pending_orders` WHERE product_id=$selected_product_id && invoice_number=$selected_product_invoice_number";
                $product_cart_details_array=mysqli_fetch_array(mysqli_query($conn,$select_product_cart_details));
                $product_ordered_quentity=$product_cart_details_array['product_quentity'];
                
                
                ?>

                <!-- 8.product Quentity -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="prouctName" class="form-label">Ordered product quentity:</label>
                    <input type="text" class="form-control" name="productQuentity" id="productQuentity"   autocomplete="OFF" value="<?php echo $product_ordered_quentity ?>" readonly required>    
                </div>

                 <!-- 9.product Quentity -->
                 <div class="form-outline mb-4 w-50 m-auto">
                    <label for="prouctName" class="form-label">Ordered product unit price:</label>
                    <input type="text" class="form-control" name="productUnitprice" id="productUnitprice"   autocomplete="OFF" value="<?php echo $product_unit_price ?>" readonly required>    
                </div>

               

                <!-- product Shippment button -->
                <div class="form-outline mb-4 w-50 m-auto  text-center">

                    <button type="submit" name="product_shippment_button" id="product_shippment_button" class="btn btn-primary col-6 mx-auto">Confirm Shippment</button>
                </div>





            </form>
        </div>



    </div>
</body>
</html>

<?php
if(isset($_POST['product_shippment_button'])){
    echo "<script>console.log('Button Clicked')</script>";

    $update_pending_order_querry="UPDATE `pending_orders` SET order_shipment_status='Shipped' WHERE user_id=$selected_product_user_id && invoice_number=$selected_product_invoice_number && product_id=$selected_product_id";
    if(mysqli_query($conn,$update_pending_order_querry))
    {
        echo "<script>alert('Successfully marked item as a Shipped Item,This product order will be display on completed orders section')</script>";
        echo "<script>window.open('maindashboard.php?completed_orders', '_self');</script>";

    }
}

?>