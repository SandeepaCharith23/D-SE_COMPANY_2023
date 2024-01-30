<?php

// function to remove item
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
};

//invoke function
//echo $remove_item = remove_item_fromcart();
?>