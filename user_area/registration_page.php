<!DOCTYPE html>
<html lang="en">

<?php
include('includes/connection.php');

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Page</title>

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

    <div class="container-fluid m-3">
        <h2 class="text-center">New User Registration</h2>
        <div class="row justify-content-center ">
            <div class="col-lg-11 col-xl-9">
                <form action="" class="signUp-form-style" method="POST" enctype="multipart/form-data">
                    <div class="row p-2 mb-3 mx-2 form-outline border">
                        <label for="user_name" class="col-sm-3 col-form-label bg-light">User name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="user_name" name="username" placeholder="Please Enter your username" autocomplete="off" required>
                            <div id="usernameerror" class="text-info">This name will be used your name in this application</div>
                        </div>
                    </div>

                    <div class="row p-2 mb-3 mx-2 form-outline border">
                        <label for="user_password" class="col-sm-3 col-form-label bg-light">Password</label>
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

                    <div class="row p-2 mb-3 mx-2 form-outline border">
                        <label for="user_confirm_password" class="col-sm-3 col-form-label bg-light">Confirm Password</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="password" class="form-control" id="user_confirm_password" name="userconfirmpassword" placeholder="Please confirm your  password " autocomplete="off" required>
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword1">
                                    <i class="fas fa-eye-slash" aria-hidden="true"></i>
                                </button>
                            </div>

                            <div id="userpassworderror" class="text-info"> Please re-enter your password to confirm it matches the one above.</div>
                        </div>
                    </div>

                    <div class="row p-2 mb-3 mx-2 form-outline border">
                        <label for="user_firstname" class="col-sm-3 col-form-label bg-light">First Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="user_firstname" name="userfirstname" placeholder="Please Enter your first name" autocomplete="off" required>
                            <div id="usernameerror" class="text-info">This name will be used for personalized your account</div>
                        </div>
                    </div>

                    <div class="row p-2 mb-3 mx-2 form-outline border">
                        <label for="user_lastname" class="col-sm-3 col-form-label bg-light">Last Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="user_lastname" name="userlastname" placeholder="Please Enter your Last name" autocomplete="off" required>
                            <div id="usernameerror" class="text-info">This name will be used for personalized your account</div>
                        </div>
                    </div>

                    <div class="row p-2 mb-3 mx-2 form-outline border">
                        <label for="user_emailaddress" class="col-sm-3 col-form-label bg-light">Email address</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="user_emailaddress" name="useremailaddress" placeholder="Please Enter your email address" autocomplete="off" required>
                            <div id="usernameerror" class="text-info">This email address will be used to conatct you through email</div>
                        </div>
                    </div>

                    <div class="row p-2 mb-3 mx-2 form-outline border">
                        <label for="user_mobilenumber" class="col-sm-3 col-form-label bg-light">Mobile Number</label>
                        <div class="col-sm-9">
                            <input type="tel" class="form-control" id="user_mobilenumber" name="usermobilenumber" placeholder="Please Enter your whatsup account +94" autocomplete="off" pattern="^\+94[0-9]{9}$" required>
                            <div id="userphoneerror" class="text-info">This number will be used to contact you through email</div>
                        </div>
                    </div>

                    <div class="row p-2 mb-3 mx-2 form-outline border">
                        <label for="user_address" class="col-sm-3 col-form-label bg-light">User Address</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="user_address" name="useraddress" placeholder="Please Enter your address" autocomplete="off" required>
                            <div id="usernameerror" class="text-info">This address will be used to shipping items</div>
                        </div>
                    </div>

                    <div class="row p-2 mb-3 mx-2 form-outline border">
                        <label for="imageInput" class="form-label">Select Profile Image:</label>
                        <input type="file" class="form-control mb-1" id="image01" name="image01" required>
                    </div>


                    <div class="form-outline mb-4  m-auto  form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                        <label class="form-check-label" for="exampleCheck1">By clicking Sign-Up ,I agreed to your <a href="">Terms and Conditions</a></label>
                    </div>


                    <div class="form-outline mb-4 w-50 m-auto  text-center">
                        <button type="submit" name="sign_up_button" id="signupbutton" class="btn btn-primary col-6 mx-auto">SIGN UP</button>
                    </div>

                    <div class="mb-4  m-auto small fw-bold">
                        <p>Already have an account ? <a href="user_area/login_page.php">Login here</a></p>
                    </div>

                    <script>
                        document.getElementById('user_mobilenumber').addEventListener('input', function() {

                            let phoneinput = document.getElementById('user_mobilenumber');
                            let phoneErrrorMsg = document.getElementById('userphoneerror');

                            let phonenumberpattern = /^\+94[0-9]{9}$/;

                            if (!phonenumberpattern.test(phoneinput.value)) {
                                phoneErrrorMsg.textContent('Please enter a valid phone number starting with +94 and followed by 9 digits.');
                                phoneinput.setCustomValidity('Invalid phone number');

                            } else {
                                phoneErrrorMsg.textContent = '';
                                phoneInput.setCustomValidity('Corrected');
                            }

                        });

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
                    </script>




            </div>

            </form>
        </div>
    </div>
    </div>



</body>



</html>