<?php
#gets data if it exists or sends back to home page if data does not exist
$name = FILTER_INPUT(INPUT_POST, "name");
$email = FILTER_INPUT(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);;
$msg = FILTER_INPUT(INPUT_POST, "msg");

if (isset($name) && isset($email) && isset($msg) && trim($name) != "" && trim($email) != "" && trim($msg) != "") {

 
 
    try {

        $dsn = "mysql:host=localhost;dbname=boiseRockForm";
        $username="mgs_user";
        $password = "pa55word";

        $db = new PDO($dsn, $username, $password);


    } catch (PDOException $e) {

    }

    $query = '
    INSERT INTO contactMSG
                        (name, userEmail, userMSG, msgDate, employeeID) 
                        VALUES
                        ("'. $name .'", "'. $email .'", "'. $msg .'", NOW(), 3);
                        ';
    $statement = $db->prepare($query);
    # $statement->bindValue(":name", $name);
    # $statement->bindValue(":email", $emails);
    # $statement->bindValue(":msg", $msg);
    $statement->execute();
    $statement->closeCursor();

} else {

  header("Location: /boise_rock");

}

?>
<!DOCTYPE html>
<!----------------------------------------------------------------------------------------------------------------
--
#Original Author: Luke Chulack                         
#Date Created: 03/05/2021                                     
#Version: 1.0                                           
#Date Last Modified: 03/05/2021                               
#Modified by: Luke Chulack                                          
#Modification log: 

    version 1.0 - 03/05/2021 - added 5 sections, "Home", about, events, contact, and cart. 2 of which use Bootstrap modals. form  validation occurs using MDB UI kit, the cart works as it is using the model from pop magic (last blocks project). The cart "page" is based on a bootsrap example which I have built to work as a modal "page".


 --
---------------------------------------------------------------------------------------------------------------->
<html lang="en">
    <head>

        <!-- meta tags -->
        
        <meta charset="UTF-8">
        <meta name="HandheldFriendly" content="true"/> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="apple-mobile-web-app-capable" content="no">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


        <meta name="description" content="Boise Rock is home to true rock and roll">
        <meta name="keywords" content="Boise Rock,Rock event,Boise">
        <meta name="author" content="Boise Rock">

        <meta property="og:title" content="Boise Rock" />
        <meta property="og:description" content="Boise Rock is home to true rock and roll" />
        <meta property="og:image" content="" />

        <meta name="twitter:card" content="summary" />
        <meta property="twitter:title" content="Boise Rock" />
        <meta property="twitter:description" content="Boise Rock is home to true rock and roll" />
        <meta property="twitter:image" content="" />


        <!-- non-meta tags  -->
        
        <title>Form Sent</title>
        
        <link rel="icon" href="front-end/media/images/logo/icon.png">


        <!-- css imports -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        
        <link rel="stylesheet" href="http://anijs.github.io/lib/anicollection/anicollection.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css">

        <link rel="stylesheet" href="front-end/style/css/style.css">


        
    </head>

    <body>

        <!-- "home" section and nav -->
        <header class="">
            <div class="overlay">
           
        </div>

        </header>

       

   
        <!-- contact modal set up -->


        <div class="modal" id="contact_form" style="display:block;">

        

            <div class="modal-dialog" >
            
                <div class="modal-content">
                  
                    <div class="modal-body" class="text-center" style="text-align:center;">

                        <h4 class="text-center"> Your feedback has been sent!</h4>

                        You will return back home in <span id="counter-num">3</span>

                        <noscript><a href="http://172.22.10.89/boise_rock/">Your JavaScript is off Please click here to return home</a> </noscript>
                       

                    </div>

                </div>

            </div>




        </div>

        <!-- shop modal set up -->


        <div class="modal" id="modal_shop"> 

            <button id="go_for_shop" type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
           </button>






        </div>


        <!-- script imports -->

        <!-- bootstrap dependency -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
      
        <!-- font awesome -->
        <script src="https://kit.fontawesome.com/fd32684d65.js" crossorigin="anonymous"></script>
    
        <!-- anijs -->
        <script src="https://anijs.github.io/lib/anijs/anijs-min.js"></script> 
        <script src="https://anijs.github.io/lib/anijs/helpers/dom/anijs-helper-dom-min.js"></script>

        <!-- mdb-ui-kit -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>

        
        <!-- <script src="front-end/script/javascript/script.js"></script> -->

      <script>


  setTimeout(()=>{                
    document.querySelector("#counter-num").innerHTML = "2" ;  
    setTimeout(()=>{                
        document.querySelector("#counter-num").innerHTML = "1" ;  
            setTimeout(()=>{                
            document.querySelector("#counter-num").innerHTML = "0" ;  
            window.location.replace("http://172.22.10.89/boise_rock/");

          }, 1000);
       }, 1000);
 }, 1000);



       
  

          


          

      </script>
        

    </body>

</html>

