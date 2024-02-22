<?php
include('../includes/connection.php');
global $conn;

$select_available_brands = "SELECT * FROM `product_brands`";
$brands_results = mysqli_query($conn, $select_available_brands);

$available_brands_count = mysqli_num_rows($brands_results);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2 class="text-center">Available brands</h2>
    <h2 class="text-center">Available brands count is :<?php echo "$available_brands_count" ?></h2>
    <table class="table table-bordered mt-2 text-center">
        <thead class="bg-info">
            <tr>
                <th>Brand name</th>
                <th>Brand description</th>
                <th>Edit brand</th>
                <th>Delete brand</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php

            while ($available_brands_array = mysqli_fetch_array($brands_results)) {
                $brand_id = $available_brands_array['Brand_ID'];
                $brand_name = $available_brands_array['Brand_Name'];
                $brand_description = $available_brands_array['Brand_Description'];

                echo "
            <tr>
                <td>$brand_name</td>
                <td>$brand_description</td>
                <td><a href='maindashboard.php?edit_selected_brand_id=$brand_id'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='maindashboard.php?delete_selected_brand_id=$brand_id'><i class='fa-solid fa-trash'></i></a></td>
            </tr>
            ";
            }

            ?>


        </tbody>
    </table>
</body>

</html>