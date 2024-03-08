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
    <h3 class="text-center">Available Admins</h3>
    <table class="table table-bordered mt-2 text-center">
        <thead class="bg-info">
            <tr>
                <th>Admin number</th>
                <th>Admin Name</th>
                <th>Admin Email</th>
                <th>Admin Mobile Number</th>
                <th>User profile Image01</th>
                <th>User Account Status</th>
                <th>Suspend Account</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $user_number = 1;
            //Get All available users 
            $get_available_admins_querry = 'SELECT * FROM `admin_table`';
            $available_admins_resultset = mysqli_query($conn, $get_available_admins_querry);
            while ($available_admins_details_array = mysqli_fetch_array($available_admins_resultset)) {
                $admin_user_name = $available_admins_details_array['admin_username'];
                $admin_user_email = $available_admins_details_array['admin_emailaddress'];
                $admin_user_mobilenumber = $available_admins_details_array['admin_mobilenumber'];
                $admin_user_profile_image = $available_admins_details_array['admin_profile_image'];
                $admin_user_user_status = $available_admins_details_array['admin_isverified'];
               
                echo "
            <tr>
                <td>$user_number</td>
                <td>$admin_user_name</td>
                <td>$admin_user_email</td>
                <td>$admin_user_mobilenumber </td>
                <td><img src='../images/profileimages/$admin_user_profile_image' alt='No image' style='width:100px;height:100px;'></td>
                <td>";
                if($admin_user_user_status == '0'){
                    echo "
                    <div>
                   <span style='color: red; font-weight: bold;'>Account Suspended</span>
                   </div>";
                }else{
                    echo "
                    <div>
                    <span style='color: green; font-weight: bold;'>Account Active</span>
                    </div>
                    
                    ";
                }
                
                echo"</td> 
                <td>";


                if ($admin_user_user_status == '0') {
                    echo "<a href='maindashboard.php?selected_admin_name_activate=$admin_user_name&selected_admin_emailaddress_activate=$admin_user_email' class='bg-success p-2 text-white'>Activate Account</a>";
                } else {
                    echo "<a href='maindashboard.php?selected_admin_name_deactivate=$admin_user_name&selected_admin_emailaddress_deactivate=$admin_user_email' class='bg-danger p-2 text-white'>Suspend Account</a>";
                }

                echo "</td></tr>";

                $user_number++;
            }
            echo "</tbody></table>";
            ?>

</body>

</html>