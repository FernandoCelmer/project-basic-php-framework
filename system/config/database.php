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
        return $this->connectDatabase();
    }

    public function createDatabase(){
        return True;
    }

    public function initData($data, $data_log){
        if ($data){
            foreach ($data_log as $key => $item){
                if(isset($data[$key])){
                    if ($data[$key]){
                        $data_log[$key] = $data[$key];
                    }else{
                        unset($data_log[$key]);
                    }
                }else{
                    unset($data_log[$key]);
                }
            }
            return $data_log;
        }else{
            return False;
        }
    }

}

?>