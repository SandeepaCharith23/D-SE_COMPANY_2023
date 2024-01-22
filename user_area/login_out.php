<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log out</title>
    <?php
    session_start();
    session_unset();
    session_destroy();
    echo "<script>alert('successfully signout')</script>";
    echo "<script>window.open('../index.php','_self')</script>";
    
    ?>
</head>
<body>
<div>
        <h2>Logout</h2>
        <p>Are you sure you want to log out?</p>
        <form action="" method="post">
            <button type="submit">Logout</button>
        </form>
    </div>
  
</body>
</html>