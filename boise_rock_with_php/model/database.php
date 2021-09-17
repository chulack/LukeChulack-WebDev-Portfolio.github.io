<?php

/* *******************************************
 * Date: name: Description: 
 * ------------------------------------------------------------------
 * 9/17/21 | Luke |  database implementation in oop. This conntects to the server like before just using classes instead 
 * *******************************************/


class Database {
    
    private static  $dsn = "mysql:host=localhost;dbname=boiseRockForm";
    private static $username = 'mgs_user';
    private static $password = 'pa55word';
    private static $db;

    private function __construct() {}

    public static function getDB () {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                                     self::$username,
                                     self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                echo "Database Error, problem connecting.";
                exit();
            }
        }
        return self::$db;
    }
}
?>
