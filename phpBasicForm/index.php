<?php
    if(isset($_POST["sent"])) {

      include "./lib.php";
      include "./sqlInputs.php";
      
      $fName = general::filterData(INPUT_POST, "lName");  //strip_tags(FILTER_INPUT(INPUT_POST, "lName"));
      $lName = general::filterData(INPUT_POST, "lName"); // strip_tags(FILTER_INPUT(INPUT_POST, "fName"));
      $msg =   general::filterData(INPUT_POST, "lName");// strip_tags(FILTER_INPUT(INPUT_POST, "msg"));





      sqlMethods::commitComment($fName, $lName, $msg);
      
    }   



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>
<body>
    
    <form method="post" action="./">
        <div class="form-group">
          <label for="exampleFormControlInput1">First name</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="First name" name="fName" require>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Last name</label>
          <input type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Last name" name="lName" require>

        </div>
        <div class="form-group">

        <div class="form-group">
          <label for="exampleFormControlTextarea1">message</label>
          <textarea class="form-control" id="exampleFormControlTextarea1"  rows="3"  name="msg"></textarea>
        </div>

        <input type="submit" name="sent" >
      </form>


      

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</body>
</html>