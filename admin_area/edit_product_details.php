<?php
include('../includes/connection.php');

if (isset($_GET['edit_product'])) {
    //echo "<script>console.log('Got a Product')</script>";
    $selceted_product_id = $_GET['edit_product'];
    //echo "<script>console.log('Product id is $selceted_product_id')</script>";


    //select product details from database
    $selected_product_details_querry = "SELECT * FROM `products` WHERE Product_ID=$selceted_product_id";
    $selected_product_details_array = mysqli_fetch_array(mysqli_query($conn, $selected_product_details_querry));

    $selected_product_name = $selected_product_details_array['Product_Name'];
    $selected_product_key_words = $selected_product_details_array['Product_Keyword'];
    $selected_product_description = $selected_product_details_array['Product_Description'];
    $selected_product_brand_id = $selected_product_details_array['Brand_ID'];
    $selected_product_category_id = $selected_product_details_array['Category_ID'];
    $selected_product_initial_quentity = $selected_product_details_array['Product_Quentity'];
    $selected_product_unit_price = $selected_product_details_array['Product_UnitPrice'];
    $selected_product_image01 = $selected_product_details_array['Product_Image01'];
    $selected_product_image02 = $selected_product_details_array['Product_Image02'];
    $selected_product_image03 = $selected_product_details_array['Product_Image03'];
    $selected_product_image04 = $selected_product_details_array['Product_Image04'];
    $selected_product_status = $selected_product_details_array['Product_Status'];


    //set values to textfileds.
    // echo "<script>console.log('product name is $selected_product_name')</script>";
}





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- link font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link rel="stylesheet" href="../css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<style>
    .edit_image {
        width: 100px;
        height: 100px;
        border: 2px solid #000;
        padding: auto;
        margin: auto;
    }
</style>

<body>
    <h2 class="text-center">Edit product details.</h2>


    <!--Add new product form example-->
    <div class=" border p-2 mt-3 mb-3">
        <h1 class="text-center">Update selected Product</h1>

        <!-- add a product form -->

        <div class="border p-4 mt-3 mb-3">
            <form action="" method="POST" enctype="multipart/form-data" class="mt-3  mb-3 add_product_form">
                <!-- 1.product name -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="prouctName" class="form-label">Enter your product name :</label>
                    <input type="text" class="form-control" name="productName" id="productName" aria-describedby="productNamedescription" placeholder="Please Enter Product Name" autocomplete="OFF" value="<?php echo $selected_product_name ?>" required>
                    <div id="productNamedescription" class="form-text">Product Name-must be clear and Easily understand</div>
                </div>

                <!-- 2.Product Category keywords-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="prouctCategory" class="form-label">Enter your product Keywords:</label>
                    <input type="text" class="form-control" name="productkeywords" id="productkeywords" aria-describedby="productkeyworddescription" placeholder="Please Enter Product Key words" autocomplete="OFF" value="<?php echo $selected_product_key_words ?>" required>
                    <div id="productkeyworddescription" class="form-text">Product Keywords-must be clear and Easily understand</div>
                </div>

                <!-- 3.Product Category-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="prouctCategory" class="form-label">Select your product Category:</label>
                    <select name="product_category" id="prouctCategory" class="form-select">
                        <option value=''>
                            <h4>Select a product category.</h4>
                        </option>
                        <?php
                        //1.selection querry
                        $select_category_querry = "SELECT * FROM `product_categories`";

                        //2.run the querry and get the result form db
                        $results_fromdb = mysqli_query($conn, $select_category_querry);

                        //3.Fetch the returned data to UI

                        while ($returned_rowdata = mysqli_fetch_assoc($results_fromdb)) {

                            $category_name = $returned_rowdata['Category_Name'];
                            $category_id = $returned_rowdata['Category_ID'];

                            //check if the current category id matches the previously selected category id 
                            $selected = ($category_id == $selected_product_category_id) ? 'selected' : '';

                            echo "<option value='$category_id' $selected> <h4>$category_name</h4> </option>";
                        }

                        ?>
                    </select>
                </div>

                <!-- 3.Product Brand-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="prouctBrand" class="form-label">Select your product Brand:</label>
                    <select name="product_brands" id="prouctBrand" class="form-select">
                        <option value=''>
                            <h4>Select a product brand.</h4>
                        </option>
                        <?php
                        //1.selection querry
                        $select_brands_querry = "SELECT * FROM `product_brands`";

                        //2.run the querry and get the result form db
                        $results_fromdb = mysqli_query($conn, $select_brands_querry);

                        //3.Fetch the returned data to UI

                        while ($returned_rowdata = mysqli_fetch_assoc($results_fromdb)) {

                            $brand_name = $returned_rowdata['Brand_Name'];
                            $brand_id = $returned_rowdata['Brand_ID'];

                            //check if the current brand id matches the previously selected brand id 
                            $selected = ($brand_id == $selected_product_brand_id) ? 'selected' : '';

                            echo "<option value='$brand_id' $selected> <h4>$brand_name</h4> </option>";
                        }

                        ?>
                    </select>
                </div>



                <!-- 5.product Description -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="productDescriptionText">Enter details on your product </label>
                    <textarea class="form-control" name="productDescriptionText" id="productDescriptionText" rows="10" aria-describedby="productDetailsDescription" placeholder="Please Enter Product Description" autocomplete="OFF" required><?php echo $selected_product_description ?></textarea>
                    <div id="productDetailsDescription" class="form-text">Enter full description on your product</div>
                </div>



                <!-- 6.Product Quentity -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <div class="row">
                        <div class="col-auto"><label for="productQuentity" class="form-label">Enter your product Quentity</label></div>
                        <div class="col-auto">
                            <input type="number" class="form-control" name="productQuentity" id="productQuentity" aria-describedby="productQuentityDescription" value="<?php echo $selected_product_initial_quentity ?>" required>
                        </div>
                        <div class="col-auto">
                            <div id="productQuentityDescription" class="form-text">Enter your currently available product Quentity</div>
                        </div>

                    </div>
                </div>

                <!-- 7.Product Unit Price -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <div class="row">
                        <div class="col-auto"><label for="productUnitPrice" class="form-label">Enter your product Unit Price in
                                Rs.</label></div>
                        <div class="col-auto">
                            <input type="number" class="form-control" name="productUnitPrice" id="productUnitPrice" aria-describedby="productUnitPriceDescription" value="<?php echo $selected_product_unit_price ?>" required>
                        </div>
                        <div class="col-auto">
                            <div id="productUnitPriceDescription" class="form-text">Enter your Unit price of a Product</div>
                        </div>

                    </div>



                </div>

                <!-- 8.Product Images -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="imageInput" class="form-label">Select Multiple Images:</label>
                    <input type="file" class="form-control mb-1" id="image01" name="image01">
                    <div class="d-flex mb-4  m-auto">
                        <!-- Text input to display the filename -->
                        <label for="selectedFileName">The selected image name</label>
                        <input type="text" class="form-control mb-1" readonly value="<?php echo $selected_product_image01 ?>" id="selectedFileName">
                    </div>
                    <input type="file" class="form-control mb-1" id="image02" name="image02">
                    <div class="d-flex mb-4  m-auto">
                        <!-- Text input to display the filename -->
                        <label for="selectedFileName">The selected image name</label>
                        <input type="text" class="form-control mb-1" readonly value="<?php echo $selected_product_image02 ?>" id="selectedFileName">
                    </div>
                    <input type="file" class="form-control mb-1" id="image03" name="image03">
                    <div class="d-flex mb-4  m-auto">
                        <!-- Text input to display the filename -->
                        <label for="selectedFileName">The selected image name</label>
                        <input type="text" class="form-control mb-1" readonly value="<?php echo $selected_product_image03 ?>" id="selectedFileName">
                    </div>
                    <input type="file" class="form-control mb-1" id="image04" name="image04">
                    <div class="d-flex mb-4  m-auto">
                        <!-- Text input to display the filename -->
                        <label for="selectedFileName">The selected image name</label>
                        <input type="text" class="form-control mb-1" readonly value="<?php echo $selected_product_image04 ?>" id="selectedFileName">
                    </div>
                    <!-- The 'multiple' attribute allows selecting multiple files -->
                    <!-- The 'accept' attribute ensures only image files can be selected -->
                    <div>
                        <h6 class="form-label">Available Images:</h6>
                        <img src="../product_images/<?php echo $selected_product_image01 ?>" alt="" class="edit_image">
                        <img src="../product_images/<?php echo $selected_product_image02 ?>" alt="" class="edit_image">
                        <img src="../product_images/<?php echo $selected_product_image03 ?>" alt="" class="edit_image">
                        <img src="../product_images/<?php echo $selected_product_image04 ?>" alt="" class="edit_image">
                    </div>
                </div>

                <!-- 9.Product Availability -->
                <div class="form-outline mb-4 w-50 m-auto form-check form-switch">
                    <label class="form-check-label" for="productAvailability">Products are currently Availabe?</label>
                    <input class="form-check-input" type="checkbox" name="productAvailability" id="productAvailability" role="switch" <?php echo ($selected_product_status == 'active') ? 'checked' : ''; ?>>

                </div>

                <!-- 10.Product Agreement -->
                <div class="form-outline mb-4 w-50 m-auto  form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                    <label class="form-check-label" for="exampleCheck1">Agree to the conditions</label>
                </div>

                <!-- 11.product update button -->
                <div class="form-outline mb-4 w-50 m-auto  text-center">

                    <button type="submit" name="product_update_button" id="product_update_button" class="btn btn-primary col-6 mx-auto">Update product details</button>
                </div>





            </form>
        </div>



    </div>

</body>

</html>

<?php

if (isset($_POST['product_update_button'])) {
    //echo "<script>console.log('update button clicked')</script>";
    //echo "<script>console.log('update product name is $updated_product_name')</script>";

    $updated_product_name = $_POST['productName'];
    $updated_product_Keywords = $_POST['productkeywords'];
    $updated_product_Description = $_POST['productDescriptionText'];
    $updated_product_Category_ID = $_POST['product_category'];
    $updated_product_Brand_ID = $_POST['product_brands'];
    $updated_product_Quentity = $_POST['productQuentity'];
    $updated_product_UnitPrice = $_POST['productUnitPrice'];
    // $Product_Status = 'active';
    //$updated_product_Status = $_POST['productAvailability'];
    $updated_product_Status = $_POST['productAvailability'] ? 'active' : 'inactive';

    //access images-name
    $updated_product_Imagename01 = $_FILES['image01']['name'];
    $updated_product_Imagename02 = $_FILES['image02']['name'];
    $updated_product_Imagename03 = $_FILES['image03']['name'];
    $updated_product_Imagename04 = $_FILES['image04']['name'];

    //accessing images-temp names-temp path
    $updated_product_tempImage01 = $_FILES['image01']['tmp_name'];
    $updated_product_tempImage02 = $_FILES['image02']['tmp_name'];
    $updated_product_tempImage03 = $_FILES['image03']['tmp_name'];
    $updated_product_tempImage04 = $_FILES['image04']['tmp_name'];

    // Check if the file input is empty, if so, use the existing image path
    if (empty($updated_product_Imagename01)) {
        $updated_product_Imagename01 = $selected_product_image01;
    }

    if (empty($updated_product_Imagename02)) {
        $updated_product_Imagename02 = $selected_product_image02;
    }

    if (empty($updated_product_Imagename03)) {
        $updated_product_Imagename03 = $selected_product_image03;
    }

    if (empty($updated_product_Imagename04)) {
        $updated_product_Imagename04 = $selected_product_image04;
    }


    //check that all variables are not empty
    if (
        $updated_product_name == '' || $updated_product_Keywords == '' || $updated_product_Description == '' || $updated_product_Category_ID == ''
        || $updated_product_Brand_ID == '' || $updated_product_Quentity == '' || $updated_product_UnitPrice == ''
    ) {

        echo "<script>alert('Please fill the  available empty field')</script>";
        exit();
    } else {

        //1.save data into filed
        //1.1 Move uploaded /selected images to the local folder(new location) before uploading
        move_uploaded_file($updated_product_tempImage01, "../product_images/$updated_product_Imagename01");
        move_uploaded_file($updated_product_tempImage02, "../product_images/$updated_product_Imagename02");
        move_uploaded_file($updated_product_tempImage02, "../product_images/$updated_product_Imagename03");
        move_uploaded_file($updated_product_tempImage02, "../product_images/$updated_product_Imagename04");

        //1.2.create update querry 
        $update_product_query = "UPDATE `products` SET Product_Name=?, Product_Keyword=?,Category_ID=?,Brand_ID=?,Product_Description=?,Product_Quentity=?,Product_UnitPrice=?,Product_Image01=?,Product_Image02=?,Product_Image03=?,Product_Image04=?,Product_Date=NOW(),Product_Status=? WHERE Product_ID=?";
        // $result_query = mysqli_query($conn, $update_product_query);

        //avoid from sql injection
        $stmt = $conn->prepare($update_product_query);

        $stmt->bind_param(
            'ssiisidsssssi',
            $updated_product_name,
            $updated_product_Keywords,
            $updated_product_Category_ID,
            $updated_product_Brand_ID,
            $updated_product_Description,
            $updated_product_Quentity,
            $updated_product_UnitPrice,
            $updated_product_Imagename01,
            $updated_product_Imagename02,
            $updated_product_Imagename03,
            $updated_product_Imagename04,
            $updated_product_Status,
            $selceted_product_id
        );

        if ($stmt->execute()) {
            echo "<script>alert('Successfully updated Product details.')</script>";
            echo "<script>window.open('maindashboard.php','_self')</script>";
        } else {
            echo "Errors :" . $stmt->error;
        }
    }
}

?>