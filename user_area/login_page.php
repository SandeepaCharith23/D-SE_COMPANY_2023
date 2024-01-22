<!DOCTYPE html>
<html lang="en">

<?php
include('../includes/connection.php');
include('../functions/ipaddress.php');
session_start();

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

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
    
    <style>
        body {
            /* background-color: blueviolet; */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh; /* Ensure full viewport height */
        }

        /* Additional styles for the form container */
        .container {
            background-color: rgba(255, 255, 255, 0.8); /* Adjust the background color and opacity as needed */
            border-radius: 10px;
            padding: 20px;
            margin-top: 50px;
        }
    </style>

</head>

<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form class="border p-4 shadow" action="" method="POST" onsubmit="return validateForm()">
                <h2 class="text-center mb-4 fw-bold">Login User</h2>

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter your Username" required>
                    <div id="usernameError" class="text-danger"></div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your Password" required>
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword3">
                            <i class="fas fa-eye-slash" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div id="passwordError" class="text-danger"></div>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                    <label class="form-check-label" for="rememberMe">Remember Me</label>
                </div>

                <div class="text-center mb-3">
                    <input type="submit" name="user_login" value="Login" class="btn btn-primary px-4 py-2">
                </div>

                <div class="fw-bold small text-center">
                    <a href="forgot_password.php">Forgot Password?</a>
                    <p>Don't have an account? <a href="registration_page.php">Create One</a></p>
                    <p><a href="privacy_policy.php">Privacy Policy</a> | <a href="terms_of_service.php">Terms of Service</a></p>
                </div>
            </form>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function validateForm() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            var usernameError = document.getElementById("usernameError");
            var passwordError = document.getElementById("passwordError");
            var isValid = true;

            // Reset error messages
            usernameError.innerHTML = "";
            passwordError.innerHTML = "";

            // Validate username
            if (username.trim() === "") {
                usernameError.innerHTML = "Username is required.";
                isValid = false;
            }

            // Validate password
            if (password.trim() === "") {
                passwordError.innerHTML = "Password is required.";
                isValid = false;
            }

            return isValid;
        }


        ///////////////

        let togglepassword = document.getElementById('togglePassword3');
        let passwordinput1 = document.getElementById('password');

        togglepassword.addEventListener('click', function() {
            const typeofthepassword = passwordinput1.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordinput1.setAttribute('type', typeofthepassword);
            this.querySelector('i').classList.toggle('fa-eye-slash');
            this.querySelector('i').classList.toggle('fa-eye');
        });
    </script>

    <?php
    //session_start();
    if (isset($_POST['user_login'])) {
        
        //1.Get the values
        $user_username = $_POST['username'];
        $user_userpassword = $_POST['password'];

        //2.Select the entered values from Daatabase
        $select_user = "SELECT * FROM `user_table` WHERE User_Name='$user_username'";

        $result_user = mysqli_query($conn, $select_user);
        $result_row_user = mysqli_num_rows($result_user);
        $result_data = mysqli_fetch_assoc($result_user);

        $user_ip_address=getIPAddress1();
        
        //5.check whether user had previous entered carts before redirect customer.
        $select_available_carts_querry="SELECT * FROM `cart_details` WHERE User_IPaddress='$user_ip_address'";
        $results_available_carts_row=mysqli_num_rows(mysqli_query($conn,$select_available_carts_querry));

        // if($results_available_carts_row>0)
        // {
        //     echo "<script>alert('Yes have carts on IP address')</script>";
        // }else{
        //     echo "<script>alert('Yes have not carts on IP address')</script>";
        // }

        //3.Check that is there any records according to given user name 
        if ($result_row_user > 0) {
            $_SESSION['username']=$user_username;
            echo "<script>alert('Yes are in user table-Registered user')</script>";
            //4.verify password -compare the entered passwored with hash password inside the DB
            if (password_verify($user_userpassword, $result_data['User_Password'])) {
                echo "<script>alert('Password has match')</script>";

                if($result_row_user==1 && $results_available_carts_row==0)
                {   
                    $_SESSION['username']=$user_username;
                    echo "<script>alert('Password match and no records on available carts')</script>";
                    echo "<script>window.open('user_profile.php','_self')</script>";
                }else{
                    $_SESSION['username']=$user_username;
                    echo "<script>alert('Password match and have one or more records on available carts')</script>"; 
                    echo "<script>window.open('payment_page.php','_self')</script>"; 
                }

                echo "<script>window.open('../productshome.php','_self')</script>";
            } else {
                echo "<script>alert('Password does not match')</script>";
            }
        } else {
            echo "<script>alert('No records have')</script>";
        }
    }

    ?>


</body>

</html>