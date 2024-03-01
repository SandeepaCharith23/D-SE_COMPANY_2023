<?php
include('../includes/connection.php');
if (
    isset($_GET['selected_user_name_activate']) &&
    isset($_GET['selected_user_emailaddress_activate'])
) {
    $selected_username = $_GET['selected_user_name_activate'];
    $selected_useremailaddress = $_GET['selected_user_emailaddress_activate'];
}


$select_user_details_querry = "SELECT * FROM `user_table` WHERE User_Name='$selected_username'";
$results_user = mysqli_query($conn, $select_user_details_querry);
$result_user_array = mysqli_fetch_array($results_user);
$userID = $result_user_array['User_ID'];
$userimage = $result_user_array['User_ProfileImage'];
$userfirstname = $result_user_array['User_FirstName'];
$userlastname = $result_user_array['User_LastName'];
$useremailaddress = $result_user_array['User_Email'];
$usermobilenumber = $result_user_array['User_MobilePhone'];
$useraddress = $result_user_array['User_Address'];
$userpostcode = $result_user_array['User_PostalCode'];
$userProvince = $result_user_array['User_Province'];
$userdistrict = $result_user_array['User_District'];
$usercity = $result_user_array['User_City'];

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
    <h3 class="text-success">Activate Account</h3>

    <div class="text-center container mt-5 border p-2 shadow">
        <h2>User Account Management</h2>

        <form id="update_Form01" action="" class="updateuserdetails-form-style" method="POST" enctype="multipart/form-data">


            <!-- user name -->
            <div class="row p-2 mb-3 mx-2 form-outline border">
                <label for="user_name" class="col-sm-3 col-form-label bg-light">User name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="user_name" name="username" placeholder="Please Enter your username" autocomplete="off" value="<?php echo $selected_username ?>" required>

                </div>
            </div>

            <!-- first name of the user -->
            <div class="row p-2 mb-3 mx-2 form-outline border">
                <label for="user_firstname" class="col-sm-3 col-form-label bg-light">First Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="user_firstname" name="userfirstname" placeholder="Please Enter your first name" autocomplete="off" value="<?php echo $userfirstname ?>" required>

                </div>
            </div>

            <!-- last name of the user -->
            <div class="row p-2 mb-3 mx-2 form-outline border">
                <label for="user_lastname" class="col-sm-3 col-form-label bg-light">Last Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="user_lastname" name="userlastname" placeholder="Please Enter your Last name" autocomplete="off" value="<?php echo $userlastname ?>" required>

                </div>
            </div>

            <!-- user email address -->
            <div class="row p-2 mb-3 mx-2 form-outline border">
                <label for="user_emailaddress" class="col-sm-3 col-form-label bg-light">Email address</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" id="user_emailaddress" name="useremailaddress" placeholder="Please Enter your email address" autocomplete="off" value="<?php echo $useremailaddress ?>" required>

                </div>
            </div>

            <!-- user mobile number -->
            <div class="row p-2 mb-3 mx-2 form-outline border">
                <label for="user_mobilenumber" class="col-sm-3 col-form-label bg-light">Mobile Number</label>
                <div class="col-sm-9">
                    <input type="tel" class="form-control" id="user_mobilenumber" name="usermobilenumber" placeholder="Please Enter your whatsup account +94" autocomplete="off" pattern="^\+94[0-9]{9}$" value="<?php echo $usermobilenumber ?>" required>

                </div>
            </div>

            <!-- user address -->
            <div class="row p-2 mb-3 mx-2 form-outline border">
                <label for="user_address" class="col-sm-3 col-form-label bg-light">User Address</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="user_address" name="useraddress" placeholder="Please Enter your address" autocomplete="off" value="<?php echo $useraddress ?>" required>

                </div>
            </div>

            <!-- postal code  field -->
            <div class="row p-2 mb-3 mx-2 form-outline border">
                <label for="user_postalcode" class="col-sm-3 col-form-label bg-light">Postal Code</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="user_postalcode" name="userpostalcode" placeholder="Please Enter your postal code" autocomplete="off" value="<?php echo $userpostcode ?>" required>

                </div>
            </div>

            <!-- user image -->
            <div class="row p-2 mb-3 mx-2 form-outline border">
                <label for="imageInput" class="form-label">Profile Image:</label>

                <img src="../images/profileimages/<?php echo $userimage ?>" class="profile_image" alt="no image to display" width="50px" height="50px">
            </div>

        </form>

        <!-- Trigger for Activate user account Modal -->
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#activateuseraccountconfirmationModal">
            Activate this account
        </button>

        <!-- Trigger for dismiss Modal -->
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#dismissActivateaccountModal">
            Back to dashboard
        </button>
    </div>

    <!-- Activate user account Modal -->
    <div class="modal" id="activateuseraccountconfirmationModal">

        <form action="" method="POST">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Activate user account- Confirmation</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        Are you sure to activate this user account again?
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" name="activate_account_button">Activate</button>
                    </div>

                </div>
            </div>

        </form>
    </div>

    <!-- Dismiss activate process  Modal -->
    <div class="modal" id="dismissActivateaccountModal">
        <form action="" method="POST">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Dismiss Activation process</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        Are you sure you want to dissmiss from activate user account process?
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
if (isset($_POST['activate_account_button'])) {
    $update_user_status_querry = "UPDATE `user_table` SET User_Account_Status='Active' WHERE User_ID=$userID";
    if (mysqli_query($conn, $update_user_status_querry)) {
        echo "<script>alert('Successfully Activate user account.')</script>";
        echo "<script>window.open('maindashboard.php?available_users','_self')</script>";
    }
}
?>