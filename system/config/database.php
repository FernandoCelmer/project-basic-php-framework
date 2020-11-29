<?php

include_once "config.php";

class DataBase extends Config {

    protected $link;
    private $host;
    private $username;
    private $password;

    public function __construct() {
        $this->host = $this->env_db('DB_HOST');
        $this->username = $this->env_db('DB_USERNAME');
        $this->password = $this->env_db('DB_PASSWORD');
    }
    
    private function connect() {
        try {
            $this->link = new PDO('mysql:host='.$this->host, $this->username, $this->password);
            $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
            
            return $this->link;

        } catch(PDOException $e) {
            return False;
        }
    }

    public function initDatabase(){
        return $this->connect();
    }
}

?>