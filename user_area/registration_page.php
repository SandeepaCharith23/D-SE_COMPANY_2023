<!DOCTYPE html>
<html lang="en">

<?php
include('../includes/connection.php');
include('../functions/ipaddress.php');


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
        body {
            background-color: blueviolet;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            /* Ensure full viewport height */
        }

        /* Additional styles for the form container */
        .container {
            background-color: rgba(255, 255, 255, 0.8);
            /* Adjust the background color and opacity as needed */
            border-radius: 10px;
            padding: 20px;
            margin-top: 50px;
        }
    </style>

</head>

<body>

    <div class="container center ">
        <h2 class="text-center">New User Registration</h2>
        <div class="row justify-content-center ">
            <!-- <div id="progressIndicator" style="display: none;">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <p>Saving to Database...</p>
            </div> -->
            <div class="col-lg-11 col-xl-9">
                <form id="sign_up_Form01" action="" class="signUp-form-style" method="POST" enctype="multipart/form-data">
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

                            <div id="userpassworderror1" class="text-info"> Please re-enter your password to confirm it matches the one above.</div>
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

                    <!-- postal code  field -->
                    <div class="row p-2 mb-3 mx-2 form-outline border">
                    <label for="user_postalcode" class="col-sm-3 col-form-label bg-light">Postal Code</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="user_postalcode" name="userpostalcode" placeholder="Please Enter your postal code" autocomplete="off" required>
                            <div id="userpostcodeerror" class="text-info">This postal code  will be used for personalized your account</div>
                        </div>
                    </div>

                    <!-- Province selection field -->
                    <div class="row p-2 mb-3 mx-2 form-outline border">
                        <label for="user_province" class="col-sm-3 col-form-label bg-light">Province</label>
                        <div class="col-sm-9">
                            <select class="form-select" id="user_province" name="userprovince" required>
                                <option selected disabled>Select Province</option>
                                <option value="Central">Central</option>
                                <option value="Eastern">Eastern</option>
                                <option value="Northern">Northern</option>
                                <option value="North Central">North Central</option>
                                <option value="North Western">North Western</option>
                                <option value="Sabaragamuwa">Sabaragamuwa</option>
                                <option value="Southern">Southern</option>
                                <option value="Uva">Uva</option>
                                <option value="Western">Western</option>
                            </select>
                            <div id="provinceError" class="text-info">Please select your province</div>
                        </div>
                    </div>

                    <!-- District selection field -->
                    <div class="row p-2 mb-3 mx-2 form-outline border">
                        <label for="user_district" class="col-sm-3 col-form-label bg-light">District</label>
                        <div class="col-sm-9">
                            <select class="form-select" id="user_district" name="userdistrict" required>
                                <option selected disabled>Select District</option>
                                <!-- District options will be dynamically added here based on the selected province -->
                            </select>
                            <div id="districtError" class="text-info">Please select your district</div>
                        </div>
                    </div>

                    <!-- City selection field -->
                    <div class="row p-2 mb-3 mx-2 form-outline border">
                        <label for="user_city" class="col-sm-3 col-form-label bg-light">City</label>
                        <div class="col-sm-9">
                            <select class="form-select" id="user_city" name="usercity" required>
                                <option selected disabled>Select City</option>
                                <!-- City options will be dynamically added here based on the selected district -->
                            </select>
                            <div id="cityError" class="text-info">Please select your city</div>
                        </div>
                    </div>



                    <div class="row p-2 mb-3 mx-2 form-outline border">
                        <label for="imageInput" class="form-label">Select Profile Image:</label>
                        <input type="file" class="form-control mb-1" id="image01" name="userimage01" required>
                    </div>


                    <div class="form-outline mb-4  m-auto  form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                        <label class="form-check-label" for="exampleCheck1">By clicking Sign-Up ,I agreed to your <a href="">Terms and Conditions</a></label>
                    </div>


                    <div class="form-outline mb-4 w-50 m-auto  text-center">
                        <button type="submit" name="sign_up_button" id="signupbutton" class="btn btn-primary col-6 mx-auto">SIGN UP</button>
                    </div>

                    <div class="mb-4  m-auto small fw-bold">
                        <p>Already have an account ? <a href="login_page.php">Login here</a></p>
                    </div>


            </div>

            </form>

            <!-- jQuery script for dynamic district options -->
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script>
                $(document).ready(function() {
                    // District options based on provinces
                    const districtOptions = {
                        'Central': ['Kandy', 'Matale', 'Nuwara Eliya'],
                        'Eastern': ['Trincomalee', 'Batticaloa', 'Ampara'],
                        'Northern': ['Jaffna', 'Kilinochchi', 'Mannar', 'Mullaitivu', 'Vavuniya'],
                        'North Central': ['Anuradhapura', 'Polonnaruwa'],
                        'North Western': ['Kurunegala', 'Puttalam'],
                        'Sabaragamuwa': ['Ratnapura', 'Kegalle'],
                        'Southern': ['Galle', 'Matara', 'Hambantota'],
                        'Uva': ['Badulla', 'Monaragala'],
                        'Western': ['Colombo', 'Gampaha', 'Kalutara'],
                    };


                    // Event listener for province selection
                    $('#user_province').change(function() {
                        const selectedProvince = $(this).val();
                        const districtSelect = $('#user_district');

                        // Clear existing options
                        districtSelect.empty();

                        // Add default option
                        districtSelect.append('<option selected disabled>Select District</option>');

                        // Add options based on the selected province
                        if (selectedProvince in districtOptions) {
                            const districts = districtOptions[selectedProvince];
                            $.each(districts, function(i, district) {
                                districtSelect.append('<option value="' + district + '">' + district + '</option>');
                            });
                        }
                    });
                });



                ////////////////////

                $(document).ready(function() {
                    // area options based on District
                    const areaOptions = {

                        // Administrative divisions in Kandy District
                        'Kandy': ['Akurana', 'Gampola', 'Kandy', 'Kundasale', 'Pilimatalawa', 'Teldeniya'],

                        // Administrative divisions in Matale District
                        'Matale': ['Dambulla', 'Galewela', 'Laggala-Pallegama', 'Matale', 'Naula', 'Palapathwela', 'Rattota', 'Ukuwela', 'Wilgamuwa'],

                        // Administrative divisions in Nuwara Eliya District
                        'Nuwara Eliya': ['Ambagamuwa', 'Hanguranketha', 'Kotmale', 'Maskeliya', 'Nuwara Eliya'],

                        // Administrative divisions in Trincomalee District
                        'Trincomalee': ['Gomarankadawala', 'Kantalai', 'Kinniya', 'Muttur', 'Seruvila', 'Thambalagamuwa', 'Trincomalee Town and Gravets'],

                        // Administrative divisions in Batticaloa District
                        'Batticaloa': ['Batticaloa', 'Eravur Pattu', 'Kalkudah', 'Koralaipattu', 'Manmunai', 'Porativu Pattu', 'Paddiruppu', 'Vaharai'],

                        // Administrative divisions in Ampara District
                        'Ampara': ['Akkaraipattu', 'Alayadivembu', 'Ampara', 'Dehiattakandiya', 'Kalmunai', 'Karaitivu Pattu', 'Lahugala', 'Mahaoya'],

                        // Administrative divisions in Jaffna District
                        'Jaffna': ['Chavakachcheri', 'Jaffna', 'Kankesanthurai', 'Karaveddy', 'Maruthankerney', 'Nallur', 'Sandilipay'],

                        // Administrative divisions in Kilinochchi District
                        'Kilinochchi': ['Kilinochchi'],

                        // Administrative divisions in Mannar District
                        'Mannar': ['Madhu', 'Mannar', 'Musali', 'Nanaddan'],

                        // Administrative divisions in Mullaitivu District
                        'Mullaitivu': ['Mullaitivu'],

                        // Administrative divisions in Vavuniya District
                        'Vavuniya': ['Vavuniya', 'Vengalacheddikulam'],

                        // Administrative divisions in Anuradhapura District
                        'Anuradhapura': ['Anuradhapura', 'Galnewa', 'Horowpathana', 'Ipalogama', 'Kahatagasdigiliya', 'Kebitigollawa', 'Kekirawa', 'Medawachchiya', 'Mihintale', 'Nachchadoowa', 'Nochchiyagama', 'Padaviya', 'Palagala', 'Thalawa'],

                        // Administrative divisions in Polonnaruwa District
                        'Polonnaruwa': ['Dimbulagala', 'Hingurakgoda', 'Lankapura', 'Medirigiriya', 'Polonnaruwa', 'Welikanda'],

                        // Administrative divisions in Kurunegala District
                        'Kurunegala': ['Alawwa', 'Bingiriya', 'Galgamuwa', 'Ganewatta', 'Giribawa', 'Ibbagamuwa', 'Kuliyapitiya', 'Kurunegala', 'Maho', 'Maspotha', 'Nikaweratiya', 'Panduwasnuwara', 'Pannala', 'Polgahawela', 'Rasnayakapura', 'Wariyapola', 'Weerambugedara'],

                        // Administrative divisions in Puttalam District
                        'Puttalam': ['Anamaduwa', 'Chilaw', 'Karaitivu', 'Madampe', 'Mahakumbukkadawala', 'Nawagattegama', 'Nattandiya', 'Norochcholai', 'Pallama', 'Pomparippu', 'Puttalam', 'Vanathavilluwa'],

                        // Administrative divisions in Ratnapura District
                        'Ratnapura': ['Balangoda', 'Eheliyagoda', 'Elapatha', 'Embilipitiya', 'Godakawela', 'Imbulpe', 'Kiriella', 'Nivithigala', 'Opanayaka', 'Pelmadulla', 'Ratnapura', 'Weligepola'],

                        // Administrative divisions in Kegalle District
                        'Kegalle': ['Aranayaka', 'Bulathkohupitiya', 'Dehiowita', 'Deraniyagala', 'Galigamuwa', 'Kegalle', 'Kitulgala', 'Kotiyakumbura', 'Mawanella', 'Rambukkana', 'Ruwanwella', 'Warakapola'],

                        // Administrative divisions in Galle District
                        'Galle': ['Ambalangoda', 'Baddegama', 'Balapitiya', 'Bentota', 'Boossa', 'Elpitiya', 'Galle', 'Habaraduwa', 'Hikkaduwa', 'Karandeniya', 'Nagoda', 'Neluwa', 'Thawalama', 'Weligama'],

                        // Administrative divisions in Matara District
                        'Matara': ['Akuressa', 'Devinuwara', 'Hakmana', 'Kamburupitiya', 'Kekanadura', 'Kirinda Puhulwella', 'Matara', 'Pasgoda', 'Pitabeddara', 'Thihagoda', 'Weligama'],

                        // Administrative divisions in Hambantota District
                        'Hambantota': ['Ambalantota', 'Angunakolapelessa', 'Beliatta', 'Hambantota', 'Lunugamvehera', 'Sooriyawewa', 'Tissamaharama'],

                        // Administrative divisions in Badulla District
                        'Badulla': ['Badulla', 'Bandarawela', 'Ella', 'Haldummulla', 'Hali Ela', 'Haputale', 'Kandaketiya', 'Lunugala', 'Mahiyanganaya', 'Meegahakivula', 'Passara', 'Rideemaliyadda', 'Welimada'],

                        // Administrative divisions in Monaragala District
                        'Monaragala': ['Badalkumbura', 'Bibile', 'Buttala', 'Kataragama', 'Madulla', 'Medagama', 'Monaragala', 'Sevanagala', 'Tanamalwila', 'Wellawaya'],

                        // Administrative divisions in Colombo District
                        'Colombo': ['Colombo 1', 'Colombo 2', 'Colombo 3', 'Colombo 4', 'Colombo 5', 'Colombo 6', 'Colombo 7', 'Colombo 8', 'Colombo 9', 'Colombo 10', 'Colombo 11', 'Colombo 12', 'Colombo 13', 'Colombo 14', 'Colombo 15'],

                        // Administrative divisions in Gampaha District
                        'Gampaha': ['Attanagalla', 'Biyagama', 'Divulapitiya', 'Dompe', 'Gampaha', 'Ja-Ela', 'Katana', 'Kelaniya', 'Mahara', 'Minuwangoda', 'Mirigama', 'Negombo'],

                        // Administrative divisions in Kalutara District
                        'Kalutara': ['Agalawatta', 'Bandaragama', 'Beruwala', 'Bulathsinhala', 'Dodangoda', 'Horana', 'Ingiriya', 'Kalutara', 'Madurawala', 'Matugama', 'Panadura', 'Walallawita'],



                    };


                    // Event listener for province selection
                    $('#user_district').change(function() {
                        const selectedDistrict = $(this).val();
                        const citySelect = $('#user_city');

                        // Clear existing options
                        citySelect.empty();

                        // Add default option
                        citySelect.append('<option selected disabled>Select City</option>');

                        // Add options based on the selected district
                        if (selectedDistrict in areaOptions) {
                            const areas = areaOptions[selectedDistrict];
                            $.each(areas, function(i, area) {
                                citySelect.append('<option value="' + area + '">' + area + '</option>');
                            });
                        }
                    });
                });
            </script>




        </div>
    </div>
    </div>


    <!-- Bootstrap Alert Modal -->
    <div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="alertModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="alertModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Content will be dynamically set -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
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
                phoneinput.setCustomValidity('');


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
                msgcontainer.style.color = 'red';
            }
        });


        /////////////////
        function clearForm() {
            // Clear all input fields in the form
            document.getElementById("sign_up_Form01").reset();
            //console msg
            console.log('clear forms');
        }
        ////////////
        // Add a function to show the progress indicator
        // function showProgressIndiactor(){
        //     document.getElementById('progressIndicator').style.display='block';
        // }

        // Add a function to hide the progress indicator
        //   function hideProgressIndicator() {
        //     document.getElementById('progressIndicator').style.display = 'none';
        // }

        // document.getElementById('sign_up_Form01').addEventListener('submit',function(event){
        //     event.preventDefault(); // Prevent the form from submitting immediately

        //     // Show the progress indicator
        //     showProgressIndicator();

        //     //

        //     // Hide the progress indicator after the form submission is complete
        //     // You may need to adjust the timing based on your actual form submission logic
        //     setTimeout(function () {
        //         hideProgressIndicator();
        //     }, 2000);
        // })

        //display Toast message using Js tostify-js
        // Display Toast message using Js Toastify-js
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

        //function for bootstrap modal-showAlertModal 
        function showAlertModal(message, type) {
            // Get the modal element
            var modal = $('#alertModal');

            // Set modal content based on the type (success or error)
            if (type === 'success') {
                modal.find('.modal-title').text('Success');
                modal.find('.modal-body').text(message);
            } else if (type === 'error') {
                modal.find('.modal-title').text('Error');
                modal.find('.modal-body').text(message);
            }

            // Show the modal using Bootstrap's modal() function
            $('#alertModal').modal('show');
            // jQuery('#alertModal').modal('show');


        }

        //End of function for bootstrap modal-showAlertModal 
    </script>

    <style>
        .toastify {
            border: 2px solid #000;
            /* Set border properties */
            border-radius: 8px;
            /* Optional: Add border-radius for rounded corners */
            text-align: center;
            align-items: center;
            height: 20vh;
            padding: 15px;
            /* Add padding for better visual appearance */
            font-family: 'Arial', sans-serif;
            /* Optional: Set font-family */
            font-size: 14px;
            /* Optional: Set font size */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* Optional: Add a subtle box shadow */
            background-color: #fff;
            /* Optional: Set background color */
            color: #333;
            /* Optional: Set text color */
        }
    </style>







</body>



</html>

<?php
//session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection code or initialize $conn properly
global $conn;
if (isset($_POST['sign_up_button'])) {

    echo "<script>console.log('Inside sign up button function and form submitted');</script>";

    $EntereduserName = $_POST['username'];
    $EntereduserPasswordwithouthash = $_POST['userpassword'];
    $EntereduserConfirmedPasswordwithouthash = $_POST['userconfirmpassword'];
    $EntereduserPassword = password_hash($EntereduserPasswordwithouthash, PASSWORD_DEFAULT); // Hash the password
    // $EntereduserConfirmedPassword = password_hash($EntereduserConfirmedPasswordwithouthash, PASSWORD_DEFAULT); // Hash the password
    echo "<script>console.log($EntereduserPasswordwithouthash);</script>";


    $EntereduserEmailAddress = $_POST['useremailaddress'];
    $EntereduserFirstName = $_POST['userfirstname'];
    $EntereduserLastName = $_POST['userlastname'];
    $EntereduserAddress = $_POST['useraddress'];
    $EntereduserMobileNumber = $_POST['usermobilenumber'];

    $Entereduserpostalcode = $_POST['userpostalcode'];
    $Entereduserprovince = $_POST['userprovince'];
    $Entereduserdistrict = $_POST['userdistrict'];
    $Enteredusercity = $_POST['usercity'];

    // File upload handling
    $EntereduserImagename = $_FILES['userimage01']['name'];
    $EntereduserImagetempname = $_FILES['userimage01']['tmp_name'];
    $imageUploadPath = "../images/profileimages/";

    echo "<script>console.log('Data loaded');</script>";

    //check the data already available in DB
    $select_querry = "SELECT * FROM `user_table` WHERE User_Email='$EntereduserEmailAddress' AND User_Name='$EntereduserName' ";
    $results_sets_fromdb = mysqli_query($conn, $select_querry);
    $results_rows = mysqli_num_rows($results_sets_fromdb);

    if ($results_rows > 0) {
        echo '<script>showToast("User Email address and Username already inserted,Please use another email address", "error");</script>';
        //echo "<script> showAlertModal('User Email address and Username already inserted,Please use another email address', 'error');</script>";
    } else if ($EntereduserPasswordwithouthash != $EntereduserConfirmedPasswordwithouthash) {
        echo '<script>showToast("Passwords doesnot match", "error");</script>';
        echo "<script>console.log('Error in Password ' + '" . $EntereduserPasswordwithouthash . "' + ' And ' + '" . $EntereduserConfirmedPasswordwithouthash . "');</script>";
    } else {


        // Validate and move uploaded file
        if (move_uploaded_file($EntereduserImagetempname, $imageUploadPath . $EntereduserImagename)) {
            // File upload successful
            echo "<script>console.log('Image  loaded');</script>";
        } else {
            echo "<script>alert('Error uploading file')</>";
            // You might want to exit or redirect the user here
        }

        //Get the Ip address of Client
        $userIPAddress = getIPAddress1();
        echo "<script>console.log('Ip address collected');</script>";


        // Use prepared statements to prevent SQL injection
        $insertAccountDetailsquery = "INSERT INTO `user_table` (User_Name, User_Password, User_Email, User_FirstName, User_LastName, User_Address, User_MobilePhone, User_ProfileImage, User_IPaddress,User_Province,User_District,User_City, User_PostalCode) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $insertAccountDetailsquery);
        echo "<script>console.log('mysqli_prepare done');</script>";

        // Bind parameters and execute query
        mysqli_stmt_bind_param($stmt, "sssssssssssss", $EntereduserName, $EntereduserPassword, $EntereduserEmailAddress, $EntereduserFirstName, $EntereduserLastName, $EntereduserAddress, $EntereduserMobileNumber, $EntereduserImagename, $userIPAddress,$Entereduserprovince,$Entereduserdistrict,$Enteredusercity,$Entereduserpostalcode);
        echo "<script>console.log('Added querry');</script>";
        if (mysqli_stmt_execute($stmt)) {
            // echo "<script>alert('Saved to Database')</script>";
            echo '<script>showToast("Successfully save user Data", "success");</script>';
            //echo "<script>showAlertModal('User data saved successfully!', 'success');</script>";
            echo "<script>clearForm();</script>"; // Call JavaScript function to clear form
            echo "<script>console.log('User registration function completed successfully');</script>"; // Log message to the browser console


        } else {
            echo "<script>alert('Error: " . mysqli_stmt_error($stmt) . "')</script>";
        }

        //mysqli_stmt_close($stmt);


        //checking available cart items -When user click items and add to cart before login to system
        $select_cart_items = "SELECT * FROM `cart_details` WHERE  User_IPaddress='$userIPAddress'";
        $results_available_carts = mysqli_query($conn, $select_cart_items);
        if (mysqli_num_rows($results_available_carts) > 0) {

            //add a session variable -username
            $_SESSION['username'] = $EntereduserName;
            echo "<script>console.log('Session variable saved');</script>";
            echo "<script>console.log($_SESSION[username]);</script>";
            echo "<script>alert('You have few available items in your cart,Please Check out these Items')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
        } else {
            //redirect user to products home page
            echo "<script>window.open('../productshome.php','_self')</script>";
        }
    }
}
?>