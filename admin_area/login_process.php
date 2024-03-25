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

    // echo "After sanitizing email addressEmail address is : $admin_emailaddress and User Password is :$admin_password";
    $admin_isverified = 1;
    $stmt = $conn->prepare('SELECT * FROM `admin_table` WHERE admin_emailaddress=? && admin_isverified=?;');
    $stmt->bind_param("si", $admin_emailaddress, $admin_isverified);
    $stmt->execute();
    $resultset = $stmt->get_result();

    if ($resultset->num_rows > 0) {

        echo "<script>alert('Have a recent record on your email address.')</script>";

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

            echo "<script>window.location.href = 'maindashboard.php';</script>";
            //header("Location: maindashboard.php");
            exit();
        } else {
            // Passwords do not match
            echo "<script>alert('Login Unsuccessful.Please Check your password again')</script>";

            // Redirect to main index page on wrong password
            echo "<script>window.location.href = '../index.php';</script>";
            exit();
        }
    } else {
        // No records found for the given email address
        echo "<script>alert('Something went wrong ,No records or Action is not done')</script>";

        // Wait for the user to dismiss the alert before redirecting
        
        exit();
    }
} else {
    // Invalid request method
    echo "<script>alert('Something went wrong. Please try again later.')</script>";

    //Redirecr to main index page on no records.
    echo "<script>window.location.href = '../index.php';</script>";
    exit();
}
