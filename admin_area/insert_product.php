<?php
include('../includes/connection.php');

if (isset($_POST['product_save_button'])) {
    $Product_Name = $_POST['productName'];
    $Product_Keywords = $_POST['productkeywords'];
    $Product_Description = $_POST['productDescriptionText'];
    $Product_Category = $_POST['product_category'];
    $Product_Brand = $_POST['product_brands'];
    $Product_Quentity = $_POST['productQuentity'];
    $Product_UnitPrice = $_POST['productUnitPrice'];
    // $Product_Status = 'active';
    $Product_Status = $_POST['Product_Status'];

    //access images-name
    $Product_Imagename01 = $_FILES['image01']['name'];
    $Product_Imagename02 = $_FILES['image02']['name'];
    $Product_Imagename03 = $_FILES['image03']['name'];
    $Product_Imagename04 = $_FILES['image04']['name'];

    //accessing images-temp names-temp path
    $Product_tempImage01 = $_FILES['image01']['tmp_name'];
    $Product_tempImage02 = $_FILES['image02']['tmp_name'];
    $Product_tempImage03 = $_FILES['image03']['tmp_name'];
    $Product_tempImage04 = $_FILES['image04']['tmp_name'];

    //check that all variables are not empty
    if (
        $Product_Name == '' || $Product_Keywords == '' || $Product_Description == '' || $Product_Category == ''
        || $Product_Brand == '' || $Product_Quentity == '' || $Product_UnitPrice == '' || $Product_Imagename01 == ''
        || $Product_Imagename02 == '' || $Product_Imagename03 == '' || $Product_Imagename04 == ''
    ) {

        echo "<script>alert('Please fill the  available empty field')</script>";
        exit();
    } else {

        //1.save data into filed
        //1.1 Move uploaded /selected images to the local folder(new location) before uploading
        move_uploaded_file($Product_tempImage01, "../product_images/$Product_Imagename01");
        move_uploaded_file($Product_tempImage02, "../product_images/$Product_Imagename02");
        move_uploaded_file($Product_tempImage03, "../product_images/$Product_Imagename03");
        move_uploaded_file($Product_tempImage04, "../product_images/$Product_Imagename04");

        //1.2.create inser querry 
        // $Insert_product_query="INSERT INTO `products`(`Product_Name`, `Product_Keyword`, `Category_ID`, `Brand_ID`, `Product_Description`, `Product_Quentity`, `Product_UnitPrice`, `Product_Image01`, `Product_Image02`, `Product_Image03`, `Product_Image04`, `Product_Date`, `Product_Status`) 
        // VALUES ('$Product_Name',' $Product_Keywords',' $Product_Category','$Product_Brand','$Product_Description','$Product_Quentity','$Product_UnitPrice','$Product_Imagename01','$Product_Imagename02','$Product_Imagename03','$Product_Imagename04',Now(),'$Product_Status')";
        // $result_query = mysqli_query($conn, $Insert_product_query);




        //1.2 avoid form sql injection-Create querry for create insert product data
        // ... (Previous code remains unchanged)

        // Prepare the SQL statement with placeholders
        $Insert_product_query = "INSERT INTO `products` (`Product_Name`, `Product_Keyword`, `Category_ID`, `Brand_ID`, `Product_Description`, `Product_Quentity`, `Product_UnitPrice`, `Product_Image01`, `Product_Image02`, `Product_Image03`, `Product_Image04`, `Product_Date`, `Product_Status`) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?)";

        $stmt = $conn->prepare($Insert_product_query);

        // Bind parameters to the prepared statement
        $stmt->bind_param('sssssiisssss', $Product_Name, $Product_Keywords, $Product_Category, $Product_Brand, $Product_Description, $Product_Quentity, $Product_UnitPrice, $Product_Imagename01, $Product_Imagename02, $Product_Imagename03, $Product_Imagename04, $Product_Status);

        // // // Execute the prepared statement
        // $stmt->execute();

        // ... (Rest of your code)



        if ($stmt->execute()) {
            echo "<script>alert('Successfully uploaded Product data into DB')</script>";
        } else {
            echo "Errors :" . $stmt->error;
        }
    }
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

<body>
    <!--Add new product form example-->
    <div class="border p-2 mt-3 cardexample">
        <h1 class="text-center">Insert a new Product</h1>

        <!-- add a product form -->

        <div class="col-10 border p-4 m-auto">
            <form action="" method="POST" enctype="multipart/form-data" class="add_product_form">

                <!-- 1.product name -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="prouctName" class="form-label">Enter your product name :</label>
                    <input type="text" class="form-control" name="productName" id="productName" aria-describedby="productNamedescription" placeholder="Please Enter Product Name" autocomplete="OFF" required>
                    <div id="productNamedescription" class="form-text">Product Name-must be clear and Easily understand</div>
                </div>

                <!-- 2.Product Category keywords-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="prouctCategory" class="form-label">Enter your product Keywords:</label>
                    <input type="text" class="form-control" name="productkeywords" id="productkeywords" aria-describedby="productkeyworddescription" placeholder="Please Enter Product Key words" autocomplete="OFF" required>
                    <div id="productkeyworddescription" class="form-text">Product Keywords-must be clear and Easily understand</div>
                </div>

                <!-- 3.Select ProductCategory -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <div class="row">

                        <div class="col-auto">
                            <label for="productCategory" class="form-label">Enter your product Category :</label>
                        </div>
                        <div class="col-auto">


                            <select name="product_category" id="" class="form-select">
                                <option value="">Select a Product Category</option>


                                <?php
                                //1.selection querry
                                $select_category_querry = "SELECT * FROM `product_categories`";

                                //2.run the querry and get the result form db
                                $results_fromdb = mysqli_query($conn, $select_category_querry);

                                //3.Fetch the returned data to UI

                                while ($returned_rowdata = mysqli_fetch_assoc($results_fromdb)) {

                                    $category_name = $returned_rowdata['Category_Name'];
                                    $category_id = $returned_rowdata['Category_ID'];

                                    echo "<option value='$category_id'> <h4>$category_name</h4> </option>";
                                }

                                ?>

                            </select>

                        </div>
                        <div class="col-auto">
                            <div id="productCategorydescription" class="form-text">You can create a new Product Category by using admin panel</div>
                        </div>
                    </div>




                </div>


                <!-- 4.Select Product Brands -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <div class="row">

                        <div class="col-auto">
                            <label for="prouctBrand" class="form-label">Enter your product Brand :</label>
                        </div>
                        <div class="col-auto">

                            <select name="product_brands" id="" class="form-select">
                                <option value=''>
                                    <h4>Select a Product Category</h4>
                                </option>"
                                <?php
                                //1.selection querry
                                $select_brands_querry = "SELECT * FROM `product_brands`";

                                //2.run the querry and get the result form db
                                $results_fromdb = mysqli_query($conn, $select_brands_querry);

                                //3.Fetch the returned data to UI

                                while ($returned_rowdata = mysqli_fetch_assoc($results_fromdb)) {

                                    $brand_name = $returned_rowdata['Brand_Name'];
                                    $brand_id = $returned_rowdata['Brand_ID'];

                                    echo "<option value='$brand_id'> <h4>$brand_name</h4> </option>";
                                }

                                ?>


                            </select>

                        </div>
                        <div class="col-auto">
                            <div id="productBranddescription" class="form-text">You can create a new Product Brand by using admin panel</div>
                        </div>
                    </div>




                </div>



                <!-- 5.product Description -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="productDescriptionText">Enter details on your product </label>
                    <textarea class="form-control" name="productDescriptionText" id="productDescriptionText" rows="10" aria-describedby="productDetailsDescription" placeholder="Please Enter Product Description" autocomplete="OFF" required></textarea>
                    <div id="productDetailsDescription" class="form-text">Enter full description on your product</div>
                </div>



                <!-- 6.Product Quentity -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <div class="row">
                        <div class="col-auto"><label for="productQuentity" class="form-label">Enter your product Quentity</label></div>
                        <div class="col-auto">
                            <input type="number" class="form-control" name="productQuentity" id="productQuentity" aria-describedby="productQuentityDescription" required>
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
                            <input type="number" class="form-control" name="productUnitPrice" id="productUnitPrice" aria-describedby="productUnitPriceDescription" required>
                        </div>
                        <div class="col-auto">
                            <div id="productUnitPriceDescription" class="form-text">Enter your Unit price of a Product</div>
                        </div>

                    </div>



                </div>

                <!-- 8.Product Images -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="imageInput" class="form-label">Select Multiple Images:</label>
                    <input type="file" class="form-control mb-1" id="image01" name="image01" required>
                    <input type="file" class="form-control mb-1" id="image02" name="image02" required>
                    <input type="file" class="form-control mb-1" id="image03" name="image03" required>
                    <input type="file" class="form-control mb-1" id="image04" name="image04" required>
                    <!-- The 'multiple' attribute allows selecting multiple files -->
                    <!-- The 'accept' attribute ensures only image files can be selected -->
                </div>

                <!-- 9.Product Availability -->
                <div class="form-outline mb-4 w-50 m-auto form-check form-switch">
                    <label class="form-check-label" for="productAvailability">Products are Availabe?</label>
                    <input class="form-check-input" type="checkbox" name="productAvailability" id="productAvailability" role="switch" required>

                    <!-- Add a hidden input field to store the actual value sent to the server -->
                    <input type="hidden" name="Product_Status" id="productStatusHidden" value="">

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            // Add event listener to the checkbox
                            document.getElementById('productAvailability').addEventListener('change', function() {
                                // Update the hidden input field based on checkbox state
                                document.getElementById('productStatusHidden').value = this.checked ? 'active' : 'inactive';
                            });
                        });
                    </script>

                </div>

                <!-- 10.Product Agreement -->
                <div class="form-outline mb-4 w-50 m-auto  form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                    <label class="form-check-label" for="exampleCheck1">Agree to the conditions</label>
                </div>

                <!-- 11.product save button -->
                <div class="form-outline mb-4 w-50 m-auto  text-center">

                    <button type="submit" name="product_save_button" id="product_save_button" class="btn btn-primary col-6 mx-auto">Add product to store</button>
                </div>



            </form>
        </div>



    </div>
</body>

</html>

