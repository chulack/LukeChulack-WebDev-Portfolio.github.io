<?php
 /* *******************************************
 * Date name Description 
 * ------------------------------------------------------------------
  *9/24/21 | Luke |  page lets the user know they are logged out and lets them return to sign in. 
 * *******************************************/


require_once('./model/database.php');
     
require_once('./model/employee.php');

require_once('./util/is_admin.php');

echo "<center><h1>You have been logged out</h1></center>";

echo "<center><a href='./admin.php'>return to login</a></center>";

?>