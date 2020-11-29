<?php

include_once "config.php";

class Auth extends Config {

    public function __construct() {
        $auth = True;
    }

    private function login(){
        return True;
    }

    public static function logout() {
        return True;
    }

    function sessionChecker(){
        return True;
    }

}