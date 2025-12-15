<?php
session_start();

// task 9.5
$scriptName =  $_SERVER["SCRIPT_NAME"];
$projectName =  (explode("/", $scriptName));
$projectName =  $projectName[count($projectName) - 1];
echo $scriptName . "<br>";
echo $projectName . "<hr>";

// task 9.6
echo $_SERVER['REQUEST_TIME'] . "<hr>";


// task 9.7
if (empty($_SESSION["counter"])) {
    $_SESSION["counter"] = 1;
    echo "0";

} else {
   echo $_SESSION["counter"]++ . "<hr>";
}

//task 9.8
if (empty($_SESSION["visitor"])) {
    $_SESSION["visitor"] = 1;
    echo "0";

} else {
   echo $_SESSION["visitor"]++ . "<hr>";
}


// task 9.9
$cookie_name = "user";
$cookie_value = "Hamzeh";
$expiry_time = time() + (86400); 
$cookie_path = "/";           
$domain = "";                    
$secure = false;                 
$httponly = true;  
setcookie($cookie_name, $cookie_value, $expiry_time, $cookie_path, $domain, $secure, $httponly);
setcookie(
    $cookie_name, 
    "",                 
    time() - 3600,     
    "/",               
    "",                 
    false,               
);
if(isset($_COOKIE[$cookie_value])) {
    echo "Cookie exists: " . $_COOKIE[$cookie_name];
} else {
    echo "Cookie not found!";
}

// session_destroy();
?> 