<!DOCTYPE html>
<html lang="en">

<?php
       
        $username=$_SESSION['username'];

        $select_user_details_querry="SELECT * FROM `user_table` WHERE User_Name= '$username'";
        $results_user=mysqli_query($conn,$select_user_details_querry);
        $result_user_array=mysqli_fetch_array($results_user);
        $userID=$result_user_array['User_ID'];
        $userimage=$result_user_array['User_ProfileImage'];
        $userfirstname=$result_user_array['User_FirstName'];
        $userlastname=$result_user_array['User_LastName'];
        $useremailaddress=$result_user_array['User_Email'];
        $usermobilenumber=$result_user_array['User_MobilePhone'];
        $useraddress=$result_user_array['User_Address'];
        $userpostcode=$result_user_array['User_PostalCode'];
        $userProvince=$result_user_array['User_Province'];
        $userdistrict=$result_user_array['User_District'];
        $usercity=$result_user_array['User_City'];
       // echo "<script>alert('user image catches')</script>"; 
      

     if(isset($_POST['update_button']))
     {  
        //catch the values
        $updated_userid=$userID;
        $updated_userName=$_POST['username'];
        $updated_userFirstName=$_POST['userfirstname'];
        $updated_userLastName=$_POST['userlastname'];
        $updated_useraddress=$_POST['useraddress'];
        $updated_userEmailaddress=$_POST['useremailaddress'];
        $updated_userMobileNumber=$_POST['usermobilenumber'];
        $updated_userPostalCode=$_POST['userpostalcode'];
        $updated_userProvince=$_POST['userprovince'];
        $updated_userDistrict=$_POST['userdistrict'];
        $updated_userCity=$_POST['usercity'];

        //File upload handling
       $updated_userImagename = $_FILES['userimage01']['name'];
       $updated_Imagetempname = $_FILES['userimage01']['tmp_name'];
       $updated_imageUploadPath = "../images/profileimages/";

       move_uploaded_file($updated_Imagetempname,$updated_imageUploadPath.$updated_userImagename);

        //update user details according to values which user entered.
        $update_user_details_querry="UPDATE `user_table` SET User_Name='$updated_userName',User_Email='$updated_userEmailaddress',User_FirstName='$updated_userFirstName',User_LastName='$updated_userLastName',User_Address='$updated_useraddress',User_MobilePhone='$updated_userMobileNumber',User_ProfileImage='$updated_userImagename',User_Province='$updated_userProvince',User_District='$updated_userDistrict',User_City='$updated_userCity',User_PostalCode='$updated_userPostalCode' WHERE User_ID='$updated_userid' ";

        if(mysqli_query($conn,$update_user_details_querry)){
            echo "<script>Successfully saved to Database</script>";
            echo "<script>window.open('login_out.php','_self')</script>";
        }else{
            echo "Something Error";
        }
     }

    ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit user account details</title>
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
    <h1>Edit your user account details.</h1>

    <form id="update_Form01" action="" class="updateuserdetails-form-style" method="POST" enctype="multipart/form-data">

        
        <!-- user name -->
        <div class="row p-2 mb-3 mx-2 form-outline border">
            <label for="user_name" class="col-sm-3 col-form-label bg-light">User name</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="user_name" name="username" placeholder="Please Enter your username" autocomplete="off" value="<?php echo $username ?>" required>
                <div id="usernameerror" class="text-info">This name will be used your name in this application</div>
            </div>
        </div>

        <!-- first name of the user -->
        <div class="row p-2 mb-3 mx-2 form-outline border">
            <label for="user_firstname" class="col-sm-3 col-form-label bg-light">First Name</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="user_firstname" name="userfirstname" placeholder="Please Enter your first name" autocomplete="off" value="<?php echo $userfirstname ?>" required>
                <div id="usernameerror" class="text-info">This name will be used for personalized your account</div>
            </div>
        </div>

        <!-- last name of the user -->
        <div class="row p-2 mb-3 mx-2 form-outline border">
            <label for="user_lastname" class="col-sm-3 col-form-label bg-light">Last Name</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="user_lastname" name="userlastname" placeholder="Please Enter your Last name" autocomplete="off" value="<?php echo $userlastname ?>" required>
                <div id="usernameerror" class="text-info">This name will be used for personalized your account</div>
            </div>
        </div>

        <!-- user email address -->
        <div class="row p-2 mb-3 mx-2 form-outline border">
            <label for="user_emailaddress" class="col-sm-3 col-form-label bg-light">Email address</label>
            <div class="col-sm-9">
                <input type="email" class="form-control" id="user_emailaddress" name="useremailaddress" placeholder="Please Enter your email address" autocomplete="off" value="<?php echo $useremailaddress ?>" required>
                <div id="usernameerror" class="text-info">This email address will be used to conatct you through email</div>
            </div>
        </div>

        <!-- user mobile number -->
        <div class="row p-2 mb-3 mx-2 form-outline border">
            <label for="user_mobilenumber" class="col-sm-3 col-form-label bg-light">Mobile Number</label>
            <div class="col-sm-9">
                <input type="tel" class="form-control" id="user_mobilenumber" name="usermobilenumber" placeholder="Please Enter your whatsup account +94" autocomplete="off" pattern="^\+94[0-9]{9}$" value="<?php echo $usermobilenumber ?>" required>
                <div id="userphoneerror" class="text-info">This number will be used to contact you through email</div>
            </div>
        </div>

        <!-- user address -->
        <div class="row p-2 mb-3 mx-2 form-outline border">
            <label for="user_address" class="col-sm-3 col-form-label bg-light">User Address</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="user_address" name="useraddress" placeholder="Please Enter your address" autocomplete="off" value="<?php echo $useraddress ?>" required>
                <div id="usernameerror" class="text-info">This address will be used to shipping items</div>
            </div>
        </div>

        <!-- postal code  field -->
        <div class="row p-2 mb-3 mx-2 form-outline border">
            <label for="user_postalcode" class="col-sm-3 col-form-label bg-light">Postal Code</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="user_postalcode" name="userpostalcode" placeholder="Please Enter your postal code" autocomplete="off" value="<?php echo $userpostcode ?>" required>
                <div id="userpostcodeerror" class="text-info">This postal code will be used for personalized your account</div>
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


        <!-- user image -->
        <div class="row p-2 mb-3 mx-2 form-outline border">
            <label for="imageInput" class="form-label">Select Profile Image:</label>
            <input type="file" class="form-control mb-1" id="image01" name="userimage01" required>
            <img src="../images/profileimages/<?php echo $userimage ?>" class="profile_image" alt="no image to display">
        </div>





        <div class="form-outline mb-4 w-50 m-auto  text-center">
            <button type="submit" name="update_button" id="updatebutton" class="btn btn-primary col-6 mx-auto">Update user details</button>
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
</body>

</html>