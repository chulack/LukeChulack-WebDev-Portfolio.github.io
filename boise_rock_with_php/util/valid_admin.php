<?php
// this sets up and haas the logic for PHP_AUTH to work
require_once('model/database.php');
require_once('model/adminLoginDB.php');


    session_start();

$email = '';
$password = '';


    
if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {
    $email = $_SERVER['PHP_AUTH_USER'];
    $password = $_SERVER['PHP_AUTH_PW'];    
}


if (is_valid_admin_login($email, $password)) {
    $_SESSION['is_valid_admin'] = true;



} else {

 header('WWW-Authenticate: Basic realm="Admin"');
    header('HTTP/1.0 401 Unauthorized');
    include('error.php');
    exit();
    
    
}


?>
