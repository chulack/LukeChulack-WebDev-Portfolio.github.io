<?php

/* *******************************************
 * Date: name:  Description: 
 * ------------------------------------------------------------------
 *9/17/21 | Luke |   The employee database commands have been moved and are now in an oop implementation. 
 * *******************************************/

class Employee {

    private $first_name, $last_name;
    
    public function __construct($first_name, $last_name) {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }
    
    public function getFirstname() {
        
        return $this->first_name;
    
        
    }
    
    public function getlastName() {
        
        return $this->last_name;
    }
    
}

class EmployeeDB {
    
    public static function getEmployees() {
        $db = Database::getDB();
        $query = "SELECT firstName, lastName FROM employee ORDER BY lastName;";
        $statement = $db->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll();
        $statement->closeCursor();
    
        $empoyees = array();
        foreach ($rows as $row) {
            $empoyeeObject = new Employee($row["firstName"], $row["lastName"]);
            $empoyees[] = $empoyeeObject;
            
        }
        return $empoyees;
    }
    
    public static function getEmployeessList() {
            $db = Database::getDB();
            $queryEmployee = 'SELECT * FROM employee';
            $statement1 = $db->prepare($queryEmployee);
            $statement1->execute();
            $employees = $statement1;
            return $employees;
    }
            
}

?>