<?php
include('../includes/connection.php');
if (isset($_SESSION['admin_id']) && isset($_SESSION['admin_username'])) {
    $admin_id = $_SESSION['admin_id'];
    $admin_username = $_SESSION['admin_username'];
    $admin_emailaddress = $_SESSION['admin_emailaddress'];
    $admin_profileimagename = $_SESSION['admin_profileimage'];


    $select_admin_details_querry = "SELECT * FROM `admin_table` WHERE admin_id=$admin_id && admin_emailaddress='$admin_emailaddress'";
    $admin_details_resultset = mysqli_query($conn, $select_admin_details_querry);
    $admin_details_resultarray = mysqli_fetch_array($admin_details_resultset);
    $admin_username = $admin_details_resultarray['admin_username'];
    $admin_emailaddress = $admin_details_resultarray['admin_emailaddress'];
    $admin_mobilenumber = $admin_details_resultarray['admin_mobilenumber'];
    $admin_profilepic = $admin_details_resultarray['admin_profile_image'];
    $admin_account_status = $admin_details_resultarray['admin_isverified'];
}


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
    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="../fonts/Italianno-Regular.ttf">

    <!-- link bootstrap -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>




    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <style>
        .profile_image {
            width: 100px;
            height: 100px;
            border-radius: 5%;
        }
    </style>
</head>

<body>
    <h2 class="text-center">Hi <?php echo $admin_username ?></h2>

    <form id="update_Form01" action="" class="updateuserdetails-form-style" method="POST" enctype="multipart/form-data">
        <!-- Admin user name -->
        <div class="row p-2 mb-3 mx-2 form-outline border">
            <label for="admin_user_name" class="col-sm-3 col-form-label bg-light">Admin User name</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="admin_user_name" name="admin_user_name" placeholder="Admin username" autocomplete="off" value="<?php echo $admin_username ?>" required>
                <div id="usernameerror" class="text-info">This name will be used your name in this application</div>
            </div>
        </div>

        <!-- Admin email address name -->
        <div class="row p-2 mb-3 mx-2 form-outline border">
            <label for="admin_email_address" class="col-sm-3 col-form-label bg-light">Admin email address</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="admin_email_address" name="admin_email_address" placeholder="Admin emailaddress" autocomplete="off" value="<?php echo $admin_emailaddress ?>" readonly>
                <div id="usernameerror" class="text-info">This email addreess will be used in this application</div>
            </div>
        </div>

        <!-- Admin mobile number -->
        <div class="row p-2 mb-3 mx-2 form-outline border">
            <label for="admin_mobilenumber" class="col-sm-3 col-form-label bg-light">Mobile Number</label>
            <div class="col-sm-9">
                <input type="tel" class="form-control" id="admin_mobilenumber" name="admin_mobilenumber" placeholder="Mobile number account with +94" autocomplete="off" pattern="^\+94[0-9]{9}$" value="<?php echo $admin_mobilenumber ?>" required>
                <div id="userphoneerror" class="text-info">This number will be used to contact you through email</div>
            </div>
        </div>

        <!-- admin user image -->
        <div class="row p-2 mb-3 mx-2 form-outline border">
            <label for="admin_image" class="form-label">Select Profile Image:</label>
            <input type="file" class="form-control mb-1" id="admin_image" name="admin_image">
            <img src="../images/profileimages/<?php echo $admin_profilepic ?>" class="profile_image" alt="no image to display">
        </div>

        <div class="form-outline mb-4 w-50 m-auto  text-center">
            <button type="submit" name="update_admin_details_1" id="update_button" class="btn btn-primary col-6 mx-auto">Update Admin details</button>
        </div>


    </form>
</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_admin_details'])) {

echo "<script>console.log('insider button clicke')</script>";

}





//Update database

?>