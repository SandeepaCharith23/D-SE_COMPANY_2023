<?php
include('includes/connection.php');
include('functions/common_functions.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- link font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!--Link custom css file for slider-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <!-- link the css file link -->
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="fonts/Italianno-Regular.ttf">

    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
<?php
include('includes/headersection01.php');

?>




    <!-- clicked product display -->
    <div class="row border  border-2 border-primary mx-auto">
        <!-- fetch all product data from database -->

        <section id="product-display-section" class="product-display-section">

            <?php
            //use common_function
            get_selected_product();

            ?>

        </section>
    </div>

    <!-- related products -->


    <div class="row border border-dark mx-auto">
        <h1 class="text-center mx-auto mt-2">Related Products on Same Category</h1>
        <?php
        get_selected_product_related_products();

        ?>

    </div>

    <!-- include footer -->
    <?php
    include('includes/footer.php');

    ?>


    <script>
        // product display colorosol

        var mainImage = document.getElementById('main_image');
        var smallimage = document.getElementsByClassName('product-images-small');

        smallimage[0].onclick = () => {
            console.log("inside function");
            mainImage.src = smallimage[0].src;

        };

        smallimage[1].onclick = () => {
            console.log("inside function");
            mainImage.src = smallimage[1].src;
        };

        smallimage[2].onclick = () => {
            console.log("inside function");
            mainImage.src = smallimage[2].src;
        };

        smallimage[3].onclick = () => {
            console.log("inside function");
            mainImage.src = smallimage[3].src;
        };
    </script>

    <!-- link custom js file -->
    <script src="js/script.js"></script>
</body>

</html>