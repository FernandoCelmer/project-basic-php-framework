<?php

include_once __DIR__ . "/Config.php";

/**
 * This class is responsible for the authentication of the application.
 */
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