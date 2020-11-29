<?php

class Config {

    private $base;

    public function __construct() {
        $this->base = parse_ini_file('.env');
        foreach ($this->base as $key => $value) {
            $_ENV[$key] = $value;
        }
    }

    function env($tag = NULL){
        if($tag){
            return $_ENV[$tag];
        }else{
            return False;
        }
    }

}

new Config();

?>