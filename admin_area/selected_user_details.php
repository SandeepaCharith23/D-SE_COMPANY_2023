<?php
include('../includes/connection.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3 class="text-center">Available users</h3>
    <table class="table table-bordered mt-2 text-center">
        <thead class="bg-info">
            <tr>
                <th>User number</th>
                <th>User Name</th>
                <th>User Email</th>
                <th>User Mobile Number</th>
                <th>User Address</th>
                <th>User profile Image01</th>
                <th>User Province</th>
                <th>User District</th>
                <th>User City</th>
                <th>User Account Status</th>
                <th>Suspend Account</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(isset($_GET['clicked_user_id']))
            {
                $selected_user_id=$_GET['clicked_user_id'];
            }
            $user_number = 1;
            //Get All available users 
            $get_available_user_querry = "SELECT * FROM `user_table` WHERE User_ID=$selected_user_id";
            $available_users_resultset = mysqli_query($conn, $get_available_user_querry);
            while ($available_users_details_array = mysqli_fetch_array($available_users_resultset)) {
                $user_name = $available_users_details_array['User_Name'];
                $user_emailaddress = $available_users_details_array['User_Email'];
                $user_mobilenum = $available_users_details_array['User_MobilePhone'];
                $user_address = $available_users_details_array['User_Address'];
                $user_profileimage01 = $available_users_details_array['User_ProfileImage'];
                $user_province = $available_users_details_array['User_Province'];
                $user_district = $available_users_details_array['User_District'];
                $user_city = $available_users_details_array['User_City'];
                $user_account_status = $available_users_details_array['User_Account_Status'];
                echo "
            <tr>
                <td>$user_number</td>
                <td>$user_name</td>
                <td>$user_emailaddress</td>
                <td>$user_mobilenum</td>
                <td>$user_address</td>
                <td><img src='../images/profileimages/$user_profileimage01' alt='No image' style='width:100px;height:100px;'></td>
                <td>$user_province</td>
                <td>$user_district</td>
                <td>$user_city</td>
                <td>$user_account_status</td>
                 <td>";


                if ($user_account_status == 'Suspended') {
                    echo "<a href='maindashboard.php?selected_user_name_activate=$user_name&selected_user_emailaddress_activate=$user_emailaddress' class='bg-success p-2 text-white'>Activate Account</a>";
                } else {
                    echo "<a href='maindashboard.php?selected_user_name=$user_name&selected_user_emailaddress=$user_emailaddress' class='bg-danger p-2 text-white'>Suspend Account</a>";
                }

                echo "</td></tr>";

                $user_number++;
            }
            echo "</tbody></table>";
            ?>

</body>

</html>