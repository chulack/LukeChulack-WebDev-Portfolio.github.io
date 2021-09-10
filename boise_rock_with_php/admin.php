<?php
    

          
        $dsn = "mysql:host=localhost;dbname=boiseRockForm";
        $username="mgs_user";
        $password = "pa55word";
            try {
                $db = new PDO($dsn, $username, $password);

            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                /* include('database_error.php'); */
                echo "DB Error: " . $error_message; 
                exit();
            }
            
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
                     // Get name for selected category
            $queryEmployee = 'SELECT * FROM employee';
          $statement1 = $db->prepare($queryEmployee);
           // $statement1->bindValue(':employee_id', $employee_id);
            $statement1->execute();
            //$category = $statement1->fetch();
            $employees = $statement1;
//            $statement1->closeCursor();

            $query2 = "SELECT contactMSGID, contactMSG.name, "
                    . "contactMSG.userEmail, contactMSG.userMSG, contactMSG.msgDate,  contactMSG.employeeID FROM "
                    . "contactMSG JOIN employee on "
                    . "contactMSG.employeeID = employee.employeeID "
                    . " where employee.employeeID = :empolyee_id order by msgDate;";
            $statement2 = $db->prepare($query2);
            $statement2->bindValue(":empolyee_id", $employee_id);
            $statement2->execute();

            $visits = $statement2;
           // print_r($employees);
            } catch (PDOException $e) {
                 echo "Error".$e->getMessage();
            }
     
         } else if ($action == "delete_visit") {
             $vist_id = filter_input(INPUT_POST, "vist_id", FILTER_VALIDATE_INT);
             $query = "DELETE FROM `contactMSG` WHERE `contactMSG`.`contactMSGID` = :vist_id;";
             $statement = $db->prepare($query);
             $statement->bindValue(":vist_id", $vist_id);
             $statement->execute();
             $statement->closeCursor();
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
    <div class=""><a class="" href="index.html"><img id="logo"  src="images/logo.png" alt="Boise Rock logo" class=" navbar-brand float-left fixed-top position-absolute ml-5 mt-3"></a></div>
    <nav class="navbar navbar-fixed-top navbar-dark bg-dark text-light navbar-expand-md mb-5">


        <div class="mb-auto ml-auto">
            <button type="button" class="d-md-none navbar-toggler-icon" data-toggle="collapse" data-target="#navbarNav">
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item text-underline ml-auto"><a href="index.html" class="active nav-link text-light">
                        <h4>Home</h4>
                    </a></li>
                <li class="nav-item ml-auto"><a href="about.html" class="nav-link text-light">
                        <h4>About</h4>
                    </a></li>
                <li class="nav-item ml-auto"><a href="contact.html" class="nav-link text-light">
                        <h4><u>Contact</u></h4>
                    </a></li>
            </ul>
        </div>
    </nav>
    <div class="customM1 container">
    <section class="container rounded mt-5 p-5">
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
             <th>MSG:</th><!-- comment -->
             <th>Date:</th>
 <th></th>
         </tr>
<?php foreach ($visits as $vist) : ?>
        
         <tr style="border:1px solid red;">
             <td> <?php echo $vist["name"]; ?></td>
             <td> <?php echo $vist["userEmail"]; ?></td>
             <td> <?php echo $vist["userMSG"]; ?></td>
             <td> <?php echo $vist["msgDate"]; ?></td>
             <td>
                 <form action="admin.php" method="post">
                     <input type="hidden" name="action" value="delete_visit">
                     <input type="hidden" name="vist_id" value="<?php echo $vist["contactMSGID"]; ?>"><!-- comment -->
                     <input type="submit" value="Delete" ><!-- comment -->
                     
                 </form>
             </td>
         </tr>
          <?php endforeach;?>
       
     </table>
    </section>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>