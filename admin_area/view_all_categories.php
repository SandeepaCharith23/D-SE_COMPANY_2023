<?php
include('../includes/connection.php');
global $conn;

$select_available_categories = "SELECT * FROM `product_categories`";
$categories_results = mysqli_query($conn, $select_available_categories);

$available_categories_count = mysqli_num_rows($categories_results);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2 class="text-center">Available categories</h2>
    <h2 class="text-center">Available categories count is :<?php echo "$available_categories_count" ?></h2>
    <table class="table table-bordered mt-2 text-center">
        <thead class="bg-info">
            <tr>
                <th>Category name</th>
                <th>Category description</th>
                <th>Edit category</th>
                <th>Delete category</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php

            while ($available_categories_array = mysqli_fetch_array($categories_results)) {
                $category_id = $available_categories_array['Category_ID'];
                $category_name = $available_categories_array['Category_Name'];
                $category_description = $available_categories_array['Category_Description'];

                echo "
            <tr>
                <td>$category_name</td>
                <td>$category_description</td>
                <td><a href='maindashboard.php?edit_selected_category_id=$category_id''><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='maindashboard.php?delete_selected_category_id=$category_id''><i class='fa-solid fa-trash'></i></a></td>
            </tr>
            ";
            }

            ?>


        </tbody>
    </table>
</body>

</html>