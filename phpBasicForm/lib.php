<?php

class general {
    
   static function filterData($postData, $stringData) {
        return strip_tags(FILTER_INPUT($postData, $stringData));
    }


}


?>