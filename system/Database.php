<?php

include_once __DIR__ . "/Config/config.php";

/**
 * This class defines the main parameters and standard methods for the application's database.
 */
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
    
    /**
     * Connect DataBase.
     *
     * It makes a connection to the database and returns a schema otherwise it returns false.
     * 
     * @since 0.0.1
     *
     * @return object|false Schema of Database.
     */
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

    /**
     * Database Initialization
     *
     * It manipulates the information received to conform to the specific serus models.
     *
     * @since 0.0.1
     *
     * @param array $data - Formatting information.
     * @param array $data_log - Model information.
     * @return array Returns formatted information without null fields.
     */
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
