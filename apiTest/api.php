<?php
error_reporting (E_ALL ^ E_NOTICE); 

session_start();


if($_SESSION['loggedIn'] != true || !isset($_GET["api"])) {
    die('{ "isTrue":"false" }');
} else {
	
    echo '{ "isTrue":"true" }';
}     



?>

