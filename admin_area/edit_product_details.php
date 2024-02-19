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
    <h2 class="text-center">Edit product details.</h2>


    <!--Add new product form example-->
    <div class=" border p-2 mt-3 mb-3" style="background-color: yellow;">
        <h1 class="text-center">Update selected Product</h1>

        <!-- add a product form -->

        <div class="border p-4 mt-3 mb-3">
            <form action="" method="POST" enctype="multipart/form-data" class="bg-danger mt-3  mb-3 add_product_form">
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