<?php
 /* *******************************************
 * Date name Description 
 * ------------------------------------------------------------------
 *9/17/21 | Luke | database connection has now been moved from in this file to an implementation in oop as well as other functions like the database employee interactions being moved to a model setup. 
  *9/24/21 | Luke |  The  login system that works with session date needs all non admin pages to send non signed in users to it.  is_admin.php will check to see if a user is signed in or it will send them  to admin so they login.
 * *******************************************/


// connects to server using the model database class
    
require_once('./model/database.php');
     
require_once('./model/employee.php');

require_once('./util/is_admin.php');

$emplyees = EmployeeDB::getEmployees();

//print_r($emplyees);
//echo "test message";

?>

<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boise Rock | Employees</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/styles1.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">

</head>

<body>
    <div class=""><a class="" href="index.html" class=" navbar-brand float-left fixed-top position-absolute ml-5 mt-3"></a></div>
    <nav class="navbar navbar-fixed-top navbar-dark bg-dark text-light navbar-expand-md mb-5">
Boise Rock

        <div class="mb-auto ml-auto">
            <button type="button" class="d-md-none navbar-toggler-icon" data-toggle="collapse" data-target="#navbarNav">
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item text-underline ml-auto"><a href="admin.php" class="active nav-link text-light">
                        <h4>Admin Home</h4>
                    </a></li>
                    <li class="nav-item text-underline ml-auto"><a href="employeelist.php" class="active nav-link text-light">
                        <h4>Employee List</h4>
                    </a></li>
                            <li class="nav-item text-underline ml-auto"><a href="index.html" class="active nav-link text-light">
                        <h4>BoiseRock Home</h4>
                    </a></li>
                                        <li id="contact_nav" class="nav-item text-underline ml-auto" style="cursor: pointer;">

                                        <a class="nav-link " data-anijs="if: mouseover, on: #contact_nav, do: pulse animated" data-toggle="modal" data-target="#contact_form "><h4>Test Contact</h4></a>

                    </li>    
                    <li class="nav-item text-underline ml-auto"><a href="logout.php" class="active nav-link text-light">
                        <h4>Logout</h4>
                    </a></li>
            </ul>
        </div>
    </nav>
    <div class="customM1 container">
    <section class="container rounded mt-5 p-5">
         <!-- display employees -->

     <h1>Employees</h1>
     <h3>A list of our employees </h3>

     <p>
     <ul>
         <?php foreach ($emplyees as $employee) : ?>
         <li><?php echo $employee->getlastName() . ", " . $employee->getFirstname(); ?></li>
         <?php endforeach; ?>
     </ul>
     </p>
    </section>
</div>
    
    <!-- test contact modal-->
    
    <div class="modal" id="contact_form">

        

            <div class="modal-dialog" >
            
                <div class="modal-content">
                    <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span  aria-hidden="true">&times;</span>
                   </button>
                    <div class="modal-body" class="text-center">

                        <h4 class="text-center"> Test contact page</h4>

                        <form name="contactForm" class="text-center needs-validation" onsubmit="return valiText()" method="POST" action="sent.php">
                                <span id="error_name_form"></span>

                            <div class="form-outline" >
                            <input type="text" id="name_contact" placeholder="Name:" class="form-control" name="name" required>
                        </div><div class="form-outline" >
                            <input type="email" id="email_contact" placeholder="Email:" class="form-control" name="email"  required>
                        </div>
                          <span id="error_msg_form"></span>

                                <div>
                            <textarea  id="msg" placeholder="Message:" class="form-control" name="msg" maxlength="250" required>


                            </textarea>
                        </div><div>

                            <input type="submit" value="Send" id="send">

                        </div>
                        </form>
                        <script>
                            
                            const valiText = () => {
                                let a = document.forms["contactForm"]["msg"].value;
                                let b = document.forms["contactForm"]["name"].value;
                               
                                if (a.trim() == "") {
                                    
                                    document.querySelector("#error_name_form").innerHTML = "Please Enter Text:";
                                      
                                     //  document.querySelector("#name_contact").style.borderColor = "red";
                                       return false;
                                } else {
                                    document.querySelector("#error_name_form").innerHTML = "";

                                   // document.querySelector("#name_contact").style.borderColor = "green";
                                }
                                
                                  if (b.trim() == "") {
                                        document.querySelector("#error_msg_form").innerHTML = "Please Enter Text:";

                                            return false;
                                   } else {
                                            document.querySelector("#error_msg_form").innerHTML = "";
                                   }
                                       
                                       
    
                                        
                                
                            }
                        </script>   
                    </div>

                </div>

            </div>



    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>
