<?php
include('../includes/connection.php');
if (
    isset($_GET['selected_admin_name_deactivate']) &&
    isset($_GET['selected_admin_emailaddress_deactivate'])
) {
    $selected_admin_username = $_GET['selected_admin_name_deactivate'];
    $selected_admin_emailaddress = $_GET['selected_admin_emailaddress_deactivate'];
}


$select_user_details_querry = "SELECT * FROM `admin_table` WHERE admin_username='$selected_admin_username' && admin_emailaddress='$selected_admin_emailaddress'";
$results_admin = mysqli_query($conn, $select_user_details_querry);

if ($results_admin) {
    $result_admin_array = mysqli_fetch_array($results_admin);

    if ($result_admin_array) {
        $adminId = $result_admin_array['admin_id'];
        $adminUsername = $result_admin_array['admin_username'];
        $adminEmailaddress = $result_admin_array['admin_emailaddress'];
        $adminMobileNumber = $result_admin_array['admin_mobilenumber'];
        $adminProfileImage = $result_admin_array['admin_profile_image'];
        $adminVerificationStatus = $result_admin_array['admin_isverified'];
        $adminCreatedDate = $result_admin_array['admin_created_time'];

        // Now you can use these variables
    } else {
        // Handle case when no results are returned
        echo "<script>alert('No results found for the specified admin credentials.')</script>";
    }
} else {
    // Handle query execution failure
    echo "Error executing query: " . mysqli_error($conn);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        .profile_image {
            width: 100px;
            height: 100px;
            border-radius: 5%;
            align-items: center;
        }
    </style>
</head>

<body>
    <h3 class="text-success">Deactivate admin account</h3>

    <div class="text-center container mt-5 border p-2 shadow">
        <h2>Admin Account Management</h2>

        <form id="update_Form01" action="" class="updateuserdetails-form-style" method="POST" enctype="multipart/form-data">


            <!-- user name -->
            <div class="row p-2 mb-3 mx-2 form-outline border">
                <label for="user_name" class="col-sm-3 col-form-label bg-light">Admin User name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="user_name" name="username" placeholder="Please Enter your username" autocomplete="off" value="<?php echo $adminUsername ?>" required>

                </div>
            </div>


            <!-- email address -->
            <div class="row p-2 mb-3 mx-2 form-outline border">
                <label for="user_emailaddress" class="col-sm-3 col-form-label bg-light">Email address</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" id="user_emailaddress" name="useremailaddress" placeholder="Please Enter your email address" autocomplete="off" value="<?php echo $adminEmailaddress ?>" required>

                </div>
            </div>

            <!-- mobile number -->
            <div class="row p-2 mb-3 mx-2 form-outline border">
                <label for="user_mobilenumber" class="col-sm-3 col-form-label bg-light">Mobile Number</label>
                <div class="col-sm-9">
                    <input type="tel" class="form-control" id="user_mobilenumber" name="usermobilenumber" placeholder="Please Enter your whatsup account +94" autocomplete="off" pattern="^\+94[0-9]{9}$" value="<?php echo $adminMobileNumber ?>" required>

                </div>
            </div>



            <!-- user image -->
            <div class="row p-2 mb-3 mx-2 form-outline border">
                <label for="imageInput" class="form-label">Profile Image:</label>

                <img src="../images/profileimages/<?php echo $adminProfileImage ?>" class="profile_image" alt="no image to display" width="50px" height="50px">
            </div>

        </form>

        <!-- Trigger for suspend user account Modal -->
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deactivateadminaccountconfirmationModal">
            Deactivate this account
        </button>

        <!-- Trigger for dismiss Modal -->
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#dismissDeactivateaccountModal">
            Back to dashboard
        </button>
    </div>

    <!-- Activate admin account Modal -->
    <div class="modal" id="deactivateadminaccountconfirmationModal">

        <form action="" method="POST">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Deactivate admin account Confirmation</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        Are you sure to deactivate this Admin account?.
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" name="Deactivate_account_button">Cofirm Deactivation</button>
                    </div>

                </div>
            </div>

        </form>
    </div>

    <!-- Dismiss suspend process  Modal -->
    <div class="modal" id="dismissDeactivateaccountModal">
        <form action="" method="POST">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Dismiss Deactivate account process</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        Are you sure you want to dissmiss from Deactivate user account process?
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-warning">Dismiss</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
</body>

</html>

<?php
if (isset($_POST['Deactivate_account_button'])) {
    $update_admin_status_querry = "UPDATE `admin_table` SET admin_isverified='0' WHERE admin_username='$adminUsername' && admin_emailaddress='$adminEmailaddress'";
    if (mysqli_query($conn, $update_admin_status_querry)) {
        echo "<script>alert('Successfully deactivate user account.')</script>";
        echo "<script>window.open('maindashboard.php?available_admins','_self')</script>";
    }
}
?>