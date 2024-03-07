<?php
include('../includes/connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration page</title>
    <!-- link font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link rel="stylesheet" href="../css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container-fluid border shadow p-2">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-3  mx-2 border shadow p-3 text-center"><img src="../images/homebanner01.png" alt="" style="width:80%;height:100%"></div>
            <div class="col-lg-8 ">
                <div class="container">
                    <h2 class="text-center">Admin Registration</h2>
                    <form action="" method="POST" action="" enctype="multipart/form-data">
                        <!-- 1.admin username -->
                        <div class="row p-2 mb-3 mx-2 form-outline border">
                            <label for="admin_user_name" class="col-sm-3 col-form-label bg-light">User name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="admin_user_name" name="adminusername" placeholder="Please Enter your username" autocomplete="off" required>
                                <div id="usernameerror" class="text-info">This name will be used your name in this application</div>
                            </div>
                        </div>
                        <!-- 2.admin email address -->
                        <div class="row p-2 mb-3 mx-2 form-outline border">
                            <label for="admin_email_address" class="col-sm-3 col-form-label bg-light">User Email address</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="admin_email_address" name="adminemailaddress" placeholder="Please Enter your Email address" autocomplete="off" required>
                                <div id="usernameerror" class="text-info">This Email address will be used For Two-facter authentication process</div>
                            </div>
                        </div>

                        <!-- 3.admin mobile number -->
                        <div class="row p-2 mb-3 mx-2 form-outline border">
                            <label for="admin_mobilenumber" class="col-sm-3 col-form-label bg-light">Mobile Number</label>
                            <div class="col-sm-9">
                                <input type="tel" class="form-control" id="admin_mobilenumber" name="adminmobilenumber" placeholder="Please Enter your whatsup account +94" autocomplete="off" pattern="^\+94[0-9]{9}$" required>
                                <div id="userphoneerror" class="text-info">This number will be used to contact you through email</div>
                            </div>
                        </div>

                        <!-- 4.admin password  -->
                        <div class="row p-2 mb-3 mx-2 form-outline border">
                            <label for="user_password" class="col-sm-3 col-form-label bg-light">Enter yourPassword</label>
                            <div class="col-sm-9">

                                <div class="input-group">
                                    <input type="password" class="form-control" id="user_password" name="userpassword" placeholder="Please Enter a suitable password for your account" autocomplete="off" required>
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        <i class="fas fa-eye-slash" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <div id="userpassworderror" class="text-info"> Password must contain at least 8 characters, including uppercase, lowercase letters, and numbers.</div>
                            </div>
                        </div>

                        <!-- 5.admin password re-enter -->
                        <div class="row p-2 mb-3 mx-2 form-outline border">
                            <label for="user_confirm_password" class="col-sm-3 col-form-label bg-light">Confirm Password</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="password" class="form-control" id="user_confirm_password" name="userconfirmpassword" placeholder="Please confirm your  password " autocomplete="off" required>
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword1">
                                        <i class="fas fa-eye-slash" aria-hidden="true"></i>
                                    </button>
                                </div>

                                <div id="userpassworderror1" class="text-info"> Please re-enter your password to confirm it matches the one above.</div>
                            </div>
                        </div>

                        <!-- 6.admin-profile-image -->
                        <div class="row p-2 mb-3 mx-2 form-outline border">
                            <label for="adminuserimage01" class="form-label">Select Profile Image:</label>
                            <input type="file" class="form-control mb-1" id="adminuserimage01" name="adminuserimage01" required>
                        </div>

                        <!-- 7.admin aggrement statement -->
                        <div class="form-outline mb-4  m-auto  form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                            <label class="form-check-label" for="exampleCheck1">By clicking Sign-Up ,I agreed to your <a href="#">Terms and Conditions</a></label>
                        </div>

                        <!-- 8.admin register button -->
                        <div class="form-outline mb-4 w-50 m-auto  text-center">
                            <button type="submit" name="register_admin_button" id="registeradminbutton" class="btn btn-primary col-6 mx-auto">Register Admin</button>
                        </div>

                        <!-- 9.admin login page  -->
                        <div class="mb-4  m-auto small fw-bold">
                            <p>Already have an account ? <a href="../index.php">Login here</a></p>
                        </div>




                    </form>
                </div>
            </div>
        </div>


    </div>
    </div>

</body>

</html>

<script>
    let togglepassword = document.getElementById('togglePassword');
    let passwordinput = document.getElementById('user_password');

    togglepassword.addEventListener('click', function() {
        const typeofthepassword = passwordinput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordinput.setAttribute('type', typeofthepassword);
        this.querySelector('i').classList.toggle('fa-eye-slash');
        this.querySelector('i').classList.toggle('fa-eye');
    });

    let togglepassword1 = document.getElementById('togglePassword1');
    let passwordinput1 = document.getElementById('user_confirm_password');

    togglepassword1.addEventListener('click', function() {
        const typeofthepassword = passwordinput1.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordinput1.setAttribute('type', typeofthepassword);
        this.querySelector('i').classList.toggle('fa-eye-slash');
        this.querySelector('i').classList.toggle('fa-eye');
    });
    ////////////////////
    //compare password and confirm password fields 
    document.getElementById('user_confirm_password').addEventListener('input', function() {

        //display error msg-where to display msg 
        let msgcontainer = document.getElementById('userpassworderror1');

        // Retrieve the values of password and confirm password
        let passwordValue = document.getElementById('user_password').value;
        let confirmPasswordValue = this.value; // 'this' refers to the confirm password input field

        //compare the two values
        if (passwordValue === confirmPasswordValue) {
            msgcontainer.textContent = 'Password Matches'

        } else {
            msgcontainer.textContent = 'Password doesnot Matches,Please type again'
            msgcontainer.style.color = 'Red';
        }
    });

    ////////////////////

    function showToast(message, type) {
        Toastify({
            text: message,
            duration: 3000,
            gravity: 'top',
            position: 'center',
            style: {
                background: type === 'success' ? '#28a745' : '#dc3545'
            }
        }).showToast();

        // Show the success modal
        if (type === 'success') {
            // $('#alertModal').modal('show');
        }
    };
</script>

<?php
if (isset($_POST['register_admin_button'])) {
    echo "<script>console.log('Inside register_admin_button')</script>";

    $admin_username = $_POST['adminusername'];
    $admin_emailaddress = $_POST['adminemailaddress'];
    $admin_mobilenumber = $_POST['adminmobilenumber'];
    $admin_password1 = $_POST['userpassword'];
    //password hashing
    $admin_hash_password = password_hash($admin_password1, PASSWORD_BCRYPT);
    $admin_password2 = $_POST['userconfirmpassword'];
    //$admin_profile_image=$_POST['adminuserimage01'];
    $admin_is_verified = 'False';
    $admin_verification_token = 'token';
    $admin_created_time = 'Now';


    echo "<script>console.log('$admin_username')</script>";
    //echo "<script>console.log('admin username: $admin_username, user email address: $admin_emailaddress, user mobile number: $admin_mobilenumber, admin password: $admin_password, admin verification id: $admin_is_verified ,admin verified time: $admin_created_time');</script>";

    // File upload handling
    $adminImagename = $_FILES['adminuserimage01']['name'];
    $adminImagetempname = $_FILES['adminuserimage01']['tmp_name'];
    $imageUploadPath = "../images/profileimages/";
    //echo "<script>console.log('Data loaded');</script>";

    //check that entered data were already available in admin table
    $select_admin_table = "SELECT * FROM `admin_table` WHERE admin_username='$admin_username' && admin_emailaddress='$admin_emailaddress'";

    if (mysqli_num_rows(mysqli_query($conn, $select_admin_table)) > 0) {
        echo "<script>alert('already have a account')</script>";
    } elseif ($admin_password1 != $admin_password2) {
        echo "<script>alert('Please reconfirm your passwords.Passwords must match each other')</script>";
    } else {
        echo "<script>console.log('Create a new account ---Inside')</script>";
        //upload images into folder
        if (move_uploaded_file($adminImagetempname, $imageUploadPath . $adminImagename)) {
            echo "<script>console.log('Successfully uploading file in to your location')</script>";
        } else {
            echo "<script>alert('Error uploading file')</script>";
        }

        //move_uploaded_file($adminImagetempname, $imageUploadPath . $adminImagename);

        echo "<script>console.log('End of the file uploading task')</script>";
        //save new admin with 
        $insert_new_admin_querry = "INSERT INTO `admin_table`(admin_username,admin_emailaddress,admin_mobilenumber,admin_password,admin_profile_image,admin_isverified,admin_verification_token,admin_created_time) VALUES ('$admin_username','$admin_emailaddress','$admin_mobilenumber','$admin_hash_password','$adminImagename',$admin_is_verified,'$admin_verification_token',NOW())";
        if (mysqli_query($conn, $insert_new_admin_querry)) {
            echo "<script>alert('Successfully add a new admin to database,Our admin will enter you to inside')</script>";
            echo "<script>console.log('Successfully add a new admin')</script>";
        } else {
            echo "<script>alert('Something went wrong,Please contact our admin for more details.')</script>";
        }
    }
}

?>