<!DOCTYPE html>
<html lang="en">
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
    
    
</head>
<body>
    <div class="fluid-container m-3 p-3 border">
        <div class="row">
            <div class="col">
                <form class="login-form-style" action="login_process.php" method="POST" onsubmit="return validateForm()">
                    <h2 class="text-center mb-4 fw-bold">Login User</h2>
                    <div class="p-2 mb-3 mx-2 border">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your User name" required>
                        <div id="usernameError" class="text-danger"></div>
                    </div>
                    <div class="p-2 mb-3 mx-2 border">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required >
                        <div id="passwordError" class="text-danger"></div>
                    </div>
                    <div class="p-2 mb-3 mx-2 ">
                        <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember Me</label>
                    </div>
                    <div class="text-center mb-3">
                        <input type="submit" value="Login" class="btn btn-outline-primary px-3 py-2 w-50 ">
                    </div>
                    <div class="fw-bold small">
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
    </script>
</body>
</html>
