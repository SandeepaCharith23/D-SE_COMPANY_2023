<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log out</title>
    <style>
        body {
            background-color: #f4f4f4;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>

</head>

<body>
<!-- 
    <body>
        <div class="container mt-5 shadow">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Logout</h2>
                    <p class="card-text">Are you sure you want to log out?</p>
                    <form action="" method="post">
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </body> -->

    <?php

   
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        session_unset();
        session_destroy();
        echo "<script>alert('successfully signout')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    
    ?>

</body>

</html>