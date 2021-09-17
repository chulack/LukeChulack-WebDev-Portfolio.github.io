<?php
 /* *******************************************
 * Date name Description 
 * ------------------------------------------------------------------
 *9/17/21 | Luke |  The database connection has now been moved from in this file to an implementation in oop as well as other functions like the database employee interactions being moved to a model setup. The Navbar is now setup with an Admin Ui.
 * *******************************************/


        // connects to server
        require_once('./model/database.php');
        require_once('./model/employee.php');
        require_once('./model/vist.php');

            
            // check action
            
            $action = filter_input(INPUT_POST, "action");
            if ($action == NULL) {
                
                $action = filter_input(INPUT_GET, "action");
                if ($action == NULL) {
                    $action = "list_vists";
                }
            }
            
            if ($action == "list_vists") {
                
          
            
            $employee_id = filter_input(INPUT_GET, "empolyee_id", FILTER_VALIDATE_INT);
            if($employee_id == NULL || $employee_id == FALSE) {
                $employee_id = 1;
            }
            
            try {
              // Get all selected employee
//            $queryEmployee = 'SELECT * FROM employee';
//          $statement1 = $db->prepare($queryEmployee);
//            $statement1->execute();
            $employees = EmployeeDB::getEmployeessList();


//            $query2 = "SELECT contactMSGID, contactMSG.name, "
//                    . "contactMSG.userEmail, contactMSG.userMSG, contactMSG.msgDate,  contactMSG.employeeID FROM "
//                    . "contactMSG JOIN employee on "
//                    . "contactMSG.employeeID = employee.employeeID "
//                    . " where employee.employeeID = :empolyee_id order by msgDate;";
//            $statement2 = $db->prepare($query2);
//            $statement2->bindValue(":empolyee_id", $employee_id);
//            $statement2->execute();

            $visits = getVistbyemp($employee_id);
            } catch (PDOException $e) {
                 echo "Error".$e->getMessage();
            }
     //delete msg
         } else if ($action == "delete_visit") {
//             $vist_id = filter_input(INPUT_POST, "vist_id", FILTER_VALIDATE_INT);
//             $query = "DELETE FROM `contactMSG` WHERE `contactMSG`.`contactMSGID` = :vist_id;";
//             $statement = $db->prepare($query);
//             $statement->bindValue(":vist_id", $vist_id);
//             $statement->execute();
//             $statement->closeCursor();
    delVist($vist_id);
             header("Location: admin.php");
         }

?>

<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boise Rock | Admin</title>
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
                   
            </ul>
        </div>

    </nav>
    <div class="customM1 container">
    <section class="container rounded mt-5 p-5">
         <!-- display employees -->

     <h1>Admin</h1>
     <h3>Select An employee to view messages </h3>
     <aside>
         <ul style="list-style-type: none;">
             
             <?php foreach ($employees as $employee) : ?>
             <li>
                 <a href="?empolyee_id=<?php echo $employee["employeeID"]; ?>">
                 <?php echo $employee["firstName"] . " ". $employee["lastName"];?>
                 </a>
             </li>
             <?php endforeach;?>
             
         </ul>
     </aside>
     <table style="border:1px solid red;">
         <tr style="border:1px solid red;">
             <th>Name:</th>
             <th>Email:</th>
             <th>MSG:</th>
             <th>Date:</th>
 <th></th>
         </tr>
 <!-- display table of data -->
<?php foreach ($visits as $vist) : ?>
        
         <tr style="border:1px solid red;">
             <td> <?php echo $vist["name"]; ?></td>
             <td> <?php echo $vist["userEmail"]; ?></td>
             <td> <?php echo $vist["userMSG"]; ?></td>
             <td> <?php echo $vist["msgDate"]; ?></td>
             <td>
                 <form action="admin.php" method="post">
                     <input type="hidden" name="action" value="delete_visit">
                     <input type="hidden" name="vist_id" value="<?php echo $vist["contactMSGID"]; ?>">
                     <input type="submit" value="Delete" >
                     
                 </form>
             </td>
         </tr>
          <?php endforeach;?>
       
     </table>
    </section>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    
    
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
</body>

</html>
