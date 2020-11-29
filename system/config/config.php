<?php

class Config {

    private $base;

    public function __construct() {
        $this->base = parse_ini_file('.env', true);
        foreach ($this->base as $key => $value) {
            $_ENV[$key] = $value;
        }
    }

    function env_app($tag = NULL){
        if($tag){
            return $_ENV['app'][$tag];
        }else{
            return False;
        }
    }

    function env_db($tag = NULL) {
        if($tag){
            return $_ENV['database'][$tag];
        }else{
            return False;
        }
    }

}

$app = new Config();

?>