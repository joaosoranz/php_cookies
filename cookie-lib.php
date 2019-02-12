<?php
    function createCookie($name, $value, $minutes) {

        //1 hour = 3600
        //1 day = 86400
        setcookie($name, $value, time() + $minutes, "/");
    } 
    
    function createCookieCustomized($name, $value, $minutes) {

        //1 hour = 3600
        //1 day = 86400

        //Chech whether the cookie already exists
        if(isset($_COOKIE[$name])) {
            $value = $_COOKIE[$name] . "|" . $value;
        }

        setrawcookie($name, $value, time() + $minutes, "/");
    } 
?>