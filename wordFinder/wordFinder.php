<?php

 
class wordFinder {
    static public function find($str, $word) {
        // Test if string contains the word 
        if(strpos($str, $word) !== false){

            echo "User was found!";

        } else{

            echo "User was not found!";

        }
    }
}


?>