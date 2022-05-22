<?php
session_start();

if(isset($_POST["login"])) {
    echo "logging in";
    $_SESSION['loggedIn'] = true;
    header("location: index.php");

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<form action="./login.php" method="POST"> 
    <input type="submit" name="login" value="login">

</form>

</body>
</html>