<?php

/* *******************************************
 * Date name Description 
 * ------------------------------------------------------------------
 *9/21/21 | Luke | added the struture for an error display system. 
 * *******************************************/


#gets data from errorType hidden input. 
$errorType = FILTER_INPUT(INPUT_POST, "errorType");

#message that will explain the error, it will be assigned to it by logic that will be added.
$errorMSG =  "";

# this will be removed in the final version

if(!isset($errorType)) {

    $errorMSG =  "Message about error goes here.";
}



?> 
<!DOCTYPE html>
<!----------------------------------------------------------------------------------------------------------------
--
#Original Author: Luke Chulack                         
#Date Created: 09/21/2021                                     
#Version: 1.0                                           
#Date Last Modified: 09/21/2021                               
#Modified by: Luke Chulack                                          
#Modification log: 
    version 1.0 - 09/21/2021 - add the struture for an error display system.
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
        
        <title>Website Error | <?php echo  htmlspecialchars($errorType);?></title>
        
        <link rel="icon" href="front-end/media/images/logo/icon.png">


        <!-- css imports -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        
        <link rel="stylesheet" href="http://anijs.github.io/lib/anicollection/anicollection.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css">

        <link rel="stylesheet" href="front-end/style/css/style.css">


        
    </head>

    <body>

        <!--  no "home" section and nav -->
        <header class="">
            <div class="overlay">
           
        </div>

        </header>

       

   
        <!-- error info set up -->


        <div class="modal" id="contact_form" style="display:block;">

        

            <div class="modal-dialog" >
            
                <div class="modal-content">
                  
                    <div class="modal-body" class="text-center" style="text-align:center;">

                        <h4 class="text-center"> A WebPage Error has occured!</h4>

                        <p><?php echo  htmlspecialchars($errorMSG);?></p>


                        <h6><a href="./" style="text-decoration: underline;color:white;font-size:12px;" >Return Home</a></h6>
                       

                    </div>

                </div>

            </div>




        </div>




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

        

    </body>

</html>
