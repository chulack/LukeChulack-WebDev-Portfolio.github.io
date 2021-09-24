<?php

/* *******************************************
 * Date name Description 
 * ------------------------------------------------------------------
  *9/24/21 | Luke |  this page will delete SESSION data and send it to loggedout.php with 401 error to reset PHP_AUTH
 * *******************************************/

require_once('./util/is_admin.php');
 
$_SESSION = array();   
session_destroy();    
$login_message = 'You have been logged out.';
        
 header('HTTP/1.0 401 Unauthorized');
   
 include('loggedout.php');
   
?>