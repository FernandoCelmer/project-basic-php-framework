<?php


/**
 * This class is responsible for the application settings.
 */
class Config {

    private $base;

    /**
     * Construction of environment variables.
     * 
     * @since 0.0.1
     *
     */
    public function __construct() {
        $this->base = parse_ini_file('.env');
        foreach ($this->base as $key => $value) {
            $_ENV[$key] = $value;
        }
    }

    /**
     * Environment Variables.
     * 
     * If you hear a certain environment variable, a string is returned or false is returned.
     *
     * @since 0.0.1
     *
     * @return string|false Returns the environment variables.
     */
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
