<?php
error_reporting (E_ALL ^ E_NOTICE); 

session_start();


if($_SESSION['loggedIn'] != true || !isset($_GET["api"])) {
    die('{ "isTrue":"false" }');
} else {
    echo '{ "isTrue":"true" }';
}     


/* 

javascript:

fetch('http://localhost/api.php?api=true').then( (response)=> {
	// The API call was successful!
	return (response.json());
}).then( (data)=> {
	// This is the JSON from our response
	console.log(data.isTrue);
})

*/


?>

