<?php

if (!defined('DB_HOST')) {
    // DB_HOST constant is not defined
    define('DB_HOST', 'localhost:3308');
}

if (!defined('DB_USER')) {
    // DB_USER constant is not defined
    define('DB_USER', 'Sandeepa_Charith');
}

if (!defined('DB_PASS')) {
    // DB_PASS constant is not defined
    define('DB_PASS', '123456');
}

if (!defined('DB_NAME')) {
    // DB_NAME constant is not defined
    define('DB_NAME', 'd&secompany');
}


// define('DB_HOST','localhost:3308');
// define('DB_USER','Sandeepa_Charith');
// define('DB_PASS','123456');
// define('DB_NAME','d&secompany');
// define('DB_PORT',3308);

try{
//1.create a connection
$conn =mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME); 

//2.check Connection
if($conn->connect_error){
    die('Connection failed'.$conn->connect_error);
}

echo "Connection Done";

}catch(mysqli_sql_exception $e){
    echo "Connection failed: " . $e->getMessage();
}






?>