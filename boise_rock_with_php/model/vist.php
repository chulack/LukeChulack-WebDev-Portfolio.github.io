<?php

/* *******************************************
 * Date: name:  Description: 
 * ------------------------------------------------------------------
 *9/17/21 | Luke |   The writing to the database commands like the contact form sql commands have been moved and are now in an oop implementation. 
 * *******************************************/


function getVistbyemp($employee_id) {
    
                $db = Database::getDB();

        $query2 = "SELECT contactMSGID, contactMSG.name, "
                    . "contactMSG.userEmail, contactMSG.userMSG, contactMSG.msgDate,  contactMSG.employeeID FROM "
                    . "contactMSG JOIN employee on "
                    . "contactMSG.employeeID = employee.employeeID "
                    . " where employee.employeeID = :empolyee_id order by msgDate;";
            $statement2 = $db->prepare($query2);
            $statement2->bindValue(":empolyee_id", $employee_id);
            $statement2->execute();
            return $statement2; 
}

function delVist($vist_id) {
                    $db = Database::getDB();
      $vist_id = filter_input(INPUT_POST, "vist_id", FILTER_VALIDATE_INT);
             $query = "DELETE FROM `contactMSG` WHERE `contactMSG`.`contactMSGID` = :vist_id;";
             $statement = $db->prepare($query);
             $statement->bindValue(":vist_id", $vist_id);
             $statement->execute();
             $statement->closeCursor();
    
}

function addVisit($name, $email, $msg) {
                        $db = Database::getDB();

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

}
?>
