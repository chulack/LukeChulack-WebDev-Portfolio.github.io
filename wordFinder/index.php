<?php
include "./wordFinder.php";

if(isset($_POST["submit"])) {
    wordFinder::find($_POST["str"], $_POST["word"]);
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
    <form method="POST"  action="./">

        <input type="text" placeholder="String" name="str"><br><br>
        <input type="text" placeholder="Word to find" name="word"><br><br>
        <input type="submit" value="submit" name="submit"><br><br>

    </form>
</body>
</html>