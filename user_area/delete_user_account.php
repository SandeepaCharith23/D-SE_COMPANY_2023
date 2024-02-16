<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            padding: 20px;
        }
        .warning-container {
            max-width: 600px;
            margin: auto;
            border: 2px solid #ffc107;
            padding: 20px;
            border-radius: 10px;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <h1 class="text-center text-danger">Delete user account.</h1>
     
    <div class="container card warning-contailner" role="alert">
    <strong>⚠️ Warning: Deleting Your Account</strong>
        <p>Deleting your account is an irreversible action. Please consider the following before proceeding:</p>
        <ol>
            <li><strong>Data Deletion:</strong> All your account information, including personal details, preferences, and history, will be permanently deleted from our system.</li>
            <li><strong>Loss of Access:</strong> You will lose access to your account and any associated services immediately upon deletion. This includes any saved data, posts, or transactions.</li>
            <li><strong>No Recovery:</strong> Once your account is deleted, it cannot be recovered. Make sure to back up any important data before proceeding.</li>
            <li><strong>Impact on Services:</strong> If you are using our services, deleting your account may impact ongoing subscriptions, orders, or other active processes.</li>
        </ol>
    </div>

    <form action="" method="post" class="mt-5">
        <div class="form-outline p-2 mb-4">
            <input type="submit" class="form-control w-50 m-auto button shadow" name="delete_account" value="Delete Account">
        </div>

        <div class="form-outline p-2 mb-4">
            <input type="submit" class="form-control w-50 m-auto button shadow" name="dont_delete_account" value="Do not Delete Account">
        </div>
    </form>
</body>

</html>

<?php
//get the session variables 
$current_user_name=$_SESSION['username'];

//delete user data
if(isset($_POST['delete_account'])){

    echo "
    <script>
        var confirmDelete = confirm('Are you sure you want to delete your account? This action is irreversible.');

        if (confirmDelete) {
            // User confirmed, proceed with deletion
           // window.location.href = 'delete_account.php'; // Replace with the actual script or page for account deletion
        } else {
            // User canceled, do nothing or display a message
            alert('Account deletion canceled.');
        }
    </script>";


$delete_user_data_querry="DELETE FROM `user_table` WHERE  User_Name= '$current_user_name'";

if(mysqli_query($conn,$delete_user_data_querry))
{   
    //delete session data
    session_destroy();
    echo "<script>alert('Successfully delete user details.')</script>";
    echo "<script>window.open('../productshome.php','_self')</script>";
}
else{
    echo "<script>alert('Can not delete user data ,Please contact our admin.')</script>";
}
}

//Do not delete the account
if(isset($_POST['dont_delete_account']))
{
    echo "<script>window.open('user_profile.php','_self')</script>";
}


?>