<?php

include('../includes/connection.php');

if (isset($_GET['edit_selected_brand_id'])) {
    $selected_brand_id = $_GET['edit_selected_brand_id'];
    echo "<script>console.log('selected brand id is $selected_brand_id')</script>";

    $selected_brand_details_querry="SELECT * FROM `product_brands` WHERE Brand_ID=$selected_brand_id";
    $selected_brand_result=mysqli_query($conn,$selected_brand_details_querry);

    if($selected_brand_array=mysqli_fetch_array($selected_brand_result))
    {
        $brand_name=$selected_brand_array['Brand_Name'];
        $brand_description=$selected_brand_array['Brand_Description'];
    }

}


?>


<form action="" method="POST" class="form_style01 m-auto">

    <div class="form_heading">
        <h3>Update brand details</h3> <span class="close-button" id="close-button" onclick="closeform()"> <i class="fa fa-close"></i></span>
    </div>
    <!-- 1.product Brand name -->
    <div class="mb-4">
        <label for="prouctBrandName" class="form-label">Edit your product Brand :</label>
        <input type="text" class="form-control" id="prouctBrandName" aria-describedby="productBrandNamedescription" name="prouct_barnd_name"  value="<?php echo $brand_name?>" required>
        <div id="productBrandNamedescription" class="form-text">Product Brand Name-must be clear and Easily understand</div>
    </div>

    <!-- 2.Product Brand Description -->
    <div class="mb-4">
        <label for="prouctBrandDescription" class="form-label">Edit your product Brand Description:</label>
        <input type="textarea" class="form-control" id="prouctBrandDescription" aria-describedby="productBranddescription" name="product_brand_description" value="<?php echo $brand_description?>" required>
        <div id="productBranddescription" class="form-text">Product Brand description-must be clear and Easily understand</div>
    </div>

    <div class="input-group  mb-2 m-auto">
        <input type="submit" class="form-control bg-info" name="insert_brand_button" value="Update Brand">
    </div>

</form>

<script>
    function closeform() {
        // Get the form element by its class or ID
        var form = document.querySelector('.form_style01');
        // Hide the form by changing its style/display property
        form.style.display = 'none';
        window.location.href = "maindashboard.php";
    };
</script>

<?php
if(isset($_POST['insert_brand_button']))
{
    echo "<script>console.log('insert_brand_button clicked')</script>";

    $updated_brand_name=$_POST['prouct_barnd_name'];
    $updated_brand_description=$_POST['product_brand_description'];

    $update_brand_querry="UPDATE `product_brands` SET Brand_Name='$updated_brand_name',Brand_Description='$updated_brand_description' WHERE Brand_ID=$selected_brand_id";
    if( mysqli_query($conn,$update_brand_querry))
    {
        echo "<script>alert('Successfully updated brand details.')</script>";
        echo "<script>window.open('maindashboard.php?edit_brands','_self')</script>";
    }
}

?>