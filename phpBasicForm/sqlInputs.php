<?php

include "./db.php";



    
    class sqlMethods {

        function sqlMethods() {


        }   

        static function commitComment($fName, $lName, $msg) {

            database::getDatabase()->query("INSERT INTO testTable (firstName, lastName, comment, ticketDate)
            VALUES ('$lName', '$lName', '$msg', '".date("Y-m-d",time())."')");
   database::getDatabase()->close();

           
        }
    }


?>