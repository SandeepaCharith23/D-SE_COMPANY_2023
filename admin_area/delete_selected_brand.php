<?php
include('../includes/connection.php');

if (isset($_GET['delete_selected_brand_id'])) {

    $selected_product_brand_id = $_GET['delete_selected_brand_id'];
    echo "<script>console.log('selected product category  id is  $selected_product_brand_id')</script>";
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="text-center container mt-5 border p-2 shadow">
        <h2>Product Brand Management</h2>

        <!-- Trigger for Delete Confirmation Modal -->
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteConfirmationModal">
            Delete Product Brand
        </button>

        <!-- Trigger for Deactivate Confirmation Modal -->
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#deactivateConfirmationModal">
            Deactivate Product Brand
        </button>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal" id="deleteConfirmationModal">

        <form action="" method="POST">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Confirmation</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        Are you sure you want to delete the selected product brand?
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" name="delete_product_brand_button">Delete</button>
                    </div>

                </div>
            </div>

        </form>
    </div>

    <!-- Deactivate Confirmation Modal -->
    <div class="modal" id="deactivateConfirmationModal">
        <form action="" method="POST">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Deactivate Confirmation</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        Are you sure you want to deactivate the selected product brand?
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-warning">Deactivate</button>
                    </div>

                </div>
            </div>
        </form>
    </div>



</body>

</html>

<?php

// Check if the "delete_product" button is clicked
if (isset($_POST['delete_product_brand_button'])) {
    // Output a JavaScript console log message

    $delete_product_brand_querry = "DELETE FROM `product_brands` WHERE Brand_ID=$selected_product_brand_id";

    if (mysqli_query($conn,  $delete_product_brand_querry)) {
        echo "<script>alert('Successfully delete the product brand from database.');</script>";
        echo "<script>window.open('maindashboard.php?edit_brands','_self')</script>";
    }
}

?>