<?php

include_once "config.php";

class Auth extends Config {

    public function __construct() {
        $auth = True;
    }

    function sessionChecker(){
        return True;
    }

}