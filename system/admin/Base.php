<?php

include_once "config/database.php";

class Base extends DataBase {

    public function __construct() {
        $base = True;
    }

    function getUrl(){
        return True;
    }

}

?>