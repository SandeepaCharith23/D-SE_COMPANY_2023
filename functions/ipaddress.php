<?php

//get the IP address of the client
function getIPAddress1() {  
    // whether IP is from the shared internet  
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
        $ip = $_SERVER['HTTP_CLIENT_IP'];  
    }  
    // whether IP is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
    }  
    // whether IP is from the remote address  
    else {  
        $ip = $_SERVER['REMOTE_ADDR'];  
    }  
    return $ip;
    
} 

?>