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
    if (isset($_POST['insert_category_button'])) {
        $category_name = $_POST['prouct_category_name'];
        $category_description = $_POST['product_category_description'];

        //select data from database-check that product category already exist or not
        $select_querry = "SELECT * FROM `product_categories` WHERE category_name='$category_name'";
        $result_selected = mysqli_query($conn, $select_querry);
        $available_rows = mysqli_num_rows($result_selected);

        if ($available_rows > 0) {

            echo "<script>alert('Category already added ,Try another name')</script>";
        } else {

            // SQL query to insert data into database
            $insertsql = "INSERT INTO `product_categories` (Category_Name, Category_Description) VALUES ('$category_name', '$category_description')";
            $result = mysqli_query($conn, $insertsql);

            if ($result) {
                echo "<script>alert('Category added successfully')</script>";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    }


    // close the connection
    mysqli_close($conn);
    ?>

    <form action="" method="POST" class="form_style01 m-auto" onsubmit="return validateForm()">

        <div class="form_heading">
            <h3>Insert a New Category</h3> <span class="close-button" id="form-close-button" onclick="closeform()"> <i class="fa fa-close"></i></span>

        </div>
        <!-- 1.product Category name -->
        <div class="mb-4">
            <label for="prouctCategoryName" class="form-label">Enter your product Category name :</label>
            <input type="text" class="form-control" id="prouctCategoryName" aria-describedby="productCategoryNamedescription" name='prouct_category_name' required>
            <div id="productCategoryNamedescription" class="form-text">Product Category Name-must be clear and Easily understand</div>
        </div>

        <!-- 2.Product Category description -->
        <div class="mb-4">
            <label for="prouctCategory" class="form-label">Enter your product Category Description:</label>
            <input type="text" class="form-control" id="prouctCategoryDes" aria-describedby="productCategorydescription" name="product_category_description" required>
            <div id="productCategorydescription" class="form-text">Product Category-must be clear and Easily understand</div>
        </div>

        <div class="mb-2 m-auto">
            <input type="submit" class="form-control bg-info" name="insert_category_button" value="Insert Category">
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

        function validateForm() {
            //1.Get the input field values
            var categoryName = document.getElementById("productCategoryName").value;
            var categoryDescription = document.getElementById("productCategoryDes").value;

            //2.Validates values
            if (categoryName.trim() == "" || categoryDescription.trim() == "") {
                alert("Please fill those empty fields");
                return false; // Prevent form submission
            }
            // You can add more complex validation logic here if needed

            return true; // Allow form submission if validation passed
        }
    </script>
</body>

</html>