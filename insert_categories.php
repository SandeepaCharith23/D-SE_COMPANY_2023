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
    <form action="" method="get" class="form_style01 m-auto">

        <div class="form_heading">
            <h3>Insert a New Category</h3> <span class="close-button" id="close-button"> <i class="fa fa-close"></i></span>
        </div>
        <!-- 1.product Category name -->
        <div class="mb-4">
            <label for="prouctCategoryName" class="form-label">Enter your product name :</label>
            <input type="text" class="form-control" id="prouctCategoryName" aria-describedby="productCategoryNamedescription">
            <div id="productCategoryNamedescription" class="form-text">Product Category Name-must be clear and Easily understand</div>
        </div>

        <!-- 2.ProductCategory -->
        <div class="mb-4">
            <label for="prouctCategory" class="form-label">Enter your product Category :</label>
            <input type="text" class="form-control" id="prouctCategory" aria-describedby="productCategorydescription">
            <div id="productCategorydescription" class="form-text">Product Category-must be clear and Easily understand</div>
        </div>

        <div class="input-group  mb-2 m-auto">
            <input type="submit" class="form-control bg-info" name="insert_category_button" value="Insert Category">
        </div>

    </form>
</body>

</html>