<?php
session_start(); // Start the session at the beginning of the script

include('../includes/connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //1.Getting variables-Retrieve User Input
    $admin_emailaddress = $_POST['adminemailaddress'];
    $admin_password = $_POST['adminpassword'];

    // echo "$admin_emailaddress and $admin_password";
    //2. Sanitize input to prevent SQL injection
    $admin_emailaddress = mysqli_real_escape_string($conn, $admin_emailaddress);
    $admin_password = mysqli_real_escape_string($conn, $admin_password);

    echo "After sanitizing email addressEmail address is : $admin_emailaddress and User Password is :$admin_password";
    $admin_isverified = 1;
    $stmt = $conn->prepare('SELECT * FROM `admin_table` WHERE admin_emailaddress=? && admin_isverified=?;');
    $stmt->bind_param("si", $admin_emailaddress, $admin_isverified);
    $stmt->execute();
    $resultset = $stmt->get_result();

    if ($resultset->num_rows > 0) {
        echo "<script>alert('Have a record.')</script>";

        $admin_resultset_row = mysqli_fetch_assoc($resultset);

        $saved_hash_password = $admin_resultset_row['admin_password'];

        //compare passwords
        if (password_verify($admin_password, $saved_hash_password)) {
            // Passwords match
            echo "<script>alert('Login successful.')</script>";
            //echo "<script>window.open('maindashboard.php','_self')</script>";
            
            // Store relevant information in session variables
            $_SESSION['admin_id'] = $admin_resultset_row['admin_id'];
            $_SESSION['admin_username'] = $admin_resultset_row['admin_username'];
            $_SESSION['admin_emailaddress'] = $admin_resultset_row['admin_emailaddress'];
            $_SESSION['admin_profileimage'] = $admin_resultset_row['admin_profile_image'];

            header("Location: maindashboard.php");
            exit();
        } else {
            // Passwords match
            echo "<script>alert('Login Unsuccessful.Please Check your password again')</script>";
            exit();
        }
    } else {
        echo "<script>alert('Something went wrong ,No records or Action is not done')</script>";
    }
} else {
    echo "<script>alert('Something went wrong. Please try again later.')</script>";
}
