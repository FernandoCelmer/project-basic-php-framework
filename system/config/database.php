<?php

include_once __DIR__ . "/config.php";

class DataBase extends Config {

    protected $link;
    private $host;
    private $username;
    private $password;

    public function __construct() {
        $this->host = $this->env('DB_HOST');
        $this->username = $this->env('DB_USERNAME');
        $this->password = $this->env('DB_PASSWORD');
    }
    
    private function connectDatabase() {
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

    public function createDatabase(){
        return True;
    }

}

?>