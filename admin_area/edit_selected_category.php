
<?php

include('../includes/connection.php');

if (isset($_GET['edit_selected_category_id'])) {
    $selected_category_id = $_GET['edit_selected_category_id'];
    echo "<script>console.log('selected brand id is $selected_category_id')</script>";

    $selected_category_details_querry="SELECT * FROM `product_categories` WHERE  Category_ID=$selected_category_id";
    $selected_category_result=mysqli_query($conn, $selected_category_details_querry);

    if($selected_category_array=mysqli_fetch_array($selected_category_result))
    {
        $category_name=$selected_category_array['Category_Name'];
        $category_description=$selected_category_array['Category_Description'];
    }

}


?>
<form action="" method="POST" class="form_style01 m-auto">

<div class="form_heading">
    <h3>Edit Category</h3> <span class="close-button" id="form-close-button" onclick="closeform()"> <i class="fa fa-close"></i></span>

</div>
<!-- 1.product Category name -->
<div class="mb-4">
    <label for="prouctCategoryName" class="form-label">Edit your product Category name :</label>
    <input type="text" class="form-control" id="prouctCategoryName" aria-describedby="productCategoryNamedescription" name='product_category_name' value="<?php echo $category_name?>" required>
    <div id="productCategoryNamedescription" class="form-text">Product Category Name-must be clear and Easily understand</div>
</div>

<!-- 2.Product Category description -->
<div class="mb-4">
    <label for="prouctCategory" class="form-label">Edit your product Category Description:</label>
    <input type="text" class="form-control" id="prouctCategoryDes" aria-describedby="productCategorydescription" name="product_category_description" value="<?php echo htmlspecialchars($category_description)?>" required>
    <div id="productCategorydescription" class="form-text">Product Category-must be clear and Easily understand</div>
</div>

<div class="mb-2 m-auto">
    <input type="submit" class="form-control bg-info" name="update_category_button" value="Update Category">
</div>

</form>

<script>


function closeform() {
    // Get the form element by its class or ID
    var form = document.querySelector('.form_style01');
    // Hide the form by changing its style/display property
    form.style.display = 'none';
    window.location.href="maindashboard.php";
};


</script>

<?php
if(isset($_POST['update_category_button']))
{
    $updated_category_name=$_POST['product_category_name'];
    $updated_category_description=$_POST['product_category_description'];

    $update_product_category_details_querry="UPDATE `product_categories` SET Category_Name='$updated_category_name',Category_Description='$updated_category_description' WHERE Category_ID='$selected_category_id'";
    if(mysqli_query($conn,$update_product_category_details_querry))
    {
        echo "<script>alert('Successfully updated Category details.')</script>";
        echo "<script>window.open('maindashboard.php?edit_categories','_self')</script>"; 
    }
}

?>