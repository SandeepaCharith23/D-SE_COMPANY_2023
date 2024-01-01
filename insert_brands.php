<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- link font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- link stylesheet -->
    <link rel="stylesheet" href="css/style.css">

    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>

<?php
    include('includes/connection.php');

    // form handling
    if (isset($_POST['insert_brand_button'])) {
        $brand_name = $_POST['prouct_barnd_name'];
        $brand_description = $_POST['product_brand_description'];

        //select data from database-check that product category already exist or not
        $select_querry = "SELECT * FROM `product_brands` WHERE brand_name='$brand_name'";
        $result_selected = mysqli_query($conn, $select_querry);
        $available_rows = mysqli_num_rows($result_selected);

        if ($available_rows > 0) {

            echo "<script>alert('Brand already added ,Try another name')</script>";
        }else{

        // SQL query to insert data into database
        $insertsql = "INSERT INTO `product_brands`(Brand_Name,Brand_Description) VALUES ('$brand_name', '$brand_description')";
        $result = mysqli_query($conn, $insertsql);
        
        if ($result) {
            echo "<script>alert('Brand added successfully')</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
    } else {
        echo "Error: Form was not submitted.";
    }

    // close the connection
    mysqli_close($conn);
    ?>
    <form action="" method="POST" class="form_style01 m-auto">

        <div class="form_heading">
            <h3>Insert a New Brand</h3> <span class="close-button" id="close-button"> <i class="fa fa-close"></i></span>
        </div>
        <!-- 1.product Brand name -->
        <div class="mb-4">
            <label for="prouctBrandName" class="form-label">Enter your product Brand :</label>
            <input type="text" class="form-control" id="prouctBrandName" aria-describedby="productBrandNamedescription" name="prouct_barnd_name">
            <div id="productBrandNamedescription" class="form-text">Product Brand Name-must be clear and Easily understand</div>
        </div>

        <!-- 2.Product Brand Description -->
        <div class="mb-4">
            <label for="prouctBrandDescription" class="form-label">Enter your product Brand Description:</label>
            <input type="textarea" class="form-control" id="prouctBrandDescription" aria-describedby="productBranddescription" name="product_brand_description">
            <div id="productBranddescription" class="form-text">Product Brand description-must be clear and Easily understand</div>
        </div>

        <div class="input-group  mb-2 m-auto">
            <input type="submit" class="form-control bg-info" name="insert_brand_button" value="Insert Brand">
        </div>

    </form>
</body>

</html>