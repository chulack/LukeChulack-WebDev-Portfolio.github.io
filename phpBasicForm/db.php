<?php 

    class database {
        
        public static function getDatabase ($servername = "localhost", $username = "commeter", $password = "123",$dbname = "testISP") {
        
            
            return new mysqli($servername, $username, $password, $dbname);
        
        }
    }

?>